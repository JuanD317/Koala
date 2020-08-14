<?php

	class Cliente_model extends CI_Model {

		function Create_Cliente($data){

			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->insert('tbclientes');

		}

		function select_all(){

			$this->db->select("*");
			$this->db->from("tbclientes");
			$result = $this->db->get();

			return $result->result();

		}

		public function insert_tbclientes($data){
			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->insert('tbclientes');
		}

		public function update_tbclientes($data,$ID_Cliente){
			foreach ($data as $campo => $valor) {
				$this->db->set($campo, htmlspecialchars($valor, ENT_QUOTES, 'UTF-8'));
			}
			$this->db->where('ID_Cliente', $ID_Cliente);
			$this->db->update('tbclientes');

		}

		public function delete_tbclientes($ID_Cliente){
			$this->db->where("ID_Cliente", $ID_Cliente);
			$this->db->delete("tbclientes");

			return true;

		}

		public function select_tbclientes($data){
			$this->db->select('*');
			$this->db->from("tbclientes");
			foreach ($data as $campo => $valor) {
				$this->db->where($campo, $valor);
			}
			$result = $this->db->get();

		    return $result->result();
		}

		public function select_tbclientes_all(){
			$this->db->select('*');
			$this->db->from("tbclientes");

			$result = $this->db->get();

		    return $result->result();
		}

		public function select_tbclientes_join(){
			$this->db->select('tbclientes.ID_Municipio, tbclientes.ID_Sexo, tbclientes.Nombre, tbclientes.Apellido, tbclientes.Dui, tbclientes.Nit, tbclientes.NoRegistro, tbclientes.FechaNacimiento, tbclientes.Correo, tbclientes.Telefono, tbclientes.Direccion, tbclientes.FechaIngreso, tbmunicipios.Municipio, tbsexos.Nombre AS NombreSexo, tbdepartamentos.Departamento');
			$this->db->from("tbclientes");
			$this->db->join("tbmunicipios", "tbclientes.ID_Municipio = tbmunicipios.ID_Municipio");
			$this->db->join("tbsexos", "tbclientes.ID_Sexo = tbsexos.ID_Sexo");
			$this->db->join("tbdepartamentos", "tbmunicipios.ID_Departamento = tbdepartamentos.ID_Departamento");
			$result = $this->db->get();

		    return $result->result();
		}

	}

?>
