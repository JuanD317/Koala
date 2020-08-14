<div class="container-fluid text-light">
	<div class="row mb-3">
		<div class="col-12 text-center">
			<h1>Create new User</h1>
		</div>
	</div>
	<form action="<?= base_url() ?>index.php/User/NewUser" method="POST">
		<div class="row mb-3">
			<div class="col-6">
				<div class="form-group">
					<label for="txtNombre">Name</label>
					<input type="text" id="txtNombre" name="txtNombre" class="form-control">
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label for="txtApellido">Last Name</label>
					<input type="text" id="txtApellido" name="txtApellido" class="form-control">
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-4">
				<div class="form-group">
					<label for="txtUser">User</label>
					<input type="text" id="txtUser" name="txtUser" class="form-control">
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
					<label for="txtPass">Password</label>
					<input type="password" id="txtPass" name="txtPass" class="form-control">
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
					<label for="slcTipoUser">Type of user</label>
					<select name="slcTipoUser" id="slcTipoUser" class="form-control">
						<option value="2">Employee</option>
						<option value="1">Administrator</option>
						<option value="3">Client</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-12">
				<div class="form-group">
					<button class="btn btn-success btn-lg" type="submit">Save User</button>
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
							<th>ID_User</th>
							<th>Name</th>
							<th>Last Name</th>
							<th>User</th>
							<th>User Type</th>
							<th>DateCreation</th>
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
											echo "Administrator";
											break;
										case 2:
											# code...
											echo "Employee";
											break;
										case 3:
											# code...
											echo "Users";
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