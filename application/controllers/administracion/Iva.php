<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iva extends CI_Controller {

  public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->helper('administrador/cargar_empresas_iva_helper');
		$this->load->helper('administrador/modal/editar_empresa_model_helper');
		// $this->load->model('administracion/Iva_model');
	}
  public function index()
	{
    if($this->session->userdata('Administrador') || $this->session->userdata('Operador') ) {
     // $data['sucursales'] = $this->ver_citas_model->cargar_sucursales();
  		$this->load->view('administracion/iva');
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

  public function buscar_empresa(){
    extract($_POST);
    return seach_company($datos);
  }


}
