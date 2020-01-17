<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iniciar_sesion_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
     // $this->load->model('vitacora_model');

  }
  var $datos;
 public function validar_usuario($usuario,$password){
    $this->db->select('*');
    $this->db->from('usuarios');
    $this->db->join('roles', 'usuarios.idrol = roles.Id');
    $this->db->where('usuarios.usuario',$usuario);
    $this->db->where('usuarios.password',$password);
    $this->db->where('usuarios.estado',1);
    $query = $this->db->get()->result();
    if ( is_array($query) && count($query) == 1 ) {
        // Set the users details into the $details property of this class
        $this->datos = $query[0];
        // Call set_session to set the user's session vars via CodeIgniter
        if($this->datos->rol == "Administrador"){
          $this->set_session_administrador();
        }else if($this->datos->rol == "Operador"){
          $this->set_session_operador();
        }
        else if($this->datos->rol == "Cliente"){
          $this->set_session_cliente();
        }
        return $this->datos->rol;
    }else{
    	return false;
    }
  }

  private function set_session_administrador() {
    $query_institucion = $this->db->query("SELECT * FROM empresas");
    foreach ($query_institucion->result_array() as $row_institucion) {
      $nombre_empresa = $row_institucion['razonsocial'];
      $logo_empresa = $row_institucion['logo'];
    }
    $this->session->set_userdata('Administrador',array(
            'idUsuario'=> $this->datos->idUsuario,
            'usuario'=> $this->datos->usuario,
            'password' => $this->datos->password,
            'idrol' => $this->datos->idrol,
            'fecha_ulti_ingreso' => $this->datos->fecha_ulti_ingreso,
            'idempresa' => $this->datos->idempresa,
            'estado' => $this->datos->estado,
            'menu'=> $this->datos->menu,
			'nombre'=> $this->datos->nombre

          )
    );
    $accion = "Inició sesión.";
  //  $this->vitacora_model->vitacora_2($accion);
  }

  private function set_session_operador() {
    $query_institucion = $this->db->query("SELECT * FROM empresas");
    foreach ($query_institucion->result_array() as $row_institucion) {
      $nombre_empresa = $row_institucion['razonsocial'];
      $logo_empresa = $row_institucion['logo'];
    }
    $this->session->set_userdata('Operador',array(
            'idUsuario'=> $this->datos->idUsuario,
            'usuario'=> $this->datos->usuario,
            'password' => $this->datos->password,
            'idrol' => $this->datos->idrol,
            'fecha_ulti_ingreso' => $this->datos->fecha_ulti_ingreso,
            'idempresa' => $this->datos->idempresa,
            'estado' => $this->datos->estado,
            'menu'=> $this->datos->menu,
			'nombre'=> $this->datos->nombre
          )
    );
    $accion = "Inició sesión.";
    //$this->vitacora_model->vitacora_2($accion);
  }

  private function set_session_cliente() {
    $query_institucion = $this->db->query("SELECT * FROM empresas");
    foreach ($query_institucion->result_array() as $row_institucion) {
      $nombre_empresa = $row_institucion['razonsocial'];
      $logo_empresa = $row_institucion['logo'];
    }
    $this->session->set_userdata('Cliente',array(
            'idUsuario'=> $this->datos->idUsuario,
            'usuario'=> $this->datos->usuario,
            'password' => $this->datos->password,
            'idrol' => $this->datos->idrol,
            'fecha_ulti_ingreso' => $this->datos->fecha_ulti_ingreso,
            'idempresa' => $this->datos->idempresa,
            'estado' => $this->datos->estado,
            'menu'=> $this->datos->menu,
			'nombre'=> $this->datos->nombre
          )
    );
    $accion = "Inició sesión.";
    //$this->vitacora_model->vitacora_2($accion);
  }

}
?>
