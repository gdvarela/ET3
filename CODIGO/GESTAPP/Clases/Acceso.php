<?php
include_once 'BaseDatosControl.php';

Class Acceso
{
	public $Login;
	public $PAG_nombre;
	public $fecha_visita;
	
	function __construct()
	{
		$this->Login = "";
		$this->PAG_nombre = "";
		$this->fecha_visita = "";
	}
	
	//Funcion de consulta de los registros de acceso
	public static function getRegistros($opciones)
	{
		$BD = new BaseDatosControl();
		return $BD->OperacionGenericaBD("Select * from VISITAS ". $opciones,'ERR CON A');
	}
	
	//Funcion que comprueba permisos de un Login a una Pagina.
	// Esta funcion no redirige automaticamente simplemene devuelve 1 o 0 
	// dependiendo de si tiene permisos o no
	public static function  ConPermisosSinRed($Login,$pag)
	{
		$BD = new BaseDatosControl();
		
		$rutaSpliteada = (explode('/',$pag));
		
		$pag = $rutaSpliteada[count($rutaSpliteada)-1];
		
		$consultaDePermisos = $BD->OperacionGenericaBD("select distinct t1.Login
												FROM HACE_DE as t1 , PERMITE as t2, IMPLEMENTADA_EN as t3,PAGINAS as t4
												WHERE (t1.Login = '$Login' AND t1.ROL_nombre = t2.ROL_nombre AND t2.FUN_nombre = t3.FUN_nombre AND t3.PAG_nombre=t4.PAG_nombre) 
												AND (t4.PAG_ubicacion = '$pag')",'ERR PERMISOS');
												
		$consultaDePermisos2 = $BD->OperacionGenericaBD("select distinct t1.Login
												FROM TAMBIEN_ACCEDE as t1 ,PAGINAS as t4
												WHERE (t1.Login = '$Login' AND t1.PAG_nombre=t4.PAG_nombre) 
												AND (t4.PAG_ubicacion = '$pag')",'ERR PERMISOS');
												
		if ($consultaDePermisos->num_rows > 0 || $consultaDePermisos2->num_rows > 0)
			return 1;
		else
			return 0;													
	}
	
	//Igual que la anterior pero realizando un "header()" para
	// redigir al usuario a la pagina indicada mediante "$pagDestError"
	public static function  ConPermisos($Login,$pag,$pagDestError)
	{
		try
		{
			//Comprueba los Permisos con la funcion anterior
			if (Acceso::ConPermisosSinRed($Login,$pag) == 0)
			{
				Acceso::RegistraAcceso($Login,$pag,0);
				$_SESSION['error']= 'ERR ACC';															
				header("Location: ".$pagDestError);
				exit;
			}	
			
			Acceso::RegistraAcceso($Login,$pag,1);
		}
		catch(Exception $e)
		{
			$_SESSION['error']= $e->getMessage();															
			header("Location: ".$pagDestError);
			exit;
		}
	}

	//Instruccion que registra en la base de datos el acceso de un Login a una Pagina  y si
	// se le ha denegado el acceso o no.
	public static function  RegistraAcceso($Login,$pag,$permiso){
		$BD = new BaseDatosControl();
		
		$rutaSpliteada = (explode('/',$pag));
		
		$pag = $rutaSpliteada[count($rutaSpliteada)-1];
		
		$consultaDeNombrePagina = $BD->OperacionGenericaBD("select * FROM PAGINAS where PAG_ubicacion = '$pag'",'ERR ALT A');
		if ($consultaDeNombrePagina->num_rows > 0)
		{
			$TuplaAcceso = $consultaDeNombrePagina->fetch_assoc();
			$BD->OperacionGenericaBD("Insert into VISITAS (Login,PAG_nombre,Permiso,fecha_visita) values ('".$Login."','".$TuplaAcceso['PAG_nombre']."','".$permiso."','". fecha_hora_act() ."')",'ERR ALT A');
		}	
	}
}

?>