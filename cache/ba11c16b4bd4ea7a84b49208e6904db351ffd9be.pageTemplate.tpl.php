<?php
/* Smarty version 3.1.30-dev/44, created on 2016-03-11 07:04:29
  from "D:\documents\projects\dozor\templates\pageTemplate.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56e25feda06f55_61542486',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af0346bf142bbd2640cceb298745b27b32901ab2' => 
    array (
      0 => 'D:\\documents\\projects\\dozor\\templates\\pageTemplate.tpl',
      1 => 1457676252,
      2 => 'file',
    ),
    '386d61a20e6a335b84f04e379eff7798db384f16' => 
    array (
      0 => 'D:\\documents\\projects\\dozor\\templates\\header.tpl',
      1 => 1455805303,
      2 => 'file',
    ),
    'd115d4d94120a7c3ea59cce8f5099595c96de8e6' => 
    array (
      0 => 'D:\\documents\\projects\\dozor\\templates\\mainpage.tpl',
      1 => 1455805263,
      2 => 'file',
    ),
    '0168cd70adc7481168d7d98e1c87026dd5ff4150' => 
    array (
      0 => 'D:\\documents\\projects\\dozor\\templates\\footer.tpl',
      1 => 1455805262,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_56e25feda06f55_61542486 (Smarty_Internal_Template $_smarty_tpl) {
?>



<html>
    <head>
        <title>$title</title>
    </head>
    <body>


       <div>
        <p>Authorisation</p>
            <form method="post" action="/main/auth">
                <input type="text" name="username">
                <input type="password" name="password">
                <input type="submit">
            </form> 
    </div>

    


   

</body></html><?php }
}
