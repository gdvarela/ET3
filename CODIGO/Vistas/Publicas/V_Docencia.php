<?php

Class Docencia
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
			</div>
						<div class="col-md-6" >
						 <div class="panel panel-primary">
									<div class="panel-heading">
									  <h3 class="panel-title"><?php echo $idioma["MatImpr"];?></h3>
									</div>
									<ul class="list-group">
						<?php
						 //Se recorren los datos recibidos para incluirlos en el HTML
						foreach($materias as $e2)
						{
							echo '
							
								
								<li class="list-group-item"><i>'.$e2["Nombre_Materia"].'</i>
									
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
						//Se recorren los datos recibidos para incluirlos en el HTML
						// Como es una relacion doble primero se recorre para ir 1 a 1 por los miembros
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
									//Se recorren los datos recibidos para incluirlos en el HTML
									//En el segundo bucle, para cada miembro externo se muestran sus materias que imparten
									foreach($Dc as $e2)
									{
										if($e["Login"]==$e2["Login"]){
										echo '
											
											<li class="list-group-item"><i>'.$e2["Nombre_Materia"].'</i><br>-<b> '.$idioma["Fecha"].':</b> '.$e2["FechaIni_Materia"].'
												
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


?>
