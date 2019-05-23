<?php
include '../database/conexion_db.php'; 
$exe = new conexion;
$sql = "SELECT *, CONCAT(alias_cliente,' ',nombre,' ',apaterno,' ',amaterno) AS nombClie FROM cat_clientes WHERE edo_clie = 1";
$res = $exe->executeQuery($sql);
?>  




<div class="ui container segment"  style="border: 1px solid rgba(37, 118, 221, 0.7);">
<h2 class="ui dividing header"><i class="user icon"></i>Entrega la Habitación el Cliente</h2>

  <div class="ui segment" style="height: auto;">
  <form id="form_finishReservation" target="_blank" role="tooltip" class="ui form">

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
	

    <h4 class="ui text">Estado de la reservación</h4>
    <div class="field">
      <select class="ui fluid dropdown" id="edo_resv" name="edo_resv">
        <option value="0">-- Seleccione --</option>
        <option value="3">Entrega de habitación</option>
        <option value="4">Cancelada</option>
      </select>
    </div>
    
    <h4 class="ui text">Estado de la habitación</h4>
    <div class="field">
      <select class="ui fluid dropdown" id="edo_hab" name="edo_hab">
        <option value="0">-- Seleccione --</option>
        <option value="1">En buen estado</option>
        <option value="4">Para mantenimiento</option>
      </select>
    </div>
  
    <h4 class="ui text">Total Pago de los días en la Habitación</h4>
    <div class="field">
      <div class="ui input focus"><input placeholder="ingrese el monto total de los días ocupados, proporcionados por el ticket de reservación " id="importe" name="importe" required></div>
    </div>
    
    <h4 class="ui text">Persona Extra</h4>
    <div class="field">
      <div class="ui input focus"><input placeholder="ingrese el monto por persona o contrario ponga cero" id="persons" name="persons" required></div>
    </div>

    <h4 class="ui text">Forma de Pago</h4>
    <div class="field">
      <select class="ui fluid dropdown" id="forma_pago_r" name="forma_pago_r">
        <option value="0">-- Seleccione --</option>
        <option value="EFC">Efectivo</option>
        <option value="CUE">Cuenta Clientes</option>
        <option value="CRE">Crédito</option> 
      </select>
    </div>
    

  </form>
  </div>
  <div class="ui orange segment">
    <button class="ui primary basic button" onclick="getDataFormFinishReservation()">Guardar</button>
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