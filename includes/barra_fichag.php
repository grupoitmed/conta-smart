<?php defined('BASEPATH') OR exit('No direct script access allowed');
$CI =& get_instance();
$CI->load->helper('url');
$CI->load->database();

$query = $CI->db->query("SELECT COUNT(*) AS total_cuentas, asignaciones_salas.idasignacion_sala,asignaciones_salas.idsala FROM cuentas_asignaciones_sala INNER JOIN  asignaciones_salas ON asignaciones_salas.idasignacion_sala =cuentas_asignaciones_sala.idasignacion_sala  WHERE asignaciones_salas.estado=0 AND asignaciones_salas.idexpediente =".$datos_paciente['idexpediente']);
$id_asignacion="";
$title = '';
foreach ($query->result_array() as $row) {
  $total_cuentas = $row['total_cuentas'];
}
if($total_cuentas == 0){
  $disabled_orden = "disabled";
  $title = "El paciente no tiene cuenta creada";
  $disabled_orden_directa = "";
  $idsala = "";
  $sala_actual = "";
}else{
  $disabled_orden = "";
  $id_asignacion = $row['idasignacion_sala'];

  $idsala = "";
  $sala_actual = "";
  $query2 = $CI->db->query("SELECT * FROM salas WHERE idasignacion_sala = ".$id_asignacion);
  foreach ($query2->result_array() as $row2) {
    $sala_actual = $row2['nombre_sala'];
    $idsala = $row2['idsala'];
  }
}
?>
<!--.row-->
<div class="row">
  <div class="col-lg-12">
    <div class="padding-none bg-white" style="border:1px solid #e5e5e5;padding:15px;position:relative;background:#fff;">
      <div class="row">

        <div class="col-sm-6">
          <img src="<?php echo base_url();?>assets/images/expedientes/<?php echo $datos_paciente['foto'];?>" class="thumb pull-left" alt="" width="120px" height="120px">
          <div class="media-body" style="padding-left:15px;padding-right:15px;position:relative">
            <h3 class="media-heading"><strong><?php echo $datos_paciente['nombres']." ".$datos_paciente['apellidos'];?></strong></h3>
            <p><?php echo $datos_paciente['sexo'];?><br/>
              Domicilio: <?php echo $datos_paciente['direccion']." ".$datos_paciente['departamento'];;?><br/>
              Municipio: <?php echo $datos_paciente['municipio'];?><br/>
              Expediente #: <label id="id_e"><?php echo $datos_paciente['idexpediente'];?></label>
            </p>
          </div>
        </div>
        <div class="col-sm-6">
          <label><span class="text-danger">Notas Importantes:</span></label> <br>
          <form class="form-horizontal">
            <textarea id="notas" name="notas" onchange="guardarNotasImportante()" rows="5" class="form-control"> <?php echo $datos_paciente['notasImportantes'];?></textarea>
          </form>
        </div>
      </div>
    </div>
    <div class="padding-none bg-white" style="border:1px solid #e5e5e5;position:relative;background:#fff;">
      <div class="row row-merge margin-none">
        <div class="col-md-3">
          <div class="innerAll half text-center">
            <span class="strong" style="font-weight:bold; font-size:20px !important;line-height:40px !important"><?php echo $datos_paciente['edad'];?></span><br/>
            EDAD
          </div>
        </div>
        <div class="col-md-3">
          <div class="innerAll half text-center">
            <span class="strong" style="font-weight:bold; font-size:20px !important;line-height:40px !important"><?php echo $datos_paciente['dui'];?></span><br/>
            DUI
          </div>
        </div>
        <div class="col-md-3">
          <div class="innerAll half text-center">
            <span class="strong" style="font-weight:bold; font-size:20px !important;line-height:40px !important"><?php echo $datos_paciente['responsable'];?></span><br/>
            ENCARGADO
          </div>
        </div>
        <div class="col-md-3">
          <div class="innerAll half text-center">
            <span style="font-weight:bold; font-size:20px !important;line-height:40px !important"><?php echo $datos_paciente['telefono_casa'];?></span><br/>
            TELEFONO
          </div>
        </div>
      </div>
    </div>
    <div class="padding-none bg-white" style="border:1px solid #e5e5e5;padding:15px;position:relative;background:#fff;margin:0 0 15px">
      <div class="" align="right">
        <div class="row">
          <div class="col-sm-2">
            <input type="button" onclick="orden_examen(<?=$id_asignacion?>);" <?php echo $disabled_orden; ?> class="btn btn-success btn-block" value="Laboratorio Clinico" title="<?php echo $title;?>"/>
          </div>
          <div class="col-sm-2">
            <input type="button" onclick="orden_salida(<?=$id_asignacion?>);" <?php echo $disabled_orden; ?> class="btn btn-primary btn-block" value="Farmacia" title="<?php echo $title;?>" />
          </div>
          <div class="col-sm-2">
            <input type="button" onclick="examenes_radiologia(<?=$id_asignacion?>);" <?php echo $disabled_orden; ?> class="btn btn-info btn-block" value="Radiología" title="<?php echo $title;?>" />
          </div>
          <div class="col-sm-2">
            <input type="button" onclick="cargar_servicios(<?=$id_asignacion?>);" <?php echo $disabled_orden; ?> class="btn btn-inverse btn-block" value="Servicios" title="<?php echo $title;?>"/>
          </div>
          <div class="col-sm-2">
            <div class="hidden">
              <button type="button" onclick="traslado_sala(<?php echo $id_asignacion;?>);" class="btn btn-warning btn-block waves-effect waves-light">Traslado</button>
            </div>
            <button type="button" onclick="datos_paciente();" class="btn btn-warning btn-block waves-effect waves-light">Datos generales</button>

          </div>
          <div class="col-sm-2">
            <button class="btn btn-danger btn-block" type="button" <?php echo $disabled_orden; ?> onclick="finalizar(<?php echo $id_asignacion;?>,'<?php echo $idsala;?>','<?php echo $sala_actual;?>',19);">Finalizar</button>
          </div>
        </div>

    </div>
    </div>
  </div>
</div>
<!--./row-->
<script type="text/javascript">

function orden_salida(id){

  window.open("../enfermeria/orden_salida?id="+id);
}
function orden_examen(id){

  window.open("../enfermeria/orden_examen?id="+id);
}

function datos_paciente(){

  window.open("../recepcion/expediente?id="+$("#id_e").text());
}

function examenes_radiologia(id){
  window.open("../enfermeria/examenes_radiologia?id="+id);
}

function cargar_servicios(id){
	$.ajax({
  	url: '../recepcion/Administrar_cuentas/cargar_servicios',
    type: "POST",
    data: {id:id},
		beforeSend: function(){
      $('#modal').html(statement_loading());
      $('#modal').modal({backdrop: 'static', keyboard: false});
    },
    complete: function(){
      $('#modal').html();
     },
    success: function (response) {
    	$('#modal').html(response);
    }
  });
}

function traslado_sala(id){
	$.ajax({
  	url: '../hospital/ficha_clinica/traslado_sala',
    type: "POST",
    data: {id:id},
		beforeSend: function(){
      $('#modal').html(statement_loading());
      $('#modal').modal({backdrop: 'static', keyboard: false});
    },
    complete: function(){
      $('#modal').html();
     },
    success: function (response) {
    	$('#modal').html(response);
    }
  });
}
</script>
