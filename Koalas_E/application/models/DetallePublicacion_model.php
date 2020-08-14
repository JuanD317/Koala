<?php

	class DetallePublicacion_model extends CI_Model {

		function Create_DetallePublicacion($data){

			$this->db->insert("tbdetallepublicaciones", $data);

		}

		function Read_All_DetallePublicacion(){

			$this->db->select("*");
			$this->db->from("tbdetallepublicaciones");
			$result = $this->db->get();

			return $result->result();

		}

	}

?>
