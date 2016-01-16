<?php
include ("../../Comun/FuncionesComunes.php");
include("../../Comun/codigoSeguridad.php");

//Se incluye la clase de datos
include ("../../Clases/Usuario.php");

//Cargamos el idioma a utilizar en el controlador
$idioma = CargarIdioma();

//Recogemos las variables que vienen por POST desde el formulario de consulta
$LoginAnt= recoge('LoginAnt');
$Login= recoge('Login');
$Pass= recoge('Pass');
$USU_nombre= recoge('USU_nombre');
$USU_apellido= recoge('USU_apellido');
$USU_email= recoge('USU_email');
$USU_fecha_alta = recoge('USU_fecha_alta');

//Creamos el objeto para facilitar el trabajo de datos
	$datos = new Usuario();
//Se debe añadir a la clase los datos que habia seleccionado el usuario para que no los tenga que
	// voler a seleccionar, en caso de que no se producieran errores, el usuario seria almacenado en la BD
	$datos->Login = $Login;
	$datos->Pass = $Pass;
	$datos->USU_nombre = $USU_nombre;
	$datos->USU_apellido = $USU_apellido;
	$datos->USU_email = $USU_email;
	$datos->USU_fecha_alta = $USU_fecha_alta;
	
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
		
		if ($datos->Login != $LoginAnt && Usuario::existeUsuario($datos->Login))
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
		$_SESSION['claveModU'] = $LoginAnt;
		$_SESSION['recargaUsuarioMod'] = $datos->DatosParaSesion();
		header("Location: ModUsuarios.php");
		exit;
	}
	
	
	
// ----------------------------------------------------------------------------------------------------

	
	try
	{
		//Actualizamos los datos usando la clave antigua clave antigua (previa a la modificacion)
		$datos->Update($LoginAnt);
		
		if ($LoginAnt == $_SESSION['login'])
		{
			$_SESSION['username'] = $datos->USU_nombre;
			$_SESSION['login'] = $datos->Login;
			$_SESSION['pass'] = $datos->Pass;
		}
		
		//Eliminamos variables pendientes tras la inserccion correcta
		unset($_SESSION['rolesSistema']);
		unset($_SESSION['paginasSistema']);
		unset($_SESSION['claveModU']);
		unset($_SESSION['recargaUsuarioMod']);
		
		$_SESSION["ok"] = 'ACT U OK';
		header("Location: ConsUsuarios.php");
	}
	catch(Excepcion $e)
	{
		$_SESSION["error"] = $e->getMessage();
		header("Location: ModUsuarios.php");
	}



// 

?>