<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of taskModel
 *
 * @author Admin
 */
class taskModel extends model{
    
    public $id;
    
    public $title;
    
    public $details;
    
    public $opts;
    
    public $secret;
    
    public $queryFields;
    
    function __construct() {
        parent::__construct();
        $this->queryFields = '';
    }
    
    function insertTask(){
        $query = 
                'INSERT INTO '
                . '`tasks` (`title`, `details`, `opts`, `secret`) '
                . 'VALUES ("'.$this->title.'","'.$this->details.'","'.$this->opts.'","'.md5($this->secret).'");';
        $result = $this->dbConnection->query($query);    
    
    /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo " insertTask()-->query = $query";
        var_dump($result);
    $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
    
            if (isset($result))
                return TRUE;
            else
                return false;
    }
    
    /*
     *      Если $queryFields не иниц то выгрузятся все поля
     *      иначе только те, что перечислены через запятую
     */
    function loadTask(){
        $fields = $this->initQueryFields();
        $where = $this->whereFieldsToString();
        $query = "SELECT $fields FROM `tasks` WHERE $where";
            
    /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo 'loadTask($queryFields)--><br>';
        echo 'queryFields = ';
        var_dump($this->queryFields);
        echo 'query = ';
        var_dump($query);
    $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
        
        $result = $this->dbConnection->query($query);
        if (isset($result)) {
            $row = $result->fetchall(PDO::FETCH_NAMED);
        }
         if (isset($row[0]))
            return $row;
         return Array();
    }
    
    /*
     * 
     *      сформирует
     *      UPDATE `dozor`.`tasks` SET `field1` = 'value1', `field2` = 'value2' WHERE `tasks`.`id` = 1;
     */
    function refreshTask(){
        $values = $this->updateFieldsToString();
        $query = "UPDATE `tasks` SET ". $values ." WHERE `id` = ".$this->id;
        $result = $this->dbConnection->query($query);
        
    /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo 'refreshTask()--><br>';
        echo 'query = ';
        var_dump($query);
    $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/        
        
        if (isset($result))
                return TRUE;
        else
                return false;
        
    }
    
    /*
     *      Запрошенные поля должны быть в queryFields через запятую
     *      иначе будут запрошены все поля
     */
    function initQueryFields(){
    
    /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo ' initQueryFields()--><br>';
        echo 'queryFields = ';
        var_dump($this->queryFields);
    $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
    
        if (!empty($this->queryFields))
            return $this->queryFields;
        else return '*';
    }
    
    /*
     *      Инициализация полей для запроса where
     *      проверяются переменные, если переменная инициализирована
     *      она поподает в отбор для фильтрации запроса
     */
    function whereFieldsToString(){
        $result = Array();
        $i = 0;
        if (!empty($this->id))
             $result[$i++] = "`id` = $this->id";
        if (!empty($this->title))
             $result[$i++] = "`title` = '$this->title'";
        if (!empty($this->details))
             $result[$i++] = "`details` = `$this->details`";
        if (!empty($this->opts))
             $result[$i++] = "`opts` = `$this->opts`";
        if (!empty($this->secret))
             $result[$i++] = "`secret` = `$this->secret`";
        $result = implode(",", $result);
    
    /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo 'function whereFieldsToString()--><br>';
        echo 'result = ';
        var_dump($result);
    $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
    
        return $result;
    }

    function updateFieldsToString(){
        $result = Array();
        $i = 0;
        if (!empty($this->title))
             $result[$i++] = "`title` = '$this->title'";
        if (!empty($this->details))
             $result[$i++] = "`details` = `$this->details`";
        if (!empty($this->opts))
             $result[$i++] = "`opts` = `$this->opts`";
        if (!empty($this->secret))
             $result[$i++] = "`secret` = `$this->secret`";
        $result = implode(",", $result);
    
    /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo '     function updateFieldsToString()--><br>';
        echo 'result = ';
        var_dump($result);
    $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
    
        return $result;
    }   
    
    function initTestData(){
        $this->title = "test title";
        $this->details = "test details";
        $this->opts = "test opts";
        $this->secret = "test secret";
    }
    
}
