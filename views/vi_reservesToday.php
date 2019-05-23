<?php
include '../database/conexion_db.php'; 
$exe = new conexion;
$sql = "SELECT *, CONCAT(alias_cliente,' ',nombre,' ',apaterno,' ',amaterno) AS nombClie
        FROM tbl_reservaciones
        INNER JOIN tbl_habitaciones ON pk_habitacion = fk_habitacion
        INNER JOIN cat_servicios ON pk_servicio = fk_servicio
        INNER JOIN cat_clientes ON pk_cliente = fk_cliente 
        ORDER BY fecha_in";
$res = $exe->executeQuery($sql);
?>

<div class="ui container segment"  style="border: 1px solid rgba(37, 118, 221, 0.7);">
<h2 class="ui dividing header"><i class="user icon"></i>Reservaciones del día</h2>

  <div class="ui segment" style="height: 75vh; overflow-y: scroll; ">
    <table class="ui celled table">
      <thead>
        <tr>
          <th>No</th>
          <th>Habitación</th>
          <th>Cliente</th>
          <th>Solicita</th>
          <th>Día Entrada</th>
          <th>H. Entrada</th>
          <th>Día Salida</th>
          <th>H. Salida</th>
          <th>No. Personas</th>
          <th>Estatus</th>
        </tr>
      </thead>
      <tbody align="center">
      <?php while ($row = $exe->getRows($res) ) { extract($row);?>
        <tr href="#" onclick="habilitarRoom(<?php echo $pk_reservacion ?>)">
          <td><?php echo $pk_reservacion ?></td>
          <td><?php echo $pk_habitacion.' - '.$clv_hab ?></td>
          <td><?php echo $nombClie ?></td>
          <td><?php echo $fecha_rsv; ?></td>
          <td><?php echo $fecha_in; ?></td>
          <td><?php echo $hr_in ?></td>
          <td><?php echo $fecha_out; ?></td>
          <td><?php echo $hr_out ?></td>
          <td><?php echo '+ '.$persons_extra ?></td>
          <td>
            <?php 
              if($edo_rsv==1) echo '<div class="ui green horizontal label">En Proceso</div>'; 
              elseif($edo_rsv==2) echo '<div class="ui orange horizontal label">Transcurriendo</div>';  
              elseif($edo_rsv==3) echo '<div class="ui red horizontal label">Finalizada</div>'; 
              elseif($edo_rsv==4) echo '<div class="ui blue horizontal label">Cancelada</div>'; 
            ?>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div><!--
  <div class="ui orange segment">
    <button class="ui primary basic button" onclick="getDataFormCliente()">Nuevo</button>
     <button class="ui secondary basic button" id="delete">Eliminar</button>
    <button class="ui positive basic button">Editar</button>
    <button class="ui right floated negative basic button">Consultar</button> 
  </div>-->

</div>
<style>
	
.input{
	width: 100%;
}

</style>