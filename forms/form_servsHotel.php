<?php
include '../database/conexion_db.php'; 
$exe = new conexion;
$sql = "SELECT *, CONCAT(alias_cliente,' ',nombre,' ',apaterno,' ',amaterno) AS nombClie FROM cat_clientes WHERE edo_clie = 1";
$res = $exe->executeQuery($sql);

$sql1 = "SELECT * FROM cat_servicios WHERE pk_servicio = 10 ";
$res1 = $exe->executeQuery($sql1);

?>  







<div class="ui container segment"  style="border: 1px solid rgba(37, 118, 221, 0.7);">
<h2 class="ui dividing header"><i class="user icon"></i>Servicios Especiales del hotel</h2>

  <div class="ui segment" style="height: auto;">
  <form id="form_registrarVentaServsHotel" target="_blank" role="tooltip" class="ui form">

	  <h4 class="ui text">Cliente</h4>
  	<div class="field">
      <select class="ui fluid dropdown" id="fk_cliente" name="fk_cliente">
        <option value="0">-- Seleccione --</option>
        <?php while ($row = $exe->getRows($res) ) { extract($row); ?>
        <option value="<?php echo $pk_cliente ?>"> <?php echo $nombClie ?></option>
        <?php } ?>
      </select>
    </div>
  	
  	<h4 class="ui text">Servicio Solicita</h4>
  	<div class="field">
      <select class="ui fluid dropdown" id="fk_servicio" name="fk_servicio">
        <option value="0">-- Seleccione --</option>
        <?php while ($row1 = $exe->getRows($res1) ) { extract($row1); ?>
        <option value="<?php echo $pk_servicio ?>"> <?php echo ucwords($descp_serv).': $'.number_format($precio_serv,2) ?></option>
        <?php } ?>
      </select>
    </div>
	
  	<h4 class="ui text">Forma de Pago</h4>
    <div class="field">
      <select class="ui fluid dropdown" id="forma_pago_s" name="forma_pago_s">
        <option value="0">-- Seleccione --</option>
        <option value="EFC">Efectivo</option>
        <option value="CRE">Crédito</option>
        <option value="CUE">Cuenta Clientes</option>
      </select>
    </div>
    
    <div class="field">
      <h4 class="ui text">Subtotal a pagar</h4>
      <div class="ui input focus"><input placeholder="ingrese el importe total del costo del servicio, solo números" id="importe" name="importe" required></div>
    </div>
  
    <div class="field">
      <h4 class="ui text">Concepto Crédito</h4>
      <div class="ui input focus"><input placeholder="en caso de venta a crédito, escriba el concepto del servicio" id="concepto" name="concepto" ></div>
    </div>

  </form>
  </div>
  <div class="ui orange segment">
    <button class="ui primary basic button" onclick="getDataFormVentaServsHotel()">Guardar</button>
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