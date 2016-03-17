<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// необходимо для dispatcher->initController()
$include_files = scandir('controllers');
foreach ($include_files as $value) {
    preg_match('/php/', $value, $matches);
    if (isset($matches[0])){
        include_once "controllers/$value";
        if (defined('DEBUG')){
            ob_start();
            echo "<br> file $value are connected<br>";
            $GLOBALS["debugContent"] .= ob_get_clean();
        }
    }
}


// необходимо для dispatcher->initModules()
foreach (dispatcher::$defaults['modules'] as $key => $value)
    require_once "modules/".$value;

/*
 *  Конфигурация игры
 */

// Штрафное время в минутах
define('DEFAULT_TIME_PENY', 15);


// Время истечения сессии для команды в минутах
define('DEFAULT_TIME_EXPIRED', 60);

/**
 * Description of dispatcher
 *
 * @author Admin
 */
class dispatcher 
{
    /*
    установки по умолчанию содержат 
     * маршруты - соответствие маршрут - контроллер
     * действия - контроллер - действие по умолчанию
     *      */
    public
        static $defaults = 
            Array(
                'routes' => Array('main','profile','task','err404','game'),
                'actions' => Array(
                    'main' => Array('view','edit','delete','auth','logout'),
                    'profile' => Array('view'),
                    'err404' => Array('view'),
                    'task' => Array('view','insert','edit','delete','list','load','refresh'),
                    'game' => Array('view','checktask','canceltask','finish','go'),
                ),
                'defaultController' => 'main',
                'defaultActions' => Array(
                    'main' => 'view',
                    'err404' => 'view',
                    'task' => 'view',
                    'game' => 'view',
                    'profile' => 'view',
                    ),
                'modules' => Array(
                    'AuthorisationModule' => 'Authorisation/Authorisation.php',
                    ),
                );
        
    private $controller;
    
    private $action;
    
    private static $plugins;
    
    private static $params;
    
    private static $modules;
        
        /*
         *          Инит контроллера
         */
        
    public function initController($controllerName){
            $match = false;
            $routes = dispatcher::$defaults['routes'];
            foreach($routes as $value)
                if ($controllerName === $value) {$match = true; break;};
            if (!$match) 
                $controllerName = dispatcher::$defaults['defaultController'];
            $controllerName = $controllerName."Controller";
            $this->controller = new $controllerName();
        }
        
        /*
         *          Выбираем экшен или берем по умолчанию
         */
    public function initAction($actionName){
            $actions = dispatcher::$defaults['actions'][$this->controller->getName()];
            foreach ($actions as $value){
                if ( $value === $actionName) {
                    $this->action = $actionName;
                    return;
                }
            }
            $this->action = dispatcher::$defaults['defaultActions'][$this->controller->getName()];    
        }
    
        
        /*
         *          Инициализация модулей приложения 
         */    
    public function initModules(){
        $modules = dispatcher::$defaults['modules'];
        
        foreach ($modules as $key => $value)
            dispatcher::$modules[$key] = new $key();
        
        /*Debug*/
           if (defined('DEBUG')){
	 ob_start(); 
                echo 'dispatcher->initModules()--><br>';
                echo 'dispatcher::$modules = ';
                var_dump(dispatcher::$modules);
         $GLOBALS["debugContent"] .= ob_get_clean();
         }
        /*Debug end*/
    }
    
    
        /*
         *          Получение модуля по имени
         */
    public static function getModule($moduleName){
        $modules = dispatcher::$modules;
        if ((!empty($modules))&&(array_key_exists($moduleName, $modules)))
                return dispatcher::$modules[$moduleName];
        else 
                return false;
    }
    
    public static function renderModules(){
        $HTML_array = array();
        foreach (dispatcher::$modules as $key => $value){
            $HTML_array[$key] = $value->getHtmlData();
        }
        /*Debug*/
       if (defined('DEBUG')){
	 ob_start(); 
            echo 'dispatcher->renderModules()--><br>';
            var_dump($HTML_array);
         $GLOBALS["debugContent"] .= ob_get_clean();
        }
        /*Debug end*/
        return $HTML_array;
    }
    
    public function __construct(){
            $this->parseParams();
        }
       
    public function returnController(){
            return $this->controller;    
        }
        
    public static function redirect($url){
        header("location:/$url");
        /*Debug*/
       if (defined('DEBUG')){
	 ob_start(); 
            echo 'dispatcher->redirect()--><br>';
            echo 'redirecting to '.$url.'<br>';
        $GLOBALS["debugContent"] .= ob_get_clean();
}
        /*Debug end*/
        exit;
    }    
        
    public static function getParams(){
        return dispatcher::$params;
    }
    
    //private static function getParamsFromSession($currentParams){
        //$team = HTTP_Session2::get('team', null);
        //if ($team) 
        //    dispatcher::$params['team'] = $team;
        //else 
        //    dispatcher::$params['team'] = null;
    //}

    public function parseParams(){
            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            // Назначаем модуль и действие по умолчанию.
            $controller = dispatcher::$defaults['defaultController'];
            $action = dispatcher::$defaults['defaultActions'][$controller];
            // Массив параметров из URI запроса.
            $params = array();

            // Если запрошен любой URI, отличный от корня сайта.
            if ($_SERVER['REQUEST_URI'] != '/') {
                    try {
                            // Для того, что бы через виртуальные адреса можно было также передавать параметры
                            // через QUERY_STRING (т.е. через "знак вопроса" - ?param=value),
                            // необходимо получить компонент пути - path без QUERY_STRING.
                            // Данные, переданные через QUERY_STRING, также как и раньше будут содержаться в 
                            // суперглобальных массивах $_GET и $_REQUEST.
                            $url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

                            // Разбиваем виртуальный URL по символу "/"
                            $uri_parts = explode('/', trim($url_path, ' /'));

                            // Если количество частей не кратно 2, значит, в URL присутствует ошибка и такой URL
                            // обрабатывать не нужно - кидаем исключение, что бы назначить в блоке catch модуль и действие,
                            // отвечающие за показ 404 страницы.
                            if ((count($uri_parts) % 2)&&(count($uri_parts) > 2)) {
                                    throw new Exception();
                            }

                            $controller = array_shift($uri_parts); // Получили имя модуля
                            $action = array_shift($uri_parts); // Получили имя действия

                            // Получили в $params параметры запроса
                            for ($i=0; $i < count($uri_parts); $i++) {
                                    $params[$uri_parts[$i]] = $uri_parts[++$i];
                            }
                            
                            foreach ($_POST as $key => $value) {
                                $params[$key] = $_POST[$key];
                            }
                            
                            //$params = dispatcher::getParamsFromSession();
                            
                            // Получили в $params переменные сессии
                            
                    } catch (Exception $e) {
                            $controller = 'err404';
                            $action = 'view';
                    }
            };
            $this->initController($controller);
            $this->initAction($action);
            //dispatcher::getParamsFromSession($params);
            dispatcher::$params = $params;
            
    /*Debug*/
   if (defined('DEBUG')){
	 ob_start(); 
        echo 'dispatcher->parseParams()--><br>';
        echo '$params = ';
        var_dump($params);
    $GLOBALS["debugContent"] .= ob_get_clean();
}
    /*Debug end*/
        }
        
    public function run(){
        $action = $this->action."Action";
        $this->controller->$action();
    }
}

/*  TO DO!
 *  добавить авторизацию команд через переменные сессии
 *  строка 151
 */