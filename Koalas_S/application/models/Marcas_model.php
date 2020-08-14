<?php

	class Marcas_model extends CI_Model {

		function Create_marca($data){

			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->insert('tbmarcas');

		}

		function select_all(){

			$this->db->select("*");
			$this->db->from("tbmarcas");
			$result = $this->db->get();

			return $result->result();

		}

		public function insert_tbmarcas($data){
			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->insert('tbmarcas');
		}

		public function update_tbmarcas($data,$ID_Marca){
			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->where('ID_Marca', $ID_Marca);
			$this->db->update('tbmarcas');

		}

		public function delete_tbmarcas($ID_Marca){
			$this->db->where("ID_Marca", $ID_Marca);
			$this->db->delete("tbmarcas");

			return true;

		}

		public function select_tbmarcas($data){
			$this->db->select('*');
			$this->db->from("tbmarcas");
			foreach ($data as $campo => $valor) {
				$this->db->where($campo, $valor);
			}
			$result = $this->db->get();

		    return $result->result();
		}

		public function select_tbmarcas_all(){
			$this->db->select('*');
			$this->db->from("tbmarcas");

			$result = $this->db->get();

		    return $result->result();
		}

	}

?>
