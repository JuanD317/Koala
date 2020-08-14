<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group text-center text-light">
				<h1>Crear Precio</h1>
			</div>
		</div>
	</div>
	<form action="<?= base_url() ?>index.php/Precio/CreatePrice" method="POST">
		<div class="row mb-4 mt-4">
			<div class="col-md-4">
				<div class="form-group">
					<label class="text-light" for="slcProducto">Producto</label>
					<select name="slcProducto" id="slcProducto" class="form-control select2">
						<?php foreach ($listProductos as $key_Productos => $Productos): ?>
							<option value="<?= $Productos->ID_Producto ?>"><?= $Productos->Nombre ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="text-light" for="slcUnidadMedida">Unidad Medida</label>
					<select name="slcUnidadMedida" id="slcUnidadMedida" class="form-control select2">
						<?php foreach ($listUnidadMedida as $key_UnidadMedida => $UnidadMedida): ?>
							<option value="<?= $UnidadMedida->ID_UnidadMedida ?>"><?= $UnidadMedida->Unidad ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="text-light" for="txtPrecio">Precio</label>
					<input type="text" class="form-control" id="txtPrecio" name="txtPrecio" required="">
				</div>
			</div>
		</div>
		<div class="row mb-4">
			<div class="col-md-12">
				<div class="form-group text-right">
					<button class="btn btn-success btn-lg" type="submit">Guardar Precio</button>
				</div>
			</div>
		</div>
	</form>
	<div class="row mb-4 mt-4">
		<div class="col-md-12">
			<div class="table-responsive bg-light p-5">
				<table class="table nowrap" id="tbPrecios">
					<thead>
						<tr>
							<th>Codigo</th>
							<th>Producto</th>
							<th>Unidad medida</th>
							<th>Precio</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($listPrecios as $key_precio => $precio): ?>							
							<tr>
								<td><?= $precio->ID_Precio ?></td>
								<td><?= $precio->Nombre ?></td>
								<td><?= $precio->Unidad ?></td>
								<td>$ <?= $precio->Precio ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#txtPrecio').mask("#,##0.00", {reverse: true});
		$("#tbPrecios").DataTable();
	});
</script>