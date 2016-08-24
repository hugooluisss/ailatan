<?php /* Smarty version Smarty-3.1.11, created on 2016-08-11 09:00:20
         compiled from "templates/plantillas/modulos/clientes/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72598897257ab79f68b06e3-92401534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b3d926bdf5ef13138597e908a4dd74ad59633ab' => 
    array (
      0 => 'templates/plantillas/modulos/clientes/lista.tpl',
      1 => 1470923648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72598897257ab79f68b06e3-92401534',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_57ab79f68eeb63_77922800',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ab79f68eeb63_77922800')) {function content_57ab79f68eeb63_77922800($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
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
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
							<button type="button" class="btn btn-primary" action="polizas" title="Polizas" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-book"></i></button>
							<button type="button" class="btn btn-success" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idCliente'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>