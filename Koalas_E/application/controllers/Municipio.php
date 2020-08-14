<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Municipio extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Departamento_model");
		$this->load->model("Municipio_model");
		$this->load->model("tbcertificaciones_model");
	}

	public function index()
	{

		$data["listDepartamento"] = $this->Departamento_model->select_tbdepartamentos_all();
		$data["listMunicipio"] = $this->Municipio_model->select_tbmunicipios_all_join();
		$data["listCertificacion"] = $this->tbcertificaciones_model->select_tbcertificaciones_all();

		$this->load->view("Format/header");
		$this->load->view('Municipio/MunicipioView', $data);
		$this->load->view("Format/footer");
	}

	public function newMunicipio(){
		$Departamento = $_POST["slcDepartamento"];
		$Municipio = $_POST["txtMunicipio"];
		$Certificaciones = $_POST["slcCertificaciones"];

		$this->Municipio_model->insert_tbmunicipios(array("ID_Departamento" => $Departamento, "Municipio" => $Municipio, "ID_Certificacion" => $Certificaciones));

		return redirect(base_url()."index.php/Municipio");
	}

	public function updateMunicipio(){

		$Departamento = $_POST["slcDepartamento"];
		$Municipio = $_POST["txtMunicipio"];
		$Idmunicipio = $_POST["txtIdmunicipio"];
		$Certificaciones = $_POST["slcCertificaciones"];

		$this->Municipio_model->update_tbmunicipios(array("ID_Departamento" => $Departamento, "Municipio" => $Municipio, "ID_Certificacion" => $Certificaciones), $Idmunicipio);

	}

}
