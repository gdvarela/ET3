<?php
/*
Copyright (C) 2004  C.N.Eberhardt (webmaster@jugglingdb.com)

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*/

require_once("ErrorMessage.php");
require_once("Page.php");
//abstract class for writing a report based on the site check 
class ReportWriter
{
	function startReport() {}
	function endReport() {}	
	function addItem($url, $errors) {}
	function addItemMessage($success, $url, $message) {}
}

//abstract class which provides SiteCheck with URLs to verify
class URLSource
{
	function getNext() {}	
	function hasNext() {}
}



class SiteCheck
{
	var $Paginas = array();
	var $reportWriter;
	
	/**
	* Constructor
	*
	* @param URLSource 		$urlSource 		the class which provides URLs
	* @param ReportWriter 	$reportWriter 	the class which generates the report
	* @param integer	 	$port 			port of server
	* @param string	 		$host 			host address
	* @param string	 		$dir 			root directory
	*/
	function SiteCheck($urlSource, $reportWriter, $port, $host)
	{
		//set_time_limit(21600);
		while($urlSource->hasNext())
		{
			// $urlSource es como [nombrePagina]@[Metodo]@propiedad1=valor1,propiedad2=valor2...
			
			//Se divide cada String indentificadora de una pagina
			$elementos = explode("@",$urlSource->getNext());
			
			//El ultimo campo separado por @ a su vez se divide en las distintas propiedades a pasar al metodo correspondiente (GET o POST)
			$propiedades = explode(",",$elementos[2]);
			
			//Se recorren las propiedades generando el array de propiedades necesario para crear la pagina
			$arrayPropiedades = array();
			foreach($propiedades as $prop)
			{
				$p = explode("=",$prop);
				if (!empty($p[0]))
					$arrayPropiedades[$p[0]] = $p[1];
			}
			//Con todos los parametros de la pagina establecidos se crea.
			$this->Paginas[] = new Page($elementos[0],$elementos[1],$arrayPropiedades,$port, $host);
		}
		
		$this->reportWriter = $reportWriter;
	}
	
	/**
	* This is the main method for this class. When it is invoked the SiteChecker
	* will proceed to check all the URLs provided by the URLSource, with the 
	* results being sent to the ReportWriter.
	*/
	function runCheck()
	{
		$this->reportWriter->startReport();
		foreach($this->Paginas as $pagina)
		{
			$page = $this->fetchPage($pagina);
			
			if (!empty($page["error"]))
			{ 
				//report an un-expected error
				$this->reportWriter->addItemMessage(false, $pagina, $page["error"]);
			} 
			else if ($page["headers"]["status_code"]!=200)
			{
				//report an HTTP error
				$this->reportWriter->addItemMessage(false, $pagina, "Page not loaded, error code: ".$page["headers"]["status_code"]);
			}
			else
			{
				//report PHP page errors
				$errors = $this->checkForErrors($page["content"]);			
				$this->reportWriter->addItem($pagina, $errors);								
			}
		}
		
		$this->reportWriter->endReport();
	}
	function runCheck2()
	{
		$ret = "";
		$this->reportWriter->startReport();
		foreach($this->Paginas as $pagina)
		{
			
			echo $pagina->getUrlMostrar();
			$page = $this->fetchPage($pagina);
			if (!empty($page["error"]))
			{ 
				//report an un-expected error
				$ret .= $this->reportWriter->addItemMessage2(false, $pagina, $page["error"]);
			} 
			else if ($page["headers"]["status_code"]!=200)
			{
				//report an HTTP error
				$ret .= $this->reportWriter->addItemMessage2(false, $pagina, "Page not loaded, error code: ".$page["headers"]["status_code"]);
			}
			else
			{
				//report PHP page errors
				$errors = $this->checkForErrors($page["content"]);			
				$ret .= $this->reportWriter->addItem2($pagina, $errors);								
			}
		}
		
		$this->reportWriter->endReport();
		return $ret;
	}
	/**
	* This method checks the page provided to deteremine whether their are any PHP
	* errors. Any errors that are found are stored in the array which this 
	* method returns
	*
	* @param string	 $page the HTML of the page to check
	*/
	function checkForErrors($page)
	{
		$errorCount=0;
		$pageErrors = array();
		//Regular expressions use to identify the various parts of the standard PHP errors
		$error = "[a-zA-Z ]*";
		$message = "[;=':_.<>\(\)/a-zA-Z0-9 ]*";
		$file = "[_.\(\)/a-zA-Z0-9 ]*";
		$line = "[0-9]*";
		
		while ( ereg("<b>($error)</b>: ($message) in <b>($file)</b> on line <b>($line)</b>", $page, $matches))
		{
			$pageErrors[$errorCount] = new ErrorMessage($matches[0], $matches[1], $matches[2], $matches[4], $matches[3]);				
			$errorCount++;
			
			//remove this error message from the page, so that we can check for further errors
			$page = str_replace($matches[0], "", $page);
		}
		
		return $pageErrors;
	}
	
	function feof_segura($fp, &$inicio = NULL) {
		$inicio = microtime(true);

		return feof($fp);
	}
	
	/**
	* This method retreives the HTML docment referred to by the URL. It
	* also extracts the header information.
	*
	* @param string	 $url the URL to retrieve
	*/
	function fetchPage($pagina)
	{
		$header = "";
		$host = $pagina->host;
		$port = $pagina->port;
		$content = "";
		//open the socket and send our HTTP request
		echo $host." | " .$port;
		$fp = fsockopen($host, $port, $errno, $errstr, 10);
		$inicio = NULL;
		$timeout = ini_get('default_socket_timeout');
		$output="";
		if ($fp)
		{
			//fwrite($fp, $pagina->request);
			fputs( $fp, $pagina->request ); 
			echo $pagina->request ;
			$cont = 0;
			//while (!feof($fp))
			while(!$this->feof_segura($fp, $inicio) && (microtime(true) - $inicio) < $timeout)
			{
				
				$output=fgets($fp, 4096);
				echo $cont." ".$output." ".$content.";".AAAAAAAAAAAA;
				$content.=$output;
				
				//determine whether we have reached the end of the header section
				if (!isset($header))	
					if($output=="\n" || $output == "\r\n" || $output == "\n\l")
				{
			    	$header = $content;
					$content = '';
				}	
			}
			print_r($_COOKIE);
			
				
			fclose($fp);	
			return array("headers" => $this->getHeaders($header), "content" => $content);
		}
		else
			return array("error" => "Unable to open a connection");
	}
	
	/**
	* This method takes the raw header information and splits it into
	* an array
	*
	* @param string	 $headers the header in a raw format
	*/
	function getHeaders($headers)
	{
		$hdrs = array();
		$array = explode("\n",$headers);	
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
