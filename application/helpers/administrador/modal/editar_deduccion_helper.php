<?php 
function editar_deduccion($tk_deduccion){
	
	$CI =& get_instance();
	$CI->load->helper('url');
	$CI->load->database();
	
	$sql = $CI->db->query("SELECT * FROM deducciones WHERE id_deduccion = ".$tk_deduccion."");
	foreach($sql->result_array() as $row){
		$fecha_documento 	= date('d-m-Y',strtotime($row['fecha_documento']));
		$fecha_aplicar 		= date('d-m-Y',strtotime($row['fecha_aplicar']));
		$fecha 				= date('d-m-Y',strtotime($row['fecha']));
		$id_tipo_retenedor 	= $row['id_tipo_retenedor'];
		$agente_retenedor 	= $row['agente_retenedor'];
		$monto 				= $row['monto'];
		$descripcion 		= $row['descripcion'];
		$documento			= $row['numero_deduccion'];
	}
	
?>
<!--Modal para nuevo proveedor-->
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
  <div class="modal-header">
	<h4 class="modal-title" id="exampleModalLongTitle" style="color:black;">Editar Deduccion</h4>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
  <div class="modal-body">
	<form id="frm_deduccion" method="POST" autocomplete="off">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label" style="color:black;">Fecha</label>
					<input type="text" class="form-control" id="fecha" name="fecha" placeholder="Fecha docuento" value="<?php echo $fecha;?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label" style="color:black;">Fecha Documento</label>
					<input type="text" class="form-control" id="fecha_documento" name="fecha_documento" placeholder="Fecha docuento" value="<?php echo $fecha_documento;?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label" style="color:black;">Fecha Aplicar</label>
					<input type="text" class="form-control" id="fecha_aplicar" name="fecha_aplicar" placeholder="Fecha docuento" value="<?php echo $fecha_aplicar;?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label" style="color:black;"># Documento</label>
					<input type="text" class="form-control" id="documento" name="documento" placeholder="# de docuento" value="<?php echo $documento;?>">
				</div>
			</div>
			<div class="col-md-12">
				<label class="control-label" style="color:black;">Agente Retendor</label>
				<div class="form-group">
					<input type="text" class="form-control" id="agente_retenedor" name="agente_retenedor" placeholder="Agente Retenedor" value="<?php echo $agente_retenedor;?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label" style="color:black;">Tipo</label>
					<select type="text" class="form-control" id="tipo_retenedor" name="tipo_retenedor" >
						<?php
							$CI->db->where("estado",0);
							$query = $CI->db->get("tipo_retenedor");
							foreach($query->result_array() AS $row){
								$selected = "";
								if($id_tipo_retenedor==$row["idtipo_retenedor"]){
									$selected = "selected";									
								}
								echo "<option ".$selected." value='".$row["idtipo_retenedor"]."'>".$row["retenedor"]."</option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label" style="color:black;">Monto</label>
					<input type="number" step="0.01" class="form-control" id="monto" name="monto" placeholder="Monto" value="<?php echo $monto;?>">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label" style="color:black;">Descripción</label>
					<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" value="<?php echo $descripcion;?>">
					<input type="hidden"  id="tk_deduccion" name="tk_deduccion" value="<?php echo $tk_deduccion;?>">
				</div>
			</div>
		</div>
	</form>
  </div>

<div class="col-lg-12 p-t-20 text-right">
	<button type="button" class="btn btn-round btn-info" onclick="actualizar_deduccion(<?php echo $tk_deduccion;?>);">Guardar</button>
	<button type="button" class="btn btn-round btn-danger" data-dismiss="modal">Cancelar</button>
</div>
</div>
</div>

<?php
}

?>



