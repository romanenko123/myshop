<?php /* Smarty version Smarty-3.1.21, created on 2016-03-10 16:42:15
         compiled from "..\views\default\header.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:1433756deeccbdbae44-68379847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69a8d29a1fb65b4abed7f83de4e658cc96520203' => 
    array (
      0 => '..\\views\\default\\header.tpl.html',
      1 => 1457618691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1433756deeccbdbae44-68379847',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56deeccbe86098_55582467',
  'variables' => 
  array (
    'pageTitle' => 0,
    'templateWebPath' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56deeccbe86098_55582467')) {function content_56deeccbe86098_55582467($_smarty_tpl) {?><html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css" />
		<?php echo '<script'; ?>
 type="text/javascript" src="/js/jquery-1.7.1.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="/js/main.js"><?php echo '</script'; ?>
>
	</head>
	<body>
		<div id="header">
      		<h1>my shop - интернет магазин</h1>
		</div>
		
		<?php echo $_smarty_tpl->getSubTemplate ('leftcolumn.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


		<div id="centerColumn">
		<?php }} ?>
