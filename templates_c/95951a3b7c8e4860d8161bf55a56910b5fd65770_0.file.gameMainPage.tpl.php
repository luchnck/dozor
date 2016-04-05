<?php
/* Smarty version 3.1.30-dev/44, created on 2016-04-05 19:03:15
  from "Z:\home\dozor\templates\gameMainPage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_5703d3b3e8b258_08447762',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95951a3b7c8e4860d8161bf55a56910b5fd65770' => 
    array (
      0 => 'Z:\\home\\dozor\\templates\\gameMainPage.tpl',
      1 => 1458369804,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5703d3b3e8b258_08447762 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div>
    <h1>This is a game main page!</h1>
    <form id="checkTask" method="post" action="/game/checktask/<?php echo $_smarty_tpl->tpl_vars['teamid']->value;?>
">
        <div><?php echo $_smarty_tpl->tpl_vars['task']->value->title;?>
</div>
        <div><?php echo $_smarty_tpl->tpl_vars['task']->value->details;?>
</div>
        <div><?php echo $_smarty_tpl->tpl_vars['task']->value->opts;?>
</div>
        <input type="text" name="pass" value="Ваш ответ"/>
        <input type="submit" value="Решить">
        <input type="button" value="Слить" onclick="document.location.href='/game/canceltask/<?php echo $_smarty_tpl->tpl_vars['teamid']->value;?>
'">
    </form>
</div>
<?php }
}
