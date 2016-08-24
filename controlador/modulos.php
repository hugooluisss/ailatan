<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaModulos':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from modulo");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'cmodulos':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TMod();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				$obj->setImporte($_POST['importe']);

				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TMod($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>