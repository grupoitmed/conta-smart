function statement_loading(){
  var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="../assets/images/progress.gif" width="150" height="150"></div></div></div></div>';
  return mensaje;
}
$('#hora').clockpicker({
      placement: 'bottom', 
      align: 'left', 
      autoclose: true
  });

$(function(){
  $('#fecha_reserva').datepicker({
      autoclose: true,
      todayHighlight: true,
      format: 'dd-mm-yyyy',
      startDate: '0d',
      align: 'right'
  });
  //$(".select2").select2();
});
/*jQuery('#hora_reserva').clockpicker({
  align: 'left',
  autoclose: true,
  'default': 'now'
});*/

function regresar(){
  swal({
    title: '¿Estas seguro?',
    text: 'Esta intentando salir sin guardar cambios!',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, confirmar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    location.href = "crear_cita";
  });
}

function crear_cita(){
  if($("#fecha_reserva").val() == ""){ swal("No has seleccionado la fecha de la reservacion!");}
  else if($("#hora").val() == ""){swal("No has seleccionado la hora de la reservacion!");}
    else if($("#minutos").val() == ""){swal("No has seleccionado los minutos de la reservacion!");}
  else if($("#medico").val() == ""){swal("No has seleccionado una especialidad!");}
  else{
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
    }).then(function () {
      var datos = $("#form_cita").serialize();
      $.ajax({
        url: 'Nueva_cita/nueva_cita',
        type: "POST",
        data: datos,
        success: function (response) {
          if(response == 0){
            swal({
              title: 'Exito!',
              text: 'Cita creada con exito!',
              type: 'success',
              confirmButtonColor: '#ff9933'
            }).then( function() {
              window.location.replace("ver_citas");
            });
          }else if (response==1) {
            swal({
              title: 'Oops...',
              text: 'Hubo un error, por favor intentelo de nuevo mas tarde!',
              type: 'error',
              confirmButtonColor: '#4fb7fe'
            }).done();
          }else if (response==2) {
            swal({
              title: 'Oops...',
              text: 'La Fecha seleccionada no es valida!',
              type: 'error',
              confirmButtonColor: '#4fb7fe'
            }).done();
          }else if (response==3) {
            swal({
              title: 'Oops...',
              text: 'Esta cita ya existe!',
              type: 'error',
              confirmButtonColor: '#4fb7fe'
            }).done();
          }else if (response==4) {
            swal({
              title: 'Oops...',
              text: 'Esta horario ya ha sido reservado!',
              type: 'error',
              confirmButtonColor: '#4fb7fe'
            }).done();
          }
          else {
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

function verificar_horarios(){
  var medico = $("#medico").val();
  var fecha_reserva = $("#fecha_reserva").val();
  if(medico == ""){ swal("No ha seleccionado una especialidad");}
  else if(fecha_reserva == ""){ swal("No ha seleccionado la fecha a verificar");}
  else {
    $.ajax({
      url: '../citas/nueva_cita/verificar_horarios',
      type: "POST",
      data: {medico:medico,fecha_reserva:fecha_reserva},
      beforeSend: function(){
        $('#modal').html(statement_loading());
        $('#modal').modal({backdrop: 'static', keyboard: false});
      },
      complete: function(){
        $('#modal').html();
       },
      success: function (response) {
        $('#modal').html(response);
      }
    });
  }
}

function cargar_especialidad(sucursal){
  $("#medico").find('option').remove().end();
  $("#hora").find('option').remove().end();
	$.ajax({
		url: '../citas/nueva_cita/cargar_especialidad',
    data: {sucursal:sucursal},
		type: "POST",
		success: function (response) {
			$('#medico').append(response);
		}
	});
}

function cargar_horas(){
  $("#hora").find('option').remove().end();
  var medico = $("#medico").val();
  var fecha = $("#fecha_reserva").val();
	$.ajax({
		url: '../citas/nueva_cita/cargar_horas',
    data: {medico:medico,fecha:fecha},
		type: "POST",
		success: function (response) {
			$('#hora').append(response);
		}
	});
}
