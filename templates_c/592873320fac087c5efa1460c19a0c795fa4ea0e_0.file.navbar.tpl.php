<?php
/* Smarty version 3.1.30-dev/44, created on 2016-03-24 18:05:17
  from "Z:\home\dozor\templates\navbar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56f3f41d7de293_32513780',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '592873320fac087c5efa1460c19a0c795fa4ea0e' => 
    array (
      0 => 'Z:\\home\\dozor\\templates\\navbar.tpl',
      1 => 1458369804,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f3f41d7de293_32513780 (Smarty_Internal_Template $_smarty_tpl) {
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
