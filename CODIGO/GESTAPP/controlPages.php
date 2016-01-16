<?php




//se incluyen las funciones comunes
include_once 'Comun/FuncionesComunes.php';

//Se incluye la clase Acceso y la clase encargada de la conexion con la BD
include_once 'Clases/BaseDatosControl.php';
include_once 'Clases/Acceso.php';


//En el modulo de errores de GESTAP la comprobacion de errores automatica se hace enviando la cookie TEST para que no haga session start
// ya que no funciona correctamente con la llamada automatica a las paginas.
// EDIT: Funcionar funciona correctamente, el problema esta en que en la llamada automatica se envia una cookie 'PHPSESSID=se81a37b2tqgqne1lg840ljat1' (Otro valor cualquiera que tenga en ese momento)
// que trata de indentificar la sesion actual durante la realizacion de los tests (Esto es para que se mire el usuario en sesion durante la realizacion de los test para control de permisos)
// El problema esta en que si se incluye esa cookie session_start() no funciona (Se queda bloqueado y es necesario reiniciar apache a veces). Y si la cookie no se incluye de nada
// sirve session_start() si va a iniciar una sesion independiente donde $_SESSION['login'] no esta instanciado. Ante esta situacion, se ha decidido enviar una cookie TEST adicional para 
// asi en las paginas de la WEB no se realize session_start() ni control de permisos.
if (!isset($_COOKIE["TEST"]))
{
	session_start();
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
}
?>