<?php
/* Smarty version 3.1.30-dev/44, created on 2016-03-19 12:15:31
  from "Z:\home\dozor\templates\mainpage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56ed0aa312b573_59386641',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17273af08f4c4b64e8fbfd4154be4919b0994118' => 
    array (
      0 => 'Z:\\home\\dozor\\templates\\mainpage.tpl',
      1 => 1458375321,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56ed0aa312b573_59386641 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="jumbotron">
    <?php if ($_smarty_tpl->tpl_vars['checkauth']->value) {?>
        <div class="container">
        <h1>Привет, ребятки!</h1>
        <p class="text-justify">Похоже Вы уже вкурсе что здесь к чему.<br>
            Если нет, добавляйтесь в любую из доступных игр ниже или проверьте 
            <button type="button" onclick="document.location.href='profile/view/';" class="btn btn-info">Профиль</button><br>
            возможно Ваша игра уже началась!</p>
    </div>
    <?php } else { ?>
    <div class="container">
        <h1>Привет, дорогой друг!</h1>
        <p>Этот сайт несет счастье и радость миролюбивым жителям Новокуйбышевска, 
            если ты хочешь стать немного счастливее Войди или 
            <button type="button" onclick="document.location.href='/register/view/';" class="btn btn-success btn-lg">Зарегистрируйся</button> 
            и будет тебе счастье!</p>
    </div>
    <?php }?>
</div>
    <div class="col-md-3 col-xs-2 col-lg-3"></div>

        <div class="col-md-6 col-xs-8 col-lg-6 panel">
            <h1 class="text-center">Список доступных игр</h1>
            <table class="table table-striped">
                
                <thead>
                    <th>Название</th>
                    <th>Начало</th>
                    <th>Участники</th>
                    <?php if ($_smarty_tpl->tpl_vars['teamid']->value) {?><th>Присоединиться</th><?php }?>
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
