<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  function cargar_modal(){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

  /*$query = $CI->db->query("SELECT * FROM detalles_receta WHERE iddetalle_receta =".$idreceta);
  foreach($query->result_array() as $row){
    $iddetalle_receta = $row['iddetalle_receta'];
    $medicamento = $row['idmedicamento'];
    $cantidad = $row['cantidad'];
    $periodo = $row['periodo'];
   
    $indicaciones_generales = $row['indicaciones_generales'];
    $otras_indicaciones = $row['otras_indicaciones'];
  }*/
  ?>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">x</button>
        <h2 class="semibold modal-title text-danger">Editar medicamento</h2>
      </div>
      <form class="form-horizontal" id="form_recetas_edit" name="form_recetas_edit">
        <div class="modal-body">
  			  <div class="panel-body">
            <div class="form-group">
              <div class="row">
                <div div class="panel-body col-md-12">
                  <div class="col-md-12">
                    <label class="control-label">Medicamento: <span class="text-danger">*</span></label>
                    <select class="form-control select2" id="medicamentos" name="medicamentos" style="color:#000000">
                      <option value="">Seleccione un medicamento</option>
                      <?php
                      $options = '';
                      $query = $CI->db->query("SELECT * FROM medicamentop order by medicamento asc");
                      foreach($query->result_array() as $row){
                        $options.= '<option value="'.$row['idmedicamento'].'">'.$row['medicamento']." ".$row['ngenerico'].'</option>';
                      }
                      echo $options;
                      ?>
                    </select>
                  </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                    <label class="col-md-2 control-label">Cantidad: </label>
                    <div class="col-md-3">
                      <input name="cantidad" id="cantidad" value="<?php echo $cantidad;?>" class="form-control" style="color:#000000" type="text">
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <label class="col-md-2 control-label">Periodo: </label>
                    <div class="col-md-3">
                      <input name="periodo" id="periodo" class="form-control" value="<?php echo $periodo;?>" style="color:#000000" type="text">
                    </div>

                  </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div div class="panel-body">
                    <div class="col-md-12">
                      <label class="control-label">Indicaciones Medicamento: <span class="text-danger">*</span></label>
                      <textarea name="indicaciones_edit" id="indicaciones_edit" cols="80" rows="5" style="color:#000000" class="wysihtml5 form-control"><?php echo $indicaciones_generales;?></textarea>
                    </div>
                    <div class="col-md-12">
                      <label class="control-label">Otras indicaciones: <span class="text-danger">*</span></label>
                      <textarea name="otras_indicaciones_edit" id="otras_indicaciones_edit" cols="80" rows="5" style="color:#000000" class="wysihtml5 form-control"><?php echo $otras_indicaciones;?></textarea>
                      <input type="hidden" id="detalle_receta" name="detalle_receta" value="<?php echo $iddetalle_receta;?>" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="form-actions" style="margin: 0;" align="center">
                  <span class="btn btn-warning" onclick="editar();" id="editar">
                      <i class="fa fa-edit"></i> Editar
                  </span>
                  <span class="btn btn-info" onclick="cerrar_modal_medicamento();" id="cancelar">
                      <i class="fa fa-mail-reply"></i> Cerrar
                  </span>
                </div>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script>
    $('#medicamentos').select2();
    $("#medicamentos").val(<?php echo $medicamento;?>).trigger('change');
    cancelar();

    function editar(){
      $('input[disabled="disabled"]').removeAttr("disabled");
      $('select[disabled="disabled"]').removeAttr("disabled");
      $('textarea[disabled="disabled"]').removeAttr("disabled");
      $('select').select2("enable",true);

      $("#editar").html('<i class="fa fa-check"></i> Actualizar');
      $("#cancelar").html('<i class="fa fa-ban"></i> Cancelar');
      document.getElementById('editar').onclick = function(){ editar_medicamento_receta(); };
      document.getElementById('cancelar').onclick = function(){ cancelar(); };
    }

    function cancelar(){
      $("#editar").html('<i class="fa fa-edit"></i> Editar');
      $("#cancelar").html('<i class="fa fa-mail-reply"></i> Cerrar');
      document.getElementById('editar').onclick = function(){ editar(); };
      document.getElementById('cancelar').onclick = function(){ cerrar_modal_medicamento(); };
      $('#form_recetas_edit').find('input,select,textarea').attr('disabled','disabled');
      $('select').select2("disable",true);

    }

    function cerrar_modal_medicamento(){
      $('#modal').modal('hide');
    }
  </script>
<?php } ?>
