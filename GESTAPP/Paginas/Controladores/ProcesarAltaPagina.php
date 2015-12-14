<?php

include_once ("../../Comun/FuncionesComunes.php");
include_once("../../Comun/codigoSeguridad.php");

//Se incluye la clase Pagina
include_once ("../../Clases/Pagina.php");

//Recogemos las variables que vienen por POST desde el formulario
$PAG_nombre= recoge('PAG_nombre');
$PAG_descripcion= recoge('PAG_descripcion');
$PAG_ubicacion= recoge('PAG_ubicacion');

//Creamos el objeto Pagina para facilitar el trabajo de datos
$objeto = new Pagina();

//Se debe añadir a la clase los datos que habia seleccionado el usuario para que no los tenga que
// voler a seleccionar, en caso de que no se producieran errores, el usuario seria almacenado en la BD
$objeto->PAG_nombre = $PAG_nombre;
$objeto->PAG_descripcion = $PAG_descripcion;
$objeto->PAG_ubicacion = $PAG_ubicacion;

	//Se agregan a la Pagina los usuarios que va a tener en funcion de los 'checks' del formulario
	foreach ($_SESSION['usuariosSistema'] as &$var)
	{		
		$indiceasociativo = str_replace(" ","_","ckbxU_".$var."");
		if (isset($_POST[$indiceasociativo]))
		{
			$objeto->addUsuario($var);
		}
	}
	
	//Se agregan a la Pagina las funcionalidades que va a tener en funcion de los 'checks' del formulario
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
		if (Pagina::existePagina($objeto->PAG_nombre))
		{
			$_SESSION["error"] = 'ERR CLAVE P';
		} 
		else if (!$objeto->existeDirectorioUbicacion())
		{
			$_SESSION["error"] = 'ERR DIRECTORIO';
		}
		//Si es que hubo un error en la subida, mostrarlo, de la variable $_FILES podemos extraer el valor de [error], que almacena un valor booleano (1 o 0).
		else if ($_FILES["PAG_fichero"]["error"] > 0) { 
			$_SESSION["error"] = 'ERR UPLOAD=>Error PHP UPLOAD CODE '. $_FILES["PAG_fichero"]["error"] .' -------> http://php.net/manual/es/features.file-upload.errors.php'; 
		} 
		else 
		{ 
			if (!move_uploaded_file($_FILES["PAG_fichero"]["tmp_name"], explode('?','../../..'.$objeto->PAG_ubicacion)[0]))
			{
				$_SESSION["error"] = 'ERR UPLOAD=>Error PHP move_uploaded_file('.$_FILES["PAG_fichero"]["tmp_name"].' , '.explode('?',$objeto->PAG_ubicacion)[0].')'; 
			}
		}
		
	}
	catch(Exception $e)
	{
		$_SESSION["error"] = $e->getMessage();
	}
	if (isset($_SESSION["error"]))
	{
		//Se agrega a las variables de sesion el objeto 'us' con los datos introducidos
		$_SESSION['recargaPaginaAlta'] = $objeto->DatosParaSesion();
		$_SESSION['recargaAP'] = 'si';
		
		header("Location: AltaPaginas.php");
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
		
		unset($_SESSION['recargaAP']);
		unset($_SESSION['recargaPaginaAlta']);
		
		$_SESSION["ok"] = 'ALT P OK';
		header("Location: ConsPaginas.php");
	}
	catch(Excepcion $e)
	{
		$_SESSION['error'] = $e->getMessage();
		header("Location: AltaPaginas.php");
	}

?>
