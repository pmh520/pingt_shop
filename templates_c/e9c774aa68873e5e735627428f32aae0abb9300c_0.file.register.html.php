<?php
/* Smarty version 3.1.30, created on 2018-01-23 17:37:39
  from "D:\wamp64\www\20180116\lesson\123\views\user\register.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a6702634464d7_18374158',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9c774aa68873e5e735627428f32aae0abb9300c' => 
    array (
      0 => 'D:\\wamp64\\www\\20180116\\lesson\\123\\views\\user\\register.html',
      1 => 1516700257,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a6702634464d7_18374158 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2>欢迎光临</h2>
	<form action="index.php?control=user&action=register" method="post">
		<input type="text" name="user_name">
		<input type="text" name="user_pwd">


		<input type="submit">
	</form>
</body>
</html><?php }
}
