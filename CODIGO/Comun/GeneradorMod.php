<?php 

//=====================================================================================================================
// Fichero :GeneradorMod.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 18/12/2015
// Este fichero se debera incluir en aquellas vistas que queramos disponer del un formulario de modificacion que se
// cargara automáticamente con los datos recibidos que se deseen mostrar
//=====================================================================================================================

// PARA NO COMENTAR 2 VECES LO MISMO MIRAR EL ARCHIVO GENERADORALTA que es igual
// La diferencia es que en este se cargan los Textbox, pass .... en funcion de los datos recibidos en la variable
// ---> $MOD

foreach($formularios[$NombreFormulario] as $campos)
{

if (strpos(explode(":",$campos[2])[0],'js') !== false)
{
	global $VALIDACIONFORMULARIO;
	//Se miran para que eventos se desea aplicar la formular de validacion
	$eventosSoportar = explode(",",explode("|",explode(":",$campos[2])[1])[0]);
	
	//Y añadimos a lo que ya haya de validaciones js del formulario la nueva funcion necesaria para el campo rellenando 
	// los datos de ésta con lo que se especifique (Consultar ArchivoComun, formato de funciones personalizadas en formularios)
	for ($i = 0; $i< count($eventosSoportar);$i = $i+1)
	{
		$VALIDACIONFORMULARIO =$VALIDACIONFORMULARIO. '
		document.getElementById(\''.$campos[0].'\').addEventListener(\''.$eventosSoportar[$i].'\', function validar() {
		  var todoCorrecto = true;
		  todoCorrecto = '.explode("|",explode(":",$campos[2])[1])[1].';
		  this.setCustomValidity(todoCorrecto ? \'\' : \''.explode("|",explode(":",$campos[2])[1])[2].'\');
		});
		';
	}
	
	$campos[2] = str_replace ("js","",explode(":",$campos[2])[0]);
}
switch ($campos[1])
{
	case 'textarea':
		echo '
			<div class="form-group">
				<label class="control-label">'.$idioma[$campos[0]].'</label>
				<textarea class="form-control" name="'.$campos[0].'" '.$campos[2].'">
				'.$MOD[explode("-",$campos[0])[1]].'
				</textarea>
			</div>
			';
		break;
	case 'select':
	echo '
	<div class="form-group">
		<label for="'.$campos[0].'">'.$idioma[$campos[0]].'</label>
		  <select name="'.$campos[0].'" id="'.$campos[0].'" class="form-control" '.$campos[2].'>
		  ';
		  switch (explode(":",$campos[3])[0])
		  {
			  case "sql":
			  $opciones = TablaBD::ConsultaGenerica(explode(":",$campos[3])[1]);
			  for ($i = 0 ; $i < $opciones->num_rows;$i = $i +1)
			  {
				  $dato = $opciones->fetch_assoc();
				  //Se mira si el dato del select coincide con lo que se recibe como variable para asi dejarlo seleccionado
				  if ($dato[array_keys($dato)[0]] == $MOD[explode("-",$campos[0])[1]])
					echo '<option selected>'.$dato[array_keys($dato)[0]].'</option>';
				else
					echo '<option>'.$dato[array_keys($dato)[0]].'</option>';
			  }
			  break;
			  case "array":
			  $opciones = explode("@",(explode(":",$campos[3])[1]));
			  for ($i = 0 ; $i < count($opciones);$i = $i +1)
			  {
				  $dato = $opciones[i];
				  //Se mira si el dato del select coincide con lo que se recibe como variable para asi dejarlo seleccionado
				  if ($dato == $MOD[explode("-",$campos[0])[1]])
					echo '<option selected>'.$dato.'</option>';
				else
					echo '<option>'.$dato.'</option>';
			  }
			  break;
		  }
		echo '
		  </select>
	  </div>
		';
	break;
		case 'multiCheck':
	echo '
	<div class="col-md-4">
	  <div class="panel panel-primary">
		<div class="panel-heading">
		  <h3 class="panel-title">'.$idioma[$campos[0]].'</h3>
		</div>
		<ul class="list-group">';
			switch (explode(":",$campos[3])[0])
		  {
			  case "sql":
			  $opciones = TablaBD::ConsultaGenerica(explode(":",$campos[3])[1]);
			  $opciones2 = array();
				switch (explode(":",$campos[4])[0])
				  {
					  case "sql":
					  $consulta = TablaBD::ConsultaGenerica(str_replace("%d",$MOD[$campoClave],explode(":",$campos[4])[1]));
					  for ($i = 0 ; $i < $consulta->num_rows;$i = $i +1)
					  {
						$dato = $consulta->fetch_assoc();
						$opciones2[] = $dato[array_keys($dato)[0]];
					  }
					  break;
					  case "array":
						$opciones2 = explode("@",(explode(":",$campos[4])[1]));
					  break;
				  }
			  for ($i = 0 ; $i < $opciones->num_rows;$i = $i +1)
			  {
				$dato = $opciones->fetch_assoc();
				if (in_array($dato[array_keys($dato)[0]],$opciones2))
					echo '<li class="list-group-item"><input type="checkbox" checked name="' . $campos[0]. '-' . $dato[array_keys($dato)[0]]. '">' . $dato[array_keys($dato)[0]]. ' </input></li>';
				else
					echo '<li class="list-group-item"><input type="checkbox" name="' . $campos[0]. '-' . $dato[array_keys($dato)[0]]. '">' . $dato[array_keys($dato)[0]]. ' </input></li>';
			  }
			  break;
			  case "array":
			  $opciones = explode("@",(explode(":",$campos[3])[1]));
			  $opciones2 = array();
					switch (explode(":",$campos[4])[0])
					  {
						  case "sql":
						  $consulta = TablaBD::ConsultaGenerica(str_replace("%d",$MOD[$campoClave],explode(":",$campos[4])[1]));
						  for ($i = 0 ; $i < $consulta->num_rows;$i = $i +1)
						  {
							  $dato = $consulta->fetch_assoc();
							  $opciones2[] = $dato[array_keys($dato)[0]];
						  }
						  break;
						  case "array":
							$opciones2 = explode("@",(explode(":",$campos[4])[1]));
						  break;
					  }
			  for ($i = 0 ; $i < count($opciones);$i = $i +1)
			  {
				  $dato = $opciones[$i];
				 if (in_array($dato,$opciones2))
					echo '<li class="list-group-item"><input type="checkbox" checked name="' . $campos[0]. '-' . $dato. '">' . $dato. ' </input></li>';
				else
					echo '<li class="list-group-item"><input type="checkbox" name="' . $campos[0]. '-' . $dato. '">' . $dato. ' </input></li>';
			  }
			  break;
		  }
			
		 echo ' </ul>
	  </div>
	</div>
	';
	break;
	case 'number':
	echo '
		<div class="form-group">
			<label class="control-label">'.$idioma[$campos[0]].'</label>
			<input  type="'.$campos[1].'" name="'.$campos[0].'" id="'.$campos[0].'" value="'.$MOD[explode("-",$campos[0])[1]].'" '.$campos[2].' >
		</div>
		';
	break;
	default:
	echo '
		<div class="form-group">
			<label class="control-label">'.$idioma[$campos[0]].'</label>
			<input  type="'.$campos[1].'" class="form-control" id="'.$campos[0].'" value="'.$MOD[explode("-",$campos[0])[1]].'" name="'.$campos[0].'" '.$campos[2].' >
		</div>
		';
	break;
}
}
?>