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
	include '../../Comun/V_Cabecera.php';
	include '../../Comun/V_MenuLateral.php';
	
		
	//Aqui va el cuerpo principal de la pagina
?>
<div id="contenido">
	<div id="barraLocalizacion">
				<div id="histAct">> <?php echo $idioma['TestErrores']?></div>
				<img onClick="window.history.back()" id="historialAtras" src="../../Imagenes/historyBack.png" />
			</div>
	<!-- A partir de aqui meteis vuestro codigo -->
	<form  action="testErrores2.php" method="get">
	<strong>Url JSON:</strong>
	<br>
      <input id="dataUrl" required placeholder="<?php echo $idioma['Aclaracion']?>" type="text" name="dataUrl" value="">
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

