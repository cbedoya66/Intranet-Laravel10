// JavaScript Document


var op = document.querySelector('#t_Asistencia');

op.addEventListener('click', function() {

	var peticion = document.querySelector("#strpeticion").value;
	var asistencia = document.querySelector('#t_Asistencia').value;
	var union = document.querySelector('#union');

	union.innerHTML= peticion + " "+ asistencia ;

});
	

