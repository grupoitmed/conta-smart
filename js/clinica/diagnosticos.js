
function cargar_diagnosticos_table() {
    $.ajax({
        url: 'Diagnostico/cargar_diagnostico_table',
        type: "POST",
        success: function(response) {
            $('#data_diagnostico').append(response);
        }
    });
}

function editar_diagnostico(id) {
    $.ajax({
        url: 'Diagnostico/editdiagnotisco',
        type: "POST",
        data: {
            id: id,
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
                }).then(function() { cargar_diagnosticos_table(); });
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






function cargar_usuarios_table(){
        $.ajax({
            url: 'usuarios/usuarios_load',
            type: "POST",
            //data: { datos: x },
            beforeSend: function() {
                $('#data_diagnostico').show();
                $('#data_diagnostico').html('<div align="center"><h3>BUSCANDO REGISTROS COINCIDENTES</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
            },
            success: function(response) {
                $('#data_diagnostico').html(response);
            }
        });
}

function cargar_imagenes(){
        $.ajax({
            url: 'tipos_imagenes/tipo_imagenes_load',
            type: "POST",

            beforeSend: function() {
                $('#data_diagnostico').show();
                $('#data_diagnostico').html('<div align="center"><h3>BUSCANDO REGISTROS COINCIDENTES</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
            },
            success: function(response) {
                $('#data_diagnostico').html(response);
            }
        });
}



function cargar_plantillas_table(){
        $.ajax({
            url: 'plantillas/plantillas_load',
            type: "POST",
                        beforeSend: function() {
                $('#data_diagnostico').show();
                $('#data_diagnostico').html('<div align="center"><h3>BUSCANDO REGISTROS COINCIDENTES</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
            },

            success: function(response) {
                $('#data_diagnostico').html(response);
            }
        });
}

function cargar_medicamentos_table(){
        $.ajax({
            url: 'medicamentos/medicamentos_load',
            type: "POST",
            //data: { datos: x },
            beforeSend: function() {
                $('#data_diagnostico').show();
                $('#data_diagnostico').html('<div align="center"><h3>BUSCANDO REGISTROS COINCIDENTES</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
            },
            success: function(response) {
                $('#data_diagnostico').html(response);
            }
        });
}

          function newmedicamento() {
    $.ajax({
        url: '../clinica/Recetas/nuevo_medicamento',
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
        url: '../clinica/Recetas/guardar_medicamento',
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
                }).then(function() { cargar_medicamentos_table(); });
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

function editar_medicamento(id){
     $.ajax({
        url: 'medicamentos/editar_medicamento',
        type: "POST",
        data: {
            id: id,
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
function eliminar_medicamento(id){
        swal({
        title: '¿Estas seguro?',
        text: '¡Se eliminara el medicamento permanentemente!',
        type: 'error',
        showCancelButton: true,
        confirmButtonColor: '#4fb7fe',
        cancelButtonColor: '#EF6F6C',
        allowOutsideClick: false,
        confirmButtonText: 'Si, Eliminarlo',
        cancelButtonText: 'Cancelar'
    }).then(function() {
        $.ajax({
            url: 'medicamentos/eliminar_medicamento',
            type: "POST",
            data: { id: id },
            success: function(response) {
                if (response == 0) {
                    swal({
                        title: 'Exito!',
                        text: 'Medicamento eliminado!',
                        type: 'success',
                        confirmButtonColor: '#ff9933'
                    }).then(function() { cargar_medicamentos_table(); });
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


function new_imagen(){
       $.ajax({
        url: 'tipos_imagenes/new_imagen',
        type: "POST",
       /* data: {
            id: id,
        },*/
        success: function(response) {
            $('#modal').html(response);
            $('#modal').modal({
                backdrop: 'static',
                keyboard: false
            });
        }
    });
}

function editar_imagen(id){
       $.ajax({
        url: 'tipos_imagenes/editar_imagen',
        type: "POST",
        data: {
            id: id,
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
function eliminar_imagen(id){
     swal({
        title: '¿Estas seguro?',
        text: '¡Se eliminara el tipo de imagen permanentemente!',
        type: 'error',
        showCancelButton: true,
        confirmButtonColor: '#4fb7fe',
        cancelButtonColor: '#EF6F6C',
        allowOutsideClick: false,
        confirmButtonText: 'Si, Eliminarlo',
        cancelButtonText: 'Cancelar'
    }).then(function() {
        $.ajax({
            url: 'tipos_imagenes/eliminar_imagen',
            type: "POST",
            data: { id: id },
            success: function(response) {
                if (response == 0) {
                    swal({
                        title: 'Exito!',
                        text: 'el tipo de imagen eliminado!',
                        type: 'success',
                        confirmButtonColor: '#ff9933'
                    }).then(function() { cargar_imagenes(); });
                } else {
                    swal({
                        title: 'Oops...',
                        text: 'Hubo un error al eliminar el tipo de imagen, por favor intentelo de nuevo mas tarde!',
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                }
            }
        });
    });
}


function newplantilla(){
       $.ajax({
        url: 'plantillas/newplantilla',
        type: "POST",
       /* data: {
            id: id,
        },*/
        success: function(response) {
            $('#modal').html(response);
            $('#modal').modal({
                backdrop: 'static',
                keyboard: false
            });
        }
    });
}

function editar_plantilla(id){
       $.ajax({
        url: 'plantillas/editar_plantillas',
        type: "POST",
        data: {
            id: id,
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

function editar_usuario(id){
        $.ajax({
        url: 'usuarios/editar_usuario',
        type: "POST",
        data: {
            id: id,
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
function eliminar_usuario(id){
  swal({
        title: '¿Estas seguro?',
        text: '¡Se eliminara el usuario permanentemente!',
        type: 'error',
        showCancelButton: true,
        confirmButtonColor: '#4fb7fe',
        cancelButtonColor: '#EF6F6C',
        allowOutsideClick: false,
        confirmButtonText: 'Si, Eliminarlo',
        cancelButtonText: 'Cancelar'
    }).then(function() {
        $.ajax({
            url: 'usuarios/eliminar_usuarios',
            type: "POST",
            data: { id: id },
            success: function(response) {
                if (response == 0) {
                    swal({
                        title: 'Exito!',
                        text: 'El usuario ha sido eliminado!',
                        type: 'success',
                        confirmButtonColor: '#ff9933'
                    }).then(function() { cargar_usuarios_table(); });
                } else {
                    swal({
                        title: 'Oops...',
                        text: 'Hubo un error al eliminar el usuario, por favor intentelo de nuevo mas tarde!',
                        type: 'error',
                        confirmButtonColor: '#4fb7fe'
                    }).done();
                }
            }
        });
    });  
}