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
    
    public $verpass;
    
    public $email;
    
    public $validationErrors;
    
    private $validator;
    
    private $rightValues;
    
    public function validate(){
        $return = true;
        $this->rightValues = 
        Array(
                'match' =>  Array(
                                'name'  => Array(
                                              'type' => 'string',
                                              'options' => Array(
                                                    'format' => VALIDATE_NUM . VALIDATE_ALPHA,
                                                    'min_length' => 6,
                                                  )
                                          ),
                                'id'    => Array(
                                              'type' => 'number',
                                              'options' => Array(),
                                          ),
                                'email' => Array(
                                              'type' => 'email',
                                              'options' => Array(
                                                    'check_domain' => 'false',
                                                    'fullTLDValidation' => 'false',
                                                    'use_rfc822' => 'true',
                                                    'VALIDATE_GTLD_EMAILS' => 'true',
                                                    'VALIDATE_CCTLD_EMAILS' => 'true',
                                                    'VALIDATE_ITLD_EMAILS' => 'true',
                                                    ),
                                          ),
                                'pass'  => Array(
                                              'type' => 'string',
                                              'options' => Array(
                                                    'format' => VALIDATE_NUM . VALIDATE_ALPHA . VALIDATE_PUNCTUATION,
                                                    'min_length' => 6,
                                                  ),
                                          )
                                ),
            
                'notEmpty' =>Array('name','pass','email'),
            
                'equals' => Array(
                                  'pass' => $this->verpass,
                                ),
                );
        $this->validator = new validator($this->rightValues);
        
        foreach (Array('name','pass','email') as $key) {
            $return = ($return && $this->validator->validate($key, $this->$key));
        }
        
        if (!$return)
            $this->validationErrors = $this->validator->validationInfo;
        
        return $return;            
    }
    
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
