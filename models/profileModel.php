<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'objects/games.php';
/**
 * Description of profileModel
 *
 * @author Admin
 */
class profileModel extends model{
    
    public $games;
    
    public $team;
    
    public function loadTeam(){
        $query = "SELECT * FROM `teams` WHERE `id` = $this->team";
        $result = $this->dbConnection->query($query);
        if (isset($result)) {
            $row = $result->fetchall(PDO::FETCH_NAMED);
        }
        if (isset($row[0])){
            $this->team = new team();
            $this->team->loadData($row[0]);
        }
        
        /*Debug*/
        if (defined('DEBUG')){
ob_start();
            echo 'loadTeam()--><br>';
            echo 'query = ';
            var_dump($query);
            echo 'row = ';
            var_dump($row);
            echo 'team = ';
            var_dump($this->team);        
        $GLOBALS["debugContent"].= ob_get_clean();}
        /*Debug end*/
    }
    
    public function loadGames(){
        $this->games = new games;
        $query = "SELECT * FROM `games`". 
                "WHERE ".
                    "(".
                        "(`teamslist` in (SELECT t1.id FROM `teamlists` as t1, `teams` as t2 WHERE t2.id in (t1.teamlist))) ".
                    "AND (".
                            "(UNIX_TIMESTAMP(`games`.start) > UNIX_TIMESTAMP())".
                        "OR ".
                            "(UNIX_TIMESTAMP(`games`.end) > UNIX_TIMESTAMP()) ".
                        ")".
                    ")".
                "ORDER BY `games`.start;";
                    
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
                echo 'profileModel->loadGames()--><br>';
                echo 'games = ';
                var_dump($this->games);
            $GLOBALS["debugContent"].= ob_get_clean();}
            /*Debug end*/
        }
    }
    
}
