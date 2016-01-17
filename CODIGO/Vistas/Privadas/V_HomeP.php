<?php

//=====================================================================================================================
// Fichero :V_HomeP.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 18/12/2015
// Clase que contiene una de las vistas del sistema
//=====================================================================================================================

Class HomePrivada
{

function __construct()
{
}

function DisplayContent($idioma)
{
	global $RutaRelativaControlador;
	//Aqui va el cuerpo principal de la pagina
?>
	<section id="featured">
	 
	<!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="<?php echo $RutaRelativaControlador?>img/slides/1.jpg" alt="" />
                <div class="flex-caption">
                   <div class="item_introtext">
					<span><?php echo $idioma['Somos'] ?></span>
					<strong><?php echo $idioma['Globex'] ?></strong>
					<p><?php echo $idioma['Generación Lógica Opeativa para Bases de Empresas X'] ?></p> </div>
                </div>
              </li>
              <li>
                <img src="<?php echo $RutaRelativaControlador?>img/slides/2.jpg" alt="" />
                <div class="flex-caption">
                     <div class="item_introtext">
					<span><?php echo $idioma['Ubicados en'] ?></span>
					<strong><?php echo $idioma['Ourense'] ?></strong>
					<p><?php echo $idioma['Escuela Superior de Ingienería Informática'] ?></p> </div>
                </div>
              </li>
              <li>
                <img src="<?php echo $RutaRelativaControlador?>img/slides/3.jpg" alt="" />
                <div class="flex-caption">
                     <div class="item_introtext">
					<span><?php echo $idioma['Nuestro equipo'] ?></span>
					<strong><?php echo $idioma['Alumnos'] ?><strong>
					<p><?php echo $idioma['UVIGO'] ?></p> </div>
                </div>
              </li>
            </ul>
        </div>
	<!-- end slider -->
 
	</section>
	<section class="callaction">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="aligncenter"><h1 class="aligncenter"><?php echo $idioma['Diez años desarrollando sistemas informáticos'] ?></h1><span class="clear spacer_responsive_hide_mobile " style="height:13px;display:block;"><?php echo $idioma['Texto Principal'] ?></span></div>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
			<div class="row">
		<div class="skill-home"> <div class="skill-home-solid clearfix"> 
		<div class="col-md-3 text-center">
		<span class="icons c1"><i class="fa fa-trophy"></i></span> <div class="box-area">
		<h3><?php echo $idioma['Desarrolo Web'] ?></h3> <p><?php echo $idioma['Texto 1'] ?></p></div>
		</div>
		<div class="col-md-3 text-center"> 
		<span class="icons c2"><i class="fa fa-picture-o"></i></span> <div class="box-area">
		<h3><?php echo $idioma['Diseño de interface'] ?></h3> <p><?php echo $idioma['Texto 2'] ?></p></div>
		</div>
		<div class="col-md-3 text-center"> 
		<span class="icons c3"><i class="fa fa-desktop"></i></span> <div class="box-area">
		<h3><?php echo $idioma['Interacción'] ?></h3> <p><?php echo $idioma['Texto 3'] ?></p></div>
		</div>
		<div class="col-md-3 text-center"> 
		<span class="icons c4"><i class="fa fa-globe"></i></span> <div class="box-area">
		<h3><?php echo $idioma['Experiencia de usuario'] ?></h3> <p><?php echo $idioma['Texto 4'] ?></p>
		</div></div>
		</div></div>
		</div> 
		<!-- Portfolio Projects -->
		<div class="row">
			<div class="col-lg-12">
				<h4 class="heading"><?php echo $idioma['Trabajos recientes'] ?></h4>
				<div class="row">
					<section id="projects">
					<ul id="thumbs" class="portfolio"> 
						<li class="col-lg-3 design" data-id="id-0" data-type="web">
						<div class="item-thumbs">					 
						<img src="<?php echo $RutaRelativaControlador?>img/works/1.jpg" alt=""><br>
						<p><?php echo $idioma['Trabajo 1'] ?></p>
						</div>
						</li> 
						<!-- Item Project and Filter Name -->
						<li class="item-thumbs col-lg-3 design" data-id="id-1" data-type="icon">
						<img src="<?php echo $RutaRelativaControlador?>img/works/2.jpg" alt=""><br>
						<p><?php echo $idioma['Trabajo 2'] ?><p>
						</li> 
						<li class="item-thumbs col-lg-3 photography" data-id="id-2" data-type="illustrator">
						<img src="<?php echo $RutaRelativaControlador?>img/works/3.jpg" alt=""><br>
						<p><?php echo $idioma['Trabajo 3'] ?></p>
						</li>
						
						<li class="item-thumbs col-lg-3 photography" data-id="id-2" data-type="illustrator">					
						<img src="<?php echo $RutaRelativaControlador?>img/works/4.jpg" alt=""><br>
						<p><?php echo $idioma['Trabajo 4'] ?></p>
						</li>
						<!-- End Item Project -->
					</ul>
					</section>
				</div>
			</div>
		</div>

	</div>
	</section>
	<div class="testimonial-area">
    <div class="testimonial-solid">
        <div class="container">
            <div class="testi-icon-area">
                <div class="quote">
                    <i class="fa fa-microphone"></i>
                </div>
            </div>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="">
                        <a href="#"></a>
                    </li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class="">
                        <a href="#"></a>
                    </li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class="active">
                        <a href="#"></a>
                    </li>
                    <li data-target="#carousel-example-generic" data-slide-to="3" class="">
                        <a href="#"></a>
                    </li>
                </ol>
                <div class="carousel-inner">
                    <div class="item">
                        <p><?php echo $idioma['Cita 1'] ?></p>
                        <p>
                            <b><?php echo $idioma['Homer Simpson'] ?></b>
                        </p>
                    </div>
                    <div class="item">
                        <p><?php echo $idioma['Cita 2'] ?></p>
                        <p>
                            <b><?php echo $idioma['Stave Ballmer']?></b>
                        </p>
                    </div>
                    <div class="item active">
                        <p><?php echo $idioma['Cita 3'] ?></p>
                        <p>
                            <b><?php echo $idioma['Mariano Rajoy']?></b>
                        </p>
                    </div>
                    <div class="item">
                        <p><?php echo $idioma['Cita 4'] ?></p>
                        <p>
                            <b><?php echo $idioma['C-3PO']?></b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
</div>
<?php
	

}

}

//Inicializamos la vista Correspondiente
$princ_view = new HomePrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma);
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
