<?php
/* Smarty version 3.1.30-dev/44, created on 2016-03-15 13:45:26
  from "D:\documents\projects\dozor\templates\auth.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56e803e6df67c4_00964827',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a206d755dcbcd087602bd85aeb7a32850fcfc0a' => 
    array (
      0 => 'D:\\documents\\projects\\dozor\\templates\\auth.tpl',
      1 => 1458045812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e803e6df67c4_00964827 (Smarty_Internal_Template $_smarty_tpl) {
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
