<?php

Class Principal
{

function __construct()
{
}

function Display($idioma)
{
	include '../../Comun/V_Cabecera.php';
	include '../../Comun/V_MenuLateral.php';
	
	//Aqui va el cuerpo principal de la pagina
	
	echo '
	<div id="contenido">
		<div id="barraLocalizacion">
			<div id="histAct"> > '.$idioma['Bienvenida'].' </div>
			<img onClick="window.history.back()" id="historialAtras" src="../../Imagenes/historyBack.png"  />
		</div>
		<table border=3 width=100%>
			<tr>
				<th>
					<h1>'. $idioma['MSG Bienvenida'].'</h1>
				</th>
			</tr>
		</table>';
	
	
		
	//Fin de cuerpo de pagina

	//incluimos el pie de pagina que llevan todas las paginas de la web
	include '../../Comun/V_Pie.php';

}

}

?>

			
				
				