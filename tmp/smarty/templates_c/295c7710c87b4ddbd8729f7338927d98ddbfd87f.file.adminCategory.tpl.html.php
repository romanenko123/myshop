<?php /* Smarty version Smarty-3.1.21, created on 2016-03-22 12:25:10
         compiled from "..\views\admin\adminCategory.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:155956f11d864777c3-93836723%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '295c7710c87b4ddbd8729f7338927d98ddbfd87f' => 
    array (
      0 => '..\\views\\admin\\adminCategory.tpl.html',
      1 => 1458642124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155956f11d864777c3-93836723',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rsCategories' => 0,
    'item' => 0,
    'rsMainCategories' => 0,
    'mainItem' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56f11d8655dfa2_82637242',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56f11d8655dfa2_82637242')) {function content_56f11d8655dfa2_82637242($_smarty_tpl) {?><h2>Категории</h2>
<table border="1" cellpadding="1" cellspacing="1">
	<tr>
		<th>№</th>
		<th>ID</th>
		<th>Название</th>
		<th>Родительская категория</th>
		<th>Действие</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categories']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categories']['iteration']++;
?>
		<tr>
			<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['categories']['iteration'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
			<td>
				<input type="edit" id="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" />
			</td>
			<td>
				<select id="parentId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					<option value="0">Главная Категория
					<?php  $_smarty_tpl->tpl_vars['mainItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mainItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsMainCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mainItem']->key => $_smarty_tpl->tpl_vars['mainItem']->value) {
$_smarty_tpl->tpl_vars['mainItem']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['mainItem']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['parent_id']==$_smarty_tpl->tpl_vars['mainItem']->value['id']) {?>selected<?php }?>> <?php echo $_smarty_tpl->tpl_vars['mainItem']->value['name'];?>
 
					<?php } ?> 
				</select>
			</td>
			<td>
				<input type="button" value="Сохранить" onclick="updateCat(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);" />
			</td>
		</tr>
	<?php } ?>
</table><?php }} ?>
