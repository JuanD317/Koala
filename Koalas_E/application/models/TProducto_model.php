<?php 

	
	class TProducto_model extends CI_model {
		
		function Create_TProducto($data){
			
			$this->db->insert("tbkardex", $data);

		}

		function Read_All_Producto()		{
			$this->db->select("*");
			$this->db->from("tbfacturas");
			$result = $this->db->get();

			return $result->result();

		}

		public function insert_tbtiposproductos($data){
			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->insert('tbtiposproductos');
		}

		public function update_tbtiposproductos($data,$ID_TipoProducto){
			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->where('ID_TipoProducto', $ID_TipoProducto);
			$this->db->update('tbtiposproductos');

		}

		public function delete_tbtiposproductos($ID_TipoProducto){
			$this->db->where("ID_TipoProducto", $ID_TipoProducto);
			$this->db->delete("tbtiposproductos");

			return true;

		}

		public function select_tbtiposproductos($data){
			$this->db->select('*');
			$this->db->from("tbtiposproductos");
			foreach ($data as $campo => $valor) {
				$this->db->where($campo, $valor);
			}
			$result = $this->db->get();

		    return $result->result();
		}

		public function select_tbtiposproductos_all(){
			$this->db->select('*');
			$this->db->from("tbtiposproductos");

			$result = $this->db->get();

		    return $result->result();
		}

	}

?>