
<div class="container-fluid">
	<div class="row mb-3">
		<div class="col-12 text-center text-light">
			<h1>Create Receipt</h1>
		</div>
	</div>
	<form action="<?= base_url() ?>index.php/TFactura/NewFactura" method="POST">
		<div class="row">
			<div class="col-md-8"></div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="txtNoFactura" class="text-light">Receipt No.</label>
					<input type="text" class="form-control" id="txtNoFactura" name="txtNoFactura">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="text-light" for="txtCliente">Client</label>
					<input type="text" class="form-control" id="txtCliente" name="txtCliente" required>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="text-light" for="txtCodigoIdentidad">DUI o NIT</label>
					<div class="row mb-3">
						<div class="col-md-6">
							<select id="slcCodigoIdentidad" class="form-control" onchange="codigoIdentidadMask(this.value)">
								<option value="-1">Select</option>
								<option value="1">DUI</option>
								<option value="2">NIT</option>
							</select>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="txtCodigoIdentidad" name="txtCodigoIdentidad" required readonly="">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="text-light" for="txtFecha">Date</label>
					<input type="text" class="form-control" id="txtFecha" name="txtFecha" required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label class="text-light" for="txtDireccion">Address</label>
					<input type="text" class="form-control" id="txtDireccion" name="txtDireccion" required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-light" for="slcDepartamento">Department</label>
					<select name="slcDepartamento" id="slcDepartamento" class="form-control select2" onchange="selectMunicipio(this.value)">
						<option value="-1">Seleccione</option>
						<?php foreach ($listDepartamentos as $key_departamento => $departamento): ?>
							<option value="<?= $departamento->ID_Departamento ?>"><?= $departamento->Departamento ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-light" for="slcMunicipio">Municipality</label>
					<select name="slcMunicipio" id="slcMunicipio" class="form-control select2">
						<option value="-1">Select</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="text-light" for="txtCantidad">Amount</label>
					<input type="text" class="form-control" id="txtCantidad" name="txtCantidad">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="text-light" for="txtProducto">Amount</label>
					<select name="txtProducto" id="txtProducto" class="form-control select2" onchange="llenarUnidad(this.value)">
						<option value="-1">Select</option>
						<?php foreach ($listPrecios as $key_precio => $precio): ?>
							<option value="<?= $precio->ID_Precio ?>|<?= $precio->Nombre ?>|<?= $precio->Precio ?>"><?= $precio->Nombre ?> - <?= $precio->Precio ?> - <?= $precio->Unidad ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="text-light" for="txtPrecioUnidad">Unit Price</label>
					<input type="text" class="form-control" id="txtPrecioUnidad" name="txtPrecioUnidad">
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-md-12">
				<div class="form-group text-right">
					<button class="btn btn-info btn-lg" type="button" onclick="add_agents_general_data()">Add Detail</button>
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="table-responsive text-light">
					<table class="table nowrap">
						<thead>
							<tr>
								<th>Amount</th>
								<th>Description</th>
								<th>Unit Price</th>
								<th>Exempt Sales</th>
								<th>Taxed Sales</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="destino_table"></tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-7"></div>
			<div class="col-md-5">
				<div class="form-group">
					<label class="text-light" for="txtSumas">Amounts</label>
					<input type="text" class="form-control" id="txtSumas" name="txtSumas" readonly>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7"></div>
			<div class="col-md-5">
				<div class="form-group">
					<label class="text-light" for="txtVentasExentas">Exempt Sales</label>
					<input type="text" class="form-control" id="txtVentasExentas" name="txtVentasExentas" readonly>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7"></div>
			<div class="col-md-5">
				<div class="form-group">
					<label class="text-light" for="txtVentasSujetas">Unsasured sales</label>
					<input type="text" class="form-control" id="txtVentasSujetas" name="txtVentasSujetas" readonly>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7"></div>
			<div class="col-md-5">
				<div class="form-group">
					<label class="text-light" for="txtSubtotal">Sub-Total</label>
					<input type="text" class="form-control" id="txtSubtotal" name="txtSubtotal" readonly>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7"></div>
			<div class="col-md-5">
				<div class="form-group">
					<label class="text-light" for="txtIva">(-) Unsasured sales</label>
					<input type="text" class="form-control" id="txtIva" name="txtIva" readonly>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7"></div>
			<div class="col-md-5">
				<div class="form-group">
					<label class="text-light" for="txtVentaTotal">Total Sale</label>
					<input type="text" class="form-control" id="txtVentaTotal" name="txtVentaTotal" readonly>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group text-right">
					<button class="btn btn-success btn-lg" type="submit">Bill</button>
				</div>
			</div>
		</div>
	</form>
</div>
<script src="<?= base_url() ?>assets/js/ConsumidorFinal/main.js"></script>
<script>

	$(document).ready(function(){
		$("#txtFecha").datepicker({
			format: "yyyy-mm-dd"
		});
		$(".select2").select2();
		$('#txtCantidad').mask("#,##0", {reverse: true});
		$('#txtPrecioUnidad').mask("#,##0.00", {reverse: true});
	});

	function llenarUnidad(valor){
		var d = valor.split("|");

		$("#txtPrecioUnidad").val(d[2]);
	}

	function selectMunicipio(valor){

		$.ajax({
			type: "POST",
			url: "<?= base_url() ?>index.php/TFactura/selectMunicipio",
			data: {id_departamento: valor},
			success: function(html){
				$("#slcMunicipio").html(html);
			}
		});

	}

	function codigoIdentidadMask(valor){

		$("#txtCodigoIdentidad").val("");

		switch(valor){
			case '1':
				//DUI
				document.getElementById('txtCodigoIdentidad').removeAttribute("readonly");
				$("#txtCodigoIdentidad").mask("00000000-0");
				break;
			case '2':
				//NIT
				document.getElementById('txtCodigoIdentidad').removeAttribute("readonly");
				$("#txtCodigoIdentidad").mask("0000-000000-000-0");
				break;
			default:
				document.getElementById('txtCodigoIdentidad').setAttribute("readonly","");
				break;

		}

	}

</script>