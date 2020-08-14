<?php

	class Municipio_model extends CI_Model {

		function Create_Municipio($data){

			$this->db->insert("tbmunicipios", $data);

		}

		public function insert_tbmunicipios($data){
			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->insert('tbmunicipios');
		}

		public function update_tbmunicipios($data,$ID_Municipio){
			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->where('ID_Municipio', $ID_Municipio);
			$this->db->update('tbmunicipios');

		}

		public function delete_tbmunicipios($ID_Municipio){
			$this->db->where("ID_Municipio", $ID_Municipio);
			$this->db->delete("tbmunicipios");

			return true;

		}

		public function select_tbmunicipios($data){
			$this->db->select('*');
			$this->db->from("tbmunicipios");
			foreach ($data as $campo => $valor) {
				$this->db->where($campo, $valor);
			}
			$result = $this->db->get();

		    return $result->result();
		}

		public function select_tbmunicipios_all(){
			$this->db->select('*');
			$this->db->from("tbmunicipios");

			$result = $this->db->get();

		    return $result->result();
		}

		public function select_tbmunicipios_all_join(){
			$this->db->select('*');
			$this->db->from("tbmunicipios");
			$this->db->join("tbdepartamentos", "tbmunicipios.ID_Departamento = tbdepartamentos.ID_Departamento");
			$this->db->join("tbcertificaciones", "tbmunicipios.ID_Certificacion = tbcertificaciones.ID_Certificacion");
			$result = $this->db->get();

		    return $result->result();
		}

		function select_all(){

			$this->db->select("*");
			$this->db->from("tbmunicipios");
			$result = $this->db->get();

			return $result->result();

		}

		function select_where($data){

			$this->db->select("*");
			$this->db->from("tbmunicipios");
			foreach ($data as $key_data => $d) {
				$this->db->where($key_data, $d);
			}
			$result = $this->db->get();

			return $result->result();

		}

	}

?>
