<?php /* Smarty version Smarty-3.1.11, created on 2016-08-24 10:21:29
         compiled from "templates/plantillas/modulos/configuracion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112519722157bdb81fbd95c3-86708564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46df8b15289741cd2087203b6099261ee8376380' => 
    array (
      0 => 'templates/plantillas/modulos/configuracion.tpl',
      1 => 1472052087,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112519722157bdb81fbd95c3-86708564',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_57bdb81fc8ca63_12356000',
  'variables' => 
  array (
    'razonSocial' => 0,
    'direccion' => 0,
    'giro' => 0,
    'telefono' => 0,
    'cif' => 0,
    'web' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57bdb81fc8ca63_12356000')) {function content_57bdb81fc8ca63_12356000($_smarty_tpl) {?><div class="box">
	<div class="box-header">
		<h3>Configuración del sistema </h3>
	</div>
	<div class="box-body">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="form-group">
				<label for="txtCostoMantenimiento" class="col-lg-2">Nombre de la empresa</label>
				<div class="col-lg-5">
					<input class="form-control" id="txtEmpresa" name="txtEmpresa" value="<?php echo $_smarty_tpl->tpl_vars['razonSocial']->value;?>
" clave="razonSocial" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtDireccion" class="col-lg-2">Dirección</label>
				<div class="col-lg-10">
					<input class="form-control" id="txtDireccion" name="txtDireccion" value="<?php echo $_smarty_tpl->tpl_vars['direccion']->value;?>
" clave="direccion" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtGiro" class="col-lg-2">Giro</label>
				<div class="col-lg-6">
					<input class="form-control" id="txtGiro" name="txtGiro" value="<?php echo $_smarty_tpl->tpl_vars['giro']->value;?>
" clave="giro" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtTelefono" class="col-lg-2">Teléfono</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtTelefono" name="txtTelefono" value="<?php echo $_smarty_tpl->tpl_vars['telefono']->value;?>
" clave="telefono" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtCIF" class="col-lg-2">CIF</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtCIF" name="txtCIF" value="<?php echo $_smarty_tpl->tpl_vars['cif']->value;?>
" clave="cif" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtWeb" class="col-lg-2">Dirección web</label>
				<div class="col-lg-5">
					<input class="form-control" id="txtWeb" name="txtWeb" value="<?php echo $_smarty_tpl->tpl_vars['web']->value;?>
" clave="web" />
				</div>
			</div>
		</form>
	</div>
</div><?php }} ?>