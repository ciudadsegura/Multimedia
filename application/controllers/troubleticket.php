<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Troubleticket extends CI_Controller {

	var $datos;

	public function __construct()
	{
		parent::__construct();
		
		$this->datos = $this->session->userdata("loggedIn");
		
		if(!$this->session->userdata('loggedIn'))
		{
			redirect('login', 'location');
		}	
		
		$this->load->model("ticket_modelo");

		date_default_timezone_set('America/Mexico_City');
	}

	public function index()
	{
		/*$id_usuario_permiso = $this->datos['id_usuario'];
		
		$permiso_escritura  = $this->permiso_modelo->obtener_permisos_usuario($id_usuario_permiso,"P012");
		$permiso_lectura    = $this->permiso_modelo->obtener_permisos_usuario($id_usuario_permiso,"P011");
		*/

		$where = "";
		$order = " order by idtickets DESC";
		$limit = " LIMIT 50";

		$data['ticket'] 	= $this->ticket_modelo->buscar($where,$order,$limit);

		//var_dump($data['ticket']);

		$elem = array("Inicio|inicio", "Tickets");
		$data['navegacion']	= generar_navegacion(site_url(), $elem);
		
		$data['pagina']		  = "troubleT/ticket_gestor.php";
		$data['total_ticket'] = sizeof($data['ticket']);
		$data['menu']		  = 'Catálogos';
		$data['submenu']	  = 'Tickets';

		$this->load->view('_template', $data);
	}

	public function buscar()
	{
		$where = "";
		$limit = "";
		$order = "";
				
		$nombre 			= trim($this->input->post("nombre"));
		$status 			= $this->input->post("status");
		$datos_mostrar 		= $this->input->post("mostrar");		
		$ordenamiento 		= trim($this->input->post('ordenamiento'));

	
			if(strlen($nombre) > 0 )
			{
				$where .= "AND (ticket like '%".$nombre."%')";
			}
			

			if($status != 'todos' )
			{
				$where .= "AND incident_status = '".$status."' ";
			}

			if($datos_mostrar != '0' )
			{
				$limit='LIMIT '.$datos_mostrar;
			}


			if($ordenamiento != '0' )
			{
				$order .= " order by closing_time DESC";
			}
	
			if($ordenamiento === '0' )
			{
				$order .= " order by closing_time ASC";
			}

		$ticket	= $this->ticket_modelo->buscar($where,$order,$limit);

		$html = $this->load->view('troubleT/_tabla_ticket', array('ticket' => $ticket), true);

		$datos['html'] = $html;
		$datos['total_ticket'] = sizeof($ticket);

		echo json_encode($datos);

	}

	public function carga_masiva()
	{			

		$elem = array("Inicio|inicio", "Tickets|Troubleticket", "Carga Masiva Tickets");
		$data['navegacion']	= generar_navegacion(site_url(), $elem);			

		$data["pagina"] 			= "troubleT/carga_tickets";
		$data['menu']			= 'Configuración';
		$data['submenu']		= 'Carga de Tickets';
		
		$this->load->view("_template", $data);
	}

	public function importar_excel()
	{
		$elem = array("Inicio|inicio", "Tickets|Troubleticket", "Carga Masiva Tickets");
		$data['navegacion']	= generar_navegacion(site_url(), $elem);				

		$data['menu']			= 'Catálogos';
		$data['submenu']		= 'Tickets';

		try
		{
			//Subimos el excel
			$nombre = "carga_de_tickets.xlsx";
			
			$this->load->library('upload');
			
			$config["upload_path"]	 = "temp/";
			$config["file_name"]     = $nombre;
			$config["overwrite"]     = "TRUE";
			$config["allowed_types"] = "xlsx";
			$config["max_size"]      = "2048";
			
			$this->upload->initialize($config);
			
			if (!$this->upload->do_upload('carga_tickets'))
				throw new Exception('<strong>Error</strong>. Ocurrió un error al intentar adjuntar el archivo.'.$this->upload->display_errors());
			
			$this->load->model("_excel_ticket_modelo");
			
			$datos = $this->_excel_ticket_modelo->importar_ticket($nombre);
			$this->ticket_modelo->limpiar_base();
			//$data['respuesta'] 	= $this->ticket_modelo->insertar_ticket($datos);

			$data['ticket']	= $datos;

			$conteo = 0;
			
			for ($i = 0; $i < count($datos['ticket']); $i++)
			{				
				$conteo = $conteo + 1;

				$insert['idtickets'] 			= $conteo;
				$insert['ticket'] 				= $datos['ticket'][$i];
				$insert['full_category_name'] 	= $datos['full_category_name'][$i];
				$insert['ps_name'] 				= $datos['ps_name'][$i];
				$insert['place_name'] 			= $datos['place_name'][$i];
				$insert['id_ci'] 				= $datos['id_ci'][$i];
				$insert['descriptions_coments'] = $datos['descriptions_coments'][$i];
				$insert['closing_time'] 		= $datos['closing_time'][$i];
				$insert['create_time'] 			= $datos['create_time'][$i];
				$insert['incident_priority'] 	= $datos['incident_priority'][$i];
				$insert['incident_status'] 		= $datos['incident_status'][$i];
				$insert['incident_type'] 		= $datos['incident_type'][$i];

				$data['respuesta'] 	= $this->ticket_modelo->insertar_ticket($insert);
				
			} 

			$data['total_tickets'] = $conteo;

			$datos_respuesta['tipo']	= 'exito';
			$datos_respuesta['mensaje'] = 'La carga de productos se realizo con exito';
		}
		catch (Exception $e)
		{
			$datos_respuesta['tipo']	= 'error';
			$datos_respuesta['mensaje'] = $e->getMessage();
		}

		//var_dump($datos_respuesta);
		$where = "";
		$order = " order by idtickets ASC";
		$limit = " LIMIT 50";

		$data['ticket'] 	= $this->ticket_modelo->buscar($where,$order,$limit);
		$data['total_ticket'] = sizeof($data['ticket']);
		$data["pagina"] 		= "troubleT/ticket_gestor";

		$this->load->view("_template", $data);
	}
}
