<?php
//------------------ CONTROL ACCESO

//se incluyen las funciones comunes
include_once '../../Comun/FuncionesComunes.php';
include_once '../../Comun/codigoSeguridad.php';

//Se incluye la clase Acceso
include '../../Clases/Acceso.php';

//Se incluye la clase Vista y datos
include '../../Clases/Rol.php';
include '../Vistas/V_ModRoles.php';

//Se incluye las clases ya que necesitaremos informacion sobre los roles y paginas
include '../../Clases/Usuario.php';
include '../../Clases/Funcionalidad.php';

//Debemos indicar en la variable correspondiente que estamos en un determinado apartado para 
//cuando se cree la vista y muestra el menu lateral correctamente
$_SESSION['PosicionMenuLateral'] = 'R';

//Cargamos el idioma a utilizar en el controlador
$idioma = CargarIdioma();

//La funcion siguiente se encarga de comprobar los permisos del usuario en sesion para la pagina que esta visitando, en caso de que no los tenga
// se redirigira a la pagina que se le pasa como parametro
Acceso::ConPermisos($_SESSION['login'],$_SERVER['SCRIPT_NAME'],'../../Principal/Controladores/Principal.php');

//--------------------- RECUPERACION DATOS PREVIOS

	//Se comprueba si se a accedido al controlador tras un error en la modificacion,
	// en caso afirmativo se cargan los datos para la vista que ya habia introducido el usuario
	$datosMod = new Rol();
	$claveMod = "";
	
	//En caso contrario se debe cargar la vista con la informacion del registro a modificar
	try
	{
		//Se necesita recorrer todos los datos hasta encontrar
		// el que coincida con el NAME del boton pulsado.
		$datos = Rol::ListadoRoles("");
		$numero = $datos->num_rows;
		for ($i = 0; $i < $numero; $i++)
		{
			$TuplaAcceso = $datos->fetch_assoc();
			$indiceasociativo = str_replace(" ","_","".$TuplaAcceso['ROL_nombre']."");
			if (isset($_POST[$indiceasociativo]))
			{
				$datosMod = Rol::getRolBD($TuplaAcceso['ROL_nombre']);
				$claveMod = $TuplaAcceso['ROL_nombre'];
				$_SESSION['claveModR'] = $TuplaAcceso['ROL_nombre'];
				$_SESSION['recargaRolMod'] = $datosMod->DatosParaSesion();
			}
		}
		
	}
	catch(Exception $e)
	{
		$errorRescrito = explode("=>",$e->getMessage());
		$_SESSION['error'] = 'CON ERR SR'."=>".$errorRescrito[1];
		header("Location: ConsRoles.php");
		exit;
	}
		
		
	if($claveMod == "")
	{
		//Si esta set la variable recarga significa que hubo un error -> recarga de datos
		$datosMod->CargarDatosSesion($_SESSION['recargaRolMod']);
		$claveMod = $_SESSION['claveModR'];
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
$princ_view = new ModRol();
//se invoca el metodo Display de Modificacion de Usuarios
$princ_view->Display($idioma,$datosMod,$claveMod);
?>
