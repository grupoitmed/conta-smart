<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->library('session');
  }

  public function saveEmpresa($nrc,$nit,$giro,$direccion,$pais,$ncontacto,$telefono,$razonsocial,$email){
    $datos = array(
      'nrc' => $nrc,
      'nit' => $nit,
      'giro' => $giro,
      'direccion' => $direccion,
      'pais' => $pais,
      'ncontacto' => $ncontacto,
      'telefono' => $telefono,
      'razonsocial' => $razonsocial,
      'email' => $email
    );

    //$this->db->where('idmedicamento',$ida);
    if ($this->db->insert('empresas',$datos)) {
      echo 0;
    }else {
      echo 1;
    }
  }

public function update_empresa($nrc,$nit,$giro,$direccion,$pais,$ncontacto,$telefono,$razonsocial,$email,$monto,$idempresa){

    $datos = array(
      'nrc' => $nrc,
      'nit' => $nit,
      'giro' => $giro,
      'direccion' => $direccion,
      'pais' => $pais,
      'ncontacto' => $ncontacto,
      'telefono' => $telefono,
      'razonsocial' => $razonsocial,
      'email' => $email,
	        'monto' => $monto
    );

	$this->db->where('Idempresa',$idempresa);
	if ($this->db->update('empresas',$datos)) {
		echo 0;
	}
}



}
?>
