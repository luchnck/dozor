<?php
/* Smarty version 3.1.30-dev/44, created on 2016-03-13 20:16:04
  from "I:\documents\projects\dozor\templates\auth.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56e59244487ab2_77285860',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd558de603ec9592bf4874e0588af1d7d0621f48e' => 
    array (
      0 => 'I:\\documents\\projects\\dozor\\templates\\auth.tpl',
      1 => 1457885752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e59244487ab2_77285860 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['loginform']->value == 1) {?>
    <form class="navbar-form navbar-right" role="form" action="/main/auth" method="POST">
            <div class="form-group">
              <input type="text" name="username" placeholder="Логин" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Пароль" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Войти</button>
    </form>
<?php } else { ?>
    <form class="navbar-form navbar-right" role="form" action="/main/logout/" method="POST">
            <div class="form-group">
              Профиль: 
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-lg btn-info"><?php echo $_smarty_tpl->tpl_vars['TeamName']->value;?>
</button>  
            </div>
            <button type="submit" class="btn btn-success">Выйти</button>
    </form>
<?php }
}
}
