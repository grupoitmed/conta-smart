<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deduccion extends CI_Controller {

  public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->model('administracion/deduccion_model');
		$this->load->helper('administrador/cargar_deducciones');
		$this->load->helper('administrador/modal/editar_deduccion');
	}
  public function index()
	{
    if($this->session->userdata('Administrador') || $this->session->userdata('Operador') ) {
		extract($_POST);
  		$this->load->view('administracion/deduccion');
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

	public function retenedor_form(){
		echo $this->deduccion_model->retenedor_form($_POST);
	}
  
	public function load_proveedores(){
		return $this->Compra_model->listaproveedores();
	}
	
	public function load_deduccion(){
		echo load_deduccion($_POST);
	}
	
	public function eliminar_educcion(){
		extract($_POST);
		return $this->deduccion_model->eliminar_educcion($tk);
	}
	public function editar_deduccion(){
		extract($_POST);
		echo editar_deduccion($tk);
	}
	public function actualizar_deduccion(){
		return $this->deduccion_model->actualizar_deduccion($_POST);
	}
	
	
	
	
	
	
	
}
