<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TProductos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("TProducto_model");
	}

	public function index()
	{

		$datos["listTProductos"] = $this->TProducto_model->select_tbtiposproductos_all();

		$this->load->view("Format/header");
		$this->load->view('TProductos/CreateTProductos', $datos);
		$this->load->view("Format/footer");
	}

	public function newTProductos(){
		
		$txtTipoProducto = $_POST["txtTProductos"];
		$data = array('TipoProducto' => $txtTipoProducto);

		$this->TProducto_model->insert_tbtiposproductos($data);

		return redirect(base_url()."index.php/TProductos");
	}

	public function updateTProductos(){

		$txtTipoProducto = $_POST["txtTProductos"];
		$txtIdTProductos = $_POST["txtIdTProductos"];

		$this->TProducto_model->update_tbtiposproductos(array('TipoProducto' => $txtTipoProducto), $txtIdTProductos);

	}

}
		