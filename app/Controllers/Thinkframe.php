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

class Thinkframe extends BaseController
{
    public function __construct() {
       /* if(!session()->get('isLoggedIn')){
            header('location:/login');
            exit();
        }*/

       /* header('location:/questions');
        exit();*/
    }
	
    public function questions(){
        
        $scopeModel = model('App\Models\ScopeModel', false);
        $scopes = $scopeModel->findAll();

        $menu = view('thinkframe/menu');

        $data = array(
            'scopes' => $scopes,
            'menu'   => $menu,
        );

        return view('thinkframe/questions', $data);
    }
   
    public function hyps(){

        $scopeModel = model('App\Models\ScopeModel', false);
        $scopes = $scopeModel->findAll();

        $menu = view('thinkframe/menu');

        $data = array(
            'scopes' => $scopes,
            'menu'   => $menu,
        );
    
        return view('thinkframe/hyps', $data);
    }

    public function sumslider(){

        $scopeModel = model('App\Models\ScopeModel', false);
        $scopes = $scopeModel->findAll();

        $menu = view('thinkframe/menu');

        $data = array(
            'scopes' => $scopes,
            'menu'   => $menu,
        );
    
        return view('thinkframe/sumslider', $data);
    }

    public function combos(){

        $menu = view('thinkframe/menu');

        $scopeModel = model('App\Models\ScopeModel', false);
        $scopes = $scopeModel->findAll();

        $data = array(
            'scopes' => $scopes,
            'menu'   => $menu,
        );

        return view('thinkframe/combos', $data);
    }

    public function advices(){
        $menu = view('thinkframe/menu');

        $scopeModel = model('App\Models\ScopeModel', false);
        $scopes = $scopeModel->findAll();

        $data = array(
            'scopes' => $scopes,
            'menu'   => $menu,
        );

        return view('thinkframe/advices', $data);
    }

    public function scopes(){
        $menu = view('thinkframe/menu');
        return view('thinkframe/scopes', array('menu' => $menu));
    }

    public function quiz(){
        $inputhistoryModel = model('App\Models\InputhistoryModel', false);
        $inputs = $inputhistoryModel->orderBy('input_id', 'desc')->findAll();

        $menu = view('thinkframe/menu');
        return view('thinkframe/quiz',  array('menu' => $menu, 'inputs' => $inputs));
    }

    public function excelimport(){
        $menu = view('thinkframe/menu');
        return view('thinkframe/spreadsheet', array('menu' => $menu)); 
    }

	//--------------------------------------------------------------------

}
