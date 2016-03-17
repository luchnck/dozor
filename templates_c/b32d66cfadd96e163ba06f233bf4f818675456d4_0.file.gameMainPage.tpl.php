<?php
/* Smarty version 3.1.30-dev/44, created on 2016-03-12 20:37:37
  from "I:\documents\projects\dozor\templates\gameMainPage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56e445d190f561_09019260',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b32d66cfadd96e163ba06f233bf4f818675456d4' => 
    array (
      0 => 'I:\\documents\\projects\\dozor\\templates\\gameMainPage.tpl',
      1 => 1457800650,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e445d190f561_09019260 (Smarty_Internal_Template $_smarty_tpl) {
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
