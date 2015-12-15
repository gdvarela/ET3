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
	session_start();
	
	ini_set('display_errors', '1');
	include ("SiteCheck.php");
	include ("URLSourceArray.php");
	include ("ReportWriterHTML.php");
	
	$Pags = (explode(";",$_POST["PaginasComprobar"],-1));
	$urlSource = new URLSourceArray(
   		$Pags
		);
		
	$siteCheck = new SiteCheck($urlSource, new ReportWriterHTML(), 80, $_SERVER['SERVER_NAME']);
	//$siteCheck->runCheck();
	//$_SESSION["Resultado"]=$siteCheck->runCheck2();
	echo $siteCheck->runCheck2();
	//$_SESSION["Resultado"]=;
	//header ("Location: testErrores.php");
?>