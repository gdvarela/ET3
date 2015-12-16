<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title><?php echo $idioma['Barra_Titulo']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- css -->

<?php 
	// Esta variable contiene el nombre de la pagina para usar en el array del multilenguaje
	//Ej: Si estamos en Noticias esta variable tendra el valor NOT de forma que:
	//  Español: NOT => Noticias,
	//  Ingles: NOT=> News,
	//	Otros:	NOT=> ????,
	//Luego de esto, $idioma[$IndexIdiomaPageName] tendra el valor de la pagina actual en el idioma actual.
	$IndexIdiomaPageName = "PagName".$PagID;
?>
<link href="<?php echo $RutaRelativaControlador?>css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo $RutaRelativaControlador?>css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="<?php echo $RutaRelativaControlador?>css/jcarousel.css" rel="stylesheet" />
<link href="<?php echo $RutaRelativaControlador?>css/flexslider.css" rel="stylesheet" />
<link href="<?php echo $RutaRelativaControlador?>css/style.css" rel="stylesheet" />

<!-- 
	EN CASO DE ESTAR EN HOME SE AÑADE UNA LINEA MAS PARA AÑADIR
	EL CSS PARA LAS IMAGENES MOSTRADAS 
-->
<?php if($PagID == $identificadores['Home']) { echo '<link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">';} ?>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body ><!--style="background-image: url(''); background-position: center center; background-repeat: no-repeat; background-attachment: fixed; background-size: cover;"> -->
<div id="wrapper">
	<!-- start header -->
		<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="ControladorWEB.php?PagMenu=<?php echo $identificadores['Home']?>"><img src="<?php echo $RutaRelativaControlador?>img/logo.png" alt="logo"/></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
					<!-- 
						La variable $PagID contiene la pagina en la que nos encontramos,
						marcando como activa ('class="active"') en caso de que coincida la pagina.
						Ej: <li><a href="index.html">HOME</a></li> <CUENDO ESTAMOS EN OTRA PAGINA QUE NO SEA HOME>
							<li class="active"><a href="index.html">HOME</a></li> <EN CASO DE ESTAR EN HOME>
							
						A la vez almacenamos en $IndexIdiomaPageName la pagina donde nos encontramos
					-->
					<?php 
						foreach ($MenuPrincipalPrivados as $k => $v)
						{
							if ($PagID == $v)
							{
								/*echo '<li class="active">
								<a onClick="document.getElementById(\''.$v.'\').submit();">'.$idioma['PagName'.$v].'</a>
								<form id="'.$v.'" action="'.$controladores[$v].'" method="POST">
								<input type="hidden" name="PagMenu" value="'.$v.'"/>
								</form>
								</li>';*/
								echo '<li class="active">
								<a href="'.$controladores[$v].'">'.$idioma['PagName'.$v].'</a>
								</li>';
							}
							else
							{
								/*echo '<li>
								<a onClick="document.getElementById(\''.$v.'\').submit();">'.$idioma['PagName'.$v].'</a>
								<form id="'.$v.'" action="'.$controladores[$v].'" method="POST">
								<input type="hidden" name="PagMenu" value="'.$v.'"/>
								</form>
								</li>';*/
								echo '<li class="active">
								<a href="'.$controladores[$v].'">'.$idioma['PagName'.$v].'</a>
								</li>';
							}
						}
					?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						  <?php echo $idioma['Otros'] ?><b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li role="presentation" class="dropdown-header"><?php echo $idioma['Intranet'] ?></li>
						  <li><a href="<?php echo $controladores[$identificadores['Login']] ?>"><?php echo $idioma['LogOUT'] ?></a></li>
						  <li role="presentation" class="divider"></li>
						  <li role="presentation" class="dropdown-header"><?php echo $idioma['Configuracion'] ?></li>
						  <li><a href="#"><?php echo $idioma['Idioma'] ?></a></li>
						</ul>
					</li>         
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->
	<?php 
	// En caso de no estar en HOME añadimos el recuadrito azul con el nombre de la pagina
	if ($PagID != 'HP')
	{
		echo '
			<section id="inner-headline">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<h2 class="pageTitle">
								'.$idioma[$IndexIdiomaPageName].'
							</h2>
						</div>
					</div>
				</div>
			</section>
		';
	}
	
	
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
			
	