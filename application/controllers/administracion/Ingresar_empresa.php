<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingresar_empresa extends CI_Controller {

  public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->helper('administrador/cargar_ingresar_helper');
	}
  public function index()
	{
    if($this->session->userdata('Administrador') || $this->session->userdata('Operador') ) {
  		$this->load->view('administracion/ingresar_empresa');
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
	
	if(isset($lugar)){$lugar=$lugar;}else{$lugar=0;}
	
    return seach_company($datos,$lugar);
  }

}
