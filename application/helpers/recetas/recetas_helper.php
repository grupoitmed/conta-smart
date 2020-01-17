<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'includes/time_zone.php';

function cargar_detalles($idexpediente){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

  if (isset($CI->session->userdata['clinica']['idUsuario'])) {
    $usuario = $CI->session->userdata['clinica']['idUsuario'];
  } else if (isset($CI->session->userdata['administracion']['idUsuario'])) {
    $usuario = $CI->session->userdata['administracion']['idUsuario'];
  }
  $query = $CI->db->query("SELECT * FROM receta_detalles where idreceta=".$idexpediente);
//  SELECT * FROM detalles_receta INNER JOIN medicamentos ON detalles_receta.idmedicamento = medicamentos.idmedicamento WHERE detalles_receta.idreceta = ".$idreceta." ORDER BY iddetalle_receta ASC
 ?>
  <table class="table table-striped" id="historial">
    <thead>
      <tr>
          <th style="text-align:left;" width="2%">MEDICAMENTO</th>
          <th style="text-align:left;" width="40%">NOMBRE GENERICO </th>
          <th style="text-align:left;" width="40%">RECOMENDACIONES</th>
          <th style="text-align:left;" width="40%">INDICACIONES</th>
          <th style="text-align:center;" width="18%">ACCIONES</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      foreach($query->result_array() as $row){
      $i++; ?>
     <form id="guardar_fila<?php echo $row['idrecetadetalle'];?>" name="guardar_fila<?php echo $row['idrecetadetalle'];?>">
      <tr>
        <td>
    <textarea name='tratm<?php echo $row['idrecetadetalle'];?>' id='tratm<?php echo $row['idrecetadetalle'];?>'  class='form-control'><?php echo $row['medicamento'];?></textarea>
        </td>
        <td>
  <textarea name='ngener<?php echo $row['idrecetadetalle']; ?>' id='ngener<?php echo $row['idrecetadetalle']; ?>' class='form-control'><?php echo $row['ngenerico']; ?></textarea>
        </td>
        <td>
          <textarea name='recome<?php echo $row['idrecetadetalle']; ?>' id='recome<?php echo $row['idrecetadetalle']; ?>'  class='form-control'><?php echo $row['recomendaciones']; ?></textarea>
      </td>
        <td>
        <textarea name='trati<?php echo $row['idrecetadetalle']; ?>' id='trati<?php echo $row['idrecetadetalle']; ?>'  class='form-control'><?php echo $row['indicaciones']; ?></textarea>
      </td>
        <td>
            <a class='btn btn-info' title='Guardar Cambios' onclick="editar_detalle(<?php echo $row['idrecetadetalle'];?>)"><i class="fa fa-save"></i></a>
            <a class='btn btn-primary' title="Eliminar" onclick="eliminar_detalle(<?php echo $row['idrecetadetalle'];?>)"><i class="fa fa-trash"></i></a>     
        </td>
      </tr>
 </form>
      <?php } ?>

    </tbody>
  </table>
<?php }
// Cargar vista cuando presionen el tag
function cargar_recetas($idexpediente){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();
  $CI->load->library('session');
    if (isset($CI->session->userdata['clinica']['idUsuario'])) {
    $usuario = $CI->session->userdata['clinica']['idUsuario'];
  } else if (isset($CI->session->userdata['administracion']['idUsuario'])) {
    $usuario = $CI->session->userdata['administracion']['idUsuario'];
  }
  $query = $CI->db->query("SELECT a.fechareceta, a.idreceta, b.nombre,a.idmedico FROM recetas a,usuarios b WHERE a.idexpediente=". $idexpediente ." and a.idmedico=".$usuario." AND a.idmedico = b.idusuario  ORDER BY fechareceta DESC");
?>

<table class="table table-striped" id="recetas_table">
<thead>
  <tr>
        <th style="text-align:left;" width="40%">FECHA</th>
        <th style="text-align:left;" width="40%">CREADA POR</th>
        <th style="text-align:center;" width="18%">ACCIONES</th>
  </tr>
</thead>
<tbody>
  <?php foreach($query->result_array() as $row){ ?>
    <tr>
        <td><?php echo $row['fechareceta'];?></td>
        <td><?php echo $row['nombre'];?></td>
        <td>
          <div class="input-group m-t-10">

        <button class='btn btn-success' title="Imprimir receta" onclick="imprimir_receta(<?php echo $row['idreceta'];?>)"><i class="fa fa-print"></i></button>
        
        <a class='btn btn-warning' title="Editar receta o usar receta" type="button" href="../clinica/recetas?idr=<?php echo $row['idreceta']; ?>&ide=<?php echo $idexpediente; ?>" target="_blank"><i class="fa fa-file-signature "></i></a>
       
        <button class='btn btn-primary' title="Enviar receta" onclick="enviar_email(<?php echo $row['idreceta'];?>);"><i class="fa fa-envelope"></i></button>
          </div>
        </td>
      </td>
    </tr>
  <?php } ?>
</tbody>
</table>
<script>
  $('#recetas_table').DataTable({
    "aaSorting": []
    ,"displayLength": 25
  });
</script>

<?php
}
?>