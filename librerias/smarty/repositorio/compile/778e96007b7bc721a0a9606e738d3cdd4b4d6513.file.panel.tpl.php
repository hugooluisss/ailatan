<?php /* Smarty version Smarty-3.1.11, created on 2016-08-10 09:18:37
         compiled from "templates/plantillas/modulos/modulos/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35431092057aab34d314f10-65895183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '778e96007b7bc721a0a9606e738d3cdd4b4d6513' => 
    array (
      0 => 'templates/plantillas/modulos/modulos/panel.tpl',
      1 => 1470838654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35431092057aab34d314f10-65895183',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_57aab34d363989_91126970',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57aab34d363989_91126970')) {function content_57aab34d363989_91126970($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Administración de módulos</h1>
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
						<label for="txtNombre" class="col-lg-2">Nombre completo</label>
						<div class="col-lg-6">
							<input class="form-control" id="txtNombre" name="txtNombre">
						</div>
					</div>
					<div class="form-group">
						<label for="txtImporte" class="col-lg-2">Importe</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtImporte" name="txtImporte" type="text">
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
</div><?php }} ?>