<?php
include ("../../Comun/FuncionesComunes.php");
include("../../Comun/codigoSeguridad.php");

//Se incluye la clase de datos
include ("../../Clases/Funcionalidad.php");

//Cargamos el idioma a utilizar en el controlador
$idioma = CargarIdioma();

//Recogemos las variables que vienen por POST desde el formulario de consulta
$FUN_nombreAnt= recoge('FUN_nombreAnt');
$FUN_nombre= recoge('FUN_nombre');
$FUN_descripcion= recoge('FUN_descripcion');

//Creamos el objeto para facilitar el trabajo de datos
	$datos = new Funcionalidad();
//Se debe añadir a la clase los datos que habia seleccionado el usuario para que no los tenga que
	// voler a seleccionar, en caso de que no se producieran errores, el usuario seria almacenado en la BD
	$datos->FUN_nombre = $FUN_nombre;
	$datos->FUN_descripcion = $FUN_descripcion;
	
	foreach ($_SESSION['rolesSistema'] as &$var)
	{		
		$indiceasociativo = str_replace(" ","_","ckbxR_".$var."");
		if (isset($_POST[$indiceasociativo]))
		{
			$datos->addRol($var);
		}
	}
	
	foreach ($_SESSION['paginasSistema'] as &$var)
	{		
		$indiceasociativo = str_replace(" ","_","ckbxP_".$var."");
		if (isset($_POST[$indiceasociativo]))
		{
			$datos->addPagina($var);
		}
	}
// ----------------------------------------- COMPROBACION DE ERRORES ---------------------------------------------------------



//Se comprueba errores en los datos
	try
	{
		if ($datos->FUN_nombre != $FUN_nombreAnt && Funcionalidad::existeFuncionalidad($datos->FUN_nombre))
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
		$_SESSION['claveModF'] = $FUN_nombreAnt;
		$_SESSION['recargaFuncionalidadMod'] = $datos->DatosParaSesion();
		$_SESSION['recargaMF'] = 'si';
		
		header("Location: ModFuncionalidades.php");
		exit;
	}
	
	
	
// ----------------------------------------------------------------------------------------------------

	
	try
	{
		//Actualizamos los datos usando la clave antigua clave antigua (previa a la modificacion)
		$datos->Update($FUN_nombreAnt);
		
		//Eliminamos variables pendientes tras la inserccion correcta
		unset($_SESSION['rolesSistema']);
		unset($_SESSION['paginasSistema']);
		unset($_SESSION['claveModF']);
		unset($_SESSION['recargaFuncionalidadMod']);
		unset($_SESSION['recargaMF']);
		
		$_SESSION["ok"] = 'ACT F OK';
		header("Location: ConsFuncionalidades.php");
	}
	catch(Excepcion $e)
	{
		$_SESSION["error"] = $e->getMessage();
		header("Location: ModFuncionalidades.php");
	}



// 

?>