<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sex extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Sexo_model");
	}

	public function index()
	{

		$data["listSexo"] = $this->Sexo_model->select_tbsexos_all();

		$this->load->view("Format/header");
		$this->load->view('Sex/CreateSex', $data);
		$this->load->view("Format/footer");
	}

	public function newSexo(){

		$Sexo = $_POST["txtSexo"];

		$this->Sexo_model->insert_tbsexos(array("Nombre" => $Sexo));

		return redirect(base_url()."index.php/Sex");

	}

	public function updateSexo(){

		$IdSexo = $_POST["txtIdSexo"];
		$Sexo = $_POST["txtSexo"];

		$this->Sexo_model->update_tbsexos(array("Nombre" => $Sexo), $IdSexo);

	}

	public function deleteSexo(){

		$IdSexo = $_POST["txtIdSexo"];

		$this->Sexo_model->delete_tbsexos($IdSexo);

		return redirect(base_url()."index.php/Sex");
	}

}
