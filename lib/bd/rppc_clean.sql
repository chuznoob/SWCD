-- MySQL Workbench Synchronization
-- Generated: 2016-03-15 01:59
-- Model: RPPC
-- Version: 1.0
-- Project: SWCD-RPPC
-- Author: Jesús Tinajero

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `rppc` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `rppc`.`USUARIOS` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `no_usuario` INT(11) NOT NULL,
  `nom_usuario` VARCHAR(100) NOT NULL,
  `pass_usuario` VARCHAR(32) NOT NULL,
  `email_usuario` VARCHAR(80) NOT NULL,
  `tel_usuario` VARCHAR(100) NULL DEFAULT NULL,
  `ext_usuario` VARCHAR(100) NULL DEFAULT NULL,
  `subdir_usuario` INT(11) NOT NULL,
  `area_usuario` INT(11) NOT NULL,
  `proc_usuario` INT(11) NOT NULL,
  `nivel_usuario` VARCHAR(45) NOT NULL,
  `status_usuario` VARCHAR(45) NULL DEFAULT NULL,
  `uc_usuario` INT(11) NULL DEFAULT NULL,
  `fc_usuario` DATETIME NULL DEFAULT NULL,
  `um_usuario` INT(11) NULL DEFAULT NULL,
  `fm_usuario` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  INDEX `fk_USUARIOS_PROCESOS1_idx` (`proc_usuario` ASC),
  INDEX `fk_USUARIOS_SUBDIRECCIONES1_idx` (`subdir_usuario` ASC),
  INDEX `fk_USUARIOS_AREAS1_idx` (`area_usuario` ASC),
  INDEX `fk_USUARIOS_USUARIOS1_idx` (`uc_usuario` ASC),
  INDEX `fk_USUARIOS_USUARIOS2_idx` (`um_usuario` ASC),
  CONSTRAINT `fk_USUARIOS_PROCESOS1`
    FOREIGN KEY (`proc_usuario`)
    REFERENCES `rppc`.`PROCESOS` (`id_proceso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USUARIOS_SUBDIRECCIONES1`
    FOREIGN KEY (`subdir_usuario`)
    REFERENCES `rppc`.`SUBDIRECCIONES` (`id_subdireccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USUARIOS_AREAS1`
    FOREIGN KEY (`area_usuario`)
    REFERENCES `rppc`.`AREAS` (`id_area`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USUARIOS_USUARIOS1`
    FOREIGN KEY (`uc_usuario`)
    REFERENCES `rppc`.`USUARIOS` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USUARIOS_USUARIOS2`
    FOREIGN KEY (`um_usuario`)
    REFERENCES `rppc`.`USUARIOS` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `rppc`.`SUBDIRECCIONES` (
  `id_subdireccion` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_subdireccion` VARCHAR(100) NOT NULL,
  `uc_subdireccion` INT(11) NULL DEFAULT NULL,
  `fc_subdireccion` DATETIME NULL DEFAULT NULL,
  `um_subdireccion` INT(11) NULL DEFAULT NULL,
  `fm_subdireccion` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id_subdireccion`),
  INDEX `fk_SUBDIRECCIONES_USUARIOS1_idx` (`uc_subdireccion` ASC),
  INDEX `fk_SUBDIRECCIONES_USUARIOS2_idx` (`um_subdireccion` ASC),
  CONSTRAINT `fk_SUBDIRECCIONES_USUARIOS1`
    FOREIGN KEY (`uc_subdireccion`)
    REFERENCES `rppc`.`USUARIOS` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SUBDIRECCIONES_USUARIOS2`
    FOREIGN KEY (`um_subdireccion`)
    REFERENCES `rppc`.`USUARIOS` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `rppc`.`AREAS` (
  `id_area` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_area` VARCHAR(100) NOT NULL,
  `uc_area` INT(11) NULL DEFAULT NULL,
  `fc_area` DATETIME NULL DEFAULT NULL,
  `um_area` INT(11) NULL DEFAULT NULL,
  `fm_area` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id_area`),
  INDEX `fk_AREAS_USUARIOS1_idx` (`uc_area` ASC),
  INDEX `fk_AREAS_USUARIOS2_idx` (`um_area` ASC),
  CONSTRAINT `fk_AREAS_USUARIOS1`
    FOREIGN KEY (`uc_area`)
    REFERENCES `rppc`.`USUARIOS` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_AREAS_USUARIOS2`
    FOREIGN KEY (`um_area`)
    REFERENCES `rppc`.`USUARIOS` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `rppc`.`PROCESOS` (
  `id_proceso` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_proceso` VARCHAR(100) NOT NULL,
  `uc_proceso` INT(11) NULL DEFAULT NULL,
  `fc_proceso` DATETIME NULL DEFAULT NULL,
  `um_proceso` INT(11) NULL DEFAULT NULL,
  `fm_proceso` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id_proceso`),
  INDEX `fk_PROCESOS_USUARIOS1_idx` (`uc_proceso` ASC),
  INDEX `fk_PROCESOS_USUARIOS2_idx` (`um_proceso` ASC),
  CONSTRAINT `fk_PROCESOS_USUARIOS1`
    FOREIGN KEY (`uc_proceso`)
    REFERENCES `rppc`.`USUARIOS` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PROCESOS_USUARIOS2`
    FOREIGN KEY (`um_proceso`)
    REFERENCES `rppc`.`USUARIOS` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `rppc`.`DOCUMENTOS` (
  `id_documento` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_documento` VARCHAR(200) NOT NULL,
  `ver_documento` INT(11) NOT NULL,
  `mod_documento` LONGTEXT NOT NULL,
  `sec_documento` INT(11) NOT NULL,
  `uc_documento` INT(11) NOT NULL,
  `fc_documento` DATETIME NOT NULL,
  `path_documento` VARCHAR(1000) NOT NULL,
  `ext_documento` VARCHAR(20) NOT NULL,
  `um_documento` INT(11) NULL DEFAULT NULL,
  `fm_documento` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id_documento`),
  INDEX `fk_Documento_SECCIONES1_idx` (`sec_documento` ASC),
  INDEX `fk_Documento_USUARIOS1_idx` (`um_documento` ASC),
  INDEX `fk_Documento_USUARIOS2_idx` (`uc_documento` ASC),
  CONSTRAINT `fk_Documento_SECCIONES1`
    FOREIGN KEY (`sec_documento`)
    REFERENCES `rppc`.`SECCIONES` (`id_seccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Documento_USUARIOS1`
    FOREIGN KEY (`um_documento`)
    REFERENCES `rppc`.`USUARIOS` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Documento_USUARIOS2`
    FOREIGN KEY (`uc_documento`)
    REFERENCES `rppc`.`USUARIOS` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `rppc`.`SECCIONES` (
  `id_seccion` INT(11) NOT NULL AUTO_INCREMENT,
  `nom_seccion` VARCHAR(100) NOT NULL,
  `path_seccion` VARCHAR(1000) NOT NULL,
  `uc_seccion` INT(11) NOT NULL,
  `fc_seccion` DATETIME NOT NULL,
  `um_seccion` INT(11) NULL DEFAULT NULL,
  `fm_seccion` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id_seccion`),
  INDEX `fk_SECCIONES_USUARIOS1_idx` (`uc_seccion` ASC),
  INDEX `fk_SECCIONES_USUARIOS2_idx` (`um_seccion` ASC),
  CONSTRAINT `fk_SECCIONES_USUARIOS1`
    FOREIGN KEY (`uc_seccion`)
    REFERENCES `rppc`.`USUARIOS` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SECCIONES_USUARIOS2`
    FOREIGN KEY (`um_seccion`)
    REFERENCES `rppc`.`USUARIOS` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `rppc`.`LOGS` (
  `id_log` INT(11) NOT NULL AUTO_INCREMENT,
  `accion_log` VARCHAR(600) NOT NULL,
  `tipo_log` VARCHAR(45) NOT NULL,
  `uc_log` INT(11) NOT NULL,
  `fc_log` DATETIME NOT NULL,
  PRIMARY KEY (`id_log`),
  INDEX `fk_LOGS_USUARIOS1_idx` (`uc_log` ASC),
  CONSTRAINT `fk_LOGS_USUARIOS1`
    FOREIGN KEY (`uc_log`)
    REFERENCES `rppc`.`USUARIOS` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `rppc`.`EVENTOS` (
  `id_evento` INT(11) NOT NULL AUTO_INCREMENT,
  `tit_evento` VARCHAR(100) NOT NULL,
  `cont_evento` LONGTEXT NOT NULL,
  `fech_evento` DATETIME NOT NULL,
  `uc_evento` INT(11) NOT NULL,
  `fc_evento` DATETIME NOT NULL,
  `um_evento` INT(11) NULL DEFAULT NULL,
  `fm_evento` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id_evento`),
  INDEX `fk_EVENTOS_USUARIOS1_idx` (`uc_evento` ASC),
  INDEX `fk_EVENTOS_USUARIOS2_idx` (`um_evento` ASC),
  CONSTRAINT `fk_EVENTOS_USUARIOS1`
    FOREIGN KEY (`uc_evento`)
    REFERENCES `rppc`.`USUARIOS` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_EVENTOS_USUARIOS2`
    FOREIGN KEY (`um_evento`)
    REFERENCES `rppc`.`USUARIOS` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `rppc`.`NOTICIAS` (
  `id_noticia` INT(11) NOT NULL AUTO_INCREMENT,
  `tit_noticia` VARCHAR(100) NOT NULL,
  `cont_noticia` LONGTEXT NOT NULL,
  `prior_noticia` VARCHAR(45) NOT NULL,
  `uc_noticia` INT(11) NOT NULL,
  `fc_noticia` DATETIME NOT NULL,
  `um_noticia` INT(11) NULL DEFAULT NULL,
  `fm_noticia` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id_noticia`),
  INDEX `fk_SERVICIOS_USUARIOS1_idx` (`uc_noticia` ASC),
  INDEX `fk_SERVICIOS_USUARIOS2_idx` (`um_noticia` ASC),
  CONSTRAINT `fk_SERVICIOS_USUARIOS1`
    FOREIGN KEY (`uc_noticia`)
    REFERENCES `rppc`.`USUARIOS` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SERVICIOS_USUARIOS2`
    FOREIGN KEY (`um_noticia`)
    REFERENCES `rppc`.`USUARIOS` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `rppc`.`PPS` (
  `id_pps` INT(11) NOT NULL AUTO_INCREMENT,
  `idp_pps` INT(11) NOT NULL,
  `ids_pps` INT(11) NOT NULL,
  `uc_pps` INT(11) NULL DEFAULT NULL,
  `fc_pps` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id_pps`, `idp_pps`, `ids_pps`),
  INDEX `fk_PROCESOS_has_SUBDIRECCIONES_SUBDIRECCIONES1_idx` (`ids_pps` ASC),
  INDEX `fk_PROCESOS_has_SUBDIRECCIONES_PROCESOS1_idx` (`idp_pps` ASC),
  INDEX `fk_PPS_USUARIOS1_idx` (`uc_pps` ASC),
  CONSTRAINT `fk_PROCESOS_has_SUBDIRECCIONES_PROCESOS1`
    FOREIGN KEY (`idp_pps`)
    REFERENCES `rppc`.`PROCESOS` (`id_proceso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PROCESOS_has_SUBDIRECCIONES_SUBDIRECCIONES1`
    FOREIGN KEY (`ids_pps`)
    REFERENCES `rppc`.`SUBDIRECCIONES` (`id_subdireccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PPS_USUARIOS1`
    FOREIGN KEY (`uc_pps`)
    REFERENCES `rppc`.`USUARIOS` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `rppc`.`SPA` (
  `id_spa` INT(11) NOT NULL AUTO_INCREMENT,
  `ids_spa` INT(11) NOT NULL,
  `ida_spa` INT(11) NOT NULL,
  `uc_spa` INT(11) NULL DEFAULT NULL,
  `fc_spa` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id_spa`, `ids_spa`, `ida_spa`),
  INDEX `fk_SUBDIRECCIONES_has_AREAS_AREAS1_idx` (`ida_spa` ASC),
  INDEX `fk_SUBDIRECCIONES_has_AREAS_SUBDIRECCIONES1_idx` (`ids_spa` ASC),
  INDEX `fk_SPA_USUARIOS1_idx` (`uc_spa` ASC),
  CONSTRAINT `fk_SUBDIRECCIONES_has_AREAS_SUBDIRECCIONES1`
    FOREIGN KEY (`ids_spa`)
    REFERENCES `rppc`.`SUBDIRECCIONES` (`id_subdireccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SUBDIRECCIONES_has_AREAS_AREAS1`
    FOREIGN KEY (`ida_spa`)
    REFERENCES `rppc`.`AREAS` (`id_area`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SPA_USUARIOS1`
    FOREIGN KEY (`uc_spa`)
    REFERENCES `rppc`.`USUARIOS` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;