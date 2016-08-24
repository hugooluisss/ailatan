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
	'seguridad' => false,
	'vista' => 'usuarios/bienvenida.tpl',
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('login.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['logout'] = array(
	'controlador' => 'login.php',
	'descripcion' => 'Salir del sistema',
	'seguridad' => false,
	'js' => array(),
	'capa' => LAYOUT_DEFECTO);
	
$conf['clogin'] = array(
	'controlador' => 'login.php',
	'descripcion' => 'Inicio de sesion',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
	
$conf['bienvenida'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/bienvenida.tpl',
	'descripcion' => 'Bienvenida al sistema',
	'seguridad' => true,
	'capa' => LAYOUT_DEFECTO);

$conf['admonUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Administración de usuarios',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('usuarios.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/lista.tpl',
	'descripcion' => 'Lista de usuarios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cusuarios'] = array(
	'controlador' => 'usuarios.php',
	'descripcion' => 'Controlador de usuarios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
/*Datos de usuario desde el panel*/
$conf['usuarioDatosPersonales'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/datosPersonales.tpl',
	'descripcion' => 'Cambiar datos personales',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('datosUsuario.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['admonUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Administración de usuarios',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('usuarios.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['panelPrincipal'] = array(
	#'controlador' => 'index.php',
	'vista' => 'inicio.tpl',
	'descripcion' => 'Vista del panel',
	'seguridad' => true,
	'js' => array(),
	'capa' => LAYOUT_DEFECTO);

#Módulos
$conf['modulos'] = array(
	'controlador' => 'modulos.php',
	'vista' => 'modulos/panel.tpl',
	'descripcion' => 'Administración de modulos',
	'seguridad' => true,
	'js' => array('modulo.class.js'),
	'jsTemplate' => array('modulos.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaModulos'] = array(
	'controlador' => 'modulos.php',
	'vista' => 'modulos/lista.tpl',
	'descripcion' => 'Lista de modulos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cmodulos'] = array(
	'controlador' => 'modulos.php',
	'descripcion' => 'Controlador de modulos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

#Clientes
$conf['clientes'] = array(
	'controlador' => 'clientes.php',
	'vista' => 'clientes/panel.tpl',
	'descripcion' => 'Administración de clientes',
	'seguridad' => true,
	'js' => array('cliente.class.js'),
	'jsTemplate' => array('clientes.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaClientes'] = array(
	'controlador' => 'clientes.php',
	'vista' => 'clientes/lista.tpl',
	'descripcion' => 'Lista de clientes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cclientes'] = array(
	'controlador' => 'clientes.php',
	'descripcion' => 'Controlador de clientes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaClientePolizas'] = array(
	'controlador' => 'clientes.php',
	'vista' => 'clientes/listaPolizas.tpl',
	'descripcion' => 'Lista de polizas de un cliente',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
#Pagos
$conf['pagos'] = array(
	'controlador' => 'pagos.php',
	'vista' => 'pagos/panel.tpl',
	'descripcion' => 'Administración de pagos',
	'seguridad' => true,
	'js' => array('pago.class.js', 'cliente.class.js'),
	'jsTemplate' => array('pagos.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaPagos'] = array(
	'controlador' => 'pagos.php',
	'vista' => 'pagos/lista.tpl',
	'descripcion' => 'Lista de pagos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cpagos'] = array(
	'controlador' => 'pagos.php',
	'descripcion' => 'Controlador de pagos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaClientesPagos'] = array(
	'controlador' => 'clientes.php',
	'vista' => 'clientes/lista.tpl',
	'descripcion' => 'Lista de clientes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cwebhooks'] = array(
	'controlador' => 'pagos.php',
	'descripcion' => 'Controlador de confirmación de pagos con openpay',
	'seguridad' => false,
	'capa' => LAYOUT_AJAX);
	
#Módulos
$conf['recordatorioMail'] = array(
	#'controlador' => 'reportes.php',
	'vista' => 'reportes/recordatorios.tpl',
	'descripcion' => 'Recordatorios a pagar',
	'seguridad' => true,
	'jsTemplate' => array('recordatorios.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaRecordatorios'] = array(
	'controlador' => 'reportes.php',
	'vista' => 'reportes/listaRecordatorios.tpl',
	'descripcion' => 'Lista de recordatorios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['creportes'] = array(
	'controlador' => 'reportes.php',
	'descripcion' => 'Controlador de recordatorios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
?>