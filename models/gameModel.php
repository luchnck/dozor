<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Validate.php';

require_once 'objects/game.php';

require_once 'objects/team.php';

require_once 'objects/task.php';

require_once 'objects/tmpDataRecord.php';

require_once 'objects/challengeState.php';

/**
 * Description of gameModel
 *
 * @author Admin
 */
class gameModel extends model {
    
    public $id;
    
    public $game;
    
    public $team;
    
    public $task;
    
    public $tmpDataRecord;
    
    public $challengeState;
    
    
    /*
     *      Преобразуем this->game из id в полноценный объект
     */
    private function unpackGameReferers(){
        $game = $this->game;
        if (isset($game->taskslist)){
            $query = "SELECT * FROM `tasklists` WHERE `id` = $game->taskslist";
            $result = $this->dbConnection->query($query);
            if (isset($result)) {
                $row = $result->fetchall(PDO::FETCH_NAMED);
            }
            if (isset($row[0])){
                
    /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo 'unpackGameReferers()--><br>';
        echo 'query = ';
        var_dump($query);
        echo 'row = ';
        var_dump($row);
    $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
            
            $answer = $row[0];
            $game->taskslist = explode(",",$answer['tasklist']);;
            $result = null;
            $row = null;
            }
        }
        
        if (isset($game->teamslist)){
            $query = "SELECT * FROM `teamlists` WHERE `id` = $game->teamslist";
            $result = $this->dbConnection->query($query);
            if (isset($result)) {
                $row = $result->fetchall(PDO::FETCH_NAMED);
            }
            if (isset($row[0])){
    /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo 'unpackGameReferers()--><br>';
        echo 'query = ';
        var_dump($query);
        echo 'row = ';
        var_dump($row);
    $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
            
            $answer = $row[0];
            $game->teamslist = explode(",",$answer['teamlist']);
            $result = null;
            $row = null;
            }
        }
        
    }
    
    /*
     *      Преобразуем this->task из id в полноценный объект
     */
    private function unpackTaskReferers(){
        if (isset($this->task)){
            $query = "SELECT * FROM `tasks` WHERE `id` = $this->task";
            $result = $this->dbConnection->query($query);
            if (isset($result)) {
                $row = $result->fetchall(PDO::FETCH_NAMED);
            }
            if (isset($row[0])){
                
    /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo 'unpackTaskReferers()--><br>';
        echo 'query = ';
        var_dump($query);
        echo 'row = ';
        var_dump($row);
    $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
            
            $answer = $row[0];
            $this->task = $row[0];
            $result = null;
            $row = null;
            }
        }
                
    }
    
    public function validateTeam($teamId){
        $validator = new Validate();
        if ( $validator->string($teamId,Array('format' => VALIDATE_NUM)) ){
            if ($this->game->isTeamInGame($teamId)){
                $this->team = $teamId;
                return true;
            }
        }
        else 
            return false;
    }
    
    public function validateTask($taskId){
        $validator = new Validate();
        
        /*Debug*/
        if (defined('DEBUG')){
ob_start();
            echo 'validateTask()--><br>';
            echo '$taskId = ';
            var_dump($taskId);
        $GLOBALS["debugContent"].= ob_get_clean();}
        /*Debug end*/
        if ( ($validator->string($taskId,Array('format' => VALIDATE_NUM))&&(!empty($taskId))) ){
                $this->task = $taskId;
                return true;
        }
        else 
            return false;
    }
    
    public function gameIsRunning(){
        return $this->game->isRunning();
    }
    
    public function teamHasFinishGame(){
        return (!$this->tmpDataRecord->hasTasks());
    }
    
    public function loadGame(){
        $query = "SELECT * FROM `games` WHERE `id` = $this->id";
        $result = $this->dbConnection->query($query);
        if (isset($result)) {
            $row = $result->fetchall(PDO::FETCH_NAMED);
        }
        if (isset($row[0])){
            $this->game = new game();
            $this->game->loadData($row[0]);
            $this->unpackGameReferers();
        }
        
    /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo 'loadGame()--><br>';
        echo 'query = ';
        var_dump($query);
        echo 'row = ';
        var_dump($row);
        echo 'game = ';
        var_dump($this->game);        
    $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
    }

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
    
    /*
     *      Загружаем задание из сформированной таблицы tmpgamedata
     *      используем текущую игру, текущую команду
     *      в таблице содержится массив нужно взять первый элемент 
     */
    public function loadCurrentState(){
        $gameid = $this->game->id;
        $teamid = $this->team->id;
        $query = "SELECT * FROM `tmpgamedata` WHERE `gameid` = $gameid AND `teamid` = $teamid ";
        $result = $this->dbConnection->query($query);
        if (isset($result)) {
            $row = $result->fetchall(PDO::FETCH_NAMED);
        }
        if (isset($row[0])){
            $task = explode(",", $row[0]['taskserials'])[0];
                       
            if ($this->validateTask($task)){
                $this->unpackTaskReferers();
                /*после данной операции имеем массив в $this->task если успешно*/
                
                if (is_array($this->task)){
                    $task = $this->task;
                    $this->task = new task();
                    $this->task->loadData($task);                    
                }
            }
            
            $this->tmpDataRecord = new tmpDataRecord();
            $this->tmpDataRecord->loadData($row[0]);
        }
        
    /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo 'loadCurrentState()--><br>';
        echo 'query = ';
        var_dump($query);
        echo 'row = ';
        var_dump($row);
        $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
    }

    public function loadGameState(){
        /*Загрузить таблицу лидерства и отсортировать ее по возрастанию очков, добавить в таблицу индекс по timescore*/
        $gameid = $this->game->id;
        //$teamid = $this->team->id;
        $query =    "SELECT teamid,name,timescore,taskserials,checkpoint ".
                    "FROM tmpgamedata AS t1, teams AS t2 ".
                    "WHERE (t1.gameid=$gameid) AND (t1.teamid=t2.id) ".
                    "ORDER BY t1.timescore";
        $result = $this->dbConnection->query($query);
        
        if (isset($result)) {
            $row = $result->fetchall(PDO::FETCH_NAMED);
        }
        
        if (isset($row[0])){
                
            $this->challengeState = new ChallengeState;
            $this->challengeState->loadData($row);
        }
        
    /*Debug*/
    if (defined('DEBUG')){
ob_start();
        echo 'loadGameState()--><br>';
        echo 'query = ';
        var_dump($query);
        echo 'row = ';
        var_dump($row);
    $GLOBALS["debugContent"].= ob_get_clean();}
    /*Debug end*/
        
}
    
    public function updatetmpdata(){
        $values = $this->tmpDataRecord->updateFieldsToString();
        $query = "UPDATE `tmpgamedata` SET ". $values ." WHERE `id` = ".$this->tmpDataRecord->id;
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
     *      возвращает true если значение id установлено
     *      false если параметр неверен
     */
    public function setGameId($id){
        $validator = new Validate;
        if ($validator->string($id,Array('format' => VALIDATE_NUM))&&(!empty($id))){
                $this->id = $id;
                return true;
        }
        return false;
    }
}
