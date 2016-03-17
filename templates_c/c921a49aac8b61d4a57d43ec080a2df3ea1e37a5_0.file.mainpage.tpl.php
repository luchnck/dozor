<?php
/* Smarty version 3.1.30-dev/44, created on 2016-03-13 20:58:20
  from "I:\documents\projects\dozor\templates\mainpage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56e59c2c1ab3f0_24580225',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c921a49aac8b61d4a57d43ec080a2df3ea1e37a5' => 
    array (
      0 => 'I:\\documents\\projects\\dozor\\templates\\mainpage.tpl',
      1 => 1457888296,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e59c2c1ab3f0_24580225 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="jumbotron">
    <div class="container">
        <h1>Привет дорогой друг!</h1>
        <p>Этот сайт несет счастье и радость миролюбивым жителям Новокуйбышевска, 
            если ты хочешь стать немного счастливее Войди или Зарегистрируйся и будет тебе счастье!</p>
    </div>
</div>
    <div class="col-md-3 col-xs-2 col-lg-3"></div>

        <div class="col-md-6 col-xs-8 col-lg-6 panel">
            <h1>Список доступных игр на сегодня</h1>
            <table class="table table-striped">
                
                <thead>
                    <td>Название</td>
                    <td>Начало</td>
                    <td>Участники</td>
                    <?php if ($_smarty_tpl->tpl_vars['teamid']->value) {?><td>Присоединиться</td><?php }?>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['games']->value->arrayRecords, 'record');
foreach ($_from as $_smarty_tpl->tpl_vars['record']->value) {
$_smarty_tpl->tpl_vars['record']->_loop = true;
$__foreach_record_0_saved = $_smarty_tpl->tpl_vars['record'];
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['record']->value->caption;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['record']->value->start->getDate();?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['record']->value->teamlist;?>
</td>
                            <?php if ($_smarty_tpl->tpl_vars['teamid']->value) {?>
                            <td>
                                <form name="joingame" action="/main/join/team/<?php echo $_smarty_tpl->tpl_vars['teamid']->value;?>
">
                                    <input type="submit" value="+">
                                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['record']->value->id;?>
">
                                </form>
                            </td>
                            <?php }?>
                        </tr>
                    <?php
$_smarty_tpl->tpl_vars['record'] = $__foreach_record_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
                </tbody>
            </table>
        </div>

        <div class="col-md-3 col-xs-2 col-lg-3"></div>
      

     <?php }
}
