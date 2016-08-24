<?php /* Smarty version Smarty-3.1.11, created on 2016-08-11 10:52:44
         compiled from "templates/plantillas/modulos/clientes/listaPolizas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:41894986757abf963a59494-47486325%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30e3a59bf98e06ca8b8bdf9a94dc02bbef684039' => 
    array (
      0 => 'templates/plantillas/modulos/clientes/listaPolizas.tpl',
      1 => 1470923648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41894986757abf963a59494-47486325',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_57abf963afaa13_70079362',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57abf963afaa13_70079362')) {function content_57abf963afaa13_70079362($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Módulo</th>
					<th>Registrada</th>
					<th>Próximo pago</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idPoliza'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['modulo'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['creada'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['siguientepago'];?>
</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>