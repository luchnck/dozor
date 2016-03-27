<?php
/* Smarty version 3.1.30-dev/44, created on 2016-03-27 15:28:39
  from "Z:\home\dozor\templates\register.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56f7c3e7f05375_42052765',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc4ef4988a7eb7f03c4e7474e93a502f8bda6790' => 
    array (
      0 => 'Z:\\home\\dozor\\templates\\register.tpl',
      1 => 1459077656,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f7c3e7f05375_42052765 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="jumbotron">
    <div class="container">
        <h1>Будем знакомы!</h1>
        Все поля обязательны для заполнения
    </div>
</div>
<div class="container">
    <form name="register-data" action="/register/go" method="POST">
      
      <div class="form-group">
        <label for="name">Логин</label>
        <input type="name" class="form-control" name="name" placeholder="Имя можно с цифрами">
      </div>  
        
      <div class="form-group">
        <label for="InputEmail">Email</label>
        <input type="email" class="form-control" name="email" placeholder="email@email.mail">
      </div>
      
      <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" class="form-control" name="pass" placeholder="Password">
      </div>
        
      <div class="form-group">
        <label for="verpassword">Пароль еще раз</label>
        <input type="password" class="form-control" name="verpass" placeholder="Password">
      </div>
        
      <input type="submit" value="Зарегистрироваться" class="btn btn-default">
      
    </form>
</div><?php }
}
