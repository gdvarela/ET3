<?php

Class ConsFuncionalidad
{

function __construct()
{
}

function Display($idioma,$objects)
{
	include '../../Comun/V_Cabecera.php';
	include '../../Comun/V_MenuLateral.php';
	
	//Aqui va el cuerpo principal de la pagina
?>
<div id="contenido">
			<div id="barraLocalizacion">
				<div id="histAct">> <?php echo $idioma['Funcionalidades']?> </div>
				<img onClick="window.history.back()" id="historialAtras" src="../../Imagenes/historyBack.png"  />
			</div>
			<!-- A partir de aqui meteis vuestro codigo -->
			<form action="" method="POST">
			<!--<h1><?php echo $idioma['TIT CON F'];?></h1>-->
			<table border=1 width=100%>
				<tr>
					<th colspan=4><?php echo $idioma['TIT TAB LIST F']?></th>
				</tr>
				<tr>
					<th><?php echo $idioma['FUN_nombre']?></th>
					<th><?php echo $idioma['MSG P-F']?></th>
					<th><input type="Button" onclick="this.form.action='DelFuncionalidades.php';this.form.submit();" name="btn_borrar_usuarios" value="<?php echo $idioma['Elim Sel']?>"/></th>
					<th><?php echo $idioma['Modificar']?></th>
				</tr>
				<?php
					//Variable usada exclusivamente para "CSS"
					$id = "tr1";
					
					//Se recorre el array de objetos pasadso por parametro desde el controlador
					foreach ($objects as &$var)
					{
						//Se cambia la variable alternando los valores
						// USO DE CSS PARA EL COLOR DE LAS FILAS DE FORMA ALTERNADA
						if ($id == "tr1")
						{
							$id = "tr2";
						}
						else
						{
							$id = "tr1";
						}
						
						//Construccion de la tabla
						echo '<tr id="'.$id.'">
								<td align=center>' . $var->FUN_nombre . '</td>
								<td align="center" >';
						foreach ($var->getPaginas() as &$var2)
						{		
							echo  "-". $var2 . "  ";
						}
						echo '</td>
						<td rowspan=2 align=center><div class="flipswitch">
										<input type="checkbox" name="ckbx_' . $var->FUN_nombre . '" class="flipswitch-cb" id="fs' . $var->FUN_nombre . '">
										<label class="flipswitch-label" for="fs' . $var->FUN_nombre . '">
											<div class="flipswitch-inner"></div>
											<div class="flipswitch-switch"></div>
										</div>
									</div></td>
						<td rowspan=2 align=center><input onclick="this.form.action='."'". 'ModFuncionalidades.php'. "'" .';" type="submit" name="'. $var->FUN_nombre.'" value="'.$idioma['Editar'].'"/></td></tr>';
						echo '<tr id="'.$id.'2">
								<th>'. $idioma['FUN_descripcion'] .':</th>
								<td colspan=2>'. $var->FUN_descripcion.'</td></tr>';
					}
					?>
				</table>
				</form>
				<input type="Button"  style="float:right;clear:both;" class="btDestacado" onClick="window.location.href='AltaFuncionalidades.php'" value="<?php echo $idioma['Nueva Funcionalidad']?>"/>
<?php
	
	
		
	//Fin de cuerpo de pagina

	//incluimos el pie de pagina que llevan todas las paginas de la web
	include '../../Comun/V_Pie.php';

}

}

?>
