<?php /* Smarty version Smarty-3.1.11, created on 2016-08-11 17:13:42
         compiled from "templates/plantillas/modulos/pagos/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:147701437357ac922dc2bf14-06612164%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33871f1a9bfa218e8eeb661ed822951daa361174' => 
    array (
      0 => 'templates/plantillas/modulos/pagos/panel.tpl',
      1 => 1470940062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147701437357ac922dc2bf14-06612164',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_57ac922dc46449_57759234',
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ac922dc46449_57759234')) {function content_57ac922dc46449_57759234($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Pagos</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
  <li><a data-toggle="tab" href="#add">Agregar o Modificar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista">
			
		</div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">			
					<div class="form-group">
						<label for="txtNombre" class="col-lg-2">Cliente</label>
						<div class="col-lg-6">
							<input class="form-control" id="txtCliente" name="txtCliente" disabled="true">
						</div>
						<div class="col-lg-1">
							<a href="#" class="btn btn-primary btnClientes">
								<i class="fa fa-search" aria-hidden="true"></i>
							</a>
						</div>
					</div>
					<div class="form-group">
						<label for="txtPoliza" class="col-lg-2">Poliza</label>
						<div class="col-lg-6">
							<select id="selPoliza" name="selPoliza" class="form-control"></select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtFecha" class="col-lg-2">Fecha inicio</label>
						<div class="col-lg-2">
							<input class="form-control" id="txtFecha" name="txtFecha">
						</div>
						<div class="col-lg-8 mensajeFecha text-muted">
							
						</div>
					</div>
					<div class="form-group">
						<label for="txtImporte" class="col-lg-2">Importe</label>
						<div class="col-lg-2">
							<input class="form-control text-right" id="txtImporte" name="txtImporte" type="text">
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="modal fade" id="winClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Clientes</h4>
			</div>
			<div class="modal-body">
				<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/pagos/listaClientes.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div><?php }} ?>