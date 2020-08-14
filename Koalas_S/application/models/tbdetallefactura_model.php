<?php
class tbdetallefactura_model extends CI_Model{

	public function insert_tbdetallefactura($data){
		foreach ($data as $campo => $valor) {
			$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
		}
		$this->db->insert('tbdetallefactura');
	}

	public function update_tbdetallefactura($data,$ID_Factura){
		foreach ($data as $campo => $valor) {
			$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
		}
		$this->db->where('ID_Factura', $ID_Factura);
		$this->db->update('tbdetallefactura');

	}

	public function delete_tbdetallefactura($ID_Factura){
		$this->db->where("ID_Factura", $ID_Factura);
		$this->db->delete("tbdetallefactura");

		return true;

	}

	public function select_tbdetallefactura($data){
		$this->db->select('*');
		$this->db->from("tbdetallefactura");
		foreach ($data as $campo => $valor) {
			$this->db->where($campo, $valor);
		}
		$result = $this->db->get();

	    return $result->result();
	}

	public function select_tbdetallefactura_all(){
		$this->db->select('*');
		$this->db->from("tbdetallefactura");

		$result = $this->db->get();

	    return $result->result();
	}

}