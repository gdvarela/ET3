<?php

Class ModFuncionalidad
{

function __construct()
{
}

function Display($idioma,$datosModificar,$claveMod)
{
	include '../../Comun/V_Cabecera.php';
	include '../../Comun/V_MenuLateral.php';
	
	//Aqui va el cuerpo principal de la pagina
?>
<div id="contenido">
	<div id="barraLocalizacion">
		<div>
			<a href="ConsFuncionalidades.php"> 
				> <?php echo $idioma['Funcionalidades']?>
			</a> 
		</div> 
		<div id="histAct"> 
			> <?php echo $idioma['Editar Funcionalidad']?> 
		</div>
		<img onClick="window.history.back()" id="historialAtras" src="../../Imagenes/historyBack.png" alt="Logotipo de Mi Sitio" />
	</div>
	<!-- A partir de aqui meteis vuestro codigo -->
	<form action='ProcesarModFuncionalidades.php' method='POST' onSubmit="return validarForm()">
		<div id="div_cuerpo" >
			<h1><?php echo $idioma['TIT ACT F'];?></h1>
			<h3><?php echo $idioma['F'] .": " . $claveMod;?></h3>
			<input type="hidden" id="validForm" name="validado" value="" />
			<table width=100%>   				   
				<tr>
					<!-- Nombre Funcionalidad -->
					<td >
						<div id="etiqueta"><?php echo $idioma['FUN_nombre']?>:</div>
					</td>
					<!-- Descripcion Funcionalidad -->
					<td>
						<div id="etiqueta"><?php echo $idioma['FUN_descripcion']?>:</div>
					</td>
				</tr>  
				<tr>
					<td width=50%>
						<input type="text" size="20" name="FUN_nombre" onBlur="esVacio(this,'NombreVacio')" value="<?php echo $datosModificar->FUN_nombre; ?>" />
						<input type="hidden" name="FUN_nombreAnt" value="<?php echo $claveMod; ?>" />
						<span id="NombreVacio" class="error"><?php echo$idioma['DATOS VACIOS']; ?></span>
					</td>
					<td rowspan=2>
						<textarea  type="text" cols = "40" rows = "3" name="FUN_descripcion" ><?php echo $datosModificar->FUN_descripcion; ?></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<br><br>
					</td>
					<td>
					</td>
				</tr>				
			</table>
			<table id="tRelaciones">
				<tr>
					<th>
						<?php echo $idioma['MSG R-F']?>:
					</th>
					<th>
						<?php echo $idioma['MSG P-F']?>:
					</th>
				</tr>
				<tr>
				<!-- Usuarios del SISTEMA -->
					<td>
						<div id="relacionesI">
							<table>
								<?php
									for ($i = 0; $i< sizeof($_SESSION['rolesSistema']);$i++)
								{		
									$var = $_SESSION['rolesSistema'][$i];
									echo '<tr>
											<td width=40px></td>
											<td><p>-  ' . $var . '</p></td>';
									
									
										//En caso de recarga de datos introducidos se deben marcar los checkbox
										// segun los datos que habia introducido el usuario
										// en caso contrario simplemente se muestra el check sin marcar
										if (in_array($var,$datosModificar->getRoles()))
										{
											echo '<td><input type="checkbox" checked name="ckbxR_' . $var . '" /></td>';
										}
										else{
											echo '<td><input type="checkbox" name="ckbxR_'.$var.'"/></td>';
										}
									echo '</tr>';
								}
										?>
							</table>
						</div>
					</td>
				<!-- Funcionalidades del SISTEMA -->
					<td>
						<div id="relacionesD">
							<table>
								<?php
								for ($i = 0; $i< sizeof($_SESSION['paginasSistema']);$i++)
								{		
									$var = $_SESSION['paginasSistema'][$i];
									echo '<tr>
											<td width=40px></td>
											<td><p>-  ' . $var . '</p></td>';
									
									
										//En caso de recarga de datos introducidos se deben marcar los checkbox
										// segun los datos que habia introducido el usuario
										// en caso contrario simplemente se muestra el check sin marcar
										if (in_array($var,$datosModificar->getPaginas()))
										{
											echo '<td><input type="checkbox" checked name="ckbxP_' . $var . '" /></td>';
										}
										else{
											echo '<td><input type="checkbox" name="ckbxP_'.$var.'"/></td>';
										}
									echo '</tr>';
								}
								
							?>
							</table>
						</div>
					</td>
				</tr>               
			</table>  
			<input id="bt_aceptar" style="float:right;clear:both;" onClick="esVacio(document.getElementsByName('FUN_nombre')[0],'NombreVacio')"  type="submit" value="<?php echo $idioma['Aceptar']?>" class="btDestacado" />					
		</div>
	</form>
			

<?php
	
	
		
	//Fin de cuerpo de pagina

	//incluimos el pie de pagina que llevan todas las paginas de la web
	include '../../Comun/V_Pie.php';

}

}

?>
