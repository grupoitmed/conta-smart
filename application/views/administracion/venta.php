<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  $id = $_POST['id'];
$CI =& get_instance();
$CI->load->helper('url');
$CI->load->database();

  $sql="SELECT * FROM empresas WHERE Idempresa = ".$id;
  $query = $CI->db->query($sql);
  foreach($query->result_array() as $row){
	  $idempresa =$row['Idempresa'];
	  $razon =$row['razonsocial'];
	  $nrc = $row['nrc'];
  }
?><!DOCTYPE html>
<html lang="es">
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta name="description" content="Responsive Admin Template" />
  <meta name="author" content="RedstarHospital" />
  <title>VENTAS</title>

  <!-- google font -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
  <!-- icons -->
  <link href="<?php echo base_url();?>assets/assets/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!--bootstrap -->

  <link href="<?php echo base_url();?>assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Material Design Lite CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/material/material.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/material_style.css">
  <!-- Theme Styles -->
  <link href="<?php echo base_url();?>assets/css/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
  <link href="<?php echo base_url();?>assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/css/theme-color.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>assets/css/formlayout.css" rel="stylesheet" type="text/css" />

  <link href="<?php echo base_url();?>/assets/assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <link href="<?php echo base_url();?>/assets/assets/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" media="screen">
  <!--select2-->
  <link href="<?php echo base_url();?>/assets/assets/select2/css/select2.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>/assets/assets/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- favicon -->
  <link rel="shortcut icon" href="<?php echo base_url();?>/assets/img/favicon.ico" />

  <!-- sweet alert -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/assets/sweet-alert/sweetalert.min.css">

</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-dark dark-sidebar-color logo-dark dark-theme">
  <div class="page-wrapper">
    <!-- start header -->
        <!-- Navigation -->
        <?php include "includes/nav_bar_header.php";?>

        <!-- start page container -->
        <div class="page-container">
          <?php $opt = "ventas"; include "includes/menus/".$user_data['menu'];?>
          <!-- end sidebar menu -->
          <!-- start page content -->
          <div class="page-content-wrapper">
            <div class="page-content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box">
                  <div class="card-head">
                    <header>Nueva venta - Empresa: <span style="color:#8BDB00;"><?php echo $razon;?> </span> NRC: <span style="color:#8BDB00;"><?php echo $nrc;?></span></header>
                  </div>
                  <div class="card-body row container">

<form class="form-inline" id="frm_venta">
			<div class="row">
			
				<div class="col-md-3">
					<div class="form-group">
						<label>Tipo de factura</label>
						<select class="form-control" id="tipofactura" name="tipofactura" onchange="tipo();">
							<option value="">SELECCION TIPO DE FACTURA</option>    
							<option value="1">CREDITO FISCAL</option>
							<option value="2">CONSUMIDOR FINAL</option>
						</select>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="form-group">
					<label for="fechacompra">Fecha de compra</label>
					<input type="date" class="form-control" id="fechacompra" name="fechacompra" placeholder="Fecha de compra">
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="form-group">
					<label> Nombre de cliente </label>
						<input type="text" value="" id="cliente" name="cliente" class="form-control">					
					</div>
				</div>
				
					<div class="col-md-3 hidden" id="hinrc">
					<div class="form-group">
					<label class="col-md-3">NRC</label>
						<input type="number" value="" step="any" id="nrc" name="nrc" class="form-control" placeholder="">					
					</div>	
				</div>
				
				<div class="col-md-3 hidden" id="hinit">
					<div class="form-group">
					<label class="col-md-3">NIT</label>
						<input type="number" value="" step="any" id="nit" name="nit" class="form-control" placeholder="NIT">					
					</div>
				</div>
				
				
				<div class="col-md-3 hidden" id="higiro">
					<div class="form-group">
					<label class="col-md-3">Giro</label>
						<input type="giro"  id="giro" name="giro" class="form-control" >					
					</div>	
				</div>			
				
				
				<div class="col-md-3">
					<div class="form-group">
					<label> # Factura </label>
						<input type="number" value="" id="numerofactura" name="numerofactura" class="form-control">					
					</div>
				</div>

				<!--<div class="col-md-3">
					<div class="form-group">
					<label>Documentos</label>
						<input type="number" value="" id="documento" name="documento" class="form-control">					
					</div>
				</div>-->
			
				<div class="col-md-3">
					<div class="form-group">
					<label class="col-md-3"> Monto </label>
					<!-- Ventas afectadas -->
						<input type="number" value="" step="any" id="monto" name="monto" placeholder="0.00" class="form-control">					
					</div>
				</div>	
				
				<div class="col-md-3">
					<div class="form-group">
					<label>Crédito fiscal</label>
						<input type="number" value="" step="any" id="creditofiscal" placeholder="0.00" name="creditofiscal" class="form-control" readonly="readonly">					
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="form-group">
					<label class=""> Ventas No sujetas </label>
						<input type="number" value="0" step="any" id="ventas_no_sujetas" name="ventas_no_sujetas" placeholder="0.00" class="form-control">					
					</div>
				</div>
				
							
				<div class="col-md-3">
					<div class="form-group">
					<label class=""> Ventas exentas </label>
						<input type="number" value="0" step="any" id="ventas_excentas" name="ventas_excentas" placeholder="0.00" class="form-control">					
					</div>
				</div>
				


				<div class="col-md-3">
					<div class="form-group">
					<label>Retención</label>
						<input type="number" step="any" id="retencion" name="retencion" value="0" class="form-control">					
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
					<label>Percepción</label>
						<input type="number" step="any" id="percepcion" name="percepcion" value="0" class="form-control">					
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
					<label class="">Valor total</label>
						<input type="number" value="" step="any" id="valortotal" name="valortotal" class="form-control" placeholder="0.00" readonly="readonly">					
					</div>
				</div>
				<div class="col-md-3">
				<span id="textfactura">Factura activa</span>
					<label class="switchToggle12">
						<input type="checkbox" id="estado" name="estado" value="0">
						<span class="slider red"></span>
					</label>
				</div>
				
			</div>			


                         <input type="hidden" name="idempresa" id="idempresa" value="<?php echo $id; ?>">
						  <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $user_data['idUsuario']; ?>">

                  <div class="col-lg-12 p-t-20" align="center"> 
                    <button type="button" class="btn btn-round btn-primary" onclick="verificar();">Verificar</button>
                    <button type="button" class="btn btn-round btn-success" onclick="guardarventa();">Guardar</button>
                    <button type="button" class="btn btn-round btn-danger">Cancelar</button>
                   </div>
                    </form>
                  </div>
                </div>
              </div>
            </div> 
                </div>


          </div>
        </div>
      </div>
      <!-- end page container -->


      <!-- start footer -->
      <div class="page-footer">
        <div class="page-footer-inner"> 2019 &copy; CONTA-SMART
         <!-- <a href="mailto:redstartheme@gmail.com" target="_top" class="makerCss">RT Theme maker</a>-->
        </div>
        <div class="scroll-to-top">
          <i class="icon-arrow-up"></i>
        </div>
      </div>
      <!-- end footer -->
      <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
  </div>



  <!-- start js include path -->
  <script src="<?php echo base_url();?>assets/js/jquery-3.1.1.min.js" ></script>

  <script src="<?php echo base_url();?>assets/assets/popper/popper.js" ></script>
  <script src="<?php echo base_url();?>assets/assets/jquery.blockui.min.js" ></script>
  <script src="<?php echo base_url();?>assets/assets/jquery.slimscroll.js"></script>
  <!-- bootstrap -->
  <script src="<?php echo base_url();?>assets/assets/bootstrap/js/bootstrap.min.js" ></script>
  <script src="<?php echo base_url();?>assets/assets/bootstrap-switch/js/bootstrap-switch.min.js" ></script>
  
  <!-- counterup -->
  <script src="<?php echo base_url();?>assets/assets/counterup/jquery.waypoints.min.js" ></script>
  <script src="<?php echo base_url();?>assets/assets/counterup/jquery.counterup.min.js" ></script>
  <!-- Common js-->
  <script src="<?php echo base_url();?>assets/assets/app.js" ></script>
  <script src="<?php echo base_url();?>assets/assets/layout.js" ></script>
  <script src="<?php echo base_url();?>assets/assets/theme-color.js" ></script>
  <!-- material -->
  <script src="<?php echo base_url();?>assets/assets/material/material.min.js"></script>



  <script src="<?php echo base_url();?>assets/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"  charset="UTF-8"></script>
  <script src="<?php echo base_url();?>assets/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js"  charset="UTF-8"></script>

  <script src="<?php echo base_url();?>assets/assets/select2/js/select2.js" ></script>
  <script src="<?php echo base_url();?>assets/assets/select2/js/select2-init.js" ></script>
  <!-- Sweet Alert -->
  <script src="<?php echo base_url();?>assets/assets/sweet-alert/sweetalert.min.js" ></script>
  <script src="<?php echo base_url();?>assets/assets/sweet-alert/sweet-alert-data.js" ></script>
  <!-- data tables -->
  <script src="<?php echo base_url();?>assets/assets/datatables/jquery.dataTables.min.js" ></script>
  <script src="<?php echo base_url();?>assets/assets/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js" ></script>
  <script src="<?php echo base_url();?>assets/assets/table_data.js" ></script>
  <script src="<?php echo base_url();?>js/venta.js" ></script>
  <script>
$(document).ready( function(){
	$('#estado').on('click', function(){
	if( $(this).is(':checked') ){
		// Hacer algo si el checkbox ha sido seleccionado
		$('#textfactura').text('Factura inactiva');
		$(this).val('1');
		
		$('#monto').val('0');
		$('#creditofiscal').val()'0';
		$('#retencion').val('0');
		$('#percepcion').val('0');
		$('#valortotal').val('0');

		$('#ventas_no_sujetas').val('0');
		$('#ventas_excentas').val('0');
	
	} else {
		// Hacer algo si el checkbox ha sido deseleccionado
		$('#textfactura').text('Factura Activa');
		$(this).val('0');
	}	

	});
});
  
  </script>
</body>
</html>