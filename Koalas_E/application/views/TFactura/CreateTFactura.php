
<div class="container-fluid">
	<div class="row mb-3">
		<div class="col-12 text-center text-light">
			<h1>Crear Factura</h1>
		</div>
	</div>
	<form action="<?= base_url() ?>index.php/TFactura/NewFactura" method="POST">
		<div class="row">
			<div class="col-md-8"></div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="txtNoFactura" class="text-light">No. Factura</label>
					<input type="text" class="form-control" id="txtNoFactura" name="txtNoFactura">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="text-light" for="txtCliente">Cliente</label>
					<input type="text" class="form-control" id="txtCliente" name="txtCliente" required>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="text-light" for="txtCodigoIdentidad">DUI o NIT</label>
					<div class="row mb-3">
						<div class="col-md-6">
							<select id="slcCodigoIdentidad" class="form-control" onchange="codigoIdentidadMask(this.value)">
								<option value="-1">Seleccione</option>
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
					<label class="text-light" for="txtFecha">Fecha</label>
					<input type="text" class="form-control" id="txtFecha" name="txtFecha" required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label class="text-light" for="txtDireccion">Direccion</label>
					<input type="text" class="form-control" id="txtDireccion" name="txtDireccion" required>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="text-light" for="slcDepartamento">Departamento</label>
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
					<label class="text-light" for="slcMunicipio">Municipio</label>
					<select name="slcMunicipio" id="slcMunicipio" class="form-control select2">
						<option value="-1">Seleccione</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label class="text-light" for="txtCantidad">Cantidad</label>
					<input type="text" class="form-control" id="txtCantidad" name="txtCantidad">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="text-light" for="txtProducto">Producto</label>
					<select name="txtProducto" id="txtProducto" class="form-control select2" onchange="llenarUnidad(this.value)">
						<option value="-1">Seleccione</option>
						<?php foreach ($listPrecios as $key_precio => $precio): ?>
							<option value="<?= $precio->ID_Precio ?>|<?= $precio->Nombre ?>|<?= $precio->Precio ?>"><?= $precio->Nombre ?> - <?= $precio->Precio ?> - <?= $precio->Unidad ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="text-light" for="txtPrecioUnidad">Precio Unitario</label>
					<input type="text" class="form-control" id="txtPrecioUnidad" name="txtPrecioUnidad">
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-md-12">
				<div class="form-group text-right">
					<button class="btn btn-info btn-lg" type="button" onclick="add_agents_general_data()">Agregar Detalle</button>
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<div class="col-md-12">
				<div class="table-responsive text-light">
					<table class="table nowrap">
						<thead>
							<tr>
								<th>Cantidad</th>
								<th>Descripcion</th>
								<th>Precio Unitario</th>
								<th>Ventas Excentas</th>
								<th>Ventas Gravadas</th>
								<th>Accion</th>
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
					<label class="text-light" for="txtSumas">Sumas</label>
					<input type="text" class="form-control" id="txtSumas" name="txtSumas" readonly>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7"></div>
			<div class="col-md-5">
				<div class="form-group">
					<label class="text-light" for="txtVentasExentas">Ventas Exentas</label>
					<input type="text" class="form-control" id="txtVentasExentas" name="txtVentasExentas" readonly>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7"></div>
			<div class="col-md-5">
				<div class="form-group">
					<label class="text-light" for="txtVentasSujetas">Ventas no sujetas</label>
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
					<label class="text-light" for="txtIva">(-) IVA Retenido</label>
					<input type="text" class="form-control" id="txtIva" name="txtIva" readonly>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7"></div>
			<div class="col-md-5">
				<div class="form-group">
					<label class="text-light" for="txtVentaTotal">Venta Total</label>
					<input type="text" class="form-control" id="txtVentaTotal" name="txtVentaTotal" readonly>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group text-right">
					<button class="btn btn-success btn-lg" type="submit">Facturar</button>
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