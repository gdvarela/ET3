<?php
$Idioma = array(

//-------------------------------------------------------------------------Login
'ERR Pass' => 'Incorrect Password.',
'ERR Login' => 'Login do not exists.',

//-------------------------------------------------------------------------Usuarios
'ERR CLAVE U' => 'Login name already exists.',
'MAIL INC' => 'Invalid Mail',
'FORMAT PASS' => 'Min 8 (A-Z,1-9)',
'CONFIRM PASS' => 'Confirmation',
'CONFIRM PASS ERROR' => 'Dont Match',
//'El campo Login no puede contener espacios' => 'El campo <i> Login </i> no puede contener espacios.',
//'El campo Pass esta vacio' => 'El campo <i> Pass </i> esta vacio.',
//'El campo Login esta vacio' => 'El campo <i> Login </i> esta vacio.',

'MSG ORD BUT' => 'Sort',
'Fecha' => 'Date',

'ALT U OK' => 'User Inserted Correctly',
'ALT ERR U' => 'Error in User Insert',

'ACT U OK' => 'User Updated Correctly.',
'ACT ERR U' => 'Error in User Update.',
'ACT ERR R-U' => 'Error Updating Relation Roles and User.',
'ACT ERR P-U' => 'Error Updating Relation Pages and User.',

'ELI NO SU' => 'No Users Selected.',
'ELI U OK' => 'Users Deleted Correctly.',
'ELI ERR U' => 'Error in Users Delete.',

'CON ERR SU' => 'Error obtainig Selected User.',
'CON ERR U' => 'Error obtainig Users from DataBase.', 
'CON ERR R-U' => 'Error Consulting Relation Roles and User.', 
'CON ERR P-U' => 'Error Consulting Relation Pages and User.', 

'Usuarios' => 'Users',
'Nuevo Usuario' => 'New User',
'Editar Usuario' => 'User Editing',

'TIT TAB LIST U' => 'Users List',
'Pass'  => 'Pass',
'Login' => 'Login',
'USU_nombre' => 'Username',
'USU_apellido' => 'Surname',
'USU_email' => 'Email', 
'USU_fecha_alta' => 'Creation Date',

'TIT ALT U' => 'New User Form',
'TIT ACT U' => 'User Modify Form',
'TIT CON U' => 'Users in Data Base',

'MSG R-U' => 'User Roles',
'MSG P-U' => 'Pages allowed singly',

//-------------------------------------------------------------------------Paginas
//'El campo Ubicacion esta vacio' => 'El campo <i> Ubicacion </i> esta vacio.',
//'El campo Nombre esta vacio' => 'El campo <i> Nombre </i> esta vacio.',
'ERR CLAVE P' => 'Page Name already exists',

'ERR UBI' => 'YOu must insert a valid path or valid filetype (php, html).',
'FILE' => 'Select a File:',
'ERR UPLOAD' => 'Error in File Upload',

'MSG FIL' => 'Show only',
'MSG FIL BUT' => 'Filter',

'ERROR OBT FILTRO' => 'Error in Pages Filter.',

'DET DIR' => '<p style="font-size:12">Must insert complete Path with end filename.<br> <i>/MyDir/Myfile.php</i></p>',
'ERR DIRECTORIO' => 'Especified directory no exist.',

'ALT P OK' => 'Page Inserted Correctly',
'ALT ERR P' => 'Error in Page Insert',

'ACT P OK' => 'Page Updated Correctly.',
'ACT ERR P' => 'Error in Page Update.',
'ACT ERR R-P' => 'Error Updating Relation Roles and Page.',
'ACT ERR U-P' => 'Error Updating Relation Pages and Page.',

'ELI NO SP' => 'No Pages Selected.',
'ELI P OK' => 'Pages Deleted Correctly.',
'ELI ERR P' => 'Error in Pages Delete.',

'CON ERR SP' => 'Error obtainig Selected Page.',
'CON ERR P' => 'Error obtainig Pages from DataBase.', 
'CON ERR R-P' => 'Error Consulting Relation Roles and Page.', 
'CON ERR U-P' => 'Error Consulting Relation Users and Page.', 

'Paginas' => 'Pages',
'Nueva Pagina' => 'New Page',
'Editar Pagina' => 'Page Editing',

'TIT TAB LIST P' => 'Pages List',
'PAG_nombre' => 'Page Name',
'PAG_descripcion' => 'Description',
'PAG_ubicacion' => 'Location',

'TIT ALT P' => 'New Page Form',
'TIT ACT P' => 'Page Modify Form',
'TIT CON P' => 'Pages in Data Base',

'MSG F-P' => 'Operations Related',
'MSG U-P' => 'Specific Users',

//-------------------------------------------------------------------------Funcionalidades
'ERR CLAVE F' => 'Operation name already exists.',

'ALT F OK' => 'Operation Inserted Correctly',
'ALT ERR F' => 'Error in Operation Insert',

'ACT F OK' => 'Operation Updated Correctly.',
'ACT ERR F' => 'Error in Operation Update.',
'ACT ERR R-F' => 'Error Updating Relation Roles and Operation.',
'ACT ERR P-F' => 'Error Updating Relation Pages and Operation.',

'ELI NO SF' => 'No Operations Selected.',
'ELI F OK' => 'Operations Deleted Correctly.',
'ELI ERR F' => 'Error in Operations Delete.',

'CON ERR SF' => 'Error obtainig Selected Operation.',
'CON ERR F' => 'Error obtainig Operations from DataBase.', 
'CON ERR R-F' => 'Error Consulting Relation Roles and Operation.', 
'CON ERR P-F' => 'Error Consulting Relation Pages and Operation.', 

'Funcionalidades' => 'Operations',
'Nueva Funcionalidad' => 'New Operation',
'Editar Funcionalidad' => 'Operation Editing',

'TIT TAB LIST F' => 'Operations List',
'FUN_nombre' => 'Nombre',
'FUN_descripcion' => 'Descripcion-Fun',

'TIT ALT F' => 'New Operation Form',
'TIT ACT F' => 'Operation Modify Form',
'TIT CON F' => 'Operations in Data Base',

'MSG P-F' => 'Pages of Implementation',
'MSG R-F' => 'Roles with Permissions',

//-------------------------------------------------------------------------Roles
'ERR CLAVE R' => 'Rol name already exists.',

'ALT R OK' => 'Rol Inserted Correctly',
'ALT ERR R' => 'Error in Rol Insert',

'ACT R OK' => 'Rol Updated Correctly.',
'ACT ERR R' => 'Error in Rol Update.',
'ACT ERR F-R' => 'Error Updating Relation Operations and Rol.',
'ACT ERR U-R' => 'Error Updating Relation Users and Rol.',

'ELI NO SR' => 'No Roles Selected.',
'ELI R OK' => 'Roles Deleted Correctly.',
'ELI ERR R' => 'Error in Roles Delete.',

'CON ERR SR' => 'Error obtainig Selected Rol.',
'CON ERR R' => 'Error obtainig Roles from DataBase.', 
'CON ERR F-R' => 'Error Consulting Relation Operations and Rol.', 
'CON ERR U-R' => 'Error Consulting Relation Users and Rol.', 

'Roles' => 'Roles',
'Nuevo Rol' => 'New Rol',
'Editar Rol' => 'Rol Editing',

'TIT TAB LIST R' => 'Roles List',
'ROL_nombre' => 'Rol Name',
'ROL_descripcion' => 'Description',

'TIT ALT R' => 'New Rol Form',
'TIT ACT R' => 'Rol Modify Form',
'TIT CON R' => 'Roles in Data Base',

'MSG U-R' => 'Users Asigned',
'MSG F-R' => 'Related Operations',

//-------------------------------------------------------------------------Permisos - Accesos
'ERR ACC' => 'You dont have permission acces.',

'ERR PERMISOS' => 'Error in DB, cant obtain your access permissions, you was redirected. Try again.',
'ERR CON A' => 'Error in Access List Consult.',
'ERR ALT A' => 'Error in DB, cant insert your access to a page, then you was redirected. Try again.',

'Accesos' => 'Acces',
'TIT TAB LIST A' => 'Lasts Access',
'Fecha/Hora' => 'Date/Time',
//-------------------------------------------------------------------------Errores
'TestErrores' => 'Errors Test',
'SubdirectorioAnalizar' => 'Subdirectory to analize',
'NomPagTest' => 'Page Name',
'ProcesarErrores' => 'Process',
'TIT TEST' => 'Test configuration',
'PropiedadesPeticion' => 'POST/GET Values',
'ListaPaginasErrores' => 'Pages to Test',
'PAG_DIR' => 'Web Pages',
//-------------------------------------------------------------------------Terminologia
'Aplicacion GESTAPP' => 'GESTAPP',
'LOGIN' => 'Log in',
'MSG Bienvenida' => 'Welcome to GESTAPP',
'Bienvenida' => 'Welcome',

'U' => 'User',
'P' => 'Page',
'R' => 'Rol',
'F' => 'Operation',
'A' => 'Access',

'Estilos' => 'Styles',
'Idiomas' => 'Languages',
'Bienvenido' => 'Welcome',
'Salir' => 'Log Out',

'Aceptar' => 'Accept',
'Editar' => 'Edit',
'Elim Sel' => 'Del',
'Modificar' => 'Modify',
//-------------------------------------------------------------------------Genericos
'FN' => 'Filename',
'DATOS VACIOS' => 'Its empty',
'ERR CAR' => 'Charge Error.',
'SOL PER' => 'You dont have Addministration Privileges.',
'ERR CONECT BD' => 'Error conecting DB.',
'ERR LENG' => 'Language change Error.',
'OK LENG' => 'Langue changed to English <i>Chafalleiro</i>.',
'ERR EXIST' => 'Error in DB, cant check if you are overwriting other primary key.',
'ErrDet' => 'Detailed DB Errors',
'ERR CON PERM F FILTRO' => 'Error obtainig Operations Permissions. Operations will not shown in Filter.',
'ERR PER S' =>'Error con los permisos del directorio de subida.',
'ERR PER D' =>'Error con los permisos del directorio de subida.',
'EXPLICACION' => 'To use a Page with GESTAPP, you must add theese lines to your page on top code:<br><br>-"$miPaginaPorDefecto" -> Users without permission will be redirect to this page.<br>In this example, te redirect page is a your own WebSite Login, but you can especify a standar error page, etc...<br><br>-"GESTAPP/controlPages.php" -> RELATIVE path to integrate file GESTAPP.<br><br>In this example "MyUploadPage.php" will be upload to root apache directory, GESTAPP Application is located in a GESTAPP directory y root apache directory too. The "include" path is relative how you can see.',

/*

////////////////////////////////////

PIXEL

////////////////////////////////////

*/

'TestErrores' => 'PHP Errors',
'TestErrores2' => 'Form Errors',
'Aclaracion' => 'JSON URL of test data',
'Enviar' => 'Send',
'Resultados parciales:' => 'Partial results:',
'Resultados totales:' => 'Total results:',
'Resultados totales:' => 'Total results:',
'Estadísticas:' => 'Statistics:',
'Total tests incorrectos:' => 'Total incorrect tests:',
'Total tests:' => 'Total tests:',
'Total campos erróneos:' => 'Total error fields:',
'Total campos:' => 'Total fields:',
'Total formularios erróneos:' => 'Total error forms:',
'Total formularios:' => 'Total forms:',
'Total páginas erróneas:' => 'Total error pages:',
'Total páginas:' => 'Total pages:',
'Tabla resultados:' => 'Chart results:',
'Errores:' => 'Errors:',
'Tests' => 'Tests',
'Resultados' => "Results",
'ESCRITURA' => "Write permissions on the directory are needed",

'EjecutarPruebas' => 'Preconfigured tests',
'Personalizada' => 'Custom tests',
'PC-pagename' => 'Click on the lateral menu to add directly',
'PC-pageprop' => 'Key1=Valueor1,Key2=Value2.....',
'EXP' => 'To test views, Select the related controller. The code of the views itself is incomplete and it will fail.',

'Barra_Titulo' => 'Pixel',

//Nombres de Pagina PagName[ID]
'PagNameH' => 'Home',
'PagNameM' => 'Members',
'PagNameP' => 'Press',
'PagNameT' => 'Transference',
'PagNameA' => 'Activities',
'PagNameD' => 'Teaching',
'PagNamePu' => 'Publications',
'PagNameC' => 'Colaborations',
'PagNameL' => 'Login',
'PagNameHP' => 'Home',
'PagNameMP' => 'Members',
'PagNameAMP' => 'New members',
'PagNameMMP' => 'Edit member',
'PagNamePP' => 'Press',
'PagNameAPP' => 'New report',
'PagNameMPP' => 'Edit report',
'PagNamePuP' => 'Publications',
'PagNameAPuP' => 'New publication',
'PagNameMPuP' => 'Edit publication',
'PagNameDP' => 'Teaching',
'PagNameADP' => 'New teaching',
'PagNameMDP' => 'Edit teaching',
'PagNameTP' => 'Transference',
'PagNameATP' => 'New transference',
'PagNameMTP' => 'Edit transference',
'PagNameCP' => 'Colaborations',
'PagNameACP' => 'New colaborations',
'PagNameMCP' => 'Edit colaborations',
'PagNameAP' => 'Activities',
'PagNameAAP' => 'New activities',
'PagNameMAP' => 'Edit activities',
'PagNameG' => 'GESTAPP',

//Resto de terminología
'Otros' => 'Others',
'Cancelar'=>'Cancel',
'Intranet' => 'Intranet',
'Login' => 'Login',
'LogOUT' => 'LogOUT',
'Configuracion' => 'Configuration',
'Grupo' => 'Group',
'Idioma' => 'Language',
'Enlace' => 'Link',
'CON ERR MIEMBROS' => 'Obtaining members error',
'CON ERR NOTICIAS' => 'Obtaining reports error',
'Alta_Miembro' => 'New member',
'Alta_Prensa' => 'New press',
'Elim_Sel' => 'Remove selected',

//Alta Miembro- Mod Miembro
'MA-Login' => 'Login',
'MA-Pass' => 'Password',
'MA-USU_nombre' => 'User name',
'MA-USU_apellido' => ' Surname',
'MA-USU_email' => 'Email',
'MA-USU_fecha_alta' => 'Start date',
'MA-Web_Usuario' => 'Personal Web',
'MA-Departamento_Usuario' => 'Department',
'MA-Descripcion_Usuario' => 'Description or Biography',
'MA-Telefono_Usuario' => 'Phone number',
'MA-Movil_Usuario' => 'Mobile phone number',

//Alta Prensa- Mod Prensa
'MP-Titulo_Noticia' => 'Report title',
'MP-Fecha_Noticia' => 'Report date',
'MP-Web_Noticia' => 'Source WEB',
'MP-IDPDF_Noticia' => ' ID PDF',
'MP-Publicador_Noticia' => 'Publisher member',

'ID CONCRETO REPETIDO P' => "Error during Insert",
'OBTENCION P' => 'Error in database obtaining data',
'ERROR CON P' => 'Error in Data listing',
'ERROR BORRADO P' => 'Error Deleting Data',
'ERROR MOD P' => 'Error Updating Data',

//COLABORACIONES

'MP-IDEmpresa'=>"ID",
	 'MP-Web_Empresa'=>"Website",
	 'MP-Nombre_Empresa'=>"Company name",
	 'MP-IDImagen_Empresa'=>"Image",
	 'MP-IDParticipante'=>"ID",
	 'MP-IDGrupo'=>"Group name",	 
	 'MP-Nombre_Grupo'=>"Group name",
	 'MP-Web_Grupo'=>"Website",
	 'MP-IDImagen_Grupo'=>"Group image",
	 'MP-IDParticipante'=>"ID",
	 'MP-IDInstitucion'=>"ID",
	 'MP-Web_Institucion'=>"Website",
	 'MP-IDImagen_Institucion'=>"Institution Image",
	 'MP-Nombre_Institucion'=>"Institution name",
	 'MP-IDParticipante'=>"ID",
	
	"Empresa" => "Company",
	"Institucion" => "Institution",
	"Grupo" => "Group",
	
'Alta_INST' => "Add institution",
'Alta_EMPRE' => "Add company",
'Alta_GRUPO' => "Add group",

'ID Part REP' =>"The competitor ID aready exists",
'ID CONCRETO REPETIDO C' => "Error during Insert",
'OBTENCION C' => 'Error in database obtaining data',
'ERROR CON C' => 'Error in Data listing',
'ERROR BORRADO C' => 'Error Deleting Data',
'ERROR MOD C' => 'Error Updating Data',

//Transferencias

'MP-Nombre_Patente' => 'Patent name',
'MP-IDPatente'=> 'ID',
'MP-Fecha_Patente' => 'Creation date',
'MP-Nombre_Proyecto'=> 'Project name',
'MP-Descripcion_Proyecto' => 'Project details',
'MP-IDProyecto'=> 'ID',
'MP-Nombre_Contrato'=> 'Contract name',
'MP-IDContrato'=> 'ID',
'MP-FechaIni_Contrato'=> 'Start date',
'MP-FechaFin_Contrato'=> 'Ending date',
'MP-IDEmpresa'=> 'Associated Company',
'MP-MC-S_ASIGNADO@IDParticipante' => 'Project competitors',

'Alta_PA' => "New patent",
'Descripcion' => "Description",
'Alta_PO' => "New project",
'Alta_CO' => "New contract", 
"Patente" => "Patent",
	"Proyecto" => "Project",
	"Contrato" => "Contract",
	"Inicio" => "Start",
	"Fin" => "End",
	"Duracion" => "Duration",
	
	'ID CONCRETO REPETIDO T' => "Error during Insert",
'OBTENCION T' => 'Error in database obtaining data',
'ERROR CON T' => 'Error in Data listing',
'ERROR BORRADO T' => 'Error Deleting Data',
'ERROR MOD T' => 'Error Updating Data',

	//Publicaciones
	
'MP-Titulo_Libro' => 'Book title',
'MP-ISBN'=> 'ISBN',
'MP-Fecha_Libro' => 'Publication date',
'MP-Pais_Libro'=> 'Country',
'MP-ISSN_Revista' => 'ISSN Journal',
'MP-Nombre_Revista'=> 'Journal name',
'MP-Titulo_Articulo'=> 'Article title',
'MP-Anotaciones_Articulo'=> 'Annotations',
'MP-IDArticulo'=> 'Article ID',
'MP-Fecha_Articulo'=> 'Article date',
'MP-Nombre_Conferencia'=> 'Conference name',
'MP-Charla_Conferencia'=> 'Conference speech',
'MP-Fecha_Conferencia'=> 'Conference date',
'MP-IDConferencia'=> 'Conference ID',
'MP-MC-S_USUARIO_LIBRO@Login'=> 'Miembros que lo Publican',
'MP-MC-S_USUARIO_ARTICULO@Login'=> 'Miembros Creadores o Mencionados',
'MP-MC-S_USUARIO_CONFERENCIA@Login'=> 'Miembros que participan',

"Libro" => "Book",
	"Articulo" => "Article",
	"Conferencia" => "Conference",
	
'Alta_L' => "New Book",
'Alta_C' => "Nueva Conference",
'Alta_A' => "Nuevo Article", 

	'ID CONCRETO REPETIDO Pu' => "Error during Insert",
'OBTENCION Pu' => 'Error in database obtaining data',
'ERROR CON Pu' => 'Error in Data listing',
'ERROR BORRADO Pu' => 'Error Deleting Data',
'ERROR MOD Pu' => 'Error Updating Data',

//Docencia

'Alta_DC' => "New Teaching",
'Alta_DCM' => "New Subject",
'MP-IDMateria' => 'Subject Identifier',
'MP-Nombre_Materia' => 'Name',
'MP-Login' => 'Professor',
'MP-FechaIni_Materia' => 'Start Date',
'MP-FechaFin_Materia' => 'End Date',
'MatImpr' => 'Subjects',

'ID CONCRETO REPETIDO D' => "Error during Insert",
'OBTENCION D' => 'Error in database obtaining data',
'ERROR CON D' => 'Error in Data listing',
'ERROR BORRADO D' => 'Error Deleting Data',
'ERROR MOD D' => 'Error Updating Data',

//Actividades

'MP-Titulo_Conferencia_Org' => 'Conference Title',
'MP-IDConferencia_Org'=> 'Identifier',
'MP-Fecha_Conferencia_Org' => 'Conference Date',
'MP-Titulo_Revista'=> 'Journal Title',
'MP-ISSNOnline_Revista' => 'ISSN Online Journal ',
'MP-Fecha_Revista'=> 'Journal Date',
'MP-IDRevista'=> 'Identifier',
'MP-Titulo_Tablon'=> 'Edit Title',
'MP-ISSNOnline_Tablon'=> 'ISSN Online Edit',
'MP-ISSN_Tablon'=> 'ISSN Edit',
'MP-Fecha_Tablon'=> 'Edit Title',
'MP-IDTablon'=> 'Edit Identifier',

"Editorial" => "Edits",
	"Revista" => "Journals",
	"ConferenciaG" => "Group Conference",
	
'Alta_ED' => "New Edit",
'Alta_RE' => "New Journal",
'Alta_CON' => "New Conference",
 
'ID CONCRETO REPETIDO A' => "Error during Insert",
'OBTENCION A' => 'Error in database obtaining data',
'ERROR CON A' => 'Error in Data listing',
'ERROR BORRADO A' => 'Error Deleting Data',
'ERROR MOD A' => 'Error Updating Data',
	
//Pagina HOME

'Globex' => 'Globex',
'Generación Lógica Opeativa para Bases de Empresas X' => 'Operative Logical GEneracion of Enterprises',
'Ourense' =>'Ourense',
'Somos' => 'We are',
'Ubicados en' => 'Located in',
'Escuela Superior de Ingienería Informática' => 'Escuela Superior de Ingienería Informática',
'Nuestro equipo' => 'Our Team',
'Alumnos' => 'Studenst',
'UVIGO' => 'Universidad de Vigo',
'Diez años desarrollando sistemas informáticos' => '10 Years of Developing',

'Desarrolo Web' => 'Web Develop',
'Diseño de interface' => 'Interface Desing',
'Interacción' => 'Interaction',
'Experiencia de usuario' => 'User Experience',

'Texto 1' => 'Desarrollo web es un término amplio que define la creación de sitios web para Internet o una intranet.',
'Texto 2' => 'Diseño de computadoras, aplicaciones, máquinas, dispositivos de comunicación móvil, aplicaciones de software, y sitios web enfocado en la experiencia de usuario y la interacción.',
'Texto 3' =>  'La interacción es una acción recíproca entre dos o más objetos, sustancias, personas o agentes.',
'Texto 4' => 'Conjunto de factores y elementos relativos a la interacción del usuario, con un entorno o dispositivo concretos, cuyo resultado es la generación de una percepción positiva o negativa de dicho servicio, producto o dispositivo.',

'Trabajos recientes' => 'Recent Works',
'Trabajo 1' => 'APPS Desings',
'Trabajo 2' => 'Dedicated Hardware Desing',
'Trabajo 3' => 'Vehicles Software Developement',
'Trabajo 4' => 'Gatitos Powerpoint Diseñation',

//Textos Home

'Texto Principal' => 'Informatic is too hard.',

//Citas HOME

'Homer Simpson' => 'Homer Simpson',
'Cita 1' => 'Tendrá todo el dinero del mundo, pero hay algo que nunca podrá comprar... un dinosaurio',
'Stave Ballmer' => 'Stave Ballmer',
'Cita 2' => 'Developers, developers, developers, developers, developers, developers, developers, developers, developers, developers, developers, developers, developers, developers, developers, developers, developers, developers, developers, developers, developers,...!!!!!!!',
'Mariano Rajoy' => 'Mariano Rajoy',
'Cita 3' => 'Es el vecino el que elige el alcalde y es el alcalde el que quiere que sean los vecinos el alcalde',
'C-3PO' => 'C-3PO',
'Cita 4' => 'El amo Luke estará bien... Para tratarse de un ser humano, es bastante ingenioso.',

//Pie Pagina

'Nuestras Oficinas' => 'Our Rooms',
'Enlaces de interes' => 'Intersing Links',
'Contactanos' => 'Contact',
'Noticias Recientes' => 'Recent News',
'Ultimas publicaciones' => 'Latest Publications',
'Carrera' => 'Master',
'Politica de privacidad' => 'Privacity Policy',
'Terminos y Condiciones' => 'Terms and Conditions',
'Ultimos eventos' => 'Latests Events'
)
?>
