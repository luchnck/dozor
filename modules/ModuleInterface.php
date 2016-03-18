<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModuleInterface
 *
 * @author Администратор
 */
interface ModuleInterface {
    
    function getRelationModules();
    
    /*
     *      передаем список инициализированных модулей в виде массива, каждый модуль возьмет 
     *      только то, что ему нужно 
     */    
    function setRelationModules();
   
    function getHtmlData();
    
}
