CREATE DATABASE IF NOT EXISTS `consultamedico` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `consultamedico`;
CREATE TABLE `a` (
  `fd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `a` (`fd`) VALUES
('1'),
('2');
CREATE TABLE `aseguradoras` (
  `idAseguradora` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` char(50) DEFAULT NULL,
  `Notas` char(150) DEFAULT NULL,
  PRIMARY KEY (`idAseguradora`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `pacientes` (
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
  KEY `idAseguradora` (`idAseguradora`),
  CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`idAseguradora`) REFERENCES `aseguradoras` (`idAseguradora`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` char(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` char(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` char(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `FechaHoraUltimaConexion` datetime DEFAULT NULL,
  `numFallos` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `usuarios` (`IdUsuario`,`usuario`,`clave`,`nombre`,`FechaHoraUltimaConexion`,`numFallos`) VALUES
('1','sysadmin','sysadmin','Agapito','2014-01-28 00:00:00',''),
('2','admin','admin','Luis','2014-01-28 00:00:00',''),
('3','medico','medico','Castro','',''),
('4','auxiliar','auxiliar','Francesca','',''),
('5','paciente','paciente','jack','2014-01-28 00:00:00','2'),
('6','invitado','invitado','Woody','','');
CREATE TABLE `perfiles` (
  `IdPerfil` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` char(50) DEFAULT NULL,
  PRIMARY KEY (`IdPerfil`),
  KEY `IdPerfil` (`IdPerfil`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `perfiles` (`IdPerfil`,`Nombre`) VALUES
('1','sysadmin'),
('2','admin'),
('3','medico'),
('4','auxiliar'),
('5','paciente'),
('6','invitado');
CREATE TABLE `perfilesusuarios` (
  `IdPerfil` int(11) NOT NULL DEFAULT '0',
  `IdUsuario` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdPerfil`,`IdUsuario`),
  KEY `IdUsuario` (`IdUsuario`),
  CONSTRAINT `perfilesusuarios_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`),
  CONSTRAINT `perfilesusuarios_ibfk_2` FOREIGN KEY (`IdPerfil`) REFERENCES `perfiles` (`IdPerfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `perfilesusuarios` (`IdPerfil`,`IdUsuario`) VALUES
('1','1'),
('2','2'),
('3','3'),
('4','4'),
('5','5'),
('6','6');
CREATE TABLE `tiposdiagnosticos` (
  `IdTipoDiagnostico` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` char(50) DEFAULT NULL,
  `Plantilla` char(50) DEFAULT NULL,
  `Notas` char(150) DEFAULT NULL,
  PRIMARY KEY (`IdTipoDiagnostico`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `visitas` (
  `IdCita` int(11) NOT NULL AUTO_INCREMENT,
  `IdPaciente` int(11) DEFAULT NULL,
  `Fecha_hora` datetime DEFAULT NULL,
  `Notas` char(150) DEFAULT NULL,
  `Estado` char(50) DEFAULT NULL,
  PRIMARY KEY (`IdCita`),
  KEY `IdPaciente` (`IdPaciente`),
  CONSTRAINT `visitas_ibfk_1` FOREIGN KEY (`IdPaciente`) REFERENCES `pacientes` (`IdPaciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `pruebas` (
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
  KEY `IdTipoDiagnostico` (`IdTipoDiagnostico`),
  CONSTRAINT `pruebas_ibfk_1` FOREIGN KEY (`IdCita`) REFERENCES `visitas` (`IdCita`),
  CONSTRAINT `pruebas_ibfk_2` FOREIGN KEY (`IdPaciente`) REFERENCES `pacientes` (`IdPaciente`),
  CONSTRAINT `pruebas_ibfk_3` FOREIGN KEY (`IdTipoDiagnostico`) REFERENCES `tiposdiagnosticos` (`IdTipoDiagnostico`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `facturas` (
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
  KEY `IdPaciente` (`IdPaciente`),
  CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`IdPaciente`) REFERENCES `pacientes` (`IdPaciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

