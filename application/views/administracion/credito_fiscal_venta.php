<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  $id = $_REQUEST['id'];
  $finicio = '';
  $fhasta = '';
  if(isset($_REQUEST['finicio'])){$finicio = $_REQUEST['finicio'];}
  if(isset($_REQUEST['fhasta'])){$fhasta = $_REQUEST['fhasta'];}
  
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
<link href="<?php echo base_url()?>assets/assets/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url()?>assets/assets/datatables/export/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
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
<body onload="load_proveedores();load_facturasccf('<?=$fhasta?>','<?=$finicio?>',<?=$id?>);" class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-dark dark-sidebar-color logo-dark dark-theme" >
  
  <input type="hidden" id="__fhasta" value="<?=$fhasta?>" />
  <input type="hidden" id="__finicio" value="<?=$finicio?>" />
  <input type="hidden" id="__id" value="<?=$id?>" />
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
				<form class="form-inline" id="frm_venta_creditofiscal">
				<div class="row">
				<div class="col-md-3">
					<div class="form-group">
					<label for="fechacompra">Fecha de venta</label>
					<!--<input type="date" class="form-control" id="fechacompra" name="fechacompra" placeholder="Fecha de compra">-->
					<div class="input-append date form_date" data-date-format="dd-mm-yyyy">
						<input size="20" type="text" value="" class="form-control" id="fechacompra" name="fechacompra" readonly>
						<span class="add-on"><i class="fa fa-calendar icon-th hidden"></i></span>
					 </div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
					<label> Nombre de cliente </label>
						<!--<input type="text" value="" id="cliente" name="cliente" class="form-control">-->
						<select width="100%" class="form-control select2" id="idcliente" name="idcliente" onchange="getinfocliente();">
						<option value="">Seleccione Cliente</option>
						</select>
						<input name="cliente" id="cliente" class="hidden" value=""/>
					</div>
				</div>
				<!--<div class="col-md-3">
					<div class="form-group">
					  <label for="idproveedor">Cliente</label>
					  <select class="form-control select2" id="idproveedor" name="idproveedor">
						<option value="">Seleccione Cliente</option>
					  </select>
					</div>
				 </div>-->
					<div class="col-md-2">
					<div class="form-group">
					<label class="col-md-3">NRC</label>
						<input type="text" value="" step="any" id="nrc" name="nrc" class="form-control" placeholder="" >
					</div>
				</div>
				
				<div class="col-md-1">
					<div class="form-group">
					<!--<label class="col-md-2">Giro</label>
						<input type="giro"  id="giro" name="giro" class="form-control" >-->
					</div>
				</div>

				<div class="col-md-2">
					<div class="form-group">
					<label class="col-md-3">NIT</label>
						<input type="text" value="" step="any" id="nit" name="nit" class="form-control" placeholder="NIT" >
					</div>
				</div>


				<div class="col-md-2">
					<div class="form-group">
					<label class="col-md-2">Giro</label>
						<input type="giro"  id="giro" name="giro" class="form-control" >
					</div>
				</div>
				
				<div class="col-md-1">
					<div class="form-group">
					<!--<label class="col-md-2">Giro</label>
						<input type="giro"  id="giro" name="giro" class="form-control" >-->
					</div>
				</div>


				<div class="col-md-3">
					<div class="form-group">
					<label>&nbsp; # Factura &nbsp;</label>
						<input type="number" value="" id="numerofactura" name="numerofactura" class="form-control" onblur="verificar_fecha_factura2()">
					</div>
				</div>


				<div class="col-md-2">
					<div class="form-group">
					<label class="col-md-2">Monto</label>
					<!-- Ventas afectadas -->
						<input type="number" value="0" step="any" id="monto" name="monto" placeholder="0.00" class="form-control" >
					</div>
				</div>
				
				<div class="col-md-1">
					<div class="form-group">
					<!--<label class="col-md-2">Giro</label>
						<input type="giro"  id="giro" name="giro" class="form-control" >-->
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
				<input type="hidden" name="tipofactura" id="tipofactura" value="1">

                  <div class="col-lg-12 p-t-20" align="center">
                    <button type="button" class="btn btn-round btn-primary" onclick="verificar_credito();">Verificar</button>
                    <button type="button" class="btn btn-round btn-success" onclick="guardarcreditoventa();">Guardar</button>
                    <button type="button" class="btn btn-round btn-danger" onclick="salir();">Cancelar</button>
					<button type="button" class="btn btn-round btn-default" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus"></i> Cliente</button>
                   </div>
				   <hr>
                    </form>
					<br>
				<div class="table-responsive" id="ventasccf">
                </div>
                  </div>
                </div>
				<!--<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card  card-box">
                                <div class="card-head">
                                    <header>STATUS DE CLIENTES</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                  <div class="table-wrap">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end page container -->
	<div class="modal modal-fade" id="modal"></div>

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
<div style="color:#000;" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Nuevo proveedor</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="frm_proveedores" method="POST" autocomplete="off">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" class="form-control" id="clienteOE" name="clienteOE" placeholder="Razon Social">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" class="form-control" id="nrcOE" name="nrcOE" placeholder="NRC"  autocomplete="off">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" class="form-control" id="nitOE" name="nitOE" placeholder="NIT" required >
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" class="form-control" id="giroOE" name="giroOE" placeholder="GIRO" required>
              </div>
            </div>
          </div>
          <!--<div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" class="form-control" id="contacto" name="contacto" placeholder="CONTACTO" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input type="number" class="form-control" id="telefono" name="telefono" placeholder="TELEFONO" required autocomplete="off">
              </div>
            </div>
          </div>-->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary newproveedor">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>


  <!-- start js include path -->
  <script src="<?php echo base_url();?>assets/js/jquery-3.1.1.min.js" ></script>
 <!--MASK-->
  <script src="<?php echo base_url();?>assets/assets/bootstrap-inputmask/bootstrap-inputmask.min.js" ></script>
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
		$('#creditofiscal').val('0');
		$('#retencion').val('0');
		$('#percepcion').val('0');
		$('#valortotal').val('0');
    $('#cliente').val('ANULADO');
    $('#nrc').val('0');
    $('#nit').val('0');
    $('#giro').val('0');
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
