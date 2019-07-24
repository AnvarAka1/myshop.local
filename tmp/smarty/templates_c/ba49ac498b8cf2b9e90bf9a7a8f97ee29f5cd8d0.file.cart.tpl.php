<?php /* Smarty version Smarty-3.1.6, created on 2019-07-24 23:32:06
         compiled from "../views/default\cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16309716375d38bc822762a6-73986641%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba49ac498b8cf2b9e90bf9a7a8f97ee29f5cd8d0' => 
    array (
      0 => '../views/default\\cart.tpl',
      1 => 1564003921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16309716375d38bc822762a6-73986641',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5d38bc822aa65',
  'variables' => 
  array (
    'rsProducts' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d38bc822aa65')) {function content_5d38bc822aa65($_smarty_tpl) {?><h1>Корзина</h1>

<?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value){?>
В корзине пусто.
<?php }else{ ?>

<h3>Данные заказа</h3>
<form>
    <table>
        <tr>
            <td>№</td>
            <td>Наименование</td>
            <td>Количество</td>
            <td>Цена за единицу</td>
            <td>Цена</td>
            <td>Действие</td>
        </tr>

        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['item']->iteration++;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->iteration;?>
</td>
            <td>
                <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
            </td>
            <td>
                <input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="itemCnt" type="text" value=<?php echo 1;?>
>
            </td>
            <td>
                <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" valsue=<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</span>
            </td>
            <td>
                <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="itemRealPrice"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</span>
            </td>
            <td>
                <a href="#" id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="addCart hideme">Восстановить</a>
                <a href="#" id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="removeCart">Удалить</a>
            </td>       
        <tr>
        <?php } ?>

    </table>

    <button type="submit">Оформить заказ</button>

</form>
<?php }?><?php }} ?>