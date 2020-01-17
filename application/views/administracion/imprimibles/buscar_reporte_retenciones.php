<?php

  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();
	if($this->session->userdata['Cliente']){
		$idempresa = $this->session->userdata['Cliente']['idempresa'];
	}else if($this->session->userdata['Administrador']){
		$idempresa = $this->session->userdata['Administrador']['idempresa'];
	}else if($this->session->userdata['Operador']){
		$idempresa = $this->session->userdata['Operador']['idempresa'];
	}
  $query = $CI->db->query("SELECT * FROM empresas WHERE Idempresa='".$idempresa."'");
  foreach($query->result_array() as $row){
		$razonsocial = $row['razonsocial'];
		$nrc = $row['nrc'];
		$nit = $row['nit'];
		$giro = $row['giro'];
		$direccion = $row['direccion'];
  }
// para saber el mes
$desde = date("Y-m-d", strtotime($_REQUEST['finicio']));
$hasta = date("Y-m-d", strtotime($_REQUEST['fhasta']));
// para consultar los registro del mes que se esta
// consultando
$mdesde = date('m',strtotime($_REQUEST['finicio']));
$adesde = date('Y',strtotime($_REQUEST['finicio']));
$mhasta = date('m',strtotime($_REQUEST['fhasta']));
$ahasta = date('Y',strtotime($_REQUEST['fhasta']));
$fhasta = date('Y-m-d',strtotime($_REQUEST['fhasta']));
//seccionar cadenas
$ini=substr($desde,0,2);
$fin=substr($hasta,0,2);
$mes=substr($desde,3,2);
$ani=substr($desde,6,4);
//valor numerico del mes
$ml=date("n",strtotime($desde));
//array convertir nombre mes al español
$nmes=array(1=>"ENERO",2=>"FEBRERO",3=>"MARZO",4=>"ABRIL",5=>"MAYO",6=>"JUNIO",7=>"JULIO",8=>"AGOSTO",9=>"SEPTIEMBRE",10=>"OCTUBRE",11=>"NOVIEMBRE",12=>"DICIEMBRE");
//asignando mes a letras
$nm=$nmes[$ml];

$html = '
<head>
	<title>Reporte_de_retenciones</title> 
<style>
#customers{
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 3px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 9px;
  padding-bottom: 9px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}


.tdcolum{
	font-size:13px;
}
.tdnwe{
		font-size:9px;
}

.thcolum{
	font-size:12px;
  padding-top: 9px;
  padding-bottom: 9px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
.thheadecolum{
	font-size:11px
}
</style>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td width="25%" colspan="" align="left"><img alt="" src="'.base_url().'assets/img/hospital.png" width="100"><br>&nbsp;</td>
   <td width="50%" colspan="" align="center" class="td2"><span class="style1">LIBRO DE RETENCIONES</span><br><strong>'.$razonsocial.'</strong><br>&nbsp;</td>
  <td width="25%" colspan="" align="center"></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="demo">
  <tr>
    <td style="font-size:12px" align="center" width="349" class="td2"><strong>REGISTRO DE IVA:</strong>'.$nrc.'</td>
    <td style="font-size:12px" align="center" width="351" class="td2"><strong>NIT:'.$nit.'</strong></td>
  </tr>
  <tr>
    <td style="font-size:12px" align="center" class="td2"><strong>GIRO: </strong>'.$giro.'</td>
    <td style="font-size:12px" align="center" class="td2"> </td>
  </tr>
</table>
  <br>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" id="customers" style="">
	<tr>
		<th class="thcolum" align="center">FECHA</th> 
		<th class="thcolum" align="center">AGENTE RETENEDOR</th>
		<th class="thcolum" align="center">NIT</th>
		<th class="thcolum" align="center" width="20%">MONTO SUJETO <br />A RETENCION</th>
		<th class="thcolum" align="center" width="10%">MONTO RETENIDO</th> 
	</tr>
 ';
		$total=0;
		$total_retencion=0;
		$query = $CI->db->query("SELECT * FROM deducciones
		INNER JOIN agentes_retencion ON agentes_retencion.id_agentes_retencion=deducciones.agente_retenedor
		INNER JOIN tipo_retenedor ON deducciones.id_tipo_retenedor=tipo_retenedor.idtipo_retenedor
		WHERE deducciones.fecha_aplicar BETWEEN '".$desde."' AND '".$hasta."' AND deducciones.estado=0");
		foreach($query->result_array() as $row){
			$html .= "
				<tr> 
					<td class='tdcolum' align='center'>".date("d-m-Y", strtotime($row["fecha_aplicar"]))."</td> 
					<td class='tdcolum'>".$row["nombre"]."</td>
					<td class='tdcolum' align='center'>".$row["nit"]."</td>
					<td class='tdcolum' align='right'>$ ". number_format($row["retencion"],2)."</td>
					<td class='tdcolum' align='right'>$ ". number_format($row["monto"],2)."</td>
				</tr>
			";
			$total_retencion += $row["retencion"];
			$total_monto += $row["monto"];
		}
  $html .= "
				<tr>
					<td class='tdcolum' colspan='2'> </td>
					<td class='tdcolum' align='right'>Total:</td>
					<td class='tdcolum' align='right'>$ ". number_format($total_retencion,2)."</td>
					<td class='tdcolum' align='right'>$ ". number_format($total_monto,2)."</td>
				</tr>
   
   </table>
   ";

   $foter='
   <br>
   <br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
  <td style="font-size:12px" align="center"><span class="td2">____________________________</span></td>
  <td style="font-size:12px" align="center"><span class="td2">____________________________</span></td>
</tr>
  <tr>
    <td style="font-size:12px" align="center" class="td2">F. REPRESENTANTE LEGAL</td>
    <td style="font-size:12px" align="center" class="td2">F. CONTADOR</td>
	<td style="font-size:9px" align="rigth" class="td2">conta-smart.com</td>
  </tr>
</table>
';

include("mpdf/mpdf.php");
$mpdf= new mPDF('', 'Letter', 0, '', 12.7, 12.7, 14, 12.7, 8, 8);
$mpdf->SetDisplayMode('fullpage');
// $mpdf->addPage('L');
$mpdf->WriteHTML($html);
$mpdf->SetFooter($foter);
$mpdf->Output();
exit;
// echo $html;
 ?>
