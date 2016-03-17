<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Auth.php';

/**
 * Description of gameController
 *
 * @author Admin
 */
class mainController extends controller {
    
    function __construct(){
        $this->name = 'main';
        //echo "<div>mainController created!</div>";
    }
    
    function viewAction(){
        $tpl = new Smarty;
        $tpl->debugging = false;
        $tpl->caching = false;
        //$tpl->cache_lifetime = 120;
        $this->view =& $tpl; 
        
        $model = new mainModel();
        $model->getGames();
        $auth = dispatcher::getModule('AuthorisationModule');
        //$auth = $model->returnAuthAdaptor();
        $params = dispatcher::getParams();
        $auth->start();
        
        $tpl->assign('teamid',$auth->getAuthData('userid'));
        $tpl->assign('games',$model->games);
        $tpl->assign(dispatcher::renderModules());
        $tpl->assign('mainTpl','mainpage.tpl');
        $tpl->display('pageTemplate.tpl');
        
        /*Debug*/
                        if (defined('DEBUG')){
ob_start();
                            echo 'mainController->viewAction()--><br>';
                            echo 'session = ';
                            //session_start();
                            var_dump($_SESSION);
                        $GLOBALS["debugContent"].= ob_get_clean();}
        /*Debug end*/
        
        exit;
    }
    
    function authAction(){
        $model = new mainModel();
        $auth = dispatcher::getModule('AuthorisationModule');
        $params = dispatcher::getParams();
        
        if ((isset($params['username']))&&(isset($params['password']))){
            $auth->start();
            $auth->assignData();
            $auth->login($model->getTeam($params['username']));

                if ($auth->checkAuth()){
                    dispatcher::redirect ('game/view/team/'.$model->team->id);
                    exit;
                }
                dispatcher::redirect ('main/view/');
                exit;
                
        }
        else
            dispatcher::redirect ('main/view/');
            /* подключить модель с получением объекта из бд и сравнения с паролем*/
            /* заполнить переменную сессии team параметром teamId из базы если пароли совпадают*/
    }
    
    function logoutAction(){
        $model = new mainModel();
        $auth = dispatcher::getModule('AuthorisationModule');
        //$auth = $model->returnAuthAdaptor();
        $auth->start();
        $auth->logout();
        dispatcher::redirect ('main/view/');
    }
    
}
