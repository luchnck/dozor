<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of team
 *
 * @author Admin
 */
class team {
    public $name;
    
    public $id;
    
    public $pass;
    
    public $email;
    
    public $validationErrors;
    
    private $validator;
    
    private $rightValues;
    
    public function loadData($array){
        foreach ($array as $key => $value){
            $this->$key = $value;
        }
    /*Debug*/
    if (defined('DEBUG')){
        ob_start();
        echo 'team->loadData()--><br>';
        echo 'this = ';
        var_dump($this);
        $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
    }
}
