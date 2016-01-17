<?php 

//=====================================================================================================================
// Fichero :V_Transferencia.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 18/12/2015
// Clase que contiene una de las vistas del sistema
//=====================================================================================================================

Class Transferencia
{

function __construct()
{
}

function DisplayContent($idioma,$Pa,$Po,$Co)
{
	global $RutaRelativaControlador;
	//Aqui va el cuerpo principal de la pagina
?>
	<section id="content">
	<div class="container">	 
		
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
						echo '<li class="list-group-item"><i>'.$e["Nombre_Patente"].'</i><br>-<b> '.$idioma["Fecha"].':</b> '.$e["Fecha_Patente"].'
						</li>';
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
						echo '<li class="list-group-item"><i>'.$e["Nombre_Proyecto"].'</i><br>-<b>'.$idioma["Descripcion"].':</b> '.$e["Descripcion_Proyecto"].'
						</li>';
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
						echo '<li class="list-group-item"><i>'.$e["Nombre_Contrato"].'</i><br>-<b>ID '.$idioma["Empresa"].':</b> '.$e["IDEmpresa"].'<br>-<b>'.$idioma["Duracion"].':</b> '.$e["FechaIni_Contrato"].' || '.$e["FechaFin_Contrato"].'
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

	// CARGA DE DATOS (DESPUES SE USARA EN ControladorWEB.php)
	
	$a = array();
	$b = array();
	$c = array();
	//Consultamos datos
	try
	{
		$consulta = $_TABLAPATENTES->ListadoRegistros("");
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $consulta->num_rows ;$i++)
		{
			$a[] = $consulta->fetch_assoc();
		}
		$consulta = $_TABLAPROYECTOS->ListadoRegistros("");
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $consulta->num_rows ;$i++)
		{
			$b[] = $consulta->fetch_assoc();
		}
		$consulta = $_TABLACONTRATOS->ListadoRegistros("");
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
			$_SESSION['error'] = 'ERROR CON T'."=>".$errorRescrito[1];
		}
		else
		{
			throw new Exception($e->getMessage());
		}
	}
?>