<?php

Class ConsRol
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
				<div id="histAct">> <?php echo $idioma['Roles']?> </div>
				<img onClick="window.history.back()" id="historialAtras" src="../../Imagenes/historyBack.png" alt="Logotipo de Mi Sitio" />
			</div>
			<!-- A partir de aqui meteis vuestro codigo -->
			<form action="" method="POST">
			<!--<h1><?php echo $idioma['TIT CON R'];?></h1>-->
			<table border=1 width=100%>
				<tr>
					<th colspan=5><?php echo $idioma['TIT TAB LIST R']?></th>
				</tr>
				<tr>
					<th><?php echo $idioma['ROL_nombre']?></th>
					<th><?php echo $idioma['MSG U-R']?></th>
					<th><?php echo $idioma['MSG F-R']?></th>
					<th><input type="Button" onclick="this.form.action='DelRoles.php';this.form.submit();" name="btn_borrar_usuarios" value="<?php echo $idioma['Elim Sel']?>"></th>
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
								<td align=center>' . $var->ROL_nombre . '</td>
								<td align="center" >';
						foreach ($var->getUsuarios() as &$var2)
						{		
							echo  "-". $var2 . "  ";
						}
						echo '</td><td>';
						foreach ($var->getFuncionalidades() as &$var2)
						{		
							echo  "-". $var2 . "  ";
						}
						echo '</td>
						<td rowspan=2 align=center><div class="flipswitch">
										<input type="checkbox" name="ckbx_' . $var->ROL_nombre . '" class="flipswitch-cb" id="fs' . $var->ROL_nombre . '">
										<label class="flipswitch-label" for="fs' . $var->ROL_nombre . '">
											<div class="flipswitch-inner"></div>
											<div class="flipswitch-switch"></div>
										</div>
									</div></td>
						<td rowspan=2 align=center><input onclick="this.form.action='."'". 'ModRoles.php'. "'" .';" type="submit" name="'. $var->ROL_nombre .'" value="'.$idioma['Editar'].'"/></td></tr>';
						echo '<tr id="'.$id.'2">
								<th>'. $idioma['ROL_descripcion'] .':</th>
								<td colspan=2>'. $var->ROL_descripcion.'</td></tr>';
					}
				?>
				</table>
				</form>
			<input type="Button" class="btDestacado" style="float:right;clear:both;" onClick="window.location.href='AltaRoles.php'" value="<?php echo $idioma['Nuevo Rol']?>"/>
<?php
	
	
		
	//Fin de cuerpo de pagina

	//incluimos el pie de pagina que llevan todas las paginas de la web
	include '../../Comun/V_Pie.php';

}

}

?>
