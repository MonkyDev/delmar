<?php
include '../database/conexion_db.php'; 
$exe = new conexion;
$sql = "SELECT *, CONCAT(alias_cliente,' ',nombre,' ',apaterno,' ',amaterno) AS nombClie FROM cat_clientes WHERE edo_clie = 1";
$res = $exe->executeQuery($sql);

$sql1 = "SELECT * FROM tbl_habitaciones INNER JOIN cat_servicios ON pk_servicio = fk_servicio WHERE edo_hab = 1 LIMIT 10";
$res1 = $exe->executeQuery($sql1);
?>  




<div class="ui container segment"  style="border: 1px solid rgba(37, 118, 221, 0.7);">
<h2 class="ui dividing header"><i class="user icon"></i>Cambiar Habitación por Cliente</h2>

  <div class="ui segment" style="height: auto;">
  <form id="form_changeRoomReservation" target="_blank" role="tooltip" class="ui form">

	  <h4 class="ui text">Cliente</h4>
  	<div class="field">
      <select class="ui fluid dropdown" id="fk_cliente" name="fk_cliente" onchange="searchReservations($(this).val())">
        <option value="0">-- Seleccione --</option>
        <?php while ($row = $exe->getRows($res) ) { extract($row); ?>
        <option value="<?php echo $pk_cliente ?>"> <?php echo $nombClie ?></option>
        <?php } ?>
      </select>
    </div>
  	
  	<h4 class="ui text">Habitaciones Reservadas</h4>
  	<div class="field" id="options">
      <select class="ui fluid dropdown"> 
        <option value="0">-- Seleccione --</option>
      </select>
    </div>
	

    <h4 class="ui text">Cambiar por</h4>
    <div class="field">
      <select class="ui fluid dropdown" id="upd_habitacion" name="upd_habitacion">
        <option value="0">-- Seleccione --</option>
        <?php while ($row1 = $exe->getRows($res1) ) { extract($row1); ?>
        <option value="<?php echo $pk_habitacion ?>"> <?php echo $clv_hab.' '.ucwords($descp_serv) ?></option>
        <?php } ?>
      </select>
    </div>

  <h4 class="ui text">Mótivo de cambio</h4>
    <div class="field">
      <select class="ui fluid dropdown" id="motivo_cambio" name="motivo_cambio">
        <option value="0">-- Seleccione --</option>
        <option value="4">Entra en Mantenimiento</option>
        <option value="1">Se pone en Disposición</option>
        <!-- <option value="3">Entrega de habitación</option>
        <option value="4">Cancelada</option> -->
      </select>
    </div>

  </form>
  </div>
  <div class="ui orange segment">
    <button class="ui primary basic button" onclick="getDataFormChangeRoom()">Guardar</button>
    <!--<button class="ui right floated negative basic button" onclick="">Consultar</button>
     <button class="ui secondary basic button" id="delete">Eliminar</button>
    <button class="ui positive basic button">Editar</button>
     -->
  </div>

</div>
<style>
	
.input{
	width: 100%;
}

</style>
<script>
    $( function() {
      $( "#fecha_in" ).datepicker();
      $( "#fecha_out" ).datepicker();
      $( "#hr_in" ).timepicker();
      $( "#hr_out" ).timepicker();
    });
</script>