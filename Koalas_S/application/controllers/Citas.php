<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Citas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("tbcitas_model");
		$this->load->model("tbdetallecitas_model");
		$this->load->model("tbservicios_model");
		$this->load->model("tbdetalleservicio_model");
		$this->load->model("Mascota_model");
	}

	public function index()
	{

		$data["listCitas"] = $this->tbcitas_model->select_tbcitas_join();
		$data["listServicios"] = $this->tbservicios_model->select_tbservicios_all();
		$data["listMascotas"] = $this->Mascota_model->select_all();

		$this->load->view("Format/header");
		$this->load->view('Citas/CitasView', $data);
		$this->load->view("Format/footer");
	}

	public function newCitas(){
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";

		$IdCitas = $_POST["txtIdCitas"];
		$Mascota = $_POST["slcMascota"];
		$Fecha = $_POST["txtFecha"];
		$Descripcion = $_POST["txtDescripcion"];

		$DetalleServicio = $_POST["chkDetalleServicio"];

		$this->tbcitas_model->insert_tbcitas(array("ID_Mascota" => $Mascota, "Descripcion" => $Descripcion, "FechaCita" => $Fecha));

		$max_cita = $this->tbcitas_model->select_tbcitas_max();

		if (sizeof($max_cita) > 0) {
			
			foreach ($DetalleServicio as $key_ds => $ds) {
				
				$this->tbdetallecitas_model->insert_tbdetallecitas(array("ID_Cita" => $max_cita[0]->ID_Cita, "ID_DetalleServicio" => $ds));

			}

		}

		return redirect(base_url()."index.php/Citas");

	}

	public function updateCitas(){
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
	}

	public function detalleServicio(){

		@$IdServicio = $_POST["slcServicio"];

		if (@$IdServicio != "") {
			
			$listDetalleServicio = $this->tbdetalleservicio_model->select_tbdetalleservicio_or($IdServicio);
			$contador = 1;
			foreach ($listDetalleServicio as $key_ds => $ds) {
				?>
				<?php if ($contador == 1): ?>
					<div class="row">
				<?php endif ?>

					<div class="col-md-3">
						<div class="form-group">
							<input type="checkbox" value="<?= $ds->ID_DetalleServicio ?>" id="chkDetalleServicio<?= $key_ds ?>" name="chkDetalleServicio[]" checked>
							<label for="chkDetalleServicio<?= $key_ds ?>"><?= $ds->Nombre." - $".$ds->Precio." - ".$ds->TiempoDuracion ?></label>
						</div>
					</div>

				<?php if ($contador == 4): ?>
					</div>
					<?php $contador = 0; ?>
				<?php endif ?>
				<?php
				$contador++;
			}

			if ($contador != 1 && $contador != 4) {
				echo "</div>";
			}
		}

	}

}
