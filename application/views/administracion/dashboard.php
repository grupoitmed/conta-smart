<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<!-- BEGIN HEAD -->
<head>

    <?php include "includes/meta.php";?>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
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

    <link href="<?php echo base_url();?>assets/assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url();?>assets/assets/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" media="screen">
        <!--select2-->
    <link href="<?php echo base_url();?>assets/assets/select2/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/assets/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.ico" />

    <!-- sweet alert -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/sweet-alert/sweetalert.min.css">

 </head>
 <!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-dark dark-sidebar-color logo-dark dark-theme" onload="load_empresa_registro();">
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
                                <div class="col-xl-3 col-md-6 col-12">
								<a href="Empresas" >
                                  <div class="info-box bg-blue">
                                    <span class="info-box-icon push-bottom" style="margin-top: 0px;"><i class="material-icons">business</i></span>
                                    <div class="info-box-content">

                                      <span class="info-box-text">Nueva Empresa</span>
                                     <!-- <span class="info-box-number">450</span>-->

                                      <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                      </div>
                                      <span class="progress-description">

                                       </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
								  </a>
                                  <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-xl-3 col-md-6 col-12">
								<a href="Proveedor" >
                                  <div class="info-box bg-orange">
                                    <span class="info-box-icon push-bottom" style="margin-top: 0px;"><i class="material-icons">group </i></span>
                                    <div class="info-box-content">
                                      <span class="info-box-text">Provedores</span>
                                     <!-- <span class="info-box-number">155</span>-->
                                      <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                      </div>
                                      <span class="progress-description">
                                        <!--    40% Increase in 28 Days-->
                                          </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
								  </a>
                                  <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-xl-3 col-md-6 col-12">
								<a href="Ingresar_empresa" >
                                  <div class="info-box bg-purple">
                                    <span class="info-box-icon push-bottom" style="margin-top: 0px;"><i class="material-icons">money_off </i></span>
                                    <div class="info-box-content">
                                      <span class="info-box-text">Compras</span>
                                     <!-- <span class="info-box-number">52</span>-->
                                      <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                      </div>
                                      <span class="progress-description">
                                          <!--  85% Increase in 28 Days-->
                                          </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
								  </a>
                                  <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-xl-3 col-md-6 col-12">
								<a href="Ingresar_empresa_venta" >
                                  <div class="info-box bg-success">
                                    <span class="info-box-icon push-bottom" style="margin-top: 0px;"><i class="material-icons">monetization_on</i></span>
                                    <div class="info-box-content">
                                      <span class="info-box-text">Ventas</span>
                                     <!-- <span class="info-box-number">13,921</span><span>$</span>-->
                                      <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                      </div>
                                      <span class="progress-description">
                                           <!-- 50% Increase in 28 Days -->
                                          </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
								  </a>
                                  <!-- /.info-box -->
                                </div>
                                <!-- /.col -->

								 <div class="col-xl-3 col-md-6 col-12">
								 <a href="Buscar_empresa" >
                                  <div class="info-box bg-blue">
                                    <span class="info-box-icon push-bottom" style="margin-top: 0px;"><i class="material-icons">search </i></span>
                                    <div class="info-box-content">
                                      <span class="info-box-text">Buscar empresa</span>
                                      <!--<span class="info-box-number">450</span>-->
                                      <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                      </div>
                                      <span class="progress-description">
                                          <!--  45% Increase in 28 Days -->
                                          </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
								  </a>
                                  <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-xl-3 col-md-6 col-12">
								<a href="" >
                                  <div class="info-box bg-orange">
                                    <span class="info-box-icon push-bottom" style="margin-top: 0px;"><i class="material-icons">assignment</i></span>
                                    <div class="info-box-content">
                                      <span class="info-box-text">Libro de IVA</span>
                                      <!--<span class="info-box-number">155</span>-->
                                      <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                      </div>
                                      <span class="progress-description">
                                         <!--   40% Increase in 28 Days -->
                                          </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
								  </a>
                                  <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-xl-3 col-md-6 col-12">
								<a href="Libro_compras" >
                                  <div class="info-box bg-purple">
                                    <span class="info-box-icon push-bottom" style="margin-top: 0px;"><i class="material-icons">assignment</i></span>
                                    <div class="info-box-content">
                                      <span class="info-box-text">Libro de compras</span>
                                      <!--<span class="info-box-number">52</span>-->
                                      <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                      </div>
                                      <span class="progress-description">
                                          <!--  85% Increase in 28 Days -->
                                          </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
								  </a>
                                  <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-xl-3 col-md-6 col-12">
								<a href="Usuario" >
                                  <div class="info-box bg-success">
                                    <span class="info-box-icon push-bottom" style="margin-top: 0px;"><i class="material-icons">person</i></span>
                                    <div class="info-box-content">
                                      <span class="info-box-text">Usuarios</span>
                                     <!-- <span class="info-box-number">13,921</span><span>$</span>-->
                                      <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                      </div>
                                      <span class="progress-description">
                                          <!--  50% Increase in 28 Days -->
                                          </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>
								  </a>
                                  <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                              </div>
                        </div>
                    <!-- end widget -->
                     <!-- start admited patient list -->
                    <div class="row">
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
                                        <div class="table-responsive" id="empresaload">
                                           <!-- <table class="table display product-overview mb-30" id="support_table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>EMPRESA</th>
                                                        <th>NRC</th>
                                                        <th>FECHA PAGO</th>
                                                        <th>ESTADO</th>
                                                        <th>MONTO</th>
                                                        <th>ACCIONES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <tr>
                                                        <td>1</td>
                                                        <td>Jens Brincker</td>
                                                        <td>Dr.Kenny Josh</td>
                                                        <td>27/05/2016</td>
                                                        <td>
                                                            <span class="label label-sm label-success">Influenza</span>
                                                        </td>
                                                        <td>101</td>
                                                        <td><a href="javascript:void(0)" class="" data-toggle="tooltip" title="Edit" ><i class="fa fa-check"></i></a> <a href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
                                                    </tr>



                                                </tbody>
                                            </table>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end admited patient list -->
                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
            <div class="chat-sidebar-container" data-close-on-body-click="false">
                <div class="chat-sidebar">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#quick_sidebar_tab_1" class="nav-link active tab-icon"  data-toggle="tab"> <i class="material-icons">chat</i>Chat
                                    <span class="badge badge-danger">4</span>
                                </a>
                        </li>
                        <li class="nav-item">
                            <a href="#quick_sidebar_tab_3" class="nav-link tab-icon"  data-toggle="tab"> <i class="material-icons">settings</i> Settings
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- Start Doctor Chat -->
                        <div class="tab-pane active chat-sidebar-chat in active show" role="tabpanel" id="quick_sidebar_tab_1">
                            <div class="chat-sidebar-list">
                                <div class="chat-sidebar-chat-users slimscroll-style" data-rail-color="#ddd" data-wrapper-class="chat-sidebar-list">
                                    <div class="chat-header"><h5 class="list-heading">Online</h5></div>
                                    <ul class="media-list list-items">
                                        <li class="media"><img class="media-object" src="img/doc/doc3.jpg" width="35" height="35" alt="...">
                                            <i class="online dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">John Deo</h5>
                                                <div class="media-heading-sub">Spine Surgeon</div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-success">5</span>
                                            </div> <img class="media-object" src="img/doc/doc1.jpg" width="35" height="35" alt="...">
                                            <i class="busy dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Rajesh</h5>
                                                <div class="media-heading-sub">Director</div>
                                            </div>
                                        </li>
                                        <li class="media"><img class="media-object" src="img/doc/doc5.jpg" width="35" height="35" alt="...">
                                            <i class="away dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Jacob Ryan</h5>
                                                <div class="media-heading-sub">Ortho Surgeon</div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-danger">8</span>
                                            </div> <img class="media-object" src="img/doc/doc4.jpg" width="35" height="35" alt="...">
                                            <i class="online dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Kehn Anderson</h5>
                                                <div class="media-heading-sub">CEO</div>
                                            </div>
                                        </li>
                                        <li class="media"><img class="media-object" src="img/doc/doc2.jpg" width="35" height="35" alt="...">
                                            <i class="busy dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Sarah Smith</h5>
                                                <div class="media-heading-sub">Anaesthetics</div>
                                            </div>
                                        </li>
                                        <li class="media"><img class="media-object" src="img/doc/doc7.jpg" width="35" height="35" alt="...">
                                            <i class="online dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Vlad Cardella</h5>
                                                <div class="media-heading-sub">Cardiologist</div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="chat-header"><h5 class="list-heading">Offline</h5></div>
                                    <ul class="media-list list-items">
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-warning">4</span>
                                            </div> <img class="media-object" src="img/doc/doc6.jpg" width="35" height="35" alt="...">
                                            <i class="offline dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Jennifer Maklen</h5>
                                                <div class="media-heading-sub">Nurse</div>
                                                <div class="media-heading-small">Last seen 01:20 AM</div>
                                            </div>
                                        </li>
                                        <li class="media"><img class="media-object" src="img/doc/doc8.jpg" width="35" height="35" alt="...">
                                            <i class="offline dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Lina Smith</h5>
                                                <div class="media-heading-sub">Ortho Surgeon</div>
                                                <div class="media-heading-small">Last seen 11:14 PM</div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-success">9</span>
                                            </div> <img class="media-object" src="img/doc/doc9.jpg" width="35" height="35" alt="...">
                                            <i class="offline dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Jeff Adam</h5>
                                                <div class="media-heading-sub">Compounder</div>
                                                <div class="media-heading-small">Last seen 3:31 PM</div>
                                            </div>
                                        </li>
                                        <li class="media"><img class="media-object" src="img/doc/doc10.jpg" width="35" height="35" alt="...">
                                            <i class="offline dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Anjelina Cardella</h5>
                                                <div class="media-heading-sub">Physiotherapist</div>
                                                <div class="media-heading-small">Last seen 7:45 PM</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="chat-sidebar-item">
                                <div class="chat-sidebar-chat-user">
                                    <div class="page-quick-sidemenu">
                                        <a href="javascript:;" class="chat-sidebar-back-to-list">
                                            <i class="fa fa-angle-double-left"></i>Back
                                        </a>
                                    </div>
                                    <div class="chat-sidebar-chat-user-messages">
                                        <div class="post out">
                                            <img class="avatar" alt="" src="img/dp.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:10</span>
                                                <span class="body-out"> could you send me menu icons ? </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="img/doc/doc5.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Jacob Ryan</a> <span class="datetime">9:10</span>
                                                <span class="body"> please give me 10 minutes. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="img/dp.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:11</span>
                                                <span class="body-out"> ok fine :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="img/doc/doc5.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Jacob Ryan</a> <span class="datetime">9:22</span>
                                                <span class="body">Sorry for
                                                    the delay. i sent mail to you. let me know if it is ok or not.</span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="img/dp.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:26</span>
                                                <span class="body-out"> it is perfect! :) </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="img/dp.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:26</span>
                                                <span class="body-out"> Great! Thanks. </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="img/doc/doc5.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Jacob Ryan</a> <span class="datetime">9:27</span>
                                                <span class="body"> it is my pleasure :) </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-sidebar-chat-user-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Type a message here...">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn deepPink-bgcolor">
                                                    <i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Doctor Chat -->
                        <!-- Start Setting Panel -->
                        <div class="tab-pane chat-sidebar-settings" role="tabpanel" id="quick_sidebar_tab_3">
                            <div class="chat-sidebar-settings-list slimscroll-style">
                                <div class="chat-header"><h5 class="list-heading">Layout Settings</h5></div>
                                <div class="chatpane inner-content ">
                                    <div class="settings-list">
                                        <div class="setting-item">
                                            <div class="setting-text">Sidebar Position</div>
                                            <div class="setting-set">
                                               <select class="sidebar-pos-option form-control input-inline input-sm input-small ">
                                                    <option value="left" selected="selected">Left</option>
                                                    <option value="right">Right</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Header</div>
                                            <div class="setting-set">
                                               <select class="page-header-option form-control input-inline input-sm input-small ">
                                                    <option value="fixed" selected="selected">Fixed</option>
                                                    <option value="default">Default</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Sidebar Menu </div>
                                            <div class="setting-set">
                                               <select class="sidebar-menu-option form-control input-inline input-sm input-small ">
                                                    <option value="accordion" selected="selected">Accordion</option>
                                                    <option value="hover">Hover</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Footer</div>
                                            <div class="setting-set">
                                               <select class="page-footer-option form-control input-inline input-sm input-small ">
                                                    <option value="fixed">Fixed</option>
                                                    <option value="default" selected="selected">Default</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-header"><h5 class="list-heading">Account Settings</h5></div>
                                    <div class="settings-list">
                                        <div class="setting-item">
                                            <div class="setting-text">Notifications</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                      for = "switch-1">
                                                      <input type = "checkbox" id = "switch-1"
                                                         class = "mdl-switch__input" checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Show Online</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                      for = "switch-7">
                                                      <input type = "checkbox" id = "switch-7"
                                                         class = "mdl-switch__input" checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Status</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                      for = "switch-2">
                                                      <input type = "checkbox" id = "switch-2"
                                                         class = "mdl-switch__input" checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">2 Steps Verification</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                      for = "switch-3">
                                                      <input type = "checkbox" id = "switch-3"
                                                         class = "mdl-switch__input" checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-header"><h5 class="list-heading">General Settings</h5></div>
                                    <div class="settings-list">
                                        <div class="setting-item">
                                            <div class="setting-text">Location</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                      for = "switch-4">
                                                      <input type = "checkbox" id = "switch-4"
                                                         class = "mdl-switch__input" checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Save Histry</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                      for = "switch-5">
                                                      <input type = "checkbox" id = "switch-5"
                                                         class = "mdl-switch__input" checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Auto Updates</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                      for = "switch-6">
                                                      <input type = "checkbox" id = "switch-6"
                                                         class = "mdl-switch__input" checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->
            <div class="chat-sidebar-container" data-close-on-body-click="false">
                <div class="chat-sidebar">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#quick_sidebar_tab_1" class="nav-link active tab-icon"  data-toggle="tab"> <i class="material-icons">chat</i>Chat
                                    <span class="badge badge-danger">4</span>
                                </a>
                        </li>
                        <li class="nav-item">
                            <a href="#quick_sidebar_tab_3" class="nav-link tab-icon"  data-toggle="tab"> <i class="material-icons">settings</i> Settings
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- Start Doctor Chat -->
                        <div class="tab-pane active chat-sidebar-chat in active show" role="tabpanel" id="quick_sidebar_tab_1">
                            <div class="chat-sidebar-list">
                                <div class="chat-sidebar-chat-users slimscroll-style" data-rail-color="#ddd" data-wrapper-class="chat-sidebar-list">
                                    <div class="chat-header"><h5 class="list-heading">Online</h5></div>
                                    <ul class="media-list list-items">
                                        <li class="media"><img class="media-object" src="img/doc/doc3.jpg" width="35" height="35" alt="...">
                                            <i class="online dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">John Deo</h5>
                                                <div class="media-heading-sub">Spine Surgeon</div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-success">5</span>
                                            </div> <img class="media-object" src="img/doc/doc1.jpg" width="35" height="35" alt="...">
                                            <i class="busy dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Rajesh</h5>
                                                <div class="media-heading-sub">Director</div>
                                            </div>
                                        </li>
                                        <li class="media"><img class="media-object" src="img/doc/doc5.jpg" width="35" height="35" alt="...">
                                            <i class="away dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Jacob Ryan</h5>
                                                <div class="media-heading-sub">Ortho Surgeon</div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-danger">8</span>
                                            </div> <img class="media-object" src="img/doc/doc4.jpg" width="35" height="35" alt="...">
                                            <i class="online dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Kehn Anderson</h5>
                                                <div class="media-heading-sub">CEO</div>
                                            </div>
                                        </li>
                                        <li class="media"><img class="media-object" src="img/doc/doc2.jpg" width="35" height="35" alt="...">
                                            <i class="busy dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Sarah Smith</h5>
                                                <div class="media-heading-sub">Anaesthetics</div>
                                            </div>
                                        </li>
                                        <li class="media"><img class="media-object" src="img/doc/doc7.jpg" width="35" height="35" alt="...">
                                            <i class="online dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Vlad Cardella</h5>
                                                <div class="media-heading-sub">Cardiologist</div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="chat-header"><h5 class="list-heading">Offline</h5></div>
                                    <ul class="media-list list-items">
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-warning">4</span>
                                            </div> <img class="media-object" src="img/doc/doc6.jpg" width="35" height="35" alt="...">
                                            <i class="offline dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Jennifer Maklen</h5>
                                                <div class="media-heading-sub">Nurse</div>
                                                <div class="media-heading-small">Last seen 01:20 AM</div>
                                            </div>
                                        </li>
                                        <li class="media"><img class="media-object" src="img/doc/doc8.jpg" width="35" height="35" alt="...">
                                            <i class="offline dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Lina Smith</h5>
                                                <div class="media-heading-sub">Ortho Surgeon</div>
                                                <div class="media-heading-small">Last seen 11:14 PM</div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-status">
                                                <span class="badge badge-success">9</span>
                                            </div> <img class="media-object" src="img/doc/doc9.jpg" width="35" height="35" alt="...">
                                            <i class="offline dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Jeff Adam</h5>
                                                <div class="media-heading-sub">Compounder</div>
                                                <div class="media-heading-small">Last seen 3:31 PM</div>
                                            </div>
                                        </li>
                                        <li class="media"><img class="media-object" src="img/doc/doc10.jpg" width="35" height="35" alt="...">
                                            <i class="offline dot"></i>
                                            <div class="media-body">
                                                <h5 class="media-heading">Anjelina Cardella</h5>
                                                <div class="media-heading-sub">Physiotherapist</div>
                                                <div class="media-heading-small">Last seen 7:45 PM</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="chat-sidebar-item">
                                <div class="chat-sidebar-chat-user">
                                    <div class="page-quick-sidemenu">
                                        <a href="javascript:;" class="chat-sidebar-back-to-list">
                                            <i class="fa fa-angle-double-left"></i>Back
                                        </a>
                                    </div>
                                    <div class="chat-sidebar-chat-user-messages">
                                        <div class="post out">
                                            <img class="avatar" alt="" src="img/dp.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:10</span>
                                                <span class="body-out"> could you send me menu icons ? </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="img/doc/doc5.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Jacob Ryan</a> <span class="datetime">9:10</span>
                                                <span class="body"> please give me 10 minutes. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="img/dp.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:11</span>
                                                <span class="body-out"> ok fine :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="img/doc/doc5.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Jacob Ryan</a> <span class="datetime">9:22</span>
                                                <span class="body">Sorry for
                                                    the delay. i sent mail to you. let me know if it is ok or not.</span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="img/dp.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:26</span>
                                                <span class="body-out"> it is perfect! :) </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="img/dp.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:26</span>
                                                <span class="body-out"> Great! Thanks. </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="img/doc/doc5.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Jacob Ryan</a> <span class="datetime">9:27</span>
                                                <span class="body"> it is my pleasure :) </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-sidebar-chat-user-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Type a message here...">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn deepPink-bgcolor">
                                                    <i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Doctor Chat -->
                        <!-- Start Setting Panel -->
                        <div class="tab-pane chat-sidebar-settings" role="tabpanel" id="quick_sidebar_tab_3">
                            <div class="chat-sidebar-settings-list slimscroll-style">
                                <div class="chat-header"><h5 class="list-heading">Layout Settings</h5></div>
                                <div class="chatpane inner-content ">
                                    <div class="settings-list">
                                        <div class="setting-item">
                                            <div class="setting-text">Sidebar Position</div>
                                            <div class="setting-set">
                                               <select class="sidebar-pos-option form-control input-inline input-sm input-small ">
                                                    <option value="left" selected="selected">Left</option>
                                                    <option value="right">Right</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Header</div>
                                            <div class="setting-set">
                                               <select class="page-header-option form-control input-inline input-sm input-small ">
                                                    <option value="fixed" selected="selected">Fixed</option>
                                                    <option value="default">Default</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Sidebar Menu </div>
                                            <div class="setting-set">
                                               <select class="sidebar-menu-option form-control input-inline input-sm input-small ">
                                                    <option value="accordion" selected="selected">Accordion</option>
                                                    <option value="hover">Hover</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Footer</div>
                                            <div class="setting-set">
                                               <select class="page-footer-option form-control input-inline input-sm input-small ">
                                                    <option value="fixed">Fixed</option>
                                                    <option value="default" selected="selected">Default</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-header"><h5 class="list-heading">Account Settings</h5></div>
                                    <div class="settings-list">
                                        <div class="setting-item">
                                            <div class="setting-text">Notifications</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                      for = "switch-1">
                                                      <input type = "checkbox" id = "switch-1"
                                                         class = "mdl-switch__input" checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Show Online</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                      for = "switch-7">
                                                      <input type = "checkbox" id = "switch-7"
                                                         class = "mdl-switch__input" checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Status</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                      for = "switch-2">
                                                      <input type = "checkbox" id = "switch-2"
                                                         class = "mdl-switch__input" checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">2 Steps Verification</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                      for = "switch-3">
                                                      <input type = "checkbox" id = "switch-3"
                                                         class = "mdl-switch__input" checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-header"><h5 class="list-heading">General Settings</h5></div>
                                    <div class="settings-list">
                                        <div class="setting-item">
                                            <div class="setting-text">Location</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                      for = "switch-4">
                                                      <input type = "checkbox" id = "switch-4"
                                                         class = "mdl-switch__input" checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Save Histry</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                      for = "switch-5">
                                                      <input type = "checkbox" id = "switch-5"
                                                         class = "mdl-switch__input" checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="setting-item">
                                            <div class="setting-text">Auto Updates</div>
                                            <div class="setting-set">
                                                <div class="switch">
                                                    <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect"
                                                      for = "switch-6">
                                                      <input type = "checkbox" id = "switch-6"
                                                         class = "mdl-switch__input" checked>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
	<script src="<?php echo base_url();?>js/administrador/dashboard.js" ></script>
      </body>

</html>
