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
?>
<!DOCTYPE html>
<html lang="es">
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta name="description" content="Responsive Admin Template" />
  <meta name="author" content="RedstarHospital" />
  <title>COMPRAS</title>

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

  <link href="<?php echo base_url();?>/assets/assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <link href="<?php echo base_url();?>/assets/assets/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" media="screen">
  <!--tagsinput-->
<link href="<?php echo base_url()?>assets/assets/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url()?>assets/assets/datatables/export/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

  <link href="<?php echo base_url();?>/assets/assets/jquery-tags-input/jquery-tags-input.css" rel="stylesheet">

  <!-- sweet alert -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/assets/sweet-alert/sweetalert.min.css">
  <!--select2-->
  <link href="<?php echo base_url();?>/assets/assets/select2/css/select2.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>/assets/assets/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- favicon -->
  <link rel="shortcut icon" href="<?php echo base_url();?>/assets/img/favicon.ico" />



</head>
<!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-dark dark-sidebar-color logo-dark dark-theme" onload="cargar_archivos();">
  <div class="page-wrapper">
    <!-- start header -->
    <!-- Navigation -->
    <?php include "includes/nav_bar_header.php";?>
    <!-- start page container -->
    <div class="page-container">
      <?php $opt = "iva"; include "includes/menus/".$user_data['menu'];?>
      <!-- end sidebar menu -->
      <!-- start page content -->
      <div class="page-content-wrapper">
        <div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <div class="card-box">
                <div class="card-head">
                  <header>Subir Archivos <span style="color:#8BDB00;"><?php echo $razon;?> </span> NRC: <span style="color:#8BDB00;"><?php echo $nrc;?></span></header>
                </div>
                <div class="card-body container">
                  <form enctype="multipart/form-data" id="form_archivos">
					<div  class="row">
						<div class="col-md-2">
                    <label for="fechacompra">Año</label>
                    <div class="input-group mb-6">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">20</span>
                      </div>
                      <input type="text" name="anio" id="anio" class="form-control" value="<?=date('y')?>" placeholder="">
                      <input type="hidden" name="id" id="id" value="<?php echo $idempresa;?>" />
                    </div>
						</div>
						<div class="col-md-3">
                      <label for="exampleInputPassword1">Mes</label>
                      <select class="form-control" id="mes" name="mes">
						<option value="1">ENERO</option>
						<option value="2">FEBRERO</option>
						<option value="3">MARZO</option>
						<option value="4">ABRIL</option>
						<option value="5">MAYO</option>
						<option value="6">JUNION</option>
						<option value="7">JULIO</option>
						<option value="8">AGOSTO</option>
						<option value="9">SEPTIEMBRE</option>
						<option value="10">OCTUBRE</option>
						<option value="11">NOVIEMBRE</option>
						<option value="12">DICIEMBRE</option>
					  </select>
					</div>
					<div class="col-md-4">
                    <label for="fechacompra">Tipo de archivo</label>
                    <input type="file" class="form-control" name="archivo" value="">
						</div>
					
                    <div class="col-md-3">
                      <label for="fechacompra">Tipo de archivo</label>
                      <select class="form-control" name="tipo_documento" id="tipo_documento">
                        <option value="">SELECCIONE...</option>
                        <option value="1">DECLARACION DE IVA</option>
                        <option value="2">DECLARACION DE PAGO A CUENTA</option>
                        <option value="3">DECLARACION DE RENTA</option>
						<option value="4">MANDAMIENTO DE PAGO IVA</option>
						<option value="5">MANDAMIENTO DE PAGO A CUENTA</option>
						<option value="6">MANDAMIENTO DE PAGO RENTA</option>
						<option value="7">LIBRO DE COMPRA DIGITALIZADO</option>
						<option value="8">LIBRO DE VENTA CCF DIGITALIZADO</option>
						<option value="9">LIBRO DE VENTA CF DIGITALIZADO</option>
                      </select>
                    </div>
					</div>
					<br>
					<div  class="row">
					<div class="col-md-6">
                      <label for="exampleInputPassword1">Descripcion</label>
                      <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
					</div>
					
					</div>
					<br>
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Subir</button>
                    <button type="button" onclick="regresar();" class="btn btn-inverse waves-effect waves-light">Regresar</button>
                  </form>
                </div>
				<div id="archivos"></div>
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
    <div class="page-footer-inner"> <?=date('Y')?> &copy; CONTA-SMART
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

<!--Modal para nuevo proveedor-->
<!-- fin del modal del proveedor --->
<!-- start js include path -->
<script src="<?php echo base_url();?>assets/assets/jquery.min.js" ></script>
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
<!-- Sweet Alert -->

<script src="<?php echo base_url();?>assets/assets/sweet-alert/sweetalert.min.js" ></script>
<script src="<?php echo base_url();?>assets/assets/sweet-alert/sweet-alert-data.js" ></script>
<!--tags input-->
<script src="<?php echo base_url();?>assets/assets/jquery-tags-input/jquery-tags-input.js" ></script>
<script src="<?php echo base_url();?>assets/assets/jquery-tags-input/jquery-tags-input-init.js" ></script>
<!--select2-->
<script src="<?php echo base_url();?>assets/assets/select2/js/select2.js" ></script>
<script src="<?php echo base_url();?>js/administrador/iva.js" ></script>
<script src="<?php echo base_url();?>assets/assets/datatables/jquery.dataTables.min.js" ></script>
<script src="<?php echo base_url();?>assets/assets/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js" ></script>
</body>
</html>
