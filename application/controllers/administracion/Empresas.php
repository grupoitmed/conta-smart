<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends CI_Controller {

  public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
    //$this->load->helper('citas/ver_citas');
    /*$this->load->helper('citas/modals/procesar_cita');
    $this->load->helper('citas/modals/reprogramar_cita');
		$this->load->library('session');
    $this->load->model('citas/ver_citas_model');
    $this->load->helper('citas/modals/recordar_cita');*/
    $this->load->model('administracion/Empresa_model');
	$this->load->helper('administrador/empresas_registro_helper');
	}

  public function index()
	{
    if($this->session->userdata('Administrador') || $this->session->userdata('Operador') ) {
     // $data['sucursales'] = $this->ver_citas_model->cargar_sucursales();
  		$this->load->view('administracion/Empresas');
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
  public function saveEmpresa(){
    extract($_POST);
    return $this->Empresa_model->saveEmpresa($nrc,$nit,$giro,$direccion,$pais,$ncontacto,$telefono,$razonsocial,$email);
  }
  
  public function load_empresas_registro(){
	  return load_empresas_registro();
  }

}
