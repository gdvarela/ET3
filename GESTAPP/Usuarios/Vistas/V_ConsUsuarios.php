<?php

Class ConsUsuario
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
				<div id="histAct">> <?php echo $idioma['Usuarios']?></div>
				<img onClick="window.history.back()" id="historialAtras" src="../../Imagenes/historyBack.png" />
			</div>
			<!-- A partir de aqui meteis vuestro codigo -->
			<div>
				<!-- Filtro que recarga la pagina para mostrar los datos ordenados -->
				<form action="ConsUsuarios.php" method="POST">
					<fieldset  id="filtro" >
					<legend><?php echo $idioma['MSG ORD BUT']?>:</legend>
						<input type="radio" name="ORDER" value="Login"><?php echo $idioma['Login']?></input><br>
						<input type="radio" name="ORDER" value="Nombre"/><?php echo $idioma['USU_nombre']?></input><br>
						<input type="radio" name="ORDER" value="Fecha"/><?php echo $idioma['Fecha']?></input><br>
						<input type="submit" value="<?php echo $idioma['MSG ORD BUT']?>" class="boton" />
					</fieldset>
				</form >
			</div>
			<form action="" method="POST">
			<!-- <h1><?php echo $idioma['TIT CON U'];?></h1> -->
			<table border=1 width=100% style="float:left">
				<tr>
					<th colspan=6"><?php echo $idioma['TIT TAB LIST U']?></th>
				</tr>
				<tr>
					<th><?php echo $idioma['Login']?></th>
					<th><?php echo $idioma['USU_nombre']?></th>
					<th><?php echo $idioma['USU_apellido']?></th>
					<th><?php echo $idioma['USU_fecha_alta']?></th>
					<th><input onclick="this.form.action='DelUsuarios.php';this.form.submit();" type="button" name="btn_borrar_usuarios" value="<?php echo $idioma['Elim Sel']?>"/></th>
					<th><?php echo $idioma['Modificar']?></th>
				</tr>
				<?php
				
					//Variable usada exclusivamente para "CSS"
					$id = "tr1";
					
					//Se recorre el array de usuarios pasadso por parametro desde el controlador
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
								<td style="height:25px;" align=center>' . $var->Login . '</td>
								<td align=center>' . $var->USU_nombre. '</td>
								<td align=center>' . $var->USU_apellido. '</td>
								<td align=center>' . $var->USU_fecha_alta .'</td>
								<td align="center" >';
								if ($var->Login  != $_SESSION['login'])
								{
									//echo '<input disabled type="checkbox" name="ckbx_' .$var->Login  . '" /></td>';
									echo'<div class="flipswitch">
										<input type="checkbox" name="ckbx_' . $var->Login . '" class="flipswitch-cb" id="fs' . $var->Login . '">
										<label class="flipswitch-label" for="fs' . $var->Login . '">
											<div class="flipswitch-inner"></div>
											<div class="flipswitch-switch"></div>
										</div>
									</div>';
								}
						echo '	<td rowspan=2 align=center><input onclick="this.form.action='."'". 'ModUsuarios.php'. "'" .';" type="submit" name="'. $var->Login  .'" value="'.$idioma['Editar'].'"/></td>
							</tr>';
									// VEASE AQUI EL USO DE ID: IRA ALTERNADO VALORES
						echo'	<tr id="'.$id.'2">
								<th style="height:25px;">'.$idioma['Roles'].':</th>
								<td colspan=4>';
								foreach ($var->getRoles() as &$rol)
								{		
									echo  "-". $rol . "  ";
								}
						echo '	</td>
							</tr> ';
					}
				?>
				</table>
				<input type="Button" class="btDestacado" style="float:right;clear:both;" onClick="window.location.href='AltaUsuarios.php'" value="<?php echo $idioma['Nuevo Usuario']?>"/>
				
<?php
	
	
		
	//Fin de cuerpo de pagina

	//incluimos el pie de pagina que llevan todas las paginas de la web
	include '../../Comun/V_Pie.php';

}

}

?>
