<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pais extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("tbpaises_model");
	}

	public function index()
	{

		$data["listPaises"] = $this->tbpaises_model->select_tbpaises_all();

		$this->load->view("Format/header");
		$this->load->view('Pais/PaisView', $data);
		$this->load->view("Format/footer");
	}

	public function newPais(){

		$Pais = $_POST["txtPais"];
		$Nacionalidad = $_POST["txtNacionalidad"];

		$this->tbpaises_model->insert_tbpaises(array("Pais" => $Pais, "Nacionalidad" => $Nacionalidad));

		return redirect(base_url()."index.php/Pais");
	}

	public function updatePais(){

		$Pais = $_POST["txtPais"];
		$Nacionalidad = $_POST["txtNacionalidad"];
		$ID_Pais = $_POST["txtIdPais"];

		$this->tbpaises_model->update_tbpaises(array("Pais" => $Pais, "Nacionalidad" => $Nacionalidad), $ID_Pais);

	}
}
