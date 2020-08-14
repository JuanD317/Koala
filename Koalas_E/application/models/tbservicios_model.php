<?php
class tbservicios_model extends CI_Model{

	public function insert_tbservicios($data){
		foreach ($data as $campo => $valor) {
			$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
		}
		$this->db->insert('tbservicios');
	}

	public function update_tbservicios($data,$ID_Servicio){
		foreach ($data as $campo => $valor) {
			$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
		}
		$this->db->where('ID_Servicio', $ID_Servicio);
		$this->db->update('tbservicios');

	}

	public function delete_tbservicios($ID_Servicio){
		$this->db->where("ID_Servicio", $ID_Servicio);
		$this->db->delete("tbservicios");

		return true;

	}

	public function select_tbservicios($data){
		$this->db->select('*');
		$this->db->from("tbservicios");
		foreach ($data as $campo => $valor) {
			$this->db->where($campo, $valor);
		}
		$result = $this->db->get();

	    return $result->result();
	}

	public function select_tbservicios_all(){
		$this->db->select('*');
		$this->db->from("tbservicios");

		$result = $this->db->get();

	    return $result->result();
	}

	public function select_tbservicios_max(){
		$this->db->select('MAX(ID_Servicio) AS ID_Servicio');
		$this->db->from("tbservicios");
		$result = $this->db->get();

	    return $result->result();
	}

	public function select_tbservicios_join(){
		$this->db->select('tbusuarios.Nombre AS NombreUsuario, tbusuarios.Apellido AS ApellidoUsuario, tbservicios.Nombre AS NombreServicio, tbservicios.ID_Usuario, tbservicios.Descripcion, tbservicios.ID_Servicio, tbtiposervicio.TipoServicio');
		$this->db->from("tbservicios");
		$this->db->join("tbusuarios", "tbservicios.ID_Usuario = tbusuarios.ID_Usuario");
		$this->db->join("tbtiposervicio", "tbservicios.ID_TipoServicio = tbtiposervicio.ID_TipoServicio");
		$result = $this->db->get();

	    return $result->result();
	}

	public function select_tbservicios_where($data){
		$this->db->select('tbusuarios.Nombre AS NombreUsuario, tbusuarios.Apellido AS ApellidoUsuario, tbservicios.Nombre AS NombreServicio, tbservicios.ID_Usuario, tbservicios.Descripcion, tbservicios.ID_Servicio, tbtiposervicio.TipoServicio');
		$this->db->from("tbservicios");
		$this->db->join("tbusuarios", "tbservicios.ID_Usuario = tbusuarios.ID_Usuario");
		$this->db->join("tbtiposervicio", "tbservicios.ID_TipoServicio = tbtiposervicio.ID_TipoServicio");
		foreach ($data as $campo => $valor) {
			$this->db->where($campo, $valor);
		}
		$result = $this->db->get();

	    return $result->result();
	}

}