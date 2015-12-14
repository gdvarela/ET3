<?php

include ("../../Comun/FuncionesComunes.php");
include("../../Comun/codigoSeguridad.php");

//Se incluye la clase de datos
include ("../../Clases/Rol.php");

//Cargamos el idioma a utilizar en el controlador
$idioma = CargarIdioma();

//Recogemos las variables que vienen por POST desde el formulario
$ROL_nombreAnt = recoge('ROL_nombreAnt');
$ROL_nombre= recoge('ROL_nombre');
$ROL_descripcion= recoge('ROL_descripcion');


//Creamos el objeto para facilitar el trabajo de datos
	$datos = new Rol();
//Se debe añadir a la clase los datos que habia seleccionado el usuario para que no los tenga que
	// voler a seleccionar, en caso de que no se producieran errores, el usuario seria almacenado en la BD
	$datos->ROL_nombre = $ROL_nombre;
	$datos->ROL_descripcion = $ROL_descripcion;
	
	foreach ($_SESSION['usuariosSistema'] as &$var)
	{		
		$indiceasociativo = str_replace(" ","_","ckbxU_".$var."");
		if (isset($_POST[$indiceasociativo]))
		{
			$datos->addUsuario($var);
		}
	}
	
	foreach ($_SESSION['funcionalidadesSistema'] as &$var)
	{		
		$indiceasociativo = str_replace(" ","_","ckbxF_".$var."");
		if (isset($_POST[$indiceasociativo]))
		{
			$datos->addFuncionalidad($var);
		}
	}

// ----------------------------------------- COMPROBACION DE ERRORES ---------------------------------------------------------
	
	try
	{
		if ($datos->ROL_nombre != $ROL_nombreAnt && Rol::existeRol($datos->ROL_nombre))
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
		$_SESSION['claveModR'] = $ROL_nombreAnt;
		$_SESSION['recargaRolMod'] = $datos->DatosParaSesion();
		$_SESSION['recargaMR'] = 'si';
		
		header("Location: ModRoles.php");
		exit;
	}
// ----------------------------------------------------------------------------------------------------
	
	try
	{
		//Actualizamos los datos usando la clave antigua clave antigua (previa a la modificacion)
		$datos->Update($ROL_nombreAnt);
		
		//Eliminamos variables pendientes tras la inserccion correcta
		unset($_SESSION['usuariosSistema']);
		unset($_SESSION['funcionalidadesSistema']);
		unset($_SESSION['claveModR']);
		unset($_SESSION['recargaRolMod']);
		unset($_SESSION['recargaMR']);
		$_SESSION["ok"] = 'ACT R OK';
		header("Location: ConsRoles.php");
	}
	catch(Excepcion $e)
	{
		$_SESSION["error"] = $e->getMessage();
		header("Location: ModRoles.php");
	}
	
// 

?>