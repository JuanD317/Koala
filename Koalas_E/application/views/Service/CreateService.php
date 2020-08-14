<div class="container-fluid text-light">
	<div class="row">
		<div class="col-lg-12">
			<h1>Servicio</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form action="<?= base_url() ?>index.php/Service/newService" method="POST" id="formService">
				<input type="hidden" id="txtIdService" name="txtIdService">
				<div class="row mb-3">
					<div class="col-md-6">
						<div class="form-group">
							<label for="slcTipoServicio">Tipo Servicio</label>
							<select name="slcTipoServicio" id="slcTipoServicio" class="select2 form-control">
								<option value="-1">Seleccione</option>
								<?php foreach ($listTipoServicios as $key_TipoServicio => $TipoServicio): ?>
									<option value="<?= $TipoServicio->ID_TipoServicio ?>"><?= $TipoServicio->TipoServicio ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="txtServicio">Nombre de Servicio</label>
							<input type="text" class="form-control" id="txtServicio" name="txtServicio">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="txtDescripcion">Descripcion</label>
							<textarea name="txtDescripcion" id="txtDescripcion" cols="1" rows="3" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="row mb-3 mt-3">
					<div class="col-md-12">
						<hr style="background-color: white; height: 5px;">
						<h1>Detalle de Servicio</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="txtNombre">Nombre</label>
							<input type="text" class="form-control" id="txtNombre" name="txtNombre">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="txtDescripcionDetalle">Descripcion</label>
							<textarea id="txtDescripcionDetalle" name="txtDescripcionDetalle" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="txtCosto">Costo</label>
							<input type="text" class="form-control" id="txtCosto" name="txtCosto">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="txtPrecio">Precio</label>
							<input type="text" class="form-control" id="txtPrecio" name="txtPrecio">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="txtTiempoDuracion">Tiempo Duracion</label>
							<input type="text" class="form-control" id="txtTiempoDuracion" name="txtTiempoDuracion">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group text-right">
							<button class="btn btn-primary btn-lg" type="button" onclick="add_agents_general_data()">Agregar detalle de servicio</button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table nowrap">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Descripcion</th>
									<th>Costo</th>
									<th>Precio</th>
									<th>Tiempo de duracion</th>
									<th>Accion</th>
								</tr>
							</thead>
							<tbody id="destino_table">
								
							</tbody>
						</table>
					</div>
				</div>
				<div class="row mb-5 mt-5">
					<div class="col-12">
						<div class="form-group text-left" id="btnAdd">
							<button class="btn btn-success btn-lg" type="submit">Guardar Servicio</button>
						</div>
						<div class="form-group text-left" id="btnEdit" style="display: none;">
							<button class="btn btn-info btn-lg" type="button" onclick="UpdateService()">Editar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="row mb-3 mt-3">
		<div class="col-md-12">
			<hr style="background-color: white; height: 5px;">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h1>Reporte de Servicios</h1>
			<table class="table nowrap">
				<thead>
					<tr>
						<th>Tipo Servicio</th>
						<th>Creado por</th>
						<th>Servicio</th>
						<th>Descripcion</th>
						<th>Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listService as $key_Service => $Service): ?>
						<tr>
							<td><?= $Service->TipoServicio ?></td>
							<td><?= $Service->NombreUsuario." ".$Service->ApellidoUsuario ?></td>
							<td><?= $Service->NombreServicio ?></td>
							<td><?= $Service->Descripcion ?></td>
							<td>
								<button class="btn btn-info btn-lg" type="button" data-toggle="modal" data-target="#detalleServicio" onclick="DetalleServicio('<?= $Service->ID_Servicio ?>')">Detalles</button>
								<button class="btn btn-warning btn-lg" type="button" onclick="ChargeService('<?= $Service->ID_Servicio ?>','<?= $Service->ID_Usuario ?>', '<?= $Service->NombreServicio ?>', '<?= $Service->Descripcion ?>')">Editar</button>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="detalleServicio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detalle de servicio</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="content_modal">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<!-- /Modal -->

<script type="text/javascript" src="<?php echo base_url() ?>assets/js/Servicio/main.js"></script>

<script>

	$(document).ready(function(){
		$(".datepicker").datepicker({
			autoclose: "TRUE",
			format: "yyyy-mm-dd"
		});
	});

	function ChargeService(id_Service, id_usuario, Service, descripcion){
		$("#txtIdService").val(id_Service);
		$("#slcTipoServicio").val(id_usuario).trigger("change");
		$("#txtServicio").val(Service);
		$("#txtDescripcion").val(descripcion);

		$("#btnAdd").hide();
		$("#btnEdit").show();
	}

	function UpdateService(){

		$.ajax({
			type: "POST",
			url: "<?= base_url() ?>index.php/Service/updateService",
			data: $("#formService").serialize(),
			success: function(){
				location.reload();
			}
		})

	}

	function DetalleServicio(valor){
		$.ajax({
			type: "POST",
			url: "<?= base_url() ?>index.php/Service/DetalleServicio",
			data: {detalleServicio: valor},
			success: function(html){
				$("#content_modal").html(html);
			}
		})
	}
</script>