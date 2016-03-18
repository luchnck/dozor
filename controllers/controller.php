<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once $_SERVER["DOCUMENT_ROOT"]."/models/model.php";

$include_files = scandir($_SERVER["DOCUMENT_ROOT"]."/models");
foreach ($include_files as $value) {
    preg_match('/\.php$/', $value, $matches);
    if (isset($matches[0])){
        require_once $_SERVER["DOCUMENT_ROOT"]."/models/$value";
        if (defined('DEBUG')){
            ob_start();
            echo "<br> file $value are connected<br>";
            $GLOBALS["debugContent"] .= ob_get_clean();
        }
    }
}

/**
 * Description of controller
 *
 * @author Admin
 */
class controller {
    protected $name;
    
    public $model;
    public $view;
    
    public function getName(){
            return $this->name;
        }
        
    public function getModel(){
        if (!$this->model){
            $modelName = $this->name."Model";
            $this->model = new $modelName();
        }
        return $this->model;
    }
    
    public function setDefaultViewVariables(){
        
        $this->view->assign(dispatcher::renderModules());
        $this->view->assign(dispatcher::getParams());
    }
 }
