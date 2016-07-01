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
		
		$this->load->model("usuarios_modelo");

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
		
			$elem = array("Inicio|inicio", "Usuarios");
			
			$data['navegacion']		= generar_navegacion(site_url(), $elem);
			$data['menu']			= 'Configuración';
			$data['submenu']		= 'Crear Usuarios';
			$data['usuario']	    = $this->usuarios_modelo->buscar($where);
			$data['pagina']		    = "usuario/usuario_gestor";
			$data['total_usuarios'] = sizeof($data['usuario']);

			$this->load->view('_template', $data);
		//}
	}

	public function alta_usuario()
	{
		$data["perfil"] = $this->usuarios_modelo->obtener_regsitro_perfil();
		$data['pagina'] = "usuario/usuario_agregar";

		$this->load->view('_template', $data);
	}
	
	public function agregar()
	{
		if(!$this->input->post())
		{
			redirect('usuario');
		}

		$tipo    = "";
		$mensaje = "";

		$output_dir = './fotos_usuarios/';
		
		
		//$data['id_usuario'] 		 = generar_id();
		//$data['id_usuario_registro'] = $this->datos['id_usuario'];
		$data['nombre']     		 = mb_strtoupper(trim($this->input->post('nombre')));
		$data['perfiles_idperfiles']  		 = trim($this->input->post('perfil'));
		$data['usuario']    		 = trim($this->input->post('usuario'));
		$data['contrasena']     	 = md5(trim($this->input->post('contrasena')));
		$data['telefono']    		 = trim($this->input->post('telefono'));
		$data['estatus']    		 = "1";
		$data['fecha_registro'] 	 = hoy();

		if(isset($_FILES["archivo"]))
		{
			if ($_FILES["archivo"]["error"] > 0)
			{
				$tipo    = 'error';
				$mensaje = 'Ocurrió un error al subir el archivo.';
				
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
			
			/*if($tipo == "exito")
			$this->insertar_log($mensaje_log="Inserción Satisfactoria del Usuario: ".$data['usuario']."", $tipo_log="1");
			else
			$this->insertar_log($mensaje_log="Inserción Errónea del Usuario ".$data['usuario']."", $tipo_log="1");
*/
			$salida['tipo']    = $tipo;
			$salida['mensaje'] = $mensaje;

			$this->session->set_flashdata('exito', $salida['mensaje']);
			
			echo json_encode($salida);
			
			exit();
		}
	}

	public function validar_usuarios_nuevos()
	{
		$usuario 	= $this->input->post('usuario');
		$resultado	= $this->usuarios_modelo->validar_usuario($usuario);
		
		$tipo    = "";
		$mensaje = "";
		
		if($resultado >= 1 )
		{
			$respuesta = 1;
			$tipo = "error";
			$mensaje = "El nombre de usuario ya existe.";
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