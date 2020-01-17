<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('Administrador','idrol')){
$user_data = $this->session->userdata('Administrador');
}
else if($this->session->userdata('Operador','idrol')){
$user_data = $this->session->userdata('Operador');
}
else if($this->session->userdata('Cliente','idrol')){
$user_data = $this->session->userdata('Cliente');
}
?>

    <!-- start header -->
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo">
                    <a href="<?=base_url()?>">
                    <span class="logo-icon fa fa-money fa-rotate-45"></span>                  
                    <span class="logo-default" >SMART</span> </a>
                </div>
                <!-- logo end -->
        <ul class="nav navbar-nav navbar-left in">
          <li>
		  <a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a>
		  </li>
        </ul>
                <!--<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>-->
                <!-- start mobile menu -->
               <!-- end mobile menu -->
                <!-- start header menu -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">           
            <!-- start manage user dropdown -->
            <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle " src="<?php echo base_url(); ?>assets/img/dp.png" />
                                <span class="username username-hide-on-mobile">
								Bienvenido:
                                 <?php echo $user_data['nombre'];?>  
                                 </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="user_profile.html">
                                        <i class="icon-user"></i> Perfil </a>
                                </li>
                                <li>
                                    <a href="../Iniciar_sesion/cerrar_sesion">
                                        <i class="icon-logout"></i> Cerrar Sesion 
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end manage user dropdown -->
                    </ul>
                </div>
            </div>
        </div>
        <!-- end header -->