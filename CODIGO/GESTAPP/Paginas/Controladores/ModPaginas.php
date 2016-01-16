<?php
//------------------ CONTROL ACCESO

//se incluyen las funciones comunes
include_once '../../Comun/FuncionesComunes.php';
include_once '../../Comun/codigoSeguridad.php';

//Se incluye la clase Acceso
include '../../Clases/Acceso.php';

//Se incluye la clase Vista y datos
include '../../Clases/Pagina.php';
include '../Vistas/V_ModPaginas.php';

//Se incluye las clases ya que necesitaremos informacion sobre los roles y paginas
include '../../Clases/Usuario.php';
include '../../Clases/Funcionalidad.php';

//Debemos indicar en la variable correspondiente que estamos en un determinado apartado para 
//cuando se cree la vista y muestra el menu lateral correctamente
$_SESSION['PosicionMenuLateral'] = 'P';

//Cargamos el idioma a utilizar en el controlador
$idioma = CargarIdioma();

//La funcion siguiente se encarga de comprobar los permisos del usuario en sesion para la pagina que esta visitando, en caso de que no los tenga
// se redirigira a la pagina que se le pasa como parametro
Acceso::ConPermisos($_SESSION['login'],$_SERVER['SCRIPT_NAME'],'../../Principal/Controladores/Principal.php');

//--------------------- RECUPERACION DATOS PREVIOS

	//Se comprueba si se a accedido al controlador tras un error en la modificacion,
	// en caso afirmativo se cargan los datos para la vista que ya habia introducido el usuario
	$datosMod = new Pagina();
	$claveMod = "";
	$ubiMod = "";
	
	
	try
	{
		//Se necesita recorrer todos los datos hasta encontrar
		// el que coincida con el NAME del boton pulsado.
		$datos = Pagina::ListadoPaginas("");
		$numero = $datos->num_rows;
		for ($i = 0; $i < $numero; $i++)
		{
			$TuplaAcceso = $datos->fetch_assoc();
			$indiceasociativo = str_replace(" ","_","".$TuplaAcceso['PAG_nombre']."");
			if (isset($_POST[$indiceasociativo]))
			{
				$datosMod = Pagina::getPaginaBD($TuplaAcceso['PAG_nombre']);
				$claveMod = $TuplaAcceso['PAG_nombre'];
				$ubiMod = $TuplaAcceso['PAG_ubicacion'];
				$_SESSION['claveModP'] = $TuplaAcceso['PAG_nombre'];
				$_SESSION['ubiMod'] = $TuplaAcceso['PAG_ubicacion'];
				$_SESSION['recargaPaginaMod'] = $datosMod->DatosParaSesion();
			}
		}
		
	}
	catch(Exception $e)
	{
		$errorRescrito = explode("=>",$e->getMessage());
		$_SESSION['error'] = 'CON ERR SP'."=>".$errorRescrito[1];
		header("Location: ConsPaginas.php");
		exit;
	}
	if ($claveMod =="")
	{
		$datosMod->CargarDatosSesion($_SESSION['recargaPaginaMod']);
		$claveMod = $_SESSION['claveModP'];
		$ubiMod = $_SESSION['ubiMod'];
	}
	
	

//-------------------------- CARGA DE DATOS RELACIONADOS CON La Modificacion
	
	//Ya que al dar de alta un usuario podemos establecerle un rol, necesitaremos la lista de roles
	// y mostrala en la vista
	$usuariosSistema = array();
	$funcionalidadesSistema = array();
	try
	{
		//Se Consultan los roles del sistema
		$consulta = Usuario::ListadoUsuarios("");
		$numF = $consulta->num_rows;
		for ($i2 = 0; $i2 < $numF ;$i2++){
			$TuplaF  = $consulta->fetch_assoc();
			 array_push($usuariosSistema , $TuplaF['Login']);
		}
		
		//Se Consultan las Paginas del sistema
		$consulta = Funcionalidad::ListadoFuncionalidades("");
		$numF = $consulta->num_rows;
		for ($i2 = 0; $i2 < $numF ;$i2++){
			$TuplaF  = $consulta->fetch_assoc();
			 array_push($funcionalidadesSistema , $TuplaF['FUN_nombre']);
		}
		
	}
	catch (Exception $e)
	{
		$_SESSION['error'] = $e->getMessage();
	}
	
	//ESTA VARIABLE ES TEMPORAR, AL TERMINAR EL PROCESO DE ALTA SE BORRARAN SUS DATOS
	// SE UTILIZA PARA SABER LOS ROLES ACTUALES EN EL SISTEMA DURANTE TODO EL PROCESO DE ALTA DE
	// USUARIO PARA NO REALIZAR VARIAS VECES LA MISMA CONSULTA A LA BD MIENTRAS SE CAMBIA ENTRE FORMULARIOS
	$_SESSION['usuariosSistema'] = $usuariosSistema;
	$_SESSION['funcionalidadesSistema'] = $funcionalidadesSistema;
	
//-------------------------- Carga de la vista y su mostrado
	
//se instancia la clase Modificacion de Usuarios
$princ_view = new ModPagina();
//se invoca el metodo Display de Modificacion de Usuarios
$princ_view->Display($idioma,$datosMod,$claveMod,$ubiMod);
?>
