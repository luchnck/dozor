<?php
/* Smarty version 3.1.30-dev/44, created on 2016-02-16 12:29:55
  from "D:\documents\projects\sandbox\dozor\templates\pageTemplate.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56c30833509e23_58002274',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69818d6f76bec5808d502999eece27aceb121825' => 
    array (
      0 => 'D:\\documents\\projects\\sandbox\\dozor\\templates\\pageTemplate.tpl',
      1 => 1455622192,
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
function content_56c30833509e23_58002274 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '413956c3083335b936_47929369';
?>

<?php
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "fullPage.conf", "setup", 0);
?>


<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>"Dozor game page"), 0, false);
?>


<?php $_smarty_tpl->_subTemplateRender("file:mainpage.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
