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
//'El campo Login no puede contener espacios' => 'El campo <i> Login </i> no puede contener espacios.',
//'El campo Pass esta vacio' => 'El campo <i> Pass </i> esta vacio.',
//'El campo Login esta vacio' => 'El campo <i> Login </i> esta vacio.',

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
//'El campo Login no puede contener espacios' => 'El campo <i> Login </i> no puede contener espacios.',
//'El campo Pass esta vacio' => 'El campo <i> Pass </i> esta vacio.',
//'El campo Login esta vacio' => 'El campo <i> Login </i> esta vacio.',

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
'EXPLICACION' => 'To use a Page with GESTAPP, you must add theese lines to your page on top code:<br><br>-"$miPaginaPorDefecto" -> Users without permission will be redirect to this page.<br>In this example, te redirect page is a your own WebSite Login, but you can especify a standar error page, etc...<br><br>-"GESTAPP/controlPages.php" -> RELATIVE path to integrate file GESTAPP.<br><br>In this example "MyUploadPage.php" will be upload to root apache directory, GESTAPP Application is located in a GESTAPP directory y root apache directory too. The "include" path is relative how you can see.'
)
?>
