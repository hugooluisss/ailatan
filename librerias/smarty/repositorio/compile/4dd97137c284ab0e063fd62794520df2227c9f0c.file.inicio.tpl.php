<?php /* Smarty version Smarty-3.1.11, created on 2016-08-10 09:18:32
         compiled from "templates/plantillas/modulos/inicio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10107113757ab37b8972e18-60852596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4dd97137c284ab0e063fd62794520df2227c9f0c' => 
    array (
      0 => 'templates/plantillas/modulos/inicio.tpl',
      1 => 1470769267,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10107113757ab37b8972e18-60852596',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_57ab37b89761a4_73044361',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ab37b89761a4_73044361')) {function content_57ab37b89761a4_73044361($_smarty_tpl) {?><div class="box">
	<div class="box-header">
		<h3>Bienvenido </h3>
	</div>
	<div class="box-body">
		<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getNombreCompleto();?>

	</div>
</div><?php }} ?>