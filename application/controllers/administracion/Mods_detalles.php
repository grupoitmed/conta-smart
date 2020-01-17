<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mods_detalles extends CI_Controller {

  public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->helper('administrador/cargar_empresas2_helper');
		$this->load->helper('administrador/modal/editar_empresa_model_helper');	
		$this->load->model('administracion/Empresa_model');	
		$this->load->helper('cliente/get_comprasventas2_helper.php');
	}
  public function index()
	{
    if($this->session->userdata('Administrador') || $this->session->userdata('Operador') ) {
     // $data['sucursales'] = $this->ver_citas_model->cargar_sucursales();
  		$this->load->view('administracion/mods_detalles');
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
  
  public function editar_empresa(){
	  extract($_POST);
	  return editar_empresa($id);
  }
  
  public function update_empresa(){
	  extract($_POST);
	  return $this->Empresa_model->update_empresa($nrc,$nit,$giro,$direccion,$pais,$ncontacto,$telefono,$razonsocial,$email,$monto,$idempresa);
  }
  public function load_compraventas(){
	echo load_compraventas($_POST);
  }

}
