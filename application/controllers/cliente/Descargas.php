<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Descargas extends CI_Controller {

  public function __construct(){
		parent:: __construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('cliente/Dashboard_model');
		$this->load->helper('cliente/get_archivos_helper.php');
	}

  public function index()
	{
    if($this->session->userdata('Cliente')) {
		// $data['iva_general'] = $this->Dashboard_model->iva_general();
		// $data['venta_mes'] = $this->Dashboard_model->venta_mes();
		// $data['iva_retenido'] = $this->Dashboard_model->iva_retenido();
		// $data['pagocuenta'] = $this->Dashboard_model->pago_cuenta();
		// $data['compras_mes'] = $this->Dashboard_model->compras_mes();
		// $data['iva_compras'] = $this->Dashboard_model->iva_compras_general();
		// $data['balance_iva'] = $this->Dashboard_model->balance_iva();
		// $data['compras_mes_anterior'] = $this->Dashboard_model->compras_mes_anterior();
		// $data['venta_mes_anterior'] = $this->Dashboard_model->venta_mes_anterior();
		// $data['get_mes_anterior'] = $this->Dashboard_model->get_mes_anterior();
		// $data['get_mes_actual'] = $this->Dashboard_model->get_mes_actual();
  		$this->load->view('cliente/descargas');
    }
    else{
      if ($this->session->userdata('Administrador')) {
        redirect('administracion/index');
      }
      else if ($this->session->userdata('Operador')) {
        redirect('operador/index');
      }
      else{
        redirect('iniciar_sesion');
      }
    }
  }
  public function load_archivos(){
	  extract($_POST);
	  echo load_archivos($tipo_documento);
  }
}
