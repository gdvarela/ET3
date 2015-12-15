
<html >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $idioma['Aplicacion GESTAPP']?></title>
	<?php 
	if (!isset($_SESSION['css'])){
		$_SESSION['css'] = '';
	}
	?>
	
	<link rel="stylesheet" type="text/css" href="../../CSS/estilo<?php echo $_SESSION['css']?>.css"/>
	<script type="text/javascript" src="../../Comun/javaScript.js"></script>
</head>
<!-- oncontextmenu="return false" -->
	<body>
	
		<div id="cabecera">
			<div>
				<img style="float:left;" id="logo" src="../../Imagenes/Logotipo.png"/>
				<span>
				<ul class="nav">
					<?php
						echo "<li><a>". $idioma['Bienvenido']." <b><i>". $_SESSION['username'] . "</b></i></a></li>";
					?>
					<li><a href="">Configuracion</a>
						<ul>
							<li><a><?php echo $idioma['Idiomas']; ?></a>
								<ul>
									<li valign=center>
										<a href="../../Principal/Controladores/CambioModelo.php?tipoCambio=ESPANHOL&pagOrigen=<?php echo $_SERVER['SCRIPT_NAME']?>">
											<img id="icoIdioma"  src="../../Imagenes/es.png" /> Español
										</a>
									</li >
									<li valign=center>
										<a href="../../Principal/Controladores/CambioModelo.php?tipoCambio=GALEGO&pagOrigen=<?php echo $_SERVER['SCRIPT_NAME']?>">
											<img id="icoIdioma"  src="../../Imagenes/ga.png" /> Galego
										</a>
									</li>
									<li valign=center>
										<a href="../../Principal/Controladores/CambioModelo.php?tipoCambio=ENGLISH&pagOrigen=<?php echo $_SERVER['SCRIPT_NAME']?>">
											<img id="icoIdioma"  src="../../Imagenes/en.png" /> English
										</a>
									</li>
								</ul>
							</li>
							<li><a ><?php echo $idioma['Estilos']; ?></a>
								<ul>
									<li><a href="../../Principal/Controladores/CambioModelo.php?tipoCambio=CSS1&pagOrigen=<?php echo $_SERVER['SCRIPT_NAME']?>">GESTAPP</a></li>
									<li><a href="../../Principal/Controladores/CambioModelo.php?tipoCambio=CSS2&pagOrigen=<?php echo $_SERVER['SCRIPT_NAME']?>">MalGusto</a></li>
								</ul>
							</li>
							<li valign=center> 
								<a href="../../Principal/Controladores/CambioModelo.php?tipoCambio=ErrDet&pagOrigen=<?php echo $_SERVER['SCRIPT_NAME']?>">
									<?php 
										echo $idioma['ErrDet'];
									?>
									<?php 
										if (isset($_SESSION['ErrDet']))
											if ($_SESSION['ErrDet']=='si')
												echo '<i>ON</i> ';
											else
												echo '<i>OFF</i>';	
										else
											echo '<i>OFF</i>';	
									?>
								</a>
							</li>
						</ul>
					</li>
					<li><a href="../../ModuloErrores/Controladores/testErrores.php"><?php echo $idioma['TestErrores']?></a></li>
					<li><a href="../../Principal/Controladores/Login.php"><?php echo $idioma['Salir']?></a></li>
				</ul>
				</span>
			</div>
			<?php 
				if ( isset($_SESSION['error']))
				{
						if (strpos($_SESSION['error'],'=>'))
						{
							if (isset($_SESSION['ErrDet']))
							{
								if ($_SESSION['ErrDet'] == 'si')
								{
									$error = explode('=>',$_SESSION['error'])[1];
									
								}
								else
								{
									$error=explode('=>',$_SESSION['error'])[0];
									$error = $idioma[$error];
								}
							}
							else
							{
									$_SESSION['ErrDet'] = 'no';
									$error=explode('=>',$_SESSION['error'])[0];
									$error = $idioma[$error];
							}
						}
						else
							$error = $idioma[$_SESSION['error']];
					
					unset($_SESSION['error']);
					unset($_SESSION['ok']);
					echo'<p style="margin:60 0 0 0;background-color:#F5D487;padding-left:30px;"><font color=red>  &nbsp;&nbsp;&nbsp;&nbsp;    '. $error. '</font></p>';
					
				}
				else if (isset($_SESSION['ok']))
				{
					$bien = $idioma[$_SESSION['ok']];
					echo'<p style="margin:60 0 0 0;background-color:#8CFF96;padding-left:30px;"><font color=green>  &nbsp;&nbsp;&nbsp;&nbsp;    '. $bien. '</font></p>';
					unset($_SESSION['error']);
					unset($_SESSION['ok']);
				}
			?>
		</div >
		<div id="contenedor">
		