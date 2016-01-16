<?php

Class PrensaPrivada
{

function __construct()
{
}

function DisplayContent($idioma,$noticias,$pagAct,$ultimaPagina)
{
	global $NumporPags;
	global $identificadoresPrivados;
	global $controladores;
	global $RutaRelativaControlador;
	//Aqui va el cuerpo principal de la pagina
?>
	<form id="ant" action="<?php echo $controladores[$identificadoresPrivados["Prensa"]];?>" method="POST">
	<input type="hidden" name="NumPag" value="<?php echo ($pagAct-1 >= 1)?$pagAct-1:1;?>" />
	</form>
	<form id="pos"  action="<?php echo $controladores[$identificadoresPrivados["Prensa"]];?>" method="POST">
	<input type="hidden" name="NumPag" value="<?php echo ($pagAct+1 <= $ultimaPagina)?$pagAct+1:$ultimaPagina;?>" />
	</form>
	<?php
	for ($i = $pagAct-5; $i < $pagAct+5;$i = $i+1 )
	{
		if ($i > 0 && $i <= ceil(count($noticias)/$NumporPags))
		{
			echo '
			<form id="numeracion'.$i.'"  action="'.$controladores[$identificadoresPrivados["Prensa"]].'" method="POST">
			<input type="hidden" name="NumPag" value="'.(($pagAct+1 <= $ultimaPagina)?$pagAct+1:$ultimaPagina).'" />
			</form>
			';
		}
	}
	?>
	<section id="content">
	<div class="container">
			<div class="row"> <!--style="background-color:#434F6A;"--> 
			<div class="col-md-3" >
			<img style="display:inline" src="<?php echo $RutaRelativaControlador?>img/engranaje2.svg.png"
			  class="img-responsive">
			  <a style="display:inline" class="btn btn-warning" href="<?php echo $controladores[$identificadoresPrivados["APrensa"]]?>"><?php echo $idioma['Alta_Prensa']; ?></a>
			</div>
			<div class="col-md-9"></div>
		  </div>
		<div class="row">
			<div class="col-md-12">
				<ul class="pagination">
					<li>
						<a onclick="document.getElementById('ant').submit();">Prev</a>
					</li>
					<?php
					for ($i = $pagAct-5; $i < $pagAct+5;$i = $i+1 )
					{
						if ($i > 0 && $i <= ceil(count($noticias)/$NumporPags))
						{
							$active = "";
							if ($i == $pagAct)
								$active = ' class="active" ';
							
							echo '
							<li '.$active.' >
								<a onclick="document.getElementById(\'numeracion'.$i.'\').submit();">'.$i.'</a>
							</li>
							';
						}
					}
					?>
					<li>
						<a onclick="document.getElementById('pos').submit();">Next</a>
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
						<div class="col-md-1">
							<form id="'.$noticia["Titulo_Noticia"].'" action="'.$controladores[$identificadoresPrivados["MPrensa"]].'" method="POST">
								<input type="hidden" name="MOD" value="'.$noticia["Titulo_Noticia"].'" />
								</form>
								<img style="display:inline" onClick="document.getElementById(\''.$noticia["Titulo_Noticia"].'\').submit();" src="'.$RutaRelativaControlador.'img/editar.png"
							class="img-responsive pull-right"></img>
							</div>
							<div class="col-md-11">
							
								<blockquote>
									<p>
										'.$noticia["Titulo_Noticia"].'
									</p> <small> '.$noticia["Fecha_Noticia"].', <cite> <a href="'.$noticia["Web_Noticia"].'" target="_blank" >'.$idioma["Enlace"].'</a> </cite>
									
									</small>
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
						<a onclick="document.getElementById('ant').submit();">Prev</a>
					</li>
					<?php
					for ($i = $pagAct-5; $i < $pagAct+5;$i = $i+1 )
					{
						if ($i > 0 && $i <= ceil(count($noticias)/$NumporPags))
						{
							$active = "";
							if ($i == $pagAct)
								$active = ' class="active" ';
							
							echo '
							<li '.$active.' >
								<a onclick="document.getElementById(\'numeracion'.$i.'\').submit();">'.$i.'</a>
							</li>
							';
						}
					}
					?>
					<li>
						<a onclick="document.getElementById('pos').submit();">Next</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
<?php
	

}

}
	$noticias = array ();
		//Consultamos datos
		try
		{
			$consulta = $_TABLANOTICIAS->ListadoRegistros("");
			//Con los datos los cargamos en el array
			for ($i = 0; $i < $consulta->num_rows ;$i++)
			{
				$noticias[] = $consulta->fetch_assoc();
			}
		}
		catch(Exception $e)
		{
			$errorRescrito = explode("=>",$e->getMessage());
			$_SESSION['error'] = 'CON ERR NOTICIAS'."=>".$errorRescrito[1];
		}

		
		
		$pagCargar = 1;
		if (isset($_POST['NumPag']))
		{
			$pagCargar =$_POST['NumPag'];
			if ($pagCargar < 1)
				$pagCargar = 1;
			
			if($pagCargar > ceil(count($noticias)/$NumporPags))
				$pagCargar = ceil(count($noticias)/$NumporPags);
		}
//Inicializamos la vista Correspondiente
$princ_view = new PrensaPrivada();

//Se procede a la creacion de la vista
include_once$RutaRelativaControlador.'Comun/CabeceraPriv.php';
$princ_view->DisplayContent($idioma,$noticias,$pagCargar,ceil(count($noticias)/$NumporPags));
include_once$RutaRelativaControlador.'Comun/Pie.php';
?>
