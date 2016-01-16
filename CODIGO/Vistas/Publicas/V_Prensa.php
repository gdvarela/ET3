<?php 

//=====================================================================================================================
// Fichero :V_Prensa.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 18/12/2015
// Clase que contiene una de las vistas del sistema
//=====================================================================================================================

Class Prensa
{

function __construct()
{
}

function DisplayContent($idioma,$noticias,$pagAct,$ultimaPagina)
{
	global $NumporPags;
	global $identificadores;
	global $RutaRelativaControlador;
	//Aqui va el cuerpo principal de la pagina
?>
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="pagination">
					<li>
						<a href="ControladorWEB.php?PagMenu=<?php echo $identificadores['Prensa'];?>&NumPag=<?php echo ($pagAct-1 >= 1)?$pagAct-1:1;?>">Prev</a>
					</li>
					<?php
					//SE MUESTRA EN HTML LA BARRA DE SELECCION DE PAGINA (SUPERIOR)
					for ($i = $pagAct-5; $i < $pagAct+5;$i = $i+1 )
					{
						if ($i > 0 && $i <= ceil(count($noticias)/$NumporPags))
						{
							$active = "";
							if ($i == $pagAct)
								$active = ' class="active" ';
							
							echo '
							<li '.$active.' >
								<a href="ControladorWEB.php?PagMenu='.$identificadores['Prensa'].'&NumPag='.$i.'">'.$i.'</a>
							</li>
							';
						}
					}
					?>
					<li>
						<a href="ControladorWEB.php?PagMenu=<?php echo $identificadores['Prensa'];?>&NumPag=<?php echo ($pagAct+1 <= $ultimaPagina)?$pagAct+1:$ultimaPagina;?>">Next</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<?php 
				// SE RECORREN LAS NOTICIAS A MOSTRAR, mostrando solo las correspondientes a la pagina que desea el usuario
					$cont = 0;			
					foreach($noticias as $noticia)
					{
						$cont = $cont+1;
						if (!($cont > $NumporPags*($pagAct-1) &&  $cont <= ($NumporPags*($pagAct))))
							continue; // si la pagina no se debe mostrar porque no se corresponde a la pagina se salta al siguiente.
						echo '
						<div class="row">
							<div class="col-md-12">
								<blockquote>
									<p>
										'.$noticia["Titulo_Noticia"].'
									</p> <small> '.$noticia["Fecha_Noticia"].', <cite> <a href="'.$noticia["Web_Noticia"].'" target="_blank" >'.$idioma["Enlace"].'</a> </cite></small>
								</blockquote>
							</div>
						</div>
						';
						
					}
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<ul class="pagination">
					<li>
						<a href="ControladorWEB.php?PagMenu=<?php echo $identificadores['Prensa'];?>&NumPag=<?php echo $pagAct-1;?>">Prev</a>
					</li>
					<?php
					//SE MUESTRA EN HTML LA BARRA DE SELECCION DE PAGINA (INFERIOR)
					for ($i = $pagAct-5; $i < $pagAct+5;$i = $i+1 )
					{
						if ($i > 0 && $i <=ceil(count($noticias)/$NumporPags))
						{
							$active = "";
							if ($i == $pagAct)
								$active = ' class="active" ';
							
							echo '
							<li '.$active.' >
								<a href="ControladorWEB.php?PagMenu='.$identificadores['Prensa'].'&NumPag='.$i.'">'.$i.'</a>
							</li>
							';
						}
					}
					?>
					<li>
						<a href="ControladorWEB.php?PagMenu=<?php echo $identificadores['Prensa'];?>&NumPag=<?php echo $pagAct+1;?>">Next</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<?php

}

}

?>