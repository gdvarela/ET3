
		
			<div id="menu">
				<span id=nav>
				<ul>
					<?php
					
						if ($_SESSION['PosicionMenuLateral'] == 'B')
							echo '<li id=actual>'. $idioma['Bienvenida'].'</li>';
						else
							echo '<li><a href="../../Principal/Controladores/Principal.php">'. $idioma['Bienvenida'].'</a></li>' ;
						
						
						
						if (Acceso::ConPermisosSinRed($_SESSION['login'],"/APLWPA/GESTAPP/Usuarios/Controladores/ConsUsuarios.php") > 0)
						{
							if ($_SESSION['PosicionMenuLateral'] == 'U')
								echo '<li id=actual>'. $idioma['Usuarios'].'</li>';
							else	
								echo '<li><a href="../../Usuarios/Controladores/ConsUsuarios.php">'. $idioma['Usuarios'].'</a></li>' ;
						}
											
						if (Acceso::ConPermisosSinRed($_SESSION['login'],"/APLWPA/GESTAPP/Paginas/Controladores/ConsPaginas.php") > 0)
						{
							if ($_SESSION['PosicionMenuLateral'] == 'P')
								echo '<li id=actual>'. $idioma['Paginas'].'</li>';
							else
								echo '<li><a href="../../Paginas/Controladores/ConsPaginas.php">'. $idioma['Paginas'].'</a> </li>' ;
						}
						
						if (Acceso::ConPermisosSinRed($_SESSION['login'],"/APLWPA/GESTAPP/Roles/Controladores/ConsRoles.php") > 0)
						{
							if ($_SESSION['PosicionMenuLateral'] == 'R')
								echo '<li id=actual>'. $idioma['Roles'].'</li>';
							else
								echo '<li><a href="../../Roles/Controladores/ConsRoles.php">'. $idioma['Roles'].'</a></li>' ;
						}
														
						if (Acceso::ConPermisosSinRed($_SESSION['login'],"/APLWPA/GESTAPP/Funcionalidades/Controladores/ConsFuncionalidades.php") > 0)
						{
							if ($_SESSION['PosicionMenuLateral'] == 'F')
								echo '<li id=actual>'. $idioma['Funcionalidades'].'</li>';
							else
								echo '<li><a href="../../Funcionalidades/Controladores/ConsFuncionalidades.php">'. $idioma['Funcionalidades'].'</a></li>' ;
						}
													
						if (Acceso::ConPermisosSinRed($_SESSION['login'],"/APLWPA/GESTAPP/Principal/Controladores/Accesos.php") > 0)
						{
							if ($_SESSION['PosicionMenuLateral'] == 'A')
								echo '<li id=actual>'. $idioma['Accesos'].'</li>';
							else
								echo '<li><a href="../../Principal/Controladores/Accesos.php">'. $idioma['Accesos'].'</a></li>' ;
						}
					?>
				</ul>
				</span>
			</div>
			<font size=2>
