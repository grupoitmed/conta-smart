$(function(){
  $(".select2").select2();
  $('#fecha').datepicker({
      autoclose: true
      ,todayHighlight: true,
      format: 'yyyy-mm-dd'
  });

  $('#proxima_cita').datepicker({
      autoclose: true
      ,todayHighlight: true,
      format: 'yyyy-mm-dd'
  });
});

function cargar_medicamentos(){
  $.ajax({
    url: 'Recetas/cargar_medicamentos',
    type: "POST",
    success: function (response) {
      $('#medicamento').append(response);
    }
  });
}

function cargar_detalles(){
  var id = $("#idreceta").val();
  $.ajax({
    url: 'Recetas/cargar_detalles',
    type: "POST",
    data: { id:id },
    success: function (response) {
      $('#detalles').html(response);
    }
  });
}

function editar_detalle(id){
  $.ajax({
    url: 'Recetas/editar_detalle',
    type: "POST",
    data: {id:id},
    success: function (response) {
      $('#modal').html(response);
      $('#modal').modal({backdrop: 'static', keyboard: false});
    }
  });
}

function editar_medicamento_receta(){
  var datos = $("#form_recetas_edit").serialize();
  if($("#medicamentos").val() == ""){ swal("No ha seleccionado un medicamento");}
  else if($("#vias").val() == ""){ swal("No ha seleccionado la via del medicamento");}
  else if($("#indicaciones_edit").val() == ""){ swal("No ha escrito ninguna indicacion del medicamento");}
  else{
    $.ajax({
      url: 'Recetas/modificar_detalle',
      type: "POST",
      data: datos,
      beforeSend: function(){
        $('#modal').modal('hide');
      },
      success: function (response) {
        if(response == 0){
          swal({
            title: 'Exito!',
            text: 'Medicamento actualizado!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() { cargar_detalles(); });
        }else {
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

function eliminar_detalle(medicamento){
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
  }).then(function () {
    $.ajax({
      url: 'Recetas/eliminar_detalle',
      type: "POST",
      data: { medicamento:medicamento },
      success: function (response) {
        if(response == 0){
          swal({
            title: 'Exito!',
            text: 'Medicamento eliminado!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() { cargar_detalles(); });
        }else {
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

function agregar_medicamento(){
  $.ajax({
    url: 'Recetas/nuevo_medicamento',
    type: "POST",
    success: function (response) {
      $('#modal').html(response);
      $('#modal').modal({backdrop: 'static', keyboard: false});
    }
  });
}

function guardar_medicamento(){
  var datos = $("#form_medicamento").serialize();
  $.ajax({
    url: 'Recetas/guardar_medicamento',
    type: "POST",
    data: datos,
    beforeSend: function(){
      $('#modal').modal('hide');
    },
    success: function (response) {
      if(response == 0){
        swal({
          title: 'Exito!',
          text: 'Medicamento guardado!',
          type: 'success',
          confirmButtonColor: '#ff9933'
        }).then( function() { cargar_medicamentos(); });
      }else {
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

function guardar_receta(){
  if($("#medicamento").val() == ""){ swal("No ha seleccionado un medicamento");}
  else if($("#via").val() == ""){ swal("No ha seleccionado la via del medicamento");}
  else if($("#indicaciones").val() == ""){ swal("No ha escrito ninguna indicacion del medicamento");}
  else{
    var datos = $("#form_receta").serialize();
    var estado = $("#idreceta").val();
    if(estado == 0){
      $.ajax({
        url: 'Recetas/guardar_receta',
        type: "POST",
        data: datos,
        success: function (response) {
          if(response > 0){
            $('#idreceta').val(response);
            swal({
              title: 'Exito!',
              text: 'Medicamento agregado a la receta!',
              type: 'success',
              confirmButtonColor: '#ff9933'
            }).then( function() {
              $("#medicamento").val("").trigger('change');
              document.getElementById("form_receta").reset();
              $('#imprimir').removeAttr("disabled");
              cargar_detalles(); });
          }else {
            swal({
              title: 'Oops...',
              text: 'Hubo un error al agregar el medicamento a la receta, por favor intentelo de nuevo mas tarde!',
              type: 'error',
              confirmButtonColor: '#4fb7fe'
            }).done();
          }
        }
      });
    }
    else{
      $.ajax({
        url: 'Recetas/agregar_detalles',
        type: "POST",
        data: datos,
        success: function (response) {
          if(response == 0){
            swal({
              title: 'Exito!',
              text: 'Medicamento agregado a la receta!',
              type: 'success',
              confirmButtonColor: '#ff9933'
            }).then( function() { $("#medicamento").val("").trigger('change');document.getElementById("form_receta").reset();cargar_detalles(); });
          }else {
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

function finalizar(){
  if($('#idreceta').val() != ""){
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
    }).then(function () {
        window.close();
    });
  }else{ window.close(); }
}

function imprimir_receta(){
  if($('#idreceta').val() != ""){
    window.open("Imprimir/imprimir_receta?idr="+$('#idreceta').val());
  }
}
