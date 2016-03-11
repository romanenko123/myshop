<?php /* Smarty version Smarty-3.1.21, created on 2016-03-09 15:30:28
         compiled from "..\views\default\index.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:994656dee59ca4c5c0-05867708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd61aa06e27b263a8131cf0de476fe338974d9f4e' => 
    array (
      0 => '..\\views\\default\\index.tpl.html',
      1 => 1457530220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '994656dee59ca4c5c0-05867708',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56dee59cc3c804_01983716',
  'variables' => 
  array (
    'rsProducts' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56dee59cc3c804_01983716')) {function content_56dee59cc3c804_01983716($_smarty_tpl) {?>

<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
	<div style="float: left; padding: 0px 30px 40px 0px;">
		<a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
			<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" width="100" />
		</a><br />
		<a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
	</div>
	<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration']%3==0) {?>
		<div style="clear: both;"></div>
	<?php }?>
<?php } ?><?php }} ?>
