function load_compraventas(){
  $.ajax({
    url: 'Dashboard/load_compraventas',
	dataType: 'HTML',
    success: function(response){
		$('#compraventa').html('');
		$('#compraventa').html(response);
    }
  });
}

function load_compraventas2(idempresa){
  $.ajax({
    url: 'Mods_detalles/load_compraventas',
	dataType: 'HTML',
	data: {idempresa:idempresa},
	type: 'POST',
    success: function(response){
		$('#compraventa').html('');
		$('#compraventa').html(response);
    }
  });
}