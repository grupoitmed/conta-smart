function load_empresa_registro() {
  $.ajax({
    url: 'Empresas/load_empresas_registro',
    success: function(response) {
      $('#empresaload').append(response);
    }
  });
}