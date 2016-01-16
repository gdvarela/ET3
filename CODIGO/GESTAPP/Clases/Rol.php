<?php
include_once '../../Clases/BaseDatosControl.php';

Class Rol
{
	private static $nombreTabla = "ROLES";
	private static $campoClave = "ROL_nombre";
	private static $rel1 = "HACE_DE";
	private static $rel2 = "PERMITE";
	
	public $ROL_nombre;
	public $ROL_descripcion;
	public $USUARIOS_ASOCIADOS ;
	public $FUNCIONALIDADES_ASOCIADAS ;
	
	function __construct()
	{
		$this->ROL_nombre = "";
		$this->ROL_descripcion = "";
		$this->USUARIOS_ASOCIADOS = array();
		$this->FUNCIONALIDADES_ASOCIADAS = array();
	}
	
	//Funciones de Gestion básicas
	
	public function addUsuario($var)
	{
		$num = sizeof($this->USUARIOS_ASOCIADOS);
		$this->USUARIOS_ASOCIADOS[$num] = $var;
	}
	
	public function addFuncionalidad($var)
	{
		$num = sizeof($this->FUNCIONALIDADES_ASOCIADAS);
		$this->FUNCIONALIDADES_ASOCIADAS[$num] = $var;
	}
	
	public function getUsuarios()
	{
		return $this->USUARIOS_ASOCIADOS;
	}
	public function getFuncionalidades()
	{
		return $this->FUNCIONALIDADES_ASOCIADAS;
	}
	
	public function Update($ClaveAnt)
	{
		$BD = new BaseDatosControl();
		
		$BD->OperacionGenericaBD('DELETE from '. Rol::$rel1.' where '. Rol::$campoClave.' = "'.$ClaveAnt.'"','ACT ERR U-R');
	
		$BD->OperacionGenericaBD('DELETE from '. Rol::$rel2.' where '. Rol::$campoClave.' = "'.$ClaveAnt.'"','ACT ERR F-R' );
	
		$sql = "UPDATE  ". Rol::$nombreTabla." SET 
			`ROL_nombre` =  '".$this->ROL_nombre."',
			`ROL_descripcion` =  '".$this->ROL_descripcion."'
			WHERE  ". Rol::$campoClave." =  '".$ClaveAnt."'";
		$BD->OperacionGenericaBD($sql,'ACT ERR R');
	
		foreach ($this->getUsuarios() as &$var)
		{
			$BD->OperacionGenericaBD("Insert into ". Rol::$rel1." (". Rol::$campoClave.",Login) 
			values ('".$this->ROL_nombre."','".$var."')",'ACT ERR U-R');
		}

		foreach ($this->getFuncionalidades() as &$var)
		{
			$BD->OperacionGenericaBD("Insert into ". Rol::$rel2." (". Rol::$campoClave.",FUN_nombre) 
			values ('".$this->ROL_nombre."','".$var."')",'ACT ERR F-R');
		}
	}

	public function AlmacenarBD()
	{
		$BD = new BaseDatosControl();
	
		$BD->OperacionGenericaBD("Insert into ". Rol::$nombreTabla." (". Rol::$campoClave.", ROL_descripcion) 
		values ('". $this->ROL_nombre."','". $this->ROL_descripcion."')",'ALT ERR R');
	
		foreach ($this->getUsuarios() as &$var)
		{
			$BD->OperacionGenericaBD("Insert into ". Rol::$rel1." (". Rol::$campoClave.",Login) 
			values ('".$this->ROL_nombre."','".$var."')",'ACT ERR U-R');
		}
	
		foreach ($this->getFuncionalidades() as &$var)
		{
			$BD->OperacionGenericaBD("Insert into ". Rol::$rel2." (". Rol::$campoClave.",FUN_nombre) 
			values ('".$this->ROL_nombre."','".$var."')",'ACT ERR F-R');
		}
	}

	public static function EliminarRolBD($var)
	{
		$BD = new BaseDatosControl();
		
		if (is_a($var,"Rol"))
		{
			$var = $var->$ROL_nombre;
		}
		
		$BD->OperacionGenericaBD("DELETE FROM ". Rol::$nombreTabla." where ". Rol::$campoClave."='". $var ."'",'ELI ERR R');
		
		$BD->OperacionGenericaBD("DELETE FROM ". Rol::$rel1." where ". Rol::$campoClave."='". $var ."'",'ACT ERR U-R');
	
		$BD->OperacionGenericaBD("DELETE FROM ". Rol::$rel2." where ". Rol::$campoClave."='". $var ."'",'ACT ERR F-R');
	}

	public static function ListadoRoles($opciones)
	{
		$BD = new BaseDatosControl();
	
		return $BD->OperacionGenericaBD("Select * from ". Rol::$nombreTabla." ". $opciones,'CON ERR R');
	}

	public static function getRolBD($var)
	{
		$BD = new BaseDatosControl();
		
		$devolver = new Rol();
		
		$resultado = $BD->OperacionGenericaBD("Select * from ". Rol::$nombreTabla." where ". Rol::$campoClave."='". $var."'",'CON ERR SR');
		
		if ($resultado->num_rows == 0)
			return null;
		
		$TuplaAcceso = $resultado->fetch_assoc();
		
		$devolver->ROL_nombre = $TuplaAcceso['ROL_nombre'];
		$devolver->ROL_descripcion = $TuplaAcceso['ROL_descripcion'];
		
		$consultaREl = Rol::getUsuariosRol($devolver->ROL_nombre);
		
		$numF = $consultaREl->num_rows;
		for ($i2 = 0; $i2 < $numF ;$i2++){
			$TuplaF  = $consultaREl->fetch_assoc();
			 $devolver->addUsuario($TuplaF['Login']);
		}
		
		$consultaREl = Rol::getFuncionalidadesRol($devolver->ROL_nombre);
		
		$numF = $consultaREl->num_rows;
		for ($i2 = 0; $i2 < $numF ;$i2++){
			$TuplaF  = $consultaREl->fetch_assoc();
			 $devolver->addFuncionalidad($TuplaF['FUN_nombre']);
		}
		
		return $devolver;	
	}

	public static function getUsuariosRol($var){
		if (is_a($var,"Rol"))
			$var = $var->$ROL_nombre;
		
		$BD = new BaseDatosControl();
	
		return $BD->OperacionGenericaBD("select * from ". Rol::$rel1." where ". Rol::$campoClave."='". $var. "'",'CON ERR U-R');
	}
	
	public static function getFuncionalidadesRol($var){
		if (is_a($var,"Rol"))
			$var = $var->$ROL_nombre;
		
		$BD = new BaseDatosControl();
	
		return $BD->OperacionGenericaBD("select * from ". Rol::$rel2." where ". Rol::$campoClave."='". $var. "'",'CON ERR F-R');
	}

	public static function existeRol($var)
	{
		$BD = new BaseDatosControl();
	
		$consulta = $BD->OperacionGenericaBD("select * from ". Rol::$nombreTabla." where ". Rol::$campoClave."='". $var. "'",'ERR EXIST');
		
		if ($consulta->num_rows > 0)
			return true;
		else
			return false;
				
	}
	//Funcioens que transforman el Objeto en un array de propiedades y viceversa para almacenarlo en una variable de sesion
	
	public function DatosParaSesion()
	{
		$array[0] = $this->ROL_nombre;
		$array[1] = $this->ROL_descripcion;
		$array[2] = sizeof($this->getUsuarios());
		foreach($this->getUsuarios() as $var)
		{
			$array[sizeof($array)] = $var;
		}
		foreach($this->getFuncionalidades() as $var)
		{
			$array[sizeof($array)] = $var;
		}
		return $array;
	}
	public function CargarDatosSesion($array)
	{
		$this->ROL_nombre = $array[0];
		$this->ROL_descripcion= $array[1];
		
		$paro = 3;
		
		for($i = 3; $i < $array[2]+3;$i++,$paro = $i)
		{
			$this->addUsuario($array[$i]);
		}
		for($i = $paro; $i < sizeof($array);$i++)
		{
			$this->addFuncionalidad($array[$i]);
		}
	}

}
?>
