<?php

//=====================================================================================================================
// Fichero :ProcesaModX.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 25/12/2015
// Archivo procesador encargado de la modificacion de los objetos
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
		//Por POST recibimos el tipo de objeto que es, y en funcion de este valor usamos la talba correspondiente 
		// para gestionarlo, pasandole directamente los valores recibidos 
		//'array_slice($_POST, 1)' elimina el primer campo recibido 'TIPO' ya que es ajeno a los campos de las tablas
		switch ($_POST["TIPO"])
		{
			case "D":
			$consulta = $_TABLADOCENCIA->Update(array_slice($_POST, 1) );
			break;
			case "M":
			$consulta = $_TABLAMATERIAS->Update(array_slice($_POST, 1) );
			break;
		}
		
		//En caso de test no se realizan redirecciones a ninguna otra pagina
		if (!isset($_COOKIE["TEST"]))
			header("Location: ".$controladores[$identificadoresPrivados["Docencia"]]);
	}
	catch(Exception $e)
	{
		//En caso de test no se realizan redirecciones a ninguna otra pagina
		if (!isset($_COOKIE["TEST"]))
		{
			$errorRescrito = explode("=>",$e->getMessage());
			$_SESSION['error'] = 'ERROR MOD D'."=>".$errorRescrito[1];
			header("Location: ".$controladores[$identificadoresPrivados["Docencia"]]);
		}
	}
?>