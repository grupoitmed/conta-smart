<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->library('session');
  }


public function guardarusuarios($idempresa,$nombre,$name,$password,$rol){
	
	$idempresa2= 0;
	$query = $this->db->query("SELECT * FROM empresas WHERE MD5(Idempresa) = '$idempresa'");
    foreach($query->result_array() as $row){
		$idempresa2= $row["Idempresa"];
    }

	$datos = array(
		'nombre' => $nombre,
		'usuario' => $name,
		'password' => $password,
		'idrol' => $rol,
		'idempresa' => $idempresa2,
		'estado' => 1
	);

	if ($this->db->insert('usuarios',$datos)) {
		echo 0;
	}
}

public function listar_empresas(){
    $options = '';
    $query = $this->db->query("SELECT * FROM empresas WHERE estado = 0");
    foreach($query->result_array() as $row){
        $options.= '<option value="'.md5($row['Idempresa']).'">'.$row['razonsocial'].'  - '.$row['nrc'].'</option>';
    }
	return $options;
}

public function cargar_datos_empresas($datos){
  $query = $this->db->query("SELECT * FROM empresas WHERE estado = 0 AND idempresa = ".$datos."");
    $json[] = '';
  foreach($query->result_array() as $row){
    $json = array('nombre' => $row['email']);
  }
  echo json_encode($json);
}

public function SaveUser($usuario,$idempresa,$nombre,$name,$password,$rol){
  $datos = array(
		'idempresa' => $idempresa,
		'nombre' => $nombre,
		'usuario' => $name,
		'password' => $password,
		'idrol' => $rol
	);

	if ($this->db->insert('usuarios',$datos)) {
		echo 0;
	}else {
    echo 1;
  }
}

public function update_usuario($idempresa,$nombre,$name,$password,$rol,$idusuario){
	  $datos = array(
		'idempresa' => $idempresa,
		'nombre' => $nombre,
		'usuario' => $name,
		'password' => $password,
		'idrol' => $rol
	);
	$this->db->where('idUsuario',$idusuario);
	if ($this->db->update('usuarios',$datos)) {
		echo 0;
	}else {
    echo 1;
	}
}


}
?>
