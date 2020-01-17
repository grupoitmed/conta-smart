<?php defined('BASEPATH') OR exit('No direct script access allowed');
$CI =& get_instance();
$CI->load->helper('url');
$CI->load->database();

$query = $CI->db->query("SELECT nombre,apellido, edad,fechaNacimiento,domicilio,telDomicilio, foto,sexo FROM expedientes a WHERE idExpediente =" . $datos_paciente['idExpediente']);
foreach ($query->result_array() as $row) {
  $paciente = $row['nombre'] . ' ' . $row['apellido'];
  $fecha = date('d-m-Y');
  $edad = $row['edad'];
  $fnac = date('d-m-Y', strtotime($row['fechaNacimiento']));
  $domicilio = $row['domicilio'];
  $tel = $row['telDomicilio'];
  $foto = $row['foto'];
  $genero = $row['sexo'];
}

// Recordatorios central
$datosexpedientes = $CI->db->query("SELECT recordatorios FROM expedientes WHERE idexpediente=".$datos_paciente['idExpediente']);
foreach ($datosexpedientes->result_array() as $row4) {
  $datosImportanteExpediente = $row4['recordatorios'];
}
?>
<!--.row-->
<div class="row">
  <div class="col-lg-12">
    <div class="padding-none bg-white" style="border:1px solid #e5e5e5;padding:15px;position:relative;background:#fff;">
      <div class="row">

        <div class="col-sm-6">
          <img src="<?php echo base_url();?>assets/images/expedientes/<?php echo $foto;?>" class="thumb pull-left" alt="" width="120px" height="120px">
          <div class="media-body" style="padding-left:15px;padding-right:15px;position:relative">
            <h3 class="media-heading"><strong><?php echo $paciente;?></strong></h3>
            <p><?php   if($genero == 'F'){
				echo "FEMENINO";
			}else{
				echo "MASCULINO";
			}?><br/>
              Domicilio: <?php echo $domicilio;?><br/>
              Fecha de nacimiento: <?php echo $fnac;?><br/>
              Expediente #: <label id="id_e"><?php echo $datos_paciente['idExpediente'];?></label>
            </p>
          </div>
        </div>
        <div class="col-sm-6">
          <label><span class="text-danger">Notas Importantes:</span></label> <br>
          <form class="form-horizontal">
            <textarea id="notas" name="notas" onchange="guardarNotasImportante()" rows="5" class="form-control">
              <?php 
              if (isset($datosImportanteExpediente)) {
                echo $datosImportanteExpediente;
              }else{
                echo $datosImportanteExpediente = "";
              } 			
              ?>
              </textarea>
			  <button type="button" class="btn btn-success" onclick="cargar_notas_importantes(<?php echo $datos_paciente['idExpediente'];?>);"> Notas importantes anteriores </button>
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
            <span class="strong" style="font-weight:bold; font-size:20px !important;line-height:40px !important"><?php echo $fnac;?></span><br/>
            FECHA DE NACIMIENTO
          </div>
        </div>
       <!-- <div class="col-md-3">
          <div class="innerAll half text-center">
            <span class="strong" style="font-weight:bold; font-size:20px !important;line-height:40px !important"><?php //echo $datos_paciente['padre'];?></span><br/>
            NOMBRE DE LA PADRE
          </div>
        </div>-->
        <div class="col-md-3">
          <div class="innerAll half text-center">
            <span style="font-weight:bold; font-size:20px !important;line-height:40px !important"><?php echo $tel;?></span><br/>
            TELEFONOS
          </div>
        </div>
      </div>
    </div>
    <div class="padding-none bg-white" style="border:1px solid #e5e5e5;padding:15px;position:relative;background:#fff;margin:0 0 15px">
      <div class="text-lefts" >
     <div class="row">
          <?php
          if(!$this->session->userdata('administracion')){
            ?>
            <div class="col-sm-2">
              <button type="button" onclick="datos_paciente();" class="btn btn-warning btn-block waves-effect waves-light">Datos generales</button>
            </div>
            <a hreft="#" class="btn btn-warning" target="_black" onclick="new_picture(<?php echo $datos_paciente['idExpediente'];?>);" title="Subir imagenes"> Imagenes </a>
        <?php  }    ?>
          <div class="col-sm-2">
            <button class="btn btn-danger btn-block" type="button" onclick="finalizar();">Finalizar</button>
          </div>

        </div>

      </div>
    </div>
  </div>
</div>
<!--./row-->
<script type="text/javascript">

function new_picture(id) {
    window.open("../clinica/imagenes?id="+id);
}

  function orden_salida(id){

    window.open("../enfermeria/orden_salida?id="+id);
  }
  function orden_examen(id){

    window.open("../enfermeria/orden_examen?id="+id);
  }

  function orden_salaQuirugica(id){

    window.open("../enfermeria/orden_salaQuirugica?id="+id);
  }

  function datos_paciente(){
    window.open("../recepcion/expediente?id="+$("#id_e").text());
  }

  function examenes_radiologia(id){
    window.open("../enfermeria/examenes_radiologia?id="+id);
  }

  function cargar_notas_importantes(id){
    $.ajax({
      url: '../clinica/Historial_clinico/cargar_modal',
      type: "POST",
      data: {id:id},
        success: function(response) {
            $('#modal').html(response);
            $('#modal').modal({
                backdrop: 'static',
                keyboard: false
            });
        }
    });
  }
</script>
