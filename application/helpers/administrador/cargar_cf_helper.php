<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 include 'includes/time_zone.php';

 function load_facturascf($array){
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->database();

	$ahora = date('Y-m-d');
	extract($array);
	if($finicio != '' && $fhasta != ''){ $consulta = ' AND fecha BETWEEN "'.$finicio.'" AND "'.$fhasta.'" '; }else{ $consulta = 'AND DATE(fecha_creacion) = "'.$ahora.'"'; }
    
	$user_data_administrador = $CI->session->userdata('Administrador');
    $user_data_hospital = $CI->session->userdata('Administrador');
?>
 
<table class="table table-striped" id="archivos_table"s>
	<thead>
    <tr>
      <th style="text-align:center;" style="font-size:12px;" width="">FECHA</th>
      <th style="text-align:center;" style="font-size:12px;" width="">CLIENTE</th>
      <th style="text-align:center;" style="font-size:12px;" width="">MONTO</th>
	  <th style="text-align:center;" style="font-size:12px;" width="">CF</th>
      <th style="text-align:center;" style="font-size:12px;" width="">VENTAS NS</th>
      <th style="text-align:center;" style="font-size:12px;" width="">VENTAS E</th>
	  <th style="text-align:center;" style="font-size:12px;" width="">RETENCION</th>
	  <th style="text-align:center;" style="font-size:12px;" width="">PERCEPCION</th>
	  <th style="text-align:center;" style="font-size:12px;" width="">TOTAL</th>
	  <th style="text-align:center;" style="font-size:12px;" width="">ACCIONES</th>
    </tr>
	</thead>
	<tbody>
	<?php
	$sql = $CI->db->query("SELECT * FROM facturas
	WHERE estado != 3 ".$consulta." AND tipo_fac = 2 AND idempresa = ".$id."");
	foreach($sql->result_array() as $row){
		?>
		<tr>
		<td style="font-size:12px;" align="center"><?php echo date('d-m-Y',strtotime($row['fecha']));?></td>
		<td style="font-size:12px;" align="left"><?php echo $row['cliente']?></td>
		<td style="font-size:12px;" align="right"><?php echo number_format($row['monto'],2)?></td>
		<td style="font-size:12px;" align="right"><?php echo number_format($row['credito_fiscal'],2)?></td>
		<td style="font-size:12px;" align="right"><?php echo number_format($row['ventas_no_sujetas'],2)?></td>
		<td style="font-size:12px;" align="right"><?php echo number_format($row['ventas_excentas'],2)?></td>
		<td style="font-size:12px;" align="right"><?php echo number_format($row['retencion'],2)?></td>
		<td style="font-size:12px;" align="right"><?php echo number_format($row['percepcion'],2)?></td>
		<td style="font-size:12px;" align="right"><?php echo number_format($row['valor_total'],2)?></td>
		<td style="font-size:12px;" align="center">
			<button class="btn btn-primary" onclick="editar_cfinal(<?php echo $row['idFactura']?>);"><i class="fa fa-refresh"></i></button>
			<button class="btn btn-danger" onclick="eliminar_facturacf(<?php echo $row['idFactura']?>)"><i class="fa fa-trash"></i></button>
			<button class="btn btn-warning" onclick="anular_facturacf(<?php echo $row['idFactura']?>)"><i class="fa fa-times-circle"></i></button>
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
