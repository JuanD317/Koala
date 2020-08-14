<?php
class tbdetalleservicio_model extends CI_Model{

	public function insert_tbdetalleservicio($data){
		foreach ($data as $campo => $valor) {
			$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
		}
		$this->db->insert('tbdetalleservicio');
	}

	public function update_tbdetalleservicio($data,$ID_DetalleServicio){
		foreach ($data as $campo => $valor) {
			$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
		}
		$this->db->where('ID_DetalleServicio', $ID_DetalleServicio);
		$this->db->update('tbdetalleservicio');

	}

	public function delete_tbdetalleservicio($ID_DetalleServicio){
		$this->db->where("ID_DetalleServicio", $ID_DetalleServicio);
		$this->db->delete("tbdetalleservicio");

		return true;

	}

	public function select_tbdetalleservicio($data){
		$this->db->select('*');
		$this->db->from("tbdetalleservicio");
		foreach ($data as $campo => $valor) {
			$this->db->where($campo, $valor);
		}
		$result = $this->db->get();

	    return $result->result();
	}

	public function select_tbdetalleservicio_or($data){
		$this->db->select('*');
		$this->db->from("tbdetalleservicio");
		foreach ($data as $campo => $valor) {
			$this->db->or_where("ID_Servicio", $valor);
		}
		$result = $this->db->get();

	    return $result->result();
	}

	public function select_tbdetalleservicio_all(){
		$this->db->select('*');
		$this->db->from("tbdetalleservicio");

		$result = $this->db->get();

	    return $result->result();
	}

}