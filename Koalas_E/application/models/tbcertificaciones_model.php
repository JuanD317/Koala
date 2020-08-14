<?php
class tbcertificaciones_model extends CI_Model{

	public function insert_tbcertificaciones($data){
		foreach ($data as $campo => $valor) {
			$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
		}
		$this->db->insert('tbcertificaciones');
	}

	public function update_tbcertificaciones($data,$ID_Certificacion){
		foreach ($data as $campo => $valor) {
			$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
		}
		$this->db->where('ID_Certificacion', $ID_Certificacion);
		$this->db->update('tbcertificaciones');

	}

	public function delete_tbcertificaciones($ID_Certificacion){
		$this->db->where("ID_Certificacion", $ID_Certificacion);
		$this->db->delete("tbcertificaciones");

		return true;

	}

	public function select_tbcertificaciones($data){
		$this->db->select('*');
		$this->db->from("tbcertificaciones");
		foreach ($data as $campo => $valor) {
			$this->db->where($campo, $valor);
		}
		$result = $this->db->get();

	    return $result->result();
	}

	public function select_tbcertificaciones_all(){
		$this->db->select('*');
		$this->db->from("tbcertificaciones");

		$result = $this->db->get();

	    return $result->result();
	}

}