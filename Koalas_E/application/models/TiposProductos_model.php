<?php

	class Tiposproductos_model extends CI_Model {

		function Create_tiposproducto($data){

			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->insert('tbtiposproductos');

		}

		function select_all(){

			$this->db->select("*");
			$this->db->from("tbtiposproductos");
			$result = $this->db->get();

			return $result->result();

		}

	}

?>
