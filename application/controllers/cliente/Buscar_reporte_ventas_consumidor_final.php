<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buscar_reporte_ventas_consumidor_final extends CI_Controller {

  public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		//$this->load->helper('administrador/cargar_ingresar_helper');
		$this->load->model('cliente/Buscar_reporte_cf_model');
	}
  public function index()
	{
    if($this->session->userdata('Administrador') || $this->session->userdata('Cliente') ) {
		$data['idempresa'] = $this->Buscar_reporte_cf_model->get_empresa();
  		$this->load->view('cliente/buscar_rconsumidorfinal',$data);
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
  
  public function imprimircf(){
	   $this->load->view('administracion/imprimibles/reporte_consumidor_final');
  }

}