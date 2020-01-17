<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// include 'includes/time_zone.php';

function buscar_proveedores($datos){
  $CI =& get_instance();
  $user_data_administrador  = $CI->session->userdata('administrador');
  $CI->load->helper('url');
  $CI->load->database();
  $sql="SELECT * FROM proveedores WHERE proveedor LIKE '%$datos%' OR telefono LIKE '%$datos%' AND estado = 0 ";
  $query = $CI->db->query($sql);

  ?>
<div class="col-md-12" style="min-height:350; " >
  <table class="table table-striped" id="example" >
    <thead>
      <tr>
        <th style="text-align:center;" width="5%">#</th>
        <th style="text-align:center;">Nombres</th>
        <th style="text-align:center;">NRC</th>
        <th style="text-align:center;">Contacto</th>
        <th style="text-align:center;">telefono</th>
        <th style="text-align:center;">nit</th>
        <th style="text-align:center;">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($query->result_array() as $row){?>
        <tr>
          <td width="5%" style="text-align:center;"><?=$row['idproveedor']?></td>
          <td style="text-align:center;"><?=$row['proveedor']?></td>
          <td style="text-align:center;"><?=$row['nrc']?></td>
          <td style="text-align:center;"><?=$row['contacto']?></td>
          <td style="text-align:center;"><?=$row['telefono']?></td>
          <td style="text-align:center;"><?=$row['nit']?></td>
          <td style="font-size: 8px;" class="text-center">
            <div class="btn-group dropdown m-r-10">
                  <button class="btn btn-info" href="#" onclick="editar_proveedor(<?php echo $row['idproveedor'];?>);" title="Historial clínico"><i class="ti-world"></i>Editar</button>
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
  <script>
    // $('#example').DataTable({
    // });
  </script>
  <?php
}
?>
