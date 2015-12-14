/* Funcion que se ejecuta justo antes del submit de una pagina y que lo que hace es
	Comprobar si el campo indicador permite o no el envio dependiendo de si los datos del formulario
	estan validados o no
 */

function validarForm()
{
	return !document.getElementById('validForm').disabled;
}

/* Comprueba si el elemento pasado por parametro esta vacio o no
	en caso de que lo este activa el error indicado mediante idERROR
 */

function esVacio(elemento,idERROR) 
{
	valor = elemento.value;
	if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
		
		document.getElementById(idERROR).style.display = 'inline';
		document.getElementById('validForm').disabled = true;
		if (document.getElementById('validForm').value.indexOf(elemento.name)==-1)
			document.getElementById('validForm').value += elemento.name;
	}
	else
	{
		document.getElementById(idERROR).style.display = 'none';
		document.getElementById('validForm').value = document.getElementById('validForm').value.replace(elemento.name,"");
		if (document.getElementById('validForm').value == "")
			document.getElementById('validForm').disabled = false;
	}
}

/* Valida si el dato introducido en 'elemento' es un mail correcto
	En caso contrario activa el error 'idERROR'
 */

function esMail(elemento,idERROR) 
{
	valor = elemento.value;
	if(!(/\S+@\S+\.\S+/.test(valor))) 
	{
		document.getElementById(idERROR).style.display = 'inline';
		document.getElementById('validForm').disabled = true;
		if (document.getElementById('validForm').value.indexOf(elemento.name)==-1)
			document.getElementById('validForm').value += elemento.name;
	}
	else
	{
		document.getElementById(idERROR).style.display = 'none';
		document.getElementById('validForm').value = document.getElementById('validForm').value.replace(elemento.name,"");
		if (document.getElementById('validForm').value == "")
			document.getElementById('validForm').disabled = false;
	}
}

/* Este se aplica al segundo campo de contraseña y realiza una comparacion con el primero
	activando el error en caso de que no coincidan
 */

function esPassCoincide(elemento1,idERROR) 
{
	valora = elemento1.value;
	if(valora != document.getElementById('Pass').value ) {
		
		document.getElementById(idERROR).style.display = 'inline';
		document.getElementById('validForm').disabled = true;
		if (document.getElementById('validForm').value.indexOf(elemento1.name)==-1)
			document.getElementById('validForm').value += elemento1.name;
	}
	else
	{
		document.getElementById(idERROR).style.display = 'none';
		document.getElementById('validForm').value = document.getElementById('validForm').value.replace(elemento1.name,"");
		if (document.getElementById('validForm').value == "")
			document.getElementById('validForm').disabled = false;
	}
}

/* Comprueba la validez de la contraseña a la vez que activa la duncion anterior para comprobar si coinden los dos campos de contraseña
*/

function esPassValida(elemento,longitud,idERROR) 
{
	valor = elemento.value;
	valor2 = document.getElementById('Igual').value;
	if (valor2.length != 0)
	{
		esPassCoincide(document.getElementById('Igual'),'ErrorI')
	}
	if(valor.length < longitud || !(/^[A-Za-z0-9]*$/.test(valor))) {
		
		document.getElementById(idERROR).style.display = 'inline';
		document.getElementById('validForm').disabled = true;
		if (document.getElementById('validForm').value.indexOf(elemento.name)==-1)
			document.getElementById('validForm').value += elemento.name;
	}
	else
	{
		document.getElementById(idERROR).style.display = 'none';
		document.getElementById('validForm').value = document.getElementById('validForm').value.replace(elemento.name,"");
		if (document.getElementById('validForm').value == "")
			document.getElementById('validForm').disabled = false;
	}
}

/* funcion que muestra o oculta el campo de ayuda de la subida de paginas */

function cambiarAyuda()
{
	if(document.getElementById('explicativo').style.display == 'block')
		document.getElementById('explicativo').style.display = 'none';
	else
		document.getElementById('explicativo').style.display = 'block';
	
}

/* comprueba la validez de si lo introducido en elemento1 es nua ubicacion correcta */

function esUbiCorrecta(elemento1,idERROR,idERROR2) 
{
	valora = elemento1.value.split("?")[0];
	if (valora == "" ) {
		
		document.getElementById(idERROR).style.display = 'inline';
		document.getElementById('validForm').disabled = true;
		if (document.getElementById('validForm').value.indexOf(elemento1.name+"1")==-1)
			document.getElementById('validForm').value += elemento1.name+"1";
		return;
	}
	else
	{
		document.getElementById(idERROR).style.display = 'none';
		document.getElementById('validForm').value = document.getElementById('validForm').value.replace(elemento1.name+"1","");
		if (document.getElementById('validForm').value == "")
			document.getElementById('validForm').disabled = false;
	}
	
	primCar = valora.charAt(0);
	ext1 = valora.substring(valora.length-3, valora.length);
	ext2 = valora.substring(valora.length-4, valora.length);
	if (primCar != "/" || (ext1.toLowerCase() != "php" && ext2.toLowerCase() != "html") )
	{
		document.getElementById(idERROR2).style.display = 'inline';
		document.getElementById('validForm').disabled = true;
		if (document.getElementById('validForm').value.indexOf(elemento1.name+"2")==-1)
			document.getElementById('validForm').value += elemento1.name+"2";
		
	}
	else
	{
		document.getElementById(idERROR2).style.display = 'none';
		document.getElementById('validForm').value = document.getElementById('validForm').value.replace(elemento1.name+"2","");
		if (document.getElementById('validForm').value == "")
			document.getElementById('validForm').disabled = false;
	}
}
