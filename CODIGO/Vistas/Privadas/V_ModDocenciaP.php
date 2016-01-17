<?php

//=====================================================================================================================
// Fichero :V_ModX.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 18/12/2015
// Clase que contiene una de las vistas del sistema En este caso, sera el formulario generado para la modificacion de
// objetos de la BD
//=====================================================================================================================

Class ModDocenciaPrivada
{

function __construct()
{
}

function DisplayContent($idioma,$MOD)
{
	global $NumporPags;
	global $procesadores;
	global $formularios;
	global $identificadoresPrivados;
	global $controladores;
	global $RutaRelativaControlador;
	//Aqui va el cuerpo principal de la pagina
?>
		<section id="content">
	<div class="container">
		<form id="borrarActual" action="<?php echo $procesadores[$identificadoresPrivados["DDocencia"]]?>" method="POST">
		<?php
			//En funcion del tipo de campo que recibe por post se le "dice" al formulario el tipo de objeto que esta tratando (Borrado)
			$campoClave = "";
			$campoClave2 = "";
			switch ($_POST["TIPO"])
			{
				case "D":
				$campoClave = "IDMateria@Login";
				echo "<input type='hidden' name='TIPO' value='D'/>";
				break;
				case "M":
				$campoClave = "IDMateria";
				echo "<input type='hidden' name='TIPO' value='M'/>";
				break;
			}
			if (strpos($campoClave,"@") !== FALSE)
			{
				echo '<input type="hidden" name="BORRAR" value="'.explode("@",$campoClave)[0].'=>'.$MOD[explode("@",$campoClave)[0]].';'.explode("@",$campoClave)[1].'=>'.$MOD[explode("@",$campoClave)[1]].'" />';
			}
			else
				echo '<input type="hidden" name="BORRAR" value="'.$campoClave.'=>'.$MOD[$campoClave].'" />';
		?>

						
			</form>
			<div class="row">
				<div class="col-md-12">
					<form role="form" action="<?php echo $procesadores[$identificadoresPrivados["MDocencia"]]?>" method="POST">
					<input type="hidden" name="TIPO" value="<?php echo $_POST["TIPO"]?>"/>
					<?php 
					//En funcion del tipo de campo que recibe por post se le "dice" al formulario el tipo de objeto que esta tratando (Mismo proceso que antes pero para el formulario de modificacion)
						if (strpos($campoClave,"@") !== FALSE)
							echo '<input type="hidden" name="ClaveAnt" value="'.explode("@",$campoClave)[0].'=>'.$MOD[explode("@",$campoClave)[0]].';'.explode("@",$campoClave)[1].'=>'.$MOD[explode("@",$campoClave)[1]].'" />';
						else
							echo '<input type="hidden" name="ClaveAnt" value="'.$campoClave.'=>'.$MOD[$campoClave].'" />';
					?>
					<?php
					$NombreFormulario = $identificadoresPrivados["MDocencia"].$_POST["TIPO"];
					// En $NombreFormulario  se pone el nombre del formulario correspondiente que se tenga que mostrar y crea dinamicamente los campos necesarios
					// en funcion de lo indicado en lo que pongais en Archivo Comun. No es que sea lo mas eficiente del mundo pero almenos
					// facilita el trabajo en grupo permitiendo modificaciones rapidamente y centralizadas a un único fichero
					
					 //Se accede a la variable global $generadorMOD que contiene la direccion del fichero en cuestion.
					 // Se hace asi por si en futuras iteraciones se decide cambiar de lugar, no tener que ir vista por vista cambiandolo, basta
					 // con cambiar la variable y las vistas siempre acceder al fichero.
					global $generadorMod;
					include $generadorMod;
					?>
					
					<button type="submit" class="btn btn-default"><?php echo $idioma["Aceptar"]?></button>
					<button class="btn btn-default" onClick="window.history.back()"><?php echo $idioma["Cancelar"]?></button>
					
					</form>
					<?php echo '<button class="btn btn-default pull-right" ><img class="img-responsive center-block" onClick="document.getElementById(\'borrarActual\').submit();"  src="'.$RutaRelativaControlador.'img/borrar.png" alt=""></button>'; ?>
				</div>
			</div>
	</div>
	</section>
<?php
	

}

}
	$Mod = $_POST["MOD"];
	$doc = "";
		//Consultamos datos
		try
	{
		//Por POST recibimos el tipo de objeto que es, y en funcion de este valor usamos la talba correspondiente 
		// para para la obtencion del registro en concreto
		switch ($_POST["TIPO"])
		{
			case "D":
			$consulta = $_TABLADOCENCIA->ListadoRegistros(" where IDMateria = '".explode("|",$Mod)[0]."' and Login = '".explode("|",$Mod)[1]."'");
			$doc = $consulta->fetch_assoc();
			break;
			case "M":
			$consulta = $_TABLAMATERIAS->ListadoRegistros(" where IDMateria = '".$Mod."'");
			$doc = $consulta->fetch_assoc();
			break;
		}
		
	}
	catch(Exception $e)
	{
		//En caso de test no se muestra un mensaje al usuario, sino que se deja salir la excepcion para que la detecte el testeo de errores
			if (!isset($_COOKIE["TEST"]))
			{
				$errorRescrito = explode("=>",$e->getMessage());
				$_SESSION['error'] = 'OBTENCION D'."=>".$errorRescrito[1];
				
			}
			else
			{
				throw new Exception($e->getMessage());
			}
		header("Location: ".$controladores[$identificadoresPrivados["Docencia"]]);
	}

		
		
//Inicializamos la vista Correspondiente
$princ_view = new ModDocenciaPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma,$doc);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
