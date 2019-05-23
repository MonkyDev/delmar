function getDataFormCliente(){
	var strDatas = "action=1&"+$("#form_registroClientes").serialize().trim();

	if ( $("#nombre").val()!="" &&  $("#apaterno").val()!="" && $("#amaterno").val()!="") {
		$.ajax({
			url: '../processors/processorForms.php',
			type: 'POST',
			data: strDatas,
			success: function(req){
				alert('Registro guardado exitosamente');
				document.getElementById("form_registroClientes").reset();
				$("#nombre").focus();
			}
		});

	}else{
		alert("Verifique su llenado");
	}	
}

function getDataFormReserveRom(){
	var strDatas = "action=2&"+$("#form_registroReservation").serialize().trim();

	if ( $("#fk_cliente").val()!=0 &&  $("#fk_habitacion").val()!=0 && $("#edo_rsv").val()!=0) {
		$.ajax({
			url: '../processors/processorForms.php',
			type: 'POST',
			data: strDatas,
			success: function(req){
				alert('Registro guardado exitosamente');
				document.getElementById("form_registroReservation").reset();
				$("#nombre").focus();
			}
		});

	}else{
		alert("Verifique su llenado");
	}	

}


// pendiente
function ocuparRoomReserve(){
	var strDatas = "action=2&"+$("#form_registroReservation").serialize().trim();

	if ( $("#fk_cliente").val()!=0 &&  $("#fk_habitacion").val()!=0 && $("#edo_rsv").val()!=0) {
		$.ajax({
			url: '../processors/processorForms.php',
			type: 'POST',
			data: strDatas,
			success: function(req){
				alert('Registro guardado exitosamente');
				document.getElementById("form_registroReservation").reset();
				$("#nombre").focus();
			}
		});

	}else{
		alert("Verifique su llenado");
	}	

}


// consultar las habitaciones por cliente y modificar el estado
// 
function searchReservations(fk_cliente){
	var strDatas = 'action=1&fk_cliente='+fk_cliente;
	$.ajax({
		url: '../processors/processorSearchs.php',
		type: 'POST',
		data: strDatas,
		success: function(req){
			//console.log( req );
			var res = req.split("|");

			$("#options").html( res[1] );
			$("#edo_rsv").val( parseInt(res[0]) );
			
		}
	});
}

function search_edo_resevation(fk_reservation){
	var strDatas = 'action=2&fk_reservation='+fk_reservation;
	$.ajax({
		url: '../processors/processorSearchs.php',
		type: 'POST',
		data: strDatas,
		success: function(req){
			$("#edo_rsv").val( parseInt(req) );
		}
	});
}


function getDataFormModifyEdoRom(){
	var strDatas = 'action=3&'+$("#form_modifyReservation").serialize().trim();

	if ( $("#fk_cliente").val()!=0 &&  $("#fk_habitacion").val()!=0 && $("#edo_rsv").val()!=0) {
		$.ajax({
			url: '../processors/processorForms.php',
			type: 'POST',
			data: strDatas,
			success: function(req){
				console.log(req);
				if (req == 1) {
					alert('Registro modificado exitosamente');
					document.getElementById("form_modifyReservation").reset();
					$("#fk_reservacion").val("-- Seleccione --");
					$("#fk_cliente").focus();
				}
			}
		});

	}else{
		alert("Verifique su llenado");
	}
}

function getDataFormChangeRoom(){
	var strDatas = 'action=4&'+$("#form_changeRoomReservation").serialize().trim();
	if ( $("#fk_cliente").val()!=0 ) {
		$.ajax({
			url: '../processors/processorForms.php',
			type: 'POST',
			data: strDatas,
			success: function(req){
				alert("Se ha cambiado de habitacion");
				document.getElementById("form_changeRoomReservation").reset();
				$("#fk_reservacion").val("-- Seleccione --");
			}
		});

	}else{
		alert("Verifique su llenado");
	}
}


function habilitarRoom(pk_habitacion){
	var msj = confirm("La habitacion ya esta disponible?");
	if (msj) {
		$.ajax({
			url: '../processors/processorForms.php',
			type: 'POST',
			data: 'action=5&pk_habitacion='+pk_habitacion,
			success: function(req){
				cargaPantallaSingle('../views/vi_roomsOnServices.php','contentPrimary');
				alert("Se ha cambiado de habitacion");
			}
		});
		
	}else{
		alert("No hubo modificacón");
	}
}


function getDataFormVentaServicio(){
	var strDatas = 'action=6&'+$("#form_registrarVentaServicio").serialize().trim();
	if ( $("#fk_cliente").val()!=0 ) {
		$.ajax({
			url: '../processors/processorForms.php',
			type: 'POST',
			data: strDatas,
			success: function(req){
				if ( req == 1 ) {
					alert("Registro de venta guardado");
					document.getElementById("form_registrarVentaServicio").reset();
					$("#fk_reservacion").val("-- Seleccione --");
				}else{
					alert("No se pudo efectuar el registro");
				}
				
			}
		});

	}else{
		alert("Verifique su llenado");
	}
}


function getDataFormVentaServsHotel(){
	var strDatas = 'action=7&'+$("#form_registrarVentaServsHotel").serialize().trim();
	if ( $("#fk_cliente").val()!=0 ) {
		$.ajax({
			url: '../processors/processorForms.php',
			type: 'POST',
			data: strDatas,
			success: function(req){
				//console.log(req);
				if ( req == 1 ) {
					alert("Registro de venta de evento guardado");
					document.getElementById("form_registrarVentaServsHotel").reset();
					$("#fk_reservacion").val("-- Seleccione --");
				}else{
					alert("No se pudo efectuar el registro");
				}
				
			}
		});

	}else{
		alert("Verifique su llenado");
	}
}

function getDataFormFinishReservation(){
	var strDatas = 'action=8&'+$("#form_finishReservation").serialize().trim();
	if ( $("#fk_cliente").val()!=0 ) {
		$.ajax({
			url: '../processors/processorForms.php',
			type: 'POST',
			data: strDatas,
			success: function(req){
				console.log(req);
				if ( req == 1 ) {
					alert("Registro de venta reservaciones guardado");
					document.getElementById("form_finishReservation").reset();
					$("#fk_reservacion").val("-- Seleccione --");
				}else{
					alert("No se pudo efectuar el registro");
				}
				
			}
		});

	}else{
		alert("Verifique su llenado");
	}
}




