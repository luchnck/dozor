<?php

require_once 'Auth.php';
//require_once 'smarty-master/libs/Smarty.class.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AuthorisationModule extends Auth {
    
    private $model;
    
    private $template;
    
    function __construct() {
        $options = array(
                'dsn'           => 'mysql://root:@localhost/dozor',
                'table'         => 'teams',
                'usernamecol'   => 'name',
                'passwordcol'   => 'pass',            
            );
        parent::__construct('MDB2',$options, "", false);
        
        $this->template = new Smarty ();
        $this->template->debugging = false;
        $this->template->caching = false;
        $this->start();
        
        if ($this->checkAuth()){
            $this->template->assign('loginform', 0);            
            $this->template->assign('TeamName', $this->getUsername());            
        }
        else
            $this->template->assign ('loginform', 1);
            
    }
    
    function getHtmlData(){
        ob_start();
        
        $this->template->display('auth.tpl');
        
        $htmldata = ob_get_contents();
        
        ob_end_clean();
        
        return $htmldata;
    }
    
    function login($id = NULL){
        parent::login();
        if ($this->getUsername()){
            $this->setAuthData ('userid', $id, false);
            return true;
        }
        return false;
    }
}