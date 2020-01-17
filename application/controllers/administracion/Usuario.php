<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

  public function __construct(){
		parent:: __construct();
		$this->load->helper('url');

	$this->load->helper("administrador/cargar_proveedor");
	$this->load->model('administracion/Usuarios_model');
	$this->load->helper("administrador/cargar_usuarios_helper");
	$this->load->helper("administrador/modal/editar_usuario_helper");
	}
  public function index()
	{
    if($this->session->userdata('Administrador') || $this->session->userdata('Operador') ) {
     // $data['sucursales'] = $this->ver_citas_model->cargar_sucursales();
     $data['empresas'] = $this->Usuarios_model->listar_empresas();
  		$this->load->view('administracion/usuario',$data);
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

  // public function InsertProvider(){
  //   extract($_POST);
  //   return $this->Proveedor_model->InsertProvider($proveedor,$nrc,$nit,$contacto,$telefono);
  // }

  public function cargar_datos_empresas(){
    extract($_POST);
    return $this->Usuarios_model->cargar_datos_empresas($datos);
  }

  public function SaveUser(){
    extract($_POST);
    return $this->Usuarios_model->guardarusuarios($idempresa,$nombre,$name,$password,$rol);
  }
  
    public function load_usuarios(){
    return load_usuarios();
  }
  
  public function editar_usuario(){
	  extract($_POST);
	  return editar_usuario($id);
  }
  
  public function update_usuario(){
	  extract($_POST);
	  return $this->Usuarios_model->update_usuario($idempresa,$nombre,$name,$password,$rol,$idusuario);
  }


}
