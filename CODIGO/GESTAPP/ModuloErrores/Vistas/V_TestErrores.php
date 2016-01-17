<?php
/*include ("SiteCheck.php");
		include ("URLSourceArray.php");
		include ("ReportWriterHTML.php");*/
Class TestErrores
{

function __construct()
{
}

function Display($idioma)
{
	include '../../Comun/V_Cabecera.php';
	include '../../Comun/V_MenuLateral.php';
	
		
	//Aqui va el cuerpo principal de la pagina
?>
<style>
            li span {
                color:#fff;
                border:1px solid #ccc;
                background-color:#808080;
                margin-right:10px;
                padding: 0 2px;
                border-radius:4px;
                -moz-border-radius:4px;
                -webkit-border-radius:4px;
                -o-border-radius:4px;
                border-radius:4px;
                font-weight:bold;
                font-size:0.8em;
                cursor:pointer;
            }
        </style>
<script>
		
        /**
         * Funcion que añade un <li> dentro del <ul>
         */
        function AñadirPagina()
        {
            var pag=document.getElementById("PageList").value;
			var props=document.getElementById("Propiedades").value; 
			var radioGet = document.getElementById("GET");
			var radioPOST = document.getElementById("POST");
			var method = "GET";
			
			if (radioPOST.checked)
			{
				method = "POST";
			}
			
			var composicion =  pag +"@"+method+"@" +props
            if(pag.length>0)
            {
                if(!ExistePagina(composicion))
                {
                    var li=document.createElement('li');
                    li.id=composicion;
                    li.innerHTML="<span onclick='eliminar(this)'>X</span> "+ pag +" "+method+" " +props;
                    document.getElementById("listaDesordenada").appendChild(li);
					document.getElementById("PaginasComprobar2").value+=composicion+";";
                }
            }
            return false;
        }
 
        /**
         * Funcion que busca si existe ya el <li> dentrol del <ul>
         * Devuelve true si no existe.
         */
        function ExistePagina(contenido)
        {
            var el = document.getElementById("listaDesordenada").getElementsByTagName("li");
            for (var i=0; i<el.length; i++)
            {
                if(el[i].getAttribute("id")==contenido)
                    return true;
            }
            return false;
        }
 
        /**
         * Funcion para eliminar los elementos
         * Tiene que recibir el elemento pulsado
         */
        function eliminar(elemento)
        {
            var id=elemento.parentNode.getAttribute("id");
            node=document.getElementById(id);
            node.parentNode.removeChild(node);
			document.getElementById('PaginasComprobar2').value = document.getElementById('PaginasComprobar').value.replace(id+";","");
        }
    </script>
<div id="contenido">
	<div id="barraLocalizacion">
				<div id="histAct">> <?php echo $idioma['TestErrores']?></div>
				<img onClick="window.history.back()" id="historialAtras" src="../../Imagenes/historyBack.png" />
			</div>
			<h1><?php echo $idioma['TIT TEST'];?></h1>
			<fieldset id="filtro2">
				<legend><?php echo $idioma['PAG_DIR']?>: </legend>
				<br><b><i>Solo se muestran .php y .html y se omiten directorios de GESTAPP</i></b><br>
				<?php
				
				// Funcion que recibe una ruta de un directorio y muestra su contenido
				// Variable $esp es el espaciado que debe mostrar cada elemento encontrado, es para diferenciar profundidades de directorios
				// Variable $preR es la ruta previa al directorio, esto sera util en llamadas recursivas a este metodo
				function listar_directorios_ruta($ruta,$esp,$preR){ 
					//Se comrpueba si es un directorio
				   if (is_dir($ruta)) { 
					//Funcion opendir() que crea un objeto directorio
					  if ($dh = opendir($ruta)) { 
					  $esp = $esp."&nbsp;&nbsp;&nbsp;&nbsp;"; //Como entramos dentro de un directorio nuevo, los elementos listados estaran un poco mas a la derecha
					  
						//Manera rapida de recorrer los elementos contenidos en el objeto directorio creado anteriormente
						 while (($file = readdir($dh)) !== false) { 
							// cada elemento comprobamos si es .PHP o .HTML y si es asi lo mostramos
							if (strtoupper(explode(".",$file)[count(explode(".",$file))-1]) == "PHP" || strtoupper(explode(".",$file)[count(explode(".",$file))-1]) == "HTML")
							{
								echo "<br><a href=\"#\" style=\"font-size:bold;color:red;\" onClick=\"document.getElementById('PageList').value='".$preR.$file."';\"> ".$esp."-$file</a>"; 
								
							}
							
						 } 
						 closedir($dh); // Se cierra el objeto directorio, cierra el flujo de lectura sobre el directorio en cuestion
					  }
					  
					  //Una vez leidos los ficheros del directorio, repetimos el proceso para los directorios contenidos
					  if ($dh = opendir($ruta)) { 
					  
						//Recorremos el directorio otravez
						 while (($file = readdir($dh)) !== false) { 
							// Se saltan los directorios Actual y Padre que por defecto lista tambien como elementos del directorio
							if (is_dir($ruta . $file) && $file!="." && $file!=".."){ 
								
								//No se listan los ficheros de Gestapp ya que no se realizan pruebas sobre ellos (A saber k sale de ahi)
							  if (strpos($file,'GESTAPP') === false) 
							  {
								  //Se muestra el mensaje de que es un directorio y se llama a esta misma funcion otra vez recursivamente para listar 
								  // los elementos del subdirectorio
								echo "<br>".$esp."Directorio: ".SUBSTR($ruta.$file,strpos($ruta.$file,"/../")+9)."";
								listar_directorios_ruta($ruta . $file . "/",$esp,$preR.$file."/"); 
							  }
							} 
						 } 
					  closedir($dh); 
					  } 
				   }else 
					  echo "<br>No es ruta valida"; 
				}
				//El primer parametro el un poco extraño pero es una manera rapida de listar solo los elementos del directorio de nuestra web
				// sin salirnos a fuera de nuestro directorio y listar otras carpetas externas u otras paginas web alojadas en la maquina virtual (o servidor etc...)
				listar_directorios_ruta(dirname($_SERVER["DOCUMENT_ROOT"].$_SERVER["SCRIPT_NAME"])."/../../../", "" ,"/");
				
				?>
			</fieldset>
	<!-- A partir de aqui meteis vuestro codigo -->
		
			<table id="tablaladofiltro" border=1 width=100% style="float:left">
			<tr>
					<td>
						<form method="POST" action="Example.php">
						<!-- Valores de ejemplo ya añadidos -->
						<?php 
								//Transferencias son varios tipos por tanto ALTA y MODIFICACION se ejecuta una prueba por cada una
								//Solo cambia el formulario que se muestra, pero aun asi se tiene que probar igual
							 
								//Colaboraciones son varios tipos por tanto ALTA y MODIFICACION se ejecuta una prueba por cada una
								//Solo cambia el formulario que se muestra, pero aun asi se tiene que probar igual
							
								//Transferencias son varios tipos por tanto ALTA y MODIFICACION se ejecuta una prueba por cada una
								//Solo cambia el formulario que se muestra, pero aun asi se tiene que probar igual
							
								//Publicaciones son varios tipos por tanto ALTA y MODIFICACION se ejecuta una prueba por cada una
								//Solo cambia el formulario que se muestra, pero aun asi se tiene que probar igual
							
								//Actividades son varios tipos por tanto ALTA y MODIFICACION se ejecuta una prueba por cada una
								//Solo cambia el formulario que se muestra, pero aun asi se tiene que probar igual
							
								//Para el testeo de probar si funcionan las altas modificaciones y borrados de los datos ProcesaAltaX.php, ProcesaModX.php, ProcesaDelX.php
								// Se ejecutaran los test en serie con datos de test para que tras el test la BD quede como estaba: 
								//                                >>>> Alta - Mod - Del con los mismos datos de testeo <<<<
								// Si se desea comprobar que efectvamente el testeo se realiza corretamente simplemente eliminar de la lista los ProcesaDelX.php y comprobar
								// en la BD que efectivamente quedan los datos probados en los test almacenados en la BD.
								// Los errores de SQL mal construidas son lanzados mediante excepciones y mostrados al usuario, como durante el TEST no hay usuario que lo vea
								// esto de ha modificado lanzando excepciones no controladas para que sean correctamente informadas durante los TEST
						?>
						<input type="hidden" id="PaginasComprobar" name="PaginasComprobar" 
						value="
						/Clases/TablaBD.php@GET@;			
						/Controladores/Publica/ControladorWEB.php@GET@PagMenu=H;
						/Controladores/Publica/ControladorWEB.php@GET@PagMenu=M;
						/Controladores/Publica/ControladorWEB.php@GET@PagMenu=P;
						/Controladores/Publica/ControladorWEB.php@GET@PagMenu=T;
						/Controladores/Publica/ControladorWEB.php@GET@PagMenu=C;
						/Controladores/Publica/ControladorWEB.php@GET@PagMenu=L;
						/Controladores/Publica/ControladorWEB.php@GET@PagMenu=Pu;	
						/Controladores/Publica/ControladorWEB.php@GET@PagMenu=D;							
						/Controladores/Publica/ControladorWEB.php@GET@PagMenu=A;
						
						
						/Controladores/Privada/C_HomeP.php@POST@;			
						/Controladores/Privada/C_AltaMiembrosP.php@POST@;
						/Controladores/Privada/C_MiembrosP.php@POST@;
						/Controladores/Privada/C_ModMiembrosP.php@POST@MOD=1234;			
						/Controladores/Privada/C_PrensaP.php@POST@;
						/Controladores/Privada/C_AltaPrensaP.php@POST@;
						/Controladores/Privada/C_ModPrensaP.php@POST@MOD=1234;		
						
						
						
						/Controladores/Privada/C_AltaTransferenciasP.php@POST@TIPO=PA;
						/Controladores/Privada/C_AltaTransferenciasP.php@POST@TIPO=PO;
						/Controladores/Privada/C_AltaTransferenciasP.php@POST@TIPO=CO;
						/Controladores/Privada/C_ModTransferenciasP.php@POST@TIPO=PA,MOD=1234;
						/Controladores/Privada/C_ModTransferenciasP.php@POST@TIPO=PO,MOD=1234;
						/Controladores/Privada/C_ModTransferenciasP.php@POST@TIPO=CO,MOD=1234;
						/Controladores/Privada/C_TransferenciaP.php@POST@;	
						
						/Controladores/Privada/C_ColaboracionesP.php@POST@;
						/Controladores/Privada/C_AltaColaboracionesP.php@POST@TIPO=I;
						/Controladores/Privada/C_AltaColaboracionesP.php@POST@TIPO=G;
						/Controladores/Privada/C_AltaColaboracionesP.php@POST@TIPO=E;
						/Controladores/Privada/C_ModColaboracionesP.php@POST@TIPO=I,MOD=1234;
						/Controladores/Privada/C_ModColaboracionesP.php@POST@TIPO=E,MOD=1234;
						/Controladores/Privada/C_ModColaboracionesP.php@POST@TIPO=G,MOD=1234;
						
						/Controladores/Privada/C_PublicacionesP.php@POST@;
						/Controladores/Privada/C_AltaPublicacionesP.php@POST@TIPO=L;
						/Controladores/Privada/C_AltaPublicacionesP.php@POST@TIPO=A;
						/Controladores/Privada/C_AltaPublicacionesP.php@POST@TIPO=C;
						/Controladores/Privada/C_ModPublicacion esP.php@POST@TIPO=L,MOD=1234;
						/Controladores/Privada/C_ModPublicacionesP.php@POST@TIPO=A,MOD=1234;
						/Controladores/Privada/C_ModPublicacionesP.php@POST@TIPO=C,MOD=1234;
						
						/Controladores/Privada/C_ActividadesP.php@POST@;
						/Controladores/Privada/C_AltaActividadesP.php@POST@TIPO=RE;
						/Controladores/Privada/C_AltaActividadesP.php@POST@TIPO=ED;
						/Controladores/Privada/C_AltaActividadesP.php@POST@TIPO=CON;
						/Controladores/Privada/C_ModActividadesP.php@POST@TIPO=RE,MOD=1234;
						/Controladores/Privada/C_ModActividadesP.php@POST@TIPO=ED,MOD=1234;
						/Controladores/Privada/C_ModActividadesP.php@POST@TIPO=CON,MOD=1234;
						
						/Controladores/Privada/C_DocenciaP.php@POST@;
						/Controladores/Privada/C_AltaDocenciaP.php@POST@TIPO=D;
						/Controladores/Privada/C_AltaDocenciaP.php@POST@TIPO=M;
						/Controladores/Privada/C_ModDocenciaP.php@POST@TIPO=D,MOD=A|B;
						/Controladores/Privada/C_ModDocenciaP.php@POST@TIPO=M,MOD=1234;
						
						/Controladores/Privada/Procesadores/ProcesaAltaMiembrosP.php@POST@MA-Login=TEST,MA-PASS=TEST,MA-USU_nombre=TEST,MA-USU_apellido=TEST,MA-USU_fecha_alta=0000-00-00,MA-USU_email=TEST;
						/Controladores/Privada/Procesadores/ProcesaModMiembrosP.php@POST@ClaveAnt=Login=>TEST,MA-Login=TEST2,MA-USU_nombre=TEST2;
						/Controladores/Privada/Procesadores/ProcesaDelMiembrosP.php@POST@BORRAR=Login=>TEST2;
						
						/Controladores/Privada/Procesadores/ProcesaAltaPrensaP.php@POST@MP-Titulo_Noticia=TEST,MP-Fecha_Noticia=0000-00-00;
						/Controladores/Privada/Procesadores/ProcesaModPrensaP.php@POST@ClaveAnt=Titulo_Noticia=>TEST,MP-Titulo_Noticia=TEST2,MP-Fecha_Noticia=2000-00-00;
						/Controladores/Privada/Procesadores/ProcesaDelPrensaP.php@POST@BORRAR=Titulo_Noticia=>TEST2;
						
						/Controladores/Privada/Procesadores/ProcesaAltaColaboracionesP.php@POST@TIPO=I,MP-IDInstitucion=TEST,MP-IDParticipante=TEST,MP-Web_Institucion=TEST,MP-Nombre_Institucion=TEST;
						/Controladores/Privada/Procesadores/ProcesaModColaboracionesP.php@POST@TIPO=I,ClaveAnt=IDInstitucion=>TEST,MP-IDInstitucion=TEST2,MP-Nombre_Institucion=TEST2;
						/Controladores/Privada/Procesadores/ProcesaDelColaboracionesP.php@POST@TIPO=I,BORRAR=IDInstitucion=>TEST2,OTRO=IDParticipantes=>TEST;
						
						/Controladores/Privada/Procesadores/ProcesaAltaTransferenciasP.php@POST@TIPO=PA,MP-Nombre_Patente=TEST,MP-Fecha_Patente=0000-00-00,MP-IDPatente=TEST;
						/Controladores/Privada/Procesadores/ProcesaModTransferenciasP.php@POST@TIPO=PA,ClaveAnt=IDPatente=>TEST,MP-IDPatente=TEST2,MP-Nombre_Patente=TEST2;
						/Controladores/Privada/Procesadores/ProcesaDelTransferenciasP.php@POST@TIPO=PA,BORRAR=IDPatente=>TEST2;
						
						/Controladores/Privada/Procesadores/ProcesaAltaPublicacionesP.php@POST@TIPO=L,MP-Titulo_Libro=TEST,MP-ISBN=TEST;
						/Controladores/Privada/Procesadores/ProcesaModPublicacionesP.php@POST@TIPO=L,ClaveAnt=Titulo_Libro=>TEST,MP-Titulo_Libro=TEST2,MP-ISBN=TEST2;
						/Controladores/Privada/Procesadores/ProcesaDelPublicacionesP.php@POST@TIPO=L,BORRAR=Titulo_Libro=>TEST2;
						
						/Controladores/Privada/Procesadores/ProcesaAltaActividadesP.php@POST@TIPO=RE,MP-IDRevista=TEST,MP-Titulo_Revista=TEST;
						/Controladores/Privada/Procesadores/ProcesaModActividadesP.php@POST@TIPO=RE,ClaveAnt=IDRevista=>TEST,MP-IDRevista=TEST2,MP-Titulo_Revista=TEST2;
						/Controladores/Privada/Procesadores/ProcesaDelActividadesP.php@POST@TIPO=RE,BORRAR=IDRevista=>TEST2;
						
						/Controladores/Privada/Procesadores/ProcesaAltaDocenciaP.php@POST@TIPO=M,MP-IDMateria=TEST,MP-Nombre_Materia=TEST;
						/Controladores/Privada/Procesadores/ProcesaModDocenciaP.php@POST@TIPO=M,ClaveAnt=IDMateria=>TEST,MP-IDMateria=TEST2,MP-Nombre_Materia=TEST2;
						/Controladores/Privada/Procesadores/ProcesaDelDocenciaP.php@POST@TIPO=M,BORRAR=IDMateria=>TEST2;
						
						">
						<input type="submit" value="<?php echo $idioma['EjecutarPruebas'];?>">
						</form>
					</td>
				</tr>
				<tr>
					<td><h2>
							<?php echo $idioma['Personalizada'];?>:
						</h2>
					</td>
				</tr>
				<form id="personalizado" method="POST" action="Example.php">
					<input type="hidden" id="PaginasComprobar2" name="PaginasComprobar" value="">
				<tr>
					<td>
					<!-- Page Name -->
						<div id="etiqueta">
							<?php echo $idioma['NomPagTest'];?>:
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" size=80 id="PageList" placeholder="<?php echo $idioma['PC-pagename'];?>">	<br>	
						<?php echo $idioma['EXP'];?>
					</td>
				</tr>
				<tr>
					<td>
						<!-- Propiedades -->
						<div id="etiqueta">
							<?php echo $idioma['PropiedadesPeticion'];?>:
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" size=80 id="Propiedades" placeholder="<?php echo $idioma['PC-pageprop'];?>">
						
					</td>
				</tr>
				<tr>
					<td>
						<input type="radio" id="GET" name="metodo" value="GET" checked=""> GET
						<input type="radio" id="POST" name="metodo" value="POST"> POST
					</td>
				</tr>
				<tr>
					<td>
						<input type="button" onclick="return AñadirPagina()" value="Añadir Pagina Test">
						<input type="submit" value="<?php echo $idioma['ProcesarErrores'];?>">
					</td>
				</tr>
				
				<tr>
					<td valign=top>
						<?php echo $idioma['ListaPaginasErrores'];?>
						<ul id="listaDesordenada">
							
						</ul>
					</td>
				</tr> 
				</form>
				<tr>
					<td colspan=10>
					<?php
						if(isset($_SESSION["Resultado"]))
						{
							echo "<h1>".$idioma["Resultados"]."</h1>";
							echo $_SESSION['Resultado'];
							unset( $_SESSION['Resultado']);
						}
					
					?>
					</td>
				</tr>
			</table>
		
	
<?php
	//Fin de cuerpo de pagina

	//incluimos el pie de pagina que llevan todas las paginas de la web
	include '../../Comun/V_Pie.php';


}
}


?>
