<?php

Class AltaPrensaPrivada
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
		<form id="borrarActual" action="<?php echo $procesadores[$identificadoresPrivados["DPrensa"]]?>" method="POST">
						<input type="hidden" name="BORRAR" value="Titulo_Noticia=><?php echo $MOD["Titulo_Noticia"]?>"/>
			</form>
			<div class="row">
				<div class="col-md-12">
					<form role="form" action="<?php echo $procesadores[$identificadoresPrivados["MPrensa"]]?>" method="POST">
					<input type="hidden" name="ClaveAnt" value="Titulo_Noticia=><?php echo $MOD["Titulo_Noticia"]?>" />
					<?php
					foreach($formularios[$identificadoresPrivados["MPrensa"]] as $campos)
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
	$titulo = $_POST["MOD"];
	$MOD = "";
		//Consultamos datos
		try
		{
			$consulta = $_TABLANOTICIAS->ListadoRegistros(" where Titulo_Noticia = '".$titulo."'");
			
			$MOD = $consulta->fetch_assoc();
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
$princ_view->DisplayContent($idioma,$MOD);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
