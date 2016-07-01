<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	var $datos;
	
	public function __construct()
	{
		parent::__construct();

		$this->datos = $this->session->userdata("loggedIn");
		
		if(!$this->datos)
		{
			redirect('login', 'location');
		}
		
		$this->load->model("reporte_modelo");

		date_default_timezone_set("America/Mexico_City");
	}

	public function index()
	{
		/*$id_usuario_permiso = $this->datos['id_usuario'];
		
		$permiso_escritura  = $this->permiso_modelo->obtener_permisos_usuario($id_usuario_permiso,"P002");
		$permiso_lectura    = $this->permiso_modelo->obtener_permisos_usuario($id_usuario_permiso,"P001");
		
		if($permiso_escritura === FALSE AND $permiso_lectura === FALSE)
		{
			$this->session->set_flashdata('msg', 'No cuenta con los Permisos'); 
			redirect('inicio');
		}
		else
		{*/
			$where = "";
		
			$elem = array("Inicio|inicio", "Reporte Gráfico");
			
			$data['navegacion']		= generar_navegacion(site_url(), $elem);
			$data['menu']			= 'Reporte';
			$data['submenu']		= 'Crear Reporte Gráfico';
			$data['usuario']	    = $this->reporte_grafico_modelo->buscar($where);
			$data['pagina']		    = "usuario/reporte_grafico";
			$data['total_usuarios'] = sizeof($data['usuario']);

			$this->load->view('_template', $data);
		//}
	}

	public function alta_usuario()
	{
		$data["perfil"] = $this->reporte_grafico_modelo->obtener_regsitro_perfil();
		$data['pagina'] = "usuario/usuario_agregar";

		$this->load->view('_template', $data);
	}
	
	public function agregar()
	{
		if(!$this->input->post())
		{
			redirect('RG');
		}

		$tipo    = "";
		$mensaje = "";

		$output_dir = './reportes/reporte_grafico/';
		
		
		//$data['id_usuario'] 		 = generar_id();
		//$data['id_usuario_registro'] = $this->datos['id_usuario'];
		
		//Datos para reporte
		$data['stv']     		 = mb_strtoupper(trim($this->input->post('stv')));
		$data['troublet']  		 = trim($this->input->post('troublet'));
		$data['descdam']  		 = trim($this->input->post('descdam'));
		$data['cab_obr_civ']    		 = trim($this->input->post('cab_obr_civ'));
		$data['poste_brazo']     	 = trim($this->input->post('poste_brazo')));
		$data['gepe']    		 = trim($this->input->post('gepe'));
		$data['inter_alta_cam']    		 = trim($this->input->post('inter_alta_cam'));
		//$data['estatus']    		 = "1";
		$data['fecha_registro'] 	 = hoy();

		$correcto = $this->reporte_modelo->insertar_informacion_reporte($data);

		$ultimoreporte = $this->reporte_modelo->consulta_ultimo_reporte($stv);


		if(isset($_FILES["archivo"]))
		{
			if ($_FILES["archivo"]["error"] > 0)
			{
				$tipo    = 'error';
				$mensaje = 'Ocurrió un error al cargar los datos.';
				
				$salida['tipo']    = $tipo;
				$salida['mensaje'] = $mensaje;

				echo json_encode($salida);
				exit();
			}
			else
			{
				$nombre 		= $_FILES["archivo"]["name"];
				$tamano 		= $_FILES["archivo"]["size"];// en bytes
				$namepart  		= explode('.', $nombre);
				$extension 		= end($namepart);
				$hora_update 	= date('YmdHis');
				$nombrebd  		= $hora_update.'.'.$extension;

				// acá irían validaciones en caso de ser necesarias

				// validar que se guarda el archivo
				if(move_uploaded_file($_FILES["archivo"]["tmp_name"], $output_dir.$nombrebd))
				{
					$data['foto'] = $nombrebd;

					$correcto = $this->usuarios_modelo->insertar_evidencia_reporte($data);

					if($correcto === FALSE)
					{
						$tipo    = 'error';
						$mensaje = 'Ocurrió un error al insertar los datos.';
					}
					else
					{
						$tipo    = 'exito';
						$mensaje = 'Se insertaron los datos correctamente.';
					}
				}
				else
				{
					$tipo    = 'error';
					$mensaje = 'Ocurrió un error al subir el archivo.';
				}
				
				/*if($tipo == "exito")
				$this->insertar_log($mensaje_log="Inserción Satisfactoria del Usuario: ".$data['usuario']."", $tipo_log="1");
				else
				$this->insertar_log($mensaje_log="Inserción Errónea del Usuario: ".$data['usuario']."", $tipo_log="1");
			*/
				$salida['tipo']    = $tipo;
				$salida['mensaje'] = $mensaje;

				$this->session->set_flashdata('exito', $salida['mensaje']);
				echo json_encode($salida);
				exit();
			}
		}
		/*
		else
		{
			$correcto = $this->usuarios_modelo->insertar_usuario($data);

			if($correcto === FALSE)
			{
				$tipo    = 'error';
				$mensaje = 'Ocurrió un error al insertar los datos.';
			}
			else
			{
				$tipo    = 'exito';
				$mensaje = 'Se insertaron los datos correctamente.';
			}
			
			if($tipo == "exito")
			$this->insertar_log($mensaje_log="Inserción Satisfactoria del Usuario: ".$data['usuario']."", $tipo_log="1");
			else
			$this->insertar_log($mensaje_log="Inserción Errónea del Usuario ".$data['usuario']."", $tipo_log="1");

			$salida['tipo']    = $tipo;
			$salida['mensaje'] = $mensaje;

			$this->session->set_flashdata('exito', $salida['mensaje']);
			
			echo json_encode($salida);
			
			exit();
		}
		*/
	}

	public function validar_usuarios_nuevos()
	{
		$folio 	= $this->input->post('RG');
		$resultado	= $this->usuarios_modelo->validar_folio($folio);
		
		$tipo    = "";
		$mensaje = "";
		
		if($resultado >= 1 )
		{
			$respuesta = 1;
			$tipo = "error";
			$mensaje = "El número de folio ya existe.";
		}
		else
		{
			$respuesta = 0;
			
		}
		
		$data['mensaje']   = $mensaje;
		$data['tipo']      = $tipo;
		$data['respuesta'] = $respuesta;
		
		echo json_encode($data);
	}

}