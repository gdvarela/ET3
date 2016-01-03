<?php

Class ModTransferenciaPrivada
{

function __construct()
{
}

function DisplayContent($idioma,$Transferencia)
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
		<form id="borrarActual" action="<?php echo $procesadores[$identificadoresPrivados["DTransferencias"]]?>" method="POST">
		<?php
			$campoClave = "";
			switch ($_POST["TIPO"])
			{
				case "PO":
				$campoClave = "IDProyecto";
				echo "<input type='hidden' name='TIPO' value='PO'/>";
				break;
				case "PA":
				$campoClave = "IDPatente";
				echo "<input type='hidden' name='TIPO' value='PA'/>";
				break;
				case "CO":
				$campoClave = "IDContrato";
				echo "<input type='hidden' name='TIPO' value='CO'/>";
				break;
			}
		?>
						<input type="hidden" name="BORRAR" value="<?php echo $campoClave?>=><?php echo $Transferencia[$campoClave]?>"/>
			</form>
			<div class="row">
				<div class="col-md-12">
					<form role="form" action="<?php echo $procesadores[$identificadoresPrivados["MTransferencias"]]?>" method="POST">
					<input type="hidden" name="TIPO" value="<?php echo $_POST["TIPO"]?>"/>
					<input type="hidden" name="ClaveAnt" value="<?php echo $campoClave?>=><?php echo $Transferencia[$campoClave]?>" />
					<?php
					foreach($formularios[$identificadoresPrivados["MTransferencias"].$_POST["TIPO"]] as $campos)
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
									'.$Transferencia[explode("-",$campos[0])[1]].'
									</textarea>
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
									<input  type="'.$campos[1].'" name="'.$campos[0].'" value="'.$Transferencia[explode("-",$campos[0])[1]].'" '.$campos[2].' >
								</div>
								';
							break;
							default:
							echo '
								<div class="form-group">
									<label class="control-label">'.$idioma[$campos[0]].'</label>
									<input  type="'.$campos[1].'" class="form-control" value="'.$Transferencia[explode("-",$campos[0])[1]].'" name="'.$campos[0].'" '.$campos[2].' >
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
	$trans = "";
		//Consultamos datos
		try
	{
		switch ($_POST["TIPO"])
		{
			case "PO":
			$consulta = $_TABLAPROYECTOS->ListadoRegistros(" where IDProyecto = '".$Mod."'");
			$trans = $consulta->fetch_assoc();
			break;
			case "PA":
			$consulta = $_TABLAPATENTES->ListadoRegistros(" where IDPatente = '".$Mod."'");
			$trans = $consulta->fetch_assoc();
			break;
			case "CO":
			$consulta = $_TABLACONTRATOS->ListadoRegistros(" where IDContrato = '".$Mod."'");
			$trans = $consulta->fetch_assoc();
			break;
		}
		
		
	}
	catch(Exception $e)
	{
		$errorRescrito = explode("=>",$e->getMessage());
		$_SESSION['error'] = 'OBTENCION T'."=>".$errorRescrito[1];
		header("Location: ".$controladores[$identificadoresPrivados["Transferencias"]]);
	}

		
		
//Inicializamos la vista Correspondiente
$princ_view = new ModTransferenciaPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma,$trans);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
