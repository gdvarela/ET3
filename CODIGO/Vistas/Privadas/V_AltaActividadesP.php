<?php

Class AltaActividadesPrivada
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
					<form role="form" name="FORM" action="<?php echo $procesadores[$identificadoresPrivados["AActividades"]]?>" method="POST">
					<input type="hidden" name="TIPO" value="<?php echo $_POST["TIPO"]?>"/>
					<?php
					foreach($formularios[$identificadoresPrivados["AActividades"].$_POST["TIPO"]] as $campos)
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
$princ_view = new AltaActividadesPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
