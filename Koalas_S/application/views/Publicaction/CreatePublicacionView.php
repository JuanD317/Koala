<div class="container-fluid text-light">
	<div class="row mb-3">
		<div class="col-12 text-center">
			<h1>Create Post</h1>
		</div>
	</div>	
	<form action="<?= base_url() ?>index.php/Publication/NewPublication" method="POST">
		<div class="row mb-3">
			<div class="col-6">
				<div class="form-group">
					<label for="txtServicio">Title</label>
					<input type="text" id="txtTitulo" name="txtTitulo" class="form-control">
				</div>
			</div>
			<div class="col-6">
				<div class="form-group">
					<label for="txtDescripcion">Descrpition</label>
					<input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control">
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-12">
				<div class="form-group">
					<button class="btn btn-outline-success btn-lg" type="submit">Save Publication</button>
				</div>
			</div>
		</div>
	</form>

	<div class="row mb-3">
		<div class="col-12">
			<div class="table-responsive">
				<table class="table table-dark" id="tablePublications">
					<thead>
						<tr>
							<th>Title</th>
							<th>Description</th>
							<th>DateCreation</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($listPublications as $key => $value) {
							?>
							<tr>
								<td><?= $value->Titulo ?></td>
								<td><?= $value->Descripcion ?></td>
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