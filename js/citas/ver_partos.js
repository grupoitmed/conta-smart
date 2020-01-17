function statement_loading() {
    var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="../assets/images/progress.gif" width="150" height="150"></div></div></div></div>';
    return mensaje;
}

$(function() {
    $('#fecha_citas_reservadas').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    });

    $('#fecha_citas_procesadas').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    });

    $('#fecha_citas_preliminares').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy'
    });
});
/*
function cambia_sucursal(){
  cargar_citas_pendientes('today');
  cargar_citas_procesadas('today');
  cargar_citas_preliminares('today');
  $('#fecha_citas_reservadas').val($('#fecha_hoy').val());
  $('#fecha_citas_procesadas').val($('#fecha_hoy').val());
  $('#fecha_citas_preliminares').val($('#fecha_hoy').val());
}
*/
function cargar_citas_preliminares(fecha) {
    var sucursal = $('#ids').val();
    $.ajax({
        url: 'ver_citas/cargar_pacientes_espera',
        type: 'POST',
        data: { fecha: fecha, sucursal: sucursal },
        dataType: 'html',
        beforeSend: function() {
            $('#citas_preliminares').html('<div align="center"><h3>CARGANDO LA INFORMACION</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
        },
        success: function(html) {
            $('#citas_preliminares').html(html);
        }
    });
}


function capturar_llegada(id) {
    swal({
        title: '¿Estas seguro?',
        text: 'Esta a punto de confirmar la hora de llegada del paciente!',
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#4fb7fe',
        cancelButtonColor: '#EF6F6C',
        allowOutsideClick: false,
        confirmButtonText: 'Si, confirmar!',
        cancelButtonText: 'Cancelar'
    }).then(function() {
        $.ajax({
            url: 'ver_citas/capturar_llegada',
            type: "POST",
            data: { id: id },
            success: function(response) {
                if (response == 0) {
                    swal({
                        title: 'Exito!',
                        text: 'Se ha capturado la hora de llegada!',
                        type: 'success',
                        confirmButtonColor: '#ff9933'
                    }).then(function() {
                        cargar_pacientes_espera();
                        cargar_citas_pendientes('today');
                    });
                } else if (response == 1) {
                    swal({
                        title: 'Oops...',
                        text: 'Hubo un error, por favor intentelo de nuevo mas tarde!',
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                } else {
                    swal({
                        title: 'Oops...',
                        text: 'Hubo un error, por favor intentelo de nuevo mas tarde!',
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                }
            }
        });
    });
}

function cargar_citas_pendientes(fecha) {
    var sucursal = $('#ids').val();
    $.ajax({
        url: 'ver_citas/cargar_citas_pendientes',
        type: 'POST',
        data: { fecha: fecha, sucursal: sucursal },
        dataType: 'html',
        beforeSend: function() {
            $('#citas_pendientes').html('<div align="center"><h3>CARGANDO LA INFORMACION</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
        },
        success: function(html) {
            $('#citas_pendientes').html(html);
        }
    });
}

function cancelar_cita(id) {
    swal({
        title: '¿Estas seguro?',
        text: 'Esta a punto de cancelar la cita del paciente!',
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#4fb7fe',
        cancelButtonColor: '#EF6F6C',
        allowOutsideClick: false,
        confirmButtonText: 'Si, confirmar!',
        cancelButtonText: 'Cancelar'
    }).then(function() {
        $.ajax({
            url: 'ver_citas/cancelar_cita',
            type: "POST",
            data: { id: id },
            success: function(response) {
                if (response == 0) {
                    swal({
                        title: 'Exito!',
                        text: 'Se ha cancelado la cita!',
                        type: 'success',
                        confirmButtonColor: '#ff9933'
                    }).then(function() {
                        cargar_citas_pendientes('today');
                        cargar_citas_preliminares('today');
                        //reload();
                    });
                } else if (response == 1) {
                    swal({
                        title: 'Oops...',
                        text: 'Hubo un error, por favor intentelo de nuevo mas tarde!',
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                } else {
                    swal({
                        title: 'Oops...',
                        text: 'Hubo un error, por favor intentelo de nuevo mas tarde!',
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                }
            }
        });
    });
}

function confirmar_cita(id) {
    swal({
        title: '¿Estas seguro?',
        text: 'Esta a punto de confirmar la cita del paciente!',
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#4fb7fe',
        cancelButtonColor: '#EF6F6C',
        allowOutsideClick: false,
        confirmButtonText: 'Si, confirmar!',
        cancelButtonText: 'Cancelar'
    }).then(function() {
        $.ajax({
            url: 'ver_citas/confirmar_cita',
            type: "POST",
            data: { id: id },
            success: function(response) {
                if (response == 0) {
                    swal({
                        title: 'Exito!',
                        text: 'Se ha confirmado la cita!',
                        type: 'success',
                        confirmButtonColor: '#ff9933'
                    }).then(function() {
                        cargar_citas_preliminares('today');
                        cargar_citas_pendientes('today');
                        // reload();
                    });
                } else if (response == 1) {
                    swal({
                        title: 'Oops...',
                        text: 'Hubo un error, por favor intentelo de nuevo mas tarde!',
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                } else if (response == 2) {
                    swal({
                        title: 'Oops...',
                        text: 'La Fecha seleccionada no es valida!',
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                } else if (response == 3) {
                    swal({
                        title: 'Oops...',
                        text: 'Esta cita ya existe!',
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                } else if (response == 4) {
                    swal({
                        title: 'Oops...',
                        text: 'Esta horario ya ha sido reservado!',
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                } else if (response == 5) {
                    swal({
                        title: 'Oops...',
                        text: 'No se puede crear la fecha de reserva, ya que el doctor se encuentra en un evento!',
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                } else if (response == 6) {
                    swal({
                        title: 'Oops...',
                        text: 'El horario de reserva no se puede registrar ya que el doctor se encuentra en un evento!',
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                } else {
                    swal({
                        title: 'Oops...',
                        text: 'Hubo un error, por favor intentelo de nuevo mas tarde!',
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                }
            }
        });
    });
}

function cargar_citas_procesadas(fecha) {
    var sucursal = $('#ids').val();
    $.ajax({
        url: 'ver_citas/cargar_citas_procesadas',
        type: 'POST',
        data: { fecha: fecha, sucursal: sucursal },
        dataType: 'html',
        beforeSend: function() {
            $('#pacientes_atendidos').html('<div align="center"><h3>CARGANDO LA INFORMACION</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
        },
        success: function(html) {
            $('#pacientes_atendidos').html(html);
        }
    });
}

function procesar_cita(id) {
    if (id > 0) {
        $.ajax({
            url: 'ver_citas/procesar_cita',
            type: "POST",
            data: { id: id },
            /* beforeSend: function(){
               $('#modal').html(statement_loading());
               $('#modal').modal({backdrop: 'static', keyboard: false});
             },
             complete: function(){
               $('#modal').html();
              },*/
            success: function(response) {
                if (response == 0) {
                    swal({
                        title: 'Exito!',
                        text: 'Se ha confirmado la cita!',
                        type: 'success',
                        confirmButtonColor: '#ff9933'
                    }).then(function() {
                        cargar_citas_preliminares('today');
                        cargar_citas_pendientes('today');
                        cargar_citas_procesadas('today');
                        //reload();
                    });
                }
            }
        });
    } else {
        swal({
            title: 'Alerta...',
            text: 'Esta cita ya fue procesada!',
            type: 'error',
            confirmButtonColor: '#4fb7fe'
        }).done();
    }
}
// Reprogramar citas
function reprogramar_cita(id) {
    if (id > 0) {
        $.ajax({
            url: '../citas/ver_citas/reprogramar_cita',
            type: "POST",
            data: { id: id },
            beforeSend: function() {
                $('#modalR').html(statement_loading());
                $('#modalR').modal({ backdrop: 'static', keyboard: false });
            },
            complete: function() {
                $('#modalR').html();
            },
            success: function(response) {
                $('#modalR').html(response);
            }
        });
    } else {
        swal({
            title: 'Alerta...',
            text: 'Esta cita ya fue procesada!',
            type: 'error',
            confirmButtonColor: '#4fb7fe'
        }).done();
    }
}

// Enviar datos al correo del paciente
function enviar_notificacion() {
    if ($().val() == "") {
        swal("Debe de entroducir un correo valido");
    } else {
        var datos = $("#form_notificacion").serialize();
        $.ajax({
            url: 'ver_citas/enviar_notificacion',
            type: "POST",
            data: datos,
            beforeSend: function() {
                $('#modal').html(statement_loading());
            },
            complete: function() {
                $('#modal').html();
            },
            success: function(response) {
                if (response == 0) {
                    swal({
                        title: 'Exito!',
                        text: 'Envio de notificacion correctamente!',
                        type: 'success',
                        confirmButtonColor: '#ff9933'
                    }).then(function() {
                        cerrar_modal();
                        cargar_citas_procesadas('today');
                        cargar_citas_pendientes('today');
                    });
                } else {
                    swal({
                        title: 'Oops...',
                        text: response,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                    cerrar_modal();
                }
            }
        });
    }
}

function asignar_paciente() {
    if ($("#paciente").val() == "") { swal("No ha seleccionado un paciente"); } else if ($("#sala").val() == "") { swal("No ha seleccionado ninguna sala"); } else if ($("#razon").val() == "") { swal("No ha seleccionado ninguna razon de uso"); } else if ($("#servicio").val() == "") { swal("No ha seleccionado ningun servicio"); } else {
        var datos = $("#form_reserva").serialize();
        $.ajax({
            url: 'ver_citas/asignar_paciente',
            type: "POST",
            data: datos,
            beforeSend: function() {
                $('#modal').html(statement_loading());
            },
            complete: function() {
                $('#modal').html();
            },
            success: function(response) {
                if (response == 0) {
                    swal({
                        title: 'Exito!',
                        text: 'Paciente asignado a la cola!',
                        type: 'success',
                        confirmButtonColor: '#ff9933'
                    }).then(function() {
                        cerrar_modal();
                        cargar_citas_procesadas('today');
                        cargar_citas_pendientes('today');
                    });
                } else {
                    swal({
                        title: 'Oops...',
                        text: response,
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                    cerrar_modal();
                }
            }
        });
    }
}
// Enviar cita
function recordar_cita(id) {
    if (id > 0) {
        $.ajax({
            url: '../citas/ver_citas/recordar_cita',
            type: "POST",
            data: { id: id },
            beforeSend: function() {
                $('#modalR').html(statement_loading());
                $('#modalR').modal({ backdrop: 'static', keyboard: false });
            },
            complete: function() {
                $('#modalR').html();
            },
            success: function(response) {
                $('#modalR').html(response);
            }
        });
    } else {
        swal({
            title: 'Alerta...',
            text: 'Esta cita ya fue procesada!',
            type: 'error',
            confirmButtonColor: '#4fb7fe'
        }).done();
    }
}

function cerrar_modal() {
    $('#modal').html("");
    $('#modal').modal('hide');
}


function cerrar_modalR() {
    $('#modalR').html("");
    $('#modalR').modal('hide');
}


// Para los widget contadores de estado

function cantidad_pacientes_espera() {

    $.ajax({
        url: 'ver_citas/cantidad_pacientes_espera',
        type: 'POST',
        // data:{fecha:fecha,sucursal:sucursal},
        dataType: 'html',
        beforeSend: function() {
            $('#cantpacienteEspera').html('<div align="center"><h3>CARGANDO LA INFORMACION</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
        },
        success: function(html) {
            $('#cantpacienteEspera').html(html);
        }
    });
}

function cantidad_citas_pedientes() {
    $.ajax({
        url: 'ver_citas/cantidad_citas_pedientes',
        type: 'POST',
        //data:{fecha:fecha,sucursal:sucursal},
        dataType: 'html',
        beforeSend: function() {
            $('#cantCitasPedientes').html('<div align="center"><h3>CARGANDO LA INFORMACION</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
        },
        success: function(html) {
            $('#cantCitasPedientes').html(html);
        }
    });
}

function cantidad_pacientes_atendidos() {
    $.ajax({
        url: 'ver_citas/cantidad_pacientes_atendidos',
        type: 'POST',
        //data:{fecha:fecha,sucursal:sucursal},
        dataType: 'html',
        beforeSend: function() {
            $('#cantPacienteAtendidos').html('<div align="center"><h3>CARGANDO LA INFORMACION</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
        },
        success: function(html) {
            $('#cantPacienteAtendidos').html(html);
        }
    });
}

function cantidad_pacientes() {
    $.ajax({
        url: 'ver_citas/cantidad_pacientes',
        type: 'POST',
        //data:{fecha:fecha,sucursal:sucursal},
        dataType: 'html',
        beforeSend: function() {
            $('#cantPacienteRegistrados').html('<div align="center"><h3>CARGANDO LA INFORMACION</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
        },
        success: function(html) {
            $('#cantPacienteRegistrados').html(html);
        }
    });
}