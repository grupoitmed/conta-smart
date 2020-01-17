<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// var_dump($this->session->userdata['Cliente']);
?><!DOCTYPE html>
<html lang="es">
<!-- BEGIN HEAD -->
<head>

    <?php include "includes/meta.php";?>
    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="<?php echo base_url();?>assets/assets/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--bootstrap -->
    <link href="<?php echo base_url();?>assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	    <!-- morris chart -->
    <link href="<?php echo base_url();?>assets/assets/morris/morris.css" rel="stylesheet" type="text/css" />
	<!--datatable-->
	<link href="<?php echo base_url()?>assets/assets/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url()?>assets/assets/datatables/export/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

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

    <!-- sweet alert dr colindres 2473  -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/assets/sweet-alert/sweetalert.min.css">

 </head>
 <!-- END HEAD -->
<body onload="load_compraventas();" class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-dark dark-sidebar-color logo-dark dark-theme">
    <div class="page-wrapper">
        <!-- Navigation -->
        <?php include "includes/nav_bar_header.php";?>

        <!-- start page container -->
        <div class="page-container">
          <?php $opt = "dashboard"; include "includes/menus/".$user_data['menu'];?>
            <!-- end sidebar menu --> 
            <!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
  <!-- start widget -->
                    <div class="state-overview">
							<div class="row">
						        <!--<div class="col-xl-4 col-xs-6 col-md-6 col-12">
						          <div class="info-box bg-blue">
						            <span class="info-box-icon push-bottom"><i class="material-icons">attach_money</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">IVA venta</span>
						              <span class="info-box-number">$<?php echo number_format($iva_general,2);?></span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 45%"></div>
						              </div>
						              <span class="progress-description">
						                    balance actual
						                  </span>
						            </div>
						          </div>
						        </div>-->
								<div class="col-xl-9 col-xs-6 col-md-6 col-12">
								
						          <div class="info-box bg-success">
						            <span class="info-box-icon push-bottom"><i class="material-icons">monetization_on</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">Total a pagar de IVA y pago a cuenta.</span>
						              <span class="info-box-number">$<?php echo number_format($balance_iva,2)?></span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 40%"></div>
						              </div>
						              <span class="progress-description">
						                    ventas menos compras y deducciones
						                  </span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						        </div>
						        <div class="col-xl-3 col-xs-6 col-md-6 col-12">
						          <div class="info-box bg-info">
						            <span class="info-box-icon push-bottom"><i class="material-icons">developer_board</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">Balance Compras</span>
						              <span class="info-box-number">$<?php echo number_format($iva_compras,2);?></span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 85%"></div>
						              </div>
						              <span class="progress-description">
						                    IVA de Compras
						                  </span>
						            </div>
						          </div>
						        </div>
						        
						        <!-- /.col -->
								<div class="col-xl-3 col-xs-6 col-md-6 col-12">
								
						          <div class="info-box bg-purple">
						            <span class="info-box-icon push-bottom"><i class="material-icons">developer_board</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">Balance Ventas</span>
						              <span class="info-box-number">$<?php echo number_format($iva_general,2);?></span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 40%"></div>
						              </div>
						              <span class="progress-description">
						                    IVA de ventas
						                  </span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>
								 
						          <!-- /.info-box -->
						        </div>
						        <div class="col-xl-3 col-xs-6 col-md-6 col-12">
						          <div class="info-box bg-orange">
						            <span class="info-box-icon push-bottom"><i class="material-icons">add_circle_outline</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">Pago a cuenta</span>
						              <span class="info-box-number">$<?php echo number_format($pagocuenta,2)?></span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 40%"></div>
						              </div>
						              <span class="progress-description">
						                    balance actual
						                  </span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <!-- /.info-box -->
						        </div>
						        <div class="col-xl-3 col-xs-6 col-md-6 col-12">
						          <div class="info-box bg-blue">
						            <span class="info-box-icon push-bottom"><i class="material-icons">add_circle_outline</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">Retenciones</span>
						              <span class="info-box-number">$<?php echo number_format($retenciones,2)?></span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 40%"></div>
						              </div>
						              <span class="progress-description">
						                    balance actual
						                  </span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <!-- /.info-box -->
						        </div>
								<div class="col-xl-3 col-xs-6 col-md-6 col-12">
						          <div class="info-box bg-primary">
						            <span class="info-box-icon push-bottom"><i class="material-icons">remove_circle_outline</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">IVA retenido</span>
						              <span class="info-box-number">$<?php echo number_format($iva_retenido,2);?></span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 85%"></div>
						              </div>
						              <span class="progress-description">
						                    balance actual
						                </span>
						            </div>
						            <!-- /.info-box-content -->
						          </div>
						          <!-- /.info-box -->
						        </div>
								
								<!--<div class="col-xl-4 col-xs-6 col-md-6 col-12">
						          <div class="info-box bg-success">
						            <span class="info-box-icon push-bottom"><i class="material-icons">monetization_on</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">Ventas mes</span>
						              <span class="info-box-number">$<?php echo number_format($venta_mes,2)?></span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 50%"></div>
						              </div>
						              <span class="progress-description">
											<?php echo $get_mes_actual;?>
						                  </span>
						            </div>
						          </div>
						        </div>-->
						        <!-- /.col -->
								<!--<div class="col-xl-4 col-md-6 col-12">
						          <div class="info-box bg-primary">
						            <span class="info-box-icon push-bottom"><i class="material-icons">add_shopping_cart</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">Compras mes</span>
						              <span class="info-box-number">$<?php echo number_format($compras_mes,2);?></span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 50%"></div>
						              </div>
						              <span class="progress-description">
						                    <?php echo $get_mes_actual;?>
						                  </span>
						            </div>
						          </div>
						        </div>-->
						        
						        <!--<div class="col-xl-4 col-md-6 col-12">
						          <div class="info-box bg-primary">
						            <span class="info-box-icon push-bottom"><i class="material-icons">add_shopping_cart</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">Compras mes anterior</span>
						              <span class="info-box-number">$<?php echo number_format($compras_mes_anterior,2);?></span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 50%"></div>
						              </div>
						              <span class="progress-description">
						                    <?php echo $get_mes_anterior;?>
						                  </span>
						            </div>
						          </div>
						        </div>-->
								<!--<div class="col-xl-4 col-md-6 col-12">
						          <div class="info-box bg-orange">
						            <span class="info-box-icon push-bottom"><i class="material-icons">developer_board</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">Ventas mes anterior</span>
						              <span class="info-box-number">$<?php echo number_format($venta_mes_anterior,2);?></span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 45%"></div>
						              </div>
						              <span class="progress-description">
						                    <?php echo $get_mes_anterior;?>
						                  </span>
						            </div>
						          </div>
						        </div>-->
								<!--<div class="col-xl-4 col-md-6 col-12">
								<a href="buscar_reporte_ventas_consumidor_final">
						          <div class="info-box bg-orange">
						            <span class="info-box-icon push-bottom"><i class="material-icons">developer_board</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">Ver Libro</span>
						              <span class="info-box-number">CF</span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 45%"></div>
						              </div>
						              <span class="progress-description">
						                    consumidor final
						                  </span>
						            </div>
						          </div>
								  </a>
						        </div>
								 <div class="col-xl-4 col-md-6 col-12">
								<a href="buscar_reporte_ventas_credito_fiscal">
						          <div class="info-box bg-purple">
						            <span class="info-box-icon push-bottom"><i class="material-icons">developer_board</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">Ver Libro</span>
						              <span class="info-box-number">CCF</span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 40%"></div>
						              </div>
						              <span class="progress-description">
						                    credito fiscal
						                  </span>
						            </div>
						          </div>
								  </a>
						        </div>
								<div class="col-xl-4 col-md-6 col-12">
								<a href="Buscar_reporte_compras">
						          <div class="info-box bg-success">
						            <span class="info-box-icon push-bottom"><i class="material-icons">developer_board</i></span>
						            <div class="info-box-content">
						              <span class="info-box-text">Ver Libro</span>
						              <span class="info-box-number">Compras</span>
						              <div class="progress">
						                <div class="progress-bar" style="width: 85%"></div>
						              </div>
						              <span class="progress-description">
						                    compras
						                  </span>
						            </div>
						          </div>
								  </a>
						        </div>-->
						      </div>
							  
						</div>
							  <div class="table-responsive" id="compraventa"></div>
						<div class="state-overview">
							<div class="row">
						         
						      </div>
						</div>
						<div class="state-overview">
							<div class="row">
							
							
								
						      </div>
						</div>
						<div class="state-overview">
							<div class="row">
						      
						      </div>
						</div>
						
                    <!-- end widget -->
                    <!-- start line chart -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-box">
                                <div class="card-head" id="header_11" style="cursor:pointer;">
                                    <header>Grafico historico de ventas</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a id="colapsep1" class=" btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body no-padding height-9" id="bar_parent2" style="">
                                    <div class="row">
                                        <div id="morris_chart_1" style="width:100%; height: 500px;"></div>
                                    </div>
                                </div>
								
                            </div>
                        </div>
                    </div>
					
					<div class="row">
						<div class="col-md-12 text-center">
						<a href="buscar_reporte_ventas_credito_fiscal" class="btn btn-circle btn-primary">Libro ccf</a>
						<a href="buscar_reporte_ventas_consumidor_final" class="btn btn-circle btn-success">Libro cf</a>
						<a href="Buscar_reporte_compras" class="btn btn-circle btn-info">Compras</a>
						<a href="Descargas" class="btn btn-circle btn-warning">Descargas</a>
						</div>
					</div>
                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
            
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
            
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->


<!-- start footer -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2019 &copy; CONTA-SMART
            <!--<a href="mailto:redstartheme@gmail.com" target="_top" class="makerCss">RT Theme maker</a>-->
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- end footer -->
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

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
	    <!-- morris chart -->
    <script src="<?php echo base_url();?>assets/assets/morris/morris.min.js" ></script>
    <script src="<?php echo base_url();?>assets/assets/morris/raphael-min.js" ></script>
	    <script src="<?php echo base_url();?>assets/assets/morris/morris_chart_data.js" ></script>
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
    <!--<script src="<?php echo base_url();?>assets/assets/datatables/jquery.dataTables.min.js" ></script>
    <script src="<?php echo base_url();?>assets/assets/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js" ></script>-->
	<script src="<?php echo base_url();?>assets/assets/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>assets/assets/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url();?>assets/assets/datatables/export/dataTables.buttons.min.js"></script>

    <script src="<?php echo base_url();?>assets/assets/table_data.js" ></script>
	<!--<script src="<?php echo base_url();?>js/administrador/dashboard.js" ></script>-->
	<script src="<?php echo base_url();?>js/cliente/dashboard.js" ></script>
	<script>
		$(document).ready(function(){
			$("#bar_parent2").css("display","none");
			$("#header_11").click(function (){
				$("#bar_parent2").toggle("500");
				$("#colapsep1").toggleClass("fa-chevron-up");
				$("#colapsep1").toggleClass("fa-chevron-down");
			});
		});
	</script>
    </body>

</html>
