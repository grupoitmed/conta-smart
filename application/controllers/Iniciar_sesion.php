<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iniciar_sesion extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->library('session');
    	$this->load->model('iniciar_sesion_model');
	}
	public function index()
	{
    if ($this->session->userdata('Administrador')) {
			redirect('administracion/Dashboard');
		}else if ($this->session->userdata('Operador')) {
			redirect('operador/Dashboard');
		}else if ($this->session->userdata('Cliente')) {
			redirect('cliente/Dashboard');
		}else{
			$this->load->view('Iniciar_sesion');
		}
		if(isset($_POST['contra'] ) AND isset($_POST['usuario'])){
			extract($_POST);
			if($this->iniciar_sesion_model->validar_usuario($usuario,$contra) == "Administrador"){
				redirect('administracion/Dashboard');
			}else if($this->iniciar_sesion_model->validar_usuario($usuario,$contra) == "Operador"){
				redirect('operador/Dashboard');
			}else{
				redirect('iniciar_sesion?error=error al iniciar sesion');
			}
		}
	}

  public function cerrar_sesion()
 	{
   	if($this->session->userdata('Administrador')){
      $this->session->unset_userdata('Administrador');
      session_destroy();
    }else if($this->session->userdata('Operador')){
      $this->session->unset_userdata('Operador');
      session_destroy();
    }else if($this->session->userdata('Cliente')){
      $this->session->unset_userdata('Cliente');
      session_destroy();
    }
   	  redirect('iniciar_sesion');
 	}
}
