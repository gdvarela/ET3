<html>
<head>
</head>
<body>
<?php
ini_set('display_errors', '1');
//se incluyen las funciones comunes
require 'GESTAPP/Comun/FuncionesComunes.php';
//require 'GESTAPP/Comun/codigoSeguridad.php';

//Se incluye la clase Acceso
require 'GESTAPP/Clases/Acceso.php';

//La funcion siguiente se encarga de comprobar los permisos del usuario en sesion para la pagina que esta visitando, en caso de que no los tenga
// se redirigira a la pagina que se le pasa como parametro
//Acceso::ConPermisos($_SESSION['login'],$_SERVER['SCRIPT_NAME'],'../../Principal/Controladores/Principal.php');

	//throw new Exception('División por cero.'); 
  echo 1 / ($_POST["V"]-1);
?>
</body>
</html>