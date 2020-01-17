<?php defined('BASEPATH') OR exit('No direct script access allowed');

include base_url()."data/dataBase.php";
global $DATA;

mysql_query("SET NAMES 'utf8'");

$montos =  $_POST['monto'];
$idtipo = $_POST['idtipo'];

$procuraduria = $_POST['procuraduria'];
$htarde = $_POST['htarde'];
$oremu = $_POST['oremu'];

$cantidadhd = $_POST['cantidadhd'];
$costohd = $_POST['costohd'];
$cantidadhn = $_POST['cantidadhn'];
$costohn = $_POST['costohn'];

$hextra = $cantidadhd*$costohd;
$hextrae = $cantidadhn*$costohn;


$vacaciones = $_POST['vacaciones'];
$asuetos = $_POST['asuetos'];

/*** INCAPACIDADES ***/
$diasin = $_POST['diasin'];
$month = date("m");
$year = date("Y");
$first_of_month = mktime (0,0,0,$month,1,$year);
$maxdays = date('t',$first_of_month);

$tdia=$montos/30;
$incapacidad=$tdia*$diasin;

$tincapacidad=number_format($incapacidad,2);

$isss25=$tincapacidad*0.25;
$tisss25=number_format($isss25,2);
/**********************************************************/

$monto1 = $_POST['monto1'];
$monto2 = $_POST['monto2'];
$monto3 = $_POST['monto3'];
$monto4 = $_POST['monto4'];

$idafp = $_POST['idafp'];
$idempleado = $_POST['idempleado'];


//MONTO +
//$monto=($montos+$vacaciones+$hextra+$hextrae+$asuetos+$oremu+$tisss25)-$tincapacidad;
$monto=($montos+$vacaciones+$hextra+$hextrae+$asuetos+$oremu)-$tincapacidad;

//ISSS 3%***********************
if($idafp==5 || $idafp==7){
	$isss=0;
}
else{
	if($monto>1000){
		$tisss=30;
		$isss=number_format($tisss,2);

		//Aporte Patrono ISSS
		$tisssp=1000*0.075;
		$isssp=number_format($tisssp,2);
	}
	else{
		$tisss=$monto*0.03;
		$isss=number_format($tisss,2);

		//Aporte Patrono ISSS 7.5%
		$tisssp=$monto*0.075;
		$isssp=number_format($tisssp,2);
	}
}



//APF*************************
//INPEP 7%
if($idafp==3 || $idafp==7){
	$tafp=$monto*0.07;
	$afp=number_format($tafp,2);

	//Aporte Patrono AFP 7%
	$tafpp=$monto*0.07;
	$afpp=number_format($tafpp,2);
}
//NO AFP
else if($idafp==4){
	$afp=0;

	//Aporte Patrono
	$afpp=0;
}
//NO AFP-ISSS
else if($idafp==5){
	$afp=0;

	//Aporte Patrono
	$afpp=0;
}
//IPSFA 6%
else if($idafp==6){
	$tafp=$monto*0.06;
	$afp=number_format($tafp,2);

	//Aporte Patrono AFP 6%
	$tafpp=$monto*0.06;
	$afpp=number_format($tafpp,2);
}
//CONFIA Y CRECER
else{
	$tafp=$monto*0.0725;
	$afp=number_format($tafp,2);

	//Aporte Patrono AFP 6.75%
	$tafpp=$monto*0.0775;
	$afpp=number_format($tafpp,2);
}
/***********************************/

//Total descuentos
$tdes=$tisss+$tafp;

//Monto a Aplicar Renta
$tmonto=$monto-$tdes;
//$tmonto=number_format($tmontot,2);

if ($idtipo==1 and $idafp==5){
$renta=$tmonto*0.10;
}
elseif($idtipo==1){
//TRAMO 1
$stRetenciones1="select * from retenciones where idretencion=1";
$rsRetenciones1=$DATA->Execute($stRetenciones1);
$rsRetenciones1->MoveLast();
$hasta1=$rsRetenciones1->fields['hasta'];

//TRAMO 2
$stRetenciones2="select * from retenciones where idretencion=2";
$rsRetenciones2=$DATA->Execute($stRetenciones2);
$rsRetenciones2->MoveLast();
$desde2=$rsRetenciones2->fields['desde'];
$hasta2=$rsRetenciones2->fields['hasta'];
$aplicar2=$rsRetenciones2->fields['aplicar'];
$exceso2=$rsRetenciones2->fields['exceso'];
$cfija2=$rsRetenciones2->fields['cfija'];

//TRAMO 3
$stRetenciones3="select * from retenciones where idretencion=3";
$rsRetenciones3=$DATA->Execute($stRetenciones3);
$rsRetenciones3->MoveLast();
$desde3=$rsRetenciones3->fields['desde'];
$hasta3=$rsRetenciones3->fields['hasta'];
$aplicar3=$rsRetenciones3->fields['aplicar'];
$exceso3=$rsRetenciones3->fields['exceso'];
$cfija3=$rsRetenciones3->fields['cfija'];

//TRAMO 4
$stRetenciones4="select * from retenciones where idretencion=4";
$rsRetenciones4=$DATA->Execute($stRetenciones4);
$rsRetenciones4->MoveLast();
$desde4=$rsRetenciones4->fields['desde'];
$hasta4=$rsRetenciones4->fields['hasta'];
$aplicar4=$rsRetenciones4->fields['aplicar'];
$exceso4=$rsRetenciones4->fields['exceso'];
$cfija4=$rsRetenciones4->fields['cfija'];


if($tmonto<=$hasta1){
	$renta=0;
	//$renta=1;
}
if($tmonto>=$desde2 and $tmonto<=$hasta2){
	$renta=(($tmonto-$exceso2)*$aplicar2)+$cfija2;
	//$renta=2;
}
if($tmonto>=$desde3 and $tmonto<=$hasta3){
	$renta=(($tmonto-$exceso3)*$aplicar3)+$cfija3;
	//$renta=3;
}
if($tmonto>=$desde4){
	$renta=(($tmonto-$exceso4)*$aplicar4)+$cfija4;
	//$renta=4;
}

}
//RECALCULO DE JUNIO
elseif($idtipo==4){

//REMUNERACIONES GRAVADAS (Hasta Junio)
$fini=date('Y').'-01-01';
$ffin=date('Y').'-06-01';

$stMonto1r="select SUM(tmonto) as sumMonto from planillas_permanentes where idempleado=? and DATE(desde) BETWEEN ? and ? and tipoplanilla=0";
$rsMonto1r=$DATA->Execute($stMonto1r,array($idempleado,$fini,$ffin));
$rsMonto1r->MoveLast();
$sumGravadas=$rsMonto1r->fields['sumMonto'];

/***********************/
//TRAMO 1
$stRetenciones1="select * from retenciones where idretencion=13";
$rsRetenciones1=$DATA->Execute($stRetenciones1);
$rsRetenciones1->MoveLast();
$hasta1=$rsRetenciones1->fields['hasta'];

//TRAMO 2
$stRetenciones2="select * from retenciones where idretencion=14";
$rsRetenciones2=$DATA->Execute($stRetenciones2);
$rsRetenciones2->MoveLast();
$desde2=$rsRetenciones2->fields['desde'];
$hasta2=$rsRetenciones2->fields['hasta'];
$aplicar2=$rsRetenciones2->fields['aplicar'];
$exceso2=$rsRetenciones2->fields['exceso'];
$cfija2=$rsRetenciones2->fields['cfija'];

//TRAMO 3
$stRetenciones3="select * from retenciones where idretencion=15";
$rsRetenciones3=$DATA->Execute($stRetenciones3);
$rsRetenciones3->MoveLast();
$desde3=$rsRetenciones3->fields['desde'];
$hasta3=$rsRetenciones3->fields['hasta'];
$aplicar3=$rsRetenciones3->fields['aplicar'];
$exceso3=$rsRetenciones3->fields['exceso'];
$cfija3=$rsRetenciones3->fields['cfija'];

//TRAMO 4
$stRetenciones4="select * from retenciones where idretencion=16";
$rsRetenciones4=$DATA->Execute($stRetenciones4);
$rsRetenciones4->MoveLast();
$desde4=$rsRetenciones4->fields['desde'];
$hasta4=$rsRetenciones4->fields['hasta'];
$aplicar4=$rsRetenciones4->fields['aplicar'];
$exceso4=$rsRetenciones4->fields['exceso'];
$cfija4=$rsRetenciones4->fields['cfija'];

if($sumGravadas<=$hasta1){
	$rentar=0;
}
if($sumGravadas>=$desde2 and $sumGravadas<=$hasta2){
	$rentar=(($sumGravadas-$exceso2)*$aplicar2)+$cfija2;
}
if($sumGravadas>=$desde3 and $sumGravadas<=$hasta3){
	$rentar=(($sumGravadas-$exceso3)*$aplicar3)+$cfija3;
}
if($sumGravadas>=$desde4){
	$rentar=(($sumGravadas-$exceso4)*$aplicar4)+$cfija4;
}

//RETENCIONES (Hasta Mayo)
$finir=date('Y').'-01-01';
$ffinr=date('Y').'-05-01';

$stMonto1re="select sum(renta) as sumRenta from planillas_permanentes where idempleado=? and DATE(desde) BETWEEN ? and ? and tipoplanilla=0";
$rsMonto1re=$DATA->Execute($stMonto1re,array($idempleado,$finir,$ffinr));
$rsMonto1re->MoveLast();
$sumRenta=$rsMonto1re->fields['sumRenta'];

//RENTA
$trentar=$rentar-$sumRenta;

if($trentar<0){$renta=0;}
else{$renta=$trentar;}

}
//RECALCULO DE DICIEMBRE
elseif($idtipo==5){

//REMUNERACIONES GRAVADAS (Hasta Diciembre)
$fini=date('Y').'-01-01';
$ffin=date('Y').'-12-01';

$stMonto1r="select SUM(tmonto) as sumMonto from planillas_permanentes where idempleado=? and DATE(desde) BETWEEN ? and ? and tipoplanilla=0";
$rsMonto1r=$DATA->Execute($stMonto1r,array($idempleado,$fini,$ffin));
$rsMonto1r->MoveLast();
$sumGravadas=$rsMonto1r->fields['sumMonto'];

/***********************/
//TRAMO 1
$stRetenciones1="select * from retenciones where idretencion=17";
$rsRetenciones1=$DATA->Execute($stRetenciones1);
$rsRetenciones1->MoveLast();
$hasta1=$rsRetenciones1->fields['hasta'];

//TRAMO 2
$stRetenciones2="select * from retenciones where idretencion=18";
$rsRetenciones2=$DATA->Execute($stRetenciones2);
$rsRetenciones2->MoveLast();
$desde2=$rsRetenciones2->fields['desde'];
$hasta2=$rsRetenciones2->fields['hasta'];
$aplicar2=$rsRetenciones2->fields['aplicar'];
$exceso2=$rsRetenciones2->fields['exceso'];
$cfija2=$rsRetenciones2->fields['cfija'];

//TRAMO 3
$stRetenciones3="select * from retenciones where idretencion=19";
$rsRetenciones3=$DATA->Execute($stRetenciones3);
$rsRetenciones3->MoveLast();
$desde3=$rsRetenciones3->fields['desde'];
$hasta3=$rsRetenciones3->fields['hasta'];
$aplicar3=$rsRetenciones3->fields['aplicar'];
$exceso3=$rsRetenciones3->fields['exceso'];
$cfija3=$rsRetenciones3->fields['cfija'];

//TRAMO 4
$stRetenciones4="select * from retenciones where idretencion=20";
$rsRetenciones4=$DATA->Execute($stRetenciones4);
$rsRetenciones4->MoveLast();
$desde4=$rsRetenciones4->fields['desde'];
$hasta4=$rsRetenciones4->fields['hasta'];
$aplicar4=$rsRetenciones4->fields['aplicar'];
$exceso4=$rsRetenciones4->fields['exceso'];
$cfija4=$rsRetenciones4->fields['cfija'];

if($sumGravadas<=$hasta1){
	$rentar=0;
}
if($sumGravadas>=$desde2 and $sumGravadas<=$hasta2){
	$rentar=(($sumGravadas-$exceso2)*$aplicar2)+$cfija2;
}
if($sumGravadas>=$desde3 and $sumGravadas<=$hasta3){
	$rentar=(($sumGravadas-$exceso3)*$aplicar3)+$cfija3;
}
if($sumGravadas>=$desde4){
	$rentar=(($sumGravadas-$exceso4)*$aplicar4)+$cfija4;
}

//RETENCIONES (Hasta Noviembre)
$finir=date('Y').'-01-01';
$ffinr=date('Y').'-11-01';

$stMonto1re="select sum(renta) as sumRenta from planillas_permanentes where idempleado=? and DATE(desde) BETWEEN ? and ? and tipoplanilla=0";
$rsMonto1re=$DATA->Execute($stMonto1re,array($idempleado,$finir,$ffinr));
$rsMonto1re->MoveLast();
$sumRenta=$rsMonto1re->fields['sumRenta'];

//RENTA
$trentar=$rentar-$sumRenta;

if($trentar<0){$renta=0;}
else{$renta=$trentar;}


}


$drentas=$renta+$tdes;
//$tdescuentos=$procuraduria+$htarde+$monto1+$monto2+$monto3+$monto4+$afp+$isss+$renta+$tincapacidad;
$tdescuentos=$procuraduria+$htarde+$monto1+$monto2+$monto3+$monto4+$afp+$isss+$renta;
$mTotal=$monto-$tdescuentos;

$descuentos=number_format($tdescuentos,2);
$total=number_format($mTotal,2);
$trenta=number_format($renta,2);

echo json_encode(array("tdescuentos"=>$descuentos,"tdescuentoss"=>$tdescuentos,"mtotal"=>$total,"ipliquido"=>$mTotal,"ipdevengado"=>$monto,"isss"=>$isss,"afp"=>$afp,"renta"=>$trenta,"tmonto"=>$tmonto,"afpp"=>$afpp,"isssp"=>$isssp,"hextra"=>$hextra,"hextrae"=>$hextrae,"tincapacidad"=>$tincapacidad,"isss25"=>$tisss25));
?>
