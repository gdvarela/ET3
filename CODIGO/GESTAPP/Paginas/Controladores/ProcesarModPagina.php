<?php

include ("../../Comun/FuncionesComunes.php");
include("../../Comun/codigoSeguridad.php");

//Se incluye la clase de datos
include ("../../Clases/Pagina.php");

//Cargamos el idioma a utilizar en el controlador
$idioma = CargarIdioma();

//Recogemos las variables que vienen por POST desde el formulario
$PAG_nombreAnt = recoge('PAG_nombreAnt');
$PAG_ubicacionAnt = recoge('PAG_ubicacionAnt');
$PAG_nombre= recoge('PAG_nombre');
$PAG_descripcion= recoge('PAG_descripcion');
$PAG_ubicacion= recoge('PAG_ubicacion');


//Creamos el objeto para facilitar el trabajo de datos
	$datos = new Pagina();
//Se debe añadir a la clase los datos que habia seleccionado el usuario para que no los tenga que
	// voler a seleccionar, en caso de que no se producieran errores, el usuario seria almacenado en la BD
	$datos->PAG_nombre = $PAG_nombre;
	$datos->PAG_descripcion = $PAG_descripcion;
	$datos->PAG_ubicacion = $PAG_ubicacion;
	
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
		if ($datos->PAG_nombre != $PAG_nombreAnt && Pagina::existePagina($datos->PAG_nombre))
		{
			$_SESSION["error"] = 'ERR CLAVE P';
		}
		else if (!$datos->existeDirectorioUbicacion())
		{
			$_SESSION["error"] = 'ERR DIRECTORIO';
		}
		else if ($_FILES["PAG_fichero"]["error"] != 4 && $_FILES["PAG_fichero"]["error"] != 0)
		{
			$_SESSION["error"] = 'ERR UPLOAD=>Error PHP UPLOAD CODE '. $_FILES["PAG_fichero"]["error"] .' -------> http://php.net/manual/es/features.file-upload.errors.php'; 
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
		$_SESSION['claveModP'] = $PAG_nombreAnt;
		$_SESSION['ubiMod'] = $PAG_ubicacionAnt;
		$_SESSION['recargaPaginaMod'] = $datos->DatosParaSesion();
		$_SESSION['recargaMP'] = 'si';
		
		header("Location: ModPaginas.php");
		exit;
	}
// ----------------------------------------------------------------------------------------------------
	
	
	
	$ficheroSubido = 0;
	if ($_FILES["PAG_fichero"]["error"] == 0) 
	{ 
		$ficheroSubido = 1;
	}
	
	try
	{
		if($datos->PAG_ubicacion != $PAG_ubicacionAnt)
		{
			if ($ficheroSubido == 1)
			{
				unlink('../../..'.explode('?',$PAG_ubicacionAnt)[0]);
				if (!move_uploaded_file($_FILES['PAG_fichero']['tmp_name'], '../../..'.explode('?',$datos->PAG_ubicacion)[0])){
					$_SESSION["error"] = "ERR PER S=>Error Permission Denied move_uploaded_file(".$_FILES['PAG_fichero']['tmp_name'].",../../..".explode('?',$datos->PAG_ubicacion)[0].")";
					header("Location: ModPaginas.php");
					exit;
				}
			}
			else
			{
				if (!rename('../../..'.explode('?',$PAG_ubicacionAnt)[0], '../../..'.explode('?',$datos->PAG_ubicacion)[0])){
					$_SESSION["error"] = "ERR PER S=>Error Permission Denied rename(../../..".explode('?',$PAG_ubicacionAnt)[0].",../../..".explode('?',$datos->PAG_ubicacion)[0].")";
					header("Location: ModPaginas.php");
					exit;
				}
			}
		}
		else
		{
			
			if ($ficheroSubido == 1 )
			{
				if (!move_uploaded_file($_FILES['PAG_fichero']['tmp_name'], '../../..'.explode('?',$datos->PAG_ubicacion)[0])){
					$_SESSION["error"] = "ERR PER S=>Error Permission Denied move_uploaded_file(".$_FILES['PAG_fichero']['tmp_name'].",../../..".explode('?',$datos->PAG_ubicacion)[0].")";
					header("Location: ModPaginas.php");
					exit;
				}
			}
			
		}
		
		//Actualizamos los datos usando la clave antigua clave antigua (previa a la modificacion)
		$datos->Update($PAG_nombreAnt);
		//Eliminamos variables pendientes tras la inserccion correcta
		unset($_SESSION['usuariosSistema']);
		unset($_SESSION['funcionalidadesSistema']);
		unset($_SESSION['ubiMod']);
		unset($_SESSION['claveModP']);
		unset($_SESSION['recargaPaginaMod']);
		unset($_SESSION['recargaMP']);
		
		$_SESSION["ok"] = 'ACT P OK';
		header("Location: ConsPaginas.php");
	}
	catch(Excepcion $e)
	{
		$_SESSION["error"] = $e->getMessage();
		header("Location: ModPaginas.php");
	}
	
// 

?>