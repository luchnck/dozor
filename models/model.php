<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'MDB2.php';
require_once 'Validate.php';
/**
 * Description of model
 *
 * @author Admin
 */
class model{
    
     protected $authAdaptor;
    
     protected $dbConnection;
     
     protected $mdb2Connector;
     
     function __construct(){
        $admin = 'root';
        $pass = '';
                
        try {
            $this->dbConnection = new PDO('mysql:host=localhost;dbname=dozor',$admin,$pass);
            $this->dbConnection->query('SET NAMES "utf8"');
        }
        catch (Exception $e){
            echo "Unable to connect: " . $e->getMessage() ."<p>";
        };
        
        $options = array(
                'dsn'           => 'mysql://root:@localhost/dozor',
                'table'         => 'teams',
                'usernamecol'   => 'name',
                'passwordcol'   => 'pass',            
            );
        $this->authAdaptor = new Auth('MDB2',$options, "", false);
            
     }
     
    public function returnAuthAdaptor(){
        return $this->authAdaptor;
    }
     
     public function returnDBConnector(){
         return $this->dbConnection;
     }
     
     public static function parseArray($queryFields = null){
        $return = Array(
                'fields' => '',
                'where' => '',
                'nums' => Array(),
        );
        if (is_array($queryFields)){
            foreach ($queryFields as $key => $value)
                    if (!is_numeric($key)){    
                        $return['fields'] .= "`".$key."`,";
                        $return['nums'][$key] = $value;
                    }
                    else
                        $return['fields'] .= "`".$value."`,";                    
            $return['fields'] = substr( $return['fields'], 0, -1);
        }
        else $return['fields'] = "*";
        
        if (!empty($return['nums'])){
            foreach ($return['nums'] as $key => $value)
                $return['where'] .= "`$key` = $value,";
            $return['where'] = " WHERE ".substr($return['where'], 0, -1).";";
                }
        else $return['where'] = ";";
        
        return $return;
     }
     
}
