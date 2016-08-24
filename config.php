<?php
define('SISTEMA', 'Ailatan');
define('VERSION', 'v 1.0');
define('ALIAS', '');
define('AUTOR', 'Hugo Luis Santiago Altamirano');
define('EMAIL', 'hugooluisss@gmail.com');
define('EMAILSOPORTE', 'hugooluisss@gmail.com');
define('STATUS', 'En desarrollo');

define('LAYOUT_DEFECTO', 'layout/default.tpl');
define('LAYOUT_AJAX', 'layout/update.tpl');
define('LAYOUT_JSON', 'layout/json.tpl');

#Login y su controlador
$conf['inicio'] = array(
	'descripcion' => '',
	'controlador' => 'ventas.php',
	'seguridad' => false,
	'vista' => 'inicio.tpl',
	#'js' => array('cliente.class.js'),
	'jsTemplate' => array('ventas.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['panelPrincipal'] = $conf['inicio'];

#Configuracion
$conf['configuracion'] = array(
	'controlador' => 'configuracion.php',
	'vista' => 'configuracion.tpl',
	'descripcion' => 'Configuración del sistema',
	'seguridad' => false,
	'jsTemplate' => array('configuracion.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['cconfiguracion'] = array(
	'controlador' => 'configuracion.php',
	'descripcion' => 'Controlador de configuración del sistema',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
	
$conf['listaVentas'] = array(
	'controlador' => 'ventas.php',
	'vista' => 'ventas/lista.tpl',
	'descripcion' => 'Lista de ventas',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
	
$conf['cventas'] = array(
	'controlador' => 'ventas.php',
	'descripcion' => 'Controlador de ventas',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
?>