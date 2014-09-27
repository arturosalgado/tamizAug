-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2014 at 01:14 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tamiz`
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
-- Table structure for table `laboratories`
--

CREATE TABLE IF NOT EXISTS `laboratories` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `laboratories`
--

INSERT INTO `laboratories` (`id`, `email`, `nombre`) VALUES
(1, 'mozartstein@gmail.com', 'Laboratorios Ruiz'),
(2, NULL, ''),
(3, NULL, 'sdfg'),
(4, NULL, '3'),
(5, NULL, 'jose arturo'),
(6, NULL, 'pppppp'),
(7, NULL, 'asdfasf'),
(8, NULL, 'asfsaf'),
(9, NULL, 'asdfasdfasf'),
(10, NULL, 'ffff'),
(11, 'mozartstein@gmail.com', 'aaaaa'),
(12, 'mozartstein@gmail.com', 'Laboratorios Xena');

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
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `tamiz_id` int(100) DEFAULT NULL,
  `sent` tinyint(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Supervisor'),
(3, 'Capturista'),
(4, 'Laboratorio'),
(5, 'Estado'),
(6, 'SSA');

-- --------------------------------------------------------

--
-- Table structure for table `sent`
--

CREATE TABLE IF NOT EXISTS `sent` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `folio` int(255) DEFAULT NULL,
  `tamiz_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `sent` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `laboratorio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tamiz`
--

INSERT INTO `tamiz` (`id`, `folio`, `fechadenacimiento`, `horanacimiento`, `sexo`, `edadgestacional`, `producto`, `peso`, `talla`, `fechademuestra`, `horamuestra`, `malformacion_cong`, `condicion`, `alimentacion`, `apellido_paterno`, `apellido_materno`, `nombre`, `edadmadre`, `gesta`, `enfermedad_id`, `enfermedad`, `domicilio`, `colonia`, `municipio`, `estado`, `cp`, `telefono`, `tecnica`, `responsable_id`, `responsable_lab_id`, `estatus`, `malformacion`, `ths`, `ths_valor`, `pku`, `pku_valor`, `oh17`, `oh17_valor`, `gal`, `gal_valor`, `estado_clinica`, `unidad_clinica`, `unidad_jurisdiccion`, `enfermedad_metabolica`, `numerodegemelo`, `muestraadecuada`, `laboratorio`) VALUES
(1, 5221, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL),
(2, 5222, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL),
(3, 5223, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL),
(4, 5224, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Normal', '0.55', 'Normal', '0.55', 'Normal', '1.55', 'Normal', '55', '', '', '', '', '', '', 'laboratorios ruiz'),
(5, 5225, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Normal', '0.55', 'Normal', '0.55', 'Normal', '1.55', 'Normal', '55', '', '', '', '', '', '', 'laboratorios ruiz'),
(6, 5226, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Normal', '0.55', 'Normal', '0.55', 'Normal', '1.55', 'Normal', '55', '', '', '', '', '', '', 'laboratorios ruiz');

-- --------------------------------------------------------

--
-- Table structure for table `tamiz_history`
--

CREATE TABLE IF NOT EXISTS `tamiz_history` (
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
  `tamiz_id` int(100) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `paterno` varchar(50) DEFAULT NULL,
  `materno` varchar(50) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `nombre`, `paterno`, `materno`, `role_id`, `password`) VALUES
(1, 'arturo.delosangeles@sintesys.us', 'Jose Arturo', 'De los Angeles', 'Salgado', 1, 'a8f7267c5923cb0e5cb9e0d4916e5e07e98e144a'),
(2, 'arturodelosangeles@hotmail.com', 'BruceSupervisor', 'Thompson', 'Ironmade', 2, 'a8f7267c5923cb0e5cb9e0d4916e5e07e98e144a'),
(3, 'arturodelosangeles@hotmail.com', 'Arturo', 'De los Santos', 'Diaz', 4, '772ff7300af0387bf2f1a371478d1f7665f69030'),
(4, 'mozartstein@gmail.com', 'Lab', 'Labl', 'Lab', 4, 'a8f7267c5923cb0e5cb9e0d4916e5e07e98e144a'),
(5, 'lab@lab.lab', 'lab', 'lab', 'lab', 4, '44cb7fc5acea84cf149554861d02e441e3ab5a05');

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
