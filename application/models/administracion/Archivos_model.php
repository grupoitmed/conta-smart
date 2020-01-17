<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivos_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->library('session');
      $this->load->model('vitacora_model');
  }

  var $datos;

  public function save_file_info($file,$fecha,$tipo_documento,$id,$descripcion){

    if(isset($this->session->userdata['administrador']['nombres'])){
    $usuario = $this->session->userdata['administrador']['usuario'];
		}else if(isset($this->session->userdata['hospital']['nombres'])){
      $usuario = $this->session->userdata['hospital']['usuario'];
    }else if(isset($this->session->userdata['enfermeria']['nombres'])){
      $usuario = $this->session->userdata['enfermeria']['usuario'];
  }else if(isset($this->session->userdata['recepcion']['nombres'])){
      $usuario = $this->session->userdata['recepcion']['usuario'];
    }else {
      $usuario = 'Laboratorio';
    }

    $datos = array(
            'archivo' => $file['file_name'],
            'archivo_original' => $file['orig_name'],
            'ruta' => $id."/".$file['file_name'],
            'fecha' => date('Y-m-d'),
            'hora' => date("H:i:s"),
            'idexpediente' => $id,
            'idtipo_documento' => $tipo_documento,
            'usuario' => $usuario,
            'descripcion' => $descripcion
    );
    if($this->db->insert("expedientes_documentos",$datos)){
      $query = $this->db->query("SELECT nombre_completo FROM expedientes WHERE idexpediente = ".$id);
      foreach($query->result_array() as $row){
        $nombre_completo = $row['nombre_completo'];
      }
      $query = $this->db->query("SELECT tipo_documento FROM tipos_documentos WHERE idtipo_documento = ".$tipo_documento);
      foreach($query->result_array() as $row){
        $tipo = $row['tipo_documento'];
      }
      $tipo = "Recetas";

      $accion = "Subió un archivo de tipo ".$tipo." para el paciente ".$nombre_completo;
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function load_tipo_documentos(){
    $options = '<option value="">Seleccione un tipo de documento...</option>';
    $query = $this->db->query("SELECT * FROM tipos_documentos WHERE estado = 0");
    foreach($query->result_array() as $row){
      $options.= '<option value="'.$row['idtipo_documento'].'">'.$row['tipo_documento'].'</option>';
    }
    return $options;
  }
}
