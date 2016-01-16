<?php

//=====================================================================================================================
// Fichero :V_Actividades.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 18/12/2015
// Clase que contiene una de las vistas del sistema
//=====================================================================================================================

Class Actividades
{

function __construct()
{
}

function DisplayContent($idioma,$ED,$RE,$Conf)
{
	global $RutaRelativaControlador;
	//Aqui va el cuerpo principal de la pagina
?>
	<section id="content">
		<div class="container content">		
        <div class="row">
            <div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $idioma["Editorial"]."s"?></h3>
                </div>
				<ul class="list-group">
				<?php
					//Se recorren los datos recibidos para incluirlos en el HTML
					foreach($ED as $e)
					{
						echo '<li class="list-group-item">
						<blockquote>
							<p>
									'.$e["Titulo_Tablon"].'
							</p> <small> '.$e["ISSN_Tablon"].', <cite>'.$e["Fecha_Tablon"].'</cite></small>
						</blockquote>
						</li>';
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
					//Se recorren los datos recibidos para incluirlos en el HTML
					foreach($RE as $e)
					{
						echo '<li class="list-group-item">
						<blockquote>
							<p>
									'.$e["Titulo_Revista"].'
							</p> <small> '.$e["ISSN_Revista"].', <cite>'.$e["Fecha_Revista"].'</cite></small>
						</blockquote>
						</li>';
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
					//Se recorren los datos recibidos para incluirlos en el HTML
					foreach($Conf as $e)
					{
						echo '<li class="list-group-item">'.$e["Titulo_Conferencia_Org"].'<br>-'.$e["Fecha_Conferencia_Org"].'</li>';
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



?>