<?php
include_once '../../Comun/FuncionesComunes.php';
include_once '../../Comun/codigoSeguridad.php';

//Se almacena en la variable el cambio a realizar. idioma o css
$tipoCambio = recoge('tipoCambio');
$redirige = recoge('pagOrigen');

switch ($tipoCambio)
{
	case 'ErrDet':
		if ($_SESSION['ErrDet'] == 'si')
		{
			unset($_SESSION['ErrDet']);
			$_SESSION['ErrDet'] = 'no';
		}
		else
		{
			unset($_SESSION['ErrDet']);
			$_SESSION['ErrDet'] = 'si';
		}
		header ('Location: '. $redirige);
		break;
	case 'CSS1':
		$_SESSION['css'] = "";
		header ('Location: '. $redirige);
		break;
		
	case 'CSS2':
		$_SESSION['css'] = "2";
		header ('Location: '. $redirige);
		break;
		
	case 'ESPANHOL':
	case 'ENGLISH':
	case 'GALEGO':
		if ($tipoCambio != $_SESSION['idioma'])
		{
			$_SESSION['idioma']=$tipoCambio;
			$idioma = CargarIdioma();
			$_SESSION['ok']='OK LENG';
		}
		header ('Location: '. $redirige);
		break;
	default:
		$_SESSION['error']='ERR LENG';
		header ('Location: '. $redirige);
		break;
}


?>