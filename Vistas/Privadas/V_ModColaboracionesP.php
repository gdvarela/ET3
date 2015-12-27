<?php

Class ModColaboracionesPrivada
{

function __construct()
{
}

function DisplayContent($idioma,$colaboracion)
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
						<input type="hidden" name="BORRAR" value="<?php echo $campoClave?>=><?php echo $colaboracion[$campoClave]?>"/>
			</form>
			<div class="row">
				<div class="col-md-12">
					<form role="form" action="<?php echo $procesadores[$identificadoresPrivados["MColaboraciones"]]?>" method="POST">
					<input type="hidden" name="TIPO" value="<?php echo $_POST["TIPO"]?>"/>
					<input type="hidden" name="ClaveAnt" value="<?php echo $campoClave?>=><?php echo $colaboracion[$campoClave]?>" />
					<?php
					foreach($formularios[$identificadoresPrivados["MColaboraciones"].$_POST["TIPO"]] as $campos)
					{
						switch ($campos[1])
						{
							case 'textarea':
							echo '
								<div class="form-group">
									<label class="control-label">'.$idioma[$campos[0]].'</label>
									<textarea class="form-control" name="'.$campos[0].'" '.$campos[2].'">
									'.$colaboracion[explode("-",$campos[0])[1]].'
									</textarea>
								</div>
								';
							break;
							case 'number':
							echo '
								<div class="form-group">
									<label class="control-label">'.$idioma[$campos[0]].'</label>
									<input  type="'.$campos[1].'" name="'.$campos[0].'" value="'.$colaboracion[explode("-",$campos[0])[1]].'" '.$campos[2].' >
								</div>
								';
							break;
							default:
							echo '
								<div class="form-group">
									<label class="control-label">'.$idioma[$campos[0]].'</label>
									<input  type="'.$campos[1].'" class="form-control" value="'.$colaboracion[explode("-",$campos[0])[1]].'" name="'.$campos[0].'" '.$campos[2].' >
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
	$Mod = $_POST["MOD"];
	$colaboracion = "";
		//Consultamos datos
try
	{
		switch ($_POST["TIPO"])
		{
			case "I":
			$consulta = $_TABLAINSTITUCIONES->ListadoRegistros(" where IDInstitucion = '".$Mod."'");
			$colaboracion = $consulta->fetch_assoc();
			break;
			case "G":
			$consulta = $_TABLAGRUPOS->ListadoRegistros(" where IDGrupo = '".$Mod."'");
			$colaboracion = $consulta->fetch_assoc();
			break;
			case "E":
			$consulta = $_TABLAEMPRESAS->ListadoRegistros(" where IDEmpresa = '".$Mod."'");
			$colaboracion = $consulta->fetch_assoc();
			break;
		}
		
		
	}
	catch(Exception $e)
	{
		$errorRescrito = explode("=>",$e->getMessage());
		$_SESSION['error'] = 'ID CONCRETO REPETIDO'."=>".$errorRescrito[1];
		header("Location: ".$controladores[$identificadoresPrivados["Colaboraciones"]]);
	}
		
//Inicializamos la vista Correspondiente
$princ_view = new ModColaboracionesPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma,$colaboracion);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
