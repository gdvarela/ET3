<?php

Class ModPublicacionesPrivada
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
		<form id="borrarActual" action="<?php echo $procesadores[$identificadoresPrivados["DPublicaciones"]]?>" method="POST">
		<?php
			$campoClave = "";
			switch ($_POST["TIPO"])
			{
				case "L":
				$campoClave = "ISBN";
				echo "<input type='hidden' name='TIPO' value='L'/>";
				break;
				case "A":
				$campoClave = "IDArticulo";
				echo "<input type='hidden' name='TIPO' value='A'/>";
				break;
				case "C":
				$campoClave = "IDConferencia";
				echo "<input type='hidden' name='TIPO' value='C'/>";
				break;
			}
		?>
						<input type="hidden" name="BORRAR" value="<?php echo $campoClave?>=><?php echo $MOD[$campoClave]?>"/>
			</form>
			<div class="row">
				<div class="col-md-12">
					<form role="form" action="<?php echo $procesadores[$identificadoresPrivados["MPublicaciones"]]?>" method="POST">
					<input type="hidden" name="TIPO" value="<?php echo $_POST["TIPO"]?>"/>
					<input type="hidden" name="ClaveAnt" value="<?php echo $campoClave?>=><?php echo $MOD[$campoClave]?>" />
					<?php
					foreach($formularios[$identificadoresPrivados["MPublicaciones"].$_POST["TIPO"]] as $campos)
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


	$Mod = $_POST["MOD"];
	$MOD = "";
		//Consultamos datos
try
	{
		switch ($_POST["TIPO"])
		{
			case "L":
			$consulta = $_TABLALIBROS->ListadoRegistros(" where ISBN = '".$Mod."'");
			$MOD = $consulta->fetch_assoc();
			break;
			case "A":
			$consulta = $_TABLAARTICULOS->ListadoRegistros(" where IDArticulo = '".$Mod."'");
			$MOD = $consulta->fetch_assoc();
			break;
			case "C":
			$consulta = $_TABLACONFERENCIAS->ListadoRegistros(" where IDConferencia = '".$Mod."'");
			$MOD = $consulta->fetch_assoc();
			break;
		}
		
		
	}
	catch(Exception $e)
	{
		$errorRescrito = explode("=>",$e->getMessage());
		$_SESSION['error'] = 'OBTENCION C'."=>".$errorRescrito[1];
		header("Location: ".$controladores[$identificadoresPrivados["Publicaciones"]]);
	}
		
//Inicializamos la vista Correspondiente
$princ_view = new ModPublicacionesPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma,$MOD);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
