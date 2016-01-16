<?php
//=====================================================================================================================
// Fichero :GeneradorAlta.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 18/12/2015
// Este fichero se debera incluir en aquellas vistas que queramos disponer del un formulario con campos para rellenar
// para insertar un nuevo objeto en la base de datos
//=====================================================================================================================

// $campos contendra el campo concreto a mostrar y si necesita de validación con funcion personalizada
if (strpos(explode(":",$campos[2])[0],'js') !== false)
{
	//En caso afirmativo se accede a la variable global de ArchivoComun
	global $VALIDACIONFORMULARIO;
	
	//Y añadimos a lo que ya haya de validaciones js del formulario la nueva funcion necesaria para el campo rellenando 
	// los datos de ésta con lo que se especifique (Consultar ArchivoComun, formato de funciones personalizadas en formularios)
	$VALIDACIONFORMULARIO =$VALIDACIONFORMULARIO. '
	document.getElementById(\''.$campos[0].'\').addEventListener(\''.explode("|",explode(":",$campos[2])[1])[0].'\', function validar() {
	  var todoCorrecto = true;
	  todoCorrecto = '.explode("|",explode(":",$campos[2])[1])[1].';
	  this.setCustomValidity(todoCorrecto ? \'\' : \''.explode("|",explode(":",$campos[2])[1])[2].'\');
	});
	';
	
	$campos[2] = str_replace ("js","",explode(":",$campos[2])[0]);
}

// Este swuich generara el campo correspondiente en funcion del tipo especificado en la lista de campos de los formularios (ArchivoComun)
switch ($campos[1])
{
	case 'textarea':
	echo '
		<div class="form-group">
			<label class="control-label">'.$idioma[$campos[0]].'</label>
			<textarea class="form-control" name="'.$campos[0].'" id="'.$campos[0].'" '.$campos[2].'">
			</textarea>
		</div>
		';
	break;
	
	//Es caso de select recibe los valores a mostrar ya sean mediante un array o una SQL
	case 'select':
	echo '
	<div class="form-group">
		<label for="'.$campos[0].'">'.$idioma[$campos[0]].'</label>
		  <select name="'.$campos[0].'" id="'.$campos[0].'" class="form-control" '.$campos[2].'>
		  ';
		  //Aqui se mira la forma en la que se rellena el Select
		  switch (explode(":",$campos[3])[0])
		  {
			  // INSTRUCCION SQL
			  case "sql":
			  //EJECUCION Y MOSTRADO DE VALORES
			  $opciones = TablaBD::ConsultaGenerica(explode(":",$campos[3])[1]);
			  for ($i = 0 ; $i < $opciones->num_rows;$i = $i +1)
			  {
				  $dato = $opciones->fetch_assoc();
				  echo '<option>'.$dato[array_keys($dato)[0]].'</option>';
			  }
			  break;
			  
			  // ARRAY
			  case "array":
			  //MOSTRADO DE VALORES
			  $opciones = explode("@",(explode(":",$campos[3])[1]));
			  for ($i = 0 ; $i < count($opciones);$i = $i +1)
			  {
				  $dato = $opciones[i];
				  echo '<option>'.$dato.'</option>';
			  }
			  break;
		  }
		echo '
		  </select>
	  </div>
		';
	break;
	
	//Multicheck es un campo establecido para condiciones especiales (Consultar ArchivoComun para ver como 
	// configurarlo)
	// Visualemente es un conjunto de checkbox con valores para poder marcar o desmarcar, se usara para relaciones entre tablas
	case 'multiCheck':
	echo '
	<div class="col-md-4">
	  <div class="panel panel-primary">
		<div class="panel-heading">
		  <h3 class="panel-title">'.$idioma[$campos[0]].'</h3>
		</div>
		<ul class="list-group">';
			
			// De la misma forma que el select recibe los datos a motrar de varias maneras
			switch (explode(":",$campos[3])[0])
		  {
			  // INSTRUCCION SQL
			  case "sql":
				$opciones = TablaBD::ConsultaGenerica(explode(":",$campos[3])[1]);
				$opciones2 = array();
				//En esta caso el multicheck se puede configurar para que los checkbox salgan automarcados de inicio
				// esto se hace mediante un segundo campo donde se indica mendiante SQL o ARRAY los valores que haciendo matching 
				// seran marcados
				switch (explode(":",$campos[4])[0])
				{
					//SQL
					case "sql":

					$consulta = TablaBD::ConsultaGenerica(str_replace("%d",$MOD[$campoClave],explode(":",$campos[4])[1]));

					//Se añaden esos valores de matching a un array
					for ($i = 0 ; $i < $consulta->num_rows;$i = $i +1)
					{
					$dato = $consulta->fetch_assoc();
					$opciones2[] = $dato[array_keys($dato)[0]];
					}
					break;

					//ARRAY
					case "array":
					//Se añaden esos valores de matching a un array (El array ya es tal cual lo que se recibe)
					$opciones2 = explode("@",(explode(":",$campos[4])[1]));
					break;
				}

				//Ahora se recorre la lista de valores del multicheck DONDE aquellos valores que hagan matching con el array secundario
				// (los que deberian aparecer checkeados) se marcan como 'checked'
				for ($i = 0 ; $i < $opciones->num_rows;$i = $i +1)
				{
				$dato = $opciones->fetch_assoc();
				if (in_array($dato[array_keys($dato)[0]],$opciones2))
				echo '<li class="list-group-item"><input type="checkbox" checked name="' . $campos[0]. '-' . $dato[array_keys($dato)[0]]. '">' . $dato[array_keys($dato)[0]]. ' </input></li>';
				else
				echo '<li class="list-group-item"><input type="checkbox" name="' . $campos[0]. '-' . $dato[array_keys($dato)[0]]. '">' . $dato[array_keys($dato)[0]]. ' </input></li>';
				}
				break;
			  
			// Array de valores
			case "array":
				$opciones = explode("@",(explode(":",$campos[3])[1]));
				$opciones2 = array();
				switch (explode(":",$campos[4])[0])
				{
					//Se mira si se quiere marcar algunos checkbox
					case "sql":
					$consulta = TablaBD::ConsultaGenerica(str_replace("%d",$MOD[$campoClave],explode(":",$campos[4])[1]));
					
					//Se añaden esos valores de matching a un array
					for ($i = 0 ; $i < $consulta->num_rows;$i = $i +1)
					{
						$dato = $consulta->fetch_assoc();
						$opciones2[] = $dato[array_keys($dato)[0]];
					}
					break;
					
					//ARRAY
					case "array":
						//Se añaden esos valores de matching a un array (El array ya es tal cual lo que se recibe)
						$opciones2 = explode("@",(explode(":",$campos[4])[1]));
					break;
				}
				
				//Ahora se recorre la lista de valores del multicheck DONDE aquellos valores que hagan matching con el array secundario
				// (los que deberian aparecer checkeados) se marcan como 'checked'
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
			<input  type="'.$campos[1].'" name="'.$campos[0].'" id="'.$campos[0].'" '.$campos[2].' >
		</div>
		';
	break;
	
	default:
	echo '
		<div class="form-group">
			<label class="control-label">'.$idioma[$campos[0]].'</label>
			<input  type="'.$campos[1].'" class="form-control" name="'.$campos[0].'" id="'.$campos[0].'" '.$campos[2].' >
		</div>
		';
	break;
}
?>