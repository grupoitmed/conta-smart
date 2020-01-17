<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivos extends CI_Controller {

  public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
    $this->load->helper('form');
    $this->load->helper('hospital/cargar_archivos');
    // $this->load->helper('hospital/cargar_archivoslab');
	$this->load->library('session');
    $this->load->model('hospital/archivos_model');
	}

  public function index()
	{
    if ($this->session->userdata('administrador') || $this->session->userdata('hospital') || $this->session->userdata('enfermeria') || $this->session->userdata('recepcion')) {
      $data['tipo_documento'] = $this->archivos_model->load_tipo_documentos();
      $this->load->view('hospital/archivos',$data);
    }
    else{
       if ($this->session->userdata('farmacia')) {
        redirect('farmacia/index');
      }
			else if ($this->session->userdata('asistente')) {
        redirect('asistente/index');
      }
    }
  }

  public function cargar_archivos(){
    extract($_POST);
    if (!isset($tipoarchivo)) {
      $tipoarchivo = '';
    }
    if (!isset($action)) {
      $action = '';
    }
    return cargar_archivos($id,$tipoarchivo,$action);
  }

  public function subir_archivo(){
    extract($_POST);
    $uid= $_POST['id'];
    $upload_path= "archivos/archivos_expedientes";
    $upPath= $upload_path."/".$uid;
    if(!file_exists($upPath))
    {
      mkdir($upPath, 0777, true);
    }
    //set preferences
    //file upload destination
    $config['upload_path'] = $upPath;
    //allowed file types. * means all types
    $config['allowed_types'] = "gif|jpg|png|jpeg|pdf";
    //allowed max file size. 0 means unlimited file size
    $config['max_size'] = '0';
    //max file name size
    $config['max_filename'] = '255';
    //whether file name should be encrypted or not
    $config['encrypt_name'] = TRUE;
    //store file info once uploaded
    $file = array();
    //check for errors
    $is_file_error = FALSE;
    //check if file was selected for upload
    if (!$_FILES) {
      $is_file_error = TRUE;
      // $this->handle_error('Seleccione al menos un archivo.');
      echo 1;
    }
    //if file was selected then proceed to upload
    if (!$is_file_error) {
    //load the preferences
      $this->load->library('upload', $config);
      //check file successfully uploaded. 'file_name' is the name of the input
      if (!$this->upload->do_upload('archivo')) {
        //if file upload failed then catch the errors
        $this->upload->display_errors();
        $is_file_error = TRUE;
      } else {
        //store the file info
        $file = $this->upload->data();
      }
    }
    // There were errors, we have to delete the uploaded files
    if ($is_file_error) {
      if ($file) {
        $file = $upPath.$file['file_name'];
        if (file_exists($file)) {
          unlink($file);
        }
      }
    }
    if (!$is_file_error) {
      //save the file info in the database
      $resp = $this->archivos_model->save_file_info($file,$fecha,$tipo_documento,$id,$descripcion);

      if ($resp === TRUE) {
        //$this->handle_success('File was successfully uploaded.');
      } else {
        //if file info save in database was not successful then delete from the destination folder
        $file = $upPath.$file['file_name'];
        if (file_exists($file)) {
          unlink($file);
        }
      //$this->handle_error('Error while saving file info to Database.');
      }
    }
  }
}
