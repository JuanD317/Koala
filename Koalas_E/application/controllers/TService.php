<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TService extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("TService_model");
	}

	public function index()
	{

		$datos["listTService"] = $this->TService_model->Read_All_TService();


		$this->load->view("Format/header");
		$this->load->view('TService/CreateTService', $datos);
		$this->load->view("Format/footer");
	}

	public function newTService(){
		
		$txtTipoServicio = $_POST["txtTService"];
		$data = array('TipoServicio' => $txtTipoServicio);

		$this->TService_model->insert_tbtiposervicio($data);

		return redirect(base_url()."index.php/TService");
	}

	public function updateTService(){

		$txtTipoServicio = $_POST["txtTService"];
		$txtIdTService = $_POST["txtIdTService"];

		$this->TService_model->update_tbtiposervicio(array('TipoServicio' => $txtTipoServicio), $txtIdTService);

	}
}
