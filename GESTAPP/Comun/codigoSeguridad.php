<?php
	
	//Hace que la pagina actual se conecte a la sesion iniciada 
	// o inicie una nueva si no habia ninguna
	session_start();
	
	
	if (!isset($_SESSION['logeado']))
	{
		//No Existe la variable logeado
		header("Location: ../../Principal/Controladores/Login.php");
		exit;
	}
?>