<?php
$Idioma = array(
//-------------------------------------------------------------------------Login
'ERR Pass' => 'Pass incorrecta.',
'ERR Login' => 'No existe Login.',

//-------------------------------------------------------------------------Usuarios
'ERR CLAVE U' => 'El Login que intentas introducir ya existe.',
'MAIL INC' => 'Mail no valido.',
'FORMAT PASS' => 'Min 8 (A-Z,1-9)',
'CONFIRM PASS' => 'Confirmacion',
'CONFIRM PASS ERROR' => 'No coinciden',
//'El campo Login no puede contener espacios' => 'El campo <i> Login </i> no puede contener espacios.',
//'El campo Pass esta vacio' => 'El campo <i> Pass </i> esta vacio.',
//'El campo Login esta vacio' => 'El campo <i> Login </i> esta vacio.',

'MSG ORD BUT' => 'Ordenar',
'Fecha' => 'Fecha',


'ALT U OK' => 'Alta de Usuario realizada Correctamente.',
'ALT ERR U' => 'Error durante la inserccion de Usuario.',

'ACT U OK' => 'Actualizacion de Usuario realizada Correctamente.',
'ACT ERR U' => 'Error durante la actualizacion de datos USUARIO.',
'ACT ERR R-U' => 'Error durante la actualizacion de Roles de Usuario.',
'ACT ERR P-U' => 'Error durante la actualizacion de Paginas de Usuario.',

'ELI NO SU' => 'No se han seleccionado Usuarios para Eliminar.',
'ELI U OK' => 'Eliminacion de Usuario realizada correctamente.',
'ELI ERR U' => 'Error durante la eliminacion de Usuario.',

'CON ERR SU' => 'Error durante la consulta del Usuario Seleccionado.',
'CON ERR U' => 'Error durante la consulta sobre USUARIOS.', 
'CON ERR R-U' => 'Error durante la consulta de Roles de Usuario.', 
'CON ERR P-U' => 'Error durante la consulta sobre Paginas de Usuario.', 

'Usuarios' => 'Usuarios',
'Nuevo Usuario' => 'Nuevo Usuario',
'Editar Usuario' => 'Editar Usuario',

'TIT TAB LIST U' => 'Lista de Usuarios',
'Pass'  => 'Pass',
'Login' => 'Login',
'USU_nombre' => 'Nombre',
'USU_apellido' => 'Apellido',
'USU_email' => 'Email', 
'USU_fecha_alta' => 'Fecha Alta',

'TIT ALT U' => 'Formulario de Alta de Usuario',
'TIT ACT U' => 'Formulario de Modificación de Usuario',
'TIT CON U' => 'Consulta de Usuarios',

'MSG R-U' => 'Roles del usuario',
'MSG P-U' => 'Paginas del usuario',

//-------------------------------------------------------------------------Paginas
//'El campo Ubicacion esta vacio' => 'El campo <i> Ubicacion </i> esta vacio.',
//'El campo Nombre esta vacio' => 'El campo <i> Nombre </i> esta vacio.',
'ERR CLAVE P' => 'Ya existe una Pagina con ese nombre.',

'ERR UBI' => 'Debe indicar una ruta y una ext valida (php, html).',
'FILE' => 'Selecciona un Fichero:',
'ERR UPLOAD' => 'Error en la subida del fichero.',

'DET DIR' => '<p style="font-size:12">Introduzca la ruta junto con el nombre del Fichero final.<br>Ejemplo: <i>/MiDir/Mifichero.php</i></p>',
'ERR DIRECTORIO' => 'No existe el directorio especificado en Ubicacion.',

'MSG FIL' => 'Mostrar Solo',
'MSG FIL BUT' => 'Filtrar',

'ERROR OBT FILTRO' => 'Error al acceder a la BD para obtener las funcionalidades para el filtro',

'ALT P OK' => 'Alta de Pagina realizada Correctamente.',
'ALT ERR P' => 'Error durante la inserccion de Pagina.',

'ACT P OK' => 'Actualizacion de Pagina realizada Correctamente.',
'ACT ERR P' => 'Error durante la actualizacion de datos Pagina.',
'ACT ERR F-P' => 'Error durante la actualizacion de Roles de Pagina.',
'ACT ERR U-P' => 'Error durante la actualizacion de Paginas de Pagina.',

'ELI NO SP' => 'No se han seleccionado Paginas para Eliminar.',
'ELI P OK' => 'Eliminacion de Pagina realizada correctamente.',
'ELI ERR P' => 'Error durante la eliminacion de Pagina.',

'CON ERR SP' => 'Error durante la consulta del Pagina Seleccionado.',
'CON ERR P' => 'Error durante la consulta sobre Pagina.', 
'CON ERR F-P' => 'Error durante la consulta de Funcionalidades de Pagina.', 
'CON ERR U-P' => 'Error durante la consulta de Usuarios de Pagina.', 

'Paginas' => 'Paginas',
'Nueva Pagina' => 'Nueva Pagina',
'Editar Pagina' => 'Editar Pagina',

'TIT TAB LIST P' => 'Lista de Paginas',
'PAG_nombre' => 'Nombre',
'PAG_descripcion' => 'Descripcion-Pag',
'PAG_ubicacion' => 'Ubicacion',

'TIT ALT P' => 'Formulario de Alta de Pagina',
'TIT ACT P' => 'Formulario de Modificación de Pagina',
'TIT CON P' => 'Consulta de Paginas',

'MSG F-P' => 'Funcionalidades Asociadas',
'MSG U-P' => 'Usuarios especificos',

//-------------------------------------------------------------------------Funcionalidades
'ERR CLAVE F' => 'Ya existe una Funcionalidad con ese nombre.',


'ALT F OK' => 'Alta de Funcionalidad realizada Correctamente.',
'ALT ERR F' => 'Error durante la inserccion de Funcionalidad.',

'ACT F OK' => 'Actualizacion de Funcionalidad realizada Correctamente.',
'ACT ERR F' => 'Error durante la actualizacion de datos Funcionalidad.',
'ACT ERR R-F' => 'Error durante la actualizacion de Roles de Funcionalidad.',
'ACT ERR P-F' => 'Error durante la actualizacion de Paginas de Funcionalidad.',

'ELI NO SF' => 'No se han seleccionado Funcionalidads para Eliminar.',
'ELI F OK' => 'Eliminacion de Funcionalidad realizada correctamente.',
'ELI ERR F' => 'Error durante la eliminacion de Funcionalidad.',

'CON ERR SF' => 'Error durante la consulta del Funcionalidad Seleccionado.',
'CON ERR F' => 'Error durante la consulta sobre Funcionalidad.', 
'CON ERR R-F' => 'Error durante la consulta sobre Roles de Funcionalidad.', 
'CON ERR P-F' => 'Error durante la consulta de PAginas de Funcionalidad.', 

'Funcionalidades' => 'Funcionalidades',
'Nueva Funcionalidad' => 'Nueva Funcionalidad',
'Editar Funcionalidad' => 'Editar Funcionalidad',

'TIT TAB LIST F' => 'Lista de Funcionalidades',
'FUN_nombre' => 'Nombre',
'FUN_descripcion' => 'Descripcion-Fun',

'TIT ALT F' => 'Formulario de Alta de Funcionalidad',
'TIT ACT F' => 'Formulario de Modificación de Funcionalidad',
'TIT CON F' => 'Consulta de Funcionalidades',

'MSG P-F' => 'Paginas Asociadas',
'MSG R-F' => 'Roles Relacionados',

//-------------------------------------------------------------------------Roles
'ERR CLAVE R' => 'Ya existe un Rol con ese nombre.',

'ALT R OK' => 'Alta de Rol realizada Correctamente.',
'ALT ERR R' => 'Error durante la inserccion de Rol.',

'ACT R OK' => 'Actualizacion de Rol realizada Correctamente.',
'ACT ERR R' => 'Error durante la actualizacion de datos Rol.',
'ACT ERR U-R' => 'Error durante la actualizacion de Usuarios de Rol.',
'ACT ERR F-R' => 'Error durante la actualizacion de Funcionalidades de Rol.',

'ELI NO SR' => 'No se han seleccionado Rols para Eliminar.',
'ELI R OK' => 'Eliminacion de Rol realizada correctamente.',
'ELI ERR R' => 'Error durante la eliminacion de Rol.',

'CON ERR SR' => 'Error durante la consulta del Rol Seleccionado.',
'CON ERR R' => 'Error durante la consulta sobre Rol.', 
'CON ERR U-R' => 'Error durante la consulta de Usuarios de Rol.', 
'CON ERR F-R' => 'Error durante la consulta de Funcionalidades de Rol.', 

'Roles' => 'Roles',
'Nuevo Rol' => 'Nuevo Rol',
'Editar Rol' => 'Editar Rol',

'TIT TAB LIST R' => 'Lista de Roles',
'ROL_nombre' => 'Nombre',
'ROL_descripcion' => 'Descripcion',

'TIT ALT R' => 'Formulario de Alta de Rol',
'TIT ACT R' => 'Formulario de Modificación de Rol',
'TIT CON R' => 'Consulta de Roles',

'MSG U-R' => 'Usuarios Asignados',
'MSG F-R' => 'Funcionalidades Permitidas',

//-------------------------------------------------------------------------Permisos - Accesos
'ERR ACC' => 'No diposnes de permisos suficientes.',

'ERR PERMISOS' => 'Error en la BD, no se puede acceder a los permisos, por lo tanto has sido redirigido. Intentalo nuevamente.',
'ERR CON A' => 'Error al obtener la lista de Accesos.',
'ERR ALT A' => 'Debido a un error en el acceso a la BD, no se pudo registrar el Acceso a la pagina que intentabas acceder, por lo tanto has sido redirigido. Intentalo nuevamente.',

'Accesos' => 'Accesos',
'TIT TAB LIST A' => 'Ultimos Accesos',
'Fecha/Hora' => 'Fecha/Hora',
//-------------------------------------------------------------------------Errores
'SubdirectorioAnalizar' => 'Subdirectorio a analizar',
'NomPagTest' => 'Nombre Página',
'ProcesarErrores' => 'Procesar',
'TIT TEST' => 'Configuración de pruebas',
'PropiedadesPeticion' => 'Valores de POST/GET',
'ListaPaginasErrores' => 'Paginas a Testear',



//-------------------------------------------------------------------------Terminologia
'Aplicacion GESTAPP' => 'Aplicacion GESTAPP',
'LOGIN' => 'Inicia Sesion',
'MSG Bienvenida' => 'bienvenido a la aplicacion',
'Bienvenida' => 'Bienvenida',

'U' => 'Usuario',
'P' => 'Pagina',
'R' => 'Rol',
'F' => 'Funcionalidad',
'A' => 'Acceso',

'Estilos' => 'Estilos',
'Idiomas' => 'Idiomas',
'Bienvenido' => 'Bienvenido',
'Salir' => 'Salir',

'Aceptar' => 'Aceptar',
'Editar' => 'Editar',
'Elim Sel' => 'Elim Sel',
'Modificar' => 'Modificar',
////-------------------------------------------------------------------------Genericos
'FN' => 'Archivo',
'DATOS VACIOS' => 'Esta Vacio',
'ERR CAR' => 'Error de carga.',
'SOL PER' => 'No tienes ningun permiso de Administracion.',
'ERR CONECT BD' => 'Error al conectar con la BD.',
'ERR LENG' => 'Error en el cambio.',
'OK LENG' => 'Idioma cambiado a Castellano.',
'ERR EXIST' => 'Error en la comprobacion de existencia de clave repetida.',
'ErrDet' => 'Errores BD Detallados',
'ERR CON PERM F FILTRO' => 'Error obteniendo los permisos sobre las Funcionalidades, éstas non se mostraran en el filtro por seguridad.',
'ERR PER S' =>'Error con los permisos del directorio de subida.',
'ERR PER D' =>'Error con los permisos del directorio de subida.',
'EXPLICACION' => 'Para integrar una determinada pagina con la aplicación GESTAPP, simplemente añadir al principio esas dos lineas siendo:<br><br>-"$miPaginaPorDefecto" -> Pagina a la que se redigira el usuario en caso de no tener permisos.<br>En este ejemplo se usa "Login.php" que seria la pagina de login de su porpio sitio web, pero tambien puede usar una pagina de error estándar, etc...<br><br>-"GESTAPP/controlPages.php" -> Dirección RELATIVA al fichero que se usa para la integración.<br><br>En este ejemplo "MiPaginaSubir.php" se esta subiendo al directorio raiz del servidor apache, estando ubicada la aplicacion GESTAPP en una carpeta con el mismo nombre como se puede observar en la ruta relativa.',

/*

////////////////////////////////////

PIXEL

////////////////////////////////////

*/

'TestErrores' => 'Errores PHP',
'TestErrores2' => 'Errores Formulario',
'Aclaracion' => 'Url del JSON de los datos de las pruebas',
'Enviar' => 'Enviar',
'Resultados parciales:' => 'Resultados parciales:',
'Resultados totales:' => 'Resultados totales:',
'Resultados totales:' => 'Resultados totales:',
'Estadísticas:' => 'Estadísticas:',
'Total tests incorrectos:' => 'Total tests incorrectos:',
'Total tests:' => 'Total tests:',
'Total campos erróneos:' => 'Total campos erróneos:',
'Total campos:' => 'Total campos:',
'Total formularios erróneos:' => 'Total formularios erróneos:',
'Total formularios:' => 'Total formularios:',
'Total páginas erróneas:' => 'Total páginas erróneas:',
'Total páginas:' => 'Total páginas:',
'Tabla resultados:' => 'Tabla resultados:',
'Errores:' => 'Errores:',
'Tests' => 'Tests',
'Resultados' => "Resultados",










'Barra_Titulo' => 'Pixel',





//Nombres de Pagina PagName[ID]
'PagNameH' => 'Home',
'PagNameM' => 'Miembros',
'PagNameP' => 'Prensa',
'PagNameT' => 'Transferencia',
'PagNameC' => 'Colaboraciones',
'PagNameL' => 'Login',
'PagNameHP' => 'Home',
'PagNameMP' => 'Miembros',
'PagNameAMP' => 'Alta Miembros',
'PagNameMMP' => 'Modificar Miembro',
'PagNamePP' => 'Prensa',
'PagNameAPP' => 'Alta Noticia',
'PagNameMPP' => 'Modificar Noticia',
'PagNameTP' => 'Transferencia',
'PagNameDC' => 'Docencia',
'PagNameADC' => 'Alta Docencia',
'PagNameMDC' => 'Modificar Docencia',
'PagNameATP' => 'Alta Transferencia',
'PagNameMTP' => 'Modificar Transferencia',
'PagNameCP' => 'Colaboraciones',
'PagNameACP' => 'Alta Colaboraciones',
'PagNameMCP' => 'Modificar Colaboraciones',
'PagNameG' => 'GESTAPP',
'PagNameERRORPERM' => '¡Lo Sentimos!',

//Resto de terminología
'Otros' => 'Otros',
'Cancelar'=>'Cancelar',
'Intranet' => 'Intranet',
'Login' => 'Login',
'LogOUT' => 'LogOUT',
'Configuracion' => 'Configuracion',
'Idioma' => 'Idioma',
'Grupo' => 'Grupo',
'Enlace' => 'Enlace',
'CON ERR MIEMBROS' => 'Error en la obtencion de los miembros',
'CON ERR NOTICIAS' => 'Error en la obtencion de las noticias',
'Alta_Miembro' => 'Alta Miembro',
'Alta_Prensa' => 'Alta Noticia',
'Elim_Sel' => 'Eliminar Seleccionados',

//Alta Miembro- Mod Miembro
'MA-Login' => 'Login',
'MA-Pass' => 'Contraseña',
'MA-USU_nombre' => 'Nombre de Usuario',
'MA-USU_apellido' => ' Apellido',
'MA-USU_email' => 'Correo Electronico',
'MA-USU_fecha_alta' => 'Fecha de Alta',
'MA-Web_Usuario' => 'Web Personal',
'MA-Departamento_Usuario' => 'Departamento',
'MA-Descripcion_Usuario' => 'Descripcion o Biografía',
'MA-Telefono_Usuario' => 'Telefono',
'MA-Movil_Usuario' => 'Telefono Movil',

//Alta Prensa- Mod Prensa
'MP-Titulo_Noticia' => 'Titulo Noticia',
'MP-Fecha_Noticia' => 'Fecha de la Noticia',
'MP-Web_Noticia' => 'WEB de origen o Fuente',
'MP-IDPDF_Noticia' => ' ID PDF',
'MP-Publicador_Noticia' => 'Miembro Publicador',

//COLABORACIONES

'MP-IDEmpresa'=>"Identificador",
	 'MP-Web_Empresa'=>"Sito Web",
	 'MP-Nombre_Empresa'=>"Nombre Corporativo",
	 'MP-IDImagen_Empresa'=>"Imagen",
	 'MP-IDParticipante'=>"Identificador",

	 'MP-IDGrupo'=>"Nombre Grupo",
	 
	 'MP-Nombre_Grupo'=>"Nombre Grupo",
	 'MP-Web_Grupo'=>"Sito Web",
	 'MP-IDImagen_Grupo'=>"Imagen Grupo",
	 'MP-IDParticipante'=>"Identificador",
	 'MP-IDParticipante'=>"Identificador",


	 'MP-IDInstitucion'=>"Identificador",
	 'MP-Web_Institucion'=>"Sito Web",
	 'MP-IDImagen_Institucion'=>"Imagen Institucion",
	 'MP-Nombre_Institucion'=>"Nombre Institucion",
	 'MP-IDParticipante'=>"Identificador",
	
	"Empresa" => "Empresa",
	"Institucion" => "Institucion",
	"Grupo" => "Grupo",
	
'Alta_INST' => "Añadir Institucion",
'Alta_EMPRE' => "Añadir Empresa",
'Alta_GRUPO' => "Añadir Grupo",

'ID Part REP' =>"El ID de participante ya existe",
'ID CONCRETO REPETIDO C' => "El ID de Empresa/Institucion o Grupo ya Existe",
'OBTENCION C' => 'Error Ocurrido en la base de datos obteniendo los datos',
//Transferencias

'MP-Nombre_Patente' => 'Nombre para la Patente',
'MP-IDPatente'=> 'Identificador',
'MP-Fecha_Patente' => 'Fecha de Creacion',
'MP-Nombre_Proyecto'=> 'Nombre del Proyecto',
'MP-Descripcion_Proyecto' => 'Decripcion del Proyecto',
'MP-IDProyecto'=> 'Identificador',
'MP-Nombre_Contrato'=> 'Nombre para el Contrato',
'MP-IDContrato'=> 'Identificador',
'MP-FechaIni_Contrato'=> 'Fecha de Inicio',
'MP-FechaFin_Contrato'=> 'Fecha de Fin',
'MP-IDEmpresa'=> 'Empresa Asociada',


'Alta_PA' => "Nueva Patente",
'Descripcion' => "Descripcion",
'Alta_PO' => "Nuevo Proyecto",
'Alta_CO' => "Nuevo Contrato", 
"Patente" => "Patente",
	"Proyecto" => "Proyecto",
	"Contrato" => "Contrato",
	"Inicio" => "Inicio",
	"Fin" => "Fin",
	"Duracion" => "Duracion",
	'ID CONCRETO REPETIDO T' => "El ID de Proyecto/Patente o Contrato ya Existe",
	'OBTENCION T' => 'Error Ocurrido en la base de datos obteniendo los datos',
	
//Docencia

'Alta_DC' => "Nueva Docencia",
'MP-IDMateria' => 'Materia',
'MP-Login' => 'Profesor',
'MP-FechaIni_Materia' => 'Fecha Inicio',
'MP-FechaFin_Materia' => 'Fecha Fin',

//Pagina HOME

'Globex' => 'Globex',
'Generación Lógica Opeativa para Bases de Empresas X' => 'Generación Lógica Opeativa para Bases de Empresas X',
'Ourense' =>'Ourense',
'Somos' => 'Somos',
'Ubicados en' => 'Ubicados en',
'Escuela Superior de Ingienería Informática' => 'Escuela Superior de Ingienería Informática',
'Nuestro equipo' => 'Nuestro equipo',
'Alumnos' => 'Alumnos',
'UVIGO' => 'Universidad de Vigo',
'Diez años desarrollando sistemas informáticos' => 'Diez años desarrollando sistemas informáticos',

'Desarrolo Web' => 'Desarrolo Web',
'Diseño de interface' => 'Diseño de interface',
'Interacción' => 'Interacción',
'Experiencia de usuario' => 'Experiencia de usuario',

'Texto 1' => 'Desarrollo web es un término amplio que define la creación de sitios web para Internet o una intranet.',
'Texto 2' => 'Diseño de computadoras, aplicaciones, máquinas, dispositivos de comunicación móvil, aplicaciones de software, y sitios web enfocado en la experiencia de usuario y la interacción.',
'Texto 3' =>  'La interacción es una acción recíproca entre dos o más objetos, sustancias, personas o agentes.',
'Texto 4' => 'Conjunto de factores y elementos relativos a la interacción del usuario, con un entorno o dispositivo concretos, cuyo resultado es la generación de una percepción positiva o negativa de dicho servicio, producto o dispositivo.',

'Trabajos recientes' => 'Trabajos recientes',
'Trabajo 1' => 'Diseño de aplicaciones móviles',
'Trabajo 2' => 'Diseño hardware especializado',
'Trabajo 3' => 'Desarrolo de software para transporte',
'Trabajo 4' => 'Diseño de PowerPoints de gatitos',

//Textos Home

'Texto Principal' => 'La informática es una ciencia que estudia métodos, técnicas, procesos, con el fin de almacenar, procesar y transmitir información y datos en formato digital. Se define como la rama de la tecnología que estudia el tratamiento automático de la información.',

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

'Nuestras Oficinas' => 'Nuestras Oficinas',
'Enlaces de interes' => 'Enlaces de interes',
'Contactanos' => 'Contactanos',
'Noticias Recientes' => 'Noticias Recientes',
'Ultimas publicaciones' => ' Ultimas publicaciones',
'Carrera' => 'Carrera',
'Politica de privacidad' => 'Politica de privacidad',
'Terminos y Condiciones' => 'Terminos y Condiciones',
'Ultimos eventos' => 'Ultimos eventos'

);
?>
