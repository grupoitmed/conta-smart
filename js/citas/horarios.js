function statement_loading(){
  var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="../assets/images/progress.gif" width="150" height="150"></div></div></div></div>';
  return mensaje;
}

$(function(){
  $('#fecha').datepicker({
      autoclose: true,
      todayHighlight: true,
      format: 'dd-mm-yyyy'
  });
});

function nuevo_medico(){
  $.ajax({
    url: '../recepcion/Honorarios_medicos/nuevo_medico',
    type: "POST",
    success: function (response) {
      $('#modal').html(response);
      $('#modal').modal({backdrop: 'static', keyboard: false});
    }
  });
}

function cargar_especialidad(){
  var sucursal = $("#sucursal").val();
  $("#medico").find('option').remove().end();
  $("#hora").find('option').remove().end();
	$.ajax({
		url: '../citas/horarios/cargar_especialidad',
    data: {sucursal:sucursal},
		type: "POST",
		success: function (response) {
			$('#medico').append(response);
		}
	});
}

function load_horas(){
  var medico = $("#medico").val();
  var fecha = $("#fecha").val();
  if(medico>0 && fecha!=""){
    $.ajax({
      url: 'horarios/load_horas',
      type: "POST",
      data: {medico:medico,fecha:fecha},
      success: function (response) {
        $('#tabla').html(response);
      }
    });
  }else {
    $('#tabla').html("");
  }
}

function habilitar_horario(idmedico,fecha,idhorario,value){
  $.ajax({
    url: 'horarios/habilitar_horario',
    type: "POST",
    data: {idmedico:idmedico,fecha:fecha,idhorario:idhorario,value:value},
    success: function (response) {
      if(response==0){
        /*
        swal({
          title: 'Exito!',
          text: 'Horario habilitado con exito!',
          type: 'success',
          confirmButtonColor: '#ff9933'
        }).then( function() {
        });
        */
        load_horas();
      }else {
        swal({
          title: 'Oops...',
          text: 'Hubo un error, por favor intentelo de nuevo mas tarde!',
          type: 'error',
          confirmButtonColor: '#4fb7fe'
        }).done();
      }
    }
  });

}
