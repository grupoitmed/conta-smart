$(document).ready(function(){

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

		$(document).on('click', '.btn-success', function(){
		var form = $('#frm_usuario').serialize();
		var ruta = "/Usuario";
		$.ajax({
			url: ruta,
			type: 'POST',
			dataType:'json',
			data: form,
			success: function(response){
				swal("Guardado!", "Guardado correctamente!", "success");
				$('#frm_usuario').trigger("reset");
			},error: function(response){
			     $('#respuesta').text(response.respuesta).fadeIn();
			}
		});
		});
	});

