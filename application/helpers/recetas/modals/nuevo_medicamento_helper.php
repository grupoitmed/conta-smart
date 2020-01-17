<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  function nuevo_medicamento(){ ?>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h2 class="semibold modal-title text-danger">Nuevo medicamento</h2>
        </div>
        <form class="form-horizontal form-bordered" id="form_medicamento" name="form_medicamento" action="" method="post">
          <div class="modal-body">
    			  <div class="panel-body">
              <div class="form-group">
                <div class="col-sm-12">
                  <label class="control-label">Medicamento: <span class="text-danger">*</span></label>
                  <input name="medicamento" id="medicamento" class="form-control" style="color:#000000" type="text">
                </div>
                <div class="col-sm-12">
                  <label class="control-label"><strong>Nombre generico:</strong></label>
                  <input name="nombre_generico" id="nombre_generico"  style="color:#000000" class="form-control" type="text">
                </div>
                <div class="col-sm-12">
                  <label class="control-label"><strong>Indicaciones:</strong></label>
                  <input name="indicaciones" id="indicaciones"  style="color:#000000" class="form-control" type="text">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" onclick="guardar_medicamento()">Guardar</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php  }
?>
