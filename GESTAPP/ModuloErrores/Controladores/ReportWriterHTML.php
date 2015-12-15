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
	
	function addItem($pagina, $errors)
	{
		
		$url = $pagina->getUrlMostrar();
		$colour = (is_null($errors) || count($errors)==0? "#ccffcc" : "#ffcccc");
		
		echo "<div style=\"margin: 2px; background-color:$colour; font-size:12px; border-bottom: 1px solid #000000\">";
		
		echo "<div><a href=\"$url\">$url</a></div>";
		
		$message="";
		//if we have any errors, create a small report
		if(!is_null($errors) && count($errors)>0)
		{
			while (list(, $error) = each($errors)) 
			{
				$message.="<b>".$error->getType()."</b>: ".$error->getMessage()." "."<a href=\"file:///".
								$error->getFile()."\">".$error->getFile()."</a> at line <b>".$error->getLine()."</b><br/>";
			}
		}
		echo "<div style=\"margin-left:50px;\">Peticion HTTP Asociada: $pagina->request<br>$message</div>";
		echo "</div>";
		
		flush();	
	}	
	function addItem2($pagina, $errors)
	{
		$ret = "";
		$url = $pagina->getUrlMostrar();
		$colour = (is_null($errors) || count($errors)==0? "#ccffcc" : "#ffcccc");
		
	
		$ret .= "<div style=\"margin: 2px; background-color:$colour; font-size:12px; border-bottom: 1px solid #000000\">";
		
		
		$ret .= "<div><a href=\"$url\">$url</a></div>";		
		
		$message="";
		//if we have any errors, create a small report
		if(!is_null($errors) && count($errors)>0)
		{
			while (list(, $error) = each($errors)) 
			{
				$message.="<b>".$error->getType()."</b>: ".$error->getMessage()." "."<a href=\"file:///".
								$error->getFile()."\">".$error->getFile()."</a> at line <b>".$error->getLine()."</b><br/>";
			}
		}
		$ret .= "<div style=\"margin-left:50px;\">Peticion HTTP Asociada: $pagina->request<br>$message</div>";
		$ret .= "</div>";
		
		
		return $ret;		
	}
	function addItemMessage($success, $pagina, $message)
	{
		$colour = ($success? "#ccffcc" : "#ffcccc");
		$url = $pagina->getUrlMostrar();
		echo "<div style=\"margin: 2px; background-color:$colour; font-size:12px; border-bottom: 1px solid #000000\">";
		echo "<div><a href=\"$url\">$url</a></div>";
		echo "<div style=\"margin-left:50px;\">$message</div>";
		echo "</div>";
		
		flush();	
	}	
	function addItemMessage2($success, $pagina, $message)
	{
		$ret = "";
		$colour = ($success? "#ccffcc" : "#ffcccc");
		$url = $pagina->getUrlMostrar();
		$ret .= "<div style=\"margin: 2px; background-color:$colour; font-size:12px; border-bottom: 1px solid #000000\">";
		$ret .= "<div><a href=\"$url\">$url</a></div>";
		$ret .= "<div style=\"margin-left:50px;\">$message</div>";
		$ret .= "</div>";
		return $ret;
	}	
}

?>