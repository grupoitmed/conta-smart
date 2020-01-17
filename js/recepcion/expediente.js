function editar() {
    $('input[disabled="disabled"]').removeAttr("disabled");
    $('select[disabled="disabled"]').removeAttr("disabled");
    $('textarea[disabled="disabled"]').removeAttr("disabled");
    $("#editar").html('<i class="fa fa-check"></i> Actualizar');
    $("#cancelar").html('<i class="fa fa-ban"></i> Cancelar');
    document.getElementById('editar').onclick = function() { actualizar_expediente(); };
    //document.getElementById('cancelar').onclick = function(){ cancelar(); };
}

function cancelar() {
    $("#editar").html('<i class="fa fa-edit"></i> Editar');
    $("#cancelar").html('<i class="fa fa-mail-reply"></i> Regresar');
    document.getElementById('editar').onclick = function() { editar(); };
    document.getElementById('cancelar').onclick = function() { regresar(); };
    $('#form_expediente').find('input, textarea, select').attr('disabled', 'disabled');

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
        $('#doc_dui').attr('name', 'numeroDocumento');
    } else if (id == 2) { //nit
        $('#doc_nit').removeClass('hidden');
        $('#doc_nit').attr('name', 'numeroDocumento');
    } else if (id == 3) { //passaporte
        $('#doc_pas').removeClass('hidden');
        $('#doc_pas').attr('name', 'numeroDocumento');
    } else { //otro
        $('#doc_otro').removeClass('hidden');
        $('#doc_otro').attr('name', 'numeroDocumento');
    }
}

function load_selected_estado(id) {
    $.ajax({
        url: 'Expediente/load_selected_estado',
        type: "POST",
        data: { "id": id },
        success: function(response) {
            $('#estado_civil').append(response);
        }
    });
}

function load_selected_sexo(id) {
    $.ajax({
        url: 'Expediente/load_selected_sexo',
        type: "POST",
        data: { "id": id },
        success: function(response) {
            $('#sexo').append(response);
        }
    });
}

function calcular_edad() {
    var fecha = $("#fecha_nac").val();
    $.ajax({
        url: 'Nuevo_expediente/calcular_edad',
        type: "POST",
        data: { fecha: fecha },
        success: function(response) {
            $("#edad").val(response);
        }
    });
}

function actualizar_expediente() {
    if ($("#nombres").val() == "") { swal("No has ingresado los nombres del paciente!"); } else if ($("#apellidos").val() == "") { swal("No has ingresado los apellidos del paciente!"); } else if ($("#fecha_nac").val() == "") { swal("No has ingresado la fecha de nacimiento del paciente!"); } else if ($("#tipo").val() == "") { swal("No has seleccionado el tipo de paciente!"); } else if ($("#correo").val() == "") { swal("No se ha ingresado el correo electronico del paciente!"); } else if ($("#direccion").val() == "") { swal("No se ha ingresado la direccion del paciente!"); } else if ($("#departamento").val() == "") { swal("No se ha seleccionado el departamento!"); } else if ($("#municipio").val() == "") { swal("No se ha seleccionado el municipio!"); } else {
        if ($("#doc_dui").val() != "" || $("#doc_nit").val() != "" || $("#doc_pas").val() != "" || $("#doc_otro").val() != "") {
            swal({
                title: '¿Estas seguro?',
                text: '¡Se actualizaran los datos del paciente!',
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#4fb7fe',
                cancelButtonColor: '#EF6F6C',
                allowOutsideClick: false,
                confirmButtonText: 'Si, Actualizarlo',
                cancelButtonText: 'Cancelar'
            }).then(function() {
                var datos = $("#form_expediente").serialize();
                $.ajax({
                    url: 'Expediente/actualizar_expediente',
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
                        if (response = true) {
                            // guardar_antecedentes_otros(0);
                            swal({
                                title: 'Actualizado!',
                                text: 'Expedediente actualizado!',
                                type: 'success',
                                confirmButtonColor: '#ff9933'
                            }).then(function() {});
                        } else {
                            swal({
                                title: 'Oops...',
                                text: 'Hubo un error al actualizar el expediente, por favor intentelo de nuevo mas tarde!',
                                type: 'error',
                                confirmButtonColor: '#4fb7fe'
                            }).done();
                        }
                    }
                });
            });
            return false;
        } else {
            swal("No se ha ingresado el numero de documento!");
        }
    }
}
  function load_img_upload(id, orden=1){
    var tipo = $("#tipe_image").val();
    $.ajax({
        type:'POST',
        url: 'Imagenes/load_img_upload',
        data:{id, tipo, orden},
        success: function (response) {

                $("#imagenes").html(response);

        }
    });
}

