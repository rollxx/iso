SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `ISO11179`
--

-- --------------------------------------------------------

--
-- Table structure for table `conceptual_domain`
--

DROP TABLE IF EXISTS `conceptual_domain`;
CREATE TABLE IF NOT EXISTS `conceptual_domain` (
  `idCD` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `idDim` int(11) NOT NULL,
  PRIMARY KEY (`idCD`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `conceptual_domain`
--

INSERT INTO `conceptual_domain` VALUES(1, 'Laender (CD)', 1);
INSERT INTO `conceptual_domain` VALUES(2, 'Gewichte (CD)', 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_element`
--

DROP TABLE IF EXISTS `data_element`;
CREATE TABLE IF NOT EXISTS `data_element` (
  `idDE` int(11) NOT NULL AUTO_INCREMENT,
  `idDEC` int(11) NOT NULL,
  `idVD` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Definition` varchar(255) NOT NULL,
  PRIMARY KEY (`idDE`),
  KEY `idDEC` (`idDEC`),
  KEY `idVD` (`idVD`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `data_element`
--

INSERT INTO `data_element` VALUES(1, 1, 1, 'Geburtsland des Probanden 2 cc (DE)', '');
INSERT INTO `data_element` VALUES(2, 2, 3, 'Gewicht des Probanden in kg (DE)', '');

-- --------------------------------------------------------

--
-- Table structure for table `de_concept`
--

DROP TABLE IF EXISTS `de_concept`;
CREATE TABLE IF NOT EXISTS `de_concept` (
  `idDEC` int(11) NOT NULL AUTO_INCREMENT,
  `idOC` int(11) NOT NULL,
  `idCD` int(11) NOT NULL,
  `idP` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Definition` varchar(255) NOT NULL,
  PRIMARY KEY (`idDEC`),
  KEY `idP` (`idP`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `de_concept`
--

INSERT INTO `de_concept` VALUES(1, 1, 1, 1, 'Geburtsland des Probanden (DEC)', '');
INSERT INTO `de_concept` VALUES(2, 1, 2, 2, 'Gewicht des Probanden (DEC)', '');

-- --------------------------------------------------------

--
-- Table structure for table `dimensionality`
--

DROP TABLE IF EXISTS `dimensionality`;
CREATE TABLE IF NOT EXISTS `dimensionality` (
  `idDim` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(45) NOT NULL,
  PRIMARY KEY (`idDim`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dimensionality`
--

INSERT INTO `dimensionality` VALUES(1, '-');
INSERT INTO `dimensionality` VALUES(2, 'Gewichte (Dim)');
INSERT INTO `dimensionality` VALUES(3, '111');

-- --------------------------------------------------------

--
-- Table structure for table `ecd_vm`
--

DROP TABLE IF EXISTS `ecd_vm`;
CREATE TABLE IF NOT EXISTS `ecd_vm` (
  `idECD` int(11) NOT NULL,
  `idVM` int(11) NOT NULL,
  PRIMARY KEY (`idECD`,`idVM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ecd_vm`
--

INSERT INTO `ecd_vm` VALUES(1, 1);
INSERT INTO `ecd_vm` VALUES(1, 2);
INSERT INTO `ecd_vm` VALUES(1, 3);
INSERT INTO `ecd_vm` VALUES(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `enumerated_cd`
--

DROP TABLE IF EXISTS `enumerated_cd`;
CREATE TABLE IF NOT EXISTS `enumerated_cd` (
  `idECD` int(11) NOT NULL,
  PRIMARY KEY (`idECD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enumerated_cd`
--

INSERT INTO `enumerated_cd` VALUES(1);

-- --------------------------------------------------------

--
-- Table structure for table `enumerated_vd`
--

DROP TABLE IF EXISTS `enumerated_vd`;
CREATE TABLE IF NOT EXISTS `enumerated_vd` (
  `idEVD` int(11) NOT NULL,
  PRIMARY KEY (`idEVD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enumerated_vd`
--

INSERT INTO `enumerated_vd` VALUES(1);
INSERT INTO `enumerated_vd` VALUES(2);

-- --------------------------------------------------------

--
-- Table structure for table `evd_pv`
--

DROP TABLE IF EXISTS `evd_pv`;
CREATE TABLE IF NOT EXISTS `evd_pv` (
  `idEVD` int(11) NOT NULL,
  `idPV` int(11) NOT NULL,
  PRIMARY KEY (`idEVD`,`idPV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `evd_pv`
--

INSERT INTO `evd_pv` VALUES(1, 1);
INSERT INTO `evd_pv` VALUES(1, 3);
INSERT INTO `evd_pv` VALUES(1, 5);
INSERT INTO `evd_pv` VALUES(1, 7);
INSERT INTO `evd_pv` VALUES(2, 2);
INSERT INTO `evd_pv` VALUES(2, 4);
INSERT INTO `evd_pv` VALUES(2, 6);
INSERT INTO `evd_pv` VALUES(2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `nonenumerated_cd`
--

DROP TABLE IF EXISTS `nonenumerated_cd`;
CREATE TABLE IF NOT EXISTS `nonenumerated_cd` (
  `idNECD` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  PRIMARY KEY (`idNECD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nonenumerated_cd`
--

INSERT INTO `nonenumerated_cd` VALUES(2, 'Gewichte von Probanden');

-- --------------------------------------------------------

--
-- Table structure for table `nonenumerated_vd`
--

DROP TABLE IF EXISTS `nonenumerated_vd`;
CREATE TABLE IF NOT EXISTS `nonenumerated_vd` (
  `idNEVD` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  PRIMARY KEY (`idNEVD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nonenumerated_vd`
--

INSERT INTO `nonenumerated_vd` VALUES(3, 'Gewichte von Probanden in kg');
INSERT INTO `nonenumerated_vd` VALUES(4, 'Gewichte von Probanden in g');

-- --------------------------------------------------------

--
-- Table structure for table `object_class`
--

DROP TABLE IF EXISTS `object_class`;
CREATE TABLE IF NOT EXISTS `object_class` (
  `idOC` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Definition` varchar(255) NOT NULL,
  PRIMARY KEY (`idOC`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `object_class`
--

INSERT INTO `object_class` VALUES(1, 'Proband', '');

-- --------------------------------------------------------

--
-- Table structure for table `permissible_value`
--

DROP TABLE IF EXISTS `permissible_value`;
CREATE TABLE IF NOT EXISTS `permissible_value` (
  `idPV` int(11) NOT NULL AUTO_INCREMENT,
  `idVM` int(11) NOT NULL,
  `idValue` int(11) NOT NULL,
  PRIMARY KEY (`idPV`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `permissible_value`
--

INSERT INTO `permissible_value` VALUES(1, 1, 1);
INSERT INTO `permissible_value` VALUES(2, 1, 2);
INSERT INTO `permissible_value` VALUES(3, 2, 3);
INSERT INTO `permissible_value` VALUES(4, 2, 4);
INSERT INTO `permissible_value` VALUES(5, 3, 5);
INSERT INTO `permissible_value` VALUES(6, 3, 6);
INSERT INTO `permissible_value` VALUES(7, 4, 7);
INSERT INTO `permissible_value` VALUES(8, 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property` (
  `idP` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Definition` varchar(255) NOT NULL,
  PRIMARY KEY (`idP`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` VALUES(1, 'Geburtsland (P)', '');
INSERT INTO `property` VALUES(2, 'Gewicht (P)', '');

-- --------------------------------------------------------

--
-- Table structure for table `unit_of_measure`
--

DROP TABLE IF EXISTS `unit_of_measure`;
CREATE TABLE IF NOT EXISTS `unit_of_measure` (
  `idUOM` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(45) NOT NULL,
  `idDim` int(11) NOT NULL,
  PRIMARY KEY (`idUOM`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `unit_of_measure`
--

INSERT INTO `unit_of_measure` VALUES(1, '-', 1);
INSERT INTO `unit_of_measure` VALUES(2, 'kg', 2);
INSERT INTO `unit_of_measure` VALUES(3, 'g', 2);

-- --------------------------------------------------------

--
-- Table structure for table `value`
--

DROP TABLE IF EXISTS `value`;
CREATE TABLE IF NOT EXISTS `value` (
  `idValue` int(11) NOT NULL AUTO_INCREMENT,
  `Value` varchar(255) NOT NULL,
  PRIMARY KEY (`idValue`),
  UNIQUE KEY `Value` (`Value`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `value`
--

INSERT INTO `value` VALUES(1, 'de');
INSERT INTO `value` VALUES(2, 'deu');
INSERT INTO `value` VALUES(5, 'en');
INSERT INTO `value` VALUES(6, 'eng');
INSERT INTO `value` VALUES(7, 'fr');
INSERT INTO `value` VALUES(8, 'fra');
INSERT INTO `value` VALUES(3, 'ru');
INSERT INTO `value` VALUES(4, 'rus');
INSERT INTO `value` VALUES(9, 'xxx');

-- --------------------------------------------------------

--
-- Table structure for table `value_domain`
--

DROP TABLE IF EXISTS `value_domain`;
CREATE TABLE IF NOT EXISTS `value_domain` (
  `idVD` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Data_type` varchar(20) NOT NULL,
  `Precision` varchar(255) NOT NULL,
  `idCD` int(11) NOT NULL,
  `idUOM` int(11) NOT NULL,
  PRIMARY KEY (`idVD`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `value_domain`
--

INSERT INTO `value_domain` VALUES(1, 'Laender 2 cc (VD)', '-', '-', 1, 1);
INSERT INTO `value_domain` VALUES(2, 'Laender 3 cc (VD)', '-', '-', 1, 1);
INSERT INTO `value_domain` VALUES(3, 'Gewichte in kg (VD)', 'number', '.00', 2, 2);
INSERT INTO `value_domain` VALUES(4, 'Gewichte in g (VD)', 'number', '#00', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `value_meaning`
--

DROP TABLE IF EXISTS `value_meaning`;
CREATE TABLE IF NOT EXISTS `value_meaning` (
  `idVM` int(11) NOT NULL AUTO_INCREMENT,
  `Meaning` varchar(255) NOT NULL,
  PRIMARY KEY (`idVM`),
  UNIQUE KEY `Meaning` (`Meaning`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `value_meaning`
--

INSERT INTO `value_meaning` VALUES(1, 'Deutschland');
INSERT INTO `value_meaning` VALUES(3, 'England');
INSERT INTO `value_meaning` VALUES(4, 'Frankreich');
INSERT INTO `value_meaning` VALUES(2, 'Russland');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_element`
--
ALTER TABLE `data_element`
  ADD CONSTRAINT `data_element_ibfk_1` FOREIGN KEY (`idDEC`) REFERENCES `de_concept` (`idDEC`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `data_element_ibfk_2` FOREIGN KEY (`idVD`) REFERENCES `value_domain` (`idVD`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `de_concept`
--
ALTER TABLE `de_concept`
  ADD CONSTRAINT `de_concept_ibfk_1` FOREIGN KEY (`idP`) REFERENCES `property` (`idP`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `enumerated_cd`
--
ALTER TABLE `enumerated_cd`
  ADD CONSTRAINT `enumerated_cd_ibfk_2` FOREIGN KEY (`idECD`) REFERENCES `conceptual_domain` (`idCD`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enumerated_vd`
--
ALTER TABLE `enumerated_vd`
  ADD CONSTRAINT `enumerated_vd_ibfk_3` FOREIGN KEY (`idEVD`) REFERENCES `value_domain` (`idVD`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nonenumerated_cd`
--
ALTER TABLE `nonenumerated_cd`
  ADD CONSTRAINT `nonenumerated_cd_ibfk_1` FOREIGN KEY (`idNECD`) REFERENCES `conceptual_domain` (`idCD`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nonenumerated_vd`
--
ALTER TABLE `nonenumerated_vd`
  ADD CONSTRAINT `nonenumerated_vd_ibfk_1` FOREIGN KEY (`idNEVD`) REFERENCES `value_domain` (`idVD`) ON DELETE CASCADE ON UPDATE CASCADE;
