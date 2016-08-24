<?php /* Smarty version Smarty-3.1.11, created on 2016-08-11 17:13:42
         compiled from "templates/plantillas/modulos/pagos/listaClientes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146810847557ac9b22ce70c9-50790541%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '386b962a88cf4a8e19a2694003632cf606f6f65f' => 
    array (
      0 => 'templates/plantillas/modulos/pagos/listaClientes.tpl',
      1 => 1470940062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146810847557ac9b22ce70c9-50790541',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_57ac9b22d4d7d3_26848884',
  'variables' => 
  array (
    'listaClientes' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ac9b22d4d7d3_26848884')) {function content_57ac9b22d4d7d3_26848884($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatosClientes" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Paterno</th>
					<th>Materno</th>
					<th>Email</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaClientes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idCliente'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['app'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['apm'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-primary" action="setClientes" title="Click o Tap para seleccionar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-hand-pointer-o"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>