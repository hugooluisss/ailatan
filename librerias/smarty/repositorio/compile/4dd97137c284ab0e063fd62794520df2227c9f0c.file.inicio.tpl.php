<?php /* Smarty version Smarty-3.1.11, created on 2016-08-24 13:44:49
         compiled from "templates/plantillas/modulos/inicio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10107113757ab37b8972e18-60852596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4dd97137c284ab0e063fd62794520df2227c9f0c' => 
    array (
      0 => 'templates/plantillas/modulos/inicio.tpl',
      1 => 1472064288,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10107113757ab37b8972e18-60852596',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_57ab37b89761a4_73044361',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ab37b89761a4_73044361')) {function content_57ab37b89761a4_73044361($_smarty_tpl) {?><div class="box">
	<div class="box-header">
		<h3>Lista de ventas </h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-1">
				IVA
			</div>
			<div class="col-md-2">
				<select id="selIVA" class="form-control">
					<option value="1">Incluido</option>
					<option value="0">Cero</option>
				</select>
			</div>
		</div>
		<div id="dvLista"></div>
	</div>
</div><?php }} ?>