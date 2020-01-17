function cargar_empresa(val){
  // var x = $('#paciente').val();
    if(val.length >=3){
    $.ajax({
      url: 'Iva/buscar_empresa',
      type: "POST",
      data: { datos:val },
      beforeSend: function(){
        $('#datos_empresa').show();
        $('#datos_empresa').html('<div align="center"><h3>BUSCANDO REGISTROS COINCIDENTES</h3><img src="../../assets/images/progress.gif" width="75" height="75"></div></div>');
      },
      success: function (response) {
        $('#datos_empresa').html(response);
      }
    });
  }
}
$('#form_archivos').on('submit',(function(e) {
  e.preventDefault();
  if($("#tipo_documento").val() == 0 || $("#tipo_documento").val()== ""){
	swal('Por favor llenar el tipo de documento!');
  }else{
		var formData = new FormData(this);
	  $.ajax({
		type:'POST',
		url: 'Iva_subir_archivos/subir_archivo',
		data:formData,
		cache:false,
		contentType: false,
		processData: false,
		success: function (response) {
		  if(response == 41011){
			swal('Documento subido con exito!');
			$("#form_archivos").trigger('reset')
			cargar_archivos();
		  }else{
			swal({
			  title: 'Oops...',
			  text: 'Hubo un error al subir el archivo, por favor intentelo de nuevo mas tarde!',
			  type: 'error',
			  confirmButtonColor: '#4fb7fe'
			}).done();
		  }
		}
	  });
	}
}));

  function cargar_archivos() {
	  var idempresa = $('#id').val();
    $.ajax({
        url: 'Iva_subir_archivos/cargar_archivos',
        type: "POST",
        data: {idempresa:idempresa},
        success: function(response) {
            $('#archivos').html(response);
        }
    });
}

function eliminar_archivo(idarchivo){
	 $.ajax({
        url: 'Iva_subir_archivos/dellFile',
        type: "POST",
        data: {idarchivo:idarchivo},
        success: function(response) {
            if(response == 1){
				swal('Documento eliminado con exito!');
				cargar_archivos();
			}else{
				swal('Error al eliminar el documento!');
			}
        }
    });
}
function regresar(){
	location.href = "Iva";
}
