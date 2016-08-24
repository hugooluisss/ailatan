<?php
/**
* TPoliza
* Poliza
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TPoliza{
	public $modulo;
	public $cliente;
	private $beneficiarios;
	private $ultimopago;
	private $siguientepago;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TPoliza($id = ''){
		$this->cliente = new TCliente;
		$this->modulo = new TMod;
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
		$rs = $db->Execute("select * from poliza where idPoliza = ".$id);
		
		foreach($rs->fields as $field => $val){
			switch($field){
				case 'idCliente':
					$this->cliente = new TCliente($val);
				break;
				case 'idModulo':
					$this->modulo = new TMod($val);
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
		return $this->idPoliza;
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
		$this->fecha = $val == ''?date("Y-m-d H:i:s"):$this->fecha;
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
	* Establece los beneficiarios
	*
	* @autor Hugo
	* @access public
	* @param string $val Nombre
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setBeneficiarios($val = ""){
		$this->beneficiarios = $val;
		return true;
	}
	
	/**
	* Retorna los beneficiarios
	*
	* @autor Hugo
	* @access public
	* @return date Texto
	*/
	
	public function getBeneficiarios(){
		return $this->beneficiarios;
	}
	
	/**
	* Establece la fecha del siguiente pago
	*
	* @autor Hugo
	* @access public
	* @param date $val Fecha del próximo pago
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setSiguientePago($val = ''){
		$this->siguientepago = $val;
		
		return true;
	}
	
	/**
	* Retorna la fecha en la que se debe de hacer el siguiente pago
	*
	* @autor Hugo
	* @access public
	* @return float Importe
	*/
	
	public function getSiguientePago(){
		return $this->siguientepago;
	}
	
	/**
	* Establece la fecha del último pago
	*
	* @autor Hugo
	* @access public
	* @param date $val Fecha del próximo pago
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setUltimoPago($val = ''){
		if ($val == '') return false;
		if ($this->getId() == '') return false;
		
		$actual = new DateTime($this->getSiguientePago()); #17-09
		$nuevo = new DateTime($val); #17-08
		
		if($nuevo->diff($actual) >= 0){
			$this->ultimopago = $nuevo->format("Y-m-d");
			$nuevo->modify("+1 months");
			$this->siguientepago = $nuevo->format("Y-m-d");
		}else{
			$nuevo = new DateTime();
			
			$this->ultimopago = $nuevo->format("Y-m-d");
			$nuevo->modify("+1 months");
			$this->siguientepago = $nuevo->format("Y-m-d");
		}
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("update poliza set ultimopago = '".$this->ultimopago." ".date("H:i:s")."', siguientepago = '".$this->siguientepago."' where idPoliza = ".$this->getId());
		
		return true;
	}
	
	/**
	* Retorna la fecha en la que se debe de hacer el siguiente pago
	*
	* @autor Hugo
	* @access public
	* @return float Importe
	*/
	
	public function getUltimoPago(){
		return $this->ultimopago;
	}
	
	/**
	* Guarda los datos en la base de datos
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->cliente->getId() == '') return false;
		if ($this->modulo->getId() == '') return false;
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO poliza(idModulo, idCliente, creada) VALUES(".$this->modulo->getId().", ".$this->cliente->getId().", now());");
			if (!$rs) return false;
				
			$this->idPoliza = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE poliza
			SET
				idModulo = '".$this->modulo->getId()."',
				cliente = ".$this->getImporte()."
				beneficiarios = '".$this->getBeneficiarios()."'
				
			WHERE idPoliza = ".$this->getId());
			
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
		$rs = $db->Execute("delete from poliza where idPoliza = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>