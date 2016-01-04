<?php

//Variable que almacena el nombre de la carpeta Raiz del directorio
$Raiz = explode('/',$_SERVER['PHP_SELF']);
$Raiz = $Raiz[count($Raiz)-4];

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

//Inicializamos la vista que se muestra a null
$princ_view = null;

//Cargamos el idioma a utilizar en el controlador
$idioma = CargarIdioma2($RutaRelativaControlador);

//Variable que almacenara el identificador de la pagina actual, se establece su valor en el SWITCH
$PagID = "";

//Se comprueba que se quiere acceder a una pagina correcta del sistema
if (!isset($_GET['PagMenu']) || !in_array ( $_GET['PagMenu'] , $identificadores ))
	$PagID =  $identificadores['Home'];
else
	$PagID =  $_GET['PagMenu'];



//Se incluye la vista concreta que se desea mostrar, utilizando el array
// el array vistas se encuentra en el archivo ArchivoComun.php
include_once $vistas[$PagID];

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/Cabecera.php';
switch($PagID)
{
	case $identificadores['Home']:
		$princ_view = new Home();
		$princ_view->DisplayContent($idioma);
	break;
	
	case $identificadores['Miembros']:
	
		$miembros = array();
		//Consultamos datos
		try
		{
			$consulta = $_TABLAMIEMBRO->ListadoRegistros(" where Login IN (Select login from HACE_DE where ROL_nombre = '".$ROLMIEMBRO."')");
			//Con los datos los cargamos en el array
			for ($i = 0; $i < $consulta->num_rows ;$i++)
			{
				$miembros[] = $consulta->fetch_assoc();
			}
		}
		catch(Exception $e)
		{
			$errorRescrito = explode("=>",$e->getMessage());
			$_SESSION['error'] = 'CON ERR R'."=>".$errorRescrito[1];
		}


		//Inicializamos la vista Correspondiente
		$princ_view = new Miembros();
		//Se procede a la creacion de la vista
		$princ_view->DisplayContent($idioma,$miembros);
	break;
	case $identificadores['Prensa']:
		
		$noticias = array ();
		//Consultamos datos
		try
		{
			$consulta = $_TABLANOTICIAS->ListadoRegistros("");
			//Con los datos los cargamos en el array
			for ($i = 0; $i < $consulta->num_rows ;$i++)
			{
				$noticias[] = $consulta->fetch_assoc();
			}
		}
		catch(Exception $e)
		{
			$errorRescrito = explode("=>",$e->getMessage());
			$_SESSION['error'] = 'CON ERR NOTICIAS'."=>".$errorRescrito[1];
		}

		
		
		$pagCargar = 1;
		if (isset($_GET['NumPag']))
		{
			$pagCargar =$_GET['NumPag'];
			if ($pagCargar < 1)
				$pagCargar = 1;
			
			if($pagCargar > ceil(count($noticias)/$NumporPags))
				$pagCargar = ceil(count($noticias)/$NumporPags);
		}
		$princ_view = new Prensa();
		$princ_view->DisplayContent($idioma,$noticias,$pagCargar,ceil(count($noticias)/$NumporPags));
	break;
	case $identificadores['Transferencias']:
		$princ_view = new Transferencia();
		$princ_view->DisplayContent($idioma,$a,$b,$c);
	break;
	case $identificadores['Colaboraciones']:
		$princ_view = new Colaboraciones();
		$princ_view->DisplayContent($idioma,$e,$in,$g);
	break;
	case $identificadores['Login']:
		$princ_view = new Login();
		$princ_view->DisplayContent($idioma);
	break;
}

include_once$RutaRelativaControlador.'Comun/Pie.php';
?>