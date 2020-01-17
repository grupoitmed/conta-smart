<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// include 'includes/time_zone.php';
function seach_company($datos){
  $CI =& get_instance();
  $user_data_administrador  = $CI->session->userdata('Administrador');
  $CI->load->helper('url');
  $CI->load->database();
  $sql="SELECT * FROM empresas WHERE razonsocial LIKE '%$datos%' or nrc LIKE '%$datos%' AND estado = 0";
  $query = $CI->db->query($sql);
  ?>
<div class="col-md-12" style="min-height:350; " >
  <table class="table table-striped" id="example" >
    <thead>
      <tr>
        <th style="text-align:center;" width="5%">#</th>
        <th style="text-align:center;">RAZON SOCIAL</th>
        <th style="text-align:center;">NRC</th>
        <th style="text-align:center;">CONTACTO</th>
        <th style="text-align:center;">TELEFONO</th>
        <th style="text-align:center;">NIT</th>
		    <th style="text-align:center;">GIRO</th>
        <th style="text-align:center;">ACCIONES</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;  foreach($query->result_array() as $row){  ?>
        <tr>
          <td width="5%" style="text-align:center;"><?=$i++;?></td>
          <td style="text-align:center;"><?=$row['razonsocial']?></td>
          <td style="text-align:center;"><?=$row['nrc']?></td>
          <td style="text-align:center;"><?=$row['ncontacto']?></td>
          <td style="text-align:center;"><?=$row['telefono']?></td>
          <td style="text-align:center;"><?=$row['nit']?></td>
		      <td style="text-align:center;"><?=$row['giro']?></td>
          <td style="font-size: 8px;" class="text-center">
            <div class="btn-group dropdown m-r-10">
              <form action="Iva_subir_archivos" method="POST">
        				<input type="hidden" id="id" name="id" value="<?=$row['Idempresa'];?>">
        				<input class="btn btn-info" type="submit" value="Subir Archivos">
        			</form>
             </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
  <script>
    // $('#example').DataTable({
    //   "aaSorting": []
    //   ,"displayLength": 25
    // });
  </script>
  <?php
}
?>
