<?php
/* Smarty version 3.1.30-dev/44, created on 2016-03-09 17:46:19
  from "I:\documents\projects\dozor\templates\pageTemplate.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56e0292b5587f8_00116253',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ce71007119d11f156b9829c118b9726d6834c2b' => 
    array (
      0 => 'I:\\documents\\projects\\dozor\\templates\\pageTemplate.tpl',
      1 => 1456991867,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:auth.tpl' => 1,
    'file:mainpage.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_56e0292b5587f8_00116253 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1774156e0292b14ae64_31426616';
?>

<?php
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "fullPage.conf", "setup", 0);
?>


<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>"Dozor game page"), 0, false);
?>


<?php $_smarty_tpl->_subTemplateRender("file:auth.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php $_smarty_tpl->_subTemplateRender("file:mainpage.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
