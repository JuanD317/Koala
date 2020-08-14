<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Cliente_model");
		$this->load->model("Sexo_model");
		$this->load->model("Departamento_model");
		$this->load->model("Municipio_model");
	}

	public function index()
	{

		$data["listSexos"] = $this->Sexo_model->select_all();
		$data["listDepartamentos"] = $this->Departamento_model->select_tbdepartamentos_all();
		$data["listMunicipios"] = $this->Municipio_model->select_all();
		$data["listClientes"] = $this->Cliente_model->select_tbclientes_join();

		$this->load->view("Format/header");
		$this->load->view('Customer/customerView', $data);
		$this->load->view("Format/footer");
	}

	public function NewCustomer(){

		$txtMunicipio = $_POST["txtMunicipio"];
		$txtSexo = $_POST["txtSexo"];
		$txtNombre = $_POST["txtNombre"];
		$txtApellido = $_POST["txtApellido"];
		$txtDui = $_POST["txtDui"];
		$txtNit = $_POST["txtNit"];
		$txtRegistro = $_POST["txtRegistro"];
		$txtFechaNac = $_POST["txtFechaNac"];
		$txtCorreo = $_POST["txtCorreo"];
		$txtTelefono = $_POST["txtTelefono"];
		$txtDireccion = $_POST["txtDireccion"];

		$insert = $this->Cliente_model->Create_Cliente(array("ID_Municipio" => $txtMunicipio, "ID_Sexo" => $txtSexo, "Nombre" => $txtNombre, "Apellido" => $txtApellido, "Dui" => $txtDui, "Nit" => $txtNit, "NoRegistro" => $txtRegistro, "FechaNacimiento" => $txtFechaNac, "Correo" => $txtCorreo, "Telefono" => $txtTelefono, "Direccion" => $txtDireccion));

		return redirect(base_url()."index.php/Customer");

	}
}
