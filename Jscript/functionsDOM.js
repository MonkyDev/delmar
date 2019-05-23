$(document).ready(function(){

$('.ui.dropdown').dropdown();

$("#register").click(function(){
	cargaPantallaSingle('../forms/frm_altaCliente.php','contentPrimary');
});

$("#roomsFree").click(function(){
	cargaPantallaSingle('../views/vi_screenRoomsFree.php','contentPrimary');
});

$("#roomReserve").click(function(){
	cargaPantallaSingle('../forms/form_reserveRoom.php','contentPrimary');
});

$("#inRoomPerson").click(function(){
	cargaPantallaSingle('../forms/form_inRoomOccupy.php','contentPrimary');
});

$("#changeRoomPerson").click(function(){
	cargaPantallaSingle('../forms/form_changeRoomPerson.php','contentPrimary');
});

$("#modifyEdo").click(function(){
	cargaPantallaSingle('../views/vi_roomsOnServices.php','contentPrimary');
});

$("#servRooms").click(function(){
	cargaPantallaSingle('../forms/form_servRooms.php','contentPrimary');
});

$("#servsHotel").click(function(){
	cargaPantallaSingle('../forms/form_servsHotel.php','contentPrimary');
});

$("#showReserves").click(function(){
	cargaPantallaSingle('../views/vi_reservesToday.php','contentPrimary');
});

$("#getOutRoom").click(function(){
	cargaPantallaSingle('../forms/form_getOutRoomClie.php','contentPrimary');
});


}); // function primary