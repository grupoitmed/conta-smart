<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  function nuevo_diagnostico(){ ?>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h2 class="semibold modal-title text-danger">Nuevo diagnostico</h2>
        </div>
        <form class="form-horizontal form-bordered" id="form_diagnostico" name="form_diagnostico" action="" method="post">
          <div class="modal-body">
    			  <div class="panel-body">
              <div class="form-group">
                <div class="col-sm-12">
                  <label class="control-label">Diagnostico: <span class="text-danger">*</span></label>
                  <input name="diagnostico" id="diagnostico" class="form-control" style="color:#000000" type="text">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" onclick="guardar_diagnostico()">Guardar</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php  }
?>
