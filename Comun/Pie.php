	<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading"><?php echo $idioma['Nuestras Oficinas']?></h5>
					<a href="https://www.google.es/maps/@42.3414157,-8.2803702,3a,75y,342.27h,82.14t/data=!3m6!1e1!3m4!1sk3Jz0X8mNuANbTSQBBhLmw!2e0!7i13312!8i6656!6m1!1e1"><address>
					Globex S.A.<br>
					Po-9304 Ga. Tower<br>
					Galicia. España</address></a>
					<p>
						<i class="icon-phone"></i> +34 685 584 985<br>
						<i class="icon-envelope-alt"></i> hankScorpio@gmail.com
					</p>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading"><?php echo $idioma['Enlaces de interes']?></h5>
					<ul class="link-list">
						<li><a href="#"><?php echo $idioma['Ultimos eventos']?></a></li>
						<li><a href="#"><?php echo $idioma['Terminos y Condiciones']?></a></li>
						<li><a href="#"><?php echo $idioma['Politica de privacidad']?></a></li>
						<li><a href="#"><?php echo $idioma['Carrera']?></a></li>
						<li><a href="#"><?php echo $idioma['Contactanos']?></a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading"><?php echo $idioma['Ultimas publicaciones']?></h5>
					<ul class="link-list">
						<li><a href="#">Publicacion 1</a></li>
						<li><a href="#">Publicacion 2</a></li>
						<li><a href="#">Publicacion 3</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3">
					<div class="widget">
					<h5 class="widgetheading"><?php echo $idioma['Noticias Recientes']?></h5>
					<ul class="link-list">
						<li><a href="#">Noticia 1</a></li>
						<li><a href="#">Noticia 2</a></li>
						<li><a href="#">Noticia 3</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo $RutaRelativaControlador?>js/jquery.js"></script>
<script src="<?php echo $RutaRelativaControlador?>js/jquery.easing.1.3.js"></script>
<script src="<?php echo $RutaRelativaControlador?>js/bootstrap.min.js"></script>
<script src="<?php echo $RutaRelativaControlador?>js/jquery.fancybox.pack.js"></script>
<script src="<?php echo $RutaRelativaControlador?>js/jquery.fancybox-media.js"></script> 
<script src="<?php echo $RutaRelativaControlador?>js/portfolio/jquery.quicksand.js"></script>
<script src="<?php echo $RutaRelativaControlador?>js/portfolio/setting.js"></script>
<script src="<?php echo $RutaRelativaControlador?>js/jquery.flexslider.js"></script>
<script src="<?php echo $RutaRelativaControlador?>js/animate.js"></script>
<script src="<?php echo $RutaRelativaControlador?>js/custom.js"></script>

<!-- 
	EN CASO DE ESTAR EN HOME SE AÑADE UNA LINEA MAS PARA AÑADIR
	EL JAVASCRIPT QUE CONTROLA LAS IMAGENES MOSTRADAS 
-->
<?php if($PagID == $identificadores['Home']) { echo '<script src="'.$RutaRelativaControlador.'js/owl-carousel/owl.carousel.js"></script>';} ?>
</body>
</html>