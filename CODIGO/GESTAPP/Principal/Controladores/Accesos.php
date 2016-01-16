<?php
//se incluyen las funciones comunes
include_once '../../Comun/FuncionesComunes.php';
include_once '../../Comun/codigoSeguridad.php';

//Se incluye la clase Acceso
include_once '../../Clases/Acceso.php';

//Se incluye la clase de Vista
include_once '../Vistas/V_Acceso.php';

//Debemos indicar en la variable correspondiente que estamos en un determinado apartado para 
//cuando se cree la vista y muestra el menu lateral correctamente
$_SESSION['PosicionMenuLateral'] = 'A';

//Cargamos el idioma a utilizar en el controlador
$idioma = CargarIdioma();

//La funcion siguiente se encarga de comprobar los permisos del usuario en sesion para la pagina que esta visitando, en caso de que no los tenga
// se redirigira a la pagina que se le pasa como parametro
Acceso::ConPermisos($_SESSION['login'],$_SERVER['SCRIPT_NAME'],'../../Principal/Controladores/Principal.php');

	//Array que posteriormente recibira la vista con los datos a mostrar
	$objects = array();
	
	
	//Consultamos datos
	try
	{
		$consulta = Acceso::getRegistros("order by fecha_visita desc");
	}
	catch(Exception $e)
	{
		$_SESSION['error'] = $e->getMessage();
		$num = 0;
	}
	
	

//se instancia la clase vista de Login
$acc_view = new ConsAcceso();
//se invoca el metodo Display de Login
$acc_view->Display($idioma,$consulta);
?>
