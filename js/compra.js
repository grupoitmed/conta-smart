var accion=0;
function verificar(){
	var cesc = parseFloat($('#cesc').val());
	if($('#exe').is(':checked')){
		if($('#tipo').val()=="none"){
			//$("#e_plan").text("Seleccione Interna o Importacion").addClass("msg-error").fadeIn("Slow");
			swal("Oops!", "Seleccione Interna o Importacion!");
			$('#tipo').focus(); 
			return false;
		}
		else{
			if(($('#monto').val()==0) || ($('#monto').val()<0)){
				//$("#e_plan").text("Monto no puede ser Cero o Negativo").addClass("msg-error").fadeIn("Slow");
				swal("Oops!", "Monto no puede ser Cero o Negativo!");
				return 0;
			}
			else{
		    totalito = parseFloat($('#monto').val());
			totalito = totalito+cesc;
			//$('#total').val($('#monto').val()+cesc);
			$('#total').val(totalito);
			}
		}
	}else if($('#grax').is(':checked')){
		if($('#tipo').val()=="none"){
			//$("#e_plan").text("Seleccione Interna o Importacion").addClass("msg-error").fadeIn("Slow");
							swal("Oops!", "Seleccione Interna o Importacion!");
			$('#tipo').focus(); 
			return false;
		}
		else if($('#tipo').val()=="imp"){
			$('#total').val($('#monto').val()+cesc);
		}
		else{
			var monto = parseFloat($('#monto').val());
			var cf = parseFloat($('#monto').val()*0.13);
			cfd=redondeo2decimales(cf);
			$('#creditof').val(cfd);
			var fovial = parseFloat($('#fovial').val());
			var coatrans = parseFloat($('#coatrans').val());
			var per = parseFloat($('#percepcion').val());
			var total = parseFloat(monto+cf+fovial+coatrans+per);
			totald=redondeo2decimales(total);
			$('#total').val(totald+cesc);
		}
	}
	accion=1;
}

function redondeo2decimales(numero)
{
	var original=parseFloat(numero);
	var result=Math.round(original*100)/100 ;
	return result;
}

function validar(){
	if(!$('#datepicker').val()){
		$("#fechacompra").text("Seleccione Fecha de Compra").addClass("msg-error").fadeIn("Slow");
		$('#datepicker').focus();
		return 0;
	}
	if($('#prov').val()=="none"){
		$("#fechacompra").text("Seleccione un proveedor").addClass("msg-error").fadeIn("Slow");
		$('#prov').focus();
		return 0;
	}
	if(!$('#doc').val()){
		$("#fechacompra").text("Ingrese el Numero de Documento").addClass("msg-error").fadeIn("Slow");
		$('#doc').focus();
		return 0;
	}
	else{
	verificar();
	if(accion==1){
		//$('#form1').submit();
	}
 }
}

$(document).ready(function(){
	$('.select2').select2({
	theme: "bootstrap",
});
	
	
		$(document).on('click', '.btn-success', function(){
		var form = $('#frm_compra').serialize();
var tipo= $('#tipo').val();			
var total= $('#total').val();
var gravex = $('#gravex').val();
var percepcion = $('#percepcion').val();
var credito = $('#credito').val();
var fcoatrans = $('#fcoatrans').val();
var fovial = $('#fovial').val();
var monto = $('#monto').val();
var documento = $('#documento').val();
var cesc = $('#cesc').val();
var idproveedor = $('#idproveedor').val();
var fechacompra	 = $('#fechacompra').val();		
			
			
	if(tipo == '' || total == '' || gravex == '' || percepcion == '' || credito == '' || fcoatrans == '' || fovial == '' || monto == '' || documento == '' || idproveedor == '' || fechacompra == ''){
				swal("Todos los campos son obligatorios!", "Debe de verificar los campos!");
	}else{
	  var ruta = "Compras/save";
		$.ajax({
			url: ruta,
			type: 'POST',
			data: form,
			success: function(response){
				swal("Guardado!", "Guardado correctamente!", "success");
				$('#frm_compra').trigger("reset");
			},error: function(response){
			     $('#respuesta').text(response.respuesta).fadeIn();
			}
		});
	}
		});
		
		
		$(document).on('click', '.newproveedor', function(){	
			var proveedor = $('#proveedor').val();
			var nrc = $('#nrc').val();
			var nit = $('#nit').val();
			var giro = $('#giro').val();
			var contacto = $('#contacto').val();
			var telefono = $('#telefono').val();
			
if(proveedor == ''||  nrc == '' || nit == '' || giro ==''){
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
				load_proveedores();
				 $('#exampleModalCenter').modal('hide');
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
	
function load_proveedores(){
  $.ajax({
    url: 'Compras/load_proveedores',
    success: function(response) {
	$('#idproveedor').find('option').remove().end();
      $('#idproveedor').append(response);
    }
  });
}
function load_agentes_retencion(){
  $.ajax({
    url: 'Compras/load_agentes_retencion',
    success: function(response) {
		$('#idproveedor').find('option').remove().end();
		$('#idproveedor').append(response);
    }
  });
}

function verificar_proveedor_documento(){
	var idproveedor=$('#idproveedor').val();
	var documento=$('#documento').val();
	
  $.ajax({
    url: 'Compras/verificar_proveedor_documento',
	data: {idproveedor:idproveedor,documento:documento},
	type: 'POST',
    success: function(response) {
	if (response == 1) {
	
          //swal("Datos validos!", "Datos verificados correctamente!", "success");
          swal("Error!", "El documento ya fue ingresado para este proveedor!", "error");
		  $('#documento').val("");
        }
    }
  });
}

function calcular_retencion(){
	calcular_factor = parseFloat($("#calcular_factor").val()); 
	monto = parseFloat($("#monto").val());
	valor= calcular_factor*monto;
	$("#retencion").val(valor.toFixed(2)); 
}
function calcular_factor2(){
	valor = $("#tipo_retenedor").val(); 
	var res = valor.split(",");
	$("#calcular_factor").val(res[1]); 
	console.log(res);
}								
function calcular_factor(){
	valor = $("#tipo_retenedor").val(); 
	var res = valor.split(",");
	$("#calcular_factor").val(res[1]); 
	console.log(res);
}
function retenedor_form(){
  $.ajax({
    url: 'Deduccion/retenedor_form',
	data: $("#retenedor_form").serialize(),
	type: 'post',
    success: function(response){
		swal("Guardado!", "Guardado correctamente!", "success");
		load_deduccion();
    }
  });
}

function load_deduccion(fhasta="",finicio="",id=""){
	id = $("#idempresa").val();
  $.ajax({
    url: 'Deduccion/load_deduccion',
	dataType: 'HTML',
	data: {fhasta:fhasta,finicio:finicio,id:id},
	type: 'post',
    success: function(response){
		$('#compras').html(response);
    }
  });
}
function load_compras(fhasta,finicio,id){
  $.ajax({
    url: 'Compras/load_compras',
	dataType: 'HTML',
	data: {fhasta:fhasta,finicio:finicio,id:id},
	type: 'post',
    success: function(response){
		$('#compras').html(response);
    }
  });
}

function eliminar_educcion(tk=0){
		// swal({
            // title: '¿Estas seguro?',
            // text: '¡Se eliminara el registro y no podra recuperarse!',
            // type: 'error',
            // showCancelButton: true,
            // confirmButtonColor: '#f77445',
            // cancelButtonColor: '#44b2f7',
            // allowOutsideClick: false,
            // confirmButtonText: 'Si, Eliminar',
            // cancelButtonText: 'Cancelar'
        // }).then(function() {
			$.ajax({
				url: 'Deduccion/eliminar_educcion',
				type: 'POST',
				dataType:'html',
				data: {tk},
				success: function(response){
					if(response == 0){
						swal("Eliminado!", "Eliminado correctamente!", "success");
						load_deduccion();
					}else{
					  swal("Error!", "Algo a salido mal!", "cerrar");
					}
				}
			});
        // });
}

function eliminar_compra(idcompra){
		// swal({
            // title: '¿Estas seguro?',
            // text: '¡Se eliminara el registro de la factura y no podra recuperarse!',
            // type: 'error',
            // showCancelButton: true,
            // confirmButtonColor: '#f77445',
            // cancelButtonColor: '#44b2f7',
            // allowOutsideClick: false,
            // confirmButtonText: 'Si, Eliminar',
            // cancelButtonText: 'Cancelar'
        // }).then(function(){
			$.ajax({
			url: 'Compras/eliminar_compra',
			type: 'POST',
			dataType:'html',
			data: {idcompra:idcompra},
			success: function(response){
			if (response == 0){
			  swal("Eliminado!", "Eliminado correctamente!", "success");
					load_compras();
			}else{
			  swal("Error!", "Algo a salido mal!", "cerrar");
			}
			}
			});
        // });
}

function editar_deduccion(tk=0){
	$.ajax({
		url: 'Deduccion/editar_deduccion',
		type: 'POST',
		data: {tk},
		success: function(response){
			$('#modal').html(response);
			$('#modal').modal({});
		}
	});
}

function editar_compra(idcompra){
	$.ajax({
	url: 'Compras/open_modal_edit_compra',
	type: 'POST',
	dataType:'HTML',
	data: {idcompra:idcompra},
	success: function(response){
	 $('#modal').html(response);
	 $('#modal').modal({});
	}
	});
}

function validar2(){
	var monto = parseFloat($('#montoOE').val());
	var cf = parseFloat($('#montoOE').val()*0.13);
	cfd=redondeo2decimales(cf);
	$('#cfOE').val(cfd);
	var fovial = parseFloat($('#fovialOE').val());
	var coatrans = parseFloat($('#coatransOE').val());
	var per = parseFloat($('#percepcionOE').val());
	var total = parseFloat(monto+cf+fovial+coatrans+per);
	totald=redondeo2decimales(total);
	$('#valortotalOE').val(totald);
}

function actualizar_factura(idcompra){
	var monto = $('#montoOE').val();
	var fovial = $('#fovialOE').val();
	var coatrans = $('#coatransOE').val();
	var cf = $('#cfOE').val();
	var percepcion = $('#percepcionOE').val();
	var valor_total = $('#valortotalOE').val();
	
	$.ajax({
	url: 'Compras/actualizar_factura',
	type: 'POST',
	dataType:'html',
	data: {monto:monto,fovial:fovial,coatrans:coatrans,cf:cf,percepcion:percepcion,valor_total:valor_total,idcompra:idcompra},
	success: function(response){
	if (response == 0){
	  swal("Actualizado!", "Actualizado correctamente!", "success");
			load_compras();
			$('#modal').modal('hide');
	}else{
	  swal("Error!", "Algo a salido mal!", "cerrar");
	}
	}
	});
}
function actualizar_deduccion(idcompra){
	
	$.ajax({
	url: 'Deduccion/actualizar_deduccion',
	type: 'POST',
	data: $("#frm_deduccion").serialize(),
	success: function(response){
		if (response == 0){
		  swal("Actualizado!", "Actualizado correctamente!", "success");
				load_deduccion();
				$('#modal').modal('hide');
		}else{
		  swal("Error!", "Algo a salido mal!", "cerrar");
		}
	}
	});
}
function salir(){
	window.location="https://conta-smart.com/drquintanilla/";
}









