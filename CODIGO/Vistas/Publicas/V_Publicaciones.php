<?php

//=====================================================================================================================
// Fichero :V_Transferencia.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 18/12/2015
// Clase que contiene una de las vistas del sistema
//=====================================================================================================================

Class Publicaciones
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
		
		<div class="row">
            <div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $idioma["Libro"]."s"?></h3>
                </div>
				<ul class="list-group">
				<?php
				//Se recorren los datos recibidos para incluirlos en el HTML
					foreach($Lib as $e)
					{
						
						echo '<li class="list-group-item">
						<blockquote>
							<p>
									'.$e["Titulo_Libro"].'
							</p> <small> '.$e["ISBN"].', <cite>'.$e["Fecha_Libro"].'</cite></small>
							
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
					//Se recorren los datos recibidos para incluirlos en el HTML
					foreach($Art as $e)
					{
						
						echo '<li class="list-group-item">
						<blockquote>
							<p>
									'.$e["Titulo_Articulo"].'
							</p> <small> '.$e["Nombre_Revista"].', <cite>'.$e["Fecha_Articulo"].'</cite></small>
							
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
					//Se recorren los datos recibidos para incluirlos en el HTML
					foreach($Conf as $e)
					{
						
						echo '<li class="list-group-item">'.$e["Nombre_Conferencia"].'<br>-'.$e["Charla_Conferencia"].'<br>-'.$e["Fecha_Conferencia"].'
						
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
		//En caso de test no se muestra un mensaje al usuario, sino que se deja salir la excepcion para que la detecte el testeo de errores
		if (!isset($_COOKIE["TEST"]))
		{
			$errorRescrito = explode("=>",$e->getMessage());
			$_SESSION['error'] = 'ERROR CON Pu'."=>".$errorRescrito[1];
		}
		else
		{
			throw new Exception($e->getMessage());
		}
	}

?>
