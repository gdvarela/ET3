<?php

//=====================================================================================================================
// Fichero :V_TransferenciasP.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 18/12/2015
// Clase que contiene una de las vistas del sistema
//=====================================================================================================================

Class TransferenciaPrivada
{

function __construct()
{
}

function DisplayContent($idioma,$Po,$Pa,$Co)
{
	//Aqui va el cuerpo principal de la pagina
	global $controladores;
	global $identificadoresPrivados;
	global $RutaRelativaControlador;
?>
	<section id="content">
	<div class="container">	 
		<div class="row"> <!--style="background-color:#434F6A;"--> 
						<div class="col-md-3" >
						
						  <form id="1" action="<?php echo $controladores[$identificadoresPrivados["ATransferencias"]]?>" method = "POST">
						  <input type ="hidden" name="TIPO" value="PA" />
						  <img style="display:inline" src="<?php echo $RutaRelativaControlador?>img/engranaje2.svg.png"
						  class="img-responsive">
						  <a style="display:inline" class="btn btn-warning" onClick="document.getElementById('1').submit();"><?php echo $idioma['Alta_PA']; ?></a>
						  </form>
						</div>
						<div class="col-md-3" >
						   <form id="2" action="<?php echo $controladores[$identificadoresPrivados["ATransferencias"]]?>" method = "POST">
						  <input type ="hidden" name="TIPO" value="PO" />
						  <img style="display:inline" src="<?php echo $RutaRelativaControlador?>img/engranaje2.svg.png"
						  class="img-responsive">
						  <a style="display:inline" class="btn btn-warning" onClick="document.getElementById('2').submit();"><?php echo $idioma['Alta_PO']; ?></a>
						  </form>
						</div>
						<div class="col-md-3" >
						   <form id="3" action="<?php echo $controladores[$identificadoresPrivados["ATransferencias"]]?>" method = "POST">
						   <input type ="hidden" name="TIPO" value="CO" />
						   <img style="display:inline" src="<?php echo $RutaRelativaControlador?>img/engranaje2.svg.png"
						  class="img-responsive">
						  <a style="display:inline" class="btn btn-warning" onClick="document.getElementById('3').submit();"><?php echo $idioma['Alta_CO']; ?></a>
						  </form>
						</div>
						<div class="col-md-9"></div>
	  </div>
	  <div class="row">
            <div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $idioma["Patente"]."s"?></h3>
                </div>
				<ul class="list-group">
				<?php
				//Se recorren los datos recibidos para incluirlos en el HTML
					foreach($Pa as $e)
					{
						echo '<form id="'.$e["IDPatente"].'PA" action="'.$controladores[$identificadoresPrivados["MTransferencias"]].'" method="POST">
								<input type="hidden" name="MOD" value="'.$e["IDPatente"].'" />
								<input type="hidden" name="TIPO" value="PA" />
								</form>';
						echo '<li class="list-group-item"><i>'.$e["Nombre_Patente"].'</i><br>-<b> '.$idioma["Fecha"].':</b> '.$e["Fecha_Patente"].'
						<img style="display:inline" onClick="document.getElementById(\''.$e["IDPatente"].'PA\').submit();" src="'.$RutaRelativaControlador.'img/editar.png"
							class="img-responsive pull-right"></img></li>';
					}
				?>
					
				  </ul>
              </div>
            </div>
			<div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $idioma["Proyecto"]."s"?></h3>
                </div>
				<ul class="list-group">
					<?php
					//Se recorren los datos recibidos para incluirlos en el HTML
					foreach($Po as $e)
					{
						echo '<form id="'.$e["IDProyecto"].'PO" action="'.$controladores[$identificadoresPrivados["MTransferencias"]].'" method="POST">
								<input type="hidden" name="MOD" value="'.$e["IDProyecto"].'" />
								<input type="hidden" name="TIPO" value="PO" />
								</form>';
						echo '<li class="list-group-item"><i>'.$e["Nombre_Proyecto"].'</i><br>-<b>'.$idioma["Descripcion"].':</b> '.$e["Descripcion_Proyecto"].'
						<img style="display:block" onClick="document.getElementById(\''.$e["IDProyecto"].'PO\').submit();" src="'.$RutaRelativaControlador.'img/editar.png"
							class="img-responsive pull-right"></img></li>';
					}
				?>
				  </ul>
              </div>
            </div>
			<div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $idioma["Contrato"]."s"?></h3>
                </div>
				<ul class="list-group">
					<?php
					//Se recorren los datos recibidos para incluirlos en el HTML
					foreach($Co as $e)
					{
						echo '<form id="'.$e["IDContrato"].'CO" action="'.$controladores[$identificadoresPrivados["MTransferencias"]].'" method="POST">
								<input type="hidden" name="MOD" value="'.$e["IDContrato"].'" />
								<input type="hidden" name="TIPO" value="CO" />
								</form>';
						echo '<li class="list-group-item"><i>'.$e["Nombre_Contrato"].'</i><br>-<b>ID '.$idioma["Empresa"].':</b> '.$e["IDEmpresa"].'<br>-<b>'.$idioma["Duracion"].':</b> '.$e["FechaIni_Contrato"].' || '.$e["FechaFin_Contrato"].'
						<img style="display:block" onClick="document.getElementById(\''.$e["IDContrato"].'CO\').submit();" src="'.$RutaRelativaControlador.'img/editar.png"
							class="img-responsive pull-right"></img></li>';
					}
				?>
				  </ul>
              </div>
            </div>
          </div>
	</div>
	</section>
<?php
	

}

}
	$co = array();
	$po = array();
	$pa = array();
	//Consultamos datos
	try
	{
		$consulta = $_TABLAPATENTES->ListadoRegistros("");
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $consulta->num_rows ;$i++)
		{
			$pa[] = $consulta->fetch_assoc();
		}
		$consulta = $_TABLAPROYECTOS->ListadoRegistros("");
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $consulta->num_rows ;$i++)
		{
			$po[] = $consulta->fetch_assoc();
		}
		$consulta = $_TABLACONTRATOS->ListadoRegistros("");
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $consulta->num_rows ;$i++)
		{
			$co[] = $consulta->fetch_assoc();
		}
	}
	catch(Exception $e)
	{
		//En caso de test no se muestra un mensaje al usuario, sino que se deja salir la excepcion para que la detecte el testeo de errores
		if (!isset($_COOKIE["TEST"]))
		{
			$errorRescrito = explode("=>",$e->getMessage());
			$_SESSION['error'] = 'ERROR CON T'."=>".$errorRescrito[1];
		}
		else
		{
			throw new Exception($e->getMessage());
		}
	}

//Inicializamos la vista Correspondiente
$princ_view = new TransferenciaPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma,$po,$pa,$co);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
