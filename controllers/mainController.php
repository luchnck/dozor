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
        $notification = dispatcher::getModule('MessageModule');
        //$auth = $model->returnAuthAdaptor();
        $params = dispatcher::getParams();
        $auth->start();
        
        //$notification->message("За нас! чтоб все хорошо у нас было!!!");
        $tpl->assign('teamid',$auth->getAuthData('userid'));
        $tpl->assign('games',$model->games);
        $this->setDefaultViewVariables();
        $tpl->assign('mainTpl','mainpage.tpl');
        $tpl->display('pageTemplate.tpl');
        
        /*Debug*/
                        if (defined('DEBUG')){
                            ob_start();
                            echo 'mainController->viewAction()--><br>';
                            echo 'session = ';
                            //session_start();
                            var_dump($_SESSION);
                            $GLOBALS["debugContent"].= ob_get_clean();
                        }
        /*Debug end*/
        
        exit;
    }
    
    function authAction(){
        $model = new mainModel();
        $auth = dispatcher::getModule('AuthorisationModule');
        $params = dispatcher::getParams();
        $notification = dispatcher::getModule("MessageModule");
        
        if ((!isset($params['username']))&&(!isset($params['password']))){
            dispatcher::redirect ('main/view/');
            exit;
        }
        
        $auth->start();
        $auth->assignData();
        $auth->login($model->getTeam($params['username']));

        if ($auth->checkAuth()){
            $notification->message("Авторизация принята!");
            dispatcher::redirect ('profile/view/');
            exit;
        }
                $notification->message("Необходима авторизация!");
                dispatcher::redirect ('main/view/');
                exit;
               
            
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
