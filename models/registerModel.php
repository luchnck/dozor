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
        );
    }
    
    public function loadData($array){
        
        $this->team = new team();
        $details = '';
        
        foreach ($array as $key => $value){
            
            //если ключ пасс и существует верипасс то
            if ($key === 'pass') { 
                
                    if ( array_key_exists('verpass',$array) ){
                        
                        if (! ($this->loadPass($key,$value,$array['verpass']) === True) )
                            $details[$key] = $this->loadPass($key,$value,$array['verpass']);
                        
                    //если не существует верипасс то
                    } else
                        $details[$key] = $this->validate($key,$value,'verpass');
            }
            
            if ($key === 'email'){
                if ( !($this->loadEmail($key, $value)) === True )
                         $details[$key] = "Неверно указана электронная почта";
            }
                                                       
            if ( (array_key_exists($key,$this->validValues)) && ($this->validate($key,$value) === True) )
                $this->team->loadData (Array($key => $value));
            else 
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
        
        $validator = new Validate();
        if (!array_key_exists($key,$this->validValues))
            return false;
        
        if (! (!empty($verify))&&($value === $verify) )
            return "значение $key не совпадает с $verify";
        
        if ( $validator->string($value,Array('format' => $this->validValues[$key])) )
            return true;
        else 
            return "$key должен содержать только символы ".$this->validValues[$key];
    }
    
    public function loadPass($key,$value,$verify){
        //если пароли совпадают
        if ($this->validate($key,$value,$verify) === True){
                            
            // если строка соответствует требованиям
            if ($this->validate($key,$value) === True){
                                
                $this->team->loadData(Array($key,$value));
                return True;
                                
            // если строка не соответствует требованиям
            } else
                return $this->validate($key,$value);
                            
        //если пароли не совпадают    
        } else
            return $this->validate($key,$value,$array['verpass']);
    }
    
    public function loadEmail($key,$value){
        
        $validator = new Validate();
        if ( $validator->email($value,Array($this->validValues[$key])) ){
            $this->team->loadData(Array($key => $value));
            return true;        
        }
        return false;
    }
    
}
