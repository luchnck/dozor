<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of task
 *
 * @author Admin
 */
class task {
    
    public $id;
    
    public $title;
    
    public $details;
    
    public $opts;
    
    public $secret;
    
    public function checkSecret($phrase = null){
    /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo 'task->loadData()--><br>';
        echo '!strcmp($phrase, $secret) = ';
        echo !strcmp($phrase, $this->secret);
    $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
        if (isset($phrase))
            
            if (!strcmp($phrase, $this->secret)) return true;
        
        return false;
    }
    
    public function loadData($array){
        foreach ($array as $key => $value){
            $this->$key = $value;
        }
    /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo 'task->loadData()--><br>';
        echo 'this = ';
        var_dump($this);
    $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
    }
}
