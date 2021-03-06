<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 include 'includes/time_zone.php';

  function load_archivos($tipo_documento){
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->database();

    $user_data_administrador = $CI->session->userdata('Administrador');
    $user_data_hospital = $CI->session->userdata('Administrador');
	$idempresa = $CI->session->userdata['Cliente']['idempresa'];
	$tipoarchivo = '';
    if ($tipo_documento == '') {
      $query = $CI->db->query("SELECT * FROM empresas_documentos WHERE estado = 0 AND idempresa = ".$idempresa." ORDER BY fecha DESC, hora DESC");
    }else {
      $query = $CI->db->query("SELECT * FROM empresas_documentos WHERE estado = 0 AND idempresa = ".$idempresa." AND idtipo_documento = ".$tipo_documento." ORDER BY fecha DESC, hora DESC");
    }
	$meses = array("",'ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE');
	$contador = 1;
?>

<table class="table table-striped" id="archivos_table">
	<thead>
    <tr>
	<th style="text-align:center;" width="2%">N°</th>
      <th style="text-align:center;" width="9%">FECHA SUBIDA</th>
      <th style="text-align:center;" width="8%">HORA</th>
      <th style="text-align:center;" width="7%">USUARIO</th>
	  <th style="text-align:center;" width="7%">AÑO</th>
	  <th style="text-align:center;" width="7%">MES</th>
      <th style="text-align:center;" width="17%">TIPO</th>
      <th style="text-align:center;" width="10%">ACCIONES</th>
    </tr>
	</thead>
	<tbody>
    <?php foreach($query->result_array() as $row){ 
	
	if($row['mes_documento']!=""){$mes_documento=$row['mes_documento'];}else{$mes_documento=0;}
	?>
      <tr>
        <td style="text-align:center;">
          <a class="btn btn-info" onclick="javascript:window.open('<?php echo base_url()."archivos/archivos_empresas/".$row['ruta'];?>');">Ver</a>
          <!--<button class="btn btn-danger" onclick="eliminar_archivo(<?php echo $row['iddocumento'];?>)">Eliminar</button>-->
        </td>
		<td style="text-align:center;"><?php echo $meses[$mes_documento];?></td>
		<td style="text-align:center;"><?php echo $contador;?></td>
        <td style="text-align:center;"><?php echo date("d-m-Y",strtotime($row['fecha']));?></td>
        <td style="text-align:center;"><?php echo date("h:i a",strtotime($row['hora']));?></td>
        <td style="text-align:center;"><?php echo $row['usuario'];?></td>
		<td style="text-align:center;"><?php echo $row['año_documento'];?></td>
        <?php $query2 = $CI->db->query("SELECT tipo_documento FROM tipos_documentos WHERE idtipo_documento = ".$row['idtipo_documento']);
        foreach($query2->result_array() as $row2){
          $tipo = $row2['tipo_documento'];
        }?>
        <td style="text-align:center;"><?php echo $tipo;?></td>
      </tr>
    <?php $contador += 1;} ?>
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
