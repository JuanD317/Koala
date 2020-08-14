<?php
class Departamento_model extends CI_Model{

	public function insert_tbdepartamentos($data){
		foreach ($data as $campo => $valor) {
			$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
		}
		$this->db->insert('tbdepartamentos');
	}

	public function update_tbdepartamentos($data,$ID_Departamento){
		foreach ($data as $campo => $valor) {
			$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
		}
		$this->db->where('ID_Departamento', $ID_Departamento);
		$this->db->update('tbdepartamentos');

	}

	public function delete_tbdepartamentos($ID_Departamento){
		$this->db->where("ID_Departamento", $ID_Departamento);
		$this->db->delete("tbdepartamentos");

		return true;

	}

	public function select_tbdepartamentos($data){
		$this->db->select('*');
		$this->db->from("tbdepartamentos");
		foreach ($data as $campo => $valor) {
			$this->db->where($campo, $valor);
		}
		$result = $this->db->get();

	    return $result->result();
	}

	public function select_tbdepartamentos_all(){
		$this->db->select('*');
		$this->db->from("tbdepartamentos");

		$result = $this->db->get();

	    return $result->result();
	}

	public function select_tbdepartamentos_all_join(){
		$this->db->select('*');
		$this->db->from("tbdepartamentos");
		$this->db->join("tbpaises", "tbdepartamentos.ID_Pais = tbpaises.ID_Pais");
		$result = $this->db->get();

	    return $result->result();
	}

}