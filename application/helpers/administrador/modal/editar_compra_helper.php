<?php function open_modal_edit_compra($idcompra){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();
	
	$sql = $CI->db->query("SELECT * FROM compras 
							WHERE idcompra = ".$idcompra."");
	foreach($sql->result_array() as $row){
		$fechacompra = date('d-m-Y',strtotime($row['fechacompra']));
		$idproveedor = $row['idproveedor'];
		$numdoc = $row['documento'];
		$mesaaplicar = $row['fecha_tributaria'];
		$monto = $row['monto'];
		$fovial = $row['fovial'];
		$coatrans = $row['coatrans'];
		$cf = $row['creditof'];
		$percepcion = $row['percepcion'];
		$cesc = $row['cesc'];
		$valor_total = $row['total'];
	}
	// $sql = $CI->db->query("SELECT MONTH(periodo_tributario) mes , YEAR(periodo_tributario) año FROM compras 
							// WHERE idcompra = ".$idcompra."");
	// foreach($sql->result_array() as $row1){
		// $mes_tributario = $row1['mes'];
		// $año_tributario = $row1['año'];
	// }
	// $nmes=array("lol","ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
	$sql = $CI->db->query("SELECT * FROM proveedores WHERE idproveedor = ".$idproveedor."");
	foreach($sql->result_array() as $row1){
		$proveedor = $row1['proveedor'];
	}
?>
<!--Modal para nuevo proveedor-->
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
  <div class="modal-header">
	<h4 class="modal-title" id="exampleModalLongTitle" style="color:black;">Editar Compra</h4>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
  <div class="modal-body">
  <form class="" id="frm_proveedores" method="POST" autocomplete="off">
  <div class="row">
  <div class="col-md-6">
<div class="form-group">
	<label class="control-label" style="color:black;">Fecha de compra</label>
	<input type="text" class="form-control" id="fechacompraOE" name="fechacompraOE" placeholder="Fecha de Compra" readonly value="<?php echo $fechacompra;?>">
</div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
	<label class="control-label" style="color:black;">Numero de documento</label>
	<input type="text" class="form-control" id="ndocumentoOE" name="ndocumentoOE" placeholder="# Documento"  value="<?php echo $numdoc;?>">
  </div>
  </div>
  </div>
  <div class="row">
  <div class="col-md-6">
    <div class="form-group">
	<label class="control-label" style="color:black;">Monto</label>
	<input type="text" class="form-control" id="montoOE" name="montoOE" placeholder="Monto"  value="<?php echo number_format($monto,2);?>">
  </div>
  </div>
   <div class="col-md-6">
    <div class="form-group">
	<label class="control-label" style="color:black;">Fovial</label>
	<input type="text" class="form-control" id="fovialOE" name="fovialOE" placeholder="Fovial" value="<?php echo number_format($fovial,2);?>">
  </div>
  </div>
  </div>
  <div class="row">
  <div class="col-md-6">
    <div class="form-group">
	<label class="control-label" style="color:black;">Coatrans</label>
	<input type="text" class="form-control" id="coatransOE" name="coatransOE" placeholder="Coatrans" value="<?php echo number_format($coatrans,2);?>">
  </div>
  </div>
   <div class="col-md-6">
    <div class="form-group">
	<label class="control-label" style="color:black;">Credito Fiscal</label>
	<input type="text" class="form-control" id="cfOE" name="cfOE" placeholder="Credito Fiscal" value="<?php echo number_format($cf,2);?>">
  </div>
  </div>
  </div>
  <div class="row">
  <div class="col-md-6">
    <div class="form-group">
	<label class="control-label" style="color:black;">Percepcion</label>
	<input type="text" class="form-control" id="percepcionOE" name="percepcionOE" placeholder="Percepción" value="<?php echo number_format($percepcion,2);?>">
  </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
	<label class="control-label" style="color:black;">Cesc</label>
	<input type="text" class="form-control" id="cesc" name="cesc" placeholder="cesc" value="<?php echo number_format($cesc,2);?>">
  </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
	<label class="control-label" style="color:black;">Valor Total</label>
	<input type="text" class="form-control" id="valortotalOE" name="valortotalOE" placeholder="Valor total" value="<?php echo number_format($valor_total,2);?>">
  </div>
  </div>
  </div>
  <div class="row">
   <div class="col-md-12">
  <div class="form-group">
	<label class="control-label" style="color:black;">Proveedor</label>
	<input type="text" class="form-control" id="proveedorOE" name="proveedorOE" placeholder="Proveedor" readonly autocomplete="off" value="<?php echo $proveedor;?>">
</div>
  </div>
  </div>
  </div>

<div class="col-lg-12 p-t-20 text-right">
	<button type="button" class="btn btn-round btn-primary" onclick="validar2();">Verificar</button>
	<button type="button" class="btn btn-round btn-success" onclick="actualizar_factura(<?php echo $idcompra;?>);">Guardar</button>
	<button type="button" class="btn btn-round btn-danger" data-dismiss="modal">Cancelar</button>
</div>
</form>
</div>
</div>

<?php
}

?>



