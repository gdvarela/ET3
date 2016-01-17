<?php

//=====================================================================================================================
// Fichero :V_ModX.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 18/12/2015
// Clase que contiene una de las vistas del sistema En este caso, sera el formulario generado para la modificacion de
// objetos de la BD
//=====================================================================================================================

Class ModMiembrosPrivada
{

function __construct()
{
}

function DisplayContent($idioma,$MOD)
{
	global $formularios;
	global $procesadores;
	global $controladores;
	global $identificadoresPrivados;
	global $RutaRelativaControlador;
	//Aqui va el cuerpo principal de la pagina
?>
	<section id="content">
		<div class="container">
			<form id="borrarActual" action="<?php echo $procesadores[$identificadoresPrivados["DMiembros"]]?>" method="POST">
						<input type="hidden" name="BORRAR" value="Login=><?php echo $MOD["Login"]?>"/>
			</form>
			<div class="row">
				<div class="col-md-12">
					<form role="form" action="<?php echo $procesadores[$identificadoresPrivados["MMiembros"]]?>" method="POST">
					<input type="hidden" name="ClaveAnt" value="Login=><?php echo $MOD["Login"]?>" />
					<?php
					$NombreFormulario = $identificadoresPrivados["MMiembros"];
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

	$MOD;
	$login = $_POST["MOD"];
	//Consultamos datos
	try
	{
		$consulta = $_TABLAMIEMBRO->ListadoRegistros(" where Login = '".$login."'" );
		$MOD = $consulta->fetch_assoc();
	}
	catch(Exception $e)
	{
		//En caso de test no se muestra un mensaje al usuario, sino que se deja salir la excepcion para que la detecte el testeo de errores
		if (!isset($_COOKIE["TEST"]))
		{
			$errorRescrito = explode("=>",$e->getMessage());
			$_SESSION['error'] = 'CON ERR MIEMBROS'."=>".$errorRescrito[1];
			
		}
		else
		{
			throw new Exception($e->getMessage());
		}
		header("Location: ".$controladores[$identificadoresPrivados["Miembros"]]);
	}

	//Inicializamos la vista Correspondiente
	$princ_view = new ModMiembrosPrivada();
	
	
	//Se procede a la creacion de la vista
	include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
	$princ_view->DisplayContent($idioma,$MOD);
	include_once$RutaRelativaControlador.'Comun/Pie.php';

?>