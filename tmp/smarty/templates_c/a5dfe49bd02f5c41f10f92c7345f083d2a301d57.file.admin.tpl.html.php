<?php /* Smarty version Smarty-3.1.21, created on 2016-03-22 10:54:46
         compiled from "..\views\admin\admin.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:7856f00995d015c4-45801634%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5dfe49bd02f5c41f10f92c7345f083d2a301d57' => 
    array (
      0 => '..\\views\\admin\\admin.tpl.html',
      1 => 1458636856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7856f00995d015c4-45801634',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56f00995d05442_65783157',
  'variables' => 
  array (
    'rsCategories' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56f00995d05442_65783157')) {function content_56f00995d05442_65783157($_smarty_tpl) {?><div id="blockNewCategory">
	Новая каатегория:
	<input name="newCategoryName" id="newCategoryName" type="text" value="" />
	<br />
	
	Являеться подкатегорией для
	
	<select name="generalCatId">
		<option value="0">Главная Категория
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

		<?php } ?>
	</select>
	<br />
	<input type="button" onclick="newCategory();" value="Добавить категорию" />
	
</div><?php }} ?>
