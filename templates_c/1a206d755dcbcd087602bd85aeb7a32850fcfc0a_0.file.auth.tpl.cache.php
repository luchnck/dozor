<?php
/* Smarty version 3.1.30-dev/44, created on 2016-03-11 06:42:21
  from "D:\documents\projects\dozor\templates\auth.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56e25abd9e1855_86686338',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a206d755dcbcd087602bd85aeb7a32850fcfc0a' => 
    array (
      0 => 'D:\\documents\\projects\\dozor\\templates\\auth.tpl',
      1 => 1457674935,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e25abd9e1855_86686338 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '722056e25abd65dca1_19849756';
if ($_smarty_tpl->tpl_vars['loginform']->value == 1) {?>
    <div>
        <p>Authorisation</p>
            <form method="post" action="/main/auth">
                <input type="text" name="username">
                <input type="password" name="password">
                <input type="submit">
            </form> 
    </div>
<?php } else { ?>
    <div>
        <form method="post" action="/main/logout">
            <p>Control Panel</p>
            <p>Team - <?php echo $_smarty_tpl->tpl_vars['TeamName']->value;?>
</p>
            <input type="submit" name="logout">
        </form>
    </div>
<?php }
}
}
