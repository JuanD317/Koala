<?php
#Codigo Necesario
defined('BASEPATH') OR exit('No direct script access allowed');

#Codigo necesario -> El nombre de la clase tiene que ser exactamente igual al nombre del archivo
class Publication extends CI_Controller {

	# El Constructor siempre es necesario y se tiene que poner al principio
	public function __construct(){
		//Este parent construct sirve para utilizar el constructor padre de la clase el cual es al que se extiende la clase
		#Este codigo es necesario
		parent::__construct();
		$this->load->model("Publication_model");
	}

	# La funcion de index es la funcion que se carga automaticamente siempre que se inicia un constructor
	public function index()
	{

		$datos["listPublications"] = $this->Publication_model->Read_All_Publication();


		$this->load->view("Format/header");
		$this->load->view('Publicaction/CreatePublicacionView', $datos);
		$this->load->view("Format/footer");

	}

	public function NewPublication(){

		$txtTitulo = $_POST["txtTitulo"];
		$txtDescripcion = $_POST["txtDescripcion"];

		$data = array('Titulo' => $txtTitulo, 'Descripcion' => $txtDescripcion, "ID_Usuario" => 1);

		$this->Publication_model->Create_Publication($data);

		return redirect(base_url()."index.php/Publication");
	}
}
