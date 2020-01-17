function cargar_expedientes(){
  var x = $('#paciente').val();
    if(x.length >=3){
    $.ajax({
      url: 'Index/cargar_expedientes',
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

function eliminar_expediente(id){
  swal({
    title: '¿Estas seguro?',
    text: 'Se borrara la informacion completa del paciente!',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Eliminarlo',
    cancelButtonText: 'Cancelar'
    }).then(function () {
      $.ajax({
        url: 'Index/eliminar_expediente',
        type: "POST",
        data: {id:id},
        beforeSend: function(){
          $('#myModal').modal('toggle');
          $('#myModal').modal('show');
        },
        complete: function(){
          $('#myModal').modal('hide');
        },
        success: function (response) {
          if(response == 0){
            swal({
              title: 'Exito!',
              text: 'Expedediente eliminado!',
              type: 'success',
              confirmButtonColor: '#ff9933'
            }).then( function() { cargar_expedientes(); });
          }else {
            swal({
              title: 'Oops...',
              text: 'Hubo un error al eliminar el expediente, por favor intentelo de nuevo mas tarde!',
              type: 'error',
              confirmButtonColor: '#4fb7fe'
            }).done();
          }
        }
      });
    });
}
