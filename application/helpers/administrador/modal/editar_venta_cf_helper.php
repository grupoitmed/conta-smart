<?php function open_modal_edit_cf($idfactura){
	
	
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();
	
	$sql = $CI->db->query("SELECT * FROM facturas WHERE idFactura = ".$idfactura."");
	foreach($sql->result_array() as $row){
		$fecha_venta = date('d-m-Y',strtotime($row['fecha']));
		$facnum = $row['facNum'];
		$monto = $row['monto'];
		$cf = $row['credito_fiscal'];
		$ventasns = $row['ventas_no_sujetas'];
		$ventasex = $row['ventas_excentas'];
		$retencion = $row['retencion'];
		$percepcion = $row['percepcion'];
		$valor_total = $row['valor_total'];
		$cliente = $row['cliente'];
	}
	
?>
<!--Modal para nuevo proveedor-->
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
  <div class="modal-header">
	<h4 class="modal-title" id="exampleModalLongTitle" style="color:black;">Editar Venta Consumidor Final</h4>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
  <div class="modal-body">
  <form class="" id="frm_proveedores" method="POST" autocomplete="off">
  <div class="row">
  <div class="col-md-6">
<div class="form-group">
	<label class="control-label" style="color:black;">Fecha de Venta<label>
	<input type="text" class="form-control" id="fechaventaOE" name="fechaventaOE" placeholder="Fecha de Venta" readonly value="<?php echo $fecha_venta;?>">
</div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
	<label class="control-label" style="color:black;">Numero de Factura<label>
	<input type="text" class="form-control" id="nfacturaOE" name="nfacturaOE" placeholder="# Factura"  value="<?php echo $facnum;?>">
  </div>
  </div>
  </div>
  <div class="row">
  <div class="col-md-6">
    <div class="form-group">
	<label class="control-label" style="color:black;">Monto<label>
	<input type="text" class="form-control" id="montoOE" name="montoOE" placeholder="Monto"  value="<?php echo number_format($monto,2);?>">
  </div>
  </div>
   <div class="col-md-6">
    <div class="form-group">
	<label class="control-label" style="color:black;">Credito Fiscal<label>
	<input type="text" class="form-control" id="cfOE" name="cfOE" placeholder="Credito Fiscal" value="<?php echo number_format($cf,2);?>">
  </div>
  </div>
  </div>
  <div class="row">
  <div class="col-md-6">
    <div class="form-group">
	<label class="control-label" style="color:black;">Ventas no Sujetas<label>
	<input type="text" class="form-control" id="ventasnsOE" name="ventasnsOE" placeholder="Ventas no Sujetas" value="<?php echo number_format($ventasns,2);?>">
  </div>
  </div>
   <div class="col-md-6">
    <div class="form-group">
	<label class="control-label" style="color:black;">Ventas Excentas<label>
	<input type="text" class="form-control" id="ventasexOE" name="ventasexOE" placeholder="Ventas Excentas" value="<?php echo number_format($ventasex,2);?>">
  </div>
  </div>
  </div>
  <div class="row">
  <div class="col-md-6">
    <div class="form-group">
	<label class="control-label" style="color:black;">Retencion<label>
	<input type="text" class="form-control" id="retencionOE" name="retencionOE" placeholder="Retencion" value="<?php echo number_format($retencion,2);?>">
  </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
	<label class="control-label" style="color:black;">Percepcion<label>
	<input type="text" class="form-control" id="percepcionOE" name="percepcionOE" placeholder="Percepcion" value="<?php echo number_format($percepcion,2);?>">
  </div>
  </div>
  </div>
  <div class="row">
  <div class="col-md-6">
    <div class="form-group">
	<!--colesterol ldl quimica,insulina no dijo-->
	<label class="control-label" style="color:black;">Valor Total<label>
	<input type="text" class="form-control" id="valortotalOE" name="valortoralOE" placeholder="Valor Total" value="<?php echo number_format($valor_total,2);?>">
  </div>
  </div>
  </div>
  <div class="row">
   <div class="col-md-11">
  <div class="form-group">
	<input type="text" class="form-control" id="clienteOE" name="clienteOE" placeholder="Cliente" readonly autocomplete="off" value="<?php echo $cliente;?>">
	</div>
	  </div>
	  </div>
	  </div>
	<div class="col-lg-12 p-t-20 text-right">
	<button type="button" class="btn btn-round btn-primary" onclick="validar2cf(<?php echo $idfactura;?>);">Verificar</button>
	<button type="button" class="btn btn-round btn-success" onclick="actualizar_ccf(<?php echo $idfactura;?>);">Guardar</button>
	<button type="button" class="btn btn-round btn-danger" data-dismiss="modal">Cancelar</button>
</div>
</form>
</div>
</div>

<?php
}

?>



