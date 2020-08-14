<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("User_model");
		$this->load->library('session');//para sesiones
	}

	public function index()
	{
		$this->load->view("Login/LoginView");
	}

	public function validar(){

		$Email = $_POST["txtEmail"];
		$Password = $_POST["txtPassword"];

		$usuarioValidado = $this->User_model->select_tbusuarios(array("Usuario" => $Email));

		/*
		 * 0 = Usuario no encontrado
		 * 1 = Contraseña no valida
		 */

		if (sizeof($usuarioValidado) > 0) {

			# encontro al usuario
			
			if (password_verify($Password, $usuarioValidado[0]->Password)) {

				# La contraseña es correcta

				$datosSesion = array(
					"ID_Usuario" => $usuarioValidado[0]->ID_Usuario,
					"Nombre" => $usuarioValidado[0]->Nombre,
					"Apellido" => $usuarioValidado[0]->Apellido,
					"Usuario" => $usuarioValidado[0]->Usuario,
					"Permiso" => $usuarioValidado[0]->TipoUsuario
				);

				$this->session->set_userdata('login', $datosSesion);

				return redirect(base_url()."index.php/Ecommerce");
			}else{

				# Contraseña incorrecta

				return redirect(base_url()."index.php/Login?result=1");
			}

		}else{

			#no encontro al usuario

			return redirect(base_url()."index.php/Login?result=0");
		}

	}

	public function logOut(){
		unset($_SESSION['login']);

		return redirect(base_url()."index.php/Login");
	}
}
?>