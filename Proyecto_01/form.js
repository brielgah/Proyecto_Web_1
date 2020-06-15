var nombre = document.getElementById('nombre');
var ap_paterno = document.getElementById('ap-paterno');
var ap_materno = document.getElementById('ap-materno');
var telefono = document.getElementById('telefono');
var celular = document.getElementById('cel');
var error = document.getElementById('error');
var boleta = document.getElementById('bol');
var escuela = document.getElementById('esc-proc');
var email = document.getElementById('mail');
var promedio = document.getElementById('prom');

function validar(){
	error.getElementsByTagName('p')[0].innerHTML = '';
	var errores = [];
	if(nombre.value === '' || hasNumber(nombre.value)){
		if(errores.length <= 5)
			errores.push('El nombre no debe contener números');
	}
	if(ap_materno.value === '' || hasNumber(ap_paterno.value)){
		if(errores.length <= 5)
			errores.push('El apellido paterno no debe contener números');
	}
	if(ap_materno.value === '' || hasNumber(ap_materno.value)){
		if(errores.length <= 5)
			errores.push('El apellido materno no debe contener números');
	}
	if(telefono.value === '' || isNaN(telefono.value)){
		if(errores.length <= 5)
			errores.push('El teléfono no puede contener letras');
	}
	else if(telefono.value.length > 10){
		if(errores.length <= 5)
			errores.push('El teléfono no puede contener mas de 10 dígitos');
	}
	if(celular.value === '' || isNaN(celular.value)){
		if(errores.length <= 5)
			errores.push('El número de celular no puede contener letras');
	}
	else if(celular.value.length > 10){
		if(errores.length <= 5)
			errores.push('El número de celular no puede contener más de 10 dígitos');
	}
	if(boleta.value === '' || !validarBoleta(boleta.value)){
		if(errores.length <= 5)
			errores.push('Boleta no válida');
	}
	if(escuela.value === ''){
		if(errores.length <= 5)
			errores.push('Ingresa tu escuela de procedencia');
	}
	if(!validarEmail(email.value)){
		if(errores.length <= 5)
			errores.push('Ingresa un correo electrónico válido');
	}
	if(promedio.value === '' || !validarPromedio(promedio.value)){
		if(errores.length <= 5)
			errores.push('Ingresa un promedio válido');
	}
	if(errores.length >= 1){
		error.getElementsByTagName('p')[0].innerHTML = errores.join(', ');
	}
	return false;
}

function validarEmail(email){
	var arr = email.indexOf('@');
	var dot = email.lastIndexOf('.');
	if(arr == -1 || dot == -1) return false;
	return arr < dot;	
}

function validarBoleta(boleta){
	if(boleta.length != 10) return false;
	if(isNaN(boleta)){
		if(boleta[0] === 'P'){
			if(boleta[1] === 'E' || boleta[1] === 'P'){
				return !isNaN(boleta.substr(2,8));
			}
			return false;
		}
		return false;
	}
	return  true;
}

function hasNumber(element){
	for(var i=0; i<element.length; i++){
		if(element[i] >= '0' && element[i] <= '9')
			return true;
	}
	return false;
}

function validarPromedio(promedio){
	if(isNaN(promedio)) return false;
	var num = parseInt(promedio,10);
	if(num < 0 || num > 10) return false;
//	console.log(/^[0-9]+(\.[0-9]{1,2})?$/.test(promedio));
	return /^[0-9]+(\.[0-9]{1,2})?$/.test(promedio);
}
