# Sequel Pro dump
# Version 1630
# http://code.google.com/p/sequel-pro
#
# Host: localhost (MySQL 5.1.37)
# Database: iso11179
# Generation Time: 2010-02-10 20:06:35 +0100
# ************************************************************

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table conceptual_domain
# ------------------------------------------------------------

DROP TABLE IF EXISTS `conceptual_domain`;

CREATE TABLE `conceptual_domain` (
  `idCD` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `idDim` int(11) NOT NULL,
  PRIMARY KEY (`idCD`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;



# Dump of table data_element
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_element`;

CREATE TABLE `data_element` (
  `idDE` int(11) NOT NULL AUTO_INCREMENT,
  `idDEC` int(11) NOT NULL,
  `idVD` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Definition` varchar(255) NOT NULL,
  PRIMARY KEY (`idDE`),
  KEY `idDEC` (`idDEC`),
  KEY `idVD` (`idVD`),
  CONSTRAINT `data_element_ibfk_1` FOREIGN KEY (`idDEC`) REFERENCES `de_concept` (`idDEC`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `data_element_ibfk_2` FOREIGN KEY (`idVD`) REFERENCES `value_domain` (`idVD`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;



# Dump of table de_concept
# ------------------------------------------------------------

DROP TABLE IF EXISTS `de_concept`;

CREATE TABLE `de_concept` (
  `idDEC` int(11) NOT NULL AUTO_INCREMENT,
  `idOC` int(11) NOT NULL,
  `idCD` int(11) NOT NULL,
  `idP` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Definition` varchar(255) NOT NULL,
  PRIMARY KEY (`idDEC`),
  KEY `idP` (`idP`),
  CONSTRAINT `de_concept_ibfk_1` FOREIGN KEY (`idP`) REFERENCES `property` (`idP`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;



# Dump of table dimensionality
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dimensionality`;

CREATE TABLE `dimensionality` (
  `idDim` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(45) NOT NULL,
  PRIMARY KEY (`idDim`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;



# Dump of table ecd_vm
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecd_vm`;

CREATE TABLE `ecd_vm` (
  `idECD` int(11) NOT NULL,
  `idVM` int(11) NOT NULL,
  PRIMARY KEY (`idECD`,`idVM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table enumerated_cd
# ------------------------------------------------------------

DROP TABLE IF EXISTS `enumerated_cd`;

CREATE TABLE `enumerated_cd` (
  `idECD` int(11) NOT NULL,
  PRIMARY KEY (`idECD`),
  CONSTRAINT `enumerated_cd_ibfk_2` FOREIGN KEY (`idECD`) REFERENCES `conceptual_domain` (`idCD`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table enumerated_vd
# ------------------------------------------------------------

DROP TABLE IF EXISTS `enumerated_vd`;

CREATE TABLE `enumerated_vd` (
  `idEVD` int(11) NOT NULL,
  PRIMARY KEY (`idEVD`),
  CONSTRAINT `enumerated_vd_ibfk_3` FOREIGN KEY (`idEVD`) REFERENCES `value_domain` (`idVD`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table evd_pv
# ------------------------------------------------------------

DROP TABLE IF EXISTS `evd_pv`;

CREATE TABLE `evd_pv` (
  `idEVD` int(11) NOT NULL,
  `idPV` int(11) NOT NULL,
  PRIMARY KEY (`idEVD`,`idPV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table nonenumerated_cd
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nonenumerated_cd`;

CREATE TABLE `nonenumerated_cd` (
  `idNECD` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  PRIMARY KEY (`idNECD`),
  CONSTRAINT `nonenumerated_cd_ibfk_1` FOREIGN KEY (`idNECD`) REFERENCES `conceptual_domain` (`idCD`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table nonenumerated_vd
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nonenumerated_vd`;

CREATE TABLE `nonenumerated_vd` (
  `idNEVD` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  PRIMARY KEY (`idNEVD`),
  CONSTRAINT `nonenumerated_vd_ibfk_1` FOREIGN KEY (`idNEVD`) REFERENCES `value_domain` (`idVD`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table object_class
# ------------------------------------------------------------

DROP TABLE IF EXISTS `object_class`;

CREATE TABLE `object_class` (
  `idOC` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Definition` varchar(255) NOT NULL,
  PRIMARY KEY (`idOC`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;



# Dump of table permissible_value
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissible_value`;

CREATE TABLE `permissible_value` (
  `idPV` int(11) NOT NULL AUTO_INCREMENT,
  `idVM` int(11) NOT NULL,
  `idValue` int(11) NOT NULL,
  PRIMARY KEY (`idPV`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;



# Dump of table property
# ------------------------------------------------------------

DROP TABLE IF EXISTS `property`;

CREATE TABLE `property` (
  `idP` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Definition` varchar(255) NOT NULL,
  PRIMARY KEY (`idP`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;



# Dump of table unit_of_measure
# ------------------------------------------------------------

DROP TABLE IF EXISTS `unit_of_measure`;

CREATE TABLE `unit_of_measure` (
  `idUOM` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(45) NOT NULL,
  `idDim` int(11) NOT NULL,
  PRIMARY KEY (`idUOM`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;



# Dump of table value
# ------------------------------------------------------------

DROP TABLE IF EXISTS `value`;

CREATE TABLE `value` (
  `idValue` int(11) NOT NULL AUTO_INCREMENT,
  `Value` varchar(255) NOT NULL,
  PRIMARY KEY (`idValue`),
  UNIQUE KEY `Value` (`Value`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;



# Dump of table value_domain
# ------------------------------------------------------------

DROP TABLE IF EXISTS `value_domain`;

CREATE TABLE `value_domain` (
  `idVD` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Data_type` varchar(20) NOT NULL,
  `Precision` varchar(255) NOT NULL,
  `idCD` int(11) NOT NULL,
  `idUOM` int(11) NOT NULL,
  PRIMARY KEY (`idVD`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;



# Dump of table value_meaning
# ------------------------------------------------------------

DROP TABLE IF EXISTS `value_meaning`;

CREATE TABLE `value_meaning` (
  `idVM` int(11) NOT NULL AUTO_INCREMENT,
  `Meaning` varchar(255) NOT NULL,
  PRIMARY KEY (`idVM`),
  UNIQUE KEY `Meaning` (`Meaning`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;






/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
