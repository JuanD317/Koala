<?php

	class DetalleServicio_model extends CI_Model {

		function Create_DetalleServicio($data){

			$this->db->insert("tbdetalleservicio", $data);

		}

		function Read_All_DetalleServicio(){

			$this->db->select("*");
			$this->db->from("tbdetalleservicio");
			$result = $this->db->get();

			return $result->result();

		}

	}

?>
