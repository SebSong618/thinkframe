<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;


class Getdatainjson extends ResourceController {

	use ResponseTrait;

	public function save_input(){
		$post_data = json_decode(file_get_contents('php://input'));   
		$user_name = $post_data->user_name;
		$scope_slug = $post_data->scope_slug;
		$option_ids = $post_data->option_ids;

		date_default_timezone_set("Australia/Melbourne");

		$db = db_connect();
		$builder = $db->table('input');

		$query = $db->query("SELECT * FROM input WHERE input.user_name = '$user_name' AND input.scope_slug = '$scope_slug'");
  		$result = $query->getRow();


  		if(isset($result)){
  			$new_input = array(
  				'input_id'          => $result->input_id,
	            'option_ids'        => $option_ids,
	            'user_name'         => $user_name,
	            'scope_slug'        => $scope_slug,
	            'input_time'        => date('Y/m/d h:i:sa'),  
	        );

	        $builder->where('input_id', $result->input_id);
			$builder->update($new_input);

	  		echo json_encode($option_ids); // returns maximum input ID of input table

		    exit;
  		}
  		else{
  			$new_input = array(
	            'option_ids'        => $option_ids,
	            'user_name'         => $user_name,
	            'scope_slug'        => $scope_slug,
	            'input_time'        => date('Y/m/d h:i:sa'),  
	        );

	        $builder->insert($new_input);

	        $query = $db->query("SELECT * FROM input ORDER BY input_id DESC LIMIT 1");
	  		$rs = $query->getRow();
	        
	  		echo json_encode($rs->option_ids); // returns maximum input ID of input table

		    exit;
  		}
  		
	}

	public function save_hyp_result(){
		$post_data  = json_decode(file_get_contents('php://input'));   
		$user_name  = $post_data->user_name;
		$scope_slug = $post_data->scope_slug;

		$hyps       = $post_data->hyps;

		$db = db_connect();
		$builder = $db->table('calc_results');

		$query = $db->query("SELECT * FROM calc_results WHERE calc_results.user_name = '$user_name' AND calc_results.scope_slug = '$scope_slug' limit 1");
  		$result = $query->getRow();

  		if(isset($result)){
  			$new_result = array(
  				'result_id'          => $result->result_id,
	            'hyp_result'        => $hyps,
	            'user_name'         => $user_name,
	            'scope_slug'        => $scope_slug,
	        );

	        $builder->where('result_id', $result->result_id);
			$rs = $builder->update($new_result);

	  		echo json_encode($rs); // returns maximum input ID of input table

		    exit;
  		}
  		else{
  			$new_result = array(
	            'hyp_result'        => $hyps,
	            'user_name'         => $user_name,
	            'scope_slug'        => $scope_slug,
	        );

	        $rs = $builder->insert($new_result);
	      
	  		echo json_encode($rs); 

		    exit;
  		}

	}

	public function save_combo_result(){
		$post_data = json_decode(file_get_contents('php://input'));   
		$user_name = $post_data->user_name;
		$scope_slug = $post_data->scope_slug;

		$combos = $post_data->combos;
		$hyps   = $post_data->hyps;

		$db = db_connect();
		$builder = $db->table('calc_results');

		$query = $db->query("SELECT * FROM calc_results WHERE calc_results.user_name = '$user_name' AND calc_results.scope_slug = '$scope_slug'");
  		$result = $query->getRow();


  		if(isset($result)){
  			$update_result = array(
  				'result_id'          => $result->result_id,
	            'combo_result'        => $combos,
	            'hyp_result'         => $hyps,
	            'user_name'         => $user_name,
	            'scope_slug'        => $scope_slug,
	        );

	        $builder->where('result_id', $result->result_id);
			$rs = $builder->update($update_result);

	  		echo json_encode($rs); // returns maximum input ID of input table

		    exit;
  		}
  		else{
  			$new_result = array(
	            'combo_result'       => $combos,
	            'hyp_result'         => $hyps,
	            'user_name'         => $user_name,
	            'scope_slug'        => $scope_slug,
	        );

	        $rs = $builder->insert($new_result);
	      
	  		echo json_encode($rs); 

		    exit;
  		}

	}

	public function input_history(){
		$post_data = json_decode(file_get_contents('php://input'));   
		$user_name = $post_data->user_name;
		$scope_slug = $post_data->scope_slug;

		$db = db_connect();
		$builder = $db->table('input');

		$query = $db->query("SELECT * FROM input WHERE input.user_name = '$user_name' AND input.scope_slug = '$scope_slug'");
  		$input_history_result = $query->getRow();

  		//------------

  		$builder = $db->table('calc_results');

		$query = $db->query("SELECT * FROM calc_results WHERE calc_results.user_name = '$user_name' AND calc_results.scope_slug = '$scope_slug'");
  		$calc_history_result = $query->getRow();

  		$result = array(
  			'inputs'      => isset($input_history_result)? $input_history_result->option_ids : array(),
  			'calc_result' => isset($calc_history_result)? $calc_history_result->hyp_result : array(),
  			'calc_combo_result' => isset($calc_history_result)? $calc_history_result->combo_result : array()
  		);
  		
		echo json_encode($result); // returns maximum input ID of input table
	    exit;
		
	}

	public function allquestions(){

		$request = service('request');
		$post_data = $request->getPost();

		$db = db_connect();
		$builder = $db->table('options');
		$builder->select('q.*,options.option_id, options.option_content,  
							GROUP_CONCAT(h.hyp_id,":",h.hyp_content,":", oh.option_hyp_point,":", oh.option_hyp_id  SEPARATOR "&&&") AS hyp_with_point');

		$builder->join('option_hyp AS oh', 'oh.option_id = options.option_id','left');
		$builder->join('hyps AS h', 'oh.hyp_id = h.hyp_id','left');
		$builder->join('questions AS q', 'q.question_id = options.question_id','left');
		$builder->groupBy('options.option_id');
		$builder->orderBy('q.display_order', 'asc');

		$scope_id = null;
		if(isset($post_data['scope_id'])){
			$scope_id = $post_data['scope_id'];
			$builder->where('q.scope_id', $scope_id);
			$builder->where('h.scope_id', $scope_id);
		}

		$query = $builder->get();
		$result = $query->getResultArray();

		$builder = $db->table('hyps');
		$builder->select('hyps.*');
		if(isset($post_data['scope_id'])){
			$scope_id = $post_data['scope_id'];
			$builder->where('hyps.scope_id', $scope_id);
		}
		$query = $builder->get();
		$result_hyps = $query->getResultArray();

		$rs = array();
    	$rs['hyps'] = array();
    	array_push($rs['hyps'],$result_hyps);

    	// get all option_hyp 
    	$builder = $db->table('option_hyp');
		$builder->select('option_hyp.*');
		
		$query = $builder->get();
		$links = $query->getResultArray();

    	foreach($result as $key => $entry){
    		$questionId = $entry['question_id'];
    		if (!array_key_exists($questionId, $rs)) {
    			$rs[$questionId] = array();
    			$rs[$questionId]['question_id'] = $questionId;
    			$rs[$questionId]['options'] = array();
    		}	    		

    		$rs[$questionId]['question_content'] = $entry['question_content'];
    		$rs[$questionId]['scope_id'] = $entry['scope_id'];
    		$rs[$questionId]['options'][$entry['option_id']] = array('option_id' => $entry['option_id'], 'option_content'=>$entry['option_content'], 'option_hyp' => array());

    		$hyp_with_point = $entry['hyp_with_point'];

    		foreach($result_hyps as $key => $node){
    			array_push($rs[$questionId]['options'][$entry['option_id']]['option_hyp'], $node);
    		}

    		if($hyp_with_point != NULL){

    			$hyps = explode("&&&", $hyp_with_point);
    			
	    		foreach($hyps as $k => $hyp){
	    			
	    			$hyp_ids = array_map(function ($item) {
					  return $item['hyp_id'];
					}, $rs[$questionId]['options'][$entry['option_id']]['option_hyp']);

	    			$element = explode(":", $hyp);

	    			$link_id = isset($element[3])? $element[3] : "";
	    			$strength = null;
	    			foreach($links as $link){
	    				if($link['option_hyp_id'] == $link_id){
	    					$strength = $link['strength'];
	    					break;
	    				}
	    			}

	    			$option_hyp_element = array(
	    				'hyp_id'            => $element[0], 
	    				'hyp_content'       => $element[1], 
	    				'option_hyp_point'  => isset($element[2])? $element[2] : "", 
	    				'option_hyp_id'     => isset($element[3])? $element[3] : "",
	    				'scope_id'          => $scope_id,
	    				'strength'          => $strength
	    			);

	    			if (($key = array_search(intval($element[0]), $hyp_ids)) !== false) {
					    unset($rs[$questionId]['options'][$entry['option_id']]['option_hyp'][$key]);
	    				array_push($rs[$questionId]['options'][$entry['option_id']]['option_hyp'], $option_hyp_element);
					}
	    		}
    		}
    		
    	}

    	$builder = $db->table('questions');
    	$builder->select('*');
    	$builder->select('questions.question_id as question_id');

    	$builder->join('options', 'options.question_id = questions.question_id','left');
    	$builder->orderBy('questions.display_order', 'asc');
    	
    	if(isset($post_data['scope_id'])){
			$scope_id = $post_data['scope_id'];
			$builder->where('questions.scope_id', $scope_id);
		}

    	$query = $builder->get();
		$questions_with_zero_options = $query->getResultArray();

		foreach($questions_with_zero_options as $entry){
			$questionId = $entry['question_id'];
    		if (!array_key_exists($questionId, $rs)) {
    			$rs[$questionId] = array();
    			$rs[$questionId]['question_id'] = $questionId;
    			$rs[$questionId]['options'] = array();
    		}

    		$rs[$questionId]['question_content'] = $entry['question_content'];
    		$rs[$questionId]['scope_id'] = $entry['scope_id'];

		}

		$rs = array_values($rs);

		$first_element = $rs[0];
		array_shift($rs);

		// options of question sort_desc according to their option_id
		foreach ($rs as $key => $row)
		{
			$power = array();
		    foreach($row['options'] as $n => $node){
		    	$power[$n] = $node['option_id'];
		    }

		    array_multisort($power, SORT_DESC, $rs[$key]['options']);
		}

    	array_unshift($rs , $first_element);
    	
		echo json_encode($rs);
		exit;
	}

	public function allquestions_(){
		$request = service('request');
		$post_data = $request->getPost();
		
		$db = db_connect();
		$builder = $db->table('questions');
    	$builder->select('*');
    	$builder->select('questions.question_id as question_id');

    	$builder->join('options', 'options.question_id = questions.question_id','left');
    	
    	if(isset($post_data['scope_id'])){
			$scope_id = $post_data['scope_id'];
			$builder->where('questions.scope_id', $scope_id);
		}

    	$query = $builder->get();
		$questions = $query->getResultArray();
	    
	    $rs = array();

		foreach($questions as $entry){
			$questionId = $entry['question_id'];
    		if (!array_key_exists($questionId, $rs)) {
    			$rs[$questionId] = array();
    			$rs[$questionId]['question_id'] = $questionId;
    			$rs[$questionId]['options'] = array();
    		}

    		$rs[$questionId]['question_content'] = $entry['question_content'];
    		$rs[$questionId]['scope_id'] = $entry['scope_id'];
    		$rs[$questionId]['options'][$entry['option_id']] = array('option_content'=>$entry['option_content']);


		}
    	
    	$rs = array_values($rs);
		echo json_encode($rs);
		exit();
	}
	/**
	 * Save display oder of questions on quiz to questions table
	 */
	public function save_display_oder(){
		$request = service('request');
		$post_data = $request->getPost();

		if(isset($post_data['scope_id'])){
			$scope_id = $post_data['scope_id'];
		}
		
		$db = db_connect();
		$builder = $db->table('questions');

		$diplay_oders = json_decode($post_data['display_orders'],true);
		$rs = array();

		foreach($diplay_oders as $order){
			$data = [
				'display_order'  => $order['display_order'],
				'question_id' => $order['question_id'],
			];

			array_push($rs, $data);
		}
		
		$result = $builder->updateBatch($rs, 'question_id');
		echo json_encode($result);
		exit();

	}

	/**
	 * allhyps function returns all existing hyps on db. 
	 */
	public function allhyps(){

		$request = service('request');
		$post_data = $request->getPost();

		$db = db_connect();
		$builder = $db->table('hyps');
		$builder->select('*');
		$builder->select('hyps.scope_id as scope_id');
	
		$builder->join('option_hyp AS oh', 'oh.hyp_id = hyps.hyp_id','left');
		$builder->join('options', 'oh.option_id = options.option_id','left');
		$builder->join('questions AS q', 'q.question_id = options.question_id','left');
		$builder->orderBy('hyps.hyp_id','desc');

		if(isset($post_data['scope_id'])){
			$scope_id = $post_data['scope_id'];
			$builder->where('hyps.scope_id', $scope_id);
			$builder->where('q.scope_id', $scope_id);
		}

		$query = $builder->get();
		$result = $query->getResultArray();

		if(count($result) == 0){
			$builder = $db->table('hyps');
			$builder->select('*');
			$builder->select('hyps.scope_id as scope_id');

			if(isset($post_data['scope_id'])){
				$scope_id = $post_data['scope_id'];
				$builder->where('hyps.scope_id', $scope_id);
			}

			$query = $builder->get();
			$result = $query->getResultArray();

			$rs = array();
			foreach($result as $entry){
				$hypId = $entry['hyp_id'];
				if (!array_key_exists($hypId, $rs)) {
	    			$rs[$hypId] = array();
	    			$rs[$hypId]['hyp_id'] = $hypId;
	    			$rs[$hypId]['questions'] = array();
	    		}

	    		$rs[$hypId]['hyp_content'] = $entry['hyp_content'];
    			$rs[$hypId]['scope_id'] = $entry['scope_id'];
    			$rs[$hypId]['label_m_100'] = ($entry['label_m_100'] == NULL)? "" : $entry['label_m_100'];
    			$rs[$hypId]['label_m_50'] =  ($entry['label_m_50'] == NULL) ? "" : $entry['label_m_50'];
    			$rs[$hypId]['label_0'] = ($entry['label_0'] == NULL)? "" : $entry['label_0'];
    			$rs[$hypId]['label_p_50'] = ($entry['label_p_50'] == NULL) ? "" : $entry['label_p_50'];
    			$rs[$hypId]['label_p_100'] = ($entry['label_p_100'] == NULL) ? "" : $entry['label_p_100'];	
			}

			array_multisort( array_column($rs, "hyp_id"), SORT_DESC, $rs );
			echo json_encode(array_values($rs));
			exit();
		}

		$builder = $db->table('options');
		$builder->select('*');

		$builder->join('questions AS q', 'q.question_id = options.question_id','left');
		if(isset($post_data['scope_id'])){
			$scope_id = $post_data['scope_id'];
			$builder->where('q.scope_id', $scope_id);
		}

		$query = $builder->get();
		$options_result = $query->getResultArray();
		
		$rs = array();
    	
    	foreach($result as $entry){
    		$hypId = $entry['hyp_id'];
    		$questionId = $entry['question_id'];

    		if($questionId == null) continue;

    		if (!array_key_exists($hypId, $rs)) {
    			$rs[$hypId] = array();
    			$rs[$hypId]['hyp_id'] = $hypId;
    			$rs[$hypId]['questions'] = array();
    		}	    		

    		$rs[$hypId]['hyp_content'] = $entry['hyp_content'];
    		$rs[$hypId]['scope_id'] = $entry['scope_id'];
    		$rs[$hypId]['label_m_100'] = ($entry['label_m_100'] == NULL)? "" : $entry['label_m_100'];
			$rs[$hypId]['label_m_50'] =  ($entry['label_m_50'] == NULL) ? "" : $entry['label_m_50'];
			$rs[$hypId]['label_0'] = ($entry['label_0'] == NULL)? "" : $entry['label_0'];
			$rs[$hypId]['label_p_50'] = ($entry['label_p_50'] == NULL) ? "" : $entry['label_p_50'];
			$rs[$hypId]['label_p_100'] = ($entry['label_p_100'] == NULL) ? "" : $entry['label_p_100'];

    		if (!array_key_exists($questionId,$rs[$hypId]['questions'])) {
    			$rs[$hypId]['questions'][$questionId] = array('question_id'=>$questionId,'question_content'=>$entry['question_content'],'options'=>array());
    		}
    		$option = [
    			'option_id'=>$entry['option_id'], 
    			'option_hyp_point'=>$entry['option_hyp_point'], 
    			'option_hyp_id'=>$entry['option_hyp_id'], 
    			'option_content'=>$entry['option_content'],
    			'strength'     => $entry['strength']
    		];

    		$rs[$hypId]['questions'][$questionId]['options'][$entry['option_id']] = $option;
    		
    	}

    	$options_rs = array();
    	foreach($options_result as $entry){
    		$questionId = $entry['question_id'];

    		if (!array_key_exists($questionId, $options_rs)) {
    			$options_rs[$questionId] = array();
    			$options_rs[$questionId]['question_id'] = $questionId;
    			$options_rs[$questionId]['options'] = array();
    		}

    		$option = ['option_id'=>$entry['option_id'],'option_content'=>$entry['option_content']];
    		$options_rs[$questionId]['options'][$entry['option_id']] = $option;

    	}

    
   		foreach($rs as $r){
   		    $hypId = $r['hyp_id'];
   		    foreach($r['questions'] as $r_question){
   		    	$questionId = $r_question['question_id'];
   		    	foreach($options_rs as $entry){
   		    		
   		    		foreach($entry['options'] as $element){

   		    			if($questionId == $entry['question_id']){
	   		    			$option_ids_array = array();	
	   		    		
							$temp = $r_question['options'];

							foreach($temp as $node){
								array_push($option_ids_array,$node['option_id']);
							}
							
							if (!in_array(intval($element['option_id']), $option_ids_array)) {

								$option_hyp_id = rand(100001, 200000);

				    			$extra_option = [
				    				'option_id'=>$element['option_id'], 
				    				'option_hyp_point'=> null, 
				    				'option_hyp_id'=> $option_hyp_id, 
				    				'option_content'=>$element['option_content']
				    			];
				    		
				    			$rs[$hypId]['questions'][$questionId]['options'][$element['option_id']] = $extra_option;
				    		}
	   		    		}
   		    		}

	    		}
   		    }

      	}

      	foreach ($rs as $key => $row)
		{
			if(array_key_exists('questions', $row)){
				foreach($row['questions'] as $k => $question){
					$power = array();
					foreach($question['options'] as $n => $option){
						$power[$n] = $option['option_hyp_point'];
					}
			    	array_multisort($power, SORT_DESC, $rs[$key]['questions'][$k]['options']);
			    }
			}
			
		}

      	foreach ($rs as $key => $row)
		{
			$power = array();
			if(array_key_exists('questions', $row)){
			
			    foreach($row['questions'] as $n => $node){
			    	$power[$n] = $node['question_id'];
			    }

			    array_multisort($power, SORT_DESC, $rs[$key]['questions']);
			}
		}

    	$rs = array_values($rs);
		echo json_encode($rs);
		exit;
	}

	/**
	 * This function returns maximum primary key values for 
	 * 'questions',
  	 * 'options'
  	 * 'option_hyp',
  	 * 'hyps'
  	 * 
  	 * Why this function is needed? When creating new question or option etc, we should get maximum primary key values 
  	 * for each table.
	 */ 
	public function getMaxIds(){
		$db = db_connect();
		$builder = $db->table('questions');

		$builder->selectMax('question_id');
		$query = $builder->get();

		$result = $query->getResultArray();

		$question_last_id = intval($result[0]['question_id']);

  		$query = $db->query("SELECT options.option_id FROM options ORDER BY option_id DESC LIMIT 1");
  		$result = $query->getRow();

  		$option_last_id = ($result !== null)? intval($result->option_id) : 0 ;

  		$query_hyp = $db->query("SELECT option_hyp.option_hyp_id FROM option_hyp ORDER BY option_hyp_id DESC LIMIT 1");
  		$result_hyp = $query_hyp->getRow();

  		$option_hyp_last_id = ($result_hyp !== null) ? intval($result_hyp->option_hyp_id) : 0;

  		$query = $db->query("SELECT * FROM hyps ORDER BY hyp_id DESC LIMIT 1");
  		$result_hyp = $query->getRow();

		$hyp_last_id = ($result_hyp !== null) ? intval($result_hyp->hyp_id) : 0;  

		$query_option_hyp = $db->query("SELECT option_hyp.option_hyp_id FROM option_hyp");
		$result_ids_option_hyp = $query_option_hyp->getResultArray();

		$id_values = array();

		foreach ($result_ids_option_hyp as $key => $value) {
			// code...
			$id_values[$key] = intval($value['option_hyp_id']); 
		}

		$query = $db->query("SELECT * FROM advice_hyp ORDER BY advice_hyp_id DESC LIMIT 1");
  		$result = $query->getRow();
  		$advice_hyp_last_id = $result->advice_hyp_id; 

  		$last_ids = array(
  			'question_last_id' => $question_last_id,
  			'option_last_id'   => $option_last_id,
  			'option_hyp_last_id'      => $option_hyp_last_id,
  			'hyp_last_id'     => $hyp_last_id,
  			'option_hyp_ids'  => $id_values,
  			'advice_hyp_last_id' => $advice_hyp_last_id
  		);

  		echo json_encode($last_ids);
		exit;
	}

	function addquestion(){
		$request = service('request');
		
		$question_id = $request->getPost('question_id');
		$question_data = $request->getPost('question_content');
		$scope_id = $request->getPost('scope_id');

		$new_question = array(
            'question_id'         => $question_id,
            'question_content' => $question_data,
            'scope_id'         => $scope_id,
        );

        $db = db_connect();
        $builder = $db->table('questions');
        $builder->replace($new_question);

  		$query = $db->query("SELECT * FROM questions ORDER BY question_id DESC LIMIT 1");
  		$result = $query->getRow();
        
  		echo $result->question_id; // returns maximum question ID of questions table
  		exit;
		
	}

	function deletequestion(){
		$request = service('request');
		
		$question_id = $request->getPost('question_id');
		
		$db = db_connect();
        $builder = $db->table('questions');

        $builder->where('questions.question_id', $question_id);
        $builder->delete();

		$db = db_connect();
		$builder = $db->table('questions');

		$builder->selectMax('question_id');
		$query = $builder->get();

		$result = $query->getResultArray();

		$db = db_connect();

		$builder = $db->table('options');
		$builder->select('*');
		$builder->where('options.question_id', $question_id);

		$query = $builder->get();
		$rs = $query->getResultArray();

		foreach($rs as $option){
			$option_id = $option['option_id'];

			$builder = $db->table('option_hyp');
			$builder->where('option_hyp.option_id', $option_id);
			$builder->delete();
		}

		$builder = $db->table('options');
		$builder->where('options.question_id', $question_id);
		$builder->delete();

		$question_last_id = intval($result[0]['question_id']);
		echo $question_last_id;
		exit;
	}


	function addoption(){
		$request = service('request');
		
		$option_id   = $request->getPost('option_id');
		$question_id = $request->getPost('question_id');
		$option_data = $request->getPost('option_content');

		$new_option = array(
			'option_id'      => $option_id,
            'question_id'    => $question_id,
            'option_content' => $option_data,
        );

        $db = db_connect();
        $builder = $db->table('options');

        $builder->replace($new_option);

        $query = $db->query("SELECT * FROM options ORDER BY option_id DESC LIMIT 1");
        $result = $query->getRow();

        echo $result->option_id;
        exit;
	}

	function deleteoption(){
		$request = service('request');
		$option_id   = $request->getPost('option_id');

		$db = db_connect();

		$builder = $db->table('options');
		$builder->where('options.option_id', $option_id);
		$builder->delete();

		$builder = $db->table('option_hyp');
		$builder->where('option_hyp.option_id', $option_id);
		$builder->delete();		

		$query = $db->query("SELECT * FROM options ORDER BY option_id DESC LIMIT 1");
  		$result = $query->getRowArray();
        
  		echo json_encode($result);
  		exit;
	}

	/**
	 * 
	 */

	function add_empty_option_hyps(){
		$request = service('request');
		$post_data = $request->getPost();

		$new_option_id = $post_data['option_id'];
		$scope_id = $post_data['scope_id'];

		$db = db_connect();
        $query = $db->query("SELECT * FROM hyps WHERE scope_id = ".$scope_id);
  		$hyps = $query->getResultArray();

        $db = db_connect();
        $builder = $db->table('option_hyp');

        foreach($hyps as $hyp){
        	$data   = array(
	            'option_id'           => $new_option_id,
	            'hyp_id'              => $hyp['hyp_id'],
	            'option_hyp_point'    => -100,
	        ); 

	        $builder->insert($data);
        }

        $query = $db->query("SELECT * FROM option_hyp ORDER BY option_hyp_id DESC LIMIT 1");
  		$result = $query->getRowArray();
        
  		echo $result['option_hyp_id'];
  		exit;
	}

	function add_option_hyp(){
		$request = service('request');
		$post_data = $request->getPost();

        $db = db_connect();
        $builder = $db->table('option_hyp');

        if($post_data['option_hyp_id'] == ""){
        	$data   = array(
	            'option_hyp_point'    => ($post_data['option_hyp_point'] == "") ? null :  $post_data['option_hyp_point'],
	            'option_id'           => $post_data['option_id'],
	            'hyp_id'              => $post_data['hyp_id'],
	        ); 

	        $builder->insert($data);
        }
        else{
        	$data   = array(
	            'option_hyp_id'       => $post_data['option_hyp_id'],
	            'option_hyp_point'    => ($post_data['option_hyp_point'] == "") ? null :  $post_data['option_hyp_point'],
	            'option_id'           => $post_data['option_id'],
	            'hyp_id'              => $post_data['hyp_id'],
	        );
	        $builder->replace($data);
        }
        

  		$query = $db->query("SELECT * FROM option_hyp ORDER BY option_hyp_id DESC LIMIT 1");
  		$result = $query->getRow();
        
  		echo $result->option_hyp_id;
	}

	/**
     * label_m_100 update
     */

	function update_label_m_100(){
		$request = service('request');
		$post_data = $request->getPost();

        $db = db_connect();
        $builder = $db->table('hyps');

        $query = $db->query("SELECT * FROM hyps WHERE hyp_id = ".$post_data['hyp_id']);
        $rs = $query->getResultArray();
        if(count($rs) == 0){
        	echo json_encode(array());
        	exit();
        }
        
		$data = [
			'label_m_100' => $post_data['label_m_100'],
		];
		$builder->where('hyps.hyp_id', $post_data['hyp_id']);
		$result = $builder->update($data);	
		echo json_encode($result);
		exit();
	}

	/**
     * label_m_50 update
     */

	function update_label_m_50(){
		$request = service('request');
		$post_data = $request->getPost();

        $db = db_connect();
        $builder = $db->table('hyps');

        $query = $db->query("SELECT * FROM hyps WHERE hyp_id = ".$post_data['hyp_id']);
        $rs = $query->getResultArray();
        if(count($rs) == 0){
        	echo json_encode(array());
        	exit();
        }
        
		$data = [
			'label_m_50' => $post_data['label_m_50'],
		];
		$builder->where('hyps.hyp_id', $post_data['hyp_id']);
		$result = $builder->update($data);	
		echo json_encode($result);
		exit();
	}

	/**
     * label_0 update
     */

	function update_label_0(){
		$request = service('request');
		$post_data = $request->getPost();

        $db = db_connect();
        $builder = $db->table('hyps');

        $query = $db->query("SELECT * FROM hyps WHERE hyp_id = ".$post_data['hyp_id']);
        $rs = $query->getResultArray();
        if(count($rs) == 0){
        	echo json_encode(array());
        	exit();
        }
        
		$data = [
			'label_0' => $post_data['label_0'],
		];
		$builder->where('hyps.hyp_id', $post_data['hyp_id']);
		$result = $builder->update($data);	
		echo json_encode($result);
		exit();
	}

	/**
     * label_p_50 update
     */

	function update_label_p_50(){
		$request = service('request');
		$post_data = $request->getPost();

        $db = db_connect();
        $builder = $db->table('hyps');

        $query = $db->query("SELECT * FROM hyps WHERE hyp_id = ".$post_data['hyp_id']);
        $rs = $query->getResultArray();
        if(count($rs) == 0){
        	echo json_encode(array());
        	exit();
        }
        
		$data = [
			'label_p_50' => $post_data['label_p_50'],
		];
		$builder->where('hyps.hyp_id', $post_data['hyp_id']);
		$result = $builder->update($data);	
		echo json_encode($result);
		exit();
	}

	function update_label_p_100(){
		$request = service('request');
		$post_data = $request->getPost();

        $db = db_connect();
        $builder = $db->table('hyps');

        $query = $db->query("SELECT * FROM hyps WHERE hyp_id = ".$post_data['hyp_id']);
        $rs = $query->getResultArray();
        if(count($rs) == 0){
        	echo json_encode(array());
        	exit();
        }
        
		$data = [
			'label_p_100' => $post_data['label_p_100'],
		];
		$builder->where('hyps.hyp_id', $post_data['hyp_id']);
		$result = $builder->update($data);	
		echo json_encode($result);
		exit();
	}

	function update_strength(){
		$request = service('request');
		$post_data = $request->getPost();

        $db = db_connect();
        $builder = $db->table('option_hyp');

        $query = $db->query("SELECT * FROM option_hyp WHERE hyp_id = ".$post_data['hyp_id']);
        $rs = $query->getResultArray();
        if(count($rs) == 0){
        	echo json_encode(array());
        	exit();
        }
        
        if($post_data['strength'] == 1000){
        	$updated_field = [
				'strength' => $post_data['strength'],
				'option_hyp_point' => null
			];
        }
        else{
        	$updated_field = [
				'strength' => $post_data['strength'],
			];
        }
        
		$builder->where('option_hyp.option_hyp_id', $post_data['option_hyp_id']);
		$result = $builder->update($updated_field);	

		echo json_encode($result);
		exit();
	}



	function add_hyp(){
		$request = service('request');
		$post_data = $request->getPost();

		$data = array(
            'hyp_id'              => $post_data['hyp_id'],
			'hyp_content'         => $post_data['hyp_content'],
			'scope_id'            => $post_data['scope_id'],              
        );

        $db = db_connect();
        $builder = $db->table('hyps');
        $builder->replace($data);

		$query = $db->query("SELECT DISTINCT(advice_id) FROM advices WHERE scope_id = ".$post_data['scope_id']);
        $rs = $query->getResultArray();
        
        $records = array();
        foreach($rs as $key => $node){
        	$record = [
        		'hyp_id' => $post_data['hyp_id'],
        		'advice_id'=> $node['advice_id'],
        	];

        	array_push($records, $record);

        }
        $builder = $db->table('advice_hyp');
        if(!empty($records)){
        	$builder->insertBatch($records); 
        }
               

  		$query = $db->query("SELECT * FROM hyps ORDER BY hyp_id DESC LIMIT 1");
  		$result = $query->getRow();
        
  		echo $result->hyp_id;
  		exit();
	}

	/**
	 * create new hyp on advice page
	 */

	function add_hyp_advice(){
		$request = service('request');
		$post_data = $request->getPost();

		$data = array(
            'hyp_id'              => $post_data['hyp_id'],
			'hyp_content'         => $post_data['hyp_content'],
			'scope_id'            => $post_data['scope_id'],              
        );

        $db = db_connect();
        $builder = $db->table('hyps');
        $builder->replace($data);
		
       	$record = [
        		'hyp_id' => $post_data['hyp_id'],
        		'advice_id'=> $post_data['advice_id'],
        		'advice_hyp_id' => $post_data['advice_hyp_id'],
        	];

        $builder = $db->table('advice_hyp');
        $builder->insert($record);        

  		$query = $db->query("SELECT * FROM hyps ORDER BY hyp_id DESC LIMIT 1");
  		$result = $query->getRow();
        
  		echo $result->hyp_id;
  		exit();
	}

	function hyps(){
		$request = service('request');
		$post_data = $request->getPost();

		$db = db_connect();

        if(isset($post_data['scope_id'])){
        	$query = $db->query("SELECT * FROM hyps WHERE hyps.scope_id = ".$post_data['scope_id']);
        }
        else{
        	$query = $db->query("SELECT * FROM hyps");
        }

  		$result = $query->getResultArray();

  		echo json_encode($result);
  		exit;
	}

	public function set_zeros_on_blanks(){

		$request = service('request');
		$post_data = $request->getPost();

		$table_selection = $post_data['table_selection'];

		if($table_selection == "option_hyp"){
			$db = db_connect();
			$builder = $db->table('option_hyp');

			$option_hyps = json_decode($post_data['option_hyps'],true);

			$data = array();

			foreach($option_hyps as $oh){
				$node = [
					'option_hyp_id' => $oh['option_hyp_id'],
					'strength' => 1000
				];

				array_push($data, $node);
			}

			$result = $builder->updateBatch($data, 'option_hyp_id');	
			echo json_encode($result);
			exit();	
		}

		if($table_selection == 'powers'){
			$db = db_connect();
			$builder = $db->table('powers');

			$powers = json_decode($post_data['powers'], true);
			$data = array();
			foreach($powers as $power){
				$node = [
					'power' => 0,
					'power_id' => $power['power_id'],
					'hyp_id'   => $power['hyp_id'],
					'combo_id' => $power['combo_id']
				];

				array_push($data,$node);
			}
			
			$result = $builder->updateBatch($data, 'power_id');	
			echo json_encode($result);
			exit();
		}

		if($table_selection == 'advice_hyp_combo'){
			$db = db_connect();
			$builder = $db->table('advice_hyp');

			$updated_field = [
				'hyp_power' => 0,
			];

			$builder->where('advice_hyp.hyp_power',null);
			$builder->update($updated_field);
			//----------

			$builder = $db->table('combo_advice');
			$updated_field_combo = [
				'combo_power' => 0,
			];

			$builder->where('combo_advice.combo_power',null);
			$builder->update($updated_field_combo);

		}

			
		
	}

	/**
	 * This function is called whenever new hyp is created and hyp content is written. 
	 * 
	 */
	function add_links_pending(){
		$request = service('request');
		$post_data = $request->getPost();

		$links = $post_data['links'];
		$pending_links = json_decode($links,true);

		$db = db_connect();
        $builder = $db->table('option_hyp');

		foreach($pending_links as $link){

			$data   = array(
		        'option_hyp_id'       => $link['option_hyp_id'],
		        'option_id'           => $link['option_id'],
		        'hyp_id'              => $link['hyp_id'],
        	);
			// replace function does "insert" in case of new record, while does "update" in case of existing record
        	$builder->replace($data);
		}

  		$query = $db->query("SELECT * FROM option_hyp ORDER BY option_hyp_id DESC LIMIT 1");
  		$result = $query->getRow();
        
  		echo $result->option_hyp_id;
	}

	function add_powers_pending(){
		$request = service('request');
		$post_data = $request->getPost();

		$powers = $post_data['powers'];
		$pending_powers = json_decode($powers,true);

		$db = db_connect();
        $builder = $db->table('powers');

		foreach($pending_powers as $power){

			$data   = array(
		        'combo_id'           => $power['combo_id'],
		        'hyp_id'              => $power['hyp_id'],
		        'power_id'           => $power['power_id']
        	);
        	// replace function does "insert" in case of new record, while does "update" in case of existing record
        	$builder->insert($data);
		}

  		$query = $db->query("SELECT * FROM powers ORDER BY power_id DESC LIMIT 1");
  		$result = $query->getRow();
        
  		echo $result->power_id;
	}

	function delete_hyp(){
		$request = service('request');
		$post_data = $request->getPost();

		$hyp_id = $post_data['hyp_id'];

		$db = db_connect();
		$builder = $db->table('hyps');

		
		$builder->where('hyps.hyp_id', $hyp_id);
		$builder->delete();

		$builder = $db->table('powers');
		$builder->where('powers.hyp_id', $hyp_id);
		$builder->delete();
		
		$builder = $db->table('option_hyp');
		$builder->where('option_hyp.hyp_id', $hyp_id);
		$builder->delete();

		$builder = $db->table('advice_hyp');
		$builder->where('advice_hyp.hyp_id', $hyp_id);
		$builder->delete();

		$query = $db->query("SELECT * FROM hyps ORDER BY hyp_id DESC LIMIT 1");
  		$result = $query->getRowArray();
        
  		echo json_encode($result);
  		exit;
	}

	function combo_max_id(){
		$db = db_connect();
		$builder = $db->table('combos');

		$builder->selectMax('combo_id');
		$query = $builder->get();

		$result = $query->getResultArray();

		$combo_max_id = intval($result[0]['combo_id']);

		echo $combo_max_id;
		exit;
	}

	function add_combo(){
		$request = service('request');
		$post_data = $request->getPost();
		
		$data = array(
            'combo_id'           => $post_data['combo_id'],
			'combo_name'         => $post_data['combo_name'],
			'scope_id'           => $post_data['scope_id'],   
        );

        $db = db_connect();
        $builder = $db->table('combos');
        // replace function does "insert" in case of new record, while does "update" in case of existing record
        $builder->replace($data);

        $query = $db->query("SELECT DISTINCT(advice_id) FROM advices");
        $rs = $query->getResultArray();
        
        $records = array();
        foreach($rs as $key => $node){
        	$record = [
        		'combo_id' => $post_data['combo_id'],
        		'advice_id'=> $node['advice_id'],
        	];

        	array_push($records, $record);

        }
        $builder = $db->table('combo_advice');
        if(!empty($records)){
        	$builder->insertBatch($records);
        }

  		$query = $db->query("SELECT * FROM combos ORDER BY combo_id DESC LIMIT 1");
  		$result = $query->getRow();
        
  		echo $result->combo_id;
  		exit();
	}

	function add_power(){
		$request = service('request');
		$post_data = $request->getPost();


		$db = db_connect();
        $builder = $db->table('powers');
	
		$data = array(
            'combo_id'       => $post_data['combo_id'],
			'hyp_id'         => $post_data['hyp_id'],
			'power'          => ($post_data['power'] == "")? null : $post_data['power'],
			'power_id'       => $post_data['power_id']
        );
        // replace function does "insert" in case of new record, while does "update" in case of existing record
        $builder->replace($data);

  		$query = $db->query("SELECT * FROM powers ORDER BY power_id DESC LIMIT 1");
  		$result = $query->getRow();
        
  		echo $result->power_id;
	}

	function combos(){

		$request = service('request');
		$post_data = $request->getPost();

		$db = db_connect();
		$builder = $db->table('combos');
		$builder->select('*');
		$builder->select('combos.scope_id as scope_id, combos.combo_id as combo_id');

		$builder->join('powers AS p', 'p.combo_id = combos.combo_id','left');
		$builder->join('hyps AS h', 'h.hyp_id = p.hyp_id','left');
		$builder->orderBy('combos.combo_id','desc');

		if(isset($post_data['scope_id'])){
			$builder->where('combos.scope_id', $post_data['scope_id']);
		}

		$query = $builder->get();
		$result = $query->getResultArray();

		$rs = array();

		$builder = $db->table('hyps');
		$builder->select('*');
		
		if(isset($post_data['scope_id'])){
			$builder->where('hyps.scope_id', $post_data['scope_id']);
		}

		$query = $builder->get();
		$all_hyps = $query->getResultArray();

		foreach($result as $entry){
    		
    		$comboId = $entry['combo_id'];

    		if (!array_key_exists($comboId, $rs)) {
    			$rs[$comboId] = array();
    			$rs[$comboId]['combo_id'] = $comboId;
    			$rs[$comboId]['hyps'] = array();
    		}	    		

    		$rs[$comboId]['combo_name'] = $entry['combo_name'];
    		$rs[$comboId]['scope_id'] = $entry['scope_id'];

    		$hyp = [
    				'hyp_id'           => $entry['hyp_id'], 
    				'hyp_content'      => $entry['hyp_content'], 
    				'power'            => $entry['power'], 
    				'power_id'         => $entry['power_id']
    			];

    		if($entry['hyp_id'] != null){
    			array_push($rs[$comboId]['hyps'], $hyp);
    		}
    	}

    	foreach($rs as $entry){
    		$comboId = $entry['combo_id'];
    		$hyp_ids = array_map(function ($item) {
			  return $item['hyp_id'];
			}, $entry['hyps']);

			foreach($all_hyps as $node){
				if(!in_array($node['hyp_id'], $hyp_ids)){
					$power_id = rand(100001, 200000);
					$hyp = [
		    				'hyp_id'           => $node['hyp_id'], 
		    				'hyp_content'      => $node['hyp_content'], 
		    				'power'            => null, 
		    				'power_id'         => $power_id
		    			];
		    		array_unshift($rs[$comboId]['hyps'], $hyp);
				}
			}
    	}

    	foreach($rs as $entry){
    		$comboId = $entry['combo_id'];

    		foreach($rs[$comboId]['hyps'] as $key => $hyp){
    			if(($hyp['power'] == 0) && ($hyp['power'] != null)){
    				
    				$hyp_remove = [
		    				'hyp_id'           => $hyp['hyp_id'], 
		    				'hyp_content'      => $hyp['hyp_content'], 
		    				'power'            => 0, 
		    				'power_id'         => $hyp['power_id']
		    			];

		    	
					unset($rs[$comboId]['hyps'][$key]);
					array_push($rs[$comboId]['hyps'], $hyp_remove);
    			}
    		}
    	}

    	foreach ($rs as $key => $row){
			$powers = array();
			if(array_key_exists('hyps', $row)){
			
			    foreach($row['hyps'] as $n => $node){
			    	$powers[$n] = $node['power'];
			    }

			    array_multisort($powers, SORT_DESC, $rs[$key]['hyps']);
			}
		}

    	$rs = array_values($rs);
		echo json_encode($rs);
		exit;
	}

	function delete_combo(){
		$request = service('request');
		$post_data = $request->getPost();

		$combo_id = $post_data['combo_id'];

		$db = db_connect();
		$builder = $db->table('powers');

		// Since powers are related with combo by combo_id, powers with same combo_id are deleted from powers table.
		$builder->where('powers.combo_id', $combo_id);
		$builder->delete();

		$builder = $db->table('combos');
		$builder->where('combos.combo_id', $combo_id);
		$builder->delete();
		

		$builder = $db->table('combo_advice');
		$builder->where('combo_advice.combo_id', $combo_id);
		$builder->delete();

		$query = $db->query("SELECT * FROM combos ORDER BY combo_id DESC LIMIT 1");
  		$result = $query->getRowArray();
        
  		echo json_encode($result);
  		exit();
	}

	//-----------  Scope API ---------------

	public function scopes(){
		$db = db_connect();
		$builder = $db->table('scopes');
		$builder->select('*');

		$builder->orderBy('scopes.scope_id','desc');

		$query = $builder->get();
		$result = $query->getResultArray();
        
        $rs = array_values($result);
		echo json_encode($rs);
		exit;
	}

	function scope_max_id(){
		$db = db_connect();
		$builder = $db->table('scopes');

		$builder->selectMax('scope_id');
		$query = $builder->get();

		$result = $query->getResultArray();

		$scope_max_id = intval($result[0]['scope_id']);

		echo $scope_max_id;
		exit;
	}

	public function add_scope(){
		$request = service('request');
		$post_data = $request->getPost();


		$db = db_connect();
        $builder = $db->table('scopes');
	
		$data = array(
            'scope_id'       => $post_data['scope_id'],
            'scope_name'     => $post_data['scope_name'],
            'scope_slug'     => $post_data['scope_slug'],
            'quiz_link'      => $post_data['quiz_link']
        );
        // replace function does "insert" in case of new record, while does "update" in case of existing record
        $builder->replace($data);

  		$query = $db->query("SELECT * FROM scopes ORDER BY scope_id DESC LIMIT 1");
  		$result = $query->getRow();
        
  		echo $result->scope_id;
  		exit;
	}

	public function delete_scope(){
		$request = service('request');
		$post_data = $request->getPost();

		$scope_id = $post_data['scope_id'];

		$db = db_connect();
		$builder = $db->table('scopes');

		// Since powers are related with combo by combo_id, powers with same combo_id are deleted from powers table.
		$builder->where('scopes.scope_id', $scope_id);
		$builder->delete();

		$query = $db->query("SELECT * FROM scopes ORDER BY scope_id DESC LIMIT 1");
  		$result = $query->getRowArray();
        
  		echo json_encode($result);
  		exit;
	}

	//--------------------

	function advice_max_id(){
		$db = db_connect();
		$builder = $db->table('advices');

		$builder->selectMax('advice_id');
		$query = $builder->get();

		$result = $query->getResultArray();

		$advice_max_id = intval($result[0]['advice_id']);

		echo $advice_max_id;
		exit;
	}

	function combo_advice_max_id(){
		$db = db_connect();
		$builder = $db->table('combo_advice');

		$builder->selectMax('combo_advice_id');
		$query = $builder->get();

		$result = $query->getResultArray();

		$combo_advice_max_id = intval($result[0]['combo_advice_id']);

		echo $combo_advice_max_id;
		exit;
	}

	public function add_advice(){
		$request = service('request');
		$post_data = $request->getPost();


		$db = db_connect();
        $builder = $db->table('advices');
	
		$data = array(
            'advice_id'       => $post_data['advice_id'],
            'advice_content'     => $post_data['advice_content'],
            'scope_id'       => $post_data['scope_id'],
        );
        // replace function does "insert" in case of new record, while does "update" in case of existing record
        $builder->replace($data);

  		$query = $db->query("SELECT * FROM advices ORDER BY advice_id DESC LIMIT 1");
  		$result = $query->getRow();
        
  		echo $result->advice_id;
  		exit;
	}

	public function advices(){

		$request = service('request');
		$post_data = $request->getPost();

		$db = db_connect();
		$builder = $db->table('advices');

		$builder->select('*');
		$builder->select('advices.scope_id as scope_id');
		
		$builder->join('combo_advice AS ca', 'ca.advice_id = advices.advice_id','left');
		$builder->join('combos','combos.combo_id = ca.combo_id', 'left');
		
		$builder->orderBy('advices.advice_id','desc');

		if(isset($post_data['scope_id'])){
			$builder->where('advices.scope_id', $post_data['scope_id']);
			$builder->where('combos.scope_id', $post_data['scope_id']);
		}
		
		if(isset($post_data['scope_slug'])){
			$scope = $this->getScopeBySlug($post_data['scope_slug']);

			if(!$scope){
				echo json_encode(array());
				exit();
			}
			else{
				$scope_id = $scope['scope_id'];

				$builder->where('advices.scope_id', $scope_id);
				$builder->where('combos.scope_id', $scope_id);
			}
		}


		$query = $builder->get();
		$result = $query->getResultArray();

		$rs = array();
		
		foreach($result as $entry){
			$advice_id = $entry['advice_id'];
			
			if (!array_key_exists($advice_id, $rs)) {
    			$rs[$advice_id] = array();
    			$rs[$advice_id]['advice_id'] = $advice_id;
    			$rs[$advice_id]['combos'] = array();
    		}

    		$rs[$advice_id]['advice_content'] = $entry['advice_content'];
    		$rs[$advice_id]['scope_id']       = $entry['scope_id'];
    		$rs[$advice_id]['relevance']      = $entry['relevance'];

			$node = [
				'combo_id'           => $entry['combo_id'],
				'combo_name'         => $entry['combo_name'],
				'combo_power'        => $entry['combo_power'],
				'combo_target_level' => $entry['combo_target_level'],
				'combo_advice_id'    => $entry['combo_advice_id'],
				'power'              => $entry['combo_power'],
			];

			$rs[$advice_id]['combos'][$entry['combo_id']] = $node;

		}

		foreach ($rs as $key => $row)
		{
			$power = array();
			if(array_key_exists('combos', $row)){
			
			    foreach($row['combos'] as $n => $node){
			    	$power[$n] = $node['combo_power'];
			    }

			    array_multisort($power, SORT_DESC, $rs[$key]['combos']);
			}
		}

		//-------------

		$db = db_connect();
		$builder = $db->table('advices');

		$builder->select('*');
		$builder->select('advices.scope_id as scope_id');
		$builder->select('hyps.*');
		
		$builder->join('advice_hyp AS ah', 'ah.advice_id = advices.advice_id','left');
		$builder->join('hyps','hyps.hyp_id = ah.hyp_id', 'left');
		$builder->orderBy('advices.advice_id','desc');

		if(isset($post_data['scope_id'])){
			$builder->where('advices.scope_id', $post_data['scope_id']);
			$builder->where('hyps.scope_id', $post_data['scope_id']);
		}

		if(isset($post_data['scope_slug'])){
			$scope = $this->getScopeBySlug($post_data['scope_slug']);

			if(!$scope){
				echo json_encode(array());
				exit();
			}
			else{
				$scope_id = $scope['scope_id'];

				$builder->where('advices.scope_id', $scope_id);
				$builder->where('hyps.scope_id', $scope_id);
			}
		}

		$query = $builder->get();
		$result = $query->getResultArray();

		foreach($result as $entry){
			$advice_id = $entry['advice_id'];
			
			if (!array_key_exists($advice_id, $rs)) {
    			$rs[$advice_id] = array();
    			$rs[$advice_id]['advice_id'] = $advice_id;
    			$rs[$advice_id]['hyps'] = array();
    		}

    		$rs[$advice_id]['advice_content'] = $entry['advice_content'];
    		$rs[$advice_id]['scope_id']       = $entry['scope_id'];
    		$rs[$advice_id]['relevance']      = $entry['relevance'];

			$node = [
				'hyp_id'              => $entry['hyp_id'],
				'hyp_content'         => $entry['hyp_content'],
				'hyp_power'           => $entry['hyp_power'],
				'hyp_target_level'    => $entry['hyp_target_level'],
				'advice_hyp_id'       => $entry['advice_hyp_id'],
				'power'               => $entry['hyp_power'],
				'strength'            => $entry['strength'],
				'label_m_100'         => ($entry['label_m_100'] == NULL)? "" : $entry['label_m_100'],
    			'label_m_50'          =>  ($entry['label_m_50'] == NULL) ? "" : $entry['label_m_50'],
    			'label_0'             => ($entry['label_0'] == NULL)? "" : $entry['label_0'],
    			'label_p_50'          => ($entry['label_p_50'] == NULL) ? "" : $entry['label_p_50'],
    			'label_p_100'         => ($entry['label_p_100'] == NULL) ? "" : $entry['label_p_100']
			];

			$rs[$advice_id]['hyps'][$entry['hyp_id']] = $node;

		}

		foreach ($rs as $key => $row)
		{
			$power = array();
		    foreach($row['hyps'] as $n => $node){
		    	$power[$n] = $node['hyp_power'];
		    }

		    array_multisort($power, SORT_DESC, $rs[$key]['hyps']);
		}

		foreach($rs as $k => $row){
			$rs[$k]['list'] = array();
			if(array_key_exists('combos', $row)){
				foreach($row['combos'] as $combo){
					array_push($rs[$k]['list'], $combo);
				}
			}
			foreach($row['hyps'] as $hyp){
				array_push($rs[$k]['list'], $hyp);
			}
		}

		foreach ($rs as $key => $row)
		{
			$power = array();
		    foreach($row['list'] as $n => $node){
		    	$power[$n] = $node['power'];
		    }

		    array_multisort($power, SORT_DESC, $rs[$key]['list']);
		}



		echo json_encode(array_values($rs));
		exit;
	}

	public function advices_frontend($scope_slug){

		$scope = $this->getScopeBySlug($scope_slug);
		
		if(!$scope){
			echo json_encode(array());
			exit();
		}

		$scope_id = $scope['scope_id'];

		$db = db_connect();
		$builder = $db->table('advices');

		$builder->select('*');
		$builder->select('advices.scope_id as scope_id');
		
		$builder->join('combo_advice AS ca', 'ca.advice_id = advices.advice_id','left');
		$builder->join('combos','combos.combo_id = ca.combo_id', 'left');
		
		$builder->orderBy('advices.advice_id','desc');

		
		$builder->where('advices.scope_id', $scope_id);
		$builder->where('combos.scope_id', $scope_id);
		

		$query = $builder->get();
		$result = $query->getResultArray();

		$rs = array();
		
		foreach($result as $entry){
			$advice_id = $entry['advice_id'];
			
			if (!array_key_exists($advice_id, $rs)) {
    			$rs[$advice_id] = array();
    			$rs[$advice_id]['advice_id'] = $advice_id;
    			$rs[$advice_id]['combos'] = array();
    		}

    		$rs[$advice_id]['advice_content'] = $entry['advice_content'];
    		$rs[$advice_id]['scope_id']       = $entry['scope_id'];
    		$rs[$advice_id]['relevance']      = $entry['relevance'];

			$node = [
				'combo_id'           => $entry['combo_id'],
				'combo_name'         => $entry['combo_name'],
				'combo_power'        => $entry['combo_power'],
				'combo_target_level' => $entry['combo_target_level'],
				'combo_advice_id'    => $entry['combo_advice_id'],
				'power'              => $entry['combo_power'],
			];

			$rs[$advice_id]['combos'][$entry['combo_id']] = $node;

		}

		foreach ($rs as $key => $row)
		{
			$power = array();
			if(array_key_exists('combos', $row)){
			
			    foreach($row['combos'] as $n => $node){
			    	$power[$n] = $node['combo_power'];
			    }

			    array_multisort($power, SORT_DESC, $rs[$key]['combos']);
			}
		}

		//-------------

		$db = db_connect();
		$builder = $db->table('advices');

		$builder->select('*');
		$builder->select('advices.scope_id as scope_id');
		
		$builder->join('advice_hyp AS ah', 'ah.advice_id = advices.advice_id','left');
		$builder->join('hyps','hyps.hyp_id = ah.hyp_id', 'left');
		$builder->orderBy('advices.advice_id','desc');

		
		$builder->where('advices.scope_id', $scope_id);
		$builder->where('hyps.scope_id', $scope_id);
		

		$query = $builder->get();
		$result = $query->getResultArray();

		foreach($result as $entry){
			$advice_id = $entry['advice_id'];
			
			if (!array_key_exists($advice_id, $rs)) {
    			$rs[$advice_id] = array();
    			$rs[$advice_id]['advice_id'] = $advice_id;
    			$rs[$advice_id]['hyps'] = array();
    		}

    		$rs[$advice_id]['advice_content'] = $entry['advice_content'];
    		$rs[$advice_id]['scope_id']       = $entry['scope_id'];
    		$rs[$advice_id]['relevance']      = $entry['relevance'];

			$node = [
				'hyp_id'              => $entry['hyp_id'],
				'hyp_content'         => $entry['hyp_content'],
				'hyp_power'           => $entry['hyp_power'],
				'hyp_target_level'    => $entry['hyp_target_level'],
				'advice_hyp_id'     => $entry['advice_hyp_id'],
				'power'             =>  $entry['hyp_power'],
				'strength'          => $entry['strength']
			];

			$rs[$advice_id]['hyps'][$entry['hyp_id']] = $node;

		}

		foreach ($rs as $key => $row)
		{
			$power = array();
		    foreach($row['hyps'] as $n => $node){
		    	$power[$n] = $node['hyp_power'];
		    }

		    array_multisort($power, SORT_DESC, $rs[$key]['hyps']);
		}
		

		foreach($rs as $k => $row){
			$rs[$k]['list'] = array();
			if(array_key_exists('combos', $row)){
				foreach($row['combos'] as $combo){
					array_push($rs[$k]['list'], $combo);
				}
			}
			foreach($row['hyps'] as $hyp){
				array_push($rs[$k]['list'], $hyp);
			}
		}

		foreach ($rs as $key => $row)
		{
			$power = array();
		    foreach($row['list'] as $n => $node){
		    	$power[$n] = $node['power'];
		    }

		    array_multisort($power, SORT_DESC, $rs[$key]['list']);
		}

		/*echo json_encode(array_values($rs));
		exit;*/
		return array_values($rs);

	}

	public function combos_hyps(){

		$request = service('request');
		$post_data = $request->getPost();

		$advice_id = $post_data['advice_id'];

		$db = db_connect();
		$builder = $db->table('combo_advice');
		$builder->select('*');
		$builder->select('combo_advice.combo_id as combo_id');

		$builder->join('combos', 'combos.combo_id = combo_advice.combo_id','left');
		$builder->where('combo_advice.advice_id = '.$advice_id);
		$builder->orderBy('combo_advice.combo_advice_id','desc');

		$query = $builder->get();
		$result_combos = $query->getResultArray();


		$builder = $db->table('advice_hyp');
		$builder->select('*');
		$builder->select('advice_hyp.hyp_id as hyp_id');

		$builder->join('hyps', 'hyps.hyp_id = advice_hyp.hyp_id','left');
		$builder->where('advice_hyp.advice_id = '.$advice_id);
		$query = $builder->get();
		$result_hyps = $query->getResultArray();

		$rs = array();
		$rs['combos'] = array();
		$rs['hyps']   = array();
		foreach($result_combos as $combo){
			$node = [
				'combo_id'   => $combo['combo_id'],
                'combo_name' => $combo['combo_name'],
                'scope_id'   =>  $combo['scope_id'],
                'combo_advice_id' => $combo['combo_advice_id'],
			];

			array_push($rs['combos'], $node);
		}

		foreach($result_hyps as $hyp){
			$node = [
				'hyp_id'     => $hyp['hyp_id'],
                'hyp_content' => $hyp['hyp_content'],
                'scope_id'   =>  $hyp['scope_id'],
                'advice_hyp_id' => $hyp['advice_hyp_id'],
                'label_m_100'  => $hyp['label_m_100'],
            	'label_m_50'  => $hyp['label_m_50'],
                'label_0'  => $hyp['label_0'],
                'label_p_50'  => $hyp['label_p_50'],
                'label_p_100'  => $hyp['label_p_100']
			];

			array_push($rs['hyps'], $node);
		}

		echo json_encode($rs);
		exit;
	}


	public function delete_advice(){
		$request = service('request');
		$post_data = $request->getPost();

		$advice_id = $post_data['advice_id'];

		$db = db_connect();
		$builder = $db->table('advices');

		// Since powers are related with combo by combo_id, powers with same combo_id are deleted from powers table.
		$builder->where('advices.advice_id', $advice_id);
		$builder->delete();

		$db = db_connect();
		$builder = $db->table('combo_advice');

		// Since powers are related with combo by combo_id, powers with same combo_id are deleted from powers table.
		$builder->where('combo_advice.advice_id', $advice_id);
		$builder->delete();

		$db = db_connect();
		$builder = $db->table('advice_hyp');

		// Since powers are related with combo by combo_id, powers with same combo_id are deleted from powers table.
		$builder->where('advice_hyp.advice_id', $advice_id);
		$builder->delete();

		$query = $db->query("SELECT * FROM advices ORDER BY advice_id DESC LIMIT 1");
  		$result = $query->getRowArray();
        
  		echo json_encode($result);
  		exit;
	}

	function update_advice_strength(){
		$request = service('request');
		$post_data = $request->getPost();

        $db = db_connect();
        $builder = $db->table('advice_hyp');

        $query = $db->query("SELECT * FROM advice_hyp WHERE advice_hyp_id = ".$post_data['advice_hyp_id']);
        $rs = $query->getResultArray();
        if(count($rs) == 0){
        	echo json_encode(array());
        	exit();
        }
        
        
        $updated_field = [
			'strength' => $post_data['strength'],
		];

		$builder->where('advice_hyp.advice_hyp_id', $post_data['advice_hyp_id']);
		$result = $builder->update($updated_field);	

		echo json_encode($result);
		exit();
	}

	public function add_combo_advice(){
		$request = service('request');
		$post_data = $request->getPost();


		$db = db_connect();
        $builder = $db->table('combo_advice');
	
		$data = array(
            'combo_id' =>  $post_data['combo_id'],
            'advice_id' => $post_data['advice_id'],
            'combo_power' => ($post_data['combo_power'] == "")? null : $post_data['combo_power'],
            'combo_advice_id' => $post_data['combo_advice_id'],
            'combo_target_level' => ($post_data['combo_target_level'] == "")? null : $post_data['combo_target_level'],
        );
        // replace function does "insert" in case of new record, while does "update" in case of existing record
        $builder->replace($data);

  		$query = $db->query("SELECT * FROM combo_advice ORDER BY combo_advice_id DESC LIMIT 1");
  		$result = $query->getRow();
        
  		echo $result->combo_advice_id;
  		exit;
	}

	public function add_advice_hyp(){
		$request = service('request');
		$post_data = $request->getPost();


		$db = db_connect();
        $builder = $db->table('advice_hyp');
	
		$data = array(
            'hyp_id' =>  $post_data['hyp_id'],
            'advice_id' => $post_data['advice_id'],
            'hyp_power' => ($post_data['hyp_power'] == "")? null : $post_data['hyp_power'],
            'advice_hyp_id' => $post_data['advice_hyp_id'],
            'hyp_target_level' => ($post_data['hyp_target_level'] == "")? null : $post_data['hyp_target_level'],
        );
        // replace function does "insert" in case of new record, while does "update" in case of existing record
        $builder->replace($data);

  		$query = $db->query("SELECT * FROM advice_hyp ORDER BY advice_hyp_id DESC LIMIT 1");
  		$result = $query->getRow();
        
  		echo $result->advice_hyp_id;
  		exit;
	}

	public function advice_combo_hyp(){
		$request = service('request');
		$post_data = $request->getPost();

		$advice_id = $post_data['advice_id'];

		$db = db_connect();
        $builder = $db->table('combos');

		$builder->select('*');
		$builder->orderBy('combos.combo_id','desc');

		if(isset($post_data['scope_id'])){
			$builder->where('combos.scope_id', $post_data['scope_id']);
		}

		$query = $builder->get();
		$combos = $query->getResultArray();

		$rs = array();
		$is_inserted_combos = false;
		foreach ($combos as $key => $combo) {
			// code...
			$data = [
				'combo_id'  => $combo['combo_id'],
				'advice_id' => $advice_id,
			];

			array_push($rs, $data);
		}

		if(count($rs) != 0){
			$builder = $db->table('combo_advice');
			$builder->insertBatch($rs);
			$is_inserted_combos = true;
		}

		//------------

		$db = db_connect();
        $builder = $db->table('hyps');

		$builder->select('*');
		$builder->orderBy('hyps.hyp_id','desc');

		if(isset($post_data['scope_id'])){
			$builder->where('hyps.scope_id', $post_data['scope_id']);
		}

		$query = $builder->get();
		$hyps = $query->getResultArray();

		$rs_hyp = array();
		$is_inserted_hyps = false;
		foreach ($hyps as $key => $hyp) {
			// code...
			$data = [
				'hyp_id'  => $hyp['hyp_id'],
				'advice_id' => $advice_id,
			];

			array_push($rs_hyp, $data);
		}

		if(count($rs_hyp) != 0){
			$builder = $db->table('advice_hyp');
			$builder->insertBatch($rs_hyp);
			$is_inserted_hyps = true;
		}
		
		$response =  $is_inserted_combos || $is_inserted_hyps;

		echo json_encode($response);
		exit;

	}


	/**
	 * This function updates option_hyp for normalization 100 operation.
	 */

	public function update_option_hyp(){
		$request = service('request');
		$post_data = $request->getPost();

		$normalization_array = $post_data['normalization_array'];

		$option_hyp_array = json_decode($normalization_array, true);
		
		$rs = array();

		foreach($option_hyp_array as $node){
			
			$data = [
				'option_hyp_id'  => $node['option_hyp_id'],
				'option_hyp_point' => $node['option_hyp_point'],
			];

			array_push($rs, $data);
		}

		$db = db_connect();
		$builder = $db->table('option_hyp');

		if(count($rs) > 0){
			$builder->updateBatch($rs, 'option_hyp_id');
			echo true;
			exit;
		}
		else{
			echo json_encode(array());
			exit();
		}
		
	}

	/**
	 * 
	 * 
	 */

	public function update_powers(){
		$request = service('request');
		$post_data = $request->getPost();

		$normalization_array = $post_data['normalization_array'];

		$powers_array = json_decode($normalization_array, true);
		
		$rs = array();

		$db = db_connect();
		$builder = $db->table('powers');

		foreach($powers_array as $node){
			
			$query = $db->query("select * from powers where powers.power_id = " . intval($node['power_id']));
			
			$data = [
				'power_id'  => intval($node['power_id']),
				'power' => $node['power'],
				'hyp_id' => intval($node['hyp_id']),
				'combo_id' => intval($node['combo_id'])
			];

			if($query->getNumRows() == 0){
				$builder->set($data);
				$builder->insert();
			}
			else{
				$builder->where('power_id', intval($node['power_id']));
				$builder->update($data);
			}
		
		}

		exit;
	}

	/**
	 * 
	 * 
	 */

	public function update_combo_hyp_powers(){
		$request = service('request');
		$post_data = $request->getPost();

		$normalization_array = $post_data['normalization_array'];

		$powers_array = json_decode($normalization_array, true);
		$rs = array();

		$combos = $powers_array['combos'];
		
		if(count($combos) != 0){
			foreach($combos as $combo){
				$data = [
					'combo_advice_id'  => $combo['combo_advice_id'],
					'combo_power' => $combo['combo_power'],
				];

				array_push($rs, $data);
			}

			$db = db_connect();
			$builder = $db->table('combo_advice');
			$builder->updateBatch($rs, 'combo_advice_id');
		}

		$rs1 = array();
		
		$hyps   = $powers_array['hyps'];

		if(count($hyps) == 0){
			echo json_encode(array());
			exit();
		}

		$db = db_connect();
		$builder = $db->table('advice_hyp');

		foreach($hyps as $hyp){

			$query = $db->query("select * from advice_hyp where advice_hyp.advice_hyp_id = " . intval($hyp['advice_hyp_id']));
		
			$data = [
				'advice_hyp_id'  => intval($hyp['advice_hyp_id']),
				'hyp_power' => intval($hyp['hyp_power']),
				'hyp_id'  => intval($hyp['hyp_id']),
				'hyp_target_level' => $hyp['hyp_target_level'],
				'advice_id' => intval($hyp['advice_id'])
			];

			if($query->getNumRows() == 0){
				$builder->set($data);
				$builder->insert();
			}
			else{
				$builder->where('advice_hyp_id', intval($hyp['advice_hyp_id']));
				$builder->update($data);
			}
		
		}

		exit;
	}

	public function update_relevance(){
		$request = service('request');
		$post_data = $request->getPost();

		$db = db_connect();
		$builder = $db->table('advices');

		$data = [
			'advice_id' => $post_data['advice_id'],
			'relevance' => $post_data['relevance']
		];

		$builder->where('advices.advice_id', $post_data['advice_id']);
		$result = $builder->update($data);

		echo json_encode($result);
		exit();

	}

	/**
	 * get scope by scope slug
	 */
	public function questions_scope_slug($scope_slug){
		$scope = $this->getScopeBySlug($scope_slug);
		
		if(!$scope){
			echo json_encode(array());
			exit();
		}

		$scope_id = $scope['scope_id'];

		$db = db_connect();
		$builder = $db->table('questions as q');
		$builder->select('*');
		
		$builder->join('options AS o', 'q.question_id = o.question_id','left');
		$builder->join('option_hyp AS oh', 'oh.option_id = o.option_id','left');
		$builder->join('hyps AS h', 'oh.hyp_id = h.hyp_id','left');

		$builder->orderBy('q.display_order', 'asc');
		$builder->orderBy('q.question_id', 'asc');

		$builder->where('q.scope_id', $scope_id);
		$builder->where('h.scope_id', $scope_id);

		$query = $builder->get();
		$result = $query->getResultArray();

		$rs = array();

		foreach($result as $entry){
    		$questionId = $entry['question_id'];
    		if (!array_key_exists($questionId, $rs)) {
    			$rs[$questionId] = array();
    			$rs[$questionId]['question_id'] = $questionId;
    			$rs[$questionId]['question_content'] = $entry['question_content'];
    			$rs[$questionId]['options'] = array();
    		}	    		

    		if (!isset($rs[$questionId]['options'][$entry['option_id']])) {
    			// code...
    			$rs[$questionId]['options'][$entry['option_id']] = array('option_id' => $entry['option_id'], 'option_content' => $entry['option_content'], 'hypothesis' => array());
    		}

    		$rs[$questionId]['options'][$entry['option_id']]['hypothesis'][$entry['hyp_id']] =  
    				[ 
    					'id' => $entry['hyp_id'], 
    					'point' => intval($entry['option_hyp_point']),
    					'strength' => $entry['strength']
    				];
    	}

    	echo json_encode(array_values($rs));
    	exit;
	}

	private function getScopeBySlug($scope_slug){
		$db = db_connect();
		$builder = $db->table('scopes');
		$builder->select('*');

		$builder->where('scopes.scope_slug', $scope_slug);
		$query = $builder->get();
		$result = $query->getResultArray();

		if(count($result) != 0){
			return $result[0];
		}
		else{
			return false;
		}

	}

	//-------------------

	public function questions_frontend(){
		$db = db_connect();
		$builder = $db->table('questions');
		$builder->select('*');

		$builder->join('options', 'options.question_id = questions.question_id','left');
		$builder->join('option_hyp', 'option_hyp.option_id = options.option_id','left');
		$builder->orderBy('questions.question_id');

		$query = $builder->get();
		$result = $query->getResultArray();

		$rs = array();
		foreach($result as $entry){
    		$questionId = $entry['question_id'];
    		if (!array_key_exists($questionId, $rs)) {
    			$rs[$questionId] = array();
    			$rs[$questionId]['options'] = array();
    		}	    		

    		$rs[$questionId]['title'] = $entry['question_content'];
    		$rs[$questionId]['options'][$entry['option_id']] = array('title'=>$entry['option_content'], 'hypothesis' => array());
    		array_push($rs[$questionId]['options'][$entry['option_id']]['hypothesis'], ['id'=>$entry['hyp_id'], 
    			'point'=>intval($entry['option_hyp_point'])]);
    	}

    	$rs = array_values($rs);
    	for($i=0; $i<count($rs); $i++) {
    		$rs[$i]["options"] = array_values($rs[$i]["options"]);
    	}

    	echo json_encode($rs);
    	exit;
	}

	public function hyps_frontend($scope_slug){

		$scope = $this->getScopeBySlug($scope_slug);

		if(!$scope){
			echo json_encode(array());
			exit();
		}

		$scope_id = $scope['scope_id'];

		$db = db_connect();

        $query = $db->query("SELECT * FROM hyps WHERE hyps.scope_id = " . $scope_id);
  		$result = $query->getResultArray();

  		$rs = array_values($result);
  		return $rs;
  		/*echo json_encode($rs);
  		exit;*/
	}

	

	public function combos_frontend($scope_slug){

		$scope = $this->getScopeBySlug($scope_slug);

		if(!$scope){
			echo json_encode(array());
			exit();
		}

		$scope_id = $scope['scope_id'];

		$db = db_connect();
		$builder = $db->table('combos');
		$builder->select('*');

		$builder->join('powers AS p', 'p.combo_id = combos.combo_id','left');
		$builder->join('hyps AS h', 'h.hyp_id = p.hyp_id','left');
		$builder->where('p.power is NOT NULL');
		$builder->where('combos.scope_id', $scope_id);

		$query = $builder->get();
		$result = $query->getResultArray();

		$rs = array();

		foreach($result as $entry){
    		
    		$comboId = $entry['combo_id'];

    		if (!array_key_exists($comboId, $rs)) {
    			$rs[$comboId] = array();
    			$rs[$comboId]['hyps'] = array();
    		}	    		

    		$rs[$comboId]['combo_name'] = $entry['combo_name'];
    		$rs[$comboId]['combo_id'] = $comboId;

    		$hyp = [
    				'hyp_id'           => $entry['hyp_id'], 
    				'hyp_content'      => $entry['hyp_content'], 
    				'power'            => $entry['power'], 
    				'power_id'         => $entry['power_id']
    			];
    		array_push($rs[$comboId]['hyps'], $hyp);

    	}

    	$rs = array_values($rs);
		echo json_encode($rs);
		exit;
	}


	function advice_hyps($scope_slug){
		$advices = $this->advices_frontend($scope_slug);
		$hyps = $this->hyps_frontend($scope_slug);

		$a_h = array(
			'advices' => $advices,
			'hyps'    => $hyps
		);

		echo json_encode($a_h);
		exit();
	}

}

?>