<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// include 'includes/time_zone.php';

function load_usuarios(){
  $CI =& get_instance();
  $user_data_administrador  = $CI->session->userdata('administrador');
  $CI->load->helper('url');
  $CI->load->database();
  $sql="SELECT * FROM usuarios as user INNER JOIN empresas as emp ON user.idempresa = emp.Idempresa WHERE user.estado = 1 AND user.idrol=2 OR user.idrol=3";
  $query = $CI->db->query($sql);

  ?>
<div class="col-md-12" style="min-height:350; " >
  <table class="table table-striped" id="example" >
    <thead>
      <tr>

        <th style="text-align:center;">Nombre</th>
        <th style="text-align:center;">Usuario</th>
        <th style="text-align:center;">Nivel</th>
        <th style="text-align:center;">Empresa</th>		
        <th style="text-align:center;">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($query->result_array() as $row){
		  
		  if($row['idrol'] == 2){
			  $rol = 'Operador';
		  }else if($row['idrol'] == 3){
			  $rol = 'Cliente';
		  }else{
			  $rol = '';
		  }
		  ?>
        <tr>
          <td style="text-align:center;"><?=$row['nombre']?></td>
          <td style="text-align:center;"><?=$row['usuario']?></td>
          <td style="text-align:center;"><?=$rol?></td>
		  <td style="text-align:center;"><span style="color:#8BDB00;"><?=$row['razonsocial']?></span></td>
          <td style="font-size: 8px;" class="text-center">
            <div class="btn-group dropdown m-r-10">
                  <button class="btn btn-info" href="#" onclick="editar_usuario(<?php echo $row['idUsuario'];?>);" title="Historial clínico"><i class="fa fa-edit"></i>Editar</button>
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
  <script>
     $('#example').DataTable({
     });
  </script>
  <?php
}
?>
