<?php

//=====================================================================================================================
// Fichero :ControladorWEB.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 18/12/2015
// Script generico que controla la carga de paginas en una sesion publica (Usuario no logueado)
//=====================================================================================================================

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

if (!isset($_COOKIE["TEST"]))
{
	//SESSION START NO FUNCIONA CORRECTAMENTE CUANDO SE TRATA DE AUTOMATIZAR LLAMADAS SEGUIDAS DE POST PARA LA COMPROBACION DE ERRORES AUTOMATICA
	// Con cada llamada post del modulo errores se envia una cookie TEST para indicar que se esta cargando la pagina para comprobacion de errores y que
	// no realize un session start
	session_start();
	
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

//Se procede a la creacion de la vista en funcion del PagID recibido por GET
include_once$RutaRelativaControlador.'Comun/Cabecera.php'; //Se incluye la cabecera publica de las vistas
switch($PagID)
{
	//Se cargara y mostrar la pagina correspondiente en cada caso
	case $identificadores['Home']:
		$princ_view = new Home();
		$princ_view->DisplayContent($idioma);
	break;
	
	case $identificadores['Miembros']:
		$miembros = array();
		//Consultamos datos
		try
		{
			//Se buscan los mienbros en la base de datos
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
		
		//Para la vista de noticias la llamada GET incluye el numero de Pagina que se quiere mostrar
		// ()Las noticias se muestran paginadas)
		$pagCargar = 1;
		if (isset($_GET['NumPag']))
		{
			$pagCargar =$_GET['NumPag'];
			if ($pagCargar < 1)
				$pagCargar = 1;
			
			if($pagCargar > ceil(count($noticias)/$NumporPags))
				$pagCargar = ceil(count($noticias)/$NumporPags);
		}
		//Inicializamos la vista Correspondiente
		$princ_view = new Prensa();
		//Se procede a la creacion de la vista
		$princ_view->DisplayContent($idioma,$noticias,$pagCargar,ceil(count($noticias)/$NumporPags));
	break;
	
	case $identificadores['Transferencias']:
		//Inicializamos la vista Correspondiente
		$princ_view = new Transferencia();
		//Se procede a la creacion de la vista
		$princ_view->DisplayContent($idioma,$a,$b,$c); //a b c vienen rellnados cuando se incluye la vista correspondiente
	break;
	
	case $identificadores['Colaboraciones']:
		//Inicializamos la vista Correspondiente
		$princ_view = new Colaboraciones();
		//Se procede a la creacion de la vista
		$princ_view->DisplayContent($idioma,$e,$in,$g); //e in g vienen rellnados cuando se incluye la vista correspondiente
	break;
	
	case $identificadores['Publicaciones']:
		//Inicializamos la vista Correspondiente
		$princ_view = new Publicaciones();
		//Se procede a la creacion de la vista
		$princ_view->DisplayContent($idioma,$a,$b,$c); //e in g vienen rellnados cuando se incluye la vista correspondiente
	break;
	case $identificadores['Actividades']:
		//Inicializamos la vista Correspondiente
		$princ_view = new Actividades();
		//Se procede a la creacion de la vista
		$princ_view->DisplayContent($idioma,$a,$b,$c); //e in g vienen rellnados cuando se incluye la vista correspondiente
	break;
	
	case $identificadores['Docencia']:
		//Inicializamos la vista Correspondiente
		$princ_view = new Docencia();
		//Se procede a la creacion de la vista
		$princ_view->DisplayContent($idioma,$Dc,$materias);
	break;
	
	case $identificadores['Login']:
	//Inicializamos la vista Correspondiente
		$princ_view = new Login();
		//Se procede a la creacion de la vista
		$princ_view->DisplayContent($idioma);
	break;
}

//Se incluye el pie publico
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>