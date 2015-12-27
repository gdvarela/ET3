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
	//asignamos idioma español como defecto
	if (!(isset($_SESSION['idioma'])))
	$_SESSION['idioma'] = 'ESPANHOL';

	switch ($_SESSION['idioma'])
	{
	case 'ESPANHOL':
		include_once $Ruta.'GESTAPP/Modelos/ESPANHOL.php';
		break;
	case 'GALEGO':
		include_once $Ruta.'GESTAPP/Modelos/GALEGO.php';
		break;
	case 'ENGLISH':
		include_once $Ruta.'GESTAPP/Modelos/ENGLISH.php';
		break;
	DEFAULT:
		break;
	}
	return $Idioma;
}

//Array que contiene los indentificadores de las paginas de la aplicación
// Asegurarse que los identificadores e identificadoresPrivados no se repitan.
$identificadores = array(
'Home' => 'H',
'Miembros' => 'M',
'Prensa'=> 'P',
'Transferencias'=> 'T',
'Colaboraciones'=> 'C',
'Login' => 'L'

);

$identificadoresPrivados = array(
'Home' => 'HP',
'Miembros' => 'MP',
'AMiembros' => 'AMP',
'MMiembros' => 'MMP',
'DMiembros' => 'DMP',
'Prensa'=> 'PP',
'APrensa'=> 'APP',
'MPrensa'=> 'MPP',
'DPrensa' => 'DPP',
'Transferencias'=> 'TP',
'ATransferencias'=> 'ATP',
'MTransferencias'=> 'MTP',
'DTransferencias'=> 'DTP',
'Colaboraciones'=> 'CP',
'AColaboraciones'=> 'ACP',
'MColaboraciones'=> 'MCP',
'DColaboraciones'=> 'DCP',
'Administracion'=> 'G',
'ERRORPERM' => 'ERRORPERM'
);

//Array que contiene los indentificadores de las paginas que se mostraran la barra del menu principal
// de la parte publica
$MenuPrincipal = array(
'Home' => $identificadores['Home'],
'Miembros' => $identificadores['Miembros'],
'Prensa'=> $identificadores['Prensa'],
'Transferencias'=> $identificadores['Transferencias'],
'Colaboraciones'=> $identificadores['Colaboraciones']
);

//Array que contiene los indentificadores de las paginas que se mostraran la barra del menu principal
// de la parte Privada
$MenuPrincipalPrivados = array(
'Home' => $identificadoresPrivados['Home'],
'Miembros' => $identificadoresPrivados['Miembros'],
'Prensa'=> $identificadoresPrivados['Prensa'],
'Transferencias'=> $identificadoresPrivados['Transferencias'],
'Colaboraciones'=> $identificadoresPrivados['Colaboraciones'],
'Administracion'=> $identificadoresPrivados['Administracion']
);

//Rutas de las Distintas Vistas del sistema
$vistas = array(
	$identificadores['Home'] => $RutaRelativaControlador.'Vistas/Publicas/V_Home.php',
	$identificadores['Miembros'] => $RutaRelativaControlador.'Vistas/Publicas/V_Miembros.php',
	$identificadores['Prensa'] => $RutaRelativaControlador.'Vistas/Publicas/V_Prensa.php',
	$identificadores['Transferencias'] => $RutaRelativaControlador.'Vistas/Publicas/V_Transferencia.php',
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
	$identificadoresPrivados['Transferencias'] => $RutaRelativaControlador.'Vistas/Privadas/V_TransferenciasP.php',
	$identificadoresPrivados['ATransferencias'] => $RutaRelativaControlador.'Vistas/Privadas/V_AltaTransferenciasP.php',
	$identificadoresPrivados['MTransferencias'] => $RutaRelativaControlador.'Vistas/Privadas/V_ModTransferenciasP.php',
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
	$identificadores['Transferencias'] => $RutaRelativaControlador.'Controladores/Publica/ControladorWEB.php?PagMenu='.$identificadores['Transferencias'],
	$identificadores['Colaboraciones'] => $RutaRelativaControlador.'Controladores/Publica/ControladorWEB.php?PagMenu='.$identificadores['Colaboraciones'],
	$identificadores['Login'] => $RutaRelativaControlador.'Controladores/Publica/ControladorWEB.php?PagMenu='.$identificadores['Login'],
	$identificadoresPrivados['Home'] => $RutaRelativaControlador.'Controladores/Privada/C_HomeP.php',
	$identificadoresPrivados['Miembros'] => $RutaRelativaControlador.'Controladores/Privada/C_MiembrosP.php',
	$identificadoresPrivados['Prensa'] => $RutaRelativaControlador.'Controladores/Privada/C_PrensaP.php',
	$identificadoresPrivados['Transferencias'] => $RutaRelativaControlador.'Controladores/Privada/C_TransferenciaP.php',
	$identificadoresPrivados['Colaboraciones'] => $RutaRelativaControlador.'Controladores/Privada/C_ColaboracionesP.php',
	
	$identificadoresPrivados['AMiembros'] => $RutaRelativaControlador.'Controladores/Privada/C_AltaMiembrosP.php',
	$identificadoresPrivados['APrensa'] => $RutaRelativaControlador.'Controladores/Privada/C_AltaPrensaP.php',
	$identificadoresPrivados['AColaboraciones'] => $RutaRelativaControlador.'Controladores/Privada/C_AltaColaboracionesP.php',
	$identificadoresPrivados['ATransferencias'] => $RutaRelativaControlador.'Controladores/Privada/C_AltaTransferenciasP.php',
	
	$identificadoresPrivados['MMiembros'] => $RutaRelativaControlador.'Controladores/Privada/C_ModMiembrosP.php',
	$identificadoresPrivados['MPrensa'] => $RutaRelativaControlador.'Controladores/Privada/C_ModPrensaP.php',
	$identificadoresPrivados['MColaboraciones'] => $RutaRelativaControlador.'Controladores/Privada/C_ModColaboracionesP.php',
	$identificadoresPrivados['MTransferencias'] => $RutaRelativaControlador.'Controladores/Privada/C_ModTranferenciasP.php'
	
);

$procesadores = array(
	$identificadores['Login'] => $RutaRelativaControlador.'Controladores/Publica/Procesadores/ProcesaV_Login.php',
	
	$identificadoresPrivados['AMiembros'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaAltaMiembrosP.php',
	$identificadoresPrivados['MMiembros'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaModMiembrosP.php',
	$identificadoresPrivados['DMiembros'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaDelMiembrosP.php',
	
	$identificadoresPrivados['APrensa'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaAltaPrensaP.php',
	$identificadoresPrivados['MPrensa'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaModPrensaP.php',
	$identificadoresPrivados['DPrensa'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaDelPrensaP.php',
	
	$identificadoresPrivados['AColaboraciones'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaAltaColaboracionesP.php',
	$identificadoresPrivados['MColaboraciones'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaModColaboracionesP.php',
	$identificadoresPrivados['DColaboraciones'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaDelColaboracionesP.php',
	
	$identificadoresPrivados['ATransferencias'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaAltaTransferenciasP.php',
	$identificadoresPrivados['MTransferencias'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaModTransferenciasP.php',
	$identificadoresPrivados['DTransferencias'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaDelTransferenciasP.php'
);


//Variable que contiene la pagina o controlador que tomara el control en caso de error de permisos
$PaginaError = $controladores[$identificadoresPrivados['ERRORPERM']];
$imagenFondo = "";
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
);

$_TABLAEMPRESAS = new TablaBD(
"S_EMPRESAS",
	array(
	"IDEmpresa" => "",
	"Web_Empresa" => "",
	"Nombre_Empresa" => "",
	"IDImagen_Empresa" => "",
	"IDParticipante" => ""
	),
array(0)
);

$_TABLAGRUPOS = new TablaBD(
"S_GRUPOS",
	array(
	"IDGrupo" => "",
	"Web_Grupo" => "",
	"IDImagen_Grupo" => "",
	"Nombre_Grupo" => "",
	"IDParticipante" => ""
	),
array(0)
);

$_TABLAINSTITUCIONES = new TablaBD(
"S_INSTITUCIONES",
	array(
	"IDInstitucion" => "",
	"Web_Institucion" => "",
	"IDImagen_Institucion" => "",
	"Nombre_Institucion" => "",
	"IDParticipante" => ""
	),
array(0)
);

$_TABLAPARTICIPANTES = new TablaBD(
"S_PARTICIPANTES",
	array(
	"IDParticipantes" => "",
	"Tipo_Participante" => ""
	),
array(0)
);

//Este array contiene los campos que se mostran en lso distintos formularios de alta de la aplicacion.
// cada elemento de formularios alta es un array con cada uno de los campos del formulario array([PROPIEDAD NAME, PROPEIDAD TYPE, OTROS PARAMETROS QUE SE INCRUSTARAN EN EL HTML])
$formularios = array(
	$identificadoresPrivados['AMiembros'] => 
	array(
		array( 'MA-Login','text', ""),
		array( 'MA-Pass','Pass', ""),
		array( 'MA-USU_nombre','text', ""),
		array( 'MA-USU_apellido','text', ""),
		array( 'MA-USU_email','email', ""),
		array( 'MA-USU_fecha_alta','date', ""),
		array( 'MA-Web_Usuario','text', ""),
		array( 'MA-Departamento_Usuario','text', ""),
		array( 'MA-Descripcion_Usuario','textarea', ""),
		array( 'MA-Telefono_Usuario','number', ""),
		array( 'MA-Movil_Usuario','number', "")
	),
	$identificadoresPrivados['MMiembros'] => 
	array(
		array( 'MA-Login','text', ""),
		array( 'MA-Pass','Pass', ""),
		array( 'MA-USU_nombre','text', ""),
		array( 'MA-USU_apellido','text', ""),
		array( 'MA-USU_email','email', ""),
		array( 'MA-Web_Usuario','text', ""),
		array( 'MA-Departamento_Usuario','text', ""),
		array( 'MA-Descripcion_Usuario','textarea', ""),
		array( 'MA-Telefono_Usuario','number', ""),
		array( 'MA-Movil_Usuario','number', "")
	),
	$identificadoresPrivados['APrensa'] => 
	array(
		array( 'MP-Titulo_Noticia','text', ""),
		array( 'MP-Fecha_Noticia','date', ""),
		array( 'MP-Web_Noticia','text', ""),
		array( 'MP-IDPDF_Noticia','text', ""),
		array( 'MP-Publicador_Noticia','select', "","sql:Select * from USUARIOS where Login IN (Select login from HACE_DE where ROL_nombre = '".$ROLMIEMBRO."')")
	),
	$identificadoresPrivados['MPrensa'] => 
	array(
		array( 'MP-Titulo_Noticia','text', ""),
		array( 'MP-Fecha_Noticia','date', ""),
		array( 'MP-Web_Noticia','text', ""),
		array( 'MP-IDPDF_Noticia','text', ""),
		array( 'MP-Publicador_Noticia','select', "","sql:Select * from USUARIOS where Login IN (Select login from HACE_DE where ROL_nombre = '".$ROLMIEMBRO."')")
	),
	$identificadoresPrivados['AColaboraciones']."E" => 
	array(
		array( 'MP-IDEmpresa','text', ""),
		array( 'MP-Web_Empresa','text', ""),
		array( 'MP-Nombre_Empresa','text', ""),
		array( 'MP-IDImagen_Empresa','text', ""),
		array( 'MP-IDParticipante','text', "","sql:Select * from USUARIOS where Login IN (Select login from HACE_DE where ROL_nombre = '".$ROLMIEMBRO."')")
	),
	$identificadoresPrivados['AColaboraciones']."G" => 
	array(
		array( 'MP-IDGrupo','text', ""),
		array( 'MP-Web_Grupo','text', ""),
		array( 'MP-IDImagen_Grupo','text', ""),
		array( 'MP-Nombre_Grupo','text', ""),
		array( 'MP-IDParticipante','text', "","sql:Select * from USUARIOS where Login IN (Select login from HACE_DE where ROL_nombre = '".$ROLMIEMBRO."')")
	),
	$identificadoresPrivados['AColaboraciones']."I" => 
	array(
		array( 'MP-IDInstitucion','text', ""),
		array( 'MP-Web_Institucion','text', ""),
		array( 'MP-IDImagen_Institucion','text', ""),
		array( 'MP-Nombre_Institucion','text', ""),
		array( 'MP-IDParticipante','text', "","sql:Select * from USUARIOS where Login IN (Select login from HACE_DE where ROL_nombre = '".$ROLMIEMBRO."')")
	),
	$identificadoresPrivados['MColaboraciones']."E" => 
	array(
		array( 'MP-IDEmpresa','text', ""),
		array( 'MP-Web_Empresa','text', ""),
		array( 'MP-Nombre_Empresa','text', ""),
		array( 'MP-IDImagen_Empresa','text', "")
	),
	$identificadoresPrivados['MColaboraciones']."G" => 
	array(
		array( 'MP-IDGrupo','text', ""),
		array( 'MP-Web_Grupo','text', ""),
		array( 'MP-IDImagen_Grupo','text', ""),
		array( 'MP-Nombre_Grupo','text', "")
	),
	$identificadoresPrivados['MColaboraciones']."I" => 
	array(
		array( 'MP-IDInstitucion','text', ""),
		array( 'MP-Web_Institucion','text', ""),
		array( 'MP-IDImagen_Institucion','text', ""),
		array( 'MP-Nombre_Institucion','text', "")
	)
);



?>

