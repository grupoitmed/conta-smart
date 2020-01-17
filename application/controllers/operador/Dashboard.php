<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
	}

  public function index()
	{
    if($this->session->userdata('Administrador') || $this->session->userdata('Operador') ) {
  		$this->load->view('operador/Dashboard');
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
}
