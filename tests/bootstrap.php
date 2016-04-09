<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @author Admin
 */
// TODO: check include path
ini_set('include_path', ini_get('include_path').PATH_SEPARATOR.'D:\xampp\php\pear'.PATH_SEPARATOR.'D:\xampp\php'.PATH_SEPARATOR.'z:\home\dozor');
$_SERVER['DOCUMENT_ROOT'] = "z:\home\dozor\\";


require_once 'controllers/controller.php';
require_once 'controllers/gameController.php';
require_once 'models/model.php';
require_once 'models/profileModel.php';
require_once 'models/gameModel.php';
require_once 'models/objects/team.php';
require_once 'Auth.php';
// put your code here
?>
