<?php

	class User_model extends CI_Model {

		function Create_User($data){

			$this->db->insert("tbusuarios", $data);

		}

		function Read_All_User(){

			$this->db->select("*");
			$this->db->from("tbusuarios");
			$result = $this->db->get();

			return $result->result();

		}

		public function insert_tbusuarios($data){
			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->insert('tbusuarios');
		}

		public function update_tbusuarios($data,$ID_Usuario){
			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->where('ID_Usuario', $ID_Usuario);
			$this->db->update('tbusuarios');

		}

		public function delete_tbusuarios($ID_Usuario){
			$this->db->where("ID_Usuario", $ID_Usuario);
			$this->db->delete("tbusuarios");

			return true;

		}

		public function select_tbusuarios($data){
			$this->db->select('*');
			$this->db->from("tbusuarios");
			foreach ($data as $campo => $valor) {
				$this->db->where($campo, $valor);
			}
			$result = $this->db->get();

		    return $result->result();
		}

		public function select_tbusuarios_all(){
			$this->db->select('*');
			$this->db->from("tbusuarios");

			$result = $this->db->get();

		    return $result->result();
		}

	}

?>
