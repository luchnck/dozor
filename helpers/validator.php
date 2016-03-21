<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Validate.php';
/**
 * Description of validator
 *
 * @author Администратор
 */
class validator {
    
    private $validate;
    
    //параметры совпадений по регулярному выражению
    private $match;
    
    //параметры совпадений по непустому значению
    private $notEmpty;
    
    //параметры совпадений по равенству значений
    private $equals;
    
    public $validationInfo;
    /*
     *      параметры сохраняем ввиде массива
     *          'match' => соответствие определенному типу
     *                      Array(
     *                             'name' => Array(
     *                                          'type' => 'date|email|string|uri|number',
     *                                          'options' => Array(specific options)
     *                                      )
     *                          )
     *          'notEmpty' => должен быть не пустой
     *                        Array(element1,element2,element3)
     *          'equals' => соответствует определенному значению
     *                      Array(
     *                              'element1' => 'EQelement1',
     *                              'element2' => 'EQelement2',
     *                          ),
     */
    
    public function __construct($parameters = Array()){
        $this->validate = new Validate();
        $validationInfo = '';
        
        foreach($parameters as $key => $value)
            $this->$key = $value;
    }
    
    
    /*
     *        принимается название значения и значение
     *        проверяем по всем трем параметрам
     *        возвращаем логический ответ 
     */
    public function validate($key,$value){
        $match = $this->checkMatch($key,$value);
        $empty = $this->checkNotEmpty($key,$value);
        $equals = $this->checkEquals($key,$value);
        return ($match&&$empty&&$equals);
    }
    
    private function checkMatch($key,$value){
        if (array_key_exists($key, $this->match)){
            $params = $this->match[$key];
            
            if ($this->validate->$params['type']($value, $params['options']))
                return true;
            else {
                $this->validationInfo .= "в $key используются символы не из ".$params['options']; 
                return false;
            }
        } else
            return true;
    }
    
    private function checkNotEmpty($key,$value){
        if (array_key_exists($key, $this->notEmpty)){
                        
            if (!empty($value))
                return true;
            else {
                $this->validationInfo .= "$key не должен быть пустым";
                return false;
            }
        } else
            return true;
    }
    
    private function equals($key,$value){
        if (array_key_exists($key, $this->equals)){
            $params = $this->equals[$key];
            
            if ($value === $params[$key])
                return true;
            else {
                $this->validationInfo .= "$key не совпадает с полем $params[$key]"; 
                return false;
            }
        } else
            return true;
    }
}
