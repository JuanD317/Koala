<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificaciones extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("tbcertificaciones_model");
	}

	public function index()
	{

		$data["listCertificaciones"] = $this->tbcertificaciones_model->select_tbcertificaciones_all();

		$this->load->view("Format/header");
		$this->load->view('Certificacion/CertificacionesView', $data);
		$this->load->view("Format/footer");
	}

	public function newCertificaciones(){

		$Certificaciones = $_POST["txtCertificaciones"];
		$Descripcion = $_POST["txtDescripcion"];

		$this->tbcertificaciones_model->insert_tbcertificaciones(array("Nombre" => $Certificaciones, "Descripcion" => $Descripcion));

		return redirect(base_url()."index.php/Certificaciones");

	}

	public function updateCertificaciones(){

		$IdCertificaciones = $_POST["txtIdCertificaciones"];
		$Certificaciones = $_POST["txtCertificaciones"];
		$Descripcion = $_POST["txtDescripcion"];

		$this->tbcertificaciones_model->update_tbcertificaciones(array("Nombre" => $Certificaciones, "Descripcion" => $Descripcion), $IdCertificaciones);

	}

	
}