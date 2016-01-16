<?php

Class ERRORPERMPrivada
{

function __construct()
{
}

function DisplayContent($idioma)
{
	//Aqui va el cuerpo principal de la pagina
?>
	<section id="content">
	<div class="container">	 
		<input type="button" onClick="window.history.back();" value="atras" />
	</div>
	</section>
<?php
	

}

}

//Inicializamos la vista Correspondiente
$princ_view = new ERRORPERMPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
