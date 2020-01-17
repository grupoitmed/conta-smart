<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  function email_recetas($id){ ?>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h2 class="semibold modal-title text-danger">Enviar receta por correo electronico</h2>
        </div>
        <form class="form-horizontal form-bordered" id="form_envio_receta" name="form_envio_receta" action="" method="post">
          <div class="modal-body">
    			  <div class="panel-body">
              <div class="form-group">
                <div class="col-sm-12">
                  <label class="control-label">Email: <span class="text-danger">*</span></label>
                  <input name="correo" id="correo" class="form-control" style="color:#000000" type="text">
                  <input type="hidden" name="idreceta" id="idreceta" value="<?php echo $id; ?>">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" onclick="enviar_recetas_cliente();" >Enviar</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php  }
?>
