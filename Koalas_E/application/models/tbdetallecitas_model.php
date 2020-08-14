<?php
class tbdetallecitas_model extends CI_Model{

	public function insert_tbdetallecitas($data){
		foreach ($data as $campo => $valor) {
			$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
		}
		$this->db->insert('tbdetallecitas');
	}

	public function update_tbdetallecitas($data,$ID_DetalleCita){
		foreach ($data as $campo => $valor) {
			$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
		}
		$this->db->where('ID_DetalleCita', $ID_DetalleCita);
		$this->db->update('tbdetallecitas');

	}

	public function delete_tbdetallecitas($ID_DetalleCita){
		$this->db->where("ID_DetalleCita", $ID_DetalleCita);
		$this->db->delete("tbdetallecitas");

		return true;

	}

	public function select_tbdetallecitas($data){
		$this->db->select('*');
		$this->db->from("tbdetallecitas");
		foreach ($data as $campo => $valor) {
			$this->db->where($campo, $valor);
		}
		$result = $this->db->get();

	    return $result->result();
	}

	public function select_tbdetallecitas_all(){
		$this->db->select('*');
		$this->db->from("tbdetallecitas");

		$result = $this->db->get();

	    return $result->result();
	}

}