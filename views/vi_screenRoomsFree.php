<?php
include '../database/conexion_db.php'; 
$exe = new conexion;
$sql = "SELECT * FROM tbl_habitaciones INNER JOIN cat_servicios ON pk_servicio = fk_servicio";
$res = $exe->executeQuery($sql);
?>

<div class="ui container segment"  style="border: 1px solid rgba(37, 118, 221, 0.7);">
<h2 class="ui dividing header"><i class="user icon"></i>Habitaciones</h2>

  <div class="ui segment" style="height: 75vh; overflow-y: scroll; ">
    <table class="ui celled table">
      <thead>
        <tr>
          <th>No</th>
          <th>Clave</th>
          <th>Tipo</th>
          <th>Piso</th>
          <th>Precio</th>
          <th>Cupo</th>
          <th>Actual</th>
        </tr>
      </thead>
      <tbody align="center">
      <?php while ($row = $exe->getRows($res) ) { extract($row);?>
        <tr>
          <td><?php echo $pk_habitacion ?></td>
          <td><?php echo $clv_hab ?></td>
          <td><?php echo $descp_serv ?></td>
          <td><?php echo $piso ?></td>
          <td><?php echo "$".number_format($precio_hab,2) ?></td>
          <td><?php echo $cupo." personas" ?></td>
          <td>
            <?php 
              if($edo_hab==1) echo '<div class="ui green horizontal label">Disponible</div>'; 
              elseif($edo_hab==2) echo '<div class="ui orange horizontal label">Reservado</div>';  
              elseif($edo_hab==3) echo '<div class="ui red horizontal label">Ocupada</div>'; 
              elseif($edo_hab==4) echo '<div class="ui blue horizontal label">Mantenimiento</div>'; 
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