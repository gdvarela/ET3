<?php

include_once ("../../Comun/FuncionesComunes.php");
include_once ("../../Comun/codigoSeguridad.php");

//Se incluye la clase Funcionalidad
include_once ("../../Clases/Funcionalidad.php");

//Recogemos las variables que vienen por POST desde el formulario de inserccion
$FUN_nombre= recoge('FUN_nombre');
$FUN_descripcion= recoge('FUN_descripcion');

//Creamos el objeto Funcionalidad para facilitar el trabajo de datos
$objeto = new Funcionalidad();

//Se debe añadir a la clase los datos que habia seleccionado el usuario para que no los tenga que
// voler a seleccionar, en caso de que no se producieran errores, el usuario seria almacenado en la BD
$objeto->FUN_nombre = $FUN_nombre;
$objeto->FUN_descripcion = $FUN_descripcion;

	//Se agregan a la Funcionalidad los roles que va a tener en funcion de los 'checks' del formulario
	foreach ($_SESSION['rolesSistema'] as &$var)
	{		
		$indiceasociativo = str_replace(" ","_","ckbxR_".$var."");
		if (isset($_POST[$indiceasociativo]))
		{
			$objeto->addRol($var);
		}
	}
	
	//Se agregan a la Funcionalidad las paginas que va a tener en funcion de los 'checks' del formulario
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
		if (Funcionalidad::existeFuncionalidad($objeto->FUN_nombre))
		{
			$_SESSION["error"] = 'ERR CLAVE F';
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
		$_SESSION['recargaFuncionalidadAlta'] = $objeto->DatosParaSesion();
		$_SESSION['recargaAF'] = 'si';
		
		header("Location: AltaFuncionalidades.php");
		exit;
	}
	
	
	
// ----------------------------------------------------------------------------------------------------



	//En este punto no hubo errores
	try
	{
		//Almacenamiento de los datos
		$objeto->AlmacenarBD();
		
		//Eliminamos variables pendientes tras la inserccion correcta
		unset($_SESSION['rolesSistema']);
		unset($_SESSION['paginasSistema']);
		unset($_SESSION['recargaFuncionalidadAlta']);
		unset($_SESSION['recargaAF']);
		$_SESSION["ok"] = 'ALT F OK';
		header("Location: ConsFuncionalidades.php");
	}
	catch(Excepcion $e)
	{
		$_SESSION['error'] = $e->getMessage();
		header("Location: AltaFuncionalidades.php");
	}
	



// 

?>