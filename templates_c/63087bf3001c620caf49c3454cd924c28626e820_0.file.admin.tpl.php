<?php
/* Smarty version 3.1.30-dev/44, created on 2016-04-08 23:47:14
  from "Z:\home\dozor\templates\admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_57080ac2501bd2_18257703',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63087bf3001c620caf49c3454cd924c28626e820' => 
    array (
      0 => 'Z:\\home\\dozor\\templates\\admin.tpl',
      1 => 1460143963,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57080ac2501bd2_18257703 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="jumbotron">
    <div class="container">
         <div class="col-md-2 col-xs-2 col-lg-2"></div>
         
        <div class="text-center col-md-8 col-xs-8 col-lg-8 panel"> 
        <h1 class="caption">Панель администратора</h1>
        <p>Сброс данных тестового приложения:</p>
        <form id="checkTask" method="post" action="/admin/resetTestData">
            <div class="container">сброс тестовых данных позволяет повторить тестовую игру с самого начала</div>
            <div class="form-group">
                <label for="pass"> Действительно сбросить данные?</label>
                <button class="btn-lg btn-success" type="submit" value="Решить" >Сбросить</button>
            </div>
        </form>
        </div>    
            
         <div class="col-md-2 col-xs-2 col-lg-2"></div>
    </div>
</div><?php }
}
