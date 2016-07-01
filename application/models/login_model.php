<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login_model extends CI_Model {

		public $variable;

		public function __construct(){
			parent::__construct();
		}

		public function login($usuario=null, $password=null)
		{
			$sql="SELECT usuario, perfiles_idperfiles, nombre FROM usuarios
			WHERE usuario = '".$usuario. "' AND contrasena = '".$password. "' AND estatus='1';";
			$query = $this->db->query($sql);

			if($query->num_rows() > 0)
			{
				return $query->row();
			}
			else
			{
				return false;
			}
		}

		public function login_i($username,$password)
		{
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$q = $this->db->get('usuarios');

			if ($q->result()) {
				return true;
			}else{
				return false;
			}

			/*$sql = "select * from usuarios ".$where;
			$query = $this->db->query($sql);
			return $query->result();
			*/
		}
	}
