function statement_loading() {
    var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="../assets/images/progress.gif" width="150" height="150"></div></div></div></div>';
    return mensaje;
}

function cargar_eventos() {
    $.ajax({
        url: 'ver_eventos/cargar_eventos',
        type: 'POST',
        dataType: 'html',
        beforeSend: function() {
            $('#ver_eventos').html('<div align="center"><h3>CARGANDO LA INFORMACION</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
        },
        success: function(html) {
            $('#ver_eventos').html(html);
        }
    });
}

function modificar_evento(id) {
    if (id > 0) {
        $.ajax({
            url: '../citas/ver_eventos/actualizar_evento',
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

function borrar_evento(id) {
    swal({
        title: '¿Estas seguro?',
        text: 'Esta a punto de cancelar el evento!',
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#4fb7fe',
        cancelButtonColor: '#EF6F6C',
        allowOutsideClick: false,
        confirmButtonText: 'Si, confirmar!',
        cancelButtonText: 'Cancelar'
    }).then(function() {
        $.ajax({
            url: 'ver_eventos/cancela_evento',
            type: "POST",
            data: { id: id },
            success: function(response) {
                if (response == 0) {
                    swal({
                        title: 'Exito!',
                        text: 'Se ha cancelado el evento!',
                        type: 'success',
                        confirmButtonColor: '#ff9933'
                    }).then(function() {
                        cargar_eventos();
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