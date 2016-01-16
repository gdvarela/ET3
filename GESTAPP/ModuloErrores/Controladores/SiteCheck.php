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
				if (strpos($prop,'=>') !==FALSE )
				{
					$prop = str_replace('=>','*',$prop); //Como se va a hacer explode por '=' el simbolo '=>' crearia problemas entonces se cambia por '*', despues se vuelve a cambiar.
				}
				$p = explode("=",$prop);
				if (!empty($p[0]))
					$arrayPropiedades[$p[0]] = str_replace('*','=>',$p[1]);
			}
			print_r($arrayPropiedades);
			
			$RUTARELATIVA = "/";
			$rutaEsteFichero = explode("/",$_SERVER['SCRIPT_NAME']);
			for($i = 0; $i < count($rutaEsteFichero);$i = $i + 1)
			{
				if ($i > 3)
					$RUTARELATIVA ="/".$rutaEsteFichero[count($rutaEsteFichero)-$i-1].$RUTARELATIVA;
			}
			
			$RUTARELATIVA = str_replace(' ','%20',$RUTARELATIVA);
			
			echo $RUTARELATIVA;
			//Con todos los parametros de la pagina establecidos se crea.
			$this->Paginas[] = new Page($RUTARELATIVA .$elementos[0],$elementos[1],$arrayPropiedades,$port, $host);
		}
		
		$this->reportWriter = $reportWriter;
	}
	
	function runCheck2()
	{
		$ret = "";
		foreach($this->Paginas as $pagina)
		{
			
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
		$fp = fsockopen($host, $port, $errno, $errstr, 10);
		$output="";
		return $pagina->peticion_http();
	}
	
	
}
?>
