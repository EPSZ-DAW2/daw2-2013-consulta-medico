-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-02-2014 a las 11:16:39
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `consultamedico`
--
CREATE DATABASE `consultamedico` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `consultamedico`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aseguradoras`
--

CREATE TABLE IF NOT EXISTS `aseguradoras` (
  `idAseguradora` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` char(50) DEFAULT NULL,
  `Notas` char(150) DEFAULT NULL,
  PRIMARY KEY (`idAseguradora`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `aseguradoras`
--

INSERT INTO `aseguradoras` (`idAseguradora`, `Nombre`, `Notas`) VALUES
(1, 'Seguros 1', 'Notas Seguros 1'),
(2, 'Seguros 2', 'Notas Seguros 2'),
(3, 'Seguros 3', 'Notas Seguros 3'),
(4, 'Seguros 4', 'Notas Seguros 4'),
(5, 'Seguros 5', 'Notas Seguros 5'),
(6, 'Seguros 6', 'Notas Seguros 6'),
(7, 'Seguros 7', 'Notas Seguros 7'),
(8, 'Seguros 8', 'Notas Seguros 8'),
(9, 'Seguros 9', 'Notas Seguros 9'),
(10, 'Seguros 10', 'Notas Seguros 10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `userid` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `bizrule` text COLLATE utf8_spanish_ci,
  `data` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', '2', NULL, NULL),
('auxiliar', '4', NULL, NULL),
('medico', '3', NULL, NULL),
('paciente', '5', NULL, NULL),
('sysadmin', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_spanish_ci,
  `bizrule` text COLLATE utf8_spanish_ci,
  `data` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 0, NULL, NULL, NULL),
('auxiliar', 0, NULL, NULL, NULL),
('medico', 0, NULL, NULL, NULL),
('paciente', 0, NULL, NULL, NULL),
('sysadmin', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
  `IdFactura` int(11) NOT NULL AUTO_INCREMENT,
  `Serie` int(11) NOT NULL DEFAULT '0',
  `Numero` int(11) NOT NULL DEFAULT '0',
  `Fecha` date DEFAULT NULL,
  `IdPaciente` int(11) DEFAULT NULL,
  `Concepto` char(50) DEFAULT NULL,
  `Importe` int(11) DEFAULT NULL,
  `FechaCobro` date DEFAULT NULL,
  `Notas` char(150) DEFAULT NULL,
  PRIMARY KEY (`IdFactura`,`Serie`,`Numero`),
  KEY `IdPaciente` (`IdPaciente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`IdFactura`, `Serie`, `Numero`, `Fecha`, `IdPaciente`, `Concepto`, `Importe`, `FechaCobro`, `Notas`) VALUES
(1, 1, 1, '2001-01-10', 1, 'Concepto 1', 1, '2001-01-11', 'Notas 1'),
(2, 2, 2, '2002-02-10', 2, 'Concepto 2', 2, '2002-02-11', 'Notas 2'),
(3, 3, 3, '2003-03-10', 3, 'Concepto 3', 3, '2003-03-11', 'Notas 3'),
(4, 4, 4, '2004-04-10', 4, 'Concepto 4', 4, '2004-04-11', 'Notas 4'),
(5, 5, 5, '2005-05-10', 5, 'Concepto 5', 5, '2005-05-11', 'Notas 5'),
(6, 6, 6, '2006-06-10', 6, 'Concepto 6', 6, '2006-06-11', 'Notas 6'),
(7, 7, 7, '2007-07-10', 7, 'Concepto 7', 7, '2007-07-11', 'Notas 7'),
(8, 8, 8, '2008-08-10', 8, 'Concepto 8', 8, '2008-08-11', 'Notas 8'),
(9, 9, 9, '2009-09-10', 9, 'Concepto 9', 9, '2009-09-11', 'Notas 9'),
(10, 10, 10, '2010-10-10', 10, 'Concepto 10', 10, '2010-10-11', 'Notas 10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE IF NOT EXISTS `pacientes` (
  `IdPaciente` int(11) NOT NULL AUTO_INCREMENT,
  `Apellidos` char(50) DEFAULT NULL,
  `Nombre` char(50) DEFAULT NULL,
  `DNI_NIF` char(9) DEFAULT NULL,
  `Fecha_nacimiento` date DEFAULT NULL,
  `Direccion` char(50) DEFAULT NULL,
  `CodPostal` int(11) DEFAULT NULL,
  `Localidad` char(50) DEFAULT NULL,
  `Provincia` char(50) DEFAULT NULL,
  `TelFijo` int(11) DEFAULT NULL,
  `TelMovil` int(11) DEFAULT NULL,
  `Email` char(50) DEFAULT NULL,
  `idAseguradora` int(11) DEFAULT NULL,
  `Notas` char(150) DEFAULT NULL,
  PRIMARY KEY (`IdPaciente`),
  UNIQUE KEY `DNI_NIF` (`DNI_NIF`),
  KEY `idAseguradora` (`idAseguradora`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`IdPaciente`, `Apellidos`, `Nombre`, `DNI_NIF`, `Fecha_nacimiento`, `Direccion`, `CodPostal`, `Localidad`, `Provincia`, `TelFijo`, `TelMovil`, `Email`, `idAseguradora`, `Notas`) VALUES
(1, 'Apellido11 Apellido12', 'Nombre 1', '11111111A', '2001-01-01', 'Direccion 1', 11111, 'Localidad 1', 'Provincia 1', 111111111, 111111111, 'paciente1@correo.com', 1, 'Notas 1'),
(2, 'Apellido21 Apellido22', 'Nombre 2', '22222222B', '2002-02-02', 'Direccion 2', 22222, 'Localidad 2', 'Provincia 2', 222222222, 222222222, 'paciente2@correo.com', 2, 'Notas 2'),
(3, 'Apellido31 Apellido32', 'Nombre 3', '33333333C', '2003-03-03', 'Direccion 3', 33333, 'Localidad 3', 'Provincia 3', 333333333, 333333333, 'paciente3@correo.com', 3, 'Notas 3'),
(4, 'Apellido41 Apellido42', 'Nombre 4', '44444444D', '2004-04-04', 'Direccion 4', 44444, 'Localidad 4', 'Provincia 4', 444444444, 444444444, 'paciente4@correo.com', 4, 'Notas 4'),
(5, 'Apellido51 Apellido52', 'Nombre 5', '55555555E', '2005-05-05', 'Direccion 5', 55555, 'Localidad 5', 'Provincia 5', 555555555, 555555555, 'paciente5@correo.com', 5, 'Notas 5'),
(6, 'Apellido61 Apellido62', 'Nombre 6', '66666666F', '2006-06-06', 'Direccion 6', 66666, 'Localidad 6', 'Provincia 6', 666666666, 666666666, 'paciente6@correo.com', 6, 'Notas 6'),
(7, 'Apellido71 Apellido72', 'Nombre 7', '77777777G', '2007-07-07', 'Direccion 7', 77777, 'Localidad 7', 'Provincia 7', 777777777, 777777777, 'paciente7@correo.com', 7, 'Notas 7'),
(8, 'Apellido81 Apellido82', 'Nombre 8', '88888888H', '2008-08-08', 'Direccion 8', 88888, 'Localidad 8', 'Provincia 8', 888888888, 888888888, 'paciente8@correo.com', 8, 'Notas 8'),
(9, 'Apellido91 Apellido92', 'Nombre 9', '99999999I', '2009-09-09', 'Direccion 9', 99999, 'Localidad 9', 'Provincia 9', 999999999, 999999999, 'paciente9@correo.com', 9, 'Notas 9'),
(10, 'Apellido101 Apellido102', 'Nombre 10', '10101010J', '2010-10-10', 'Direccion 1', 10101, 'Localidad 10', 'Provincia 1', 101010101, 101010101, 'paciente10@correo.com', 10, 'Notas 10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
  `IdPerfil` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` char(50) DEFAULT NULL,
  PRIMARY KEY (`IdPerfil`),
  KEY `IdPerfil` (`IdPerfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`IdPerfil`, `Nombre`) VALUES
(1, 'sysadmin'),
(2, 'admin'),
(3, 'medico'),
(4, 'auxiliar'),
(5, 'paciente'),
(6, 'invitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfilesusuarios`
--

CREATE TABLE IF NOT EXISTS `perfilesusuarios` (
  `IdPerfil` int(11) NOT NULL DEFAULT '0',
  `IdUsuario` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdPerfil`,`IdUsuario`),
  KEY `IdUsuario` (`IdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfilesusuarios`
--

INSERT INTO `perfilesusuarios` (`IdPerfil`, `IdUsuario`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

CREATE TABLE IF NOT EXISTS `pruebas` (
  `IdPrueba` int(11) NOT NULL AUTO_INCREMENT,
  `IdCita` int(11) DEFAULT NULL,
  `IdPaciente` int(11) DEFAULT NULL,
  `IdTipoDiagnostico` int(11) DEFAULT NULL,
  `Fecha_Hora` datetime DEFAULT NULL,
  `Descripcion` char(50) DEFAULT NULL,
  `Tratamiento` char(50) DEFAULT NULL,
  `Notas` char(150) DEFAULT NULL,
  PRIMARY KEY (`IdPrueba`),
  KEY `IdCita` (`IdCita`),
  KEY `IdPaciente` (`IdPaciente`),
  KEY `IdTipoDiagnostico` (`IdTipoDiagnostico`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `pruebas`
--

INSERT INTO `pruebas` (`IdPrueba`, `IdCita`, `IdPaciente`, `IdTipoDiagnostico`, `Fecha_Hora`, `Descripcion`, `Tratamiento`, `Notas`) VALUES
(1, 1, 1, 1, '2001-01-10 00:00:00', 'Descripcion 1', 'Tratamiento 1', 'Notas 1'),
(2, 2, 2, 2, '2002-02-10 00:00:00', 'Descripcion 2', 'Tratamiento 2', 'Notas 2'),
(3, 3, 3, 3, '2003-03-10 00:00:00', 'Descripcion 3', 'Tratamiento 3', 'Notas 3'),
(4, 4, 4, 4, '2004-04-10 00:00:00', 'Descripcion 4', 'Tratamiento 4', 'Notas 4'),
(5, 5, 5, 5, '2005-05-10 00:00:00', 'Descripcion 5', 'Tratamiento 5', 'Notas 5'),
(6, 6, 6, 6, '2006-06-10 00:00:00', 'Descripcion 6', 'Tratamiento 6', 'Notas 6'),
(7, 7, 7, 7, '2007-07-10 00:00:00', 'Descripcion 7', 'Tratamiento 7', 'Notas 7'),
(8, 8, 8, 8, '2008-08-10 00:00:00', 'Descripcion 8', 'Tratamiento 8', 'Notas 8'),
(9, 9, 9, 9, '2009-09-10 00:00:00', 'Descripcion 9', 'Tratamiento 9', 'Notas 9'),
(10, 10, 10, 10, '2010-10-10 00:00:00', 'Descripcion 10', 'Tratamiento 10', 'Notas 10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposdiagnosticos`
--

CREATE TABLE IF NOT EXISTS `tiposdiagnosticos` (
  `IdTipoDiagnostico` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` char(50) DEFAULT NULL,
  `Plantilla` char(50) DEFAULT NULL,
  `Notas` char(150) DEFAULT NULL,
  PRIMARY KEY (`IdTipoDiagnostico`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tiposdiagnosticos`
--

INSERT INTO `tiposdiagnosticos` (`IdTipoDiagnostico`, `Nombre`, `Plantilla`, `Notas`) VALUES
(1, 'Nombre 1', 'Plantilla 1', 'Notas 1'),
(2, 'Nombre 2', 'Plantilla 2', 'Notas 2'),
(3, 'Nombre 3', 'Plantilla 3', 'Notas 3'),
(4, 'Nombre 4', 'Plantilla 4', 'Notas 4'),
(5, 'Nombre 5', 'Plantilla 5', 'Notas 5'),
(6, 'Nombre 6', 'Plantilla 6', 'Notas 6'),
(7, 'Nombre 7', 'Plantilla 7', 'Notas 7'),
(8, 'Nombre 8', 'Plantilla 8', 'Notas 8'),
(9, 'Nombre 9', 'Plantilla 9', 'Notas 9'),
(10, 'Nombre 10', 'Plantilla 10', 'Notas 10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` char(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` char(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `FechaHoraUltimaConexion` datetime DEFAULT NULL,
  `numFallos` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdUsuario`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `usuario`, `clave`, `nombre`, `FechaHoraUltimaConexion`, `numFallos`) VALUES
(1, 'sysadmin', 'sysadmin', 'Agapito', '2014-01-28 00:00:00', 0),
(2, 'admin', 'admin', 'Luis', '2014-02-03 19:10:39', 0),
(3, 'medico', 'medico', 'Castro', '0000-00-00 00:00:00', 0),
(4, 'auxiliar', 'auxiliar', 'Francesca', '0000-00-00 00:00:00', 0),
(5, 'paciente', 'paciente', 'jack', '2014-01-28 00:00:00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE IF NOT EXISTS `visitas` (
  `IdCita` int(11) NOT NULL AUTO_INCREMENT,
  `IdPaciente` int(11) NOT NULL DEFAULT '0',
  `Fecha` date NOT NULL DEFAULT '0000-00-00',
  `Notas` char(150) DEFAULT NULL,
  `Estado` char(50) DEFAULT NULL,
  `Hora` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`IdCita`,`IdPaciente`,`Fecha`,`Hora`),
  KEY `IdPaciente` (`IdPaciente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`IdCita`, `IdPaciente`, `Fecha`, `Notas`, `Estado`, `Hora`) VALUES
(1, 1, '2001-01-10', 'Notas 1', 'Realizada', '00:00:00'),
(2, 2, '2002-02-10', 'Notas 2', 'Realizada', '00:00:00'),
(3, 3, '2003-03-10', 'Notas 3', 'Realizada', '00:00:00'),
(4, 4, '2004-04-10', 'Notas 4', 'Realizada', '00:00:00'),
(5, 5, '2005-05-10', 'Notas 5', 'Realizada', '00:00:00'),
(6, 6, '2006-06-10', 'Notas 6', 'Realizada', '00:00:00'),
(7, 7, '2007-07-10', 'Notas 7', 'Realizada', '00:00:00'),
(8, 8, '2008-08-10', 'Notas 8', 'Realizada', '00:00:00'),
(9, 9, '2009-09-10', 'Notas 9', 'Realizada', '00:00:00'),
(10, 10, '2010-10-10', 'Notas 10', 'Realizada', '00:00:00');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`IdPaciente`) REFERENCES `pacientes` (`IdPaciente`),
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`IdPaciente`) REFERENCES `pacientes` (`IdPaciente`) ON DELETE CASCADE,
  ADD CONSTRAINT `facturas_ibfk_3` FOREIGN KEY (`IdPaciente`) REFERENCES `pacientes` (`IdPaciente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`idAseguradora`) REFERENCES `aseguradoras` (`idAseguradora`),
  ADD CONSTRAINT `pacientes_ibfk_2` FOREIGN KEY (`idAseguradora`) REFERENCES `aseguradoras` (`idAseguradora`) ON DELETE CASCADE,
  ADD CONSTRAINT `pacientes_ibfk_3` FOREIGN KEY (`idAseguradora`) REFERENCES `aseguradoras` (`idAseguradora`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `perfilesusuarios`
--
ALTER TABLE `perfilesusuarios`
  ADD CONSTRAINT `perfilesusuarios_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`),
  ADD CONSTRAINT `perfilesusuarios_ibfk_2` FOREIGN KEY (`IdPerfil`) REFERENCES `perfiles` (`IdPerfil`),
  ADD CONSTRAINT `perfilesusuarios_ibfk_3` FOREIGN KEY (`IdPerfil`) REFERENCES `perfiles` (`IdPerfil`) ON DELETE CASCADE,
  ADD CONSTRAINT `perfilesusuarios_ibfk_4` FOREIGN KEY (`IdPerfil`) REFERENCES `perfiles` (`IdPerfil`) ON UPDATE CASCADE,
  ADD CONSTRAINT `perfilesusuarios_ibfk_5` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `perfilesusuarios_ibfk_6` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD CONSTRAINT `pruebas_ibfk_1` FOREIGN KEY (`IdCita`) REFERENCES `visitas` (`IdCita`),
  ADD CONSTRAINT `pruebas_ibfk_2` FOREIGN KEY (`IdPaciente`) REFERENCES `pacientes` (`IdPaciente`),
  ADD CONSTRAINT `pruebas_ibfk_3` FOREIGN KEY (`IdTipoDiagnostico`) REFERENCES `tiposdiagnosticos` (`IdTipoDiagnostico`),
  ADD CONSTRAINT `pruebas_ibfk_4` FOREIGN KEY (`IdCita`) REFERENCES `visitas` (`IdCita`) ON DELETE CASCADE,
  ADD CONSTRAINT `pruebas_ibfk_5` FOREIGN KEY (`IdCita`) REFERENCES `visitas` (`IdCita`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pruebas_ibfk_6` FOREIGN KEY (`IdPaciente`) REFERENCES `pacientes` (`IdPaciente`) ON DELETE CASCADE,
  ADD CONSTRAINT `pruebas_ibfk_7` FOREIGN KEY (`IdPaciente`) REFERENCES `pacientes` (`IdPaciente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pruebas_ibfk_8` FOREIGN KEY (`IdTipoDiagnostico`) REFERENCES `tiposdiagnosticos` (`IdTipoDiagnostico`) ON DELETE CASCADE,
  ADD CONSTRAINT `pruebas_ibfk_9` FOREIGN KEY (`IdTipoDiagnostico`) REFERENCES `tiposdiagnosticos` (`IdTipoDiagnostico`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD CONSTRAINT `visitas_ibfk_1` FOREIGN KEY (`IdPaciente`) REFERENCES `pacientes` (`IdPaciente`),
  ADD CONSTRAINT `visitas_ibfk_2` FOREIGN KEY (`IdPaciente`) REFERENCES `pacientes` (`IdPaciente`) ON DELETE CASCADE,
  ADD CONSTRAINT `visitas_ibfk_3` FOREIGN KEY (`IdPaciente`) REFERENCES `pacientes` (`IdPaciente`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
