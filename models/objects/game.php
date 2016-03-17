<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Date.php';
/**
 * Description of game
 *
 * @author Admin
 */
class game {
    
    public $id;
    
    public $caption;
    
    public $start;
    
    public $end;
    
    public $teamslist;
    
    public $taskslist;
    
    public function isRunning(){
    
    /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo 'game->isRunning()--><br>';
        echo 'start = ';
        var_dump($this->start);
        echo 'now = ';
        echo date("Y-m-d H:i:s");
    $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
        
        $now = new Date();
        if (($this->start->before($now)) 
                && ($this->end->after($now))) 
            return true;
        else 
            return false;
    }
    
    public function loadData($array){
        foreach ($array as $key => $value){
            if (($key == 'start')||($key == 'end'))
                $this->$key = new Date($value);
            else
                $this->$key = $value;
        }
    /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo 'game->loadData()--><br>';
        echo 'this = ';
        var_dump($this);
    $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
    }
    
    public function isTeamInGame($teamId){
        /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo 'game->isTeamInGame()--><br>';
        echo 'teamId = ';
        var_dump($teamId);
        echo "<br> ".in_array($teamId, $this->teamslist)."<br>";
    $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
        if (in_array($teamId, $this->teamslist))
                return true;
        return false;
    }
}
