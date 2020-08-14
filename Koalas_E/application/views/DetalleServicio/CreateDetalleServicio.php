<section class="bg-white clearfix first-section" id="home"> 
	<div class="container h-100">
<div class="row mb-3">
	<div class="col-12 text-center">
		<h1>Crear Servicio</h1>
	</div>
</div>	
<form action="<?= base_url() ?>index.php/DetalleServicio/NewDetalleServicio" method="POST">
	<div class="row mb-3">
		<div class="col-6">
			<div class="form-group">
				<label for="txtNombre">Nombre</label>
				<input type="text" id="txtNombre" name="txtNombre" class="form-control">
			</div>
		</div>
		<div class="col-6">
			<div class="form-group">
				<label for="txtDescripcion">Descrpición</label>
				<input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control">
			</div>
		</div>
	</div>
	<div class="row mb-3">
		<div class="col-6">
			<div class="form-group">
				<label for="txtCosto">Costo</label>
				<input type="text" id="txtCosto" name="txtCosto" class="form-control">
			</div>
		</div>
			<div class="col-6">
			<div class="form-group">
				<label for="txtPrecio">Precio</label>
				<input type="text" id="txtPrecio" name="txtPrecio" class="form-control">
			</div>
		</div>
	</div>
		<div class="row mb-3">
		<div class="col-6">
			<div class="form-group">
				<label for="txtTiempoDuracion">TiempoDuracion</label>
				<input type="text" id="txtTiempoDuracion" name="txtTiempoDuracion" class="form-control">
			</div>
		</div>
	</div>
	<div class="row mb-3">
		<div class="col-12">
			<div class="form-group">
				<button class="btn btn-outline-success btn-lg" type="submit">Guardar Servicio</button>
			</div>
		</div>
	</div>
</form>

<div class="row mb-3">
	<div class="col-12">
		<div class="table-responsive">
			<table class="table table-dark" id="tableDetalleServicio">
				<thead>
					<tr>
						<th>ID_DetalleServicio</th>
						<th>ID_Servicio</th>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Costo</th>
						<th>Precio</th>
						<th>TiempoDuracion</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($listDetalleServicio as $key => $value) {
						?>
						<tr>
							<td><?= $value->ID_DetalleServicio ?></td>
							<td><?= $value->ID_Servicio ?></td>
							<td><?= $value->Nombre ?></td>
							<td><?= $value->Descripcion ?></td>
							<td><?= $value->Costo ?></td>
							<td><?= $value->Precio ?></td>
							<td><?= $value->TiempoDuracion ?></td>
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
</section>
<script>

	$(document).ready(function() {
	    $('#tableDetalleServicio').DataTable();
	} );

</script>