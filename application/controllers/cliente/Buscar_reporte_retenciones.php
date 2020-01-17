<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buscar_reporte_retenciones extends CI_Controller {

  public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
	}
	public function index(){
		if($this->session->userdata('Administrador') || $this->session->userdata('Cliente') ) {
			$this->load->view('cliente/buscar_reporte_retenciones');
		}else{
			if ($this->session->userdata('clinica')) {
				redirect('recepcion/index');
			}else if ($this->session->userdata('administracion')) {
				redirect('recepcion/index');
			}else{
				redirect('iniciar_sesion');
			}
		}
	}
  
  public function imprimir(){
	   $this->load->view('administracion/imprimibles/buscar_reporte_retenciones');
  }

}