<?php
class tbcitas_model extends CI_Model{

	public function insert_tbcitas($data){
		foreach ($data as $campo => $valor) {
			$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
		}
		$this->db->insert('tbcitas');
	}

	public function update_tbcitas($data,$ID_Cita){
		foreach ($data as $campo => $valor) {
			$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
		}
		$this->db->where('ID_Cita', $ID_Cita);
		$this->db->update('tbcitas');

	}

	public function delete_tbcitas($ID_Cita){
		$this->db->where("ID_Cita", $ID_Cita);
		$this->db->delete("tbcitas");

		return true;

	}

	public function select_tbcitas($data){
		$this->db->select('*');
		$this->db->from("tbcitas");
		foreach ($data as $campo => $valor) {
			$this->db->where($campo, $valor);
		}
		$result = $this->db->get();

	    return $result->result();
	}

	public function select_tbcitas_all(){
		$this->db->select('*');
		$this->db->from("tbcitas");

		$result = $this->db->get();

	    return $result->result();
	}

	public function select_tbcitas_join(){
		$this->db->select('*');
		$this->db->from("tbcitas");
		$this->db->join("tbmascotas", "tbmascotas.ID_Mascota = tbcitas.ID_Mascota");
		$result = $this->db->get();

	    return $result->result();
	}

	public function select_tbcitas_max(){
		$this->db->select('MAX(ID_Cita) AS ID_Cita');
		$this->db->from("tbcitas");

		$result = $this->db->get();

	    return $result->result();
	}

}