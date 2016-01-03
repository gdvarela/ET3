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
'Docencia'=> 'DC',
'ADocencia'=> 'ADC',
'MDocencia'=> 'MDC',
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
	$identificadoresPrivados['Docencia'] => $RutaRelativaControlador.'Vistas/Privadas/V_DocenciaP.php',
	
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
	$identificadoresPrivados['ADocencia'] => $RutaRelativaControlador.'Vistas/Privadas/V_AltaDocenciaP.php',
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
	$identificadoresPrivados['Docencia'] => $RutaRelativaControlador.'Controladores/Privada/C_DocenciaP.php',
	
	$identificadoresPrivados['AMiembros'] => $RutaRelativaControlador.'Controladores/Privada/C_AltaMiembrosP.php',
	$identificadoresPrivados['APrensa'] => $RutaRelativaControlador.'Controladores/Privada/C_AltaPrensaP.php',
	$identificadoresPrivados['AColaboraciones'] => $RutaRelativaControlador.'Controladores/Privada/C_AltaColaboracionesP.php',
	$identificadoresPrivados['ATransferencias'] => $RutaRelativaControlador.'Controladores/Privada/C_AltaTransferenciasP.php',
	$identificadoresPrivados['ADocencia'] => $RutaRelativaControlador.'Controladores/Privada/C_AltaDocenciaP.php',
	
	$identificadoresPrivados['MMiembros'] => $RutaRelativaControlador.'Controladores/Privada/C_ModMiembrosP.php',
	$identificadoresPrivados['MPrensa'] => $RutaRelativaControlador.'Controladores/Privada/C_ModPrensaP.php',
	$identificadoresPrivados['MColaboraciones'] => $RutaRelativaControlador.'Controladores/Privada/C_ModColaboracionesP.php',
	$identificadoresPrivados['MTransferencias'] => $RutaRelativaControlador.'Controladores/Privada/C_ModTransferenciasP.php',
	$identificadoresPrivados['MDocencia'] => $RutaRelativaControlador.'Controladores/Privada/C_ModDocenciaP.php'
	
	
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
	
	$identificadoresPrivados['ADocencia'] => $RutaRelativaControlador.'Controladores/Privada/Procesadores/ProcesaAltaDocenciaP.php'
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
$_TABLADOCENCIA = new TablaBD(
"S_USUARIO_MATERIA",
	array(
	"IDMateria" => "",
	"Login" => "",
	"FechaIni_Materia" => "",
	"FechaFin_Materia" => "",
	),
array(0,1)
);

//Patrones a usar en los formularios para la comprobacion de errores
$PATRONPASS = ' "pattern={5-25}" '; //min 5 max 25
$PATRONUSU = ' "pattern={4-25}" '; //min 4 max 25
$PATRONTELF = ' "pattern=[0-9]{9} " min="600000000"'; //9 numeros
$PATRONID=" pattern={3-10} ";
$OBLIGATORIO=" required ";

//Este array contiene los campos que se mostran en lso distintos formularios de alta de la aplicacion.
// cada elemento de formularios alta es un array con cada uno de los campos del formulario array([PROPIEDAD NAME, PROPEIDAD TYPE, OTROS PARAMETROS QUE SE INCRUSTARAN EN EL HTML])
// "NOMBRECAMPO", "TIPOCAMPO", "PATRONESDEVALIDACIONHTML5 [js:FUNCIONDEVALIDACION]", [OPCIONAL-SOLO-SELECT]"sql:RELLENARSELECT (SIFUERA NECESARIO SE AÑADIRÁ array:VALORESMOSTRAR pero en principio no es necesario)"
//
//"js: -> indicador de funcion personalizada. EN CASO DE EXISTIR ESTE INDICADOR, INCLUIR  LAS VALIDACIONES HTML5 ANTES DEL js"
// c1|c2|c3
// c1 -> evento que se mirara para la comprobacion 
// c2 -> funcion establecera si esta correcto o no. Debe estar creada y añadida en el archivo "Pie.php"
// c3 -> mensaje de error que se mostrara en caso de campo incorrecto

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
		array( 'MP-IDProyecto','text', "$OBLIGATORIO $PATRONID")
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
		array( 'MP-IDProyecto','text', "$OBLIGATORIO $PATRONID")
	),
	$identificadoresPrivados['MTransferencias']."CO" => 
	array(
		array( 'MP-Nombre_Contrato','text', "$OBLIGATORIO"),
		array( 'MP-IDContrato','text', "$OBLIGATORIO $PATRONID"),
		array( 'MP-FechaIni_Contrato','date', "$OBLIGATORIO js:blur|MayorMenor('MP-FechaFin_Contrato','MP-FechaIni_Contrato')|Fecha Erronea, supera la de Fin"),
		array( 'MP-FechaFin_Contrato','date', "$OBLIGATORIO js:blur|MayorMenor('MP-FechaFin_Contrato','MP-FechaIni_Contrato')|Fecha Erronea, inferior a la de Inicio"),
		array( 'MP-IDEmpresa','select', "$OBLIGATORIO","sql:Select 'IDEmpresa' from S_EMPRESAS")
	),
	$identificadoresPrivados['ADocencia'] => 
	array(
		array( 'MP-IDMateria','select', "$OBLIGATORIO", "sql:Select IDMateria from S_MATERIAS"),
		array( 'MP-Login','select', "$OBLIGATORIO", "sql:Select Login from USUARIOS "),
		array( 'MP-FechaIni_Materia','date', "$OBLIGATORIO js:blur|MayorMenor('MP-FechaFin_Materia','MP-FechaIni_Materia')|Fecha Erronea, supera la de Fin"),
		array( 'MP-FechaFin_Materia','date', "$OBLIGATORIO js:blur|MayorMenor('MP-FechaFin_Materia','MP-FechaIni_Materia')|Fecha Erronea, inferior a la de Inicio")
		),
);

// ESTA VARIABLE NO SE MODIFICA DIRECTAMENTE, ES VARIABLE GLOBAL Y NO SE DEBE MODIFICAR
// LOS CONTROLADORES LA USARAN PARA ESTABLECER LA VALIDACION DEL FORMULARIO EN CASO DE FUNCIONES
// PERSONALIZADAS.
$VALIDACIONFORMULARIO = ""; 

?>

