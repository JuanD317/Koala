<?php

	class Service_model extends CI_Model {

		function Create_Service($data){

			$this->db->insert("tbservicios", $data);

		}

		function Read_All_Service(){

			$this->db->select("*");
			$this->db->from("tbservicios");
			$result = $this->db->get();

			return $result->result();

		}

	}

?>
