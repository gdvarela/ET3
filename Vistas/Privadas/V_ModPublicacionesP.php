<?php

Class ModPublicacionesPrivada
{

function __construct()
{
}

function DisplayContent($idioma,$publicacion)
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
						<input type="hidden" name="BORRAR" value="<?php echo $campoClave?>=><?php echo $publicacion[$campoClave]?>"/>
			</form>
			<div class="row">
				<div class="col-md-12">
					<form role="form" action="<?php echo $procesadores[$identificadoresPrivados["MPublicaciones"]]?>" method="POST">
					<input type="hidden" name="TIPO" value="<?php echo $_POST["TIPO"]?>"/>
					<input type="hidden" name="ClaveAnt" value="<?php echo $campoClave?>=><?php echo $publicacion[$campoClave]?>" />
					<?php
					foreach($formularios[$identificadoresPrivados["MPublicaciones"].$_POST["TIPO"]] as $campos)
					{
						if (strpos(explode(":",$campos[2])[0],'js') !== false)
						{
							global $VALIDACIONFORMULARIO;
							$VALIDACIONFORMULARIO =$VALIDACIONFORMULARIO. '
							document.getElementById(\''.$campos[0].'\').addEventListener(\''.explode("|",explode(":",$campos[2])[1])[0].'\', function validar() {
							  var todoCorrecto = true;
							  todoCorrecto = '.explode("|",explode(":",$campos[2])[1])[1].';
							  this.setCustomValidity(todoCorrecto ? \'\' : \''.explode("|",explode(":",$campos[2])[1])[2].'\');
							});
							';
							
							$campos[2] = str_replace ("js","",explode(":",$campos[2])[0]);
						}
						switch ($campos[1])
						{
							case 'textarea':
							echo '
								<div class="form-group">
									<label class="control-label">'.$idioma[$campos[0]].'</label>
									<textarea class="form-control" name="'.$campos[0].'" '.$campos[2].'">
									'.$publicacion[explode("-",$campos[0])[1]].'
									</textarea>
								</div>
								';
							break;
							case 'multiCheck':
							echo '
							<div class="col-md-4">
							  <div class="panel panel-primary">
								<div class="panel-heading">
								  <h3 class="panel-title">'.$idioma[$campos[0]].'</h3>
								</div>
								<ul class="list-group">';
									switch (explode(":",$campos[3])[0])
								  {
									  case "sql":
									  $opciones = TablaBD::ConsultaGenerica(explode(":",$campos[3])[1]);
									  $opciones2 = array();
										switch (explode(":",$campos[4])[0])
										  {
											  case "sql":
											  $consulta = TablaBD::ConsultaGenerica(str_replace("%d",$publicacion[$campoClave],explode(":",$campos[4])[1]));
											  for ($i = 0 ; $i < $consulta->num_rows;$i = $i +1)
											  {
												$dato = $consulta->fetch_assoc();
												$opciones2[] = $dato[array_keys($dato)[0]];
											  }
											  break;
											  case "array":
												$opciones2 = explode("@",(explode(":",$campos[4])[1]));
											  break;
										  }
									  for ($i = 0 ; $i < $opciones->num_rows;$i = $i +1)
									  {
										$dato = $opciones->fetch_assoc();
										if (in_array($dato[array_keys($dato)[0]],$opciones2))
											echo '<li class="list-group-item"><input type="checkbox" checked name="' . $campos[0]. '-' . $dato[array_keys($dato)[0]]. '">' . $dato[array_keys($dato)[0]]. ' </input></li>';
										else
											echo '<li class="list-group-item"><input type="checkbox" name="' . $campos[0]. '-' . $dato[array_keys($dato)[0]]. '">' . $dato[array_keys($dato)[0]]. ' </input></li>';
									  }
									  break;
									  case "array":
									  $opciones = explode("@",(explode(":",$campos[3])[1]));
									  $opciones2 = array();
											switch (explode(":",$campos[4])[0])
											  {
												  case "sql":
												  $consulta = TablaBD::ConsultaGenerica(str_replace("%d",$publicacion[$campoClave],explode(":",$campos[4])[1]));
												  for ($i = 0 ; $i < $consulta->num_rows;$i = $i +1)
												  {
													  $dato = $consulta->fetch_assoc();
													  $opciones2[] = $dato[array_keys($dato)[0]];
												  }
												  break;
												  case "array":
													$opciones2 = explode("@",(explode(":",$campos[4])[1]));
												  break;
											  }
									  for ($i = 0 ; $i < count($opciones);$i = $i +1)
									  {
										  $dato = $opciones[$i];
										 if (in_array($dato,$opciones2))
											echo '<li class="list-group-item"><input type="checkbox" checked name="' . $campos[0]. '-' . $dato. '">' . $dato. ' </input></li>';
										else
											echo '<li class="list-group-item"><input type="checkbox" name="' . $campos[0]. '-' . $dato. '">' . $dato. ' </input></li>';
									  }
									  break;
								  }
									
								 echo ' </ul>
							  </div>
							</div>
							';
							break;
							case 'select':
							echo '
							<div class="form-group">
								<label for="'.$campos[0].'">'.$idioma[$campos[0]].'</label>
								  <select name="'.$campos[0].'" id="'.$campos[0].'" class="form-control" '.$campos[2].'>
								  ';
								  switch (explode(":",$campos[3])[0])
								  {
									  case "sql":
									  $opciones = TablaBD::ConsultaGenerica(explode(":",$campos[3])[1]);
									  for ($i = 0 ; $i < $opciones->num_rows;$i = $i +1)
									  {
										  $dato = $opciones->fetch_assoc();
										  echo '<option>'.$dato[array_keys($dato)[0]].'</option>';
									  }
									  break;
								  }
								echo '
								  </select>
							  </div>
								';
							break;
							case 'number':
							echo '
								<div class="form-group">
									<label class="control-label">'.$idioma[$campos[0]].'</label>
									<input  type="'.$campos[1].'" name="'.$campos[0].'" value="'.$publicacion[explode("-",$campos[0])[1]].'" '.$campos[2].' >
								</div>
								';
							break;
							default:
							echo '
								<div class="form-group">
									<label class="control-label">'.$idioma[$campos[0]].'</label>
									<input  type="'.$campos[1].'" class="form-control" value="'.$publicacion[explode("-",$campos[0])[1]].'" name="'.$campos[0].'" '.$campos[2].' >
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
	$publicacion = "";
		//Consultamos datos
try
	{
		switch ($_POST["TIPO"])
		{
			case "L":
			$consulta = $_TABLALIBROS->ListadoRegistros(" where ISBN = '".$Mod."'");
			$publicacion = $consulta->fetch_assoc();
			break;
			case "A":
			$consulta = $_TABLAARTICULOS->ListadoRegistros(" where IDArticulo = '".$Mod."'");
			$publicacion = $consulta->fetch_assoc();
			break;
			case "C":
			$consulta = $_TABLACONFERENCIAS->ListadoRegistros(" where IDConferencia = '".$Mod."'");
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
$princ_view = new ModPublicacionesPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma,$publicacion);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
