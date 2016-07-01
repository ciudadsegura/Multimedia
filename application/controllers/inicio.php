<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata('loggedIn'))
		{
			redirect('login', 'location');
		}
		
		$elem = array("Inicio");
		
		$data['navegacion']	= generar_navegacion(site_url(), $elem);
		$data['pagina']		= 'troubleT/ticket_gestor';
		$data['menu']		= 'Inicio';
		
		$this->load->view('_template', $data);
	}
}
