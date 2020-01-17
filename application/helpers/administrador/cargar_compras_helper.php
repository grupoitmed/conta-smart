<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 include 'includes/time_zone.php';

 function load_compras($array){
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->database();

    $user_data_administrador = $CI->session->userdata('Administrador');
    $user_data_hospital = $CI->session->userdata('Administrador');
	$ahora = date('Y-m-d');
	$hace_7_dias = date("d-m-Y",strtotime($ahora."- 7 days")); 
	extract($array);
	if($fhasta != '' && $finicio != ''){$consulta = 'AND fechacompra BETWEEN "'.$finicio.'" AND "'.$fhasta.'"';}else{$consulta = 'AND DATE(fecha_creacion) BETWEEN "'.$hace_7_dias.'" AND "'.$ahora.'"';}
?>
 
<table class="table table-striped" id="archivos_table"s>
	<thead>
    <tr>
      <th style="text-align:center;" style="font-size:12px;" width="">FECHA</th>
      <th style="text-align:center;" style="font-size:12px;" width="">PROVEEDOR</th>
      <th style="text-align:center;" style="font-size:12px;" width="">#DOC</th>
      <th style="text-align:center;" style="font-size:12px;" width="">MONTO</th>
	  <th style="text-align:center;" style="font-size:12px;" width="">FOVIAL</th>
      <th style="text-align:center;" style="font-size:12px;" width="">COATRANS</th>
      <th style="text-align:center;" style="font-size:12px;" width="">CV</th>
	  <th style="text-align:center;" style="font-size:12px;" width="">PERSEPCION</th>
	  <th style="text-align:center;" style="font-size:12px;" width="">CESC</th>
	  <th style="text-align:center;" style="font-size:12px;" width="">TOTAL</th>
	  <th style="text-align:center;" style="font-size:12px;" width="">ACCIONES</th>
    </tr>
	</thead>
	<tbody>
	<?php
	$sql = $CI->db->query("SELECT * FROM compras
	WHERE status != 1 ".$consulta."");
	foreach($sql->result_array() as $row){
	$proveedor="";
		$sql2 = $CI->db->query("SELECT * FROM  proveedores WHERE idproveedor='".$row['idproveedor']."'");
	foreach($sql2->result_array() as $row2){
		$proveedor = $row2["proveedor"];
	}
		?>
		<tr>
		<td style="font-size:12px;" align="center"><?php echo date('d-m-Y',strtotime($row['fechacompra']));?></td>
		<td style="font-size:12px;" align="left"><?php echo $proveedor?></td>
		<td style="font-size:12px;" align="center"><?php echo $row['documento']?></td>
		<td style="font-size:12px;" align="right"><?php echo number_format($row['monto'],2)?></td>
		<td style="font-size:12px;" align="right"><?php echo number_format($row['fovial'],2)?></td>
		<td style="font-size:12px;" align="right"><?php echo number_format($row['coatrans'],2)?></td>
		<td style="font-size:12px;" align="right"><?php echo number_format($row['creditof'],2)?></td>
		<td style="font-size:12px;" align="right"><?php echo number_format($row['percepcion'],2)?></td>
		<td style="font-size:12px;" align="right"><?php echo number_format($row['cesc'],2)?></td>
		<td style="font-size:12px;" align="right"><?php echo number_format($row['total'],2)?></td>
		<td style="font-size:12px;" align="center">
			<button class="btn btn-primary" onclick="editar_compra(<?php echo $row['idcompra']?>);"><i class="fa fa-refresh"></i></button>
			<button class="btn btn-danger" onclick="eliminar_compra(<?php echo $row['idcompra']?>)"><i class="fa fa-trash"></i></button>
		</td>
		</tr>
		<?php
	}
	?>	
  </tbody>
  </table>
  <script>
      $('#archivos_table').DataTable({
        "aaSorting": []
        ,"displayLength": 10
      });
  </script>
<?php
  }
?>
