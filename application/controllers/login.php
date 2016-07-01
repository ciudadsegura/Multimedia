<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->output->set_header('Access-Control-Allow-Origin: *');
	}

	public function index()
	{
		if($this->session->userdata('loggedIn'))
		{
			redirect('inicio', 'location');
		}
		$this->load->view('login');
	}

	public function do_login()
	{
		if($this->session->userdata('loggedIn'))
		{
			redirect('troubleticket', 'location');
		}

		/*
		$this->load->library('form_validation');
		$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|xss_clean|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[3]|max_length[20]');

		if (!$this->form_validation->run())
		{
			$this->load->view('login');
			return;
		}
		*/

		$usuario 	= trim($this->input->post('usuario'));
		$password 	= trim($this->input->post('password'));

		$resultado = $this->login_model->login($usuario, $password);

		if($resultado)
		{
			$auth = array();
			$auth['nombre']     	 = $resultado->nombre;
			$auth['usuario']     	 = $resultado->usuario;
			$auth['id_perfil']       = $resultado->perfiles_idperfiles;
			//$auth['sello']		     = $this->seguridad_modelo->sellar_sesion($auth);
			
			$this->session->set_userdata("loggedIn", $auth);

			$data['tipo'] = 'exito';
			//redirect('troubleticket');
		}
		else
		{
			$data['tipo']    = 'error';
			$data['mensaje'] = ' El usuario y/o password son incorrectos o el usuario se encuentra inactivo. ';
			redirect('login');
		}
		echo json_encode($data);
	}

	function logout()
	{
		$this->session->unset_userdata('loggedIn');
		$this->session->sess_destroy();
		
		redirect('login');
	}
}
