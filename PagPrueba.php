<html>
<head>
</head>
<body>
<?php
ini_set('display_errors', '1');
//se incluyen las funciones comunes
//require 'GESTAPP/Comun/FuncionesComunes.php';
//require 'GESTAPP/Comun/codigoSeguridad.php';

//Se incluye la clase Acceso
//require 'GESTAPP/Clases/Acceso.php';

//La funcion siguiente se encarga de comprobar los permisos del usuario en sesion para la pagina que esta visitando, en caso de que no los tenga
// se redirigira a la pagina que se le pasa como parametro
//Acceso::ConPermisos($_SESSION['login'],$_SERVER['SCRIPT_NAME'],'../../Principal/Controladores/Principal.php');

	//throw new Exception('División por cero.'); 
  echo 1 / ($_GET["V"]-1);
?>

<form name="crear_usuario" action="#" method="post">
    <input type="text" id="campo_dni" name="dni" value="">
  </form>
<script type="text/javascript">
    ((function(exportar) {

      //Herramientas
      function esNif(dni) {
        var numero, letr, letra, expresion_regular_dni = /^\d{8}[a-zA-Z]$/;

        if (expresion_regular_dni.test(dni) == true) {
          numero = dni.substr(0, dni.length - 1);
          letr = dni.substr(dni.length - 1, 1);
          numero = numero % 23;
          letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
          letra = letra.substring(numero, numero + 1);
          return letra === letr.toUpperCase();
        } else {
          return false;
        }
      }

      //Init
      function documentoListo() {
        //Validamos el dni
        document.getElementById('campo_dni').addEventListener('input', function validarCampoDNI() {
          var todoCorrecto = true;
          todoCorrecto = esNif(this.value);
          //más opciones
          if (todoCorrecto) {
            //otro caso a comprobar
            //todoCorrecto = miFuncion(this.value);
          }
          this.setCustomValidity(todoCorrecto ? '' : 'DNI incorrecto');
        });
      }

      //Le decimos al documento que cuando esté listo invoque nuestra función de inicio
      document.addEventListener('DOMContentLoaded', documentoListo);
    })(window));
  </script>
</body>

</html>