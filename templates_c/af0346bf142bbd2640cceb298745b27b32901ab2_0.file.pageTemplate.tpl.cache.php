<?php
/* Smarty version 3.1.30-dev/44, created on 2016-03-11 07:04:29
  from "D:\documents\projects\dozor\templates\pageTemplate.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56e25fed8a6e49_20549896',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af0346bf142bbd2640cceb298745b27b32901ab2' => 
    array (
      0 => 'D:\\documents\\projects\\dozor\\templates\\pageTemplate.tpl',
      1 => 1457676252,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:mainpage.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_56e25fed8a6e49_20549896 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '3168456e25fed634fd8_08255536';
?>

<?php
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "fullPage.conf", "setup", 0);
?>


<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>"Dozor game page"), 0, false);
?>


<?php if ($_smarty_tpl->tpl_vars['AuthorisationModule']->value) {?>

   <?php echo $_smarty_tpl->tpl_vars['AuthorisationModule']->value;?>

    
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:mainpage.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
