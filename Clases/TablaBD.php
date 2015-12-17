<?php
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
		
		$BD = new BaseDatosControl();
		print_r($datos);
		$sql = "UPDATE  ".$this->nombreTabla." SET ";
		$primero = true;
		foreach ($datos as $k => $v)
		{
			if ($k == "ClaveAnt")
				continue;
			
			if ($primero)
			{
				$primero =false;
				$k = explode("-",$k)[1];
				$sql = $sql. " ".$k." =  '".$v."'";
				continue;
			}
			$k = explode("-",$k)[1];
			$sql = $sql. ", ".$k." =  '".$v."'";
		}
		
		$ClavesAnt = explode(";",$datos["ClaveAnt"]);
		
		$primero = true;
		foreach ($ClavesAnt as $v)
		{
			if ($primero)
			{
				$primero =false;
				$sql = $sql." WHERE  ".explode("=>",$v)[0]." =  '".explode("=>",$v)[1]."'";
				continue;
			}
			$sql = $sql. " AND  ".explode("=>",$v)[0]." =  '".explode("=>",$v)[1]."'";
		}
		echo $sql;
		$BD->OperacionGenericaBD($sql,'ACT ERR U');
	}

	
	//Almancena el objeto como un nuevo registro en la base de datos
	public function AlmacenarBD($datos)
	{
		$BD = new BaseDatosControl();
	
		$sql = "Insert into ".$this->nombreTabla." ";
		$primero = true;
		foreach (array_keys($datos) as $k)
		{
			
			$k = explode("-",$k)[1];
			if ($primero)
			{
				$primero =false;
				$sql = $sql." (".$k;
				continue;
			}
			$sql = $sql. ",".$k;
		}
		$sql = $sql.") values";
		
		$primero = true;
		foreach ($datos as $k => $v)
		{
			if ($primero)
			{
				$primero =false;
				$sql = $sql." ('".$v;
				continue;
			}
			$sql = $sql. "','".$v;
		}
		$sql =$sql. "')";
		echo $sql;
		$BD->OperacionGenericaBD($sql,"");
	}

	public function EliminarRegistro($datos)
	{
		$BD = new BaseDatosControl();
		
		$ClavesBusqueda = explode(";",$datos["BORRAR"]);
		
		$sql = "DELETE FROM ".$this->nombreTabla." ";
		$primero = true;
		foreach ($ClavesBusqueda as $v)
		{
			if ($primero)
			{
				$primero =false;
				$sql = $sql." WHERE  ".explode("=>",$v)[0]." =  '".explode("=>",$v)[1]."'";
				continue;
			}
			$sql = $sql. " AND  ".explode("=>",$v)[0]." =  '".explode("=>",$v)[1]."'";
		}
		echo $sql;
		
		
		$BD->OperacionGenericaBD($sql,'');
		
	}

	public function ListadoRegistros($opciones)
	{
		$BD = new BaseDatosControl();
		
		return $BD->OperacionGenericaBD("Select * from ".$this->nombreTabla." ". $opciones);
	}

	public function getUsuarioBD($ClavesBusqueda)
	{
		$BD = new BaseDatosControl();
		
		$sql = "Select * FROM ".$this->nombreTabla." ";
		$primero = true;
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
		
		$resultado = $BD->OperacionGenericaBD($sql,'');
		
		if ($resultado->num_rows == 0)
			return null;
		
		return $TuplaAcceso = $resultado->fetch_assoc();
	}

	public static function existeRegistro($ClavesBusqueda)
	{
		$BD = new BaseDatosControl();
		$sql = "Select * FROM ".$this->nombreTabla." ";
		$primero = true;
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
		
		$consulta = $BD->OperacionGenericaBD($sql,'ERR EXIST');
		if ($consulta->num_rows > 0)
			return true;
		else
			return false;
				
	}
	
	public static function ConsultaGenerica($SQL)
	{
		$BD = new BaseDatosControl();
		$sql = $SQL;
		
		$consulta = $BD->OperacionGenericaBD($sql,'ERR EXIST');
		return $consulta;
	}
	
}
?>
