<?php

/**
 * --------------------------------------------------------------------
 * CODEIGNITER 4 - SimpleAuth
 * --------------------------------------------------------------------
 *
 * This content is released under the MIT License (MIT)
 *
 * @package    SimpleAuth
 * @author     GeekLabs - Lee Skelding 
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link       https://github.com/GeekLabsUK/SimpleAuth
 * @since      Version 1.0
 * 
 */

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Excelsheet extends BaseController
{
    public function index(){
        return view('thinkframe/spreadsheet');
    }

    public function import(){
            $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

            $scope_id = 0;

            if(isset($_POST['scope_name'])){
                $db = db_connect();
                $builder = $db->table('scopes');

                $new_scope = array(
                    'scope_name' => $_POST['scope_name'],
                    'scope_slug' => $_POST['scope_name']
                );

                $rs = $builder->insert($new_scope);
                $scope_id = $db->insertID();
            }

            if(isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes)) {
            $arr_file = explode('.', $_FILES['upload_file']['name']);
            $extension = end($arr_file);
            if('csv' == $extension){
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
            $sheet = $spreadsheet->getActiveSheet(0);

            $nb = 0;
            $start_row_advice = 0;
            $first_row_having_advice = 0; // first row number starting with "advice" word

            foreach ($sheet->getRowIterator() as $row) {

                $value_A_column = $sheet->getCell("A$nb")->getValue();
                if(strpos($value_A_column, 'Advice') !== false){
                    $first_row_having_advice = $nb;
                    $start_row_advice = $nb + 2;
                    break;
                }
                
                $nb++;
            }

            // start getting advices from excel sheet.
            $advices = array();
            foreach ($sheet->getRowIterator() as $row) {
                $advice = $sheet->getCell("A$start_row_advice")->getValue();
                if($advice != NULL || $advice != ''){
                    array_push($advices, array('advice_content' =>  $advice, 'scope_id' => $scope_id));
                    $start_row_advice++;
                }
                else{
                    break;
                }
                
            }

            $db = db_connect();
            $builder = $db->table('advices');
            if(!empty($advices)){
                $builder->insertBatch($advices); 
            }

            // end getting all advices 

            /**
             * start getting questions from excel sheet.
             */

            $questions = array();
            
            $row_number = 0;
            foreach ($sheet->getRowIterator() as $row) {
                $cell_string = $sheet->getCell("A$row_number")->getValue();
                if(strpos($cell_string, 'QUESTION') !== false){
                    $row_number++;
                    $question = $sheet->getCell("A$row_number")->getValue();
                    array_push($questions, array('question_content' => $question, 'scope_id' => $scope_id));
                }

                if(strpos($cell_string, 'END') !== false){
                    break;
                }

                $row_number++;
            }

            $db = db_connect();
            $builder = $db->table('questions');
            if(!empty($questions)){
                $builder->insertBatch($questions); 
            }

            // end getting all questions



            // start adding options
            
           

            $db = db_connect();
            $builder = $db->table('questions');
            $builder->select('*');
           
            $builder->orderBy('questions.question_id', 'asc');
            $builder->where('questions.scope_id', $scope_id);

            $query = $builder->get();
            $questions_result = $query->getResultArray();

           
            $options = array();

            $find_string_question_row = 0;
            $temp_row = 0;
            foreach ($sheet->getRowIterator() as $row) {
                $cell_string = $sheet->getCell("A$temp_row")->getValue();
                if(strpos($cell_string, 'QUESTION') !== false){
                    $find_string_question_row = $temp_row;
                    break;
                }
                $temp_row++;
            }

                
            foreach ($sheet->getRowIterator() as $row) {
                
                $cell_string = $sheet->getCell("A$find_string_question_row")->getValue();

                if(strpos($cell_string, 'QUESTION') !== false){
                    
                    $question = $sheet->getCell("A".($find_string_question_row + 1))->getValue();

                    $key = array_search($question, array_column($questions_result, 'question_content'));

                    $find_string_question_row = $find_string_question_row + 2;
                    continue;
                }

                if(strpos($cell_string, 'END') !== false){
                    break;
                }

                $option_content = $sheet->getCell("A$find_string_question_row")->getValue();
                array_push($options, array('option_content' => $option_content, 'question_id' => $questions_result[$key]['question_id']));

                $find_string_question_row++;

            }

            $db = db_connect();
            $builder = $db->table('options');
            if(!empty($options)){
                $builder->insertBatch($options); 
            }

            
            // end adding options



            /**
             * start getting hyps from excel sheet
             */
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn(); 
            $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
            $hyps = array();

            
            for ($row = 1; $row <= 1; $row++) {
                for($col = 1; $col <= $highestColumnIndex; $col++){
                    $cell_value = $sheet->getCellByColumnAndRow($col,$first_row_having_advice)->getValue();
                    if(strpos($cell_value, 'Hyp') !== false){
                        $hyp_row = $first_row_having_advice + 1;
                        $hyp = $sheet->getCellByColumnAndRow($col, $hyp_row)->getValue();
                        array_push($hyps, array('hyp_content' => $hyp, 'scope_id' => $scope_id));
                    }
                }
            }

            $db = db_connect();
            $builder = $db->table('hyps');
            if(!empty($hyps)){
                $builder->insertBatch($hyps); 
            }

            // end getting all hyps

             /**
             * starting option_hyp 
             */

            $db = db_connect();
            $builder = $db->table('hyps');
            $builder->select('*');
           
            $builder->orderBy('hyps.hyp_id', 'asc');
            $builder->where('hyps.scope_id', $scope_id);

            $query = $builder->get();
            $hyps_result = $query->getResultArray();

            //-----
            $db = db_connect();
            $builder = $db->table('options');
            $builder->select('options.option_id, options.option_content');
            $builder->join('questions AS q', 'q.question_id = options.question_id','left');
            $builder->where('q.scope_id', $scope_id);
            $builder->orderBy('options.option_id', 'asc');
            $query = $builder->get();
            $options_result = $query->getResultArray();


            $find_string_set_row = 0;
            $temp_row = 0;
            foreach ($sheet->getRowIterator() as $row) {
                $cell_string = $sheet->getCell("B$temp_row")->getValue();
                if(strpos($cell_string, 'SET') !== false){
                    $find_string_set_row = $temp_row;
                    break;
                }
                $temp_row++;
            }

            $option_hyps = array();
            $kk = 0;

            foreach ($sheet->getRowIterator() as $row) {
                
                $cell_string = $sheet->getCell("B$find_string_set_row")->getValue();

                if(strpos($cell_string, 'SET') !== false){
                    $hyp = $sheet->getCell("B".($find_string_set_row + 1))->getValue();
                    $key = array_search($hyp, array_column($hyps_result, 'hyp_content'));

                    $find_string_set_row = $find_string_set_row + 2;
                    continue;
                }

                $option_hyp_point = $sheet->getCell("B$find_string_set_row")->getValue();
                
                if($kk < count($options_result)){
                    array_push($option_hyps, array(
                            'option_hyp_point' => $option_hyp_point, 
                            'option_id' => $options_result[$kk]['option_id'] , 
                            'hyp_id' => $hyps_result[$key]['hyp_id']
                        )
                    );
                    $kk++;
                }
                else{
                    break;
                }
                

                $find_string_set_row++;
            }

            $db = db_connect();
            $builder = $db->table('option_hyp');
            if(!empty($option_hyps)){
                $builder->insertBatch($option_hyps); 
            }
       
            // end option_hyp

            /**
             * start getting advice_hyp from excel
             */

           

            $db = db_connect();
            $builder = $db->table('advices');
            $builder->select('*');
           
            $builder->orderBy('advices.advice_id', 'asc');
            $builder->where('advices.scope_id', $scope_id);

            $query = $builder->get();
            $advices_result = $query->getResultArray(); // advices newly added
            
            ///////////

            $db = db_connect();
            $builder = $db->table('hyps');
            $builder->select('*');
           
            $builder->orderBy('hyps.hyp_id', 'asc');
            $builder->where('hyps.scope_id', $scope_id);

            $query = $builder->get();
            $hyps_result = $query->getResultArray();

            $links = array();
            
            $m = 0;

            for($col = 2; $col <= $highestColumnIndex; $col++){
                $cell_value = $sheet->getCellByColumnAndRow($col,$first_row_having_advice)->getValue();
                
                if(strpos($cell_value, 'TARGET') === false){
                    continue;
                }
                else{
                   
                    $n = 0;
                    for ($row = $first_row_having_advice + 2 ; $row < $start_row_advice; $row++) { 
                    // $start_row_advice means last row of advices
                        $cell_value = $sheet->getCellByColumnAndRow($col,$row)->getValue();
                          
                        $hyp_target_level = $sheet->getCellByColumnAndRow($col, $row)->getFormattedValue();
                        $links[$m][$n] = $hyp_target_level;
                        $n++;
                    }

                    $m++;
                 
                }
               
            }

            $advice_hyps = array();

            for($i = 0; $i < count($hyps_result); $i++){
                
                for($j = 0; $j < count($advices_result); $j++){

                    $advice_hyp_record = array(
                        'advice_id' => $advices_result[$j]['advice_id'],
                        'hyp_id'    => $hyps_result[$i]['hyp_id'],
                        'hyp_power' => 100,
                        'hyp_target_level' => $links[$i][$j]
                    );

                    array_push($advice_hyps, $advice_hyp_record);

                }

            }

            $db = db_connect();
            $builder = $db->table('advice_hyp');
            if(!empty($advice_hyps)){
                $builder->insertBatch($advice_hyps); 
            }

            echo "Successfully imported!";
            return redirect()->to(base_url().'/thinkframe/excelimport');

        }
    }
    
} 