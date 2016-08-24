<?php /* Smarty version Smarty-3.1.11, created on 2016-08-24 11:34:09
         compiled from "templates/plantillas/modulos/ventas/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158413442057bdbe44ac3903-41697503%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79731998ddf826714b60029001476656ec1216cf' => 
    array (
      0 => 'templates/plantillas/modulos/ventas/lista.tpl',
      1 => 1472056052,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158413442057bdbe44ac3903-41697503',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_57bdbe44b97343_73067805',
  'variables' => 
  array (
    'ventas' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57bdbe44b97343_73067805')) {function content_57bdbe44b97343_73067805($_smarty_tpl) {?><table id="tblLista" class="table table-bordered table-hover" data-order='[[0, "desc"]]'>
	<thead>
		<tr>
			<th>Folio</th>
			<th>Cliente</th>
			<th>Vendedor</th>
			<th>Total</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ventas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['folio'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['cliente'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['vendor'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['total'];?>
</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-success" action="ticket" title="Imprimir ticket" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-file-pdf-o"></i></button>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>