<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adminController
 *
 * @author Admin
 */
class adminController extends controller {
    
    function __construct(){
        $this->name = 'admin';
    }
    
    function viewAction(){
        $tpl = new Smarty;
        $tpl->debugging = false;
        $tpl->caching = false;
        $this->view =& $tpl; 
        
        $this->setDefaultViewVariables();
        $tpl->assign('mainTpl','admin.tpl');
        $tpl->display('pageTemplate.tpl');
    }
    
    function resetTestDataAction(){
        
        $this->model = new adminModel();
        $this->model->resetTestData();
        dispatcher::redirect("main/view/");
        
    }
    
}
