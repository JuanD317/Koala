<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marca extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Marcas_model");
	}

	public function index()
	{

		$data["listMarca"] = $this->Marcas_model->select_tbmarcas_all();

		$this->load->view("Format/header");
		$this->load->view('Marca/MarcaView', $data);
		$this->load->view("Format/footer");
	}

	public function newMarca(){

		$Marca = $_POST["txtMarca"];

		$this->Marcas_model->insert_tbmarcas(array("Marca" => $Marca));

		return redirect(base_url()."index.php/Marca");
	}
	
	public function updateMarca(){

		$IdMarca = $_POST["txtIdMarca"];
		$Marca = $_POST["txtMarca"];

		$this->Marcas_model->update_tbmarcas(array("Marca" => $Marca), $IdMarca);

	}
	

}
