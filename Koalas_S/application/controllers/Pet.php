<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pet extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Cliente_model");
		$this->load->model("Sexo_model");
		$this->load->model("Especie_model");
		$this->load->model("Mascota_model");
	}

	public function index()
	{

		$data["listSexos"] = $this->Sexo_model->select_all();
		$data["listClientes"] = $this->Cliente_model->select_all();
		$data["listEspecies"] = $this->Especie_model->select_all();
		$data["listMascotas"] = $this->Mascota_model->select_all();


		$this->load->view("Format/header");
		$this->load->view('Pet/petView', $data);
		$this->load->view("Format/footer");
	}

	public function NewPet(){

		$txtCliente = $_POST["txtCliente"];
		$txtExpecie = $_POST["txtExpecie"];
		$txtSexo = $_POST["txtSexo"];
		$txtNombre = $_POST["txtNombre"];
		$txtFechaNac = $_POST["txtFechaNac"];

		$this->Mascota_model->Create_Mascota(array("ID_Cliente" => $txtCliente, "ID_Especie" => $txtExpecie, "ID_Sexo" => $txtSexo, "Nombre" => $txtNombre, "FechaNacimiento" => $txtFechaNac));

		return redirect(base_url()."index.php/Pet");

	}
}
