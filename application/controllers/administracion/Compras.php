<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Compras extends CI_Controller {
		
		public function __construct(){
			parent:: __construct();
			$this->load->helper('url');
			//$this->load->helper('citas/ver_citas');
			/*$this->load->helper('citas/modals/procesar_cita');
				$this->load->helper('citas/modals/reprogramar_cita');
				$this->load->library('session');
				$this->load->model('citas/ver_citas_model');
			$this->load->helper('citas/modals/recordar_cita');*/
			$this->load->model('administracion/Compra_model');
			$this->load->helper('administrador/cargar_compras');
			$this->load->helper('administrador/modal/editar_compra');
		}
		public function index()
		{
			if($this->session->userdata('Administrador') || $this->session->userdata('Operador') ) {
				// $data['proveedore'] = $this->Compra_model->listaproveedores();
				extract($_POST);
				$data['meses'] = $this->Compra_model->listaMeses();
				$this->load->view('administracion/Compras',$data);
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
		
		public function save(){
			extract($_POST);
			return $this->Compra_model->compras($mes,$idproveedor, $fechacompra, $documento, $options,$tipo, $monto, $fovial, $coatrans, $creditof, $percepcion,$total, $idempresa,$iduser,$cesc);
		}
		
		public function verificar_proveedor_documento(){
			extract($_POST);
			return $this->Compra_model->verificar_proveedor_documento($idproveedor,$documento);
		}
		
		public function load_proveedores(){
			return $this->Compra_model->listaproveedores();
		}
		
		public function load_agentes_retencion(){
			return $this->Compra_model->load_agentes_retencion();
		}
		
		public function load_compras(){
			echo load_compras($_POST);
		}
		
		public function eliminar_compra(){
			extract($_POST);
			return $this->Compra_model->eliminar_compra($idcompra);
		}
		public function open_modal_edit_compra(){
			extract($_POST);
			echo open_modal_edit_compra($idcompra);
		}
		public function actualizar_factura(){
			return $this->Compra_model->actualizar_factura($_POST);
		}
		
		
		
		
		
		
		
		}
				