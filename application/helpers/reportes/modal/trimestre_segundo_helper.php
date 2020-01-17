<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  function nuevo_segundo($id){ ?>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">x</button>
        <h2 class="semibold modal-title text-danger">Segundo y Tercer Trimestre</h2>
      </div>
    <form class="form-horizontal form-bordered" id="strimestre" name="strimestre" action="" method="post">
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
             <!-- <select id="referidot2" name="referidot2" >
                            </select>-->
                           
            </div>
            <div class="col-md-3">
              <label class="control-label">Fecha:</label>
              <input type="text" name="fecha2" id="fecha2" class="form-control" value="<?=date("Y-m-d");?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <label class="control-label">Indicación:</label>
              <input type="text" name="indi" id="indi" class="form-control"/>
            </div>
          </div>
          <h4 class="text-primary mt0">BIOMETRIAS</h4>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">DBP:</label>
              <input type="text" name="dbp" id="dbp" class="form-control" />
            </div>
            <div class="col-md-6">
              <label class="control-label">HC:</label>
              <input type="text" name="hc" id="hc" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">AC:</label>
              <input type="text" name="ac" id="ac" class="form-control" />
            </div>
            <div class="col-md-6">
              <label class="control-label">FEMUR:</label>
              <input type="text" name="femur" id="femur" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Edad Gestacional:</label>
              <input type="text" name="edad" id="edad" class="form-control" readonly="" />
            </div>
            <div class="col-md-6">
              <label class="control-label">Por Biometrias:</label>
              <input type="text" name="edadb" id="edadb" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Fecha Probable de Parto:</label>
              <input type="text" name="fpp" id="fpp" class="form-control" readonly="" />
            </div>
            <div class="col-md-6">
              <label class="control-label">Por Biometrias:</label>
              <input type="text" name="fppb" id="fppb" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Peso Fetal Estimado Gr:</label>
              <input type="text" name="peso1" id="peso1" class="form-control" />
            </div>
            <div class="col-md-6">
              <label class="control-label">Peso Fetal Estimado Lb:</label>
              <input type="text" name="peso2" id="peso2" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Peso Fetal Estimado Oz:</label>
              <input type="text" name="peso3" id="peso3" class="form-control" />
            </div>
            <div class="col-md-6">
              <label class="control-label">Posicion Fetal:</label>
              <input type="text" name="posi" id="posi" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <label class="control-label">ILA:</label>
                            <textarea name="ila" id="ila" class="form-control"></textarea>
            </div>
          </div>
                    <div class="form-group">
            <div class="col-md-12">
              <label class="control-label">PLACENTA:</label>
              <input type="text" name="plac" id="plac" class="form-control" />
            </div>
          </div>
          <h4 class="text-primary mt0">PERFIL BIOFISICO</h4>
          <div class="form-group">
            <div class="col-md-4">
              <label class="control-label">Movimientos fetales:</label>
              <select name="movi" id="movi" class="form-control">
                              <option value="">Seleccione...</option>
                                <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                            </select>
            </div>
            <div class="col-md-4">
              <label class="control-label">Tono Fetal:</label>
              <select name="tono" id="tono" class="form-control">
                              <option value="">Seleccione...</option>
                                <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                            </select>
            </div>
            <div class="col-md-4">
              <label class="control-label">Movimientos resp.:</label>
              <select name="resp2" id="resp2" class="form-control">
                              <option value="">Seleccione...</option>
                                <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                            </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
              <label class="control-label">Liquido Amniotico:</label>
              <select name="liqu" id="liqu" class="form-control">
                              <option value="">Seleccione...</option>
                                <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                            </select>
            </div>
            <div class="col-md-8">
              <label class="control-label">TOTAL:</label>
              <input type="text" name="total" id="total" class="form-control" />
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
          <button type="button" class="btn btn-success" onclick="save_segundo();">Guardar</button>
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

function save_segundo(){
    var trimestre = $('#strimestre').serialize();
   $.ajax({
        url: 'Ficha_reporte/save_segundotrimestre',
        type: "POST",
        data: trimestre,
        beforeSend: function() {
            $('#modal').modal('hide');
        },
        success: function(response) {
           if (response == 0) {
            swal({
                    title: 'Exito!',
                    text: 'Segundo y tercer trimestre guardado!',
                    type: 'success',
                    confirmButtonColor: '#ff9933'
                }).then(function() { 
                  cargar_segundo_trimestre(<?php echo $id; ?>);
                });
            } else {
                swal({
                    title: 'Oops...',
                    text: 'Hubo un error al guardar el Segundo y tercer trimestre, por favor intentelo de nuevo mas tarde!',
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
function editar_trimestre_dos_tres($id,$accion){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();
  $query = $CI->db->query("SELECT * FROM reporte2 WHERE idreporte=".$id);
  foreach($query->result_array() as $row){
      $idexpediente = $row['idexpediente'];
      $fecha = date('Y-m-d',strtotime($row['fecha']));
      $referido = $row['referido'];
      $indicacion = $row['indicacion'];
      $dbp = $row['dbp'];
      $hc = $row['hc'];
      $ac = $row['ac'];
      $femur = $row['femur'];
      $edad = $row['edad'];
      $edadb = $row['edadb'];
      $fpp = $row['fpp'];
      $fppb = $row['fppb'];
      $peso1 = $row['peso1'];
      $peso2 = $row['peso2'];
      $peso3 = $row['peso3'];
      $ila = $row['ila'];
      $posicion = $row['posicion'];
      $placenta = $row['placenta'];
      $movimiento = $row['movimiento'];
      $tono = $row['tono'];
      $respiracion = $row['respiracion'];
      $liquido = $row['liquido'];
      $total = $row['total'];

      $comentarios = $row['comentarios'];
      $diagnostico = $row['diagnostico'];
      $diagnostico2 = $row['diagnostico2'];
      $diagnostico3 = $row['diagnostico3'];
      $diagnostico4 = $row['diagnostico4'];

      $precio = $row['precio'];
      $status = $row['status'];
  }
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
      <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">x</button>
        <h2 class="semibold modal-title text-danger">Editar Segundo y Tercer Trimestre</h2>
      </div>
    <form class="form-horizontal form-bordered" id="strimestre" name="strimestre" action="" method="post">
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
                <input type="text" name="referido" id="referido" class="form-control" value="<?php echo $referido;?>" />
             <!-- <select id="referidot2" name="referidot2" >
                            </select>-->
                           
            </div>
            <div class="col-md-3">
              <label class="control-label">Fecha:</label>
              <input type="text" name="fecha2" id="fecha2" class="form-control" value="<?php echo $fecha;?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <label class="control-label">Indicación:</label>
              <input type="text" name="indi" id="indi" class="form-control" value="<?php echo $indicacion;?>" />
            </div>
          </div>
          
          <h4 class="text-primary mt0">BIOMETRIAS</h4>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">DBP:</label>
              <input type="text" name="dbp" id="dbp" class="form-control" value="<?php echo $dbp;?>" />
            </div>
            <div class="col-md-6">
              <label class="control-label">HC:</label>
              <input type="text" name="hc" id="hc" class="form-control" value="<?php echo $hc;?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">AC:</label>
              <input type="text" name="ac" id="ac" class="form-control" value="<?php echo $ac;?>" />
            </div>
            <div class="col-md-6">
              <label class="control-label">FEMUR:</label>
              <input type="text" name="femur" id="femur" class="form-control" value="<?php echo $femur;?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Edad Gestacional:</label>
              <input type="text" name="edad" id="edad" class="form-control" readonly="" value="<?php echo $edad;?>" />
            </div>
            <div class="col-md-6">
              <label class="control-label">Por Biometrias:</label>
              <input type="text" name="edadb" id="edadb" class="form-control" value="<?php echo $edadb;?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Fecha Probable de Parto:</label>
              <input type="text" name="fpp" id="fpp" class="form-control" readonly="" value="<?php echo $fpp;?>" />
            </div>
            <div class="col-md-6">
              <label class="control-label">Por Biometrias:</label>
              <input type="text" name="fppb" id="fppb" class="form-control" value="<?php echo $fppb;?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Peso Fetal Estimado Gr:</label>
              <input type="text" name="peso1" id="peso1" class="form-control" value="<?php echo $peso1;?>" />
            </div>

            <div class="col-md-6">
              <label class="control-label">Peso Fetal Estimado Lb:</label>
              <input type="text" name="peso2" id="peso2" class="form-control" value="<?php echo $peso2;?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label class="control-label">Peso Fetal Estimado Oz:</label>
              <input type="text" name="peso3" id="peso3" class="form-control" value="<?php echo $peso3;?>" />
            </div>
            <div class="col-md-6">
              <label class="control-label">Posicion Fetal:</label>
              <input type="text" name="posi" id="posi" class="form-control" value="<?php echo $posicion;?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <label class="control-label">ILA:</label>
                            <textarea name="ila" id="ila" class="form-control"><?php echo $ila;?></textarea>
            </div>
          </div>
                    <div class="form-group">
            <div class="col-md-12">
              <label class="control-label">PLACENTA:</label>
              <input type="text" name="plac" id="plac" class="form-control" value="<?php echo $placenta;?>" />
            </div>
          </div>

        
          <h4 class="text-primary mt0">PERFIL BIOFISICO</h4>
          <div class="form-group">
            <div class="col-md-4">
              <label class="control-label">Movimientos fetales:</label>
              <select name="movi" id="movi" class="form-control">
                <option value="<?php echo $movimiento;?>"><?php echo $movimiento;?></option>
                              <option value="">Seleccione...</option>
                                <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                            </select>
            </div>
            <div class="col-md-4">
              <label class="control-label">Tono Fetal:</label>
              <select name="tono" id="tono" class="form-control">
                <option value="<?php echo $tono;?>"><?php echo $tono;?></option>
                              <option value="">Seleccione...</option>
                                <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                            </select>
            </div>



            <div class="col-md-4">
              <label class="control-label">Movimientos resp.:</label>
              <select name="resp2" id="resp2" class="form-control">
                <option value="<?php echo $respiracion;?>"><?php echo $respiracion;?></option>
                              <option value="">Seleccione...</option>
                                <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                            </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
              <label class="control-label">Liquido Amniotico:</label>
              <select name="liqu" id="liqu" class="form-control">
                <option value="<?php echo $liquido;?>"><?php echo $liquido;?></option>
                              <option value="">Seleccione...</option>
                                <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                            </select>
            </div>
            <div class="col-md-8">
              <label class="control-label">TOTAL:</label>
              <input type="text" name="total" id="total" class="form-control" value="<?php echo $total;?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <label class="control-label">Comentarios:</label>
              <textarea name="com" id="com" class="form-control">
                <?php echo $comentarios;?>
              </textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
                    <input type="hidden" name="idreporte" id="idreporte" value="<?php echo $id;?>">
          <input type="hidden" name="idex" id="idex" value="<?php echo $idexpediente;?>">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success" onclick="editar_segundo();">Guardar</button>
        </div>
      </div>
    </form>
    </div>
  </div>
    <script>
    jQuery('#fecha2').datepicker({
        autoclose: true
        ,todayHighlight: true,
        format: 'yyyy-mm-dd'
    });


function editar_segundo(){
  var trimestre = $('#strimestre').serialize();
   $.ajax({
        url: 'Ficha_reporte/editar_segundo',
        type: "POST",
        data: trimestre,
        beforeSend: function() {
            $('#modal').modal('hide');
        },
        success: function(response) {
           if (response == 0) {
            swal({
                    title: 'Exito!',
                    text: 'Actualizo correctamente Segundo reporte!',
                    type: 'success',
                    confirmButtonColor: '#ff9933'
                }).then(function() { 
                  cargar_segundo_trimestre(<?php echo $idexpediente; ?>);
                });
            } else {
                swal({
                    title: 'Oops...',
                    text: 'Hubo un error al guardar el segundo reporte, por favor intentelo de nuevo mas tarde!',
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
