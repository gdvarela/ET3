<?php

Class ModColaboracionesPrivada
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
		<form id="borrarActual" action="<?php echo $procesadores[$identificadoresPrivados["DColaboraciones"]]?>" method="POST">
		<?php
			$campoClave = "";
			switch ($_POST["TIPO"])
			{
				case "I":
				$campoClave = "IDInstitucion";
				echo "<input type='hidden' name='TIPO' value='I'/>";
				break;
				case "G":
				$campoClave = "IDGrupo";
				echo "<input type='hidden' name='TIPO' value='G'/>";
				break;
				case "E":
				$campoClave = "IDEmpresa";
				echo "<input type='hidden' name='TIPO' value='E'/>";
				break;
			}
		?>
						<input type="hidden" name="BORRAR" value="<?php echo $campoClave?>=><?php echo $MOD[$campoClave]?>"/>
			</form>
			<div class="row">
				<div class="col-md-12">
					<form role="form" action="<?php echo $procesadores[$identificadoresPrivados["MColaboraciones"]]?>" method="POST">
					<input type="hidden" name="TIPO" value="<?php echo $_POST["TIPO"]?>"/>
					<input type="hidden" name="ClaveAnt" value="<?php echo $campoClave?>=><?php echo $MOD[$campoClave]?>" />
					<?php
					foreach($formularios[$identificadoresPrivados["MColaboraciones"].$_POST["TIPO"]] as $campos)
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
			case "I":
			$consulta = $_TABLAINSTITUCIONES->ListadoRegistros(" where IDInstitucion = '".$Mod."'");
			$MOD = $consulta->fetch_assoc();
			break;
			case "G":
			$consulta = $_TABLAGRUPOS->ListadoRegistros(" where IDGrupo = '".$Mod."'");
			$MOD = $consulta->fetch_assoc();
			break;
			case "E":
			$consulta = $_TABLAEMPRESAS->ListadoRegistros(" where IDEmpresa = '".$Mod."'");
			$MOD = $consulta->fetch_assoc();
			break;
		}
		
		
	}
	catch(Exception $e)
	{
		$errorRescrito = explode("=>",$e->getMessage());
		$_SESSION['error'] = 'OBTENCION C'."=>".$errorRescrito[1];
		header("Location: ".$controladores[$identificadoresPrivados["Colaboraciones"]]);
	}
		
//Inicializamos la vista Correspondiente
$princ_view = new ModColaboracionesPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma,$MOD);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
