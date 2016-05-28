-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2016 at 07:50 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rppc`
--
CREATE DATABASE IF NOT EXISTS `rppc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rppc`;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `nom_area` varchar(45) NOT NULL,
  `uc_area` int(11) DEFAULT NULL,
  `fc_area` datetime DEFAULT NULL,
  `um_area` int(11) DEFAULT NULL,
  `fm_area` datetime DEFAULT NULL,
  PRIMARY KEY (`id_area`),
  KEY `fk_AREAS_USUARIOS1_idx` (`uc_area`),
  KEY `fk_AREAS_USUARIOS2_idx` (`um_area`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id_area`, `nom_area`, `uc_area`, `fc_area`, `um_area`, `fm_area`) VALUES
(1, 'Administrativo', NULL, NULL, NULL, NULL),
(2, 'AGN', NULL, NULL, NULL, NULL),
(3, 'Amealco', NULL, NULL, NULL, NULL),
(4, 'Área técnica de certificados', NULL, NULL, NULL, NULL),
(5, 'Avisos', NULL, NULL, NULL, NULL),
(6, 'Cadereyta', NULL, NULL, NULL, NULL),
(7, 'Certificados', NULL, NULL, NULL, NULL),
(8, 'Comercio', NULL, NULL, NULL, NULL),
(9, 'Comercio y certificaciones', NULL, NULL, NULL, NULL),
(10, 'Consulta electrónica', NULL, NULL, NULL, NULL),
(11, 'Copias certificadas', NULL, NULL, NULL, NULL),
(12, 'Desarrollo institucional', NULL, NULL, NULL, NULL),
(13, 'Digitalización', NULL, NULL, NULL, NULL),
(14, 'Digitalización (AGN)', NULL, NULL, NULL, NULL),
(15, 'Dirección', NULL, NULL, NULL, NULL),
(16, 'Encuadernación', NULL, NULL, NULL, NULL),
(17, 'Fraccionamientos y condominios', NULL, NULL, NULL, NULL),
(18, 'Impresión de avisos', NULL, NULL, NULL, NULL),
(19, 'Intendencia / Dirección', NULL, NULL, NULL, NULL),
(20, 'Jalpan', NULL, NULL, NULL, NULL),
(21, 'Jurídico', NULL, NULL, NULL, NULL),
(22, 'Jurídico certificados', NULL, NULL, NULL, NULL),
(23, 'Módulo de atención (PNC)', NULL, NULL, NULL, NULL),
(24, 'Oficialía de partes certificados', NULL, NULL, NULL, NULL),
(25, 'Oficialía de partes registro inmobiliario', NULL, NULL, NULL, NULL),
(26, 'Registro inmobiliario (Impresión Y Sellado)', NULL, NULL, NULL, NULL),
(27, 'Registro inmobiliario (Ordinario)', NULL, NULL, NULL, NULL),
(28, 'Registro inmobiliario (Sirenet)', NULL, NULL, NULL, NULL),
(29, 'Registro inmobiliario (Subdirección)', NULL, NULL, NULL, NULL),
(30, 'SJR', NULL, NULL, NULL, NULL),
(31, 'TIC´S', NULL, NULL, NULL, NULL),
(32, 'Toliman', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
CREATE TABLE IF NOT EXISTS `documentos` (
  `id_documento` int(11) NOT NULL AUTO_INCREMENT,
  `nom_documento` varchar(45) NOT NULL,
  `ver_documento` int(11) NOT NULL,
  `mod_documento` longtext NOT NULL,
  `area_documento` int(11) NOT NULL,
  `sec_documento` int(11) NOT NULL,
  `uc_documento` int(11) NOT NULL,
  `fc_documento` datetime NOT NULL,
  `path_documento` varchar(300) NOT NULL,
  `um_documento` int(11) DEFAULT NULL,
  `fm_documento` datetime DEFAULT NULL,
  PRIMARY KEY (`id_documento`),
  KEY `fk_Documento_AREAS1_idx` (`area_documento`),
  KEY `fk_Documento_SECCIONES1_idx` (`sec_documento`),
  KEY `fk_Documento_USUARIOS1_idx` (`um_documento`),
  KEY `fk_Documento_USUARIOS2_idx` (`uc_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `fech_evento` datetime NOT NULL,
  `desc_evento` longtext NOT NULL,
  `uc_evento` int(11) NOT NULL,
  `fc_evento` datetime NOT NULL,
  `um_evento` int(11) DEFAULT NULL,
  `fm_evento` datetime DEFAULT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `fk_EVENTOS_USUARIOS1_idx` (`uc_evento`),
  KEY `fk_EVENTOS_USUARIOS2_idx` (`um_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `accion_log` varchar(200) NOT NULL,
  `tipo_log` varchar(45) NOT NULL,
  `uc_log` int(11) NOT NULL,
  `fc_log` datetime NOT NULL,
  PRIMARY KEY (`id_log`),
  KEY `fk_LOGS_USUARIOS1_idx` (`uc_log`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id_log`, `accion_log`, `tipo_log`, `uc_log`, `fc_log`) VALUES
(40, 'El usuario Jesús Tinajero inicio sesión', 'Login', 1, '2016-03-11 22:37:50'),
(41, 'El usuario Jesús Tinajero cerro sesión', 'Login', 1, '2016-03-11 22:37:59'),
(42, 'El usuario Jesús Tinajero inicio sesión', 'Login', 1, '2016-03-11 22:42:37'),
(43, 'Actualizacion de la subdirección Amealco a Amealc', 'Subdirección', 1, '2016-03-11 22:43:25'),
(44, 'Actualizacion de la subdirección Amealc a Amealco', 'Subdirección', 1, '2016-03-11 22:43:46'),
(45, 'Cambio de estado a ''Inactivo'' del usuario Louie', 'Usuario', 1, '2016-03-11 22:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `procesos`
--

DROP TABLE IF EXISTS `procesos`;
CREATE TABLE IF NOT EXISTS `procesos` (
  `id_proceso` int(11) NOT NULL AUTO_INCREMENT,
  `nom_proceso` varchar(45) NOT NULL,
  `uc_proceso` int(11) DEFAULT NULL,
  `fc_proceso` datetime DEFAULT NULL,
  `um_proceso` int(11) DEFAULT NULL,
  `fm_proceso` datetime DEFAULT NULL,
  PRIMARY KEY (`id_proceso`),
  KEY `fk_PROCESOS_USUARIOS1_idx` (`uc_proceso`),
  KEY `fk_PROCESOS_USUARIOS2_idx` (`um_proceso`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `procesos`
--

INSERT INTO `procesos` (`id_proceso`, `nom_proceso`, `uc_proceso`, `fc_proceso`, `um_proceso`, `fm_proceso`) VALUES
(1, 'Dirección', NULL, NULL, NULL, NULL),
(2, 'Gestión', NULL, NULL, NULL, NULL),
(3, 'AGN', NULL, NULL, NULL, NULL),
(4, 'Registral foráneo', NULL, NULL, NULL, NULL),
(5, 'Áreas de apoyo', NULL, NULL, NULL, NULL),
(6, 'Inscripción', NULL, NULL, NULL, NULL),
(7, 'Certificación', NULL, NULL, NULL, NULL),
(8, 'Atención y servicio a usuarios', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `secciones`
--

DROP TABLE IF EXISTS `secciones`;
CREATE TABLE IF NOT EXISTS `secciones` (
  `id_seccion` int(11) NOT NULL AUTO_INCREMENT,
  `nom_seccion` varchar(45) NOT NULL,
  `uc_seccion` int(11) NOT NULL,
  `fc_seccion` datetime NOT NULL,
  `um_seccion` int(11) DEFAULT NULL,
  `fm_seccion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_seccion`),
  KEY `fk_SECCIONES_USUARIOS1_idx` (`uc_seccion`),
  KEY `fk_SECCIONES_USUARIOS2_idx` (`um_seccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
CREATE TABLE IF NOT EXISTS `servicios` (
  `id_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `nom_servicio` varchar(45) NOT NULL,
  `desc_servicio` longtext NOT NULL,
  `uc_servicio` int(11) NOT NULL,
  `fc_servicio` datetime NOT NULL,
  `um_servicio` int(11) DEFAULT NULL,
  `fm_servicio` datetime DEFAULT NULL,
  PRIMARY KEY (`id_servicio`),
  KEY `fk_SERVICIOS_USUARIOS1_idx` (`uc_servicio`),
  KEY `fk_SERVICIOS_USUARIOS2_idx` (`um_servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subdirecciones`
--

DROP TABLE IF EXISTS `subdirecciones`;
CREATE TABLE IF NOT EXISTS `subdirecciones` (
  `id_subdireccion` int(11) NOT NULL AUTO_INCREMENT,
  `nom_subdireccion` varchar(45) NOT NULL,
  `uc_subdireccion` int(11) DEFAULT NULL,
  `fc_subdireccion` datetime DEFAULT NULL,
  `um_subdireccion` int(11) DEFAULT NULL,
  `fm_subdireccion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_subdireccion`),
  KEY `fk_SUBDIRECCIONES_USUARIOS1_idx` (`uc_subdireccion`),
  KEY `fk_SUBDIRECCIONES_USUARIOS2_idx` (`um_subdireccion`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subdirecciones`
--

INSERT INTO `subdirecciones` (`id_subdireccion`, `nom_subdireccion`, `uc_subdireccion`, `fc_subdireccion`, `um_subdireccion`, `fm_subdireccion`) VALUES
(1, 'Querétaro-Dirección', NULL, NULL, NULL, NULL),
(2, 'Querétaro-AGN', NULL, NULL, NULL, NULL),
(3, 'Querétaro', NULL, NULL, NULL, NULL),
(4, 'Amealco', NULL, NULL, 1, '2016-03-11 22:43:46'),
(5, 'Querétaro R. Inmobiliario', NULL, NULL, NULL, NULL),
(6, 'Querétaro Comercio Y Certificaciones', NULL, NULL, NULL, NULL),
(7, 'SJR', NULL, NULL, NULL, NULL),
(8, 'Jalpan', NULL, NULL, NULL, NULL),
(9, 'Cadereyta', NULL, NULL, NULL, NULL),
(10, 'Toliman', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `no_usuario` int(11) NOT NULL,
  `nom_usuario` varchar(60) NOT NULL,
  `pass_usuario` varchar(32) NOT NULL,
  `email_usuario` varchar(45) NOT NULL,
  `tel_usuario` varchar(100) DEFAULT NULL,
  `ext_usuario` varchar(100) DEFAULT NULL,
  `subdir_usuario` int(11) NOT NULL,
  `area_usuario` int(11) NOT NULL,
  `proc_usuario` int(11) NOT NULL,
  `nivel_usuario` varchar(45) NOT NULL,
  `status_usuario` varchar(45) NOT NULL,
  `uc_usuario` int(11) DEFAULT NULL,
  `fc_usuario` datetime DEFAULT NULL,
  `um_usuario` int(11) DEFAULT NULL,
  `fm_usuario` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_USUARIOS_PROCESOS1_idx` (`proc_usuario`),
  KEY `fk_USUARIOS_SUBDIRECCIONES1_idx` (`subdir_usuario`),
  KEY `fk_USUARIOS_AREAS1_idx` (`area_usuario`),
  KEY `fk_USUARIOS_USUARIOS1_idx` (`uc_usuario`),
  KEY `fk_USUARIOS_USUARIOS2_idx` (`um_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `no_usuario`, `nom_usuario`, `pass_usuario`, `email_usuario`, `tel_usuario`, `ext_usuario`, `subdir_usuario`, `area_usuario`, `proc_usuario`, `nivel_usuario`, `status_usuario`, `uc_usuario`, `fc_usuario`, `um_usuario`, `fm_usuario`) VALUES
(1, 12002051, 'Jesús Tinajero', '25d55ad283aa400af464c76d713c07ad', 'bimbo060@hotmail.com', '(###) ###- ###', '.ext( #### )', 6, 17, 8, 'Administrador', 'Activo', NULL, NULL, 1, '2016-03-11 20:22:59'),
(2, 12002035, 'Louie', '25d55ad283aa400af464c76d713c07ad', 'louie@gmail.com', '(###) ###- ###', '.ext( #### )', 1, 1, 1, 'Usuario', 'Inactivo', 1, '2016-03-11 20:23:47', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `fk_AREAS_USUARIOS1` FOREIGN KEY (`uc_area`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_AREAS_USUARIOS2` FOREIGN KEY (`um_area`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `fk_Documento_AREAS1` FOREIGN KEY (`area_documento`) REFERENCES `areas` (`id_area`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Documento_SECCIONES1` FOREIGN KEY (`sec_documento`) REFERENCES `secciones` (`id_seccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Documento_USUARIOS1` FOREIGN KEY (`um_documento`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Documento_USUARIOS2` FOREIGN KEY (`uc_documento`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `fk_EVENTOS_USUARIOS1` FOREIGN KEY (`uc_evento`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_EVENTOS_USUARIOS2` FOREIGN KEY (`um_evento`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_LOGS_USUARIOS1` FOREIGN KEY (`uc_log`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `procesos`
--
ALTER TABLE `procesos`
  ADD CONSTRAINT `fk_PROCESOS_USUARIOS1` FOREIGN KEY (`uc_proceso`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PROCESOS_USUARIOS2` FOREIGN KEY (`um_proceso`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `secciones`
--
ALTER TABLE `secciones`
  ADD CONSTRAINT `fk_SECCIONES_USUARIOS1` FOREIGN KEY (`uc_seccion`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SECCIONES_USUARIOS2` FOREIGN KEY (`um_seccion`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `fk_SERVICIOS_USUARIOS1` FOREIGN KEY (`uc_servicio`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SERVICIOS_USUARIOS2` FOREIGN KEY (`um_servicio`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subdirecciones`
--
ALTER TABLE `subdirecciones`
  ADD CONSTRAINT `fk_SUBDIRECCIONES_USUARIOS1` FOREIGN KEY (`uc_subdireccion`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SUBDIRECCIONES_USUARIOS2` FOREIGN KEY (`um_subdireccion`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_USUARIOS_AREAS1` FOREIGN KEY (`area_usuario`) REFERENCES `areas` (`id_area`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USUARIOS_PROCESOS1` FOREIGN KEY (`proc_usuario`) REFERENCES `procesos` (`id_proceso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USUARIOS_SUBDIRECCIONES1` FOREIGN KEY (`subdir_usuario`) REFERENCES `subdirecciones` (`id_subdireccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USUARIOS_USUARIOS1` FOREIGN KEY (`uc_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USUARIOS_USUARIOS2` FOREIGN KEY (`um_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
