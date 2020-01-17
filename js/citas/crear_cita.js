function cargar_expedientes(){
  var x = $('#paciente').val();
    if(x.length >=3){
    $.ajax({
      url: 'Crear_cita/cargar_expedientes',
      type: "POST",
      data: { datos:x },
      beforeSend: function(){
        $('#datos_expedientes').show();
        $('#datos_expedientes').html('<div align="center"><h3>BUSCANDO REGISTROS COINCIDENTES</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
      },
      success: function (response) {
        $('#datos_expedientes').html(response);
      }
    });
  }
}

function statement_loading(){
  var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="../assets/images/progress.gif" width="150" height="150"></div></div></div></div>';
  return mensaje;
}

function registro_rapido(){
    $.ajax({
      url: 'Crear_cita/registro_rapido',
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
