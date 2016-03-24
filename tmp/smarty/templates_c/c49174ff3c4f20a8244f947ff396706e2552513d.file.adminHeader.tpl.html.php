<?php /* Smarty version Smarty-3.1.21, created on 2016-03-21 16:47:49
         compiled from "..\views\admin\adminHeader.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:1672056f00995acedc3-62186606%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c49174ff3c4f20a8244f947ff396706e2552513d' => 
    array (
      0 => '..\\views\\admin\\adminHeader.tpl.html',
      1 => 1458571446,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1672056f00995acedc3-62186606',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pageTitle' => 0,
    'templateWebPath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_56f00995c22b44_76937731',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56f00995c22b44_76937731')) {function content_56f00995c22b44_76937731($_smarty_tpl) {?><html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css" />
		<?php echo '<script'; ?>
 type="text/javascript" src="/js/jquery-1.7.1.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="/js/admin.js"><?php echo '</script'; ?>
>
	</head>
	<body>
		<div id="header">
      		<h1>Управление сайтом</h1>
		</div>
		
		<?php echo $_smarty_tpl->getSubTemplate ('adminLeftcolumn.tpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


		<div id="centerColumn"><?php }} ?>
