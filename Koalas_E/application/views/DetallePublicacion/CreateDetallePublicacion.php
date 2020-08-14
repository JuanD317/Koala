<section class="bg-white clearfix first-section" id="home">
	<div class="container h-100">
<div class="row mb-3">
	<div class="col-12 text-center">
		<h1>Crear Publicacion</h1>
	</div>
</div>
<form action="<?= base_url() ?>index.php/DetallePublicacion/NewDetallePublicacion" method="POST">
	<div class="row mb-3">
		<div class="col-6">
			<div class="form-group">
				<label for="txtSubtitulo">Subtitulo</label>
				<input type="text" id="txtSubtitulo" name="txtSubtitulo" class="form-control">
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
				<label for="txtParrafo">Parrafo</label>
				<input type="text" id="txtParrafo" name="txtParrafo" class="form-control">
			</div>
		</div>
		<div class="col-6">
			<div class="form-group">
				<label for="txtNombreArchivo">NombreArchivo</label>
				<input type="text" id="txtNombreArchivo" name="txtNombreArchivo" class="form-control">
			</div>
		</div>
	</div>
		<div class="row mb-3">
		<div class="col-6">
			<div class="form-group">
				<label for="txtUrlArchivo">UrlArchivo</label>
				<input type="text" id="txtUrlArchivo" name="txtUrlArchivo" class="form-control">
			</div>
		</div>
	</div>
	<div class="row mb-3">
		<div class="col-12">
			<div class="form-group">
				<button class="btn btn-outline-success btn-lg" type="submit">Guardar Usuario</button>
			</div>
		</div>
	</div>
</form>

<div class="row mb-3">
	<div class="col-12">
		<div class="table-responsive">
			<table class="table table-dark" id="tableDetallePublicacion">
				<thead>
					<tr>
						<th>ID_DetallePublicacion</th>
						<th>ID_Publicacion</th>
						<th>Subtitulo</th>
						<th>Parrafo</th>
						<th>NombreArchivo</th>
						<th>UrlArchivo</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($listDetallePublicacion as $key => $value) {
						?>
						<tr>
							<td><?= $value->ID_DetallePublicacion ?></td>
							<td><?= $value->ID_Publicacion ?></td>
							<td><?= $value->Subtitulo ?></td>
							<td><?= $value->Parrafo ?></td>
							<td><?= $value->NombreArchivo ?></td>
							<td><?= $value->UrlArchivo ?></td>
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
	    $('#tableDetallePublicacion').DataTable();
	} );

</script>