-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-12-2015 a las 13:22:21
-- Versión del servidor: 5.5.44-0+deb8u1
-- Versión de PHP: 5.6.13-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;



DROP DATABASE IF EXISTS `gp4bd`; 
DROP DATABASE IF EXISTS `ET3gC`;
--
-- Base de datos: `ET3gC`
--
CREATE DATABASE IF NOT EXISTS `ET3gC` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `ET3gC`;

-- --------------------------------------------------------

/* CREAMOS EL USUARIO CON PERMISOS PARA ESA BASE DE DATOS*/
GRANT USAGE ON *.* TO 'gC'@'localhost' IDENTIFIED BY 'gC'; 
drop user gC@'localhost';
CREATE USER 'gC'@'localhost' IDENTIFIED BY 'gC';
GRANT USAGE ON *.* TO 'gC'@'localhost' IDENTIFIED BY 'gC' 
WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `ET3gC`.* TO 'gC'@'localhost'WITH GRANT OPTION;

--
-- Estructura de tabla para la tabla `FUNCIONALIDADES`
--

DROP TABLE IF EXISTS `FUNCIONALIDADES`;
CREATE TABLE IF NOT EXISTS `FUNCIONALIDADES` (
  `FUN_nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `FUN_descripcion` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `FUNCIONALIDADES`
--

INSERT INTO `FUNCIONALIDADES` (`FUN_nombre`, `FUN_descripcion`) VALUES
('Acceso Gestapp (G)', 'Acceso a la aplicacion GESTAPP'),
('Acceso Total (G)', 'Todos los permisos sobre las distintas funcionalidades Gestapp.'),
('Alta Funcionalidades (G)', 'Agregar una nueva Funcionalidad'),
('Alta Paginas (G)', 'Añadir Pagina Nueva'),
('Alta Roles (G)', 'Agregar nuevos Roles al Sistema'),
('Alta Usuarios (G)', 'Agregar Nuevos Usuarios al Sistema'),
('Baja Funcionalidades (G)', 'Eliminar Funcionalidades'),
('Baja Paginas (G)', 'Eliminar Pagina'),
('Baja Roles (G)', 'Eliminar Roles del Sistema'),
('Baja Usuarios (G)', 'Eliminar Usuarios del Sistema'),
('Cons Funcionalidades (G)', 'Consultar Funcionalidades'),
('Cons Paginas (G)', 'Consultar las Paginas del sistema'),
('Cons Roles (G)', 'Consultar Roles registrados en el Sistema'),
('Cons Usuarios (G)', 'Ver los Usuarios del Sistema'),
('Control Acceso (G)', 'Consultar LOG de acceso a Paginas Administración'),
('Gestion Funcionalidades (G)', 'Gestionar Usuarios del sistema (Web y Gestapp)'),
('Gestion Paginas (G)', 'Gestionar Usuarios del sistema (Web y Gestapp)'),
('Gestion Roles (G)', 'Gestionar Usuarios del sistema (Web y Gestapp)'),
('Gestion Usuarios (G)', 'Gestionar Usuarios del sistema (Web y Gestapp)'),
('Mod Funcionalidades (G)', 'Modificar los datos de Funcionalidades'),
('Mod Paginas (G)', 'Modificar datos de Paginas'),
('Mod Roles (G)', 'Modificar datos de los Roles'),
('Mod Usuarios (G)', 'Modificar los Datos de los Usuarios'),
('Solo ConsMod (G)', 'Consulta y Modificacion de datos, sin permisos de Alta o Borrado.'),
('Solo Consulta (G)', 'Consulta sobre los datos'),

('Testeo', 'Realizacion de test sobre las paginas'),



('Administrar PIXEL', 'Todo Pixel'),
('Usar PIXEL', 'Funcionalidad que tendran los miembros de PIXEL que no sean adminsitradores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HACE_DE`
--

DROP TABLE IF EXISTS `HACE_DE`;
CREATE TABLE IF NOT EXISTS `HACE_DE` (
  `Login` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `ROL_nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `HACE_DE`
--

INSERT INTO `HACE_DE` (`Login`, `ROL_nombre`) VALUES
('admin', 'Administrador (G)'),
('test', 'Tester (G)'),

('adpix', 'Admin PIXEL'),
('adpix', 'Administrador (G)'),
('guille', 'Miembro PIXEL'),
('luis', 'Miembro PIXEL'),
('samu', 'Miembro PIXEL'),
('yvan', 'Miembro PIXEL'),
('pabloh', 'Miembro PIXEL'),
('pablog', 'Miembro PIXEL'),
('fran', 'Miembro PIXEL');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `IMPLEMENTADA_EN`
--

DROP TABLE IF EXISTS `IMPLEMENTADA_EN`;
CREATE TABLE IF NOT EXISTS `IMPLEMENTADA_EN` (
  `FUN_nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `PAG_nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `IMPLEMENTADA_EN`
--

INSERT INTO `IMPLEMENTADA_EN` (`FUN_nombre`, `PAG_nombre`) VALUES
('Acceso Total (G)', 'Borrado Funcionalidades (G)'),
('Baja Funcionalidades (G)', 'Borrado Funcionalidades (G)'),
('Gestion Funcionalidades (G)', 'Borrado Funcionalidades (G)'),
('Acceso Total (G)', 'Borrado Paginas (G)'),
('Baja Paginas (G)', 'Borrado Paginas (G)'),
('Gestion Paginas (G)', 'Borrado Paginas (G)'),
('Acceso Total (G)', 'Borrado Roles (G)'),
('Baja Roles (G)', 'Borrado Roles (G)'),
('Gestion Roles (G)', 'Borrado Roles (G)'),
('Acceso Total (G)', 'Borrado Usuarios (G)'),
('Baja Usuarios (G)', 'Borrado Usuarios (G)'),
('Gestion Usuarios (G)', 'Borrado Usuarios (G)'),
('Acceso Total (G)', 'Form Alta Funcionalidad (G)'),
('Alta Funcionalidades (G)', 'Form Alta Funcionalidad (G)'),
('Gestion Funcionalidades (G)', 'Form Alta Funcionalidad (G)'),
('Acceso Total (G)', 'Form Alta Pagina (G)'),
('Alta Paginas (G)', 'Form Alta Pagina (G)'),
('Gestion Paginas (G)', 'Form Alta Pagina (G)'),
('Acceso Total (G)', 'Form Alta Rol (G)'),
('Alta Roles (G)', 'Form Alta Rol (G)'),
('Gestion Roles (G)', 'Form Alta Rol (G)'),
('Acceso Total (G)', 'Form Alta Usuario (G)'),
('Alta Usuarios (G)', 'Form Alta Usuario (G)'),
('Gestion Usuarios (G)', 'Form Alta Usuario (G)'),
('Acceso Total (G)', 'Form Mod Funcionalidad (G)'),
('Gestion Funcionalidades (G)', 'Form Mod Funcionalidad (G)'),
('Mod Funcionalidades (G)', 'Form Mod Funcionalidad (G)'),
('Solo ConsMod (G)', 'Form Mod Funcionalidad (G)'),
('Acceso Total (G)', 'Form Mod Pagina (G)'),
('Gestion Paginas (G)', 'Form Mod Pagina (G)'),
('Mod Paginas (G)', 'Form Mod Pagina (G)'),
('Solo ConsMod (G)', 'Form Mod Pagina (G)'),
('Acceso Total (G)', 'Form Mod Rol (G)'),
('Gestion Roles (G)', 'Form Mod Rol (G)'),
('Mod Roles (G)', 'Form Mod Rol (G)'),
('Solo ConsMod (G)', 'Form Mod Rol (G)'),
('Acceso Total (G)', 'Form Mod Usuario (G)'),
('Gestion Usuarios (G)', 'Form Mod Usuario (G)'),
('Mod Usuarios (G)', 'Form Mod Usuario (G)'),
('Solo ConsMod (G)', 'Form Mod Usuario (G)'),
('Acceso Gestapp (G)', 'Principal GESTAPP (G)'),
('Acceso Total (G)', 'Principal GESTAPP (G)'),
('Acceso Total (G)', 'Vista Accesos (G)'),
('Acceso Total (G)', 'Vista Funcionalidades (G)'),
('Cons Funcionalidades (G)', 'Vista Funcionalidades (G)'),
('Gestion Funcionalidades (G)', 'Vista Funcionalidades (G)'),
('Solo ConsMod (G)', 'Vista Funcionalidades (G)'),
('Solo Consulta (G)', 'Vista Funcionalidades (G)'),
('Acceso Total (G)', 'Vista Paginas (G)'),
('Cons Paginas (G)', 'Vista Paginas (G)'),
('Gestion Paginas (G)', 'Vista Paginas (G)'),
('Solo ConsMod (G)', 'Vista Paginas (G)'),
('Solo Consulta (G)', 'Vista Paginas (G)'),
('Acceso Total (G)', 'Vista Roles (G)'),
('Cons Roles (G)', 'Vista Roles (G)'),
('Gestion Roles (G)', 'Vista Roles (G)'),
('Solo ConsMod (G)', 'Vista Roles (G)'),
('Solo Consulta (G)', 'Vista Roles (G)'),
('Acceso Total (G)', 'Vista Usuarios (G)'),
('Cons Usuarios (G)', 'Vista Usuarios (G)'),
('Gestion Usuarios (G)', 'Vista Usuarios (G)'),
('Solo ConsMod (G)', 'Vista Usuarios (G)'),
('Solo Consulta (G)', 'Vista Usuarios (G)'),

('Testeo', 'Comprobacion Errores'),
('Testeo', 'Comprobacion Errores Form'),

('Administrar PIXEL', 'Home Pixel'),
('Administrar PIXEL', 'Miembros Pixel'),
('Administrar PIXEL', 'Alta Miembros Pixel'),
('Administrar PIXEL', 'Mod Miembros Pixel'),
('Administrar PIXEL', 'Prensa Pixel'),
('Administrar PIXEL', 'Alta Prensa Pixel'),
('Administrar PIXEL', 'Mod Prensa Pixel'),
('Administrar PIXEL', 'Transferencias Pixel'),
('Administrar PIXEL', 'Alta Transferencias Pixel'),
('Administrar PIXEL', 'Mod Transferencias Pixel'),
('Administrar PIXEL', 'Colaboraciones Pixel'),
('Administrar PIXEL', 'Alta Colaboraciones Pixel'),
('Administrar PIXEL', 'Mod Colaboraciones Pixel'),
('Administrar PIXEL', 'Docencia Pixel'),
('Administrar PIXEL', 'Alta Docencia Pixel'),
('Administrar PIXEL', 'Mod Docencia Pixel'),
('Administrar PIXEL', 'Publicaciones Pixel'),
('Administrar PIXEL', 'Alta Publicaciones Pixel'),
('Administrar PIXEL', 'Mod Publicaciones Pixel'),
('Administrar PIXEL', 'Actividades Pixel'),
('Administrar PIXEL', 'Alta Actividades Pixel'),
('Administrar PIXEL', 'Mod Actividades Pixel'),

('Usar PIXEL', 'Home Pixel'),
('Usar PIXEL', 'Miembros Pixel'),
('Usar PIXEL', 'Mod Miembros Pixel'),
('Usar PIXEL', 'Prensa Pixel'),
('Usar PIXEL', 'Transferencias Pixel'),
('Usar PIXEL', 'Colaboraciones Pixel'),
('Usar PIXEL', 'Docencia Pixel'),
('Usar PIXEL', 'Alta Docencia Pixel'),
('Usar PIXEL', 'Mod Docencia Pixel'),
('Usar PIXEL', 'Publicaciones Pixel'),
('Usar PIXEL', 'Alta Publicaciones Pixel'),
('Usar PIXEL', 'Mod Publicaciones Pixel'),
('Usar PIXEL', 'Actividades Pixel'),
('Usar PIXEL', 'Alta Actividades Pixel'),
('Usar PIXEL', 'Mod Actividades Pixel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PAGINAS`
--

DROP TABLE IF EXISTS `PAGINAS`;
CREATE TABLE IF NOT EXISTS `PAGINAS` (
  `PAG_nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `PAG_ubicacion` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `PAG_descripcion` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `PAGINAS`
--

INSERT INTO `PAGINAS` (`PAG_nombre`, `PAG_ubicacion`, `PAG_descripcion`) VALUES
('Borrado Funcionalidades (G)', 'DelFuncionalidades.php', 'Pagina PHQ con funciones de borrado de Funcionalidadesde la BD'),
('Borrado Paginas (G)', 'DelPaginas.php', 'Pagina PHQ con funciones de borrado de Paginas de la BD'),
('Borrado Roles (G)', 'DelRoles.php', 'Pagina PHQ con funciones de borrado de Rolesde la BD'),
('Borrado Usuarios (G)', 'DelUsuarios.php', 'Pagina PHQ con funciones de borrado de Usuariosde la BD'),
('Form Alta Funcionalidad (G)', 'AltaFuncionalidades.php', 'Página Formulario de inserccion de Funcionalidad'),
('Form Alta Pagina (G)', 'AltaPaginas.php', 'Página Formulario de inserccion de Pagina'),
('Form Alta Rol (G)', 'AltaRoles.php', 'Página Formulario de inserccion de Rol '),
('Form Alta Usuario (G)', 'AltaUsuarios.php', 'Página Formulario de inserccion de Usuario '),
('Form Mod Funcionalidad (G)', 'ModFuncionalidades.php', 'Página Formulario de modificacion de Funcionalidad (G)'),
('Form Mod Pagina (G)', 'ModPaginas.php', 'Página Formulario de modificacion de Pagina'),
('Form Mod Rol (G)', 'ModRoles.php', 'Página Formulario de modificacion de Rol'),
('Form Mod Usuario (G)', 'ModUsuarios.php', 'Página Formulario de modificacion de Usuario'),
('Principal GESTAPP (G)', 'Principal.php', 'Aplicacion GESTAPP'),
('Vista Accesos (G)', 'Accesos.php', 'Consultar Registro de Actividad'),
('Vista Funcionalidades (G)', 'ConsFuncionalidades.php', 'Consultar Funcionalidades'),
('Vista Paginas (G)', 'ConsPaginas.php', 'Consultar Paginas'),
('Vista Roles (G)', 'ConsRoles.php', 'Consultar Roles'),
('Vista Usuarios (G)', 'ConsUsuarios.php', 'Consultar Usuarios'),
('Comprobacion Errores', 'testErrores.php', 'Pagina de realizacion de test'),
('Comprobacion Errores Form', 'testErrores2.php', 'Pagina de realizacion de test'),

('Home Pixel', 'C_HomeP.php', 'Pagina Principal'),
('Miembros Pixel', 'C_MiembrosP.php', 'Miembros Funcionalidad'),
('Alta Miembros Pixel', 'C_AltaMiembrosP.php', 'Miembros Funcionalidad'),
('Mod Miembros Pixel', 'C_ModMiembrosP.php', 'Miembros Funcionalidad'),
('Prensa Pixel', 'C_PrensaP.php', 'Consultar Prensa'),
('Alta Prensa Pixel', 'C_AltaPrensaP.php', 'Prensa Funcionalidad'),
('Mod Prensa Pixel', 'C_ModPrensaP.php', 'Prensa Funcionalidad'),
('Transferencias Pixel', 'C_TransferenciaP.php', 'Consultar Transferencias'),
('Alta Transferencias Pixel', 'C_AltaTransferenciasP.php', 'Transferencias Funcionalidad'),
('Mod Transferencias Pixel', 'C_ModTransferenciasP.php', 'Transferencias Funcionalidad'),
('Colaboraciones Pixel', 'C_ColaboracionesP.php', 'Consultar Colaboraciones'),
('Alta Colaboraciones Pixel', 'C_AltaColaboracionesP.php', 'Colaboraciones Funcionalidad'),
('Mod Colaboraciones Pixel', 'C_ModColaboracionesP.php', 'Colaboraciones Funcionalidad'),
('Docencia Pixel', 'C_DocenciaP.php', 'Consultar Docencia'),
('Alta Docencia Pixel', 'C_AltaDocenciaP.php', 'Docencia Funcionalidad'),
('Mod Docencia Pixel', 'C_ModDocenciaP.php', 'Docencia Funcionalidad'),
('Publicaciones Pixel', 'C_PublicacionesP.php', 'Consultar Publicaciones'),
('Alta Publicaciones Pixel', 'C_AltaPublicacionesP.php', 'Publicaciones Funcionalidad'),
('Mod Publicaciones Pixel', 'C_ModPublicacionesP.php', 'Publicaciones Funcionalidad'),
('Actividades Pixel', 'C_ActividadesP.php', 'Consultar Actividades'),
('Alta Actividades Pixel', 'C_AltaActividadesP.php', 'Actividades Funcionalidad'),
('Mod Actividades Pixel', 'C_ModActividadesP.php', 'Actividades Funcionalidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PERMITE`
--

DROP TABLE IF EXISTS `PERMITE`;
CREATE TABLE IF NOT EXISTS `PERMITE` (
  `ROL_nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `FUN_nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `PERMITE`
--

INSERT INTO `PERMITE` (`ROL_nombre`, `FUN_nombre`) VALUES
('Administrador (G)', 'Acceso Total (G)'),
('Administrador (G)', 'Testeo'),

('Tester (G)', 'Acceso Total (G)'),
('Tester (G)', 'Administrar PIXEL'),
('Tester (G)', 'Testeo'),

('Admin PIXEL', 'Administrar PIXEL'),

('Miembro PIXEL', 'Usar PIXEL');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ROLES`
--

DROP TABLE IF EXISTS `ROLES`;
CREATE TABLE IF NOT EXISTS `ROLES` (
  `ROL_nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `ROL_descripcion` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ROLES`
--

INSERT INTO `ROLES` (`ROL_nombre`, `ROL_descripcion`) VALUES
('Administrador (G)', 'Principal función Administrativa'),

('Tester (G)', 'AccesoCompleto'),
('Admin PIXEL', 'Acceso de administrador para Pixel'),
('Miembro PIXEL', 'Acceso de administrador para Pixel');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `S_LIBROS`
--

DROP TABLE IF EXISTS `S_LIBROS`;
CREATE TABLE IF NOT EXISTS `S_LIBROS` (
  `Titulo_Libro` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `ISBN` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `Fecha_Libro` date NOT NULL,
  `Pais_Libro` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `S_ARTICULO`
--

DROP TABLE IF EXISTS `S_ARTICULO`;
CREATE TABLE IF NOT EXISTS `S_ARTICULO` (
  `ISSN_Revista` char(9) COLLATE latin1_spanish_ci NOT NULL,
  `Nombre_Revista` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `Titulo_Articulo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `Anotaciones_Articulo` text COLLATE latin1_spanish_ci,
  `IDArticulo` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `Fecha_Articulo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `S_CONFERENCIAS`
--

DROP TABLE IF EXISTS `S_CONFERENCIAS`;
CREATE TABLE IF NOT EXISTS `S_CONFERENCIAS` (
  `Nombre_Conferencia` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `Charla_Conferencia` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `Fecha_Conferencia` date NOT NULL,
  `IDConferencia` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `S_ASIGNADO`
--

DROP TABLE IF EXISTS `S_ASIGNADO`;
CREATE TABLE IF NOT EXISTS `S_ASIGNADO` (
  `IDProyecto` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `IDParticipante` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `S_AYUDANTES`
--

DROP TABLE IF EXISTS `S_AYUDANTES`;
CREATE TABLE IF NOT EXISTS `S_AYUDANTES` (
  `DNI_Ayudante` char(9) COLLATE latin1_spanish_ci NOT NULL,
  `Nombre_Ayudante` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `Apellidos_Ayudante` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `IDParticipante` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `Mail_Ayudante` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Web_Ayudante` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Departamento` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `IDImagen_Ayudante` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------



--
-- Estructura de tabla para la tabla `S_CONTRATO`
--

DROP TABLE IF EXISTS `S_CONTRATO`;
CREATE TABLE IF NOT EXISTS `S_CONTRATO` (
  `Nombre_Contrato` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `IDContrato` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `FechaIni_Contrato` date NOT NULL,
  `FechaFin_Contrato` date NOT NULL,
  `IDEmpresa` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO `S_CONTRATO` (`Nombre_Contrato`, `IDContrato`, `FechaIni_Contrato`, `FechaFin_Contrato`, `IDEmpresa`) VALUES
('Nombre 1', 'C1',"1992-1-19", "1992-1-20","3");
INSERT INTO `S_CONTRATO` (`Nombre_Contrato`, `IDContrato`, `FechaIni_Contrato`, `FechaFin_Contrato`, `IDEmpresa`) VALUES
('Nombre 2', 'C2',"1992-1-20", "1992-1-21","1");

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `S_EMPRESAS`
--

DROP TABLE IF EXISTS `S_EMPRESAS`;
CREATE TABLE IF NOT EXISTS `S_EMPRESAS` (
  `IDEmpresa` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `Web_Empresa` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `Nombre_Empresa` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `IDImagen_Empresa` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `IDParticipante` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO `S_EMPRESAS` (`IDEmpresa`, `Web_Empresa`, `Nombre_Empresa`, `IDImagen_Empresa`, `IDParticipante`) VALUES
('Empresa1', 'http://www.marca.com/',"INSA S. L.", "imagen2.jpg","1E");
INSERT INTO `S_EMPRESAS` (`IDEmpresa`, `Web_Empresa`, `Nombre_Empresa`, `IDImagen_Empresa`, `IDParticipante`) VALUES
('Empresa2', 'http://www.marca.com/',"INSA S. L. 2", "imagen2.jpg","2E");
INSERT INTO `S_EMPRESAS` (`IDEmpresa`, `Web_Empresa`, `Nombre_Empresa`, `IDImagen_Empresa`, `IDParticipante`) VALUES
('Empresa3', 'http://www.marca.com/',"INSA S. L. 3", "imagen2.jpg","3E");
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `S_GRUPOS`
--

DROP TABLE IF EXISTS `S_GRUPOS`;
CREATE TABLE IF NOT EXISTS `S_GRUPOS` (
  `IDGrupo` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `Web_Grupo` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  `IDImagen_Grupo` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `Nombre_Grupo` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `IDParticipante` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO `S_GRUPOS` (`IDGrupo`, `Web_Grupo`, `IDImagen_Grupo`, `Nombre_Grupo`, `IDParticipante`) VALUES
('Grupo1', 'http://sing.ei.uvigo.es', "imagen3.jpg","SING","1G");
INSERT INTO `S_GRUPOS` (`IDGrupo`, `Web_Grupo`, `IDImagen_Grupo`, `Nombre_Grupo`, `IDParticipante`) VALUES
('Grupo2', 'http://sing.ei.uvigo.es', "imagen3.jpg","SING2","2G");
INSERT INTO `S_GRUPOS` (`IDGrupo`, `Web_Grupo`, `IDImagen_Grupo`, `Nombre_Grupo`, `IDParticipante`) VALUES
('Grupo3', 'http://sing.ei.uvigo.es', "imagen3.jpg","SING3","3G");
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `S_INSTITUCIONES`
--

DROP TABLE IF EXISTS `S_INSTITUCIONES`;
CREATE TABLE IF NOT EXISTS `S_INSTITUCIONES` (
  `IDInstitucion` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `Web_Institucion` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  `IDImagen_Institucion` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `Nombre_Institucion` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `IDParticipante` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


INSERT INTO `S_INSTITUCIONES` (`IDInstitucion`, `Web_Institucion`, `IDImagen_Institucion`, `Nombre_Institucion`, `IDParticipante`) VALUES
('Institucion1', 'http://www.marca.com/', "imagen.jpg","CNI","1");
INSERT INTO `S_INSTITUCIONES` (`IDInstitucion`, `Web_Institucion`, `IDImagen_Institucion`, `Nombre_Institucion`, `IDParticipante`) VALUES
('Institucion2', 'http://www.marca.com/', "imagen.jpg","CNI2","2I");
INSERT INTO `S_INSTITUCIONES` (`IDInstitucion`, `Web_Institucion`, `IDImagen_Institucion`, `Nombre_Institucion`, `IDParticipante`) VALUES
('Institucion3', 'http://www.marca.com/', "imagen.jpg","CNI3","3I");


-- --------------------------------------------------------



--
-- Estructura de tabla para la tabla `S_MATERIAS`
--

DROP TABLE IF EXISTS `S_MATERIAS`;
CREATE TABLE IF NOT EXISTS `S_MATERIAS` (
  `Nombre_Materia` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `IDMateria` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `S_NOTICIAS`
--

DROP TABLE IF EXISTS `S_NOTICIAS`;
CREATE TABLE IF NOT EXISTS `S_NOTICIAS` (
  `Titulo_Noticia` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `Fecha_Noticia` date NOT NULL,
  `Web_Noticia` varchar(300) COLLATE latin1_spanish_ci DEFAULT NULL,
  `IDPDF_Noticia` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Publicador_Noticia` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `S_NOTICIAS`
--

INSERT INTO `S_NOTICIAS` (`Titulo_Noticia`, `Fecha_Noticia`, `Web_Noticia`, `IDPDF_Noticia`, `Publicador_Noticia`) VALUES
('Madrid: Suspenso General', '2015-12-15', 'http://www.marca.com/futbol/real-madrid/2015/12/15/566ffad9e2704e8f758b467e.html',NULL,NULL),
('La Muerte, herida leve con su propia guadana en un accidente laboral', '2015-12-15', 'http://www.elmundotoday.com/2015/12/la-muerte-herida-leve-con-su-propia-guadana-en-un-accidente-laboral/',NULL,NULL),
('Nos colamos en la casa de Donatello de Las Tortugas Ninja', '2015-12-15', 'http://www.elmundotoday.com/2015/12/nos-colamos-en-la-casa-de-donatello-de-las-tortugas-ninja/',NULL,NULL),
('El cajon de los cables ya ocupa una habitacion entera en el 68,7% de los hogares espanoles', '2015-12-15', 'http://www.elmundotoday.com/2015/12/el-cajon-de-los-cables-ya-ocupa-una-habitacion-entera-en-el-687-de-los-hogares-espanoles/',NULL,NULL);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `S_OFRECE`
--

DROP TABLE IF EXISTS `S_OFRECE`;
CREATE TABLE IF NOT EXISTS `S_OFRECE` (
  `IDProyecto` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `IDInstitucion` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `S_PARTICIPANTES`
--

DROP TABLE IF EXISTS `S_PARTICIPANTES`;
CREATE TABLE IF NOT EXISTS `S_PARTICIPANTES` (
  `IDParticipantes` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `Tipo_Participante` enum('Empresa','Institucion','Grupo','') COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `S_PARTICIPANTES`
--

INSERT INTO `S_PARTICIPANTES` (`IDParticipantes`, `Tipo_Participante`) VALUES
('Empresa1', 'Empresa'),
('Empresa2', 'Empresa'),
('Empresa3', 'Empresa'),
('Grupo1', 'Grupo'),
('Grupo2', 'Grupo'),
('Grupo3', 'Grupo'),
('Institucion1', 'Institucion'),
('Institucion2', 'Institucion'),
('Institucion3', 'Institucion');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `S_PATENTE`
--

DROP TABLE IF EXISTS `S_PATENTE`;
CREATE TABLE IF NOT EXISTS `S_PATENTE` (
  `Nombre_Patente` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `IDPatente` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `Fecha_Patente` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO `S_PATENTE` (`Nombre_Patente`, `IDPatente`, `Fecha_Patente`) VALUES
('Nombre 1', 'P1',"1992-1-19");
INSERT INTO `S_PATENTE` (`Nombre_Patente`, `IDPatente`, `Fecha_Patente`) VALUES
('Nombre 2', 'P2',"1992-1-19");
INSERT INTO `S_PATENTE` (`Nombre_Patente`, `IDPatente`, `Fecha_Patente`) VALUES
('Nombre 3', 'P3',"1992-1-19");

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `S_PROYECTO`
--

DROP TABLE IF EXISTS `S_PROYECTO`;
CREATE TABLE IF NOT EXISTS `S_PROYECTO` (
  `Nombre_Proyecto` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `Descripcion_Proyecto` text COLLATE latin1_spanish_ci NOT NULL,
  `IDProyecto` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


INSERT INTO `S_PROYECTO` (`Nombre_Proyecto`, `Descripcion_Proyecto`, `IDProyecto`) VALUES
('Nombre 1', 'Proyecto para mejorar algo',"Po1");
INSERT INTO `S_PROYECTO` (`Nombre_Proyecto`, `Descripcion_Proyecto`, `IDProyecto`) VALUES
('Nombre 2', 'Proyecto para crear algo',"Po2");
INSERT INTO `S_PROYECTO` (`Nombre_Proyecto`, `Descripcion_Proyecto`, `IDProyecto`) VALUES
('Nombre 3', 'Proyecto para descubrir algo',"Po3");

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `S_CONFERENCIAS_ORG`
--

DROP TABLE IF EXISTS `S_CONFERENCIAS_ORG`;
CREATE TABLE IF NOT EXISTS `S_CONFERENCIAS_ORG` (
  `Titulo_Conferencia_Org` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `IDConferencia_Org` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `Fecha_Conferencia_Org` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `S_REVISTAS`
--

DROP TABLE IF EXISTS `S_REVISTAS`;
CREATE TABLE IF NOT EXISTS `S_REVISTAS` (
  `Titulo_Revista` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `ISSNOnline_Revista` char(9) COLLATE latin1_spanish_ci DEFAULT NULL,
  `ISSN_Revista` char(9) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Fecha_Revista` date NOT NULL,
  `IDRevista` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `S_TABLONEDITORIAL`
--

DROP TABLE IF EXISTS `S_TABLONEDITORIAL`;
CREATE TABLE IF NOT EXISTS `S_TABLONEDITORIAL` (
  `Titulo_Tablon` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `ISSNOnline_Tablon` char(9) COLLATE latin1_spanish_ci DEFAULT NULL,
  `ISSN_Tablon` char(9) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Fecha_Tablon` date NOT NULL,
  `IDTablon` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `S_USUARIO_ARTICULO`
--

DROP TABLE IF EXISTS `S_USUARIO_ARTICULO`;
CREATE TABLE IF NOT EXISTS `S_USUARIO_ARTICULO` (
  `IDArticulo` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `Login` varchar(25) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `S_USUARIO_CONFERENCIA`
--

DROP TABLE IF EXISTS `S_USUARIO_CONFERENCIA`;
CREATE TABLE IF NOT EXISTS `S_USUARIO_CONFERENCIA` (
  `IDConferencia` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `Login` varchar(25) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `S_USUARIO_LIBRO`
--

DROP TABLE IF EXISTS `S_USUARIO_LIBRO`;
CREATE TABLE IF NOT EXISTS `S_USUARIO_LIBRO` (
  `ISBN` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `Login` varchar(25) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `S_USUARIO_MATERIA`
--

DROP TABLE IF EXISTS `S_USUARIO_MATERIA`;
CREATE TABLE IF NOT EXISTS `S_USUARIO_MATERIA` (
  `IDMateria` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `Login` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `FechaIni_Materia` date NOT NULL,
  `FechaFin_Materia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TAMBIEN_ACCEDE`
--

DROP TABLE IF EXISTS `TAMBIEN_ACCEDE`;
CREATE TABLE IF NOT EXISTS `TAMBIEN_ACCEDE` (
  `Login` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `PAG_nombre` varchar(255) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIOS`
--

DROP TABLE IF EXISTS `USUARIOS`;
CREATE TABLE IF NOT EXISTS `USUARIOS` (
  `Login` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `Pass` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `USU_nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `USU_apellido` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `USU_email` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `USU_fecha_alta` date NOT NULL,
  `Web_Usuario` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Departamento_Usuario` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Descripcion_Usuario` text COLLATE latin1_spanish_ci,
  `Telefono_Usuario` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Movil_Usuario` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `USUARIOS`
--

INSERT INTO `USUARIOS` (`Login`, `Pass`, `USU_nombre`, `USU_apellido`, `USU_email`, `USU_fecha_alta`, `Web_Usuario`, `Departamento_Usuario`, `Descripcion_Usuario`, `Telefono_Usuario`, `Movil_Usuario`) VALUES
('admin', '12345678', 'GESTAPP', 'Gestor', 'admin@admin.com', '2015-10-16', '', NULL, NULL, NULL, NULL),
('test', '12345678', 'TEST', 'TESTUNIT', 'text@TCN.com', '2015-10-16', '', NULL, NULL, NULL, NULL),
('adpix', '12345678', 'ET3', 'Aministrador Grupo Investigacion', 'admin@pixel.com','2015-10-16','', NULL, NULL, NULL, NULL),
('fran', '12345678', 'Fran', 'Rojas Rodriguez', 'frrodriguez@esei.uvigo.es','2015-12-15','', NULL, NULL, NULL, NULL),
('guille', '12345678', 'Guillermo', 'Rojas Rodriguez', 'frrodriguez@esei.uvigo.es','2015-12-15','', NULL, NULL, NULL, NULL),
('yvan', '12345678', 'Yvan', 'Rojas Rodriguez', 'frrodriguez@esei.uvigo.es','2015-12-15','', NULL, NULL, NULL, NULL),
('pablog', '12345678', 'Pablo', 'Gonzalez Suarez', 'frrodriguez@esei.uvigo.es','2015-12-15','', NULL, NULL, NULL, NULL),
('pabloh', '12345678', 'Pablo', 'Rodriguez Hermida', 'frrodriguez@esei.uvigo.es','2015-12-15','', NULL, NULL, NULL, NULL),
('luis', '12345678', 'Luis', 'Raña Cortizo', 'frrodriguez@esei.uvigo.es','2015-12-15','', NULL, NULL, NULL, NULL),
('samu', '12345678', 'Samuel', 'Ramilo Conde', 'frrodriguez@esei.uvigo.es','2015-12-15','', NULL, NULL, NULL, NULL);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VISITAS`
--

DROP TABLE IF EXISTS `VISITAS`;
CREATE TABLE IF NOT EXISTS `VISITAS` (
  `Login` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `PAG_nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `Permiso` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_visita` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `FUNCIONALIDADES`
--
ALTER TABLE `FUNCIONALIDADES`
 ADD PRIMARY KEY (`FUN_nombre`);

--
-- Indices de la tabla `HACE_DE`
--
ALTER TABLE `HACE_DE`
 ADD PRIMARY KEY (`Login`,`ROL_nombre`), ADD KEY `FK_HAC_ROL` (`ROL_nombre`);

--
-- Indices de la tabla `IMPLEMENTADA_EN`
--
ALTER TABLE `IMPLEMENTADA_EN`
 ADD PRIMARY KEY (`FUN_nombre`,`PAG_nombre`), ADD KEY `FK_IMP_PAG` (`PAG_nombre`);

--
-- Indices de la tabla `PAGINAS`
--
ALTER TABLE `PAGINAS`
 ADD PRIMARY KEY (`PAG_nombre`);

--
-- Indices de la tabla `PERMITE`
--
ALTER TABLE `PERMITE`
 ADD PRIMARY KEY (`ROL_nombre`,`FUN_nombre`), ADD KEY `FK_PER_FUN` (`FUN_nombre`);

--
-- Indices de la tabla `ROLES`
--
ALTER TABLE `ROLES`
 ADD PRIMARY KEY (`ROL_nombre`);

--
-- Indices de la tabla `S_ARTICULO`
--
ALTER TABLE `S_ARTICULO`
 ADD PRIMARY KEY (`IDArticulo`);

--
-- Indices de la tabla `S_ASIGNADO`
--
ALTER TABLE `S_ASIGNADO`
 ADD PRIMARY KEY (`IDProyecto`,`IDParticipante`), ADD KEY `IDParticipante` (`IDParticipante`);

--
-- Indices de la tabla `S_AYUDANTES`
--
ALTER TABLE `S_AYUDANTES`
 ADD PRIMARY KEY (`DNI_Ayudante`), ADD UNIQUE KEY `IDParticipante` (`IDParticipante`);

--
-- Indices de la tabla `S_CONFERENCIAS`
--
ALTER TABLE `S_CONFERENCIAS`
 ADD PRIMARY KEY (`IDConferencia`);

--
-- Indices de la tabla `S_CONFERENCIAS_ORG`
--
ALTER TABLE `S_CONFERENCIAS_ORG`
 ADD PRIMARY KEY (`IDConferencia_Org`);

--
-- Indices de la tabla `S_CONTRATO`
--
ALTER TABLE `S_CONTRATO`
 ADD PRIMARY KEY (`IDContrato`), ADD UNIQUE KEY `IDEmpresa` (`IDEmpresa`);

--
-- Indices de la tabla `S_EMPRESAS`
--
ALTER TABLE `S_EMPRESAS`
 ADD PRIMARY KEY (`IDEmpresa`), ADD UNIQUE KEY `IDParticipante` (`IDParticipante`);

--
-- Indices de la tabla `S_GRUPOS`
--
ALTER TABLE `S_GRUPOS`
 ADD PRIMARY KEY (`IDGrupo`), ADD UNIQUE KEY `IDParticipante` (`IDParticipante`);

--
-- Indices de la tabla `S_INSTITUCIONES`
--
ALTER TABLE `S_INSTITUCIONES`
 ADD PRIMARY KEY (`IDInstitucion`);

--
-- Indices de la tabla `S_LIBROS`
--
ALTER TABLE `S_LIBROS`
 ADD PRIMARY KEY (`ISBN`);

--
-- Indices de la tabla `S_MATERIAS`
--
ALTER TABLE `S_MATERIAS`
 ADD PRIMARY KEY (`IDMateria`);

--
-- Indices de la tabla `S_NOTICIAS`
--
ALTER TABLE `S_NOTICIAS`
 ADD PRIMARY KEY (`Titulo_Noticia`);

--
-- Indices de la tabla `S_OFRECE`
--
ALTER TABLE `S_OFRECE`
 ADD PRIMARY KEY (`IDProyecto`,`IDInstitucion`), ADD KEY `IDInstitucion` (`IDInstitucion`);

--
-- Indices de la tabla `S_PARTICIPANTES`
--

ALTER TABLE `S_PARTICIPANTES`
 ADD PRIMARY KEY (`IDParticipantes`);
 
-- Indices de la tabla `S_PATENTE`
--
ALTER TABLE `S_PATENTE`
 ADD PRIMARY KEY (`IDPatente`);

--
-- Indices de la tabla `S_PROYECTO`
--
ALTER TABLE `S_PROYECTO`
 ADD PRIMARY KEY (`IDProyecto`);

--
-- Indices de la tabla `S_REVISTAS`
--
ALTER TABLE `S_REVISTAS`
 ADD PRIMARY KEY (`IDRevista`);

--
-- Indices de la tabla `S_TABLONEDITORIAL`
--
ALTER TABLE `S_TABLONEDITORIAL`
 ADD PRIMARY KEY (`IDTablon`);

--
-- Indices de la tabla `S_USUARIO_ARTICULO`
--
ALTER TABLE `S_USUARIO_ARTICULO`
 ADD PRIMARY KEY (`IDArticulo`,`Login`), ADD KEY `Login` (`Login`);

--
-- Indices de la tabla `S_USUARIO_CONFERENCIA`
--
ALTER TABLE `S_USUARIO_CONFERENCIA`
 ADD PRIMARY KEY (`IDConferencia`,`Login`), ADD KEY `Login` (`Login`);

--
-- Indices de la tabla `S_USUARIO_LIBRO`
--
ALTER TABLE `S_USUARIO_LIBRO`
 ADD PRIMARY KEY (`ISBN`,`Login`), ADD KEY `Login` (`Login`);

--
-- Indices de la tabla `S_USUARIO_MATERIA`
--
ALTER TABLE `S_USUARIO_MATERIA`
 ADD PRIMARY KEY (`IDMateria`,`Login`), ADD KEY `Login` (`Login`);

--
-- Indices de la tabla `TAMBIEN_ACCEDE`
--
ALTER TABLE `TAMBIEN_ACCEDE`
 ADD PRIMARY KEY (`Login`,`PAG_nombre`), ADD KEY `FK_TAM_PAG` (`PAG_nombre`);

--
-- Indices de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
 ADD PRIMARY KEY (`Login`);

--
-- Indices de la tabla `VISITAS`
--
ALTER TABLE `VISITAS`
 ADD PRIMARY KEY (`Login`,`fecha_visita`,`PAG_nombre`), ADD KEY `FK_VIS_PAG` (`PAG_nombre`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `HACE_DE`
--
ALTER TABLE `HACE_DE`
ADD CONSTRAINT `FK_HAC_ROL` FOREIGN KEY (`ROL_nombre`) REFERENCES `ROLES` (`ROL_nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_HAC_USU` FOREIGN KEY (`Login`) REFERENCES `USUARIOS` (`Login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `IMPLEMENTADA_EN`
--
ALTER TABLE `IMPLEMENTADA_EN`
ADD CONSTRAINT `FK_IMP_FUN` FOREIGN KEY (`FUN_nombre`) REFERENCES `FUNCIONALIDADES` (`FUN_nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_IMP_PAG` FOREIGN KEY (`PAG_nombre`) REFERENCES `PAGINAS` (`PAG_nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `PERMITE`
--
ALTER TABLE `PERMITE`
ADD CONSTRAINT `FK_PER_FUN` FOREIGN KEY (`FUN_nombre`) REFERENCES `FUNCIONALIDADES` (`FUN_nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_PER_ROL` FOREIGN KEY (`ROL_nombre`) REFERENCES `ROLES` (`ROL_nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `S_ASIGNADO`
--

ALTER TABLE `S_ASIGNADO`
ADD CONSTRAINT `S_ASIGNADO_ibfk_2` FOREIGN KEY (`IDParticipante`) REFERENCES `S_PARTICIPANTES` (`IDParticipantes`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `S_ASIGNADO_ibfk_1` FOREIGN KEY (`IDProyecto`) REFERENCES `S_PROYECTO` (`IDProyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `S_CONTRATO`
--
ALTER TABLE `S_CONTRATO`
ADD CONSTRAINT `S_CONTRATO_ibfk_1` FOREIGN KEY (`IDEmpresa`) REFERENCES `S_EMPRESAS` (`IDEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `S_EMPRESAS`
--

ALTER TABLE `S_EMPRESAS`
ADD CONSTRAINT `S_EMPRESAS_ibfk_1` FOREIGN KEY (`IDParticipante`) REFERENCES `S_PARTICIPANTES` (`IDParticipantes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `S_GRUPOS`
--

ALTER TABLE `S_GRUPOS`
ADD CONSTRAINT `S_GRUPOS_ibfk_1` FOREIGN KEY (`IDParticipante`) REFERENCES `S_PARTICIPANTES` (`IDParticipantes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `S_OFRECE`
--
ALTER TABLE `S_OFRECE`
ADD CONSTRAINT `S_OFRECE_ibfk_2` FOREIGN KEY (`IDInstitucion`) REFERENCES `S_INSTITUCIONES` (`IDInstitucion`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `S_OFRECE_ibfk_1` FOREIGN KEY (`IDProyecto`) REFERENCES `S_PROYECTO` (`IDProyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `S_USUARIO_ARTICULO`
--
ALTER TABLE `S_USUARIO_ARTICULO`
ADD CONSTRAINT `S_USUARIO_ARTICULO_ibfk_2` FOREIGN KEY (`Login`) REFERENCES `USUARIOS` (`Login`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `S_USUARIO_ARTICULO_ibfk_1` FOREIGN KEY (`IDArticulo`) REFERENCES `S_ARTICULO` (`IDArticulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `S_USUARIO_CONFERENCIA`
--
ALTER TABLE `S_USUARIO_CONFERENCIA`
ADD CONSTRAINT `S_USUARIO_CONFERENCIA_ibfk_1` FOREIGN KEY (`IDConferencia`) REFERENCES `S_CONFERENCIAS` (`IDConferencia`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `S_USUARIO_CONFERENCIA_ibfk_2` FOREIGN KEY (`Login`) REFERENCES `USUARIOS` (`Login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `S_USUARIO_LIBRO`
--
ALTER TABLE `S_USUARIO_LIBRO`
ADD CONSTRAINT `S_USUARIO_LIBRO_ibfk_2` FOREIGN KEY (`Login`) REFERENCES `USUARIOS` (`Login`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `S_USUARIO_LIBRO_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `S_LIBROS` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `S_USUARIO_MATERIA`
--
ALTER TABLE `S_USUARIO_MATERIA`
ADD CONSTRAINT `S_USUARIO_MATERIA_ibfk_2` FOREIGN KEY (`Login`) REFERENCES `USUARIOS` (`Login`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `S_USUARIO_MATERIA_ibfk_1` FOREIGN KEY (`IDMateria`) REFERENCES `S_MATERIAS` (`IDMateria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `TAMBIEN_ACCEDE`
--
ALTER TABLE `TAMBIEN_ACCEDE`
ADD CONSTRAINT `FK_TAM_PAG` FOREIGN KEY (`PAG_nombre`) REFERENCES `PAGINAS` (`PAG_nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_TAM_USU` FOREIGN KEY (`Login`) REFERENCES `USUARIOS` (`Login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `VISITAS`
--
ALTER TABLE `VISITAS`
ADD CONSTRAINT `FK_VIS_PAG` FOREIGN KEY (`PAG_nombre`) REFERENCES `PAGINAS` (`PAG_nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_VIS_USU` FOREIGN KEY (`Login`) REFERENCES `USUARIOS` (`Login`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
