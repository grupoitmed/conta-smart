<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 include 'includes/time_zone.php';
  function load_trimestreavanzado($id){
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->database();
    $query = $CI->db->query("SELECT a.*, b.nombre FROM reporte3 a,usuarios b WHERE a.idexpediente=".$id." and a.idusuario=b.idUsuario ORDER BY hora,fecha DESC");
?>
<table class="table table-striped" id="avanzadotable">
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
      $('#avanzadotable').DataTable({
        "aaSorting": []
        ,"displayLength": 10
      });
  </script>
<?php
  }
?>
