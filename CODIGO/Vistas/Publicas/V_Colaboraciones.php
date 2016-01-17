<?php

//=====================================================================================================================
// Fichero :V_Colaboraciones.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 18/12/2015
// Clase que contiene una de las vistas del sistema
//=====================================================================================================================

Class Colaboraciones
{

function __construct()
{
}

function DisplayContent($idioma,$Emp,$Ins,$Grup)
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
                  <h3 class="panel-title"><?php echo $idioma["Empresa"]."s"?></h3>
                </div>
				<ul class="list-group">
				<?php
				//Se recorren los datos recibidos para incluirlos en el HTML
					foreach($Emp as $e)
					{
						echo '<li class="list-group-item">'.$e["Nombre_Empresa"].'<br>-<a href="'.$e["Web_Empresa"].'" target="_blank">WEB</a></li>';
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
						echo '<li class="list-group-item">'.$e["Nombre_Institucion"].'<br>-<a href="'.$e["Web_Institucion"].'" target="_blank">WEB</a></li>';
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
						echo '<li class="list-group-item">'.$e["Nombre_Grupo"].'<br>-<a href="'.$e["Web_Grupo"].'" target="_blank">WEB</a></li>';
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



?>