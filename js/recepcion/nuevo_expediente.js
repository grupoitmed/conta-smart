function statement_loading() {
    var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="../loading/progress.gif" width="150" height="150"></div></div></div></div>';
    return mensaje;
}

jQuery(document).ready(function() {
    // Switchery
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());
    });
});
$(function() {
    $(".select2").select2();
});
jQuery('.datepicker').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'dd-mm-yyyy'
});

jQuery('.fec').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'yyyy-mm-dd'
});


function calcular_edad() {
    var fecha = $("#fechaNac").val();
    $.ajax({
        url: 'Nuevo_expediente/calcular_edad',
        type: "POST",
        data: { fecha: fecha },
        success: function(response) {
            $("#edad").val(response);
        }
    });
}

function valida_numero(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }
    // Patron de entrada, en este caso solo acepta numeros
    patron = /[0-9-]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
// Tipos de documentos de la madre
function tipo_doc(id) {
    $('#dui').removeAttr('placeholder');
    $('#doc_dui').removeAttr('name');
    $('#doc_nit').removeAttr('name');
    $('#doc_pas').removeAttr('name');
    $('#doc_otro').removeAttr('name');
    $('#doc_dui').addClass('hidden');
    $('#doc_nit').addClass('hidden');
    $('#doc_pas').addClass('hidden');
    $('#doc_otro').addClass('hidden');
    if (id == 1) { //dui
        $('#doc_dui').removeClass('hidden');
        $('#doc_dui').attr('name', 'numDoc');
    } else if (id == 2) { //nit
        $('#doc_nit').removeClass('hidden');
        $('#doc_nit').attr('name', 'numDoc');
    } else if (id == 3) { //passaporte
        $('#doc_pas').removeClass('hidden');
        $('#doc_pas').attr('name', 'numDoc');
    } else { //otro
        $('#doc_otro').removeClass('hidden');
        $('#doc_otro').attr('name', 'numDoc');
    }
}

function desabilitar() {
    $('#doc_nit').val('');
    $('#doc_otro').val('');
    $('#doc_pas').val('');
    $('#doc_dui').val('');
}

function regresar() {
    window.location.replace("Buscar_expediente");
}

function seguro(id) {
    if (id == 1) {
        $('#aseguradora').removeAttr('disabled');
        $('#numero_poliza').removeAttr('readonly');
        $('#numero_certificado').removeAttr('readonly');
        $('#numero_carnet').removeAttr('readonly');
        $('#titular_seguro').removeAttr('readonly');
    } else {
        $('#aseguradora').val('');
        $('#numero_poliza').val('');
        $('#numero_certificado').val('');
        $('#numero_carnet').val('');
        $('#titular_seguro').val('');
        $('#aseguradora').attr('disabled', 'disabled');
        $('#numero_poliza').attr('readonly', 'readonly');
        $('#numero_certificado').attr('readonly', 'readonly');
        $('#numero_carnet').attr('readonly', 'readonly');
        $('#titular_seguro').attr('readonly', 'readonly');
    }
}

function load_tipos() {
    $.ajax({
        url: 'Nuevo_expediente/load_tipos',
        type: "POST",
        success: function(response) {
            $('#tipo').append(response);
        }
    });
}

function load_doctor() {
    $.ajax({
        url: 'Nuevo_expediente/load_doctor',
        type: "POST",
        success: function(response) {
            $('#med').append(response);
            $('#referido').append(response);
        }
    });
}

function load_formas_conctactar() {
    $.ajax({
        url: 'Nuevo_expediente/load_formas_conctactar',
        type: "POST",
        success: function(response) {
            $('#contact').append(response);
        }
    });
}

function load_aseguradoras() {
    $.ajax({
        url: 'Nuevo_expediente/load_aseguradoras',
        type: "POST",
        success: function(response) {
            $('#aseguradora').html(response);
        }
    });
}


function valida_numero(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros
    patron = /[0-9-]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function cargar_otros_datos() {
    $.ajax({
        url: 'nuevo_expediente/cargar_otros_datos',
        type: "POST",
        data: {
            idexpediente: 0
        },
        success: function(response) {
            $('#div_otros_datos').html(response);
        }
    });
}

function load_profesiones() {
    $.ajax({
        url: 'Nuevo_expediente/load_profesiones',
        type: "POST",
        success: function(response) {
            $("#profe").find('option').remove().end();
            $('#profe').append(response);
        }
    });
}



function registrar() {
    if ($("#nombre").val() == "") { swal("No has ingresado los nombres del paciente!"); } else if ($("#apellido").val() == "") { swal("No has ingresado los apellidos del paciente!"); } else if ($("#fechaNac").val() == "") { swal("No has ingresado la fecha de nacimiento del paciente!"); } else if ($("#email").val() == "") { swal("No se ha ingresado el correo electronico del paciente!"); } else if ($("#sexo").val() == "") { swal("No se ha seleccionado el municipio!"); } else if ($("#telCelular").val() == "") { swal("No se ha escrito el numero de telefono!"); } else {
        if ($("#tipoDoc").val() != "") {
            swal({
                title: '¿Estas seguro?',
                text: '¿Todos los datos estan ingresados correctamente?',
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4fb7fe',
                cancelButtonColor: '#EF6F6C',
                allowOutsideClick: false,
                confirmButtonText: 'Si, Registrar!',
                cancelButtonText: 'Cancelar'
            }).then(function() {
                var datos = $("#form_expediente").serialize();
                $.ajax({
                    url: 'Nuevo_expediente/guardar_expediente',
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
                            //guardar_antecedentes_otros(response);
                            swal({
                                title: 'Exito!',
                                text: 'Usuario registrado y registro de nuevo expediente!',
                                type: 'success',
                                confirmButtonColor: '#ff9933'
                            }).then(function() {
                                window.location = "buscar_expediente";
                            });
                        } else {
                            swal({
                                title: 'Ooops !',
                                text: 'Error al registrar al paciente!',
                                type: 'error',
                                confirmButtonColor: '#ff9933'
                            }).then(function() {});
                        }
                    }
                });
            });

        } else {
            swal("No se ha ingresado el numero de documento!");
        }

    }
}

function cargar_expedientes() {
    var x = $('#paciente').val();
    if (x.length >= 3) {
        $.ajax({
            url: 'Buscar_expediente/cargar_expedientes',
            type: "POST",
            data: { datos: x },
            beforeSend: function() {
                $('#datos_expedientes').show();
                $('#datos_expedientes').html('<div align="center"><h3>BUSCANDO REGISTROS COINCIDENTES</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
            },
            success: function(response) {
                $('#datos_expedientes').html(response);
            }
        });
    }
}

function cargar_bibliotecas() {
    var x = $('#paciente').val();
    if (x.length >= 3) {
        $.ajax({
            url: 'Buscar_biblioteca/cargar_bibliotecas',
            type: "POST",
            data: { datos: x },
            beforeSend: function() {
                $('#datos_expedientes').show();
                $('#datos_expedientes').html('<div align="center"><h3>BUSCANDO REGISTROS COINCIDENTES</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
            },
            success: function(response) {
                $('#datos_expedientes').html(response);
            }
        });
    }
}

function profesion() {
    $.ajax({
        url: 'Nuevo_expediente/profesion',
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
function nueva_imagen(id) {
    window.open("../clinica/imagenes?id="+id);
}


function pacienteatendidos() {
    var finicio = $('#finicio').val();
  var ffin = $('#ffin').val();
    if (finicio != ''|| ffin != '') {
        $.ajax({
            url: 'Buscar_paciente/cargar_pacientes',
            type: "POST",
            data: { finicio: finicio, ffin: ffin },
            beforeSend: function() {
                $('#datos_expedientes').show();
                $('#datos_expedientes').html('<div align="center"><h3>BUSCANDO REGISTROS COINCIDENTES</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
            },
            success: function(response) {
                $('#datos_expedientes').html(response);
            }
        });
    }else{
        alert('error');
    }
}
