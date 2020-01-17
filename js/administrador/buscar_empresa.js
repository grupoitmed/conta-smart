  function cargar_empresa(val){
    // var x = $('#paciente').val();
      if(val.length >=3){
      $.ajax({
        url: 'Buscar_empresa/buscar_empresa',
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
    function cargar_empresa2(val){
    // var x = $('#paciente').val();
      if(val.length >=3){
      $.ajax({
        url: 'Mods/buscar_empresa',
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
  
    function buscar_empresa_trabajar(val,lugar=0){
    // var x = $('#paciente').val();
      if(val.length >=3){
      $.ajax({
        url: 'Ingresar_empresa/buscar_empresa',
        type: "POST",
        data: { datos:val,lugar:lugar },
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
  
  // ventas
      function buscar_empresa_trabajar_venta(val){
    // var x = $('#paciente').val();
      if(val.length >=3){
      $.ajax({
        url: 'Ingresar_empresa_venta/buscar_empresa',
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
  
  function editar_empresa(id) {
    $.ajax({
        url: 'Buscar_empresa/editar_empresa',
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
  
  
  