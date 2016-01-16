<?php

Class AltaPagina
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
			<a href="ConsPaginas.php"> > <?php echo $idioma['Paginas']?></a> 
		</div> 
		<div id="histAct"> 
			> <?php echo $idioma['Nueva Pagina']?> 
		</div>
		<img onClick="window.history.back()" id="historialAtras" src="../../Imagenes/historyBack.png" alt="Logotipo de Mi Sitio" />
	</div>
	<!-- A partir de aqui meteis vuestro codigo -->
	<form action='ProcesarAltaPagina.php' method='POST' enctype="multipart/form-data" onSubmit="return validarForm()">
		<div id="div_cuerpo" >
			<h1> <?php echo $idioma['TIT ALT P'];?> </h1>
			<?php
			if ($datosPrevios->PAG_nombre == "") 
				echo '<input type="hidden" id="validForm" name="validado" value="PAG_nombrePAG_ubicacion1" disabled />';
			else
				echo '<input type="hidden" id="validForm" name="validado" value=""  />';
		?> 
			
			<table width=100%>
				<tr>
					<td>
						<div id="etiqueta"><?php echo $idioma['PAG_nombre'];?>:</div> 
					</td>
					<td>
						<div id="etiqueta"><?php echo $idioma['PAG_descripcion'];?>:</div> 
					</td>
					
				</tr>
				<tr>
					<td width=50%>
						<?php 
							echo '<input type="text" name="PAG_nombre" onBlur="esVacio(this,\'NombreVacio\')" value="'.$datosPrevios->PAG_nombre.'"/>';
							echo '<span id="NombreVacio" class="error">'.$idioma['DATOS VACIOS'].'</span>';
						?>
					</td>
					<td rowspan=2>
						<?php 
							echo '<textarea name="PAG_descripcion" cols = "40" rows = "3" >'.$datosPrevios->PAG_descripcion.'</textarea>';
						?>
					</td>
				</tr>
				<tr>
					<td>
						<br><br>
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td colspan=2>
						<div id="etiqueta"><?php echo $idioma['PAG_ubicacion'];?>:</div> 
					</td>
				</tr>
				<tr>
					<td colspan=2>
						<?php 
							echo '<input type="text" size="70" onBlur="esUbiCorrecta(this,\'UbiVacio\',\'UbiPath\')" name="PAG_ubicacion" value="'.$datosPrevios->PAG_ubicacion.'"/>';
							echo '<span id="UbiVacio" class="error">'.$idioma['DATOS VACIOS'].'</span>';
							echo '<span id="UbiPath" class="error">'.$idioma['ERR UBI'].'</span>';
						?>
						<img style="float:right" width='20px' align='center' src='../../Imagenes/interrogacion.png' onClick="cambiarAyuda();"></img>
						<div id="explicativo" style="display:none">
							<?php echo "<img align='center' src='../../Imagenes/ex".$_SESSION['idioma'].".png' />"; ?>
							<span><?php echo $idioma['EXPLICACION']; ?></span>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan=2>
					<?php
						echo $idioma['DET DIR'];
					?>
					</td>
				</tr>
				<tr>
					<td colspan=2 style="padding-top:20px;" >
						<div id="etiqueta"><?php echo $idioma['FILE'];?></div>
					</td>
				</tr>
				<tr>
					<td colspan=2>
						<input type="file" name="PAG_fichero" accept=".php,.html"></input>
					</td>
				</tr>
			</table>
			<table id="tRelaciones" >
				<tr>
					<th> <?php echo $idioma['MSG U-P'];?> </th><th> <?php echo $idioma['MSG F-P'];?> </th>
				</tr>
				<tr>
					<td>
					<div id="relacionesI">
					<!-- Usuarios del SISTEMA -->
						<table>
						<?php
							foreach ($_SESSION['usuariosSistema'] as &$var)
							{		
								echo '<tr>
										<td width=40px></td>
										<td><p>-  ' . $var . '</p></td>';
								
								//En caso de recarga de datos introducidos se deben marcar los checkbox
								// segun los datos que habia introducido el usuario
								// en caso contrario simplemente se muestra el check sin marcar
								if (in_array($var,$datosPrevios->getUsuarios()))
								{
									echo '<td><input type="checkbox" checked=true name="ckbxU_' . $var . '" /></td>';
								}
								else
								{
									echo '<td><input type="checkbox" name="ckbxU_' . $var . '" /></td>';
									
								}
								echo '</tr>';
							}
							
						?>
						</table>
					</div>
					</td>
					<td>
						<div id="relacionesI">
					<!-- Funcionalidades del SISTEMA -->
						<table>
						<?php
							foreach ($_SESSION['funcionalidadesSistema'] as &$var)
							{		
								echo '<tr>
										<td width=40px></td>
										<td><p>-  ' . $var . '</p></td>';
								
								//En caso de recarga de datos introducidos se deben marcar los checkbox
								// segun los datos que habia introducido el usuario
								// en caso contrario simplemente se muestra el check sin marcar
								if (in_array($var,$datosPrevios->getFuncionalidades()))
								{
									echo '<td><input type="checkbox" checked=true name="ckbxF_' . $var . '" /></td>';
								}
								else
								{
									echo '<td><input type="checkbox" name="ckbxF_' . $var . '" /></td>';
									
								}
								echo '</tr>';
							}
							
						?>
						</table>
						</div>
					</td>
				</tr> 				
			</table>
			<input type='Submit' class="btDestacado" onClick="esUbiCorrecta(document.getElementsByName('PAG_ubicacion')[0],'UbiVacio','UbiPath');esVacio(document.getElementsByName('PAG_nombre')[0],'NombreVacio')" style="float:right;clear:both;" name='botonSubmit' id="botonSubmit" value='<?php echo $idioma['Aceptar']?>'>
		</div>	
	</form>
				

<?php
	
	
		
	//Fin de cuerpo de pagina

	//incluimos el pie de pagina que llevan todas las paginas de la web
	include '../../Comun/V_Pie.php';

}

}

?>
