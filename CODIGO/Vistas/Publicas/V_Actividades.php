<?php

Class Actividades
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
		
					  <div class="row">
            <div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $idioma["Editorial"]."es"?></h3>
                </div>
				<ul class="list-group">
				<?php
					foreach($Ed as $e)
					{
						
						echo '<li class="list-group-item">
						<blockquote>
							<p>
									'.$e["Titulo_Tablon"].'
							</p> <small> '.$e["ISSN_Tablon"].', <cite>'.$e["Fecha_Tablon"].'</cite></small>
							
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
					foreach($Re as $e)
					{
						
						echo '<li class="list-group-item">
						<blockquote>
							<p>
									'.$e["Titulo_Revista"].'
							</p> <small> '.$e["ISSN_Revista"].', <cite>'.$e["Fecha_Revista"].'</cite></small>
							
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
					foreach($Co as $e)
					{
						
						echo '<li class="list-group-item">'.$e["Titulo_Conferencia_Org"].'<br>-'.$e["Fecha_Conferencia_Org"].'
						
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
		$errorRescrito = explode("=>",$e->getMessage());
		$_SESSION['error'] = 'CON ERR MIEMBROS'."=>".$errorRescrito[1];
	}


?>
