<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UnidadesMedidas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Unidad_model");
	}

	public function index()
	{

		$datos["listUnidades"] = $this->Unidad_model->Read_All_Unidad();

		$this->load->view("Format/header");
		$this->load->view('UnidadesMedidas/CreateUnidadesMedidas', $datos);
		$this->load->view("Format/footer");
	}

	public function NewUnidad(){
		$txtUnidad = $_POST["txtUnidad"];


		$data = array('Unidad'=> $txtUnidad);
	
		$this->Unidad_model->Create_UnidadesMedidas($data);

		return redirect(base_url()."index.php/UnidadesMedidas");

	}

}
		