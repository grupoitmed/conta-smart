<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuraciones_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->library('session');
  }


public function edicion_medicamento($medicamento, $nombregenerico, $indicaciones, $ida){

	$datos = array(
		'medicamento' => $medicamento, 
		'ngenerico' => $nombregenerico, 
		'indicaciones' => $nombregenerico, 
	);

	$this->db->where('idmedicamento',$ida);
	if ($this->db->update('medicamentop',$datos)) {
		echo 0;
	}
}
public function eliminar($id){
	$this->db->where('idmedicamento',$id);
	if ($this->db->delete('medicamentop')) {
		echo 0;
	}
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


}
?>