<div class="container-fluid text-light">
	<div class="row mb-5">
		<div class="col-12 text-center">
			<h1>Agregar Mascota</h1>
		</div>
	</div>
	<form action="<?= base_url() ?>index.php/Pet/NewPet" method="POST">
		<div class="row mb-3">
			<div class="col-4">
				<div class="form-group">
					<label for="txtCliente">Cliente</label>
					<select name="txtCliente" id="txtCliente" class="form-control select2">
						<option value="-1">Seleccione</option>
						<?php
						foreach ($listClientes as $key_cliente => $cliente) {
							echo "<option value='".$cliente->ID_Cliente."'>".$cliente->Nombre." ".$cliente->Apellido."</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
					<label for="txtExpecie">Especie</label>
					<select name="txtExpecie" id="txtExpecie" class="form-control select2">
						<option value="-1">Seleccione</option>
						<?php
						foreach ($listEspecies as $key_especie => $especie) {
							echo "<option value='".$especie->ID_Especie."'>".$especie->Especie."</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
					<label for="txtSexo">Sexo</label>
					<select name="txtSexo" id="txtSexo" class="form-control select2">
						<option value="-1">Seleccione</option>
						<?php
						foreach ($listSexos as $key_sexo => $sexo) {
							echo "<option value='".$sexo->ID_Sexo."'>".$sexo->Nombre."</option>";
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-6">
				<div class="form-group">
					<label for="txtNombre">Nombre</label>
					<input type="text" class="form-control" id="txtNombre" name="txtNombre">
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label for="txtFechaNac">Fecha de Nacimiento</label>
					<input type="text" class="form-control" name="txtFechaNac" id="txtFechaNac">
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-12">
				<div class="form-group text-right">
					<button class="btn btn-success btn-lg" type="submit">Guardar Mascota</button>
				</div>
			</div>
		</div>

	</form>

	<div class="row mb-3">
		<div class="col-12">
			<div class="table-responsive">
				<table class="table table-dark" id="tablePet">
					<thead>
						<tr>
							<th>Cliente</th>
							<th>Especie</th>
							<th>Sexo</th>
							<th>Nombre</th>
							<th>FechaNacimiento</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($listMascotas as $key => $value) {
							?>
							<tr>
								<td><?= $value->nombreCliente ?> <?= $value->Apellido ?></td>
								<td><?= $value->Especie ?></td>
								<td><?= $value->nombreSexo ?></td>
								<td><?= $value->nombreMascota ?></td>
								<td><?= $value->FechaNacimiento ?></td>
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
	$(document).ready(function(){

		$(".select2").select2();

		$("#txtFechaNac").datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true,
			orientation: 'auto'
		});

	});
</script>