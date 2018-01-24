<?php
/* Smarty version 3.1.30, created on 2018-01-23 17:12:08
  from "D:\wamp64\www\20180116\lesson\123\views\goods\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a66fc68c087a8_83453610',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27758db053ff7aa5883d3fcc57722d49fead4333' => 
    array (
      0 => 'D:\\wamp64\\www\\20180116\\lesson\\123\\views\\goods\\index.html',
      1 => 1516698718,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a66fc68c087a8_83453610 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	商品管理界面
	<!-- 遍历 -->
	<table>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['goods_list']->value, 'goods');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['goods']->value) {
?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_name'];?>
</td>
		</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

 
	</table>
</body>
</html><?php }
}
