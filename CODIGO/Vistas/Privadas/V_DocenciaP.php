<?php

//=====================================================================================================================
// Fichero :V_DocenciaP.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 18/12/2015
// Clase que contiene una de las vistas del sistema
//=====================================================================================================================

Class DocenciaPrivada
{

function __construct()
{
}

function DisplayContent($idioma,$Dc,$materias)
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
						  <input type ="hidden" name="TIPO" value="D" />
						  <img style="display:inline" src="<?php echo $RutaRelativaControlador?>img/engranaje2.svg.png"
						  class="img-responsive">
						  <a style="display:inline" class="btn btn-warning" onClick="document.getElementById('1').submit();"><?php echo $idioma['Alta_DC']; ?></a>
						  </form>
						</div>
						<div class="col-md-3" >
						
						  <form id="2" action="<?php echo $controladores[$identificadoresPrivados["ADocencia"]]?>" method = "POST">
						  <input type ="hidden" name="TIPO" value="M" />
						  <img style="display:inline" src="<?php echo $RutaRelativaControlador?>img/engranaje2.svg.png"
						  class="img-responsive">
						  <a style="display:inline" class="btn btn-warning" onClick="document.getElementById('2').submit();"><?php echo $idioma['Alta_DCM']; ?></a>
						  </form>
						</div>
						<div class="col-md-6"></div>
	  </div>
			<div class="row"> <!--style="background-color:#434F6A;"--> 
			<div class="col-md-3" >
			</div>
						<div class="col-md-6" >
						 <div class="panel panel-primary">
									<div class="panel-heading">
									  <h3 class="panel-title"><?php echo $idioma["MatImpr"];?></h3>
									</div>
									<ul class="list-group">
						<?php
						 //Se recorren los objetos a mostrar por la vista, recibidos por parametro de la consulta
						foreach($materias as $e2)
						{
							echo '
							
								<form id="'.$e2["IDMateria"].'Dc" action="'.$controladores[$identificadoresPrivados["MDocencia"]].'" method="POST">
										<input type="hidden" name="MOD" value="'.$e2["IDMateria"].'" />
										<input type="hidden" name="TIPO" value="M" />
										</form>
								<li class="list-group-item"><i>'.$e2["Nombre_Materia"].'</i>
									<img style="display:inline" onClick="document.getElementById(\''.$e2["IDMateria"].'Dc\').submit();" src="'.$RutaRelativaControlador.'img/editar.png" class="img-responsive pull-right"></img>
								</li>
								
							  ';
							
						}
								 
						
						?>
						</ul></div>
						</div>
						<div class="col-md-3" >
						</div>
						</div>
						<div class="row">
						<?php
						$mostrado=array();
						//Se recorren los objetos a mostrar por la vista, recibidos por parametro de la consulta
						// Al ser una relacion primero se recorren todas miembro por miembro
						foreach($Dc as $e)
						{
							if(!in_array($e["Login"], $mostrado))
							{
								echo '
									<div class="col-md-4">
									  <div class="panel panel-primary">
										<div class="panel-heading">
										  <h3 class="panel-title">'.$e["Login"].'</h3>
										</div>
										<ul class="list-group">';
									//Se recorren los objetos a mostrar por la vista, recibidos por parametro de la consulta
									// Y en el segundo bucle se recorren las materias impartidas por cada miembro.
									foreach($Dc as $e2)
									{
										if($e["Login"]==$e2["Login"]){
										echo '
											<form id="'.$e2["IDMateria"].$e2["Login"].'Dc" action="'.$controladores[$identificadoresPrivados["MDocencia"]].'" method="POST">
													<input type="hidden" name="MOD" value="'.$e2["IDMateria"].'|'.$e2["Login"].'" />
													<input type="hidden" name="TIPO" value="D" />
													</form>
											<li class="list-group-item"><i>'.$e2["Nombre_Materia"].'</i><br>-<b> '.$idioma["Fecha"].':</b> '.$e2["FechaIni_Materia"].'
												<img style="display:inline" onClick="document.getElementById(\''.$e2["IDMateria"].$e2["Login"].'Dc\').submit();" src="'.$RutaRelativaControlador.'img/editar.png" class="img-responsive pull-right"></img>
											</li>
											
										  ';
										}
									}
								  echo '</ul></div>
								</div>';
								$mostrado[]=$e["Login"];
							}
						}
						?>
						<div class="col-md-6"></div>
	  </div>
	</div>
	</section>
<?php
	

}

}
	$Dc = array();
	$materias = array();
	//Consultamos datos
	try
	{
		$consulta = $_TABLADOCENCIA->ListadoRegistros(" , S_MATERIAS where S_USUARIO_MATERIA.IDMateria = S_MATERIAS.IDMateria");
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $consulta->num_rows ;$i++)
		{
			
			$Dc[] = $consulta->fetch_assoc();
		}
		$consulta = $_TABLAMATERIAS->ListadoRegistros("");
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $consulta->num_rows ;$i++)
		{
			
			$materias[] = $consulta->fetch_assoc();
		}
	}
	catch(Exception $e)
	{
		//En caso de test no se muestra un mensaje al usuario, sino que se deja salir la excepcion para que la detecte el testeo de errores
		if (!isset($_COOKIE["TEST"]))
		{
			$errorRescrito = explode("=>",$e->getMessage());
			$_SESSION['error'] = 'ERROR CON D'."=>".$errorRescrito[1];
		}
		else
		{
			throw new Exception($e->getMessage());
		}
	}

//Inicializamos la vista Correspondiente
$princ_view = new DocenciaPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma,$Dc,$materias);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
