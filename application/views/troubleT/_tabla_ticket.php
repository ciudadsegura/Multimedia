<?php	
	
	$cont = 1;
	foreach($ticket as $row)
	{	
		$nom_tick = explode('-', $row->ticket);
		$fech_cerrar = "";

		for ($i=0; $i < count($nom_tick); $i++) { 
			$nom_tick = $nom_tick['0'];
		}

		if ($row->closing_time == "2016-06-23 19:00:00") {
			$fech_cerrar = "N/A";
		}else{
			$fech_cerrar = $row->closing_time;
		}

		$renglon  = "";
		$renglon .= "<tr>";
		$renglon .= "<td>";
		$renglon .= $cont;
		$renglon .= "</td>";
		$renglon .= "<td>";
		$renglon .= $nom_tick;
		$renglon .= "</td>";
		$renglon .= "<td class='width15'>";	
		//$renglon .= '<a href="'.site_url().'/alumno/detalles/'.$row->id_alumno.'">'.($row->nombre == ""?"N/A":$row->nombre).'</a></br>&nbsp;';
		$renglon .= $row->full_category_name;
		$renglon .= "</td>";
		$renglon .= "<td>";
		$renglon .= $row->id_ci;
		$renglon .= "</td>";
		$renglon .= "<td class='width22'>";
		$renglon .= $row->descriptions_coments;
		$renglon .= "</td>";
		$renglon .= "<td>";
		$renglon .= $fech_cerrar;
		//$renglon .= $row->closing_time;
		$renglon .= "</td>";
		$renglon .= "<td>";
		$renglon .= $row->create_time;
		$renglon .= "</td>";
		$renglon .= "<td>";
		$renglon .= $row->incident_status;
		$renglon .= "</td>";
		$renglon .= "<td>";
		$renglon .= $row->incident_type;
		$renglon .= "</td>";
		$renglon .= "<td>";
		$renglon .= "N/A";
		$renglon .= "</td>";
		$renglon .= "<td>";
		$renglon .= "N/A";
		$renglon .= "</td>";
		$renglon .= "</tr>";
		
		$cont = $cont + 1;
		echo $renglon;
	}

	if (empty($ticket)) { ?>

		<td colspan="10" align="center" class="pa5">Sin resultados</td>
		
<?php	}
?>