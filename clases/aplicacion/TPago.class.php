<?php
/**
* TPago
* Pago de una poliza
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TPago{
	private $idPago;
	public $poliza;
	private $fecha;
	private $importe;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TPago($id = ''){
		$this->poliza = new TPoliza;
		$this->setId($id);		
		return true;
	}
	
	/**
	* Carga los datos del objeto
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from pago where idPago = ".$id);
		
		foreach($rs->fields as $field => $val){
			switch($field){
				case 'idPoliza':
					$this->poliza = new TPoliza($val);
				break;
				default:
					$this->$field = $val;
			}
		}
		
		return true;
	}
	
	/**
	* Retorna el identificador del objeto
	*
	* @autor Hugo
	* @access public
	* @return integer identificador
	*/
	
	public function getId(){
		return $this->idPago;
	}
	
	/**
	* Establece la fecha y hora en la que se hizo
	*
	* @autor Hugo
	* @access public
	* @param string $val Nombre
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setFecha($val = ""){
		$this->fecha = $val == ''?date("Y-m-d H:i:s"):$val;
		return true;
	}
	
	/**
	* Retorna el momento en el que se hizo el pago
	*
	* @autor Hugo
	* @access public
	* @return date Texto
	*/
	
	public function getFecha(){
		return $this->fecha;
	}
	
	/**
	* Establece el importe a pagar
	*
	* @autor Hugo
	* @access public
	* @param float $val Importe a pagar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setImporte($val = 0){
		$this->importe = $val;
		return true;
	}
	
	/**
	* Retorna el importe
	*
	* @autor Hugo
	* @access public
	* @return float Importe
	*/
	
	public function getImporte(){
		if ($this->importe == '')
			return $this->poliza->modulo->getImporte();
			
		return $this->importe;
	}
	
	/**
	* Guarda los datos en la base de datos
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->poliza->getId() == '') return false;
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO pago(idPoliza, fecha) VALUES(".$this->poliza->getId().", now());");
			if (!$rs) return false;
				
			$this->idPago = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE pago
			SET
				fecha = '".$this->getFecha()."',
				importe = ".$this->getImporte()."
			WHERE idPago = ".$this->idPago);
			
		if ($rs){
			if($this->poliza->setUltimoPago($this->getFecha())){
				$rs = $db->Execute("update pago set inicio = '".$this->poliza->getUltimoPago()."', fin = '".$this->poliza->getSiguientePago()."' where idPago = ".$this->getId());
				
				return $rs?true:false;
			}
			
			return false;
		}
			
		return $rs?true:false;
	}
	
	/**
	* Elimina el objeto de la base de datos
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("delete from pago where idPago = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>