<?php
/*include ("SiteCheck.php");
		include ("URLSourceArray.php");
		include ("ReportWriterHTML.php");*/
Class TestErrores2
{

function __construct()
{
}

function Display($idioma)
{
	$pruebaPermisos = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/Permisos.html", "w");
      if ( !$pruebaPermisos ) {
       $_SESSION['error']='ESCRITURA';
      }  
	  else
	  {
		 //FORMULARIOS DE ALTA
	$data_url = "";
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_AltaMiembrosP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_Miembros.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);

	
	$data_url = "";
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_AltaPrensaP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_Prensa.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	
	$data_url = http_build_query (array("TIPO" => "E"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_AltaColaboracionesP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_Colaboraciones1.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	$data_url = http_build_query (array("TIPO" => "G"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_AltaColaboracionesP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_Colaboraciones2.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	$data_url = http_build_query (array("TIPO" => "I"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_AltaColaboracionesP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_Colaboraciones3.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	
	$data_url = http_build_query (array("TIPO" => "PA"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_AltaTransferenciasP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_Transferencias1.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	$data_url = http_build_query (array("TIPO" => "PO"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_AltaTransferenciasP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_Transferencias2.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	$data_url = http_build_query (array("TIPO" => "CO"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_AltaTransferenciasP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_Transferencias3.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);
	
	$data_url = http_build_query (array("TIPO" => "L"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_AltaPublicacionesP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_Publicaciones1.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	$data_url = http_build_query (array("TIPO" => "A"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_AltaPublicacionesP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_Publicaciones2.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	$data_url = http_build_query (array("TIPO" => "C"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_AltaPublicacionesP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_Publicaciones3.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);
	
	$data_url = http_build_query (array("TIPO" => "ED"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_AltaActividadesP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_Actividades1.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	$data_url = http_build_query (array("TIPO" => "RE"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_AltaActividadesP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_Actividades2.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	$data_url = http_build_query (array("TIPO" => "CON"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_AltaActividadesP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_Actividades3.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);
	
	$data_url = http_build_query (array("TIPO" => "D"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_AltaDocenciaP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_Docencia1.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	$data_url = http_build_query (array("TIPO" => "M"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_AltaDocenciaP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_Docencia2.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);
	
	//FORMULARIOS DE MOD
	$data_url = "";
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_ModMiembrosP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_ModMiembros.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);

	
	$data_url = "";
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_ModPrensaP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_ModPrensa.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	
	$data_url = http_build_query (array("TIPO" => "E"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_ModColaboracionesP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_ModColaboraciones1.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	$data_url = http_build_query (array("TIPO" => "G"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_ModColaboracionesP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_ModColaboraciones2.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	$data_url = http_build_query (array("TIPO" => "I"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_ModColaboracionesP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_ModColaboraciones3.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	
	$data_url = http_build_query (array("TIPO" => "PA"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_ModTransferenciasP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_ModTransferencias1.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	$data_url = http_build_query (array("TIPO" => "PO"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_ModTransferenciasP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_ModTransferencias2.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	$data_url = http_build_query (array("TIPO" => "CO"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_ModTransferenciasP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_ModTransferencias3.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);
	
	$data_url = http_build_query (array("TIPO" => "L"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_ModPublicacionesP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_ModPublicaciones1.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	$data_url = http_build_query (array("TIPO" => "A"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_ModPublicacionesP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_ModPublicaciones2.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	$data_url = http_build_query (array("TIPO" => "C"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_ModPublicacionesP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_ModPublicaciones3.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);
	
	$data_url = http_build_query (array("TIPO" => "ED"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_ModActividadesP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_ModActividades1.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	$data_url = http_build_query (array("TIPO" => "RE"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_ModActividadesP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_ModActividades2.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	$data_url = http_build_query (array("TIPO" => "CON"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_ModActividadesP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_ModActividades3.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);
	
	$data_url = http_build_query (array("TIPO" => "D"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_ModDocenciaP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_ModDocencia1.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);	
	$data_url = http_build_query (array("TIPO" => "M"));
	$data_len = strlen ($data_url);
	$contenido = file_get_contents ("http://".$_SERVER['SERVER_NAME']."".RutaSinDir(dirname($_SERVER["PHP_SELF"]),3)."/Controladores/Privada/C_ModDocenciaP.php", false, stream_context_create (
																array (
																	'http'=>array (
																		'method'=>"POST", 
																		'timeout' => 10,
																		'header'=>"Content-Type: application/x-www-form-urlencoded\r\nConnection: close\r\nContent-Length: $data_len\r\nCookie:TEST=1",
																		'content'=>$data_url
																	)
																)
															)
												);
	$nuevoarchivo = fopen(dirname($_SERVER["SCRIPT_FILENAME"])."/PaginasDinamicas/TestearC_ModDocencia2.html", "w"); 
	fwrite($nuevoarchivo,$contenido); 
	fclose($nuevoarchivo);
	  }
	include '../../Comun/V_Cabecera.php';
	include '../../Comun/V_MenuLateral.php';
	
		
	//Aqui va el cuerpo principal de la pagina
?>
<div id="contenido">
	<div id="barraLocalizacion">
				<div id="histAct">> <?php echo $idioma['TestErrores']?></div>
				<img onClick="window.history.back()" id="historialAtras" src="../../Imagenes/historyBack.png" />
			</div>
			<h3>Para la realizacion de estas pruebas de testeo se necesita que el directorio tenga permisos de escritura, las paginas son dinamicas.
				Se crean dinamicamente para la realizacion de los test puesto que no hay un usuario que entre en ellas a mano.
				Se almacenan en el directorio PaginasDinamicas y una vez se han creado dinamicamente se realiza el test automático.
			</h3>
	<!-- A partir de aqui meteis vuestro codigo -->
	<form  action="testErrores2.php" method="get">
	<strong>Url JSON:</strong>
	<br>
      <input id="dataUrl" value="PruebasTodo.json" required placeholder="<?php echo $idioma['Aclaracion']?>" type="text" name="dataUrl" value="">
      <br>
      <button type="submit"><?php echo $idioma['Enviar']?></button>
	</form>
	<h1><?php echo $idioma['Tests'] ?></h1>

    <div class="">
      <h2><?php echo $idioma['Resultados parciales:'] ?></h2>
      <ul id="resultados-parciales"></ul>
    </div>

    <div class="">
      <h2><?php echo $idioma['Resultados totales:'] ?></h2>
      <textarea id="resultados-totales"></textarea>
      <div id="estadisticas">
        <h3><?php echo $idioma['Estadísticas:'] ?></h3>
        <ul>
          <li><string><?php echo $idioma['Total tests incorrectos:'] ?></string><span id="total-tests-incorrectos"></span></li>
          <li><string><?php echo $idioma['Total tests:'] ?><string><span id="total-tests"></span></li>
          <li><string><?php echo $idioma['Total campos erróneos:'] ?></string><span id="total-campos-erroneos"></span></li>
          <li><string><?php echo $idioma['Total campos:'] ?></string><span id="total-campos"></span></li>
          <li><string><?php echo $idioma['Total formularios erróneos:'] ?></string><span id="total-formularios-erroneos"></span></li>
          <li><string><?php echo $idioma['Total formularios:'] ?></string><span id="total-formularios"></span></li>
          <li><string><?php echo $idioma['Total páginas erróneas:'] ?></string><span id="total-paginas-erroneas"></span></li>
          <li><string><?php echo $idioma['Total páginas:'] ?></string><span id="total-paginas"></span></li>
        </ul>
      </div>
      <div id="div-tabla-resultados">
        <h3><?php echo $idioma['Tabla resultados:'] ?></h3>
      </div>
    </div>

    <div class="">
      <h2><?php echo $idioma['Errores:'] ?></h2>
      <pre id="errores"></pre>
    </div>

    <script text="text/javascript" src="../../Comun/jquery.min.js"></script>
    <script type="text/javascript" src="../../Comun/tcn.js"></script>
    <script type="text/javascript" src="../../Comun/test.js"></script>
<?php
	 if(isset($_SESSION["Resultado"]))
	 {
		echo $_SESSION['Resultado'];
		unset( $_SESSION['Resultado']);
	 }
	
		
	//Fin de cuerpo de pagina

	//incluimos el pie de pagina que llevan todas las paginas de la web
	include '../../Comun/V_Pie.php';

}

}

?>

