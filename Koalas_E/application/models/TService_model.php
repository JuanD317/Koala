<?php 

	class TService_model extends CI_model{
	
	function Create_TService($data){
		
		$this->db->insert("tbtiposervicio", $data);

	}

	function Read_All_TService(){
		$this->db->select("*");
		$this->db->from("tbtiposervicio");
		$result = $this->db->get();

		return $result->result();


		}

		public function insert_tbtiposervicio($data){
			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->insert('tbtiposervicio');
		}

		public function update_tbtiposervicio($data,$ID_TipoServicio){
			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->where('ID_TipoServicio', $ID_TipoServicio);
			$this->db->update('tbtiposervicio');

		}

		public function delete_tbtiposervicio($ID_TipoServicio){
			$this->db->where("ID_TipoServicio", $ID_TipoServicio);
			$this->db->delete("tbtiposervicio");

			return true;

		}

		public function select_tbtiposervicio($data){
			$this->db->select('*');
			$this->db->from("tbtiposervicio");
			foreach ($data as $campo => $valor) {
				$this->db->where($campo, $valor);
			}
			$result = $this->db->get();

		    return $result->result();
		}

		public function select_tbtiposervicio_all(){
			$this->db->select('*');
			$this->db->from("tbtiposervicio");

			$result = $this->db->get();

		    return $result->result();
		}
	}


?>