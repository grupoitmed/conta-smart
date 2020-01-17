<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$id = $_REQUEST['id'];
$finicio = '';
$fhasta = '';
if(isset($_REQUEST['fhasta'])){$fhasta=$_REQUEST['fhasta'];}
if(isset($_REQUEST['finicio'])){$finicio=$_REQUEST['finicio'];}

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
  <link href="<?php echo base_url();?>/assets/assets/jquery-tags-input/jquery-tags-input.css" rel="stylesheet">
<link href="<?php echo base_url()?>assets/assets/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url()?>assets/assets/datatables/export/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
  <!-- sweet alert -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/assets/sweet-alert/sweetalert.min.css">
  <!--select2-->
  <link href="<?php echo base_url();?>/assets/assets/select2/css/select2.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>/assets/assets/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- favicon -->
  <link rel="shortcut icon" href="<?php echo base_url();?>/assets/img/favicon.ico" />



</head>
<!-- END HEAD -->
<body onload="load_deduccion('<?=$fhasta?>','<?=$finicio?>',<?=$id?>);load_agentes_retencion();calcular_factor();" class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-dark dark-sidebar-color logo-dark dark-theme" >
  <div class="page-wrapper">
    <!-- start header -->
    <!-- Navigation -->
    <?php include "includes/nav_bar_header.php";?>
    <!-- start page container -->
    <div class="page-container">
      <?php $opt = "deducciones"; include "includes/menus/".$user_data['menu'];?>
      <!-- end sidebar menu -->
      <!-- start page content -->
      <div class="page-content-wrapper">
        <div class="page-content">
          <div class="row">
            <div class="col-sm-12">
              <div class="card-box">
                <div class="card-head">
                  <header>Nueva compra - Empresa:<span style="color:#8BDB00;"><?php echo $razon;?> </span> NRC: <span style="color:#8BDB00;"><?php echo $nrc;?></span></header>
                </div>
                <div class="card-body row container">
                  <form  id="retenedor_form">
					<input type="hidden" name="calcular_factor" id="calcular_factor" value="0" />
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="fechacompra">Fecha</label>
                          <div class="input-append" >
                            <input size="30" type="text" readonly value="<?=date("d-m-Y")?>" id="fecha" name="fecha"  class="form-control" value="<?=date("d-m-Y")?>" readonly>
                            <span class="add-on"><i class="fa fa-calendar icon-th hidden"></i></span>
                          </div>
                        </div>
                        <input type="hidden" id="iduser" name="iduser" value="<?php echo $user_data['idUsuario']; ?>">
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="fechacompra">Fecha Documento</label>
                          <div class="input-append date form_date" data-date-format="dd-mm-yyyy">
                            <input size="30" type="text" value="" id="fecha_document" name="fecha_document"  class="form-control" readonly>
                            <span class="add-on"><i class="fa fa-calendar icon-th hidden"></i></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="fechacompra">Fecha Aplicar</label>
                          <div class="input-append date form_date" data-date-format="dd-mm-yyyy">
                            <input size="30" type="text" value="" id="fecha_aplicar" name="fecha_aplicar"  class="form-control" readonly>
                            <span class="add-on"><i class="fa fa-calendar icon-th hidden"></i></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 hide">
                        <div class="form-group">
                          <label for="fechacompra"># Documento</label>
                          <input type="number" class="form-control" id="documento" name="documento" placeholder="# Documento">
                        </div>
                        <input type="hidden" id="idempresa" name="idempresa" value="<?php echo $id;?>">
                      </div>
					  <div class="col-md-3">
                        <div class="form-group">
							<label for="fechacompra">Tipo</label> 
							<select class="form-control" id="tipo_retenedor" name="tipo_retenedor" onchange="calcular_factor2();">
								<?php
									$this->db->where("estado",0);
									$query = $this->db->get("tipo_retenedor");
									foreach($query->result_array() AS $row){
										echo "<option value='".$row["idtipo_retenedor"].",".$row["factor"]."'>".$row["retenedor"]."</option>";
									}
								?>
							</select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="retenedor">Agente de Retención</label>
                          <div class="input-append">
                            <select id="idproveedor" name="retenedor"  class="form-control" style="width:100%;">
							</select>
                            <span class="add-on"><i class="fa fa-calendar icon-th hidden"></i></span>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="fechacompra">Monto Grabado</label>
                          <input type="number" class="form-control" id="monto" name="monto" onkeyup="calcular_retencion()" onchange="calcular_retencion()" placeholder="0.00">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="fechacompra">Retención</label>
                          <input type="number" class="form-control" id="retencion" name="retencion" placeholder="0.00">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="fechacompra">Descripción</label>
                          <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="" />
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12 p-t-20 text-center">'
                      <a class="btn btn-round btn-info" href="#" onclick="retenedor_form();">Guardar</a>
                      <button type="button" class="btn btn-round btn-danger" onclick="salir();">Cancelar</button>
                    </div>
                  </form>
				  <div class="table-responsive" id="compras">
				  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal modal-fade" id="modal"></div>
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
<!--Modal para nuevo proveedor-->
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
                <input type="text" class="form-control" id="proveedor" name="proveedor" placeholder="Proveedor">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" class="form-control" id="nrc" name="nrc" placeholder="NRC"  autocomplete="off">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" class="form-control" id="nit" name="nit" placeholder="NIT" required >
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" class="form-control" id="giro" name="giro" placeholder="GIRO" required>
              </div>
            </div>
          </div>
          <div class="row">
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
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary newproveedor">Guardar</button>
        </div>
      </form>
	  
    </div>
  </div>
</div>
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
<script src="<?php echo base_url();?>assets/assets/datatables/jquery.dataTables.min.js" ></script>
<script src="<?php echo base_url();?>assets/assets/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js" ></script>
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
<script src="<?php echo base_url();?>js/compra.js" ></script>
<script>
	$(document).ready(function (){
		$("#idproveedor").select2();
	});
</script>
</body>
</html>
