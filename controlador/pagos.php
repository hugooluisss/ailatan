<?php
global $objModulo;
switch($objModulo->getId()){
	case 'pagos':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from cliente");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("listaClientes", $datos);
	break;
	case 'listaPagos':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select a.*, concat(c.nombre, ' ', app, ' ', apm) as cliente, d.nombre as modulo from pago a join poliza b using(idPoliza) join cliente c using(idCliente) join modulo d using(idModulo)");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'listaPolizasCliente':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from poliza where idCliente = ".$_POST['cliente']);
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("lista", $datos);
	break;
	case 'cpagos':
		switch($objModulo->getAction()){
			case 'add':
				$obj = new TPago($_POST['id']);
				
				$obj->poliza = new TPoliza($_POST['poliza']);
				$obj->setFecha($_POST['fecha']);
				$obj->setImporte($_POST['importe']);

				echo json_encode(array("band" => $obj->guardar()));
			break;
			case 'del':
				$obj = new TPago($_POST['id']);
				echo json_encode(array("band" => $obj->eliminar()));
			break;
		}
	break;
	case 'cwebhooks':
		$data = json_decode(file_get_contents('php://input'));
		
		$filename = "webhooks".date("Y-m-d").".txt";
		$handle = fopen($filename, 'a+');
		fwrite($handle, date("H:i:s ---- ").print_r($data, true).PHP_EOL);
		
		switch($data->type){
			case 'charge.succeeded': #cuando un cargo a sucedido
				$orden = json_decode($data->transaction->order_id);
				$orden = $orden->id;
				$obj = $data->transaction;
				#primero tengo que buscar a quien pertenece, para esto tenemos el order ID, el cual guarda un registro en carrito
				$db = TBase::conectaDB();
				$rs = $db->Execute("select * from carrito where id = ".$orden);
				
				$rs2 = $db->Execute("select * from cliente where email = '".$rs->fields['t_email']."'");
				if ($rs2->EOF){
					$objCliente = new TCliente();
					$objCliente->setNombre($rs->fields['t_nombre']);
					$objCliente->setApp($rs->fields['t_apellido_p']);
					$objCliente->setApm($rs->fields['t_apellido_m']);
					$objCliente->setNacimiento($rs->fields['t_fecha_nacimiento']);
					$objCliente->setEmail($rs->fields['t_email']);
					$objCliente->setTelefono($rs->fields['t_telefono']);
					
					$objCliente->guardar();
					
				}else
					$objCliente = new TCliente($rs2->fields['idCliente']);
				
				if ($objCliente->getId() <> ''){
					$rs2 = $db->Execute("select * from poliza where idCliente = ".$objCliente->getId()." and idModulo = ".$rs->fields['modulo']);
					
					if ($rs2->EOF){
						$objPoliza = new TPoliza();
						$objPoliza->setFecha();
						$objPoliza->cliente = $objCliente;
						$objPoliza->modulo = new TMod($rs->fields['modulo']);
						$objPoliza->setBeneficiarios($rs->fields['beneficiarios']);
						$objPoliza->setSiguientePago(date("Y-m-d"));
						$objPoliza->guardar();
					}
				}
				
				if (!$rs->EOF){
					$rs = $db->Execute("select idCliente, idPoliza from cliente a join poliza b using(idCliente) where email = '".$rs->fields['t_email']."' and idModulo = ".$rs->fields['modulo']);
					
					if (!$rs->EOF){
						$pago = new TPago();
						$pago->poliza = new TPoliza($rs->fields['idPoliza']);
						$pago->setFecha($pago->poliza->getSiguientePago());
						$pago->setImporte($obj->amount);
						
						$pago->guardar();
						
						#con esto aseguro que no se pueda cambiar
						$db->Execute("update carrito set status = 1 where id = ".$orden);
					}
				}
			break;
		}
		
		fclose($handle);
	break;
}
?>