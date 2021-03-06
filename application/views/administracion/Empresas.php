<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta name="description" content="Responsive Admin Template" />
  <meta name="author" content="RedstarHospital" />
  <title>CONTA-SMART</title>

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
  <div class="page-wrapper" style="overflow-y: scroll;">
    <!-- start header -->
        <!-- Navigation -->
        <?php include "includes/nav_bar_header.php";?>

        <!-- start page container -->
        <div class="page-container">
          <?php $opt = "nueva_empresa"; include "includes/menus/".$user_data['menu'];?>
          <!-- end sidebar menu -->
          <!-- start page content -->
          <div class="page-content-wrapper">
            <div class="page-content">


              <div class="row">
                <div class="col-sm-12">
                  <div class="card-box">
                    <div class="card-head">
                      <header>Nueva Empresa</header>
                    </div>


                    <div class="card-body row">

                      <form class="form-inline" id="frm_empresa">

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fechacompra" class="col-md-4">Razón Social</label><br>
                            <input type="text" class="form-control col-md-8" id="razonsocial" name="razonsocial" placeholder="Razón Social">
                          </div>
                        </div>
						
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fechacompra" class="col-md-4">NRC</label>
                            <input type="text" class="form-control" id="nrc" name="nrc" placeholder="NRC">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fechacompra" class="col-md-4">NIT</label>
                            <input type="text" class="form-control" id="nit" name="nit" placeholder="NIT" autocomplete="off">
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fechacompra" class="col-md-4">Giro</label>
                            <input type="text" class="form-control" id="giro" name="giro" placeholder="Giro">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fechacompra" class="col-md-4">Dirección</label>
                            <textarea class="form-control" rows ="3"
                            id = "direccion" name="direccion" placeholder="Dirección"></textarea>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fechacompra" class="col-md-4">País</label>
                            <select class="form-control" id="pais" name="pais">
                              <option value="SV">El salvador</option>
                              <option value="HD">Honduras</option>
                            </select>
                          </div>
                        </div>


                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="fechacompra" class="col-md-4">Nombre de contácto</label>
                            <input type="text" class="form-control" id="ncontacto" name="ncontacto" placeholder="Nombre de contácto">
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group" >
                            <label for="fechacompra" class="col-md-4">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group" >
                            <label for="email" class="col-md-4">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required="required" placeholder="Correo electrónico">
                          </div>
                        </div>
                        <div class="col-lg-12 p-t-20 text-right">
                          <button type="button" class="save btn btn-success">
                            Guardar
                          </button>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>
              </div>

            </div>


          </div>

        </div>
        <!-- end chat sidebar -->
        <!-- start footer -->

        <!-- end footer -->
      </div>
      <!-- end page container -->

      <!-- <div class="page-footer">
        <div class="page-footer-inner"> 2017 &copy; RedStar Hospital Theme By
          <a href="mailto:redstartheme@gmail.com" target="_top" class="makerCss">RT Theme maker</a>
        </div>
        <div class="scroll-to-top">
          <i class="icon-arrow-up"></i>
        </div>
      </div> -->

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
  <script src="<?php echo base_url();?>js/administrador/empresas.js" type="text/javascript"></script>


</body>

</html>
