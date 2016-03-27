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
    
    private $team;
    
    public function loadData($array){
        
        $this->team = new team();
        $details = '';
        
        $this->team->loadData($array);
        
        /* Проверка введенных данных на правильность*/
        if ($this->team->validate())
            return true;
        else
            return $this->team->validationErrors;
            
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
        if (!isset($this->team))
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
