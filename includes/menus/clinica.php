
<ul class="nav" id="side-menu">
  <li class="user-pro">
    <a href="#" class="waves-effect"><img src="<?php echo base_url();?>assets/images/usuarios/<?php echo $user_data['foto'];?>" alt="user-img" class="img-circle"> <span class="hide-menu"><?php echo $user_data['nombres'];?></span></a>
  </li>
  <!--/*****PACIENTES******/-->
  <li <?php if($opt == "admin_nuevo_expediente" || $opt == "admin_buscar_paciente" ) echo 'class="active"';?>> <a href="javascript:void(0);" class="waves-effect <?php if($opt == "admin_nuevo_expediente" || $opt == "admin_buscar_paciente") echo 'active';?>"><i class="ti-user p-r-10"></i> <span class="hide-menu"> Expediente <span class="fa arrow"></span></span></a>
    <ul class="nav nav-second-level">
      <li <?php if($opt == "admin_nuevo_expediente"){ echo 'class="active"'; }?>>
        <a href="../recepcion/nuevo_expediente" class="waves-effect <?php if($opt == "admin_buscar_paciente"){ echo 'active'; }?>"><i class="ti-plus p-r-10"></i> <span class="hide-menu">Nuevo expediente</span></a></li>
      <li <?php if($opt == "admin_buscar_paciente"){ echo 'class="active"'; }?>><a href="../recepcion/buscar_expediente" class="waves-effect <?php if($opt == "admin_buscar_paciente"){ echo 'active'; }?>"><i class="ti-user p-r-10"></i> <span class="hide-menu">Buscar expediente</span></a></li>
    </ul>
  </li>
  <!--/***FIN PACIENTES***/-->

<!--/***AGENDA CITA***/-->
  <li <?php if($opt == "agenda" || $opt == "crear_cita" || $opt == "ver_citas" ||  $opt == "create_events" || $opt == "programacion_medicos" || $opt == "horarios") echo 'class="active"';?>> <a href="javascript:void(0);" class="waves-effect <?php if($opt == "agenda" || $opt == "crear_cita" || $opt == "ver_citas" || $opt == "create_events" || $opt == "programacion_medicos" || $opt == "horarios") echo 'active';?>"><i class="ti-calendar  p-r-10"></i> <span class="hide-menu"> Agenda-Citas <span class="fa arrow"></span></span></a>
    <ul class="nav nav-second-level">
      <li <?php if($opt == "agenda"){ echo 'class="active"'; }?>><a href="../citas/agenda" class="waves-effect <?php if($opt == "agenda"){ echo 'active'; }?>"><span class="hide-menu">Agenda</span></a>
      </li>
      <li <?php if($opt == "crear_cita"){ echo 'class="active"'; }?>><a href="../citas/crear_cita" class="waves-effect <?php if($opt == "crear_cita"){ echo 'active'; }?>"><span class="hide-menu">Crear Cita</span></a>
      </li>

      <li <?php if($opt == "ver_citas"){ echo 'class="active"'; }?>><a href="../citas/ver_citas" class="waves-effect <?php if($opt == "ver_citas"){ echo 'active'; }?>"><span class="hide-menu">Ver citas</span></a>
      </li>

      <li <?php if($opt == "create_events"){ echo 'class="active"'; }?>><a href="../citas/crear_evento" class="waves-effect <?php if($opt == "create_events"){ echo 'active'; }?>"><span class="hide-menu">Crear evento</span></a>
      </li>
	 <!--
      <li <?php if($opt == "horarios"){ echo 'class="active"'; }?>><a href="../citas/horarios" class="waves-effect <?php if($opt == "horarios"){ echo 'active'; }?>"><span class="hide-menu">Configuración horarios</span></a>
      </li>
      <li <?php if($opt == "programacion_medicos"){ echo 'class="active"'; }?>><a href="../citas/programacion_medicos" class="waves-effect <?php if($opt == "programacion_medicos"){ echo 'active'; }?>"><span class="hide-menu">Programacion medicos</span></a>-->
      </li>
    </ul>
  </li>
  <li <?php if($opt == "buscar_paciente"){ echo 'class="active"'; }?>><a href="../recepcion/buscar_paciente" class="waves-effect"><i class="fa fa-user"></i> <span class="hide-menu">Paciente atendidos</span></a> </li>



  <li <?php if($opt == "buscar_fechas"){ echo 'class="active"'; }?>><a href="../recepcion/buscar_fechas" class="waves-effect"><i class="fa fa-print"></i> <span class="hide-menu">R. fechas de parto</span></a> </li>

  <!--/***FIN AGENDA CITA***/-->
  <li <?php if($opt == "diagnostico"){ echo 'class="active"'; }?>><a href="../clinica/diagnostico" class="waves-effect"><i class="fa fa-book p-r-10"></i> <span class="hide-menu">Diagnosticos</span></a> </li>

    <li <?php if($opt == "plantillas"){ echo 'class="active"'; }?>><a href="../configuraciones/plantillas" class="waves-effect"><i class="fa fa-file-signature p-r-10"></i> <span class="hide-menu">Plantillas</span></a> </li>

    <li <?php if($opt == "tipos_imagenes"){ echo 'class="active"'; }?>><a href="../configuraciones/tipos_imagenes" class="waves-effect"><i class="fa fa-images p-r-10"></i> <span class="hide-menu">Tipos de imagenes</span></a> </li>

    <li <?php if($opt == "medicamentos"){ echo 'class="active"'; }?>><a href="../configuraciones/medicamentos" class="waves-effect"><i class="fa fa-capsules p-r-10"></i> <span class="hide-menu">Medicamentos</span></a> </li>

        <li <?php if($opt == "usuarios"){ echo 'class="active"'; }?>><a href="../configuraciones/usuarios" class="waves-effect"><i class="fa fa-users p-r-10"></i> <span class="hide-menu">Usuarios</span></a> </li>



  <!--/*****ENFERMERIA******/
  <li <?php if($opt == "admin_index"|| $opt == "cumplientos_salas" || $opt == "enfermeria_procedimientos" ) echo 'class="active"';?>> <a href="javascript:void(0);" class="waves-effect <?php if($opt == "admin_index" || $opt == "admin_buscar_paciente") echo 'active';?>"><i class="ti-user p-r-10"></i> <span class="hide-menu"> Enfermeria <span class="fa arrow"></span></span></a>
<ul class="nav nav-second-level">
  <li <?php if($opt == "admin_index"){ echo 'class="active"'; }?>><a href="../enfermeria/index" class="waves-effect <?php if($opt == "admin_index"){ echo 'active'; }?>"><i class="ti-support  p-r-10"></i><span class="hide-menu">Asignaci&oacute;nes</span></a></li>
  <li <?php if($opt == "cumplientos_salas"){ echo 'class="active"'; }?>><a href="../enfermeria/Procedimientos_salas" class="waves-effect <?php if($opt == "cumplientos_salas"){ echo 'active'; }?>"><i class="ti-agenda p-r-10"></i> <span class="hide-menu">Cumplimientos</span></a></li>
  <li <?php if($opt == "enfermeria_procedimientos"){ echo 'class="active"'; }?>><a href="../enfermeria/procedimientos" class="waves-effect <?php if($opt == "admin_index"){ echo 'active'; }?>"><i class="ti-list  p-r-10"></i><span class="hide-menu">Historal de Cumplimientos <span class="label label-rouded label-info pull-right"><?=$num_procedimientos?></span></span></a></li>
</ul>
</li>
<li <?php if($opt == "historial_alta_paciente"){ echo 'class="active"'; }?>><a href="../enfermeria/historial_alta_paciente" class="waves-effect <?php if($opt == "historial_alta_paciente"){ echo 'active'; }?>"><i class="ti-notepad p-r-10"></i> <span class="hide-menu">Historial de Alta de Pacientes</span></a></li>
  <!--/***FIN ENFERMERIA***/-->



  <!--/***FARMACIA****/
  <li <?php if($opt == "admin_farmacia" || $opt == "historial_devoluciones") echo 'class="active"';?>> <a href="javascript:void(0);" class="waves-effect <?php if($opt == "admin_farmacia" || $opt == "historial_devoluciones") echo 'active';?>">
    <i class="ti-support  p-r-10"></i> <span class="hide-menu"> Farmacia <span class="fa arrow"></span></span></a>
    <ul class="nav nav-second-level">
      <li <?php if($opt == "admin_farmacia"){ echo 'class="active"'; }?>><a href="../farmacia/index" class="waves-effect <?php if($opt == "admin_farmacia"){ echo 'active'; }?>"><span class="hide-menu">Ordenes farmacia</span></a></li>
      <li <?php if($opt == "historial_devoluciones"){ echo 'class="active"'; }?>><a href="../farmacia/historial_devoluciones" class="waves-effect <?php if($opt == "historial_devoluciones"){ echo 'active'; }?>"><span class="hide-menu">Historial de devoluciones</span></a></li>
    </ul>
  </li>
  <!--/**FIN FARMACIA***/-->


<!--/***AGENDA CITA***/-->
 <!-- <li <?php if($opt == "agenda" || $opt == "crear_cita" || $opt == "ver_citas" || $opt == "programacion_medicos" || $opt == "horarios") echo 'class="active"';?>> <a href="javascript:void(0);" class="waves-effect <?php if($opt == "agenda" || $opt == "crear_cita" || $opt == "ver_citas" || $opt == "programacion_medicos" || $opt == "horarios") echo 'active';?>"><i class="ti-calendar  p-r-10"></i> <span class="hide-menu"> Agenda-Citas <span class="fa arrow"></span></span></a>
    <ul class="nav nav-second-level">
      <li <?php if($opt == "agenda"){ echo 'class="active"'; }?>><a href="../citas/agenda" class="waves-effect <?php if($opt == "agenda"){ echo 'active'; }?>"><span class="hide-menu">Agenda</span></a></li>
      <li <?php if($opt == "crear_cita"){ echo 'class="active"'; }?>><a href="../citas/crear_cita" class="waves-effect <?php if($opt == "crear_cita"){ echo 'active'; }?>"><span class="hide-menu">Crear Cita</span></a></li>
      <li <?php if($opt == "ver_citas"){ echo 'class="active"'; }?>><a href="../citas/ver_citas" class="waves-effect <?php if($opt == "ver_citas"){ echo 'active'; }?>"><span class="hide-menu">Ver citas</span></a></li>
      <li <?php if($opt == "horarios"){ echo 'class="active"'; }?>><a href="../citas/horarios" class="waves-effect <?php if($opt == "horarios"){ echo 'active'; }?>"><span class="hide-menu">Configuración horarios</span></a></li>
      <li <?php if($opt == "programacion_medicos"){ echo 'class="active"'; }?>><a href="../citas/programacion_medicos" class="waves-effect <?php if($opt == "programacion_medicos"){ echo 'active'; }?>"><span class="hide-menu">Programacion medicos</span></a></li>
    </ul>
  </li>-->
  <!--/***FIN AGENDA CITA***/-->

  <!--/****FACTURACION****/-->
  <!--<li <?php if( $opt == "admin_recepcion" || $opt == "admin_facturacion" || $opt == "admin_historial_cuentas" ||$opt == "libro_recibos" || $opt == "ingresos_diarios" || $opt == "admin_corte_caja" || $opt == "libro_vent_consu" || $opt == "libro_vent_contri") echo 'class="active"';?> >
    <a href="javascript:void(0);" class="waves-effect <?php if($opt == "admin_recepcion" || $opt == "admin_facturacion" || $opt == "admin_historial_cuentas" || $opt == "libro_recibos" || $opt == "ingresos_diarios" || $opt == "admin_corte_caja" || $opt == "libro_vent_consu" || $opt == "libro_vent_contri" ) echo 'active'; ?> ">
      <i class="ti-money p-r-10"></i><span class="hide-menu"> Facturacion <span class="fa arrow"></span></span></a>
    <ul class="nav nav-second-level">
      <li <?php if($opt == "admin_recepcion"){ echo 'class="active"'; }?>><a href="../recepcion/index" class="waves-effect <?php if($opt == "admin_recepcion"){ echo 'active'; }?>"><i class="ti-agenda p-r-10"></i> <span class="hide-menu">Estado de cuentas</span></a></li>
      <li <?php if($opt == "admin_facturacion"){ echo 'class="active"'; }?>><a href="../facturacion/buscar_expediente" class="waves-effect <?php if($opt == "admin_facturacion"){ echo 'active'; }?>"><i class="ti-receipt p-r-10"></i> <span class="hide-menu">Facturacion</span></a></li>
      <li <?php if($opt == "admin_historial_cuentas"){ echo 'class="active"'; }?>><a href="../administrador/historial_cuentas" class="waves-effect <?php if($opt == "admin_historial_cuentas"){ echo 'active'; }?>"><i class="ti-arrow-circle-down p-r-10"></i> <span class="hide-menu">Historial de cuentas</span></a></li>
      <li <?php if($opt == "libro_recibos" || $opt == "ingresos_diarios" || $opt == "admin_corte_caja" || $opt == "libro_vent_consu" || $opt == "libro_vent_contri") echo 'class="active"';?>>
        <a href="javascript:void(0);" class="waves-effect <?php if($opt == "libro_recibos" || $opt == "ingresos_diarios" || $opt == "admin_corte_caja" || $opt == "libro_vent_consu" || $opt == "libro_vent_contri") echo 'active';?>">
          <i class="fa fa-bank p-r-10"></i> <span class="hide-menu"> Reportes Finacieros <span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level">
          <li <?php if($opt == "admin_corte_caja"){ echo 'class="active"'; }?>> <a href="../financiero/corte_caja" <?php if($opt == "admin_corte_caja"){ echo 'class="active"'; }?>><span class="hide-menu">Corte de caja</span></a></li>-->
          <!-- <li <?php if($opt == "admin_corte_caja"){ echo 'class="active"'; }?>> <a href="../financiero/corte_caja" <?php if($opt == "admin_corte_caja"){ echo 'class="active"'; }?>><span class="hide-menu">Corte de caja V2</span></a></li> -->
            <!--  <li <?php if($opt == "ingresos_diarios"){ echo 'class="active"'; }?>> <a href="../financiero/ingresos_diarios" <?php if($opt == "ingresos_diarios"){ echo 'class="active"'; }?>><span class="hide-menu">Ingresos diarios</span></a></li>
          <li <?php if($opt == "his_corte_caja"){ echo 'class="active"'; }?>> <a href="../financiero/his_corte_caja" <?php if($opt == "his_corte_caja"){ echo 'class="active"'; }?>><span class="hide-menu">Historial Corte de Caja</span></a></li>
          <li <?php if($opt == "flujo_movimiento"){ echo 'class="active"'; }?>> <a href="../financiero/flujo_movimientos" <?php if($opt == "flujo_movimiento"){ echo 'class="active"'; }?>><span class="hide-menu">Flujo de movimientos</span></a></li>
          <li <?php if($opt == "libro_consumidores"){ echo 'class="active"'; }?>><a href="../financiero/libro_consumidores" class="waves-effect <?php if($opt == "libro_vent_consu"){ echo 'active'; }?>"><span class="hide-menu">Libro de Ventas Consumidores</span></a>
          <li <?php if($opt == "libro_recibos"){ echo 'class="active"'; }?>><a href="../financiero/libro_recibos" class="waves-effect <?php if($opt == "libro_vent_recibos"){ echo 'active'; }?>"><span class="hide-menu">Libro de Ventas Recibos</span></a>
          <li <?php if($opt == "libro_contribuyentes"){ echo 'class="active"'; }?>><a href="../financiero/libro_contribuyentes" class="waves-effect <?php if($opt == "libro_vent_contri"){ echo 'active'; }?>"><span class="hide-menu">Libro de Ventas Contribuyentes</span></a>
        </ul>
      </li>
    </ul>
  </li>-->
  <!--/****FIN FACTURACION****/-->

