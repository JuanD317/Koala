<?php
class tbpaises_model extends CI_Model{

	public function insert_tbpaises($data){
		foreach ($data as $campo => $valor) {
			$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
		}
		$this->db->insert('tbpaises');
	}

	public function update_tbpaises($data,$ID_Pais){
		foreach ($data as $campo => $valor) {
			$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
		}
		$this->db->where('ID_Pais', $ID_Pais);
		$this->db->update('tbpaises');

	}

	public function delete_tbpaises($ID_Pais){
		$this->db->where("ID_Pais", $ID_Pais);
		$this->db->delete("tbpaises");

		return true;

	}

	public function select_tbpaises($data){
		$this->db->select('*');
		$this->db->from("tbpaises");
		foreach ($data as $campo => $valor) {
			$this->db->where($campo, $valor);
		}
		$result = $this->db->get();

	    return $result->result();
	}

	public function select_tbpaises_all(){
		$this->db->select('*');
		$this->db->from("tbpaises");

		$result = $this->db->get();

	    return $result->result();
	}

}