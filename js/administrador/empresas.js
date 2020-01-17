
$(document).ready(function(){


		$(document).on('click', '.save', function(){
		var form = $('#frm_empresa').serialize();
					var rz = $('#razonsocial').val();
					var nrc = $('#nrc').val();
					var nit = $('#nit').val();
					var giro = $('#giro').val();
					var direccion = $('#direccion').val();
					var pais = $('#pais').val();
					var ncontacto = $('#ncontacto').val();
					var telefono = $('#telefono').val();
					var email = $('#email').val();
			if(rz == '' || nrc == '' || nit == '' || giro == '' || direccion == '' || pais == ''|| ncontacto == ''|| telefono == ''|| email == ''){
				    swal("Todos los campos son obligatorios!", "Debe de verificar los campos!");
			}else{
		var ruta = "Empresas/saveEmpresa";
		$.ajax({
			url: ruta,
			type: 'POST',
			dataType:'json',
			data: form,
			success: function(response){
				if (response == 0) {
          swal("Guardado!", "Guardado correctamente!", "success");
  				$('#frm_empresa').trigger("reset");
        }else {
          swal("Error!", "Por favor intentelo mas tarde!", "salir");
        }
			},error: function(response){
			     $('#respuesta').text(response.respuesta).fadeIn();
			}
		});
			}


		});
	});
