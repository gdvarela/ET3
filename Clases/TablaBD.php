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
		$sql2 = array();
		$primero = true;
		foreach ($datos as $k => $v)
		{
			if ($k == "ClaveAnt")
				continue;
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
		for ($i = 0; $i < count($sql2);$i = $i+1)
		{
			$BD->OperacionGenericaBD($sql2[$i],"");
			echo $sql2[$i];
		}
	}

	
	//Almancena el objeto como un nuevo registro en la base de datos
	public function AlmacenarBD($datos)
	{
		$BD = new BaseDatosControl();
	print_r(array_keys($this->arrayCampos));
	print_r($this->arrayClaves);
	print_r($datos);
		$sql = "Insert into ".$this->nombreTabla." ";
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
		echo $sql;
		
		$BD->OperacionGenericaBD($sql,"");
		for ($i = 0; $i < count($sql2);$i = $i+1)
		{
			$BD->OperacionGenericaBD($sql2[$i],"");
			echo $sql2[$i];
		}
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
