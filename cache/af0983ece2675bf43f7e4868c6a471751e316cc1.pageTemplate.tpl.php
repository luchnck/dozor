<?php
/* Smarty version 3.1.30-dev/44, created on 2016-03-09 18:16:26
  from "I:\documents\projects\dozor\templates\pageTemplate.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56e0303a966183_39035971',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ce71007119d11f156b9829c118b9726d6834c2b' => 
    array (
      0 => 'I:\\documents\\projects\\dozor\\templates\\pageTemplate.tpl',
      1 => 1456991867,
      2 => 'file',
    ),
    'c87f6373fe8e0d5b27dc32c4ac0c47578089d44d' => 
    array (
      0 => 'I:\\documents\\projects\\dozor\\templates\\header.tpl',
      1 => 1455805303,
      2 => 'file',
    ),
    'd558de603ec9592bf4874e0588af1d7d0621f48e' => 
    array (
      0 => 'I:\\documents\\projects\\dozor\\templates\\auth.tpl',
      1 => 1457092789,
      2 => 'file',
    ),
    'c921a49aac8b61d4a57d43ec080a2df3ea1e37a5' => 
    array (
      0 => 'I:\\documents\\projects\\dozor\\templates\\mainpage.tpl',
      1 => 1455805263,
      2 => 'file',
    ),
    '18e5721f398e584ca5ea61a8eb5744f29c911fab' => 
    array (
      0 => 'I:\\documents\\projects\\dozor\\templates\\footer.tpl',
      1 => 1455805262,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_56e0303a966183_39035971 (Smarty_Internal_Template $_smarty_tpl) {
?>



<html>
    <head>
        <title>$title</title>
    </head>
    <body>

    <div>
        <p>Authorisation</p>
            <form method="post" action="/main/auth">
                <input type="text" name="username">
                <input type="password" name="password">
                <input type="submit">
            </form> 
    </div>



   

</body></html><?php }
}
