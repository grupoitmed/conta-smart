<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buscar_reporte_cf_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->library('session');
  }

 public function get_empresa(){
	$idempresa = $this->session->userdata['Cliente']['idempresa'];
	return $idempresa;
 }
 
  public function venta_mes(){
	$idempresa = $this->session->userdata['Cliente']['idempresa'];
	$sql = $this->db->query("SELECT SUM(valor_total) valor_total FROM facturas WHERE idempresa = '".$idempresa."'");
	foreach($sql->result_array() as $row){
		$valor_total = $row['valor_total'];
	}
	return $valor_total;
 }


}
?>
