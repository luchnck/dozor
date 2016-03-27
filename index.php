<?php
//define('DEBUG','TRUE');
if (defined('DEBUG')){
    $debugContent = ' ';
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//echo "loadded index.php";
require 'smarty-master/libs/Smarty.class.php';
require 'dispatcher.php';
//require 'HTTP/Session2.php';

//HTTP_Session2::useCookies(true);
//HTTP_Session2::start('SessionID', uniqid('MyID'));

$disp = new dispatcher();
$disp->initModules();
$disp->parseParams();
$disp->run();

if (defined('DEBUG'))
   echo "<div class='debug container panel panel-warning'><h1 class='text-center'>Debug section</h1>".$GLOBALS["debugContent"].'</div>';

/*
 *  интересная штука при двойном редиректе теряется hostname остается только относительный путь
 */