<?php 

	class Publication_model extends CI_Model {
		
		function Create_Publication($data){
			
			$this->db->insert("tbpublicaciones", $data);

		}

		function Read_All_Publication(){
			$this->db->select("*");
			$this->db->from("tbpublicaciones");
			$result = $this->db->get();

			return $result->result();

		}

	}

?>