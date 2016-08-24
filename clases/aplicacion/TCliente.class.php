<?php
/**
* TCliente
* Clientes o cuentas del sistema
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TCliente{
	private $idCliente;
	private $nombre;
	private $app;
	private $apm;
	private $nacimiento;
	private $email;
	private $telefono;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TCliente($id = ''){
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
		$rs = $db->Execute("select * from cliente where idCliente = ".$id);
		
		foreach($rs->fields as $field => $val)
			$this->$field = $val;
		
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
		return $this->idCliente;
	}
	
	/**
	* Establece el nombre
	*
	* @autor Hugo
	* @access public
	* @param string $val Nombre
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNombre($val = ""){
		$this->nombre = $val;
		return true;
	}
	
	/**
	* Retorna el nombre
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNombre(){
		return $this->nombre;
	}
	
	/**
	* Retorna el nombre completo
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNombreCompleto(){
		return $this->nombre. ' '.$this->app.' '.$this->apm;
	}
	
	/**
	* Establece el app
	*
	* @autor Hugo
	* @access public
	* @param string $val App
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setApp($val = ""){
		$this->app = $val;
		return true;
	}
	
	/**
	* Retorna el nombre
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getApp(){
		return $this->app;
	}
	
	/**
	* Establece el apm
	*
	* @autor Hugo
	* @access public
	* @param string $val Apm
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setApm($val = ""){
		$this->apm = $val;
		return true;
	}
	
	/**
	* Retorna el apm
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getApm(){
		return $this->apm;
	}
	
	/**
	* Establece la fecha de nacimiento
	*
	* @autor Hugo
	* @access public
	* @param string $val nacimiento
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNacimiento($val = ""){
		$this->nacimiento = $val;
		return true;
	}
	
	/**
	* Retorna la fecha de nacimiento
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNacimiento(){
		return $this->nacimiento;
	}
	
	/**
	* Establece el email
	*
	* @autor Hugo
	* @access public
	* @param string $val Email
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setEmail($val = ""){
		$this->email = $val;
		return true;
	}
	
	/**
	* Retorna el email
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getEmail(){
		return $this->email;
	}
	
	/**
	* Establece el telefono
	*
	* @autor Hugo
	* @access public
	* @param string $val tel
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setTelefono($val = ""){
		$this->telefono = $val;
		return true;
	}
	
	/**
	* Retorna el telefono
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getTelefono(){
		return $this->telefono;
	}
	
	/**
	* Guarda los datos en la base de datos
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO cliente(nombre) VALUES('".$this->getNombre()."');");
			if (!$rs) return false;
				
			$this->idCliente = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE cliente
			SET
				nombre = '".$this->getNombre()."',
				app = '".$this->getApp()."',
				apm = '".$this->getApm()."',
				nacimiento = '".$this->getNacimiento()."',
				email = '".$this->getEmail()."',
				telefono = '".$this->getTelefono()."'
			WHERE idCliente = ".$this->getId());
			
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
		$rs = $db->Execute("delete from cliente where idCliente = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>