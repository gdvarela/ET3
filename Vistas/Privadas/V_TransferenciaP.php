<?php

Class TransferenciaPrivada
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
		
	</div>
	</section>
<?php
	

}

}

//Inicializamos la vista Correspondiente
$princ_view = new TransferenciaPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
