<?php

//=====================================================================================================================
// Fichero :V_AltaX.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 18/12/2015
// Clase que contiene una de las vistas del sistema En este caso, sera el formulario generado para la inserccion de
// objetos de la BD
//=====================================================================================================================

Class AltaPrensaPrivada
{

function __construct()
{
}

function DisplayContent($idioma)
{
	global $formularios;
	global $procesadores;
	global $identificadoresPrivados;
	global $controladores;
	global $RutaRelativaControlador;
	//Aqui va el cuerpo principal de la pagina
?>
	<section id="content">
		<div class="container">
					  <div class="row">
				<div class="col-md-12">
					<form role="form" name="FORM" action="<?php echo $procesadores[$identificadoresPrivados["APrensa"]]?>" method="POST">
					<?php
					$NombreFormulario = $identificadoresPrivados["APrensa"];
					
					// En $NombreFormulario  se pone el nombre del formulario correspondiente que se tenga que mostrar y crea dinamicamente los campos necesarios
					// en funcion de lo indicado en lo que pongais en Archivo Comun. No es que sea lo mas eficiente del mundo pero almenos
					// facilita el trabajo en grupo permitiendo modificaciones rapidamente y centralizadas a un único fichero
					
					 //Se accede a la variable global $generador que contiene la direccion del fichero en cuestion.
					 // Se hace asi por si en futuras iteraciones se decide cambiar de lugar, no tener que ir vista por vista cambiandolo, basta
					 // con cambiar la variable y las vistas siempre acceder al fichero.
					 
					global $generador;
					include $generador;
					?>
					<button type="submit" class="btn btn-default"><?php echo $idioma["Aceptar"]?></button>
					<button class="btn btn-default" onClick="window.history.back()"><?php echo $idioma["Cancelar"]?></button>
					</form>
				</div>
			</div>
		</div>
	</section>
<?php
	

}

}
	$noticias = array ();
		//Consultamos datos
		try
		{
			$consulta = $_TABLANOTICIAS->ListadoRegistros("");
			//Con los datos los cargamos en el array
			for ($i = 0; $i < $consulta->num_rows ;$i++)
			{
				$noticias[] = $consulta->fetch_assoc();
			}
		}
		catch(Exception $e)
		{
			$errorRescrito = explode("=>",$e->getMessage());
			$_SESSION['error'] = 'CON ERR NOTICIAS'."=>".$errorRescrito[1];
		}

		
		
		$pagCargar = 1;
		if (isset($_POST['NumPag']))
		{
			$pagCargar =$_POST['NumPag'];
			if ($pagCargar < 1)
				$pagCargar = 1;
			
			if($pagCargar > ceil(count($noticias)/$NumporPags))
				$pagCargar = ceil(count($noticias)/$NumporPags);
		}
//Inicializamos la vista Correspondiente
$princ_view = new AltaPrensaPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
