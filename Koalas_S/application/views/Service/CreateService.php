<div class="container-fluid text-light">
	<div class="row">
		<div class="col-lg-12">
			<h1>Service</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<form action="<?= base_url() ?>index.php/Service/newService" method="POST" id="formService">
				<input type="hidden" id="txtIdService" name="txtIdService">
				<div class="row mb-3">
					<div class="col-md-6">
						<div class="form-group">
							<label for="slcTipoServicio">Service Type</label>
							<select name="slcTipoServicio" id="slcTipoServicio" class="select2 form-control">
								<option value="-1">Select</option>
								<?php foreach ($listTipoServicios as $key_TipoServicio => $TipoServicio): ?>
									<option value="<?= $TipoServicio->ID_TipoServicio ?>"><?= $TipoServicio->TipoServicio ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="txtServicio">Service Name</label>
							<input type="text" class="form-control" id="txtServicio" name="txtServicio">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="txtDescripcion">Description</label>
							<textarea name="txtDescripcion" id="txtDescripcion" cols="1" rows="3" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="row mb-3 mt-3">
					<div class="col-md-12">
						<hr style="background-color: white; height: 5px;">
						<h1>Service Detail</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="txtNombre">Name</label>
							<input type="text" class="form-control" id="txtNombre" name="txtNombre">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="txtDescripcionDetalle">Description</label>
							<textarea id="txtDescripcionDetalle" name="txtDescripcionDetalle" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="txtCosto">Cost</label>
							<input type="text" class="form-control" id="txtCosto" name="txtCosto">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="txtPrecio">Price</label>
							<input type="text" class="form-control" id="txtPrecio" name="txtPrecio">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="txtTiempoDuracion">Duration time</label>
							<input type="text" class="form-control" id="txtTiempoDuracion" name="txtTiempoDuracion">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group text-right">
							<button class="btn btn-primary btn-lg" type="button" onclick="add_agents_general_data()">Add service detail</button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table nowrap">
							<thead>
								<tr>
									<th>Name</th>
									<th>Description</th>
									<th>Cost</th>
									<th>Price</th>
									<th>Duration time</th>
									<th>Action</th>
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
							<button class="btn btn-success btn-lg" type="submit">Save Service</button>
						</div>
						<div class="form-group text-left" id="btnEdit" style="display: none;">
							<button class="btn btn-info btn-lg" type="button" onclick="UpdateService()">Edit</button>
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
			<h1>Services Report</h1>
			<table class="table nowrap">
				<thead>
					<tr>
						<th>Service Type</th>
						<th>Created by</th>
						<th>Service</th>
						<th>Description</th>
						<th>Action</th>
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
								<button class="btn btn-info btn-lg" type="button" data-toggle="modal" data-target="#detalleServicio" onclick="DetalleServicio('<?= $Service->ID_Servicio ?>')">Details</button>
								<button class="btn btn-warning btn-lg" type="button" onclick="ChargeService('<?= $Service->ID_Servicio ?>','<?= $Service->ID_Usuario ?>', '<?= $Service->NombreServicio ?>', '<?= $Service->Descripcion ?>')">Edit</button>
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
				<h5 class="modal-title" id="exampleModalLabel">Service detail</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="content_modal">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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