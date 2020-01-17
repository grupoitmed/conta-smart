<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Venta_model extends CI_model {
		public function __construct()
		{
			parent:: __construct();
			$this->load->database();
			$this->load->library('session');
		}
		public function saveventa($tipofactura, $fechacompra, $cliente, $monto, $creditofiscal, $retencion, $percepcion, $valortotal, $idempresa, $idusuario, $numerofactura, $nit, $nrc, $giro, $ventas_no_sujetas, $ventas_excentas, $estado){
			if($nit == ''){
				$nit = '';
				}else{
				$nit;
			}
			if($nrc == ''){
				$nrc = '';
				}else{
				$nrc;
			}
			if($giro == ''){
				$giro = '';
				}else{
				$giro;
			}
			$fechacompra1 = date('Y-m-d',strtotime($fechacompra));
			
			$datos = array(
			'facNum' => $numerofactura, 
			'tipo_fac' => $tipofactura, 
			'fecha' => $fechacompra1, 
			'cliente' => $cliente, 
			'credito_fiscal' => $creditofiscal, 
			'monto' => $monto, 
			'ventas_no_sujetas' => $ventas_no_sujetas,
			'ventas_excentas' => $ventas_excentas,
			'idusuario' => $idusuario, 
			'idempresa' => $idempresa, 
			'retencion' => $retencion, 
			'percepcion' => $percepcion, 
			'valor_total' => $valortotal, 
			'nit' => $nit, 
			'nrc' => $nrc, 
			'giro' => $giro, 
			'idempresa' => $idempresa, 
			'estado' => $estado, 
			);
			if ($this->db->insert('facturas',$datos)) {
				echo 0;
				}else{
				echo 1;
			}
		}
		
		public function verificar_fecha_factura($fechacompra,$numerofactura){
			
			
			$month = date('m',strtotime($fechacompra));
			$year = date('Y',strtotime($fechacompra));
			
			
			$this->db->where('MONTH(fecha)',$month);
			$this->db->where('YEAR(fecha)',$year);
			$this->db->where('facNum',$numerofactura);
			//$this->db->where('estado',0);
			$this->db->where('tipo_fac',2);
			//$this->db->where('estado !',3);
			$query = $this->db->get('facturas');
			$num = $query->num_rows();
			
			if($num>=1){
				echo 1;
				}else{
				echo 0;
			}
			
			
		}
		
		public function verificar_fecha_factura2($fechacompra,$numerofactura){
			
			
			$month = date('m',strtotime($fechacompra));
			$year = date('Y',strtotime($fechacompra));
			
			
			$this->db->where('MONTH(fecha)',$month);
			$this->db->where('YEAR(fecha)',$year);
			$this->db->where('facNum',$numerofactura);
			//$this->db->where('estado',0);
			$this->db->where('tipo_fac',1);
			$query = $this->db->get('facturas');
			$num = $query->num_rows();
			
			if($num>=1){
				echo 1;
				}else{
				echo 0;
			}
			
			
		}
		
		
		public function InsertCliente($array){
			extract($array);
			// var_dump($array);
			$datos = array(
			'cliente' => $clienteOE, 
			'nrc' => $nrcOE, 
			'nit' => $nitOE, 
			'giro' => $giroOE
			);
			if ($this->db->insert('clientes',$datos)) {
				echo 0;
				}else{
				echo 1;
			}
		}
		public function load_clientes(){
			$sql = $this->db->query("SELECT * FROM clientes WHERE estado = 0");
			$option = '<option value="" selected>SELECCIONE CLIENTE</option>';
			foreach($sql->result_array() as $row){
				$option .= '<option value='.$row['idcliente'].'>'.$row['cliente'].' - '.$row['nrc'].'</option>';
			}
			return $option;
		}
		public function getinfocliente($idcliente){
			$sql = $this->db->query("SELECT * FROM clientes WHERE estado = 0 AND idcliente = ".$idcliente."");
			foreach($sql->result_array() as $row){
				$idcliente = $row['idcliente'];
				$cliente = $row['cliente'];
				$nrc = $row['nrc'];
				$nit = $row['nit'];
				$giro = $row['giro'];
			}
			return json_encode(array('idcliente' => $idcliente, 'cliente'=> $cliente , 'nrc'=>$nrc , 'nit' => $nit ,'giro' => $giro));
		}
		public function eliminar_facturaccf($idfactura){
			$datos = array(
			'estado' => 3
			);
			$this->db->where('idFactura',$idfactura);
			if ($this->db->update('facturas',$datos)) {
				return 0;
				}else{
				return 1;
			}
		}
		
		
		public function anular_facturaccf($idfactura){
			$datos = array(
			'cliente' => "ANULADO",
			'monto' => 0,
			'ventas_no_sujetas' => 0,
			'ventas_excentas' => 0,
			'credito_fiscal' => 0,
			'retencion' => 0,
			'percepcion' => 0,
			'valor_total' => 0,
			'estado' => 1
			);
			$this->db->where('idFactura',$idfactura);
			if ($this->db->update('facturas',$datos)) {
				return 0;
				}else{
				return 1;
			}
		}
		
		
		public function eliminar_facturacf($idfactura){
			$datos = array(
			'estado' => 3
			);
			$this->db->where('idFactura',$idfactura);
			if ($this->db->update('facturas',$datos)) {
				return 0;
				}else{
				return 1;
			}
		}
		
		
		public function anular_facturacf($idfactura){
			$datos = array(
			'cliente' => "ANULADO",
			'monto' => 0,
			'ventas_no_sujetas' => 0,
			'ventas_excentas' => 0,
			'credito_fiscal' => 0,
			'retencion' => 0,
			'percepcion' => 0,
			'valor_total' => 0,
			'estado' => 1
			);
			$this->db->where('idFactura',$idfactura);
			if ($this->db->update('facturas',$datos)) {
				return 0;
				}else{
				return 1;
			}
		}
		
		
		public function actualizar_cf($array){
			extract($array);
			$datos = array(
			'monto' => $monto,
			'credito_fiscal' => $cf,
			'ventas_no_sujetas' => $ventasns,
			'ventas_excentas' => $ventasex,
			'retencion' => $retencion,
			'percepcion' => $percepcion,
			'valor_total' => $valortotal
			);
			$this->db->where('idFactura',$idfactura);
			if ($this->db->update('facturas',$datos)) {
				return 0;
				}else{
				return 1;
			}
		}
		
		
		
		
		
	}
?>	