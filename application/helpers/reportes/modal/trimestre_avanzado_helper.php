<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  function nuevo_modal_avanzado($id){ ?>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">x</button>
        <h2 class="semibold modal-title text-danger">Primer Trimestre Avanzado</h2>
      </div>
    <form class="form-horizontal form-bordered" id="atrimestre" name="atrimestre" action="" method="post">
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
            <div class="col-md-12">
                <center><button class="btn btn-success" type="button" onClick="modal_nueva_consulta();"><i class="ico-plus"></i> Agregar Diagnostico</button></center>
            </div>
        </div>
          <div class="form-group">
            <div class="col-md-9">
              <label class="control-label">Referido por:</label>
                 <input type="text" name="referido" id="referido" class="form-control" />
              <!--<select id="referidot3" name="referidot3" >
                            </select>-->
                           
            </div>
            <div class="col-md-3">
              <label class="control-label">Fecha:</label>
              <input type="text" name="fecha" id="fecha" class="form-control" value="<?=date("Y-m-d");?>" />
            </div>
          </div>
                    <div class="form-group">
            <div class="col-md-12">
              <label class="control-label">Indicación:</label>
              <input type="text" name="indi" id="indi" class="form-control"/>
            </div>
          </div>
          <h4 class="text-primary mt0">Utero</h4>
          <div class="form-group">
            <div class="col-md-4">
              <label class="control-label">Contorno:</label>
              <select name="cont" id="cont" class="form-control">
                              <option value="">Seleccione...</option>
                              <option value="Regular">Regular</option>
                              <option value="Irregular">Irregular</option>
                            </select>
            </div>
            <div class="col-md-4">
              <label class="control-label">Posición:</label>
              <select name="posi" id="posi" class="form-control">
                              <option value="">Seleccione...</option>
                              <option value="Anteversión">Anteversión</option>
                              <option value="Retroversión">Retroversión</option>
                              <option value="Intermedio">Intermedio</option>
                            </select>
            </div>
            <div class="col-md-4">
              <label class="control-label">Cervix:</label>
              <select name="cerv" id="cerv" class="form-control">
                              <option value="">Seleccione...</option>
                              <option value="Cerrado">Cerrado</option>
                              <option value="Abierto">Abierto</option>
                            </select>
            </div>
          </div>
                    <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Miometr&iacute;o:</label>
              <select name="miometrio" id="miometrio" class="form-control">
                              <option value="">Seleccione...</option>
                              <option value="Homogéneo">Homogéneo</option>
                              <option value="Heterogéneo">Heterogéneo</option>
                            </select>
            </div>
            <div class="col-md-6">
              &nbsp;
            </div>
          </div>
          <h4 class="text-primary mt0">Embrión</h4>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Embrión:</label>
              <select name="embi" id="embi" class="form-control">
                              <option value="">Seleccione...</option>
                              <option value="Único">Único</option>
                              <option value="Múltiple">Múltiple</option>
                            </select>
            </div>
            <div class="col-md-6">
              <label class="control-label">CRL:</label>
              <input type="text" name="crl" id="crl" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">F.C. Fetal:</label>
              <input type="text" name="fcf" id="fcf" class="form-control" />
            </div>
            <div class="col-md-6">
              <label class="control-label">Movimiento Fetal:</label>
              <input type="text" name="mov" id="mov" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <label class="control-label">Placenta:</label>
                            <textarea name="pla" id="pla" class="form-control"></textarea>
            </div>
          </div>
                    <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Translucencia nucal:</label>
              <input type="text" name="tra" id="tra" class="form-control" />
            </div>
            <div class="col-md-6">
              <label class="control-label">Hueso nasal:</label>
              <input type="text" name="hue" id="hue" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <label class="control-label">Comentarios:</label>
              <textarea name="com" id="com" class="form-control"></textarea>
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <input type="hidden" name="idex" id="idex" value="<?php echo $id; ?>">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success" onclick="save_avanzado();">Guardar</button>
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

function save_avanzado(){
  var trimestre = $('#atrimestre').serialize();
   $.ajax({
        url: 'Ficha_reporte/save_avanzado',
        type: "POST",
        data: trimestre,
        beforeSend: function() {
            $('#modal').modal('hide');
        },
        success: function(response) {
           if (response == 0) {
            swal({
                    title: 'Exito!',
                    text: 'Trimestre guardado correctamente!',
                    type: 'success',
                    confirmButtonColor: '#ff9933'
                }).then(function() { 
                  cargar_avanzado(<?php echo $id; ?>);
                });
            } else {
                swal({
                    title: 'Oops...',
                    text: 'Hubo un error al guardar el trimestre, por favor intentelo de nuevo mas tarde!',
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
function editar_trimestre_avanzado($idantropometria,$accion){
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
        <h2 class="semibold modal-title text-danger">Primer Trimestre Avanzado</h2>
      </div>
    <form class="form-horizontal form-bordered" id="atrimestre" name="atrimestre" action="" method="post">
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
            <div class="col-md-12">
                <center><button class="btn btn-success" type="button" onClick="modal_nueva_consulta();"><i class="ico-plus"></i> Agregar Diagnostico</button></center>
            </div>
        </div>
          <div class="form-group">
            <div class="col-md-9">
              <label class="control-label">Referido por:</label>
                 <input type="text" name="referido" id="referido" class="form-control" />
              <!--<select id="referidot3" name="referidot3" >
                            </select>-->
                           
            </div>
            <div class="col-md-3">
              <label class="control-label">Fecha:</label>
              <input type="text" name="fecha" id="fecha" class="form-control" value="<?=date("Y-m-d");?>" />
            </div>
          </div>
                    <div class="form-group">
            <div class="col-md-12">
              <label class="control-label">Indicación:</label>
              <input type="text" name="indi" id="indi" class="form-control"/>
            </div>
          </div>
          <h4 class="text-primary mt0">Utero</h4>
          <div class="form-group">
            <div class="col-md-4">
              <label class="control-label">Contorno:</label>
              <select name="cont" id="cont" class="form-control">
                              <option value="">Seleccione...</option>
                              <option value="Regular">Regular</option>
                              <option value="Irregular">Irregular</option>
                            </select>
            </div>
            <div class="col-md-4">
              <label class="control-label">Posición:</label>
              <select name="posi" id="posi" class="form-control">
                              <option value="">Seleccione...</option>
                              <option value="Anteversión">Anteversión</option>
                              <option value="Retroversión">Retroversión</option>
                              <option value="Intermedio">Intermedio</option>
                            </select>
            </div>
            <div class="col-md-4">
              <label class="control-label">Cervix:</label>
              <select name="cerv" id="cerv" class="form-control">
                              <option value="">Seleccione...</option>
                              <option value="Cerrado">Cerrado</option>
                              <option value="Abierto">Abierto</option>
                            </select>
            </div>
          </div>
                    <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Miometr&iacute;o:</label>
              <select name="miometrio" id="miometrio" class="form-control">
                              <option value="">Seleccione...</option>
                              <option value="Homogéneo">Homogéneo</option>
                              <option value="Heterogéneo">Heterogéneo</option>
                            </select>
            </div>
            <div class="col-md-6">
              &nbsp;
            </div>
          </div>
          <h4 class="text-primary mt0">Embrión</h4>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Embrión:</label>
              <select name="embi" id="embi" class="form-control">
                              <option value="">Seleccione...</option>
                              <option value="Único">Único</option>
                              <option value="Múltiple">Múltiple</option>
                            </select>
            </div>
            <div class="col-md-6">
              <label class="control-label">CRL:</label>
              <input type="text" name="crl" id="crl" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">F.C. Fetal:</label>
              <input type="text" name="fcf" id="fcf" class="form-control" />
            </div>
            <div class="col-md-6">
              <label class="control-label">Movimiento Fetal:</label>
              <input type="text" name="mov" id="mov" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <label class="control-label">Placenta:</label>
                            <textarea name="pla" id="pla" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Translucencia nucal:</label>
              <input type="text" name="tra" id="tra" class="form-control" />
            </div>
            <div class="col-md-6">
              <label class="control-label">Hueso nasal:</label>
              <input type="text" name="hue" id="hue" class="form-control" />
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-12">
              <label class="control-label">Comentarios:</label>
              <textarea name="com" id="com" class="form-control"></textarea>
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <input type="hidden" name="idex" id="idex" value="<?php echo $id; ?>">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success" onclick="save_avanzado();">Guardar</button>
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


function guardartrimestre(){
  var trimestre = $('#ptrimestre').serialize();
   $.ajax({
        url: 'Ficha_reporte/guardar_trimestre',
        type: "POST",
        data: trimestre,
        beforeSend: function() {
            $('#modal').modal('hide');
        },
        success: function(response) {
           if (response == 0) {
            swal({
                    title: 'Exito!',
                    text: 'Trimestre guardado correctamente!',
                    type: 'success',
                    confirmButtonColor: '#ff9933'
                }).then(function() { 
                  load_trimestre(<?php echo $id; ?>);
                });
            } else {
                swal({
                    title: 'Oops...',
                    text: 'Hubo un error al guardar el trimestre, por favor intentelo de nuevo mas tarde!',
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
                    text: 'Nuevo tipo de consulta guardado!',
                    type: 'success',
                    confirmButtonColor: '#ff9933'
                }).then(function() { 
                });
            } else {
                swal({
                    title: 'Oops...',
                    text: 'Hubo un error al guardar el tipo de consulta, por favor intentelo de nuevo mas tarde!',
                    type: 'error',
                    confirmButtonColor: '#4fb7fe'
                }).done();
            }
          
        }
    });
}
    </script>

<?php } ?>
