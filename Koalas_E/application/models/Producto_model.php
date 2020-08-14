<?php 

	class Producto_model extends CI_model{
		
	function Create_Producto($data){
			
		$this->db->insert("tbproductos", $data);

	}

	function Read_All_Producto(){
		$this->db->select("*");
		$this->db->from("tbproductos");
		$result = $this->db->get();

		return $result->result();


		}

	}

?>