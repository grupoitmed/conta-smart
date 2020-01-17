<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 include 'includes/time_zone.php';
  function cargar_trimestre($id){
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->database();
    $query = $CI->db->query("SELECT a.*, b.nombre FROM reporte1 a,usuarios b WHERE a.idexpediente=".$id." and a.idusuario=b.idUsuario ORDER BY fecha DESC");
?>
<table class="table table-striped" id="trimestre">
	<thead>
    <tr>
      <th style="text-align:center;">FECHA</th>
      <th style="text-align:center;">HORA</th>
      <th style="text-align:center;">CREADA POR</th>
      <th style="text-align:center;">ACCIONES</th>
    </tr>
	</thead>
	<tbody>
    <?php foreach($query->result_array() as $row){ ?>
      <tr>
        <td style="text-align:center;"><?php echo date("d-m-Y", strtotime($row['fecha'])); ?></td>
        <td style="text-align:center;"><?php echo date("h:i:a", strtotime($row['hora'])); ?></td>
        <td style="text-align:center;"><?php echo $row['nombre']; ?></td>
        <td style="text-align:center;">
            <button class="btn btn-warning" onclick="editar_trimestre(<?php echo $row['idreporte']; ?>)">Editar</button>
        </td>
      </tr>
    <?php } ?>
  </tbody>
  </table>
  <script>
      $('#trimestre').DataTable({
        "aaSorting": []
        ,"displayLength": 10
      });
  </script>
<?php
  }
?>
