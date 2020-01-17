<?php function editar_proveedor($id){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

  $query = $CI->db->query("SELECT * FROM proveedores WHERE idproveedor=".$id);
  
  foreach ($query->result_array() as $row) {
		$proveedor = $row['proveedor'];
		$nrc = $row['nrc'];
		$nit = $row['nit'];
		$giro = $row['giro'];
		$contacto = $row['contacto'];
		$telefono = $row['telefono'];
  }
?>
<!--Modal para nuevo proveedor-->

					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title" id="exampleModalLongTitle">Editar proveedor</h4>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
  <form class="" id="frm_proveedores" method="POST" autocomplete="off">
  <div class="row">
  <div class="col-md-12">
  <label>Nombre</label>
		 <div class="form-group">
				<input type="text" class="form-control" id="proveedor" name="proveedor" placeholder="Proveedor" value="<?php echo $proveedor;?>">
			</div>
  </div>
  <div class="col-md-12">
  <div class="form-group">
	<input type="text" class="form-control" id="nrc" name="nrc" placeholder="NRC"  autocomplete="off" value="<?php echo $nrc;?>">

</div>

  </div>
  
  <div class="col-md-12">
    <div class="form-group">
	<input type="text" class="form-control" id="nit" name="nit" placeholder="NIT" required  value="<?php echo $nit;?>">
  </div>
  </div>
  
    <div class="col-md-12">
    <div class="form-group">
	<input type="text" class="form-control" id="giro" name="giro" placeholder="GIRO" required value="<?php echo $giro;?>">
  </div>
  </div>
  

 
  </div>
<div class="row">
  <div class="col-md-12"> 
  <div class="form-group">
	<input type="text" class="form-control" id="contacto" name="contacto" placeholder="CONTACTO" value="<?php echo $contacto;?>" required autocomplete="off">
  </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
	<input type="number" class="form-control" id="telefono" name="telefono" placeholder="TELEFONO" value="<?php echo $telefono;?>" required autocomplete="off">
	
		<input type="hidden" class="form-control" id="idproveedor" name="idproveedor" placeholder="TELEFONO" value="<?php echo $id;?>" required autocomplete="off">
  </div>
  </div>
  
</div>
                              <div class="col-lg-12 p-t-20 text-right">
                                <button type="button" class="btn btn-round btn-success" onclick="update_proevedor();">Editar proveedor</button>
                                 <button type="button" class="btn btn-round btn-danger" data-dismiss="modal">Cancelar</button>
                              </div>
                            </form>
					    </div>
					  </div>

<!-- fin del modal del proveedor --->
<script>

function update_proevedor(){
  var diagnostico = $('#frm_proveedores').serialize();
   $.ajax({
        url: 'Proveedor/updateproveedor',
        type: "POST",
        data: diagnostico,
        beforeSend: function() {
            $('#modal').modal('hide');
        },
        success: function(response) {
           if (response == 0) {
            swal({
                    title: 'Exito!',
                    text: 'Proveedor actualizo correctamente!',
                    type: 'success',
                    confirmButtonColor: '#ff9933'
                }).then(function() { 
                  cargar_empresa();
                });
            } else {
                swal({
                    title: 'Oops...',
                    text: 'Hubo un error al actualizo el proveedor, por favor intentelo de nuevo mas tarde!',
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



