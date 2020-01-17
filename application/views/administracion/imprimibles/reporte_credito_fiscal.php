<?php
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

  $idempresa = $_REQUEST['idempresa'];
  $query = $CI->db->query("SELECT * FROM empresas WHERE MD5(Idempresa)='".$idempresa."'");
  foreach($query->result_array() as $row){
		$razonsocial = $row['razonsocial'];
		$nrc = $row['nrc'];
		$nit = $row['nit'];
		$giro = $row['giro'];
		$direccion = $row['direccion'];
  }
//capturar fechas a realizar
$desde = date("Y-m-d",strtotime($_REQUEST['finicio']));
$hasta = date("Y-m-d",strtotime($_REQUEST['fhasta']));
//seccionar cadenas
$ini=substr($desde,0,2);
$fin=substr($hasta,0,2);
$mes=substr($desde,3,2);
$ani=substr($desde,0,4);
$anio=date('Y',strtotime($hasta));
//valor numerico del mes
$ml=date("n",strtotime($desde));
//array convertir nombre mes al español
$nmes=array(1=>"ENERO",2=>"FEBRERO",3=>"MARZO",4=>"ABRIL",5=>"MAYO",6=>"JUNIO",7=>"JULIO",8=>"AGOSTO",9=>"SEPTIEMBRE",10=>"OCTUBRE",11=>"NOVIEMBRE",12=>"DICIEMBRE");
//asignando mes a letras
$nm=$nmes[$ml];

$html ='
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td width="25%" colspan="" align="left"><img alt="" src="'.base_url().'assets/img/hospital.png" width="100"><br>&nbsp;</td>
   <td width="50%" colspan="" align="center" class="td2"><span class="style1">LIBRO DE VENTAS A CONTRIBUYENTES</span>
   <br><strong>'.$razonsocial.'</strong><br>&nbsp;
   <span style="font-size:10px">&nbsp;'.$_REQUEST['finicio'].' <strong>a</strong> '.$_REQUEST['fhasta'].'</span></td>
  <td width="25%" colspan="" align="center"></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td align="center" width="50%" class="thheadecolum"><strong>REGISTRO DE IVA: </strong>'.$nrc.'</td>
  <td align="center" width="50%" class="thheadecolum"><strong>NIT:</strong>'.$nit.'</td>
</tr>
<tr>
  <td align="center" colspan="" class="thheadecolum"><strong>GIRO: </strong>'.$giro.'</td>
  <td align="center" colspan="" class="thheadecolum"><strong>PERIODO TRIBUTARIO:</strong> '.$nm.' <strong>de</strong> '.$ani.'&nbsp;&nbsp;</td>
</tr>
<tr>
  <td align="center" colspan="" class="td2"><strong>&nbsp;</strong></td>
  <td align="center" colspan="" class="td2"><strong>&nbsp;</strong></td>
</tr>
</table>


<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="customers">
  <tr>
    <th width="53" align="center" class="thcolum">N°</th>
    <th width="68" align="center" class="thcolum">FECHA</th>
    <th width="82" align="center" class="thcolum">No. DOCUMENTO</th>
    <th width="252" align="center" class="thcolum">NOMBRE DEL CLIENTE</th>
    <th width="87" align="center" class="thcolum">NUMERO DE REGISTRO</th>
	<th width="90" align="center" class="thcolum">VENTAS NO SUJETAS</th>
    <th width="90" align="center" class="thcolum">VENTAS EXENTAS</th>
    <th width="85" align="center" class="thcolum">VENTAS GRAVADAS</th>
    <th width="85" align="center" class="thcolum">DEBITO FISCAL</th>
	<th width="85" align="center" class="thcolum">IVA RETENIDO</th>
	<th width="85" align="center" class="thcolum">IVA PERCIBIDO</th>
    <th width="90" align="center" class="thcolum">VENTAS TOTALES</th>
  </tr>';

  //seleccionando facturas
  $j=1;



  $subt=0;
  $sube =0;



		$subtotal = 0;

		$ventnosuje=0;
		$venexentas = 0;
		$ventatotal = 0;
		$ventagrabadas = 0;
		$debitofiscal=0;
		$ivaretenido=0;
		$ivapercibido=0;
  	//$sql="select * from facturas a, expedientes b where a.fecha between '$desde' and '$hasta' and a.idExpediente=b.idExpediente and a.tipo_fac=2 order by facNum asc";
	$sql = $CI->db->query("SELECT a.* FROM facturas as a where a.fecha between '".$desde."' AND '".$hasta."' AND  MD5(a.Idempresa)='".$idempresa."'  AND a.tipo_fac=1 AND a.estado <> 3 order by facNum asc");
	foreach($sql->result_array() as $r){

		//datos de factura
		$idf=$r['idFactura'];
		$numeroFactura=$r['facNum'];
		$nombreCliente=$r['cliente'];
		$nreg=$r['nrc'];

		$fecha=$r['fecha'];
		$est=$r['estado'];

		$ventas_no_sujetas = $r['ventas_no_sujetas'];
		$ventas_excentas = $r['ventas_excentas'];
		$valor_total = $r['valor_total'];
	    $credito_fiscal = $r['credito_fiscal'];

		$retencion = $r['retencion'];
		$percepcion = $r['percepcion'];

		$monto=$r['monto'];

		//VENTA no sujetas
		$ventnosuje = $ventnosuje + $ventas_no_sujetas;
		//VENTAS EXENTAS
		$venexentas = $venexentas + $ventas_excentas;
		// ventas gravadas
		$ventagrabadas = $ventagrabadas + $monto;
		// Debito fiscal
		$debitofiscal = $debitofiscal + $credito_fiscal;
	    // venta total
		$ventatotal = $ventatotal + $valor_total;
		// IVA RETENIDO
		$ivaretenido = $ivaretenido+$retencion;
		// IVA PERCIBIDO
		$ivapercibido = $ivapercibido +$percepcion;
		//calcular total gravado sin iva
		$tsin=$ventatotal/1.13;
		//calcular iva
		$iva=$ventatotal-$tsin;



		 $html.=' <tr>
			<td align="center" class="tdcolum">'.$j.'</td>
			<td align="center" class="tdcolum">'.date("d-m-Y",strtotime($fecha)).'</td>
			<td align="center" class="tdcolum">'.$numeroFactura.'</td>';

		$html .='<td align="left" class="tdcolum">'.$nombreCliente.'</td>';
		$html .='<td align="center" class="tdcolum">'.$nreg.'</td>';

		$html .='
			<td align="right" class="tdcolum">'.number_format($ventas_no_sujetas,2).'</td>
			<td align="right" class="tdcolum">'.number_format($ventas_excentas,2).'</td>
			<td align="right" class="tdcolum">'.number_format($monto,2).'</td>
			<td align="right" class="tdcolum">'.number_format($credito_fiscal,2).'</td>
			<td align="right" class="tdcolum">'.number_format($retencion,2).'</td>
			<td align="right" class="tdcolum">'.number_format($percepcion,2).'</td>
			<td align="right" class="tdcolum">'.number_format($valor_total,2).'</td>
		  </tr>';

	//correlativo
	$j++;
	//limpiando subtotales
	$sub=0;
	$sube=0;
	$subtotal=0;
	//limpiando variables de factura
	$idf="";
	$numeroFactura="";
	$nombreCliente="";
	$nreg="";
	}

  $html .='<tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right" class="tdcolum">&nbsp;</td>
    <td align="right" class="tdcolum">&nbsp;</td>
    <td align="right" class="tdcolum">&nbsp;</td>
	<td align="right" class="tdcolum">&nbsp;</td>
	<td align="right" class="tdcolum">&nbsp;</td>
	<td align="right" class="tdcolum">&nbsp;</td>
		<td align="right" class="tdcolum">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="center" class="thcolum"><strong>SUMAS   -----------------------------------&gt; </<strong>strong></td>
	<td align="right" class="tdcolum">$&nbsp;&nbsp;<strong>'.number_format($ventnosuje,2).'</strong></td>
    <td align="right" class="tdcolum">$&nbsp;&nbsp;<strong>'.number_format($venexentas,2).'</strong></td>
    <td align="right" class="tdcolum">$&nbsp;&nbsp;<strong>'.number_format($ventagrabadas,2).'</strong></td>
	<td align="right" class="tdcolum">$&nbsp;&nbsp;<strong>'.number_format($debitofiscal,2).'</strong></td>
	<td align="right" class="tdcolum">$&nbsp;&nbsp;<strong>'.number_format($ivaretenido,2).'</strong></td>
	<td align="right" class="tdcolum">$&nbsp;&nbsp;<strong>'.number_format($ivapercibido,2).'</strong></td>
    <td align="right" class="tdcolum">$&nbsp;&nbsp;<strong>'.number_format($ventatotal,2).'</strong></td>
  </tr>
  </table>
  <br>
  <table width="50%" border="0" align="right" cellpadding="0" cellspacing="0" id="" style="font-size:11px;  border: 1px solid #ddd;
  padding: 3px; ">
<tr>
  <td colspan="3" align="center" style="padding-top: 9px; padding-bottom: 9px;text-align: left;background-color: #4CAF50; color: white; "><strong>CUADRO RESUMEN</strong></td>
 </tr>
  <tr>
    <td  align="left" width="20%"  class="tdnwe">VENTAS NETAS:</td>
    <td align="center" width="20%"  class="tdnwe">$</td>
    <td align="right"  width="20%"  class="tdnwe">'.number_format($ventagrabadas, 2).'</td>
  </tr>
  <tr>
    <td  align="left" width="20%"  class="tdnwe">IVA:</td>
    <td align="center" width="20%"  class="tdnwe">$</td>
    <td align="right"  width="20%"  class="tdnwe">'.number_format($debitofiscal,2).'</td>
  </tr>
  <tr>
      <td  align="left" width="20%"  class="tdnwe">IVA retenido:</td>
      <td align="center" width="20%"  class="tdnwe">$</td>
      <td align="right"  width="20%"  class="tdnwe">'.number_format($ivaretenido,2).'</td>
    </tr>
	<tr>
      <td  align="left" width="20%"  class="tdnwe">IVA percibido:</td>
      <td align="center" width="20%"  class="tdnwe">$</td>
      <td align="right"  width="20%"  class="tdnwe">'.number_format($ivapercibido,2).'</td>
    </tr>
  <tr>
    <td  align="left" width="20%"  class="tdnwe">VENTAS NO SUJETAS:</td>
    <td align="center" width="20%"  class="tdnwe">$</td>
    <td align="right" width="20%"   class="tdnwe">'.number_format($ventnosuje,2).'</td>
  </tr>
    <tr>
    <td  align="left" width="20%"  class="tdnwe">VENTAS EXCENTAS:</td>
    <td align="center" width="20%"  class="tdnwe">$</td>
    <td align="right"  width="20%"  class="tdnwe">'.number_format($venexentas,2).'</td>
  </tr>
  <tr>
    <td align="left" width="20%"  class="tdnwe"><strong>VENTA TOTAL:</strong></td>
    <td align="center" width="20%"  class="tdnwe"><strong>$</strong></td>
    <td align="right"  width="20%"  class="tdnwe"><strong>'.number_format($ventatotal,2).'</strong></td>
  </tr>
</table>
<br>
<br>
<table width="50%" border="0" align="right"  cellpadding="0" cellspacing="0" id="">
<tr>
  <td align="right" style="font-size:11px;" class="tdcolum style2">DOCUMENTOS ANULADOS: </td>
<td style="font-size:11px;" colspan="6" align="left" class="tdcolum">&nbsp;
';
// $anu = $CI->db->query('SELECT * FROM facturas where estado=2');
// foreach($anu->result_array() as $row){
 // $html.=' '.$row['facNum'].' ,';
   // }
   $anu = $CI->db->query('SELECT * FROM facturas where estado=1 AND tipo_fac = 1 AND fecha BETWEEN "'.$desde.'" AND "'.$hasta.'"');
    foreach($anu->result_array() as $row){
     $html.=' '.$row['facNum'].' ,';
       }

$html.='
    </td>
  </tr>
  </table>
  ';
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
//$mpdf->addPage('L');
$mpdf->WriteHTML($html);
$mpdf->SetFooter($foter);
$mpdf->Output();
exit;
?>
