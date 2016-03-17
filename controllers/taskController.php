<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of taskController
 *
 * @author Администратор
 */
class taskController extends controller{
    
    function __construct() {
        $this->name = "task";
        echo "taskController created!";
    }
    
/**
 * Нужно получить модель
 * корректно ее заполнить и вернуть в application 
 */
    function viewAction(){
        $this->model = $this->getModel();
    }
    
    function insertAction(){
        $this->model = $this->getModel();
        $this->testModelInsertDb();
    }
    
    function loadAction(){
        $this->model = $this->getModel();
        $this->testModelLoadDb();
    }
    
    function refreshAction(){
        $this->model = $this->getModel();
        $this->testModuleRefreshDb();
    }
    
    function testModelInsertDb(){
        $this->model->initTestData();
        $this->model->insertTask();
    }
    
    /*
     *      Вернет массив с элементами запрошенного объекта
     *      элемент запрашивается через поля объекта
     */
    function testModelLoadDb(){
        $model = $this->model;
        //$model->initTestData();
        $model->id = 3;
        $row = $this->model->loadTask();
        var_dump($row);
    }
    
    /*
     *      Обновтиь запись в таблице
     *      будет обновлена запись с model->id
     *      полями из model
     */
    function testModuleRefreshDb(){
        $model = $this->model;
        $model->id = 3;
        $model->title = "vasya test";
        $model->refreshTask();
        $model->title = '';
        $row = $this->model->loadTask();
        var_dump($row);
    }
    
}
