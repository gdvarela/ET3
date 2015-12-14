<?php
//se incluyen las funciones comunes
include_once '../../Comun/FuncionesComunes.php';
include_once '../../Comun/codigoSeguridad.php';

//Se incluye la clase Acceso
include_once '../../Clases/Acceso.php';

//Se incluye la clase de Vista
include_once '../Vistas/V_Principal.php';

//Debemos indicar en la variable correspondiente que estamos en un determinado apartado para 
//cuando se cree la vista y muestra el menu lateral correctamente
$_SESSION['PosicionMenuLateral'] = 'B';

//Cargamos el idioma a utilizar en el controlador
$idioma = CargarIdioma();

Acceso::ConPermisos($_SESSION['login'],$_SERVER['SCRIPT_NAME'],'../../Principal/Controladores/Login.php');

//Teniendo permisos a la pagina, se procede a registrar el accceso a la misma por parte del usuario logeado
//Acceso::RegistraAcceso($_SESSION['login'],$_SERVER['SCRIPT_NAME']);


//se instancia la clase Consulta de Usuarios
$princ_view = new Principal();
//se invoca el metodo Display de Clase de Principal
$princ_view->Display($idioma);
?>
