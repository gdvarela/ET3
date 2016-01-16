<?php

Class ModActividadesPrivada
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
		<form id="borrarActual" action="<?php echo $procesadores[$identificadoresPrivados["DActividades"]]?>" method="POST">
		<?php
			$campoClave = "";
			switch ($_POST["TIPO"])
			{
				case "ED":
				$campoClave = "IDTablon";
				echo "<input type='hidden' name='TIPO' value='ED'/>";
				break;
				case "RE":
				$campoClave = "IDRevista";
				echo "<input type='hidden' name='TIPO' value='RE'/>";
				break;
				case "CON":
				$campoClave = "IDConferencia_Org";
				echo "<input type='hidden' name='TIPO' value='CON'/>";
				break;
			}
		?>
						<input type="hidden" name="BORRAR" value="<?php echo $campoClave?>=><?php echo $MOD[$campoClave]?>"/>
			</form>
			<div class="row">
				<div class="col-md-12">
					<form role="form" action="<?php echo $procesadores[$identificadoresPrivados["MActividades"]]?>" method="POST">
					<input type="hidden" name="TIPO" value="<?php echo $_POST["TIPO"]?>"/>
					<input type="hidden" name="ClaveAnt" value="<?php echo $campoClave?>=><?php echo $MOD[$campoClave]?>" />
					<?php
					foreach($formularios[$identificadoresPrivados["MActividades"].$_POST["TIPO"]] as $campos)
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
	$publicacion = "";
		//Consultamos datos
try
	{
		switch ($_POST["TIPO"])
		{
			case "ED":
			$consulta = $_TABLATABLONEDITORIAL->ListadoRegistros(" where IDTablon = '".$Mod."'");
			$publicacion = $consulta->fetch_assoc();
			break;
			case "RE":
			$consulta = $_TABLAREVISTAS->ListadoRegistros(" where IDRevista = '".$Mod."'");
			$publicacion = $consulta->fetch_assoc();
			break;
			case "CON":
			$consulta = $_TABLACONFERENCIASORG->ListadoRegistros(" where IDConferencia_Org = '".$Mod."'");
			$publicacion = $consulta->fetch_assoc();
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
$princ_view = new ModActividadesPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma,$publicacion);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
