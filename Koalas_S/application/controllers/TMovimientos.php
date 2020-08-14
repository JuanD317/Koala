<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TMovimientos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("tbtiposmovimientos_model");
	}

	public function index()
	{

		$datos["listTMovimientos"] = $this->tbtiposmovimientos_model->select_tbtiposmovimientos_all();

		$this->load->view("Format/header");
		$this->load->view('TMovimiento/CreateTMovmiento', $datos);
		$this->load->view("Format/footer");
	}

	public function newTMovimientos(){
		
		$txtTMovimientos = $_POST["txtTMovimientos"];
		$data = array('Movimiento' => $txtTMovimientos);

		$this->tbtiposmovimientos_model->insert_tbtiposmovimientos($data);

		return redirect(base_url()."index.php/TMovimientos");
	}

	public function updateTMovimientos(){

		$txtIdTMovimientos = $_POST["txtIdTMovimientos"];
		$txtTMovimientos = $_POST["txtTMovimientos"];

		$this->tbtiposmovimientos_model->update_tbtiposmovimientos(array('Movimiento' => $txtTMovimientos), $txtIdTMovimientos);

	}

	
}
		