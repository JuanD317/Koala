<div class="container-fluid text-light">
	<div class="row mb-3">
		<div class="col-12 text-center">
			<h1>Unidad Medida</h1>
		</div>
	</div>
	<form action="<?= base_url() ?>index.php/UnidadesMedidas/NewUnidad" method="POST">
		<div class="row mb-3">
			<div class="col-12">
				<div class="form-group">
					<label for="txtUnidad">Unidad</label>
					<input type="text" id="txtUnidad" name="txtUnidad" class="form-control">
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-12">
				<div class="form-group">
					<button class="btn btn-outline-success btn-lg" type="submit">Crear Factura</button>
				</div>
			</div>
		</div>
	</form>

	<div class="row mb-3">
		<div class="col-12">
			<div class="table-responsive">
				<table class="table table-dark" id="tableUnidad">
					<thead>
						<tr>
							<th>ID_UnidadMedida</th>
							<th>Unidad</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($listUnidades as $key => $value) {
							?>
							<tr>
								<td><?= $value->ID_UnidadMedida ?></td>
								<td><?= $value->Unidad ?></td>
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