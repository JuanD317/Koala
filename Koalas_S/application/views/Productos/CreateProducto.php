<!-- Dropify CSS -->
  <link href="<?= base_url() ?>assets/Dropify/css/dropify.min.css" />
<!-- Dropify JS -->
  <script src="<?= base_url() ?>assets/Dropify/js/dropify.min.js"></script>

<div class="container-fluid text-light">
	<div class="row mb-3">
		<div class="col-12 text-center">
			<h1>Create Product</h1>
		</div>
	</div>

	<form action="<?= base_url() ?>index.php/Productos/NewProducto" method="POST" enctype="multipart/form-data">
		<div class="row mb-3">
			<div class="col-4">
				<div class="form-group">
					<label for="slcMarca">Brand</label>
					<select name="slcMarca" id="slcMarca" class="form-control select2">
						<option value="-1">Select</option>
						<?php
						foreach ($listMarcas as $key_marca => $marca) {
							echo "<option value='".$marca->ID_Marca."'>".$marca->Marca."</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
					<label for="slcUsuario">User</label>
					<select name="slcUsuario" id="slcUsuario" class="form-control select2">
						<option value="-1">Select</option>
						<?php
						foreach ($listUsuarios as $key_usuario => $usuario) {
							echo "<option value='".$usuario->ID_Usuario."'>".$usuario->Nombre." ".$usuario->Apellido."</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="col-4">
				<div class="form-group">
					<label for="slcTipoProducto">Product Type</label>
					<select name="slcTipoProducto" id="slcTipoProducto" class="form-control select2">
						<option value="-1">Select</option>
						<?php
						foreach ($listTiposProductos as $key_tipoproducto => $tipoProducto) {
							echo "<option value='".$tipoProducto->ID_TipoProducto."'>".$tipoProducto->TipoProducto."</option>";
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-6">
				<div class="form-group">
					<label for="txtNombre">Name</label>
					<input type="text" id="txtNombre" name="txtNombre" class="form-control">
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label for="txtFechaVencimiento">Expiration Date</label>
					<input type="text" id="txtFechaVencimiento" name="txtFechaVencimiento" class="form-control">
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-12">
				<div class="form-group">
					<label for="txtDescripcion">Description</label>
					<textarea name="txtDescripcion" id="txtDescripcion" cols="30" rows="3" class="form-control"></textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="imagenProducto">Product image</label>
					<input type="file" class="dropify" name="imagenProducto" id="imagenProducto">
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-12">
				<div class="form-group">
					<button class="btn btn-success btn-lg" type="submit">Save Product</button>
				</div>
			</div>
		</div>
	</form>

	<div class="row mb-3">
		<div class="col-12">
			<div class="table-responsive">
				<table class="table table-dark" id="tableProducto">
					<thead>
						<tr>
							<th>ID_Product</th>
							<th>ID_Brand</th>
							<th>ID_User</th>
							<th>ID_Product Type</th>
							<th>Name</th>
							<th>Expiration Date</th>
							<th>Description</th>
							<th>Stock</th>
							<th>Average Cost</th>
							<th>NameImage</th>
							<th>UrlImage</th>
							<th>DateCreation</th>						
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($listProducto as $key => $value) {
							?>
							<tr>
								<td><?= $value->ID_Producto ?></td>
								<td><?= $value->ID_Marca ?></td>
								<td><?= $value->ID_Usuario ?></td>
								<td><?= $value->ID_TipoProducto ?></td>
								<td><?= $value->Nombre ?></td>
								<td><?= $value->FechaVencimiento ?></td>
								<td><?= $value->Descripcion ?></td>
								<td><?= $value->Stock ?></td>
								<td><?= $value->CostoPromedio ?></td>
								<td><?= $value->NombreImagen ?></td>
								<td>
									<img src="<?= base_url() ?><?= $value->UrlImagen ?>" alt="" class="img-thumbnail">
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

<script>

	$(document).ready(function() {

		$('.dropify').dropify();

		$(".select2").select2();

		$("#txtFechaVencimiento").datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});
	} );

</script>