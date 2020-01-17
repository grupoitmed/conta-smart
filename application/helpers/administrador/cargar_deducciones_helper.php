<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 include 'includes/time_zone.php';

 function load_deduccion($array){
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->database();

    $user_data_administrador = $CI->session->userdata('Administrador');
    $user_data_hospital = $CI->session->userdata('Administrador');
	$ahora = date('Y-m-d');
	extract($array);
	if($fhasta != '' && $finicio != ''){$consulta = 'AND fecha_creacion BETWEEN "'.$finicio.'" AND "'.$fhasta.'"';}else{$consulta = 'AND DATE(fecha_creacion) = "'.$ahora.'"';}
?>
 
<table class="table table-striped" id="archivos_table"s>
	<thead>
		<tr>
			<th style="text-align:center;" style="font-size:12px;">FECHA</th>
			<th style="text-align:center;" style="font-size:12px;">FECHA DOCUMENTO</th>
			<th style="text-align:center;" style="font-size:12px;">DESCRIPCION</th>
			<th style="text-align:center;" style="font-size:12px;">MONTO GRABADO ($)</th>
			<th style="text-align:center;" style="font-size:12px;">RETENCIÓN ($)</th>
			<th style="text-align:center;" style="font-size:12px;">ACCIONES</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql = $CI->db->query("SELECT * FROM deducciones
	WHERE estado != 1 ".$consulta."");
	foreach($sql->result_array() as $row){
		?>
		<tr>
		<td style="font-size:12px;" align="center"><?php echo date('d-m-Y',strtotime($row['fecha_creacion']));?></td>
		<td style="font-size:12px;" align="center"><?php echo date('d-m-Y',strtotime($row['fecha_documento']));?></td>
		<td style="font-size:12px;" align="left"><?php echo $row['descripcion']?></td>
		<td style="font-size:12px;" align="right"><?php echo number_format($row['retencion'],2)?></td>
		<td style="font-size:12px;" align="right"><?php echo number_format($row['monto'],2)?></td>
		<td style="font-size:12px;" align="center">
			<button class="btn btn-primary" onclick="editar_deduccion(<?php echo $row['id_deduccion']?>);"><i class="fa fa-refresh"></i></button>
			<button class="btn btn-danger" onclick="eliminar_educcion(<?php echo $row['id_deduccion']?>)"><i class="fa fa-trash"></i></button>
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
