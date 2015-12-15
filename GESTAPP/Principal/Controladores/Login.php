<?php
//se incluyen las funciones comunes
include '../../Comun/FuncionesComunes.php';

//Conectamos con la Sesion y Variable a no logeado
session_start();

//Por defecto se establece variable de cambio de css con 1
if (!isset($_SESSION['EstiloEscogido']))
{
	$_SESSION['EstiloEscogido'] = "1";
}

$idioma = CargarIdioma();

//Se incluye la clase Vista de Login
include '../Vistas/V_Login.php';

//se instancia la clase vista de Login
$login_view = new Login();

//se invoca el metodo Display de Login
$login_view->Display($idioma);
?>
