<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class buscar_proveedor extends CI_Controller {

  public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
    //$this->load->helper('citas/ver_citas');
    /*$this->load->helper('citas/modals/procesar_cita');
    $this->load->helper('citas/modals/reprogramar_cita');
		$this->load->library('session');

    $this->load->helper('citas/modals/recordar_cita');*/
    $this->load->helper("administrador/cargar_proveedor");
    $this->load->model('administracion/Proveedor_model');
	}
  public function index()
	{
    if($this->session->userdata('Administrador') || $this->session->userdata('Operador') ) {
     // $data['sucursales'] = $this->ver_citas_model->cargar_sucursales();
  		$this->load->view('administracion/buscar_proveedor');
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
  //
  // public function InsertProvider(){
  //   extract($_POST);
  //   return $this->Proveedor_model->InsertProvider($proveedor,$nrc,$nit,$contacto,$telefono);
  // }

  public function buscar_proveedor(){
    $this->load->view('administracion/buscar_proveedor');
  }

  public function buscar_proveedores(){
    extract($_POST);
    return buscar_proveedores($datos);
  }

}
