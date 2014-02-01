-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-02-2014 a las 14:29:39
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `consultamedico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aseguradoras`
--

DROP TABLE IF EXISTS `aseguradoras`;
CREATE TABLE IF NOT EXISTS `aseguradoras` (
  `idAseguradora` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` char(50) DEFAULT NULL,
  `Notas` char(150) DEFAULT NULL,
  PRIMARY KEY (`idAseguradora`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

DROP TABLE IF EXISTS `facturas`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE IF NOT EXISTS `perfiles` (
  `IdPerfil` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` char(50) DEFAULT NULL,
  PRIMARY KEY (`IdPerfil`),
  KEY `IdPerfil` (`IdPerfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfilesusuarios`
--

DROP TABLE IF EXISTS `perfilesusuarios`;
CREATE TABLE IF NOT EXISTS `perfilesusuarios` (
  `IdPerfil` int(11) NOT NULL DEFAULT '0',
  `IdUsuario` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdPerfil`,`IdUsuario`),
  KEY `IdUsuario` (`IdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

DROP TABLE IF EXISTS `pruebas`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposdiagnosticos`
--

DROP TABLE IF EXISTS `tiposdiagnosticos`;
CREATE TABLE IF NOT EXISTS `tiposdiagnosticos` (
  `IdTipoDiagnostico` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` char(50) DEFAULT NULL,
  `Plantilla` char(50) DEFAULT NULL,
  `Notas` char(150) DEFAULT NULL,
  PRIMARY KEY (`IdTipoDiagnostico`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` char(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` char(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `FechaHoraUltimaConexion` datetime DEFAULT NULL,
  `numFallos` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

DROP TABLE IF EXISTS `visitas`;
CREATE TABLE IF NOT EXISTS `visitas` (
  `IdCita` int(11) NOT NULL AUTO_INCREMENT,
  `IdPaciente` int(11) DEFAULT NULL,
  `Fecha_hora` datetime DEFAULT NULL,
  `Notas` char(150) DEFAULT NULL,
  `Estado` char(50) DEFAULT NULL,
  PRIMARY KEY (`IdCita`),
  KEY `IdPaciente` (`IdPaciente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

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
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
