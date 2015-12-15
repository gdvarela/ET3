<?php

//Variable que almacena el nombre de la carpeta Raiz del directorio
$Raiz = explode('/',$_SERVER['PHP_SELF'])[count(explode('/',$_SERVER['PHP_SELF']))-5];


//Devuelve la ruta relativa (en forma ../../) del fichero que realiza la llamada a la funcion con respecto
// a la carpeta raiz que contiene la aplicacion web.
function getRuta()
{
	global $Raiz;
	
	$RutaArray = explode('/',$_SERVER['PHP_SELF']);
	$toret = "";
	for ($i =(count($RutaArray)-2);$i > 0; $i = $i -1)
	{
		if ($RutaArray[$i] == $Raiz)
			break;
		else
			$toret = $toret."../";
	}
	return $toret;
}


//Esta variable contiene la ruta relativa para llegar
// desde la ubicacion del controlador general a la raiz (SitioWEB) de la carpeta
// de la aplicacion
// Ej: /SitioWEB/carpeta2/carpeta3/controlador.php la ruta relativa correspondiente será
// ../../
$RutaRelativaControlador = getRuta();

//Ruta Relativa del ArchivoComun
include_once $RutaRelativaControlador.'Comun/ArchivoComun.php';

//Cargamos el idioma a utilizar en el controlador
$idioma = CargarIdioma2($RutaRelativaControlador);

/* 

Proceso de logeado contra la base de datos utilizando las como punto de entrada
los ficheros de conexion de la shell.

*/
	include_once $RutaRelativaControlador."/GESTAPP/Comun/FuncionesComunes.php";
	include_once $RutaRelativaControlador."/GESTAPP/Clases/BaseDatosControl.php";
	
	session_start();
	
	try{
		$conexionBD = new BaseDatosControl();
	}
	catch(Exception $e)
	{
		//Campo login vacio
		$_SESSION['error'] = 'ERR CONECT BD';
		header("Location: ".$controladores[$identificadores['Login']]);
		exit;
	}
	
	//Recpgemos los datos de login
	$Login = recoge('LoginL');
	$Pass = $_POST['PassL'];
	
	
	
	try
	{
		$consultaDeAcceso = $conexionBD->OperacionGenericaBD("Select * from USUARIOS where `Login`=\"" . $Login . "\"" );
		$num = $consultaDeAcceso->num_rows;
	
		if ($num == 0)
		{
			//No existe Usuario
			$_SESSION['error'] ='ERR Login';
			header("Location: ".$controladores[$identificadores['Login']]);
			exit;
		}
		
		$TuplaAcceso = $consultaDeAcceso->fetch_assoc();
	
		if ($TuplaAcceso['Pass']== $Pass )
		{
			//Login satisfactorio
			$_SESSION['logeado'] = "on";
			$_SESSION['PosicionMenuLateral']='B';
			$_SESSION['username'] = $TuplaAcceso['USU_nombre'];
			$_SESSION['login'] = $Login;
			$_SESSION['pass'] = $Pass;
			header("Location: ".$controladores[$identificadoresPrivados['Home']]);
		}
		else
		{
			//Contraseña incorrecta
			$_SESSION['error'] = 'ERR Pass';
			header("Location: ".$controladores[$identificadores['Login']]);
			exit;
		}
		
	}
	catch(Exception $e)
	{
		$_SESSION['error'] = 'CON ERR U';
		header("Location: ".$controladores[$identificadores['Login']]);
		exit;
	}
	
	
?>