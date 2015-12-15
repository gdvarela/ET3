<?php

//Variable que almacena el nombre de la carpeta Raiz del directorio
$Raiz = explode('/',$_SERVER['PHP_SELF'])[count(explode('/',$_SERVER['PHP_SELF']))-4];

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

$miPaginaPorDefecto = $PaginaError;
include_once$RutaRelativaControlador.'GESTAPP/controlPages.php';


//Cargamos el idioma a utilizar en el controlador
$idioma = CargarIdioma2($RutaRelativaControlador);

//Variable que almacenara el identificador de la pagina actual, se establece su valor en el SWITCH
$PagID = "MP";

//Se incluye la vista concreta que se desea mostrar, utilizando el array
// el array vistas se encuentra en el archivo ArchivoComun.php
// Automaticamente se mostrará la vista correspondiente.
include_once $vistas[$PagID];

?>
