<?php

Class Login
{

function __construct()
{
}

function Display($idioma)
{
	
?>
<html>
<head>
<?php 
	if (!isset($_SESSION['css'])){
		$_SESSION['css'] = '';
	}
	?>
	
	<link rel="stylesheet" type="text/css" href="../../CSS/estilo<?php echo $_SESSION['css']?>.css"/>
</head>
<body>
	<script language="JavaScript" src="../views/js/md5.js" type="text/javascript"></script> 
	<script language="JavaScript">
		function EncriptarPass(elemento) {
			return true;
			valor = elemento.value;
			
			if (valor == null || valor.length == 0 || /^\s*$/.test(valor)){
							return false;
			}
			
			elemento.value = hex_md5(valor);		
		}
		function revisaForm() {
			valor = document.getElementById('campoLogin').value;
			if (valor == null || valor.length == 0 || /^\s*$/.test(valor)){
							return false;
			}
			
			return true;		
		}
	</script>
	<div id="cabecera">
		<div align=center>
			<img id="logoC"src="../../Imagenes/Logotipo.png"/>
		</div>
	</div >
	<div id="contenedorL">
	<form action='../Controladores/ProcesaLogin.php' method='POST' onSubmit="return revisaForm()">
		<div id="login">
			<fieldset id="fieldLogin">
				<legend>
					<?php echo $idioma['LOGIN']?>
				</legend>
				<div id="etiqueta"> <?php echo $idioma['Login']?> </div>
				<input type="text" id="campoLogin" name="LoginL"/>
				<div id="etiqueta"><?php echo $idioma['Pass']?></div>
				<input type="password" name="PassL" onblur = 'EncriptarValor(this)'/>
				<input style="float:right;clear:both;" type='submit' class="btDestacado" name='botonProcesar' value='<?php echo $idioma['Aceptar']?>'/>
				
				<?php
					if ( isset($_SESSION['error']))
					{
							if (strpos($_SESSION['error'],'=>'))
							{
								if (isset($_SESSION['ErrDet']))
								{
									if ($_SESSION['ErrDet'] == 'si')
									{
										$error = explode('=>',$_SESSION['ErrDet'])[1];
										
									}
									else
									{
										$error=explode('=>',$_SESSION['ErrDet'])[0];
										$error = $idioma[$error];
									}
								}
								else
								{
										$_SESSION['ErrDet'] = 'no';
										$error=explode('=>',$_SESSION['ErrDet'])[0];
										$error = $idioma[$error];
								}
							}
							else
								$error = $idioma[$_SESSION['error']];
						
						unset($_SESSION['error']);
						print "<p style=".'"float:left;clear:both;"'."><font color='red'\><b>".$error ."</b></font></p>";
						
					}
								?>
				
			</fieldset>
		</div>
	  
	</form>
	</div>
</body>
</html>
<?php
}

} //fin de clase
?>