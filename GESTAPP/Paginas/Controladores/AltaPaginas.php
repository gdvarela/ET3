<?php
//------------------ CONTROL ACCESO

//se incluyen las funciones comunes
include_once '../../Comun/FuncionesComunes.php';
include_once '../../Comun/codigoSeguridad.php';

//Se incluye la clase Acceso
include '../../Clases/Acceso.php';

//Se incluye la clase Alta Paginas y Pagina
include '../../Clases/Pagina.php';
include '../Vistas/V_AltaPaginas.php';

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

	//Se crea una variable que se usara como contenedor para los datos, para que, en caso de error
	// y que se necesite recargar datos previos introducidos por el usuario, este objeto
	// almacenara los datos que introduciera previamente el usuario para cargarlos automaticamente en
	// la vista sin que el usuario tenga que introducirlos otra vez
	$datosPrevios = new Pagina();
	if (isset($_SESSION['recargaAP']))
	{
		//Si esta set la variable recarga significa que hubo un error -> recarga de datos
		$datosPrevios->CargarDatosSesion($_SESSION['recargaPaginaAlta']);
		
	}

//-------------------------- CARGA DE DATOS RELACIONADOS CON EL ALTA DE UN USUARIO
	
	
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




//se instancia la clase vista de Login
$princ_view = new AltaPagina();
//se invoca el metodo Display de Login
$princ_view->Display($idioma,$datosPrevios);
?>
