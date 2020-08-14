<?php

	class Sexo_model extends CI_Model {

		function Create_Sexo($data){

			$this->db->insert("tbsexos", $data);

		}

		function select_all(){

			$this->db->select("*");
			$this->db->from("tbsexos");
			$result = $this->db->get();

			return $result->result();

		}

		public function insert_tbsexos($data){
			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->insert('tbsexos');
		}

		public function update_tbsexos($data,$ID_Sexo){
			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->where('ID_Sexo', $ID_Sexo);
			$this->db->update('tbsexos');

		}

		public function delete_tbsexos($ID_Sexo){
			$this->db->where("ID_Sexo", $ID_Sexo);
			$this->db->delete("tbsexos");

			return true;

		}

		public function select_tbsexos($data){
			$this->db->select('*');
			$this->db->from("tbsexos");
			foreach ($data as $campo => $valor) {
				$this->db->where($campo, $valor);
			}
			$result = $this->db->get();

		    return $result->result();
		}

		public function select_tbsexos_all(){
			$this->db->select('*');
			$this->db->from("tbsexos");

			$result = $this->db->get();

		    return $result->result();
		}

	}

?>
