<?php

Class DocenciaPrivada
{

function __construct()
{
}

function DisplayContent($idioma,$Dc)
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
						
						  <form id="1" action="<?php echo $controladores[$identificadoresPrivados["ADocencia"]]?>" method = "POST">
						  <input type ="hidden" name="TIPO" value="PA" />
						  <img style="display:inline" src="<?php echo $RutaRelativaControlador?>img/engranaje2.svg.png"
						  class="img-responsive">
						  <a style="display:inline" class="btn btn-warning" onClick="document.getElementById('1').submit();"><?php echo $idioma['Alta_DC']; ?></a>
						  </form>
						</div>
		
						<div class="col-md-9"></div>
	  </div>
	<?php
	foreach($Dc as $e)
	{
		echo '
		<div class="row">
            <div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">'.$e["Login"].'</h3>
                </div>
				<ul class="list-group">
					<form id="'.$e["IDMateria"].'Dc" action="'.$controladores[$identificadoresPrivados["MDocencia"]].'" method="POST">
						<input type="hidden" name="MOD" value="'.$e["IDMateria"].'" />
						<input type="hidden" name="TIPO" value="Dc" />
					</form>
					<li class="list-group-item"><i>'.$e["IDMateria"].'</i><br>-<b> '.$idioma["Fecha"].':</b> '.$e["FechaIni_Materia"].'
						<img style="display:inline" onClick="document.getElementById(\''.$e["IDMateria"].'Dc\').submit();" src="'.$RutaRelativaControlador.'img/editar.png" class="img-responsive pull-right"></img>
					</li>
					
				  </ul>
              </div>
            </div>';
	}
	?>
	</section>
<?php
	

}

}
	$Dc = array();
	//Consultamos datos
	try
	{
		$consulta = $_TABLADOCENCIA->ListadoRegistros("");
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $consulta->num_rows ;$i++)
		{
			$Dc[] = $consulta->fetch_assoc();
		}
	}
	catch(Exception $e)
	{
		$errorRescrito = explode("=>",$e->getMessage());
		$_SESSION['error'] = 'CON ERR MIEMBROS'."=>".$errorRescrito[1];
	}

//Inicializamos la vista Correspondiente
$princ_view = new DocenciaPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma,$Dc);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
