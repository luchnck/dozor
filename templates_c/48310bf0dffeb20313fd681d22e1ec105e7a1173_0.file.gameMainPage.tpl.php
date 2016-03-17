<?php
/* Smarty version 3.1.30-dev/44, created on 2016-03-11 10:32:05
  from "D:\documents\projects\dozor\templates\gameMainPage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56e290953e6f19_95402896',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48310bf0dffeb20313fd681d22e1ec105e7a1173' => 
    array (
      0 => 'D:\\documents\\projects\\dozor\\templates\\gameMainPage.tpl',
      1 => 1457688708,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e290953e6f19_95402896 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div>
    <h1>This is a game main page!</h1>
    <form id="checkTask" method="post" action="<?php echo $_smarty_tpl->tpl_vars['checkTaskAction']->value;?>
">
        <div><?php echo $_smarty_tpl->tpl_vars['task']->value->title;?>
</div>
        <div><?php echo $_smarty_tpl->tpl_vars['task']->value->details;?>
</div>
        <div><?php echo $_smarty_tpl->tpl_vars['task']->value->opts;?>
</div>
        <input type="text" name="pass" value="Ваш ответ"/>
        <input type="submit">
    </form>
</div>
<?php }
}
