<?php

Class PublicacionesPrivada
{

function __construct()
{
}

function DisplayContent($idioma,$Lib,$Art,$Conf)
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
						
						  <form id="1" action="<?php echo $controladores[$identificadoresPrivados["APublicaciones"]]?>" method = "POST">
						  <input type ="hidden" name="TIPO" value="L" />
						  <img style="display:inline" src="<?php echo $RutaRelativaControlador?>img/engranaje2.svg.png"
						  class="img-responsive">
						  <a style="display:inline" class="btn btn-warning" onClick="document.getElementById('1').submit();"><?php echo $idioma['Alta_L']; ?></a>
						  </form>
						</div>
						<div class="col-md-3" >
						   <form id="2" action="<?php echo $controladores[$identificadoresPrivados["APublicaciones"]]?>" method = "POST">
						  <input type ="hidden" name="TIPO" value="A" />
						  <img style="display:inline" src="<?php echo $RutaRelativaControlador?>img/engranaje2.svg.png"
						  class="img-responsive">
						  <a style="display:inline" class="btn btn-warning" onClick="document.getElementById('2').submit();"><?php echo $idioma['Alta_A']; ?></a>
						  </form>
						</div>
						<div class="col-md-3" >
						   <form id="3" action="<?php echo $controladores[$identificadoresPrivados["APublicaciones"]]?>" method = "POST">
						   <input type ="hidden" name="TIPO" value="C" />
						   <img style="display:inline" src="<?php echo $RutaRelativaControlador?>img/engranaje2.svg.png"
						  class="img-responsive">
						  <a style="display:inline" class="btn btn-warning" onClick="document.getElementById('3').submit();"><?php echo $idioma['Alta_C']; ?></a>
						  </form>
						</div>
						<div class="col-md-9"></div>
					  </div>
					  <div class="row">
            <div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $idioma["Libro"]."s"?></h3>
                </div>
				<ul class="list-group">
				<?php
					foreach($Lib as $e)
					{
						echo '<form id="'.$e["ISBN"].'L" action="'.$controladores[$identificadoresPrivados["MPublicaciones"]].'" method="POST">
								<input type="hidden" name="MOD" value="'.$e["ISBN"].'" />
								<input type="hidden" name="TIPO" value="L" />
								</form>';
						echo '<li class="list-group-item">
						<blockquote>
							<p>
									'.$e["Titulo_Libro"].'
							</p> <small> '.$e["ISBN"].', <cite>'.$e["Fecha_Libro"].'</cite></small>
							<img style="display:inline" onClick="document.getElementById(\''.$e["ISBN"].'L\').submit();" src="'.$RutaRelativaControlador.'img/editar.png"
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
                  <h3 class="panel-title"><?php echo $idioma["Articulo"]."s"?></h3>
                </div>
				<ul class="list-group">
					<?php
					foreach($Art as $e)
					{
						echo '<form id="'.$e["IDArticulo"].'A" action="'.$controladores[$identificadoresPrivados["MPublicaciones"]].'" method="POST">
								<input type="hidden" name="MOD" value="'.$e["IDArticulo"].'" />
								<input type="hidden" name="TIPO" value="A" />
								</form>';
						echo '<li class="list-group-item">
						<blockquote>
							<p>
									'.$e["Titulo_Articulo"].'
							</p> <small> '.$e["Nombre_Revista"].', <cite>'.$e["Fecha_Articulo"].'</cite></small>
							<img style="display:inline" onClick="document.getElementById(\''.$e["IDArticulo"].'A\').submit();" src="'.$RutaRelativaControlador.'img/editar.png"
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
                  <h3 class="panel-title"><?php echo $idioma["Conferencia"]."s"?></h3>
                </div>
				<ul class="list-group">
					<?php
					foreach($Conf as $e)
					{
						echo '<form id="'.$e["IDConferencia"].'C" action="'.$controladores[$identificadoresPrivados["MPublicaciones"]].'" method="POST">
								<input type="hidden" name="MOD" value="'.$e["IDConferencia"].'" />
								<input type="hidden" name="TIPO" value="C" />
								</form>';
						echo '<li class="list-group-item">'.$e["Nombre_Conferencia"].'<br>-'.$e["Charla_Conferencia"].'<br>-'.$e["Fecha_Conferencia"].'
						<img style="display:inline" onClick="document.getElementById(\''.$e["IDConferencia"].'C\').submit();" src="'.$RutaRelativaControlador.'img/editar.png"
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
		$consulta = $_TABLALIBROS->ListadoRegistros("");
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $consulta->num_rows ;$i++)
		{
			$a[] = $consulta->fetch_assoc();
		}
		$consulta = $_TABLAARTICULOS->ListadoRegistros("");
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $consulta->num_rows ;$i++)
		{
			$b[] = $consulta->fetch_assoc();
		}
		$consulta = $_TABLACONFERENCIAS->ListadoRegistros("");
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $consulta->num_rows ;$i++)
		{
			$c[] = $consulta->fetch_assoc();
		}
	}
	catch(Exception $e)
	{
		$errorRescrito = explode("=>",$e->getMessage());
		$_SESSION['error'] = 'CON ERR MIEMBROS'."=>".$errorRescrito[1];
	}

//Inicializamos la vista Correspondiente
$princ_view = new PublicacionesPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma,$a,$b,$c);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
