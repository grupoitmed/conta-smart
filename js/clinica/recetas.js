$(function() {
    $(".select2").select2();
    $('#fecha').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd'
    });

    $('#proxima_cita').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd'
    });
});

function habilitar(value) {
    if (value == true) {
        // habilitamos
        document.getElementById("diagnostico").disabled = false;
        document.getElementById("bt").disabled = false;
    } else if (value == false) {
        // deshabilitamos
        document.getElementById("diagnostico").disabled = true;
        document.getElementById("bt").disabled = true;
    }
}

function cargar_medicamentos() {
    $.ajax({
        url: 'Recetas/cargar_medicamentos',
        type: "POST",
        success: function(response) {
            $('#medicamento').append(response);
        }
    });
}

jQuery(document).ready(function() {
    // Switchery
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());
    });
});

function cargar_diagnosticos() {
    $.ajax({
        url: 'Recetas/cargar_diagnostico',
        type: "POST",
        success: function(response) {
            $('#diagnostico').append(response);
        }
    });
}

function cargar_detalles() {
    var id = $("#idreceta").val();
    $.ajax({
        url: 'Recetas/cargar_detalles',
        type: "POST",
        data: { id: id },
        success: function(response) {
            $('#detalles').html(response);
        }
    });
}


function datos_medicamentos(id) {

    $.ajax({
        url: 'Recetas/llenado_campos_medicamentos',
        type: "POST",
        data: { id: id },
        success: function(response) {
            $('#indicaciones').html(response.detalle);
            $('#ngenerico').val(response.generico);
        }
    });
}

function editar_detalle(id) {
tratm   = $('#tratm'+id).val();
ngener  = $('#ngener'+id).val();
recome  = $('#recome'+id).val();
trati   = $('#trati'+id).val();

    $.ajax({
        url: 'Recetas/editar_detalle',
        type: "POST",
        dataType: 'json',
        data: { id: id, tratm: tratm, ngener: ngener, recome: recome, trati: trati},
        success: function(response) {
                if (response == 0) {
                    swal({
                        title: 'Exito!',
                        text: 'Cambios Guardados!',
                        type: 'success',
                        confirmButtonColor: '#ff9933'
                    }).then(function() { cargar_detalles(); });
                } else {
                    swal({
                        title: 'Oops...',
                        text: 'Hubo un error al guardar la receta, por favor intentelo de nuevo mas tarde!',
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                }
        }
    });
}

function editar_medicamento_receta() {
    var datos = $("#form_recetas_edit").serialize();
    if ($("#medicamentos").val() == "") { swal("No ha seleccionado un medicamento"); } else if ($("#vias").val() == "") { swal("No ha seleccionado la via del medicamento"); } else if ($("#indicaciones_edit").val() == "") { swal("No ha escrito ninguna indicacion del medicamento"); } else {
        $.ajax({
            url: 'Recetas/modificar_detalle',
            type: "POST",
            data: datos,
            beforeSend: function() {
                $('#modal').modal('hide');
            },
            success: function(response) {
                if (response == 0) {
                    swal({
                        title: 'Exito!',
                        text: 'Medicamento actualizado!',
                        type: 'success',
                        confirmButtonColor: '#ff9933'
                    }).then(function() { cargar_detalles(); });
                } else {
                    swal({
                        title: 'Oops...',
                        text: 'Hubo un error al modificar el medicamento en la receta, por favor intentelo de nuevo mas tarde!',
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                }
            }
        });
    }
}

function eliminar_detalle(medicamento) {
    swal({
        title: '¿Estas seguro?',
        text: '¡Se eliminara el medicamento de la receta permanentemente!',
        type: 'error',
        showCancelButton: true,
        confirmButtonColor: '#4fb7fe',
        cancelButtonColor: '#EF6F6C',
        allowOutsideClick: false,
        confirmButtonText: 'Si, Eliminarlo',
        cancelButtonText: 'Cancelar'
    }).then(function() {
        $.ajax({
            url: 'Recetas/eliminar_detalle',
            type: "POST",
            data: { medicamento: medicamento },
            success: function(response) {
                if (response == 0) {
                    swal({
                        title: 'Exito!',
                        text: 'Medicamento eliminado!',
                        type: 'success',
                        confirmButtonColor: '#ff9933'
                    }).then(function() { cargar_detalles(); });
                } else {
                    swal({
                        title: 'Oops...',
                        text: 'Hubo un error al eliminar el medicamento, por favor intentelo de nuevo mas tarde!',
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                }
            }
        });
    });
}

function agregar_medicamento() {
    $.ajax({
        url: 'Recetas/nuevo_medicamento',
        type: "POST",
        success: function(response) {
            $('#modal').html(response);
            $('#modal').modal({ backdrop: 'static', keyboard: false });
        }
    });
}
function guardar_medicamento() {
    var datos = $("#form_medicamento").serialize();
    $.ajax({
        url: 'Recetas/guardar_medicamento',
        type: "POST",
        data: datos,
        beforeSend: function() {
            $('#modal').modal('hide');
        },
        success: function(response) {
            if (response == 0) {
                swal({
                    title: 'Exito!',
                    text: 'Medicamento guardado!',
                    type: 'success',
                    confirmButtonColor: '#ff9933'
                }).then(function() { cargar_medicamentos(); });
            } else {
                swal({
                    title: 'Oops...',
                    text: 'Hubo un error al guardar el medicamento, por favor intentelo de nuevo mas tarde!',
                    type: 'error',
                    confirmButtonColor: '#4fb7fe'
                }).done();
            }
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
function guardar_receta() {
    if ($("#medicamento").val() == "") { swal("No ha seleccionado un medicamento"); } else if ($("#indicaciones").val() == "") { swal("No ha escrito ninguna indicacion del medicamento"); } else {
        var datos = $("#frm_receta").serialize();
        var estado = $("#idreceta").val();
        if (estado == 0) {
            $.ajax({
                url: 'Recetas/guardar_receta',
                type: "POST",
                data: datos,
                success: function(response) {
                    if (response > 0) {
                        $('#idreceta').val(response);
                        swal({
                            title: 'Exito!',
                            text: 'Medicamento agregado a la receta!',
                            type: 'success',
                            confirmButtonColor: '#ff9933'
                        }).then(function() {
                            $("#medicamento").val("").trigger('change');
                            document.getElementById("frm_receta").reset();
                            $('#imprimir').removeAttr("disabled");
                            cargar_detalles();
                        });
                    } else {
                        swal({
                            title: 'Oops...',
                            text: 'Hubo un error al agregar el medicamento a la receta, por favor intentelo de nuevo mas tarde!',
                            type: 'error',
                            confirmButtonColor: '#4fb7fe'
                        }).done();
                    }
                }
            });
        } else {
            $.ajax({
                url: 'Recetas/agregar_detalles',
                type: "POST",
                data: datos,
                success: function(response) {
                    if (response == 0) {
                        swal({
                            title: 'Exito!',
                            text: 'Medicamento agregado a la receta!',
                            type: 'success',
                            confirmButtonColor: '#ff9933'
                        }).then(function() {
                            $("#medicamento").val("").trigger('change');
                            document.getElementById("frm_receta").reset();
                            cargar_detalles();
                        });
                    } else {
                        swal({
                            title: 'Oops...',
                            text: 'Hubo un error al agregar el medicamento en la receta, por favor intentelo de nuevo mas tarde!',
                            type: 'error',
                            confirmButtonColor: '#4fb7fe'
                        }).done();
                    }
                }
            });
        }
    }
}

function finalizar() {
    if ($('#idreceta').val() != "") {
        swal({
            title: '¿Estas seguro?',
            text: '¡Se cerrara la edicion de la receta!',
            type: 'error',
            showCancelButton: true,
            confirmButtonColor: '#4fb7fe',
            cancelButtonColor: '#EF6F6C',
            allowOutsideClick: false,
            confirmButtonText: 'Si, Cerrar',
            cancelButtonText: 'Cancelar'
        }).then(function() {
            window.close();
        });
    } else { window.close(); }
}

function imprimir_receta() {
    if ($('#idreceta').val() != "") {
        window.open("Imprimir/imprimir_receta?idr=" + $('#idreceta').val());
    }
}