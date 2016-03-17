<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profileController
 *
 * @author Admin
 */
class profileController extends controller {
    
    function __construct(){
       $this->name = "profile";
    }
    
    public function viewAction(){
        $tpl = new Smarty;
        $tpl->debugging = false;
        $tpl->caching = false;
        $this->view =& $tpl;
        
        $model = $this->getModel();
        $this->model = $model;
        $auth = dispatcher::getModule('AuthorisationModule');
        //проверка авторизации команды
        $model->team = $auth->getAuthData('userid');
        $model->loadTeam();
        $model->loadGames();
        
        $tpl->assign(dispatcher::renderModules());
        
        $tpl->assign('games', $model->games);
        $tpl->assign('mainTpl','profile.tpl');
        $tpl->display('pageTemplate.tpl');
        
        /*
         *          Создать, Подключить шаблон инициализировать в нем $games
         */
    }
    
}
