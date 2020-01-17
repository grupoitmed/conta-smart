function statement_loading() {
    var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="http://localhost/misalud/assets/images/progress.gif" width="150" height="150"></div></div></div></div>';
    return mensaje;
}

jQuery(document).ready(function() {
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
window.edit = function() {
    $(".click2edit").summernote()
}, window.save = function() {
    $(".click2edit").summernote('destroy');
}

$(function() {
    $(".select2").select2();
});

function finalizar() {
    swal({
        title: '¿Estas seguro?',
        text: '¿Saldra sin guardar el documento?!',
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#4fb7fe',
        cancelButtonColor: '#EF6F6C',
        allowOutsideClick: false,
        confirmButtonText: 'Si, finalizar!',
        cancelButtonText: 'Cancelar'
    }).then(function() {
        window.close();
    });
}

function guardar_formato() {
    if ($("#documento").val() == "") {
        swal({
            title: 'Oops...',
            text: 'No ha seleccionado una plantilla!',
            type: 'error',
            confirmButtonColor: '#4fb7fe'
        }).done();
    } else {
        var datos = $("#form_formatos").serialize();
        $.ajax({
            url: '../clinica/documentos/guardar_formato',
            type: "POST",
            data: datos,
            success: function(response) {
                if (response > 0) {
                    swal({
                        title: 'Exito!',
                        text: 'Plantilla actualizada!',
                        type: 'success',
                        confirmButtonColor: '#ff9933'
                    }).then(function() {
                        window.location = "../clinica/documentos/imprimir?id=" + response;
                    });
                } else {
                    swal({
                        title: 'Oops...',
                        text: 'Hubo un error al actualizar la plantilla, por favor intentelo de nuevo mas tarde!',
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                }
            }
        });
    }
}


function guardar_plantilla() {
    if ($("#documento").val() == "") {
        swal({
            title: 'Oops...',
            text: 'No ha seleccionado una plantilla!',
            type: 'error',
            confirmButtonColor: '#4fb7fe'
        }).done();
    } else {
        var datos = $("#form_plantillas").serialize();
        $.ajax({
            url: '../clinica/documentos/guardar_plantilla',
            type: "POST",
            data: datos,
            success: function(response) {
                if (response == 0) {
                    swal({
                        title: 'Exito!',
                        text: 'Plantilla actualizada!',
                        type: 'success',
                        confirmButtonColor: '#ff9933'
                    }).then(function() {

                    });
                } else {
                    swal({
                        title: 'Oops...',
                        text: 'Hubo un error al actualizar la plantilla, por favor intentelo de nuevo mas tarde!',
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                }
            }
        });
    }
}

function agregar() {
    $.ajax({
        url: '../hospital/documentos/agregar_plantilla',
        beforeSend: function() {
            $('#modal').html(statement_loading());
            $('#modal').modal({ backdrop: 'static', keyboard: false });
        },
        complete: function() {
            $('#modal').html();
        },
        success: function(response) {
            $('#modal').html(response);
        }
    });
}

function listar_documentos() {
    $.ajax({
        url: '../clinica/documentos/listar_documentos',
        type: "POST",
        data: { departamento: this.value },
        success: function(response) {
            $('#documento').html(response);
        }
    });
}