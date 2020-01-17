function statement_loading(){
  var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="../assets/images/progress.gif" width="150" height="150"></div></div></div></div>';
  return mensaje;
}

/*****CARNET PERINATAL******/

function cargar_carnet(id) {
    $.ajax({
    url: 'Carnet_prenatal/cargar_carnet',
    type: "POST",
    data: {id:id},
    success: function(response) {
      $('#carnetPerinatal').html(response);
    }
  });

}

/*SAVE CLAP*/
function saveClap(){

  var idglas =$('#idglas').val();
  var ide =$('#ide').val();


  if($('input:radio[name="tbc"]:checked').val()){
    var tbc = $('input:radio[name="tbc"]:checked').val();
  }else {
    var tbc =0;
  }

  if($('input:radio[name="tbcp"]:checked').val()){
    var tbcp = $('input:radio[name="tbcp"]:checked').val();
  }else {
    var tbcp =0;
  }
  if($('input:radio[name="diabetes"]:checked').val()){
    var diabetes = $('input:radio[name="diabetes"]:checked').val();
  }else {
    var diabetes =0;
  }
  if($('input:radio[name="diabetesp"]:checked').val()){
    var diabetesp = $('input:radio[name="diabetesp"]:checked').val();
  }else {
    var diabetesp =0;
  }

  if($('input:radio[name="diabetesii"]:checked').val()){
    var diabetesii = $('input:radio[name="diabetesii"]:checked').val();
  }else {
    var diabetesii =0;
  }
  if ($('input:radio[name="diabetesg"]:checked').val()) {
    var diabetesg = $('input:radio[name="diabetesg"]:checked').val();
  } else {
    var diabetesg =0;
  }
  if ($('input:radio[name="hipertsion"]:checked').val()) {
    var hipertsion = $('input:radio[name="hipertsion"]:checked').val();
  } else {
    var hipertsion =0;
  }
  if ($('input:radio[name="hipertsionp"]:checked').val()) {
    var hipertsionp = $('input:radio[name="hipertsionp"]:checked').val();
  } else {
    var hipertsionp =0;
  }
  if ($('input:radio[name="pree"]:checked').val()) {
    var pree = $('input:radio[name="pree"]:checked').val();
  } else {
    var pree =0;
  }
  if ($('input:radio[name="preep"]:checked').val()) {
    var preep = $('input:radio[name="preep"]:checked').val();
  } else {
    var preep =0;
  }
  if ($('input:radio[name="eclampsia"]:checked').val()) {
    var eclampsia = $('input:radio[name="eclampsia"]:checked').val();
  } else {
    var eclampsia =0;
  }
  if ($('input:radio[name="eclampsiap"]:checked').val()) {
    var eclampsiap = $('input:radio[name="eclampsiap"]:checked').val();
  } else {
    var eclampsiap =0;
  }
  if ($('input:radio[name="otracm"]:checked').val()) {
    var otracm = $('input:radio[name="otracm"]:checked').val();
  } else {
    var otracm =0;
  }
  if ($('input:radio[name="otracmp"]:checked').val()) {
    var otracmp = $('input:radio[name="otracmp"]:checked').val();
  } else {
    var otracmp =0;
  }
  if ($('input:radio[name="cgenito"]:checked').val()) {
    var cgenito = $('input:radio[name="cgenito"]:checked').val();
  } else {
    var cgenito =0;
  }
  if ($('input:radio[name="infertilidad"]:checked').val()) {
    var infertilidad = $('input:radio[name="infertilidad"]:checked').val();
  } else {
    var infertilidad =0;
  }
  if ($('input:radio[name="cardiop"]:checked').val()) {
    var cardiop = $('input:radio[name="cardiop"]:checked').val();
  } else {
    var cardiop =0;
  }
  if ($('input:radio[name="nefropatia"]:checked').val()) {
    var nefropatia = $('input:radio[name="nefropatia"]:checked').val();
  } else {
    var nefropatia =0;
  }
  if ($('input:radio[name="violencia"]:checked').val()) {
    var violencia = $('input:radio[name="violencia"]:checked').val();
  } else {
    var violencia =0;
  }

  var gprevia1 = $('#gprevia1').val();
  var gprevia2 = $('#gprevia2').val();
  var aborto1 = $('#aborto1').val();
  var aborto2 = $('#aborto2').val();
  var vaginal1 = $('#vaginal1').val();
  var vaginal2 = $('#vaginal2').val();
  var nvivos1 = $('#nvivos1').val();
  var nvivos2 = $('#nvivos2').val();
  var viven1 = $('#viven1').val();
  var viven2 = $('#viven2').val();

  if ($('input:radio[name="uprevio"]:checked').val()) {
    var uprevio = $('input:radio[name="uprevio"]:checked').val();
  } else {
    var uprevio =0;
  }
  var ectopico = $('#ectopico').val();
  if ($('input:radio[name="aconsecutivos"]:checked').val()) {
    var aconsecutivos = $('input:radio[name="aconsecutivos"]:checked').val();
  } else {
    var aconsecutivos =0;
  }
  if ($('input:radio[name="uprevion"]:checked').val()) {
    var uprevion = $('input:radio[name="uprevion"]:checked').val();
  } else {
    var uprevion =0;
  }
  var muertos1sem = $('#muertos1sem').val();
  if ($('input:radio[name="agemelares"]:checked').val()) {
    var agemelares = $('input:radio[name="agemelares"]:checked').val();
  } else {
    var agemelares =0;
  }
  var partos1 = $('#partos1').val();
  var partos2 = $('#partos2').val();
  var cesare = $('#cesare').val();
  var nmuertos = $('#nmuertos').val();
  var muertosdes1sem = $('#muertosdes1sem').val();
  var fea_dia = $('#fea_dia').val();
  var fea_mes =$('#fea_mes').val();
  var fea_year =$('#fea_year').val();

  if ($('input:radio[name="m1year"]:checked').val()) {
    var m1year = $('input:radio[name="m1year"]:checked').val();
  } else {
    var m1year =0;
  }
  if ($('input:radio[name="embarazop"]:checked').val()) {
    var embarazop =$('input:radio[name="embarazop"]:checked').val();
  } else {
    var embarazop =0;
  }

  if ($('input:radio[name="f_nousaba"]:checked').val()) {
    var f_nousaba =$('input:radio[name="f_nousaba"]:checked').val();
  } else {
    var f_nousaba =0;
  }
  if ($('input:radio[name="f_barrera"]:checked').val()) {
    var f_barrera=$('input:radio[name="f_barrera"]:checked').val();
  } else {
    var f_barrera=0;
  }
  if ($('input:radio[name="f_dui"]:checked').val()) {
    var f_dui=$('input:radio[name="f_dui"]:checked').val();
  } else {
    var f_dui=0;
  }
  if ($('input:radio[name="f_hormonal"]:checked').val()) {
    var f_hormonal=$('input:radio[name="f_hormonal"]:checked').val();
  } else {
    var f_hormonal=0;
  }
  if ($('input:radio[name="f_emergencia"]:checked').val()) {
    var f_emergencia=$('input:radio[name="f_emergencia"]:checked').val();
  } else {
    var f_emergencia=0;
  }
  if ($('input:radio[name="f_natural"]:checked').val()) {
    var f_natural=$('input:radio[name="f_natural"]:checked').val();
  } else {
    var f_natural=0;
  }

  <!--Aqui estan los valores de las variables nuevas-->

  var pesoAnterior=$('#pesoAnterior').val();

  var gatalla =$('#gatalla').val();

  if ($('input:radio[name="fun1"]:checked').val ()) {
    var fun1 =$('input:radio[name="fun1"]:checked').val ();
  } else {
    var fun1 =0;
  }

  if ($('input:radio[name="eco1"]:checked').val()) {
    var eco1=$('input:radio[name="eco1"]:checked').val();
  } else {
    var eco1=0;
  }

  var FUM_dia=$('#FUM_dia').val();
  var FUM_mes=$('#FUM_mes').val();
  var FUM_year=$('#FUM_year').val();
  var FPP_dia=$('#FPP_dia').val();
  var FPP_mes=$('#FPP_mes').val();
  var FPP_year=$('#FPP_year').val();
  var ANTIR_previa=$('#ANTIR_previa').val();
  var ANTIR_nosabe=$('#ANTIR_nosabe').val();
  var ANTIR_embarazo=$('#ANTIR_embarazo').val();
if ($('#ANTIR_no').val()) {
  var ANTIR_no=$('#ANTIR_no').val();
}else {
  var ANTIR_no=0;
}

  if ($('input:radio[name="fumaAt1"]:checked').val()) {
    var fumaAt1=$('input:radio[name="fumaAt1"]:checked').val();
  } else {
    var fumaAt1  =0;
  }

  if ($('input:radio[name="fumaA2t"]:checked').val()) {
    var fumaA2t = $('input:radio[name="fumaA2t"]:checked').val();
  } else {
    var fumaA2t =0;
  }
  if ($('input:radio[name="fumaAt3"]:checked').val()) {
    var fumaAt3 = $('input:radio[name="fumaAt3"]:checked').val();
  } else {
    var fumaAt3 =0;
  }
  if ($('input:radio[name="fumaPt1"]:checked').val()) {
    var fumaPt1 = $('input:radio[name="fumaPt1"]:checked').val();
  } else {
    var fumaPt1 =0;
  }
  if ($('input:radio[name="fumaPt2"]:checked').val()) {
    var fumaPt2 = $('input:radio[name="fumaPt2"]:checked').val();
  } else {
    var fumaPt2 =0;
  }
  if ($('input:radio[name="fumaPt3"]:checked').val()) {
    var fumaPt3 = $('input:radio[name="fumaPt3"]:checked').val();
  } else {
    var fumaPt3 =0;
  }
  if ($('input:radio[name="DROGASt1"]:checked').val()) {
    var DROGASt1 = $('input:radio[name="DROGASt1"]:checked').val();
  } else {
    var DROGASt1 =0;
  }
  if ($('input:radio[name="DROGASt2"]:checked').val()) {
    var DROGASt2 = $('input:radio[name="DROGASt2"]:checked').val();
  } else {
    var DROGASt2 =0;
  }

  if ($('input:radio[name="DROGASt3"]:checked').val()) {
    var DROGASt3 = $('input:radio[name="DROGASt3"]:checked').val();
  } else {
    var DROGASt3 =0;
  }
  if ($('input:radio[name="ALCOHOLt1"]:checked').val()) {
    var ALCOHOLt1 = $('input:radio[name="ALCOHOLt1"]:checked').val();
  } else {
    var ALCOHOLt1 = 0;
  }

  if ($('input:radio[name="ALCOHOLt2"]:checked').val()) {
    var ALCOHOLt2 = $('input:radio[name="ALCOHOLt2"]:checked').val();
  } else {
    var ALCOHOLt2 =0;
  }
  if ($('input:radio[name="ALCOHOLt3"]:checked').val()) {
    var ALCOHOLt3=$('input:radio[name="ALCOHOLt3"]:checked').val();
  } else {
    var ALCOHOLt3=0;
  }
  if ($('input:radio[name="VIOLENCIAt1"]:checked').val()) {
    var VIOLENCIAt1 = $('input:radio[name="VIOLENCIAt1"]:checked').val();
  } else {
    var VIOLENCIAt1 =0;
  }
  if ($('input:radio[name="VIOLENCIAt2"]:checked').val()) {
    var VIOLENCIAt2=  $('input:radio[name="VIOLENCIAt2"]:checked').val();
  } else {
    var VIOLENCIAt2=0;
  }
  if ($('input:radio[name="VIOLENCIAt3"]:checked').val()) {
    var VIOLENCIAt3 = $('input:radio[name="VIOLENCIAt3"]:checked').val();
  } else {
    var VIOLENCIAt3 =0;
  }
if ($('input:radio[name="ANTITETANICA_VI"]:checked').val()) {
  var ANTITETANICA_VI= $('input:radio[name="ANTITETANICA_VI"]:checked').val();
} else {
    var ANTITETANICA_VI=0;
}

  var ANTITETANICA_D1= $("#ANTITETANICA_D1").val();
  var ANTITETANICA_D2= $("#ANTITETANICA_D2").val();

  if ($('input:radio[name="EXNORMAL_ODONT"]:checked').val()) {
    var EXNORMAL_ODONT  =$('input:radio[name="EXNORMAL_ODONT"]:checked').val();
  } else {
    var EXNORMAL_ODONT  =0;
  }

  if ($('input:radio[name="EXNORMAL_MAMAS"]:checked').val()) {
    var EXNORMAL_MAMAS = $('input:radio[name="EXNORMAL_MAMAS"]:checked').val();
  } else {
    var EXNORMAL_MAMAS =0;
  }

  if ($('input:radio[name="CERVIX_INXPV"]:checked').val()) {
    var CERVIX_INXPV = $('input:radio[name="CERVIX_INXPV"]:checked').val();
  } else {
    var CERVIX_INXPV =0;
  }
  if ($('input:radio[name="CERVIX_PAP"]:checked').val()) {
    var CERVIX_PAP = $('input:radio[name="CERVIX_PAP"]:checked').val();
  } else {
    var CERVIX_PAP =0;
  }
  if ($('input:radio[name="CERVIX_COLP"]:checked').val()) {
    var CERVIX_COLP = $('input:radio[name="CERVIX_COLP"]:checked').val();
  } else {
    var CERVIX_COLP =0;
  }

  var GRUPO = $("#GRUPO").val();

  if ($('input:radio[name="RH"]:checked').val()) {
      var RH = $('input:radio[name="RH"]:checked').val();
  } else {
    var RH =0;
  }

  if ($('input:radio[name="Inmuniz"]:checked').val()) {
    var Inmuniz = $('input:radio[name="Inmuniz"]:checked').val();
  } else {
    var Inmuniz =0;
  }

if ($('input:radio[name="globulina_antiD"]:checked').val()) {
  var globulina_antiD = $('input:radio[name="globulina_antiD"]:checked').val();
} else {
  var globulina_antiD =0;
}

if ($('input:radio[name="Toxoplasmosis_Min20igG"]:checked').val()) {
  var Toxoplasmosis_Min20igG = $('input:radio[name="Toxoplasmosis_Min20igG"]:checked').val();
} else {
  var Toxoplasmosis_Min20igG =0;
}

if ($('input:radio[name="CHAGAS"]:checked').val()) {
  var CHAGAS = $('input:radio[name="CHAGAS"]:checked').val();
} else {
  var CHAGAS =0;
}

if ($('input:radio[name="Toxoplasmosis_MAX20igG"]:checked').val()) {
  var Toxoplasmosis_MAX20igG = $('input:radio[name="Toxoplasmosis_MAX20igG"]:checked').val();
} else {
  var Toxoplasmosis_MAX20igG =0;
}

if ($('input:radio[name="Toxoplasmosis_1ConsultaIGM"]:checked').val()) {
  var Toxoplasmosis_1ConsultaIGM  = $('input:radio[name="Toxoplasmosis_1ConsultaIGM"]:checked').val();
} else {
    var Toxoplasmosis_1ConsultaIGM  =0;
}

if ($('input:radio[name="PALUDISMO_MALARIA"]:checked').val()) {
  var PALUDISMO_MALARIA = $('input:radio[name="PALUDISMO_MALARIA"]:checked').val();
} else {
  var PALUDISMO_MALARIA =0;
}

if ($('input:radio[name="bacteriuna_min20"]:checked').val()) {
  var bacteriuna_min20 = $('input:radio[name="bacteriuna_min20"]:checked').val();
} else {
  var bacteriuna_min20 = 0;
}

if ($('input:radio[name="bacteriuna_max20"]:checked').val()) {
  var bacteriuna_max20 = $('input:radio[name="bacteriuna_max20"]:checked').val();
} else {
  var bacteriuna_max20 =0;
}

  var GLUCEMIA_min20_1 = $("#GLUCEMIA_min20_1").val();

  var GLUCEMIA_min20_2 = $("#GLUCEMIA_min20_2").val();

  var GLUCEMIA_min20_3 = $("#GLUCEMIA_min20_3").val();

  var GLUCEMIA_max30_1 = $("#GLUCEMIA_max30_1").val();

  var GLUCEMIA_max30_2 = $("#GLUCEMIA_max30_2").val();

  var GLUCEMIA_max30_3 = $("#GLUCEMIA_max30_3").val();

  if ($('input:radio[name="mgMENOR20"]:checked').val()) {
    var mgMENOR20 = $('input:radio[name="mgMENOR20"]:checked').val();
  } else {
    var mgMENOR20 =0;
  }

  if ($('input:radio[name="mgMAYOR30"]:checked').val()) {
    var mgMAYOR30 = $('input:radio[name="mgMAYOR30"]:checked').val();
  } else {
    var mgMAYOR30 =0;
  }

  if ($('input:radio[name="ESTREPTOCOCOB"]:checked').val()) {
    var ESTREPTOCOCOB = $('input:radio[name="ESTREPTOCOCOB"]:checked').val();
  } else {
    var ESTREPTOCOCOB =0;
  }

  if ($('input:radio[name="PREPARACION_PARTO"]:checked').val()) {
    var PREPARACION_PARTO = $('input:radio[name="PREPARACION_PARTO"]:checked').val();
  } else {
    var PREPARACION_PARTO =0;
  }

if ($('input:radio[name="CONSEJERIALACTANCIAMATERNA"]:checked').val()) {
  var CONSEJERIALACTANCIAMATERNA = $('input:radio[name="CONSEJERIALACTANCIAMATERNA"]:checked').val();
} else {
  var CONSEJERIALACTANCIAMATERNA = 0;
}

  var Hb_1_MIN20 = $("#Hb_1_MIN20").val();

  var Hb_2_MIN20 = $("#Hb_2_MIN20").val();

  var Hb_3_MIN20 = $("#Hb_3_MIN20").val();

  var Hb_1_MAX20 = $("#Hb_1_MAX20").val();

  var Hb_2_MAX20 = $("#Hb_2_MAX20").val();

  var Hb_3_MAX20 = $("#Hb_3_MAX20").val();

  if ($('input:radio[name="FE"]:checked').val()) {
    var FE  = $('input:radio[name="FE"]:checked').val();
  } else {
    var FE  =0;
  }
if ($('input:radio[name="FOLATOS"]:checked').val()) {
  var FOLATOS = $('input:radio[name="FOLATOS"]:checked').val();
} else {
  var FOLATOS = 0;
}

if ($('input:radio[name="VIHSOLICITADOMIN20S"]:checked').val()) {
  var VIHSOLICITADOMIN20S = $('input:radio[name="VIHSOLICITADOMIN20S"]:checked').val();
} else {
  var VIHSOLICITADOMIN20S =0;
}
if ($('input:radio[name="VIHSOLICITADOMAX20S"]:checked').val()) {
  var VIHSOLICITADOMAX20S = $('input:radio[name="VIHSOLICITADOMAX20S"]:checked').val();
} else {
  var VIHSOLICITADOMAX20S =0;
}
if ($('input:radio[name="VIHREALIZADOMIN20S"]:checked').val()) {
  var VIHREALIZADOMIN20S= $('input:radio[name="VIHREALIZADOMIN20S"]:checked').val();
} else {
  var VIHREALIZADOMIN20S=0;
}

if ($('input:radio[name="VIHREALIZADOMAX20S"]:checked').val()) {
  var VIHREALIZADOMAX20S= $('input:radio[name="VIHREALIZADOMAX20S"]:checked').val();
} else {
  var VIHREALIZADOMAX20S=0;
}
if ($('input:radio[name="PRUEBA_NO_TREPONEMICAMIN20"]:checked').val()) {
  var PRUEBA_NO_TREPONEMICAMIN20 = $('input:radio[name="PRUEBA_NO_TREPONEMICAMIN20"]:checked').val();
} else {
  var PRUEBA_NO_TREPONEMICAMIN20 =0;
}
if ($('input:radio[name="PRUEBA_TREPONEMICA_positivoMIN20"]:checked').val()) {
  var PRUEBA_TREPONEMICA_positivoMIN20 = $('input:radio[name="PRUEBA_TREPONEMICA_positivoMIN20"]:checked').val();
} else {
  var PRUEBA_TREPONEMICA_positivoMIN20 =0;
}
if ($('input:radio[name="PRUEBA_TREPONEMICA_noseMIN20"]:checked').val()) {
  var PRUEBA_TREPONEMICA_noseMIN20 =  $('input:radio[name="PRUEBA_TREPONEMICA_noseMIN20"]:checked').val();
} else {
  var PRUEBA_TREPONEMICA_noseMIN20 =0;
}

if ($('input:radio[name="TRATAMIENTOMIN20"]:checked').val()) {
  var TRATAMIENTOMIN20 = $('input:radio[name="TRATAMIENTOMIN20"]:checked').val();
} else {
    var TRATAMIENTOMIN20 =0;
}

if ($('input:radio[name="TRATAMIENTO_noseMIN20"]:checked').val()) {
  var TRATAMIENTO_noseMIN20  = $('input:radio[name="TRATAMIENTO_noseMIN20"]:checked').val();
} else {
  var TRATAMIENTO_noseMIN20  =0;
}

  if ($('input:radio[name="TRATAMIENTOPAREJAMIN20"]:checked').val()) {
    var TRATAMIENTOPAREJAMIN20 = $('input:radio[name="TRATAMIENTOPAREJAMIN20"]:checked').val();
  } else {
    var TRATAMIENTOPAREJAMIN20 =0;
  }


  var NO_TREPONEMICA_MIN20_1 = $('#NO_TREPONEMICA_MIN20_1').val();

  var NO_TREPONEMICA_MIN20_2 = $('#NO_TREPONEMICA_MIN20_2').val();

  var TREPONEMICA_MIN20_1 = $('#TREPONEMICA_MIN20_1').val();

  var TREPONEMICA_MIN20_2 = $('#TREPONEMICA_MIN20_2').val();

  var TRATAMIENTO_MIN20_1 = $('#TRATAMIENTO_MIN20_1').val();

  var TRATAMIENTO_MIN20_2 = $('#TRATAMIENTO_MIN20_2').val();

  if ($('input:radio[name="TRATAMIENTO_PAREJA_MIN20_NOSE"]:checked').val()) {
    var TRATAMIENTO_PAREJA_MIN20_NOSE = $('input:radio[name="TRATAMIENTO_PAREJA_MIN20_NOSE"]:checked').val();
  } else {
    var TRATAMIENTO_PAREJA_MIN20_NOSE =0;
  }

  var NO_TREPONEMICA_MAX20_1= $("#NO_TREPONEMICA_MAX20_1").val();

  var NO_TREPONEMICA_MAX20_2= $("#NO_TREPONEMICA_MAX20_2").val();

  var TREPONEMICA_MAX20_1 = $('#TREPONEMICA_MAX20_1').val();

  var TREPONEMICA_MAX20_2 = $('#TREPONEMICA_MAX20_2').val();

  var TRATAMIENTO_MAX20_1 = $('#TRATAMIENTO_MAX20_1').val();

  var TRATAMIENTO_MAX20_2 = $('#TRATAMIENTO_MAX20_2').val();

  if ($('input:radio[name="TRATAMIENTO_PAREJA_MAX20_NOSE"]:checked').val()) {
    var TRATAMIENTO_PAREJA_MAX20_NOSE = $('input:radio[name="TRATAMIENTO_PAREJA_MAX20_NOSE"]:checked').val();
  } else {
    var TRATAMIENTO_PAREJA_MAX20_NOSE =0;
  }

  if ($('input:radio[name="PRUEBA_NO_TREPONEMICA_MAX20S"]:checked').val()) {
    var PRUEBA_NO_TREPONEMICA_MAX20S  = $('input:radio[name="PRUEBA_NO_TREPONEMICA_MAX20S"]:checked').val();
  } else {
    var PRUEBA_NO_TREPONEMICA_MAX20S  =0;
  }

  if ($('input:radio[name="PRUEBA_TREPONEMICA_positivoMAX20S"]:checked').val()) {
    var PRUEBA_TREPONEMICA_positivoMAX20S = $('input:radio[name="PRUEBA_TREPONEMICA_positivoMAX20S"]:checked').val();
  } else {
    var PRUEBA_TREPONEMICA_positivoMAX20S =0;
  }

  if ($('input:radio[name="PRUEBA_TREPONEMICA_noseMAX20"]:checked').val()) {
    var PRUEBA_TREPONEMICA_noseMAX20 = $('input:radio[name="PRUEBA_TREPONEMICA_noseMAX20"]:checked').val();
  } else {
    var PRUEBA_TREPONEMICA_noseMAX20 =0;
  }

if ($('input:radio[name="TRATAMIENTOMAX20"]:checked').val()) {
  var TRATAMIENTOMAX20 = $('input:radio[name="TRATAMIENTOMAX20"]:checked').val();
} else {
  var TRATAMIENTOMAX20 =0;
}

if ($('input:radio[name="TRATAMIENTO_noseMAX20"]:checked').val()) {
  var TRATAMIENTO_noseMAX20 = $('input:radio[name="TRATAMIENTO_noseMAX20"]:checked').val();
} else {
  var TRATAMIENTO_noseMAX20 =0;
}

if ($('input:radio[name="TRATAMIENTOPAREJAMAX20"]:checked').val()) {
  var TRATAMIENTOPAREJAMAX20  = $('input:radio[name="TRATAMIENTOPAREJAMAX20"]:checked').val();
} else {
  var TRATAMIENTOPAREJAMAX20  =0;
}

  var fecha1= $('#fecha1').val();

  var edad1= $('#edad1').val();

  var peso1=$('#peso1').val();

  var pa1=$('#pa1').val();

  var alturaU1=$('#alturaU1').val();

  var presentacion1=$('#presentacion1').val();

  var fcf1=$('#fcf1').val();

  var moviF1=$('#moviF1').val();

  var proteinuria1=$('#proteinuria1').val();

  var signos1 =$('#signos1').val();

  var inicialT1=$('#inicialT1').val();

  var pcita1=$('#pcita1').val();

  var fecha2= $('#fecha2').val();

  var edad2= $('#edad2').val();

  var pes2=$('#pes2').val();

  var pa2=$('#pa2').val();

  var alturaU2=$('#alturaU2').val();

  var presentacion2=$('#presentacion2').val();

  var fcf2=$('#fcf2').val();

  var moviF2=$('#moviF2').val();

  var proteinuria2=$('#proteinuria2').val();

  var signos2 =$('#signos2').val();

  var inicialT2=$('#inicialT2').val();

  var pcita2=$('#pcita2').val();

  var fecha3= $('#fecha3').val();

  var edad3= $('#edad3').val();

  var peso3=$('#peso3').val();

  var pa3=$('#pa3').val();

  var alturaU3=$('#alturaU3').val();

  var presentacion3=$('#presentacion3').val();

  var fcf3=$('#fcf3').val();

  var moviF3=$('#moviF3').val();

  var proteinuria3=$('#proteinuria3').val();

  var signos3 =$('#signos3').val();

  var inicialT3=$('#inicialT3').val();

  var pcita3=$('#pcita3').val();

  var fecha4= $('#fecha4').val();

  var edad4= $('#edad4').val();

  var peso4=$('#peso4').val();

  var pa4=$('#pa4').val();

  var alturaU4=$('#alturaU4').val();

  var presentacion4=$('#presentacion4').val();

  var fcf4=$('#fcf4').val();

  var moviF4=$('#moviF4').val();

  var proteinuria4=$('#proteinuria4').val();

  var signos4 =$('#signos4').val();

  var inicialT4=$('#inicialT4').val();

  var pcita4=$('#pcita4').val();

  var fecha5= $('#fecha5').val();

  var edad5= $('#edad5').val();

  var peso5=$('#peso5').val();

  var pa5=$('#pa5').val();

  var alturaU5=$('#alturaU5').val();

  var presentacion5=$('#presentacion5').val();

  var fcf5=$('#fcf5').val();

  var moviF5=$('#moviF5').val();

  var proteinuria5=$('#proteinuria5').val();

  var signos5 =$('#signos5').val();

  var inicialT5=$('#inicialT5').val();

  var pcita5=$('#pcita5').val();

  if ($('input:radio[name="parto"]:checked').val()) {
    var parto =$('input:radio[name="parto"]:checked').val();
  } else {
    var parto =0;
  }

if ($('input:radio[name="aborto"]:checked').val()) {
  var aborto =$('input:radio[name="aborto"]:checked').val();

} else {
  var aborto =0;
}

  var fechaI =$('#fechaI').val();

if ($('input:radio[name="carnet"]:checked').val()) {
  var carnet=$('input:radio[name="carnet"]:checked').val();
} else {
  var carnet=0;
}

  var cprenatal=$('#cprenatal').val();

if ($('input:radio[name="HospiEm"]:checked').val()) {
  var HospiEm=$('input:radio[name="HospiEm"]:checked').val();
} else {
  var HospiEm=0;
}

  var HospiEmDia=$('#HospiEmDia').val();

if ($('input:radio[name="Cantenatales"]:checked').val()) {
  var Cantenatales=$('input:radio[name="Cantenatales"]:checked').val();
} else {
  var Cantenatales=0;
}

  var cantenatalesSei=$('#cantenatalesSei').val();

if ($('input:radio[name="inicioEspo"]:checked').val()) {
  var inicioEspo =$('input:radio[name="inicioEspo"]:checked').val();
} else {
  var inicioEspo =0;
}

if ($('input:radio[name="Rmembrana"]:checked').val()) {
  var Rmembrana =$('input:radio[name="Rmembrana"]:checked').val();
} else {
  var Rmembrana =0;
}

if ($('input:radio[name="Rmembrana"]:checked').val()) {
  var Rmembrana =$('input:radio[name="Rmembrana"]:checked').val();
} else {
  var Rmembrana =0;
}

if ($('#RmembranaFecha').val()) {
  var RmembranaFecha =$('#RmembranaFecha').val();
} else {
  var RmembranaFecha =0;
}

if ($('input:radio[name="Rmembrana37"]:checked').val()) {
  var Rmembrana37=$('input:radio[name="Rmembrana37"]:checked').val();
} else {
  var Rmembrana37=0;
}

if ($('input:radio[name="Rmembrana18"]:checked').val()) {
  var Rmembrana18=$('input:radio[name="Rmembrana18"]:checked').val();
} else {
  var Rmembrana18=0;
}

if ($('input:radio[name="RmembranaTemp"]:checked').val()) {
  var RmembranaTemp=$('input:radio[name="RmembranaTemp"]:checked').val();
} else {
  var RmembranaTemp=0;
}

  var Rmembranatext=$('#Rmembranatext').val();

  var edadGestSema=$('#edadGestSema').val();

  var edadGestdia=$('#edadGestdia').val();

if ($('input:radio[name="edadGestFT"]:checked').val()) {
  var edadGestFT=$('input:radio[name="edadGestFT"]:checked').val();
} else {
  var edadGestFT=0;
}

if ($('input:radio[name="Psituacion"]:checked').val()) {
  var Psituacion=$('input:radio[name="Psituacion"]:checked').val();
} else {
  var Psituacion=0;
}

if ($('input:radio[name="TFetal"]:checked').val()) {
  var TFetal=$('input:radio[name="TFetal"]:checked').val();
} else {
  var TFetal=0;
}

if ($('input:radio[name="acompañanteTDPP"]:checked').val()) {
  var acompañanteTDPP=$('input:radio[name="acompañanteTDPP"]:checked').val();
} else {
  var acompañanteTDPP=0;
}

if ($('input:radio[name="acompañanteTDPF"]:checked').val()) {
  var acompañanteTDPF=$('input:radio[name="acompañanteTDPF"]:checked').val();
} else {
  var acompañanteTDPF=0;
}

if ($('input:radio[name="acompañanteTDPO"]:checked').val()) {
  var acompañanteTDPO=$('input:radio[name="acompañanteTDPO"]:checked').val();
} else {
  var acompañanteTDPO=0;
}

if ($('input:radio[name="acompañanteTDPN"]:checked').val()) {
  var acompañanteTDPN=$('input:radio[name="acompañanteTDPN"]:checked').val();
} else {
  var acompañanteTDPN=0;
}

if ($('input:radio[name="acompañantePP"]:checked').val()) {
  var acompañantePP=$('input:radio[name="acompañantePP"]:checked').val();
} else {
    var acompañantePP=0;
}

if ($('input:radio[name="acompañantePF"]:checked').val()) {
  var acompañantePF=$('input:radio[name="acompañantePF"]:checked').val();
} else {
    var acompañantePF=0;
}

if ($('input:radio[name="acompañantePO"]:checked').val()) {
  var acompañantePO=$('input:radio[name="acompañantePO"]:checked').val();
} else {
    var acompañantePO=0;
}

if ($('input:radio[name="acompañantePN"]:checked').val()) {
  var acompañantePN=$('input:radio[name="acompañantePN"]:checked').val();
} else {
    var acompañantePN=0;
}

if ($('input:radio[name="nacimientovivo"]:checked').val()) {
  var nacimientovivo =$('input:radio[name="nacimientovivo"]:checked').val();
} else {
  var nacimientovivo =0;
}

if ($('input:radio[name="muertoAnte"]:checked').val()) {
  var muertoAnte =$('input:radio[name="muertoAnte"]:checked').val();
} else {
  var muertoAnte =0;
}

  var muertoFecha =$('#muertoFecha').val();;

  var multiplorden =$('#multiplorden').val();

  var muertofetos =$('#muertofetos').val();

if ($('input:radio[name="terminacion"]:checked').val()) {
  var terminacion =$('input:radio[name="terminacion"]:checked').val();
} else {
  var terminacion =0;
}

  var indicacionparto=$('#indicacionparto').val();

  var indicacionota=$('#indicacionota').val();

  var partoindu=$('#partoindu').val();

  var partooper=$('#partooper').val();

if ($('input:radio[name="enfermedades1on"]:checked').val()) {
  var enfermedades1on= $('input:radio[name="enfermedades1on"]:checked').val();

} else {
  var enfermedades1on= 0;
}

if ($('input:radio[name="htano"]:checked').val()) {
  var htano= $('input:radio[name="htano"]:checked').val();
} else {
  var htano= 0;
}

if ($('input:radio[name="htainduno"]:checked').val()) {
  var htainduno= $('input:radio[name="htainduno"]:checked').val();
} else {
  var htainduno= 0;
}
if ($('input:radio[name="preeclampsia2"]:checked').val()) {
  var preeclampsia2= $('input:radio[name="preeclampsia2"]:checked').val();
} else {
  var preeclampsia2= 0;
}

if ($('input:radio[name="eclampsiano"]:checked').val()) {
  var eclampsiano= $('input:radio[name="eclampsiano"]:checked').val();
} else {
  var eclampsiano= 0;
}

if ($('input:radio[name="cardiopatiano"]:checked').val()) {
  var cardiopatiano= $('input:radio[name="cardiopatiano"]:checked').val();
} else {
  var cardiopatiano= 0;
}

if ($('input:radio[name="nefrotapiano"]:checked').val()) {
  var nefrotapiano= $('input:radio[name="nefrotapiano"]:checked').val();
} else {
  var nefrotapiano= 0;
}

if ($('input:radio[name="diabetesno"]:checked').val()) {
  var diabetesno= $('input:radio[name="diabetesno"]:checked').val();
} else {
  var diabetesno= 0;
}

if ($('input:radio[name="diabetesd1"]:checked').val()) {
  var diabetesd1= $('input:radio[name="diabetesd1"]:checked').val();
} else {
  var diabetesd1= 0;
}

if ($('input:radio[name="infecovular"]:checked').val()) {
  var infecovular= $('input:radio[name="infecovular"]:checked').val();
} else {
  var infecovular= 0;
}
  if ($('input:radio[name="infecuri"]:checked').val()) {
    var infecuri= $('input:radio[name="infecuri"]:checked').val();
  } else {
    var infecuri= 0;
  }
  if ($('input:radio[name="ameparto"]:checked').val()) {
      var ameparto= $('input:radio[name="ameparto"]:checked').val();
  } else {
      var ameparto= 0;
  }
  if ($('input:radio[name="rciu"]:checked').val()) {
      var rciu= $('input:radio[name="rciu"]:checked').val();
  } else {
    var rciu= 0;
  }

if ($('input:radio[name="ropremem"]:checked').val()) {
  var ropremem= $('input:radio[name="ropremem"]:checked').val();
} else {
    var ropremem= 0;
}
if ($('input:radio[name="anemia"]:checked').val()) {
  var anemia= $('input:radio[name="anemia"]:checked').val();
} else {
    var anemia= 0;
}

if ($('input:radio[name="grave"]:checked').val()) {
  var grave = $('input:radio[name="grave"]:checked').val();
} else {
  var grave = 0;
}



if ($('input:radio[name="hemorraguia1"]:checked').val()) {
  var hemorraguia1=$('input:radio[name="hemorraguia1"]:checked').val();

} else {
  var hemorraguia1=0;
}

if ($('input:radio[name="hemorraguia2"]:checked').val()) {
  var hemorraguia2=$('input:radio[name="hemorraguia2"]:checked').val();

} else {
  var hemorraguia2=0;
}

if ($('input:radio[name="hemorraguia3"]:checked').val()) {
  var hemorraguia3=$('input:radio[name="hemorraguia3"]:checked').val();

} else {
  var hemorraguia3=0;
}

if ($('input:radio[name="hemopostparto"]:checked').val()) {
  var hemopostparto=$('input:radio[name="hemopostparto"]:checked').val();

} else {
    var hemopostparto=0;
}

if ($('input:radio[name="hemoinfecpuer"]:checked').val()) {
  var hemoinfecpuer=$('input:radio[name="hemoinfecpuer"]:checked').val();

} else {
  var hemoinfecpuer=0;
}

if ($('input:radio[name="partoposicion"]:checked').val()) {
  var partoposicion=$('input:radio[name="partoposicion"]:checked').val();

} else {
    var partoposicion=0;
}
if ($('input:radio[name="episotomia"]:checked').val()) {
  var episotomia=$('input:radio[name="episotomia"]:checked').val();

} else {
  var episotomia=0;

}

if ($('input:radio[name="desgarros"]:checked').val()) {
  var desgarros=$('input:radio[name="desgarros"]:checked').val();

} else {
    var desgarros=0;
}

  var hemorragianota=$('#hemorragianota').val();

  var hemorragiacodigo1=$('#hemorragiacodigo1').val();

  var hemorragiacodigo2=$('#hemorragiacodigo2').val();

  var hemorragiacodigo3=$('#hemorragiacodigo3').val();

  var desgarrotext=$('#desgarrotext').val();

if ($('input:radio[name="ocitocicospre"]:checked').val()) {
  var ocitocicospre=$('input:radio[name="ocitocicospre"]:checked').val();

} else {
  var ocitocicospre=0;
}
if ($('input:radio[name="ocitocicospost"]:checked').val()) {
  var ocitocicospost=$('input:radio[name="ocitocicospost"]:checked').val();

} else {
  var ocitocicospost=0;
}

if ($('input:radio[name="placentacomp"]:checked').val()) {
  var placentacomp=$('input:radio[name="placentacomp"]:checked').val();
} else {
  var placentacomp=0;
}

if ($('input:radio[name="placentarete"]:checked').val()) {
  var placentarete=$('input:radio[name="placentarete"]:checked').val();
} else {
  var placentarete=0;
}
if ($('input:radio[name="ligaduraprecoz"]:checked').val()) {
  var ligaduraprecoz=$('input:radio[name="ligaduraprecoz"]:checked').val();
} else {
  var ligaduraprecoz=0;
}

if ($('input:radio[name="ocilocicostdp"]:checked').val()) {
  var ocilocicostdp=$('input:radio[name="ocilocicostdp"]:checked').val();

} else {
  var ocilocicostdp=0;
}

if ($('input:radio[name="antibiotico"]:checked').val()) {
  var antibiotico=$('input:radio[name="antibiotico"]:checked').val();

} else {
  var antibiotico=0;
}

if ($('input:radio[name="analgesia"]:checked').val()) {
  var analgesia=$('input:radio[name="analgesia"]:checked').val();

} else {
  var analgesia=0;
}

if ($('input:radio[name="anestlocal"]:checked').val()) {
  var anestlocal=$('input:radio[name="anestlocal"]:checked').val();
} else {
  var anestlocal=0;
}
if ($('input:radio[name="anestregion"]:checked').val()) {
  var anestregion=$('input:radio[name="anestregion"]:checked').val();
} else {
  var anestregion=0;
}
if ($('input:radio[name="anestgral"]:checked').val()) {
  var anestgral=$('input:radio[name="anestgral"]:checked').val();
} else {
    var anestgral=0;
}

if ($('input:radio[name="transfusion"]:checked').val()) {
  var transfusion=$('input:radio[name="transfusion"]:checked').val();
} else {
    var transfusion=0;
}

if ($('input:radio[name="otrosno"]:checked').val()) {
  var otrosno=$('input:radio[name="otrosno"]:checked').val();
} else {
  var otrosno=0;
}

  var medic1=$('#medic1').val();

  var medic2=$('#medic2').val();

if (idglas==0) {
  $.ajax({
      dataType:'html',
      type:'POST',
      data:{ ide:ide,tbc:tbc,tbcp:tbcp,diabetes:diabetes,diabetesp:diabetesp,diabetesii:diabetesii,diabetesg:diabetesg,hipertsion:hipertsion,hipertsionp:hipertsionp,pree:pree,preep:preep,eclampsia:eclampsia,eclampsiap:eclampsiap,otracm:otracm,otracmp:otracmp,cgenito:cgenito,infertilidad:infertilidad,cardiop:cardiop,nefropatia:nefropatia,violencia:violencia,viven2:viven2,uprevio:uprevio,ectopico:ectopico,aconsecutivos:aconsecutivos,uprevion:uprevion,muertos1sem:muertos1sem,agemelares:agemelares,
      partos1:partos1,partos2:partos2,cesare:cesare,nmuertos:nmuertos,muertosdes1sem:muertosdes1sem,fea_dia:fea_dia,fea_mes:fea_mes,fea_year:fea_year,m1year:m1year,embarazop:embarazop,f_nousaba:f_nousaba,f_barrera:f_barrera,f_dui:f_dui,f_hormonal:f_hormonal,f_emergencia:f_emergencia,f_natural:f_natural,gprevia1:gprevia1,gprevia2:gprevia2,aborto1:aborto1,aborto2:aborto2,vaginal1:vaginal1,vaginal2:vaginal2,nvivos1:nvivos1,nvivos2:nvivos2,viven1:viven1,pesoAnterior:pesoAnterior,gatalla:gatalla,
      fun1:fun1,eco1:eco1,FUM_dia:FUM_dia,FUM_mes:FUM_mes,FUM_year:FUM_year,FPP_dia:FPP_dia,FPP_mes:FPP_mes,FPP_year:FPP_year,ANTIR_nosabe:ANTIR_nosabe,ANTIR_previa:ANTIR_previa,ANTIR_embarazo:ANTIR_embarazo,ANTIR_no:ANTIR_no,fumaAt1:fumaAt1,fumaA2t:fumaA2t,fumaAt3:fumaAt3,fumaPt1:fumaPt1,fumaPt2:fumaPt2,fumaPt3:fumaPt3,DROGASt1:DROGASt1,DROGASt2:DROGASt2,DROGASt3:DROGASt3,ALCOHOLt1:ALCOHOLt1,ALCOHOLt2:ALCOHOLt2,ALCOHOLt3:ALCOHOLt3,VIOLENCIAt1:VIOLENCIAt1,VIOLENCIAt2:VIOLENCIAt2,
      VIOLENCIAt3:VIOLENCIAt3,ANTITETANICA_VI:ANTITETANICA_VI,ANTITETANICA_D1:ANTITETANICA_D1,ANTITETANICA_D2:ANTITETANICA_D2,EXNORMAL_ODONT:EXNORMAL_ODONT,EXNORMAL_MAMAS:EXNORMAL_MAMAS,CERVIX_INXPV:CERVIX_INXPV,CERVIX_PAP:CERVIX_PAP,CERVIX_COLP:CERVIX_COLP,GRUPO:GRUPO,RH:RH,Inmuniz:Inmuniz,globulina_antiD:globulina_antiD,Toxoplasmosis_Min20igG:Toxoplasmosis_Min20igG,CHAGAS:CHAGAS,Toxoplasmosis_MAX20igG:Toxoplasmosis_MAX20igG,Toxoplasmosis_1ConsultaIGM:Toxoplasmosis_1ConsultaIGM,
      PALUDISMO_MALARIA:PALUDISMO_MALARIA,bacteriuna_min20:bacteriuna_min20,bacteriuna_max20:bacteriuna_max20,GLUCEMIA_min20_1:GLUCEMIA_min20_1,GLUCEMIA_min20_2:GLUCEMIA_min20_2,GLUCEMIA_min20_3:GLUCEMIA_min20_3,GLUCEMIA_max30_1:GLUCEMIA_max30_1,GLUCEMIA_max30_2:GLUCEMIA_max30_2,GLUCEMIA_max30_3:GLUCEMIA_max30_3,mgMENOR20:mgMENOR20,mgMAYOR30:mgMAYOR30,ESTREPTOCOCOB:ESTREPTOCOCOB,PREPARACION_PARTO:PREPARACION_PARTO,CONSEJERIALACTANCIAMATERNA:CONSEJERIALACTANCIAMATERNA,
      Hb_1_MIN20:Hb_1_MIN20,Hb_2_MIN20:Hb_2_MIN20,Hb_3_MIN20:Hb_3_MIN20,Hb_1_MAX20:Hb_1_MAX20,Hb_2_MAX20:Hb_2_MAX20,Hb_3_MAX20:Hb_3_MAX20,FE:FE,FOLATOS:FOLATOS,VIHSOLICITADOMIN20S:VIHSOLICITADOMIN20S,VIHSOLICITADOMAX20S:VIHSOLICITADOMAX20S,VIHREALIZADOMIN20S:VIHREALIZADOMIN20S,VIHREALIZADOMAX20S:VIHREALIZADOMAX20S,PRUEBA_NO_TREPONEMICAMIN20:PRUEBA_NO_TREPONEMICAMIN20,PRUEBA_TREPONEMICA_positivoMIN20:PRUEBA_TREPONEMICA_positivoMIN20,PRUEBA_TREPONEMICA_noseMIN20:PRUEBA_TREPONEMICA_noseMIN20,
      TRATAMIENTOMIN20:TRATAMIENTOMIN20,TRATAMIENTO_noseMIN20:TRATAMIENTO_noseMIN20,TRATAMIENTOPAREJAMIN20:TRATAMIENTOPAREJAMIN20,NO_TREPONEMICA_MIN20_1:NO_TREPONEMICA_MIN20_1,NO_TREPONEMICA_MIN20_2:NO_TREPONEMICA_MIN20_2,TREPONEMICA_MIN20_1:TREPONEMICA_MIN20_1,TREPONEMICA_MIN20_2:TREPONEMICA_MIN20_2,TRATAMIENTO_MIN20_1:TRATAMIENTO_MIN20_1,TRATAMIENTO_MIN20_2:TRATAMIENTO_MIN20_2,TRATAMIENTO_PAREJA_MIN20_NOSE:TRATAMIENTO_PAREJA_MIN20_NOSE,NO_TREPONEMICA_MAX20_1:NO_TREPONEMICA_MAX20_1,
      NO_TREPONEMICA_MAX20_2:NO_TREPONEMICA_MAX20_2,TREPONEMICA_MAX20_1:TREPONEMICA_MAX20_1,TREPONEMICA_MAX20_2:TREPONEMICA_MAX20_2,TRATAMIENTO_MAX20_1:TRATAMIENTO_MAX20_1,TRATAMIENTO_MAX20_2:TRATAMIENTO_MAX20_2,TRATAMIENTO_PAREJA_MAX20_NOSE:TRATAMIENTO_PAREJA_MAX20_NOSE,PRUEBA_NO_TREPONEMICA_MAX20S:PRUEBA_NO_TREPONEMICA_MAX20S,PRUEBA_TREPONEMICA_positivoMAX20S:PRUEBA_TREPONEMICA_positivoMAX20S,PRUEBA_TREPONEMICA_noseMAX20:PRUEBA_TREPONEMICA_noseMAX20,TRATAMIENTOMAX20:TRATAMIENTOMAX20,
      TRATAMIENTO_noseMAX20:TRATAMIENTO_noseMAX20,TRATAMIENTOPAREJAMAX20:TRATAMIENTOPAREJAMAX20,fecha1:fecha1,edad1:edad1,peso1:peso1,pa1:pa1,alturaU1:alturaU1,presentacion1:presentacion1,fcf1:fcf1,moviF1:moviF1,proteinuria1:proteinuria1,signos1:signos1,inicialT1:inicialT1,pcita1:pcita1,fecha2:fecha2,edad2:edad2,pes2:pes2,pa2:pa2,alturaU2:alturaU2,presentacion2:presentacion2,fcf2:fcf2,moviF2:moviF2,proteinuria2:proteinuria2,signos2:signos2,inicialT2:inicialT2,
      pcita2:pcita2,fecha3:fecha3,edad3:edad3,peso3:peso3,pa3:pa3,alturaU3:alturaU3,presentacion3:presentacion3,fcf3:fcf3,moviF3:moviF3,proteinuria3:proteinuria3,signos3:signos3,inicialT3:inicialT3,pcita3:pcita3,fecha4:fecha4,edad4:edad4,peso4:peso4,pa4:pa4,alturaU4:alturaU4,presentacion4:presentacion4,fcf4:fcf4,moviF4:moviF4,proteinuria4:proteinuria4,signos4:signos4,inicialT4:inicialT4,pcita4:pcita4,fecha5:fecha5,edad5:edad5,peso5:peso5,pa5:pa5,alturaU5:alturaU5,
      presentacion5:presentacion5,fcf5:fcf5,moviF5:moviF5,proteinuria5:proteinuria5,signos5:signos5,inicialT5:inicialT5,pcita5:pcita5,rciu:rciu,muertofetos:muertofetos,terminacion:terminacion,indicacionparto:indicacionparto,indicacionota:indicacionota,partoindu:partoindu,partooper:partooper,enfermedades1on:enfermedades1on,htano:htano,htainduno:htainduno,preeclampsia2:preeclampsia2,eclampsiano:eclampsiano,cardiopatiano:cardiopatiano,nefrotapiano:nefrotapiano,diabetesno:diabetesno,
      diabetesd1:diabetesd1,infecovular:infecovular,infecuri:infecuri,ameparto:ameparto,parto:parto,aborto:aborto,fechaI:fechaI,carnet:carnet,cprenatal:cprenatal,HospiEm:HospiEm,HospiEmDia:HospiEmDia,Cantenatales:Cantenatales,cantenatalesSei:cantenatalesSei,inicioEspo:inicioEspo,Rmembrana:Rmembrana,RmembranaFecha:RmembranaFecha,Rmembrana37:Rmembrana37,Rmembrana18:Rmembrana18,RmembranaTemp:RmembranaTemp,Rmembranatext:Rmembranatext,edadGestSema:edadGestSema,edadGestdia:edadGestdia,
      edadGestFT:edadGestFT,Psituacion:Psituacion,TFetal:TFetal,acompañanteTDPP:acompañanteTDPP,acompañanteTDPF:acompañanteTDPF,acompañanteTDPO:acompañanteTDPO,acompañanteTDPN:acompañanteTDPN,acompañantePP:acompañantePP,acompañantePF:acompañantePF,acompañantePO:acompañantePO,acompañantePN:acompañantePN,nacimientovivo:nacimientovivo,muertoAnte:muertoAnte,muertoFecha:muertoFecha,multiplorden:multiplorden,ropremem:ropremem,anemia:anemia,grave:grave,hemorraguia1:hemorraguia1,
      hemorraguia2:hemorraguia2,hemorraguia3:hemorraguia3,hemopostparto:hemopostparto,hemoinfecpuer:hemoinfecpuer,hemorragianota:hemorragianota,hemorragiacodigo1:hemorragiacodigo1,hemorragiacodigo2:hemorragiacodigo2,hemorragiacodigo3:hemorragiacodigo3,partoposicion:partoposicion,episotomia:episotomia,desgarros:desgarros,desgarrotext:desgarrotext,ocitocicospre:ocitocicospre,ocitocicospost:ocitocicospost,placentacomp:placentacomp,placentarete:placentarete,ligaduraprecoz:ligaduraprecoz,
      ocilocicostdp:ocilocicostdp,antibiotico:antibiotico,analgesia:analgesia,anestlocal:anestlocal,anestregion:anestregion,anestgral:anestgral,transfusion:transfusion,otrosno:otrosno,medic1:medic1,medic2:medic2},
      url:'Carnet_prenatal/save_CarnetPer',
      async: false,
      success:function(res){
          $('#idglas').val(res);
          imprimir_carnet();
          window.close();
        }

    });

  }else {

    $.ajax({

        dataType:'html',
        type:'POST',
        data:{ idglas:idglas,ide:ide,tbc:tbc,tbcp:tbcp,diabetes:diabetes,diabetesp:diabetesp,diabetesii:diabetesii,diabetesg:diabetesg,hipertsion:hipertsion,hipertsionp:hipertsionp,pree:pree,preep:preep,eclampsia:eclampsia,eclampsiap:eclampsiap,otracm:otracm,otracmp:otracmp,cgenito:cgenito,infertilidad:infertilidad,cardiop:cardiop,nefropatia:nefropatia,violencia:violencia,viven2:viven2,uprevio:uprevio,ectopico:ectopico,aconsecutivos:aconsecutivos,uprevion:uprevion,muertos1sem:muertos1sem,
          agemelares:agemelares,partos1:partos1,partos2:partos2,cesare:cesare,nmuertos:nmuertos,muertosdes1sem:muertosdes1sem,fea_dia:fea_dia,fea_mes:fea_mes,fea_year:fea_year,m1year:m1year,embarazop:embarazop,f_nousaba:f_nousaba,f_barrera:f_barrera,f_dui:f_dui,f_hormonal:f_hormonal,f_emergencia:f_emergencia,f_natural:f_natural,gprevia1:gprevia1,gprevia2:gprevia2,aborto1:aborto1,aborto2:aborto2,vaginal1:vaginal1,vaginal2:vaginal2,nvivos1:nvivos1,nvivos2:nvivos2,viven1:viven1,
          pesoAnterior:pesoAnterior,gatalla:gatalla,fun1:fun1,eco1:eco1,FUM_dia:FUM_dia,FUM_mes:FUM_mes,FUM_year:FUM_year,FPP_dia:FPP_dia,FPP_mes:FPP_mes,FPP_year:FPP_year,ANTIR_nosabe:ANTIR_nosabe,ANTIR_previa:ANTIR_previa,ANTIR_embarazo:ANTIR_embarazo,ANTIR_no:ANTIR_no,fumaAt1:fumaAt1,fumaA2t:fumaA2t,fumaAt3:fumaAt3,fumaPt1:fumaPt1,fumaPt2:fumaPt2,fumaPt3:fumaPt3,DROGASt1:DROGASt1,DROGASt2:DROGASt2,DROGASt3:DROGASt3,ALCOHOLt1:ALCOHOLt1,ALCOHOLt2:ALCOHOLt2,ALCOHOLt3:ALCOHOLt3,
          VIOLENCIAt1:VIOLENCIAt1,VIOLENCIAt2:VIOLENCIAt2,VIOLENCIAt3:VIOLENCIAt3,ANTITETANICA_VI:ANTITETANICA_VI,ANTITETANICA_D1:ANTITETANICA_D1,ANTITETANICA_D2:ANTITETANICA_D2,EXNORMAL_ODONT:EXNORMAL_ODONT,EXNORMAL_MAMAS:EXNORMAL_MAMAS,CERVIX_INXPV:CERVIX_INXPV,CERVIX_PAP:CERVIX_PAP,CERVIX_COLP:CERVIX_COLP,GRUPO:GRUPO,RH:RH,Inmuniz:Inmuniz,globulina_antiD:globulina_antiD,Toxoplasmosis_Min20igG:Toxoplasmosis_Min20igG,CHAGAS:CHAGAS,Toxoplasmosis_MAX20igG:Toxoplasmosis_MAX20igG,
          Toxoplasmosis_1ConsultaIGM:Toxoplasmosis_1ConsultaIGM,PALUDISMO_MALARIA:PALUDISMO_MALARIA,bacteriuna_min20:bacteriuna_min20,bacteriuna_max20:bacteriuna_max20,GLUCEMIA_min20_1:GLUCEMIA_min20_1,GLUCEMIA_min20_2:GLUCEMIA_min20_2,GLUCEMIA_min20_3:GLUCEMIA_min20_3,GLUCEMIA_max30_1:GLUCEMIA_max30_1,GLUCEMIA_max30_2:GLUCEMIA_max30_2,GLUCEMIA_max30_3:GLUCEMIA_max30_3,mgMENOR20:mgMENOR20,mgMAYOR30:mgMAYOR30,ESTREPTOCOCOB:ESTREPTOCOCOB,PREPARACION_PARTO:PREPARACION_PARTO,
          CONSEJERIALACTANCIAMATERNA:CONSEJERIALACTANCIAMATERNA,Hb_1_MIN20:Hb_1_MIN20,Hb_2_MIN20:Hb_2_MIN20,Hb_3_MIN20:Hb_3_MIN20,Hb_1_MAX20:Hb_1_MAX20,Hb_2_MAX20:Hb_2_MAX20,Hb_3_MAX20:Hb_3_MAX20,FE:FE,FOLATOS:FOLATOS,VIHSOLICITADOMIN20S:VIHSOLICITADOMIN20S,VIHSOLICITADOMAX20S:VIHSOLICITADOMAX20S,VIHREALIZADOMIN20S:VIHREALIZADOMIN20S,VIHREALIZADOMAX20S:VIHREALIZADOMAX20S,PRUEBA_NO_TREPONEMICAMIN20:PRUEBA_NO_TREPONEMICAMIN20,PRUEBA_TREPONEMICA_positivoMIN20:PRUEBA_TREPONEMICA_positivoMIN20,
          PRUEBA_TREPONEMICA_noseMIN20:PRUEBA_TREPONEMICA_noseMIN20,TRATAMIENTOMIN20:TRATAMIENTOMIN20,TRATAMIENTO_noseMIN20:TRATAMIENTO_noseMIN20,TRATAMIENTOPAREJAMIN20:TRATAMIENTOPAREJAMIN20,NO_TREPONEMICA_MIN20_1:NO_TREPONEMICA_MIN20_1,NO_TREPONEMICA_MIN20_2:NO_TREPONEMICA_MIN20_2,TREPONEMICA_MIN20_1:TREPONEMICA_MIN20_1,TREPONEMICA_MIN20_2:TREPONEMICA_MIN20_2,TRATAMIENTO_MIN20_1:TRATAMIENTO_MIN20_1,TRATAMIENTO_MIN20_2:TRATAMIENTO_MIN20_2,
          TRATAMIENTO_PAREJA_MIN20_NOSE:TRATAMIENTO_PAREJA_MIN20_NOSE,NO_TREPONEMICA_MAX20_1:NO_TREPONEMICA_MAX20_1,NO_TREPONEMICA_MAX20_2:NO_TREPONEMICA_MAX20_2,TREPONEMICA_MAX20_1:TREPONEMICA_MAX20_1,TREPONEMICA_MAX20_2:TREPONEMICA_MAX20_2,TRATAMIENTO_MAX20_1:TRATAMIENTO_MAX20_1,TRATAMIENTO_MAX20_2:TRATAMIENTO_MAX20_2,TRATAMIENTO_PAREJA_MAX20_NOSE:TRATAMIENTO_PAREJA_MAX20_NOSE,PRUEBA_NO_TREPONEMICA_MAX20S:PRUEBA_NO_TREPONEMICA_MAX20S,
          PRUEBA_TREPONEMICA_positivoMAX20S:PRUEBA_TREPONEMICA_positivoMAX20S,PRUEBA_TREPONEMICA_noseMAX20:PRUEBA_TREPONEMICA_noseMAX20,TRATAMIENTOMAX20:TRATAMIENTOMAX20,TRATAMIENTO_noseMAX20:TRATAMIENTO_noseMAX20,TRATAMIENTOPAREJAMAX20:TRATAMIENTOPAREJAMAX20,fecha1:fecha1,edad1:edad1,peso1:peso1,pa1:pa1,alturaU1:alturaU1,presentacion1:presentacion1,fcf1:fcf1,moviF1:moviF1,proteinuria1:proteinuria1,signos1:signos1,inicialT1:inicialT1,pcita1:pcita1,fecha2:fecha2,edad2:edad2,pes2:pes2,pa2:pa2,
          alturaU2:alturaU2,presentacion2:presentacion2,fcf2:fcf2,moviF2:moviF2,proteinuria2:proteinuria2,signos2:signos2,inicialT2:inicialT2,pcita2:pcita2,fecha3:fecha3,edad3:edad3,peso3:peso3,pa3:pa3,alturaU3:alturaU3,presentacion3:presentacion3,fcf3:fcf3,moviF3:moviF3,proteinuria3:proteinuria3,signos3:signos3,inicialT3:inicialT3,pcita3:pcita3,fecha4:fecha4,edad4:edad4,peso4:peso4,pa4:pa4,alturaU4:alturaU4,presentacion4:presentacion4,fcf4:fcf4,moviF4:moviF4,proteinuria4:proteinuria4,
          signos4:signos4,inicialT4:inicialT4,pcita4:pcita4,fecha5:fecha5,edad5:edad5,peso5:peso5,pa5:pa5,alturaU5:alturaU5,presentacion5:presentacion5,fcf5:fcf5,moviF5:moviF5,proteinuria5:proteinuria5,signos5:signos5,inicialT5:inicialT5,pcita5:pcita5,rciu:rciu,muertofetos:muertofetos,terminacion:terminacion,indicacionparto:indicacionparto,indicacionota:indicacionota,partoindu:partoindu,partooper:partooper,enfermedades1on:enfermedades1on,htano:htano,htainduno:htainduno,
          preeclampsia2:preeclampsia2,eclampsiano:eclampsiano,cardiopatiano:cardiopatiano,nefrotapiano:nefrotapiano,diabetesno:diabetesno,diabetesd1:diabetesd1,infecovular:infecovular,infecuri:infecuri,ameparto:ameparto,parto:parto,aborto:aborto,fechaI:fechaI,carnet:carnet,cprenatal:cprenatal,HospiEm:HospiEm,HospiEmDia:HospiEmDia,Cantenatales:Cantenatales,cantenatalesSei:cantenatalesSei,inicioEspo:inicioEspo,Rmembrana:Rmembrana,RmembranaFecha:RmembranaFecha,Rmembrana37:Rmembrana37,
          Rmembrana18:Rmembrana18,RmembranaTemp:RmembranaTemp,Rmembranatext:Rmembranatext,edadGestSema:edadGestSema,edadGestdia:edadGestdia,edadGestFT:edadGestFT,Psituacion:Psituacion,TFetal:TFetal,acompañanteTDPP:acompañanteTDPP,acompañanteTDPF:acompañanteTDPF,acompañanteTDPO:acompañanteTDPO,acompañanteTDPN:acompañanteTDPN,acompañantePP:acompañantePP,acompañantePF:acompañantePF,acompañantePO:acompañantePO,acompañantePN:acompañantePN,nacimientovivo:nacimientovivo,muertoAnte:muertoAnte,
          muertoFecha:muertoFecha,multiplorden:multiplorden,ropremem:ropremem,anemia:anemia,grave:grave,hemorraguia1:hemorraguia1,hemorraguia2:hemorraguia2,hemorraguia3:hemorraguia3,hemopostparto:hemopostparto,hemoinfecpuer:hemoinfecpuer,hemorragianota:hemorragianota,hemorragiacodigo1:hemorragiacodigo1,hemorragiacodigo2:hemorragiacodigo2,hemorragiacodigo3:hemorragiacodigo3,partoposicion:partoposicion,episotomia:episotomia,desgarros:desgarros,desgarrotext:desgarrotext,ocitocicospre:ocitocicospre,ocitocicospost:ocitocicospost,placentacomp:placentacomp,placentarete:placentarete,ligaduraprecoz:ligaduraprecoz,ocilocicostdp:ocilocicostdp,antibiotico:antibiotico,analgesia:analgesia,anestlocal:anestlocal,anestregion:anestregion,anestgral:anestgral,transfusion:transfusion,otrosno:otrosno,medic1:medic1,medic2:medic2},
        url:'Carnet_prenatal/update_CarnetPer',
        async: false,
        success:function(res){

          if (res==0) {
            alert("Clap Actualizado con exito ");
            imprimir_carnet();
            window.close();
          }else {

          }
          /*
          bootbox.alert("Clap guardado con exito", function(){
            window.open('clapPrint.php?idclap='+res);
          });*/
        }
      });
  }
  }

  function imprimir_carnet(){
    if($('#idglas').val() != ""){
      window.open("Imprimir/imprimir_carnet?id="+$('#idglas').val());
    }
  }
