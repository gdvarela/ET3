<?php

Class Miembros
{

function __construct()
{
}

function DisplayContent($idioma,$arrayObjetos)
{
	global $RutaRelativaControlador;
	//Aqui va el cuerpo principal de la pagina
?>
	<section id="content">
	<div class="container">
					
					<div class="about">
					
						<div class="row"> 
							<div class="col-md-12">
								<div class="about-logo">
									<h3>We are awesome <span class="color">TEAM</span></h3>
									<p>Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas</p>
                                    	<p>Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas</p>
								</div>
								<a href="#" class="btn btn-color">Read more</a>  
							</div>
						</div>  
						<br>
							
						 <div class="row">
							<div class="col-md-6">
								<img src="<?php echo $RutaRelativaControlador?>img/section-image-1.png" alt="">
								<div class="space"></div>
							</div>
							<div class="col-md-6">
								<p>Lorem ipsum dolor sit amet, cadipisicing  sit amet, consectetur adipisicing elit. Atque sed, quidem quis praesentium, ut unde fuga error commodi architecto, laudantium culpa tenetur at id, beatae pet.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. adipisicing  sit amet, consectetur adipisicing elit. Atque sed, quidem quis praesentium,m deserunt.</p>
								<ul class="list-unstyled">
									<li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Lorem ipsum enimdolor sit amet</li>
									<li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Explicabo deleniti neque aliquid</li>
									<li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Consectetur adipisicing elit</li>
									<li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Lorem ipsum dolor sit amet</li>
									<li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Quo issimos molest quibusdam temporibus</li>
								</ul>
							</div>
						</div>	
						<br/> 
						<hr>
						<br>
						<div class="row">
							<div class="col-md-12">
							<!-- Heading -->
								<div class="block-heading-six">
									<h3 class="bg-color"><?php echo $idioma['Grupo'] ?></h3>
								</div>
								<br>'
							<?php 
								$this->mostrarMiembro($arrayObjetos);
							?>
							
						</div>
					</div>
									
				</div>
	</section>
	<?php

}


	private function CuadroUsuario($tam,$miembro)
	{
		global $controladores;
		global $identificadoresPrivados;
		global $RutaRelativaControlador;
		echo '
		
		<div class="col-md-'.$tam.'">
			<!-- Team Member -->
			<div class="team-member">
				<!-- Image -->
				<img class="img-responsive center-block" src="'.$RutaRelativaControlador.'img/user.png" alt="">
				<!-- Name -->
				<h4>'.$miembro["USU_apellido"].', '.$miembro["USU_nombre"].'</h4>
				<span class="deg">'.$miembro["USU_email"].'</span> 
			</div>
		</div>
		';
	}

	private function mostrarMiembro($miembros)
	{
		global $RutaRelativaControlador;
		
		$espacioMiembro = 3;
		$miembrosPorFIla = 12/$espacioMiembro;
		$total = count($miembros);
		
		if ($total > $miembrosPorFIla )
		{
			$mSub = array();
			for ($i = 0; $i < $miembrosPorFIla;$i = $i+1)
			{
				$mSub[] = $miembros[$i];
			}
			$this->mostrarMiembro($mSub);
			$mSub2 = array();
			for ($i = $miembrosPorFIla; $i < $total;$i = $i+1)
			{
				$mSub2[] = $miembros[$i];
			}
			$this->mostrarMiembro($mSub2);
			
			return;
		}
	
		
		$Comienzo = ($miembrosPorFIla - $total)/2 ;
		
		if ($total % 2 != 0)
		{
			echo '<div class="team-six">';
			echo '<div class="row ">';
			
			echo '
						<div class="col-md-'.($espacioMiembro/2).'"></div>
						';
			$i = 1;
			for (;$i < $Comienzo;$i = $i+1)
			{
				echo '
						<div class="col-md-'.$espacioMiembro.'"></div>
						';
			}
			for (;$i < $Comienzo+$total;$i = $i+1)
			{
				$this->CuadroUsuario($espacioMiembro,$miembros[$i - $Comienzo]);
			}
			for (;$i < $miembrosPorFIla ;$i = $i+1)
			{
				if ($i == $miembrosPorFIla - 1 )
					echo '
						<div class="col-md-'.($espacioMiembro/2).'"></div>
						';
				else
					echo '
						<div class="col-md-'.($espacioMiembro).'"></div>
						';
			}
			
			echo '</div>';
			echo '</div>';
		}
		else
		{
			echo '<div class="team-six">';
			echo '<div class="row ">';
			$i = 0;
			for (;$i < $Comienzo;$i = $i+1)
			{
				echo '
						<div class="col-md-'.$espacioMiembro.'"></div>
						';
			}
			for (;$i < $Comienzo+$total;$i = $i+1)
			{
				$this->CuadroUsuario($espacioMiembro,$miembros[$i - $Comienzo]);
			}
			for (;$i < $miembrosPorFIla ;$i = $i+1)
			{
				echo '
						<div class="col-md-'.$espacioMiembro.'"></div>
						';
			}
			
			echo '</div>';
			echo '</div>';
		}
		
		
		
		
		
	}
}

	

?>