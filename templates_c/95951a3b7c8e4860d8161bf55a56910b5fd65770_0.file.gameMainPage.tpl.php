<?php
/* Smarty version 3.1.30-dev/44, created on 2016-04-08 22:54:23
  from "Z:\home\dozor\templates\gameMainPage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_5707fe5f5b8d87_81700349',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95951a3b7c8e4860d8161bf55a56910b5fd65770' => 
    array (
      0 => 'Z:\\home\\dozor\\templates\\gameMainPage.tpl',
      1 => 1460141658,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5707fe5f5b8d87_81700349 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="jumbotron">
    <div class="container">
         <div class="col-md-2 col-xs-2 col-lg-2"></div>
         
        <div class="text-center col-md-8 col-xs-8 col-lg-8 panel"> 
        <h1 class="caption">Время напрячь мозги</h1>
        <p>Не отвлекайся!</p>
        <p>Внимание вопрос:</p>
        <form id="checkTask" method="post" action="/game/checktask/<?php echo $_smarty_tpl->tpl_vars['teamid']->value;?>
">
            <div class="container"><?php echo $_smarty_tpl->tpl_vars['task']->value->title;?>
</div>
            <div class="container"><?php echo $_smarty_tpl->tpl_vars['task']->value->details;?>
</div>
            <div class="container"><?php echo $_smarty_tpl->tpl_vars['task']->value->opts;?>
</div>
            <div class="form-group">
                <label for="pass"> Ваш ответ?</label>
                <input type="text" name="pass" id="pass" class="form-control" value="Ваш ответ"/>
            </div>
            <div class="form-group">
                <button class="btn-lg btn-success" type="submit" value="Решить" >Решить</button>
                <button class="btn-lg btn-warning" type="button" value="Слить" onclick="document.location.href='/game/canceltask/<?php echo $_smarty_tpl->tpl_vars['teamid']->value;?>
'">Слить</button>
            </div>
        </form>
        </div>    
            
         <div class="col-md-2 col-xs-2 col-lg-2"></div>
    </div>
</div>
<?php }
}
