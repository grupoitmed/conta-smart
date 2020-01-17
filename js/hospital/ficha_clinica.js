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
    var datos = $("#form_ficha").serialize();
    var estado = $("#estado_save").val();
    if (estado == 0) {
      $.ajax({
        url: 'Ficha_clinica/guardar_ficha',
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
        url: 'Ficha_clinica/actualizar_consulta',
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
    window.open("Imprimir/ficha_clinica?idf=" + id);
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
    url: 'ficha_clinica/cargar_antecedentes',
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
    url: 'ficha_clinica/load_diagnosticos',
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
    url: 'ficha_clinica/buscar_diagnosticocie11',
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
    url: 'ficha_clinica/load_diagnosticos_cie11',
    type: "POST",
    data:{id:id},
    success: function (response) {
      $('#diagnostico_principal_cie11').append(response);
    }
  });
}

function nuevo_diagnostico(){
  $.ajax({
    url: 'ficha_clinica/nuevo_diagnostico',
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
    url: 'ficha_clinica/guardar_nota',
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
    url: 'ficha_clinica/agregar_diagnostico',
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
    url: 'ficha_clinica/guardar_diagnostico',
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

function editar(){
  /*
  $("input").prop('disabled', true);
  $('select').attr('disabled', true);
  $('textarea').attr('disabled', true);
  $('#examen_fisico').summernote('disable');
  $('#tipoarchivo').attr('disabled', false);
  */
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
