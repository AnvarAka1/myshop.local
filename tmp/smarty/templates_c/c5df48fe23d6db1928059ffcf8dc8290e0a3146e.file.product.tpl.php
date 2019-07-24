<?php /* Smarty version Smarty-3.1.6, created on 2019-07-24 06:26:43
         compiled from "../views/default\product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8986230225d37da8c817704-84873251%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5df48fe23d6db1928059ffcf8dc8290e0a3146e' => 
    array (
      0 => '../views/default\\product.tpl',
      1 => 1563942334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8986230225d37da8c817704-84873251',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5d37da8cc0080',
  'variables' => 
  array (
    'rsProduct' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d37da8cc0080')) {function content_5d37da8cc0080($_smarty_tpl) {?>

<h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>

    <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
" width="575"/>
    Стоимость: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>
 <a href="#">Добавить в корзину</a>
   
    <p><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p>

<?php }} ?>