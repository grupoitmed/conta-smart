$('#horainicio').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true
});

$('#horafin').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true
});

$('#fechainicio').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'dd-mm-yyyy',
    startDate: '0d'
});

$('#fechafin').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'dd-mm-yyyy',
    startDate: '0d'
});

function crear_evento() {
    if ($("#iddoctor").val() == "") { swal("No has seleccionado el doctor encargado del evento!"); } else if ($("#fechainicio").val() == "") { swal("No has seleccionado la fecha de inicio del evento!"); } else if ($("#hora").val() == "") { swal("No has seleccionado la hora de inicio del evento!"); } else if ($("#minutos").val() == "") { swal("No has seleccionado los minutos de inicio del evento!"); } else if ($("#fechafin").val() == "") { swal("No has seleccionado la fecha de fin del evento!"); } else if ($("#horaFin").val() == "") { swal("No has seleccionado la hora de fin del evento!"); } else if ($("#minutosFin").val() == "") { swal("No has seleccionado los minutos de fin del evento!"); } else {
        swal({
            title: '¿Estas seguro?',
            text: 'Todos los datos ingresados son correctos?',
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#4fb7fe',
            cancelButtonColor: '#EF6F6C',
            allowOutsideClick: false,
            confirmButtonText: 'Si, confirmar!',
            cancelButtonText: 'Cancelar'
        }).then(function() {
            var datos = $("#form_evento").serialize();
            $.ajax({
                url: 'Crear_evento/nuevo_evento',
                type: "POST",
                data: datos,
                success: function(response) {
                    if (response == 0) {
                        swal({
                            title: 'Exito!',
                            text: 'Evento creado con exito!',
                            type: 'success',
                            confirmButtonColor: '#ff9933'
                        }).then(function() {
                            window.location.replace("agenda");
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
                            text: 'Este evento ya existe!',
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
}