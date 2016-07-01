<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Ticket_modelo extends CI_Model {

		public $variable;

		public function __construct(){
			parent::__construct();
		}

		public function buscar($where="",$order="", $limit ="")
		{		 
			$sql = "SELECT * from tickets where 1 = 1 ".$where." ".$order." ".$limit;
							
			$query = $this->db->query($sql);
				
			return $query->result();
		}

		public function insertar_ticket($data)
		{
			return $this->db->insert('tickets',$data);
		}

		public function actualizar_ticket(){
			
		}

		public function limpiar_base(){
			return $this->db->empty_table('tickets');
		}

	}
