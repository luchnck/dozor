<?php
/* Smarty version 3.1.30-dev/44, created on 2016-02-18 15:12:45
  from "I:\documents\projects\sandbox\dozor\templates\pageTemplate.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56c5d15dbaeb92_28061604',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '906f0633264f3d38c3d688d7c1fe9787ed61178b' => 
    array (
      0 => 'I:\\documents\\projects\\sandbox\\dozor\\templates\\pageTemplate.tpl',
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
function content_56c5d15dbaeb92_28061604 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2027956c5d15d895445_22014954';
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
