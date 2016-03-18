<?php /* Smarty version Smarty-3.1.21, created on 2016-03-18 15:36:22
         compiled from "..\views\default\order.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:3049056ebfd6f7bbc42-72553727%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd583255edb0c017a49c86b9f6690e75796cc0d89' => 
    array (
      0 => '..\\views\\default\\order.tpl.html',
      1 => 1458308164,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3049056ebfd6f7bbc42-72553727',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56ebfd6f8d11c4_86447607',
  'variables' => 
  array (
    'rsProducts' => 0,
    'item' => 0,
    'arUser' => 0,
    'buttonClass' => 0,
    'name' => 0,
    'phone' => 0,
    'adress' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ebfd6f8d11c4_86447607')) {function content_56ebfd6f8d11c4_86447607($_smarty_tpl) {?>

<h2>Данные заказа</h2>
<form id="frmOrder" action="/cart/saveorder/" method="post">
	<table>
		<tr>
			<td>№</td>
			<td>Наименование</td>
			<td>Количество</td>
			<td>Цена за единицу</td>
			<td>Стоимость</td>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
			<tr>
				<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'];?>
</td>
				<td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></td>
				<td>
					<span id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
						<input type="hidden" name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>
" />
						<?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>

					</span>
				</td>
				<td>
					<span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
						<input type="hidden" name="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
" />
						<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

					</span>
				</td>
				<td>
					<span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
						<input type="hidden" name="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>
" />
						<?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>

					</span>
				</td>
			</tr>
		<?php } ?>
	</table>
	<?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
		<?php $_smarty_tpl->tpl_vars['buttonClass'] = new Smarty_variable('', null, 0);?>
		<h2>Данные заказчика</h2>
		<div id="orderUserInfoBox" <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
>
			<?php $_smarty_tpl->tpl_vars['name'] = new Smarty_variable($_smarty_tpl->tpl_vars['arUser']->value['name'], null, 0);?>
			<?php $_smarty_tpl->tpl_vars['phone'] = new Smarty_variable($_smarty_tpl->tpl_vars['arUser']->value['phone'], null, 0);?>
			<?php $_smarty_tpl->tpl_vars['adress'] = new Smarty_variable($_smarty_tpl->tpl_vars['arUser']->value['adress'], null, 0);?>
		</div>
		<table>
			<tr>
				<td>Имя*</td>
				<td><input type="text" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" /></td>
			</tr>
			<tr>
				<td>Тел*</td>
				<td><input type="text" id="phone" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
" /></td>
			</tr>
			<tr>
				<td>Адрес*</td>
				<td><textarea ip="adress" name="adress"><?php echo $_smarty_tpl->tpl_vars['adress']->value;?>
</textarea></td>
			</tr>
		</table>
	<?php } else { ?>
		<div id="loginBox">
			<div class="menuCaption">Авторизация</div>
			<table>
				<tr>
					<td>Логин</td>
					<td><input type="text" id="loginEmail" name="email" value="" /></td>
				</tr>
				<tr>
					<td>Пароль</td>
					<td><input type="password" id="loginPwd" name="pwd" value="" /></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="button" onclick="login();" value="Войти" /></td>
				</tr>
			</table>
		</div>
		<div id="registerBox">или <br />
			<div class="menuCaption">Регистрация нового пользователя</div>
			email* :<br />
			<input type="text" id="email" name="email" value="" /><br />			
			пароль* :<br />
			<input type="password" id="pwd1" name="pwd1" value="" /><br />			
			повторить пароль* :<br />
			<input type="password" id="pwd2" name="pwd2" value="" /><br />
			
			Имя* :<input type="text" id="name" name="name" value="" /><br />			
			Тел* :<input type="text" id="phone" name="phone" value="" /><br />			
			Адрес* :<textarea id="adress" name="adress"></textarea><br />
			
			<input type="button" onclick="registerNewUser();" value="Зарегистрироваться" />			
		</div>
		<?php $_smarty_tpl->tpl_vars['buttonClass'] = new Smarty_variable("class='hideme'", null, 0);?>
	<?php }?>
	
	<input <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
 id="btnSaveOrder" type="button" onclick="saveOrder();" value="Оформить заказ" />
	
</form><?php }} ?>
