<?php

	class Mascota_model extends CI_Model {

		function Create_Mascota($data){

			$this->db->insert("tbmascotas", $data);

		}

		function select_all(){

			$this->db->select("tbmascotas.ID_Mascota, tbclientes.Nombre AS nombreCliente, tbclientes.Apellido, tbespecies.Especie, tbsexos.Nombre AS nombreSexo, tbmascotas.Nombre AS nombreMascota, tbmascotas.FechaNacimiento");
			$this->db->from("tbmascotas");
			$this->db->join("tbclientes", "tbclientes.ID_Cliente = tbmascotas.ID_Cliente");
			$this->db->join("tbespecies", "tbespecies.ID_Especie = tbmascotas.ID_Especie");
			$this->db->join("tbsexos", "tbsexos.ID_Sexo = tbmascotas.ID_Sexo");
			$result = $this->db->get();

			return $result->result();

		}

		public function insert_tbmascotas($data){
			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->insert('tbmascotas');
		}

		public function update_tbmascotas($data,$ID_Mascota){
			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->where('ID_Mascota', $ID_Mascota);
			$this->db->update('tbmascotas');

		}

		public function delete_tbmascotas($ID_Mascota){
			$this->db->where("ID_Mascota", $ID_Mascota);
			$this->db->delete("tbmascotas");

			return true;

		}

		public function select_tbmascotas($data){
			$this->db->select('*');
			$this->db->from("tbmascotas");
			foreach ($data as $campo => $valor) {
				$this->db->where($campo, $valor);
			}
			$result = $this->db->get();

		    return $result->result();
		}

		public function select_tbmascotas_all(){
			$this->db->select('*');
			$this->db->from("tbmascotas");

			$result = $this->db->get();

		    return $result->result();
		}

	}

?>
