<?php

//=====================================================================================================================
// Fichero :ProcesaAltaX.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 25/12/2015
// Archivo procesador encargado del borrado de los objetos
// Todos los procesadores son similares, solo cambia las consultas realizadas en el.
//=====================================================================================================================

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

try
	{
		$consulta = $_TABLAMIEMBRO->AlmacenarBD($_POST);
		
		//Tras haber añadido el usuario a la tabla de usuarios, se añade automaticamente a la relacion usuario-miembro ya que todo usuario que se de 
		// de alta en la WEB tendra el rol de miembro
		TablaBD::ConsultaGenerica("Insert into HACE_DE (Login,ROL_nombre) values ('" .$_POST["MA-Login"]."','". $ROLMIEMBRO."')");
		
		//En caso de test no se realizan redirecciones a ninguna otra pagina
		if (!isset($_COOKIE["TEST"]))
			header("Location: ".$controladores[$identificadoresPrivados["Miembros"]]);
	}
	catch(Exception $e)
	{
		//En caso de test no se realizan redirecciones a ninguna otra pagina
		if (!isset($_COOKIE["TEST"]))
		{
			session_start();
			$errorRescrito = explode("=>",$e->getMessage());
			$_SESSION['error'] = 'ALT ERR U'."=>".$errorRescrito[1];
			header("Location: ".$controladores[$identificadoresPrivados["Miembros"]]);
		}
	}
?>