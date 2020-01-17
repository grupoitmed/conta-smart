<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  function load_modal_mama($id){ ?>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">x</button>
        <h2 class="semibold modal-title text-danger">Mama</h2>
      </div>
    <form class="form-horizontal form-bordered" id="mama" name="mama" action="" method="post">
      <div class="modal-body">
        <div class="panel-body">

                    <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Diagnostico:</label>
              <select name="dia" id="dia" class="form-control select2">
                            </select>
            </div>
              <div class="col-md-6">
              <label class="control-label">Diagnostico2:</label>
              <select name="dia2" id="dia2" class="form-control select2">
                            </select>
            </div>
          </div>
                    <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Diagnostico3:</label>
              <select name="dia3" id="dia3" class="form-control select2">
                            </select>
            </div>
                        <div class="col-md-6">
              <label class="control-label">Diagnostico4:</label>
              <select name="dia4" id="dia4" class="form-control select2">
                            </select>
            </div>
          </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <center><button class="btn btn-success" type="button" onClick="modal_nueva_consulta();"><i class="ico-plus"></i> Agregar Diagnostico</button></center>
                        </div>
                    </div>
          <div class="form-group">
            <div class="col-sm-9">
              <label class="control-label">Referido:</label>
                               <input type="text" name="referido" id="referido" class="form-control" />
              <!--<select id="referido2" name="referido2" >
                            </select>-->
            </div>
            <div class="col-sm-3">
              <label class="control-label">Fecha:</label>
              <input type="text" name="fecha" id="fecha" class="form-control" value="<?=date("Y-m-d");?>" />
            </div>
          </div>
                    <div class="form-group">
            <div class="col-sm-12">
              <label class="control-label">Indicación:</label>
              <input type="text" name="indi" id="indi" class="form-control"/>
            </div>
          </div>
          <h4 class="text-primary mt0">Ultrasonografia de mama</h4>
          <div class="form-group">
            <div class="col-sm-12">
              <label class="control-label">Mama Derecha:</label>
              <textarea name="mder" id="mder" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <label class="control-label">Mama Izquierda:</label>
              <textarea name="mizq" id="mizq" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <label class="control-label">Comentarios:</label>
              <textarea name="com" id="com" class="form-control"></textarea>
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <input type="hidden" name="idex" id="idex" value="<?php echo $id;?>">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success" onclick="save_mama();">Guardar</button>
        </div>
      </div>
    </form>
    </div>
  </div>
  <script>
  jQuery('#fecha').datepicker({
      autoclose: true
      ,todayHighlight: true,
      format: 'yyyy-mm-dd'
  });

function save_mama(){
  var trimestre = $('#mama').serialize();
   $.ajax({
        url: 'Ficha_reporte/save_mama',
        type: "POST",
        data: trimestre,
        beforeSend: function() {
            $('#modal').modal('hide');
        },
        success: function(response) {
           if (response == 0) {
            swal({
                    title: 'Exito!',
                    text: 'Mama guardado correctamente!',
                    type: 'success',
                    confirmButtonColor: '#ff9933'
                }).then(function() { 
                  cargar_mama(<?php echo $id; ?>);
                });
            } else {
                swal({
                    title: 'Oops...',
                    text: 'Hubo un error al guardar el mama, por favor intentelo de nuevo mas tarde!',
                    type: 'error',
                    confirmButtonColor: '#4fb7fe'
                }).done();
            }
          
        }
    });
}
function modal_nueva_consulta(){
       $.ajax({
        url: 'Recetas/modal_tipo_consulta',
        type: "POST",
        success: function(response) {
            $('#modal').html(response);
            $('#modal').modal({ backdrop: 'static', keyboard: false });
        }
    }); 
}
function guardar_nueva_consulta(){
        var nueva_consulta = $('#form_nueva_consulta').serialize();
 $.ajax({
        url: 'Recetas/nueva_consulta',
        type: "POST",
        data: nueva_consulta,
        beforeSend: function() {
            $('#modal').modal('hide');
        },
        success: function(response) {
           if (response == 0) {
            swal({
                    title: 'Exito!',
                    text: 'Nuevo trimestre Avanzado guardado!',
                    type: 'success',
                    confirmButtonColor: '#ff9933'
                }).then(function() { 
                });
            } else {
                swal({
                    title: 'Oops...',
                    text: 'Hubo un error al guardar el trimestre Avanzado, por favor intentelo de nuevo mas tarde!',
                    type: 'error',
                    confirmButtonColor: '#4fb7fe'
                }).done();
            }
          
        }
    });
}
  </script>
<?php }
function ver_mama($idantropometria,$accion){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();
  $query = $CI->db->query("SELECT * FROM antropometrias WHERE idantropometria=".$idantropometria);
  foreach($query->result_array() as $row){
    $idantropometria = $row['idantropometria'];
    $fecha = $row['fecha'];
    $frecuencia_cardiaca = $row['frecuencia_cardiaca'];
    $frecuencia_respiratoria = $row['frecuencia_respiratoria'];
    $tension_arterial = $row['tension_arterial'];
    $temperatura = $row['temperatura'];
    $peso_lb = $row['peso_lb'];
    $imc = $row['imc'];
    $resimc = $row['resimc'];
    $estatura = $row['estatura'];
    $perimetro_abdominal = $row['perimetro_abdominal'];
    $perimetro_cefalico = $row['perimetro_cefalico'];
    $notas = $row['notas'];
  }
?>
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h2 class="semibold modal-title text-danger">Antropometría</h2>
        </div>
        <form class="form" id="form_antropometria" name="form_antropometria" action="" method="post">
          <div class="modal-body">
            <div class="panel-body">
              <div class="col-md-12">
                <div class="col-md-4">
                  <label class="control-label">Fecha:</label>
                  <input name="fecha_antro" id="fecha_antro" class="form-control datepicker_custom" style="color:#000000" value="<?php echo $fecha;?>" <?php if($accion == ""){ ?>disabled <?php } ?> type="text">
                </div>
                <div class="col-md-4">
                  <label class="control-label"><strong>Pulso LPM:</strong></label>
                  <input name="pulso" id="pulso" onkeypress="return valida_numero(event);" value="<?php echo $frecuencia_cardiaca;?>" <?php if($accion == ""){ ?>disabled <?php } ?>  style="color:#000000" class="form-control" type="text">
                </div>
                <div class="col-md-4">
                  <label class="control-label">Frecuencia respiratoria:</label>
                  <input name="frecuencia_respiratoria" onkeypress="return valida_numero(event);" value="<?php echo $frecuencia_respiratoria;?>" <?php if($accion == ""){ ?>disabled <?php } ?> id="frecuencia_respiratoria" style="color:#000000"  class="form-control" type="text">
                </div>
              </div>
              <br>
              <div class="col-md-12">
                <div class="col-md-4">
                  <br>
                  <label class="control-label">Tensión Arterial:</label>
                  <input name="tension_arterial" onkeypress="return valida_numero(event);" value="<?php echo $tension_arterial;?>" <?php if($accion == ""){ ?>disabled <?php } ?> id="tension_arterial" style="color:#000000" class="form-control" type="text">
                </div>
                <div class="col-md-4">
                  <br>
                  <label class="control-label"><strong>Temperatura (°C)</strong></label>
                  <input name="temperatura" id="temperatura" onkeypress="return valida_numero(event);" value="<?php echo $temperatura;?>" <?php if($accion == ""){ ?>disabled <?php } ?> style="color:#000000" class="form-control" type="text">
                </div>
                <!--<div class="col-md-4">
                  <br>
                  <label class="control-label">Perímetro Abdominal:</label>
                  <input name="perimetro_abdominal" id="perimetro_abdominal" onkeypress="return valida_numero(event);" value="<?php echo $perimetro_abdominal;?>" <?php if($accion == ""){ ?>disabled <?php } ?> style="color:#000000" class="form-control" type="text">
                </div>-->
              </div>
              <div class="col-md-12">
                <!--<div class="col-md-4">
                  <br>
                  <label class="control-label">Perímetro Cefálico:</label>
                  <input name="perimetro_cefalico" id="perimetro_cefalico" onkeypress="return valida_numero(event);" value="<?php echo $perimetro_cefalico;?>" <?php if($accion == ""){ ?>disabled <?php } ?> style="color:#000000" class="form-control" type="text">
                </div>-->
                <div class="col-md-4">
                  <br>
                  <label class="control-label">Peso (lb)</label>
                  <input name="peso_lb2" id="peso_lb2" onkeypress="return valida_numero(event);" onkeyup="calcular_imc2();" class="form-control" value="<?php echo $peso_lb;?>" <?php if($accion == ""){ ?>disabled <?php } ?> style="color:#000000" type="text">
                </div>
                <div class="col-md-4">
                  <br>
                  <label class="control-label">Estatura (cm)</label>
                  <input name="estatura2" id="estatura2" onkeypress="return valida_numero(event);" onkeyup="calcular_imc2();" value="<?php echo $estatura;?>" <?php if($accion == ""){ ?>disabled <?php } ?> style="color:#000000" class="form-control" type="text">
                </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-4">
                  <br>
                  <label class="control-label">IMC:</label>
                  <input name="imc2" id="imc2" style="color:#000000" value="<?php echo $imc;?>" readonly class="form-control" type="text">
                </div>
                <div class="col-md-8">
                  <br>
                  <label class="control-label">Resultado del IMC:</label>
                  <input name="resimc2" id="resimc2" style="color:#000000" value="<?php echo $resimc;?>" readonly class="form-control" type="text">
                </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-12">
                  <br>
                  <label class="control-label">Notas adicionales:</label>
                  <textarea name="notas" id="notas" class="form-control" <?php if($accion == ""){ ?>disabled <?php } ?>><?php echo $notas;?></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <?php if($accion != ""){ ?>
                <input type="hidden" value="<?php echo $idantropometria;?>" name="ida" id="ida" />
                <button type="button" class="btn btn-success" onclick="actualizar_antropometria()">Actualizar</button>
              <?php } ?>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script>
    jQuery('#fecha_antro').datepicker({
        autoclose: true
        ,todayHighlight: true,
        format: 'yyyy-mm-dd'
    });

    function calcular_imc2(){
      var peso = $('#peso_lb2').val();
      var estatura = $('#estatura2').val();
      var imc = (peso/2.2)/((estatura/100)*(estatura/100));
      $('#imc2').val(imc.toFixed(2));
      if(imc.toFixed(2) < 16){
        var resimc= "Delgadez severa";
      }
      else if(imc.toFixed(2) >= 16 && imc.toFixed(2) <= 16.99){
        var resimc= "Delgadez moderada";
      }
      else if(imc.toFixed(2) >= 1 && imc.toFixed(2) <= 18.49){
        var resimc= "Delgadez leve";
      }
      else if(imc.toFixed(2) >= 18.5 && imc.toFixed(2) <= 24.99){
        var resimc= "Normal";
      }
      else if(imc.toFixed(2) >= 25 && imc.toFixed(2) <= 29.99){
        var resimc= "Preobeso";
      }
      else if(imc.toFixed(2) >= 30 && imc.toFixed(2) <= 34.99){
        var resimc= "Obesidad leve";
      }
      else if(imc.toFixed(2) >= 35 && imc.toFixed(2) <= 39.99){
        var resimc= "Obesidad media";
      }
      else if(imc.toFixed(2) >=40){
        var resimc= "Obesidad mórbida";
      }
      $('#resimc2').val(resimc);
    }
    </script>

<?php } ?>
