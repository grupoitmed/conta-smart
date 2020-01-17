jQuery('#fecha').datepicker({
    autoclose: true
    ,todayHighlight: true,
    format: 'yyyy-mm-dd'
});

// $('#form_archivos').on('submit',(function(e) {
  // e.preventDefault();
  // var formData = new FormData(this);
  // $.ajax({
    // type:'POST',
    // url: 'Archivos/subir_archivo',
    // data:formData,
    // cache:false,
    // contentType: false,
    // processData: false,
    // success: function (response) {
      // if(response == 0){
        // swal({
          // title: 'Exito!',
          // text: 'Archivo subido con exito!',
          // type: 'success',
          // confirmButtonColor: '#ff9933'
        // }).then( function() {
          // $("#medicamento").val("").trigger('change');
          // document.getElementById("form_archivos").reset();
          cargar_detalles();
         // });
      // }else if(response == 1) {
        // swal({
          // title: 'Oops...',
          // text: 'Hubo un error al subir el archivo, por favor intentelo de nuevo mas tarde!',
          // type: 'error',
          // confirmButtonColor: '#4fb7fe'
        // }).done();
      // }else if(response == 2){
        // swal({
          // title: 'Oops...',
          // text: 'El formato del archivo seleccionado no es compatible, por favor seleccione un formato soportado!',
          // type: 'error',
          // confirmButtonColor: '#4fb7fe'
        // }).done();
      // }
    // },
  // });
// }));
