<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DetalleServicio extends CI_Controller{
	
	public function __construct()	{
		parent::__construct();
		$this->load->model("DetalleServicio_model");
	}

	public function index()
	{
		
		$datos["listDetalleServicio"] = $this->DetalleServicio_model->Read_All_DetalleServicio();

		$this->load->view("Format/headerCa");
		$this->load->view('DetalleServicio/CreateDetalleServicio', $datos);
		$this->load->view("Format/footerCa");
		$this->load->view("Format/scriptCa");

	}

	public function NewDetalleServicio(){
		$txtNombre = $_POST["txtNombre"];
		$txtDescripcion = $_POST["txtDescripcion"];
		$txtCosto = $_POST["txtCosto"];
		$txtPrecio = $_POST["txtPrecio"];
		$txtTiempoDuracion = $_POST["txtTiempoDuracion"];

		$data = array('Nombre' => $txtNombre, 'Descripcion' => $txtDescripcion, 'Costo' => $txtCosto, 'Precio' => $txtPrecio, 'TiempoDuracion' => $txtTiempoDuracion);

		$this->DetalleServicio_model->Create_DetalleServicio($data);

		return redirect(base_url()."index.php/DetalleServicio");
	}
}



 ?>