<?php
include_once '../../Clases/BaseDatosControl.php';

Class Usuario
{
	public $Login;
	public $Pass;
	public $USU_nombre;
	public $USU_apellido;
	public $USU_email;
	public $USU_fecha_alta;
	public $ROLES_ASOCIADOS ;
	public $PAGINAS_ASOCIADAS ;
	
	function __construct()
	{
		$this->Login = "";
		$this->Pass = "";
		$this->USU_nombre = "";
		$this->USU_apellido = "";
		$this->USU_email = "";
		$this->USU_fecha_alta = "";
		$this->ROLES_ASOCIADOS = array();
		$this->PAGINAS_ASOCIADAS = array();
	}
	
	//Funciones de Gestion básicas
	
	public function addRol($rol)
	{
		$num = sizeof($this->ROLES_ASOCIADOS);
		$this->ROLES_ASOCIADOS[$num] = $rol;
	}
	
	public function addPagina($pagina)
	{
		$num = sizeof($this->PAGINAS_ASOCIADAS);
		$this->PAGINAS_ASOCIADAS[$num] = $pagina;
	}
	
	public function getRoles()
	{
		return $this->ROLES_ASOCIADOS;
	}
	public function getPaginas()
	{
		return $this->PAGINAS_ASOCIADAS;
	}
	
	public function Update($ClaveAnt)
	{
		$BD = new BaseDatosControl();
	
		$BD->OperacionGenericaBD('DELETE from HACE_DE where Login = "'.$ClaveAnt.'"','ACT ERR R-U');
	
		$BD->OperacionGenericaBD('DELETE from TAMBIEN_ACCEDE where Login = "'.$ClaveAnt.'"','ACT ERR P-U');
	
		$sql = "UPDATE  USUARIOS SET 
			`Login` =  '".$this->Login."',
			`Pass` =  '".$this->Pass."',
			`USU_nombre` =  '".$this->USU_nombre."',
			`USU_apellido` =  '".$this->USU_apellido."',
			`USU_fecha_alta` =  '".$this->USU_fecha_alta."',
			`USU_email` =  '".$this->USU_email."' 
			WHERE  Login =  '".$ClaveAnt."'";
		$BD->OperacionGenericaBD($sql,'ACT ERR U');
	
		foreach ($this->getRoles() as &$rol)
		{
			$BD->OperacionGenericaBD("Insert into HACE_DE (Login,ROL_nombre) 
			values ('".$this->Login."','".$rol."')",'ACT ERR R-U');
		}
	
		foreach ($this->getPaginas() as &$pagina)
		{
			$BD->OperacionGenericaBD("Insert into TAMBIEN_ACCEDE (Login,PAG_nombre) 
			values ('".$this->Login."','".$pagina."')",'ACT ERR P-U');
		}
	}

	public function AlmacenarBD()
	{
		$BD = new BaseDatosControl();
	
		$BD->OperacionGenericaBD("Insert into USUARIOS (Login, Pass, USU_nombre, USU_apellido,USU_fecha_alta,USU_email) 
		values ('". $this->Login."','". $this->Pass."','". $this->USU_nombre."','". $this->USU_apellido."','" . $this->USU_fecha_alta . "','". $this->USU_email."')",'ALT ERR U');
	
		foreach ($this->getRoles() as &$rol)
		{
			$BD->OperacionGenericaBD("Insert into HACE_DE (Login,ROL_nombre) 
			values ('".$this->Login."','".$rol."')",'ACT ERR R-U');
		}
		
		foreach ($this->getPaginas() as &$rol)
		{
			$BD->OperacionGenericaBD("Insert into TAMBIEN_ACCEDE (Login,PAG_nombre) 
			values ('".$this->Login."','".$rol."')",'ACT ERR P-U');
		}
	}

	public static function EliminarUsuarioBD($user)
	{
		$BD = new BaseDatosControl();
		
		if (is_a($user,"Usuario"))
		{
			$user = $user->$Login;
		}
		
		$BD->OperacionGenericaBD("DELETE FROM USUARIOS where Login='". $user ."'",'ELI ERR U');
			
		$BD->OperacionGenericaBD("DELETE FROM HACE_DE where Login='". $user ."'",'ACT ERR R-U');
			
		$BD->OperacionGenericaBD("DELETE FROM TAMBIEN_ACCEDE where Login='". $user ."'",'ACT ERR P-U');
	}

	public static function ListadoUsuarios($opciones)
	{
		$BD = new BaseDatosControl();
		
		return $BD->OperacionGenericaBD("Select * from USUARIOS ". $opciones);
	}

	public static function getUsuarioBD($Login)
	{
		$BD = new BaseDatosControl();
		
		$user = new Usuario();
		
		$resultado = $BD->OperacionGenericaBD("Select * from USUARIOS where Login='". $Login."'",'CON ERR SU');
		
		if ($resultado->num_rows == 0)
			return null;
		
		$TuplaAcceso = $resultado->fetch_assoc();
		
		$user->Login = $TuplaAcceso['Login'];
		$user->Pass = $TuplaAcceso['Pass'];
		$user->USU_nombre = $TuplaAcceso['USU_nombre'];
		$user->USU_apellido = $TuplaAcceso['USU_apellido'];
		$user->USU_email = $TuplaAcceso['USU_email'];
		$user->USU_fecha_alta = $TuplaAcceso['USU_fecha_alta'];
		
		$consultaRolesUsu = Usuario::getRolesUsuario($user->Login);
		
		$numF = $consultaRolesUsu->num_rows;
		for ($i2 = 0; $i2 < $numF ;$i2++){
			$TuplaF  = $consultaRolesUsu->fetch_assoc();
			 $user->addRol($TuplaF['ROL_nombre']);
		}
		
		$consultaPaginasUsu = Usuario::getPaginasUsuario($user->Login);
		
		$numF = $consultaPaginasUsu->num_rows;
		for ($i2 = 0; $i2 < $numF ;$i2++){
			$TuplaF  = $consultaPaginasUsu->fetch_assoc();
			 $user->addPagina($TuplaF['PAG_nombre']);
		}
		
		return $user;
	}

	public static function getRolesUsuario($user){
		if (is_a($user,"Usuario"))
			$user = $user->$Login;
		
			$BD = new BaseDatosControl();
		
			return $BD->OperacionGenericaBD("select * from HACE_DE where Login='". $user. "'",'CON ERR R-U');
	}
	
	public static function getPaginasUsuario($user){
		if (is_a($user,"Usuario"))
			$user = $user->$Login;
		
			$BD = new BaseDatosControl();
		
			return $BD->OperacionGenericaBD("select * from TAMBIEN_ACCEDE where Login='". $user. "'",'CON ERR P-U');
		
	}

	public static function existeUsuario($login)
	{
			$BD = new BaseDatosControl();
		
		$consulta = $BD->OperacionGenericaBD("select * from USUARIOS where Login='". $login. "'",'ERR EXIST');
		if ($consulta->num_rows > 0)
			return true;
		else
			return false;
				
	}
	
	//Funcioens que transforman el Objeto en un array de propiedades y viceversa para almacenarlo en una variable de sesion
	
	public function DatosParaSesion()
	{
		$array[0] = $this->Login;
		$array[1] = $this->Pass;
		$array[2] = $this->USU_nombre;
		$array[3] = $this->USU_apellido;
		$array[4] = $this->USU_email;
		$array[5] = $this->USU_fecha_alta;
		$array[6] = sizeof($this->getRoles());
		foreach($this->getRoles() as $rol)
		{
			$array[sizeof($array)] = $rol;
		}
		foreach($this->getPaginas() as $var)
		{
			$array[sizeof($array)] = $var;
		}
		return $array;
	}
	public function CargarDatosSesion($array)
	{
		$this->Login = $array[0];
		$this->Pass= $array[1];
		$this->USU_nombre= $array[2];
		$this->USU_apellido= $array[3];
		$this->USU_email= $array[4];
		$this->USU_fecha_alta= $array[5];
		
		$paro = 7;
		
		for($i = 7; $i < $array[6]+7;$i++,$paro = $i)
		{
			$this->addRol($array[$i]);
		}
		for($i = $paro; $i < sizeof($array);$i++)
		{
			$this->addPagina($array[$i]);
		}
	}
}
?>
