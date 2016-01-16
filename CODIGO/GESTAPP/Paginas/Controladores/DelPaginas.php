<?php

include ("../../Comun/FuncionesComunes.php");
include("../../Comun/codigoSeguridad.php");

//Incluimos la clase de datos
include ("../../Clases/Acceso.php");

//Incluimos la clase de datos
include ("../../Clases/Pagina.php");

//Cargamos el idioma a utilizar en el controlador
$idioma = CargarIdioma();

//La funcion siguiente se encarga de comprobar los permisos del usuario en sesion para la pagina que esta visitando, en caso de que no los tenga
// se redirigira a la pagina que se le pasa como parametro
Acceso::ConPermisos($_SESSION['login'],$_SERVER['SCRIPT_NAME'],'../../Principal/Controladores/Principal.php');


	//Variable "boolean" que se usara para comprobar si se han seleccionado usuarios para borrar
	$alguno = 0;
	try {
		//Listado Usuarios
		$consulta = Pagina::ListadoPaginas("");
		$num = $consulta->num_rows;
	}
	catch(Exception $e)
	{
		$errorRescrito = explode("=>",$e->getMessage());
		$_SESSION['error'] = 'ELI ERR P'."=>".$errorRescrito[1];
		header("Location: ConsPaginas.php");
		exit;
	}
	for ($i = 0; $i < $num ;$i++)
	{
		$TuplaAcceso = $consulta->fetch_assoc();
		
		//Comprobamos para cada dato si se ha marcado su checkBox del formulario
		// para eliminar
		$indiceasociativo = str_replace(" ","_","ckbx_".$TuplaAcceso['PAG_nombre']."");
		if (isset($_POST[$indiceasociativo]))
		{
			//Llegados a este punto significa que almenos algun checkbox a sido marcado
			$alguno =1;
			
			try
			{
				// Se elimina el dato en cuestion
				Pagina::EliminarPaginaBD($TuplaAcceso['PAG_nombre']);
				unlink('../..'.$TuplaAcceso['PAG_ubicacion']);
			}
			catch(Exception $e)
			{
				$_SESSION['error'] = $e->getMessage();
			}
		}
		
	}
	//Comprobacion de la variable en cuestion y establecimiento de error/confirmacion
	if ($alguno == 0)
	{
		$_SESSION['error'] = 'ELI NO SP';
	}
	else
	{
		$_SESSION['ok'] = 'ELI P OK';
	}
	header("Location: ConsPaginas.php");
	


// 

?>