function load_empresa() {
  $.ajax({
    url: 'Libro_compras/listar_empresas',
    success: function(response) {
      $('#idempresa').append(response);
    }
  });
}

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
  }
  // else if (fhasta == '') {
    // swal("Seleccione fecha de fin!");
  // }
  else {
    $('#frm_compras').submit();
  }
}
