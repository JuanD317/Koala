<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetallePublicacion extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("DetallePublicacion_model");
	}

	public function index()
	{

		$datos["listDetallePublicacion"] = $this->DetallePublicacion_model->Read_All_DetallePublicacion();


		$this->load->view("Format/headerCa");
		$this->load->view('DetallePublicacion/CreateDetallePublicacion', $datos);
		$this->load->view("Format/footerCa");
		$this->load->view("Format/scriptCa");

	}

	public function NewDetallePublicacion(){

		$txtSubtitulo = $_POST["txtSubtitulo"];
		$txtParrafo = $_POST["txParrafo"];
		$txtNombreArchivo = $_POST["txtNombreArchivo"];
		$txtUrlArchivo = $_POST["txtUrlArchivo"];


		$data = array('Subtitulo' => $txtSubtitulo, 'Parrafo' => $txtParrafo, 'NombreArchivo' => $txtNombreArchivo, 'UrlArchivo' => $txtUrlArchivo );

		$this->DetallePublicacion_model->Create_DetallePublicacion($data);

		return redirect(base_url()."index.php/DetallePublicacion");

	}
}