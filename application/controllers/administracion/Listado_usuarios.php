<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listado_usuarios extends CI_Controller {

  public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
    //$this->load->helper('citas/ver_citas');
    /*$this->load->helper('citas/modals/procesar_cita');
    $this->load->helper('citas/modals/reprogramar_cita');
		$this->load->library('session');
    $this->load->helper('citas/modals/recordar_cita');*/
    $this->load->helper("administrador/cargar_proveedor");
    $this->load->model('administracion/Usuarios_model');
    $this->load->helper("administrador/cargar_usuarios_helper");
	}
  public function index()
	{
    if($this->session->userdata('Administrador') || $this->session->userdata('Operador') ) {
     // $data['sucursales'] = $this->ver_citas_model->cargar_sucursales();
     $data['empresas'] = $this->Usuarios_model->listar_empresas();
  		$this->load->view('administracion/listado_usuario',$data);
    }
    else{
      if ($this->session->userdata('clinica')) {
        redirect('recepcion/index');
      }
      else if ($this->session->userdata('administracion')) {
        redirect('recepcion/index');
      }
      else{
        redirect('iniciar_sesion');
      }
    }
  }

  // public function InsertProvider(){
  //   extract($_POST);
  //   return $this->Proveedor_model->InsertProvider($proveedor,$nrc,$nit,$contacto,$telefono);
  // }


}
