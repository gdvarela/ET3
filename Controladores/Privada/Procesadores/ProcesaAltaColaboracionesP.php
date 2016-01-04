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

try
	{
		switch ($_POST["TIPO"])
		{
			case "I":
			TablaBD::ConsultaGenerica("Insert into ".$_TABLAPARTICIPANTES->nombreTabla." Values ('".$_POST['MP-IDParticipante']."', 'Institucion') ");
			
			break;
			case "G":
			TablaBD::ConsultaGenerica("Insert into ".$_TABLAPARTICIPANTES->nombreTabla." Values ('".$_POST['MP-IDParticipante']."', 'Grupo') ");
			break;
			case "E":
			TablaBD::ConsultaGenerica("Insert into ".$_TABLAPARTICIPANTES->nombreTabla." Values ('".$_POST['MP-IDParticipante']."', 'Empresa') ");
			break;
		}
		}
	catch(Exception $e)
	{
		if (!isset($_COOKIE["TEST"]))
		{
			session_start();
		$errorRescrito = explode("=>",$e->getMessage());
		$_SESSION['error'] = 'ID Part REP'."=>".$errorRescrito[1];
		header("Location: ".$controladores[$identificadoresPrivados["Colaboraciones"]]);
		}
	}
	
try
	{
		switch ($_POST["TIPO"])
		{
			case "I":
			$consulta = $_TABLAINSTITUCIONES->AlmacenarBD(array_slice($_POST, 1) );
			break;
			case "G":
			$consulta = $_TABLAGRUPOS->AlmacenarBD(array_slice($_POST, 1) );
			break;
			case "E":
			$consulta = $_TABLAEMPRESAS->AlmacenarBD(array_slice($_POST, 1) );
			break;
		}
		if (!isset($_COOKIE["TEST"]))
		header("Location: ".$controladores[$identificadoresPrivados["Colaboraciones"]]);
	}
	catch(Exception $e)
	{
		
		if (!isset($_COOKIE["TEST"]))
		{
			session_start();
			$errorRescrito = explode("=>",$e->getMessage());
		$_SESSION['error'] = 'ID CONCRETO REPETIDO C'."=>".$errorRescrito[1];
			header("Location: ".$controladores[$identificadoresPrivados["Colaboraciones"]]);
		}
	}
	
?>