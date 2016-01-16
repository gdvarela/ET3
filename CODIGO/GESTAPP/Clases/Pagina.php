<?php
include_once '../../Clases/BaseDatosControl.php';

Class Pagina
{
	private static $nombreTabla = "PAGINAS";
	private static $campoClave = "PAG_nombre";
	private static $rel1 = "IMPLEMENTADA_EN";
	private static $rel2 = "TAMBIEN_ACCEDE";
	
	public $PAG_nombre;
	public $PAG_descripcion;
	public $PAG_ubicacion;
	public $USUARIOS_ASOCIADOS ;
	public $FUNCIONALIDADES_ASOCIADAS ;
	
	function __construct()
	{
		$this->PAG_nombre = "";
		$this->PAG_descripcion = "";
		$this->PAG_ubicacion = "";
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
	
		$BD->OperacionGenericaBD('DELETE from '. Pagina::$rel1.' where '. Pagina::$campoClave.' = "'.$ClaveAnt.'"','ACT ERR F-P');

		$BD->OperacionGenericaBD('DELETE from '. Pagina::$rel2.' where '. Pagina::$campoClave.' = "'.$ClaveAnt.'"','ACT ERR U-P' );
	
		$sql = "UPDATE  ". Pagina::$nombreTabla." SET 
			`PAG_nombre` =  '".$this->PAG_nombre."',
			`PAG_descripcion` =  '".$this->PAG_descripcion."',
			`PAG_ubicacion` =  '".$this->PAG_ubicacion."'
			WHERE  ". Pagina::$campoClave." =  '".$ClaveAnt."'";
		$BD->OperacionGenericaBD($sql,'ACT ERR P');

		foreach ($this->getUsuarios() as &$var)
		{
			$BD->OperacionGenericaBD("Insert into ". Pagina::$rel2." (". Pagina::$campoClave.",Login) 
			values ('".$this->PAG_nombre."','".$var."')",'ACT ERR U-P');
		}

		foreach ($this->getFuncionalidades() as &$var2)
		{
			$BD->OperacionGenericaBD("Insert into ". Pagina::$rel1." (". Pagina::$campoClave.",FUN_nombre) 
			values ('".$this->PAG_nombre."','".$var2."')",'ACT ERR F-P');
		}	
	}

	public function AlmacenarBD()
	{
		$BD = new BaseDatosControl();
	
		$BD->OperacionGenericaBD("Insert into ". Pagina::$nombreTabla." (". Pagina::$campoClave.",PAG_descripcion,PAG_ubicacion) 
		values ('". $this->PAG_nombre."','". $this->PAG_descripcion ."','". $this->PAG_ubicacion."')",'ALT ERR P');
	
		foreach ($this->getUsuarios() as &$var)
		{
			$BD->OperacionGenericaBD("Insert into ". Pagina::$rel2." (". Pagina::$campoClave.",Login) 
			values ('".$this->PAG_nombre."','".$var."')",'ACT ERR U-P');
		}
	
		foreach ($this->getFuncionalidades() as &$var)
		{
			$BD->OperacionGenericaBD("Insert into ". Pagina::$rel1." (". Pagina::$campoClave.",FUN_nombre) 
			values ('".$this->PAG_nombre."','".$var."')",'ACT ERR F-P');
		}
	}
	
	public function existeDirectorioUbicacion()
	{
		$carpetas = explode('/',$this->PAG_ubicacion);
		$cadenaDirectorio = "../../..";
		for ($i = 1;$i < sizeof($carpetas)-1;$i++ )
		{
			$cadenaDirectorio = $cadenaDirectorio."/".$carpetas[$i];
			if (!file_exists($cadenaDirectorio)){
				return false;
			}
		}
		
		return TRUE;
	}
	
	public static function EliminarPaginaBD($var)
	{
		
		$BD = new BaseDatosControl();
		
		if (is_a($var,"Pagina"))
		{
			$var = $var->$PAG_nombre;
		}
		
		
		$BD->OperacionGenericaBD("DELETE FROM ". Pagina::$nombreTabla." where ". Pagina::$campoClave."='". $var ."'",'ELI ERR P');
			
		$BD->OperacionGenericaBD("DELETE FROM ". Pagina::$rel2." where ". Pagina::$campoClave."='". $var ."'",'ACT ERR U-P');
			
		$BD->OperacionGenericaBD("DELETE FROM ". Pagina::$rel1." where ". Pagina::$campoClave."='". $var ."'",'ACT ERR F-P');
		
		
	}

	public static function ListadoPaginas($opciones)
	{
		
		$BD = new BaseDatosControl();
		
		
		return $BD->OperacionGenericaBD("Select * from ". Pagina::$nombreTabla. " ". $opciones,'CON ERR P');
		
	}

	public static function getPaginaBD($var)
	{
		
		$BD = new BaseDatosControl();
		
		$devolver = new Pagina();
		
		$resultado = $BD->OperacionGenericaBD("Select * from ". Pagina::$nombreTabla." where ". Pagina::$campoClave."='". $var."'",'CON ERR SP');
		
		if ($resultado->num_rows == 0)
			return null;
		
		$TuplaAcceso = $resultado->fetch_assoc();
		
		$devolver->PAG_nombre = $TuplaAcceso['PAG_nombre'];
		$devolver->PAG_descripcion = $TuplaAcceso['PAG_descripcion'];
		$devolver->PAG_ubicacion = $TuplaAcceso['PAG_ubicacion'];
		
		$consultaREl = Pagina::getUsuariosPagina($devolver->PAG_nombre);
		
		$numF = $consultaREl->num_rows;
		for ($i2 = 0; $i2 < $numF ;$i2++){
			$TuplaF  = $consultaREl->fetch_assoc();
			 $devolver->addUsuario($TuplaF['Login']);
		}
		
		$consultaREl = Pagina::getFuncionalidadesPagina($devolver->PAG_nombre);
		
		$numF = $consultaREl->num_rows;
		for ($i2 = 0; $i2 < $numF ;$i2++){
			$TuplaF  = $consultaREl->fetch_assoc();
			 $devolver->addFuncionalidad($TuplaF['FUN_nombre']);
		}
		
		return $devolver;
	}

	public static function getUsuariosPagina($var){
		if (is_a($var,"Pagina"))
		$var = $var->$PAG_nombre;
	
		$BD = new BaseDatosControl();
	
		return $BD->OperacionGenericaBD("select * from ". Pagina::$rel2." where ". Pagina::$campoClave."='". $var. "'",'ACT ERR U-P');
	}
	
	public static function getFuncionalidadesPagina($var){
		if (is_a($var,"Pagina"))
			$var = $var->$PAG_nombre;
		
			$BD = new BaseDatosControl();
		
			return $BD->OperacionGenericaBD("select * from ". Pagina::$rel1." where ". Pagina::$campoClave."='". $var. "'",'ACT ERR F-P');
	}

	public static function existePagina($var)
	{
		$BD = new BaseDatosControl();
	
		$consulta = $BD->OperacionGenericaBD("select * from ". Pagina::$nombreTabla." where ". Pagina::$campoClave."='". $var. "'",'ERR EXIST');
		
		if ($consulta->num_rows > 0)
			return true;
		else
			return false;
	}
	//Funcioens que transforman el Objeto en un array de propiedades y viceversa para almacenarlo en una variable de sesion
	public function DatosParaSesion()
	{
		$array[0] = $this->PAG_nombre;
		$array[1] = $this->PAG_descripcion;
		$array[2] = $this->PAG_ubicacion;
		$array[3] = sizeof($this->getUsuarios());
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
		$this->PAG_nombre = $array[0];
		$this->PAG_descripcion= $array[1];
		$this->PAG_ubicacion= $array[2];
		
		$paro = 4;
		
		for($i = 4; $i < $array[3]+4;$i++,$paro = $i)
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