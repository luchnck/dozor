<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Date.php';

/**
 * Description of tmpDataRecord
 *
 * @author Admin
 */
class tmpDataRecord {
    
    public $id;
    
    public $gameid;
    
    public $teamid;
    
    public $name;
    
    public $timescore;
    
    public $taskserials;
    
    public $checkpoint;
    
    public function loadData($array){
        foreach ($array as $key => $value){
            if ($key == 'checkpoint')
               $this->$key = new Date($value);
            else
                $this->$key = $value;
        }
    /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo 'tmpDataRecord->loadData()--><br>';
        echo 'this = ';
        var_dump($this);
    $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
    }
    
    /*
     *      Процессинг начисления времени
     *      $time_peny - штрафное время в минутах
     */
    public function processTimeScore($time_peny = null){
        $now = new Date();
        
        if ($time_peny){
            $peny = new Date($time_peny*60);
            $time_peny = $peny->getTime();
        }
        else
            $time_peny = 0;
        $old = $this->timescore;
        /*$time = $now->getTime();
        var_dump($time);
        $now = new Date($time);
        echo '$now from UTC';
        var_dump($now);*/
        $this->timescore += $now->getTime() - $this->checkpoint->getTime() + $time_peny;
        $this->checkpoint = $now;
        
    /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo 'tmpDataRecord->processTimeScore()--><br>';
        echo 'this timescore= ';
        var_dump($this->timescore);
        echo 'old timescore';
        var_dump($old);
        echo '$time_peny';
        var_dump($time_peny);
    $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
    }
    
    public function decrementTask(){
        $nextTask = explode(",",$this->taskserials);
        array_shift($nextTask);
        
        if (!empty($nextTask)){
            $this->taskserials = implode(',',$nextTask);
                
                /*Debug*/
                if (defined('DEBUG')){
ob_start();
                    echo 'tmpDataRecord->decrementTask()--><br>';
                    echo 'this = ';
                    var_dump($this->taskserials);
                $GLOBALS["debugContent"].= ob_get_clean();}
                /*Debug end*/
            
        }
        else $this->taskserials = "";
       
    }
    
    public function updateFieldsToString(){
            $result = Array();
        $i = 0;
        
        if (!empty($this->gameid))
             $result[$i++] = "`gameid` = $this->gameid";
        
        if (!empty($this->teamid))
             $result[$i++] = "`teamid` = $this->teamid";
        
        if (!empty($this->timescore))
             $result[$i++] = "`timescore` = $this->timescore";
        
        if (!empty($this->taskserials))
             $result[$i++] = '`taskserials` = "'.$this->taskserials.'"';
        else $result[$i++] = '`taskserials` = ""';
        
        if (!empty($this->checkpoint)){
             $checkpoint = $this->checkpoint->getDate();
             $result[$i++] = '`checkpoint` = "'.$checkpoint.'"';
        }
        $result = implode(",", $result);
    
    /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo '     tmpDataRecord->updateFieldsToString()--><br>';
        echo 'result = ';
        var_dump($result);
    $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
    
        return $result;
    }

    public function hasTasks(){
        return (!empty($this->taskserials));
    }
}
