<?php function editar_empresa($id){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

  $query = $CI->db->query("SELECT * FROM empresas WHERE Idempresa=".$id);
  
  foreach ($query->result_array() as $row) {
		$razonsocial = $row['razonsocial'];
		$nrc = $row['nrc'];
		$nit = $row['nit'];
		$giro = $row['giro'];
		$direccion = $row['direccion'];
		$pais = $row['pais'];
		$ncontacto = $row['ncontacto'];
		$telefono = $row['telefono'];
		$idusuario = $row['idusuario'];
		$email = $row['email'];
		$monto = $row['monto'];
  }
?>
<!--Modal para nuevo proveedor-->

					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title" id="exampleModalLongTitle">Editar empresa</h4>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
                      <form class="form-horizontal" id="frm_empresa">

                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="fechacompra" class="col-md-4">Razón Social</label><br>
                            <input type="text" class="form-control" id="razonsocial" name="razonsocial" placeholder="Razón Social" value="<?php echo $razonsocial;?>">
                          </div>
						</div>
						
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="fechacompra" class="col-md-4">NRC</label>
                            <input type="text" class="form-control" id="nrc" name="nrc" placeholder="NRC" value="<?php echo $nrc;?>">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="fechacompra" class="col-md-4">NIT</label>
                            <input type="text" class="form-control" id="nit" name="nit" placeholder="NIT" autocomplete="off" value="<?php echo $nit;?>">
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="fechacompra" class="col-md-4">Giro</label>
                            <input type="text" class="form-control" id="giro" name="giro" placeholder="Giro" value="<?php echo $giro;?>">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="fechacompra" class="col-md-4">Dirección</label>
                            <textarea class="form-control" rows ="3"
                            id = "direccion" name="direccion" placeholder="Dirección">
								<?php echo $direccion;?>
							</textarea>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="fechacompra" class="col-md-4">País</label>
                            <select class="form-control" id="pais" name="pais">
							<?php if($pais == 'SV'){ ?>
                              <option value="SV" selected>El salvador</option>
								       <option value="HD">Honduras</option>
							<?php }else{  ?>
							       <option value="HD" selected>Honduras</option>
								    <option value="SV" selected>El salvador</option>
							<?php  } ?>
                            </select>
                          </div>
                        </div>


                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="fechacompra" class="col-md-4">Nombre de contácto</label>
                            <input type="text" class="form-control" id="ncontacto" name="ncontacto" placeholder="Nombre de contácto" value="<?php echo $ncontacto;?>">
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group" >
                            <label for="fechacompra" class="col-md-4">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="<?php echo $telefono;?>">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group" >
                            <label for="email" class="col-md-4">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required="required" placeholder="Correo electrónico" value="<?php echo $email;?>">
                          </div>
                        </div>
						
						<div class="col-md-12">
                          <div class="form-group" >
                            <label for="monto" class="col-md-4">Monto </label>
                            <input type="number" class="form-control" step="any" id="monto" name="monto" value="<?php echo $monto; ?>" required="required" placeholder="Monto">
							<input type="hidden" id="idempresa" name="idempresa" value="<?php echo $id;?>">
                          </div>
                        </div>
						
                        <div class="col-lg-12 p-t-20 text-right">
                          <button type="button" class="save btn btn-success" onclick="update_empresa();">
                            Editar
                          </button>
						  <button type="button" class="btn btn-round btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>

                      </form>
					    </div>
					  </div>

<!-- fin del modal del proveedor --->
<script>

function update_empresa(){
  var diagnostico = $('#frm_empresa').serialize();
   $.ajax({
        url: 'Buscar_empresa/update_empresa',
        type: "POST",
        data: diagnostico,
        beforeSend: function() {
            $('#modal').modal('hide');
        },
        success: function(response) {
           if (response == 0) {
            swal({
                    title: 'Exito!',
                    text: 'Empresa actualizo correctamente!',
                    type: 'success',
                    confirmButtonColor: '#ff9933'
                }).then(function() { 
                  cargar_empresa();
                });
            } else {
                swal({
                    title: 'Oops...',
                    text: 'Hubo un error al actualizo el Diagnostico, por favor intentelo de nuevo mas tarde!',
                    type: 'error',
                    confirmButtonColor: '#4fb7fe'
                }).done();
            }
          
        }
    });
}
</script>
<?php
}

?>



