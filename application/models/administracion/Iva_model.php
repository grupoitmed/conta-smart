<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iva_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->library('session');
  }

public function save_file_info($anio,$file,$tipo_documento,$tipo_documento,$idempresa,$descripcion,$mes){

    if(isset($this->session->userdata['Administrador'])){
		$usuario = $this->session->userdata['Administrador']['usuario'];
	}else if(isset($this->session->userdata['Cliente'])){
		$usuario = $this->session->userdata['Cliente']['usuario'];
    }else if(isset($this->session->userdata['Operador'])){
		$usuario = $this->session->userdata['Operador']['usuario'];
	}else{
		$usuario = 'indefinido';
	}

    $datos = array(
			'mes_documento' => $mes,
            'archivo' => $file['file_name'],
            'archivo_original' => $file['orig_name'],
            'ruta' => $idempresa."/".$file['file_name'],
            'fecha' => date('Y-m-d'),
            'hora' => date("H:i:s"),
            'idempresa' => $idempresa,
            'idtipo_documento' => $tipo_documento,
            'usuario' => $usuario,
            'descripcion' => $descripcion,
			'año_documento' => $anio
    );
    if($this->db->insert("empresas_documentos",$datos)){
      // $query = $this->db->query("SELECT nombre_completo FROM expedientes WHERE idexpediente = ".$id);
      // foreach($query->result_array() as $row){
        // $nombre_completo = $row['nombre_completo'];
      // }
      // $query = $this->db->query("SELECT tipo_documento FROM tipos_documentos WHERE idtipo_documento = ".$tipo_documento);
      // foreach($query->result_array() as $row){
        // $tipo = $row['tipo_documento'];
      // }
      // $tipo = "Recetas";

      // $accion = "Subió un archivo de tipo ".$tipo." para el paciente ".$nombre_completo;
      // $this->vitacora_model->vitacora($accion);
    }
  }
  
  public function dellFile($idarchivo){
		$this->db->set('estado', 1);
		$this->db->where('iddocumento', $idarchivo);
		if($this->db->update('empresas_documentos')){
			echo 1;
		}else{
			echo 2;
		}
  }

}
?>
