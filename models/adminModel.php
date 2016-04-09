<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adminModel
 *
 * @author Admin
 */
class adminModel extends model {
    
    function resetTestData(){
        
        $this->execSQL("\sqlBase\dozor.sql");
    }
    
    function execSQL($path_to_file){
        if(!defined('BASEPATH')){
            define('BASEPATH' , $_SERVER['DOCUMENT_ROOT']);
         }
         if(!defined('DS')){
            define('DS' , DIRECTORY_SEPARATOR);
         }

         $f_name =  BASEPATH.$path_to_file;

         $data_str = file_get_contents($f_name);

         $data = explode(';' , $data_str);

         foreach($data as $el){
            if($el == ''){
                continue;
            }
            $query = $this->dbConnection->exec( $el );
            $error = $this->dbConnection->errorInfo();
         }
    }
    
}
