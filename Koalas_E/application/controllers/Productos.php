<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Producto_model");
		$this->load->model("Marcas_model");
		$this->load->model("Tiposproductos_model");
		$this->load->model("User_model");
		$this->load->helper('form');
		$this->load->library('upload');
	}

	public function index()
	{

		$datos["listProducto"] = $this->Producto_model->Read_All_Producto();
		$datos["listMarcas"] = $this->Marcas_model->select_all();
		$datos["listUsuarios"] = $this->User_model->Read_All_User();
		$datos["listTiposProductos"] = $this->Tiposproductos_model->select_all();

		$this->load->view("Format/header");
		$this->load->view('Productos/CreateProducto', $datos);
		$this->load->view("Format/footer");
	}

	public function NewProducto(){

		echo "<pre>";
		print_r($_FILES);
		echo "</pre>";
		
		$Marca = $_POST["slcMarca"];
		$Usuario = $_POST["slcUsuario"];
		$TipoProducto = $_POST["slcTipoProducto"];
		$Nombre = $_POST["txtNombre"];
		$FechaVencimiento = $_POST["txtFechaVencimiento"];
		$Descripcion = $_POST["txtDescripcion"];

		$nameFile = "img".crc32($_FILES["imagenProducto"]["name"]);

		$config['upload_path']          = 'assets/files';
        $config['allowed_types']        = 'jpg|png|jpeg|JPG';
        $config['max_size']             = 1000000;
        $config['file_name']            = $nameFile.".png";

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload("imagenProducto")){
            print_r(array('error' => $this->upload->display_errors()));
        }else{

            $this->upload->data();

			$data = array(
				"ID_Marca" => $Marca,
				"ID_Usuario" => $Usuario,
				"ID_TipoProducto" => $TipoProducto,
				"Nombre" => $Nombre,
				"FechaVencimiento" => $FechaVencimiento,
				"Descripcion" => $Descripcion,
				"NombreImagen" => $nameFile,
				"UrlImagen" => "assets/files/".$nameFile.".png"
			);

			$this->Producto_model->Create_Producto($data);
        }


		return redirct(base_url()."index.php/Productos");
	}
}
		
