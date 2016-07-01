<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Usuarios_modelo extends CI_Model {

		public $variable;

		public function __construct(){
			parent::__construct();
		}

		public function buscar($where="",$order="", $limit ="")
		{		 
			$sql = "SELECT * from usuarios where 1 = 1 ".$where." ".$order." ".$limit;
							
			$query = $this->db->query($sql);
				
			return $query->result();
		}

		public function insertar_usuario($data)
		{
			return $this->db->insert('usuarios',$data);
		}

		public function validar_usuario($usuario)
		{
			$sql = "SELECT usuario FROM usuarios WHERE usuario ='".$usuario."'";

			$query = $this->db->query($sql);

			return $query->num_rows();
		}

		public function buscar_nombre_usuario($usuario)
		{
			$sql = "SELECT usuario FROM usuarios WHERE usuario ='".$usuario."'";

			$query = $this->db->query($sql);

			return $query->num_rows();
		}

		public function limpiar_base(){
			return $this->db->empty_table('usuarios');
		}

		public function obtener_regsitro_perfil()
		{		 
			$sql = "SELECT * from perfiles";
							
			$query = $this->db->query($sql);
				
			return $query->result();
		}

	}
