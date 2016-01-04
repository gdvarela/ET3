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
'Publicaciones'=> 'PuP',
'APublicaciones'=> 'APuP',
'MPublicaciones'=> 'MPuP',
'DPublicaciones'=> 'DPuP',
'Docencia'=> 'DC',
'ADocencia'=> 'ADC',
'MDocencia'=> 'MDC',
'Actividades'=> 'AP',
'AActividades'=> 'AAP',
'MActividades'=> 'MAP',
'DActividades'=> 'DAP',
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
'Docencia'=> $identificadoresPrivados['Docencia'],
'Publicaciones'=> $identificadoresPrivados['Publicaciones'],
'Actividades'=> $identificadoresPrivados['Actividades'],
'Administracion'=> $identificadoresPrivados['Administracion']
);
$generador = $RutaRelativaControlador.'Comun/GeneradorAlta.php';
$generadorMod = $RutaRelativaControlador.'Comun/GeneradorMod.php';
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
	$identificadoresPrivados['MColaboraciones'] => $RutaRelativaControlador.'Vistas/Privadas/V_ModColaboracionesP.php',
	$identificadoresPrivados['Publicaciones'] => $RutaRelativaControlador.'Vistas/Privadas/V_PublicacionesP.php',
	$identificadoresPrivados['APublicaciones'] => $RutaRelativaControlador.'Vistas/Privadas/V_AltaPublicacionesP.php',
	$identificadoresPrivados['MPublicaciones'] => $RutaRelativaControlador.'Vistas/Privadas/V_ModPublicacionesP.php',
	$identificadoresPrivados['Docencia'] => $RutaRelativaControlador.'Vistas/Privadas/V_DocenciaP.php',
	$identificadoresPrivados['ADocencia'] => $RutaRelativaControlador.'Vistas/Privadas/V_AltaDocenciaP.php',
	$identificadoresPrivados['Actividades'] => $RutaRelativaControlador.'Vistas/Privadas/V_ActividadesP.php',
	$identificadoresPrivados['AActividades'] => $RutaRelativaControlador.'Vistas/Privadas/V_AltaActividadesP.php',
	$identificadoresPrivados['MActividades'] => $RutaRelativaControlador.'Vistas/Privadas/V_ModActividadesP.php',
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
	$identificadoresPrivados['Publicaciones'] => $RutaRelativaControlador.'Controladores/Privada/C_PublicacionesP.php',
	$identificadoresPrivados['Docencia'] => $RutaRelativaControlador.'Controladores/Privada/C_DocenciaP.php',
	$identificadoresPrivados['Actividades'] => $RutaRelativaControlador.'Controladores/Privada/C_ActividadesP.php',
	
	$identificadoresPrivados['AMiembros'] => $RutaRelativaControlador.'Controladores/Privada/C_AltaMiembrosP.php',
	$identificadoresPrivados['APrensa'] => $RutaRelativaControlador.'Controladores/Privada/C_AltaPrensaP.php',
	$identificadoresPrivados['AColaboraciones'] => $RutaRelativaControlador.'Controladores/Privada/C_AltaColaboracionesP.php',
	$identificadoresPrivados['ATransferencias'] => $RutaRelativaControlador.'Controladores/Privada/C_AltaTransferenciasP.php',
	$identificadoresPrivados['APublicaciones'] => $RutaRelativaControlador.'Controladores/Privada/C_AltaPublicacionesP.php',
	$identificadoresPrivados['ADocencia'] => $RutaRelativaControlador.'Controladores/Privada/C_AltaDocenciaP.php',
	$identificadoresPrivados['AActividades'] => $RutaRelativaControlador.'Controladores/Privada/C_AltaActividadesP.php',
	
	$identificadoresPrivados['MMiembros'] => $RutaRelativaControlador.'Controladores/Privada/C_ModMiembrosP.php',
	$identificadoresPrivados['MPrensa'] => $RutaRelativaControlador.'Controladores/Privada/C_ModPrensaP.php',
	$identificadoresPrivados['MColaboraciones'] => $RutaRelativaControlador.'Controladores/Privada/C_ModColaboracionesP.php',
	$identificadoresPrivados['MTransferencias'] => $RutaRelativaControlador.'Controladores/Privada/C_ModTransferenciasP.php',
	$identificadoresPrivados['MPublicaciones'] => $RutaRelativaControlador.'Controladores/Privada/C_ModPublicacionesP.php',
	$identificadoresPrivados['MDocencia'] => $RutaRelativaControlador.'Controladores/Privada/C_ModDocenciaP.php',
	$identificadoresPrivados['MActividades'] => $RutaRelativaControlador.'Controladores/Privada/C_ModActividadesP.php'
	
	
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
	$identificadoresPrivados['DTransferencias'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaDelTransferenciasP.php',
	
	$identificadoresPrivados['APublicaciones'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaAltaPublicacionesP.php',
	$identificadoresPrivados['MPublicaciones'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaModPublicacionesP.php',
	$identificadoresPrivados['DPublicaciones'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaDelPublicacionesP.php',
	
	$identificadoresPrivados['ADocencia'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaAltaDocenciaP.php',
	
	$identificadoresPrivados['AActividades'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaAltaActividadesP.php',
	$identificadoresPrivados['MActividades'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaModActividadesP.php',
	$identificadoresPrivados['DActividades'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaDelActividadesP.php'
);

//TODO METER IFS PARA HACER ESTAS COSAS SOLO CUANDO SEA NECESARIO
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

$_TABLAPATENTES = new TablaBD(
"S_PATENTE",
	array(
	"Nombre_Patente" => "",
	"IDPatente" => "",
	"Fecha_Patente" => ""
	),
array(1)
);
$_TABLACONTRATOS = new TablaBD(
"S_CONTRATO",
	array(
	"Nombre_Contrato" => "",
	"IDContrato" => "",
	"FechaIni_Contrato" => "",
	"FechaFin_Contrato" => "",
	"IDEmpresa" => ""
	),
array(1)
);
$_TABLAPROYECTOS = new TablaBD(
"S_PROYECTO",
	array(
	"Nombre_Proyecto" => "",
	"Descripcion_Proyecto" => "",
	"IDProyecto" => ""
	),
array(2)
);

$_TABLALIBROS = new TablaBD(
"S_LIBROS",
	array(
	"Titulo_Libro" => "",
	"ISBN" => "",
	"Fecha_Libro" => "",
	"Pais_Libro" => ""
	),
array(1)
);

$_TABLAARTICULOS = new TablaBD(
"S_ARTICULO",
	array(
	"ISSN_Revista" => "",
	"Nombre_Revista" => "",
	"Titulo_Articulo" => "",
	"Anotaciones_Articulo" => "",
	"IDArticulo" => "",
	"Fecha_Articulo" => ""
	),
array(4)
);

$_TABLACONFERENCIAS = new TablaBD(
"S_CONFERENCIAS",
	array(
	"Nombre_Conferencia" => "",
	"Charla_Conferencia" => "",
	"Fecha_Conferencia" => "",
	"IDConferencia" => ""
	),
array(3)
);

$_TABLADOCENCIA = new TablaBD(
"S_USUARIO_MATERIA",
	array(
	"IDMateria" => "",
	"Login" => "",
	"FechaIni_Materia" => "",
	"FechaFin_Materia" => ""
	),
array(0,1)
);

$_TABLACONFERENCIASORG = new TablaBD(
"S_CONFERENCIAS_ORG",
	array(
	"Titulo_Conferencia_Org" => "",
	"IDConferencia_Org" => "",
	"Fecha_Conferencia_Org" => ""
	),
array(1)
);

$_TABLAREVISTAS = new TablaBD(
"S_REVISTAS",
	array(
	"Titulo_Revista" => "",
	"ISSNOnline_Revista" => "",
	"ISSN_Revista" => "",
	"Fecha_Revista" => "",
	"IDRevista" => ""
	),
array(4)
);

$_TABLATABLONEDITORIAL = new TablaBD(
"S_TABLONEDITORIAL",
	array(
	"Titulo_Tablon" => "",
	"ISSNOnline_Tablon" => "",
	"ISSN_Tablon" => "",
	"Fecha_Tablon" => "",
	"IDRevista" => ""
	),
array(4)
);

//Patrones a usar en los formularios para la comprobacion de errores
$PATRONPASS = ' pattern="^[^\s]{5,25}" '; //min 5 max 25  cualquiercosa distinto de expacio en blanco
$PATRONUSU = ' pattern="^[^\s].{4,24}" '; //min 5 max 25 se incluye ^[^\s] que significa que no empiece por espacio en blanco
$PATRONTELF = ' pattern="[0-9]{9}" min="600000000" '; //9 numeros
$PATRONID=' pattern="^[^\s].{3,9}" '; // 4-10 se incluye ^[^\s] que significa que no empiece por espacio en blanco
$OBLIGATORIO=" required ";

//Este array contiene los campos que se mostran en lso distintos formularios de alta de la aplicacion.
// cada elemento de formularios alta es un array con cada uno de los campos del formulario array([PROPIEDAD NAME, PROPEIDAD TYPE, OTROS PARAMETROS QUE SE INCRUSTARAN EN EL HTML])
// "NOMBRECAMPO", "TIPOCAMPO", "PATRONESDEVALIDACIONHTML5 [js:FUNCIONDEVALIDACION]", [OPCIONAL (SELECT,MULTICHECK)]"sql:RELLENARSELECT |o| array:v1@v2@v3",[OPCIONAL (MULTICHECK)]"sql:SELECTCHEKSACTIVAR|o| array:v1@v2@v3"
//
//"js: -> indicador de funcion personalizada. EN CASO DE EXISTIR ESTE INDICADOR, INCLUIR  LAS VALIDACIONES HTML5 ANTES DEL js"
// c1|c2|c3
// c1 -> evento que se mirara para la comprobacion 
// c2 -> funcion establecera si esta correcto o no. Debe estar creada y añadida en el archivo "Pie.php"
// c3 -> mensaje de error que se mostrara en caso de campo incorrecto

//El nombre del campo multicheck es concreto debe ser MP-MP-[TablaDondeVanLosDatos]@[CampoDeLosDatos]
// cuando se procese un Alta de unu formuulario donde se ponga un Multichek de esos, todos los valores chekeados se insertaran e la tabla [TablaDondeVanLosDatos]
$formularios = array(
	$identificadoresPrivados['AMiembros'] => 
	array(
		array( 'MA-Login','text', "$OBLIGATORIO $PATRONUSU"),
		array( 'MA-Pass','Pass', "$OBLIGATORIO $PATRONPASS"),
		array( 'MA-USU_nombre','text', ""),
		array( 'MA-USU_apellido','text', ""),
		array( 'MA-USU_email','email', ""),
		array( 'MA-USU_fecha_alta','date', ""),
		array( 'MA-Web_Usuario','text', ""),
		array( 'MA-Departamento_Usuario','text', ""),
		array( 'MA-Descripcion_Usuario','textarea', ""),
		array( 'MA-Telefono_Usuario','number', "$OBLIGATORIO $PATRONTELF"),
		array( 'MA-Movil_Usuario','number', "$PATRONTELF")
	),
	$identificadoresPrivados['MMiembros'] => 
	array(
		array( 'MA-Login','text', "$OBLIGATORIO $PATRONUSU"),
		array( 'MA-Pass','Pass', "$OBLIGATORIO $PATRONPASS"),
		array( 'MA-USU_nombre','text', ""),
		array( 'MA-USU_apellido','text', ""),
		array( 'MA-USU_email','email', ""),
		array( 'MA-Web_Usuario','text', ""),
		array( 'MA-Departamento_Usuario','text', ""),
		array( 'MA-Descripcion_Usuario','textarea', ""),
		array( 'MA-Telefono_Usuario','number', "$PATRONTELF"),
		array( 'MA-Movil_Usuario','number', "$PATRONTELF")
	),
	$identificadoresPrivados['APrensa'] => 
	array(
		array( 'MP-Titulo_Noticia','text', "$OBLIGATORIO"),
		array( 'MP-Fecha_Noticia','date', "$OBLIGATORIO"),
		array( 'MP-Web_Noticia','text', ""),
		array( 'MP-IDPDF_Noticia','text', "$PATRONID"),
		array( 'MP-Publicador_Noticia','select', "$OBLIGATORIO","sql:Select * from USUARIOS where Login IN (Select login from HACE_DE where ROL_nombre = '".$ROLMIEMBRO."')")
	),
	$identificadoresPrivados['MPrensa'] => 
	array(
		array( 'MP-Titulo_Noticia','text', "$OBLIGATORIO"),
		array( 'MP-Fecha_Noticia','date', "$OBLIGATORIO"),
		array( 'MP-Web_Noticia','text', ""),
		array( 'MP-IDPDF_Noticia','text', "$PATRONID"),
		array( 'MP-Publicador_Noticia','select', "$OBLIGATORIO","sql:Select * from USUARIOS where Login IN (Select login from HACE_DE where ROL_nombre = '".$ROLMIEMBRO."')")
	),
	$identificadoresPrivados['AColaboraciones']."E" => 
	array(
		array( 'MP-IDEmpresa','text', "$OBLIGATORIO $PATRONID"),
		array( 'MP-Web_Empresa','text', ""),
		array( 'MP-Nombre_Empresa','text', "$OBLIGATORIO"),
		array( 'MP-IDImagen_Empresa','text', "$PATRONID"),
		array( 'MP-IDParticipante','select', "$OBLIGATORIO","sql:Select * from USUARIOS where Login IN (Select login from HACE_DE where ROL_nombre = '".$ROLMIEMBRO."')")
	),
	$identificadoresPrivados['AColaboraciones']."G" => 
	array(
		array( 'MP-IDGrupo','text', "$OBLIGATORIO $PATRONID"),
		array( 'MP-Web_Grupo','text', ""),
		array( 'MP-IDImagen_Grupo','text', "$PATRONID"),
		array( 'MP-Nombre_Grupo','text', "$OBLIGATORIO"),
		array( 'MP-IDParticipante','select', "$OBLIGATORIO","sql:Select * from USUARIOS where Login IN (Select login from HACE_DE where ROL_nombre = '".$ROLMIEMBRO."')")
	),
	$identificadoresPrivados['AColaboraciones']."I" => 
	array(
		array( 'MP-IDInstitucion','text', "$OBLIGATORIO $PATRONID"),
		array( 'MP-Web_Institucion','text', ""),
		array( 'MP-IDImagen_Institucion','text', "$PATRONID"),
		array( 'MP-Nombre_Institucion','text', "$OBLIGATORIO"),
		array( 'MP-IDParticipante','select', "$OBLIGATORIO","sql:Select * from USUARIOS where Login IN (Select login from HACE_DE where ROL_nombre = '".$ROLMIEMBRO."')")
	),
	$identificadoresPrivados['MColaboraciones']."E" => 
	array(
		array( 'MP-IDEmpresa','text', "$OBLIGATORIO $PATRONID"),
		array( 'MP-Web_Empresa','text', ""),
		array( 'MP-Nombre_Empresa','text', "$OBLIGATORIO"),
		array( 'MP-IDImagen_Empresa','text', "$PATRONID")
	),
	$identificadoresPrivados['MColaboraciones']."G" => 
	array(
		array( 'MP-IDGrupo','text', "$OBLIGATORIO $PATRONID"),
		array( 'MP-Web_Grupo','text', ""),
		array( 'MP-IDImagen_Grupo','text', "$PATRONID"),
		array( 'MP-Nombre_Grupo','text', "$OBLIGATORIO")
	),
	$identificadoresPrivados['MColaboraciones']."I" => 
	array(
		array( 'MP-IDInstitucion','text', "$OBLIGATORIO $PATRONID"),
		array( 'MP-Web_Institucion','text', ""),
		array( 'MP-IDImagen_Institucion','text', "$PATRONID"),
		array( 'MP-Nombre_Institucion','text', "$OBLIGATORIO")
	),
	$identificadoresPrivados['ATransferencias']."PA" => 
	array(
		array( 'MP-Nombre_Patente','text', "$OBLIGATORIO"),
		array( 'MP-IDPatente','text', "$OBLIGATORIO $PATRONID"),
		array( 'MP-Fecha_Patente','date', "")
	),
	$identificadoresPrivados['ATransferencias']."PO" => 
	array(
		array( 'MP-Nombre_Proyecto','text', "$OBLIGATORIO"),
		array( 'MP-Descripcion_Proyecto','textarea', ""),
		array( 'MP-IDProyecto','text', "$OBLIGATORIO $PATRONID"),
		array( 'MP-MC-S_ASIGNADO@IDParticipante','multiCheck', "","sql:Select IDParticipantes from S_PARTICIPANTES","")
	),
	$identificadoresPrivados['ATransferencias']."CO" => 
	array(
		array( 'MP-Nombre_Contrato','text', "$OBLIGATORIO"),
		array( 'MP-IDContrato','text', "$OBLIGATORIO $PATRONID"),
		array( 'MP-FechaIni_Contrato','date', "$OBLIGATORIO js:blur|MayorMenor('MP-FechaFin_Contrato','MP-FechaIni_Contrato')|Fecha Erronea, supera la de Fin"),
		array( 'MP-FechaFin_Contrato','date', "$OBLIGATORIO js:blur|MayorMenor('MP-FechaFin_Contrato','MP-FechaIni_Contrato')|Fecha Erronea, inferior a la de Inicio"),
		array( 'MP-IDEmpresa','select', "$OBLIGATORIO","sql:Select IDEmpresa from S_EMPRESAS")
	),
	$identificadoresPrivados['MTransferencias']."PA" => 
	array(
		array( 'MP-Nombre_Patente','text', "$OBLIGATORIO"),
		array( 'MP-IDPatente','text', "$OBLIGATORIO $PATRONID"),
		array( 'MP-Fecha_Patente','date', "")
	),
	$identificadoresPrivados['MTransferencias']."PO" => 
	array(
		array( 'MP-Nombre_Proyecto','text', "$OBLIGATORIO"),
		array( 'MP-Descripcion_Proyecto','textarea', ""),
		array( 'MP-IDProyecto','text', "$OBLIGATORIO $PATRONID"),
		array( 'MP-MC-S_ASIGNADO@IDParticipante','multiCheck', "","sql:Select IDParticipantes from S_PARTICIPANTES","sql:Select IDParticipante from S_ASIGNADO WHERE IDProyecto='%d'")
	),
	$identificadoresPrivados['MTransferencias']."CO" => 
	array(
		array( 'MP-Nombre_Contrato','text', "$OBLIGATORIO"),
		array( 'MP-IDContrato','text', "$OBLIGATORIO $PATRONID"),
		array( 'MP-FechaIni_Contrato','date', "$OBLIGATORIO js:blur|MayorMenor('MP-FechaFin_Contrato','MP-FechaIni_Contrato')|Fecha Erronea, supera la de Fin"),
		array( 'MP-FechaFin_Contrato','date', "$OBLIGATORIO js:blur|MayorMenor('MP-FechaFin_Contrato','MP-FechaIni_Contrato')|Fecha Erronea, inferior a la de Inicio"),
		array( 'MP-IDEmpresa','select', "$OBLIGATORIO","sql:Select 'IDEmpresa' from S_EMPRESAS")
	),
	$identificadoresPrivados['APublicaciones']."L" => 
	array(
		array( 'MP-Titulo_Libro','text', "$OBLIGATORIO"),
		array( 'MP-ISBN','text', "$OBLIGATORIO"),
		array( 'MP-Fecha_Libro','date', ""),
		array( 'MP-Pais_Libro','text', ""),
		array( 'MP-MC-S_USUARIO_LIBRO@Login','multiCheck', "","sql:Select Login from USUARIOS where Login IN (Select login from HACE_DE where ROL_nombre = '".$ROLMIEMBRO."')","")
	),
	$identificadoresPrivados['APublicaciones']."A" => 
	array(
		array( 'MP-ISSN_Revista','text', "$OBLIGATORIO"),
		array( 'MP-Nombre_Revista','text', "$OBLIGATORIO"),
		array( 'MP-Titulo_Articulo','text', "$OBLIGATORIO"),
		array( 'MP-Anotaciones_Articulo','textarea', "$OBLIGATORIO"),
		array( 'MP-IDArticulo','text', "$OBLIGATORIO"),
		array( 'MP-Fecha_Articulo','date', "$OBLIGATORIO"),
		array( 'MP-MC-S_USUARIO_ARTICULO@Login','multiCheck', "","sql:Select Login from USUARIOS where Login IN (Select login from HACE_DE where ROL_nombre = '".$ROLMIEMBRO."')","")
	),
	$identificadoresPrivados['APublicaciones']."C" => 
	array(
		array( 'MP-Nombre_Conferencia','text', "$OBLIGATORIO"),
		array( 'MP-Charla_Conferencia','text', "$OBLIGATORIO"),
		array( 'MP-Fecha_Conferencia','date', "$OBLIGATORIO"),
		array( 'MP-IDConferencia','text', "$OBLIGATORIO"),
		array( 'MP-MC-S_USUARIO_CONFERENCIA@Login','multiCheck', "","sql:Select Login from USUARIOS where Login IN (Select login from HACE_DE where ROL_nombre = '".$ROLMIEMBRO."')","")
	),
	$identificadoresPrivados['MPublicaciones']."L" => 
	array(
		array( 'MP-Titulo_Libro','text', "$OBLIGATORIO"),
		array( 'MP-ISBN','text', "$OBLIGATORIO"),
		array( 'MP-Fecha_Libro','date', ""),
		array( 'MP-Pais_Libro','text', ""),
		array( 'MP-MC-S_USUARIO_LIBRO@Login','multiCheck', "","sql:Select Login from USUARIOS where Login IN (Select login from HACE_DE where ROL_nombre = '".$ROLMIEMBRO."')","sql:Select distinct Login from S_USUARIO_LIBRO WHERE ISBN='%d'")
	),
	$identificadoresPrivados['MPublicaciones']."A" => 
	array(
		array( 'MP-ISSN_Revista','text', "$OBLIGATORIO"),
		array( 'MP-Nombre_Revista','text', "$OBLIGATORIO"),
		array( 'MP-Titulo_Articulo','text', "$OBLIGATORIO"),
		array( 'MP-Anotaciones_Articulo','textarea', "$OBLIGATORIO"),
		array( 'MP-IDArticulo','text', "$OBLIGATORIO"),
		array( 'MP-Fecha_Articulo','date', "$OBLIGATORIO"),
		array( 'MP-MC-S_USUARIO_ARTICULO@Login','multiCheck', "","sql:Select Login from USUARIOS where Login IN (Select login from HACE_DE where ROL_nombre = '".$ROLMIEMBRO."')","sql:Select distinct Login from S_USUARIO_ARTICULO WHERE IDArticulo='%d'")
	),
	$identificadoresPrivados['MPublicaciones']."C" => 
	array(
		array( 'MP-Nombre_Conferencia','text', "$OBLIGATORIO"),
		array( 'MP-Charla_Conferencia','text', "$OBLIGATORIO"),
		array( 'MP-Fecha_Conferencia','date', "$OBLIGATORIO"),
		array( 'MP-IDConferencia','text', "$OBLIGATORIO"),
		array( 'MP-MC-S_USUARIO_CONFERENCIA@Login','multiCheck', "","sql:Select Login from USUARIOS where Login IN (Select login from HACE_DE where ROL_nombre = '".$ROLMIEMBRO."')","sql:Select distinct Login from S_USUARIO_CONFERENCIA WHERE IDConferencia='%d'")
	),
	$identificadoresPrivados['ADocencia'] => 
	array(
		array( 'MP-IDMateria','select', "$OBLIGATORIO", "sql:Select IDMateria from S_MATERIAS"),
		array( 'MP-Login','select', "$OBLIGATORIO", "sql:Select Login from USUARIOS "),
		array( 'MP-FechaIni_Materia','date', "$OBLIGATORIO js:blur|MayorMenor('MP-FechaFin_Materia','MP-FechaIni_Materia')|Fecha Erronea, supera la de Fin"),
		array( 'MP-FechaFin_Materia','date', "$OBLIGATORIO js:blur|MayorMenor('MP-FechaFin_Materia','MP-FechaIni_Materia')|Fecha Erronea, inferior a la de Inicio")
		),
	$identificadoresPrivados['AActividades']."ED" => 
	array(
		array( 'MP-Titulo_Tablon','text', "$OBLIGATORIO"),
		array( 'MP-ISSNOnline_Tablon','text', "$OBLIGATORIO"),
		array( 'MP-ISSN_Tablon','text', "$OBLIGATORIO"),
		array( 'MP-Fecha_Tablon','date', "$OBLIGATORIO"),
		array( 'MP-IDTablon','text', "$OBLIGATORIO")
	),
	$identificadoresPrivados['AActividades']."RE" => 
	array(
		array( 'MP-Titulo_Revista','text', "$OBLIGATORIO"),
		array( 'MP-ISSNOnline_Revista','text', "$OBLIGATORIO"),
		array( 'MP-ISSN_Revista','text', "$OBLIGATORIO"),
		array( 'MP-Fecha_Revista','date', "$OBLIGATORIO"),
		array( 'MP-IDRevista','text', "$OBLIGATORIO")
	),
	$identificadoresPrivados['AActividades']."CON" => 
	array(
		array( 'MP-Titulo_Conferencia_Org','text', "$OBLIGATORIO"),
		array( 'MP-IDConferencia_Org','text', "$OBLIGATORIO"),
		array( 'MP-Fecha_Conferencia_Org','date', "")
	),
	$identificadoresPrivados['MActividades']."ED" => 
	array(
		array( 'MP-Titulo_Tablon','text', "$OBLIGATORIO"),
		array( 'MP-ISSNOnline_Tablon','text', "$OBLIGATORIO"),
		array( 'MP-ISSN_Tablon','text', "$OBLIGATORIO"),
		array( 'MP-Fecha_Tablon','date', "$OBLIGATORIO"),
		array( 'MP-IDTablon','text', "$OBLIGATORIO")
	),
	$identificadoresPrivados['MActividades']."RE" => 
	array(
		array( 'MP-Titulo_Revista','text', "$OBLIGATORIO"),
		array( 'MP-ISSNOnline_Revista','text', "$OBLIGATORIO"),
		array( 'MP-ISSN_Revista','text', "$OBLIGATORIO"),
		array( 'MP-Fecha_Revista','date', "$OBLIGATORIO"),
		array( 'MP-IDRevista','text', "$OBLIGATORIO")
	),
	$identificadoresPrivados['MActividades']."CON" => 
	array(
		array( 'MP-Titulo_Conferencia_Org','text', "$OBLIGATORIO"),
		array( 'MP-IDConferencia_Org','text', "$OBLIGATORIO"),
		array( 'MP-Fecha_Conferencia_Org','date', "")
	)
);

// ESTA VARIABLE NO SE MODIFICA DIRECTAMENTE, ES VARIABLE GLOBAL Y NO SE DEBE MODIFICAR
// LOS CONTROLADORES LA USARAN PARA ESTABLECER LA VALIDACION DEL FORMULARIO EN CASO DE FUNCIONES
// PERSONALIZADAS.
$VALIDACIONFORMULARIO = ""; 

?>

