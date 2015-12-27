<?php
class Page
{
	var $request = "";
	var $port;
	var $host;
	var $name;
	var $datos;
	var $method;
	var $cookies = "";
	function Page($namea,$method,$values,$port,$host)
	{
		$this->method = strtoupper($method); 
		$this->port = $port;
		$this->host = $host;
		
		$this->name = $namea;
		
		if ( $this->method == "GET" ) {
			
			$this->name .= '?'; 
			
			//Cada par {propiedad}={valor} es añadido a la peticion <<1>>
			foreach( $values AS $prop => $value ){ 
				$this->name .= urlencode( $prop ) . "=" . urlencode( $value ) . '&'; 
			}
			
			//Se elimina el ultimo & añadido en el paso anterior(1).
			$this->name = substr( $this->name, 0, -1 );
			
		}
		else
		{
			$this->datos = $values;
		}
		
		$cokies = "Cookie:";
		foreach($_COOKIE as $key => $value)
		{
			if ($key == "PHPSESSID")
			$cokies .= " ". $key  . "=" . $value  . ';'; 
		}
		$cokies .= " TEST=1;"; 
		$cokies = substr( $cokies, 0, -1 );
		$cokies .="\r\n"; 
		
			$this->cookies .= $cokies; 
	}
	
	function getUrlMostrar()
	{
		return "http://".$this->host.":".$this->port.$this->name;
	}
	function getUrlFile()
	{
		return "file:///".$this->host.":".$this->port.$this->name;
	}
	function getDatosPrueba()
	{
		if ($this->datos == "")
		{
			return "<br>Metodo: ".$this->method ."<br>".$this->cookies;
		}
		else
		{
			$Datos = "";
			foreach($this->datos as $key => $value)
			{
				$Datos .= $key  . "=" . $value  . ', '; 
			}
			return "<br>Metodo: ".$this->method ."<br>Valores: ". $Datos."<br>".$this->cookies;
		}
		
	}
	function peticion_http ()
	{
		ini_set('default_socket_timeout', 60);
		$url =$this->getUrlMostrar();
		if (sizeof($this->datos) > 0)
			$data_url = http_build_query ($this->datos);
		else
			$data_url = "";
		$data_len = strlen ($data_url);

		if ($this->method == "POST")
				return array (
				'content'=>file_get_contents ($url, false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>$this->method, 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\n".$this->cookies,
																		'content'=>$data_url
																	)
																)
															)
												), 
				'headers'=>$this->getHeaders($http_response_header)
				);
		else
			return array (
				'content'=>file_get_contents ($url, false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>$this->method, 
																		'timeout' => 10,
																		'header'=>"Connection: close\r\n".$this->cookies
																	)
																)
															)
												), 
				'headers'=>$this->getHeaders($http_response_header)
				);
	}
	function getHeaders($array)
	{
		$hdrs = array();	
		for($i=0;$i<count($array);$i++)
		{
			if(  ereg("([A-Za-z]+)/([0-9]\.[0-9]) +([0-9]+) +([A-Za-z]+)",$array[$i],$r)  )
			{
				$hdrs['version'] = trim($r[2]);
				$hdrs['status_code'] = (int)trim($r[3]);
				$hdrs['status_text'] = trim($r[4]);
	    	}
	    	elseif(ereg("([^:]*): +(.*)",$array[$i],$r))
	    	{
				$hdr = eregi_replace("-","_",trim(strtolower($r[1])));
				$hdrs[$hdr] = trim($r[2]);
		    }
		}	
	 	return $hdrs;
	}
}
?>