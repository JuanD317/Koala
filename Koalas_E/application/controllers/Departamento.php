<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departamento extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Departamento_model");
		$this->load->model("tbpaises_model");
	}

	public function index()
	{

		$data["listDepartamento"] = $this->Departamento_model->select_tbdepartamentos_all_join();
		$data["listPaises"] = $this->tbpaises_model->select_tbpaises_all();

		$this->load->view("Format/header");
		$this->load->view('Departamentos/DepartamentoView', $data);
		$this->load->view("Format/footer");
	}

	public function newDepartamento(){

		$Pais = $_POST["slcPais"];
		$Departamento = $_POST["txtDepartamento"];

		$this->Departamento_model->insert_tbdepartamentos(array("ID_Pais" => $Pais, "Departamento" => $Departamento));

		return redirect(base_url()."index.php/Departamento");
	}

	public function updateDepartamento(){

		$Pais = $_POST["slcPais"];
		$Departamento = $_POST["txtDepartamento"];
		$IdDepartamento = $_POST["txtIdDepartamento"];

		$updateDepartamento = $this->Departamento_model->update_tbdepartamentos(array("ID_Pais" => $Pais, "Departamento" => $Departamento), $IdDepartamento);

	}
}
