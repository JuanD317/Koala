<?php

	class Especie_model extends CI_Model {

		function Create_Especie($data){

			$this->db->insert("tbespecies", $data);

		}

		function select_all(){

			$this->db->select("*");
			$this->db->from("tbespecies");
			$result = $this->db->get();

			return $result->result();

		}

	}

?>
