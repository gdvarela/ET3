<?php

Class ConsPagina
{

function __construct()
{
}

function Display($idioma,$objects)
{
	
	//Obtenemos la lista de funcionalidades para ponerlas en el filtro
	$mostrar = true;
	try
	{
		if(Acceso::ConPermisosSinRed($_SESSION['login'],'/Funcionalidades/Controladores/ConsFuncionalidades.php')==0)
		{
			$mostrar = false;
		}
	}
	catch(Exception $e)
	{
		$_SESSION['error'] = $e->getMessage();
		$mostrar = false;
	}
	
	
	try
	{
		$conexion = new BaseDatosControl();
		
		$consultaDeFuncionalidades = Funcionalidad::ListadoFuncionalidades("");
		$num = $consultaDeFuncionalidades->num_rows;
	}
	catch(Exception $e)
	{
		$errorRescrito = explode("=>",$e->getMessage());
		$_SESSION['error'] = 'ERROR OBT FILTRO'."=>".$errorRescrito[1];
		$num = 0;
	}
	include '../../Comun/V_Cabecera.php';
	include '../../Comun/V_MenuLateral.php';
	
	//Aqui va el cuerpo principal de la pagina
?>

<div id="contenido">
		<div id="barraLocalizacion">
			<div id="histAct"> > <?php echo $idioma['Paginas']?> </div>
			<img onClick="window.history.back()" id="historialAtras" src="../../Imagenes/historyBack.png"  />
		</div>
		 
		<?php 
			if(!$mostrar)
			{
				echo ' <fieldset style="display:none;">';
			}
			else
			{
				echo ' <fieldset id="filtro">';
			}
		?>
				<legend><?php echo $idioma['MSG FIL']?>: </legend>
				<form action="../Controladores/ConsPaginas.php" method="POST">
				
					<?php
					for ($i = 0; $i < $num ;$i++)
					{
						$TuplaAcceso = $consultaDeFuncionalidades->fetch_assoc();
						
						echo '<input type="checkbox" name="filter_' . $TuplaAcceso['FUN_nombre'] . '" value="'. $TuplaAcceso['FUN_nombre'] .'">' . $TuplaAcceso['FUN_nombre'] .' </input><br>' ;
					}
					?>
					<input type="submit" style="clear:both;float:right;" value="<?php echo $idioma['MSG FIL BUT']?>" class="boton" />
				</form>
			</fieldset>
			<form action="" method="POST">
			<!--<h1><?php echo $idioma['TIT CON P'];?></h1>-->
				<table id="tablaladofiltro" border=1 width=100% style="float:left">
					<tr>
						<th colspan=5><?php echo $idioma['TIT TAB LIST P']?></th>
					</tr>
					<tr>
						<th> <?php echo $idioma['PAG_nombre']?> 		 </th>
						<th> <?php echo $idioma['PAG_descripcion']?>     </th>
						<th> <?php echo $idioma['MSG F-P']?> </th>
						<th> <input  onclick="this.form.action='DelPaginas.php';this.form.submit();" type="Button" name="btn_borrar_usuarios" value="<?php echo $idioma['Elim Sel']?>"/> </th>
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
								<td align=center>' . $var->PAG_nombre . '</td>
								<td align=center>' . $var->PAG_descripcion . '</td>
								<td align="center" >';
						foreach ($var->getFuncionalidades() as &$var2)
						{		
							echo  "-". $var2 . "  ";
						}
						echo '</td>
						<td rowspan=2 align=center><div class="flipswitch">
										<input type="checkbox" name="ckbx_' . $var->PAG_nombre . '" class="flipswitch-cb" id="fs' . $var->PAG_nombre . '">
										<label class="flipswitch-label" for="fs' . $var->PAG_nombre . '">
											<div class="flipswitch-inner"></div>
											<div class="flipswitch-switch"></div>
										</div>
									</div></td>
						<td rowspan=2 align=center><input onclick="this.form.action='."'". 'ModPaginas.php'. "'" .';" type="submit" name="'.  $var->PAG_nombre  .'" value="'.$idioma['Editar'].'"/></td></tr>';
						echo '<tr id="'.$id.'2">
								<th>'. $idioma['PAG_ubicacion'] .':</th>
								<td colspan=2>'. $var->PAG_ubicacion.'</td></tr>';
					}
					?>
				</table>
			</form>
				<input type="Button" class="btDestacado"  style="float:right;clear:both;" onClick="window.location.href='AltaPaginas.php'" name="btn_alta_pagina" value="<?php echo $idioma['Nueva Pagina']?>"/>
				

<?php
	
	
		
	//Fin de cuerpo de pagina

	//incluimos el pie de pagina que llevan todas las paginas de la web
	include '../../Comun/V_Pie.php';

}

}

?>
