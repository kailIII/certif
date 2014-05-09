
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2014 at 06:29 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET FOREIGN_KEY_CHECKS=0;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

SET AUTOCOMMIT=0;
START TRANSACTION;

--
-- Database: `a5248503_kiosco`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajuste`
--
-- Creation: May 10, 2012 at 11:46 AM
-- Last update: Nov 08, 2012 at 03:48 PM
-- Last check: Dec 07, 2012 at 11:03 AM
--

DROP TABLE IF EXISTS `ajuste`;
CREATE TABLE IF NOT EXISTS `ajuste` (
  `idProducto` int(10) unsigned NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cantidad` int(11) DEFAULT '0',
  `motivo` varchar(45) DEFAULT NULL,
  `idAjuste` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idAjuste`),
  KEY `Index_Producto` (`idProducto`,`fecha`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Dumping data for table `ajuste`
--

INSERT INTO `ajuste` (`idProducto`, `fecha`, `cantidad`, `motivo`, `idAjuste`) VALUES
(0, '2012-06-24 00:27:08', 0, 'carga inicial', 0),
(22332, '2012-06-23 00:00:00', 5, 'Prueba', 1),
(545, '2012-07-02 00:00:00', -20, 'comidos', 2),
(555266, '2012-07-02 00:00:00', -5, 'fecha no valida', 3),
(23333, '2012-09-16 00:00:00', -5, 'rotura', 4),
(1111, '2012-11-08 00:00:00', 20, 'porque si jajaja!', 5),
(1235, '2012-11-08 00:00:00', -4, 'para probar', 6),
(1235, '2012-11-08 00:00:00', 4, 'para volver aaja', 7),
(1006, '2012-11-08 00:00:00', 5, 'Devolucion cliente', 8),
(1111, '2012-11-08 00:00:00', -10, 'perdida', 9);

-- --------------------------------------------------------

--
-- Table structure for table `ajustecaja`
--
-- Creation: May 10, 2012 at 11:50 AM
-- Last update: May 10, 2012 at 11:50 AM
--

DROP TABLE IF EXISTS `ajustecaja`;
CREATE TABLE IF NOT EXISTS `ajustecaja` (
  `idAjusteCaja` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `motivo` varchar(140) NOT NULL,
  PRIMARY KEY (`idAjusteCaja`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ajustecaja`
--


-- --------------------------------------------------------

--
-- Table structure for table `asado`
--
-- Creation: Nov 21, 2012 at 06:13 AM
-- Last update: Feb 05, 2013 at 09:26 AM
-- Last check: Feb 07, 2013 at 10:08 AM
--

DROP TABLE IF EXISTS `asado`;
CREATE TABLE IF NOT EXISTS `asado` (
  `nombre` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `asiste` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT '1',
  `nota` varchar(140) COLLATE latin1_general_ci DEFAULT NULL,
  `curso` int(1) NOT NULL DEFAULT '1',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `asado`
--

INSERT INTO `asado` (`nombre`, `asiste`, `nota`, `curso`, `fecha`) VALUES
('Pedro Vazquez', 'S', 'Yo no la curse con Aldo, pero el me tomo el final asi que voy igual =P', 3, '2012-11-23 23:19:35'),
('Alejo Benedetti', 'S', '', 3, '2012-11-23 14:10:45'),
('Sergio Ruiz', 'S', '', 3, '2012-11-23 14:19:43'),
('Martin Remedi', 'S', '', 3, '2012-11-23 06:35:49'),
('Nicolas Bertozzi', 'S', '', 3, '2012-11-21 11:14:35'),
('Carmelo Puglieso', 'S', '', 3, '2012-11-24 10:06:32'),
('Denis Omar', 'S', '', 1, '2012-11-25 18:20:33'),
('Mateo Morande', 'S', '', 1, '2012-11-25 18:21:49'),
('Gaston Bosch', 'S', '', 1, '2012-11-25 18:24:29'),
('Andres Gimenez', 'S', '', 3, '2012-11-29 07:59:28'),
('Colliard David', 'S', '', 3, '2012-11-29 08:20:15'),
('Dante Herrlein', 'S', '', 3, '2012-11-29 09:28:58'),
('vilche diego', 'S', '', 3, '2012-11-29 10:49:40'),
('Francisco Gregorutti', 'S', '', 3, '2012-11-29 16:48:44'),
('Tortul Cuatrin Dante', 'S', '', 3, '2012-11-29 16:50:19'),
('Cuenca Ailin', 'S', '', 3, '2012-11-29 18:15:39'),
('Ostorero Ariel', 'S', '', 3, '2012-11-29 18:16:07'),
('Gimenez Pablo', 'S', '', 3, '2012-11-29 18:16:25'),
('AgustÃ­n Grauberg', 'S', '', 3, '2012-11-29 19:04:48'),
('German Aguirre', 'S', '', 3, '2012-11-29 20:10:42'),
('Arce Sebastian', 'S', 'S', 1, '2012-11-30 09:25:36'),
('Brian Stauber', 'S', '', 3, '2012-12-01 19:15:37'),
('Giorgio Eduardo', 'S', 'S', 3, '2012-12-01 19:17:03'),
('MatÃ­as Salina', 'S', '', 3, '2012-12-01 19:17:59'),
('Nelson Schonfeld', 'S', '', 3, '2012-12-05 09:41:24'),
('Gonzalo Acebak', 'S', 'S', 1, '2012-12-05 11:40:47'),
('AndrÃ©s Ojeda', 'S', '', 1, '2012-12-05 20:13:20'),
('Paez Klatt Sebastian', 'S', '', 1, '2012-12-05 21:08:16'),
('suarez mariel', 'S', '', 1, '2012-12-10 04:22:33'),
('Enrique Busto RÃ­os', 'S', '', 3, '2012-12-10 05:44:48'),
('Brian Ramseyer', 'S', '', 3, '2012-12-10 07:16:32'),
('JosÃ© Chiardola', 'S', ':p', 3, '2012-12-13 18:35:35'),
('Mariano NuÃ±ez', 'S', '', 3, '2012-12-14 08:20:33'),
('Aquiles Bialo Yo', 'S', 'LOKOS', 3, '2013-02-05 09:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `caja`
--
-- Creation: May 10, 2012 at 11:50 AM
-- Last update: Nov 08, 2012 at 04:17 PM
-- Last check: Dec 07, 2012 at 11:03 AM
--

DROP TABLE IF EXISTS `caja`;
CREATE TABLE IF NOT EXISTS `caja` (
  `idCaja` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idVenta` int(10) unsigned DEFAULT NULL,
  `idCompra` int(10) unsigned DEFAULT NULL,
  `idAjuste` int(10) unsigned DEFAULT NULL,
  `monto` float NOT NULL,
  PRIMARY KEY (`idCaja`),
  KEY `FK_caja_venta` (`idVenta`),
  KEY `FK_caja_ajuste` (`idAjuste`),
  KEY `FK_caja_compra` (`idCompra`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `caja`
--

INSERT INTO `caja` (`idCaja`, `idVenta`, `idCompra`, `idAjuste`, `monto`) VALUES
(1, 2, 0, 0, 200),
(2, 3, 0, 0, 3),
(3, 4, 0, 0, 412),
(4, 5, 0, 0, 0),
(5, 6, 0, 0, 100),
(6, 0, 3, 0, 187.5),
(7, 7, 0, 0, 125),
(8, 8, 0, 0, 75),
(9, 9, 0, 0, 72),
(10, 0, 4, 0, 900),
(11, 0, 5, 0, 44),
(12, 10, 0, 0, 327),
(13, 0, 8, 0, 1440),
(14, 11, 0, 0, 125),
(15, 12, 0, 0, 8),
(16, 0, 11, 0, 0),
(17, 0, 12, 0, 0),
(18, 0, 12, 0, 0),
(19, 0, 10, 0, 70),
(20, 13, 0, 0, 12),
(21, 0, 14, 0, 200),
(22, 0, 17, 0, 10),
(23, 0, 17, 0, 0),
(24, 0, 13, 0, 144);

-- --------------------------------------------------------

--
-- Table structure for table `certificacion`
--
-- Creation: Nov 15, 2013 at 07:50 AM
-- Last update: Mar 18, 2014 at 09:58 AM
-- Last check: Apr 07, 2014 at 06:28 AM
--

DROP TABLE IF EXISTS `certificacion`;
CREATE TABLE IF NOT EXISTS `certificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idObra` int(10) DEFAULT NULL,
  `certNro` int(10) unsigned DEFAULT NULL,
  `idTipo` int(10) unsigned DEFAULT NULL,
  `mes` varchar(15) DEFAULT NULL,
  `periodo` timestamp NULL DEFAULT NULL,
  `importeBasico` double DEFAULT NULL,
  `importeRedeterminado` double DEFAULT NULL,
  `fondoReparo` double DEFAULT NULL,
  `anticipoFinanciero` double DEFAULT NULL,
  `otrosDescuentos` double DEFAULT NULL,
  `aCobrar` double DEFAULT NULL,
  `comentario` varchar(50) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `participacion` int(10) DEFAULT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `fechaFirma` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idObra` (`idObra`),
  KEY `FK_certificacion_2` (`idTipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `certificacion`
--

INSERT INTO `certificacion` (`id`, `idObra`, `certNro`, `idTipo`, `mes`, `periodo`, `importeBasico`, `importeRedeterminado`, `fondoReparo`, `anticipoFinanciero`, `otrosDescuentos`, `aCobrar`, `comentario`, `fecha`, `participacion`, `imagen`, `fechaFirma`) VALUES
(37, 166, 156, 2, '', '2013-11-11 00:00:00', 100, 100, 100, 100, 100, 100, '100 ', '2013-11-11 00:00:00', 100, '', '2013-11-11 00:00:00'),
(38, 167, 10, 2, '', '2013-11-28 00:00:00', 15620, 15900, 16000, 1000, 1000, 20000, ' Prueba de la carga', '2013-11-28 00:00:00', 100, '', '2013-11-28 00:00:00'),
(39, 165, 10, 2, '', '2013-11-28 00:00:00', 15620, 15900, 16000, 1000, 1000, 20000, ' Prueba de la carga', '2013-11-28 00:00:00', 100, '', '2013-11-28 00:00:00'),
(40, 2, 25, 1, '', '0000-00-00 00:00:00', 150000, 185000, 60000, 85000, 40000, 215000, ' certificado de prueba', '0000-00-00 00:00:00', 40, '', '0000-00-00 00:00:00'),
(41, 4, 456, 3, '', '2014-02-24 00:00:00', 123, 123, 123, 123, 123, 123, 'Prueba ', '2014-02-24 00:00:00', 100, '', '2014-02-24 00:00:00'),
(42, 4, 412, 3, '', '2014-02-24 00:00:00', 10, 10, 10, 10, 10, 10, 'pruebota ', '2014-02-24 00:00:00', 10, '', '2014-02-24 00:00:00'),
(43, 7, 69, 3, '', '2010-03-15 00:00:00', 1000000, 1000000, 1000000, 750000, 850000, 1000000, ' prueba de carga de certificados', '2010-03-25 00:00:00', 100, '', '2010-03-25 00:00:00'),
(44, 7, 104, 1, '', '2011-05-22 00:00:00', 100000, 12333333333, 1500000, 850000, 12313132, 125555, ' prueba 1000', '2011-05-26 00:00:00', 85, '', '2011-05-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comitente`
--
-- Creation: Nov 15, 2013 at 07:48 AM
-- Last update: Nov 15, 2013 at 07:48 AM
--

DROP TABLE IF EXISTS `comitente`;
CREATE TABLE IF NOT EXISTS `comitente` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `comitente`
--


-- --------------------------------------------------------

--
-- Table structure for table `compra`
--
-- Creation: May 10, 2012 at 11:50 AM
-- Last update: Dec 07, 2012 at 11:03 AM
-- Last check: Dec 07, 2012 at 11:03 AM
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `idRemito` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idProveedor` int(10) unsigned NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_alta_Proveedor` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `monto` float unsigned NOT NULL,
  PRIMARY KEY (`idRemito`) USING BTREE,
  KEY `FK_compra_proveedor` (`idProveedor`,`fecha_alta_Proveedor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `compra`
--

INSERT INTO `compra` (`idRemito`, `idProveedor`, `fecha`, `fecha_alta_Proveedor`, `monto`) VALUES
(1, 0, '2012-06-22 11:31:00', '0000-00-00 00:00:00', 0),
(2, 9, '2012-06-22 19:18:35', '2012-04-23 08:00:26', 0),
(3, 8, '2012-07-02 10:38:50', '2012-04-23 07:59:06', 187.5),
(4, 8, '2012-07-02 22:59:23', '2012-04-23 07:59:06', 900),
(5, 8, '2012-07-03 17:54:20', '2012-04-23 07:59:06', 44),
(6, 4, '2012-07-03 17:08:30', '2012-02-03 14:20:45', 0),
(8, 8, '2012-09-16 20:48:39', '2012-04-23 07:59:06', 1440),
(9, 10, '2012-09-16 20:47:54', '2012-05-08 10:01:23', 0),
(10, 9, '2012-11-08 14:50:47', '2012-04-23 08:00:26', 70),
(11, 10, '2012-11-08 14:36:37', '2012-05-08 10:01:23', 0),
(12, 9, '2012-11-08 14:37:53', '2012-04-23 08:00:26', 0),
(13, 9, '2012-11-08 16:17:35', '2012-04-23 08:00:26', 144),
(14, 4, '2012-11-08 15:29:15', '2012-02-03 14:20:45', 200),
(16, 9, '2012-11-08 16:05:21', '2012-04-23 08:00:26', 0),
(17, 8, '2012-11-08 16:14:42', '2012-04-23 07:59:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `diainiciofin`
--
-- Creation: May 10, 2012 at 11:50 AM
-- Last update: Nov 08, 2012 at 08:17 AM
-- Last check: Dec 07, 2012 at 11:03 AM
--

DROP TABLE IF EXISTS `diainiciofin`;
CREATE TABLE IF NOT EXISTS `diainiciofin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NULL DEFAULT NULL,
  `montoInicio` float DEFAULT '0',
  `montoFin` float DEFAULT '0',
  `usuarioInicio` tinyint(3) unsigned DEFAULT NULL,
  `usuarioFin` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `diainiciofin`
--

INSERT INTO `diainiciofin` (`id`, `fecha`, `montoInicio`, `montoFin`, `usuarioInicio`, `usuarioFin`) VALUES
(1, '2012-06-23 00:00:00', 157, 0, 86, NULL),
(2, '2012-06-24 00:00:00', 900, 0, 86, NULL),
(3, '2012-06-30 00:00:00', 153.5, 0, 88, NULL),
(4, '2012-07-01 00:00:00', 1000, 0, 88, NULL),
(5, '2012-07-02 00:00:00', 238, 0, 88, NULL),
(6, '2012-07-03 00:00:00', 225, 1968, 88, 88),
(7, '2012-07-06 00:00:00', 188, 2012, 88, 88),
(8, '2012-07-18 00:00:00', 1000, 2012, 88, 88),
(9, '2012-08-07 00:00:00', 255, 0, 88, NULL),
(10, '2012-08-08 00:00:00', 156, 0, 88, NULL),
(11, '2012-09-16 00:00:00', 1000, 0, 88, NULL),
(12, '2012-09-22 00:00:00', 20, 0, 88, NULL),
(13, '2012-11-08 00:00:00', 150, 0, 77, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--
-- Creation: Nov 15, 2013 at 07:51 AM
-- Last update: Nov 15, 2013 at 07:51 AM
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Campo1` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `empresas`
--


-- --------------------------------------------------------

--
-- Table structure for table `factura_aux`
--
-- Creation: May 10, 2012 at 11:50 AM
-- Last update: Nov 08, 2012 at 02:54 PM
-- Last check: Dec 07, 2012 at 11:03 AM
--

DROP TABLE IF EXISTS `factura_aux`;
CREATE TABLE IF NOT EXISTS `factura_aux` (
  `factura` int(10) unsigned NOT NULL,
  `cantidad` tinyint(3) unsigned NOT NULL,
  `idProducto` int(10) unsigned NOT NULL,
  `pUnitario` float NOT NULL,
  `pTotal` float NOT NULL DEFAULT '0',
  `idAuxiliar` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idAuxiliar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `factura_aux`
--

INSERT INTO `factura_aux` (`factura`, `cantidad`, `idProducto`, `pUnitario`, `pTotal`, `idAuxiliar`) VALUES
(10, 1, 555266, 15, 0, 31),
(10, 1, 22332, 12, 0, 30),
(10, 23, 22332, 12, 0, 29),
(9, 6, 22332, 12, 0, 28),
(8, 5, 555266, 15, 0, 27),
(7, 1, 123512, 25, 0, 26),
(7, 1, 1001, 100, 0, 25),
(6, 1, 1001, 100, 0, 24),
(5, 23, 1229, 5.15, 0, 23),
(4, 75, 1229, 5.15, 0, 22),
(4, 5, 1229, 5.15, 0, 21),
(2, 2, 1001, 100, 0, 19),
(3, 3, 1006, 1, 0, 20),
(10, 2, 22332, 12, 0, 32),
(11, 5, 23333, 25, 0, 33),
(12, 1, 1235, 8, 0, 34),
(13, 1, 1111, 6, 0, 35),
(13, 1, 1111, 6, 0, 36);

-- --------------------------------------------------------

--
-- Table structure for table `itemcompra`
--
-- Creation: May 10, 2012 at 11:50 AM
-- Last update: Nov 08, 2012 at 04:17 PM
-- Last check: Dec 07, 2012 at 11:03 AM
--

DROP TABLE IF EXISTS `itemcompra`;
CREATE TABLE IF NOT EXISTS `itemcompra` (
  `idItemCompra` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idProducto` int(10) unsigned NOT NULL,
  `idRemito` int(10) unsigned NOT NULL,
  `cantidad` int(10) unsigned DEFAULT '0',
  `montoProducto` float unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idItemCompra`),
  KEY `FK_itemcompra_compra` (`idRemito`),
  KEY `FK_itemcompra_Producto` (`idProducto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=24 ;

--
-- Dumping data for table `itemcompra`
--

INSERT INTO `itemcompra` (`idItemCompra`, `idProducto`, `idRemito`, `cantidad`, `montoProducto`) VALUES
(1, 1006, 3, 50, 1.2),
(2, 5555, 3, 255, 0.5),
(3, 5555, 4, 50, 10),
(4, 1006, 4, 200, 2),
(5, 5555, 5, 0, 0),
(6, 1006, 5, 22, 2),
(7, 5555, 8, 0, 0),
(8, 1006, 8, 0, 0),
(9, 567890, 8, 24, 60),
(10, 1111, 11, 12, 0),
(11, 23333, 11, 0, 0),
(12, 555266, 12, 45, 0),
(13, 1229, 12, 0, 0),
(14, 555266, 10, 5, 5),
(15, 1229, 10, 5, 9),
(16, 100001, 14, 0, 0),
(17, 1001, 14, 10, 20),
(18, 1235, 17, 1, 10),
(19, 1006, 17, 0, 0),
(20, 5555, 17, 0, 0),
(21, 567890, 17, 0, 0),
(22, 1229, 13, 0, 0),
(23, 555266, 13, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `itemventa`
--
-- Creation: May 10, 2012 at 11:50 AM
-- Last update: Nov 08, 2012 at 02:56 PM
-- Last check: Dec 07, 2012 at 11:03 AM
--

DROP TABLE IF EXISTS `itemventa`;
CREATE TABLE IF NOT EXISTS `itemventa` (
  `ItemVenta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idProducto` int(10) unsigned NOT NULL,
  `idVenta` int(10) unsigned NOT NULL,
  `cantidad` int(10) unsigned NOT NULL DEFAULT '0',
  `precio` float unsigned NOT NULL,
  PRIMARY KEY (`ItemVenta`),
  KEY `FK_itemventa_venta` (`idVenta`),
  KEY `FK_itemventa_producto` (`idProducto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=22 ;

--
-- Dumping data for table `itemventa`
--

INSERT INTO `itemventa` (`ItemVenta`, `idProducto`, `idVenta`, `cantidad`, `precio`) VALUES
(1, 1001, 2, 2, 100),
(2, 5555, 2, 2, 5.25),
(3, 5555, 2, 3, 2.15),
(4, 1001, 2, 2, 100),
(5, 1006, 3, 3, 1),
(6, 1229, 4, 75, 5.15),
(7, 1229, 4, 5, 5.15),
(8, 1229, 5, 23, 5.15),
(9, 1001, 6, 1, 100),
(10, 123512, 7, 1, 25),
(11, 1001, 7, 1, 100),
(12, 555266, 8, 5, 15),
(13, 22332, 9, 6, 12),
(14, 555266, 10, 1, 15),
(15, 22332, 10, 1, 12),
(16, 22332, 10, 23, 12),
(17, 22332, 10, 2, 12),
(18, 23333, 11, 5, 25),
(19, 1235, 12, 1, 8),
(20, 1111, 13, 1, 6),
(21, 1111, 13, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `iva`
--
-- Creation: Dec 08, 2011 at 07:15 PM
-- Last update: Jun 07, 2012 at 06:31 AM
-- Last check: Jun 07, 2012 at 06:31 AM
--

DROP TABLE IF EXISTS `iva`;
CREATE TABLE IF NOT EXISTS `iva` (
  `id` smallint(8) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `usuario_alta` smallint(8) unsigned DEFAULT NULL,
  `fecha_alta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_baja` smallint(8) unsigned DEFAULT NULL,
  `fecha_baja` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=8 ;

--
-- Dumping data for table `iva`
--

INSERT INTO `iva` (`id`, `descripcion`, `usuario_alta`, `fecha_alta`, `usuario_baja`, `fecha_baja`) VALUES
(1, 'Desconocido', 86, '2011-01-13 11:55:48', 0, '0000-00-00 00:00:00'),
(2, 'Responsable Inscripto', 86, '2011-02-02 09:42:20', 0, '0000-00-00 00:00:00'),
(3, 'Responsable No Inscripto', 86, '2011-02-02 09:42:28', 0, '0000-00-00 00:00:00'),
(4, 'Monotributo', 86, '2011-01-13 12:02:53', 89, '2011-08-16 20:33:02'),
(5, 'Exento', 86, '2011-01-13 12:03:28', 0, '0000-00-00 00:00:00'),
(6, 'Exento Impuestos Municipales', 89, '2011-08-16 20:32:11', NULL, '0000-00-00 00:00:00'),
(7, 'Monotributo', 89, '2011-08-16 20:33:02', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `localidades`
--
-- Creation: Nov 15, 2013 at 07:48 AM
-- Last update: Nov 15, 2013 at 07:48 AM
--

DROP TABLE IF EXISTS `localidades`;
CREATE TABLE IF NOT EXISTS `localidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_provincia` int(11) NOT NULL DEFAULT '0',
  `localidad` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_localidades_1` (`id_provincia`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=2383 ;

--
-- Dumping data for table `localidades`
--


-- --------------------------------------------------------

--
-- Table structure for table `medida`
--
-- Creation: Nov 15, 2013 at 07:48 AM
-- Last update: Nov 15, 2013 at 07:48 AM
--

DROP TABLE IF EXISTS `medida`;
CREATE TABLE IF NOT EXISTS `medida` (
  `idMedida` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(15) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `abreviatura` varchar(5) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`idMedida`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `medida`
--


-- --------------------------------------------------------

--
-- Table structure for table `obrasejecutadas`
--
-- Creation: Nov 15, 2013 at 07:57 AM
-- Last update: Nov 29, 2013 at 01:12 PM
-- Last check: Dec 07, 2013 at 07:30 AM
--

DROP TABLE IF EXISTS `obrasejecutadas`;
CREATE TABLE IF NOT EXISTS `obrasejecutadas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Seleccion` tinyint(1) NOT NULL DEFAULT '0',
  `denominacion` varchar(255) DEFAULT NULL,
  `enejec` tinyint(1) NOT NULL DEFAULT '0',
  `idcomitente` smallint(5) unsigned DEFAULT NULL,
  `tipoDeObra` varchar(255) DEFAULT NULL,
  `montoContractualOriginal` double DEFAULT NULL,
  `montoContractualFinal` double DEFAULT NULL,
  `fechaTerminacionOriginal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `FechaTerminacionFinal` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `PlazoOriginal` varchar(15) DEFAULT NULL,
  `PlazoFinal` varchar(15) DEFAULT NULL,
  `idPersoneria` smallint(5) unsigned DEFAULT NULL,
  `participacion` float DEFAULT NULL,
  `ute` varchar(50) DEFAULT NULL,
  `observacion` varchar(255) DEFAULT NULL,
  `longitud` double unsigned DEFAULT NULL,
  `longitudMedida` smallint(5) unsigned DEFAULT NULL,
  `terraplenes` double unsigned DEFAULT NULL,
  `terraplenesMedida` smallint(5) unsigned DEFAULT NULL,
  `recubrimiento` double unsigned DEFAULT NULL,
  `recubrimientoMedida` smallint(5) unsigned DEFAULT NULL,
  `baseNoButuminosa` double unsigned DEFAULT NULL,
  `baseMedida` smallint(5) unsigned DEFAULT NULL,
  `banquinaRipio` double unsigned DEFAULT NULL,
  `banquinaRipioMedida` smallint(5) unsigned DEFAULT NULL,
  `tratamientoTriple` double unsigned DEFAULT NULL,
  `tratamientoTripleMedida` smallint(5) unsigned DEFAULT NULL,
  `Hormigones` double unsigned DEFAULT NULL,
  `HormigonesMedida` smallint(5) unsigned DEFAULT NULL,
  `reforestacion` double unsigned DEFAULT NULL,
  `reforestacionMedida` smallint(5) unsigned DEFAULT NULL,
  `certEjecucion` tinyint(1) NOT NULL DEFAULT '0',
  `rp` tinyint(1) NOT NULL DEFAULT '0',
  `rd` tinyint(1) NOT NULL DEFAULT '0',
  `ok` tinyint(1) NOT NULL DEFAULT '0',
  `fechaInicio` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fechaLicitacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fechaContrato` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fechaReplanteo` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `financiada` varchar(50) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `fechaRP` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fechaRD` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `kml` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_obrasejecutadas_Comitente` (`idcomitente`),
  KEY `FK_obrasejecutadas_2` (`idPersoneria`),
  KEY `FK_obrasejecutadas_3` (`longitudMedida`),
  KEY `FK_obrasejecutadas_4` (`banquinaRipioMedida`),
  KEY `FK_obrasejecutadas_5` (`HormigonesMedida`),
  KEY `FK_obrasejecutadas_6` (`tratamientoTripleMedida`),
  KEY `FK_obrasejecutadas_7` (`terraplenesMedida`),
  KEY `FK_obrasejecutadas_8` (`recubrimientoMedida`),
  KEY `FK_obrasejecutadas_9` (`baseMedida`),
  KEY `FK_obrasejecutadas_10` (`reforestacionMedida`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=170 ;

--
-- Dumping data for table `obrasejecutadas`
--

INSERT INTO `obrasejecutadas` (`ID`, `Seleccion`, `denominacion`, `enejec`, `idcomitente`, `tipoDeObra`, `montoContractualOriginal`, `montoContractualFinal`, `fechaTerminacionOriginal`, `FechaTerminacionFinal`, `PlazoOriginal`, `PlazoFinal`, `idPersoneria`, `participacion`, `ute`, `observacion`, `longitud`, `longitudMedida`, `terraplenes`, `terraplenesMedida`, `recubrimiento`, `recubrimientoMedida`, `baseNoButuminosa`, `baseMedida`, `banquinaRipio`, `banquinaRipioMedida`, `tratamientoTriple`, `tratamientoTripleMedida`, `Hormigones`, `HormigonesMedida`, `reforestacion`, `reforestacionMedida`, `certEjecucion`, `rp`, `rd`, `ok`, `fechaInicio`, `fechaLicitacion`, `fechaContrato`, `fechaReplanteo`, `financiada`, `comentario`, `fechaRP`, `fechaRD`, `kml`) VALUES
(152, 0, 'Prueba ', 1, 1, 'Prueba 12 ', 150, 156, '2013-01-01 00:00:00', '2013-01-01 00:00:00', '', '2013-01-01', 1, 100, 'UTE', 'Pruebaaaaaa internet', 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 1, 0, 0, 0, '2013-01-01 00:00:00', '2013-01-01 00:00:00', '2013-01-01 00:00:00', '2013-01-01 00:00:00', '100', ' Prueba intenert', '2013-11-11 00:00:00', '2013-11-11 00:00:00', NULL),
(2, 0, 'Ruta Nacional NÂº 12, Tramo: Crespo - ParanÃ¡, SecciÃ³n: Km. 399,00 - Km. 437,00', 0, NULL, 'Bacheo y recapado con concreto asfaltico, llenado de fisuras, alteo de banquinas y lechada asfaltica', 1747839.49, 1855289, '1995-06-16 00:00:00', '1994-11-03 00:00:00', ' 6 meses', ' 14 meses', NULL, 70, 'CLEANOSOL ARGENTINA S.A.I.C.F.I.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '1993-09-17 00:00:00', '1993-05-26 00:00:00', '1993-08-27 00:00:00', '1993-09-16 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(3, 1, 'Ruta Nacional NÂº 81, Tramo: Empalme Ruta Nacional NÂº 95 - Las Lomitas SecciÃ³n: Pozo del Tigre - Las Lomitas y Acceso a Las Lomitas', 0, NULL, 'Movimiento de suelos, obras bÃ¡sicas, obras de arte y pavimento de concreto asfÃ¡ltico', 9823121, 14104581, '1994-11-25 00:00:00', '1995-07-01 00:00:00', '30 meses', ' 44 meses', NULL, 100, NULL, 'Cantidades relevantes: Longitud 35,08 Km. - ExcavaciÃ³n comÃºn 2.565 mÂ³ - Terraplenes 1.062.429 mÂ³ - Recub suelo selecc 54.388 mÂ³ - Bases no bituminosas 50.538 mÂ³ - Mezclas asfalticas 78.533 t - HormigÃ³n obras de arte 3.792 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, '1991-03-25 00:00:00', '1990-09-27 00:00:00', '1991-02-01 00:00:00', '1991-03-25 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(4, 0, 'Ruta Nacional NÂº 12, Tramo: Empalme Ruta Provincial NÂº 7 - Empalme Ruta Provincial NÂº 1, SecciÃ³n: Km. 534,290 - Km. 601,270', 0, NULL, 'Apertura y llenado de baches con mezcla asfÃ¡ltica en caliente', 682505, 674607.04, '1995-05-16 00:00:00', '1995-03-31 00:00:00', '4 meses', ' 3 meses', NULL, 100, NULL, 'Cantidades relevantes: Longitud 66,98 Km. - Mezclas asfalticas 5.112 t', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '1995-01-16 00:00:00', '1994-11-17 00:00:00', '1995-01-10 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(5, 1, 'ConstrucciÃ³n del Tramo Bermejo Km. 19 hacia Desemboque de la Carretera Bermejo - Desemboque, Departamento Tarija', 0, NULL, 'Movimiento de suelos, excavaciÃ³n en roca, obra bÃ¡sica, obras de arte mayores y menores y pavimentaciÃ³n con concreto asfÃ¡ltico en caliente', 15311661.98, 15311661.98, '1994-09-10 00:00:00', '1995-08-17 00:00:00', '18 meses', ' 29 meses', NULL, 33, '2 Arroyos-Luis Losi-Constructora Petrice (Copesa)', 'Cantidades relevantes: Longitud 19 Km - ExcavaciÃ³n comÃºn 983.000 mÂ³ - Terraplenes 267.755 mÂ³ - Bases no bituminosas 73.000 mÂ³ - Mezclas asfalticas 24.500 t - Hormigon obras de arte 1.307 mÂ³ - HÂº en masa para muros 4.600 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '1992-12-17 00:00:00', '1991-06-11 00:00:00', '1992-07-03 00:00:00', '1992-10-17 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(6, 1, 'AerÃ³dromo de Las Lomitas - RehabilitaciÃ³n de la Pista', 0, NULL, 'DemoliciÃ³n de la pista y construcciÃ³n de sub-base, base y carpeta concreto asfÃ¡ltico', 3448880.04, 3973050, '1995-05-31 00:00:00', '1995-05-31 00:00:00', '6 meses', ' 5 meses', NULL, 100, NULL, 'Cantidades relevantes: Longitud 2,8 Km. - Terraplenes 2.660 mÂ³ - Bases no bituminosas 350 mÂ³ - Mezclas asfalticas 26.857 t', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '1994-12-01 00:00:00', '1994-08-11 00:00:00', '1994-11-01 00:00:00', '1994-12-01 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(7, 0, 'Plan de PavimentaciÃ³n 50 Cuadras - II Etapa - Carpeta de concreto asfÃ¡ltico', 0, NULL, 'Bacheo y colocaciÃ³n de carpeta con concreto asfÃ¡ltico en caliente', 749637.3, 761551.88, '1995-06-17 00:00:00', '1995-07-12 00:00:00', ' 5 meses', ' 8 meses y 17 d', NULL, 100, NULL, 'Cantidades relevantes: Longitud 5 Km. - Mezclas asfalticas 9.104 t', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '1994-10-25 00:00:00', '1994-08-19 00:00:00', '1994-10-19 00:00:00', '1994-10-25 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(8, 1, 'Ruta Nacional NÂº 12, Tramo: ParanÃ¡ - Empalme Ruta Provincial NÂº 7, SecciÃ³n: Km. 456,30 - Km. 534,29', 0, NULL, 'ReconstrucciÃ³n de losas de HÂº, bacheo y repavimentaciÃ³n', 5989931.85, 6035084.66, '1995-11-30 00:00:00', '1995-11-30 00:00:00', '18 meses', '18 meses', NULL, 100, NULL, 'Cantidades relevantes: Longitud 77,99 Km. - Terraplenes 69.500 mÂ³ - Bases no bituminosas 350 mÂ³ - Mezclas asfalticas 95.100 t - Pavimentos de hormigÃ³n 700 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, '1994-05-30 00:00:00', '1993-09-13 00:00:00', '1994-05-06 00:00:00', '1994-05-30 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(9, 1, 'Ruta Nacional NÂº 131, Tramo: Empalme Ruta Provincial NÂº 11 - Crespo, SecciÃ³n: Km. 8,930 - Km. 40,920', 0, NULL, 'Bacheo y refuerzo de calzada', 3325216, 3305081.77, '1996-07-16 00:00:00', '1996-05-31 00:00:00', '11 meses', '10 meses', NULL, 50, 'Luis Losi SA - Decavial ', 'Cantidades relevantes: Longitud 31,99 Km. - Terraplenes 23.200 mÂ³ - Mezclas asfalticas 22.395 t', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '1995-08-16 00:00:00', '1995-01-04 00:00:00', '1995-07-20 00:00:00', '1995-08-16 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(10, 1, 'Ruta Nacional NÂº 12, Tramo: NogoyÃ¡ - Crespo, SecciÃ³n: Km. 333,490 - Km. 401,430', 0, NULL, 'Bacheo y refuerzo de calzada', 8239364.3, 8502060, '1997-05-16 00:00:00', '1996-09-30 00:00:00', '21 meses', '13 meses y 14 d', NULL, 50, 'Luis Losi SA - Decavial ', 'Cantidades relevantes: 67,94 Km. - Terraplenes 54.000 mÂ³ - Mezclas asfalticas 61.143 t', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '1995-08-16 00:00:00', '1995-01-03 00:00:00', '1995-07-20 00:00:00', '1995-08-16 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(11, 1, 'Ruta Nacional NÂº 81, Tramo: Las Lomitas - Ingeniero Juarez, SecciÃ³n: Las Lomitas - Juan G. BazÃ¡n', 0, NULL, 'Obras bÃ¡sicas, obras de arte y pavimento flexible en caliente', 13697959.88, 13695965.05, '1997-04-18 00:00:00', '1996-10-31 00:00:00', '24 meses', '18,4 meses', NULL, 100, NULL, 'Cantidades relevantes: ExcavaciÃ³n comÃºn: 3.380 mÂ³ - Terraplenes 843.070 mÂ³ - Recub suelo selec 47.589 mÂ³ - Bases no bituminosas 33.700 mÂ³ - Mezclas asfalticas 24.789 t - Hormigon obras de arte 1.061 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, '1995-04-18 00:00:00', '1994-09-27 00:00:00', '1995-04-03 00:00:00', '1995-04-18 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(12, 0, 'Fresado y RepavimentaciÃ³n del TÃºnel Subfluvial Hernandarias', 0, NULL, 'Fresado de la calzada y repavimentaciÃ³n, sellado de juntas, reparaciÃ³n de cordones', 344657.56, 442754.43, '1996-12-08 00:00:00', '1997-04-10 00:00:00', '20 dÃ­as corrid', '50 dÃ­as corrid', NULL, 100, NULL, 'Cantidades relevantes: Longitud 2,94 Km. - Fresado 9.707 mÂ² - Mezclas asfalticas 1.222 t', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '1996-11-18 00:00:00', '1996-10-17 00:00:00', '1996-11-07 00:00:00', '1996-11-18 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(13, 0, 'Ruta Nacional NÂ° 34, Tramo: Empalme Ruta Nacional NÂ° 50 - LÃ­mite con Bolivia, SecciÃ³n: Km. 1.356,50 - Km. 1.488,40', 0, NULL, 'ConstrucciÃ³n de defensas, conformaciÃ³n de cauces y construcciÃ³n de terraplenes', 974221, 987862.8, '1997-12-13 00:00:00', '1998-02-12 00:00:00', '6 meses', '8 meses', NULL, 100, NULL, 'Cantidades relevantes: Longitud 131,90 Km. - ExcavaciÃ³n no clasificada 104.815 mÂ³ - Terraplenes 10.890 mÂ³ - Gaviones 4.901 mÂ³ - Colchonetas 4.100 mÂ² - Geotextil 6.678 mÂ²', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, '1997-06-13 00:00:00', '1997-05-27 00:00:00', '1997-05-30 00:00:00', '1997-06-13 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(14, 1, 'Ruta Provincial NÂ°22, Tramo: Empalme Ruta Provincial NÂ° 20 - Federal', 0, NULL, 'Obras bÃ¡sicas, pavimento flexible y construcciÃ³n de cuatro puentes', 18988902.48, 21397282.74, '1997-02-11 00:00:00', '1998-04-13 00:00:00', '18 meses', '28 meses', NULL, 33, 'Luis Losi SA - Decavial - Vialco', 'Cantidades relevantes: Longitud 27,64 Km. - Terraplenes 706.853 mÂ³ - Recub suelo selecc 46.763 mÂ³ - Subras mej c/cal 3% 75.060 mÂ³ - Mezclas asfalticas 69856 t - Pilotes exc 2.403 mÂ³ - Hormigon obras de arte 4.524 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, '1995-08-11 00:00:00', '1994-10-25 00:00:00', '1995-07-12 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(15, 0, 'Ruta Nacional NÂ° 34, Tramo: Pichanal - General Mosconi, SecciÃ³n: Quebrada del Campichuelo', 0, NULL, 'ConstrucciÃ³n de dos puentes y obras complementarias', 2039587.68, 2073982.73, '1998-05-30 00:00:00', '1998-04-30 00:00:00', '12 meses', '10,7 meses', NULL, 100, NULL, 'Cantidades relevantes: Longitud 60 m en dos puentes - Terraplenes 24.975 mÂ³ - Bases bituminosas 1.276 mÂ³ - Mezclas asfÃ¡lticas 1.259 mÂ² - Hormigones 1.471 mÂ³ - Gaviones 1.015 mÂ³ - Colchonetas 2.293 mÂ²', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, '1997-06-13 00:00:00', '1997-05-27 00:00:00', '1997-05-30 00:00:00', '1997-06-13 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(16, 0, 'Plan de PavimentaciÃ³n Calles por Consorcio Vecinal - 1Â° Grupo', 0, NULL, 'Pavimento urbano', 1638642.91, 2464058.93, '1995-03-12 00:00:00', '1998-08-14 00:00:00', '6 meses', '34 meses', NULL, 100, NULL, 'Cantidades relevantes: Longitud 3,4 Km - ExcavaciÃ³n comÃºn 15.364 mÂ³ - Bases no bituminosas 8.170 mÂ³ - Mezclas asfalticas 18.318 t - Pavimentos de hormigon 1.300 mÂ³ - CordÃ³n cuneta 4.093 m', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '1994-09-12 00:00:00', '1994-05-20 00:00:00', '1994-08-11 00:00:00', '1994-09-12 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(17, 1, 'Acceso Norte a ParanÃ¡ y calle 825 y Ruta Prov. NÂº 8, Tramo: Antonio TomÃ¡s - Hernandarias', 0, NULL, 'Obras bÃ¡sicas, obras de arte, cinco puentes y pavimento flexible en caliente', 7924020.98008475, 31385657, '1989-06-22 00:00:00', '2008-12-17 00:00:00', NULL, NULL, NULL, 100, NULL, 'Cantidades relevantes: Longitud 39 Km. - ExcavaciÃ³n comÃºn 31.734 mÂ³ - Terraplenes 468.505 mÂ³ - Recub suelo selecc y calc. 19.180 mÂ³ - Bases no bituminosas 75.790 mÂ³ - Mezclas asfalticas 115.657 t - Hormigon obras de arte 4.791 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, '1994-02-23 00:00:00', '1987-02-27 00:00:00', '1987-07-10 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2010-02-18 00:00:00', '2010-11-01 00:00:00', NULL),
(18, 0, 'Defensa de MÃ¡rgenes y EstabilizaciÃ³n de Barrancas - Ciudad de La Paz', 0, NULL, 'EstabilizaciÃ³n de barrancas con pedraplÃ©n, terraplÃ©n costanero, desarrollo de paseo ribereÃ±o con calzada de pavimento articulado, obras de drenaje, arboleda e iluminaciÃ³n', 1449440.55, 1867604.14, '1999-09-05 00:00:00', '2000-06-06 00:00:00', '240 dÃ­as corri', NULL, NULL, 50, 'Luis Losi SA - Antolin Fernandez S.A.', 'Cantidades relevantes: Terraplenes 14.016 mÂ³ - Material geotextil 18.497 mÂ² - Pavimento articulado 2.368 mÂ² - PedraplÃ©n de apoyo 11.564 mÂ³ - Enrocado de protecciÃ³n 3.342 mÂ³ - Material de transiciÃ³n 1.659 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, '1999-01-12 00:00:00', '1998-06-11 00:00:00', '1998-12-23 00:00:00', '1999-01-08 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(19, 0, 'Colector Cloacal Noreste - Sector II - Red de Colectores ', 0, NULL, 'ConstrucciÃ³n de redes cloacales de la ciudad', 6626710.27, 8881090.11, '1999-03-28 00:00:00', '2000-08-31 00:00:00', '660 dias corrid', '660+150+amp', NULL, 30, 'Luis Losi SA - Benito Roggio', 'Cantidades relevantes: CaÃ±erÃ­as Ã¸ 200 a 900 mm 38.000 m - Estaciones elevadoras 8 - ExcavaciÃ³n 93.958 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '1997-06-06 00:00:00', '1997-04-28 00:00:00', '1997-05-07 00:00:00', '1997-06-06 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(20, 1, 'Ruta Provincial NÂº 44 Tramo: Ruta Nacional 18 - MarÃ­a Grande, Ruta Provincial "G", Tramo: MarÃ­a Grande - Ruta Nacional 127 - Obras bÃ¡sicas y pavimento', 0, NULL, 'Obras bÃ¡sicas, obras de arte, movimientos de tierra y pavimento flexible en caliente. SeÃ±alizaciÃ³n horizontal y vertical', 19985082, 19985082, '1979-03-12 00:00:00', '1979-03-12 00:00:00', '40 meses', '38,5 meses', NULL, 100, NULL, 'Cantidades relevantes: Longitud 34,92 Km - Excavacion comÃºn: 599.970 mÂ³ - Terraplenes 560.335 mÂ³ - Recubr. suelo seleccionado 54.587 mÂ³ - Bases no bituminosas 60.291 mÂ³ Mezclas asfalticas 79.914 t - HormigÃ³n en obras de arte 2.232 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '1975-12-30 00:00:00', '1975-02-04 00:00:00', '1975-10-27 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(21, 1, 'Aeropuerto Internacional de Salta "El Aybal" - Nueva Pista 01-19', 0, NULL, 'Obras bÃ¡sicas, de arte y carpeta asfÃ¡ltica. Pavimento de hormigÃ³n armado en cabeceras', 11788870, 11788870, '1979-09-14 00:00:00', '1979-09-14 00:00:00', '540 Dias', '540+300 Dias', NULL, 100, NULL, 'Cantidades relevantes: Longitud 24,58 Km - ExcavaciÃ³n comÃºn 579.146 mÂ³ - Terraplenes 302.895 mÂ³ - Bases no bituminosas 64.224 mÂ³ - Mezclas asfÃ¡lticas 88.987 t - HormigÃ³n obras de arte 1.600 mÂ³ - Pavimentos de hormigon 4.685 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '1978-05-26 00:00:00', '1978-01-31 00:00:00', '1978-04-19 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(22, 1, 'RepavimentaciÃ³n, Ensanche y RemodelaciÃ³n de la Avenida Almafuerte de la Ciudad de  ParanÃ¡', 0, NULL, 'Ensanche y repavimentaciÃ³n con carpeta asfÃ¡ltica en caliente. Obras de Arte. Cordones cunetas y badenes. SeÃ±alizaciÃ³n horizontal y vertical', 4217531, 4217531, '1980-02-28 00:00:00', '1980-02-28 00:00:00', '8 meses', '18 meses', NULL, 100, NULL, 'Cantidades relevantes: Longitud 10,3 Km - ExcavaciÃ³n comÃºn 11.801 mÂ³ - Terraplenes 7.242 mÂ³ - Bases no bituminosas 2.472 mÂ³ - Mezclas asfÃ¡lticas 29.466 t - HormigÃ³n obras de arte 1.346 mÂ³ - Pavimentos de hormigÃ³n 4.062 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '1978-08-31 00:00:00', '1977-12-22 00:00:00', '1978-03-14 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(23, 1, 'Ruta Provincial NÂº 11 Tramo: ParanÃ¡ - Diamante', 0, NULL, 'Ensanche y repavimentaciÃ³n con carpeta asfÃ¡ltica en caliente. Obras de arte. SeÃ±alizaciÃ³n horizontal y vertical', 5801357, 5801357, '1981-03-04 00:00:00', '1981-03-04 00:00:00', '270 dÃ­as labor', '300 dÃ­as labor', NULL, 100, NULL, 'Cantidades relevantes: Longitud: 35,62 Km - ExcavaciÃ³n comÃºn 74.671 mÂ³ - Terraplenes 71.737 mÂ³ - Bases no bituminosas 26.036 mÂ³ - Mezclas asfÃ¡lticas 93.812 t - HormigÃ³n obras de arte 133 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '1980-01-10 00:00:00', '1979-07-17 00:00:00', '1979-10-30 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(24, 1, 'Ruta Nacional 3 - Tramo: Fitz Roy - La Juanita', 0, NULL, 'Obras bÃ¡sicas, obras de arte, sub-base drenante, base anticongelante, banquinas mejoradas con ripio y pavimento de concreto asfÃ¡ltico en caliente', 10168120, 10168120, '1982-04-01 00:00:00', '1982-04-01 00:00:00', '30 meses', '28 meses', NULL, 100, NULL, 'Cantidades relevantes: Longitud 66,37 Km - ExcavaciÃ³n comÃºn 214.640 mÂ³ - ExcavaciÃ³n en roca 56.533 mÂ³ - Terraplenes 213.735 mÂ³ - Bases no bituminosas 388.877 mÂ³ - Mezclas asfÃ¡lticas 92.171 t - HormigÃ³n obras de arte 1.873 t', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '1979-12-01 00:00:00', '1979-01-29 00:00:00', '1979-09-03 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(25, 1, 'Ruta Provincial "G" continuaciÃ³n Tramo: Acceso a Hasenkamp desde Ruta Nacional 127', 0, NULL, 'Obras bÃ¡sicas, obras de arte, movimiento de suelos y pavimento flexible en caliente. SeÃ±alizaciÃ³n horizontal y vertical', 3284928, 3284928, '1982-07-30 00:00:00', '1982-07-30 00:00:00', '180 dÃ­as labor', '180 dÃ­as', NULL, 100, NULL, 'Cantidades relevantes: Longitud 12,5 Km - ExcavaciÃ³n comÃºn 114.531 mÂ³ - Terraplenes 114.531 mÂ³ - Rec suelo selecc 17.345 mÂ³ - Bases no bituminosas 15.532 mÂ³ - Mezclas asfalticas 39.602 t - HormigÃ³n obras de arte 481 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '1980-11-28 00:00:00', '1980-09-23 00:00:00', '1980-10-27 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(26, 0, 'ReconstrucciÃ³n pista de aterrizaje AerÃ³dromo Comodoro Pierrestegui', 0, NULL, 'ReconstrucciÃ³n base ripio-cal, pavimento flexible en caliente en pista y cabeceras', 791082, 791082, '1983-05-29 00:00:00', '1983-05-29 00:00:00', '11 dÃ­as labora', '11 dÃ­as labora', NULL, 100, NULL, 'Cantidades relevantes: Longitud 7,24 Km Bases no bituminosas 15.210 mÂ³ - Mezclas asfalticas 13.974 t', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '1983-05-02 00:00:00', '1983-04-27 00:00:00', '1983-05-02 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(27, 1, 'Ruta provincial "M" Tramo: Estancia Santa Juana - Empalme Ruta Provincial 37', 0, NULL, 'Obras bÃ¡sicas y pavimento', 5294232, 5294232, '1984-09-03 00:00:00', '1984-09-03 00:00:00', '324 dias labora', '324 dias labora', NULL, 100, NULL, 'Cantidades relevantes: Longitud 25,75 Km - ExcavaciÃ³n comÃºn 423.223 mÂ³ - Terraplenes 415.131 mÂ³ - Rec suelo selecc 43.189 mÂ³ - Bases no bituminosas 41.171 mÂ³ - Mezclas asfalticas 52.735 t - Hormigon obras de arte 268 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '1982-05-15 00:00:00', '1980-12-16 00:00:00', '1982-04-05 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(28, 0, 'Nuevo camino CÃ³rdoba - Cuyo Tramo: CÃ³rdoba - Villa Dolores SecciÃ³n: La Pampilla - Puesto Pedernera', 0, NULL, 'Construcc. de obra bÃ¡sica en camino de alta montaÃ±a, desarrollo de 8,684 m. ancho de coronamiento 19,5 m. Voladura de roca con precorte. Muros de hormigÃ³n en masa para contenciÃ³n de terraplenes. Camino de acceso 5.400 m. de long.y pte s/Rio de las Sue', 22075684, 22075684, '1987-04-20 00:00:00', '1987-04-20 00:00:00', '900 dias', '45 meses', NULL, 100, NULL, 'Cantidades relevantes: Longitud 107,37 Km. - ExcavaciÃ³n comÃºn 10.819 mÂ³ - ExcavaciÃ³n en roca 2.199.980 mÂ³ - Pedraplenes 1.484.724 mÂ³ - Muros de HÂº en masa 113.751 mÂ³ - Hormigon obras de arte 4.140 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-10-30 08:39:01', '1982-02-18 00:00:00', '1983-01-28 00:00:00', '1983-07-19 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(29, 0, 'PavimentaciÃ³n acceso a Colonia Avigdor Tramo: Ruta Provincial NÂº 6 - Colonia Avigdor', 0, NULL, 'EjecuciÃ³n de carpeta asfÃ¡ltica en caliente', 926360, 926360, '1987-10-23 00:00:00', '1987-10-23 00:00:00', '30 dÃ­as labora', '30 dÃ­as labora', NULL, 100, NULL, 'Cantidades relevantes: Longitud 9,52 Km - Mezcla asfÃ¡ltica 11.230 t', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '1987-09-04 00:00:00', '1987-04-29 00:00:00', '1987-08-24 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(30, 0, 'RepavimentaciÃ³n AutÃ³dromo Ciudad de ParanÃ¡', 0, NULL, 'ConstrucciÃ³n de una variante del circuito y repavimentaciÃ³n total del mismo. Obras de arte', 903681, 903681, '1988-05-31 00:00:00', '1988-05-31 00:00:00', NULL, NULL, NULL, 100, NULL, 'Cantidades relevantes: Longitud 7,37 Km - ExcavaciÃ³n comÃºn 1.778 - Terraplenes 1.778 - Rec suelo selecc 2.601 - Mezclas asfalticas 12.686 t', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(31, 1, 'Ruta Provincial NÂº 1 - Tramo: San VÃ­ctor - Feliciano', 0, NULL, 'Obras bÃ¡sicas, pavimento asfÃ¡ltico y ensanche 4 puentes. Mov. de suelos, sub-rasante mejorada con cal, base ripio - cal y carpeta de concreto asfaltico', 10214409, 10214409, '1988-07-01 00:00:00', '1988-07-01 00:00:00', '300 dÃ­as lobor', '420 dÃ­as labor', NULL, 100, NULL, 'Cantidades relevantes: Longitud: 33,2 Km. - ExcavaciÃ³n comun 258.476 mÂ³ - Terraplenes 226.571 mÂ³ - Rec suelo selecc 28.231 mÂ³ - Bases no bituminosas 57.900 mÂ³ - Mezclas asfalticas 60.919 t - Hormigon obras de arte 872 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '1985-11-09 00:00:00', '1985-08-13 00:00:00', '1985-10-10 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(32, 1, 'Ruta Provincial NÂº 8 Tramo: Cerrito - Antonio TomÃ¡s y Acceso a Cerrito', 0, NULL, 'Obras bÃ¡sicas, pavimento flexible y construcciÃ³n de un puente en la traza principal. Pavimento urbano de hormigÃ³n en la localidad de Cerrito', 10126096, 10126096, '1988-10-30 00:00:00', '1988-10-30 00:00:00', '294 dÃ­as labor', '294 dÃ­as labor', NULL, 100, NULL, 'Cantidades relevantes: Longitud 25,86 Km - Excavacion comun 402.196 mÂ³ - Terraplenes 384.428 mÂ³ - Recub suelo selecc 34.564 mÂ³ - Bases no bituminosas 34.443 mÂ³ - Mezclas asfalticas 70.197 t - Pavimento de hormigon 5.128 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '1986-02-21 00:00:00', '1985-10-31 00:00:00', '1985-12-23 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(33, 1, 'Plan de repavimentaciÃ³n 96 cuadras, planta urbana, ciudad de ParanÃ¡', 0, NULL, 'DemoliciÃ³n y reconstrucciÃ³n de cordones, cordones-cuneta y badenes. Fresado y bacheo calzada existente. RepavimentaciÃ³n con mezcla asfÃ¡ltica en caliente', 697109, 697109, '1991-11-05 00:00:00', '1991-11-05 00:00:00', '5 meses', '6 meses', NULL, 100, NULL, 'Cantidades relevantes: Longitud 14,7 Km - Bases no bituminosas 772 mÂ³ - Mezclas asfalticas 13.908 t - Pavimento de hormigon 1.043 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '1991-05-07 00:00:00', '1991-02-25 00:00:00', '1991-04-08 00:00:00', '1991-05-07 00:00:00', '|', NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(34, 0, 'Plan de repavimentaciÃ³n de 63 cuadras, ParanÃ¡', 0, NULL, 'Bacheo y repavimentaciÃ³n con mezcla asfÃ¡ltica en caliente', 497568.43, 646838.97, '1992-10-08 00:00:00', '1992-10-08 00:00:00', NULL, NULL, NULL, 100, NULL, 'Cantidades relevantes: Longitud 10,46 Km - Mezclas asfalticas 11.530 t', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '1992-07-20 00:00:00', '1992-05-29 00:00:00', '1992-07-02 00:00:00', '1992-07-20 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(35, 0, 'Ruta Nacional NÂº 12 Tramo: Empalme Ruta Nac. NÂº 127 - Arroyo Feliciano - Secciones: Km. 500 - Km. 512, Km. 512 - Km. 524, Km. 524 - Km. 536, y Km. 536 - Km. 550', 0, NULL, 'Bacheo con concreto asfÃ¡ltico', 156524, 156524, '1992-01-02 00:00:00', '1992-01-02 00:00:00', NULL, NULL, NULL, 100, NULL, 'Cantidades relevantes: Longitud 50 Km. - Mezclas asfalticas 1.600 t', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '1991-11-19 00:00:00', '1991-10-21 00:00:00', '1991-11-12 00:00:00', '1991-11-19 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(36, 0, 'Ruta Nacional NÂº 123 Tramo: RÃ­o MiriÃ±ay - Empalme Ruta Nac. NÂº 14 Secciones Varias: Km.119,67 - Km. 155,61 y Km. 184,18 - Km. 214,44', 0, NULL, 'Bacheo de la base con estabilizado granular, carpeta con premezclado en frÃ­o', 599602.47, 759093.92, '1994-05-31 00:00:00', '1994-05-31 00:00:00', '10 meses', '12 meses', NULL, 100, NULL, 'Cantidades relevantes: Longitud 66,2 Km. - Bases no bituminosas 1.177 mÂ³ - Lechada asfÃ¡ltica 119.088 mÂ²', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '1993-06-01 00:00:00', '1993-02-16 00:00:00', '1993-05-11 00:00:00', '1993-06-01 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(37, 0, 'Plan de pavimentaciÃ³n 50 cuadras con carpeta de concreto asfÃ¡ltico', 0, NULL, 'Bacheo y colocaciÃ³n de carpeta con concreto asfÃ¡ltico en caliente', 599731.4, 817514.51, '1994-12-16 00:00:00', '1994-12-16 00:00:00', '6 meses', '12 meses', NULL, 100, NULL, 'Cantidades relevantes: Longitud 5 Km. - Mezclas asfalticas 10.586 t', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '1993-12-09 00:00:00', '1993-10-12 00:00:00', '1993-11-29 00:00:00', '1993-12-09 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(38, 1, 'Ruta Nacional NÂº 81, Tramo: Palo Santo - Comandante Fontana, SecciÃ³n: Km. 1.313 - Km. 1.342', 0, NULL, 'Bacheo y recapado con mezcla asfÃ¡ltica y alteo de banquinas', 3098183.47, 3124897.93, '1994-11-15 00:00:00', '1994-11-15 00:00:00', '12 meses', '13 meses', NULL, 100, NULL, 'Cantidades relevantes: Longitud 31 Km. - Terraplenes 48.436 mÂ³ - Bases no bituminosas 1.299 mÂ³ - Mezclas asfalticas 30.434 t', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '1993-11-15 00:00:00', '1993-07-27 00:00:00', '1993-09-27 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(39, 0, 'Ruta Nacional NÂº 12 Tramo: Goya - Empalme Ruta Nac NÂº 123 SecciÃ³n Km 838 y Tramo Esquina - Goya SecciÃ³n Km. 729 - Km. 735 y Km. 753', 0, NULL, 'ConstrucciÃ³n de alcantarillas, adecuaciÃ³n de zanjas, desagÃ¼e, protecciÃ³n de terraplenes', 499185.22, 487086.03, '1999-12-31 00:00:00', '1999-12-31 00:00:00', '8 meses', '8 meses', NULL, 100, NULL, 'Cantidades relevantes: Terraplenes 1.291 mÂ³ - Hormigones 637 mÂ³ - EjecuciÃ³n calzada HÂº 243 mÂ² - Material geotextil 1.520 mÂ³ - Gaviones 124 mÂ³ - Colchonetas 1.232 mÂ²', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '1999-05-01 00:00:00', '1999-01-12 00:00:00', '1999-04-16 00:00:00', '1999-05-07 00:00:00', NULL, 'PUENTE SOBRE RIO CORRIENTES', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(40, 0, 'Ruta Nacional NÂº 34 Tramo: Pozo Hondo - Gobernador Garmendia', 0, NULL, 'Obras bÃ¡sicas, tratamiento bituminoso tipo triple, banquinas enripiadas y alcantarillas', 18748244.27, 19042578.62, '2000-02-15 00:00:00', '2000-06-30 00:00:00', '30 meses', '34,5 meses', NULL, 99, 'Luis Losi S.A. - Burgwardt y CÃ­a S.A. - UTE', 'Cantidades relevantes: Longitud 60,59 Km. - Terraplenes 1.325.002 mÂ³ - Recubrim c/selecc 212.339 mÂ³ - Bases no bituminosas 275.601 mÂ³ - Banquinas c/ripio 59.992 mÂ³ - Tratamiento triple 446.463 mÂ² - Hormigones 9.174 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '1997-08-15 00:00:00', '1996-09-30 00:00:00', '1997-07-31 00:00:00', '1997-08-15 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(41, 0, 'Ruta Nacional NÂº 9 Tramo: Iturbe - Ugchara SecciÃ³n: Esquinas Blancas - Ugchara', 0, NULL, 'Obras bÃ¡sicas, tratamiento bituminoso doble, 2 puentes (long. total = 112,5 m.) y alcantarillas', 9251135, 10351341.57, '1999-07-07 00:00:00', '2001-02-25 00:00:00', '24 meses', '24+3+16,5 meses', NULL, 100, NULL, 'Cantidades relevantes: Longitud 60,59 Km - Terraplenes 662.925 mÂ³ - Bases no bituminosas 64.084 mÂ³ - Tratamiento doble 217.261 mÂ² - CaÃ±os de HÂºGÂº 1.387 m - Hormigones 4.912 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '1997-07-07 00:00:00', '1996-09-30 00:00:00', '1997-06-20 00:00:00', '1997-07-07 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(42, 0, 'Ruta Nacional NÂº 34 Tramo: Gobernador Garmendia - Antilla', 0, NULL, 'Obras bÃ¡sicas, tratamiento bituminoso tipo triple, banquinas enripiadas, alcantarillas y construcciÃ³n de un puente L=67,5 m', 15447614.05, 18075027.24, '2000-02-15 00:00:00', '2001-01-15 00:00:00', '30 meses', '41 meses', NULL, 50, 'Luis Losi S.A. - Burgwardt y CÃ­a S.A. - UTE', 'Cantidades relevantes: Longitud 52,32 Km. - Terraplenes 1.272.853 mÂ³ - Recubrim c/selecc 101.165 mÂ³ - Bases no bituminosas 171.607 mÂ³ - Banquinas c/ripio 48.284 mÂ³ - Tratamiento triple 388.997 mÂ² - Hormigones 2.685 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '1997-08-15 00:00:00', '1996-10-01 00:00:00', '1997-07-31 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(43, 1, 'Ruta Nacional NÂº 234 Tramo: San MartÃ­n de los Andes - Empalme Ruta Nacional NÂº 231 SecciÃ³n II: RÃ­o Hermoso - Pichi Traful Sector I: RÃ­o Hermoso - Km 15 Sector II: Km 15 - Pichi Traful', 0, NULL, 'Obras bÃ¡sicas y calzada pavimentada', 7379914.06, 7293010.2, '2000-05-17 00:00:00', '2000-11-30 00:00:00', '32 meses', '34,70 meses', NULL, 50, 'Luis Losi S.A. - Balpala Construcciones S.A. - UTE', 'Cantidades relevantes: Longitud 24,45 Km. - Terraplenes 113.721 mÂ³ - Drenes long y transv 18.598 m - Bases no bituminosas 36.658 mÂ³ - Carpeta conc asfaltico 171.064 mÂ² - Hormigones 879 mÂ³ - ReforestaciÃ³n 33 Ha.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '1997-09-17 00:00:00', '1996-11-29 00:00:00', '1997-08-25 00:00:00', '1997-09-17 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(44, 0, 'ProvisiÃ³n de mezcla asfÃ¡ltica y reparaciÃ³n de baches en calles de la ciudad de ParanÃ¡', 0, NULL, 'ProvisiÃ³n de mezcla asfÃ¡ltica y reparaciÃ³n de baches en calles de la ciudad de ParanÃ¡', NULL, 852668.77, '1999-03-05 00:00:00', '1999-02-08 00:00:00', '12 meses', NULL, NULL, 100, NULL, 'Obra con monto, cantidades y plazo de ejecuciÃ³n variable segÃºn necesidades del comitente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '1998-03-16 00:00:00', '1998-01-26 00:00:00', '1998-03-05 00:00:00', '1998-03-16 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(45, 1, 'Ruta Nacional NÂº 12 Tramo: Esquina - Goya y puente sobre arroyo Machuca', 0, NULL, 'ConstrucciÃ³n de puente de 40 metros de longitud y accesos pavimentados', 1049905.82, 1041977.73, '2000-05-18 00:00:00', '2000-09-30 00:00:00', '12 meses', '16,5 meses', NULL, 100, NULL, 'Cantidades relevantes: Terraplenes 11.108 mÂ³ - ExcavaciÃ³n 2.486 mÂ³ - HormigÃ³n 427 mÂ³ - Material geotextil 1.413 mÂ² - Colchonetas 1.413 mÂ² - EjecuciÃ³n calzada HÂº 5.418 mÂ²', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, '1999-05-18 00:00:00', '1999-04-05 00:00:00', '1999-05-13 00:00:00', '1999-05-18 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(46, 1, 'Malla 502 - Rutas 12, 18 y 32 (C.Re.Ma.)', 0, NULL, 'Contratos de recuperaciÃ³n y mantenimiento', 15082942.27, NULL, '2002-09-24 00:00:00', '2008-04-30 00:00:00', '60 meses', '120 meses', NULL, 100, NULL, 'Cantidades relevantes: Longitud 271,44 Km - Mezclas asfalticas 71.435 - Recub suelo selecc 7.656 mÂ³ - Bases no bituminosas 5.775 mÂ³ - Corte de pastos 35.406 Ha.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '1997-08-01 00:00:00', '1996-10-29 00:00:00', '1997-07-15 00:00:00', '1997-09-09 00:00:00', 'FTN', NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(47, 1, 'Malla 506 - Ruta Nacional NÂº 127 (C.Re.Ma.)', 1, NULL, 'Contratos de recuperaciÃ³n y mantenimiento', 18678261.64, NULL, '2003-06-16 00:00:00', '2013-10-30 08:39:01', '60 meses', '117,6 meses', NULL, 100, NULL, 'Cantidades relevantes: Longitud 258,59 Km. - Mezclas asfalticas 107.488 t - Corte de pastos 37.710 Ha.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '1997-10-01 00:00:00', '1997-02-27 00:00:00', '1997-08-22 00:00:00', '1997-10-22 00:00:00', 'FTN', NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(48, 0, 'ConstrucciÃ³n edilicia, equipamiento integral, organizaciÃ³n, funcionamiento y capacitaciÃ³n de los recursos humanos de los hospitales a construir en Concordia, ConcepciÃ³n del Uruguay y Federal', 0, NULL, 'ConstrucciÃ³n edilicia y puesta en funcionamiento de tres nuevos hospitales', 48321866.14, NULL, '2000-02-01 00:00:00', '1999-11-24 00:00:00', '24 meses', NULL, NULL, 19, 'Roggio - Losi - Ercon - Matercon - Severs - UTE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '1998-02-21 00:00:00', '1997-10-08 00:00:00', '1998-02-12 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(49, 1, 'Ruta Provincial NÂº 2 Tramo: Feliciano - Ruta Nac. NÂº 14 y Camino Villa del Rosario Santa Ana', 0, NULL, 'Obras bÃ¡sicas, pavimento y puente sobre rÃ­o Feliciano de 75 m. y 2 aliviadores de 25 m. c/u', 21829982.3, 22308409, '2001-03-05 00:00:00', '2001-06-30 00:00:00', '24 meses', '27 meses', NULL, 40, 'Losi-Pietroboni-Hornus-Piton', 'Cantidades relevantes: Longitud 14,65 Km - Terraplenes 594.524 mÂ³ - Carpeta conc. asfaltico 117.438 tn - Hormigones 2.572 mÂ³ - Base de ripio 104.729 mÂ³ - Base negra 81.897 tn - RecompactaciÃ³n capa ripio 58.932 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '1999-03-05 00:00:00', '1998-09-09 00:00:00', '1999-03-05 00:00:00', '1999-03-05 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(50, 1, 'PavimentaciÃ³n conexiÃ³n vial La Rioja - Chilecito por El Velazco, departamentos Sanagasta y Chilecito Tramo: Los Cajones - AnguinÃ¡n, SecciÃ³n III: Pampa de la Viuda - Quebrada Seca', 0, NULL, 'Obras bÃ¡sicas, pavimento y construcciÃ³n de 11 tÃºneles', 37606018.55, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '30 meses\r\n30 me', NULL, NULL, 50, 'Losi S.A. - Vialmani S.A.', 'Cantidades relevantes: Longitud 29,61 Km. - Terraplenes 1.129.710 mÂ³ - ExcavaciÃ³n 3.468.865 mÂ³ - Carpeta conc. asfÃ¡ltico 216.766 mÂ² - Pavimento hormigÃ³n 6.650 mÂ² - Gaviones p/muros 9.400 mÂ³ - Mallas de anclaje 79.235 mÂ²', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '1999-06-11 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(51, 0, 'Ruta Nacional NÂº 34 Tramo: Antilla - Rosario de la Frontera, Secciones I y II', 0, NULL, 'Obras bÃ¡sicas, pavimento, dos puentes y dos alcantarillas', 12350140.44, 22204073.72, '2004-04-29 00:00:00', '2005-08-31 00:00:00', '15 meses', '31.9\r\n31,9 mese', NULL, 100, NULL, 'Cantidades relevantes: Terraplenes 114.739 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, '1997-01-28 00:00:00', '1996-07-22 00:00:00', '2013-10-30 08:39:01', '1997-01-28 00:00:00', 'BID', NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(52, 0, 'RepavimentaciÃ³n Avda. Laurencena y Av. Ramirez Norte', 0, NULL, 'RepavimentaciÃ³n de calles con mezcla asfÃ¡ltica en caliente', 202982.95, 271670.13, '2001-05-05 00:00:00', '2001-12-13 00:00:00', '3 meses', '10 meses', NULL, 100, NULL, 'Cantidades relevantes: Carpeta conc. asfÃ¡ltico 2.047 tn - Fresado carpeta asfÃ¡ltica 3.447 mÂ²', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2001-02-05 00:00:00', '2000-11-23 00:00:00', '2000-12-27 00:00:00', '2001-02-05 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(53, 0, 'Ruta Nacional NÂº 34 Tramo: Piedrabuena - LÃ­mite con Salta SecciÃ³n: Km. 884,80 - Km. 925,84 (RÃ­o UrueÃ±a)', 0, NULL, 'ConstrucciÃ³n de defensas, construcciÃ³n de terraplenes y alcantarillas', 554731.46, 470657.23, '2001-06-21 00:00:00', '2001-12-23 00:00:00', NULL, '10 meses', NULL, 100, NULL, 'Cantidades relevantes: Terraplenes 71.071 mÂ³ - Relleno de socavaciones 1.000 mÂ³ - Alcantarillas de caÃ±o 132 m.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2001-02-21 00:00:00', '2000-10-12 00:00:00', '2001-02-15 00:00:00', '2001-02-21 00:00:00', NULL, 'El contrato no estÃ¡ fechado', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(55, 0, 'PavimentaciÃ³n de calle Miguel David entre pavimento existente y Av. Pedro Zanni', 0, NULL, 'ProvisiÃ³n y colocaciÃ³n de concreto asfÃ¡ltico', 248249.76, 245756.47, '2002-02-14 00:00:00', '2001-08-29 00:00:00', '8 meses', '3 meses', NULL, 100, NULL, 'Cantidades relevantes: Concreto asfÃ¡ltico 4.409 tn. - Riego de liga 17.291 mÂ²', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, '2001-06-14 00:00:00', '2000-11-06 00:00:00', '2001-01-31 00:00:00', '2001-06-14 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(56, 0, 'Ruta Provincial NÂº 204 Tramo: Ruta Nacional NÂº 34 (El Bobadal) - El Arenal SecciÃ³n: Progresiva 4000 - 6200', 0, NULL, 'Movimientos de suelos, construcciÃ³n de alcantarillas, enripiado, gaviones y colchonetas', 218722.1, 206451.64, '2001-06-21 00:00:00', '2001-10-28 00:00:00', '4 meses', '4 meses', NULL, 100, NULL, 'Cantidades relevantes: Terraplenes 9.800 mÂ³ - Enripiado 1.650 mÂ³ - Colchonetas y gaviones 240 mÂ³', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '2001-06-28 00:00:00', '2000-10-11 00:00:00', '2013-10-30 08:39:01', '2001-02-21 00:00:00', NULL, 'El contrato no estÃ¡ fechado', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(57, 0, 'DesagÃ¼es pluviales y drenajes cuenca La SantiagueÃ±a - II Etapa', 0, NULL, 'ConstrucciÃ³n de desagÃ¼es pluviales y drenajes', 899023.09, NULL, '2001-10-30 00:00:00', '2013-10-30 08:39:01', '12 meses', NULL, NULL, 100, NULL, 'Cantidades relevantes: ExcavaciÃ³n y entubado 12.403 mÂ³ - Base y subbase calcÃ¡rea 8.290 mÂ² - Conducto caÃ±o 1.973 m', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2001-08-21 00:00:00', '2000-11-27 00:00:00', '2001-05-16 00:00:00', '2001-08-21 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(58, 1, 'Rehabilitacion y repavimentacion R.P. 129 Monte Caseros - Emp. RN 14 y Reconstruccion de obras bÃ¡sicas, alcantarillado y enripiado RP 23 El Descanso - Sauce', 0, NULL, 'Obras bÃ¡sicas, repavimentaciÃ³n, alcantarillado y enripiado', 2197053.28, 5416609.43, '2002-01-10 00:00:00', '2006-04-09 00:00:00', '6  MESES', '57 meses', NULL, 100, NULL, 'Terraplenes: 78.439 m3, Carpeta de concreto asfÃ¡ltico: 68.960 m2, Enripiado: 455,39 m3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2001-07-10 00:00:00', '2001-04-17 00:00:00', '2001-05-23 00:00:00', '2001-07-10 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(59, 0, 'Ruta Prov. NÂº 10 - Tramo: Maria Grande - Acceso a El Palenque', 0, NULL, 'Obras bÃ¡sicas y pavimento', 5874624.67, 25738366.51, '2003-05-30 00:00:00', '2013-10-30 08:39:01', '240 DIAS LABORA', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2001-06-25 00:00:00', '2001-03-09 00:00:00', '2001-06-13 00:00:00', '2001-06-25 00:00:00', NULL, NULL, '2009-10-26 00:00:00', '2013-10-30 08:39:01', NULL),
(60, 1, 'Ruta Provincial NÂº 126 - Tramo: Sauce CuruzÃº CuatiÃ¡ - SecciÃ³n: Prog. 0,00 a Prog. 41,00 - RehabilitaciÃ³n y reconstrucciÃ³n', 0, NULL, 'RehabilitaciÃ³n y reconstrucciÃ³n', 4803403.05, 5399011.74, '2004-10-17 00:00:00', '2005-02-15 00:00:00', '18 meses', NULL, NULL, 100, NULL, 'Terraplenes: 101.808 m3 Carpeta de concreto asfaltico e=0,04m: 303.458 m2 Excavacion para reconstruccion de cunetas y desagÃ»es: 44296 m3 Hormigon: 482 m3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2003-04-17 00:00:00', '2001-10-22 00:00:00', '2003-04-08 00:00:00', '2003-05-23 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(61, 1, 'Ruta Nac NÂº 168 - Tramo: Acc. a Santa Fe - Acc al Tunel - Secc 1 y 2', 0, NULL, 'RepavimentaciÃ³n de las calzadas existentes, reparaciÃ³n de losas de los pavimentos de hormigÃ³n, defensa de puentes y tareas de mantenimiento de rutina', 7690253.22, 10907773.46, '2005-03-03 00:00:00', '2006-07-24 00:00:00', '12 meses', '28 meses', NULL, 100, NULL, 'Terraplenes: 8.105 m3, fresado de pavimento: 20.780 m2, mezclas asfÃ¡lticas 38.758 tn, losas de hormigÃ³n: 2.000 m2, bacheo con mezcla no bituminosa: 2.299 tn, sellado de fisuras de pavimento de HÂº: 18.750 m', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '2004-03-18 00:00:00', '2003-10-08 00:00:00', '2004-03-03 00:00:00', '2004-03-18 00:00:00', 'FTN', NULL, '2013-10-30 08:39:01', '2011-05-09 00:00:00', NULL),
(63, 1, 'C.Re.Ma. - Malla 513A - Ruta Nac. 18 - Tramo: Emp. R.P.NÂº 32 - Emp. R.P.NÂº 20', 0, NULL, 'Contrato de recuperaciÃ³n y mantenimiento', 35214365.69, 42990365.72, '2010-01-01 00:00:00', '2009-12-31 00:00:00', '60 meses', NULL, NULL, 100, NULL, 'Cantidades relevantes: Terraplenes: 34.887 m3  Bacheo con concr. asfaltico: 22.744 tn Refuerzo con conc. asf: 101.743 tn  Fresado: 74.342 m2 Sellado de fisuras: 48.704 m Relleno de huellas con conc. AsfÃ¡ltico: 5.813 tn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2005-01-01 00:00:00', '2004-04-30 00:00:00', '2004-11-01 00:00:00', '2005-01-10 00:00:00', 'FTN', NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(64, 0, 'Mejoramiento de caminos en areas rurales productivas - Zona III, Tramo NÂº 1: Camino 3 Bocas - AÂº Sauce - Dpto. Gualeguay, Tramo NÂº 2: Camino Racedo - Puiggari - Dpto. Diamante, Tramo NÂº 3: Camino Ruta Provincial NÂº 11 - RincÃ³n del Doll - Dpto. Victo', 0, NULL, 'Mejoramiento de caminos - TerraplÃ©n con compactaciÃ³n especial p/banquinas, paquete estructural, carpeta asfÃ¡ltica en caliente, base y sub base c/suelo calcÃ¡reo, preparaciÃ³n de la subrasante, banquinas, coloc. Barandas, seÃ±alamiento horiz. y vert.', 9888044.22, 11364239.6, '2005-11-29 00:00:00', '2007-07-31 00:00:00', '12 meses', '16 meses', NULL, 33, 'Luis Losi SA - Lemiro Pietroboni - Jose Piton', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, '2004-11-29 00:00:00', '2004-08-12 00:00:00', '2004-11-25 00:00:00', '2004-11-29 00:00:00', NULL, NULL, '2006-04-12 00:00:00', '2007-06-05 00:00:00', NULL),
(65, 0, 'Bacheo de Ruta Nacional NÂº 12 - Tramo: Parana - Crespo', 0, NULL, 'Bacheo y fresado para correccion de huellas', 178948.38, 232673.42, '2006-09-01 00:00:00', '2006-10-31 00:00:00', '30 dias laborab', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2006-07-20 00:00:00', '2006-06-27 00:00:00', '2006-07-19 00:00:00', '2006-07-15 00:00:00', NULL, NULL, '2007-06-08 00:00:00', '2007-07-25 00:00:00', NULL),
(66, 1, 'Ruta Provincial NÂº 126 - Tramo Sauce - CurzÃº CuatiÃ¡ - SecciÃ³n: Prog. 41,00 - Prog. 80,81 - RehabilitaciÃ³n y reconstrucciÃ³n', 0, NULL, 'RehabilitaciÃ³n y reconstrucciÃ³n', 5191336.8, 6262642.91, '2004-10-16 00:00:00', '2005-12-15 00:00:00', '18 meses', '32 meses', NULL, 100, NULL, 'Terraplenes: 148.233 m3 Carpeta de concreto asfaltico e=0,04m: 325.268 m2 Excavacion para reconstruccion de cunetas y desagÃ»es: 39.799 m3 Hormigon: 446 m3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2003-04-17 00:00:00', '2001-10-22 00:00:00', '2003-04-08 00:00:00', '2003-05-23 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(67, 0, 'Provision de mezcla asfaltica en caliente y de asfalto diluido para la zonal Cerrito', 0, NULL, 'Provision de mezcla asfaltica para bacheo', 88000, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL, NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '2005-08-25 00:00:00', '2013-10-30 08:39:01', '2005-08-08 00:00:00', '2013-10-30 08:39:01', NULL, 'OBRA MENOR - Es una vta, no una obra-Acta de Recep Definitiva de fecha 24/08/06 - ContrataciÃ³n Directa (Sin licitaciÃ³n)', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(68, 0, 'Bacheo en Ruta Nac. NÂº 12 Tr: Parana - Acceso a la localidad de Crespo', 0, NULL, 'Bacheo', 99831.6, 98560.11, '2006-02-20 00:00:00', '2005-12-26 00:00:00', '60 DIAS LABORAB', '6 dias', NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2005-12-22 00:00:00', '2013-10-30 08:39:01', '2005-12-15 00:00:00', '2013-10-30 08:39:01', NULL, 'ContrataciÃ³n directa (sin licitaciÃ³n)', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL);
INSERT INTO `obrasejecutadas` (`ID`, `Seleccion`, `denominacion`, `enejec`, `idcomitente`, `tipoDeObra`, `montoContractualOriginal`, `montoContractualFinal`, `fechaTerminacionOriginal`, `FechaTerminacionFinal`, `PlazoOriginal`, `PlazoFinal`, `idPersoneria`, `participacion`, `ute`, `observacion`, `longitud`, `longitudMedida`, `terraplenes`, `terraplenesMedida`, `recubrimiento`, `recubrimientoMedida`, `baseNoButuminosa`, `baseMedida`, `banquinaRipio`, `banquinaRipioMedida`, `tratamientoTriple`, `tratamientoTripleMedida`, `Hormigones`, `HormigonesMedida`, `reforestacion`, `reforestacionMedida`, `certEjecucion`, `rp`, `rd`, `ok`, `fechaInicio`, `fechaLicitacion`, `fechaContrato`, `fechaReplanteo`, `financiada`, `comentario`, `fechaRP`, `fechaRD`, `kml`) VALUES
(69, 0, 'Bacheo de Ruta Nacional NÂº 12 Tramo: Parana - Crespo', 0, NULL, 'Bacheo de carpeta asfaltica', 178948.38, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '30 DIAS LABORAB', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2006-07-20 00:00:00', '2013-10-30 08:39:01', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL, 'Obra duplicada - VER ID 65', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(70, 0, 'ReparaciÃ³n de Ruta Provincial S/NÂº - Tramo: Maria Luisa - Las Delicias - Estacion Racedo - Dpto. ParanÃ¡.', 0, NULL, 'Bacheo y reparacÃ³n de carpeta asfÃ¡ltica', 244903, 340497.14, '2006-09-15 00:00:00', '2007-04-18 00:00:00', '60 DIAS LABORAB', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2006-07-15 00:00:00', '2006-06-22 00:00:00', '2006-07-14 00:00:00', '2006-07-15 00:00:00', NULL, 'OBRA MENOR', '2007-10-31 00:00:00', '2008-02-21 00:00:00', NULL),
(71, 0, 'Fresado y RepavimentaciÃ³n de 7250 m2 en rampa de acceso al TÃºnel', 0, NULL, 'Fresado y RepavimentaciÃ³n con carpeta asfÃ¡ltica', 499817.34, 525972.09, '2006-12-28 00:00:00', '2006-12-12 00:00:00', '30 dias corrido', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2006-11-28 00:00:00', '2006-09-26 00:00:00', '2006-10-27 00:00:00', '2006-11-28 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(72, 0, 'Plan de pavimentaciÃ³n VI Etapa - 75 Cuadras', 0, NULL, 'Pavimento Urbano-Carpeta de concreto asfÃ¡ltico en caliente, base y sub-base de suelo calcÃ¡reo, suelo comÃºn con compactaciÃ³n especial, riego de imprimaciÃ³n con E.M.1, cordon cuneta de HÂº AÂº', 11121499.06, 11111519.99, '2007-09-13 00:00:00', '2008-03-15 00:00:00', '10 meses corrid', '16 meses corrid', NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2006-11-13 00:00:00', '2006-10-25 00:00:00', '2006-11-13 00:00:00', '2006-11-13 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2008-06-13 00:00:00', NULL),
(73, 0, 'ProvisiÃ³n a la D.P.V. de mezcla asfÃ¡ltica en caliente  y asflato diluÃ­do tipo E.R.1 para bacheo en Rutas Provinciales A07 Acceso a Hernandarias - Ruta Provincial NÂ° 8 y Acceso a Villa Urquiza', 0, NULL, 'ProvisiÃ³n de mezcla asfÃ¡ltica en caliente y asfalto diluÃ­do tipo E.R.1 para bacheo', 70000, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '90 dias laborab', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2013-10-30 08:39:01', '2006-07-18 00:00:00', '2006-11-08 00:00:00', '2013-10-30 08:39:01', NULL, 'Es una venta, no es una obra - OBRA MENOR', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(74, 0, 'ProvisiÃ³n de mezcla asfÃ¡ltica para bacheo, reparaciÃ³n de baches, badenes y juntas de hormigÃ³n', 0, NULL, 'CanalizaciÃ³n del eje del badÃ©n, sumideros y desagÃ¼es, ampliaciÃ³n de baden, sellado de juntas de hormigÃ³n, bacheo', 50000, 383751.09, '2003-02-01 00:00:00', '2007-02-07 00:00:00', '24 meses', '13 meses', NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2001-02-01 00:00:00', '2000-10-17 00:00:00', '2000-12-27 00:00:00', '2001-02-01 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(75, 0, 'PavimentaciÃ³n del Barrio Jardines del Sur', 0, NULL, NULL, 286936.05, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '5 meses', NULL, NULL, 100, NULL, 'Convenio firmado el 23/12/1998 entre el comitente "Comunidad Vecinal Barrio Jardines del Sur" con la Municipalidad de ParanÃ¡ y el IAPV: La Municipalidad de ParanÃ¡ se hace cargo de $ 120,427,00 y el IAPV de $ 166.509,00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '1999-02-27 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(76, 0, 'Ruta Provincial NÂº 129 - Tramo: Monte Caseros - Ruta Nacional NÂº 14 - SecciÃ³n: Km. 0 - Km. 30,086 - RehabilitaciÃ³n estructural y repavimentaciÃ³n', 0, NULL, 'ProvisiÃ³n de 240 Tn. de mezcla asfÃ¡ltica para bacheo - ProvisiÃ³n y ejecuciÃ³n de 221.734 m2 de microcarpeta de concreto asfÃ¡ltico de 3,5 cm de espesor', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL, 'OBRA MENOR-Contr.fdo. e/lLosi y GIGAX SA (Subcontratista de HITO SA). Esta Ãºtilma contrato la obra con DPV de Corrientes', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(77, 0, 'C.Re.Ma. - Malla 533 - R.N. NÂº 12 - Tramo: Emp.Ruta Nac. NÂº 131 - Acceso a San Benito y Tramo: AÂº Las Tunas - Emp. R. N. NÂº 127; y R.N. NÂº 18, Tramo: Emp.R.N. NÂº 12-Emp.R.P. NÂº 32 - Provincia de Entre RÃ­os', 1, NULL, 'Contrato de RecuperaciÃ³n y Mantenimiento', 83958620.97, NULL, '2012-05-31 00:00:00', '2013-10-30 08:39:01', '60 meses', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2007-06-01 00:00:00', '2006-11-10 00:00:00', '2007-03-27 00:00:00', '2013-10-30 08:39:01', 'FTN', NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(78, 0, 'Ruta Nacional NÂº 14 - Tramo 3: Empalme Ruta Provincial NÂº 29 - Empalme Ruta Nacional NÂº 18; SecciÃ³n II: Ubajay - Empalme Ruta Nacional NÂº 18 - Pcia. de Entre RÃ­os', 1, NULL, 'ConstrucciÃ³n de obra bÃ¡sica, pavimento en alternativa flexible y 6 puentes para duplicaciÃ³n de la calzada existente', 190399282.29, NULL, '2010-07-30 00:00:00', '2013-10-30 08:39:01', '36 meses', NULL, NULL, 25, 'GREEN S.A.-ALQUIMAQ S.R.L.-LUIS LOSI-PIETROBONI SA', 'Long. del tramo: 33.133,62 m - ConstrucciÃ³n de 6 puentes: 1) 3 luces de 15 m c/u; 2) 9 luces de 20,30 m c/u; 3) 3 luces de 15,30 m; 4) 3 luces de 20 m c/u y 2 laterales de 15 m c/u; 5) 3 luces de 20 m c/u; 6) 2 luces de 25 m c/u', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2007-07-30 00:00:00', '2006-11-24 00:00:00', '2007-04-10 00:00:00', '2007-07-30 00:00:00', 'B.I.D.', 'La licitaciÃ³n se ganÃ³ con la alternativa pavimento rÃ­gido pero luego por midificaciÃ³n de obra se cambiÃ³ por pavimento flexible', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(79, 0, 'Fresado, Riego y EjecuciÃ³n de carpeta en 8 cuadras de la Ciudad de Crespo', 0, NULL, 'Fresado de pavimento bituminoso existente, riego de liga y ejecuciÃ³n de carpeta de concreto asfÃ¡ltico en caliente', 359643, 303403.87, '2007-05-14 00:00:00', '2007-05-10 00:00:00', '20 dÃ­as hÃ¡bil', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2007-04-22 00:00:00', '2007-03-09 00:00:00', '2007-04-13 00:00:00', '2013-10-30 08:39:01', NULL, 'OBRA MENOR', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(80, 0, 'Concreto AsfÃ¡ltico en Caliente', 0, NULL, 'ProvisiÃ³n, transporte y colocaciÃ³n de concreto asfÃ¡ltico en caliente para carpeta incluÃ­do riego de imprimaciÃ³n y provisiÃ³n de concreto asfÃ¡ltico en caliente puesto sobre camiÃ³n en planta', 479880, 464076.9, '2013-10-30 08:39:01', '2007-08-31 00:00:00', 'Item1: 30 ds.hÃ', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2007-08-01 00:00:00', '2007-05-17 00:00:00', '2007-07-02 00:00:00', '2013-10-30 08:39:01', NULL, 'OBRA MENOR', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(81, 0, 'Item NÂº 26 - Trama Vial - ParanÃ¡ VI - 40 Vivendas', 0, NULL, 'Trama vial', 15727.19, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '30 dÃ­as desde ', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '2007-03-13 00:00:00', '2013-10-30 08:39:01', NULL, 'Contrato de CesiÃ³n del Item NÂº 26 - OBRA MENOR', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(82, 0, 'Item NÂº 26 - Trama Vial - ParanÃ¡ IX - 40 Viviendas', 0, NULL, 'Trama vial', 16917.6, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '30 dÃ­as desde ', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '2007-03-13 00:00:00', '2013-10-30 08:39:01', NULL, 'Contrato de CesiÃ³n del Item NÂº 26 - OBRA MENOR', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(83, 0, 'Item NÂº 26 - Trama Vial - ParanÃ¡ X - 40 Viviendas', 0, NULL, 'Trama vial', 13347.86, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '30 dÃ­as desde ', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '2007-03-13 00:00:00', '2013-10-30 08:39:01', NULL, 'Contrato de CesiÃ³n del Item NÂº 26 - OBRA MENOR', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(84, 0, 'Mejoramiento de Caminos en Areas Rurales Productivas - Zona V, Tr.1: Camino Crespo - Racedo, Tr.2: Camino Villa Clara - R.N.NÂº 130, Tr.3: Camino Villa Clara - San Ernesto, Tr.4: Camino R.P. NÂº51 - Escuela NÂº 84', 0, NULL, 'Mejoramiento de caminos - TerraplÃ©n con compactaciÃ³n especial, construcciÃ³n de alcantarillas, paquete estructural, calzada de ripio natural, base de suelo calcÃ¡reo, preparaciÃ³n de la subrasabte, banquina con suelo comÃºn, reparaciÃ³n de puente, seÃ±.', 37623800.1, NULL, '2008-08-27 00:00:00', '2013-10-30 08:39:01', '12 meses', NULL, NULL, 25, 'Losi - Pietroboni - Panedile - Concret-nor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2007-08-27 00:00:00', '2006-12-07 00:00:00', '2007-08-22 00:00:00', '2007-08-27 00:00:00', 'B.I.D.', NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(85, 0, 'Obra de VinculaciÃ³n Acceso a Puerto YeruÃ¡ desde R.N. NÂº 14 (Km 242,36)', 0, NULL, 'Carpeta de concreto asfÃ¡ltico, riego de liga, base de concreto asfÃ¡ltico, riego de imprimaciÃ³n, base de ripio-cal, subbase de ripio natural, recubrimiento con suelo seleccionado,Long. 16.916,38m y construcciÃ³n de puente s/AÂº Arrebatacapa de 30m de lu', 36949806.07, NULL, '2009-04-25 00:00:00', '2011-02-25 00:00:00', '8 meses', '3 aÃ±os', NULL, 50, 'Losi - Covimer - Codi - Conevial', 'Acceso a Puerto YeruÃ¡ desde Ruta Nacional NÂº 14 (Puerto YeruÃ¡ - Calabacillas y Calabacillas - Empalme Ruta Nacional NÂº 14)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, '2008-08-25 00:00:00', '2007-03-09 00:00:00', '2007-10-30 00:00:00', '2008-08-25 00:00:00', NULL, NULL, '2011-03-29 00:00:00', '2011-08-25 00:00:00', NULL),
(86, 0, 'Asfaltado de calles en Colonia Avellaneda - Departamento ParanÃ¡', 0, NULL, 'Perfilado de base existente, imprimaciÃ³n con asfalto diluÃ­do tipo ER1 y paviementaciÃ³n con mezcla asfÃ¡ltica en caliente', 271042.87, 270896.41, '2013-10-30 08:39:01', '2007-11-03 00:00:00', '30 dÃ­as labora', '5 dÃ­as laborab', NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2007-10-30 00:00:00', '2007-07-31 00:00:00', '2007-10-30 00:00:00', '2013-10-30 08:39:01', NULL, 'OBRA MENOR', '2008-11-04 00:00:00', '2009-06-18 00:00:00', NULL),
(87, 0, 'C.Re.Ma. - Malla 502 (Fase II) - Ruta Nacional NÂº 12 - Tramo: Empalme Ruta Nacional NÂº 127 - LÃ­mite con Corrientes', 1, NULL, 'Contrato de RecuperaciÃ³n y Mantenimiento', 142997962.24, NULL, '2013-04-30 00:00:00', '2013-10-30 08:39:01', '60 meses', NULL, NULL, 65, 'Luis Losi S.A. - Lemiro Pablo Pietroboni S.A.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2008-05-01 00:00:00', '2007-08-17 00:00:00', '2007-12-20 00:00:00', '2013-10-30 08:39:01', 'Banco Mundial', NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(88, 0, 'Infraestructura PÃºblica y Salones de Usos MÃºltiples en los Barrios Anacleto Medina Norte, Santa Rita y Anegadizos', 1, NULL, 'Infraestructura bÃ¡sica (red de: agua potable, cloacas, vial, energÃ­a elÃ©ctrica y alumbrado pÃºblico, desagÃ¼es pluviales, peatonal; arbolado pÃºblico y espacios verdes; construcciÃ³n de 2 centros comunitarios, relleno costero con suelo seleccionado y c', 15711721.87, NULL, '2009-09-29 00:00:00', '2011-10-17 00:00:00', '540 dÃ­as', NULL, NULL, 100, NULL, 'Incluye desarrollo social y regularizaciÃ³n dominial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2008-04-07 00:00:00', '2007-11-12 00:00:00', '2008-03-05 00:00:00', '2008-04-07 00:00:00', 'B.I.D.', NULL, '2011-10-17 00:00:00', '2013-10-30 08:39:01', NULL),
(89, 0, 'Bacheo en Ruta Provincial NÂº 11 - Tramo. AÂº Salto - AÂº Doll', 0, NULL, 'Bacheo, reemplazo de carpeta y base asfÃ¡ltica existente, riego asfÃ¡ltico', 296187.27, 296068.82, '2013-10-30 08:39:01', '2008-01-31 00:00:00', '60 dÃ­as labora', '7 dÃ­as', NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2008-01-24 00:00:00', '2007-11-22 00:00:00', '2008-01-02 00:00:00', '2013-10-30 08:39:01', NULL, 'OBRA MENOR', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(90, 0, 'RehabilitaciÃ³n de Ruta Provincial s/nÂº - Tramo: Ruta Nacional NÂº 12 (AÂº MarÃ­a Luisa) - Las Delicias - Racedo - Departamento ParanÃ¡', 0, NULL, 'RecompactaciÃ³n, desmenuzado, escarificado, colocaciÃ³n de carpeta asfÃ¡ltica, bacheo y ejecuciÃ³n de banquinas', 5869615.16, 5767006.95, '2008-10-29 00:00:00', '2008-10-31 00:00:00', '120 dÃ­as corri', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2008-07-01 00:00:00', '2008-04-07 00:00:00', '2008-06-12 00:00:00', '2008-07-01 00:00:00', NULL, NULL, '2008-10-20 00:00:00', '2010-03-04 00:00:00', NULL),
(91, 0, 'Acceso al TrÃ¡nsito Pesado de Crespo por Calle Ramirez', 0, NULL, 'PreparaciÃ³n de la subrasante, ejecuciÃ³n de dos capas estructurales con suelo calcÃ¡reo y carpeta de concreto asfÃ¡ltico en caliente de 0,07 m de espesor', 399862.91, 399842.21, '2013-10-30 08:39:01', '2008-08-31 00:00:00', '30 dÃ­as labora', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2008-08-04 00:00:00', '2008-05-19 00:00:00', '2008-07-31 00:00:00', '2008-08-04 00:00:00', NULL, 'OBRA MENOR', '2008-10-20 00:00:00', '2009-07-03 00:00:00', NULL),
(92, 0, 'Malla NÂº 2: Ruta Provincial NÂº 13 - Tramo: MburucuyÃ¡ - Empalme Ruta Nacional NÂº 118 y Ruta Provincial NÂº 27 - Tramo: 4 Bocas - Goya', 1, NULL, 'Contrato de RecuperaciÃ³n y Mantenimiento', 55993262.81, NULL, '2013-10-31 00:00:00', '2013-10-30 08:39:01', '60 meses', NULL, NULL, 50, 'Vialbaires S.A. - Luis Losi S.A.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2008-11-01 00:00:00', '2007-09-25 00:00:00', '2008-08-25 00:00:00', '2013-10-30 08:39:01', 'BIRF', NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(93, 0, 'Ruta Provincial NÂº  39 - Tramo: Villa San Miguel (Km. 112) - Ruta Nacional NÂº 14 (Km. 150) - Obra: RehabilitaciÃ³n de la calzada existente', 1, NULL, 'Fresado, sellado de fisuras, bacheo superificial y profundo, riego de liga, riego de imprimaciÃ³n, base de suelo calcÃ¡reo, carpeta asfÃ¡ltica, terraplÃ©n de suelo comÃºn, base negra, colocaciÃ³n de barandas, seÃ±alizaciÃ³n horizontal y vertical, dÃ¡rsena', 43499100.62, NULL, '2009-08-22 00:00:00', '2013-10-30 08:39:01', '8 meses', NULL, NULL, 60, 'Luis Losi S.A. - Lemiro Pablo Pietroboni S.A.-UTE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2008-12-22 00:00:00', '2008-08-29 00:00:00', '2008-11-24 00:00:00', '2008-12-22 00:00:00', 'D.N.V.', NULL, '2011-12-28 00:00:00', '2013-10-30 08:39:01', NULL),
(94, 0, 'RehabilitaciÃ³n Acceso a la localidad de Villa Urquiza (Ruta A-09) desde Ruta Nacional NÂº 12 - Departamento ParanÃ¡ - Provincia de Entre RÃ­os', 0, NULL, 'Perfil tipo y diseÃ±o estructural, construcciÃ³n de alcantarillas laterales, retiro y colocaciÃ³n de pretiles de hormigÃ³n, retiro y colocaciÃ³n de baranda metÃ¡lica, reposiciÃ³n de baranda de puente, zampeado de protecciÃ³n para alcantarillas transversal', 18935726.45, 18562382.06, '2009-08-25 00:00:00', '2009-10-27 00:00:00', '6 meses', '8 meses', NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2009-02-25 00:00:00', '2008-12-05 00:00:00', '2009-02-14 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2009-09-28 00:00:00', '2011-05-16 00:00:00', NULL),
(95, 0, 'Ruta Provincial NÂº 6 - Tramo I: Arroyo Altamirano - Km. 13.900 (Durazno) - RehabilitaciÃ³n de calzada existente - Departamento Rosario del Tala - Provincia de Entre RÃ­os', 1, NULL, 'ReconstrucciÃ³n de capas ligadas de 14 cm, repavimentaciÃ³n en 9 cm, fresados, bacheos superficiales y profundos, reparaciÃ³n de banquinas y taludes, seÃ±alizaciÃ³n horizontal y vertical, ejecuciÃ³n de 2 dÃ¡rsenas y reposiciÃ³n de barandas metÃ¡licas', 26988220.94, NULL, '2010-04-26 00:00:00', '2012-07-27 00:00:00', '10 meses', NULL, NULL, 50, 'LUIS LOSI S.A. - EDECA S.A. - U.T.E.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2009-06-26 00:00:00', '2009-02-20 00:00:00', '2009-06-11 00:00:00', '2009-06-26 00:00:00', NULL, NULL, '2012-07-27 00:00:00', '2013-10-30 08:39:01', NULL),
(96, 0, 'Acceso a Colonia Avellaneda desde Ruta Nacional NÂº 18 - Obras bÃ¡sicas, calzada pavimentada y refuerzo - Departamento ParanÃ¡ - Provincia de Entre RÃ­os', 0, NULL, 'Obra bÃ¡sica, calzada pavimentada y refuerzo', 1672854.38, 1659656.84, '2009-07-27 00:00:00', '2009-07-30 00:00:00', '3 meses', '4 meses', NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2009-04-27 00:00:00', '2009-02-09 00:00:00', '2009-04-23 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2009-10-08 00:00:00', '2010-05-17 00:00:00', NULL),
(97, 0, 'Acceso a Sauce Pinto - Tramo: Ruta Nacional NÂº 12 - Sauce Pinto - Obra bÃ¡sica y pavimento - Departamento ParanÃ¡ - Provincia de Entre RÃ­os', 0, NULL, 'Obra bÃ¡sica y pavimento', 8438236.68, 8433995.13, '2009-07-27 00:00:00', '2009-08-27 00:00:00', '3 meses', '4 meses', NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2009-04-27 00:00:00', '2009-02-09 00:00:00', '2009-04-23 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2010-03-12 00:00:00', '2010-11-02 00:00:00', NULL),
(98, 0, 'Intersecciones tipo minirotondas: Ruta Nacional NÂº 127 con Av. Antelo y Av. Irigoyen (Federal) - Acceso a Conscripto Bernardi: ConstrucciÃ³n de Obra BÃ¡sica y Pavimento Bituminoso', 1, NULL, 'Obras bÃ¡sicas y pavimento bituminoso', 25781691.43, NULL, '2011-02-27 00:00:00', '2013-10-30 08:39:01', '18 meses', NULL, NULL, 65, 'Luis Losi S.A. - Lemiro Pablo Pietroboni S.A.- UTE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2009-08-27 00:00:00', '2009-01-23 00:00:00', '2009-06-24 00:00:00', '2009-08-27 00:00:00', 'FTN', NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(99, 0, 'ConstrucciÃ³n de cruce alto nivel peatonal y seÃ±alizaciÃ³n en Ruta Provincial NÂº 1, Escuela Provincial NÂº 14 - (San VÃ­ctor) y demarcaciÃ³n con seÃ±alizaciÃ³n sobre Ruta Provincial NÂº 2, Escuela Provincial NÂº 166 (San Pedro) - Departamento Feliciano', 0, NULL, 'ConstrucciÃ³n de alto nivel y demarcaciÃ³n con seÃ±alizaciÃ³n', 858860.99, 858860.99, '2009-08-03 00:00:00', '2009-06-29 00:00:00', '45 dÃ­as', '11 dÃ­as', NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '2009-06-19 00:00:00', '2009-06-02 00:00:00', '2009-06-18 00:00:00', '2009-06-19 00:00:00', NULL, 'OBRA MENOR', '2009-10-01 00:00:00', '2010-05-18 00:00:00', NULL),
(100, 0, 'IntersecciÃ³n Ruta Nacional NÂº 18 - Ruta Provincial NÂº 32 - Distribuidor Vial Rural de Carril Simple - Departamento ParanÃ¡ - Provincia de Entre RÃ­os', 0, NULL, 'Obra bÃ¡sica y pavimento', 7077126.87, NULL, '2010-01-27 00:00:00', '2013-10-30 08:39:01', '6 meses', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2009-07-27 00:00:00', '2009-05-12 00:00:00', '2009-07-21 00:00:00', '2013-10-30 08:39:01', NULL, 'Obra neutralizada a partir del 1 de Agosto de 2009  mediante Acta de Acuerdo de fecha 19 de Oct de 2009', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(101, 0, 'Ruta Provincial NÂº 20 - Tramo I: Entre Ruta Provincial NÂº 39 y Arroyo Las Moscas - Departamento Uruguay - Obras BÃ¡sicas, Pavimento y Puente', 1, NULL, 'Obra bÃ¡sica, pavimento y puentes', 64949289.3, NULL, '2011-09-27 00:00:00', '2013-01-11 00:00:00', '26 meses', NULL, NULL, 37.4, 'L.Losi SA-Lemiro P.Pietroboni SA-JosÃ© E.PitÃ³n SA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2009-07-27 00:00:00', '2009-02-12 00:00:00', '2009-07-16 00:00:00', '2013-10-30 08:39:01', NULL, 'El RP de resolucion 24/4/12 es provisorio PARCIAL.', '2013-01-11 00:00:00', '2013-10-30 08:39:01', NULL),
(102, 0, 'Acceso a Villa Clara - Tramo: Ruta Nacional NÂº 18 - Progresiva 2.710 - RehabilitaciÃ³n de calzada existente - Departamento Villaguay - Provincia de Entre RÃ­os', 0, NULL, 'RehabilitaciÃ³n de calzada existente', 2456378.67, 2548268.32, '2009-11-27 00:00:00', '2010-09-30 00:00:00', '4 meses', '7 meses', NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2009-07-27 00:00:00', '2009-04-17 00:00:00', '2009-07-24 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2010-08-29 00:00:00', '2011-03-01 00:00:00', NULL),
(103, 0, 'Acceso a El Pingo - Tramo: desde Ruta Provincial NÂº 32 a Ruta Nacional NÂº 127 - ReconstrucciÃ³n de calzada existente - Departamento ParanÃ¡ - Provincia de Entre RÃ­os', 0, NULL, 'ReconstrucciÃ³n de calzada', 3134099.07, 3060519.57, '2009-11-27 00:00:00', '2009-10-31 00:00:00', '4 meses', '3 meses', NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2009-07-27 00:00:00', '2009-04-17 00:00:00', '2009-07-24 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2009-12-22 00:00:00', '2011-05-16 00:00:00', NULL),
(104, 0, 'Ruta Provincial NÂº 6 - Provincia de Santiago del Estero - Tramo: Frias - EstaciÃ³n La Punta - Loreto - SecciÃ³n: IntersecciÃ³n R.N. NÂº 157 - R.N. NÂº 9', 1, NULL, 'RepavimentaciÃ³n con concreto asfÃ¡ltico, banquinas de suelo comÃºn, obras bÃ¡sicas y pavimento en zona intersecciones y dÃ¡rsenas de paradas de colectivos', 219708411.54, NULL, '2011-09-27 00:00:00', '2013-10-30 08:39:01', '730 dias corrid', NULL, NULL, 33, 'Perales Aguiar S.A. - Conorvial S.A. - Luis Losi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2009-09-28 00:00:00', '2009-06-19 00:00:00', '2009-09-01 00:00:00', '2013-10-30 08:39:01', 'BID', NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(105, 0, 'Mejoramiento Vial Troncal y Acceso al Sector de Bajada Grande', 1, NULL, 'Carpeta de Concreto asfÃ¡ltico en caliente, base de suelo calcareo, suelo comÃºn mejorado, cordÃ³n cuneta, vereda con lajas, sellado de fisuras, riegos de imprimaciÃ³n y de liga, demoliciÃ³n y reconstrucciÃ³n de cordÃ³n cuneta.', 21314702.31, NULL, '2011-04-29 00:00:00', '2013-10-30 08:39:01', '12 meses', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2010-04-29 00:00:00', '2009-06-23 00:00:00', '2010-04-27 00:00:00', '2010-04-29 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(106, 0, 'ConstrucciÃ³n de CiclovÃ­a en Nexo: Ruta Nacional NÂº 12 - Acceso Norte a ParanÃ¡', 0, NULL, 'ConstrucciÃ³n de base calcÃ¡rea, carpeta asfÃ¡ltica, dÃ¡rsena de maniobras y seÃ±alizaciÃ³n horizontal', 391532.75, 389509.43, '2009-12-08 00:00:00', '2009-12-19 00:00:00', '30 dÃ­as labora', '40 dÃ­as labora', NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2009-11-09 00:00:00', '2009-06-26 00:00:00', '2009-10-23 00:00:00', '2013-10-30 08:39:01', NULL, 'Obra Menor', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(107, 0, 'Acceso a Ramirez - Tramo: desde Ruta Nacional NÂº 12 hasta Progresiva 2150 - RehabilitaciÃ³n de calzada existente', 0, NULL, 'Terraplen con compactaciÃ³n especial, paquetes estructurales, rehabilitaciÃ³n de pavimento felxible, rehabilitaciÃ³n de boquilla, ejecuciÃ³n de cordones protectores de borde, colocaciÃ³n de baranda metÃ¡lica de defensa, seÃ±alizaciÃ³n vertical y horizonta', 1931354, NULL, '2009-02-26 00:00:00', '2013-10-30 08:39:01', '4 meses', NULL, NULL, 100, NULL, 'Monto contrato TAXSA CONSTRUCTORA S.R.L. con DPV: $ 2.145.949,35 de fecha 31/07/2009 - Monto contrato de cesiÃ³n (90% del anterior): $ 1.931.354,00 de fecha 25/09/2009', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2009-10-26 00:00:00', '2009-04-17 00:00:00', '2009-09-25 00:00:00', '2009-10-26 00:00:00', NULL, 'Obra Menor - Obra cedida por la firma TAXSA Constructora S.R.L. - La fecha de contrato es la del Contrato de CesiÃ³n de Obra.', '2010-05-11 00:00:00', '2013-10-30 08:39:01', NULL),
(108, 0, 'Bacheo en R.P. NÂº 8 y Acceso A03', 0, NULL, 'ReconstrucciÃ³n de 88,50 m, ejecuciÃ³n de la carpeta asfÃ¡ltica y bacheo distribuido en toda la longitud, perfilado de la base existente, imprimaciÃ³n', 567567.75, 677706.8, '2010-02-14 00:00:00', '2010-03-31 00:00:00', '30 dÃ­as labora', '3 meses', NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '2009-12-28 00:00:00', '2009-12-18 00:00:00', '2009-12-22 00:00:00', '2013-10-30 08:39:01', NULL, 'Obra menor', '2013-10-30 08:39:01', '2011-06-06 00:00:00', NULL),
(109, 0, 'Ruta Provincial NÂº 3 - Tramo: Empalme R.N. NÂº 9 (Termas de RÃ­o Hondo) - Empalme R.N. NÂº 64 (Santa Catalina) - Progresiva 0+000 a 82+940,72 - Provincia de Santiago del Estero', 1, NULL, 'Desbosque, destronque, limpieza de terreno, remociÃ³n de alambrados y colocaciÃ³n de nuevos, movimiento y compactaciÃ³n de suelos p/terraplen, demoliciÃ³n de alcantarilla y construcciÃ³n de nuevas, base granular, seÃ±alizaciÃ³n H y V, iluminac.,etc', 186941093.66, NULL, '2012-06-28 00:00:00', '2013-10-30 08:39:01', '24 meses', NULL, NULL, 55, 'Conorvial S.A. - Luis Losi S.A. - U.T.E.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2010-06-29 00:00:00', '2010-03-15 00:00:00', '2010-05-31 00:00:00', '2013-10-30 08:39:01', 'B.I.D.', NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(110, 0, 'ReparaciÃ³n de Ruta Nacional NÂº 18 - Provincia de Entre RÃ­os - Tramo I: San Salvador - Arroyo Grande del Pedernal', 0, NULL, 'Fresado, reparaciÃ³n de baches, relleno de huellas y perfilado de banquinas', 1229901.18, 1228556.49, '2010-08-31 00:00:00', '2010-06-25 00:00:00', '60 dÃ­as labora', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2010-05-31 00:00:00', '2010-04-20 00:00:00', '2010-05-28 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2010-08-18 00:00:00', '2011-06-03 00:00:00', NULL),
(111, 0, 'ReparaciÃ³n de Ruta Nacional NÂº 18 - Provincia de Entre RÃ­os - Tramo III: Prog. 18.000 - Prog. 27.000', 0, NULL, 'Fresado, reparaciÃ³n de baches, relleno de huellas y perfilado de banquinas', 1221205.84, 1220946.29, '2010-08-31 00:00:00', '2010-06-25 00:00:00', '60 dÃ­as labora', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2010-05-31 00:00:00', '2010-04-20 00:00:00', '2010-05-28 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2010-08-18 00:00:00', '2011-06-06 00:00:00', NULL),
(112, 0, 'RehabilitaciÃ³n del Acceso a MaciÃ¡ desde Ruta Provincial NÂº 6', 0, NULL, 'ReconstrucciÃ³n, ejecuciÃ³n de carpeta asfÃ¡ltica, bacheo superficial y profundo', 564978.89, 555327.32, '2010-06-25 00:00:00', '2010-05-30 00:00:00', '30 dÃ­as labora', '20 dÃ­as corrid', NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '2010-05-10 00:00:00', '2010-04-06 00:00:00', '2010-05-10 00:00:00', '2013-10-30 08:39:01', NULL, 'OBRA MENOR', '2013-10-30 08:39:01', '2011-06-01 00:00:00', NULL),
(113, 0, 'Bacheo Ruta Provincial NÂº 6 - Tramo: Prog. 38.400 - Ruta Nacional NÂº 127', 0, NULL, 'ReconstrucciÃ³n y bacheo', 1219097.96, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '30 dÃ­as labora', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '2013-10-30 08:39:01', '2010-04-20 00:00:00', '2010-05-21 00:00:00', '2010-07-14 00:00:00', NULL, 'OBRA MENOR', '2013-10-30 08:39:01', '2011-06-02 00:00:00', NULL),
(114, 0, 'RehabilitaciÃ³n del Acceso Norte a Ramirez desde R.N. NÂº 12', 0, NULL, 'Escarificado y recompactaciÃ³n de base y carpeta asfÃ¡ltica', 1249999.3, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '60 dÃ­as labora', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '2013-10-30 08:39:01', '2010-05-28 00:00:00', '2010-07-30 00:00:00', '2010-08-02 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2012-02-14 00:00:00', NULL),
(115, 0, 'ConstrucciÃ³n Represa AyuÃ­ Grande', 0, NULL, 'ConstrucciÃ³n de represa de suelo. Embalse destinado a riego agrÃ­cola', 42622582.28, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '12 meses', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-10-30 08:39:01', '2010-05-14 00:00:00', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(116, 0, 'Proyecto y ConstrucciÃ³n de la Obra AutovÃ­a en el Acceso Norte a la Ciudad de ParanÃ¡ - Dpto. ParanÃ¡', 1, NULL, 'ConstrucciÃ³n de segunda calzada y mejoramiento de la existente, construcciÃ³n de dos puentes', 130693749.53, NULL, '2014-02-28 00:00:00', '2013-10-30 08:39:01', '36 meses', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2011-03-01 00:00:00', '2010-08-31 00:00:00', '2010-12-15 00:00:00', '2011-03-01 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(117, 0, 'Acceso Parque Industrial de SeguÃ­ desde R.P. NÂº 32 y Bacheo de R.P. NÂº 32', 0, NULL, 'Sub rasante, base calcarea y carpeta sfÃ¡ltica en dÃ¡rsenas de maniobra para acceso y reparaciÃ³n mediante bacheo superficial y mejoramiento de calzada con mezcla asfÃ¡ltica en R.P. NÂº 32', 567683.27, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '45 dÃ­as labora', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2013-10-30 08:39:01', '2010-10-13 00:00:00', '2010-11-30 00:00:00', '2010-12-01 00:00:00', NULL, 'Obra menor', '2011-02-16 00:00:00', '2013-10-30 08:39:01', NULL),
(118, 0, 'Acceso a ColÃ³n: Bacheo, ReparaciÃ³n de Losas de HormigÃ³n y RepavimentaciÃ³n - Tramo: R.N. NÂº 135 - Km 7,9 - Avda. Costanera - Dpto. ColÃ³n', 0, NULL, 'Bacheo, reparaciÃ³n de losas de hormigÃ³n y carpeta de concreto asfÃ¡ltico', 6894888.56, NULL, '2011-06-22 00:00:00', '2011-10-21 00:00:00', '7 meses', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '2010-11-22 00:00:00', '2010-10-05 00:00:00', '2010-11-19 00:00:00', '2010-11-22 00:00:00', NULL, NULL, '2011-10-21 00:00:00', '2012-06-08 00:00:00', NULL),
(119, 0, 'Trabajos de RecuperaciÃ³n, Otras Intervenciones Obligatorias y Mantenimiento en la Malla 510, integrada por: Ruta Nacional NÂº 130, Tramo: Emp. R.N.NÂº 14 - Emp. R.P.NÂº 20, Provincia de Entre RÃ­os', 1, NULL, 'Contrato de RecuperaciÃ³n y Mantenimiento', 64946222.79, NULL, '2016-06-30 00:00:00', '2013-10-30 08:39:01', '60 meses', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2011-07-01 00:00:00', '2010-06-18 00:00:00', '2011-04-28 00:00:00', '2013-10-30 08:39:01', 'Banco Mundial', NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(120, 0, 'Mejoramiento de Caminos en Ã�reas Rurales Product. - Zona VII - Lote B - Tr.1: Camino de la Costa, Dpto. Feliciano - Tr.2: Escuela NÂº 70-R.N.NÂº 12, Dpto.PnÃ¡ - Tr.3: Ramirez-Aranguren, Dptos.Dte. y NogoyÃ¡ - Tr.4: Ramirez-Don Cristobal, Dptos. Dte. y No', 1, NULL, 'Obras bÃ¡sica y calzada enripiada - Calzada asfÃ¡ltica', 104887623.04, NULL, '2012-08-20 00:00:00', '2013-10-30 08:39:01', '18 meses', NULL, NULL, 25, 'Pietroboni - Losi - PitÃ³n - Sabavisa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2011-02-21 00:00:00', '2010-08-03 00:00:00', '2010-12-13 00:00:00', '2011-02-21 00:00:00', NULL, NULL, '2012-04-11 00:00:00', '2012-12-13 00:00:00', NULL),
(121, 0, 'RehabilitaciÃ³n Acceso Sur a ParanÃ¡ - Tramo: Avda. Almafuerte (Ciudad de ParanÃ¡) - Ruta Provincial NÂº 11 (Km. 8 - Ciudad de Oro Verde) - SecciÃ³n I: Oro Verde - Prog. 5100 - Departamento ParanÃ¡ - Provincia de Entre RÃ­os', 1, NULL, 'DemoliciÃ³n de pavimento existente, terraplÃ©n con compactaciÃ³n especial, construcciÃ³n de alcantarillas transversales y laterales, paquete estructural', 17658355.18, NULL, '2012-05-15 00:00:00', '2013-10-30 08:39:01', '12 meses', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2011-05-16 00:00:00', '2010-11-12 00:00:00', '2011-02-08 00:00:00', '2011-05-16 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(122, 0, 'PavimentaciÃ³n de la Ruta Provincial s/nÂº - Tramo: 3 Bocas - Ruta Provincial NÂº 11 - Departamento Gualeguay - Provincia de Entre RÃ­os', 1, NULL, 'Obras bÃ¡sicas, obras de arte y pavimento de concreto asfÃ¡ltico', 71559904.45, NULL, '2012-08-31 00:00:00', '2013-10-30 08:39:01', '12 meses', NULL, NULL, 50, 'Luis Losi S.A. - Lemiro Pablo Pietroboni S.A.-UTE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2011-09-01 00:00:00', '2011-01-26 00:00:00', '2011-04-06 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(123, 0, 'Ruta Nacional NÂº 18 - Provincia de Entre RÃ­os - Tramo IV: Arroyo Sandoval - Int. R.N. NÂº 14', 1, NULL, 'Obra bÃ¡sica y pavimento - ConstrucciÃ³n de 2 puentes de 50 y 30 m de longitud y 1 altonivel con puente de 60 m de longitud', 609770553.91, NULL, '2014-05-23 00:00:00', '2013-10-30 08:39:01', '36 meses', NULL, NULL, 20, 'L.L. S.A. - L.P. Pietroboni S.A. - Panedile Argent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2011-05-24 00:00:00', '2010-09-30 00:00:00', '2011-05-04 00:00:00', '2011-05-24 00:00:00', 'Gobierno Nacional', NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(124, 0, 'Acceso a MaciÃ¡ - Tramo: Gobernador Sola (Progresiva 5420) - MaciÃ¡ (Progresiva 26531,90) - ReconstrucciÃ³n de Calzada Existente - Departamento Tala - Provincia de Entre RÃ­os', 1, NULL, 'Fresado de carpeta, reconstrucciÃ³n de  base calcÃ¡rea, base y carpeta de mezclas asfÃ¡lticas en caliente, riegos de imprimaciÃ³n y liga, reposiciÃ³n de banquinas y taludes con suelo comÃºn, ejecuciÃ³n de cordÃ³n protector de borde de pavimento, etc.', 34418062.78, NULL, '2012-01-15 00:00:00', '2012-12-13 00:00:00', '6 meses', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2011-07-15 00:00:00', '2011-04-01 00:00:00', '2011-07-06 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2012-12-13 00:00:00', '2013-10-30 08:39:01', NULL),
(125, 0, 'Bacheo de la R.P. NÂº 6 - Tramo: R.P. NÂº 39 - AÂº Altamirano', 0, NULL, 'Bacheo y riego asfÃ¡ltico', 994138.3, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '30 dÃ­as labora', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2011-06-29 00:00:00', '2011-03-14 00:00:00', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL, 'Obra Menor', '2012-04-12 00:00:00', '2012-12-03 00:00:00', NULL),
(126, 0, 'ConstrucciÃ³n de obra bÃ¡sica y pavimento - Acceso a Pueblo Moreno desde Ruta Nacional NÂº 12 hasta progresiva 1.325,00 - Departamento ParanÃ¡ - Provincia de Entre RÃ­os', 1, NULL, 'Obra bÃ¡sica y pavimento', 4197215.34, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '4 meses', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-03-04 00:00:00', '2011-03-21 00:00:00', '2013-03-01 00:00:00', '2013-03-04 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(127, 0, 'Bacheo de la R.P. NÂº 6 - Tramo: R.N.NÂº 18 - R.N.NÂº 12 - Dpto. Villaguay - Dpto. La Paz', 1, NULL, 'Bacheo', 1087996.88, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '30 dÃ­as labora', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2011-07-19 00:00:00', '2011-03-14 00:00:00', '2011-07-11 00:00:00', '2013-10-30 08:39:01', NULL, 'Obra Menor', '2012-03-14 00:00:00', '2013-10-30 08:39:01', NULL),
(128, 0, 'Bacheo de la R.P. NÂº 6 - Tramo: R.N. NÂº 18 - Progresiva 38.400', 0, NULL, 'Bacheo', 1576928.73, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '60 dÃ­as labora', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2011-08-02 00:00:00', '2011-05-30 00:00:00', '2011-07-25 00:00:00', '2013-10-30 08:39:01', NULL, 'Obra Menor', '2012-03-14 00:00:00', '2012-12-03 00:00:00', NULL),
(129, 0, 'Bacheo de R.P. NÂº 6 - Tramo: R.N. NÂº 127 - R.N. NÂº 12', 0, NULL, 'Bacheo', 3155455.34, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '60 dÃ­as labora', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 0, '2011-08-17 00:00:00', '2011-06-01 00:00:00', '2011-08-16 00:00:00', '2013-10-30 08:39:01', NULL, 'Obra menor', '2012-03-14 00:00:00', '2012-12-03 00:00:00', NULL),
(130, 0, 'ReparaciÃ³n del Acceso a MaciÃ¡ desde Rutas Provinciales NÂº 6 y 39 Sur - ConstrucciÃ³n de dÃ¡rsenas de maniobra sobre R.P. NÂº 6', 1, NULL, 'Base, sub base y sub rasante calcÃ¡rea, carpeta asfÃ¡ltica y bacheo profundo', 3129980.8, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '60 dÃ­as labora', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2011-08-15 00:00:00', '2011-06-01 00:00:00', '2011-08-12 00:00:00', '2013-10-30 08:39:01', NULL, 'Obra menor', '2012-04-12 00:00:00', '2013-10-30 08:39:01', NULL),
(131, 0, 'ConstrucciÃ³n de Cordones Cunetas, Cordones Emergentes, Badenes, CÃ¡maras de CaptaciÃ³n para DesagÃ¼es Pluviales, DesagÃ¼es Pluviales y Pavimento de Concreto AsfÃ¡ltico, para la calle ParanÃ¡, entre calles Mitre y Urquiza y Pavimento de Concreto AsfÃ¡ltic', 1, NULL, 'Obas bÃ¡sicas y pavimento asfÃ¡ltico', 2801270.15, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '120 dÃ­as corri', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2012-04-16 00:00:00', '2011-10-17 00:00:00', '2011-12-16 00:00:00', '2013-10-30 08:39:01', NULL, 'Obra Menor    -   (*) para la calle Urquiza, entre las calles ParanÃ¡ y Dr. Berardo de la ciudad de Federal - Provincia de Entre RÃ­os', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(132, 0, 'Ruta Provincial NÂº 1 - Tramo: Ruta Nacional NÂº 168 - Km. 7+700 (San JosÃ© del RincÃ³n), AmpliaciÃ³n de Calzada. MÃ³dulo I: Ruta Nacional NÂº 168 - Km. 6+640', 1, NULL, 'RepavimentaciÃ³n y ensanche de calzada', 104991315.81, NULL, '2013-10-31 00:00:00', '2013-10-30 08:39:01', '18 meses', NULL, NULL, 33.33, 'Alquimaq SRL-Luis Losi SA-Ponce Construcciones SRL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2012-04-30 00:00:00', '2011-11-14 00:00:00', '2012-04-10 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(133, 0, 'Corredor Vial NÂº 4 - Ruta Nacional NÂº 19 desde Empalme Ruta Nacional NÂº 11 (km 0), hasta RÃ­o Primero (km 280,20); Ruta Nacional NÂº 38 desde Villa Carlos Paz (km 12,32) hasta Cruz del Eje (km 122,05); Ruta Nacional NÂº 34 desde 2Âº circunvalaciÃ³n de ', 1, NULL, 'RepavimentaciÃ³n', 62754851.62, NULL, '2012-11-11 00:00:00', '2013-10-30 08:39:01', '6', NULL, NULL, 50, 'Lemiro Pablo Pietroboni SA-Luis Losi SA-CV NÂº4 UT', 'Contrato de locaciÃ³n de obra con CCA (Carreteras Centrales de Argentina S.A.) - ES UNA OBRA SUBCONTRATADA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2012-05-01 00:00:00', '2013-10-30 08:39:01', '2012-04-19 00:00:00', '2013-10-30 08:39:01', NULL, '* Ruta Nacional NÂº A-0012 (km 13,95) hasta lÃ­mite Santa Fe - Santiago del Estero (km 398,00); Ruta Nacional NÂº 18 desde Empalme Ruta Nacional NÂº 12 (km 14,55) hasta Empalme Ruta Nacional NÂº 14 (km 241,26) - ORI C.4.1.10', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(134, 0, 'ReconstrucciÃ³n y AmpliaciÃ³n de Capacidad de la Avenida Almafuerte - Tramo: Bajo Nivel Avenida de CircunvalaciÃ³n - Puente sobre Arroyo Las Tunas', 1, NULL, 'ReconstrucciÃ³n y ampliaciÃ³n', 35844326.88, NULL, '2014-08-05 00:00:00', '2013-10-30 08:39:01', '24 meses', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-10-30 08:39:01', '2012-06-14 00:00:00', '2012-07-20 00:00:00', '2012-08-06 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(135, 0, 'Bacheos en la Ciudad de ParanÃ¡ - Etapa I - ReparaciÃ³n de Avenidas y Accesos RÃ¡pidos', 1, NULL, 'Bacheo', 3146592.12, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '60 dias laborab', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2012-06-29 00:00:00', '2012-04-26 00:00:00', '2012-06-28 00:00:00', '2013-10-30 08:39:01', NULL, 'Obra Menor', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(136, 0, 'AutÃ³dromo Ciudad de ParanÃ¡', 1, NULL, 'ReparaciÃ³n', 11665380.23, NULL, '2013-10-30 08:39:01', '2011-07-31 00:00:00', NULL, NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL, NULL, '2012-08-09 00:00:00', '2012-08-22 00:00:00', NULL),
(137, 0, 'ReparaciÃ³n y RehabilitaciÃ³n de Calzadas Pavimentadas', 1, NULL, 'Bacheo y sellado de fisuras', 1468976.66, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '90 dias corrido', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-10-30 08:39:01', '2012-07-30 00:00:00', '2012-08-23 00:00:00', '2012-09-04 00:00:00', NULL, 'Obra Menor', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(138, 0, 'Bacheo de R.P. NÂº 8 - Tramo R.N. NÂº 12 - Hernandarias', 1, NULL, 'Bacheo', 1578452.47, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '60 dias laborab', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2012-10-05 00:00:00', '2012-07-27 00:00:00', '2012-09-17 00:00:00', '2012-10-05 00:00:00', NULL, 'Obra Menor', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(139, 0, 'RepavimentaciÃ³n de calzada y pavimentaciÃ³n de banquinas - Ruta Nacional NÂº 127, Tramo: LÃ­mite con Entre RÃ­os - Emplame Rutas Nacionales NÂº 14 y NÂº 119, SecciÃ³n: Km. 292,23 - Km. 324,25', 1, NULL, 'ReconstrucciÃ³n de losas de hormigÃ³n y saneamiento de base, sellado de juntas de hormigÃ³n, riego de liga, carpeta de microconcreto asfÃ¡ltico y carpeta de concreto asfÃ¡ltico', 59516158.66, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '18', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-10-30 08:39:01', '2012-03-12 00:00:00', '2012-12-06 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(140, 0, 'Bacheo de R.P. NÂº 6, Tramo: R.N. NÂº 18 - AÂº Feliciano (Paso Medina)', 1, NULL, 'Bacheo profundo con suelo-cemento, reconstrucciÃ³n de base existente, riego de liga, riego de imprimaciÃ³n bacheo y carpeta de concreto asfÃ¡ltico', 3146351.12, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '60 dÃ­as labora', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2012-10-17 00:00:00', '2012-07-26 00:00:00', '2012-10-09 00:00:00', '2012-10-17 00:00:00', NULL, 'OBRA MENOR', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(141, 0, 'Acceso a Colonia Avellaneda desde Acceso Norte a la Ciudad de ParanÃ¡', 1, NULL, 'Obras bÃ¡sicas y pavimento de concreto asfÃ¡ltico', 3150106.03, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '60 dÃ­as labora', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2012-12-14 00:00:00', '2012-11-15 00:00:00', '2012-12-13 00:00:00', '2012-12-14 00:00:00', NULL, 'OBRA MENOR', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(142, 0, 'VinculaciÃ³n del Acceso con el Puerto de la Ciudad de ColÃ³n', 1, NULL, 'Obras bÃ¡sicas y pavimento de concreto asfÃ¡ltico', 1574679.87, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '30 dÃ­s laborab', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2012-12-19 00:00:00', '2012-12-13 00:00:00', '2012-12-19 00:00:00', '2013-10-30 08:39:01', NULL, 'OBRA MENOR', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL);
INSERT INTO `obrasejecutadas` (`ID`, `Seleccion`, `denominacion`, `enejec`, `idcomitente`, `tipoDeObra`, `montoContractualOriginal`, `montoContractualFinal`, `fechaTerminacionOriginal`, `FechaTerminacionFinal`, `PlazoOriginal`, `PlazoFinal`, `idPersoneria`, `participacion`, `ute`, `observacion`, `longitud`, `longitudMedida`, `terraplenes`, `terraplenesMedida`, `recubrimiento`, `recubrimientoMedida`, `baseNoButuminosa`, `baseMedida`, `banquinaRipio`, `banquinaRipioMedida`, `tratamientoTriple`, `tratamientoTripleMedida`, `Hormigones`, `HormigonesMedida`, `reforestacion`, `reforestacionMedida`, `certEjecucion`, `rp`, `rd`, `ok`, `fechaInicio`, `fechaLicitacion`, `fechaContrato`, `fechaReplanteo`, `financiada`, `comentario`, `fechaRP`, `fechaRD`, `kml`) VALUES
(143, 0, 'Cambio y ReparaciÃ³n de Ventanas del Edificio sito en la Av. Leandro N. Alem 638 de la C.A.B.A.', 1, NULL, 'Cambio y reparaciÃ³n de aberturas', 829979.88, NULL, '2013-11-06 00:00:00', '2013-10-30 08:39:01', '3 meses', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-08-07 00:00:00', '2012-09-12 00:00:00', '2013-05-08 00:00:00', '2013-07-31 00:00:00', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(144, 0, 'Obra BÃ¡sica y Pavimento - Acceso a Colonia Ayui - Tramo: Ruta Nacional NÂº 14 - A015 - Sub Tramo I: Ruta Nacional NÂº 14 - Colonia Ayui - Departamento Concordia - Provincia de Entre RÃ­os', 1, NULL, 'Obra bÃ¡sica y pavimento', 33391951.82, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '10 meses', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-06-24 00:00:00', '2011-10-03 00:00:00', '2013-05-06 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(145, 0, 'Proyecto y ConstrucciÃ³n de Obras BÃ¡sicas, Pavimento y Puentes sobre Ruta Provincial NÂº 5 - Tramo: Ruta Prov. NÂº 1 (La Paz) - Federal - SecciÃ³n Pueblo Banderitas - Federal - Departamentos La Paz - Federal - Entre RÃ­os', 1, NULL, 'Obra bÃ¡sica, pavimento y puentes', 292937127.44, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '36 meses', NULL, NULL, 50, 'Luis Losi S.A.-Lemiro Pablo Pietroboni S.A.-R.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-10-30 08:39:01', '2012-12-27 00:00:00', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(146, 0, 'Bacheo Superficial y Profundo, Sellado de Grieas y Fisuras y Completamiento de Banquinas-Ruta: 1) Provincial NÂº 126 / 2) Provincial NÂº 129-Tramo: 1) R.P. NÂº 23 (Sauce)-R.N. NÂº 14 (Bonpland) / 2) R.N. NÂº 14-Monte Caseros (Arco de Entrada)-SecciÃ³n: (*', 1, NULL, 'Bacheo Superficial y Profundo, Sellado de Grietas y Fisuras y Completamiento de Banquinas', 25213986.06, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '6 meses', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-07-04 00:00:00', '2013-06-07 00:00:00', '2013-06-25 00:00:00', '2013-10-30 08:39:01', NULL, '(*) 1) Pr. 75,03 Km-Pr. 219,94 Km / 2) Pr. 0,00 Km-Pr. 30,09 Km.-Departamentos Sauce - CuruzÃº CuatiÃ¡ - Paso de los Libres - Monte Caseros - Provincia de Corrientes', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(147, 0, 'Acceso a la Ciudad de Crespo desde la Ruta Nacional NÂº 131', 1, NULL, 'Obra bÃ¡sica y pavimento', 2941368.67, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '60 dÃ­as labora', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-10-30 08:39:01', '2013-04-22 00:00:00', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL, 'Obra menor', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(148, 0, 'Ruta Provincial NÂº 23 - Provincia de Entre RÃ­os - Tramo: Ruta Nacional NÂº  130 - Ruta Nacional NÂº 18 - Subtramo II: AÂº Baru - Ruta Nacional NÂº 18 - Prog. 32.700 - 59.000', 1, NULL, 'Terraplenes, obra bÃ¡sica y pavimento de concreto asfÃ¡ltico', 185984325.7, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '24 meses', NULL, NULL, 50, 'Luis Losi S.A. - Alquimaq S.R.L. - U.T.E.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-08-21 00:00:00', '2013-07-11 00:00:00', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(149, 0, 'Ruta Provincial NÂº 8: Cerrito (Inters. R.N. NÂº 12) - Hernandarias y Acceso a Pueblo Brugo. 1Âº Etapa - Obras de rehabilitaciÃ³n y de mantenimiento de la calzada existente', 1, NULL, 'RehabilitaciÃ³n y mantenimiento de calzada', 105970154.72, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '18 meses', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-10-30 08:39:01', '2013-07-05 00:00:00', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(150, 0, 'MitigaciÃ³n del Impacto Ambiental del Volcadero de Residuos Municipal de la Ciudad de ParanÃ¡ - 1Âª Etapa: ConformaciÃ³n General, ConstrucciÃ³n de los Accesos y CirculaciÃ³n Interna', 1, NULL, 'Cobertura, compactaciÃ³n y sellado de suelo a proveer, TerraplÃ©n con compactaciÃ³n Especial, ConstrucciÃ³n de base calcÃ¡rea sin provisiÃ³n', 3153528.9, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '30 dÃ­as labora', NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-10-30 08:39:01', '2013-07-19 00:00:00', '2013-08-26 00:00:00', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(151, 0, 'Corredor Vial NÂº 4 - Ruta Nacional NÂº  34 - Tramo: Empalme Ruta Nacional NÂº A012 - Sunchales - SecciÃ³n: Prog. 150,93 - Prog. 217,00 y Prog. 224,00 - Prog. 247,00 - ORI C.4.1.2 B y C / OMSA - Ruta Nacional NÂº 34 - Km. 151 a 247', 1, NULL, 'RepavimentaciÃ³n', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL, NULL, NULL, 0, NULL, 'Obra subcontratada a Carreteras Centrales de Argentina S.A.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2013-10-30 08:39:01', '2013-10-30 08:39:01', '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL, NULL, '2013-10-30 08:39:01', '2013-10-30 08:39:01', NULL),
(156, 0, 'Prueba ', 1, 1, 'Prueba ', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 0, '', 'Prueba ', 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(157, 0, ' Prueba 2', 0, 1, ' Prueba 2 ', 11, 10, '2013-11-11 00:00:00', '2013-11-11 00:00:00', '', '2013-11-11', 1, 10, '1', ' Prueba 2 ', 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 0, 0, 0, 0, '0000-00-00 00:00:00', '2013-11-11 00:00:00', '2013-11-11 00:00:00', '2013-11-11 00:00:00', '10', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(158, 0, ' Prueba 2', 0, 1, ' Prueba 2 ', 11, 10, '2013-11-11 00:00:00', '2013-11-11 00:00:00', '', '2013-11-11', 1, 10, '1', ' Prueba 2 ', 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 0, 0, 0, 0, '0000-00-00 00:00:00', '2013-11-11 00:00:00', '2013-11-11 00:00:00', '2013-11-11 00:00:00', '10', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(159, 0, ' Prueba 3', 0, 1, ' Prueba 3', 11, 10, '2013-11-11 00:00:00', '2013-11-11 00:00:00', '', '2013-11-11', 1, 10, '1', ' Prueba 3 ', 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 0, 0, 0, 0, '0000-00-00 00:00:00', '2013-11-11 00:00:00', '2013-11-11 00:00:00', '2013-11-11 00:00:00', '10', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(160, 0, ' Prueba 3', 1, 1, ' Prueba 3', 11, 10, '2013-11-11 00:00:00', '2013-11-11 00:00:00', '', '2013-11-11', 1, 10, '1', ' Prueba 3 ', 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 11, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', '2013-11-11 00:00:00', '2013-11-11 00:00:00', '2013-11-11 00:00:00', '10', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(161, 0, ' Prueba 10', 1, 1, 'prueba 10 ', 10, 122, '2013-11-11 00:00:00', '2013-11-11 00:00:00', '', '2013-11-11', 1, 15, '1', 'prueba 10 ', 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 1, 0, 0, 0, '2013-11-11 00:00:00', '2013-11-11 00:00:00', '0000-00-00 00:00:00', '2013-11-11 00:00:00', '10', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(162, 0, ' Prueba 10', 1, 1, 'prueba 10 ', 10, 122, '2013-11-11 00:00:00', '2013-11-11 00:00:00', '', '2013-11-11', 1, 15, '1', 'prueba 10 ', 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 1, 0, 0, 0, '2013-11-11 00:00:00', '2013-11-11 00:00:00', '2013-11-11 00:00:00', '2013-11-11 00:00:00', '10', '', '2013-11-11 00:00:00', '2013-11-11 00:00:00', NULL),
(163, 0, 'Prueba 999', 1, 1, 'Prueba 999 ', 9, 9, '2013-11-11 00:00:00', '2013-11-11 00:00:00', '', '2013-11-11', 1, 90, '1', ' Prueba 999', 9, 1, 9, 1, 9, 1, 9, 1, 9, 1, 9, 1, 9, 1, 9, 1, 1, 0, 0, 0, '2013-11-11 00:00:00', '2013-11-11 00:00:00', '2013-11-11 00:00:00', '2013-11-11 00:00:00', '9', ' Prueba 999', '2013-11-11 00:00:00', '2013-11-11 00:00:00', NULL),
(165, 0, 'prueba ', 1, 1, 'prueba ', 15, 15, '2013-11-12 00:00:00', '2013-11-12 00:00:00', '', '2013-11-12', 1, 15, 'si', ' prueba 102189361278y', 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 1010, 1, 10, 1, 1, 0, 0, 0, '2013-11-12 00:00:00', '2013-11-12 00:00:00', '2013-11-12 00:00:00', '2013-11-12 00:00:00', '15', '2013-11-12 Funcionara? ', '2013-11-11 00:00:00', '2013-11-11 00:00:00', NULL),
(166, 0, 'prueba ', 1, 1, 'prueba ', 15, 15, '2013-11-12 00:00:00', '2013-11-12 00:00:00', '', '2013-11-12', 1, 15, 'si', ' prueba 102189361278y', 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 1010, 1, 10, 1, 1, 0, 0, 0, '2013-11-12 00:00:00', '2013-11-12 00:00:00', '2013-11-12 00:00:00', '2013-11-12 00:00:00', '15', 'Funciona Pabliten!', '2013-11-11 00:00:00', '2013-11-11 00:00:00', NULL),
(167, 0, 'prueba ', 1, 1, 'prueba ', 15, 15, '2013-11-12 00:00:00', '2013-11-12 00:00:00', '', '2013-11-12', 1, 15, 'si', ' prueba 102189361278y', 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 10, 1, 1010, 1, 10, 1, 1, 0, 0, 0, '2013-11-12 00:00:00', '2013-11-12 00:00:00', '2013-11-12 00:00:00', '2013-11-12 00:00:00', '15', 'Funciona Pabliten!', '2013-11-11 00:00:00', '2013-11-11 00:00:00', NULL),
(168, 0, 'Prueba 168', 1, 1, 'Prueba 168 ', 1500, 1500, '2013-11-11 00:00:00', '2013-11-11 00:00:00', '', '2013-11-11', 1, 100, 'Ute', 'Prueba 168 ', 1500, 1, 1500, 1, 1500, 1, 1500, 1, 1500, 1, 1500, 1, 1500, 1, 1500, 1, 1, 0, 0, 0, '2013-11-11 00:00:00', '2013-11-11 00:00:00', '2013-11-11 00:00:00', '2013-11-11 00:00:00', '100', 'Prueba 168  2013-11-11', '2013-11-11 00:00:00', '2013-11-11 00:00:00', 'Prueba168.kml'),
(169, 0, 'Prueba 168', 1, 1, 'Prueba 168 ', 1500, 1500, '2013-11-11 00:00:00', '2013-11-11 00:00:00', '', '2013-11-11', 1, 100, 'Ute', 'Prueba 168 ', 1500, 1, 1500, 1, 1500, 1, 1500, 1, 1500, 1, 1500, 1, 1500, 1, 1500, 1, 1, 0, 0, 0, '2013-11-11 00:00:00', '2013-11-11 00:00:00', '2013-11-11 00:00:00', '2013-11-11 00:00:00', '100', 'Prueba 168  2013-11-11', '2013-11-11 00:00:00', '2013-11-11 00:00:00', 'Prueba168.kml');

-- --------------------------------------------------------

--
-- Table structure for table `personeria`
--
-- Creation: Nov 15, 2013 at 07:48 AM
-- Last update: Nov 15, 2013 at 07:48 AM
--

DROP TABLE IF EXISTS `personeria`;
CREATE TABLE IF NOT EXISTS `personeria` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `personeria`
--


-- --------------------------------------------------------

--
-- Table structure for table `precio`
--
-- Creation: May 10, 2012 at 11:50 AM
-- Last update: Nov 08, 2012 at 03:41 PM
-- Last check: Dec 07, 2012 at 11:03 AM
--

DROP TABLE IF EXISTS `precio`;
CREATE TABLE IF NOT EXISTS `precio` (
  `idProducto` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `monto` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`idProducto`,`fecha`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `precio`
--

INSERT INTO `precio` (`idProducto`, `fecha`, `monto`) VALUES
(123512, '2012-06-11', 25),
(1001, '2012-06-07', 100),
(545, '2012-06-12', 5.25),
(5555, '2012-06-13', 5.25),
(5555, '2012-06-23', 2.15),
(5555, '2012-06-24', 2.15),
(22332, '2012-06-24', 12),
(545, '2012-06-24', 5.25),
(1006, '2012-06-24', 1),
(1229, '2012-06-25', 5.15),
(555266, '2012-07-02', 15),
(567890, '2012-07-06', 100),
(1235, '2012-07-18', 8),
(23333, '2012-09-16', 25),
(1111, '2012-11-08', 6),
(100001, '2012-11-08', 10.25),
(1006, '2012-11-08', 1.59),
(2323, '2012-11-08', 25);

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--
-- Creation: May 10, 2012 at 11:50 AM
-- Last update: Nov 08, 2012 at 03:41 PM
-- Last check: Dec 07, 2012 at 11:03 AM
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `idProducto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `cantidadMaxima` int(10) unsigned DEFAULT NULL,
  `cantidadMinima` int(10) unsigned DEFAULT NULL,
  `cantidadInicial` int(10) unsigned NOT NULL DEFAULT '0',
  `fechaAlta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaBaja` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `usuarioAlta` smallint(5) unsigned NOT NULL,
  `usuarioBaja` smallint(5) unsigned DEFAULT NULL,
  `idProveedor` int(11) NOT NULL,
  `fechaAltaProveedor` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idProducto`),
  KEY `FK_producto_users` (`usuarioAlta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=567891 ;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `descripcion`, `cantidadMaxima`, `cantidadMinima`, `cantidadInicial`, `fechaAlta`, `fechaBaja`, `usuarioAlta`, `usuarioBaja`, `idProveedor`, `fechaAltaProveedor`) VALUES
(1001, 'Sugus 50gr.', 'Caramelos Masticables', NULL, 6, 100, '2012-06-05 16:04:24', '0000-00-00 00:00:00', 86, NULL, 4, '2012-02-03 14:20:45'),
(22332, 'girasol cachi', 'Bolsa de 5kg', NULL, 0, 1, '2012-06-07 11:53:34', '0000-00-00 00:00:00', 86, NULL, -1, '0000-00-00 00:00:00'),
(123512, 'yerba ', 'romance', NULL, 20, 25, '2012-06-11 06:22:40', '0000-00-00 00:00:00', 86, NULL, -1, '0000-00-00 00:00:00'),
(545, 'bazooka', 'chicle globo', NULL, 10, 150, '2012-06-12 11:32:27', '0000-00-00 00:00:00', 86, NULL, -1, '0000-00-00 00:00:00'),
(5555, 'Mentoplush', 'Caramelos Masticables', NULL, 22, 545, '2012-06-13 09:44:36', '0000-00-00 00:00:00', 86, NULL, 8, '2012-04-23 07:59:06'),
(1006, 'bon o bon', 'bombon', NULL, 30, 30, '2012-06-24 21:11:23', '0000-00-00 00:00:00', 86, NULL, 8, '2012-04-23 07:59:06'),
(1229, 'no paro de engordar - by matias', 'cada vez estoy mas gordooo... matias churruarin', NULL, 25, 2, '2012-06-25 11:40:32', '0000-00-00 00:00:00', 86, NULL, 9, '2012-04-23 08:00:26'),
(555266, 'caxa', 'caramelos', NULL, 10, 50, '2012-07-02 22:48:55', '0000-00-00 00:00:00', 86, NULL, 9, '2012-04-23 08:00:26'),
(567890, 'Pantalon Oxford', '', NULL, 5, 20, '2012-07-06 20:45:07', '0000-00-00 00:00:00', 86, NULL, 8, '2012-04-23 07:59:06'),
(1235, 'atun ', 'desmenuzado', NULL, 12, 5, '2012-07-18 21:20:02', '0000-00-00 00:00:00', 86, NULL, 8, '2012-04-23 07:59:06'),
(23333, 'vodka smirnoff', 'bebida alcoholica', NULL, 20, 10, '2012-09-16 20:44:14', '0000-00-00 00:00:00', 86, NULL, 10, '2012-05-08 10:01:23'),
(1111, 'arroz', '', NULL, 15, 5, '2012-11-08 13:12:25', '0000-00-00 00:00:00', 86, NULL, 10, '2012-05-08 10:01:23'),
(100001, 'Yerba 500g.', 'Yerba Aguantadora 500g.', NULL, 3, 10, '2012-11-08 14:47:28', '0000-00-00 00:00:00', 86, NULL, 4, '2012-02-03 14:20:45'),
(2323, 'chicle', 'chicle sabor naranja', NULL, 10, 10, '2012-11-08 15:41:55', '0000-00-00 00:00:00', 86, NULL, 9, '2012-04-23 08:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--
-- Creation: Dec 05, 2011 at 06:57 AM
-- Last update: Nov 08, 2012 at 03:56 PM
-- Last check: Dec 07, 2012 at 11:03 AM
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `idProveedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `duenio` varchar(150) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `iva_id` smallint(8) NOT NULL,
  `dgr` varchar(150) DEFAULT NULL,
  `cuit` varchar(100) DEFAULT NULL,
  `usuario_alta` smallint(8) DEFAULT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_baja` smallint(8) DEFAULT NULL,
  `fecha_baja` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idProveedor`,`fecha_alta`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nombre`, `duenio`, `direccion`, `telefono`, `fax`, `iva_id`, `dgr`, `cuit`, `usuario_alta`, `fecha_alta`, `usuario_baja`, `fecha_baja`) VALUES
(1, 'vacio', 'vacio', 'no', '232131', '32323', 1, NULL, NULL, NULL, '2011-12-08 21:32:42', 88, '2012-02-02 17:51:08'),
(1, 'Cotapa', 'Don Cotapa', 'almafuerte 1235', '135334', '2143423', 2, '23432432', '34234', 86, '2011-12-08 21:54:12', 88, '2012-02-02 17:51:08'),
(2, 'guadalupe', 'Horacio Miguel', 'Av de las Americas 1222', '4225893', '4225893', 2, '', '305589851121', 88, '2012-02-02 17:50:56', NULL, '0000-00-00 00:00:00'),
(3, 'cabre distribuciones', 'Lucas Cabrera', 'Av. Almafuerte 556', '4232125', '', 2, '', '30681112551', 88, '2012-02-02 17:52:10', 88, '2012-04-21 14:53:50'),
(4, 'DISTRIBUIDORA GARAY', 'JUAN ROMAN RIQUELME', 'GARAY 102', '3434852698', '085234666666666', 1, '', '', 88, '2012-02-03 14:20:45', NULL, '0000-00-00 00:00:00'),
(5, 'DISTRIBUIDORA AMANECER', ' JUAN PEREZ', 'LAS CALANDRIAS 2088', '3056311255', '111111112222222', 1, '', '', 88, '2012-02-03 18:07:27', NULL, '0000-00-00 00:00:00'),
(6, 'JUAN PEREZ', 'N.J.ALVAREZ', 'FFFF222', '3434585669', '11111111', 1, '3435555555', 'FFFFFFFF', 88, '2012-03-26 11:25:43', 88, '2012-03-26 11:50:59'),
(7, '222', 'dddd', 'ddd', '222', '2222', 1, 'ddddd', 'dddddddddddddddd', 88, '2012-03-26 11:36:31', 88, '2012-03-26 11:50:44'),
(8, 'amanecer', 'juan perez', 'las calandrias', '3434355555', '11111111111111112', 1, 'ssssssssssss', '5555555555555', 88, '2012-04-23 07:59:06', NULL, '0000-00-00 00:00:00'),
(9, 'anana distribuciones', 'dario silva', 'av la bombonera', '121212212121', '222222222222222', 1, 'dddddddddddddd', '22222222222222222222', 88, '2012-04-23 08:00:26', NULL, '0000-00-00 00:00:00'),
(10, 'CABRE DISTRIBUCIONES', 'LUCAS CABRERA', 'ALMAFUERTE 1552', '4225893', '', 2, '', '', 88, '2012-05-08 10:01:23', NULL, '0000-00-00 00:00:00'),
(11, 'asdasdas', 'asdasdas', 'asdasasd', 'asdasd', '1231231', 6, '', '', 88, '2012-11-08 14:04:27', NULL, '0000-00-00 00:00:00'),
(12, 'amanecer', 'asdasasd', 'asdaasd', 'asd', '12311', 6, 'asd', 'asd', 88, '2012-11-08 14:08:44', 88, '2012-11-08 14:19:39'),
(13, 'Guadalupe srl', 'Sergio Guadalupe', 'avenida de las americas 4503', '3434454647', '', 5, '', '', 88, '2012-11-08 15:10:20', NULL, '0000-00-00 00:00:00'),
(14, 'nuevo', 'nuevo', 'direccion 123', '4123456', '', 5, '', '', 88, '2012-11-08 15:56:45', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `provincias`
--
-- Creation: Nov 15, 2013 at 07:48 AM
-- Last update: Nov 15, 2013 at 07:48 AM
--

DROP TABLE IF EXISTS `provincias`;
CREATE TABLE IF NOT EXISTS `provincias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provincia` varchar(55) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `provincias`
--


-- --------------------------------------------------------

--
-- Table structure for table `remito_aux`
--
-- Creation: May 10, 2012 at 11:50 AM
-- Last update: Dec 07, 2012 at 11:03 AM
-- Last check: Dec 07, 2012 at 11:03 AM
--

DROP TABLE IF EXISTS `remito_aux`;
CREATE TABLE IF NOT EXISTS `remito_aux` (
  `remito` int(10) unsigned NOT NULL,
  `idProducto` int(10) unsigned NOT NULL,
  `cantidad` tinyint(3) unsigned NOT NULL,
  `pTotal` float NOT NULL DEFAULT '0',
  `idRemitoAux` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idRemitoAux`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `remito_aux`
--

INSERT INTO `remito_aux` (`remito`, `idProducto`, `cantidad`, `pTotal`, `idRemitoAux`) VALUES
(2, 545, 10, 5, 1),
(6, 1001, 23, 21, 8),
(9, 23333, 56, 65, 14),
(16, 555266, 0, 0, 29),
(16, 2323, 0, 0, 30),
(16, 1229, 1, 0, 31);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--
-- Creation: May 10, 2012 at 11:50 AM
-- Last update: Nov 08, 2012 at 04:17 PM
-- Last check: Dec 07, 2012 at 11:03 AM
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `idProducto` int(10) unsigned NOT NULL,
  `cantidad` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`idProducto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`idProducto`, `cantidad`) VALUES
(1001, 104),
(22332, 4294967269),
(123512, 24),
(545, 150),
(5555, 845),
(1006, 299),
(1229, 4294967272),
(555266, 106),
(567890, 44),
(1235, 5),
(23333, 5),
(1111, 15),
(100001, 10),
(2323, 10);

-- --------------------------------------------------------

--
-- Table structure for table `stock_hist`
--
-- Creation: May 10, 2012 at 11:50 AM
-- Last update: May 10, 2012 at 11:50 AM
--

DROP TABLE IF EXISTS `stock_hist`;
CREATE TABLE IF NOT EXISTS `stock_hist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idProducto` int(10) unsigned NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cantidad` int(10) unsigned DEFAULT '0',
  `idUbicacion` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `stock_hist`
--


-- --------------------------------------------------------

--
-- Table structure for table `tipocert`
--
-- Creation: Nov 15, 2013 at 07:50 AM
-- Last update: Apr 04, 2014 at 09:20 AM
-- Last check: Apr 07, 2014 at 06:28 AM
--

DROP TABLE IF EXISTS `tipocert`;
CREATE TABLE IF NOT EXISTS `tipocert` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tipocert`
--

INSERT INTO `tipocert` (`id`, `descripcion`) VALUES
(1, 'Común'),
(2, 'Provisorio'),
(3, 'Definitivo'),
(4, 'DYC'),
(5, 'Bis');

-- --------------------------------------------------------

--
-- Table structure for table `ubicacion`
--
-- Creation: Nov 15, 2013 at 07:48 AM
-- Last update: Nov 15, 2013 at 07:48 AM
--

DROP TABLE IF EXISTS `ubicacion`;
CREATE TABLE IF NOT EXISTS `ubicacion` (
  `idObra` int(11) NOT NULL DEFAULT '0',
  `idUbicacion` int(11) NOT NULL DEFAULT '0',
  `idProvincia` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idObra`,`idUbicacion`,`idProvincia`),
  KEY `FK_ubicacion_2` (`idProvincia`),
  KEY `FK_ubicacion_3` (`idUbicacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `ubicacion`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Dec 05, 2011 at 06:57 AM
-- Last update: Feb 07, 2012 at 03:29 AM
-- Last check: Feb 07, 2012 at 03:29 AM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `usu_codigousu` smallint(8) unsigned NOT NULL AUTO_INCREMENT,
  `usu_apellidoynombre` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `usu_iden` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `usu_clave` tinytext CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `usu_permiso` char(1) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `ambito` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `fechabaja` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fechaalta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usu_baja` smallint(8) NOT NULL DEFAULT '0',
  `usu_alta` smallint(8) DEFAULT NULL,
  PRIMARY KEY (`usu_codigousu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usu_codigousu`, `usu_apellidoynombre`, `usu_iden`, `usu_clave`, `usu_permiso`, `ambito`, `fechabaja`, `fechaalta`, `usu_baja`, `usu_alta`) VALUES
(77, 'consulta', 'consulta', '5d76beffe761403531a6eb339e0f0231', '1', '20', '0000-00-00 00:00:00', '2010-09-08 09:14:59', 0, 76),
(81, 'adminisdfsdfstrador', 'adminsmsdf', 'c4ca4238a0b923820dcc509a6f75849b', 'w', '2', '0000-00-00 00:00:00', '2010-11-26 10:53:24', 0, 76),
(85, 'adminstrador salud mental', 'ssmental', 'c4ca4238a0b923820dcc509a6f75849b', '9', '2', '0000-00-00 00:00:00', '2010-11-29 13:15:41', 0, 81),
(86, 'adminweb', 'adminweb', '09348c20a019be0318387c08df7a783d', 'Z', '333', '2012-01-31 19:25:52', '2011-01-04 11:08:45', 88, 81),
(87, 'sa', 'sa', 'c12e01f2a13ff5587e1e9e4aedb8242d', 's', '326', '2011-01-04 11:10:00', '2011-01-04 11:09:50', 81, 81),
(88, 'supervisor', 'supervisor', '09348c20a019be0318387c08df7a783d', 'Z', '1', '0000-00-00 00:00:00', '2011-12-11 10:30:46', 0, 1),
(89, 'Prueba', 'Prueba', 'ec6ef230f1828039ee794566b9c58adc', 'Z', '', '0000-00-00 00:00:00', '2012-01-28 18:32:38', 0, 88);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--
-- Creation: Nov 15, 2013 at 07:44 AM
-- Last update: May 07, 2014 at 09:08 AM
-- Last check: May 07, 2014 at 09:08 AM
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `identificador` varchar(10) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `nombre` varchar(45) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `apellido` varchar(25) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `clave` varchar(50) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `tipousuario` char(1) COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `fechaalta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`identificador`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`identificador`, `nombre`, `apellido`, `clave`, `tipousuario`, `fechaalta`) VALUES
('admin', 'Administrador', 'Administrador', '21232f297a57a5a743894a0e4a801fc3', 'A', '2014-04-11 11:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--
-- Creation: May 10, 2012 at 11:50 AM
-- Last update: Nov 08, 2012 at 02:56 PM
-- Last check: Dec 07, 2012 at 11:03 AM
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `idVenta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Detalle` varchar(100) DEFAULT NULL,
  `montoCobro` float unsigned NOT NULL,
  PRIMARY KEY (`idVenta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`idVenta`, `fecha`, `Detalle`, `montoCobro`) VALUES
(1, '2012-06-12 10:28:11', 'valor inicial', 0),
(2, '2012-06-24 21:09:28', NULL, 500),
(3, '2012-06-24 21:11:58', NULL, 10),
(4, '2012-06-25 12:08:00', NULL, 5555),
(5, '2012-06-28 09:02:08', NULL, 120),
(6, '2012-07-01 20:24:51', NULL, 105),
(7, '2012-07-02 21:21:29', NULL, 150),
(8, '2012-07-02 22:52:44', NULL, 100),
(9, '2012-07-02 22:55:03', NULL, 80),
(10, '2012-08-08 11:37:28', NULL, 327),
(11, '2012-09-16 20:51:32', NULL, 125),
(12, '2012-11-08 12:48:58', NULL, 10),
(13, '2012-11-08 14:56:16', NULL, 20);

SET FOREIGN_KEY_CHECKS=1;

COMMIT;
