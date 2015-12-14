<?php

Class ConsAcceso
{

function __construct()
{
}

function Display($idioma,$registros)
{
	include '../../Comun/V_Cabecera.php';
	include '../../Comun/V_MenuLateral.php';
	
?>

<div id="contenido">
	<div id="barraLocalizacion">
		<div id="histAct"> > <?php echo $idioma['Accesos']?> </div>
		<img onClick="window.history.back()" id="historialAtras" src="../../Imagenes/historyBack.png" alt="Logotipo de Mi Sitio" />
	</div>
<!-- A partir de aqui meteis vuestro codigo -->
<table width=100% border=1 id="tablaladofiltro">
	<tr>
		<th colspan=3 ><?php echo $idioma['TIT TAB LIST A']?></th>
	</tr>
	<tr>
		<th><?php echo $idioma['Login']?></th><th><?php echo $idioma['PAG_nombre']?></th><th><?php echo $idioma['Fecha/Hora']?></th>
	</tr>
	<?php
		$num = $registros->num_rows;
		for ($i = 0; $i < $num ;$i++)
		{
			
			$TuplaAcceso = $registros->fetch_assoc();
			if ($TuplaAcceso['Permiso'] == 0)
			{
				echo '<tr id="sinPerm"><td align=center >' . $TuplaAcceso['Login'] . '</td><td>' . $TuplaAcceso['PAG_nombre'] . '</td><td align=center>' . $TuplaAcceso['fecha_visita'] . '</td></tr>';
			}
			else{
				if ($TuplaAcceso['Login'] != $_SESSION['login'])
				{
					echo '<tr id="regOtroUser"><td align=center >' . $TuplaAcceso['Login'] . '</td><td>' . $TuplaAcceso['PAG_nombre'] . '</td><td align=center>' . $TuplaAcceso['fecha_visita'] . '</td></tr>';
				}
				else
				{
					echo '<tr id="mio"><td align=center>' . $TuplaAcceso['Login'] . '</td><td>' . $TuplaAcceso['PAG_nombre'] . '</td><td align=center>' . $TuplaAcceso['fecha_visita'] . '</td></tr>';		
				}
			}
		}
	?>
</table>

<?php
	//Fin de cuerpo de pagina

	//incluimos el pie de pagina que llevan todas las paginas de la web
	include '../../Comun/V_Pie.php';

}

}

?>

			