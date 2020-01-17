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
// para saber el mes
$desde = $_REQUEST['finicio'];
$hasta = $_REQUEST['fhasta'];
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
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td width="25%" colspan="" align="left"><img alt="" src="'.base_url().'assets/img/hospital.png" width="100"><br>&nbsp;</td>
   <td width="50%" colspan="" align="center" class="td2"><span class="style1">LIBRO DE COMPRAS</span><br><strong>'.$razonsocial.'</strong><br>&nbsp;</td>
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
    <td style="font-size:12px" align="center" class="td2"><strong>PERIODO TRIBUTARIO:</strong>&nbsp;&nbsp;'.$nm." <strong>de</strong> ".$ani.'</td>
  </tr>
</table>
  <br>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" id="customers">
  <tr>
    <td class="td">&nbsp;</td>
    <td class="td">&nbsp;</td>
    <td class="td">&nbsp;</td>
    <td class="td">&nbsp;</td>
    <td class="td">&nbsp;</td>
    <th align="center" class="td" colspan="2">COMPRAS EXENTAS</th>
    <th align="center" class="td" colspan="2">COMPRAS GRAVADAS</th>
    <td class="td">&nbsp;</td>
    <td class="td">&nbsp;</td>
    <td class="td">&nbsp;</td>
    <td class="td">&nbsp;</td>
    <td class="td">&nbsp;</td>
  </tr>
  <tr>
    <th width="25" align="center" class="td">#</th>
    <th width="50" align="center" class="td">FECHA</th>
    <th width="75" align="center" class="td">No. DOCUMENTO </th>
    <th width="200" align="center" class="td"> NOMBRE DEL PROVEEDOR </th>
    <th width="50" align="center" class="td">NUMERO DE REGISTRO </th>
    <th width="100" align="center" class="td">INTERNAS</th>
    <th width="100" align="center" class="td">IMPORTACION</th>
    <th width="100" align="center" class="td">INTERNAS</th>
    <th width="100" align="center" class="td">IMPORTACION</th>
    <th width="100" align="center" class="td">FOVIAL</th>
    <th width="100" align="center" class="td">COATRANS</th>
    <th width="100" align="center" class="td">CREDITO FISCAL</th>
    <th width="100" align="center" class="td">PERCEPCION</th>
    <th width="100" align="center" class="td">CESC</th>
    <th width="100" align="center" class="td">TOTAL DE COMPRA</th>
  </tr>

  ';
  //seleccionando compras
  $j=1;
   //	$fecha = $ani."-".$mes."-".$i;
	//consulta facturas
  $Tt1 = 0;
  $Tt2 = 0;
  $Tt3 = 0;
  $Tt4 = 0;
  $Tr5 = 0;
  $Tr6 = 0;
  $Tr7 = 0;
  $Tr8 = 0;
  $cesc = 0;
  $Tr9 = 0;
	// $sql = $CI->db->query("SELECT * FROM compras a, proveedores b 
	// WHERE a.idproveedor = b.idproveedor 
	// AND a.idempresa = '".$idempresa."' 
	// AND MONTH(a.fecha_tributaria) = '".$mdesde."' 
	// AND YEAR(a.fecha_tributaria) = '".$adesde."' AND a.status = 0");
	$sql = $CI->db->query("SELECT * FROM compras a, proveedores b 
	WHERE a.idproveedor = b.idproveedor 
	AND MD5(a.idempresa) = '".$idempresa."'
	AND MONTH(a.fecha_tributaria) BETWEEN '".$mdesde."' AND '".$mhasta."'
	AND YEAR(a.fecha_tributaria) BETWEEN '".$adesde."' AND '".$ahasta."' 
	AND a.status = 0 ORDER BY fechacompra ASC");
	foreach($sql->result_array() as $r){
		if(($r['gravex']==2) && ($r['tipo']==1))
	{
	    $t1=$r['monto'];
	    $t2=0;
	    $t3=0;
	    $t4=0;
	}
	if(($r['gravex']==2) && ($r['tipo']==2))
	{
	    $t2=$r['monto'];
	    $t1=0;
	    $t3=0;
	    $t4=0;
	}
	if(($r['gravex']==1) && ($r['tipo']==1))
	{
	    $t3=$r['monto'];
	    $t1=0;
	    $t2=0;
	    $t4=0;
	}
	if(($r['gravex']==1) && ($r['tipo']==2))
	{
	    $t4=$r['total'];
	    $t1=0;
	    $t2=0;
	    $t3=0;
	}

$html.='

	<tr >
    <td style="font-size:20px" width="53" align="center" class="td">'.$j.'</td>
    <td style="font-size:20px" width="68" align="center" class="td">'.$r['fechacompra'].'</td>
    <td style="font-size:20px" width="82" align="center" class="td">'.$r['documento'].'</td>
    <td style="font-size:15px; text-transform: uppercase;" width="252" align="left" class="td">'.$r['proveedor'].'</td>
    <td style="font-size:20px" width="87" align="center" class="td">'.$r['nrc'].'</td>
    <td style="font-size:20px" width="90" align="right" class="td">$'.number_format($t1,2).'</td>
    <td style="font-size:20px" width="85" align="right" class="td">$'.number_format($t2,2).'</td>
    <td style="font-size:20px" width="90" align="right" class="td">$'.number_format($t3,2).'</td>
    <td style="font-size:20px" width="90" align="right" class="td">$'.number_format($t4,2).'</td>
    <td style="font-size:20px" width="90" align="right" class="td">$'.number_format($r['fovial'],2).'</td>
    <td style="font-size:20px" width="90" align="right" class="td">$'.number_format($r['coatrans'],2).'</td>
    <td style="font-size:20px" width="90" align="right" class="td">$'.number_format($r['creditof'],2).'</td>
    <td style="font-size:20px" width="90" align="right" class="td">$'.number_format($r['percepcion'],2).'</td>
    <td style="font-size:20px" width="90" align="right" class="td">$'.number_format($r['cesc'],2).'</td>
    <td style="font-size:20px" width="90" align="right" class="td">$'.number_format($r['total'],2).'</td>
  </tr>

';

$Tt1 += $t1;
$Tt2 += $t2;
$Tt3 += $t3;
$Tt4 += $t4;
$Tr5 += $r['fovial'];
$Tr6 += $r['coatrans'];
$Tr7 += $r['creditof'];
$Tr8 += $r['percepcion'];
$cesc += $r['cesc'];
$Tr9 += $r['total'];
	$j++;

   }
   $html.='
   <tr>
   <td style="font-size:20px" colspan="5" align="center" class="td"><strong>TOTAL:</strong></td>
    <td style="font-size:20px" width="90" align="right" class="td"><strong>$'.number_format($Tt1,2).'</strong></td>
    <td style="font-size:20px" width="85" align="right" class="td"><strong>$'.number_format($Tt2,2).'</strong></td>
    <td style="font-size:20px" width="90" align="right" class="td"><strong>$'.number_format($Tt3,2).'</strong></td>
    <td style="font-size:20px" width="90" align="right" class="td"><strong>$'.number_format($Tt4,2).'</strong></td>
    <td style="font-size:20px" width="90" align="right" class="td"><strong>$'.number_format($Tr5,2).'</strong></td>
    <td style="font-size:20px" width="90" align="right" class="td"><strong>$'.number_format($Tr6,2).'</strong></td>
    <td style="font-size:20px" width="90" align="right" class="td"><strong>$'.number_format($Tr7,2).'</strong></td>
    <td style="font-size:20px" width="90" align="right" class="td"><strong>$'.number_format($Tr8,2).'</strong></td>
    <td style="font-size:20px" width="90" align="right" class="td"><strong>$'.number_format($cesc,2).'</strong></td>
    <td style="font-size:20px" width="90" align="right" class="td"><strong>$'.number_format($Tr9,2).'</strong></td>
  </tr>
   ';
    
	
	$compras_exentas_totales = $Tt1+$Tt2;
	$compras_gravadas_totales = $Tt3+$Tt4;
    $compras_totales = $Tt3+$Tt1;
    $otros_totales = $Tr5+$Tr6+$cesc;

   $html.='
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
      <td  align="left" width="20%"  class="tdnwe">COMPRAS EXCENTAS:</td>
      <td align="center" width="20%"  class="tdnwe">$</td>
      <td align="right"  width="20%"  class="tdnwe">'.number_format($compras_exentas_totales,2).'</td>
    </tr>
	<tr>
      <td  align="left" width="20%"  class="tdnwe">COMPRAS GRAVADAS:</td>
      <td align="center" width="20%"  class="tdnwe">$</td>
      <td align="right" width="20%"   class="tdnwe">'.number_format($compras_gravadas_totales,2).'</td>
    </tr>
    <tr>
      <td  align="left" width="20%"  class="tdnwe">COMPRAS NETAS:</td>
      <td align="center" width="20%"  class="tdnwe">$</td>
      <td align="right"  width="20%"  class="tdnwe">'.$compras_totales.'</td>
    </tr>
    <tr>
      <td  align="left" width="20%"  class="tdnwe">IVA:</td>
      <td align="center" width="20%"  class="tdnwe">$</td>
      <td align="right"  width="20%"  class="tdnwe">'.number_format($Tr7,2).'</td>
    </tr>
	<tr>
      <td  align="left" width="20%"  class="tdnwe">IVA RETENIDO:</td>
      <td align="center" width="20%"  class="tdnwe">$</td>
      <td align="right"  width="20%"  class="tdnwe">'.number_format($Tr8,2).'</td>
    </tr>
	<tr>
      <td  align="left" width="20%"  class="tdnwe">OTRAS PERCEPCIONES:</td>
      <td align="center" width="20%"  class="tdnwe">$</td>
      <td align="right"  width="20%"  class="tdnwe">'.number_format($otros_totales,2).'</td>
    </tr>
    <tr>
      <td align="left" width="20%"  class="tdnwe"><strong>TOTAL DE COMPRAS:</strong></td>
      <td align="center" width="20%"  class="tdnwe"><strong>$</strong></td>
      <td align="right"  width="20%"  class="tdnwe"><strong>'.number_format($Tr9,2).'</strong></td>
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
// $mpdf->addPage('L');
$mpdf->WriteHTML($html);
$mpdf->SetFooter($foter);
$mpdf->Output();
exit;
//echo $html;
 ?>
