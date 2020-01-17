<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deduccion_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->library('session');
  }

public function retenedor_form($array){
	extract($array);
	$datos = array(
			'fecha' 			=> date("Y-m-d",strtotime($fecha)),
			'fecha_documento'	=> date("Y-m-d",strtotime($fecha_document)),
			'fecha_aplicar' 	=> date("Y-m-d",strtotime($fecha_aplicar)),
			'numero_deduccion' 	=> $documento,
			'idempresa' 		=> $idempresa,
			'retencion' 		=> $monto,
			'agente_retenedor' 	=> $retenedor,
			'id_tipo_retenedor' => $tipo_retenedor,
			'monto' 			=> $retencion,
			'descripcion' 		=> $descripcion
	);
	if ($this->db->insert('deducciones',$datos)) {
		echo 0;
	}
}
public function eliminar_educcion($id){
	$data = array("estado"=>1);
	$this->db->where('id_deduccion',$id);
	if ($this->db->update('deducciones',$data)) {
		echo 0;
	}
}

public function actualizar_deduccion($array){
	extract($array);
	$datos = array(
			'fecha' 			=> date("Y-m-d",strtotime($fecha)),
			'fecha_documento'	=> date("Y-m-d",strtotime($fecha_documento)),
			'fecha_aplicar' 	=> date("Y-m-d",strtotime($fecha_aplicar)),
			'numero_deduccion' 	=> $documento,
			'agente_retenedor' 	=> $agente_retenedor,
			'id_tipo_retenedor' => $tipo_retenedor,
			'monto' 			=> $monto,
			'descripcion' 		=> $descripcion
	);
	$this->db->where('id_deduccion',$tk_deduccion);
	if ($this->db->update('deducciones',$datos)) {
		return 0;
	}else{
		return 1;
	}
}


}
?>
