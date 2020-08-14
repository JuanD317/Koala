<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("User_model");
	}

	public function index()
	{

		$datos["listUsers"] = $this->User_model->Read_All_User();

		$this->load->view("Format/header");
		$this->load->view('User/CreateUser', $datos);
		$this->load->view("Format/footer");
	}

	public function ejemploruta(){
		echo "<center><h1>Hola mundo</h1></center> <br> <marquee> estamos en una ruta diferente </marquee>";
	}

	public function NewUser(){

		$txtNombre = $_POST["txtNombre"];
		$txtApellido = $_POST["txtApellido"];
		$txtUser = $_POST["txtUser"];
		$txtPass = $_POST["txtPass"];
		$slcTipoUser = $_POST["slcTipoUser"];

		$opciones = [
		    'cost' => 12,
		];
		$passFinal = password_hash($txtPass, PASSWORD_BCRYPT, $opciones);

		$data = array('Nombre' => $txtNombre, 'Apellido' => $txtApellido, 'Usuario' => $txtUser, 'Password' => $passFinal, 'TipoUsuario' => $slcTipoUser);

		$this->User_model->Create_User($data);

		return redirect(base_url()."index.php/User");
	}

	public function NewCustomer(){

		$txtNombre = $_POST["txtNombre"];
		$txtApellido = $_POST["txtApellido"];
		$txtUser = $_POST["txtUser"];
		$txtPass = $_POST["txtPass"];

		$opciones = [
		    'cost' => 12,
		];
		$passFinal = password_hash($txtPass, PASSWORD_BCRYPT, $opciones);

		$userRepeat = $this->User_model->select_tbusuarios(array("Usuario" => $txtUser));

		if (sizeof($userRepeat) > 0) {
			
			return redirect(base_url()."index.php/Login?result=2");

		}else{

			$data = array('Nombre' => $txtNombre, 'Apellido' => $txtApellido, 'Usuario' => $txtUser, 'Password' => $passFinal, 'TipoUsuario' => 3);

			$this->User_model->Create_User($data);

			return redirect(base_url()."index.php/Login?result=3");
		}

	}
}
