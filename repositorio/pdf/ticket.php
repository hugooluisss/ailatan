<?php
//require_once('Image_Barcode-1.1.0/Barcode.php');
/*
 * Created on 11/02/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class RTicket extends tFPDF{
	private $configuracion;
	public function RTicket(){
		parent::tFPDF('P', 'mm', array(60, 200));
		$this->AddFont('Sans','', 'DejaVuSans.ttf', true);
		$this->AddFont('Sans','B', 'DejaVuSans-Bold.ttf', true);
		$this->AddFont('Sans','U', 'DejaVuSans-Oblique.ttf', true);
		$this->AddFont('Sans','BU', 'DejaVuSans-BoldOblique.ttf', true);
		$this->cleanFiles();
		$this->SetMargins(2, 0, 2);
		
		$this->getConfiguracion();
		$this->configuracion["tamañoFuente"] = 8;
		$this->configuracion["saltoCaracteresDetalle"] = 23;
		/* Configuracion */
	}	
	
	public function getConfiguracion(){
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from configuracion");
		$this->configuracion = array();
		while(!$rs->EOF){
			$this->configuracion[$rs->fields['clave']] = $rs->fields['valor'];
			
			$rs->moveNext();
		}
		
		return true;
	}
	
	public function generar($datos){
		$this->AddPage();
		
		$this->SetFont('Arial', '', $this->configuracion['tamañoFuente']);
    	$this->Image('repositorio/formato/logo.jpg', 0, 0, 60, 40);    	
		$this->Ln(40);
		
		$this->Cell(0, 3, utf8_decode(strtoupper($this->configuracion['giro'])), 0, 1, 'C');
		$this->Cell(0, 3, utf8_decode(strtoupper("TELF: ".$this->configuracion['telefono'])." **** "."CIF: ".$this->configuracion['cif']), 0, 1, 'C');
		$this->Cell(0, 3, utf8_decode($this->configuracion['web']), 0, 1, 'C');
		
		$this->Cell(0, 3, utf8_decode("FACTURA PROVISIONAL"), 0, 1, 'C');
		
		$this->SetFont('Arial', 'B', $this->configuracion['tamañoFuente']);
		
		
		
		$this->Cell(0, 3, utf8_decode("Mesa:  ".strtoupper($datos["head"]['cliente'])), 0, 1, 'C');
		
		$this->SetFont('Arial', '', $this->configuracion['tamañoFuente']);
		$this->Cell(0, 3, "=================================", 0, 1, 'C');
		$this->Ln(3);
		$subtotal = 0;
		foreach($datos['detalle'] as $el){
			$x = $this->GetX();
			$y = $this->GetY();
			
			$this->MultiCell(40, 3, $el['product_name'], 0);
			$this->SetXY($x+40, $y);
			$this->Cell(0, 3, sprintf("%0.2f", $el['total']), 0, 0, 'R');
			$longitud = strlen($el['product_name']);
			$this->Ln(3 * (($longitud / $this->configuracion['saltoCaracteresDetalle'] + ($longitud / $this->configuracion['saltoCaracteresDetalle'] > 0?1:0))));
			
			$subtotal += $el['total'];
		}
		
		$this->Ln(3);
		$this->Cell(0, 3, "=================================", 0, 1, 'C');
		$this->SetFont('Arial', 'B', $this->configuracion['tamañoFuente'] + 4);
		$this->Cell(40, 3, "Total", 0, 0, 'L');
		$this->Cell(0, 3, sprintf("%0.2f", $subtotal), 0, 1, 'R');
		
		$this->SetFont('Arial', '', $this->configuracion['tamañoFuente']);
		
		if ($datos['head']['IVA'] == 0){
			$this->Cell(40, 3, "Neto", 0, 0, 'L');
			$this->Cell(0, 3, sprintf("%0.2f", $subtotal * 1.16), 0, 1, 'R');
			
			$this->Cell(40, 3, "IVA 16%", 0, 0, 'L');
			$this->Cell(0, 3, sprintf("%0.2f", $subtotal * 0.16), 0, 1, 'R');
		}
		
		$this->Ln(5);
		$this->Cell(0, 3, utf8_decode("Fecha: ".$datos['head']['fechas']." Hora: ".$datos['head']['time']), 0, 1, 'C');
		$this->Cell(0, 3, utf8_decode("GRACIAS POR SU VISITA * THANK YOU"), 0, 1, 'C');
		$this->Cell(0, 3, utf8_decode("Les Atendio: ".$datos['head']['vendor']), 0, 1, 'C');
	}
	
	function Footer(){
	}
	
	private function getMes($mes){
		switch($mes){
			case 1: return "Enero";
			case 2: return "Febrero";
			case 3: return "Marzo";
			case 4: return "Abril";
			case 5: return "Mayo";
			case 6: return "Junio";
			case 7: return "Julio";
			case 8: return "Agosto";
			case 9: return "Septiembre";
			case 10: return "Octubre";
			case 11: return "Noviembre";
			case 12: return "Diciembre";
		}
		
		return '';
	}
	
	private function cleanFiles(){
    	$t = time();
    	$dir = "temporal";
    	$h = opendir($dir);
    	while($file=readdir($h)){
        	if(substr($file,0,3)=='tmp' && substr($file,-4)=='.pdf'){
            	$path = $dir.'/'.$file;
            	if($t-filemtime($path)>3600)
                	@unlink($path);
        	}
    	}
    	closedir($h);
	}
	
	public function Output(){
		$file = "temporal/".basename(tempnam("temporal/", 'tmp'));
		rename($file, $file.'.pdf');
		$file .= '.pdf';
		$this->cleanFiles();
		parent::Output($file, 'F');
		chmod($file, 0555);
		//header('Location: temporal/'.$file);
		
		return $file;
	}
}
?>