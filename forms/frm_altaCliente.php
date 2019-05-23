<div class="ui container segment"  style="border: 1px solid rgba(37, 118, 221, 0.7);">
<h2 class="ui dividing header"><i class="user icon"></i>Registrar Cliente</h2>

  <div class="ui segment" style="height: auto;">
  <form id="form_registroClientes" target="_blank" role="tooltip">
	<h4 class="ui text">Nombres</h4>
  	<div class="ui input focus"><input placeholder="nombre" id="nombre" name="nombre" required></div>
  	<p>
  	<h4 class="ui text">Apellido</h4>
  	<div class="ui input focus"><input placeholder="paterno" id="apaterno" name="apaterno" required></div>
	<p>
  	<h4 class="ui text">Apellido</h4>
  	<div class="ui input focus"><input placeholder="materno" id="amaterno" name="amaterno" required></div>
	<p>
  	<h4 class="ui text">Telefono Celular</h4>
  	<div class="ui input focus"><input placeholder="telefono" id="telefono" name="telefono" required></div>
  	<p>
  	<h4 class="ui text">Dirección</h4>
  	<div class="ui input focus"><input placeholder="direccion casa" id="direccion" name="direccion" required></div>
  	<p>
  	<h4 class="ui text">Tuteo</h4>
  	<div class="ui input focus"><input placeholder="Sr. Sra. Srta." id="alias_cliente" name="alias_cliente" required></div>
    <p>
    <h4 class="ui text">Tarjeta de Crédito</h4>
    <div class="ui input focus"><input placeholder="Ingrese los digitos" id="tarjeta_credito" name="tarjeta_credito" required></div>
  </form>
  </div>
  <div class="ui orange segment">
    <button class="ui primary basic button" onclick="getDataFormCliente()">Nuevo</button>
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