<?php
include_once '../../Clases/BaseDatosControl.php';

Class Funcionalidad
{
	private static $nombreTabla = "FUNCIONALIDADES";
	private static $campoClave = "FUN_nombre";
	private static $rel1 = "IMPLEMENTADA_EN";
	private static $rel2 = "PERMITE";
	
	public $FUN_nombre;
	public $FUN_descripcion;
	public $PAGINAS_ASOCIADAS ;
	public $ROLES_ASOCIADOS ;
	
	function __construct()
	{
		$this->FUN_nombre = "";
		$this->FUN_descripcion = "";
		$this->PAGINAS_ASOCIADAS = array();
		$this->ROLES_ASOCIADOS = array();
	}

	//Funciones de Gestion básicas
	
	public function addPagina($var)
	{
		$num = sizeof($this->PAGINAS_ASOCIADAS);
		
		$this->PAGINAS_ASOCIADAS[$num] = $var;
	}
	
	public function addRol($var)
	{
		$num = sizeof($this->ROLES_ASOCIADOS);
		
		$this->ROLES_ASOCIADOS[$num] = $var;
	}
	
	
	public function getPaginas()
	{
		return $this->PAGINAS_ASOCIADAS;
	}
	public function getRoles()
	{
		return $this->ROLES_ASOCIADOS;
	}
	
	public function Update($ClaveAnt)
	{
		
		$BD = new BaseDatosControl();
			
		$BD->OperacionGenericaBD('DELETE from '. Funcionalidad::$rel1.' where '. Funcionalidad::$campoClave.' = "'.$ClaveAnt.'"','ACT ERR P-F' );
				
		$BD->OperacionGenericaBD('DELETE from '. Funcionalidad::$rel2.' where '. Funcionalidad::$campoClave.' = "'.$ClaveAnt.'"','ACT ERR R-F' );
				
		$sql = "UPDATE  ". Funcionalidad::$nombreTabla." SET 
		`FUN_nombre` =  '".$this->FUN_nombre."',
		`FUN_descripcion` =  '".$this->FUN_descripcion."' 
		WHERE  ". Funcionalidad::$campoClave." =  '".$ClaveAnt."'";
		
		$BD->OperacionGenericaBD($sql,'ERR ACT F');
				
		foreach ($this->getPaginas() as &$var)
		{
			$BD->OperacionGenericaBD("Insert into ". Funcionalidad::$rel1." (". Funcionalidad::$campoClave.",PAG_nombre) 
			values ('".$this->FUN_nombre."','".$var."')",'ACT ERR P-F');
		}
				
		foreach ($this->getRoles() as &$var)
		{
			$BD->OperacionGenericaBD("Insert into ". Funcionalidad::$rel2." (". Funcionalidad::$campoClave.",ROL_nombre) 
			values ('".$this->FUN_nombre."','".$var."')",'ACT ERR R-F' );
		}	
	}

	public function AlmacenarBD()
	{
		$BD = new BaseDatosControl();
		
		$BD->OperacionGenericaBD("Insert into ". Funcionalidad::$nombreTabla." (". Funcionalidad::$campoClave.", FUN_descripcion) 
			values ('". $this->FUN_nombre."','". $this->FUN_descripcion."')",'ALT ERR F');
						
		foreach ($this->getPaginas() as &$var)
		{
			$BD->OperacionGenericaBD("Insert into ". Funcionalidad::$rel1." (". Funcionalidad::$campoClave.",PAG_nombre) 
			values ('".$this->FUN_nombre."','".$var."')",'ACT ERR P-F');
		}
				
		foreach ($this->getRoles() as &$var)
		{
			$BD->OperacionGenericaBD("Insert into ". Funcionalidad::$rel2." (". Funcionalidad::$campoClave.",ROL_nombre) 
			values ('".$this->FUN_nombre."','".$var."')",'ACT ERR R-F');
		}
	}

	public static function EliminarFuncionalidadBD($var)
	{
		$BD = new BaseDatosControl();
		
		if (is_a($var,"Funcionalidad"))
		{
			$var = $var->$FUN_nombre;
		}
		
		$BD->OperacionGenericaBD("DELETE FROM ". Funcionalidad::$nombreTabla." where ". Funcionalidad::$campoClave."='". $var ."'",'ELI ERR F');
		
		$BD->OperacionGenericaBD("DELETE FROM ". Funcionalidad::$rel1." where ". Funcionalidad::$campoClave."='". $var ."'",'ACT ERR P-F');
		
		$BD->OperacionGenericaBD("DELETE FROM ". Funcionalidad::$rel2." where ". Funcionalidad::$campoClave."='". $var ."'",'ACT ERR R-F');
	}

	public static function ListadoFuncionalidades($opciones)
	{
		$BD = new BaseDatosControl();
		
		return $BD->OperacionGenericaBD("Select * from ". Funcionalidad::$nombreTabla." ". $opciones,'CON ERR F');
	}

	public static function getFuncionalidadBD($var)
	{
		$BD = new BaseDatosControl();
		
		$devolver = new Funcionalidad();
		
		$resultado = $BD->OperacionGenericaBD("Select * from ". Funcionalidad::$nombreTabla." where ". Funcionalidad::$campoClave."='". $var."'",'CON ERR SF');
		
		if ($resultado->num_rows == 0)
			return null;
		
		$TuplaAcceso = $resultado->fetch_assoc();
		
		$devolver->FUN_nombre = $TuplaAcceso['FUN_nombre'];
		$devolver->FUN_descripcion = $TuplaAcceso['FUN_descripcion'];
		
		$consultaREl = Funcionalidad::getPaginasFuncionalidad($devolver->FUN_nombre);
		
		$numF = $consultaREl->num_rows;
		for ($i2 = 0; $i2 < $numF ;$i2++){
			$TuplaF  = $consultaREl->fetch_assoc();
			 $devolver->addPagina($TuplaF['PAG_nombre']);
		}
		
		$consultaREl = Funcionalidad::getRolesFuncionalidad($devolver->FUN_nombre);
		
		$numF = $consultaREl->num_rows;
		for ($i2 = 0; $i2 < $numF ;$i2++){
			$TuplaF  = $consultaREl->fetch_assoc();
			 $devolver->addRol($TuplaF['ROL_nombre']);
		}
		
		return $devolver;
	}

	public static function getPaginasFuncionalidad($var){
		if (is_a($var,"Funcionalidad"))
			$var = $var->$FUN_nombre;
		
		$BD = new BaseDatosControl();
		
		return $BD->OperacionGenericaBD("select * from ". Funcionalidad::$rel1." where ". Funcionalidad::$campoClave."='". $var. "'",'CON ERR P-F');
	}
	
	public static function getRolesFuncionalidad($var){
		if (is_a($var,"Funcionalidad"))
			$var = $var->$FUN_nombre;
		
		$BD = new BaseDatosControl();
		
		return $BD->OperacionGenericaBD("select * from ". Funcionalidad::$rel2." where ". Funcionalidad::$campoClave."='". $var. "'",'CON ERR R-F');
	}

	public static function existeFuncionalidad($var)
	{
		$BD = new BaseDatosControl();
		
		$consulta = $BD->OperacionGenericaBD("select * from ". Funcionalidad::$nombreTabla." where ". Funcionalidad::$campoClave."='". $var. "'",'ERR EXIST');
		
		if ($consulta->num_rows > 0)
			return true;
		else
			return false;		
	}
	
	//Funcioens que transforman el Objeto en un array de propiedades y viceversa para almacenarlo en una variable de sesion
	
	public function DatosParaSesion()
	{
		$array[0] = $this->FUN_nombre;
		$array[1] = $this->FUN_descripcion;
		$array[2] = sizeof($this->getPaginas());
		foreach($this->getPaginas() as $var)
		{
			$array[sizeof($array)] = $var;
		}
		foreach($this->getRoles() as $var)
		{
			$array[sizeof($array)] = $var;
		}
		return $array;
	}
	public function CargarDatosSesion($array)
	{
		$this->FUN_nombre = $array[0];
		$this->FUN_descripcion= $array[1];
		
		$paro = 3;
		
		for($i = 3; $i < $array[2]+3;$i++,$paro = $i)
		{
			$this->addPagina($array[$i]);
		}
		for($i = $paro; $i < sizeof($array);$i++)
		{
			$this->addRol($array[$i]);
		}
	}
}
?>
