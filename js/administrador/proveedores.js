$(document).ready(function(){

		$(document).on('click', '.saveproveedor', function(){
			
			var proveedor = $('#proveedor').val();
			var nrc = $('#nrc').val();
			var nit = $('#nit').val();
			var giro = $('#giro').val();
			var contacto = $('#contacto').val();
			var telefono = $('#telefono').val();
			
if(proveedor == ''||  nrc == '' || nit == '' || giro =='' || contacto == '' || telefono == ''){
		swal("Todos los campos son obligatorios!", "Debe de verificar los campos!");
}else{
	

		var form = $('#frm_proveedores').serialize();
		var ruta = "Proveedor/InsertProvider";
		$.ajax({
			url: ruta,
			type: 'POST',
			dataType:'json',
			data: form,
			success: function(response){
        if (response == 0) {
          swal("Guardado!", "Guardado correctamente!", "success");
  				$('#frm_proveedores').trigger("reset");
        }else {
          swal("Error!", "Algo a salido mal!", "cerrar");
        }
			},error: function(response){
			     $('#respuesta').text(response.respuesta).fadeIn();
			}
		});
		}
		});



	});

  function cargar_proveedores(val){
    // var x = $('#paciente').val();
      if(val.length >=3){
      $.ajax({
        url: 'Buscar_proveedor/buscar_proveedores',
        type: "POST",
        data: { datos:val },
        beforeSend: function(){
          $('#datos_proveedor').show();
          $('#datos_proveedor').html('<div align="center"><h3>BUSCANDO REGISTROS COINCIDENTES</h3><img src="../../assets/images/progress.gif" width="75" height="75"></div></div>');
        },
        success: function (response) {
          $('#datos_proveedor').html(response);
        }
      });
    }
  }
  
  
    function editar_proveedor(id) {
    $.ajax({
        url: 'Proveedor/editar_proveedor',
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
