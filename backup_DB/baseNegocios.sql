/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.21-MariaDB : Database - baseNegocios
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `baseNegocios`;

/*Table structure for table `bitacora` */

DROP TABLE IF EXISTS `bitacora`;

CREATE TABLE `bitacora` (
  `id_bit` int(11) NOT NULL AUTO_INCREMENT,
  `accion` varchar(100) DEFAULT NULL,
  `tabla` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_bit`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Table structure for table `comentarios` */

DROP TABLE IF EXISTS `comentarios`;

CREATE TABLE `comentarios` (
  `idco` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(500) DEFAULT NULL,
  `idd` int(11) DEFAULT NULL,
  `activo` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`idco`),
  KEY `idd` (`idd`),
  CONSTRAINT `comentarios_ibfk_3` FOREIGN KEY (`idd`) REFERENCES `directorios` (`idd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `directorios` */

DROP TABLE IF EXISTS `directorios`;

CREATE TABLE `directorios` (
  `idd` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `horario` varchar(50) DEFAULT NULL,
  `resena` text,
  `redsocial` varchar(100) DEFAULT NULL,
  `idm` int(11) DEFAULT NULL,
  `calle` varchar(200) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `activo` varchar(2) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `nombrei` varchar(300) DEFAULT NULL,
  `ruta` varchar(3000) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `latitud` double DEFAULT NULL,
  `longitud` double DEFAULT NULL,
  PRIMARY KEY (`idd`),
  KEY `directorio_ibfk_2` (`idm`),
  CONSTRAINT `directorios_ibfk_2` FOREIGN KEY (`idm`) REFERENCES `municipios` (`idm`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Table structure for table `galeria` */

DROP TABLE IF EXISTS `galeria`;

CREATE TABLE `galeria` (
  `idg` int(11) NOT NULL AUTO_INCREMENT,
  `archivo` varchar(255) DEFAULT NULL,
  `idd` int(11) DEFAULT NULL,
  PRIMARY KEY (`idg`),
  KEY `idd` (`idd`),
  CONSTRAINT `galeria_ibfk_1` FOREIGN KEY (`idd`) REFERENCES `directorios` (`idd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `imgs` */

DROP TABLE IF EXISTS `imgs`;

CREATE TABLE `imgs` (
  `id_img` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `ruta` varchar(250) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `idd` int(11) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_img`),
  KEY `idd` (`idd`),
  CONSTRAINT `imgs_ibfk_2` FOREIGN KEY (`idd`) REFERENCES `directorios` (`idd`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

/*Table structure for table `mapa` */

DROP TABLE IF EXISTS `mapa`;

CREATE TABLE `mapa` (
  `idmap` int(11) NOT NULL AUTO_INCREMENT,
  `latitud` double DEFAULT NULL,
  `longitud` double DEFAULT NULL,
  `idd` int(11) DEFAULT NULL,
  PRIMARY KEY (`idmap`),
  KEY `idd` (`idd`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `idme` int(11) NOT NULL AUTO_INCREMENT,
  `platillo` varchar(100) DEFAULT NULL,
  `idd` int(11) DEFAULT NULL,
  `activo` varchar(2) DEFAULT NULL,
  `precio` varchar(100) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idme`),
  KEY `idd` (`idd`),
  CONSTRAINT `menu_ibfk_4` FOREIGN KEY (`idd`) REFERENCES `directorios` (`idd`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Table structure for table `municipios` */

DROP TABLE IF EXISTS `municipios`;

CREATE TABLE `municipios` (
  `idm` int(11) NOT NULL AUTO_INCREMENT,
  `lugar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idm`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `payments` */

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `idp` int(11) NOT NULL AUTO_INCREMENT,
  `txn_id` int(11) NOT NULL,
  `PaymentMethod` varchar(50) NOT NULL,
  `PayerStatus` varchar(50) NOT NULL,
  `PayerMail` varchar(100) NOT NULL,
  `Total` decimal(19,2) NOT NULL,
  `Payment_state` varchar(50) NOT NULL,
  `CreateTime` date NOT NULL,
  `UpdateTime` varchar(50) NOT NULL,
  `idu` int(11) DEFAULT NULL,
  `fecha_activo` date DEFAULT NULL,
  `activo` varchar(4) DEFAULT NULL,
  `fecha_limite` date DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idp`),
  KEY `FK_payments` (`idu`),
  CONSTRAINT `FK_payments` FOREIGN KEY (`idu`) REFERENCES `usuarios` (`idu`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

/*Table structure for table `promociones` */

DROP TABLE IF EXISTS `promociones`;

CREATE TABLE `promociones` (
  `idp` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  `descuento` varchar(100) DEFAULT NULL,
  `vigencia` varchar(100) DEFAULT NULL,
  `idd` int(11) DEFAULT NULL,
  `activo` varchar(2) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idp`),
  KEY `idd` (`idd`),
  CONSTRAINT `promociones_ibfk_3` FOREIGN KEY (`idd`) REFERENCES `directorios` (`idd`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Table structure for table `servicios` */

DROP TABLE IF EXISTS `servicios`;

CREATE TABLE `servicios` (
  `ids` int(11) NOT NULL AUTO_INCREMENT,
  `servicio` varchar(100) DEFAULT NULL,
  `idd` int(11) DEFAULT NULL,
  `activo` varchar(2) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ids`),
  KEY `idd` (`idd`),
  CONSTRAINT `servicios_ibfk_3` FOREIGN KEY (`idd`) REFERENCES `directorios` (`idd`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `app` varchar(50) DEFAULT NULL,
  `apm` varchar(100) DEFAULT NULL,
  `nomuser` varchar(100) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `bandlink` varchar(2) DEFAULT NULL,
  `activo` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idu`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/* Function  structure for function  `ban` */

/*!50003 DROP FUNCTION IF EXISTS `ban` */;
DELIMITER $$

/*!50003 CREATE FUNCTION `ban`(bandlink2 INT) RETURNS int(11)
BEGIN 
 DECLARE cve INT;
 SET cve=(SELECT idu FROM usuarios WHERE idu=idu);
 IF (cve IS NULL)THEN
   RETURN 0;
  ELSE
 UPDATE usuarios SET bandlink=bandlink2
WHERE idu =idu;
RETURN 1;
  END IF;
  END */$$
DELIMITER ;

/* Function  structure for function  `ed_com` */

/*!50003 DROP FUNCTION IF EXISTS `ed_com` */;
DELIMITER $$

/*!50003 CREATE FUNCTION `ed_com`(idco2 INT,comentario2 VARCHAR(500),activo2 VARCHAR(2),idd2 int) RETURNS int(11)
BEGIN 
 DECLARE cve INT;
 SET cve=(SELECT idco FROM comentarios WHERE idco=idco2);
 IF (cve IS NULL)THEN
   RETURN 0;
  ELSE
 UPDATE comentarios SET comentario=comentario2,activo=activo2,idd=idd2
WHERE idco =idco2;
RETURN 1;
  END IF;
  END */$$
DELIMITER ;

/* Function  structure for function  `ed_dir` */

/*!50003 DROP FUNCTION IF EXISTS `ed_dir` */;
DELIMITER $$

/*!50003 CREATE FUNCTION `ed_dir`(idd2 INT,nombre2 VARCHAR(200),telefono2 VARCHAR(100),horario2 VARCHAR(50),
                       resena2 text,redsocial2 VARCHAR(100),calle2 VARCHAR(200),
                       numero2 INT,cp2 INT,activo2 VARCHAR(5),categoria2 varchar(50)) RETURNS int(11)
BEGIN 
 DECLARE cve INT;
 SET cve=(SELECT idd FROM directorio WHERE idd=idd2);
 IF (cve IS NULL)THEN
   RETURN 0;
  ELSE
 UPDATE directorio SET nombre=nombre2,telefono=telefono2,horario=horario2,resena=resena2,redsocial=redsocial2,calle=calle2,
                  numero=numero2,cp=cp2,activo=activo2,categoria=categoria2
WHERE idd =idd2;
RETURN 1;
  END IF;
  END */$$
DELIMITER ;

/* Function  structure for function  `ed_gal` */

/*!50003 DROP FUNCTION IF EXISTS `ed_gal` */;
DELIMITER $$

/*!50003 CREATE FUNCTION `ed_gal`(id_img2 INT,descripcion2 VARCHAR(500),user2 varchar(100)) RETURNS int(11)
BEGIN 
 DECLARE cve INT;
 SET cve=(SELECT id_img FROM imgs WHERE id_img=id_img2);
 IF (cve IS NULL)THEN
   RETURN 0;
  ELSE
 UPDATE imgs SET descripcion=descripcion2,usuario=user2
WHERE id_img =id_img2;
RETURN 1;
  END IF;
  END */$$
DELIMITER ;

/* Function  structure for function  `ed_men` */

/*!50003 DROP FUNCTION IF EXISTS `ed_men` */;
DELIMITER $$

/*!50003 CREATE FUNCTION `ed_men`(idme2 INT,platillo2 VARCHAR(100),activo2 VARCHAR(2),
                                                    precio2 VARCHAR(100),tipo2 VARCHAR(100),user2 varchar(100)) RETURNS int(11)
BEGIN 
 DECLARE cve INT;
 SET cve=(SELECT idme FROM menu WHERE idme=idme2);
 IF (cve IS NULL)THEN
   RETURN 0;
  ELSE
 UPDATE menu SET platillo=platillo2,activo=activo2,precio=precio2,tipo=tipo2,usuario=user2
WHERE idme =idme2;
RETURN 1;
  END IF;
  END */$$
DELIMITER ;

/* Function  structure for function  `ed_pro` */

/*!50003 DROP FUNCTION IF EXISTS `ed_pro` */;
DELIMITER $$

/*!50003 CREATE FUNCTION `ed_pro`(idp2 INT,descripcion2 VARCHAR(200),descuento2 VARCHAR(100),
                                     vigencia2 VARCHAR(100),activo2 VARCHAR(2),user2 varchar(100)) RETURNS int(11)
BEGIN 
 DECLARE cve INT;
 SET cve=(SELECT idp FROM promociones WHERE idp=idp2);
 IF (cve IS NULL)THEN
   RETURN 0;
  ELSE
 UPDATE promociones SET descripcion=descripcion2,descuento=descuento2,vigencia=vigencia2,activo=activo2,usuario=user2
WHERE idp =idp2;
RETURN 1;
  END IF;
  END */$$
DELIMITER ;

/* Function  structure for function  `ed_ser` */

/*!50003 DROP FUNCTION IF EXISTS `ed_ser` */;
DELIMITER $$

/*!50003 CREATE FUNCTION `ed_ser`(ids2 INT,servicio2 VARCHAR(100),activo2 VARCHAR(2),user2 varchar(100)) RETURNS int(11)
BEGIN 
 DECLARE cve INT;
 SET cve=(SELECT ids FROM servicios WHERE ids=ids2);
 IF (cve IS NULL)THEN
   RETURN 0;
  ELSE
 UPDATE servicios SET servicio=servicio2,activo=activo2,usuario=user2
WHERE ids=ids2;
RETURN 1;
  END IF;
  END */$$
DELIMITER ;

/* Function  structure for function  `ed_use` */

/*!50003 DROP FUNCTION IF EXISTS `ed_use` */;
DELIMITER $$

/*!50003 CREATE FUNCTION `ed_use`(idu2 INT,nombre2 VARCHAR(100),app2 VARCHAR(50),
                                     apm2 VARCHAR(100),nomuser2 VARCHAR(100),pass2 VARCHAR(20),correo2 VARCHAR(100),
                                     activo2 VARCHAR(5)) RETURNS int(11)
BEGIN 
 DECLARE cve INT;
 SET cve=(SELECT idu FROM usuarios WHERE idu=idu2);
 IF (cve IS NULL)THEN
   RETURN 0;
  ELSE
 UPDATE usuarios SET nombre=nombre2,app=app2,apm=apm2,nomuser=nomuser2,pass=pass2,correo=correo2,activo=activo2
WHERE idu =idu2;
RETURN 1;
  END IF;
  END */$$
DELIMITER ;

/* Procedure structure for procedure `altacomentarios` */

/*!50003 DROP PROCEDURE IF EXISTS  `altacomentarios` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `altacomentarios`(IN comentario2 VARCHAR(500),in idu2 int,
                                                               IN activo2 varchar(2),OUT resultado INT)
BEGIN
INSERT INTO comentarios(comentario,idu,activo)
VALUES (comentario2,idu2,activo2);
END */$$
DELIMITER ;

/* Procedure structure for procedure `altadirectorio` */

/*!50003 DROP PROCEDURE IF EXISTS  `altadirectorio` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `altadirectorio`(IN nombre2 VARCHAR(200), IN telefono2 VARCHAR(100), IN horario2 VARCHAR(50), 
                                                              IN resena2 text, IN redsocial2 VARCHAR(100),in idm2 int,IN calle2 VARCHAR(200), 
                                                              IN numero2 INT, IN cp2 INT,IN activo2 VARCHAR(2),in categoria2 varchar(50),
                                                              in nombrei2 varchar(300), in ruta2 varchar(300),
                                                              in usuario2 varchar(100), OUT resultado INT)
BEGIN
DECLARE cuantos INT;
SELECT COUNT(*)INTO cuantos
FROM directorios
WHERE  nombre=nombre2;
IF cuantos=0 THEN
INSERT INTO directorios(nombre,telefono,horario,resena,redsocial,idm,calle,numero,cp,activo,categoria,nombrei,ruta,usuario)
VALUES (nombre2,telefono2,horario2,resena2,redsocial2,idm2,calle2,numero2,cp2,activo2,categoria2,nombrei2,ruta2,usuario2);
SET resultado =1;
ELSE
SET resultado =0;
END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `altamenu` */

/*!50003 DROP PROCEDURE IF EXISTS  `altamenu` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `altamenu`(IN platillo2 VARCHAR(100),in idd2 int,IN activo2 VARCHAR(2),IN precio2 VARCHAR(100),
                                                        IN tipo2 VARCHAR(100),in usuario2 varchar(100), OUT resultado INT)
BEGIN
INSERT INTO menu(platillo,idd,activo,precio,tipo,usuario)
VALUES (platillo2,idd2,activo2,precio2,tipo2,usuario2);
END */$$
DELIMITER ;

/* Procedure structure for procedure `altapromos` */

/*!50003 DROP PROCEDURE IF EXISTS  `altapromos` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `altapromos`(IN descripcion2 VARCHAR(200),IN vigencia2 VARCHAR(200),
                                                          in idd2 int,IN activo2 VARCHAR(2),in usuario2 varchar(100),OUT resultado INT)
BEGIN
INSERT INTO promociones(descripcion,vigencia,idd,activo,usuario)
VALUES (descripcion2,vigencia2,idd2,activo2,usuario2);
END */$$
DELIMITER ;

/* Procedure structure for procedure `altaservicios` */

/*!50003 DROP PROCEDURE IF EXISTS  `altaservicios` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `altaservicios`(IN servicio2 VARCHAR(100),in idd2 int,IN activo2 VARCHAR(2),
                                                             in usuario2 varchar(100),OUT resultado INT)
BEGIN
INSERT INTO servicios(servicio,idd,activo,usuario)
VALUES (servicio2,idd2,activo2,usuario2);
END */$$
DELIMITER ;

/* Procedure structure for procedure `altausuarios` */

/*!50003 DROP PROCEDURE IF EXISTS  `altausuarios` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `altausuarios`(IN nombre2 VARCHAR(100), IN app2 VARCHAR(50), IN apm2 VARCHAR(100), 
                                                           IN nomuser2 VARCHAR(50), IN pass2 VARCHAR(100), IN correo2 VARCHAR(100), 
                                                           in user2 int,in bandlink2 int,IN activo2 VARCHAR(2),OUT resultado INT)
BEGIN
DECLARE cuantos INT;
SELECT COUNT(*)INTO cuantos
FROM usuarios
WHERE  nomuser=nomuser2;
IF cuantos=0 THEN
INSERT INTO usuarios(nombre,app,apm,nomuser,pass,correo,user,bandlink,activo)
VALUES (nombre2,app2,apm2,nomuser2,pass2,correo2,user2,bandlink2,activo2);
SET resultado =1;
ELSE
SET resultado =0;
END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `eliminacomentarios` */

/*!50003 DROP PROCEDURE IF EXISTS  `eliminacomentarios` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `eliminacomentarios`(IN idco2 INT, OUT resultado INT)
BEGIN
DECLARE cuantos INT;
SELECT COUNT(*) INTO cuantos
FROM comentarios,directorio
WHERE idco = idco2;
IF cuantos =0
THEN
DELETE FROM comentarios WHERE idco = idco2;
SET resultado=1;
ELSE 
UPDATE comentarios SET activo='No' WHERE idco=idco2;
SET resultado=0;
END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `eliminadirectorio` */

/*!50003 DROP PROCEDURE IF EXISTS  `eliminadirectorio` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `eliminadirectorio`(IN idd2 INT, OUT resultado INT)
BEGIN
DECLARE cuantos INT;
SELECT COUNT(*) INTO cuantos
FROM directorio,municipios
WHERE idd = idd2;
IF cuantos =0
THEN
DELETE FROM directorio WHERE idd = idd2;
SET resultado=1;
ELSE 
UPDATE directorio SET activo='No' WHERE idd=idd2;
SET resultado=0;
END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `eliminaimagen` */

/*!50003 DROP PROCEDURE IF EXISTS  `eliminaimagen` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `eliminaimagen`(IN id_img2 INT, OUT resultado INT)
BEGIN
DELETE FROM imgs WHERE id_img = id_img2;
END */$$
DELIMITER ;

/* Procedure structure for procedure `eliminamenu` */

/*!50003 DROP PROCEDURE IF EXISTS  `eliminamenu` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `eliminamenu`(IN idme2 INT,OUT resultado INT)
BEGIN
DELETE FROM menu WHERE idme=idme2;
END */$$
DELIMITER ;

/* Procedure structure for procedure `eliminapromo` */

/*!50003 DROP PROCEDURE IF EXISTS  `eliminapromo` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `eliminapromo`(IN idp2 INT, OUT resultado INT)
BEGIN
DECLARE cuantos INT;
SELECT COUNT(*) INTO cuantos
FROM promociones
WHERE idp = idp2 and activo='no';
IF cuantos >= 1
THEN
  DELETE FROM promociones WHERE idp = idp2;
  SET resultado=1;
ELSE 
  UPDATE promociones SET activo='no' WHERE idp=idp2;
  SET resultado=0;
END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `eliminaservicios` */

/*!50003 DROP PROCEDURE IF EXISTS  `eliminaservicios` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `eliminaservicios`(IN ids2 INT, OUT resultado INT)
BEGIN
DECLARE cuantos INT;
SELECT COUNT(*) INTO cuantos
FROM servicios,directorios
WHERE ids = ids2;
IF cuantos =0
THEN
DELETE FROM servicios WHERE ids = ids2;
SET resultado=1;
ELSE 
UPDATE servicios SET activo='No' WHERE ids=ids2;
SET resultado=0;
END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `eliminausuarios` */

/*!50003 DROP PROCEDURE IF EXISTS  `eliminausuarios` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `eliminausuarios`(IN idu2 INT, OUT resultado INT)
BEGIN
DELETE FROM usuarios WHERE idu = idu2;
END */$$
DELIMITER ;

/* Procedure structure for procedure `map` */

/*!50003 DROP PROCEDURE IF EXISTS  `map` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `map`(IN lat2 DOUBLE, IN lng2 DOUBLE,IN idd2 INT, OUT resultado INT)
BEGIN
DECLARE cuantos INT;
SELECT COUNT(*)INTO cuantos
FROM mapa
WHERE  latitud=lat2;
IF cuantos=0 THEN
INSERT INTO mapa(latitud,longitud,idd)
VALUES (lat2,lng2,idd2);
SET resultado =1;
ELSE
SET resultado =0;
END IF;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
