<?php /* Smarty version Smarty-3.1.21, created on 2016-03-23 18:17:39
         compiled from "..\views\admin\adminOrders.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:1941756f2b5f8ea2c68-49789493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc7dd662f9a451c0ce4d182d64ff45204c5a81cf' => 
    array (
      0 => '..\\views\\admin\\adminOrders.tpl.html',
      1 => 1458749850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1941756f2b5f8ea2c68-49789493',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56f2b5f9200775_73450537',
  'variables' => 
  array (
    'rsOrders' => 0,
    'item' => 0,
    'itemChild' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56f2b5f9200775_73450537')) {function content_56f2b5f9200775_73450537($_smarty_tpl) {?><h2>Заказы</h2>
<?php if (!$_smarty_tpl->tpl_vars['rsOrders']->value) {?>
	Нет заказов 
<?php } else { ?>
	<table border="1" cellpadding="1" cellspacing="1">
		<tr>
			<th>№</th>
			<th>Действие</th>
			<th>ID заказа</th>
			<th width="110">Статус</th>
			<th>Дата создания</th>
			<th>Дата оплаты</th>
			<th>Дополнительная информация</th>
			<th>Дата изменения заказа</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsOrders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['orders']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['orders']['iteration']++;
?>
		<tr>
			<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['orders']['iteration'];?>
</td>
			<td><a href="#" onclick="showProducts($item['id']); return false;">Показать товар заказа</a></td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
			<td>
				<input type="checkbox" id="itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['status']) {?>checked="checked"<?php }?> onclick="updateOrderStatus('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');"  />Закрыт
			</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</td>
			<td>
				<input id="datePayment_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
" />
				<input type="button" value="Сохранить" onclick="updateDatePayment('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');" />
			</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_modification'];?>
</td>
		</tr>
		<tr class="hideme" id="purchasesForOrder_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
			<td colspan="8">
			<?php if ($_smarty_tpl->tpl_vars['item']->value['children']) {?>
			<table border="1" cellpadding="1" cellspacing="1" width="100%">
				<tr>
					<th>№</th>
					<th>ID</th>
					<th>Название</th>
					<th>Цена</th>
					<th>Количество</th>
				</tr>
				<?php  $_smarty_tpl->tpl_vars['itemChild'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itemChild']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->key => $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['itemChild']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
				<tr>
					<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
</td>
					<td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a></td>
					<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['price'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['amount'];?>
</td>
				</tr>
				<?php } ?>
			</table>
			<?php }?>
			</td>
		</tr>
		<?php } ?>
	</table>
<?php }?><?php }} ?>
