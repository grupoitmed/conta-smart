<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Credito_fiscal_venta extends CI_Controller{

  public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->model('administracion/Venta_model');
		$this->load->helper('administrador/cargar_ccf');
		$this->load->helper('administrador/modal/editar_venta_ccf');
	}
  public function index()
	{
    if($this->session->userdata('Administrador') || $this->session->userdata('Operador') ) {
     // $data['sucursales'] = $this->ver_citas_model->cargar_sucursales();
	// extract($_POST);
  		$this->load->view('administracion/credito_fiscal_venta');
    }
    else{
      if ($this->session->userdata('clinica')) {
        redirect('recepcion/index');
      }
      else if ($this->session->userdata('administracion')){
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
  
  public function InsertCliente(){
	  return $this->Venta_model->InsertCliente($_POST);
  }
  
  public function load_clientes(){
	  echo $this->Venta_model->load_clientes();
  }
  
  public function getinfocliente(){
	  extract($_POST);
	  echo $this->Venta_model->getinfocliente($idcliente);
  }
  
  public function load_facturasccf(){
	  echo load_facturasccf($_POST);
  }
  public function eliminar_facturaccf(){
	  extract($_POST);
	  echo $this->Venta_model->eliminar_facturaccf($idfactura);
  }
  
   public function anular_facturaccf(){
	   extract($_POST);
	  echo $this->Venta_model->anular_facturaccf($idfactura);
  }
  
   public function open_modal_edit_ccf(){
	  extract($_POST);
	  echo open_modal_edit_ccf($idfactura);
  }
  
  
  
  
  
  }