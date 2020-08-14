function add_agents_general_data(){

	/*
	 * Datos que recoge el sistema segun los datos que ingresa el usuario
	 */
	var Cantidad = document.getElementById("txtCantidad");
	var PrecioUnidad = document.getElementById("txtPrecioUnidad");
	var Producto = document.getElementById("txtProducto");
	var g = Producto.value.split("|");

	/*
	 * Datos que el sistema va incrementando y utilizandolo
	 */
	var destino_table = document.getElementById("destino_table");

	/*
	 * Crear elementos nuevos para la tabla
	 */
	var tr = document.createElement("tr");
	var td_delete_row = document.createElement("td");
	var button_delete_row = document.createElement("button");

	/*
	 * Cargar los valores a la tabla temporal
	 */

	button_delete_row.innerHTML = "X";
	button_delete_row.setAttribute("class", "btn btn-outline btn-danger");
	button_delete_row.setAttribute("onclick", "del_row_agent(this)");
	button_delete_row.type = "button";

	td_delete_row.appendChild(button_delete_row);

	tr.appendChild(add_campo("input_Cantidad[]", Cantidad.value, Cantidad.value));
	tr.appendChild(add_campo("input_Producto[]", g[0], g[1]));
	tr.appendChild(add_campo("input_PrecioUnidad[]", PrecioUnidad.value, PrecioUnidad.value));
	tr.appendChild(add_campo("input_VentasExentas[]", 0, 0));
	tr.appendChild(add_campo("input_VentasGravadas[]", Cantidad.value * PrecioUnidad.value, Cantidad.value * PrecioUnidad.value));
	tr.appendChild(td_delete_row);
	destino_table.appendChild(tr);

	ClearCampos();
	calcSumas();

}

function add_campo(Cantidad, valor_input, valor_label){

	/*
	 * Crear elementos que seran dibujados
	 */
	var td = document.createElement("td");
	var input = document.createElement("input");
	var label = document.createElement("label");

	/*
	 * Cargar los valores en los input y label
	 */
	input.type = "hidden";
	input.setAttribute("name", Cantidad);
	input.value = valor_input;
	label.innerHTML = valor_label;

	/*
	 * Completar la columna y mandarla
	 */
	td.appendChild(input);
	td.appendChild(label);

	return td;

}

function calcSumas(){

	var arregloGravadas = document.getElementsByName("input_VentasGravadas[]");
	var sizeGravadas = arregloGravadas.length;
	var total = 0;

	for (var i = 0; i < sizeGravadas; i++) {
		total += parseFloat(document.getElementsByName("input_VentasGravadas[]")[i].value);
	}

	var Sumas = document.getElementById("txtSumas");
	var VentasExentas = document.getElementById("txtVentasExentas");
	var VentasSujetas = document.getElementById("txtVentasSujetas");
	var Subtotal = document.getElementById("txtSubtotal");
	var Iva = document.getElementById("txtIva");
	var VentaTotal = document.getElementById("txtVentaTotal");

	Sumas.value = total;
	Subtotal.value = total;
	Iva.value = total * 0.13;
	VentaTotal.value = parseFloat(Iva.value) + total;

}

function ClearCampos(){

	var Cantidad = document.getElementById("txtCantidad");
	var PrecioUnidad = document.getElementById("txtPrecioUnidad");

	Cantidad.value = "";
	PrecioUnidad.value = "";
	$("#txtProducto").val("-1").trigger("change");

}

function del_row_agent(td){

	var fila = td.parentNode.parentNode;
	swal({
		title: "Eliminar Fila",
		text: "¿Esta seguro que desea eliminar esta fila?",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Si, Eliminar",
		closeOnConfirm: false
	},
	function(){
		swal("¡Eliminado!", "Se ha eliminado con exito", "success");
		fila.parentNode.removeChild(fila);
		calcSumas()
	});

}