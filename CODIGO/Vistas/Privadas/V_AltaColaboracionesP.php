<?php

//=====================================================================================================================
// Fichero :V_AltaX.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 18/12/2015
// Clase que contiene una de las vistas del sistema En este caso, sera el formulario generado para la inserccion de
// objetos de la BD
//=====================================================================================================================

Class AltaColaboracionesPrivada
{

function __construct()
{
}

function DisplayContent($idioma)
{
	global $NumporPags;
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
					<form role="form" name="FORM" action="<?php echo $procesadores[$identificadoresPrivados["AColaboraciones"]]?>" method="POST">
					<input type="hidden" name="TIPO" value="<?php echo $_POST["TIPO"]?>"/>
					<?php
					$NombreFormulario = $identificadoresPrivados["AColaboraciones"].$_POST["TIPO"];
					
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
	
//Inicializamos la vista Correspondiente
$princ_view = new AltaColaboracionesPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
