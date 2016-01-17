<?php

//=====================================================================================================================
// Fichero :V_ActividadesP.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 18/12/2015
// Muestra una lista de las actividades del grupo
//=====================================================================================================================

Class ActividadesPrivada
{

function __construct()
{
}

function DisplayContent($idioma,$Ed,$Re,$Co)
{
	global $controladores;
	global $identificadoresPrivados;
	global $RutaRelativaControlador;
	//Aqui va el cuerpo principal de la pagina
?>
	<section id="content">
	<div class="container">	 
		<div class="row"> <!--style="background-color:#434F6A;"--> 
						<div class="col-md-3" >
						
						  <form id="1" action="<?php echo $controladores[$identificadoresPrivados["AActividades"]]?>" method = "POST">
						  <input type ="hidden" name="TIPO" value="ED" />
						  <img style="display:inline" src="<?php echo $RutaRelativaControlador?>img/engranaje2.svg.png"
						  class="img-responsive">
						  <a style="display:inline" class="btn btn-warning" onClick="document.getElementById('1').submit();"><?php echo $idioma['Alta_ED']; ?></a>
						  </form>
						</div>
						<div class="col-md-3" >
						   <form id="2" action="<?php echo $controladores[$identificadoresPrivados["AActividades"]]?>" method = "POST">
						  <input type ="hidden" name="TIPO" value="RE" />
						  <img style="display:inline" src="<?php echo $RutaRelativaControlador?>img/engranaje2.svg.png"
						  class="img-responsive">
						  <a style="display:inline" class="btn btn-warning" onClick="document.getElementById('2').submit();"><?php echo $idioma['Alta_RE']; ?></a>
						  </form>
						</div>
						<div class="col-md-3" >
						   <form id="3" action="<?php echo $controladores[$identificadoresPrivados["AActividades"]]?>" method = "POST">
						   <input type ="hidden" name="TIPO" value="CON" />
						   <img style="display:inline" src="<?php echo $RutaRelativaControlador?>img/engranaje2.svg.png"
						  class="img-responsive">
						  <a style="display:inline" class="btn btn-warning" onClick="document.getElementById('3').submit();"><?php echo $idioma['Alta_CON']; ?></a>
						  </form>
						</div>
						<div class="col-md-9"></div>
					  </div>
					  <div class="row">
            <div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $idioma["Editorial"]."es"?></h3>
                </div>
				<ul class="list-group">
				<?php
				//Se recorren los objetos a mostrar por la vista, recibidos por parametro de la consulta
					foreach($Ed as $e)
					{
						echo '<form id="'.$e["IDTablon"].'ED" action="'.$controladores[$identificadoresPrivados["MActividades"]].'" method="POST">
								<input type="hidden" name="MOD" value="'.$e["IDTablon"].'" />
								<input type="hidden" name="TIPO" value="ED" />
								</form>';
						echo '<li class="list-group-item">
						<blockquote>
							<p>
									'.$e["Titulo_Tablon"].'
							</p> <small> '.$e["ISSN_Tablon"].', <cite>'.$e["Fecha_Tablon"].'</cite></small>
							<img style="display:inline" onClick="document.getElementById(\''.$e["IDTablon"].'ED\').submit();" src="'.$RutaRelativaControlador.'img/editar.png"
							class="img-responsive pull-right"></img>
						</blockquote>
						</li>
						';
					}
				?>
					
				  </ul>
              </div>
            </div>
			<div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $idioma["Revista"]."s"?></h3>
                </div>
				<ul class="list-group">
					<?php
					//Se recorren los objetos a mostrar por la vista, recibidos por parametro de la consulta
					foreach($Re as $e)
					{
						echo '<form id="'.$e["IDRevista"].'RE" action="'.$controladores[$identificadoresPrivados["MActividades"]].'" method="POST">
								<input type="hidden" name="MOD" value="'.$e["IDRevista"].'" />
								<input type="hidden" name="TIPO" value="RE" />
								</form>';
						echo '<li class="list-group-item">
						<blockquote>
							<p>
									'.$e["Titulo_Revista"].'
							</p> <small> '.$e["ISSN_Revista"].', <cite>'.$e["Fecha_Revista"].'</cite></small>
							<img style="display:inline" onClick="document.getElementById(\''.$e["IDRevista"].'RE\').submit();" src="'.$RutaRelativaControlador.'img/editar.png"
							class="img-responsive pull-right"></img>
						</blockquote>
						</li>
						';
					}
				?>
				  </ul>
              </div>
            </div>
			<div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $idioma["ConferenciaG"]?></h3>
                </div>
				<ul class="list-group">
					<?php
					//Se recorren los objetos a mostrar por la vista, recibidos por parametro de la consulta
					foreach($Co as $e)
					{
						echo '<form id="'.$e["IDConferencia_Org"].'CON" action="'.$controladores[$identificadoresPrivados["MActividades"]].'" method="POST">
								<input type="hidden" name="MOD" value="'.$e["IDConferencia_Org"].'" />
								<input type="hidden" name="TIPO" value="CON" />
								</form>';
						echo '<li class="list-group-item">'.$e["Titulo_Conferencia_Org"].'<br>-'.$e["Fecha_Conferencia_Org"].'
						<img style="display:inline" onClick="document.getElementById(\''.$e["IDConferencia_Org"].'CON\').submit();" src="'.$RutaRelativaControlador.'img/editar.png"
							class="img-responsive pull-right"></img>
						</li>';
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
	$a = array();
	$b = array();
	$c = array();
	//Consultamos datos
	try
	{
		$consulta = $_TABLATABLONEDITORIAL->ListadoRegistros("");
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $consulta->num_rows ;$i++)
		{
			$a[] = $consulta->fetch_assoc();
		}
		$consulta = $_TABLAREVISTAS->ListadoRegistros("");
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $consulta->num_rows ;$i++)
		{
			$b[] = $consulta->fetch_assoc();
		}
		$consulta = $_TABLACONFERENCIASORG->ListadoRegistros("");
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $consulta->num_rows ;$i++)
		{
			$c[] = $consulta->fetch_assoc();
		}
	}
	catch(Exception $e)
	{
		//En caso de test no se muestra un mensaje al usuario, sino que se deja salir la excepcion para que la detecte el testeo de errores
		if (!isset($_COOKIE["TEST"]))
		{
			$errorRescrito = explode("=>",$e->getMessage());
			$_SESSION['error'] = 'ERROR CON A'."=>".$errorRescrito[1];
		}
		else
		{
			throw new Exception($e->getMessage());
		}
	}

//Inicializamos la vista Correspondiente
$princ_view = new ActividadesPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma,$a,$b,$c);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
