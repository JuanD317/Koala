<?php 

	class Unidad_model extends CI_model	{
		
		function Create_UnidadesMedidas($data)	{
			
			$this->db->insert("tbunidadesmedidas", $data);

		}

		function Read_All_Unidad(){
			$this->db->select("*");
			$this->db->from("tbunidadesmedidas");
			$result = $this->db->get();

			return $result->result();


		}

	}
	
?> 