<?php 
	class tbtiposmovimientos_model extends CI_model {

		public function insert_tbtiposmovimientos($data){
			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->insert('tbtiposmovimientos');
		}

		public function update_tbtiposmovimientos($data,$ID_TipoMovimiento){
			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->where('ID_TipoMovimiento', $ID_TipoMovimiento);
			$this->db->update('tbtiposmovimientos');

		}

		public function delete_tbtiposmovimientos($ID_TipoMovimiento){
			$this->db->where("ID_TipoMovimiento", $ID_TipoMovimiento);
			$this->db->delete("tbtiposmovimientos");

			return true;

		}

		public function select_tbtiposmovimientos($data){
			$this->db->select('*');
			$this->db->from("tbtiposmovimientos");
			foreach ($data as $campo => $valor) {
				$this->db->where($campo, $valor);
			}
			$result = $this->db->get();

		    return $result->result();
		}

		public function select_tbtiposmovimientos_all(){
			$this->db->select('*');
			$this->db->from("tbtiposmovimientos");

			$result = $this->db->get();

		    return $result->result();
		}

	}

?>