<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'game.php';
/**
 * Description of games
 *
 * @author Admin
 */
class games {
    
    public $arrayRecords;
    
    public function loadData($array){
        $this->arrayRecords = array();
                
        for ($index = 0; $index < count($array); $index++) {
            $this->arrayRecords[$index] = new game();
            $this->arrayRecords[$index]->loadData($array[$index]);
        }
        
         /*Debug*/
        if (defined('DEBUG')){
ob_start();
            echo 'games->loadData()--><br>';
            echo '$array = ';
            var_dump($array);
            echo 'this = ';
            var_dump($this);
        $GLOBALS["debugContent"].= ob_get_clean();}
        /*Debug end*/
    }
    //put your code here
}
