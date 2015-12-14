<?php
session_start();

if (!(isset($_SESSION['logeado'])))
{
	header('location: ./Principal/Controladores/Login.php');
	exit;
}
else
{
	header ('location: ./Principal/Controladores/Principal.php');
	exit;
}

?>