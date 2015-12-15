<?php

//En este caso el controlador publico Elimina un posible sesion iniciada
session_start();

//se incluyen las funciones comunes
include_once 'Comun/FuncionesComunes.php';

//Se incluye la clase Acceso y la clase encargada de la conexion con la BD
include_once 'Clases/BaseDatosControl.php';
include_once 'Clases/Acceso.php';

//recoje la variable establecida en las paginas que se integran
global $miPaginaPorDefecto;

//La funcion siguiente se encarga de comprobar los permisos del usuario en sesion para la pagina que esta visitando, en caso de que no los tenga
// se redirigira a la pagina que se le pasa como parametro, se diferencian dos casos, en caso de que no se haya especificado pagina por defecto redirige al login de GESTAPP
// en otro caso redirige a la pagina de error especificada en $miPaginaPorDefecto
if ($miPaginaPorDefecto == "")
{
	Acceso::ConPermisos($_SESSION['login'],$_SERVER['REQUEST_URI'],'GESTAPP/Principal/Controladores/Principal.php');
}
else
{
	Acceso::ConPermisos($_SESSION['login'],$_SERVER['REQUEST_URI'],$miPaginaPorDefecto);
}

?>