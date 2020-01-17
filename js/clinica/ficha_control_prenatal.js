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
  format: 'yyyy-mm-dd'
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

function finalizar(){

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
 
        if($("#idf").val() != ""){
          window.location ='../recepcion/buscar_expediente';
        }
        else{
      swal({
        title: 'Oops...',
        text: 'No ha guardado la ficha!',
        type: 'error',
        confirmButtonColor: '#4fb7fe'
      }).done();
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
    var estado = $("#idf").val();
    if (estado == 0) {
      $.ajax({
        url: 'Ficha_control_prenatal/guardar_ficha',
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
            saveControl(response);
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
        url: 'Ficha_control_prenatal/actualizar_consulta',
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
    window.open("Imprimir/Ficha_ginecologica?idf=" + id);
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
    url: 'Ficha_control_prenatal/cargar_antecedentes',
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
    url: 'Ficha_control_prenatal/load_diagnosticos',
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
    url: 'Ficha_control_prenatal/buscar_diagnosticocie11',
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
    url: 'Ficha_control_prenatal/load_diagnosticos_cie11',
    type: "POST",
    data:{id:id},
    success: function (response) {
      $('#diagnostico_principal_cie11').append(response);
    }
  });
}

function nuevo_diagnostico(){
  $.ajax({
    url: 'Ficha_control_prenatal/nuevo_diagnostico',
    success: function(response) {
      $('#modal').html(response);
      $('#modal').modal({
        backdrop: 'static',
        keyboard: false
      });
    }
  });
}
function guardarNotasImportante() {
    var nota = $("#notas").val();
    var ide = $("#id_e").text();
    $.ajax({
        url: 'Ficha_ginecologica/guardar_nota',
        type: "POST",
        data: { nota: nota, ide: ide },
        success: function(response) {
            if (response == 0) {
                swal({
                    title: 'Exito!',
                    text: 'Se guardado Correctamente la Nota!',
                    type: 'success',
                    confirmButtonColor: '#ff9933'
                }).then(function() {

                });
            } else {
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
    url: 'Ficha_control_prenatal/agregar_diagnostico',
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
    url: 'Ficha_control_prenatal/guardar_diagnostico',
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
  $("input").prop('disabled', true);
  $('select').attr('disabled', true);
  $('textarea').attr('disabled', true);
  $('#examen_fisico').summernote('disable');
  $('#tipoarchivo').attr('disabled', false);
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




//** Postparto **//


function load_Postparto() {
  $.ajax({
    url: 'Ficha_control_prenatal/cargar_Postparto',
    type: "POST",
    data: {
      id: $("#id_e").text()
    },
    success: function(response) {
      $('#datos_Postparto').html(response);
    }
  });
}
function savePostparto(){
	var datos = $("#form_Postparto").serialize();
$.ajax({
		dataType:'html',
		type:'POST',
		data:datos,
		url:'Ficha_control_prenatal/save_Postparto',
		async: false,
		success:function(response) {
      if (response > 0) {
        swal({
          title: 'Exito!',
          text: 'Se ha Guardado ficha POSPARTO con exito!',
          type: 'success',
          confirmButtonColor: '#ff9933'
        }).then(function() {
           load_Postparto();
        });
      } else {
        swal({
          title: 'Oops...',
          text: 'Hubo un error al Guardar ficha POSPARTO, por favor intentelo de nuevo mas tarde!',
          type: 'error',
          confirmButtonColor: '#4fb7fe'
        }).done();
      }
    }
		});
}


function savePost(field,idpparto){
  var rparto = $('#post'+field).val();
  $.ajax({
    dataType:'html',
    type:'POST',
    data:{idpparto:idpparto,rparto:rparto},
    url:'Ficha_ginecologica/Postparto_Update',
    async: false,
    success:function(response) {
      if (response > 0) {
        swal({
          title: 'Exito!',
          text: 'Se ha actualizado ficha POSPARTO con exito!',
          type: 'success',
          confirmButtonColor: '#ff9933'
        }).then(function() {
           load_Postparto();
        });
      } else {
        swal({
          title: 'Oops...',
          text: 'Hubo un error al Actualizar ficha POSPARTO, por favor intentelo de nuevo mas tarde!',
          type: 'error',
          confirmButtonColor: '#4fb7fe'
        }).done();
      }
    }

  });
}

function delPostparto(idpparto){
bootbox.confirm("Realmente desea eliminar el registro, al hacerlo no se podra recuperar la información?", function(result) {
if(result==true){
$.ajax({
		dataType:'html',
		type:'POST',
		data:{idpparto:idpparto},
		url:'Ficha_ginecologica/delPostparto',
		async: false,
		success:function(response) {
      if (response > 0) {
        swal({
          title: 'Exito!',
          text: 'Se ha Eliminado ficha POSPARTO con exito!',
          type: 'success',
          confirmButtonColor: '#ff9933'
        }).then(function() {
           load_Postparto();
        });
      } else {
        swal({
          title: 'Oops...',
          text: 'Hubo un error al Eliminado ficha POSPARTO, por favor intentelo de nuevo mas tarde!',
          type: 'error',
          confirmButtonColor: '#4fb7fe'
        }).done();
      }
    }
	});
  }
 });
}

/*****CONTROL PRENATAL******/

function cargar_control(idf) {
  $.ajax({
    url: 'Ficha_control_prenatal/cargar_control',
    type: "POST",
    data: {
      id: $("#id_e").text(),idf:idf
    },
    success: function(response) {
      $('#datos_prenatal').html(response);
    }
  });
}

function historial_CarnetPeri() {
  $.ajax({
    url: 'Ficha_control_prenatal/historial_carnetPeri',
    type: "POST",
    data: {
      id: $("#id_e").text()
    },
    success: function(response) {
      $('#dato_carnetPerinatal').html(response);
    }
  });
}

  function cargar_carnet(id) {
      $.ajax({
      url: 'Carnet_prenatal/index',
      type: "POST",
      data: {id:id,ide: $("#id_e").text()}
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
          tficha:"Control Prenatal"
        },
        success: function(response) {
          $('#procedimientos').html(response);
        }
      });
    }else {
      $('#procedimientos').html('<center><h3 class="box-title" style="color:#ec7063;"><strong>Debe guardar la ficha clinica para poder agendar un procedimiento.</strong></h3></center>');
    }
  }
//** Citologias **//
function load_Citologia() {
    $.ajax({
        url: 'Ficha_ginecologica/cargar_citologias',
        type: "POST",
        data: {
            id: $("#id_e").text()
        },
        success: function(response) {
            $('#datos_citologias').html(response);
        }
    });
}

function saveCitologia() {
    var datos = $("#form_Citologia").serialize();
    $.ajax({
        dataType: 'html',
        type: 'POST',
        data: datos,
        url: 'Ficha_ginecologica/save_Citologia',
        async: false,
        success: function(response) {
            if (response > 0) {
                swal({
                    title: 'Exito!',
                    text: 'Se ha Guardado Citologia con exito!',
                    type: 'success',
                    confirmButtonColor: '#ff9933'
                }).then(function() {
                    load_Citologia();
                });
            } else {
                swal({
                    title: 'Oops...',
                    text: 'Hubo un error al Guardar Citologia, por favor intentelo de nuevo mas tarde!',
                    type: 'error',
                    confirmButtonColor: '#4fb7fe'
                }).done();
            }
        }
    });
}

///// EXAMENES
function ver_examenes(id) {
    $.ajax({
        url: 'Examenes/ver_examenes',
        type: "POST",
        data: {
            id: id,
            accion: "nuevo"
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

function nuevo_examen() {
    var id = $("#id_e").text();
    $.ajax({
        url: 'Examenes/cargar_modal',
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

function guardar_examen() {
    var datos = $("#form_examenes").serialize();
    $.ajax({
        url: 'Examenes/guardar_examen',
        type: "POST",
        data: datos,
        beforeSend: function() {
            $('#modal').modal('toggle');
        },
        success: function(response) {
            if (response > 0) {
                swal({
                    title: 'Exito!',
                    text: 'Examen creado!',
                    type: 'success',
                    confirmButtonColor: '#ff9933'
                }).then(function() {
                    cargar_examenes();
                });
            } else {
                swal({
                    title: 'Oops...',
                    text: 'Hubo un error al guardar el examen, por favor intentelo de nuevo mas tarde!',
                    type: 'error',
                    confirmButtonColor: '#4fb7fe'
                }).done();
            }
        }
    });
}

// Diagnosticos
function cargar_diagnosticos() {
    $.ajax({
        url: 'Recetas/cargar_diagnostico',
        type: "POST",
        success: function(response) {
            $('#diag').append(response);
            $('#diag2').append(response);
            $('#diag3').append(response);
        }
    });
}
function agregar_diagnostico() {
    $.ajax({
        url: 'Recetas/nuevo_diagnostico',
        type: "POST",
        success: function(response) {
            $('#modal').html(response);
            $('#modal').modal({ backdrop: 'static', keyboard: false });
        }
    });
}

function guardar_diagnostico() {
    var datos = $("#form_diagnostico").serialize();
    $.ajax({
        url: 'Recetas/guardar_diagnostico',
        type: "POST",
        data: datos,
        beforeSend: function() {
            $('#modal').modal('hide');
        },
        success: function(response) {
            if (response == 0) {
                swal({
                    title: 'Exito!',
                    text: 'Diagnostico guardado!',
                    type: 'success',
                    confirmButtonColor: '#ff9933'
                }).then(function() { cargar_diagnosticos(); });
            } else {
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

// calculos antiguos  control prenatal
      /*CALCULO DEL FPP*/
function fppnew1(){
         var dt = $('#fur').val();

        fecha=new Date(dt);

        tiempo=fecha.getTime();
        dia=fecha.getDate();
        mes=fecha.getMonth();

        if(mes==1 && dia >= 21 && dia <= 28){
          milisegundos=parseInt(283*24*60*60*1000);
        }else{
          milisegundos=parseInt(281*24*60*60*1000);
        }

        total=fecha.setTime(tiempo+milisegundos);
        day=fecha.getDate();
        m=fecha.getMonth()+1;
        year=fecha.getFullYear();
        /*document.write(month + '-' + day + '-' + year);*/
        if (m==1){month="ENE";}
        if (m==2){month="FEB";}
        if (m==3){month="MAR";}
        if (m==4){month="ABR";}
        if (m==5){month="MAY";}
        if (m==6){month="JUN";}
        if (m==7){month="JUL";}
        if (m==8){month="AGO";}
        if (m==9){month="SEP";}
        if (m==10){month="OCT";}
        if (m==11){month="NOV";}
        if (m==12){month="DIC";}
        $('#fpp').val(day + '-' + month + '-' + year);
}

      function agegestions(){

        var cfur = $('#fur').val();
        fur=new Date(cfur);

        var d = new Date();

        var fechaActual = new Date(d.getFullYear()+ "/" + (d.getMonth() + 1 ) + "/" + d.getDate());
        var fechaUltimaRegla= new Date(fur.getFullYear()+ "/" + (fur.getMonth() + 1 ) + "/" + fur.getDate());

        var fechaResta= fechaActual-fechaUltimaRegla;

        //días.
        day=(((fechaResta/1000)/60)/60)/24;
        dias=day - 1;

        //semanas
        semanas = parseInt(dias/7);

        dia = dias % 7;

        $('#edadg').val(semanas + " semanas, " + dia + " dias");
      }

      /*CALCULO DEL FPP*/
      function fppnew2(){
        var dt = $('#fppu').val();

        fecha=new Date(dt);

        tiempo=fecha.getTime();
        dia=fecha.getDate();
        mes=fecha.getMonth();

        if(mes==1 && dia >= 21 && dia <= 28){
          milisegundos=parseInt(283*24*60*60*1000);
        }else{
          milisegundos=parseInt(281*24*60*60*1000);
        }

        total=fecha.setTime(tiempo+milisegundos);
        day=fecha.getDate();
        m=fecha.getMonth()+1;
        year=fecha.getFullYear();
        /*document.write(month + '-' + day + '-' + year);*/
        if (m==1){month="ENE";}
        if (m==2){month="FEB";}
        if (m==3){month="MAR";}
        if (m==4){month="ABR";}
        if (m==5){month="MAY";}
        if (m==6){month="JUN";}
        if (m==7){month="JUL";}
        if (m==8){month="AGO";}
        if (m==9){month="SEP";}
        if (m==10){month="OCT";}
        if (m==11){month="NOV";}
        if (m==12){month="DIC";}

        $('#fpp').val(day + '-' + month + '-' + year);
      }
     function agegestions2(){

        var cfur = $('#fppu').val();
        fur=new Date(cfur);

        var d = new Date();

        var fechaActual = new Date(d.getFullYear()+ "/" + (d.getMonth() + 1 ) + "/" + d.getDate());
        var fechaUltimaRegla= new Date(fur.getFullYear()+ "/" + (fur.getMonth() + 1 ) + "/" + fur.getDate());

        var fechaResta= fechaUltimaRegla-fechaActual;

        //días.
        day=(((fechaResta/1000)/60)/60)/24;
        dias=279 - day;

        //semanas
        semanas = parseInt(dias/7);

        dia = dias % 7;

        $('#edadg').val(semanas + " semanas, " + dia + " dias");
      }
    // Para guardar control prenatal 
function saveControl() {
if ($("#diag").val() == "") {
        swal({
            title: 'Oops...',
            text: 'No ha seleccionado un diagnostico!',
            type: 'error',
            confirmButtonColor: '#4fb7fe'
        }).done();
    } else {
        var datos = $("#controlprenatal").serialize();
        var estado = $("#idf").val();
        if (estado == 0) {
            $.ajax({
                url: 'Ficha_control_prenatal/guardar_control_prenatal',
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
                    if (response != "") {
                        $('#idf').val(response.idficha);
                        $('#idconsulta').val(response.idconsulta);
                        $('#idcobro').val(response.idcobro);
                        swal({
                            title: 'Exito!',
                            text: 'Control prenatal guardado!',
                            type: 'success',
                            confirmButtonColor: '#ff9933'
                        }).then(function() {});
                    } else {
                        swal({
                            title: 'Oops...',
                            text: 'Hubo un error al guardar el control prenatal, por favor intentelo de nuevo mas tarde!',
                            type: 'error',
                            confirmButtonColor: '#4fb7fe'
                        }).done();
                    }
                }
            });
        } else {
            $.ajax({
                url: 'Ficha_control_prenatal/update_prenatal',
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
                            text: 'Control prenatal actualizada!',
                            type: 'success',
                            confirmButtonColor: '#ff9933'
                        }).then(function() {});
                    } else {
                        swal({
                            title: 'Oops...',
                            text: 'Hubo un error al actualizar el control prenatal, por favor intentelo de nuevo mas tarde!',
                            type: 'error',
                            confirmButtonColor: '#4fb7fe'
                        }).done();
                    }
                }
            });
        }
    }
}


// cancelar 
function cancelarFicha(){

  swal({
    title: '¿Estas seguro?',
    text: 'Si cancela, se perderan todos los datos que no hayan sido guardados, Esta seguro que desea cancelar!',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Cancelar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
 
javascript:window.history.back();

  });

}

/*******HISTORIAL DE EMBARAZO*******/

function save_historial_prenatal(){

       /* var idhembarazo = $('#idhembarazo').val();
        var ide = <?=$ide?>;
        var idu = <?=$idu?>;*/
        var datos = $("#HistorialPrenatal").serialize();
        var idhembarazo = $("#idhembarazo").val();
        if (idhembarazo == "") {
            $.ajax({
                url: 'Ficha_control_prenatal/historialembarazosave',
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
                    if (response != "") {
                        $('#idhembarazo').val(response.idhembarazo);
                        swal({
                            title: 'Exito!',
                            text: 'Se ha Guardado ficha historial Prenatal con exito!',
                            type: 'success',
                            confirmButtonColor: '#ff9933'
                        }).then(function() {});
                    } else {
                        swal({
                            title: 'Oops...',
                            text: 'Hubo un error al guardar el control prenatal, por favor intentelo de nuevo mas tarde!',
                            type: 'error',
                            confirmButtonColor: '#4fb7fe'
                        }).done();
                    }
                }
            });
        } else {
            $.ajax({
                url: 'Ficha_control_prenatal/editembarazo',
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
                            text: 'Historial prenatal actualizada!',
                            type: 'success',
                            confirmButtonColor: '#ff9933'
                        }).then(function() {});
                    } else {
                        swal({
                            title: 'Oops...',
                            text: 'Hubo un error al Guardar ficha historial Prenatal, por favor intentelo de nuevo mas tarde!',
                            type: 'error',
                            confirmButtonColor: '#4fb7fe'
                        }).done();
                    }
                }
            });
        }
}

/*****CARNET PERINATAL******/

// Citologia actualizar y eliminar
function saveCito(field, idcitologia) {
    var rcitologia = $('#cit' + field).val();
    $.ajax({
        dataType: 'html',
        type: 'POST',
        data: { idcitologia: idcitologia, rcitologia: rcitologia },
        url: 'Ficha_ginecologica/citologia_Update',
        async: false,
        success: function(response) {
            if (response > 0) {
                swal({
                    title: 'Exito!',
                    text: 'Se ha actualizado Citologia con exito!',
                    type: 'success',
                    confirmButtonColor: '#ff9933'
                }).then(function() {
                    load_Citologia();
                });
            } else {
                swal({
                    title: 'Oops...',
                    text: 'Hubo un error al Actualizar Citologia, por favor intentelo de nuevo mas tarde!',
                    type: 'error',
                    confirmButtonColor: '#4fb7fe'
                }).done();
            }
        }

    });
}

function delCitologia(idcitologia) {
    bootbox.confirm("Realmente desea eliminar el registro, al hacerlo no se podra recuperar la información?", function(result) {
        if (result == true) {
            $.ajax({
                dataType: 'html',
                type: 'POST',
                data: { idcitologia: idcitologia },
                url: 'Ficha_ginecologica/delCitologia',
                async: false,
                success: function(response) {
                    if (response > 0) {
                        swal({
                            title: 'Exito!',
                            text: 'Se ha Eliminado Citologia con exito!',
                            type: 'success',
                            confirmButtonColor: '#ff9933'
                        }).then(function() {
                            load_Citologia();
                        });
                    } else {
                        swal({
                            title: 'Oops...',
                            text: 'Hubo un error al Eliminado Citologia, por favor intentelo de nuevo mas tarde!',
                            type: 'error',
                            confirmButtonColor: '#4fb7fe'
                        }).done();
                    }
                }
            });
        }
    });
}