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
			var dir = document.getElementById("Directorio").value;
			var method = "GET";
			
			if (radioPOST.checked)
			{
				method = "POST";
			}
			if (dir == "")
			{
				dir = "/";
			}
			var composicion = dir + pag +"@"+method+"@" +props
            if(pag.length>0)
            {
                if(!ExistePagina(composicion))
                {
                    var li=document.createElement('li');
                    li.id=composicion;
                    li.innerHTML="<span onclick='eliminar(this)'>X</span> "+dir + pag +" "+method+" " +props;
                    document.getElementById("listaDesordenada").appendChild(li);
					document.getElementById("PaginasComprobar").value+=composicion+";";
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
			document.getElementById('PaginasComprobar').value = document.getElementById('PaginasComprobar').value.replace(id+";","");
        }
    </script>
<div id="contenido">
	<div id="barraLocalizacion">
				<div id="histAct">> <?php echo $idioma['TestErrores']?></div>
				<img onClick="window.history.back()" id="historialAtras" src="../../Imagenes/historyBack.png" />
			</div>
	<!-- A partir de aqui meteis vuestro codigo -->
	<form method="POST" action="Example.php">
	<!-- Valores de ejemplo ya añadidos -->
		<input type="hidden" id="PaginasComprobar" name="PaginasComprobar" value="/PagPrueba.php@GET@;/PagPrueba.php@GET@V=1;/PagPrueba.php@GET@V=2;">
		<div id="div_cuerpo">
		<h1><?php echo $idioma['TIT TEST'];?></h1>
			<table width="100%">
				<tr>
					<td>
					<!-- Directorio -->
						<div id="etiqueta">
							<?php echo $idioma['SubdirectorioAnalizar'];?>:
						</div>
					</td>
					
					<td rowspan=10 valign=top>
					<?php echo $idioma['ListaPaginasErrores'];?>
					<ul id="listaDesordenada">
							<li id="/PagPrueba.php@GET@"><span onclick="eliminar(this)">X</span> /PagPrueba.php GET </li>
							<li id="/PagPrueba.php@GET@V=1"><span onclick="eliminar(this)">X</span> /PagPrueba.php GET  V=1</li>
							<li id="/PagPrueba.php@GET@V=2"><span onclick="eliminar(this)">X</span> /PagPrueba.php GET  V=2</li>
						</ul>
					</td>
				</tr>         
				<tr>
					<td>
						<input type="text" id="Directorio" name="Directorio">
					</td>
				</tr>         
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
						<input type="text" id="PageList">		
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
						<input type="text" id="Propiedades">
						
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
			</table>		
		</div>
		
	</form>
	
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

