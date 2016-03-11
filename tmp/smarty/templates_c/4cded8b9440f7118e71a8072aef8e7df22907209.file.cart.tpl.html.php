<?php /* Smarty version Smarty-3.1.21, created on 2016-03-11 13:14:02
         compiled from "..\views\default\cart.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:1740856e298adba0822-60961411%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4cded8b9440f7118e71a8072aef8e7df22907209' => 
    array (
      0 => '..\\views\\default\\cart.tpl.html',
      1 => 1457694824,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1740856e298adba0822-60961411',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56e298adc1d850_75546666',
  'variables' => 
  array (
    'pageTitle' => 0,
    'rsProducts' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e298adc1d850_75546666')) {function content_56e298adc1d850_75546666($_smarty_tpl) {?>

<h1><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</h1>

<?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value) {?>
	В корзине пусто.
<?php } else { ?>
	<h2>Данные заказа</h2>
	<table>
	  <tr>
	    <td>№</td>
	    <td>Наименование</td>
	    <td>Количество</td>
	    <td>Цена за еденицу</td>
	    <td>Цена</td>
	    <td>Действие</td>
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
	  	<td>
	  		<a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br />
	  	</td>
	  	<td>
	  		<input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text" value="1" onchange="conversionPrice(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);"/>
	  	</td>
	  	<td>
	  		<span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
	  			<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

	  		</span>
	  	</td>
	  	<td>
	  		<span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
	  			<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

	  		</span>
	  	</td>
	  	<td>
	  		<a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false" title="Удалить из корзины">Удалить из корзины</a>
			<a id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="hideme" href="#" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" title="Востановить">Востановить</a>
	  	</td>
	  </tr>
	  <?php } ?>
	</table>
<?php }?><?php }} ?>
