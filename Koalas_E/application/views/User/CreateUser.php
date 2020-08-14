<div class="container-fluid text-light">
	<div class="row mb-3">
		<div class="col-12 text-center">
			<h1>Crear nuevo Usuario</h1>
		</div>
	</div>
	<form action="<?= base_url() ?>index.php/User/NewUser" method="POST">
		<div class="row mb-3">
			<div class="col-6">
				<div class="form-group">
					<label for="txtNombre">Nombre</label>
					<input type="text" id="txtNombre" name="txtNombre" class="form-control">
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label for="txtApellido">Apellido</label>
					<input type="text" id="txtApellido" name="txtApellido" class="form-control">
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-4">
				<div class="form-group">
					<label for="txtUser">Usuario</label>
					<input type="text" id="txtUser" name="txtUser" class="form-control">
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
					<label for="txtPass">Contraseña</label>
					<input type="password" id="txtPass" name="txtPass" class="form-control">
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
					<label for="slcTipoUser">Tipo de usuario</label>
					<select name="slcTipoUser" id="slcTipoUser" class="form-control">
						<option value="2">Empleado</option>
						<option value="1">Administrador</option>
						<option value="3">Cliente</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-12">
				<div class="form-group">
					<button class="btn btn-success btn-lg" type="submit">Guardar Usuario</button>
				</div>
			</div>
		</div>
	</form>

	<div class="row mb-3">
		<div class="col-12">
			<div class="table-responsive">
				<table class="table table-dark" id="tableUser">
					<thead>
						<tr>
							<th>ID_Usuario</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Usuario</th>
							<th>TipoUsuario</th>
							<th>FechaCreación</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($listUsers as $key => $value) {
							?>
							<tr>
								<td><?= $value->ID_Usuario ?></td>
								<td><?= $value->Nombre ?></td>
								<td><?= $value->Apellido ?></td>
								<td><?= $value->Usuario ?></td>
								<td>
									<?php
									switch ($value->TipoUsuario) {
										case 1:
											# code...
											echo "Administrador";
											break;
										case 2:
											# code...
											echo "Empleado";
											break;
										case 3:
											# code...
											echo "Usuario";
											break;
										default:
											# code...
											break;
									}
									?>
								</td>
								<td><?= $value->FechaCreacion ?></td>
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