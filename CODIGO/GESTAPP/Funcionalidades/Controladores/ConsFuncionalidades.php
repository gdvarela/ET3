<?php
//se incluyen las funciones comunes
include_once '../../Comun/FuncionesComunes.php';
include_once '../../Comun/codigoSeguridad.php';

//Se incluye la clase Acceso
include_once '../../Clases/Acceso.php';

//Se incluye la clase de Vista y de datos
include_once '../Vistas/V_ConsFuncionalidades.php';
include_once '../../Clases/Funcionalidad.php';

//Debemos indicar en la variable correspondiente que estamos en un determinado apartado para 
//cuando se cree la vista y muestra el menu lateral correctamente
$_SESSION['PosicionMenuLateral'] = 'F';

//Cargamos el idioma a utilizar en el controlador
$idioma = CargarIdioma();

//La funcion siguiente se encarga de comprobar los permisos del usuario en sesion para la pagina que esta visitando, en caso de que no los tenga
// se redirigira a la pagina que se le pasa como parametro
Acceso::ConPermisos($_SESSION['login'],$_SERVER['SCRIPT_NAME'],'../../Principal/Controladores/Principal.php');

//se instancia la clase Consulta de Usuarios
$princ_view = new ConsFuncionalidad();
	
	
	//Array que posteriormente recibira la vista con los datos a mostrar
	$objects = array();
	
	
	//Consultamos datos
	try
	{
		$consulta = Funcionalidad::ListadoFuncionalidades("");
		$num = $consulta->num_rows;
	
	
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $num ;$i++)
		{
			$TuplaAcceso = $consulta->fetch_assoc();
			try
			{
				$us = Funcionalidad::getFuncionalidadBD($TuplaAcceso['FUN_nombre']);
				array_push($objects,$us);
				
			}
			catch(Exception $e)
			{
				$_SESSION['error'] = $e->getMessage();
			}
			
		}
	}
	catch(Exception $e)
	{
		$errorRescrito = explode("=>",$e->getMessage());
		$_SESSION['error'] = 'CON ERR F'."=>".$errorRescrito[1];
	}
	

//se invoca el metodo Displayde Consulta de Usuarios con la lista de usuarios a mostrar
$princ_view->Display($idioma,$objects);
?>
