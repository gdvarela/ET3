<?php 
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
					for ($i = $pagActual-5; $i < $pagActual+5;$i = $i+1 )
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
					$cont = 0;			
					foreach($noticias as $noticia)
					{
						$cont = $cont+1;
						if (!($cont > $NumporPags*($pagAct-1) &&  $cont <= ($NumporPags*($pagAct))))
							continue;
						echo '
						<div class="row">
							<div class="col-md-12">
								<blockquote>
									<p>
										'.$noticia->titulo.'
									</p> <small> '.$noticia->fecha.', <cite> <a href="'.$noticia->fuenteenlace.'" >'.$noticia->fuente.'</a> </cite></small>
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
					for ($i = $pagActual-5; $i < $pagActual+5;$i = $i+1 )
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