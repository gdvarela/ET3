<?php
//=================================================================================
//Fichero:FuncionesComunes.php
//Creado por: FranciscoRojasRodriguez
//Fecha: 5/10/2015
//Conjunto de funciones comunes para el sitio Web GestAPP
//=================================================================================

//Establece el valor de mostrar errores del servido php
// Cambiar a 1 para la fase de pruebas o debug
ini_set('display_errors', '1');

//---------------------------------------------------------------------------------
//Funcion: CargarIdioma()
//Creado por: FranciscoRojasRodriguez
//Fecha: 14/10/2015
//Comprobando el valor de la variable en sesion se retorna el array de idioma
// correspondiente
//---------------------------------------------------------------------------------
function CargarIdioma()
{

	//asignamos idioma español como defecto
	if (!(isset($_SESSION['idioma'])))
	$_SESSION['idioma'] = 'ENGLISH';

	switch ($_SESSION['idioma'])
	{
	case 'ESPANHOL':
		include '../../Modelos/ESPANHOL.php';
		break;
	case 'GALEGO':
		include '../../Modelos/GALEGO.php';
		break;
	case 'ENGLISH':
		include '../../Modelos/ENGLISH.php';
		break;
	DEFAULT:
		break;
	}
	return $Idioma;
}


//---------------------------------------------------------------------------------
//Funcion: recoge()
//Creado por: FranciscoRojasRodriguez
//Fecha: 12/10/2015
//Funcion que recoge la variable $var enviadas desde otro formulario, asegurandose
// de que no lleban espacios o caracteres raros
//---------------------------------------------------------------------------------
function recoge($var) 
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}

//---------------------------------------------------------------------------------
//Funcion: fecha_act() , fecha_hora_act()
//Creado por: FranciscoRojasRodriguez
//Fecha: 12/10/2015
//Funciones que devuelven fecha o hora actual del sistema.
//---------------------------------------------------------------------------------
function fecha_act() 
{
    $hoy = getdate();
    return $hoy['year'] . '-'. $hoy['mon'] . '-' . $hoy['mday'];
}
function fecha_hora_act() 
{
    $hoy = getdate();
    return $hoy['year'] . '-'. $hoy['mon'] . '-' . $hoy['mday']. '-' . $hoy['hours'] . '-' . $hoy['minutes'] . '-' . $hoy['seconds'] ;
}






?>
