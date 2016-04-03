<?php
/* Smarty version 3.1.30-dev/44, created on 2016-03-27 15:27:23
  from "Z:\home\dozor\templates\auth.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56f7c39b8d24d2_83099960',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be2c029da65c3808fad407c01a49973423694b11' => 
    array (
      0 => 'Z:\\home\\dozor\\templates\\auth.tpl',
      1 => 1458369804,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f7c39b8d24d2_83099960 (Smarty_Internal_Template $_smarty_tpl) {
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
                <div class="btn btn-sm btn-default">Профиль</div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-lg btn-info" onclick="document.location.href='/profile/view/'"><?php echo $_smarty_tpl->tpl_vars['TeamName']->value;?>
</button>  
            </div>
            <button type="submit" class="btn btn-success">Выйти</button>
    </form>
<?php }
}
}
