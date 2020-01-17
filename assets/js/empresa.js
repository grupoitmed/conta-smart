
$(document).ready(function(){

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

		$(document).on('click', '.save', function(){
		var form = $('#frm_empresa').serialize();
		var ruta = "/Empresa";
		$.ajax({
			url: ruta,
			type: 'POST',
			dataType:'json',
			data: form,
			success: function(response){
				swal("Guardado!", "Guardado correctamente!", "success");
				$('#frm_empresa').trigger("reset");
			},error: function(response){
			     $('#respuesta').text(response.respuesta).fadeIn();
			}
		});
		});
	});

