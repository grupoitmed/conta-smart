<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compra_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->library('session');
  }

public function compras($mes,$idproveedor, $fechacompra, $documento, $options,$tipo, $monto, $fovial, $coatrans, $creditof, $percepcion,$total,$idempresa,$iduser,$cesc){
  $fechacompra2= date('Y-m-d',strtotime($fechacompra));
	$datos = array(
		'idproveedor'=>$idproveedor,
		'fechacompra'=>$fechacompra2,
		'documento'=>$documento,
		'gravex'=>$options,
		'tipo'=>$tipo,
		'monto'=>$monto,
		'cesc'=>$cesc,
		'fovial'=>$fovial,
		'coatrans'=>$coatrans,
		'creditof'=>$creditof,
		'percepcion'=>$percepcion,
		'total'=>$total,
		'idempresa' =>$idempresa,
		'idusuario' =>$iduser,
		'fecha_tributaria' => $mes.'-01'
	);

	//$this->db->where('idmedicamento',$ida);
	if ($this->db->insert('compras',$datos)) {
		echo 0;
	}
}

public function verificar_proveedor_documento($idproveedor,$documento){
 	
	$this->db->where('idproveedor',$idproveedor);
	$this->db->where('documento',$documento);
	$query = $this->db->get('compras');
    $num = $query->num_rows();
	
	if($num>=1){
	 echo 1;
	}else{
		echo 0;
		}
		
	
 }


public function eliminar($id){
	$this->db->where('idmedicamento',$id);
	if ($this->db->delete('medicamentop')) {
		echo 0;
	}
}
// lab castellon
public function saveventa($tipofactura,$fecha,$cliente,$documento,$monto,$creditofiscal,$retencion,$percepcion,$valortotal,$idempresa){

	$datos = array(
			'tipofactura' => $tipofactura,
			'fecha' => $fecha,
			'cliente' => $cliente,
			'documento' => $documento,
			'monto' => $monto,
			'creditofiscal' => $creditofiscal,
			'retencion' => $retencion,
			'percepcion' => $percepcion,
			'valortotal' => $valortotal,
			'idempresa' => $idempresa,
	);
	if ($this->db->insert('ventas', $datos)) {
		echo 0;
	}
}
public function load_agentes_retencion(){
	$sql = $this->db->query("SELECT * FROM agentes_retencion where estado = 1");
	$option = '';
	foreach($sql->result_array() as $row){
		$option .= '<option value='.$row['id_agentes_retencion'].'>'.$row['nombre'].' - '.$row['nit'].'</option>';
	}
	echo $option;
}
public function listaproveedores(){
	$sql = $this->db->query("SELECT * FROM proveedores where estado = 0");
	$option = '';
	foreach($sql->result_array() as $row){
		$option .= '<option value='.$row['idproveedor'].'>'.$row['proveedor'].' - '.$row['nrc'].'</option>';
	}
	echo $option;
}
/// Imagenes

public function save_img($tipoimagen){
		$datos = array(
		'tipoimagen' => $tipoimagen
	);

	if ($this->db->insert('tiposimagenes',$datos)) {
		echo 0;
	}
}
public function edicion_imagenes($tipoimagen,$ida){
		$datos = array(
		'tipoimagen' => $tipoimagen,
	);

	$this->db->where('idtipoimagen',$ida);
	if ($this->db->update('tiposimagenes',$datos)) {
		echo 0;
	}
}
public function eliminar_imagen($id){
		$this->db->where('idtipoimagen',$id);
	if ($this->db->delete('tiposimagenes')) {
		echo 0;
	}
}

// Plantillas
 public function edicion_plantillas($plantilla,$ida){
$datos = array(
		'plantilla' => $plantilla,
	);

	$this->db->where('idplantilla',$ida);
	if ($this->db->update('medico_plantillas',$datos)) {
		echo 0;
	}
 }

  public function guardar_plantillas($tipoplantilla){

  	    if(isset($this->session->userdata['clinica']['idUsuario'])){
      $idusuario = $this->session->userdata['clinica']['idUsuario'];
    }else if(isset($this->session->userdata['administracion']['idUsuario'])){
      $idusuario = $this->session->userdata['administracion']['idUsuario'];
    }
		$datos = array(
			'idusuario' => $idusuario,
		'tipoplantilla' => $tipoplantilla,
	);
	if ($this->db->insert('medico_plantillas',$datos)) {
		echo 0;
	}
 }

 // usuarios

 public function edicion_usuarios($password,$nombre,$idrol,$idu){
 	$datos = array(
		'password' => $password,
		'nombre' => $nombre,
		'idrol' => $idrol,
	);

	$this->db->where('idUsuario',$idu);
	if ($this->db->update('usuarios',$datos)) {
		echo 0;
	}
 }


 public function eliminar_usuarios($id){
 	$datos = array(
		'estado' => 0
	);

	$this->db->where('idUsuario',$id);
	if ($this->db->update('usuarios',$datos)) {
		echo 0;
	}
 }
 
 public function listaMeses(){
	$hoy 			= date('d-m-Y');
	$mes_actual 	= date('n',strtotime($hoy));
	$año_actual 	= date('Y',strtotime($hoy));
	$ayer 			= date("d-m-Y",strtotime($hoy ."- 1 month"));
	$mes_anterior 	= date('n',strtotime($ayer));
	$año_anterior 	= date('Y',strtotime($ayer));
	$antier 		= date("d-m-Y",strtotime($ayer."- 1 month"));
	$mes_anterior2  = date("n",strtotime($antier));
	$año_anterior2  = date("Y",strtotime($antier));
	
	$tercermesatras 		= date("d-m-Y",strtotime($hoy."- 3 month"));
	$mes_anterior3  = date("n",strtotime($tercermesatras));
	$año_anterior3  = date("Y",strtotime($tercermesatras));
	
	$cuartomesatras 		= date("d-m-Y",strtotime($hoy."- 4 month"));
	$mes_anterior4  = date("n",strtotime($cuartomesatras));
	$año_anterior4  = date("Y",strtotime($cuartomesatras));
	
	$quintotomesatras 		= date("d-m-Y",strtotime($hoy."- 5 month"));
	$mes_anterior5  = date("n",strtotime($quintotomesatras));
	$año_anterior5  = date("Y",strtotime($quintotomesatras));
	
	$sextomesatras 		= date("d-m-Y",strtotime($hoy."- 6 month"));
	$mes_anterior6  = date("n",strtotime($sextomesatras));
	$año_anterior6  = date("Y",strtotime($sextomesatras));
	
	$sextimomesatras 		= date("d-m-Y",strtotime($hoy."- 7 month"));
	$mes_anterior7  = date("n",strtotime($sextimomesatras));
	$año_anterior7  = date("Y",strtotime($sextimomesatras));
	
	$octabomesatras 		= date("d-m-Y",strtotime($hoy."- 8 month"));
	$mes_anterior8  = date("n",strtotime($octabomesatras));
	$año_anterior8  = date("Y",strtotime($octabomesatras));
	
	$novenomesatras 		= date("d-m-Y",strtotime($hoy."- 9 month"));
	$mes_anterior9  = date("n",strtotime($novenomesatras));
	$año_anterior9  = date("Y",strtotime($novenomesatras));
	
	$decimomesatras 		= date("d-m-Y",strtotime($hoy."- 10 month"));
	$mes_anterior10  = date("n",strtotime($decimomesatras));
	$año_anterior10  = date("Y",strtotime($decimomesatras));
	
	$undecimomesatras 		= date("d-m-Y",strtotime($hoy."- 11 month"));
	$mes_anterior11  = date("n",strtotime($undecimomesatras));
	$año_anterior11  = date("Y",strtotime($undecimomesatras));
	
	
	$nmes	= array(1=>"ENERO",2=>"FEBRERO",3=>"MARZO",4=>"ABRIL",5=>"MAYO",6=>"JUNIO",7=>"JULIO",8=>"AGOSTO",9=>"SEPTIEMBRE",10=>"OCTUBRE",11=>"NOVIEMBRE",12=>"DICIEMBRE");
	$option = '';
	foreach($nmes AS $row => $valor){
		
		if($mes_anterior2 == $row){
			$option .= '<option value='.$año_anterior2.'-'.$row.'>'.$valor.' de '.$año_anterior2.'</option>';
		}
		if($mes_anterior3 == $row){
			$option .= '<option value='.$año_anterior3.'-'.$row.'>'.$valor.' de '.$año_anterior3.'</option>';
		}
		if($mes_anterior4 == $row){
			$option .= '<option value='.$año_anterior4.'-'.$row.'>'.$valor.' de '.$año_anterior4.'</option>';
		}
		if($mes_anterior5 == $row){
			$option .= '<option value='.$año_anterior5.'-'.$row.'>'.$valor.' de '.$año_anterior5.'</option>';
		}
		if($mes_anterior6 == $row){
			$option .= '<option value='.$año_anterior6.'-'.$row.'>'.$valor.' de '.$año_anterior6.'</option>';
		}
		if($mes_anterior7 == $row){
			$option .= '<option value='.$año_anterior7.'-'.$row.'>'.$valor.' de '.$año_anterior7.'</option>';
		}
		if($mes_anterior8 == $row){
			$option .= '<option value='.$año_anterior8.'-'.$row.'>'.$valor.' de '.$año_anterior8.'</option>';
		}
		if($mes_anterior9 == $row){
			$option .= '<option value='.$año_anterior9.'-'.$row.'>'.$valor.' de '.$año_anterior9.'</option>';
		}
		if($mes_anterior10 == $row){
			$option .= '<option value='.$año_anterior10.'-'.$row.'>'.$valor.' de '.$año_anterior10.'</option>';
		}
		if($mes_anterior11 == $row){
			$option .= '<option value='.$año_anterior11.'-'.$row.'>'.$valor.' de '.$año_anterior11.'</option>';
		}
		if($mes_anterior == $row){
			$option .= '<option value='.$año_anterior.'-'.$row.'>'.$valor.' de '.$año_anterior.'</option>';
		}
		if($mes_actual == $row){
			$option .= '<option value='.$año_actual.'-'.$row.' selected>'.$valor.' de '.$año_actual.'</option>';
		}
	}
	return $option;
}
public function eliminar_compra($idcompra){
	$datos = array(
			 'status' => 1
	);
	$this->db->where('idcompra',$idcompra);
	if ($this->db->update('compras',$datos)) {
		return 0;
	}else{
		return 1;
	}
}
public function actualizar_factura($array){
	extract($array);
	$datos = array(
			 'monto' => $monto,
			 'fovial' => $fovial,
			 'coatrans' => $coatrans,
			 'creditof' => $cf,
			 'cesc' => $cesc,
			 'percepcion' => $percepcion,
			 'total' => $valor_total
	);
	$this->db->where('idcompra',$idcompra);
	if ($this->db->update('compras',$datos)) {
		return 0;
	}else{
		return 1;
	}
}


}
?>
