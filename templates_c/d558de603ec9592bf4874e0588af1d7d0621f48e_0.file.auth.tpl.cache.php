<?php
/* Smarty version 3.1.30-dev/44, created on 2016-03-09 17:46:19
  from "I:\documents\projects\dozor\templates\auth.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56e0292b7bad96_65306906',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd558de603ec9592bf4874e0588af1d7d0621f48e' => 
    array (
      0 => 'I:\\documents\\projects\\dozor\\templates\\auth.tpl',
      1 => 1457092789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e0292b7bad96_65306906 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1024256e0292b689ac0_15100579';
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
        <p>Control Panel</p>
        <p>Team - <?php echo $_smarty_tpl->tpl_vars['TeamName']->value;?>
</p>
    </div>
<?php }
}
}
