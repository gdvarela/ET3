<?php

//=====================================================================================================================
// Fichero :TablaBD.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 18/12/2015
// Clase Generica que funciona como intermediaria entre la aplicación y la BD generando automaticamente las consultas
// y operaciones de la base de datos en funcion de los campos con los que sea instanciada.
//=====================================================================================================================

//Se incluye el fichero de base de datos de GESTAPP
include_once $RutaRelativaControlador.'GESTAPP/Clases/BaseDatosControl.php';

Class TablaBD
{
	//Array que contiene los campos y valores del objeto
	// Ej: array ( "ISBN" => "123123123", "NombreRevista" => "Que me dices", ...)
	public $arrayCampos;
	
	//Array que contiene los indices para los campos clave
	// Ej: array (1,3,4);  //Los campos 1, 2 y 4 forman la clave principal (Empezando en 0)
	public $arrayClaves;
	
	//Nombre de la tabla para el cual se crea el objeto
	public $nombreTabla = "";
	
	// Constructor de la clase NOMBREDETABLA, CAMPOSQUELAFORMAN, ARRAYINDICADORCLAVE
	function __construct($n,$arrayCampos,$arrayClaves)
	{
		$this->nombreTabla = $n;
		$this->arrayCampos = $arrayCampos;
		$this->arrayClaves = $arrayClaves;
		
	}
	
	//Actualiza con los datos de este objeto la base de datos
	// El metodo recibe como parametro la clave primaria previa al update
	public function Update($datos)
	{
		//Se crea la conexion a la BD
		$BD = new BaseDatosControl();
		
		//Se comienza a construir la consulta UPDATE
		$sql = "UPDATE  ".$this->nombreTabla." SET ";
		
		//En esta SQLBORRADO se almacena la SQL paralela necesaria en caso de borrar datos de otras tablas
		// a la vez que se actualiza la tabla
		$SQLBORRADO = "";
		//Es anexa a la intruccion anterior, y es un array con todas instrucciones insert derivadas que se deseen hacer
		// junto con la actualizacion de esta tabla. Se usa para una relacion con muchas tablas donde se vea afectados los datos
		$sql2 = array();
		
		//Esta variable boolean no es mas un flag de control para la construccion de la instruccion SQL
		// todos los campos van separados por ',' menos el primero que no se le añade la coma
		$primero = true;
		
		//Se recorre el array de datosm que no es mas que los pares de valores que recibe el update
		// nombrecampotabla => nuevovalor, nom..., ...., ..
		// --- EN ESTA PARTE SE GENERA la lista de campos de la tabla que se desean modificar
		foreach ($datos as $k => $v)
		{
			//Uno de esos campos que se recibe por parametro es la clave antigua
			// " En un update se puede modificar la clave de la tabla por tanto es necesario tener la antigua
			// y la nueva para la modificacion correcta"
			if ($k == "ClaveAnt")
				continue; //Se hace un continue pk en esta fase la clave antigua no se usa
			
			//Al valor del nombre de la tabla puede venir modificado, ya que asi fue pensado del codigo
			// todos los nombres de tabla vienen con el formato [YY]-[XX]-[NOMBRE] donde YY,XX pueden ser varios valores
			// que significa que se hacen distintas operaciones con ese campo.
			$kf = explode("-",$k)[1];
			
			//Se comprueba uno de esos valores y si es MC significa que el [NOMBRE] pertenece a otra tabla, y en este punto
			// entramos en donde el update de esta tabla afecta a otra tabla distinta asique se realizan las SQL necesarias
			// " Esto no se comentará pero es basicamente hacer un delete de los datos, y posteriormente generar un insert con los nuevos datos
			// cada 'Insert' se añade al array sql2 que al final contendra todas las modificaciones de tablas externas deseadas"
			if ($kf == "MC")
			{
				if ($SQLBORRADO == "")
				{
					$SQLBORRADO = "Delete From ".explode("@",explode("-",$k)[2])[0] ." WHERE ".explode("=>",$datos["ClaveAnt"])[0]."='".explode("=>",$datos["ClaveAnt"])[1]."' ";
				}
				$sql2[] = "Insert into ".explode("@",explode("-",$k)[2])[0]." (".explode("@",explode("-",$k)[2])[1].",". array_keys ($this->arrayCampos)[$this->arrayClaves[0]].") values ('".
				explode("-",$k)[3]."','".$datos["MP-".array_keys ($this->arrayCampos)[$this->arrayClaves[0]]]."');";
				continue;
			}
			
			//El flag indica si debemos o no poner , para el primer valor.
			if ($primero)
			{
				$primero =false;
				$k = explode("-",$k)[1];
				$sql = $sql. " ".$k." =  '".$v."'";
				continue;
			}
			// En caso de no entrar por primero se pone ', [NOMBRE_CAMPO] = [NUEVO_VAL]' con la 'coma' delante
			$k = explode("-",$k)[1];
			$sql = $sql. ", ".$k." =  '".$v."'";
		}
		
		//Se almacena en la variable ClavesAnt el dato ClaveAnt que trae un formato [CLAVE[;CLAVE2;...]]] que es la clave primaria de la tabla
		$ClavesAnt = explode(";",$datos["ClaveAnt"]);
		
		//[ MISMO FUNDAMENTO QUE EN EL ANTERIOR] En este caso es para poner WHERE solo una vez
		$primero = true;
		foreach ($ClavesAnt as $v)
		{
			if ($primero)
			{
				$primero =false;
				$sql = $sql." WHERE  ".explode("=>",$v)[0]." =  '".explode("=>",$v)[1]."'"; // AQUI PONEMOS WHERE
				continue;
			}
			$sql = $sql. " AND  ".explode("=>",$v)[0]." =  '".explode("=>",$v)[1]."'"; // AQUI PONEMOS AND
		}
		
		//SE EJECUTAN LAS OPERACIONES GENREADAS
		$BD->OperacionGenericaBD($sql,'ACT ERR U');
		$BD->OperacionGenericaBD($SQLBORRADO,'ACT ERR U');
		
		//Y POSTERIOR Y PARA TERMINAR LOS INSERTS QUE SE HAYAN DESEADO
		for ($i = 0; $i < count($sql2);$i = $i+1)
		{
			$BD->OperacionGenericaBD($sql2[$i],"");
		}
	}

	
	//Almancena el objeto como un nuevo registro en la base de datos
	//Recibe datos y crea la instruccion INSERT correspondiente
	// [ SE OBIA COMENTAR LA FUNCION PORQUE ES EL MISMO FUNDAMENTO QUE PARA 'Update($datos)'
	// PERO CAMBIANDO LA ESTRUCTURA DE UNA CONSULTA 'UPDATE' A UNA 'INSERT']
	public function AlmacenarBD($datos)
	{
		$BD = new BaseDatosControl();
	
		$sql = "Insert into ".$this->nombreTabla." ";
		
		// AQUI ESTA LA DIFERENCIA, EN UN INSERT NO SE BORRAN DATOS POSIBLES DE OTRAS TABLAS COMO EN UPDATE
		
		$sql2=array();
		$primero = true;
		foreach (array_keys($datos) as $k)
		{
			
			$kf = explode("-",$k)[1];
			if ($kf == "MC")
			{
				$sql2[] = "Insert into ".explode("@",explode("-",$k)[2])[0]." (".explode("@",explode("-",$k)[2])[1].",". array_keys ($this->arrayCampos)[$this->arrayClaves[0]].") values ('".
				explode("-",$k)[3]."','".$datos["MP-".array_keys ($this->arrayCampos)[$this->arrayClaves[0]]]."');";
				continue;
			}
			if ($primero)
			{
				$primero =false;
				$sql = $sql." (".$kf;
				continue;
			}
			$sql = $sql. ",".$kf;
		}
		$sql = $sql.") values";
		
		$primero = true;
		foreach ($datos as $kf => $v)
		{
			if (explode("-",$kf)[1] == "MC")
			continue;
			if ($primero)
			{
				$primero =false;
				$sql = $sql." ('".$v;
				continue;
			}
			$sql = $sql. "','".$v;
		}
		$sql =$sql. "')";
		
		$BD->OperacionGenericaBD($sql,"");
		for ($i = 0; $i < count($sql2);$i = $i+1)
		{
			$BD->OperacionGenericaBD($sql2[$i],"");
			echo $sql2[$i];
		}
	}

	
	//Borra un registro de la tabla que haga matching con los '$datos'
	public function EliminarRegistro($datos)
	{
		$BD = new BaseDatosControl();
		
		//Se almacena la clave de busqueda que se recive
		$ClavesBusqueda = explode(";",$datos["BORRAR"]);
		
		//Generacion de la SQL DELETE correspondiente
		$sql = "DELETE FROM ".$this->nombreTabla." ";
		$primero = true;
		
		//Bucle que va añadiendo en la clausua Where las distintas condiciones de borrado
		// NO TE OLVIDES DE PONER EL WHERE EN EL DELETE FROM
		foreach ($ClavesBusqueda as $v)
		{
			if ($primero)
			{
				$primero =false;
				$sql = $sql." WHERE  ".explode("=>",$v)[0]." =  '".explode("=>",$v)[1]."'"; //UNA VEZ EL WHERE...
				continue;
			}
			$sql = $sql. " AND  ".explode("=>",$v)[0]." =  '".explode("=>",$v)[1]."'"; //... AND ES RESTO DE VECES
		}
		echo $sql;
		
		//Ejecucion de la SQL generada
		$BD->OperacionGenericaBD($sql,'');
		
	}
	
	//Funcion que devulelve registros de la tabla posibilitando $opciones (Joins, groupby, etc....)
	public function ListadoRegistros($opciones)
	{
		$BD = new BaseDatosControl();
		
		return $BD->OperacionGenericaBD("Select * from ".$this->nombreTabla." ". $opciones);
	}

	//Funcion que devuelve true/false si existe o no la clave buscada
	public static function existeRegistro($ClavesBusqueda)
	{
		$BD = new BaseDatosControl();
		//Generacion de la consulta Select correspondiente
		$sql = "Select * FROM ".$this->nombreTabla." ";
		$primero = true;
		
		//Bucle que va añadiendo en la clausua Where las distintas condiciones de la select
		foreach ($this->arrayClaves as $v)
		{
			if ($primero)
			{
				$primero =false;
				$sql = $sql." WHERE  ".array_keys($arrayCampos)[$v] ." =  '".$ClavesBusqueda[$v]."'";
				continue;
			}
			$sql = $sql. " AND  ".array_keys($arrayCampos)[$v] ." =  '".$ClavesBusqueda[$v]."'";
		}
		
		//Ejecucion de la consulta SQL
		$consulta = $BD->OperacionGenericaBD($sql,'ERR EXIST');
		
		//Se devuelve el valor correspondiente
		if ($consulta->num_rows > 0)
			return true;
		else
			return false;
				
	}
	
	//Esta es una funcion generica donde se ejecuta simplemente la SQL que recibe por parametro
	public static function ConsultaGenerica($SQL)
	{
		if ($SQL == "")
			return;
		$BD = new BaseDatosControl();
		$sql = $SQL;
		
		$consulta = $BD->OperacionGenericaBD($sql,'ERR EXIST');
		return $consulta;
	}
	
}
?>
