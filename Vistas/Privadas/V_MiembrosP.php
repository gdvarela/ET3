<?php

Class MiembrosPrivada
{

function __construct()
{
}

function DisplayContent($idioma,$arrayObjetos)
{
	global $controladores;
	global $identificadoresPrivados;
	global $RutaRelativaControlador;
	//Aqui va el cuerpo principal de la pagina
?>
	<section id="content">
	<div class="container">
					
					 <div class="row"> <!--style="background-color:#434F6A;"--> 
						<div class="col-md-3" >
						<img style="display:inline" src="<?php echo $RutaRelativaControlador?>img/engranaje2.svg.png"
						  class="img-responsive">
						  <a style="display:inline" class="btn btn-warning" href="<?php echo $controladores[$identificadoresPrivados["AMiembros"]]?>"><?php echo $idioma['Alta_Miembro']; ?></a>
						</div>
						<div class="col-md-3">
						<img style="display:inline" src="<?php echo $RutaRelativaControlador?>img/engranaje2.svg.png"
						  class="img-responsive">
						  <a style="display:inline" class="btn btn-warning"  href="<?php echo $controladores[$identificadoresPrivados["DMiembros"]]?>"><?php echo $idioma['Elim_Sel']; ?></a>
						</div>
						<div class="col-md-6"></div>
					  </div>	
						<br/> 
						<hr>
						<br>
						<div class="row">
							<div class="col-md-12">
							<!-- Heading -->
								<div class="block-heading-six">
									<h3 class="bg-color"><?php echo $idioma['Grupo']; ?></h3>
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

	private function mostrarMiembro($miembros)
	{
		global $RutaRelativaControlador;
		
		$espacioMiembro = 2;
		$miembrosPorFIla = 12/$espacioMiembro;
		$total = count($miembros);
		
		if ($total > $miembrosPorFIla )
		{
			$mSub = array();
			for ($i = 0; $i < $miembrosPorFIla;$i = $i+1)
			{
				$mSub[] = $miembros[$i];
			}
			mostrarMiembro($mSub);
			$mSub2 = array();
			for ($i = $miembrosPorFIla; $i < $total;$i = $i+1)
			{
				$mSub2[] = $miembros[$i];
			}
			mostrarMiembro($mSub2);
			
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
				echo '
						<div class="col-md-'.$espacioMiembro.'">
							<!-- Team Member -->
							<div class="team-member">
								<!-- Image -->
								<!-- <img class="img-responsive center-block" src="" alt=""> -->
								<!-- Name -->
								<h4>'.$miembros[$i - $Comienzo]["Login"].'</h4>
								<span class="deg">'.$miembros[$i - $Comienzo]["USU_email"].'</span> 
							</div>
						</div>
						';
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
				echo '
						<div class="col-md-'.$espacioMiembro.'">
							<!-- Team Member -->
							<div class="team-member">
								<!-- Image -->
								<!--<img class="img-responsive center-block" src="" alt="">-->
								<!-- Name -->
								<h4>'.$miembros[$i - $Comienzo]["Login"].'</h4>
								<span class="deg">'.$miembros[$i - $Comienzo]["USU_email"].'</span> 
							</div>
						</div>
						';
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

$miembros = array();
	//Consultamos datos
	try
	{
		$consulta = $_TABLAMIEMBRO->ListadoRegistros(" where Login IN (Select login from HACE_DE where ROL_nombre = '".$ROLMIEMBRO."')");
		//Con los datos los cargamos en el array
		for ($i = 0; $i < $consulta->num_rows ;$i++)
		{
			$miembros[] = $consulta->fetch_assoc();
		}
	}
	catch(Exception $e)
	{
		$errorRescrito = explode("=>",$e->getMessage());
		$_SESSION['error'] = 'CON ERR MIEMBROS'."=>".$errorRescrito[1];
	}


	//Inicializamos la vista Correspondiente
	$princ_view = new MiembrosPrivada();

	//Se procede a la creacion de la vista
	include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
	$princ_view->DisplayContent($idioma,$miembros);
	include_once$RutaRelativaControlador.'Comun/Pie.php';

?>