<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->library('session');
  }

//----------- mes anterior -----------------
 public function iva_general(){
	 $fecha_actual = date('Y-m-d');
	 $fecha_menosmes = date("Y-m-d",strtotime($fecha_actual."- 1 month"));
	 
	 $mes_anterior = date('m',strtotime($fecha_menosmes));
	 $año_anterior = date('Y',strtotime($fecha_menosmes));

	$idempresa = $this->session->userdata['Cliente']['idempresa'];
	$sql = $this->db->query("SELECT SUM(credito_fiscal) credito_fiscal 
	FROM facturas WHERE MONTH(fecha)='".$mes_anterior."' and YEAR(fecha)='".$año_anterior."' 
	AND estado = 0 AND idempresa = '".$idempresa."'");
	foreach($sql->result_array() as $row){
		$iva_general = $row['credito_fiscal'];
	}
	return $iva_general;
 }
 //==========================================
 //----------- mes actual -----------------
  public function venta_mes(){
	 $fecha_actual = date('Y-m-d');
	 
	 $mes_actual = date('m',strtotime($fecha_actual));
	 $año_actual = date('Y',strtotime($fecha_actual));
	$idempresa = $this->session->userdata['Cliente']['idempresa'];
	$sql = $this->db->query("SELECT SUM(valor_total) valor_total 
	FROM facturas WHERE MONTH(fecha)='".$mes_actual."' and YEAR(fecha)='".$año_actual."' 
	AND estado = 0 AND idempresa = '".$idempresa."'");
	foreach($sql->result_array() as $row){
		$valor_total = $row['valor_total'];
	}
	return $valor_total;
 }
  //==========================================
   //----------- mes anterior -----------------
  public function venta_mes_anterior(){
	 $fecha_actual = date('Y-m-d');
	 $fecha_menosmes = date("Y-m-d",strtotime($fecha_actual."- 1 month"));
	 
	 $mes_anterior = date('m',strtotime($fecha_menosmes));
	 $año_anterior = date('Y',strtotime($fecha_menosmes));
	$idempresa = $this->session->userdata['Cliente']['idempresa'];
	$sql = $this->db->query("SELECT SUM(valor_total) valor_total 
	FROM facturas WHERE MONTH(fecha)='".$mes_anterior."' and YEAR(fecha)='".$año_anterior."' 
	AND estado = 0 AND idempresa = '".$idempresa."'");
	foreach($sql->result_array() as $row){
		$valor_total_anterior = $row['valor_total'];
	}
	return $valor_total_anterior;
 }
  //==========================================
 //-------- mes anterior --------------------
 public function iva_retenido(){
	 $fecha_actual = date('Y-m-d');
	 $fecha_menosmes = date("Y-m-d",strtotime($fecha_actual."- 1 month"));
	 
	 $mes_anterior = date('m',strtotime($fecha_menosmes));
	 $año_anterior = date('Y',strtotime($fecha_menosmes));
	$idempresa = $this->session->userdata['Cliente']['idempresa'];
	$sql = $this->db->query("SELECT SUM(retencion) retencion 
	FROM facturas WHERE MONTH(fecha)='".$mes_anterior."' and YEAR(fecha)='".$año_anterior."' 
	AND estado = 0 AND idempresa = '".$idempresa."'");
	foreach($sql->result_array() as $row){
		$retencion = $row['retencion'];
	}
	return $retencion;
 }
 //==========================================
 
  public function pago_cuenta(){
	 $fecha_actual = date('Y-m-d');
	 $fecha_menosmes = date("Y-m-d",strtotime($fecha_actual."- 1 month"));
	 
	 $mes_anterior = date('m',strtotime($fecha_menosmes));
	 $año_anterior = date('Y',strtotime($fecha_menosmes));
	 
	$idempresa = $this->session->userdata['Cliente']['idempresa'];
	$valor_total = 0;
	$sql = $this->db->query("SELECT SUM(valor_total) AS valor_total,
	SUM(credito_fiscal) AS credito_fiscal,
	SUM(retencion) AS retencion 
	FROM facturas 
	WHERE MONTH(fecha)='".$mes_anterior."' and YEAR(fecha)='".$año_anterior."' 
	AND idempresa = '".$idempresa."' AND estado = 0");
	foreach($sql->result_array() as $row){
		$valor_total = $row['valor_total'];
		$credito_fiscal = $row['credito_fiscal'];
		$retencion = $row['retencion'];
		$valor_total -=  $credito_fiscal ;
	}
	$iva_general = 0;
	$sql = $this->db->query("SELECT SUM(credito_fiscal) credito_fiscal FROM facturas 
	WHERE MONTH(fecha)='".$mes_anterior."' and YEAR(fecha)='".$año_anterior."' 
	AND idempresa = '".$idempresa."' AND estado = 0");
	foreach($sql->result_array() as $row){
		$iva_general = $row['credito_fiscal'];
	}
	$pagocuenta = 0;
	$sql = $this->db->query("SELECT pago_cuenta FROM empresas WHERE Idempresa = '".$idempresa."'");
	foreach($sql->result_array() as $row){
		$pagocuenta = $row['pago_cuenta'];
	}
	//=================== IVA DE COMPRAS ======================
	// $sql = $this->db->query("SELECT SUM(creditof) creditof FROM compras WHERE MONTH(fecha_tributaria)='".$mes_anterior."' and YEAR(fecha_tributaria)='".$año_anterior."' AND status =0 AND idempresa = '".$idempresa."'");
	// foreach($sql->result_array() as $row){
		// $iva_compras_general = $row['creditof'];
	// }
	// $iva_general1 = $iva_general - $iva_compras_general;
	//=========================================================
	$retencion = 0;
	$sql = $this->db->query("SELECT SUM(retencion) AS retencion 
	FROM facturas WHERE MONTH(fecha)='".$mes_anterior."' and YEAR(fecha)='".$año_anterior."' 
	AND estado = 0 AND idempresa = '".$idempresa."'");
	foreach($sql->result_array() as $row){
		$retencion = $row['retencion'];
	}
	$valor_retenciones = 0;
	$sql = $this->db->query("SELECT SUM(retencion) AS retencion 
	FROM deducciones WHERE MONTH(fecha_aplicar)='".$mes_anterior."' and YEAR(fecha_aplicar)='".$año_anterior."' 
	AND estado = 0 AND idempresa = '".$idempresa."'");
	foreach($sql->result_array() as $row){
		$valor_retenciones = $row['retencion'];
	}
	
	//=========================================================
	// echo $valor_total."<br/>";
	// $calculo = (((($valor_total-$valor_retenciones) + $retencion )- $iva_general) * $pagocuenta) - $this->retenciones();
	
	$calculo = (((($valor_total - $valor_retenciones)+$retencion)) * $pagocuenta)  ;
	return $calculo;
 }
  public function retenciones(){
	 $fecha_actual = date('Y-m-d');
	 $fecha_menosmes = date("Y-m-d",strtotime($fecha_actual."- 1 month"));
	 
	 $mes_anterior = date('m',strtotime($fecha_menosmes));
	 $año_anterior = date('Y',strtotime($fecha_menosmes));
	 
	$idempresa = $this->session->userdata['Cliente']['idempresa'];
	$valor_total = 0;
	$sql = $this->db->query("SELECT SUM(monto) valor_total FROM deducciones 
	WHERE MONTH(fecha_aplicar)='".$mes_anterior."' and YEAR(fecha_aplicar)='".$año_anterior."' 
	AND idempresa = '".$idempresa."' AND estado = 0");
	foreach($sql->result_array() as $row){
		$valor_total = $row['valor_total'];
	}
	
	return $valor_total;
 }
  //----------- mes actual -----------------
  public function compras_mes(){
	$fecha_actual = date('Y-m-d');
	 
	 $mes_actual = date('m',strtotime($fecha_actual));
	 $año_actual = date('Y',strtotime($fecha_actual));
	$idempresa = $this->session->userdata['Cliente']['idempresa'];
	$sql = $this->db->query("SELECT SUM(total) total FROM compras 
	WHERE MONTH(fecha_tributaria)='".$mes_actual."' and YEAR(fecha_tributaria)='".$año_actual."' 
	AND status =0 AND idempresa = '".$idempresa."'");
	foreach($sql->result_array() as $row){
		$compras_mes = $row['total'];
	}
	return $compras_mes;
 }
  //========================================
   public function compras_mes_anterior(){
	$fecha_actual = date('Y-m-d');
	 $fecha_menosmes = date("Y-m-d",strtotime($fecha_actual."- 1 month"));
	 
	 $mes_anterior = date('m',strtotime($fecha_menosmes));
	 $año_anterior = date('Y',strtotime($fecha_menosmes));
	$idempresa = $this->session->userdata['Cliente']['idempresa'];
	$sql = $this->db->query("SELECT SUM(total) total FROM compras 
	WHERE MONTH(fecha_tributaria)='".$mes_anterior."' and YEAR(fecha_tributaria)='".$año_anterior."' 
	AND status =0 AND idempresa = '".$idempresa."'");
	foreach($sql->result_array() as $row){
		$compras_mes_anterior = $row['total'];
	}
	return $compras_mes_anterior;
 }
 //------- mes anterior --------------------
  public function iva_compras_general(){
	$fecha_actual = date('Y-m-d');
	 $fecha_menosmes = date("Y-m-d",strtotime($fecha_actual."- 1 month"));
	 
	 $mes_anterior = date('m',strtotime($fecha_menosmes));
	 $año_anterior = date('Y',strtotime($fecha_menosmes));
	$idempresa = $this->session->userdata['Cliente']['idempresa'];
	$sql = $this->db->query("SELECT SUM(creditof) creditof FROM compras 
	WHERE MONTH(fecha_tributaria)='".$mes_anterior."' and YEAR(fecha_tributaria)='".$año_anterior."' 
	AND status =0 AND idempresa = '".$idempresa."'");
	foreach($sql->result_array() as $row){
		$iva_compras_general = $row['creditof'];
	}
	return $iva_compras_general;
 }
	//==========================================
	//------- mes anterior --------------------
	public function balance_iva(){
		$fecha_actual = date('Y-m-d');
		 $fecha_menosmes = date("Y-m-d",strtotime($fecha_actual."- 1 month"));
		 
		 $mes_anterior = date('m',strtotime($fecha_menosmes));
		 $año_anterior = date('Y',strtotime($fecha_menosmes));
		 
		$idempresa = $this->session->userdata['Cliente']['idempresa'];
		
		//iva de ventas
		$sql = $this->db->query("SELECT SUM(credito_fiscal) credito_fiscal FROM facturas 
		WHERE MONTH(fecha)='".$mes_anterior."' and YEAR(fecha)='".$año_anterior."' 
		AND estado = 0 AND idempresa = '".$idempresa."'");
		foreach($sql->result_array() as $row){
			$iva_general = $row['credito_fiscal'];
		}
		//iva de compras 
		$sql = $this->db->query("SELECT SUM(creditof) creditof FROM compras 
		WHERE MONTH(fecha_tributaria)='".$mes_anterior."' and YEAR(fecha_tributaria)='".$año_anterior."' 
		AND status =0 AND idempresa = '".$idempresa."'");
		foreach($sql->result_array() as $row){
			$iva_compras_general = $row['creditof'];
		}
		//iva retenido
		$sql = $this->db->query("SELECT SUM(retencion) retencion FROM facturas 
		WHERE MONTH(fecha)='".$mes_anterior."' and YEAR(fecha)='".$año_anterior."' 
		AND estado = 0 AND idempresa = '".$idempresa."'");
		foreach($sql->result_array() as $row){
			$retencion = $row['retencion'];
		}
		// calculo de balance
		$balance_iva = 0;
		$balance_iva = $iva_general - ($iva_compras_general + $retencion);
		return $balance_iva;
	
	}
	//==========================================
	public function get_mes_anterior(){
		$fecha_actual = date('d-m-Y');
		$fecha_menosmes = date("d-m-Y",strtotime($fecha_actual."- 1 month"));
		$mes=substr($fecha_menosmes,3,2);
		$ani=substr($fecha_menosmes,6,4);
		//valor numerico del mes
		$ml=date("n",strtotime($fecha_menosmes));
		//array convertir nombre mes al español
		$nmes=array(1=>"ENERO",2=>"FEBRERO",3=>"MARZO",4=>"ABRIL",5=>"MAYO",6=>"JUNIO",7=>"JULIO",8=>"AGOSTO",9=>"SEPTIEMBRE",10=>"OCTUBRE",11=>"NOVIEMBRE",12=>"DICIEMBRE");
		//asignando mes a letras
		$nm=$nmes[$ml];
		$fechatext = $nm.' de '.$ani;
		return $fechatext;
	}
	public function get_mes_actual(){
		$fecha_actual = date('d-m-Y');
		$mes=substr($fecha_actual,3,2);
		$ani=substr($fecha_actual,6,4);
		//valor numerico del mes
		$ml=date("n",strtotime($fecha_actual));
		//array convertir nombre mes al español
		$nmes=array(1=>"ENERO",2=>"FEBRERO",3=>"MARZO",4=>"ABRIL",5=>"MAYO",6=>"JUNIO",7=>"JULIO",8=>"AGOSTO",9=>"SEPTIEMBRE",10=>"OCTUBRE",11=>"NOVIEMBRE",12=>"DICIEMBRE");
		//asignando mes a letras
		$nm=$nmes[$ml];
		$fechatextactual = $nm.' de '.$ani;
		return $fechatextactual;
	}
}
?>
