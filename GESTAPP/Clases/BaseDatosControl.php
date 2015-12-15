<?php
Class BaseDatosControl
{
	public $conexionBD;
	function __construct()
	{
		//$this->conexionBD = new mysqli('localhost','u207305927_gp4', '1234567','u207305927_gp4');// gestapp.hol.es
		$this->conexionBD = new mysqli('localhost','gC', 'gC','ET3gC'); //maquina virtual
		if ($this->conexionBD->connect_errno) {
			throw new Exception('ERR CONECT BD=><br>Error: ' . $this->conexionBD->error);
		}
	}
	
	//Operacion de consulta sobre la Base de datos. En este punto
	// es donde se generan las excepciones de conexion y que se manejaran
	// en niveles superiores de la aplicacion
	function OperacionGenericaBD($var,$Error = "1")
	{
		if (!$resultado = $this->conexionBD->query($var))
		{
			throw new Exception($Error . "=>". $var . "<br>Error: " . $this->conexionBD->error . "");
			
		}
		return $resultado;
	}
	
	
}
?>
