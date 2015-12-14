<?php

include_once ("../../Comun/FuncionesComunes.php");
include_once("../../Comun/codigoSeguridad.php");

//Se incluye la clase dates
include_once ("../../Clases/Rol.php");

//Recogemos las variables que vienen por POST desde el formulario
$ROL_nombre= recoge('ROL_nombre');
$ROL_descripcion= recoge('ROL_descripcion');

//Creamos el objeto Rol para facilitar el trabajo de datos
$objeto = new Rol();

//Se debe añadir a la clase los datos que habia seleccionado el usuario para que no los tenga que
// voler a seleccionar, en caso de que no se producieran errores, el usuario seria almacenado en la BD
$objeto->ROL_nombre = $ROL_nombre;
$objeto->ROL_descripcion = $ROL_descripcion;

	//Se agregan al Rol los usuarios que va a tener en funcion de los 'checks' del formulario
	foreach ($_SESSION['usuariosSistema'] as &$var)
	{		
		$indiceasociativo = str_replace(" ","_","ckbxU_".$var."");
		if (isset($_POST[$indiceasociativo]))
		{
			$objeto->addUsuario($var);
		}
	}
	
	//Se agregan al rol las funcionalidades que va a tener en funcion de los 'checks' del formulario
	foreach ($_SESSION['funcionalidadesSistema'] as &$var)
	{		
		$indiceasociativo = str_replace(" ","_","ckbxF_".$var."");
		if (isset($_POST[$indiceasociativo]))
		{
			$objeto->addFuncionalidad($var);
		}
	}
	
// ----------------------------------------- COMPROBACION DE ERRORES ---------------------------------------------------------



//Se comprueba errores en los datos
	try
	{
		if (Rol::existeRol($objeto->ROL_nombre))
		{
			$_SESSION["error"] = 'ERR CLAVE R';
		}
	}
	catch(Exception $e)
	{
		$_SESSION["error"] = $e->getMessage();
	}
	
	if (isset($_SESSION["error"]))
	{
		//Se agrega a las variables de sesion el objeto 'us' con los datos introducidos
		$_SESSION['recargaRolAlta'] = $objeto->DatosParaSesion();
		$_SESSION['recargaAR'] = 'si';
		
		header("Location: AltaRoles.php");
		exit;
	}
	
	
	
// ----------------------------------------------------------------------------------------------------

	//En este punto no hubo errores
	try
	{
		//Almacenamiento de los datos
		$objeto->AlmacenarBD();
		
		//Eliminamos variables pendientes tras la inserccion correcta
		unset($_SESSION['usuariosSistema']);
		unset($_SESSION['funcionalidadesSistema']);
		unset($_SESSION['recargaRolAlta']);
		unset($_SESSION['recargaAR']);
		$_SESSION["ok"] = 'ALT R OK';
		header("Location: ConsRoles.php");
	}
	catch(Excepcion $e)
	{
		$_SESSION['error'] = $e->getMessage();
		header("Location: AltaRoles.php");
	}

?>
