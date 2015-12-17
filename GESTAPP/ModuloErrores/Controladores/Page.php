<?php
class Page
{
	var $request = "";
	var $port;
	var $host;
	var $name;
	
	function Page($namea,$method,$values,$port,$host)
	{
		$method = strtoupper($method); 
		$this->port = $port;
		$this->host = $host;
		
		$this->name = $namea;
		
		$getValues = "";
		if ( $method == "GET" ) {
			//getValues es el String de peticion para GET o POST. En caso de GET se empieza por el simbolo ?
			$getValues = '?'; 
		}
		
		//Cada par {propiedad}={valor} es añadido a la peticion <<1>>
		foreach( $values AS $prop => $value ){ 
			$getValues .= urlencode( $prop ) . "=" . urlencode( $value ) . '&'; 
		}
			
		//Se elimina el ultimo & añadido en el paso anterior(1).
		$getValues = substr( $getValues, 0, -1 );
		
		//Generamos la petición en función del método
		if ( $method == "GET" ) {
			$this->request  = "$method ".$this->name.$getValues." HTTP/1.0\r\n"; 
		}
		else
		{
			$this->request  = "$method ".$this->name." HTTP/1.0\r\n"; 
		}
		
		$this->request .= "Accept: text/html\r\n"; 
		$this->request .= "Host: $host\r\n"; 
		$cookies = "Cookie:";
		foreach($_COOKIE as $key => $value)
		{
			$cookies .= " ". $key  . "=" . $value  . ';'; 
		}
		$cookies = substr( $cookies, 0, -1 );
		$cookies .="\r\n"; 
		
		if (sizeof($_COOKIE) > 0)
			$this->request .= $cookies; 
		
		if ( $method == "POST" ) { 
			$lenght = strlen( $getValues ); 
			$this->request .= "Content-Type: application/x-www-form-urlencoded\r\n"; 
			$this->request .= "Content-Length: $lenght\r\n"; 
			$this->request .= "\r\n"; 
			$this->request .= $getValues; 
		} 
		else{
			$this->request .= "\r\n"; 
		}
		echo $this->request;
	}
	
	function getUrlMostrar()
	{
		return "http://".$this->host.":".$this->port.$this->name;
	}
}
?>