<?php function editar_usuario($id){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();
  $query = $CI->db->query("SELECT * FROM usuarios WHERE idUsuario=".$id);
  foreach ($query->result_array() as $row) {
		$nombre = $row['nombre'];
		$usuario = $row['usuario'];
		$password = $row['password'];
		$idrol = $row['idrol'];
		$idempresa = $row['idempresa'];
  }
  $optionsproveedor = '';
          if($idrol == 2){
            $optionsproveedor .= '<option value="2" selected>Operador</option>';
          }elseif($idrol == 3) {
            $optionsproveedor .= '<option value="3" selected>Cliente</option>';
          }else{
			   $optionsproveedor .= '<option value="3" >Cliente</option>';
		  }

  $empresa = $CI->db->query("SELECT * FROM empresas WHERE Idempresa=".$idempresa);
  $options = '';
  foreach ($empresa->result_array() as $row2) {
          if($idempresa == $row2['Idempresa']){
            $options .= '<option value="'.$row2['Idempresa'].'" selected>'.$row2['razonsocial'].'</option>';
          }else {
            $options .= '<option value="'.$row2['Idempresa'].'">'.$row2['razonsocial'].'</option>';
          }
  }
?>
<!--Modal para nuevo proveedor-->
					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title" id="exampleModalLongTitle">Editar usuario</h4>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
                      <form class="" id="frm_usuario" >
					  <div class="row">
						<div class="col-md-12">
							<div class="form-group">
							  <label for="monto" class="col-md-4">Empresa </label>
								<select class="form-control select2" id="idempresa" name="idempresa" onchange="">
								  <?php echo $options;?>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
							  <label for="monto" class="col-md-4">Nombre completo </label>
								<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo" value="<?php echo $nombre;?>">
							</div>
						</div>
						<div class="col-md-12">
						<div class="form-group">
                <label for="monto" class="col-md-4">Usuario </label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Usuario" value="<?php echo $usuario;?>">
						</div>
						</div>
					  </div>
					  
					  <div class="row form-group">
						<div class="col-md-12">
						<div class="form-group">
						  <label for="monto" class="col-md-4">Password </label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $password;?>" placeholder="Password" required="required">
							      <input type="hidden" class="form-control" id="idusuario" name="idusuario" value="<?php echo $id;?>">
						</div>
						</div>
						<div class="col-md-12">
						<div class="form-group">
						  <label for="monto" class="col-md-4">Rol </label>
                            <select class="form-control" id="rol" name="rol">
                             <?php echo $optionsproveedor;?>
                            </select>
						</div>
						</div>
					  </div>


						                    <div class="col-lg-12" align="right">
                      <button type="button" class="btn btn-round btn-success" onclick="update_usuario();">Editar</button>
                      <button type="button" class="btn btn-round btn-danger" data-dismiss="modal">Cancelar</button>
					  
                    </div>
                      </form>
					    </div>
					  </div>

<!-- fin del modal del proveedor --->
<script>

function update_usuario(){
  var diagnostico = $('#frm_usuario').serialize();
   $.ajax({
        url: 'Usuario/update_usuario',
        type: "POST",
        data: diagnostico,
        beforeSend: function() {
            $('#modal').modal('hide');
        },
        success: function(response) {
           if (response == 0) {
            swal({
                    title: 'Exito!',
                    text: 'Usuario actualizo correctamente!',
                    type: 'success',
                    confirmButtonColor: '#ff9933'
                }).then(function() { 
                  cargar_empresa();
                });
            } else {
                swal({
                    title: 'Oops...',
                    text: 'Hubo un error al actualizo el usuario, por favor intentelo de nuevo mas tarde!',
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



