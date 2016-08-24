<?php /* Smarty version Smarty-3.1.11, created on 2016-08-11 17:13:42
         compiled from "templates/plantillas/modulos/pagos/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61247589257ac92a34f1375-03371363%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84ac97159975e6f6372db424c88fd376bf43deff' => 
    array (
      0 => 'templates/plantillas/modulos/pagos/lista.tpl',
      1 => 1470940062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61247589257ac92a34f1375-03371363',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_57ac92a351efd0_19546731',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ac92a351efd0_19546731')) {function content_57ac92a351efd0_19546731($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Poliza</th>
					<th>Cliente</th>
					<th>Importe</th>
					<th>Periodo</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idPago'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idPoliza'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['cliente'];?>
</td>
						<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['importe'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['inicio'];?>
 / <?php echo $_smarty_tpl->tpl_vars['row']->value['fin'];?>
</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idPago'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>