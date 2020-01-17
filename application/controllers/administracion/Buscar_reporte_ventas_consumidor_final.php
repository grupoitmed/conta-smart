<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buscar_reporte_ventas_consumidor_final extends CI_Controller {

  public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		//$this->load->helper('administrador/cargar_ingresar_helper');
		$this->load->model('administracion/Usuarios_model');
	}
  public function index()
	{
    if($this->session->userdata('Administrador') || $this->session->userdata('Operador') ) {
  		$this->load->view('administracion/buscar_rconsumidorfinal');
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
  public function listar_empresas(){
    echo $this->Usuarios_model->listar_empresas();
  }
}