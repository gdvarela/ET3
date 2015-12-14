<?php
//Establece el valor de mostrar errores del servido php
// Cambiar a 1 para la fase de pruebas o debug
ini_set('display_errors', '1');

//Numero de elementos por pagina en caso de paginacion
$NumporPags = 3;

function CargarIdioma($Ruta)
{
	//asignamos idioma español como defecto
	if (!(isset($_SESSION['idioma'])))
	$_SESSION['idioma'] = 'ESPANHOL';

	switch ($_SESSION['idioma'])
	{
	case 'ESPANHOL':
		include $Ruta.'Modelos/ESPANHOL.php';
		break;
	case 'GALEGO':
		include $Ruta.'Modelos/GALEGO.php';
		break;
	case 'ENGLISH':
		include $Ruta.'Modelos/ENGLISH.php';
		break;
	DEFAULT:
		break;
	}
	return $Idioma;
}

//Array que contiene los indentificadores de las paginas de la aplicación
$identificadores = array(

'Home' => 'H',
'Miembros' => 'M',
'Prensa'=> 'P',
'Transferencia'=> 'T',
'Colaboraciones'=> 'C'

);

//Array que contiene los indentificadores de las paginas que se mostraran la barra del menu principal
$MenuPrincipal = array(
'Home' => $identificadores['Home'],
'Miembros' => $identificadores['Miembros'],
'Prensa'=> $identificadores['Prensa'],
'Transferencia'=> $identificadores['Transferencia'],
'Colaboraciones'=> $identificadores['Colaboraciones']
);

//Rutas de las Distintas Vistas del sistema
$vistas = array(
	$identificadores['Home'] => $RutaRelativaControlador.'Vistas/Publicas/V_Home.php',
	$identificadores['Miembros'] => $RutaRelativaControlador.'Vistas/Publicas/V_Miembros.php',
	$identificadores['Prensa'] => $RutaRelativaControlador.'Vistas/Publicas/V_Prensa.php',
	$identificadores['Transferencia'] => $RutaRelativaControlador.'Vistas/Publicas/V_Transferencia.php',
	$identificadores['Colaboraciones'] => $RutaRelativaControlador.'Vistas/Publicas/V_Colaboraciones.php'
);
   

?>

