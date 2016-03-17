<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'model.php';
require_once 'MDB2.php';
require_once 'objects/team.php';
require_once 'objects/games.php';

/**
 * Description of mainModel
 *
 * @author Admin
 */
class mainModel extends model {
        
    public $team;
    
    public $games;
    
    public function getTeam($teamName){
        $this->team = new team();
        $query = "SELECT * FROM `teams` WHERE `name` = \"$teamName\"";
        $result = $this->dbConnection->query($query);
        if (isset($result)) {
            $row = $result->fetchall(PDO::FETCH_NAMED);
        }
        if (isset($row[0])){
            /*Debug*/
            if (defined('DEBUG')){
ob_start();
                echo 'mainModel->getTeam()--><br>';
                echo 'query = ';
                var_dump($query);
                echo 'row = ';
                var_dump($row);
            $GLOBALS["debugContent"].= ob_get_clean();}
            /*Debug end*/
            
            $this->team->loadData($row[0]);
            
            /*Debug*/
            if (defined('DEBUG')){
ob_start();
                echo 'mainModel->getTeam()--><br>';
                echo 'team = ';
                var_dump($this->team);
            $GLOBALS["debugContent"].= ob_get_clean();}
            /*Debug end*/
            return $this->team->id;
        }
    }
    
    public function getGames(){
        $this->games = new games;
        $query = "SELECT t1.id,caption,start,teamlist FROM `games` as t1,`teamlists` as t2 WHERE (UNIX_TIMESTAMP(start) > UNIX_TIMESTAMP()) AND (t1.teamslist = t2.id)";
                    
        $result = $this->dbConnection->query($query);
        if (isset($result)) {
            $row = $result->fetchall(PDO::FETCH_NAMED);
        }
        if (isset($row[0])){
            /*Debug*/
            if (defined('DEBUG')){
ob_start();
                echo 'mainModel->getGames()--><br>';
                echo 'query = ';
                var_dump($query);
                echo 'row = ';
                var_dump($row);
            $GLOBALS["debugContent"].= ob_get_clean();}
            /*Debug end*/
            
            $this->games->loadData($row);
            
            /*Debug*/
            if (defined('DEBUG')){
ob_start();
                echo 'mainModel->getGames()--><br>';
                echo 'games = ';
                var_dump($this->games);
            $GLOBALS["debugContent"].= ob_get_clean();}
            /*Debug end*/
        }
    }
    
}
