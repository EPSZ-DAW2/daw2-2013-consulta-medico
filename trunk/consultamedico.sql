-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2014 a las 21:53:40
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `consultamedico`
--
CREATE DATABASE IF NOT EXISTS `consultamedico` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `consultamedico`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a`
--

CREATE TABLE IF NOT EXISTS `a` (
  `fd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `a`
--

INSERT INTO `a` (`fd`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aseguradoras`
--

CREATE TABLE IF NOT EXISTS `aseguradoras` (
  `idAseguradora` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` char(50) DEFAULT NULL,
  `Notas` char(150) DEFAULT NULL,
  PRIMARY KEY (`idAseguradora`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
  `IdFactura` int(11) NOT NULL AUTO_INCREMENT,
  `Serie` int(11) DEFAULT NULL,
  `Numero` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `IdPaciente` int(11) DEFAULT NULL,
  `Concepto` char(50) DEFAULT NULL,
  `Importe` int(11) DEFAULT NULL,
  `FechaCobro` date DEFAULT NULL,
  `Notas` char(150) DEFAULT NULL,
  PRIMARY KEY (`IdFactura`),
  KEY `IdPaciente` (`IdPaciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  KEY `idAseguradora` (`idAseguradora`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(5, 5),
(6, 6);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` char(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` char(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `FechaHoraUltimaConexion` date DEFAULT NULL,
  `numFallos` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `usuario`, `clave`, `nombre`, `FechaHoraUltimaConexion`, `numFallos`) VALUES
(1, 'sysadmin', 'sysadmin', 'Agapito', '2014-01-28', NULL),
(2, 'admin', 'admin', 'Luis', '2014-01-28', NULL),
(3, 'medico', 'medico', 'Castro', NULL, NULL),
(4, 'auxiliar', 'auxiliar', 'Francesca', NULL, NULL),
(5, 'paciente', 'paciente', 'jack', NULL, NULL),
(6, 'invitado', 'invitado', 'Woody', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE IF NOT EXISTS `visitas` (
  `IdCita` int(11) NOT NULL AUTO_INCREMENT,
  `IdPaciente` int(11) DEFAULT NULL,
  `Fecha_hora` datetime DEFAULT NULL,
  `Notas` char(150) DEFAULT NULL,
  `Estado` char(50) DEFAULT NULL,
  PRIMARY KEY (`IdCita`),
  KEY `IdPaciente` (`IdPaciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`IdPaciente`) REFERENCES `pacientes` (`IdPaciente`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`idAseguradora`) REFERENCES `aseguradoras` (`idAseguradora`);

--
-- Filtros para la tabla `perfilesusuarios`
--
ALTER TABLE `perfilesusuarios`
  ADD CONSTRAINT `perfilesusuarios_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`),
  ADD CONSTRAINT `perfilesusuarios_ibfk_2` FOREIGN KEY (`IdPerfil`) REFERENCES `perfiles` (`IdPerfil`);

--
-- Filtros para la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD CONSTRAINT `pruebas_ibfk_1` FOREIGN KEY (`IdCita`) REFERENCES `visitas` (`IdCita`),
  ADD CONSTRAINT `pruebas_ibfk_2` FOREIGN KEY (`IdPaciente`) REFERENCES `pacientes` (`IdPaciente`),
  ADD CONSTRAINT `pruebas_ibfk_3` FOREIGN KEY (`IdTipoDiagnostico`) REFERENCES `tiposdiagnosticos` (`IdTipoDiagnostico`);

--
-- Filtros para la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD CONSTRAINT `visitas_ibfk_1` FOREIGN KEY (`IdPaciente`) REFERENCES `pacientes` (`IdPaciente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
