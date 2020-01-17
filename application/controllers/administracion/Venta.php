<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta extends CI_Controller {

  public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
    //$this->load->helper('citas/ver_citas');
    /*$this->load->helper('citas/modals/procesar_cita');
    $this->load->helper('citas/modals/reprogramar_cita');
		$this->load->library('session');
    $this->load->model('citas/ver_citas_model');
    $this->load->helper('citas/modals/recordar_cita');*/
    $this->load->model('administracion/Venta_model');
	}
  public function index()
	{
    if($this->session->userdata('Administrador') || $this->session->userdata('Operador') ) {
     // $data['sucursales'] = $this->ver_citas_model->cargar_sucursales();
	 extract($_POST);
  		$this->load->view('administracion/venta');
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

  public function saveventa(){
    extract($_POST);
		if(!isset($estado)){
			$estado = 0;
		}else{
			$estado;
		}
    return $this->Venta_model->saveventa($tipofactura,$fechacompra,$cliente,$monto,$creditofiscal,$retencion,$percepcion,$valortotal, $idempresa,$idusuario,$numerofactura,$nit,$nrc,$giro, $ventas_no_sujetas, $ventas_excentas, $estado);
  }
  
  public function verificar_fecha_factura(){
			extract($_POST);
			return $this->Venta_model->verificar_fecha_factura($fechacompra,$numerofactura);
		}
		
		 public function verificar_fecha_factura2(){
			extract($_POST);
			return $this->Venta_model->verificar_fecha_factura2($fechacompra,$numerofactura);
		}


}
