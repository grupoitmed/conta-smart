<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  function cargar_modal_trimestre($id){ ?>
  <div class="modal-dialog modal-lg" id="modalregistro">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">x</button>
        <h2 class="semibold modal-title text-danger">Primer Trimestre</h2>
      </div>
    <form class="form-horizontal form-bordered" id="ptrimestre" name="ptrimestre" action="" method="post">
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
                               <!--<select id="referido" name="referido" ></select>-->
            </div>
            <div class="col-md-3">
              <label class="control-label">Fecha:</label>
              <input type="text" name="fecha" id="fecha" class="form-control fecha" value="<?=date("Y-m-d");?>" />
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
            <div class="col-md-3">
              <label class="control-label">Longitud:</label>
              <input type="text" name="long" id="long" class="form-control" />
            </div>
            <div class="col-md-3">
              <label class="control-label">Contorno:</label>
              <select name="cont" id="cont" class="form-control">
                              <option value="">Seleccione...</option>
                              <option value="Regular">Regular</option>
                              <option value="Irregular">Irregular</option>
                            </select>
            </div>
            <div class="col-md-3">
              <label class="control-label">Posición:</label>
              <select name="posi" id="posi" class="form-control">
                              <option value="">Seleccione...</option>
                              <option value="Anteversión">Anteversión</option>
                              <option value="Retroversión">Retroversión</option>
                              <option value="Intermedio">Intermedio</option>
                            </select>
            </div>
            <div class="col-md-3">
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
          <h4 class="text-primary mt0">Saco Gestacional</h4>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Contorno:</label>
              <select name="saco" id="saco" class="form-control">
                              <option value="">Seleccione...</option>
                              <option value="Regular">Regular</option>
                              <option value="Irregular">Irregular</option>
                            </select>
            </div>
                        <div class="col-md-6">
              <label class="control-label">Contorno:</label>
              <select name="saco2" id="saco2" class="form-control">
                              <option value="">Seleccione...</option>
                              <option value="Normotónico">Normotónico</option>
                              <option value="Hipotónico">Hipotónico</option>
                            </select>
            </div>
          </div>
          <h4 class="text-primary mt0">Embrión</h4>
          <div class="form-group">
            <div class="col-md-3">
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
            <div class="col-md-6">
              <label class="control-label">Reacción Decidual:</label>
              <input type="text" name="rea" id="rea" class="form-control" />
            </div>
            <div class="col-md-6">
              <label class="control-label">Vesicula Vitelina:</label>
              <input type="text" name="ves" id="ves" class="form-control" />
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
          <input type="hidden" name="idex" id="idex" value="<?php echo $id;?>">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success" onclick="guardartrimestre();">Guardar</button>
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
    
function cargar_diagnosticos() {
    $.ajax({
        url: 'Recetas/cargar_diagnostico',
        type: "POST",
        success: function(response) {
            $('#dia').append(response);
            $('#dia2').append(response);
            $('#dia3').append(response);
            $('#dia4').append(response);
        }
    });
}
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
<?php }
function editar_trimestre($id,$accion){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();
  $query = $CI->db->query("SELECT * FROM reporte1 WHERE idreporte=".$id);
  foreach($query->result_array() as $row){
      $fecha = date('Y-m-d',strtotime($row['fecha']));
            $idexpediente = $row['idexpediente'];
      $referido = $row['referido'];
      $indicacion = $row['indicacion'];
      $longitud = $row['longitud'];
      $contorno = $row['contorno'];
      $posicion = $row['posicion'];
      $cervix = $row['cervix'];
      $miometrio = $row['miometrio'];
      $saco = $row['saco'];
      $saco2 = $row['saco2'];
      $embrion = $row['embrion'];
      $crl = $row['crl'];
      $fcf = $row['fcf'];
      $movimiento = $row['movimiento'];
      $reaccion = $row['reaccion'];
      $vesicula = $row['vesicula'];
      $comentarios = $row['comentarios'];
      $diagnostico = $row['diagnostico'];
      $diagnostico2 = $row['diagnostico2'];
      $diagnostico3 = $row['diagnostico3'];
      $diagnostico4 = $row['diagnostico4'];
      $precio = $row['precio'];
      $status = $row['status'];
  }
/* para los diagnosticos */
// Diagnostico 1
$diag1option = '';
$sqlconsulta = $CI->db->query("SELECT * FROM diagnosticos");
foreach($sqlconsulta->result_array() as $row2){
if($diagnostico == $row2['iddiagnostico']){
  $diag1option .= '<option value="'.$row2['iddiagnostico'].'" selected="selected">'.$row2['diagnostico'].'</option>';
}
}
// Diagnostico 2
$diag2option = '';
$sqldiag2 = $CI->db->query("SELECT * FROM diagnosticos");
foreach($sqldiag2->result_array() as $row3){
if($diagnostico2 == $row3['iddiagnostico']){

  $diag2option .= '<option value="'.$row3['iddiagnostico'].'" selected="selected">'.$row3['diagnostico'].'</option>';

}

}
// Diagnostico 3
$diag3option = '';
$sqldiag3 = $CI->db->query("SELECT * FROM diagnosticos");
foreach($sqldiag3->result_array() as $row4){
if($diagnostico3 == $row4['iddiagnostico']){
  $diag3option .= '<option value="'.$row4['iddiagnostico'].'" selected="selected">'.$row4['diagnostico'].'</option>';
}
}

// Diagnostico 41
$diag4option = '';
$sqldiag4 = $CI->db->query("SELECT * FROM diagnosticos");
foreach($sqldiag4->result_array() as $row4){
if($diagnostico4 == $row4['iddiagnostico']){
  $diag4option .= '<option value="'.$row4['iddiagnostico'].'" selected="selected">'.$row4['diagnostico'].'</option>';
}
}
?>
    <div class="modal-dialog modal-lg" id="modalregistro">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">x</button>
        <h2 class="semibold modal-title text-danger">Editar Primer Trimestre</h2>
      </div>
    <form class="form-horizontal form-bordered" id="ptrimestre" name="ptrimestre" action="" method="post">
      <div class="modal-body">
        <div class="panel-body">
                    <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Diagnostico:</label>
              <select name="dia" id="dia" class="form-control select2">                
                <?php echo $diag1option;?>
              </select>
            </div>
              <div class="col-md-6">
              <label class="control-label">Diagnostico2:</label>
              <select name="dia2" id="dia2" class="form-control select2">
                                <?php echo $diag2option;?>
              </select>
            </div>
          </div>
                    <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Diagnostico3:</label>
              <select name="dia3" id="dia3" class="form-control select2">
                                <?php echo $diag3option;?>
                            </select>
            </div>
                        <div class="col-md-6">
              <label class="control-label">Diagnostico4:</label>
              <select name="dia4" id="dia4" class="form-control select2">
                                <?php echo $diag4option;?>
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
                 <input type="text" name="referido" id="referido" class="form-control" value="<?php echo $referido; ?>" />
                               <!--<select id="referido" name="referido" ></select>-->
            </div>
            <div class="col-md-3">
              <label class="control-label">Fecha:</label>
              <input type="text" name="fecha" id="fecha" class="form-control fecha" value="<?php echo $fecha; ?>" />
            </div>
          </div>
                    <div class="form-group">
            <div class="col-md-12">
              <label class="control-label">Indicación:</label>
              <input type="text" name="indi" id="indi" class="form-control" value="<?php echo $indicacion; ?>" />
            </div>
          </div>
          <h4 class="text-primary mt0">Utero</h4>
          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Longitud:</label>
              <input type="text" name="long" id="long" class="form-control" value="<?php echo $longitud; ?>" />
            </div>
            <div class="col-md-3">
              <label class="control-label">Contorno:</label>
              <select name="cont" id="cont" class="form-control">
                <option value="<?php echo $contorno; ?>"><?php echo $contorno; ?></option>
                              <option value="">Seleccione...</option>
                              <option value="Regular">Regular</option>
                              <option value="Irregular">Irregular</option>
                            </select>
            </div>
            <div class="col-md-3">
              <label class="control-label">Posición:</label>
              <select name="posi" id="posi" class="form-control">
                <option value="<?php echo $posicion; ?>"><?php echo $posicion; ?></option>
                              <option value="">Seleccione...</option>
                              <option value="Anteversión">Anteversión</option>
                              <option value="Retroversión">Retroversión</option>
                              <option value="Intermedio">Intermedio</option>
                            </select>
            </div>
            <div class="col-md-3">
              <label class="control-label">Cervix:</label>
              <select name="cerv" id="cerv" class="form-control">
               <option value="<?php echo $cervix; ?>"><?php echo $cervix; ?></option>
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
                <option value="<?php echo $contorno; ?>"><?php echo $contorno; ?></option>
                              <option value="">Seleccione...</option>
                              <option value="Homogéneo">Homogéneo</option>
                              <option value="Heterogéneo">Heterogéneo</option>
                            </select>
            </div>
            <div class="col-md-6">
              &nbsp;
            </div>
          </div>
          <h4 class="text-primary mt0">Saco Gestacional</h4>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Contorno:</label>
              <select name="saco" id="saco" class="form-control">
                <option value="<?php echo $saco; ?>"><?php echo $saco; ?></option>
                              <option value="">Seleccione...</option>
                              <option value="Regular">Regular</option>
                              <option value="Irregular">Irregular</option>
                            </select>
            </div>
                        <div class="col-md-6">
              <label class="control-label">Contorno:</label>
              <select name="saco2" id="saco2" class="form-control">
                                <option value="<?php echo $saco2; ?>"><?php echo $saco2; ?></option>
                              <option value="">Seleccione...</option>
                              <option value="Normotónico">Normotónico</option>
                              <option value="Hipotónico">Hipotónico</option>
                            </select>
            </div>
          </div>
          <h4 class="text-primary mt0">Embrión</h4>
          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Embrión:</label>
              <select name="embi" id="embi" class="form-control">
                              <option value="<?php echo $embrion; ?>"><?php echo $embrion; ?></option>
                              <option value="">Seleccione...</option>
                              <option value="Único">Único</option>
                              <option value="Múltiple">Múltiple</option>
                            </select>
            </div>
            <div class="col-md-6">
              <label class="control-label">CRL:</label>
              <input type="text" name="crl" id="crl" class="form-control" value="<?php echo $crl; ?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">F.C. Fetal:</label>
              <input type="text" name="fcf" id="fcf" class="form-control" value="<?php echo $fcf; ?>" />
            </div>
            <div class="col-md-6">
              <label class="control-label">Movimiento Fetal:</label>
              <input type="text" name="mov" id="mov" class="form-control" value="<?php echo $movimiento; ?>" />
            </div>
          </div>



          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Reacción Decidual:</label>
              <input type="text" name="rea" id="rea" class="form-control" value="<?php echo $reaccion; ?>" />
            </div>
            <div class="col-md-6">
              <label class="control-label">Vesicula Vitelina:</label>
              <input type="text" name="ves" id="ves" class="form-control" value="<?php echo $vesicula; ?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <label class="control-label">Comentarios:</label>
              <textarea name="com" id="com" class="form-control"><?php echo $comentarios; ?></textarea>
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <input type="hidden" name="idreporte" id="idreporte" value="<?php echo $id;?>">
                    <input type="hidden" name="idex" id="idex" value="<?php echo $idexpediente;?>">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success" onclick="edit_trimestre();">Guardar</button>
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

function edit_trimestre(){
  var trimestre = $('#ptrimestre').serialize();
   $.ajax({
        url: 'Ficha_reporte/editar_trimestre',
        type: "POST",
        data: trimestre,
        beforeSend: function() {
            $('#modal').modal('hide');
        },
        success: function(response) {
           if (response == 0) {
            swal({
                    title: 'Exito!',
                    text: 'Actualizo correctamente trimestre 1!',
                    type: 'success',
                    confirmButtonColor: '#ff9933'
                }).then(function() { 
                  load_trimestre(<?php echo $idexpediente; ?>);
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
