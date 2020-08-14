<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TFactura extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("TFactura_model");
		$this->load->model("Departamento_model");
		$this->load->model("Municipio_model");
		$this->load->model("tbprecios_model");
		$this->load->model("tbdetallefactura_model");
	}

	/*
	Load view function
	*/

	public function index()
	{

		$datos["listDepartamentos"] = $this->Departamento_model->select_tbdepartamentos_all();
		$datos["listPrecios"] = $this->tbprecios_model->select_tbprecios_all_join();

		$this->load->view("Format/header");
		$this->load->view('TFactura/CreateTFactura', $datos);
		$this->load->view("Format/footer");
	}

	public function CreditoFiscal()
	{

		$datos["listFacturas"] = $this->TFactura_model->Read_All_Factura();


		$this->load->view("Format/headerCa");
		$this->load->view('TFactura/CreateTFactura', $datos);
		$this->load->view("Format/footerCa");
		$this->load->view("Format/scriptCa");
	}

	public function NotaCredito()
	{

		$datos["listFacturas"] = $this->TFactura_model->Read_All_Factura();


		$this->load->view("Format/headerCa");
		$this->load->view('TFactura/CreateTFactura', $datos);
		$this->load->view("Format/footerCa");
		$this->load->view("Format/scriptCa");
	}

	public function NotaDebito()
	{

		$datos["listFacturas"] = $this->TFactura_model->Read_All_Factura();


		$this->load->view("Format/headerCa");
		$this->load->view('TFactura/CreateTFactura', $datos);
		$this->load->view("Format/footerCa");
		$this->load->view("Format/scriptCa");
	}

	public function ReporteFacturas()
	{

		$datos["listFacturas"] = $this->TFactura_model->Read_All_Factura();


		$this->load->view("Format/headerCa");
		$this->load->view('TFactura/CreateTFactura', $datos);
		$this->load->view("Format/footerCa");
		$this->load->view("Format/scriptCa");
	}

	public function ReportePersonalizadoFacturas()
	{

		$datos["listFacturas"] = $this->TFactura_model->Read_All_Factura();


		$this->load->view("Format/headerCa");
		$this->load->view('TFactura/CreateTFactura', $datos);
		$this->load->view("Format/footerCa");
		$this->load->view("Format/scriptCa");
	}

	/*
	load data functions
	*/

	public function selectMunicipio(){

		$id_departamento = $_POST["id_departamento"];

		$listMunicipios = $this->Municipio_model->select_where(array("ID_Departamento" => $id_departamento));

		foreach ($listMunicipios as $key_municipio => $municipio) {
			echo "<option value='".$municipio->ID_Municipio."'>".$municipio->Municipio."</option>";
		}

	}

	/*
	CRUD function
	*/

	public function NewFactura(){

		$Cliente = $_POST["txtCliente"];
		$CodigoIdentidad = $_POST["txtCodigoIdentidad"];
		$Fecha = $_POST["txtFecha"];
		$Direccion = $_POST["txtDireccion"];
		$Municipio = $_POST["slcMunicipio"];
		$Cantidad = $_POST["txtCantidad"];
		$Producto = $_POST["txtProducto"];
		$PrecioUnidad = $_POST["txtPrecioUnidad"];
		$Sumas = $_POST["txtSumas"];
		$VentasExentas = $_POST["txtVentasExentas"];
		$VentasSujetas = $_POST["txtVentasSujetas"];
		$Subtotal = $_POST["txtSubtotal"];
		$Iva = $_POST["txtIva"];
		$VentaTotal = $_POST["txtVentaTotal"];
		$NoFactura = $_POST["txtNoFactura"];

		$detalle_Cantidad = $_POST["input_Cantidad"];
		$detalle_Producto = $_POST["input_Producto"];
		$detalle_PrecioUnidad = $_POST["input_PrecioUnidad"];
		$detalle_VentasExentas = $_POST["input_VentasExentas"];
		$detalle_VentasGravadas = $_POST["input_VentasGravadas"];

		$resultInsertFactura = $this->TFactura_model->insert_tbdetallefactura(array("ID_Usuario" => $_SESSION["login"]["ID_Usuario"], "ID_TipoFactura" => 1, "Cliente" => $Cliente, "Fecha" => $Fecha, "NoFactura" => $NoFactura));

		$max_id_factura = $this->TFactura_model->max_factura();

		if(sizeof($max_id_factura) > 0){

			foreach ($detalle_Cantidad as $key_cantidad => $cantidad) {

				$this->tbdetallefactura_model->insert_tbdetallefactura(array("ID_Factura" => $max_id_factura[0]->ID_Factura, "ID_Precio" => $detalle_Producto[$key_cantidad], "Cantidad" => $cantidad));

			}

		}

		return redirect(base_url()."index.php/TFactura");

	}
}
