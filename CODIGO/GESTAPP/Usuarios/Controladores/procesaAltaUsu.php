<?php

include_once ("../../Comun/FuncionesComunes.php");
include_once ("../../Comun/codigoSeguridad.php");

//Se incluye la clase Usuario
include_once ("../../Clases/Usuario.php");

//Recogemos las variables que vienen por POST desde el formulario de inserccion
$Login= recoge('Login');
$Pass = recoge('Pass');
$USU_nombre= recoge('USU_nombre');
$USU_apellido= recoge('USU_apellido');
$USU_email= recoge('USU_email');

//Creamos el objeto Usuario para facilitar el trabajo de datos
$objeto = new Usuario();

//Se debe añadir a la clase los datos que habia seleccionado el usuario para que no los tenga que
// voler a seleccionar, en caso de que no se producieran errores, el usuario seria almacenado en la BD
$objeto->Login = $Login;
$objeto->Pass = $Pass;
$objeto->USU_nombre = $USU_nombre;
$objeto->USU_apellido = $USU_apellido;
$objeto->USU_email = $USU_email;

	//Se agregan al usuario los roles que va a tener en funcion de los 'checks' del formulario
	foreach ($_SESSION['rolesSistema'] as &$var)
	{		
		$indiceasociativo = str_replace(" ","_","ckbxR_".$var."");
		if (isset($_POST[$indiceasociativo]))
		{
			$objeto->addRol($var);
		}
	}
	
	//Se agregan al usuario las paginas que va a tener en funcion de los 'checks' del formulario
	foreach ($_SESSION['paginasSistema'] as &$var)
	{		
		$indiceasociativo = str_replace(" ","_","ckbxP_".$var."");
		if (isset($_POST[$indiceasociativo]))
		{
			$objeto->addPagina($var);
		}
	}
	

// ----------------------------------------- COMPROBACION DE ERRORES ---------------------------------------------------------



//Se comprueba errores en los datos
	try
	{
		
		if (Usuario::existeUsuario($objeto->Login))
		{
			$_SESSION["error"] = 'ERR CLAVE U';
		}
	/* 
		Añadir tantos 'else if' como errores se quieran comprobar y en cada uno de ellos
		establecer el error producido
	 */
	 
	}
	catch(Exception $e)
	{
		$_SESSION["error"] = $e->getMessage();
	}

	if (isset($_SESSION["error"]))
	{
		//Se agrega a las variables de sesion el objeto 'us' con los datos introducidos
		$_SESSION['recargaUsuarioAlta'] = $objeto->DatosParaSesion();
		$_SESSION['recargaAU'] = 'si';
		
		header("Location: AltaUsuarios.php");
		exit;
	}
	
	
	
// ----------------------------------------------------------------------------------------------------



	//En este punto no hubo errores, asique se completa los datos del usuario con la fecha de alta
	// y la Pass
	$objeto->USU_fecha_alta = fecha_act();
	
	try
	{
		//Almacenamiento de los datos
		$objeto->AlmacenarBD();
		
		//Eliminamos variables pendientes tras la inserccion correcta
		unset($_SESSION['rolesSistema']);
		unset($_SESSION['paginasSistema']);
		unset($_SESSION['recargaUsuarioAlta']);
		unset($_SESSION['recargaAU']);
		
		$_SESSION["ok"] = 'ALT U OK';
		header("Location: ConsUsuarios.php");
	}
	catch(Excepcion $e)
	{
		$_SESSION['error'] = $e->getMessage();
		header("Location: AltaUsuarios.php");
	}
	



// 

?>