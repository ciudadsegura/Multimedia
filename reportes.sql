-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
SHOW WARNINGS;
-- -----------------------------------------------------
-- Schema reportes
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `reportes` ;

-- -----------------------------------------------------
-- Schema reportes
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `reportes` DEFAULT CHARACTER SET utf8 ;
SHOW WARNINGS;
USE `reportes` ;

-- -----------------------------------------------------
-- Table `reportes`.`cuadrillas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reportes`.`cuadrillas` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `reportes`.`cuadrillas` (
  `idcuadrillas` INT(11) NOT NULL,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `tipo` VARCHAR(45) NULL DEFAULT NULL,
  `canastilla` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idcuadrillas`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `reportes`.`tickets`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reportes`.`tickets` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `reportes`.`tickets` (
  `ticket` INT(10) NOT NULL,
  `full_category_name` VARCHAR(250) NULL DEFAULT NULL,
  `ps_name` VARCHAR(75) NULL DEFAULT NULL,
  `place_name` VARCHAR(75) NULL DEFAULT NULL,
  `id_ci` VARCHAR(45) NULL DEFAULT NULL,
  `description_coments` TEXT NULL DEFAULT NULL,
  `closing_time` VARCHAR(40) NULL DEFAULT NULL,
  `create_time` VARCHAR(40) NULL DEFAULT NULL,
  `incident_priority` VARCHAR(45) NULL DEFAULT NULL,
  `incident_status` VARCHAR(45) NULL DEFAULT NULL,
  `incident_type` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`ticket`))
ENGINE = MyISAM
AUTO_INCREMENT = 11355
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `reportes`.`bolsa_de_trabajo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reportes`.`bolsa_de_trabajo` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `reportes`.`bolsa_de_trabajo` (
  `idbolsa_de_trabajo` INT(11) NOT NULL,
  `fecha_asignacion` DATETIME NULL DEFAULT NULL,
  `fecha_de_atencion` DATETIME NULL DEFAULT NULL,
  `cuadrillas_idcuadrillas` INT(11) NOT NULL,
  `tickets_ticket` INT(10) NOT NULL,
  PRIMARY KEY (`idbolsa_de_trabajo`, `cuadrillas_idcuadrillas`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_bolsa_de_trabajo_cuadrillas1_idx` ON `reportes`.`bolsa_de_trabajo` (`cuadrillas_idcuadrillas` ASC);

SHOW WARNINGS;
CREATE INDEX `fk_bolsa_de_trabajo_tickets1_idx` ON `reportes`.`bolsa_de_trabajo` (`tickets_ticket` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `reportes`.`reportes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reportes`.`reportes` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `reportes`.`reportes` (
  `idreporte_grafico` INT(11) NOT NULL AUTO_INCREMENT,
  `folio` INT(5) NULL DEFAULT NULL,
  `id_stv` VARCHAR(45) NULL DEFAULT NULL,
  `area_tipo` VARCHAR(75) NULL DEFAULT NULL,
  `clasificacion_objtivo` VARCHAR(75) NULL DEFAULT NULL,
  `domicilio` VARCHAR(150) NOT NULL,
  `descripcion_general_daño` VARCHAR(250) NULL DEFAULT NULL,
  `descripcion_general_daño_case` VARCHAR(250) NULL DEFAULT NULL,
  `fech_descrip_gnrl_daño` DATETIME NULL DEFAULT NULL,
  `fech_descrip_gnrl_daño_case` DATETIME NULL DEFAULT NULL,
  `cableado_obra_civil` VARCHAR(250) NULL DEFAULT NULL,
  `poste_y_brazo` VARCHAR(250) NULL DEFAULT NULL,
  `gepe` VARCHAR(250) NULL DEFAULT NULL,
  `interfon_altavoces_camaral` VARCHAR(250) NULL DEFAULT NULL,
  `tipo_reporte` INT(1) NOT NULL,
  `costo_e_obra_civil` FLOAT NULL,
  `costo_e_cableado` FLOAT NULL,
  `costo_e_soldado_tapas` FLOAT NULL,
  `total_estimado` FLOAT NULL,
  `conclusion_soldado` VARCHAR(45) NULL,
  `solicitud_case` VARCHAR(45) NULL,
  `realiza` VARCHAR(45) NULL,
  `proovedor` VARCHAR(45) NULL,
  `tapa_cable` TINYINT(1) NULL,
  `tapa_botonera` TINYINT(1) NULL,
  `tapa_otro` TINYINT(1) NULL,
  `desc_otro` VARCHAR(45) NULL,
  `tickets_ticket` INT(10) NOT NULL,
  PRIMARY KEY (`idreporte_grafico`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_reportes_tickets1_idx` ON `reportes`.`reportes` (`tickets_ticket` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `reportes`.`evidencia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reportes`.`evidencia` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `reportes`.`evidencia` (
  `idevidencia_report_grafico` INT(11) NOT NULL,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `direccion` VARCHAR(100) NULL DEFAULT NULL,
  `fecha_registro` DATETIME NULL DEFAULT NULL,
  `estatus` VARCHAR(45) NULL DEFAULT NULL,
  `reporte_grafico_idreporte_grafico` INT(11) NOT NULL,
  `comentarios` VARCHAR(255) NULL,
  `tickets_ticket` INT(10) NOT NULL,
  PRIMARY KEY (`idevidencia_report_grafico`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_evidencia_report_grafico_reporte_grafico1_idx` ON `reportes`.`evidencia` (`reporte_grafico_idreporte_grafico` ASC);

SHOW WARNINGS;
CREATE INDEX `fk_evidencia_tickets1_idx` ON `reportes`.`evidencia` (`tickets_ticket` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `reportes`.`perfiles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reportes`.`perfiles` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `reportes`.`perfiles` (
  `idperfiles` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `descripcion` VARCHAR(500) NULL DEFAULT NULL,
  `estatus` INT(11) NULL DEFAULT NULL,
  `fecha_registro` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`idperfiles`))
ENGINE = MyISAM
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `reportes`.`tickts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reportes`.`tickts` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `reportes`.`tickts` (
  `ticket` INT(10) NOT NULL,
  `full_category_name` VARCHAR(250) NULL DEFAULT NULL,
  `ps_name` VARCHAR(75) NULL DEFAULT NULL,
  `place_name` VARCHAR(75) NULL DEFAULT NULL,
  `id_ci` VARCHAR(45) NULL DEFAULT NULL,
  `description_coments` TEXT NULL DEFAULT NULL,
  `closing_time` DATETIME NULL DEFAULT NULL,
  `create_time` DATETIME NULL DEFAULT NULL,
  `incident_priority` VARCHAR(45) NULL DEFAULT NULL,
  `incident_status` VARCHAR(45) NULL DEFAULT NULL,
  `incident_type` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`ticket`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `reportes`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reportes`.`usuarios` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `reportes`.`usuarios` (
  `idusuarios` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(150) NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `contrasena` VARCHAR(45) NOT NULL,
  `foto` VARCHAR(250) NULL DEFAULT NULL,
  `estatus` INT(11) NOT NULL,
  `fecha_registro` DATETIME NOT NULL,
  `telefono` VARCHAR(45) NULL DEFAULT NULL,
  `perfiles_idperfiles` INT(11) NOT NULL,
  PRIMARY KEY (`idusuarios`, `perfiles_idperfiles`))
ENGINE = MyISAM
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_usuarios_perfiles_idx1` ON `reportes`.`usuarios` (`perfiles_idperfiles` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `reportes`.`cuadrillas_has_usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reportes`.`cuadrillas_has_usuarios` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `reportes`.`cuadrillas_has_usuarios` (
  `cuadrillas_idcuadrillas` INT(11) NOT NULL,
  `usuarios_idusuarios` INT(11) NOT NULL,
  `usuarios_perfiles_idperfiles` INT(11) NOT NULL,
  PRIMARY KEY (`cuadrillas_idcuadrillas`, `usuarios_idusuarios`, `usuarios_perfiles_idperfiles`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;
CREATE INDEX `fk_cuadrillas_has_usuarios_usuarios1_idx` ON `reportes`.`cuadrillas_has_usuarios` (`usuarios_idusuarios` ASC, `usuarios_perfiles_idperfiles` ASC);

SHOW WARNINGS;
CREATE INDEX `fk_cuadrillas_has_usuarios_cuadrillas1_idx` ON `reportes`.`cuadrillas_has_usuarios` (`cuadrillas_idcuadrillas` ASC);

SHOW WARNINGS;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
