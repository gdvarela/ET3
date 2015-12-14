<?php
//Esta variable contiene la ruta relativa para llegar
// desde la ubicacion del controlador general a la raiz (SitioWEB) de la carpeta
// de la aplicacion
// Ej: /SitioWEB/carpeta2/carpeta3/controlador.php la ruta relativa correspondiente será
// ../../
ini_set('display_errors', '1');
//Variable que almacena el nombre de la carpeta Raiz del directorio
$Raiz = "Sitio Web";
	
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

$RutaRelativaControlador = getRuta();
//Ruta Relativa del ArchivoComun
include_once $RutaRelativaControlador.'Comun/ArchivoComun.php';
//Inicializamos la vista que se muestra a null
$princ_view = null;

//Cargamos el idioma a utilizar en el controlador
$idioma = CargarIdioma($RutaRelativaControlador);

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
include $RutaRelativaControlador.'Comun/Cabecera.php';
switch($PagID)
{
	case $identificadores['Home']:
		$princ_view = new Home();
		$princ_view->DisplayContent($idioma);
	break;
	
	case $identificadores['Miembros']:
	
		include_once $RutaRelativaControlador."Clases/Miembro.php";
		
		
		$puestos = array ("puesto1" => 1,"puesto2" => 1,"puesto3"=> 2);
		$miembros = array (new Miembro(),new Miembro(),new Miembro(),new Miembro(),new Miembro());
		$miembros[0]->puesto = "puesto1";
		$miembros[1]->puesto = "puesto2";
		$miembros[2]->puesto = "puesto3";
		$miembros[3]->puesto = "puesto3";
		
		
		$princ_view = new Miembros();
		$princ_view->DisplayContent($idioma,$miembros,$puestos);
	break;
	case $identificadores['Prensa']:
		
		include_once $RutaRelativaControlador."Clases/Prensa.php";
		$noticias = array (new Noticia(" 1"),new Noticia(" 2"),new Noticia(" 3"),new Noticia(" 4"),new Noticia(" 5"),new Noticia(" 6"),new Noticia(" 7"),new Noticia(" 8"),new Noticia(" 9"));
		
		$pagCargar = 1;
		if (isset($_GET['PagMenu']))
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
	case $identificadores['Transferencia']:
		$princ_view = new Transferencia();
		$princ_view->DisplayContent($idioma);
	break;
	case $identificadores['Colaboraciones']:
		$princ_view = new Colaboraciones();
		$princ_view->DisplayContent($idioma);
	break;
}

include $RutaRelativaControlador.'Comun/Pie.php';
?>