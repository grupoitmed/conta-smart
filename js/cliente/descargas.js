function load_archivos(){
 var tipo_documento = $('#tipo_documento').val();
  $.ajax({
    url: 'Descargas/load_archivos',
	dataType: 'HTML',
    type:'POST',
	data:{tipo_documento:tipo_documento},
    success: function(response){
		$('#tabla_archivos').html('');
		$('#tabla_archivos').html(response);
    }
  });
}