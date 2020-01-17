var accion=0;
function verificar_credito(){
	if($('#exe:checked')){
		if($('#tipo').val()=="none"){
			//$("#e_plan").text("Seleccione Interna o Importacion").addClass("msg-error").fadeIn("Slow");
			swal("Oops!", "Seleccione Interna o Importacion!");
			$('#tipo').focus(); 
			return false;
			}else{
			// if(($('#monto').val()==0) || ($('#monto').val()<0)){
			//$("#e_plan").text("Monto no puede ser Cero o Negativo").addClass("msg-error").fadeIn("Slow");
			// swal("Oops!", "Monto no puede ser Cero o Negativo!");
			// return 0;
			// }
			// else{
			$('#total').val($('#monto').val());
			// }
		}
	}
	if($('#gra:checked')){
		if($('#tipo').val()=="none"){
			//$("#e_plan").text("Seleccione Interna o Importacion").addClass("msg-error").fadeIn("Slow");
			swal("Oops!", "Seleccione Interna o Importacion!");
			$('#tipo').focus(); 
			return false;
		}
		else if($('#tipo').val()=="imp"){
			$('#total').val($('#monto').val());
		}
		else{
			//grupo carpio
			var monto = parseFloat($('#monto').val());
			
			// SUMAR SI EXISTE ALGUN VALOR AL MONTO
			var veno = parseFloat($('#ventas_no_sujetas').val());
			var venex = parseFloat($('#ventas_excentas').val()); 
			var retencion = parseFloat($('#retencion').val()); 
			
			var cf = parseFloat($('#monto').val()*0.13);
			cfd = redondeo2decimales(cf);
			$('#creditofiscal').val(cfd);	
			
			var ventasnosujetas = parseFloat(venex+veno);
			var total = parseFloat((monto+cf+ventasnosujetas)-retencion);
			totald=redondeo2decimales(total);
			$('#valortotal').val(totald);
		}
		}/*else{
		var monto = parseFloat($('#monto').val());
		
		// SUMAR SI EXISTE ALGUN VALOR AL MONTO
		var veno = parseFloat($('#ventas_no_sujetas').val());
		var venex = parseFloat($('#ventas_excentas').val()); 
		var retencion = parseFloat($('#retencion').val()); 
		
		var cf = parseFloat($('#monto').val()*0.13);
		cfd = redondeo2decimales(cf);
		$('#creditofiscal').val(cfd);	
		
		var ventasnosujetas = parseFloat(venex+veno);
		var total = parseFloat((monto+cf+ventasnosujetas)-retencion);
		totald=redondeo2decimales(total);
		$('#valortotal').val(totald);
	}*/
	accion=1;
}

function redondeo2decimales(numero)
{
	var original=parseFloat(numero);
	var result=Math.round(original*100)/100 ;
	return result;
}

function verificar_fecha_factura(){
	var fechacompra=$('#fechacompra').val();
	var numerofactura=$('#numerofactura').val();
	
	$.ajax({
		url: 'Venta/verificar_fecha_factura',
		data: {fechacompra:fechacompra,numerofactura:numerofactura},
		type: 'POST',
		success: function(response) {
			if (response == 1) {
				
				//swal("Datos validos!", "Datos verificados correctamente!", "success");
				swal("Error!", "El documento # "+numerofactura+" ya fue ingresado este mes!", "error");
				$('#fechacompra').val("");
				$('#numerofactura').val("");
			}
		}
	});
}

function verificar_fecha_factura2(){
	var fechacompra=$('#fechacompra').val();
	var numerofactura=$('#numerofactura').val();
	
	$.ajax({
		url: 'Venta/verificar_fecha_factura2',
		data: {fechacompra:fechacompra,numerofactura:numerofactura},
		type: 'POST',
		success: function(response) {
			if (response == 1) {
				
				//swal("Datos validos!", "Datos verificados correctamente!", "success");
				swal("Error!", "El documento # "+numerofactura+" ya fue ingresado este mes!", "error");
				$('#fechacompra').val("");
				$('#numerofactura').val("");
			}
		}
	});
}


function guardarcreditoventa(){
	
	var tipofactura = $('#tipofactura').val();
	var fechacompra = $('#fechacompra').val();
	var cliente = $('#cliente').val();
	var documento = $('#documento').val();
	var monto = $('#monto').val();
	var creditofiscal = $('#creditofiscal').val();
var retencion = $('#retencion').val();
var percepcion = $('#percepcion').val();
var valortotal = $('#valortotal').val();

var ventas_no_sujetas = $('#ventas_no_sujetas').val();
var ventas_excentas = $('#ventas_excentas').val();

var nrc = $('#nrc').val();
var nit = $('#nit').val();
var giro = $('#giro').val();

if(tipofactura == '' ||  fechacompra == '' ||  cliente == '' ||  documento == '' ||  monto == '' ||  creditofiscal == '' ||  retencion == '' ||  percepcion == '' ||  valortotal == '' ||  ventas_no_sujetas == '' ||  ventas_excentas == '' ||  nrc == ''  ||  nit == ''  ||  giro == '' ){
swal("Oops!", "Ningún campo debe estar vacío!");
}else{
var form = $('#frm_venta_creditofiscal').serialize();
var ruta = "Venta/saveventa";
$.ajax({
url: ruta,
type: 'POST',
data: form,
success: function(response){
swal("Guardado!", "Guardado correctamente!", "success");
$('#frm_venta_creditofiscal').trigger("reset");
load_facturasccf();
},error: function(response){
$('#respuesta').text(response.respuesta).fadeIn();
}
});
}
}
// fin de credito fical
var accion=0;
function verificar_consumidor(){
if($('#exe:checked')){
if($('#tipo').val()=="none"){
//$("#e_plan").text("Seleccione Interna o Importacion").addClass("msg-error").fadeIn("Slow");
swal("Oops!", "Seleccione Interna o Importacion!");
$('#tipo').focus(); 
return false;
}
else{
// if(($('#monto').val()==0) || ($('#monto').val()<0)){
//$("#e_plan").text("Monto no puede ser Cero o Negativo").addClass("msg-error").fadeIn("Slow");
// swal("Oops!", "Monto no puede ser Cero o Negativo!");
// return 0;
// }
// else{
$('#total').val($('#monto').val());
// }
}
}
if($('#gra:checked')){
if($('#tipo').val()=="none"){
//$("#e_plan").text("Seleccione Interna o Importacion").addClass("msg-error").fadeIn("Slow");
swal("Oops!", "Seleccione Interna o Importacion!");
$('#tipo').focus(); 
return false;
}
else if($('#tipo').val()=="imp"){
$('#total').val($('#monto').val());
}
else{
//grupo carpio
var monto = parseFloat($('#monto').val());
// SUMAR SI EXISTE ALGUN VALOR AL MONTO
var veno = parseFloat($('#ventas_no_sujetas').val());
var venex = parseFloat($('#ventas_excentas').val()); 

// sumar si existe algo en el campo


var cf = parseFloat($('#monto').val()/1.13);
var valoriva = parseFloat($('#monto').val()-cf);
cfd = redondeo2decimales(valoriva);
$('#creditofiscal').val(cfd);	


$('#valortotal').val(monto+veno+venex);
}
}
accion=1;
}

function guardarconsumidorfinal(){
var tipofactura = $('#tipofactura').val();
var fechacompra = $('#fechacompra').val();
var cliente = $('#cliente').val();
var documento = $('#documento').val();
var monto = $('#monto').val();
var creditofiscal = $('#creditofiscal').val();
var retencion = $('#retencion').val();
var percepcion = $('#percepcion').val();
var valortotal = $('#valortotal').val();

var ventas_no_sujetas = $('#ventas_no_sujetas').val();
var ventas_excentas = $('#ventas_excentas').val();

if(tipofactura == '' ||  fechacompra == '' ||  cliente == '' ||  documento == '' ||  monto == '' ||  creditofiscal == '' ||  retencion == '' ||  percepcion == '' ||  valortotal == '' ||  ventas_no_sujetas == '' ||  ventas_excentas == ''){
swal("Oops!", "Ningún campo debe estar vacío!");
}else{

var form = $('#frm_venta').serialize();
var ruta = "Venta/saveventa";
$.ajax({
url: ruta,
type: 'POST',
data: form,
success: function(response){
swal("Guardado!", "Guardado correctamente!", "success");
$('#frm_venta').trigger("reset");
load_facturascf();
},error: function(response){
$('#respuesta').text(response.respuesta).fadeIn();
}
});
}
}

$(document).on('click', '.newproveedor', function(){	
var proveedor = $('#clienteOE').val();
var nrc = $('#nrcOE').val();
var nit = $('#nitOE').val();
var giro = $('#giroOE').val();

if(proveedor == '' ||  nrc == '' || nit == '' || giro ==''){
swal("Todos los campos son obligatorios!", "Debe de verificar los campos!");
}else{	
var form = $('#frm_proveedores').serialize();
var ruta = "Credito_fiscal_venta/InsertCliente";
$.ajax({
url: ruta,
type: 'POST',
dataType:'json',
data: form,
success: function(response){
if (response == 0){
swal("Guardado!", "Guardado correctamente!", "success");
$('#frm_proveedores').trigger("reset");
load_proveedores();
$('#exampleModalCenter').modal('hide');
}else{
swal("Error!", "Algo a salido mal!", "cerrar");
}
},error: function(response){
$('#respuesta').text(response.respuesta).fadeIn();
}
});
}
});

function load_proveedores(){
$.ajax({
url: 'Credito_fiscal_venta/load_clientes',
success: function(response) {
$('#idcliente').find('option').remove().end();
$('#idcliente').append(response);
}
});
}

function getinfocliente(){
var idcliente = $('#idcliente').val();
$.ajax({
url: "Credito_fiscal_venta/getinfocliente",
type: 'POST',
dataType:'json',
data: {idcliente:idcliente},
success: function(response){
$('#nrc').val(response.nrc);
$('#giro').val(response.giro);
$('#nit').val(response.nit);
$('#cliente').val(response.cliente);
}
});
}

function load_facturasccf(fhasta,finicio,id){
fhasta	= $("#__fhasta").val();
finicio = $("#__finicio").val();
id 		= $("#__id").val();
$.ajax({
url: 'Credito_fiscal_venta/load_facturasccf',
dataType: 'HTML',
data:{fhasta:fhasta,finicio:finicio,id:id},
type: 'POST',
success: function(response){
$('#ventasccf').html(response);
}
});
}

function load_facturascf(fhasta='',finicio='',id=0){
id= $("#idempresa").val();
$.ajax({
url: 'Consumidor_final/load_facturascf',
data:{fhasta:fhasta,finicio:finicio,id:id},
type: 'POST',
dataType: 'HTML',
success: function(response){
$('#ventascf').html(response);
}
});
}

function eliminar_facturaccf(idfactura){
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
// }).then(function() {
$.ajax({
url: 'Credito_fiscal_venta/eliminar_facturaccf',
type: 'POST',
dataType:'html',
data: {idfactura:idfactura},
success: function(response){
if (response == 0){
swal("Eliminado!", "Eliminado correctamente!", "success");
load_facturasccf();
}else{
swal("Error!", "Algo a salido mal!", "cerrar");
}
}
});
// });
}


function anular_facturaccf(idfactura){

$.ajax({
url: 'Credito_fiscal_venta/anular_facturaccf',
type: 'POST',
dataType:'html',
data: {idfactura:idfactura},
success: function(response){
if (response == 0){
swal("Anulado!", "Anulado correctamente!", "success");
load_facturasccf();
}else{
swal("Error!", "Algo a salido mal!", "cerrar");
}
}
});
// });
}


function eliminar_facturacf(idfactura){
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
// }).then(function() {
$.ajax({
url: 'Consumidor_final/eliminar_facturacf',
type: 'POST',
dataType:'html',
data: {idfactura:idfactura},
success: function(response){
if (response == 0){
swal("Eliminado!", "Eliminado correctamente!", "success");
load_facturascf();
}else{
swal("Error!", "Algo a salido mal!", "cerrar");
}
}
});
// });
}


function anular_facturacf(idfactura){
$.ajax({
url: 'Consumidor_final/anular_facturacf',
type: 'POST',
dataType:'html',
data: {idfactura:idfactura},
success: function(response){
if (response == 0){
swal("Anulado!", "Anulado correctamente!", "success");
load_facturascf();
}else{
swal("Error!", "Algo a salido mal!", "cerrar");
}
}
});
// });
}


function editar_cfinal(idfactura){
$.ajax({
url: 'Consumidor_final/open_modal_edit_cf',
type: 'POST',
dataType:'HTML',
data: {idfactura:idfactura},
success: function(response){
$('#modal').html(response);
$('#modal').modal({});
}
});
}

function validar2cf(){
//grupo carpio
var monto = parseFloat($('#montoOE').val());
// SUMAR SI EXISTE ALGUN VALOR AL MONTO
var veno = parseFloat($('#ventasnsOE').val());
var venex = parseFloat($('#ventasexOE').val()); 
// sumar si existe algo en el campo
var cf = parseFloat($('#montoOE').val()/1.13);
var valoriva = parseFloat($('#montoOE').val()-cf);
cfd = redondeo2decimales(valoriva);
$('#cfOE').val(cfd);	
$('#valortotalOE').val(monto+veno+venex);
}

function actualizar_cf(idfactura){
var fechaventa = $('#fechaventaOE').val();
var nfactura = $('#nfacturaOE').val();
var monto = $('#montoOE').val();
var cf = $('#cfOE').val();
var ventasns = $('#ventasnsOE').val();
var ventasex = $('#ventasexOE').val();
var retencion = $('#retencionOE').val();
var percepcion = $('#percepcionOE').val();
var valortotal = $('#valortotalOE').val();
var cliente = $('#clienteOE').val();
$.ajax({
url: 'Consumidor_final/actualizar_cf',
type: 'POST',
dataType:'HTML',
data: {idfactura:idfactura,fechaventa:fechaventa,nfactura:nfactura,monto:monto,cf:cf,ventasns:ventasns,
ventasex:ventasex,retencion:retencion,percepcion:percepcion,valortotal:valortotal,cliente:cliente},
success: function(response){
if (response == 0){
swal("Actualizado!", "Actualizado correctamente!", "success");
load_facturascf();
$('#modal').modal('hide');
}else{
swal("Error!", "Algo a salido mal!", "cerrar");
}
}
});
}

function editar_cfiscal(idfactura){
$.ajax({
url: 'Credito_fiscal_venta/open_modal_edit_ccf',
type: 'POST',
dataType:'HTML',
data: {idfactura:idfactura},
success: function(response){
$('#modal').html(response);
$('#modal').modal({});
}
});
}
function actualizar_ccf(idfactura){
var fechaventa = $('#fechaventaOE').val();
var nfactura = $('#nfacturaOE').val();
var monto = $('#montoOE').val();
var cf = $('#cfOE').val();
var ventasns = $('#ventasnsOE').val();
var ventasex = $('#ventasexOE').val();
var retencion = $('#retencionOE').val();
var percepcion = $('#percepcionOE').val();
var valortotal = $('#valortotalOE').val();
var cliente = $('#clienteOE').val();
$.ajax({
url: 'Consumidor_final/actualizar_cf',
type: 'POST',
dataType:'HTML',
data: {idfactura:idfactura,fechaventa:fechaventa,nfactura:nfactura,monto:monto,cf:cf,ventasns:ventasns,
ventasex:ventasex,retencion:retencion,percepcion:percepcion,valortotal:valortotal,cliente:cliente},
success: function(response){
if (response == 0){
swal("Actualizado!", "Actualizado correctamente!", "success");
load_facturasccf();
$('#modal').modal('hide');
}else{
swal("Error!", "Algo a salido mal!", "cerrar");
}
}
});
}
function salir(){
window.location="https://conta-smart.com/portal/";
}
/*
function tipo(){
var tipofactura = $('#tipofactura').val();

if (tipofactura == 1){
$('#hinit').removeClass('hidden');
$('#hinrc').removeClass('hidden');
$('#higiro').removeClass('hidden');
}else{
$('#hinit').addClass('hidden');
$('#hinrc').addClass('hidden');
$('#higiro').addClass('hidden');
}


}*/