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
		if ($var == "")
			return;
		
		if (!$resultado = $this->conexionBD->query($var))
		{
			if (isset($_COOKIE["TEST"]))
			{
				// Ya que todas las llamadas a este método se realiza mediante try {} catch {} si ocurriese un error (Sql mal construida o otro tipo de error)
				// nunca llegaría a mostrarse en un proceso automatico de testeado ya que en el catch se realizan las correciones oportunas de cara al usuario final.
				// en un Test no hay usuario final, ya que simplemente se prueba si funciona o no, mostrando los errores en caso de haberlos.
				// Esta claro que a un usuario normal no se le mostraria un error SQL ya que no lo entenderia, los errores SQL producidos por cualquier razon, base de datos no accesible
				// error en la construccion etc se traducen para hacerlos entendibles al usuario, por tanto cualquier error SQL es tratado y modificado haciendo que la automatizacion de los
				// test no detecten estos errores.
				
				//Si dejamos que salga hacia afuera siemplemente se cargara la pagina normalmente pero mostrando un error al usuario
				// un proceso de test automatico no detectaria que se ha producido una excepcion, por tanto si estamos en el test
				// mostramos un texto de excepcion indicando que la pagina no funciona correctamente
				
				//Para que el control de errores detecte este error se ha modificado el patron de busqueda para que se adapte a este estilo de mensaje que asi se 'echo'.
				echo '<br><b>Warning</b>: #ERROR PERSONALIZADO: '.$this->conexionBD->error.'#'; 
				exit();
			}
			else
			{
				throw new Exception($Error . "=>". $var . "<br>Error: " . $this->conexionBD->error . "");
			}
		}
		
		
		return $resultado;
	}
	
	
}
?>
