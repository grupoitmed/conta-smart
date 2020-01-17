$(document).ready(function(){
	$('.select2').select2({
	theme: "bootstrap",
});
	});

    function cargar_datos_empresas(val){
      var x = $('#paciente').val();
        $.ajax({
          url: 'Usuario/cargar_datos_empresas',
          type: "POST",
          dataType: 'JSON',
          data: { datos:val },
          success: function (response) {
         $('#name').val(response.nombre);
         // $('#name').val(response.usuario);
         // $('#password').val(response.password);
         // $('#rol').val(response.idrol);
         // $('#idUsuario').val(response.idUsuario);
          }
        });
    }

    function validar(){
      var usuario = $('#idUsuario').val();
      var idempresa = $('#idempresa').val();
      var nombre = $('#nombre').val();
      var name = $('#name').val();
      var password = $('#password').val();
      var rol = $('#rol').val();

      if (idempresa == "") {
        swal("El campo empresa es obligatorio en este formulario!");
      }else if (nombre == "") {
        swal("El campo nombre es obligatorio en este formulario!");
      }else if (name == "") {
        swal("El campo usuario es obligatorio en este formulario!");
      }else if (password == "") {
        swal("El campo contraseña es obligatorio en este formulario!");
      }else if (rol == "") {
        swal("El campo rol es obligatorio en este formulario!");
      }else {
    		var ruta = "Usuario/SaveUser";
    		$.ajax({
    			url: ruta,
    			type: 'POST',
    			dataType:'json',
    			data: {usuario:usuario,
                idempresa:idempresa,
                nombre:nombre,
                name:name,
                password:password,
                rol:rol},
    			success: function(response){
            if (response == 0) {
              swal("Guardado correctamente!");
      				$('#frm_usuario').trigger("reset");
            }else {
              swal("Algo a salido mal!");
            }
    			},error: function(response){
    			     $('#respuesta').text(response.respuesta).fadeIn();
    			}
    		});
      }

    }

	function load_usuarios() {
  $.ajax({
    url: 'Usuario/load_usuarios',
    success: function(response) {
      $('#usuario').append(response);
    }
  });
}

  function editar_usuario(id) {
    $.ajax({
        url: 'Usuario/editar_usuario',
        type: "POST",
        data: {
            id: id,
        },
        success: function(response) {
            $('#exampleModalCenter').html(response);
            $('#exampleModalCenter').modal({
                backdrop: 'static',
                keyboard: false
            });
        }
    });
}
