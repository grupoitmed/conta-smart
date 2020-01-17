<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consumidor_final extends CI_Controller {

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
	$this->load->helper('administrador/cargar_cf');
	$this->load->helper('administrador/modal/editar_venta_cf');
	}
  public function index()
	{
    if($this->session->userdata('Administrador') || $this->session->userdata('Operador') ) {
     // $data['sucursales'] = $this->ver_citas_model->cargar_sucursales();
	 extract($_POST);
  		$this->load->view('administracion/consumidor_final');
    }
    else{
      if ($this->session->userdata('clinica')){
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
   public function load_facturascf(){
	  echo load_facturascf($_POST);
  }
  public function eliminar_facturacf(){
	  extract($_POST);
	  echo $this->Venta_model->eliminar_facturacf($idfactura);
  }
  public function anular_facturacf(){
	  extract($_POST);
	  echo $this->Venta_model->anular_facturacf($idfactura);
  }
  public function open_modal_edit_cf(){
	  extract($_POST);
	  echo open_modal_edit_cf($idfactura);
  }
  public function actualizar_cf(){
	  echo $this->Venta_model->actualizar_cf($_POST);
  }
  
  
  
  
  
  
  
  
  
  }
