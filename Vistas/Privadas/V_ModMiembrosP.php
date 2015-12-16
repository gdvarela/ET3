<?php

Class ModMiembrosPrivada
{

function __construct()
{
}

function DisplayContent($idioma,$miembro)
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
						<input type="hidden" name="BORRAR" value="<?php echo $miembro["Login"]?>"/>
			</form>
			<div class="row">
				<div class="col-md-12">
					<form role="form" action="<?php echo $procesadores[$identificadoresPrivados["MMiembros"]]?>">
					<input type="hidden" name="ClaveAnt" value="<?php echo $miembro["Login"]?>" />
					<?php
					foreach($formularios[$identificadoresPrivados["AMiembros"]] as $campos)
					{
						switch ($campos[1])
						{
							case 'textarea':
							echo '
								<div class="form-group">
									<label class="control-label">'.$idioma[$campos[0]].'</label>
									<textarea class="form-control" name="'.$campos[0].'" '.$campos[2].'">
									'.$miembro[explode(".",$campos[0])[1]].'
									</textarea>
								</div>
								';
							break;
							case 'number':
							echo '
								<div class="form-group">
									<label class="control-label">'.$idioma[$campos[0]].'</label>
									<input  type="'.$campos[1].'" name="'.$campos[0].'" value="'.$miembro[explode(".",$campos[0])[1]].'" '.$campos[2].' >
								</div>
								';
							break;
							default:
							echo '
								<div class="form-group">
									<label class="control-label">'.$idioma[$campos[0]].'</label>
									<input  type="'.$campos[1].'" class="form-control" value="'.$miembro[explode(".",$campos[0])[1]].'" name="'.$campos[0].'" '.$campos[2].' >
								</div>
								';
							break;
						}
						
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

	$miembro;
	$login = $_POST["userMOD"];
	//Consultamos datos
	try
	{
		$consulta = $_TABLAMIEMBRO->ListadoRegistros(" where Login = '".$login."'" );
		$miembro = $consulta->fetch_assoc();
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
	$princ_view->DisplayContent($idioma,$miembro);
	include_once$RutaRelativaControlador.'Comun/Pie.php';

?>