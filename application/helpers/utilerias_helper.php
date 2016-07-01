<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	// Aplica trim y conviete a mayúsculas una cadena
	function limpiar_cadena($cadena)
	{
		$cadena = trim($cadena);
		$cadena = mb_strtoupper($cadena);

		return $cadena;
	}
	
	// Rellena de ceros a la izquierda
	function zerofill($num, $zerofill = 5)
	{
		return str_pad($num, $zerofill, '0', STR_PAD_LEFT);
	}
	
	function folio($num, $zerofill = 3)
	{
		return str_pad($num, $zerofill, '0', STR_PAD_LEFT);
	}
	
	function zerofil_fecha($num, $zerofill = 2)
	{
		return str_pad($num, $zerofill, '0', STR_PAD_LEFT);
	}
	
	// Generar UUID
	function generar_id()
	{
		date_default_timezone_set('America/Mexico_City');

		$fecha      = date("Ymd");
		$hora       = date("His");
		$aleatorio1 = mt_rand(1,1000000);
		$aleatorio2 = mt_rand(1,1000000);

		$id = dechex($fecha)."-".dechex($hora)."-".dechex($aleatorio1)."-".dechex($aleatorio2);

		return mb_strtoupper($id);
	}
	
	// Regresa la fecha del dia
	function hoy()
	{
		date_default_timezone_set('America/Mexico_City');
		$fecha=date('Y-m-d H:i:s');
		return $fecha;
	}
	
	function fecha_formato($fecha, $opcion = 0, $separador = "-")
	{
		if ($opcion == 0) { return fecha_organizada_mes_completo($fecha, $separador);}

		if ($opcion == 1) { return fecha_organizada_mes_truncado($fecha, $separador);}

		if ($opcion == 3) { return fecha_organizada_mes_completo_hora($fecha, $separador);}

		if ($opcion == 4) { return fecha_organizada_mes_truncado_hora($fecha, $separador);}

	}

	function fecha_organizada_mes_completo($fecha, $separador)
	{
		$arreglo_fecha = explode(" ", $fecha);
		$arreglo_fecha = explode("-", $arreglo_fecha[0]);

		$mes  = "";
		$dia  = $arreglo_fecha[0];
		$anio = $arreglo_fecha[2];

		if ($arreglo_fecha[1] == "01") $mes = "Enero";
		if ($arreglo_fecha[1] == "02") $mes = "Febrero";
		if ($arreglo_fecha[1] == "03") $mes = "Marzo";
		if ($arreglo_fecha[1] == "04") $mes = "Abril";
		if ($arreglo_fecha[1] == "05") $mes = "Mayo";
		if ($arreglo_fecha[1] == "06") $mes = "Junio";
		if ($arreglo_fecha[1] == "07") $mes = "Julio";
		if ($arreglo_fecha[1] == "08") $mes = "Agosto";
		if ($arreglo_fecha[1] == "09") $mes = "Septiembre";
		if ($arreglo_fecha[1] == "10") $mes = "Octubre";
		if ($arreglo_fecha[1] == "11") $mes = "Noviembre";
		if ($arreglo_fecha[1] == "12") $mes = "Diciembre";

		return $anio.$separador.$mes.$separador.$dia;
	}

	function fecha_organizada_mes_truncado($fecha, $separador)
	{
		$arreglo_fecha = explode(" ", $fecha);
		$arreglo_fecha = explode("-", $arreglo_fecha[0]);

		$mes  = "";
		$dia  = $arreglo_fecha[0];
		$anio = $arreglo_fecha[2];

		if ($arreglo_fecha[1] == "01") $mes = "01";
		if ($arreglo_fecha[1] == "02") $mes = "02";
		if ($arreglo_fecha[1] == "03") $mes = "03";
		if ($arreglo_fecha[1] == "04") $mes = "04";
		if ($arreglo_fecha[1] == "05") $mes = "05";
		if ($arreglo_fecha[1] == "06") $mes = "06";
		if ($arreglo_fecha[1] == "07") $mes = "07";
		if ($arreglo_fecha[1] == "08") $mes = "08";
		if ($arreglo_fecha[1] == "09") $mes = "09";
		if ($arreglo_fecha[1] == "10") $mes = "10";
		if ($arreglo_fecha[1] == "11") $mes = "11";
		if ($arreglo_fecha[1] == "12") $mes = "12";

		return $anio.$separador.$mes.$separador.$dia;
	}

	function fecha_organizada_mes_completo_hora($fecha, $separador)
	{
		$arreglo_temp  = explode(" ", $fecha);

		$fecha = fecha_organizada_mes_completo($fecha, $separador);

		return $fecha." ".$arreglo_temp[1];
	}

	function fecha_organizada_mes_truncado_hora($fecha, $separador)
	{
		$arreglo_temp  = explode(" ", $fecha);

		$fecha = fecha_organizada_mes_truncado($fecha, $separador);

		return $fecha." ".$arreglo_temp[1];
	}
	
	function generar_navegacion($url, $elementos)
	{
		$nav = '';
		
		foreach($elementos as $elemento)
		{
			$temp = trim($elemento);
			
			if(strlen($temp) > 0)
			{
				$arr = explode('|', $temp);
				
				if(count($arr) == 1)
				{
					$nav .= '<li>'.$arr[0].'</li>';
				}
				elseif(count($arr) >= 2)
				{
					$target = $url.'/'.$arr[1];
					$nav .= '<li><a class="iconos_opciones" href="'.$target.'">'.$arr[0].'</a></li>';
				}
			}
		}
		
		return $nav;
	}