function statement_loading(){
  var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="https://medicprocloud.com/hclimosal/assets/images/progress.gif" width="150" height="150"></div></div></div></div>';
  return mensaje;
}
jQuery(document).ready(function () {
  $('.summernote').summernote({
    height: 350, // set editor height
    minHeight: null, // set minimum height of editor
    maxHeight: null, // set maximum height of editor
    focus: false // set focus to editable area after initializing summernote
  });
  $('.inline-editor').summernote({
    airMode: true
  });
// cargardatos switchery
//jQuery(document).ready(function () {
  // Switchery
  var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
  $('.js-switch').each(function () {
      new Switchery($(this)[0], $(this).data());
  });
//});


});


jQuery('.clockpicker').clockpicker({
   default: 'now',
   autoclose: true,
   donetext: 'Listo'
});

$(function(){
  $(".select2").select2();
  //$('.select2').multiSelect();
});

function cerrar_modal(){
  $('#modal').html("");
  $('#modal').modal('hide');
}

jQuery('.datepicker').datepicker({
  autoclose: true,
  todayHighlight: true,
  format: 'dd-mm-yyyy'
});

(function() {
  [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
    new CBPFWTabs(el);
  });
})();

function valida_numero(e) {
  tecla = (document.all) ? e.keyCode : e.which;

  //Tecla de retroceso para borrar, siempre la permite
  if (tecla == 8) {
    return true;
  }

  // Patron de entrada, en este caso solo acepta numeros
  patron = /[0-9]/;
  tecla_final = String.fromCharCode(tecla);
  return patron.test(tecla_final);
}

function finalizar(idasignacion,idsala,sala_actual,idsalacaja){
  swal({
    title: '¿Estas seguro?',
    text: '¿La ficha clinica esta finalizada?!',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, finalizar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {


    if ($("#motivo_consulta").val() == "") {
      swal({
        title: 'Oops...',
        text: 'No ha llenado el campo de motivo de consulta!',
        type: 'error',
        confirmButtonColor: '#4fb7fe'
      }).done();
    } else if ($("#diagnostico_principal").val() == "") {
      swal({
        title: 'Oops...',
        text: 'No ha seleccionado un diagnostico!',
        type: 'error',
        confirmButtonColor: '#4fb7fe'
      }).done();
    } else {
      $.ajax({
        url: '../enfermeria/Index/actualizar_traslado',
        type: "POST",
        data: {idasignacion:idasignacion,idsala:idsala,razon:10,sala:idsalacaja,sala_actual:sala_actual,servicio:0},
        success: function (response) {
          guardar_consulta();
          window.location = "../administrador/index";
        }
      });
    }
  });
}

function guardar_consulta() {
  var idf = $('#idf').val();
  var pre = $('#precio').val();
  /*DETALLE*/

  var detalle = $('#detalle').val();
  var recordatorios = $('#recordatorios').val();

  var start = $('#start').val();
  var ritmomiccional1 = $('#ritmomiccional1').val();
  var ritmomiccional2 = $('#ritmomiccional2').val();
  var consumoagua = $('#consumoagua').val();
  var otrosliquidos = $('#otrosliquidos').val();
  if($('#5').is(':checked')){var f5 =$('#5').val();} else {var f5 = 0;}
  if($('#6').is(':checked')){var f6 =$('#6').val();} else {var f6 = 0;}
  if($('#7').is(':checked')){var f7 =$('#7').val();} else {var f7 = 0;}
  if($('#8').is(':checked')){var f8 =$('#8').val();} else {var f8 = 0;}
  if($('#9').is(':checked')){var f9 =$('#9').val();} else {var f9 = 0;}
  if($('#10').is(':checked')){var f10 =$('#10').val();} else {var f10 = 0;}

  var cchorro = $('#cchorro').val();
  if($('#12').is(':checked')){var f12 =$('#12').val();} else {var f12 = 0;}
  if($('#13').is(':checked')){var f13 =$('#13').val();} else {var f13 = 0;}
  if($('#14').is(':checked')){var f14 =$('#14').val();} else {var f14 = 0;}
  if($('#15').is(':checked')){var f15 =$('#15').val();} else {var f15 = 0;}
  if($('#16').is(':checked')){var f16 =$('#16').val();} else {var f16 = 0;}

  if($('#17').is(':checked')){var f17 =$('#17').val();} else {var f17 = 0;}
  if($('#18').is(':checked')){var f18 =$('#18').val();} else {var f18 = 0;}
  if($('#19').is(':checked')){var f19 =$('#19').val();} else {var f19 = 0;}
  if($('#20').is(':checked')){var f20 =$('#20').val();} else {var f20 = 0;}
  if($('#21').is(':checked')){var f21 =$('#21').val();} else {var f21 = 0;}

  var evolucion = $('#evolucion').val();
  if($('#23').is(':checked')){var f23 =$('#23').val();} else {var f23 = 0;}
  if($('#24').is(':checked')){var f24 =$('#24').val();} else {var f24 = 0;}
  if($('#25').is(':checked')){var f25 =$('#25').val();} else {var f25 = 0;}

  if($('#26').is(':checked')){var f26 =$('#26').val();} else {var f26 = 0;}
  if($('#27').is(':checked')){var f27 =$('#27').val();} else {var f27 = 0;}
  if($('#28').is(':checked')){var f28 =$('#28').val();} else {var f28 = 0;}
  if($('#29').is(':checked')){var f29 =$('#29').val();} else {var f29 = 0;}
  if($('#30').is(':checked')){var f30 =$('#30').val();} else {var f30 = 0;}

  if($('#31').is(':checked')){var f31 =$('#31').val();} else {var f31 = 0;}
  var nerecciones = $('#nerecciones').val();
  var f33 = $('#33').val();
  if($('#34').is(':checked')){var f34 =$('#34').val();} else {var f34 = 0;}

  var eyaculacion = $('#eyaculacion').val();
  if($('#36').is(':checked')){var f36 =$('#36').val();} else {var f36 = 0;}
  if($('#37').is(':checked')){var f37 =$('#37').val();} else {var f37 = 0;}
  if($('#38').is(':checked')){var f38 =$('#38').val();} else {var f38 = 0;}
  if($('#39').is(':checked')){var f39 =$('#39').val();} else {var f39 = 0;}
  if($('#40').is(':checked')){var f40 =$('#40').val();} else {var f40 = 0;}
  if($('#41').is(':checked')){var f41 =$('#41').val();} else {var f41 = 0;}

  if($('#42').is(':checked')){var f42 =$('#42').val();} else {var f42 = 0;}
  var leucorrea = $('#leucorrea').val();
  if($('#44').is(':checked')){var f44 =$('#44').val();} else {var f44 = 0;}
  if($('#45').is(':checked')){var f45 =$('#45').val();} else {var f45 = 0;}
  if($('#47').is(':checked')){var f47 =$('#47').val();} else {var f47 = 0;}

  var f46 =$('#46').val();

  if($('#htac').is(':checked')){var htac =$('#htac').val();} else {var htac = 0;}
  var htact = $('#htact').val();
  if($('#dm').is(':checked')){var dm =$('#dm').val();} else {var dm = 0;}
  var dmt = $('#dmt').val();
  if($('#erc').is(':checked')){var erc =$('#erc').val();} else {var erc = 0;}
  var erct = $('#erct').val();

  if($('#psiqui').is(':checked')){var psiqui =$('#psiqui').val();} else {var psiqui = 0;}
  var psiquit = $('#psiquit').val();

  if($('#displi').is(':checked')){var displi =$('#displi').val();} else {var displi = 0;}
  var displit = $('#displit').val();

  if($('#asma').is(':checked')){var asma =$('#asma').val();} else {var asma = 0;}
  var asmat = $('#asmat').val();

  if($('#hipo').is(':checked')){var hipo =$('#hipo').val();} else {var hipo = 0;}
  var hipot = $('#hipot').val();

  if($('#compli').is(':checked')){var compli =$('#compli').val();} else {var compli = 0;}
  var complit = $('#complit').val();

  if($('#neuro').is(':checked')){var neuro =$('#neuro').val();} else {var neuro = 0;}
  var neurot = $('#neurot').val();

  if($('#cardio').is(':checked')){var cardio =$('#cardio').val();} else {var cardio = 0;}
  var cardiot = $('#cardiot').val();

  if($('#cancer').is(':checked')){var cancer =$('#cancer').val();} else {var cancer = 0;}
  var cancert = $('#cancert').val();

  var f70 = $('#70').val();
  var actfisica = $('#actfisica').val();

  if($('#72').is(':checked')){var f72 =$('#72').val();} else {var f72 = 0;}
  var ncigarros = $('#ncigarros').val();
  var fsuspendio = $('#fsuspendio').val();
  if($('#etilismo').is(':checked')){var etilismo =$('#etilismo').val();} else {var etilismo = 0;}
  var f76 = $('#76').val();
  var f77 = $('#77').val();
  var f78 = $('#78').val();

  if($('#drogas').is(':checked')){var drogas =$('#drogas').val();} else {var drogas = 0;}
  var drogast = $('#drogast').val();
  var cmedicamentos = $('#cmedicamentos').val();

  var alergias = $('#alergias').val();
  var reaccion = $('#reaccion').val();
  var tratamiento = $('#tratamiento').val();

  var aqdetalles = $('#aqdetalles').val();

  if($('#careceptivo').is(':checked')){var careceptivo =$('#careceptivo').val();} else {var careceptivo = 0;}
  if($('#cainsertivo').is(':checked')){var cainsertivo =$('#cainsertivo').val();} else {var cainsertivo = 0;}
  if($('#88').is(':checked')){var f88 =$('#88').val();} else {var f88 = 0;}
  if($('#89').is(':checked')){var f89 =$('#89').val();} else {var f89 = 0;}
  if($('#90').is(':checked')){var f90 =$('#90').val();} else {var f90 = 0;}
  if($('#91').is(':checked')){var f91 =$('#91').val();} else {var f91 = 0;}

  var asotros = $('#asotros').val();

  var f93 = $('#93').val();
  var f94 = $('#94').val();
  var f95 = $('#95').val();
  var f96 = $('#96').val();

  var f97 = $('#97').val();
  var partosv = $('#partosv').val();
  var pvcompli = $('#pvcompli').val();

  var cesareas = $('#cesareas').val();
  var ccompli = $('#ccompli').val();
  var pfamiliar = $('#pfamiliar').val();
  var pftipo = $('#pftipo').val();

  var citologia = $('#citologia').val();
  var cultima = $('#cultima').val();
  var cresultado = $('#cresultado').val();

  var afmadre = $('#afmadre').val();
  var afmadre2 = $('#afmadre2').val();
  var afpadre = $('#afpadre').val();
  var afpadre2 = $('#afpadre2').val();

  var pprenal = $('#pprenal').val();
  var ge = $('#ge').val();
  var viv = $('#viv').val();
  var tv = $('#tv').val();

  var prepusio = $('#prepusio').val();
  var glande = $('#glande').val();
  var cuerpo = $('#cuerpo').val();

  var muretral = $('#muretral').val();
  var bescrotal = $('#bescrotal').val();
  var tderecho = $('#tderecho').val();
  var tizquierdo = $('#tizquierdo').val();

  var ederecho = $('#ederecho').val();
  var eizquierdo = $('#eizquierdo').val();
  var cederecho = $('#cederecho').val();
  var ceizquierdo = $('#ceizquierdo').val();

  var tesfinder = $('#tesfinder').val();
  var estenosis = $('#estenosis').val();
  var hemorroides = $('#hemorroides').val();
  var prostata = $('#prostata').val();

  if($('#blanda').is(':checked')){var blanda =$('#blanda').val();} else {var blanda = 0;}
  if($('#regular').is(':checked')){var regular =$('#regular').val();} else {var regular = 0;}
  if($('#lisa').is(':checked')){var lisa =$('#lisa').val();} else {var lisa = 0;}
  if($('#irregular').is(':checked')){var irregular =$('#irregular').val();} else {var irregular = 0;}
  if($('#nodulos').is(':checked')){var nodulos =$('#nodulos').val();} else {var nodulos = 0;}
  if($('#petrea').is(':checked')){var petrea =$('#petrea').val();} else {var petrea = 0;}
  if($('#dolorex').is(':checked')){var dolorex =$('#dolorex').val();} else {var dolorex = 0;}

  if($('#ardoru').is(':checked')){var ardoru =$('#ardoru').val();} else {var ardoru = 0;}
  var ampollarec = $('#ampollarec').val();

  var trotros = $('#trotros').val();
  if ($("#diagnostico_principal").val() == "") {
    swal({
      title: 'Oops...',
      text: 'No ha seleccionado un diagnostico!',
      type: 'error',
      confirmButtonColor: '#4fb7fe'
    }).done();
  } else {
    var datos = $("#form_ficha").serialize();
    var estado = $("#estado_save").val();
    if (estado == 0) {
      $.ajax({
        url: 'Ficha_urologia/guardar_ficha',
        type: "POST",
        dataType: "json",
        data: datos,
        beforeSend: function() {
          $('#myModal').modal('toggle');
          $('#myModal').modal('show');
        },
        complete: function() {
          $('#myModal').modal('hide');
        },
        success: function(response) {
          if (response > 0) {
            $('#estado_save').val(response);
            //procedimientos();
            swal({
              title: 'Exito!',
              text: 'Historia clinica guardada!',
              type: 'success',
              confirmButtonColor: '#ff9933'
            }).then(function() {});
          } else {
            swal({
              title: 'Oops...',
              text: 'Hubo un error al guardar la historia clinica, por favor intentelo de nuevo mas tarde!',
              type: 'error',
              confirmButtonColor: '#4fb7fe'
            }).done();
          }
        }
      });
    } else {
      $.ajax({
        url: 'Ficha_urologia/actualizar_consulta',
        type: "POST",
        data: datos,
        beforeSend: function() {
          $('#myModal').modal('toggle');
          $('#myModal').modal('show');
        },
        complete: function() {
          $('#myModal').modal('hide');
        },
        success: function(response) {
          if (response == 0) {
            swal({
              title: 'Exito!',
              text: 'Historia clinica actualizada!',
              type: 'success',
              confirmButtonColor: '#ff9933'
            }).then(function() {});
          } else {
            swal({
              title: 'Oops...',
              text: 'Hubo un error al actualizar la historia clinica, por favor intentelo de nuevo mas tarde!',
              type: 'error',
              confirmButtonColor: '#4fb7fe'
            }).done();
          }
        }
      });
    }
  }
}

function imprimir_consulta() {
  var id = $('#estado_save').val();
  if (id == 0) {
    swal({
      title: 'Oops...',
      text: 'Aún  no ha guardado los datos de la historia clinica!',
      type: 'error',
      confirmButtonColor: '#4fb7fe'
    }).done();
  } else {
    window.open("Imprimir/Ficha_urologia?idf=" + id);
  }
}

/** ANTROPOMETRIAS **/
function calcular_imc() {
  var peso = $('#peso_lb').val();
  var estatura = $('#estatura').val();
  var imc = (peso / 2.2) / ((estatura / 100) * (estatura / 100));
  $('#imc').val(imc.toFixed(2));
  if (imc.toFixed(2) < 16) {
    var resimc = "Delgadez severa";
  } else if (imc.toFixed(2) >= 16 && imc.toFixed(2) <= 16.99) {
    var resimc = "Delgadez moderada";
  } else if (imc.toFixed(2) >= 1 && imc.toFixed(2) <= 18.49) {
    var resimc = "Delgadez leve";
  } else if (imc.toFixed(2) >= 18.5 && imc.toFixed(2) <= 24.99) {
    var resimc = "Normal";
  } else if (imc.toFixed(2) >= 25 && imc.toFixed(2) <= 29.99) {
    var resimc = "Preobeso";
  } else if (imc.toFixed(2) >= 30 && imc.toFixed(2) <= 34.99) {
    var resimc = "Obesidad leve";
  } else if (imc.toFixed(2) >= 35 && imc.toFixed(2) <= 39.99) {
    var resimc = "Obesidad media";
  } else if (imc.toFixed(2) >= 40) {
    var resimc = "Obesidad mórbida";
  }
  $('#resimc').val(resimc);
}


function cargar_antropometrias() {
  $.ajax({
    url: 'Antropometrias/cargar_antropometrias',
    type: "POST",
    data: {
      id: $("#id_e").text()
    },
    success: function(response) {
      $('#datos_antropometrias').html(response);
    }
  });
}

function cargar_examenes() {
  $.ajax({
    url: 'Examenes/cargar_examenes',
    type: "POST",
    data: {
      id: $("#id_e").text()
    },
    success: function(response) {
      $('#datos_examenes_lab').html(response);
    }
  });
}

function cargar_antecedentes() {
  $.ajax({
    url: 'Ficha_urologia/cargar_antecedentes',
    type: "POST",
    data: {
      id: $("#id_e").text()
    },
    success: function(response) {
      $('#datos_antecedentes').html(response);
    }
  });
}

function cargar_otros_datos() {
  $.ajax({
    url: '../recepcion/nuevo_expediente/cargar_otros_datos',
    type: "POST",
    data: {
      idexpediente: $("#id_e").text()
    },
    success: function(response) {
      $('#div_otros_datos').html(response);
    }
  });
}

function nueva_entropometria(){
  $.ajax({
    url: 'Antropometrias/cargar_modal',
    type: "POST",
    data: {
      id: $("#id_e").text()
    },
    success: function(response) {
      $('#modal').html(response);
      $('#modal').modal({
        backdrop: 'static',
        keyboard: false
      });
    }
  });
}

function load_diagnosticos(id){
  $("#diagnostico_principal").find('option').remove().end();

  $.ajax({
    url: 'Ficha_urologia/load_diagnosticos',
    type: "POST",
    data:{id:id},
    success: function (response) {
      $('#diagnostico_principal').append(response);
    }
  });
}

function buscar_diagnosticocie11(){
  var data = $('#txt_buscar').val();
  $.ajax({
    url: 'Ficha_urologia/buscar_diagnosticocie11',
    type: "POST",
    data:{data:data},
    success: function (response) {
      $("#diagnostico_principal_cie11").find('option').remove().end();
      $('#diagnostico_principal_cie11').append(response);
    }
  });
}

function load_diagnosticos_cie11(id){
  $.ajax({
    url: 'Ficha_urologia/load_diagnosticos_cie11',
    type: "POST",
    data:{id:id},
    success: function (response) {
      $('#diagnostico_principal_cie11').append(response);
    }
  });
}

function nuevo_diagnostico(){
  $.ajax({
    url: 'Ficha_urologia/nuevo_diagnostico',
    success: function(response) {
      $('#modal').html(response);
      $('#modal').modal({
        backdrop: 'static',
        keyboard: false
      });
    }
  });
}

function guardarNotasImportante(){
  var nota = $("#notas").val();
  var  ide = $("#id_e").text();
  $.ajax({
    url: 'Ficha_urologia/guardar_nota',
    type: "POST",
    data: {nota:nota,ide:ide},
    success: function(response) {
      if (response == 0) {
        swal({
          title: 'Exito!',
          text: 'Se guardado Correctamente la Nota!',
          type: 'success',
          confirmButtonColor: '#ff9933'
        }).then(function() {

        });
      }else {
        swal({
          title: 'Oops...',
          text: 'Hubo un error al guardar la Nota, por favor intentelo de nuevo!',
          type: 'error',
          confirmButtonColor: '#4fb7fe'
        }).done();
      }

    }
  });
}

function agregar_diagnostico() {
  var datos = $("#form_diagnostico").serialize();
  $.ajax({
    url: 'Ficha_urologia/agregar_diagnostico',
    type: "POST",
    data: datos,
    beforeSend: function() {
      $('#modal').modal('toggle');
    },
    success: function(response) {
      if (response == 0) {
        swal({
          title: 'Exito!',
          text: 'Diagnostico guardado!',
          type: 'success',
          confirmButtonColor: '#ff9933'
        }).then(function() {
          load_diagnosticos(0);
        });
      } else if (response == 2) {
        swal({
          title: 'Oops...',
          text: 'El diagnostico que intenta guardar ya existe!',
          type: 'error',
          confirmButtonColor: '#4fb7fe'
        }).done();
      }else {
        swal({
          title: 'Oops...',
          text: 'Hubo un error al guardar el diagnostico, por favor intentelo de nuevo mas tarde!',
          type: 'error',
          confirmButtonColor: '#4fb7fe'
        }).done();
      }
    }
  });
}

function guardar_antropometria() {
  var datos = $("#form_antropometria").serialize();
  $.ajax({
    url: 'Antropometrias/guardar_antropometria',
    type: "POST",
    data: datos,
    beforeSend: function() {
      $('#modal').modal('toggle');
    },
    success: function(response) {
      if (response > 0) {
        swal({
          title: 'Exito!',
          text: 'Antropometria creada!',
          type: 'success',
          confirmButtonColor: '#ff9933'
        }).then(function() {
          cargar_antropometrias();
        });
      } else {
        swal({
          title: 'Oops...',
          text: 'Hubo un error al guardar la antropometria, por favor intentelo de nuevo mas tarde!',
          type: 'error',
          confirmButtonColor: '#4fb7fe'
        }).done();
      }
    }
  });
}

function guardar_diagnostico() {
  $.ajax({
    url: 'Ficha_urologia/guardar_diagnostico',
    type: "POST",
    data: datos,
    beforeSend: function() {
      $('#modal').modal('toggle');
    },
    success: function(response) {
      if (response == 0) {
        swal({
          title: 'Exito!',
          text: 'Diagnóstico creado!',
          type: 'success',
          confirmButtonColor: '#ff9933'
        }).then(function() {
          cargar_antropometrias();
        });
      } else {
        swal({
          title: 'Oops...',
          text: 'Hubo un error al guardar el diagnostico por favor intentelo de nuevo mas tarde!',
          type: 'error',
          confirmButtonColor: '#4fb7fe'
        }).done();
      }
    }
  });
}


function ver_antropometria(id) {
  $.ajax({
    url: 'Antropometrias/ver_antropometria',
    type: "POST",
    data: {
      id: id,
      accion: ""
    },
    success: function(response) {
      $('#modal').html(response);
      $('#modal').modal({
        backdrop: 'static',
        keyboard: false
      });
    }
  });
}

function editar_antropometria(id) {
  $.ajax({
    url: 'Antropometrias/ver_antropometria',
    type: "POST",
    data: {
      id: id,
      accion: "actualizar"
    },
    success: function(response) {
      $('#modal').html(response);
      $('#modal').modal({
        backdrop: 'static',
        keyboard: false
      });
    }
  });
}

function actualizar_antropometria() {
  var datos = $("#form_antropometria").serialize();
  $.ajax({
    url: 'Antropometrias/actualizar_antropometria',
    type: "POST",
    data: datos,
    beforeSend: function() {
      $('#modal').modal('hide');
    },
    success: function(response) {
      if (response == 0) {
        swal({
          title: 'Exito!',
          text: 'Antropometria actualizada!',
          type: 'success',
          confirmButtonColor: '#ff9933'
        }).then(function() {
          cargar_antropometrias();
        });
      } else {
        swal({
          title: 'Oops...',
          text: 'Hubo un error al actualizar la antropometria, por favor intentelo de nuevo mas tarde!',
          type: 'error',
          confirmButtonColor: '#4fb7fe'
        }).done();
      }
    }
  });
}

/** RECETAS **/
function cargar_recetas() {
  $.ajax({
    url: 'Recetas/cargar_recetas',
    type: "POST",
    data: {
      id: $("#id_e").text()
    },
    success: function(response) {
      $('#datos_recetas').html(response);
    }
  });
}

function usar_receta(receta) {
  swal({
    title: '¿Estas seguro?',
    text: '¡Se copiara la receta seleccionada!',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si',
    cancelButtonText: 'Cancelar'
  }).then(function() {
    $.ajax({
      url: 'Recetas/usar_receta',
      type: "POST",
      data: {
        receta: receta
      },
      success: function(response) {
        if (response > 0) {
          window.open("recetas?idr=" + response)
        } else {
          swal({
            title: 'Oops...',
            text: 'Hubo un error al copiar la receta, por favor intentelo de nuevo mas tarde!',
            type: 'error',
            confirmButtonColor: '#4fb7fe'
          }).done();
        }
      }
    });
  });
}

function ver_receta(receta) {
  window.open("recetas?idr=" + receta);
}

function imprimir_receta(receta) {
  window.open("Imprimir/imprimir_receta?idr=" + receta);
}

function eliminar_receta(receta) {
  bootbox.confirm("¿Estas seguro que deseas eliminar esta receta?", function(result) {
    if (result == true) {
      $.ajax({
        url: 'Recetas/eliminar_receta',
        type: "POST",
        data: {
          receta: receta
        },
        beforeSend: function() {
          $('#myModal').modal('toggle');
          $('#myModal').modal('show');
        },
        complete: function() {
          $('#myModal').modal('hide');
        },
        success: function(response) {
          if (response == 0) {
            bootbox.alert("Receta eliminada exitosamente", function() {
              cargar_recetas();
            });
          } else {
            bootbox.alert("Hubo un error al eliminar la receta, por favor intentelo de Nuevo mas tarde");
          }
        }
      });
    }
  });
}



//** DOCUMENTOS **//
function nuevo_documento() {
  window.open("documentos?ide=" + $("#id_e").text());
}

//** DOCUMENTOS **//
function cargar_documentos() {
  $.ajax({
    url: 'documentos/cargar_documentos',
    type: "POST",
    data: {
      id: $("#id_e").text()
    },
    success: function(response) {
      $('#datos_documentos').html(response);
    }
  });
}

//** ARCHIVOS **//
function load_archivos() {
  $.ajax({
    url: 'Archivos/cargar_archivos',
    type: "POST",
    data: {
      id: $("#id_e").text()
    },
    success: function(response) {
      $('#datos_archivos').html(response);
    }
  });
}

/** PROCEDEMIENTOS **/
function procedimiento(){
  var idf=$('#estado_save').val();
  if(idf>0){
    $.ajax({
      url: 'Procedimientos/procedimiento',
      type: "POST",
      data: {
        id: $("#id_e").text(),
        idf:idf,
        tficha:"General"
      },
      success: function(response) {
        $('#procedimientos').html(response);
      }
    });
  }else {
    $('#procedimientos').html('<center><h3 class="box-title" style="color:#ec7063;"><strong>Debe guardar la ficha clinica para poder agendar un procedimiento.</strong></h3></center>');
  }
}
