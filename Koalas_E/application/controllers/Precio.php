<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Precio extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Producto_model");
		$this->load->model("Unidad_model");
		$this->load->model("tbprecios_model");
		$this->load->helper('form');
		$this->load->library('upload');
	}

	/*
	Load view functions
	*/

	public function index()
	{

		$datos["listPrecios"] = $this->tbprecios_model->select_tbprecios_all_join();
		$datos["listProductos"] = $this->Producto_model->Read_All_Producto();
		$datos["listUnidadMedida"] = $this->Unidad_model->Read_All_Unidad();

		$this->load->view("Format/header");
		$this->load->view('Precio/CreatePrecio', $datos);
		$this->load->view("Format/footer");
	}

	/*
	crud functions
	*/

	public function CreatePrice(){

		$Producto = $_POST["slcProducto"];
		$UnidadMedida = $_POST["slcUnidadMedida"];
		$Precio = $_POST["txtPrecio"];

		$this->tbprecios_model->insert_tbprecios(array("ID_Producto" => $Producto, "ID_UnidadMedida" => $UnidadMedida, "Precio" => $Precio));

		return redirect(base_url()."index.php/Precio");
	}

}
		
