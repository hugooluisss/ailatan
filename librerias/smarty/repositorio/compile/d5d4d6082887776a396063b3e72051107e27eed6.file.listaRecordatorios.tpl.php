<?php /* Smarty version Smarty-3.1.11, created on 2016-08-18 12:25:29
         compiled from "templates/plantillas/modulos/reportes/listaRecordatorios.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168652444857b5de792ef2c7-58212771%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5d4d6082887776a396063b3e72051107e27eed6' => 
    array (
      0 => 'templates/plantillas/modulos/reportes/listaRecordatorios.tpl',
      1 => 1471541126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168652444857b5de792ef2c7-58212771',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_57b5de7937a7d3_69671484',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57b5de7937a7d3_69671484')) {function content_57b5de7937a7d3_69671484($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Cliente</th>
					<th>Módulo</th>
					<th>Próximo</th>
					<th>Correo</th>
					<th>Recordatorio</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['cliente'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['modulo'];?>
 <small>$ <?php echo $_smarty_tpl->tpl_vars['row']->value['importe'];?>
</small></td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['siguientepago'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</td>
						<td class="text-center">
							<input type="checkbox" class="mail" poliza="<?php echo $_smarty_tpl->tpl_vars['row']->value['idPoliza'];?>
"/>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>