<?php

Class ModPagina
{

function __construct()
{
}

function Display( $idioma,$datosMod,$claveMod,$ubiAnt)
{
	include '../../Comun/V_Cabecera.php';
	include '../../Comun/V_MenuLateral.php';
	
	//Aqui va el cuerpo principal de la pagina
?>
<div id="contenido">
	<div id="barraLocalizacion">
		<div><a href="ConsPaginas.php"> > <?php echo $idioma['Paginas']?></a> </div> <div id="histAct"> > <?php echo $idioma['Editar Pagina']?> </div>
			<img onClick="window.history.back()" id="historialAtras" src="../../Imagenes/historyBack.png" />
	</div>
	<form action='ProcesarModPagina.php' method='POST' enctype="multipart/form-data" onSubmit="return validarForm()">
		<div id="div_cuerpo" >
				<h1> <?php echo $idioma['TIT ACT P'];?> </h1>
				<h3><?php echo $idioma['P'] .": " . $claveMod;?></h3>
				<input type="hidden" id="validForm" name="validado" value="" />
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
								echo '<input type="text" name="PAG_nombre" onBlur="esVacio(this,\'NombreVacio\')" value="'.$datosMod->PAG_nombre.'"/>';
								echo '<span id="NombreVacio" class="error">'.$idioma['DATOS VACIOS'].'</span>';
							?>
							<input type='hidden' size="50" maxlength="50" name='PAG_nombreAnt' value="<?php echo $claveMod; ?>">
						</td>
						<td rowspan=2>
							<?php 
								echo '<textarea name="PAG_descripcion" cols = "40" rows = "3" >'.$datosMod->PAG_descripcion.'</textarea>';
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
								echo '<input type="text" size="70" onBlur="esUbiCorrecta(this,\'UbiVacio\',\'UbiPath\')" name="PAG_ubicacion" value="'.$datosMod->PAG_ubicacion.'"/>';
								echo '<span id="UbiVacio" class="error">'.$idioma['DATOS VACIOS'].'</span>';
								echo '<span id="UbiPath" class="error">'.$idioma['ERR UBI'].'</span>';
							?>
							<input type='hidden' size="50" maxlength="50" name='PAG_ubicacionAnt' value="<?php echo $ubiAnt; ?>">
						</td>
					</tr>
					<tr>
						<td colspan=2>
							<br>
						</td>
					</tr>
					<tr>
						<td colspan=2>
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
									if (in_array($var,$datosMod->getUsuarios()))
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
									if (in_array($var,$datosMod->getFuncionalidades()))
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
				<input type='submit' class="btDestacado" onClick="esUbiCorrecta(document.getElementsByName('PAG_ubicacion')[0],'UbiVacio','UbiPath');esVacio(document.getElementsByName('PAG_nombre')[0],'NombreVacio')" style="float:right;clear:both;" name='accion' value='<?php echo $idioma['Aceptar']?>'>
			</div>	
	</form>
				

<?php
	
	
		
	//Fin de cuerpo de pagina

	//incluimos el pie de pagina que llevan todas las paginas de la web
	include '../../Comun/V_Pie.php';

}

}

?>
