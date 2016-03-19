<?php
/* Smarty version 3.1.30-dev/44, created on 2016-03-19 10:54:43
  from "Z:\home\dozor\templates\profile.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_56ecf7b338db16_17444249',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e569f92ceadb92ec04b885e17cea8784140235f1' => 
    array (
      0 => 'Z:\\home\\dozor\\templates\\profile.tpl',
      1 => 1458369804,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56ecf7b338db16_17444249 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="jumbotron">
    <div class="container">
        
            <h1>Помни, на что подписался!</h1>
            <p class="text-justify">Сверь даты игр, в которых участвуешь, 
                свои контактные данные, чтобы не прозевать самое интересное</p>
    
    </div>
</div>

<div class="container panel panel-info">
         <div class="col-md-2 col-xs-2 col-lg-2"></div>
         
        <div class="text-center col-md-8 col-xs-8 col-lg-8 "> 
        <h3>СПИСОК ИГР, В КОТОРЫХ УЧАВСТВУЕШЬ</h3>
        
        <table class="table table-striped text-center table-hover">
            
            <thead>
                <th>Игра</th>
                <th>Начало</th>
                <th>Участники</th>
                <th>Войти</th>
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
                        <td><?php echo $_smarty_tpl->tpl_vars['record']->value->teamslist;?>
</td>
                        <td>
                            <form action="/game/go/" method="POST">
                                <button class="btn btn-success" type="submit" ><span class="glyphicon glyphicon-play-circle"></span></button>
                                <input type="hidden" name="game-num" value="<?php echo $_smarty_tpl->tpl_vars['record']->value->id;?>
">
                            </form>
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
        <?php }
}
