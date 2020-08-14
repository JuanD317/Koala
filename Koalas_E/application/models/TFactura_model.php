<?php 

	class TFactura_model extends CI_model {
	
		public function insert_tbdetallefactura($data){
			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->insert('tbfacturas');
		}

		function Read_All_Factura(){
			$this->db->select("*");
			$this->db->from("tbfacturas");
			$result = $this->db->get();

			return $result->result();	
		}

		function max_factura(){
			$this->db->select("MAX(ID_Factura) AS ID_Factura");
			$this->db->from("tbfacturas");
			$result = $this->db->get();

			return $result->result();	
		}

	}

?>