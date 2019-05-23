<?php 
date_default_timezone_set('America/Mexico_City');

include("../database/conexion_db.php");
$exe = new conexion;


if( isset($_POST) ) { extract($_POST);
	switch ($action) {
		case 1:
			$pk_clie = $exe->genIndex('cat_clientes', 0);
			$clave = strtoupper( substr($apaterno, 0,1).substr($amaterno, 0,1).substr($nombre, 0,2).$pk_clie );
				$sql = "INSERT INTO cat_clientes VALUES (
					'NULL',
					'".$clave."',
					'".$alias_cliente."',
					'".$nombre."',
					'".$apaterno."',
					'".$amaterno."',
					'".$telefono."',
					'".$direccion."',
					'".date('Y-m-d')."',
					1,
					'".$tarjeta_credito."'
					)";
				$exe->executeQuery($sql);
				echo 1;
		break;

		case 2: #creamos el registro de la reservacion y actualizamos el estado de la habitacion para apartarla
			$pk_rsv = $exe->genIndex('tbl_reservaciones', 0);
			$folio = $pk_rsv.$fk_cliente.$fk_habitacion;
			$sql = "INSERT INTO tbl_reservaciones VALUES (  
				'NULL',
				'".$folio."',
				".$fk_habitacion.",
				".$fk_cliente.",
				'".date('Y-m-d')."',
				'".$acuerdo_pago."',
				'".$fecha_in."',
				'".$fecha_out."',
				'".$hr_in."',
				'".$hr_out."',			
				".$persons_extra.",
				0,
				1
				)";
			if( $exe->executeQuery($sql) ){
				$sql = "UPDATE tbl_habitaciones SET edo_hab = 2 WHERE pk_habitacion = " . $fk_habitacion;
				$exe->executeQuery($sql);
				echo 1;
			}
			
		break;

		case 3:
			$sql = "SELECT fk_habitacion AS Hab FROM tbl_reservaciones WHERE  pk_reservacion = ".$fk_reservacion;
			$res = $exe->executeQuery($sql);
			$row = $exe->getRows($res); 
			extract($row);

			$sql = "UPDATE tbl_reservaciones SET edo_rsv = ".$edo_rsv." WHERE pk_reservacion = ". $fk_reservacion;
			if( $exe->executeQuery($sql) ){
				if($edo_rsv==1) $hab_edo = 2;
				elseif($edo_rsv==2) $hab_edo = 3;
				elseif($edo_rsv==3) $hab_edo = 1;
				elseif($edo_rsv==4) $hab_edo = 1;

				$sql = "UPDATE tbl_habitaciones SET edo_hab = ".$hab_edo." WHERE pk_habitacion = " . $Hab;
				$exe->executeQuery($sql);
				echo 1;
			}
		break;

		case 4:
			$sql = "SELECT fk_habitacion AS exHab FROM tbl_reservaciones WHERE  pk_reservacion = ".$fk_reservacion;
			$res = $exe->executeQuery($sql);
			$row = $exe->getRows($res); 
			extract($row);

			$sql = "UPDATE tbl_reservaciones SET fk_habitacion = ".$upd_habitacion." WHERE pk_reservacion = ".$fk_reservacion;
			if( $exe->executeQuery($sql) ){
				$sql = "UPDATE tbl_habitaciones SET edo_hab = 2 WHERE pk_habitacion = " . $upd_habitacion;
				if ( $exe->executeQuery($sql) ){
					$sql = "UPDATE tbl_habitaciones SET edo_hab = ".$motivo_cambio." WHERE pk_habitacion = " . $exHab;
					$exe->executeQuery($sql);
					echo 1;
				}
				
			}
		break;

		case 5:
			$sql = "UPDATE tbl_habitaciones SET edo_hab = 1 WHERE pk_habitacion = " . $pk_habitacion;
			$exe->executeQuery($sql);
			echo 1;
		break;

		case 6:
			$pk_v_s = $exe->genIndex('tbl_ventas_servicios', 0);
			$fol_v_s = $pk_v_s.$fk_cliente.$fk_servicio;
			$sql = "INSERT INTO tbl_ventas_servicios VALUES (
				'NULL',
				'".$fol_v_s."',
				1,
				".$fk_servicio.",
				".$fk_servicio.",
				'".date('Y-m-d')."',
				".$importe.",
				'".$forma_pago_s."'
			)";
			$exe->executeQuery($sql);
			echo 1;
		break;
		
		case 7: 
			if ($forma_pago_s != 'CRE') {
				$pk_v_s = $exe->genIndex('tbl_ventas_servicios', 0);
				$fol_v_s = $pk_v_s.$fk_cliente.$fk_servicio;

				$sql = "INSERT INTO tbl_ventas_servicios VALUES (
					'NULL',
					'".$fol_v_s."',
					1,
					".$fk_servicio.",
					".$fk_cliente.",
					'".date('Y-m-d')."',
					".$importe.",
					'".$forma_pago_s."'
				)";
			$exe->executeQuery($sql);
			echo 1;

			}else {
				$pk_c_s = $exe->genIndex('tbl_creditos', 0);
				$fol_v_c = $pk_c_s.$fk_cliente.$fk_servicio;

				$sql = "INSERT INTO tbl_creditos VALUES (
					'NULL',
					'".$fol_v_c."',
					1,
					".$fk_servicio.",
					".$fk_cliente.",
					'".$concepto."',
					'".date('Y-m-d')."',
					".$importe.",
					1
				)";
			$exe->executeQuery($sql);
			echo 1;
			}
		break;

		case 8:
			$sql = "SELECT fk_habitacion AS Hab FROM tbl_reservaciones WHERE  pk_reservacion = ".$fk_reservacion;
			$res = $exe->executeQuery($sql);
			$row = $exe->getRows($res); 
			extract($row);

				$pk_v_r = $exe->genIndex('tbl_venta_resv', 0);
				$fol_v_r = $pk_v_r.$fk_cliente.$fk_reservacion;
				$iva = $importe * 0.16;
				$sql = "INSERT INTO tbl_venta_resv VALUES (
					'NULL',
					'".$fol_v_r."',
					".$fk_reservacion.",
					'".date('Y-m-d')."',
					".$importe.",
					".$iva.",
					".($importe + $iva + $persons).",
					'".$forma_pago_r."'
				)";
				if ( $exe->executeQuery($sql) ) {
					$sql = "UPDATE tbl_habitaciones SET edo_hab = ".$edo_hab." WHERE pk_habitacion = ".$Hab;
					if ( $exe->executeQuery($sql) ) {
						$sql = "UPDATE tbl_reservaciones SET edo_rsv = ".$edo_resv." WHERE pk_reservacion = ".$fk_reservacion;
						$exe->executeQuery($sql);
						echo 1;
					}
				}			
		break;
	}
	

}