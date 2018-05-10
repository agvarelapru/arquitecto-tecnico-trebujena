-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-05-2018 a las 09:56:36
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `arquitecto_tecnico_trebujena_es`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargos`
--

CREATE TABLE IF NOT EXISTS `encargos` (
  `encargos_id` int(11) NOT NULL AUTO_INCREMENT,
  `encargos_tipo` text NOT NULL,
  `encargos_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `encargos_pem` double NOT NULL,
  `encargos_ref_catastral` varchar(50) NOT NULL,
  `encargos_direccion` varchar(100) NOT NULL,
  `encargos_cp` int(5) NOT NULL,
  `encargos_poblacion` varchar(50) NOT NULL,
  `encargos_provincia` varchar(50) NOT NULL,
  `encargos_superficie` double NOT NULL,
  `encargos_honorarios` varchar(5) NOT NULL,
  `encargos_pagos` int(5) NOT NULL DEFAULT '0',
  `encargos_usuario` int(5) NOT NULL,
  `encargos_observaciones` text NOT NULL,
  `encargos_tecnico` int(5) NOT NULL,
  `encargos_finalizado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`encargos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `encargos`
--

INSERT INTO `encargos` (`encargos_id`, `encargos_tipo`, `encargos_fecha`, `encargos_pem`, `encargos_ref_catastral`, `encargos_direccion`, `encargos_cp`, `encargos_poblacion`, `encargos_provincia`, `encargos_superficie`, `encargos_honorarios`, `encargos_pagos`, `encargos_usuario`, `encargos_observaciones`, `encargos_tecnico`, `encargos_finalizado`) VALUES
(1, 'Direccion de ejecucion de obras y coordinacion de seguridad y salud', '2018-04-30 18:52:16', 45000, 'a11asd6gf4545adfg', 'C/ Andalucia, 1', 11560, '1802', '11', 140, '1550', 0, 1, '', 1, 0),
(2, ' Direccion de ejecucion de obras y coordinacion de seguridad y salud', '2018-04-30 18:53:29', 45000, ' a11asd6gf4545adfg', ' C/ Andalucia, 1', 11560, '1802', '11', 140, '1550', 0, 1, ' ', 1, 0),
(3, 'Direccion de ejecucion de obras y coordinacion de seguridad y salud', '2018-04-30 18:57:50', 45000, 'a11asd6gf4545adfg', 'C/ Andalucia, 1', 11560, '1802', '11', 140, '1550', 0, 1, '', 1, 0),
(4, 'Proyecto ejecucion vivienda', '2018-04-30 19:07:44', 45000, 'a11asd6gf4545adfg', 'C/ Andalucia, 1', 11560, '1802', '11', 140, '1550', 0, 1, '', 1, 0),
(7, 'Direccion de ejecucion de obras y coordinacion de seguridad y salud', '2018-04-30 19:11:07', 45000, 'a11asd6gf4545adfg', 'C/ Andalucia, 1', 11560, '1802', '11', 140, '1550', 0, 2, '', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
