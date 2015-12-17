<?php

Class AltaPrensaPrivada
{

function __construct()
{
}

function DisplayContent($idioma,$noticia)
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
		<form id="borrarActual" action="<?php echo $procesadores[$identificadoresPrivados["DPrensa"]]?>" method="POST">
						<input type="hidden" name="BORRAR" value="Titulo_Noticia=><?php echo $noticia["Titulo_Noticia"]?>"/>
			</form>
			<div class="row">
				<div class="col-md-12">
					<form role="form" action="<?php echo $procesadores[$identificadoresPrivados["MPrensa"]]?>" method="POST">
					<input type="hidden" name="ClaveAnt" value="Titulo_Noticia=><?php echo $noticia["Titulo_Noticia"]?>" />
					<?php
					foreach($formularios[$identificadoresPrivados["MPrensa"]] as $campos)
					{
						switch ($campos[1])
						{
							case 'textarea':
							echo '
								<div class="form-group">
									<label class="control-label">'.$idioma[$campos[0]].'</label>
									<textarea class="form-control" name="'.$campos[0].'" '.$campos[2].'">
									'.$noticia[explode("-",$campos[0])[1]].'
									</textarea>
								</div>
								';
							break;
							case 'number':
							echo '
								<div class="form-group">
									<label class="control-label">'.$idioma[$campos[0]].'</label>
									<input  type="'.$campos[1].'" name="'.$campos[0].'" value="'.$noticia[explode("-",$campos[0])[1]].'" '.$campos[2].' >
								</div>
								';
							break;
							default:
							echo '
								<div class="form-group">
									<label class="control-label">'.$idioma[$campos[0]].'</label>
									<input  type="'.$campos[1].'" class="form-control" value="'.$noticia[explode("-",$campos[0])[1]].'" name="'.$campos[0].'" '.$campos[2].' >
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
	$titulo = $_POST["MOD"];
	$noticia = "";
		//Consultamos datos
		try
		{
			$consulta = $_TABLANOTICIAS->ListadoRegistros(" where Titulo_Noticia = '".$titulo."'");
			
			$noticia = $consulta->fetch_assoc();
		}
		catch(Exception $e)
		{
			$errorRescrito = explode("=>",$e->getMessage());
			$_SESSION['error'] = 'CON ERR NOTICIAS'."=>".$errorRescrito[1];
		}

		
		
//Inicializamos la vista Correspondiente
$princ_view = new AltaPrensaPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma,$noticia);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
