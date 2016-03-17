<?php
/* Smarty version 3.1.30-dev/44, created on 2016-03-14 13:00:30
  from "D:\documents\projects\dozor\templates\navbar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56e6a7de125fc8_93940482',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6dc8e9e4f91362bd048a36c5167f21ce48270020' => 
    array (
      0 => 'D:\\documents\\projects\\dozor\\templates\\navbar.tpl',
      1 => 1457886380,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e6a7de125fc8_93940482 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Дозор - Нск</a>
        </div>
        <div class="navbar-collapse collapse">
          <?php echo $_smarty_tpl->tpl_vars['AuthorisationModule']->value;?>

        </div><!--/.navbar-collapse -->
      </div>
</div><?php }
}
