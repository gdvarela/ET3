<?php

//=====================================================================================================================
// Fichero :V_ColaboracionesP.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 18/12/2015
// Clase que contiene una de las vistas del sistema
//=====================================================================================================================

Class ColaboracionesPrivada
{

function __construct()
{
}

function DisplayContent($idioma,$Emp,$Ins,$Grup)
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
						
						  <form id="1" action="<?php echo $controladores[$identificadoresPrivados["AColaboraciones"]]?>" method = "POST">
						  <input type ="hidden" name="TIPO" value="I" />
						  <img style="display:inline" src="<?php echo $RutaRelativaControlador?>img/engranaje2.svg.png"
						  class="img-responsive">
						  <a style="display:inline" class="btn btn-warning" onClick="document.getElementById('1').submit();"><?php echo $idioma['Alta_INST']; ?></a>
						  </form>
						</div>
						<div class="col-md-3" >
						   <form id="2" action="<?php echo $controladores[$identificadoresPrivados["AColaboraciones"]]?>" method = "POST">
						  <input type ="hidden" name="TIPO" value="E" />
						  <img style="display:inline" src="<?php echo $RutaRelativaControlador?>img/engranaje2.svg.png"
						  class="img-responsive">
						  <a style="display:inline" class="btn btn-warning" onClick="document.getElementById('2').submit();"><?php echo $idioma['Alta_EMPRE']; ?></a>
						  </form>
						</div>
						<div class="col-md-3" >
						   <form id="3" action="<?php echo $controladores[$identificadoresPrivados["AColaboraciones"]]?>" method = "POST">
						   <input type ="hidden" name="TIPO" value="G" />
						   <img style="display:inline" src="<?php echo $RutaRelativaControlador?>img/engranaje2.svg.png"
						  class="img-responsive">
						  <a style="display:inline" class="btn btn-warning" onClick="document.getElementById('3').submit();"><?php echo $idioma['Alta_GRUPO']; ?></a>
						  </form>
						</div>
						<div class="col-md-9"></div>
					  </div>
					  <div class="row">
            <div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $idioma["Empresa"]."s"?></h3>
                </div>
				<ul class="list-group">
				<?php
					//Se recorren los objetos a mostrar por la vista, recibidos por parametro de la consulta
					foreach($Emp as $e)
					{
						echo '<form id="'.$e["IDEmpresa"].'E" action="'.$controladores[$identificadoresPrivados["MColaboraciones"]].'" method="POST">
								<input type="hidden" name="MOD" value="'.$e["IDEmpresa"].'" />
								<input type="hidden" name="TIPO" value="E" />
								</form>';
						echo '<li class="list-group-item">'.$e["Nombre_Empresa"].'<br>-<a href="'.$e["Web_Empresa"].'" target="_blank">WEB</a>
						<img style="display:inline" onClick="document.getElementById(\''.$e["IDEmpresa"].'E\').submit();" src="'.$RutaRelativaControlador.'img/editar.png"
							class="img-responsive pull-right"></img></li>';
					}
				?>
					
				  </ul>
              </div>
            </div>
			<div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $idioma["Institucion"]."es"?></h3>
                </div>
				<ul class="list-group">
					<?php
					//Se recorren los datos recibidos para incluirlos en el HTML
					foreach($Ins as $e)
					{
						echo '<form id="'.$e["IDInstitucion"].'I" action="'.$controladores[$identificadoresPrivados["MColaboraciones"]].'" method="POST">
								<input type="hidden" name="MOD" value="'.$e["IDInstitucion"].'" />
								<input type="hidden" name="TIPO" value="I" />
								</form>';
						echo '<li class="list-group-item">'.$e["Nombre_Institucion"].'<br>-<a href="'.$e["Web_Institucion"].'" target="_blank">WEB</a>
						<img style="display:inline" onClick="document.getElementById(\''.$e["IDInstitucion"].'I\').submit();" src="'.$RutaRelativaControlador.'img/editar.png"
							class="img-responsive pull-right"></img></li>';
					}
				?>
				  </ul>
              </div>
            </div>
			<div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $idioma["Grupo"]."s"?></h3>
                </div>
				<ul class="list-group">
					<?php
					//Se recorren los datos recibidos para incluirlos en el HTML
					foreach($Grup as $e)
					{
						echo '<form id="'.$e["IDGrupo"].'G" action="'.$controladores[$identificadoresPrivados["MColaboraciones"]].'" method="POST">
								<input type="hidden" name="MOD" value="'.$e["IDGrupo"].'" />
								<input type="hidden" name="TIPO" value="G" />
								</form>';
						echo '<li class="list-group-item">'.$e["Nombre_Grupo"].'<br>-<a href="'.$e["Web_Grupo"].'" target="_blank">WEB</a>
						<img style="display:inline" onClick="document.getElementById(\''.$e["IDGrupo"].'G\').submit();" src="'.$RutaRelativaControlador.'img/editar.png"
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
	$e = array();
	$in = array();
	$g = array();
	//Consultamos datos
	try
	{
		$consulta = $_TABLAEMPRESAS->ListadoRegistros("");
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $consulta->num_rows ;$i++)
		{
			$e[] = $consulta->fetch_assoc();
		}
		$consulta = $_TABLAGRUPOS->ListadoRegistros("");
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $consulta->num_rows ;$i++)
		{
			$g[] = $consulta->fetch_assoc();
		}
		$consulta = $_TABLAINSTITUCIONES->ListadoRegistros("");
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $consulta->num_rows ;$i++)
		{
			$in[] = $consulta->fetch_assoc();
		}
	}
	catch(Exception $e)
	{
		//En caso de test no se muestra un mensaje al usuario, sino que se deja salir la excepcion para que la detecte el testeo de errores
		if (!isset($_COOKIE["TEST"]))
		{
			$errorRescrito = explode("=>",$e->getMessage());
			$_SESSION['error'] = 'ERROR CON C'."=>".$errorRescrito[1];
		}
		else
		{
			throw new Exception($e->getMessage());
		}
	}

//Inicializamos la vista Correspondiente
$princ_view = new ColaboracionesPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma,$e,$in,$g);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
