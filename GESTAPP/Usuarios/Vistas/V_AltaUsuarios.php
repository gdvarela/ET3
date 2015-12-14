<?php

Class AltaUsuario
{

function __construct()
{
}

function Display($idioma,$datosPrevios)
{
	include '../../Comun/V_Cabecera.php';
	include '../../Comun/V_MenuLateral.php';
	
		
	//Aqui va el cuerpo principal de la pagina
?>
<div id="contenido">
	<div id="barraLocalizacion">
		<div>
			<a href="ConsUsuarios.php"> > <?php echo $idioma['Usuarios'];?></a>
		</div> 
		<div id="histAct">
			> <?php echo $idioma['Nuevo Usuario'];?>
		</div>
		<img onClick="window.history.back()" id="historialAtras" src="../../Imagenes/historyBack.png" alt="Logotipo de Mi Sitio" />
	</div>
	<!-- A partir de aqui meteis vuestro codigo -->
	<form action='procesaAltaUsu.php' method='POST' onSubmit="return validarForm()" >
	<div id="div_cuerpo" >
		<h1><?php echo $idioma['TIT ALT U'];?></h1>
		<?php
			if ($datosPrevios->Login == "") 
				echo '<input type="hidden" id="validForm" name="validado" value="LoginPassUSU_email" disabled />';
			else
				echo '<input type="hidden" id="validForm" name="validado" value=""  />';
		?> 
		
		<table width=100%>
			<tr>
				<td >
				<!-- LOGIN USER -->
					<div id="etiqueta">
						<?php echo $idioma['Login'];?>:
					</div>
				</td>
				<td >
				
				</td>
				<td >
				<!-- PASS USER -->
					<div id="etiqueta">
						<?php echo $idioma['Pass'];?>:
					</div>
				</td>
			</tr>         
			<tr>
				<td colspan=2>
					<?php 
						echo '<input type="text" maxlength="20" legth="20" name="Login" onBlur="esVacio(this,\'LoginVacio\')" value="'.$datosPrevios->Login.'" width="100%"/>';
						?>
					<?php 
						echo '<span id="LoginVacio" class="error">'.$idioma['DATOS VACIOS'].'</span>';
					?>
				</td>
				<td>
					<?php 
						echo '<input type="password" id="Pass" name="Pass" onBlur="esPassValida(this,8,\'PassComp\')" value="'.$datosPrevios->Pass.'" width="100%"/>';
						echo '<span id="PassComp" class="error">'.$idioma['FORMAT PASS'].'</span>';
					?>
				</td>
			</tr>         
			<tr>
				<td>
				<!-- NOMBRE USER -->
					<div id="etiqueta">
						<?php echo $idioma['USU_nombre'];?>:
					</div> 
				</td>
				<td >
				
				</td>
				<td >
				<!-- PASS USER COMFIRM -->
					<div id="etiqueta">
						<?php echo $idioma['CONFIRM PASS'];?>:
					</div>
				</td>
			</tr>         
			<tr>
				<td>
					<?php
						echo '<input type="text" name="USU_nombre" value="'.$datosPrevios->USU_nombre.'"/>';
					?>
				</td>
				<td >
				
				</td>
				<td>
					<?php 
						echo '<input type="password" id="Igual" name="Igual" onBlur="esPassCoincide(this,\'ErrorI\')" value="'.$datosPrevios->Pass.'" width="100%"/>';
						echo '<span id="ErrorI" class="error">'.$idioma['CONFIRM PASS ERROR'].'</span>';
					?>
				</td>
			</tr>  
			<tr>
				<td>
				<!-- APELLIDO USER -->
					<div id="etiqueta">
						<?php echo $idioma['USU_apellido'];?>:
					</div> 
				</td>
			</tr>         
			<tr>
				<td>
					<?php
						echo '<input type="text" name="USU_apellido" value="'.$datosPrevios->USU_apellido.'"/>';
					?>
				</td>
			</tr> 
			<tr>
				<td>
				<!-- EMAIL USER -->
					<div id="etiqueta">
						<?php echo $idioma['USU_email'];?>:
					</div> 
				</td>
			</tr>         
			<tr>
				<td>
					<?php
						echo '<input type="text" name="USU_email" onBlur="esMail(this,\'MailCorrecto\')" value="'.$datosPrevios->USU_email.'"/>';
						echo '<span id="MailCorrecto" class="error">'.$idioma['MAIL INC'].'</span>';
					?>
				</td>
			</tr>  
		</table>
		<table id="tRelaciones" >
			<tr>
				<th> <?php echo $idioma['MSG R-U'];?> </th><th> <?php echo $idioma['MSG P-U'];?> </th>
			</tr>
			<tr>
				<td>
					<div id="relacionesI">
						<!-- ROLES del SISTEMA -->
						<table>
							<?php
								//Listado de los Roles
								foreach ($_SESSION['rolesSistema'] as &$var)
								{		
									echo '<tr>
											<td width=40px></td>
											<td><p>-  ' . $var . '</p></td>';
									
									//En caso de recarga de datos introducidos se deben marcar los checkbox
									// segun los datos que habia introducido el usuario
									// en caso contrario simplemente se muestra el check sin marcar
									if (in_array($var,$datosPrevios->getRoles()))
									{
										echo '<td><input type="checkbox" checked=true name="ckbxR_' . $var . '" /></td>';
									}
									else
									{
										echo '<td><input type="checkbox" name="ckbxR_' . $var . '" /></td>';
										
									}
									echo '</tr>';
								}
								
							?>
						</table>
					</div>
				</td>
				<td>
					<div id="relacionesD">
					<!-- PAGINAS del SISTEMA -->
						<table>
						<?php
							foreach ($_SESSION['paginasSistema'] as &$var)
							{		
								echo '<tr>
										<td width=40px></td>
										<td><p>-  ' . $var . '</p></td>';
								
								//En caso de recarga de datos introducidos se deben marcar los checkbox
								// segun los datos que habia introducido el usuario
								// en caso contrario simplemente se muestra el check sin marcar
								if (in_array($var,$datosPrevios->getPaginas()))
								{
									echo '<td><input type="checkbox" checked=true name="ckbxP_' . $var . '" /></td>';
								}
								else
								{
									echo '<td><input type="checkbox" name="ckbxP_' . $var . '" /></td>';
									
								}
								echo '</tr>';
							}
							
						?>
						</table>
					</div>
				</td>
			</tr>
		</table>
		<input id="bt_aceptar" id="submitButton" onClick="esVacio(document.getElementsByName('Login')[0],'LoginVacio');esPassValida(document.getElementsByName('Pass')[0],8,'PassComp');esPassCoincide(document.getElementsByName('Igual')[0],'ErrorI');esMail(document.getElementsByName('USU_email')[0],'MailCorrecto')" style="float:right;clear:both;" type="submit" value="<?php echo $idioma['Aceptar']?>" class="btDestacado" />
					  
	</div>
	</form>

<?php
	
	
		
	//Fin de cuerpo de pagina

	//incluimos el pie de pagina que llevan todas las paginas de la web
	include '../../Comun/V_Pie.php';

}

}

?>

