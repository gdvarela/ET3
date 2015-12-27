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

//A simple report writer 
class ReportWriterHTML extends ReportWriter
{
	function startReport() {}
	function endReport() {
		flush();
	}	
		
	function addItem2($pagina, $errors)
	{
		$ret = "";
		$url = $pagina->getUrlMostrar();
		$url2 = $pagina->getUrlFile();
		$datosPrueba = $pagina->getDatosPrueba();
		$colour = (is_null($errors) || count($errors)==0? "#ccffcc" : "#ffcccc");
		
	
		$ret .= "<div style=\"margin: 2px; background-color:$colour; font-size:12px; border-bottom: 1px solid #000000\">";
		
		
		$ret .= "<div><a style=\"color:black;\" href=\"$url\"><b><i>$url</i></b></a>$datosPrueba</div>";		
		
		$message="";
		//if we have any errors, create a small report
		if(!is_null($errors) && count($errors)>0)
		{
			while (list(, $error) = each($errors)) 
			{
				$message.="<b>".$error->getType()."</b>: ".$error->getMessage()." "."<a href=\"$url2\">".$error->getFile()."</a> at line <b>".$error->getLine()."</b><br/>";
			}
		}
		$ret .= "<div style=\"margin-left:50px;\">$message</div>";
		$ret .= "</div>";
		
		
		return $ret;		
	}
		
	function addItemMessage2($success, $pagina, $message)
	{
		$ret = "";
		$colour = ($success? "#ccffcc" : "#ffcccc");
		$url = $pagina->getUrlMostrar();
		$url2 = $pagina->getUrlFile();
		$datosPrueba = $pagina->getDatosPrueba();
		$ret .= "<div style=\"margin: 2px; background-color:$colour; font-size:12px; border-bottom: 1px solid #000000\">";
		$ret .= "<div><a style=\"color:black;\" href=\"$url\"><b><i>$url</i></b></a>$datosPrueba</div>";
		$ret .= "<div style=\"margin-left:50px;\">$message</div>";
		$ret .= "</div>";
		return $ret;
	}	
}

?>