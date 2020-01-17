<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 include 'includes/time_zone.php';

 function load_compraventas($array){
    $CI =& get_instance();
    $CI->load->helper('url');
    $CI->load->database();
	extract($array);
    $user_data_administrador = $CI->session->userdata('Administrador');
    $user_data_hospital = $CI->session->userdata('Administrador');
	// $idempresa = $CI->session->userdata['Administrador']['idempresa'];

	$ahora = date('Y-m-d');
	$nmes=array(1=>"ENERO",2=>"FEBRERO",3=>"MARZO",4=>"ABRIL",5=>"MAYO",6=>"JUNIO",7=>"JULIO",8=>"AGOSTO",9=>"SEPTIEMBRE",10=>"OCTUBRE",11=>"NOVIEMBRE",12=>"DICIEMBRE")
?>

	<div class="card card-box">
		<div class="card-head">
			<header>Informacion estadistica</header>
			<button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
				<i class="material-icons">more_vert</i>
			</button>
			<div class="mdl-menu__container is-upgraded"><div class="mdl-menu__outline mdl-menu--bottom-right"></div><ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-js-ripple-effect--ignore-events" data-mdl-for="panel-button" data-upgraded=",MaterialMenu,MaterialRipple">
				<li class="mdl-menu__item mdl-js-ripple-effect" tabindex="-1" data-upgraded=",MaterialRipple"><i class="material-icons">assistant_photo</i>Action<span class="mdl-menu__item-ripple-container"><span class="mdl-ripple"></span></span></li>
				<li class="mdl-menu__item mdl-js-ripple-effect" tabindex="-1" data-upgraded=",MaterialRipple"><i class="material-icons">print</i>Another action<span class="mdl-menu__item-ripple-container"><span class="mdl-ripple"></span></span></li>
				<li class="mdl-menu__item mdl-js-ripple-effect" tabindex="-1" data-upgraded=",MaterialRipple"><i class="material-icons">favorite</i>Something else here<span class="mdl-menu__item-ripple-container"><span class="mdl-ripple"></span></span></li>
			</ul></div>
		</div>
		<div class="card-body " id="bar-parent">
			<div id="exportTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
			<!--<div class="dt-buttons">          
			<button class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="exportTable" type="button"><span>Copy</span></button> 
			<button class="dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="exportTable" type="button"><span>CSV</span></button> 
			<button class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="exportTable" type="button"><span>Excel</span></button> 
			<button class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="exportTable" type="button"><span>PDF</span></button> 
			<button class="dt-button buttons-print" tabindex="0" aria-controls="exportTable" type="button"><span>Print</span></button> </div>-->
			<!--<div id="exportTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="exportTable"></label></div>-->
			<div class="table-responsive">
			<table id="example4" class="display nowrap dataTable" style="width: 100%;" role="grid" aria-describedby="exportTable_info">
				<thead>
					<tr role="row">
					<th style="color:#8BDB00;" class="sorting_asc" tabindex="0" aria-controls="exportTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 105px;">Año</th>
					<th style="color:#8BDB00;" class="sorting" tabindex="0" aria-controls="exportTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 168px;">Mes</th>
					<th style="color:#8BDB00;" class="sorting" tabindex="0" aria-controls="exportTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 72px;">Ventas</th>
					<th style="color:#8BDB00;" class="sorting" tabindex="0" aria-controls="exportTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 27px;">Compras</th>
					<th style="color:#8BDB00;" class="sorting" tabindex="0" aria-controls="exportTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 67px;">Acciones</th>
					</tr>
				</thead>
				<tbody>
<?php $contador = 0;
		$sql = $CI->db->query("SELECT fecha_tributaria,MONTH(fecha_tributaria) mes, YEAR(fecha_tributaria) año 
									FROM compras WHERE status = 0 
									AND idempresa = ".$idempresa."
									GROUP BY MONTH(fecha_tributaria) ORDER BY año DESC");
		foreach($sql->result_array() as $row){
		$contador ++;
		$ffin = new DateTime($row['fecha_tributaria']);
		$finicio = $row['fecha_tributaria'];
		$ffin2 = $ffin->modify('last day of this month');
		$ffin3 = $ffin2->format('Y-m-d');
		 $sql = $CI->db->query("SELECT SUM(total) total
								 FROM compras 
								 WHERE status = 0 AND MONTH(fecha_tributaria) = '".$row['mes']."'
								 AND idempresa = ".$idempresa."
								 AND YEAR(fecha_tributaria) = '".$row['año']."'");
		$total_compra = 0;
		foreach($sql->result_array() as $row2){
			$total_compra = $row2['total'];
		}
		 $sql = $CI->db->query("SELECT SUM(valor_total) total
								 FROM facturas
								 WHERE estado = 0 AND MONTH(fecha) = '".$row['mes']."'
								 AND idempresa = ".$idempresa."
								 AND YEAR(fecha) = '".$row['año']."'");
		$total_venta = 0;
		foreach($sql->result_array() as $row3){
			$total_venta = $row3['total'];
		}
		?>
			<tr role="row" class="even">
				<td><?php echo $row['año'];?></td>
				<td><?php echo $nmes[$row['mes']];?></td>
				<td class="right">$ <?php echo number_format($total_venta,2);?></td>
				<td class="right">$ <?php echo number_format($total_compra,2);?></td>
				<td class="center">
					<div class="btn-group">
					  <button type="button" class="btn btn-success">Editar</button>
					  <button type="button" class="btn btn-success dropdown-toggle m-r-20" data-toggle="dropdown">
						  <i class="fa fa-angle-down"></i>
					  </button>
					  <ul class="dropdown-menu" role="menu">
						  <li><a href="javascript:window.open('../administracion/Credito_fiscal_venta?id='+<?php echo $idempresa;?>+'&fhasta='+'<?php echo $ffin3;?>'+'&finicio='+'<?php echo $finicio;?>');">Ventas Contribuyentes</a>
						  </li>
						  <li><a href="javascript:window.open('../administracion/Consumidor_final?id='+<?php echo $idempresa;?>+'&fhasta='+'<?php echo $ffin3;?>'+'&finicio='+'<?php echo $finicio;?>');">Ventas Consumidor Final</a>
						  </li>
						  <li><a href="javascript:window.open('../administracion/Compras?id='+<?php echo $idempresa;?>+'&fhasta='+'<?php echo $ffin3;?>'+'&finicio='+'<?php echo $finicio;?>');">Reporte de Compras</a>
						  </li>
					  </ul>
				  </div>
				</td>
			</tr>
		<?php
		}
		?>
			</tbody>
			</table>
		</div>
			</div>
		</div>
	</div>
	  <script>
      $('#example4').DataTable({
        "aaSorting": [],
		"displayLength": 6,
		"lengthMenu": false
      });
  </script>
<?php
  }
?>
