-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2016 at 05:22 PM
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
  `nom_area` varchar(100) NOT NULL,
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
  `nom_documento` varchar(200) NOT NULL,
  `ver_documento` int(11) NOT NULL,
  `mod_documento` longtext NOT NULL,
  `sec_documento` int(11) NOT NULL,
  `uc_documento` int(11) NOT NULL,
  `fc_documento` datetime NOT NULL,
  `path_documento` varchar(1000) NOT NULL,
  `ext_documento` varchar(20) NOT NULL,
  `um_documento` int(11) DEFAULT NULL,
  `fm_documento` datetime DEFAULT NULL,
  PRIMARY KEY (`id_documento`),
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
  `tit_evento` varchar(100) NOT NULL,
  `cont_evento` longtext NOT NULL,
  `fech_evento` datetime NOT NULL,
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
  `accion_log` varchar(600) NOT NULL,
  `tipo_log` varchar(45) NOT NULL,
  `uc_log` int(11) NOT NULL,
  `fc_log` datetime NOT NULL,
  PRIMARY KEY (`id_log`),
  KEY `fk_LOGS_USUARIOS1_idx` (`uc_log`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE IF NOT EXISTS `noticias` (
  `id_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `tit_noticia` varchar(100) NOT NULL,
  `cont_noticia` longtext NOT NULL,
  `prior_noticia` varchar(45) NOT NULL,
  `uc_noticia` int(11) NOT NULL,
  `fc_noticia` datetime NOT NULL,
  `um_noticia` int(11) DEFAULT NULL,
  `fm_noticia` datetime DEFAULT NULL,
  PRIMARY KEY (`id_noticia`),
  KEY `fk_SERVICIOS_USUARIOS1_idx` (`uc_noticia`),
  KEY `fk_SERVICIOS_USUARIOS2_idx` (`um_noticia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pps`
--

DROP TABLE IF EXISTS `pps`;
CREATE TABLE IF NOT EXISTS `pps` (
  `id_pps` int(11) NOT NULL AUTO_INCREMENT,
  `idp_pps` int(11) NOT NULL,
  `ids_pps` int(11) NOT NULL,
  `uc_pps` int(11) DEFAULT NULL,
  `fc_pps` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pps`,`idp_pps`,`ids_pps`),
  KEY `fk_PROCESOS_has_SUBDIRECCIONES_SUBDIRECCIONES1_idx` (`ids_pps`),
  KEY `fk_PROCESOS_has_SUBDIRECCIONES_PROCESOS1_idx` (`idp_pps`),
  KEY `fk_PPS_USUARIOS1_idx` (`uc_pps`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pps`
--

INSERT INTO `pps` (`id_pps`, `idp_pps`, `ids_pps`, `uc_pps`, `fc_pps`) VALUES
(1, 1, 7, NULL, NULL),
(2, 2, 8, NULL, NULL),
(3, 3, 5, NULL, NULL),
(4, 3, 8, NULL, NULL),
(5, 4, 5, NULL, NULL),
(6, 5, 8, NULL, NULL),
(7, 6, 8, NULL, NULL),
(8, 7, 6, NULL, NULL),
(9, 7, 8, NULL, NULL),
(10, 8, 1, NULL, NULL),
(11, 8, 9, NULL, NULL),
(12, 8, 3, NULL, NULL),
(13, 8, 2, NULL, NULL),
(14, 8, 10, NULL, NULL),
(16, 8, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `procesos`
--

DROP TABLE IF EXISTS `procesos`;
CREATE TABLE IF NOT EXISTS `procesos` (
  `id_proceso` int(11) NOT NULL AUTO_INCREMENT,
  `nom_proceso` varchar(100) NOT NULL,
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
(1, 'AGN', NULL, NULL, NULL, NULL),
(2, 'Áreas de apoyo', NULL, NULL, NULL, NULL),
(3, 'Atención y servicio a usuarios', NULL, NULL, NULL, NULL),
(4, 'Certificación', NULL, NULL, NULL, NULL),
(5, 'Dirección', NULL, NULL, NULL, NULL),
(6, 'Gestión', NULL, NULL, NULL, NULL),
(7, 'Inscripción', NULL, NULL, NULL, NULL),
(8, 'Registral foráneo', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `secciones`
--

DROP TABLE IF EXISTS `secciones`;
CREATE TABLE IF NOT EXISTS `secciones` (
  `id_seccion` int(11) NOT NULL AUTO_INCREMENT,
  `nom_seccion` varchar(100) NOT NULL,
  `path_seccion` varchar(1000) NOT NULL,
  `uc_seccion` int(11) NOT NULL,
  `fc_seccion` datetime NOT NULL,
  `um_seccion` int(11) DEFAULT NULL,
  `fm_seccion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_seccion`),
  KEY `fk_SECCIONES_USUARIOS1_idx` (`uc_seccion`),
  KEY `fk_SECCIONES_USUARIOS2_idx` (`um_seccion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `secciones`
--

INSERT INTO `secciones` (`id_seccion`, `nom_seccion`, `path_seccion`, `uc_seccion`, `fc_seccion`, `um_seccion`, `fm_seccion`) VALUES
(1, 'Repositorio', 'mods/Secciones', 1, '2016-03-03 22:52:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spa`
--

DROP TABLE IF EXISTS `spa`;
CREATE TABLE IF NOT EXISTS `spa` (
  `id_spa` int(11) NOT NULL AUTO_INCREMENT,
  `ids_spa` int(11) NOT NULL,
  `ida_spa` int(11) NOT NULL,
  `uc_spa` int(11) DEFAULT NULL,
  `fc_spa` datetime DEFAULT NULL,
  PRIMARY KEY (`id_spa`,`ids_spa`,`ida_spa`),
  KEY `fk_SUBDIRECCIONES_has_AREAS_AREAS1_idx` (`ida_spa`),
  KEY `fk_SUBDIRECCIONES_has_AREAS_SUBDIRECCIONES1_idx` (`ids_spa`),
  KEY `fk_SPA_USUARIOS1_idx` (`uc_spa`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spa`
--

INSERT INTO `spa` (`id_spa`, `ids_spa`, `ida_spa`, `uc_spa`, `fc_spa`) VALUES
(1, 7, 2, NULL, NULL),
(2, 8, 13, NULL, NULL),
(3, 8, 16, NULL, NULL),
(4, 5, 10, NULL, NULL),
(5, 8, 23, NULL, NULL),
(6, 5, 22, NULL, NULL),
(7, 5, 7, NULL, NULL),
(8, 5, 8, NULL, NULL),
(9, 5, 11, NULL, NULL),
(10, 5, 5, NULL, NULL),
(11, 5, 9, NULL, NULL),
(12, 5, 18, NULL, NULL),
(13, 5, 4, NULL, NULL),
(14, 5, 24, NULL, NULL),
(15, 8, 15, NULL, NULL),
(16, 8, 21, NULL, NULL),
(17, 8, 1, NULL, NULL),
(18, 8, 31, NULL, NULL),
(19, 8, 12, NULL, NULL),
(20, 8, 19, NULL, NULL),
(21, 6, 26, NULL, NULL),
(22, 6, 25, NULL, NULL),
(23, 6, 29, NULL, NULL),
(24, 6, 27, NULL, NULL),
(25, 6, 28, NULL, NULL),
(26, 8, 17, NULL, NULL),
(27, 1, 3, NULL, NULL),
(28, 9, 30, NULL, NULL),
(29, 3, 20, NULL, NULL),
(30, 2, 6, NULL, NULL),
(31, 10, 32, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subdirecciones`
--

DROP TABLE IF EXISTS `subdirecciones`;
CREATE TABLE IF NOT EXISTS `subdirecciones` (
  `id_subdireccion` int(11) NOT NULL AUTO_INCREMENT,
  `nom_subdireccion` varchar(100) NOT NULL,
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
(1, 'Amealco', NULL, NULL, NULL, NULL),
(2, 'Cadereyta', NULL, NULL, NULL, NULL),
(3, 'Jalpan', NULL, NULL, NULL, NULL),
(4, 'Querétaro', NULL, NULL, NULL, NULL),
(5, 'Querétaro / Comercio Y Certificaciones', NULL, NULL, NULL, NULL),
(6, 'Querétaro / Registro Inmobiliario', NULL, NULL, NULL, NULL),
(7, 'AGN', NULL, NULL, NULL, NULL),
(8, 'Dirección ', NULL, NULL, NULL, NULL),
(9, 'SJR', NULL, NULL, NULL, NULL),
(10, 'Toliman', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `no_usuario` int(11) NOT NULL,
  `nom_usuario` varchar(100) NOT NULL,
  `pass_usuario` varchar(32) NOT NULL,
  `email_usuario` varchar(80) NOT NULL,
  `tel_usuario` varchar(100) DEFAULT NULL,
  `ext_usuario` varchar(100) DEFAULT NULL,
  `subdir_usuario` int(11) NOT NULL,
  `area_usuario` int(11) NOT NULL,
  `proc_usuario` int(11) NOT NULL,
  `nivel_usuario` varchar(45) NOT NULL,
  `status_usuario` varchar(45) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `no_usuario`, `nom_usuario`, `pass_usuario`, `email_usuario`, `tel_usuario`, `ext_usuario`, `subdir_usuario`, `area_usuario`, `proc_usuario`, `nivel_usuario`, `status_usuario`, `uc_usuario`, `fc_usuario`, `um_usuario`, `fm_usuario`) VALUES
(1, 0, 'Administrador', '25d55ad283aa400af464c76d713c07ad', 'default', 'N/D', 'N/D', 6, 25, 7, 'Administrador', 'Activo', NULL, NULL, NULL, NULL);

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
-- Constraints for table `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `fk_SERVICIOS_USUARIOS1` FOREIGN KEY (`uc_noticia`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SERVICIOS_USUARIOS2` FOREIGN KEY (`um_noticia`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pps`
--
ALTER TABLE `pps`
  ADD CONSTRAINT `fk_PPS_USUARIOS1` FOREIGN KEY (`uc_pps`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PROCESOS_has_SUBDIRECCIONES_PROCESOS1` FOREIGN KEY (`idp_pps`) REFERENCES `procesos` (`id_proceso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PROCESOS_has_SUBDIRECCIONES_SUBDIRECCIONES1` FOREIGN KEY (`ids_pps`) REFERENCES `subdirecciones` (`id_subdireccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `spa`
--
ALTER TABLE `spa`
  ADD CONSTRAINT `fk_SPA_USUARIOS1` FOREIGN KEY (`uc_spa`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SUBDIRECCIONES_has_AREAS_AREAS1` FOREIGN KEY (`ida_spa`) REFERENCES `areas` (`id_area`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SUBDIRECCIONES_has_AREAS_SUBDIRECCIONES1` FOREIGN KEY (`ids_spa`) REFERENCES `subdirecciones` (`id_subdireccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
