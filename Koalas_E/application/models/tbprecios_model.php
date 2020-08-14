<?php
class tbprecios_model extends CI_Model{

	public function insert_tbprecios($data){
		foreach ($data as $campo => $valor) {
			$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
		}
		$this->db->insert('tbprecios');
	}

	public function update_tbprecios($data,$ID_Precio){
		foreach ($data as $campo => $valor) {
			$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
		}
		$this->db->where('ID_Precio', $ID_Precio);
		$this->db->update('tbprecios');

	}

	public function delete_tbprecios($ID_Precio){
		$this->db->where("ID_Precio", $ID_Precio);
		$this->db->delete("tbprecios");

		return true;

	}

	public function select_tbprecios($data){
		$this->db->select('*');
		$this->db->from("tbprecios");
		foreach ($data as $campo => $valor) {
			$this->db->where($campo, $valor);
		}
		$result = $this->db->get();

	    return $result->result();
	}

	public function select_tbprecios_all(){
		$this->db->select('*');
		$this->db->from("tbprecios");

		$result = $this->db->get();

	    return $result->result();
	}

	public function select_tbprecios_all_join(){
		$this->db->select('tbprecios.ID_Precio, tbproductos.Nombre, tbprecios.ID_Producto, tbprecios.ID_UnidadMedida, tbunidadesmedidas.Unidad, tbprecios.Precio');
		$this->db->from("tbprecios");
		$this->db->join("tbproductos", "tbproductos.ID_Producto = tbprecios.ID_Producto");
		$this->db->join("tbunidadesmedidas", "tbunidadesmedidas.ID_UnidadMedida = tbprecios.ID_UnidadMedida");
		$result = $this->db->get();
	    return $result->result();
	}

}