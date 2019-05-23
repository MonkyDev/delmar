function cargaPantallaSingle(file,content){
	$.ajax({
		url:file,
		success: function(e){
			$('html, body').animate({scrollTop:0}, 'slow');
			$('#'+content).html(e);
		}	
	});
}

function blockButton(btn){
	$('#'+btn).each(function (){
    	this.style.pointerEvents = 'none'; 
	});
}

function activeButton(btn){
	$('#'+btn).each(function (){
    	this.style.pointerEvents = 'auto'; 
	});
}