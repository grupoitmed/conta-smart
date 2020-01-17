<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// include 'includes/time_zone.php';
function load_empresas_registro(){
  $CI =& get_instance();
  $user_data_administrador  = $CI->session->userdata('Administrador');
  $CI->load->helper('url');
  $CI->load->database();
  $sql="SELECT * FROM empresas ";
  $query = $CI->db->query($sql);
  ?>
<div class="col-md-12" style="min-height:350; " >
  <table class="table table-striped" id="example" >
    <thead>
      <tr>
        <th style="text-align:center;" width="5%">#</th>
        <th style="text-align:center;">EMPRESA</th>
        <th style="text-align:center;">NRC</th>
        <th style="text-align:center;">FECHA DE PAGO</th>
        <th style="text-align:center;">ESTADO</th>
        <th style="text-align:center;">MONTO</th>
        <!--<th style="text-align:center;">ACCIONES</th>-->
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;  foreach($query->result_array() as $row){  
	  
	  if($row['estado'] == 0){
		  $estado = '<span class="label label-sm label-success">Activo</span>';
	  }elseif($row['estado'] == 1){
		  	  $estado = '<span class="label label-sm label-primary">Proceso pago</span>';
	  }else{
		  		  	  $estado = '<span class="label label-sm label-danger">Baja</span>';
	  }
	  ?>
        <tr>
          <td width="5%" style="text-align:center;"><?=$i++;?></td>
          <td style="text-align:center;"><?=$row['razonsocial']?></td>
          <td style="text-align:center;"><?=$row['nrc']?></td>
          <td style="text-align:center;"><?=date('d-m-Y', strtotime($row['fechaPago']))?></td>
          <td style="text-align:center;"><?=$estado?></td>
          <td style="text-align:center;">$ <?=$row['monto']?></td>
         <!-- <td style="font-size: 8px;" class="text-center">
            <div class="btn-group dropdown m-r-10">
                  <button class="btn btn-info" href="#" onclick="" title="Cobrar"><i class="ti-world"></i>Editar</button>
            </div>
          </td>-->
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
  <script>
     $('#example').DataTable({
       "aaSorting": []
       ,"displayLength": 25
     });
  </script>
  <?php
}
?>
