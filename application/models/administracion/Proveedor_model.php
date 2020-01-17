<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->library('session');
  }

  public function InsertProvider($proveedor,$nrc,$nit,$contacto,$telefono,$giro){

  	$datos = array(
		'proveedor' => $proveedor,
		'nrc' => $nrc,
		'nit' => $nit,
		'giro' => $giro,
		'contacto' => $contacto,
		'telefono' => $telefono,

  	);

  	//$this->db->where('idmedicamento',$ida);
  	if ($this->db->insert('proveedores',$datos)) {
  		echo 0;
  	}else {
      echo 1;
    }
  }

public function proveedor($medicamento, $nombregenerico, $indicaciones, $ida){

	$datos = array(
			 'proveedor' => $proveedor,
			 'nrc' => $nrc,
			 'contacto' => $contacto,
			 'telefono' => $telefono,
			 'nit' => $nit,
	);

	//$this->db->where('idmedicamento',$ida);
	if ($this->db->insert('proveedores',$datos)) {
		echo 0;
	}
}

// Plantillas
 public function updateproveedor($proveedor,$nrc,$nit,$contacto,$telefono,$giro,$idproveedor){
	$datos = array(
			 'proveedor' => $proveedor,
			 'nrc' => $nrc,
			 'contacto' => $contacto,
			 'telefono' => $telefono,
			 'nit' => $nit,
	);

	$this->db->where('idproveedor',$idproveedor);
	if ($this->db->update('proveedores',$datos)) {
		echo 0;
	}else{
		echo 1;
	}
 }



}
?>
