<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "includes/meta.php";?>
  <!-- Bootstrap Core CSS -->
  <link href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
  <!-- Menu CSS -->
  <link href="<?php echo base_url();?>assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
  <!-- animation CSS -->
  <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="<?php echo base_url();?>assets/css/style.min.css" rel="stylesheet">
  <!-- color CSS -->
  <link href="<?php echo base_url();?>assets/css/colors/megna.css" id="theme" rel="stylesheet">
  <!-- DataTable CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugins/bower_components/datatables/jquery.dataTables.min.css" />
  <!--alerts CSS -->
  <link href="<?php echo base_url();?>assets/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="fix-header fix-sidebar">
  <!-- Preloader -->
  <div class="preloader">
    <div class="cssload-speeding-wheel"></div>
  </div>
  <div id="wrapper">
    <!-- Navigation -->
    <?php include "includes/nav_bar_header.php";?>
    <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
      <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <?php $opt = "hospital_index"; include "includes/menus/".$user_data['menu'];?>
      </div>
    </div>
    <!-- Left navbar-header end -->
    <!-- Page Content -->
    <div id="page-wrapper">
      <div class="container-fluid">
        <div class="row bg-title">
          <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><?php echo $user_data['institucion'];?></h4>
          </div>
          <!-- /.col-lg-12 -->
        </div>

        <!--.row-->
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-info">
              <div class="panel-heading">SUBIR ARCHIVOS</div>
              <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                  <div class="col-md-12">
                    <form enctype="multipart/form-data" id="form_archivos">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Seleccione el archivo a subir: <span class="text-danger">*</span></label>
                        <div class="col-sm-12">
                          <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                            <div class="form-control" data-trigger="fileinput">
                              <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                            </div>
                            <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Seleccionar archivo</span> <span class="fileinput-exists">Cambiar</span>
                            <input id="archivo" name="archivo" type="file" accept=".jpg, .png, .jpeg, .gif|images/*, application/pdf">
                          </span>
                          <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Fecha <span class="text-danger">*</span></label>
                      <input class="form-control" id="fecha" name="fecha" value="<?php echo date("Y-m-d");?>" type="text">
                      <input type="hidden" name="id" id="id" value="<?php echo $_GET['id'];?>" />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Tipo documento <span class="text-danger">*</span></label>
                      <select class="form-control" id="tipo_documento" name="tipo_documento">
                        <?php echo $tipo_documento; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Descripcion</label>
                      <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Subir</button>
                    <button type="button" onclick="javascript:window.close();" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--./row-->

      <?php include "includes/right_sidebar.php";?>

    </div>
    <!-- /.container-fluid -->
    <?php include "includes/footer.php";?>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php include 'includes/progress_modal.php';?>
<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>assets/bootstrap/dist/js/tether.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="<?php echo base_url();?>assets/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url();?>assets/js/waves.js"></script>
<!-- DataTable JavaScript -->
<script src="<?php echo base_url();?>assets/plugins/bower_components/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<!-- Sweet-Alert  -->
<script src="<?php echo base_url();?>assets/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="<?php echo base_url();?>assets/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url();?>assets/js/custom.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jasny-bootstrap.js"></script>
<script src="<?php echo base_url();?>js/hospital/archivos.js"></script>
</body>

</html>
