

$('.select2').select2({
	theme: "bootstrap",
});

function validar(){
  var idempresa = $('#idempresa').val();
  var finicio = $('#finicio').val();
  var fhasta = $('#fhasta').val();

  if (idempresa == '') {
    swal("Seleccione el campo empresa!");
  }else if (finicio == '') {
    swal("Seleccione fecha de inicio!");
  }else if (fhasta == '') {
    swal("Seleccione fecha de fin!");
  }else {
	  window.open('Buscar_reporte_ventas_consumidor_final/imprimircf?idempresa='+idempresa+'&finicio='+finicio+'&fhasta='+fhasta);
		// $.ajax({
    		// url: 'Buscar_reporte_ventas_consumidor_final/imprimircf',
    		// type: 'POST',
    		// data: {idempresa:idempresa,finicio:finicio,fhasta:fhasta},
			// success: function(response){
				// window.open(response);
    			// }
  // });
}
}

function regresar(){
	window.location.href = "Dashboard";
}

