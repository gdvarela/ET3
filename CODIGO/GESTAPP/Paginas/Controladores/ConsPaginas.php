<?php
//se incluyen las funciones comunes
include_once '../../Comun/FuncionesComunes.php';
include_once '../../Comun/codigoSeguridad.php';

//Se incluye la clase Acceso y Funcionalidad (filtro)
include_once '../../Clases/Acceso.php';
include_once '../../Clases/Funcionalidad.php';

//Se incluye la clase de Vista y de datos
include_once '../Vistas/V_ConsPaginas.php';
include_once '../../Clases/Pagina.php';

//Debemos indicar en la variable correspondiente que estamos en un determinado apartado para 
//cuando se cree la vista y muestra el menu lateral correctamente
$_SESSION['PosicionMenuLateral'] = 'P';

//Cargamos el idioma a utilizar en el controlador
$idioma = CargarIdioma();

//La funcion siguiente se encarga de comprobar los permisos del usuario en sesion para la pagina que esta visitando, en caso de que no los tenga
// se redirigira a la pagina que se le pasa como parametro
Acceso::ConPermisos($_SESSION['login'],$_SERVER['SCRIPT_NAME'],'../../Principal/Controladores/Principal.php');

//se instancia la clase Consulta de Usuarios
$princ_view = new ConsPagina();
	
	
	//Array que posteriormente recibira la vista con los datos a mostrar
	$objects = array();
	try
	{
		$conexionBD = new BaseDatosControl();
	
		$sinCheck = 0;
		$cadenaInstruccionSQL = "";
		$primero = true;
		//Consultamos datos
		try
		{
			//Comprobamos si hay algun check seleccionado previamente para realizar el filtro de paginas
			// mostradas Construccion de la clausula Where correspondiente
			
			$consultaDeFuncionalidades = Funcionalidad::ListadoFuncionalidades("");
			for ($i = 0; $i < $consultaDeFuncionalidades->num_rows ;$i++)
			{
				$TuplaAcceso = $consultaDeFuncionalidades->fetch_assoc();
				$indiceasociativo = str_replace(" ","_","filter_".$TuplaAcceso['FUN_nombre']."");
				if (isset($_POST[$indiceasociativo]))
				{
					$sinCheck = 1;
					$FuncionalidadActual = $TuplaAcceso['FUN_nombre'];
					$consultaDePagconFunc =$conexionBD->OperacionGenericaBD("Select * from IMPLEMENTADA_EN where FUN_nombre='$FuncionalidadActual'",'ERROR OBT FILTRO');
					$num2 = $consultaDePagconFunc->num_rows;
					for ($i = 0; $i < $num2 ;$i++){
						$TuplaPagqueTieneFUNC  = $consultaDePagconFunc->fetch_assoc();
						if ($primero == true)
						{
							$cadenaInstruccionSQL = $cadenaInstruccionSQL. "Where PAG_nombre = '" .$TuplaPagqueTieneFUNC['PAG_nombre'] . "'";
							$primero = false;
						}
						else
						{
							$cadenaInstruccionSQL =$cadenaInstruccionSQL. " OR PAG_nombre = '"  .$TuplaPagqueTieneFUNC['PAG_nombre'] . "'";
						}
					}
					
				}
				
			}
		
			if ($cadenaInstruccionSQL == "")
			{
				if ($sinCheck == 0)
				{
					$cadenaInstruccionSQL = "";
				}
				else{
					$cadenaInstruccionSQL = "where PAG_nombre = NULL";
				}
			}
		}
		catch(Exception $e)
		{
			$errorRescrito = explode("=>",$e->getMessage());
			$_SESSION['error'] = 'ERROR OBT FILTRO'."=>".$errorRescrito[1];
			$cadenaInstruccionSQL = "";
		}
	}
	catch(Exception $e)
	{
		$_SESSION['error'] = 'ERR CONECT BD';
	}
	try{
		
		$consulta = Pagina::ListadoPaginas($cadenaInstruccionSQL);
	
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $consulta->num_rows;$i++)
		{
			$TuplaAcceso = $consulta->fetch_assoc();
			$us = Pagina::getPaginaBD($TuplaAcceso['PAG_nombre']);
			array_push($objects,$us);
			
		}
	}
	catch(Exception $e)
	{
		$errorRescrito = explode("=>",$e->getMessage());
		$_SESSION['error'] = 'CON ERR R'."=>".$errorRescrito[1];
	}
	
	

//se invoca el metodo Displayde Consulta de Usuarios con la lista de usuarios a mostrar
$princ_view->Display($idioma,$objects);
?>
