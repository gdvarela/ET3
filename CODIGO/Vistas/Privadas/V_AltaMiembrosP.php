<?php

Class AltaMiembrosPrivada
{

function __construct()
{
}

function DisplayContent($idioma)
{
	global $formularios;
	global $procesadores;
	global $controladores;
	global $identificadoresPrivados;
	global $RutaRelativaControlador;
	//Aqui va el cuerpo principal de la pagina
?>
	<section id="content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<form role="form" name="FORM" action="<?php echo $procesadores[$identificadoresPrivados["AMiembros"]]?>" method="POST">
					<?php
					foreach($formularios[$identificadoresPrivados["AMiembros"]] as $campos)
					{
						global $generador;
						include $generador;
						
					}
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
	$princ_view = new AltaMiembrosPrivada();

	//Se procede a la creacion de la vista
	include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
	$princ_view->DisplayContent($idioma);
	include_once$RutaRelativaControlador.'Comun/Pie.php';

?>