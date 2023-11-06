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

/**
 * Retorna l'hora i data i, en alguns casos, un missatge.
 *
 * @param {Date} ara	Data i hora actual en un objecte de tipus Date
 *
 * @return {string}		Text HTML amb la següent informació:
 * 						HH:MM:SS {AM|PM}<br>
 * 						Dia de la setmana<br>
 * 						[D]D / [M]M / AAAA
 * 		A més, també ha de proporcionar les següents informacions, afegint <br> al davant:
 * 			Si és migdia (12:00 PM): Són les 12 del migdia. Tens una hora per anar a dinar.
 * 			Si és mitjanit (00:00 AM):
 * 				Si és Cap d'any (1 de gener): Bon any !!!
 * 				Si és Nadal (25 de desembre): Bon Nadal !!!
 * 				Si no és cap dels anteriors: És mitjanit. No daihauries d'estar dormint?
 * 			Si és any de traspàs (bisiesto):
 * 				A les 08:00 AM de l'1 de gener: Bon dia. Aquest serà un any especial.
 * 				A les 08:00 AM del 29 de febrer: Bon dia. Avui és un dia especial.
 */
function traspas(any,missatge,ara) {
	let dia_numero = ara.getDate();
	let mes = ara.getMonth() + 1;
	if (any % 4 == 0 && any % 100 != 0 || any % 400 == 0) {
		if (dia_numero == "29" && mes == "2"){
			missatge = "Bon dia. Avui és un dia especial."
		}else{
			missatge = "Bon dia. Aquest serà un any especial."
		}

}
return missatge
}
function rellotge(ara) {
	let zona = "";
	let missatge;
	let variable_data;
	let dia = ara.getDay();
	let dia_numero = ara.getDate();
    let mes = ara.getMonth() + 1;
	let any = ara.getFullYear();
    let hora = ara.getHours();
    let minut = ara.getMinutes();
    let segon = ara.getSeconds() + 0;





	if(hora <= 9){
		hora = "0" + hora 
	}
	if(minut <= 9){
		minut = "0" + minut 
	}
	if(segon <= 9){
		segon = "0" + segon 
	}

if (hora <= 12 /*&& minut <= 0 && segon <= 0*/){
	zona = " AM";
}else{
	hora -= 12;
	zona = " PM"
}



switch (dia) {
	case 1:
		dia = "Dilluns"
		break;
		case 2:
		dia = "Dimarts"
		break;
		case 3:
		dia = "Dimecres"
		break;
		case 4:
		dia = "Dijous"
		break;
		case 5:
		dia = "Divendres"
		break;
		case 6:
		dia = "Dissabte"
		break;
		case 0:
			dia = "Diumenge"
			break;
		
	
	
}
missatge = traspas(any,missatge,ara)
if(hora == "00" && minut == "00"){
	missatge = "És mitjanit. No hauries d'estar dormint?"
}else if(hora == "12" && minut == "00"){
	missatge = "Són les 12 del migdia. Tens una hora per anar a dinar."
}
if (dia_numero == "1" && mes == "1" && hora == "00" && minut == "00"){
	missatge = "Bon any !!!"

}
if (dia_numero == "25" && mes == "12" && hora == "00" && minut == "00"){
	missatge = "Bon Nadal !!!"
}


	variable_data = hora +":" + minut + ":" + segon + zona;
	variable_data += "<br>" + dia
	variable_data += "<br>" + dia_numero + " / " + mes + " / " + any
	if (missatge){variable_data += "<br>" + missatge}

		return variable_data
}		

/**
 * Calcula la diferència de dies entre la data de naixement i una altra data.
 * OPCIONALMENT, en lloc de fer aquest càlcul, mostrar diferents missatges.
 *
 * @param {string} naixement	Data de naixement: DD-MM-AAAA
 * @param {string} data2		Segona data (si està en blanc, s'ha d'agafar la data actual)
 *
 * @return {string}		"Fa D dies que estàs en aquest món." (D ha de ser número enter. Pot ser negatiu)
 *						OPCIONAL: en lloc de calcular la diferència en dies:
 *							si naixement > data2: "Encara no has nascut?"
 *							si naixement == data2: "Benvingut/da al món!"
 *							si aniversari: "Feliç X aniversari!"
 *							si no aniversari: "Falten D dies pel teu X aniversari."
 * 
 * 			Exemples: suposant que la segona data és 14 d'octubre de 2019 (14-10-2019)
 * 				Diferència en dies entre avui (14-10-2019) i la data de naixement:
 * 					Data Naixement: 14-10-2000
 * 					Resultat: Fa 6939 dies que estàs en aquest món.
 * 
 * 				OPCIONAL: diversos missatges segons la data de naixement:
 * 					Data Naixement: 01-01-2021
 * 					Resultat: Encara no has nascut?
 * 
 * 					Data Naixement: 14-10-2019
 * 					Resultat: Benvingut/da al món!
 * 
 * 					Data Naixement: 14-10-2010
 * 					Resultat: Feliç 9 aniversari!
 * 
 * 					Data Naixement: 13-10-2000
 * 					Resultat: Falten 365 dies pel teu 20 aniversari.
 */
function aniversari(naixement, data2) {
	let missatge;
	let dia_naixement = naixement.slice(0,2);
	let mes_naixement = naixement.slice(3,5);
	let any_naixement = naixement.slice(6,10);

	if (data2 == null){
		data2 = Date.now(); // no muestra la fecha actual
	}

	let data2_dia = data2.slice(0,2);
	let data2_mes = data2.slice(3,5);
	let data2_any = data2.slice(6,10);

	let d1 = Date.UTC(any_naixement,mes_naixement , dia_naixement);    // 1577836800000
	let d2 = Date.UTC(data2_any,data2_mes,data2_dia);    // 1593561600000
	let dUTC = d2 - d1;
	dUTC = (dUTC / 86400000 )
	if (data2_dia == dia_naixement && mes_naixement == data2_mes){
		missatge = "Fa "+ dUTC + " dies que estàs en aquest món."
		dUTC = data2_any - any_naixement;
		missatge += "<br>Feliç " + dUTC + " aniversari"
	}
	
	 else if (dUTC < 0){		
		missatge = "Fa "+ dUTC + " dies que estàs en aquest món."
		missatge += "<br>Encara no has nascut?"
	}else if (dUTC > 0){
		missatge = "Fa "+ dUTC + " dies que estàs en aquest món."
		missatge += "<br>Falta tant pel teu aniversari"
	}else{
		
		// if(naixement == data2){missatge = "Benvingut al món!"} 
		// if(naixement > data2){missatge = "Encara no has nascut?"} 
		
	}
	return missatge;
}


/************************************************
* FINAL DE L'APARTAT ON PODEU FER MODIFICACIONS *
************************************************/

function clock() {
	document.getElementById('data').innerHTML = rellotge(new Date());
}

function init() {
	clock();
	setInterval(clock, 1000);
}
window.onload = init;