<!-- start sidebar menu -->
<div class="sidebar-container">
  <div class="sidemenu-container navbar-collapse collapse fixed-menu">
    <div id="remove-scroll" class="left-sidemenu">
      <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <li class="sidebar-toggler-wrapper hide">
          <div class="sidebar-toggler">
            <span></span>
          </div>
        </li>
        <li class="sidebar-user-panel">
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>assets/img/dp.png" class="img-circle user-img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>   <?php echo $user_data['usuario'];?>   </p>
              <a href=""><i class="fa fa-circle user-online"></i><span class="txtOnline"> Online</span></a>
            </div>
          </div>
        </li>
        <li  <?php if($opt == "deducciones" || $opt == "dashboard" || $opt == "compras" || $opt == "nueva_empresa" || $opt == "buscar_empresa" || $opt == "ventas"){ echo 'class="nav-item start active open"';}else{ echo 'class="nav-item start acive open"'; }?>>
          <a href="#" class="nav-link nav-toggle">
            <i class="material-icons">dashboard</i>
            <span class="title">Contabilidad</span>
            <span class="selected"></span>
            <span class="arrow open"></span>
          </a>
          <ul class="sub-menu">
            <!--<li <?php if($opt == "dashboard"){ echo 'class="nav-item active open"'; }?>>
              <a href="/" class="nav-link ">
                <span class="title">Home</span>
                <span class="selected"></span>
              </a>
            </li>-->
            <li <?php if($opt == "nueva_empresa"){ echo 'class="nav-item active open"'; }?>>
              <a href="Empresas" class="nav-link ">
                <span class="title">Nueva empresa</span>
                <span class="selected"></span>
              </a>
            </li>
            <li <?php if($opt == "buscar_empresa"){ echo 'class="nav-item active open"'; }?>>
              <a href="Buscar_empresa" class="nav-link">
                <span class="title">Buscar empresa</span>
              </a>
            </li>

            <li  <?php if($opt == "compras"){ echo 'class="nav-item active open"'; }?>>
              <a href="Ingresar_empresa" class="nav-link ">
                <span class="title">Compras</span>
              </a>
            </li>
            <li <?php if($opt == "ventas"){ echo 'class="nav-item active open"'; }?>>
              <a href="Ingresar_empresa_venta" class="nav-link ">
                <span class="title">Ventas</span>
                <span class="selected"></span>
              </a>
            </li>
            <li <?php if($opt == "deducciones"){ echo 'class="nav-item active open"'; }?>>
              <a href="Ingresar_deducciones" class="nav-link ">
                <span class="title">Deducciones</span>
                <span class="selected"></span>
              </a>
            </li>
          </ul>
        </li>


        <li <?php if($opt == "proveedor" || $opt == "buscar_proveedor"){ echo 'class="nav-item start active open"';}else{ echo 'class="nav-item"'; }?>>
          <a href="#" class="nav-link nav-toggle">
            <i class="material-icons">supervisor_account </i>
            <span class="title">Proveedores</span>
            <span class="arrow"></span>
          </a>
          <ul class="sub-menu">
            <li <?php if($opt == "proveedor"){ echo 'class="nav-item active open"'; }?>>
              <a  href="Proveedor" class="nav-link ">
                <span class="title">Nuevo proveedor</span>
              </a>
            </li>
            <li <?php if($opt == "buscar_proveedor"){ echo 'class="nav-item active open"'; }?>>
              <a href="Buscar_proveedor" class="nav-link ">
                <span class="title">Buscar proveedor</span>
              </a>
            </li>
          </ul>
        </li>
        <li <?php if($opt == "consumidorfinal" || $opt == "libro_compras" || $opt == "creditofiscal"){ echo 'class="nav-item start active open"';}else{ echo 'class="nav-item"'; }?>>
          <a href="#" class="nav-link nav-toggle">
            <i class="material-icons">assignment </i>
            <span class="title">Reportes</span>
            <span class="arrow"></span>

          </a>
          <ul class="sub-menu">
            <li <?php if($opt == "consumidorfinal"){ echo 'class="nav-item active open"'; }?>>
              <a href="Buscar_reporte_ventas_consumidor_final" class="nav-link ">
                <span class="title">Libro de ventas consumidor final</span>
              </a>
            </li>
            <li <?php if($opt == "creditofiscal"){ echo 'class="nav-item active open"'; }?>>
              <a href="Buscar_reporte_credito_fiscal" class="nav-link ">
                <span class="title">Libro de ventas credito fiscal</span>
              </a>
            </li>
            <li <?php if($opt == "libro_compras"){ echo 'class="nav-item active open"'; }?>>
              <a href="Libro_compras" class="nav-link ">
                <span class="title">Libro de compras</span>
              </a>
            </li>
          </ul>
        </li>
        <li <?php if($opt == "iva"){ echo 'class="nav-item active"'; }?>>
          <a href="Iva" class="nav-link ">
            <i class="material-icons">assignment </i>
            <span class="title">Subir Archivos</span>
          </a>
        </li>
        <li <?php if($opt == "usuarios" || $opt == "buscar_usuarios"){ echo 'class="nav-item start active open"';}else{ echo 'class="nav-item"'; }?>>
          <a href="#" class="nav-link nav-toggle">
            <i class="material-icons">settings </i>
            <span class="title">Configuraciones</span>
            <span class="arrow"></span>
          </a>
          <ul class="sub-menu">
            <li <?php if($opt == "usuarios"){ echo 'class="nav-item active open"'; }?>>
              <a href="Usuario" class="nav-link ">
                <span class="title">Usuarios</span>
              </a>
            </li>
            <li <?php if($opt == "buscar_usuarios"){ echo 'class="nav-item active open"'; }?>>
              <a href="Listado_usuarios" class="nav-link ">
                <span class="title">Buscar Usuarios</span>
              </a>
            </li>
          </ul>
        </li>
		<li <?php if($opt == "mods"){ echo 'class="nav-item active"'; }?>>
          <a href="Mods" class="nav-link">
            <i class="material-icons">refresh</i>
            <span class="title">Modificaciones</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
