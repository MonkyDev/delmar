<?php
date_default_timezone_set('America/Mexico_City');

include("../database/conexion_db.php");
$exe = new conexion;


if( isset($_POST) ) { extract($_POST);
	switch ($action) {

		case 1:
		$options = NULL; $i=0;
			$sql = "
				SELECT * FROM tbl_reservaciones
				INNER JOIN tbl_habitaciones ON pk_habitacion = fk_habitacion
				INNER JOIN cat_servicios ON pk_servicio = fk_servicio
				WHERE fk_cliente = ".$fk_cliente." AND edo_rsv IN(1,2)";
			$res = $exe->executeQuery($sql);
			while ( $row = $exe->getRows($res) ) { extract($row);
				$edo[$i] = $edo_rsv;
				$options .= '<option value="'.$pk_reservacion.'">'.ucwords($descp_serv).' '.$clv_hab.'</option>';
			$i++;
			}

		echo $edo[0].'|<select class="ui fluid dropdown" id="fk_reservacion" name="fk_reservacion" onchange="search_edo_resevation($(this).val())">'.$options.'</select>';
		break;

		case 2:
			$sql = "SELECT * FROM tbl_reservaciones WHERE pk_reservacion = ". $fk_reservation;
			$res = $exe->executeQuery($sql);
			$row = $exe->getRows($res); 
			extract($row);
			echo $edo_rsv;
		break;

	}
}