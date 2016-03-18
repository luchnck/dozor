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
        $this->parameters = $parameters;
    }
    
}
