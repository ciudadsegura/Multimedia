<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class _excel_ticket_modelo extends CI_Model
{
	
	public function importar_ticket($nombre)
	{
		require_once 'commons/excel/PHPExcel.php';
		
		//Creamos el objeto de lectura del Excel
		$excel_lectura = new PHPExcel_Reader_Excel2007();
		
		//Guardamos el archivo de Excel
		$archivo_excel = $excel_lectura->load('temp/'.$nombre);
		
		//Seleccionamos la pestaña activa del Excel
		$pestana_excel = $archivo_excel->getActiveSheet();
		
		$data = array();
		
		//Leemos los datos de nuestro Excel
		for ($i = 2; $i <= $pestana_excel->getHighestRow(); $i++)
		{
			$data['ticket'][]						= $pestana_excel->getCell('A'.$i)->getValue();
			$data['full_category_name'][]			= $pestana_excel->getCell('B'.$i)->getValue();
			$data['ps_name'][]						= $pestana_excel->getCell('C'.$i)->getValue();
			$data['place_name'][]					= $pestana_excel->getCell('D'.$i)->getValue();
			$data['id_ci'][]						= $pestana_excel->getCell('E'.$i)->getValue();
			$data['descriptions_coments'][]			= $pestana_excel->getCell('F'.$i)->getValue();
			$fecha_cerrar 							= $pestana_excel->getCell('G'.$i)->getValue();
			$fecha_abri 							= $pestana_excel->getCell('H'.$i)->getValue();

			//$data['closing_time'][]					= $pestana_excel->getCell('G'.$i)->getValue();
			//$data['create_time'][]					= $pestana_excel->getCell('H'.$i)->getValue();
			$data['incident_priority'][]			= $pestana_excel->getCell('I'.$i)->getValue();
			$data['incident_status'][]				= $pestana_excel->getCell('J'.$i)->getValue();
			$data['incident_type'][]				= $pestana_excel->getCell('K'.$i)->getValue();

			if ($fecha_cerrar == '01/01/1900  12:00:00' && $fecha_cerrar == "") {
				$fecha_cerrar = "N/A";
			}else{
				$timestamp_cer = PHPExcel_Shared_Date::ExcelToPHP($fecha_cerrar);
				$fecha_cer = date("Y-m-d H:i:s",$timestamp_cer);
				$data['closing_time'][] = $fecha_cer;
			}

			$timestamp_abri = PHPExcel_Shared_Date::ExcelToPHP($fecha_abri);
			$fecha_abri = date("Y-m-d H:i:s",$timestamp_abri);
			$data['create_time'][] = $fecha_abri;

			//return $this->db->insert('tickets',$data);
		}
		
				

		return $data;
	}
}