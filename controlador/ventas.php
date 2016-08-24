<?php
global $objModulo;
switch($objModulo->getId()){
	case 'listaVentas':
		$db = TBase::conectaDB();
		
		$rs = $db->Execute("select folio, vendor, cliente, sum(total) as total from tabla_clientes group by folio");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("ventas", $datos);
	break;
	case 'cventas':
		switch($objModulo->getAction()){
			case 'generarTicket':
				require_once(getcwd()."/repositorio/pdf/ticket.php");				
				$obj = new RTicket();
				$db = TBase::conectaDB();
				$datos = array();
				$rs = $db->Execute("select * from tabla_clientes where folio = ".$_POST['folio']);
				$datos["head"] = $rs->fields;
				
				$rs2 = $db->Execute("select product_name, a.unidades, total from tabla_clientes a join tabla_productos b using(id_producto) where a.folio = ".$_POST['folio']);
				$datos["detalle"] = array();
				while(!$rs2->EOF){
					array_push($datos["detalle"], $rs2->fields);
					$rs2->moveNext();
				}
				
				$obj->generar($datos);
				$documento = $obj->Output();
				
				if ($documento == '')
					$result = array("doc" => "", "band" => false);
				else
					$result = array("doc" => $documento, "band" => true);
	
				print json_encode($result);
			break;
		}
	break;
}
?>