<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registerController
 *
 * @author Admin
 */
class registerController extends Controller {
    
    function __construct(){
        $this->name = 'register';
    }
    
    public function viewAction(){
        
        $tpl = new Smarty;
        $tpl->debugging = false;
        $tpl->caching = false;
        $this->view =& $tpl; 
        
        $model = new registerModel();
        
        $auth = dispatcher::getModule('AuthorisationModule');
        $notification = dispatcher::getModule('MessageModule');
        
        if ($auth->checkAuth()){
            $notification->message("Вы уже зарегистрированы и вошли не надо жульничать!!");
            dispatcher::redirect('main/view');
            exit;
        }
        
              
        $this->setDefaultViewVariables();
        $tpl->assign('mainTpl','register.tpl');
        $tpl->display('pageTemplate.tpl');
                
    }
    
    public function goAction(){
        
        $this->model = new registerModel();
        $model = $this->model;
        $auth = dispatcher::getModule('AuthorisationModule');
        $notification = dispatcher::getModule('MessageModule');
        
        $result = $model->loadData(dispatcher::getParams());
        if (!is_bool($result)){
            if (is_array($result))
            $notification->message(implode("<br>",$result));
            dispatcher::redirect("register/view");
            exit;
        }
        
        if ($this->model->isTeamCreated()){
            $notification->message( "Такой пользователь уже существует!<br>"
                                    ."Обзовитесь по-другому!");
            dispatcher::redirect('register/view');
        }
            
        
        if (!$model->writeData()){
            $notification->message( "Проблемы при создании записи в базе!<br>"
                                    ."Свяжитесь с администратором сайта!");
            dispatcher::redirect('register/view');
        }
        
        /*Debug*/
                        if (defined('DEBUG')){
                            ob_start();
                            echo 'registerController->goAction()--><br>';
                            echo 'this->model = ';
                            //session_start();
                            var_dump($this->model);
                            $GLOBALS["debugContent"].= ob_get_clean();
                        }
        /*Debug end*/
                        
        $notification->message( "Регистрация выполнена успешно!<br>"
                                    ."Последний шаг - проверьте почту и перейдите по ссылке в письме<br>"
                                    ." Это активирует вашу запись, удачи!");
        dispatcher::redirect('main/view');
        exit;
    }
    
}
