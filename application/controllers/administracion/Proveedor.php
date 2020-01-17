<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor extends CI_Controller {

  public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->helper("administrador/cargar_proveedor");
		$this->load->model('administracion/Proveedor_model');
	    $this->load->helper("administrador/modal/editar_proveedor_helper");
	}
  public function index()
	{
    if($this->session->userdata('Administrador') || $this->session->userdata('Operador') ) {
  		$this->load->view('administracion/proveedores');
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

  public function InsertProvider(){
    extract($_POST);
    return $this->Proveedor_model->InsertProvider($proveedor,$nrc,$nit,$contacto,$telefono,$giro);
  }
  
  public function editar_proveedor(){
	  extract($_POST);
	  return editar_proveedor($id);
  }
  
  public function updateproveedor(){
	  extract($_POST);
	  return $this->Proveedor_model->updateproveedor($proveedor,$nrc,$nit,$contacto,$telefono,$giro,$idproveedor);
  }

}
