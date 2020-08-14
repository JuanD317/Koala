<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("tbservicios_model");
		$this->load->model("TService_model");
		$this->load->model("tbdetalleservicio_model");
	}

	public function index()
	{

		$datos["listService"] = $this->tbservicios_model->select_tbservicios_join();
		$datos["listTipoServicios"] = $this->TService_model->select_tbtiposervicio_all();

		$this->load->view("Format/header");
		$this->load->view('Service/CreateService', $datos);
		$this->load->view("Format/footer");

	}

	public function newService(){

		$IdService = $_POST["txtIdService"];
		$TipoServicio = $_POST["slcTipoServicio"];
		$Servicio = $_POST["txtServicio"];
		$Descripcion = $_POST["txtDescripcion"];

		$d_Nombre = $_POST["input_Nombre"];
		$d_Descripcion = $_POST["input_Descripcion"];
		$d_Costo = $_POST["input_Costo"];
		$d_Precio = $_POST["input_Precio"];
		$d_TiempoDuracion = $_POST["input_TiempoDuracion"];

		$this->tbservicios_model->insert_tbservicios(array("ID_TipoServicio" => $TipoServicio, "ID_Usuario" => $_SESSION["login"]["ID_Usuario"], "Nombre" => $Servicio, "Descripcion" => $Descripcion));

		$max_servicio = $this->tbservicios_model->select_tbservicios_max();

		if(sizeof($max_servicio) > 0){

			foreach ($d_Nombre as $key_detalle => $detalle) {
				
				$this->tbdetalleservicio_model->insert_tbdetalleservicio(array("ID_Servicio" => $max_servicio[0]->ID_Servicio, "Nombre" => $detalle, "Descripcion" => $d_Descripcion[$key_detalle], "Costo" => $d_Costo[$key_detalle], "Precio" => $d_Precio[$key_detalle], "TiempoDuracion" => $d_TiempoDuracion[$key_detalle]));

			}

		}

		return redirect(base_url()."index.php/Service");

	}

	public function updateService(){

		echo "<pre>";
		print_r($_POST);
		echo "</pre>";

	}

	public function DetalleServicio(){

		$detalleServicio = $_POST["detalleServicio"];

		$listDetalleServicio = $this->tbdetalleservicio_model->select_tbdetalleservicio(array("ID_Servicio" => $detalleServicio));
		$servicio = $this->tbservicios_model->select_tbservicios_where(array("ID_Servicio" => $detalleServicio));

		foreach ($servicio as $key_s => $s) {
			
			?>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Creado Por:</label><br>
						<label for=""><?= $s->NombreUsuario." ".$s->ApellidoUsuario ?></label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Tipo de Servicio:</label><br>
						<label for=""><?= $s->TipoServicio ?></label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Nombre de Servicio:</label><br>
						<label for=""><?= $s->NombreServicio ?></label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Descripcion: </label><br>
						<label for=""><?= $s->Descripcion ?></label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table nowrap">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Descripcion</th>
								<th>Costo</th>
								<th>Precio</th>
								<th>Tiempo de Duracion</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($listDetalleServicio as $key_ds => $ds): ?>
								<tr>
									<td><?= $ds->Nombre ?></td>
									<td><?= $ds->Descripcion ?></td>
									<td><?= $ds->Costo ?></td>
									<td><?= $ds->Precio ?></td>
									<td><?= $ds->TiempoDuracion ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
			<?php

		}

	}
}
		