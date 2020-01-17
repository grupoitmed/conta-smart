<?
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
// para saber el mes
$desde = $_REQUEST['finicio'];
$hasta = $_REQUEST['fhasta'];

// para consultar los registro del mes que se esta
// consultando
$fdesde = date('Y-m-d',strtotime($_REQUEST['finicio']));
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


$html='
<style>
#customers {
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
	font-size:10px;
}

.thcolum{
	font-size:9px;
}
.thheadecolum{
	font-size:11px
}
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td width="25%" colspan="" align="left"><img alt="" src="'.base_url().'assets/img/hospital.png" width="100"><br>&nbsp;</td>
   <td width="50%" colspan="" align="center" class="td2"><span class="style1">LIBRO DE VENTAS A CONSUMIDOR FINAL</span><br>
   <strong>'.$razonsocial.'</strong>
   <br><span style="font-size:10px">&nbsp;'.$desde.' <strong>a</strong> '.$hasta.'</span></td>
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
    <th width="5%" align="center" class="thcolum">N°</th>
    <th width="15%" align="center" class="thcolum">FECHA</th>
    <th width="15%" align="center" class="thcolum">DEL N°</th>
    <th width="15%" align="center" class="thcolum">AL N°</th>
    <th width="10%" align="center" class="thcolum">VENTAS NO SUJETAS</th>
    <th width="10%" align="center" class="thcolum">VENTAS EXENTAS</th>
    <th width="10%" align="center" class="thcolum">VENTAS GRAVADAS</th>
	<th width="9%" align="center" class="thcolum">IVA RETENIDO</th>
	<th width="10%" align="center" class="thcolum">IVA PERCIBIDO</th>
	<th width="10%"  align="center" class="thcolum">DEBITO FISCAL</th>
    <th width="10%" align="center" class="thcolum">VENTAS TOTALES</th>
  </tr>

  ';
  $correlarivo = 1;
  $Tventas_no_sujetas = 0;
  $Texento = 0;
  $Tmonto = 0;
  $Ttotal = 0;
  $Tpercepcion = 0;
  $Tretencion = 0;
  $Tiva = 0;
  $sql = $CI->db->query("SELECT fecha,estado FROM facturas WHERE tipo_fac = 2 AND fecha BETWEEN '".$fdesde."' AND '".$fhasta."' AND estado<>3 AND MD5(idempresa) = '".$idempresa."' GROUP BY fecha ORDER BY fecha ASC ");
  foreach($sql->result_array() as $r){

    $sql1 = $CI->db->query("SELECT facNum,estado FROM facturas WHERE tipo_fac = 2 AND fecha = '".$r['fecha']."' AND estado<>3 AND MD5(idempresa) = '".$idempresa."' ORDER BY facNum ASC LIMIT 1");
    foreach($sql1->result_array() as $r1){
      $factura_inicial = $r1['facNum'];
    }
    $sql2 = $CI->db->query("SELECT facNum,estado FROM facturas WHERE tipo_fac = 2 AND fecha = '".$r['fecha']."' AND estado<>3 AND MD5(idempresa) = '".$idempresa."' ORDER BY facNum DESC LIMIT 1");
    foreach($sql2->result_array() as $r2){
      $factura_final = $r2['facNum'];
    }
    $sql3 = $CI->db->query("SELECT
		estado,
      SUM(ventas_excentas) ventas_excentas,
      SUM(valor_total) valor_total,
      SUM(monto) monto,
      SUM(ventas_no_sujetas) ventas_no_sujetas,
      SUM(credito_fiscal) credito_fiscal,
	  SUM(retencion) retencion,
	  SUM(percepcion) percepcion
	  FROM  facturas WHERE tipo_fac = 2 AND fecha = '".$r['fecha']."' AND estado=0 AND MD5(idempresa) = '".$idempresa."'");
    foreach($sql3->result_array() as $r3){
      $exento = $r3['ventas_excentas'];
      $total = $r3['valor_total'];
      $monto = $r3['monto'];
      $ventas_no_sujetas = $r3['ventas_no_sujetas'];
      $iva = $r3['credito_fiscal'];
	  $retencion = $r3['retencion'];
	  $percepcion = $r3['percepcion'];
    }

    $html.='
    <tr>
      <td  align="center" class="tdcolum">'.$correlarivo.'</td>
      <td  align="center" class="tdcolum">'.date('d-m-Y', strtotime($r['fecha'])).'</td>
      <td  align="center" class="tdcolum">'.$factura_inicial.'</td>
      <td  align="center" class="tdcolum">'.$factura_final.'</td>
      <td  align="right" class="tdcolum">$'.number_format($ventas_no_sujetas,2).'</td>
      <td  align="right" class="tdcolum">$'.number_format($exento,2).'</td>
      <td  align="right" class="tdcolum">$'.number_format($monto,2).'</td>
	  <td  align="right" class="tdcolum">$'.number_format($retencion,2).'</td>
	  <td  align="right" class="tdcolum">$'.number_format($percepcion,2).'</td>
	  <td  align="right" class="tdcolum">$'.number_format($iva,2).'</td>
      <td  align="right" class="tdcolum">$'.number_format($total,2).'</td>
    </tr>
    ';
    $correlarivo += 1;
    $Tventas_no_sujetas += $ventas_no_sujetas;
    $Texento += $exento;
    $Tmonto += $monto;
    $Ttotal += $total;
	$Tretencion += $retencion;
	$Tpercepcion += $percepcion;
    $Tiva += $iva;
    $VENTA_TOTAL = $Tiva + $Tmonto;

  }
  $totales = 0;
  $totales = $Tmonto - $Tiva;
  $html.='
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <th colspan="2" style="font-size:9" align="center" class="td2" >VENTAS TOTALES -----------&gt;</th>
    <td align="right" class="tdcolum"><strong>$'.number_format($Tventas_no_sujetas,2).'</strong></td>
    <td align="right" class="tdcolum"><strong>$'.number_format($Texento,2).'</strong></td>
    <td align="right" class="tdcolum"><strong>$'.number_format($Tmonto,2).'</strong></td>
	<td align="right" class="tdcolum"><strong>$'.number_format($Tretencion,2).'</strong></td>
	<td align="right" class="tdcolum"><strong>$'.number_format($Tpercepcion,2).'</strong></td>
	<td align="right" class="tdcolum"><strong>$'.number_format($Tiva,2).'</strong></td>
    <td align="right" class="tdcolum"><strong>$'.number_format($Ttotal,2).'</strong></td>
  </tr>
  </table>
  <br>
  <table width="50%" border="0" align="right" cellpadding="0" cellspacing="0" id="" style="font-size:9px;  border: 1px solid #ddd;
    padding: 3px; ">
  <tr>
    <td colspan="3" align="center" style=" font-size:12px; padding-top: 9px; padding-bottom: 9px;text-align: left;background-color: #4CAF50; color: white; "><strong>CUADRO RESUMEN</strong></td>
   </tr>
     <tr>
      <td  align="left" width="20%"  class=""></td>
      <td align="center" width="20%"  class=""></td>
      <td align="right"  width="20%"  class=""></td>
    </tr>
    <tr>
      <td  align="left" width="20%"  class="tdnwe">VENTAS NETAS:</td>
      <td align="center" width="20%"  class="tdnwe">$</td>
      <td align="right"  width="20%"  class="tdnwe">'.number_format($totales,2).'</td>
    </tr>
    <tr>
      <td  align="left" width="20%"  class="tdnwe">IVA:</td>
      <td align="center" width="20%"  class="tdnwe">$</td>
      <td align="right"  width="20%"  class="tdnwe">'.number_format($Tiva,2).'</td>
    </tr>
	<tr>
      <td  align="left" width="20%"  class="tdnwe">IVA RETENIDO:</td>
      <td align="center" width="20%"  class="tdnwe">$</td>
      <td align="right"  width="20%"  class="tdnwe">'.number_format($Tretencion,2).'</td>
    </tr>
	<tr>
      <td  align="left" width="20%"  class="tdnwe">IVA PERCIBIDO:</td>
      <td align="center" width="20%"  class="tdnwe">$</td>
      <td align="right"  width="20%"  class="tdnwe">'.number_format($Tpercepcion,2).'</td>
    </tr>
    <tr>
      <td  align="left" width="20%"  class="tdnwe">VENTAS NO SUJETAS:</td>
      <td align="center" width="20%"  class="tdnwe">$</td>
      <td align="right" width="20%"   class="tdnwe">'.number_format($Tventas_no_sujetas,2).'</td>
    </tr>
      <tr>
      <td  align="left" width="20%"  class="tdnwe">VENTAS EXCENTAS:</td>
      <td align="center" width="20%"  class="tdnwe">$</td>
      <td align="right"  width="20%"  class="tdnwe">'.number_format($Texento,2).'</td>
    </tr>
    <tr>
      <td align="left" width="20%"  class="tdnwe"><strong>VENTA TOTAL:</strong></td>
      <td align="center" width="20%"  class="tdnwe"><strong>$</strong></td>
      <td align="right"  width="20%"  class="tdnwe"><strong>'.number_format($Ttotal,2).'</strong></td>
    </tr>
  </table>
    <br>
    <table width="50%" border="0" align="right"  cellpadding="0" cellspacing="0" id="">
    <tr>
      <td align="right" style="font-size:11px;" class="tdcolum style2">DOCUMENTOS ANULADOS: </td>
    <td style="font-size:11px;" colspan="6" align="left" class="tdcolum">&nbsp;
    ';
    $anu = $CI->db->query('SELECT * FROM facturas where estado=1 AND tipo_fac = 2 AND fecha BETWEEN "'.$fdesde.'" AND "'.$fhasta.'"');
    foreach($anu->result_array() as $row){
     $html.=' '.$row['facNum'].' ,';
       }

    $html.='
        </td>
      </tr>
      </table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center">
</p>
<p>&nbsp;</p>

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
// $mpdf->addPage('L');
$mpdf->WriteHTML($html);
$mpdf->SetFooter($foter);
$mpdf->Output();
exit;
// echo $html;
?>
