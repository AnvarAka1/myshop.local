<?php /* Smarty version Smarty-3.1.6, created on 2019-07-23 19:54:12
         compiled from "../views/default\category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17784124295d36e6593e6db5-92453678%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76efe512959f670dcfbe2dc8447081a8ad91a48b' => 
    array (
      0 => '../views/default\\category.tpl',
      1 => 1563904420,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17784124295d36e6593e6db5-92453678',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5d36e6594a4cd',
  'variables' => 
  array (
    'rsProducts' => 0,
    'item' => 0,
    'rsChildCats' => 0,
    'childItem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d36e6594a4cd')) {function content_5d36e6594a4cd($_smarty_tpl) {?>
<h1>Товары категории имя</h1>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['item']->iteration++;
?>
<div style="float: left; padding: 0 30px 40px 0">
    <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" width="100" /></a><br />
    <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
</div>    
<?php if ($_smarty_tpl->tpl_vars['item']->iteration%3==0){?>
<div style="clear: both"></div>
<?php }?>
<?php } ?>


<?php  $_smarty_tpl->tpl_vars['childItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['childItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsChildCats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['childItem']->key => $_smarty_tpl->tpl_vars['childItem']->value){
$_smarty_tpl->tpl_vars['childItem']->_loop = true;
?>
<h2><a href="/category/<?php echo $_smarty_tpl->tpl_vars['childItem']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['childItem']->value['name'];?>
</a></h2>
<?php } ?><?php }} ?>