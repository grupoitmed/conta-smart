<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Iva_subir_archivos extends CI_Controller {

  public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		// $this->load->helper('administrador/cargar_empresas_iva_helper');
		// $this->load->helper('administrador/modal/editar_empresa_model_helper');
		$this->load->model('administracion/Iva_model');
		$this->load->helper('administrador/cargar_archivos');
	}
  public function index()
	{
    if($this->session->userdata('Administrador') || $this->session->userdata('Operador') ) {
     // $data['sucursales'] = $this->ver_citas_model->cargar_sucursales();
     // extract($_POST);
  		$this->load->view('administracion/iva_subir_archivos');
    }else{
        redirect('iniciar_sesion');
      }
  }

	public function subir_archivo(){
    extract($_POST);
    $idempresa= $_POST['id'];
    $upload_path= "archivos/archivos_empresas";
    $upPath= $upload_path."/".$idempresa;
    if(!file_exists($upPath))
    {
      mkdir($upPath, 0777, true);
	  echo '1';
    }
    $config['upload_path'] = $upPath;
    $config['allowed_types'] = "gif|jpg|png|jpeg|pdf";
    $config['max_size'] = '0';
    $config['max_filename'] = '255';
    $config['encrypt_name'] = TRUE;
    $file = array();
    $is_file_error = FALSE;
    if (!$_FILES) {
      $is_file_error = TRUE;
      echo '2';
    }
    if (!$is_file_error) {
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('archivo')) {
        $this->upload->display_errors();
        $is_file_error = TRUE;
		echo '3';
      } else {
        $file = $this->upload->data();
		echo '4';
      }
    }
    if ($is_file_error) {
      if ($file) {
        $file = $upPath.$file['file_name'];
        if (file_exists($file)) {
          unlink($file);
		  echo '5';
        }
		echo '6';
      }else{
		  echo '7';
	  }
    }
    if (!$is_file_error) {
      $resp = $this->Iva_model->save_file_info($anio,$file,$tipo_documento,$tipo_documento,$idempresa,$descripcion,$mes);

      if ($resp === TRUE) {
		  echo '8';
      } else {
        $file = $upPath.$file['file_name'];
        if (file_exists($file)) {
          unlink($file);
		  echo '9';
        }
		echo '10';
      }
	  echo '11';
    }
  }
  
  public function cargar_archivos(){
	  extract($_POST);
	  return cargar_archivos($idempresa);
  }
  
   public function dellFile(){
	   extract($_POST);
	  return $this->Iva_model->dellFile($idarchivo);
  }

}
