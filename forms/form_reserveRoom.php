<?php
include '../database/conexion_db.php'; 
$exe = new conexion;
$sql = "SELECT *, CONCAT(alias_cliente,' ',nombre,' ',apaterno,' ',amaterno) AS nombClie FROM cat_clientes WHERE edo_clie = 1";
$res = $exe->executeQuery($sql);

$sql1 = "SELECT * FROM tbl_habitaciones INNER JOIN cat_servicios ON pk_servicio = fk_servicio WHERE edo_hab = 1 LIMIT 10";
$res1 = $exe->executeQuery($sql1);

?>  







<div class="ui container segment"  style="border: 1px solid rgba(37, 118, 221, 0.7);">
<h2 class="ui dividing header"><i class="user icon"></i>Reservar Habitación por Cliente</h2>

  <div class="ui segment" style="height: auto;">
  <form id="form_registroReservation" target="_blank" role="tooltip" class="ui form">

	  <h4 class="ui text">Cliente</h4>
  	<div class="field">
      <select class="ui fluid dropdown" id="fk_cliente" name="fk_cliente">
        <option value="0">-- Seleccione --</option>
        <?php while ($row = $exe->getRows($res) ) { extract($row); ?>
        <option value="<?php echo $pk_cliente ?>"> <?php echo $nombClie ?></option>
        <?php } ?>
      </select>
    </div>
  	
  	<h4 class="ui text">Habitación</h4>
  	<div class="field">
      <select class="ui fluid dropdown" id="fk_habitacion" name="fk_habitacion">
        <option value="0">-- Seleccione --</option>
        <?php while ($row1 = $exe->getRows($res1) ) { extract($row1); ?>
        <option value="<?php echo $pk_habitacion ?>"> <?php echo $clv_hab.' '.ucwords($descp_serv) ?></option>
        <?php } ?>
      </select>
    </div>
	
  	<h4 class="ui text">Forma de Pago</h4>
    <div class="field">
      <select class="ui fluid dropdown" id="acuerdo_pago" name="acuerdo_pago">
        <option value="0">-- Seleccione --</option>
        <option value="VEN">Ventanilla</option>
        <option value="DEP">Depósito</option>
        <option value="CRE">Crédito</option>
      </select>
    </div>

    <div class="four fields">
      <div class="field">
      	<h4 class="ui text">Fecha de entrada</h4>
      	<div class="ui input focus"><input placeholder="fecha de inicio" id="fecha_in" name="fecha_in" required></div>
    	</div>
      <div class="field">
        <h4 class="ui text">Hora de llegada</h4>
        <div class="ui input focus"><input placeholder="hora de entrada" id="hr_in" name="hr_in" required></div>
      </div>
      <div class="field">
      	<h4 class="ui text">Fecha de salida</h4>
      	<div class="ui input focus"><input placeholder="fecha de salida" id="fecha_out" name="fecha_out" required></div>
      </div>
      <div class="field">
        <h4 class="ui text">Hora de salida</h4>
        <div class="ui input focus"><input placeholder="hora de salida" id="hr_out" name="hr_out" required></div>
      </div>
    </div>

  	<h4 class="ui text">No. de Personas extras</h4>
  	<div class="ui input focus"><input id="persons_extra" name="persons_extra" required></div>

    <h4 class="ui text">Estado de la reservación</h4>
    <div class="field">
      <select class="ui fluid dropdown" id="edo_rsv" name="edo_rsv">
        <option value="0">-- Seleccione --</option>
        <option value="1">En Proceso por comenzar</option>
        <option value="2">Empieza a trancurrir</option>
        <option value="3">Entrega de habitación</option>
      </select>
    </div>

  </form>
  </div>
  <div class="ui orange segment">
    <button class="ui primary basic button" onclick="getDataFormReserveRom()">Guardar</button>
   <!--  <button class="ui secondary basic button" id="delete">Eliminar</button>
    <button class="ui positive basic button">Editar</button>
    <button class="ui right floated negative basic button">Consultar</button> -->
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