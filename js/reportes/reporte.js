
function statement_loading() {
  var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="../assets/images/progress.gif" width="150" height="150"></div></div></div></div>';
  return mensaje;
}

(function() {
  [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
    new CBPFWTabs(el);
  });
})();

jQuery('#procita').datepicker({
  autoclose: true,
  todayHighlight: true,
  format: 'yyyy-mm-dd'
});
function load_trimestre(id){
 $.ajax({
        url: 'Ficha_reporte/load_trimestre',
        type: "POST",
        data: {id:id},
        success: function(response) {
            $('#trimestre1').html(response);     
        }
    });
}

function cargarselect(){
    $(".select2").select2();
}

function nuevo_trimestre(id){
    $.ajax({
        url: 'Ficha_reporte/nuevo_trimestre',
        type: "POST",
        data: {
            id: id
        },
        success: function(response) {
            $('#modal').html(response);
            $('#modal').modal({
                backdrop: 'static',
                keyboard: false
            });
                cargar_diagnosticos_siw();
                cargarselect();
        }
    });
}
function cargar_diagnosticos_siw() {
    $.ajax({
        url: 'Recetas/cargar_diagnostico',
        type: "POST",
        success: function(response) {
            $('#dia').append(response);
            $('#dia2').append(response);
            $('#dia3').append(response);
            $('#dia4').append(response);
        }
    });
}
function editar_trimestre(id){
	    $.ajax({
        url: 'Ficha_reporte/edit_modal_trimestre',
        type: "POST",
        data: {
            id: id,
            accion: "actualizar"
        },
        success: function(response) {
            $('#modal').html(response);
            $('#modal').modal({
                backdrop: 'static',
                keyboard: false
            });
                cargar_diagnosticos_siw();
                cargarselect();
        }
    });
}


function cargar_segundo_trimestre(id){
	 $.ajax({
        url: 'Ficha_reporte/load_segundo_trimestre',
        type: "POST",
        data: {id:id},
        success: function(response) {
            $('#datos_segundotrimester').html(response);     
        }
    });
}
function nuevo_segundo_trimestre(id){
     $.ajax({
        url: 'Ficha_reporte/nuevo_segundo_trimestre',
        type: "POST",
        data: {
            id: id
        },
        success: function(response) {
            $('#modal').html(response);
            $('#modal').modal({
                backdrop: 'static',
                keyboard: false
            });
                cargar_diagnosticos_siw();
                cargarselect();
        }
    });
}

function editar_segundo_trimestre(id){
	$.ajax({
        url: 'Ficha_reporte/edit_segundo_trimestre',
        type: "POST",
        data: {
            id: id,
            accion: "actualizar"
        },
        success: function(response) {
            $('#modal').html(response);
            $('#modal').modal({
                backdrop: 'static',
                keyboard: false
            });
                cargar_diagnosticos_siw();
                cargarselect();
        }
    });
}


function cargar_avanzado(id){
	    $.ajax({
        url: 'Ficha_reporte/load_avanzado',
        type: "POST",
        data: {id:id},
        success: function(response) {
            $('#datos_avanzado').html(response);     
        }
    });
}
function nuevo_avanzado(id){
    $.ajax({
        url: 'Ficha_reporte/nuevo_avanzado',
        type: "POST",
        data: {
            id: id
        },
        success: function(response) {
            $('#modal').html(response);
            $('#modal').modal({
                backdrop: 'static',
                keyboard: false
            });
                cargar_diagnosticos_siw();
                cargarselect();
        }
    });
}

function editar_trimestre_avanzado(id){
	
}


function cargar_mama(id){
	    $.ajax({
        url: 'Ficha_reporte/load_mama',
        type: "POST",
        data: {id:id},
        success: function(response) {
            $('#datos_mama').html(response);     
        }
    });
}

function nuevo_mama(id){
 $.ajax({
        url: 'Ficha_reporte/nuevo_mama',
        type: "POST",
        data: {
            id: id
        },
        success: function(response) {
            $('#modal').html(response);
            $('#modal').modal({
                backdrop: 'static',
                keyboard: false
            });
                cargar_diagnosticos_siw();
                cargarselect();
        }
    });
}

function editar_mama(id){
	
}

function cargar_ginecologia(id){
	    $.ajax({
        url: 'Ficha_reporte/load_ginecologia',
        type: "POST",
        data: {id:id},
        success: function(response) {
            $('#datos_ginecologia').html(response);     
        }
    });
}

function nuevo_ginecologia(id){
 $.ajax({
        url: 'Ficha_reporte/nuevo_ginecologia',
        type: "POST",
        data: {
            id: id
        },
        success: function(response) {
            $('#modal').html(response);
            $('#modal').modal({
                backdrop: 'static',
                keyboard: false
            });
                cargar_diagnosticos_siw();
                cargarselect();
        }
    });
}

function editar_ginecologia(id){
	
}

/* Cargar diagnostico */



/* llamar modales */

