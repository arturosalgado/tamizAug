-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 04, 2014 at 09:17 PM
-- Server version: 5.1.70-cll
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sintesys_tamiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `enfermedades`
--

CREATE TABLE IF NOT EXISTS `enfermedades` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `enfermedades`
--

INSERT INTO `enfermedades` (`id`, `nombre`) VALUES
(1, 'Enfermedad A'),
(2, 'Enfermedad B');

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `estados`
--

INSERT INTO `estados` (`id`, `nombre`, `email`) VALUES
(1, 'Aguascalientes', 'aguas@calientes.com'),
(2, 'Baja California', ''),
(3, 'Baja California Sur', ''),
(4, 'Campeche', ''),
(5, 'Chiapas', ''),
(6, 'Chihuahua', ''),
(7, 'Coahuila', ''),
(8, 'Colima', ''),
(9, 'Distrito Federal', ''),
(10, 'Durango', 'Durango'),
(11, 'Estado de México', ''),
(12, 'Guanajuato', ''),
(13, 'Guerrero', ''),
(14, 'Hidalgo', ''),
(15, 'Jalisco', ''),
(16, 'Michoacán', ''),
(17, 'Morelos', ''),
(18, 'Nayarit', ''),
(19, 'Nuevo León', ''),
(20, 'Oaxaca', ''),
(21, 'Puebla', ''),
(22, 'Querétaro', ''),
(23, 'Quintana Roo', ''),
(24, 'San Luis Potosí', ''),
(25, 'Sinaloa', ''),
(26, 'Sonora', ''),
(27, 'Tabasco', ''),
(28, 'Tamaulipas', ''),
(29, 'Tlaxcala', ''),
(30, 'Veracruz', ''),
(31, 'Yucatán', ''),
(32, 'Zacatecas', '');

-- --------------------------------------------------------

--
-- Table structure for table `estados_tamiz`
--

CREATE TABLE IF NOT EXISTS `estados_tamiz` (
  `estadomodel_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tamizmodel_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jurisdictions`
--

CREATE TABLE IF NOT EXISTS `jurisdictions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `jurisdictions`
--

INSERT INTO `jurisdictions` (`id`, `nombre`, `email`) VALUES
(1, 'Unidad Bicentenario', 'bicentenario@gmail.com'),
(2, 'Unidad Independencia', ''),
(3, 'Jurisdiccion4', ''),
(4, 'Jurisdiccion5', ''),
(5, 'J6 j6', ''),
(6, 'j7 id 6', ''),
(7, 'Juris 8 id 8 ', ''),
(8, 'Jurisdiccion 5', ''),
(9, 'My Jurisdiction', ''),
(10, 'Unidad Médica Siglo XXI', ''),
(11, 'New  Jurisdiction', '');

-- --------------------------------------------------------

--
-- Table structure for table `malformaciones`
--

CREATE TABLE IF NOT EXISTS `malformaciones` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `malformaciones`
--

INSERT INTO `malformaciones` (`id`, `nombre`) VALUES
(1, 'Ejemplo 1'),
(2, 'Ejemplo 2');

-- --------------------------------------------------------

--
-- Table structure for table `tamiz`
--

CREATE TABLE IF NOT EXISTS `tamiz` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `folio` int(255) unsigned DEFAULT NULL,
  `fechadenacimiento` datetime DEFAULT NULL,
  `horanacimiento` varchar(40) DEFAULT NULL,
  `sexo` varchar(40) DEFAULT NULL,
  `edadgestacional` varchar(40) DEFAULT NULL,
  `producto` varchar(40) DEFAULT NULL,
  `peso` int(2) DEFAULT NULL,
  `talla` int(2) DEFAULT NULL,
  `fechademuestra` datetime DEFAULT NULL,
  `horamuestra` varchar(40) DEFAULT NULL,
  `malformacion_cong` varchar(200) DEFAULT NULL,
  `condicion` varchar(40) DEFAULT NULL,
  `alimentacion` varchar(40) DEFAULT NULL,
  `apellido_paterno` varchar(50) DEFAULT NULL,
  `apellido_materno` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `edadmadre` int(20) DEFAULT NULL,
  `gesta` int(5) DEFAULT NULL,
  `enfermedad_id` int(5) DEFAULT NULL,
  `enfermedad` varchar(5) DEFAULT NULL,
  `domicilio` varchar(255) DEFAULT NULL,
  `colonia` varchar(255) DEFAULT NULL,
  `municipio` varchar(255) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `tecnica` varchar(50) DEFAULT NULL,
  `responsable_id` int(20) DEFAULT NULL,
  `responsable_lab_id` int(20) DEFAULT NULL,
  `estatus` enum('pendiente','completo') DEFAULT NULL,
  `malformacion` varchar(50) DEFAULT NULL,
  `ths` varchar(255) DEFAULT NULL,
  `ths_valor` varchar(255) DEFAULT NULL,
  `pku` varchar(255) DEFAULT NULL,
  `pku_valor` varchar(255) DEFAULT NULL,
  `oh17` varchar(255) DEFAULT NULL,
  `oh17_valor` varchar(255) DEFAULT NULL,
  `gal` varchar(255) DEFAULT NULL,
  `gal_valor` varchar(255) DEFAULT NULL,
  `estado_clinica` varchar(160) NOT NULL,
  `unidad_clinica` varchar(200) NOT NULL,
  `unidad_jurisdiccion` varchar(200) NOT NULL,
  `enfermedad_metabolica` varchar(200) NOT NULL,
  `numerodegemelo` varchar(2) NOT NULL,
  `muestraadecuada` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tamiz`
--

INSERT INTO `tamiz` (`id`, `folio`, `fechadenacimiento`, `horanacimiento`, `sexo`, `edadgestacional`, `producto`, `peso`, `talla`, `fechademuestra`, `horamuestra`, `malformacion_cong`, `condicion`, `alimentacion`, `apellido_paterno`, `apellido_materno`, `nombre`, `edadmadre`, `gesta`, `enfermedad_id`, `enfermedad`, `domicilio`, `colonia`, `municipio`, `estado`, `cp`, `telefono`, `tecnica`, `responsable_id`, `responsable_lab_id`, `estatus`, `malformacion`, `ths`, `ths_valor`, `pku`, `pku_valor`, `oh17`, `oh17_valor`, `gal`, `gal_valor`, `estado_clinica`, `unidad_clinica`, `unidad_jurisdiccion`, `enfermedad_metabolica`, `numerodegemelo`, `muestraadecuada`) VALUES
(1, 9090, '2014-01-01 00:00:00', '15:60', 'Masculino', 'termino', 'unico', 3000, 350, '2014-01-01 00:00:00', '18:22', 'Estres', 'sano', 'formulalactea', 'Ramirez', 'Lozada', 'Berenice', 35, 5, NULL, 'si', 'Rio sabinas 6126', 'San Manuel', 'Puebla', '1', '72570', '2336283', 'Talon', 2, 2, 'pendiente', 'no', 'normal', '966', 'sospechoso', '777', 'sospechoso', '56', 'normal', '456', 'Puebla', 'Units', 'Unidad Médica Siglo XXI', 'PPPP', '3', 'No'),
(2, 5200, '2014-04-16 00:00:00', '', 'Femenino', 'pretermino', 'unico', 0, 0, '2014-04-16 00:00:00', '', '1', 'sano', 'lechematerna', 'Lopez', 'Ramirez', 'Adriana', 0, 1, NULL, NULL, '', '', '', '1', '', '', NULL, 1, 1, 'pendiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(3, 3655, '2014-07-03 00:00:00', '', 'Masculino', 'pretermino', 'gemelo', 3000, 500, '2014-07-03 00:00:00', '', '1', 'sano', 'lechematerna', 'Salinas', 'Castro', 'Isabel', 25, 1, NULL, 'no', 'Mi Calle', 'Mi Colonia', 'Mi Delegacion', '2', '', '', 'Cordon', 1, 1, 'pendiente', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(4, 1234, '2014-07-04 00:00:00', '12:50', 'Masculino', 'pretermino', 'unico', 300, 500, '2014-07-04 00:00:00', '12:15', '1', 'sano', 'lechematerna', 'SANTOS', 'MARTINEZ', 'GLORIA', 25, 1, NULL, 'si', 'CALLE 8', 'NUMEROS', 'INFINITO', '1', '999', '45444', 'Cordon', 1, 1, 'pendiente', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(5, 123, '2014-07-09 00:00:00', '2:32', 'Masculino', 'termino', 'unico', 8, 30, '2014-07-09 00:00:00', '5:35', '1', 'sano', 'lechematerna', 'Garcia', 'Navarro', 'Lourdes', 25, 2, NULL, 'no', 'Av Circunvalacion 38', 'Los Arcos', 'Benito Juarez', '8', '0460', '24554555', 'Cordon', 1, 1, 'pendiente', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(6, 4228, '2014-07-10 00:00:00', '', 'Masculino', 'termino', 'unico', 500, 50, '2014-07-10 00:00:00', '12:05', '1', 'sano', 'lechematerna', 'MARTINEZ', 'RODRIGUEZ', 'SUYAPA', 32, 1, NULL, 'no', 'PATITO 1', 'LAGO', 'CHAPULTEPEC', '9', '76000', '4442222222', 'Cordon', 2, 2, 'pendiente', 'no', 'normal', '', 'normal', '', 'normal', '', 'normal', '', '', '', '', '', '', ''),
(7, 4233, '2014-07-10 00:00:00', '05:00', 'Masculino', 'pretermino', 'unico', 0, 0, '2014-07-10 00:00:00', '05:30', '1', 'sano', 'lechematerna', 'Lina Marcela', 'CARBAJAL', 'ALICIA', 32, 1, NULL, 'no', 'Queretaro', 'Queretaro', 'Queretaro', '1', '7600', '442222222', 'Cordon', 1, 1, 'pendiente', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(8, 0, '2014-07-10 00:00:00', '', NULL, NULL, NULL, 0, 0, '2014-07-10 00:00:00', '', '1', NULL, NULL, '', '', '', 0, 1, NULL, NULL, '', '', '', '1', '', '', NULL, 1, 1, 'pendiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(9, 0, '2014-07-10 00:00:00', '', NULL, NULL, NULL, 0, 0, '2014-07-10 00:00:00', '', '1', NULL, NULL, '', '', '', 0, 1, NULL, NULL, '', '', '', '1', '', '', NULL, 1, 1, 'pendiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(10, 1, '2014-07-10 00:00:00', '', NULL, NULL, NULL, 0, 0, '2014-07-10 00:00:00', '', '1', NULL, NULL, '', '', '', 0, 1, NULL, NULL, '', '', '', '1', '', '', NULL, 1, 1, 'pendiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(11, 1, '2014-07-10 00:00:00', '', NULL, NULL, NULL, 0, 0, '2014-07-10 00:00:00', '', '1', NULL, NULL, '', '', '', 0, 1, NULL, NULL, '', '', '', '1', '', '', NULL, 1, 1, 'pendiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(12, 2848905, '2014-07-10 00:00:00', '07:30', 'Femenino', 'termino', 'unico', 3500, 51, '2014-07-10 00:00:00', '08:00', '1', 'sano', 'lechematerna', 'LOPEZ', 'HERNANDEZ', 'MARIA AGRIPINA', 45, 8, NULL, 'no', 'CALLE 2 NRO 25', 'ACCESOS POPNIENTE', 'QUERETARO', '9', '76000', '442222222', 'Talon', 2, 1, 'pendiente', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Puebla', '', '', '', '', ''),
(13, 2848901, '2019-06-30 00:00:00', '13:27', 'Masculino', 'termino', 'unico', 4100, 90, '2019-06-30 00:00:00', '13:57', '1', 'sano', 'mixta', 'ROSALES', 'GUTIERREZ', 'JIMENA', 27, 1, NULL, 'no', 'BOSQUES DE ARAGON 57', 'BOSQUES DE ARAGON', 'NEZAHUATCOYOLT', '1', '5555', '4545454545', 'Cordon', 1, 1, 'pendiente', 'no', 'normal', '', 'sospechoso', '', 'normal', '', 'normal', '', '', '', '', '', '', ''),
(14, 28489011, '2014-06-30 00:00:00', '13:00', 'Femenino', 'termino', 'unico', 3500, 51, '2014-06-30 00:00:00', '13:30', '1', 'sano', 'formulalactea', 'ROSALES', 'GUTIERREZ', 'JIMENA', 28, 2, NULL, 'no', 'BOSQUES DE ARAGON 57', 'BOSQUES ARAGON', 'NEZA', '1', '4545', '46545646', 'Talon', 1, 2, 'pendiente', 'no', 'normal', '', 'sospechoso', '', 'sospechoso', '', 'normal', '', '', '', '', '', '', ''),
(15, 7777, '2014-07-12 00:00:00', '', NULL, NULL, NULL, 0, 0, '2014-07-12 00:00:00', '', 'estres', NULL, NULL, '', '', '', 0, 1, NULL, NULL, '', '', '', NULL, '', '', NULL, 1, 1, 'pendiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Puebla', 'Units ', 'Jurisdiccion4', '', '', ''),
(16, 888, '2014-07-12 00:00:00', '12:27', 'Masculino', 'termino', 'gemelo', 1000, 400, '2014-07-12 00:00:00', '', '', NULL, NULL, '', '', '', 0, 1, NULL, NULL, '', '', '', NULL, '', '', NULL, 1, 1, 'pendiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Zacatecas', 'Units', 'My Jurisdiction', '', '1', ''),
(17, 0, '2014-07-12 00:00:00', '', NULL, NULL, NULL, 0, 0, '2014-07-12 00:00:00', '', '', NULL, NULL, '', '', '', 0, 1, NULL, NULL, '', '', '', NULL, '', '', NULL, 1, 1, 'pendiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(18, 0, '2014-07-13 00:00:00', '', NULL, NULL, NULL, 0, 0, '2014-07-13 00:00:00', '', '', NULL, NULL, 'eee', 'eee', 'ee', 0, 1, NULL, NULL, '', '', '', NULL, '', '', NULL, 1, 1, 'pendiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aguascalienteseee', 'u', 'eee', '', '', ''),
(19, 64555, '2014-07-15 00:00:00', '', 'Masculino', 'termino', 'unico', 3500, 0, '2014-07-15 00:00:00', '', '', 'sano', 'mixta', 'Jimenez', 'Rosales', 'Mariana', 38, 1, NULL, 'no', 'Roble 37', 'Las Lomas', 'Nezahualcoyotl', NULL, '57517', '203314287', 'Cordon', 1, 1, 'pendiente', 'no', 'normal', '', 'normal', '', 'sospechoso', '35', 'normal', '', 'Michoacán', 'My Jurisdiction', 'Jurisdiccion4', '', '', 'Si'),
(20, 645455, '2014-07-15 00:00:00', '', 'Masculino', 'termino', 'unico', 3500, 0, '2014-07-15 00:00:00', '', '', 'sano', 'lechematerna', 'Rosales', 'Gutierrez', 'Georgina', 26, 1, NULL, 'no', 'Bosques de los continentes 76', 'xx', 'Iztapalapa', NULL, '57170', '1234567', 'Cordon', 1, 1, 'pendiente', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chihuahua', 'Jurisdiccion4', 'Unidad Médica Siglo XXI', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `email` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `nombre`, `email`) VALUES
(1, 'Units', 'test@pp.co'),
(2, 'Distrito Federal', 'dos@pet.com'),
(3, 'Jurisdiccion4', ''),
(4, 'Jurisdiccion5', ''),
(5, 'J6', ''),
(6, 'j7', ''),
(7, 'Juris 8', ''),
(8, 'Jurisdiccion 5', ''),
(9, 'My Jurisdiction', ''),
(10, 'sss', ''),
(11, 'eeeeee', '');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `paterno` varchar(50) DEFAULT NULL,
  `materno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre`, `paterno`, `materno`) VALUES
(1, NULL, 'Alberto', 'Perez', 'Santos'),
(2, NULL, 'Juan Manuel', 'Rodriguez', 'Santibañez');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
