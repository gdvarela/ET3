<?php
//Establece el valor de mostrar errores del servido php
// Cambiar a 1 para la fase de pruebas o debug
ini_set('display_errors', '1');



//Variable que contiene el nombre de la sesion que se usara en la aplicacion
$sessionName = "PIXEL";



//Numero de elementos por pagina en caso de paginacion
$NumporPags = 10;

function CargarIdioma2($Ruta)
{
	//asignamos idioma espa�ol como defecto
	if (!(isset($_SESSION['idioma'])))
	$_SESSION['idioma'] = 'ESPANHOL';

	switch ($_SESSION['idioma'])
	{
	case 'ESPANHOL':
		include_once$Ruta.'GESTAPP/Modelos/ESPANHOL.php';
		break;
	case 'GALEGO':
		include_once$Ruta.'GESTAPP/Modelos/GALEGO.php';
		break;
	case 'ENGLISH':
		include_once$Ruta.'GESTAPP/Modelos/ENGLISH.php';
		break;
	DEFAULT:
		break;
	}
	return $Idioma;
}

//Array que contiene los indentificadores de las paginas de la aplicaci�n
// Asegurarse que los identificadores e identificadoresPrivados no se repitan.
$identificadores = array(
'Home' => 'H',
'Miembros' => 'M',
'Prensa'=> 'P',
'Transferencia'=> 'T',
'Colaboraciones'=> 'C',
'Login' => 'L'

);

$identificadoresPrivados = array(
'Home' => 'HP',
'Miembros' => 'MP',
'AMiembros' => 'AMP',
'MMiembros' => 'MMP',
'Prensa'=> 'PP',
'APrensa'=> 'APP',
'MPrensa'=> 'MPP',
'Transferencia'=> 'TP',
'ATransferencia'=> 'ATP',
'MTransferencia'=> 'MTP',
'Colaboraciones'=> 'CP',
'AColaboraciones'=> 'ACP',
'MColaboraciones'=> 'MCP',
'Administracion'=> 'G',
'ERRORPERM' => 'ERRORPERM'
);

//Array que contiene los indentificadores de las paginas que se mostraran la barra del menu principal
// de la parte publica
$MenuPrincipal = array(
'Home' => $identificadores['Home'],
'Miembros' => $identificadores['Miembros'],
'Prensa'=> $identificadores['Prensa'],
'Transferencia'=> $identificadores['Transferencia'],
'Colaboraciones'=> $identificadores['Colaboraciones']
);

//Array que contiene los indentificadores de las paginas que se mostraran la barra del menu principal
// de la parte Privada
$MenuPrincipalPrivados = array(
'Home' => $identificadoresPrivados['Home'],
'Miembros' => $identificadoresPrivados['Miembros'],
'Prensa'=> $identificadoresPrivados['Prensa'],
'Transferencia'=> $identificadoresPrivados['Transferencia'],
'Colaboraciones'=> $identificadoresPrivados['Colaboraciones'],
'Administracion'=> $identificadoresPrivados['Administracion']
);

//Rutas de las Distintas Vistas del sistema
$vistas = array(
	$identificadores['Home'] => $RutaRelativaControlador.'Vistas/Publicas/V_Home.php',
	$identificadores['Miembros'] => $RutaRelativaControlador.'Vistas/Publicas/V_Miembros.php',
	$identificadores['Prensa'] => $RutaRelativaControlador.'Vistas/Publicas/V_Prensa.php',
	$identificadores['Transferencia'] => $RutaRelativaControlador.'Vistas/Publicas/V_Transferencia.php',
	$identificadores['Colaboraciones'] => $RutaRelativaControlador.'Vistas/Publicas/V_Colaboraciones.php',
	$identificadores['Login'] => $RutaRelativaControlador.'Vistas/Publicas/V_Login.php',
	
	$identificadoresPrivados['ERRORPERM'] => $RutaRelativaControlador.'Vistas/Privadas/V_ERRORP.php',
	
	$identificadoresPrivados['Home'] => $RutaRelativaControlador.'Vistas/Privadas/V_HomeP.php',
	$identificadoresPrivados['Miembros'] => $RutaRelativaControlador.'Vistas/Privadas/V_MiembrosP.php',
	$identificadoresPrivados['AMiembros'] => $RutaRelativaControlador.'Vistas/Privadas/V_AltaMiembrosP.php',
	$identificadoresPrivados['MMiembros'] => $RutaRelativaControlador.'Vistas/Privadas/V_ModMiembrosP.php',
	$identificadoresPrivados['Prensa'] => $RutaRelativaControlador.'Vistas/Privadas/V_PrensaP.php',
	$identificadoresPrivados['APrensa'] => $RutaRelativaControlador.'Vistas/Privadas/V_AltaPrensaP.php',
	$identificadoresPrivados['MPrensa'] => $RutaRelativaControlador.'Vistas/Privadas/V_ModPrensaP.php',
	$identificadoresPrivados['Transferencia'] => $RutaRelativaControlador.'Vistas/Privadas/V_TransferenciaP.php',
	$identificadoresPrivados['ATransferencia'] => $RutaRelativaControlador.'Vistas/Privadas/V_AltaTransferenciaP.php',
	$identificadoresPrivados['MTransferencia'] => $RutaRelativaControlador.'Vistas/Privadas/V_ModTransferenciaP.php',
	$identificadoresPrivados['Colaboraciones'] => $RutaRelativaControlador.'Vistas/Privadas/V_ColaboracionesP.php',
	$identificadoresPrivados['AColaboraciones'] => $RutaRelativaControlador.'Vistas/Privadas/V_AltaColaboracionesP.php',
	$identificadoresPrivados['MColaboraciones'] => $RutaRelativaControlador.'Vistas/Privadas/V_ModColaboracionesP.php'
);
  
$controladores = array(
	$identificadoresPrivados['Administracion'] => $RutaRelativaControlador.'GESTAPP/Principal/Controladores/Principal.php',
	$identificadoresPrivados['ERRORPERM'] => $RutaRelativaControlador.'Controladores/Privada/C_ERRORP.php',
	
	$identificadores['Home'] => $RutaRelativaControlador.'Controladores/Publica/ControladorWEB.php?PagMenu='.$identificadores['Home'],
	$identificadores['Miembros'] => $RutaRelativaControlador.'Controladores/Publica/ControladorWEB.php?PagMenu='.$identificadores['Miembros'],
	$identificadores['Prensa'] => $RutaRelativaControlador.'Controladores/Publica/ControladorWEB.php?PagMenu='.$identificadores['Prensa'],
	$identificadores['Transferencia'] => $RutaRelativaControlador.'Controladores/Publica/ControladorWEB.php?PagMenu='.$identificadores['Transferencia'],
	$identificadores['Colaboraciones'] => $RutaRelativaControlador.'Controladores/Publica/ControladorWEB.php?PagMenu='.$identificadores['Colaboraciones'],
	$identificadores['Login'] => $RutaRelativaControlador.'Controladores/Publica/ControladorWEB.php?PagMenu='.$identificadores['Login'],
	$identificadoresPrivados['Home'] => $RutaRelativaControlador.'Controladores/Privada/C_HomeP.php',
	$identificadoresPrivados['Miembros'] => $RutaRelativaControlador.'Controladores/Privada/C_MiembrosP.php',
	$identificadoresPrivados['Prensa'] => $RutaRelativaControlador.'Controladores/Privada/C_PrensaP.php',
	$identificadoresPrivados['Transferencia'] => $RutaRelativaControlador.'Controladores/Privada/C_TransferenciaP.php',
	$identificadoresPrivados['Colaboraciones'] => $RutaRelativaControlador.'Controladores/Privada/C_ColaboracionesP.php'
);

$procesadores = array(
	$identificadores['Login'] => $RutaRelativaControlador.'Controladores/Publica/Procesadores/ProcesaV_Login.php'
);

//Variable que contiene la pagina o controlador que tomara el control en caso de error de permisos
$PaginaError = $controladores[$identificadoresPrivados['ERRORPERM']];

include_once $RutaRelativaControlador."Clases/TablaBD.php";
$ROLMIEMBRO = "Miembro PIXEL";
$_TABLAMIEMBRO = new TablaBD(
"USUARIOS",
	array(
	"Login" => "",
	"Pass" => "",
	"USU_nombre" => "",
	"USU_apellido" => "",
	"USU_email" => "",
	"USU_fecha_alta" => "",
	"Web_Usuario" => "",
	"Departamento_Usuario" => "",
	"Descripcion_Usuario" => "",
	"Telefono_Usuario" => "",
	"Movil_Usuario" => ""),
array(0)
);

$_TABLANOTICIAS = new TablaBD(
"S_NOTICIAS",
	array(
	"Titulo_Noticia" => "",
	"Fecha_Noticia" => "",
	"Web_Noticia" => "",
	"IDPDF_Noticia" => "",
	"Publicador_Noticia" => ""
	),
array(0)
)

?>
