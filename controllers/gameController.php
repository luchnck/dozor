<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gameController
 *
 * @author Admin
 */
class gameController extends controller {
   
    public $gameId;
    
    function __construct(){
       $this->name = "game";
       $this->gameId = 1;
    }
    
    function viewAction(){
        $model = $this->getModel();
        $this->model = $model;
        $auth = dispatcher::getModule('AuthorisationModule');
        //$auth = $model->returnAuthAdaptor();
        $model->id = $this->gameId;
        $model->loadGame();
        $params = dispatcher::getParams();
        
        $tpl = new Smarty;
        $tpl->debugging = false;
        $tpl->caching = false;
        //$tpl->cache_lifetime = 120;
        $this->view =& $tpl; 
        
        $auth->start();
        
        if ($auth->checkAuth()){
        //команда авторизована?    
            if ($model->gameIsRunning()){
            //игра активна?    
                if (isset($params['team'])&&($params['team']==$auth->getAuthData('userid'))){
                //команда задана и участвует в игре? если так загружаем команду и загружаем ее статус
                    if ($model->validateTeam($params['team'])){
                        $model->loadTeam();
                        $model->loadCurrentState();
                                                
                        if (empty($model->task))
                            dispatcher::redirect('game/finish/team/'.$model->team->id);
                        
                        $tpl->assign(dispatcher::renderModules());
                        $tpl->assign('task',$model->task);
                        $tpl->assign('teamid','team/'.$model->team->id);
                        $tpl->assign('mainTpl','gameMainPage.tpl');
                        $tpl->display('pageTemplate.tpl');

                        /*Debug*/
                        if (defined('DEBUG')){
                            ob_start();
                            echo 'gameController->viewAction()--><br>';
                            echo 'team is loaded = ';
                            var_dump($model->team);
                            echo 'session = ';
                            var_dump($_SESSION);
                            $GLOBALS["debugContent"].= ob_get_clean();
                        }
                        /*Debug end*/

                    }

                }
            }
            else {
                $params = Array(
                    'message' => 'Игра еще не начата, потерпи немного))',
                    );
                dispatcher::redirect("main/view/", $params);
            }
            
        }
        else 
            dispatcher::redirect ('main/view/');
             
        /*Debug*/
        if (defined('DEBUG')){
            ob_start();
            echo 'gameController->viewAction()--><br>';
            echo 'params = ';
            var_dump(dispatcher::getParams());
            $GLOBALS["debugContent"].= ob_get_clean();
        }
        /*Debug end*/
    
    exit;
    }

    /*
     *      1.Проверяем установлены ли нужные переменные
     *      2.Сверяем фразу с паролем из базы 
     *      3.Прибавляем время
     *      4.Уменьшаем очередь заданий 
     *      5.Иначе возвращаем ответ о неверном результате
     */
    function checkTaskAction(){
        $params = dispatcher::getParams();
        $model = $this->getModel();
        $this->model = $model;
        $model->id = $this->gameId;
        $model->loadGame();
        $auth = dispatcher::getModule('AuthorisationModule');
        //$auth = $model->returnAuthAdaptor();
        
        $auth->start();
        
        if ($auth->checkAuth()){
            
            if ($model->gameIsRunning()){
                
                if (isset($params['team'])&&($params['team']==$auth->getAuthData('userid'))){

                    if ($model->validateTeam($params['team'])){
                    //если команда учавствует в игре, загрузить команду, загрузить текущее состояние
                        $model->loadTeam();
                        $model->loadCurrentState();

                        if (array_key_exists('pass', $params)){
                        //если заполнен пароль для задания, 
                            if (!empty($model->task)){
                            //если задания не закончились, проверяем правильность введенного пароля
                                if ($model->task->checkSecret($params['pass'])){
                                    $model->tmpDataRecord->processTimeScore();
                                    $model->tmpDataRecord->decrementTask();
                                    $model->updatetmpdata();
                                }
                                dispatcher::redirect('game/view/team/'.$model->team->id);
                            } 
                            else dispatcher::redirect('/game/finish/team'.$model->team->id);    
                        }
                    }

                }
            }
                    
        }
        
        else
            dispatcher::redirect ('/main/view/');
        
    /*Debug*/
    if (defined('DEBUG')){
        ob_start();
        echo 'gameController->checkTaskAction()--><br>';
        echo 'params = ';
        var_dump(dispatcher::getParams());
        $GLOBALS["debugContent"].= ob_get_clean();
    }
    /*Debug end*/
        
    }

    /*
 *  не проверяем пароль, изменяем очередь и прибавляем штраф 
 */
    function cancelTaskAction(){
        $params = dispatcher::getParams();
        $model = $this->getModel();
        $this->model = $model;
        $model->id = $this->gameId;
        $model->loadGame();
        $auth = dispatcher::getModule('AuthorisationModule');
        //$auth = $model->returnAuthAdaptor();
        
        $auth->start();
        
        if ($auth->checkAuth()){
            
            if ($model->gameIsRunning()){
                //echo "we can play in this game";

                if (isset($params['team'])&&($params['team']==$auth->getAuthData('userid'))){

                    if ($model->validateTeam($params['team'])){

                        $model->loadTeam();
                        $model->loadCurrentState();

                        if (!empty($model->task)){
                            $model->tmpDataRecord->processTimeScore(DEFAULT_TIME_PENY);
                            $model->tmpDataRecord->decrementTask();
                            $model->updatetmpdata();
                            dispatcher::redirect('game/view/team/'.$model->team->id);
                        }
                        else
                            dispatcher::redirect('/game/finish');
                    }

                }
            }

            else
                echo "we dont can play the game";
        }
        else 
            dispatcher::redirect ('/main/view/');
   
        /*Debug*/
        if (defined('DEBUG')){
            ob_start();
            echo 'gameController->cancelTaskAction()--><br>';
            echo 'params = ';
            var_dump(dispatcher::getParams());
            $GLOBALS["debugContent"].= ob_get_clean();
        }
        /*Debug end*/
    }

    /*
     *      этот вид должен быть показан только участникам
     *      выдаст таблицу игры с содержанием
     *      \команда\количество очков\статус(в игре, закончила)
     */    
    function finishAction(){
        $model = $this->getModel();
        $this->model = $model;
        $model->id = $this->gameId;
        $model->loadGame();
        $params = dispatcher::getParams();
        $auth = dispatcher::getModule('AuthorisationModule');
        //$auth = $model->returnAuthAdaptor();
        
        $auth->start();
        
        if ($auth->checkAuth()){
            // игра в процессе
            if ($model->gameIsRunning()){

                // команда задана
                if (isset($params['team'])&&($params['team']==$auth->getAuthData('userid'))){

                    // команда учавствует в игре?
                    if ($model->validateTeam($params['team'])){
                        $model->loadTeam();
                        $model->loadCurrentState();

                        // команда закончила игру?
                        if (!$model->teamHasFinishGame())
                            dispatcher::redirect('game/view/team/'.$model->team->id);

                    }

                    else echo "You do not play in this game<br>";

                }

            }

            // игра закончена
            else {

                // команда задана 
                if (isset($params['team'])){

                    // команда учавствует в игре?
                    if ($model->validateTeam($params['team'])){
                        $model->loadTeam();

                    }
                }

            }
        
            $model->loadGameState();
            $tpl = new Smarty;
            $tpl->debugging = false;
            $tpl->caching = false;
            $this->view =& $tpl;
            
            $tpl->assign('challengeState',$model->challengeState);
            $tpl->assign('teamid',$auth->getAuthData('userid'));
            $tpl->assign(dispatcher::renderModules());
            $tpl->assign('mainTpl','gameFinishPage.tpl');
            $tpl->display('pageTemplate.tpl');
            
        /*
         *   Загружена таблица gamestate можно выдавать в вид                   
         */
        }
        
        else 
            
        dispatcher::redirect('/main/view/');
        /*Debug*/
        if (defined('DEBUG')){
                ob_start();
                echo 'gameController->finishAction()--><br>';
                echo 'params = ';
                var_dump(dispatcher::getParams());
                $GLOBALS["debugContent"].= ob_get_clean();
        }
        /*Debug end*/
    
    }
    
    /*
     *      Действие входа в игру
     *      если игра начата, команда заявлена, 
     *      то сохраняем данные в Auth->data и редиректимся на /game/view/team/
     *      иначе редирект на main/view c сообщением об ошибке
     */
    function goAction(){
        
        $model = $this->getModel();
        $this->model = $model;
        $params = dispatcher::getParams();
        $auth = dispatcher::getModule('AuthorisationModule');
        
        
        //установлен ли параметр номер игры?
        if  ( (!isset($params['game-num'])) || (!$model->setGameId($params['game-num'])) ){
            //попросить определиться с игрой
            dispatcher::redirect('main/view/');
            exit;
        }
        
        $model->loadGame();
        $auth->start();
        
        //пользователь задан?
        if ($auth->checkAuth()){
            //отправляем данные по id игры в сессию
            $auth->setAuthData('gameid', $model->id, true);
            dispatcher::redirect('game/view/team/'.$auth->getAuthData('userid'));
            exit;
        } else {
            //порекомендовать зарегистрироваться в системе
            dispatcher::redirect('main/view/');
            exit;
        }
        
        
        
        /*Debug*/
        if (defined('DEBUG')){
            ob_start();
            echo 'gameController->goAction()--><br>';
            echo 'params = ';
            var_dump(dispatcher::getParams());
            $GLOBALS["debugContent"].= ob_get_clean();
        }
        /*Debug end*/
    }
}