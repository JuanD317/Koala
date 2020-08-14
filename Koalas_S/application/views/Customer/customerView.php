<div class="container-fluid text-light">
	<div class="row mb-5 mt-3">
		<div class="col-12 text-center">
			<h1>Create customer</h1>
		</div>
	</div>
	<form action="<?= base_url() ?>index.php/Customer/NewCustomer" method="POST">
		<div class="row mb-4">
			<div class="col-4">
				<div class="form-group">
					<label for="txtNombre">Name</label>
					<input type="text" class="form-control" name="txtNombre" id="txtNombre">
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
					<label for="txtApellido">Last Name</label>
					<input type="text" class="form-control" name="txtApellido" id="txtApellido">
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
					<label for="txtSexo">Gender</label>
					<select name="txtSexo" id="txtSexo" class="form-control select2">
						<option value="-1">Select</option>
						<?php
						foreach ($listSexos as $key_sexo => $sexo) {
							echo "<option value='".$sexo->ID_Sexo."'>".$sexo->Nombre."</option>";
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="row mb-4">
			<div class="col-4">
				<div class="form-group">
					<label for="txtDui">DUI</label>
					<input type="text" class="form-control" name="txtDui" id="txtDui">
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
					<label for="txtNit">NIT</label>
					<input type="text" class="form-control" name="txtNit" id="txtNit">
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
					<label for="txtRegistro">Registration No.</label>
					<input type="text" class="form-control" name="txtRegistro" id="txtRegistro">
				</div>
			</div>
		</div>
		<div class="row mb-4">
			<div class="col-4">
				<div class="form-group">
					<label for="txtFechaNac">Date of birth</label>
					<input type="text" class="form-control" name="txtFechaNac" id="txtFechaNac">
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
					<label for="txtCorreo">Email</label>
					<input type="email" class="form-control" name="txtCorreo" id="txtCorreo">
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
					<label for="txtTelefono">Telephone</label>
					<input type="text" class="form-control" name="txtTelefono" id="txtTelefono">
				</div>
			</div>
		</div>
		<div class="row mb-4">
			<div class="col-6">
				<div class="form-group">
					<label for="txtDepartamento">Department</label>
					<select name="txtDepartamento" id="txtDepartamento" class="form-control select2" style="width: 100%;">
						<option value="-1">Select</option>
						<?php
						foreach ($listDepartamentos as $key_departamento => $departamento) {
							echo "<option value='".$departamento->ID_Departamento."'>".$departamento->Departamento."</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label for="txtMunicipio">Municipality</label>
					<select name="txtMunicipio" id="txtMunicipio" class="form-control select2" style="width: 100%;">
						<option value="-1">Select</option>
						<?php
						foreach ($listMunicipios as $key_municipio => $municipio) {
							echo "<option value='".$municipio->ID_Municipio."'>".$municipio->Municipio."</option>";
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="row mb-4">
			<div class="col-12">
				<div class="form-group">
					<label for="txtDireccion">Address</label>
					<input type="text" class="form-control" name="txtDireccion" id="txtDireccion">
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-12">
				<div class="form-group text-right">
					<button class="btn btn-success btn-lg" type="submit">Save Customer</button>
				</div>
			</div>
		</div>
	</form>
	<div class="row">
		<div class="col-md-12">
			<table class="table nowrap display">
				<thead>
					<tr>
						<th>Name</th>
						<th>DUI</th>
						<th>NIT</th>
						<th>Registration No.</th>
						<th>Gender</th>
						<th>Address</th>
						<th>Date Birth</th>
						<th>Email</th>
						<th>Telephone</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listClientes as $key_cliente => $cliente): ?>
						<tr>
							<td><?= $cliente->Nombre." ".$cliente->Apellido ?></td>
							<td><?= $cliente->Dui ?></td>
							<td><?= $cliente->Nit ?></td>
							<td><?= $cliente->NoRegistro ?></td>
							<td><?= $cliente->NombreSexo ?></td>
							<td><?= $cliente->Direccion.", ".$cliente->Departamento." ".$cliente->Municipio ?></td>
							<td><?= $cliente->FechaNacimiento ?></td>
							<td><?= $cliente->Correo ?></td>
							<td><?= $cliente->Telefono ?></td>
							<td>
								<button class="btn btn-warning btn-lg" type="button">Edit</button>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){

		$(".select2").select2();

		$("#txtFechaNac").datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});

	});
</script>