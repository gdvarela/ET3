<?php
	include_once "../../Comun/FuncionesComunes.php";
	include_once '../../Clases/BaseDatosControl.php';
	
	session_start();
	
	try{
		$conexionBD = new BaseDatosControl();
	}
	catch(Exception $e)
	{
		//Campo login vacio
		$_SESSION['error'] = 'ERR CONECT BD';
		header("Location: Login.php");
		exit;
	}
	
	//Recpgemos los datos de login
	$Login = recoge('LoginL');
	$Pass = $_POST['PassL'];
	
	//Se comprueban los datos provenientes de default.php que
	// es nuestra pagina de logeo.
	if ($Login=="")
	{
		//Campo login vacio
		$_SESSION['error'] = 'ERR Login';
		header("Location: Login.php");
		exit;
	}
	
	
	try
	{
		$consultaDeAcceso = $conexionBD->OperacionGenericaBD("Select * from USUARIOS where `Login`=\"" . $Login . "\"" );
		$num = $consultaDeAcceso->num_rows;
	
		if ($num == 0)
		{
			//No existe Usuario
			$_SESSION['error'] ='ERR Login';
			header("Location: Login.php");
			exit;
		}
		
		$TuplaAcceso = $consultaDeAcceso->fetch_assoc();
	
		if ($TuplaAcceso['Pass']== $Pass )
		{
			//Login satisfactorio
			$_SESSION['logeado'] = "on";
			$_SESSION['PosicionMenuLateral']='B';
			$_SESSION['username'] = $TuplaAcceso['USU_nombre'];
			$_SESSION['login'] = $Login;
			$_SESSION['pass'] = $Pass;
			header("Location: Principal.php");
		}
		else
		{
			//Contraseña incorrecta
			$_SESSION['error'] = 'ERR Pass';
			header("Location: Login.php");
			exit;
		}
		
	}
	catch(Exception $e)
	{
		$_SESSION['error'] = 'CON ERR U';
		header("Location: Login.php");
		exit;
	}
	
	
	
?>
