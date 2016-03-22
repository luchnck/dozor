<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registerModel
 *
 * @author Admin
 */
class registerModel extends model{
    
    private $validator;
    
    private $validValues;
    
    private $team;
    
    public function __construct() {
        parent::__construct();
        $this->validValues = Array(
            'name' => VALIDATE_NUM.VALIDATE_ALPHA,
            'email' => VALIDATE_ALL_EMAILS,
            'pass' => VALIDATE_NUM.VALIDATE_ALPHA.VALIDATE_PUNCTUATION,
            'verpass' => VALIDATE_NUM.VALIDATE_ALPHA.VALIDATE_PUNCTUATION,
        );
    }
    
    public function loadData($array){
        
        $this->team = new team();
        $details = '';
        
        foreach ($array as $key => $value){
            
            //если ключ пасс и существует верипасс то
            if ($key === 'pass') { 
                
                    if ( array_key_exists('verpass',$array) ){
                        
                        $loadPass = $this->loadPass($key,$value,$array['verpass']);
                        if (is_string($loadPass))
                            $details[$key] = $loadPass;
                        
                    //если не существует верипасс то
                    } else
                        $details[$key] = $this->validate($key,$value,'verpass');
            }
            
            if ($key === 'email'){
                if ( !($this->loadEmail($key, $value)) === True )
                         $details[$key] = "Неверно указана электронная почта";
                continue;
            }
                                                       
            if  (array_key_exists($key,$this->validValues)) 
                if ( ((!is_string($this->validate($key,$value))) && (!$this->validate($key,$value))) ){
                    
                    $this->team->loadData (Array($key => $value));
                } else 
                    $details[$key] = $this->validate($key,$value);
        }
    /*Debug*/
    if (defined('DEBUG')){
        ob_start();
        echo 'registerModel->loadData()--><br>';
        echo 'this = ';
        var_dump($this);
        $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
    
        if ($details === Array())
            return True;
        else 
            return $details;
    }
    
    /*
     *     Возвращает три типа значений 
     *      true - валидация прошла успешно
     *      false - элемент не требует проверки
     *      string - ошибка валидации, валидация не пройдена по причине return
     */
    public function validate($key,$value, $verify = null){
        
        if (empty($value))
            return "$key нужно заполнить";
        
        $validator = new Validate();
        if (!array_key_exists($key,$this->validValues))
            return false;
        
        if ( (!empty($verify))&&($value != $verify) )
            return "значение $key не совпадает с $verify";
        
        if ( $validator->string($value,Array('format' => $this->validValues[$key])) )
            return true;
        else 
            return "$key должен содержать только символы ".$this->validValues[$key];
    }
    
    public function loadPass($key,$value,$verify){
        $result = $this->validate($key,$value,$verify);
        
        //если пароли совпадают
        if ( (!is_string($result)) && (!$result) ){
            
            $isvalid = $this->validate($key,$value);
            // если строка соответствует требованиям
            if ( (!is_string($isvalid)) && (!$isvalid) ){
                                
                $this->team->loadData(Array($key,$value));
                return True;
                                
            // если строка не соответствует требованиям
            } else
                return $isvalid;
                            
        //если пароли не совпадают    
        } else
            return $result;
    }
    
    public function loadEmail($key,$value){
        
        $validator = new Validate();
        if ( $validator->email($value,Array($this->validValues[$key])) ){
            $this->team->loadData(Array($key => $value));
            return true;        
        }
        return false;
    }
    
    public function writeData(){
        if (!isset($team))
            return;
        $query = 'INSERT INTO '
                . '`teams` (`name`, `pass`, `email`) '
                . 'VALUES ("'.$this->team->name.'","'.md5($this->team->pass).'","'.$this->team->email.'");';
        $result = $this->dbConnection->query($query);
        
        /*Debug*/
    if (defined('DEBUG')){
        ob_start();
        echo " registerModel->writeData()-->query = $query";
        var_dump($result);
        $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
        
        if (isset($result))
                return TRUE;
            else
                return false;
    }
}
