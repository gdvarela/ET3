<?php

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
					foreach($formularios[$identificadoresPrivados["MMiembros"]] as $campos)
					{
						global $generadorMod;
						include $generadorMod;
						
					}
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
		$errorRescrito = explode("=>",$e->getMessage());
		$_SESSION['error'] = 'CON ERR MIEMBROS'."=>".$errorRescrito[1];
	}

	//Inicializamos la vista Correspondiente
	$princ_view = new ModMiembrosPrivada();
	
	
	//Se procede a la creacion de la vista
	include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
	$princ_view->DisplayContent($idioma,$MOD);
	include_once$RutaRelativaControlador.'Comun/Pie.php';

?>