<?php

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
						if (strpos($campoClave,"@") !== FALSE)
							echo '<input type="hidden" name="ClaveAnt" value="'.explode("@",$campoClave)[0].'=>'.$MOD[explode("@",$campoClave)[0]].';'.explode("@",$campoClave)[1].'=>'.$MOD[explode("@",$campoClave)[1]].'" />';
						else
							echo '<input type="hidden" name="ClaveAnt" value="'.$campoClave.'=>'.$MOD[$campoClave].'" />';
					?>
					<?php
					foreach($formularios[$identificadoresPrivados["MDocencia"].$_POST["TIPO"]] as $campos)
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
	$doc = "";
		//Consultamos datos
		try
	{
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
		$errorRescrito = explode("=>",$e->getMessage());
		$_SESSION['error'] = 'OBTENCION D'."=>".$errorRescrito[1];
		header("Location: ".$controladores[$identificadoresPrivados["Docencia"]]);
	}

		
		
//Inicializamos la vista Correspondiente
$princ_view = new ModDocenciaPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma,$doc);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
