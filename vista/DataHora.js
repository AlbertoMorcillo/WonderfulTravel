"use strict";
function filter_options(){
	if (typeof $("#choice1").data('options') === "undefined") {
       $("#choice1").data('options', $('#choice2 option').clone());
  }
    var id = $("#choice1").val();
    var options = $("#choice1").data('options').filter('[data-option=' + id + ']');
    $('#choice2').html(options);
}

$(function () {
		//Ejecutar el filtro la primera vez
		filter_options();
    
    //actualizar al cambiar el factor
    $("#choice1").change(function () {
	    filter_options();
		});
    
});
/******************************************************
* EN AQUEST APARTAT PODEU AFEGIR O MODIFICAR FUNCIONS *
******************************************************/