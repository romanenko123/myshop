<?php /* Smarty version Smarty-3.1.21, created on 2016-03-18 10:19:48
         compiled from "..\views\default\user.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:74056ead39e93a746-29899851%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d4857d8895a9ea6e44d5b046403523563e88320' => 
    array (
      0 => '..\\views\\default\\user.tpl.html',
      1 => 1458289179,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74056ead39e93a746-29899851',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56ead39e998375_16397362',
  'variables' => 
  array (
    'arUser' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ead39e998375_16397362')) {function content_56ead39e998375_16397362($_smarty_tpl) {?>

<h1>Ваши регистрационные данные</h1>
<table border = "0">
	<tr>
		<td>Логин (email)</td>
		<td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
	</tr>
	<tr>
		<td>Имя</td>
		<td><input type="text" id="newName" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
" /></td>
	</tr>
	<tr>
		<td>Тел</td>
		<td><input type="text" id="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
" /></td>
	</tr>
	<tr>
		<td>Адрес</td>
		<td><textarea id="newAdress"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['adress'];?>
</textarea></td>
	</tr>
	<tr>
		<td>Новый пароль</td>
		<td><input type="password" id="newPwd1" value="" /></td>
	</tr>
	<tr>
		<td>Повтор пароля</td>
		<td><input type="password" id="newPwd2" value="" /></td>
	</tr>
	<tr>
		<td>Для того чтобы сохранить данные введите текущий пароль</td>
		<td><input type="password" id="curPwd" value="" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="button" onclick="updateUserData();" value="Сохранить изменения" /></td>
	</tr>
</table><?php }} ?>
