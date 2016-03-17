<?php
/* Smarty version 3.1.30-dev/44, created on 2016-03-15 09:10:18
  from "D:\documents\projects\dozor\templates\gameFinishPage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56e7c36a047705_16985105',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01d43d6ef817df369d03e4fb4ed8d7b89d311d8e' => 
    array (
      0 => 'D:\\documents\\projects\\dozor\\templates\\gameFinishPage.tpl',
      1 => 1457958832,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e7c36a047705_16985105 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="jumbotron">
    <div class="container">
         <div class="col-md-2 col-xs-2 col-lg-2"></div>
         
        <div class="text-center col-md-8 col-xs-8 col-lg-8 panel"> 
        <h1 class="caption">ИГРА ОКОНЧЕНА</h1>
        <p>Можно немного расслабиться и перевести дух, окончательные результаты 
            будут доступны после завершения игры по расписанию</p>
        <h2>Таблица первенства:</h2>
        <table class="table table-striped">
            
            <thead>
                <th>Команда</th>
                <th>Статус</th>
                <th>Очки</th>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['challengeState']->value->arrayRecords, 'record');
foreach ($_from as $_smarty_tpl->tpl_vars['record']->value) {
$_smarty_tpl->tpl_vars['record']->_loop = true;
$__foreach_record_0_saved = $_smarty_tpl->tpl_vars['record'];
?>
                    <tr <?php if ($_smarty_tpl->tpl_vars['record']->value->teamid == $_smarty_tpl->tpl_vars['teamid']->value) {?> class="success" <?php }?>>
                        <td><?php echo $_smarty_tpl->tpl_vars['record']->value->name;?>
</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['record']->value->taskserials == '') {?>Закончено<?php } else { ?>В процессе<?php }?></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['record']->value->timescore;?>
</td>
                    </tr>
                <?php
$_smarty_tpl->tpl_vars['record'] = $__foreach_record_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
            </tbody>
        </table>
        </div>    
            
         <div class="col-md-2 col-xs-2 col-lg-2"></div>
    </div>
</div>
<?php }
}
