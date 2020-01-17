
jQuery(document).ready(function () {
  // Switchery
  var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
  $('.js-switch').each(function () {
      new Switchery($(this)[0], $(this).data());
  });
});


function saveFertilidad(){
	var datos = $("#formo_fertilidad").serialize();
$.ajax({
		dataType:'html',
		type:'POST',
		data:datos,
		url:'Fertilidad/guardar_test',
		async: false,
		success:function(response) {
      if (response > 0) {
        swal({
          title: 'Exito!',
          text: 'Se ha Guardado Test con exito!',
          type: 'success',
          confirmButtonColor: '#ff9933'
        }).then(function() {
           load_Citologia();
        });
      } else {
        swal({
          title: 'Oops...',
          text: 'Hubo un error al Guardar Test, por favor intentelo de nuevo mas tarde!',
          type: 'error',
          confirmButtonColor: '#4fb7fe'
        }).done();
      }
    }
		});
}
