-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-05-2018 a las 09:55:19
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
-- Estructura de tabla para la tabla `presupuestos`
--

CREATE TABLE IF NOT EXISTS `presupuestos` (
  `presupuestos_id` int(11) NOT NULL AUTO_INCREMENT,
  `presupuestos_nombre` varchar(100) NOT NULL,
  `presupuestos_nif` varchar(10) NOT NULL,
  `presupuestos_encargo` text NOT NULL,
  `presupuestos_superficie` varchar(15) NOT NULL,
  `presupuestos_pem` int(11) NOT NULL,
  `presupuestos_honorarios` int(11) NOT NULL,
  `presupuestos_email` varchar(100) NOT NULL,
  `presupuestos_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `presupuestos_observaciones` text NOT NULL,
  `presupuestos_aceptado` tinyint(1) NOT NULL DEFAULT '0',
  `presupuestos_usuario` varchar(50) NOT NULL,
  PRIMARY KEY (`presupuestos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `presupuestos`
--

INSERT INTO `presupuestos` (`presupuestos_id`, `presupuestos_nombre`, `presupuestos_nif`, `presupuestos_encargo`, `presupuestos_superficie`, `presupuestos_pem`, `presupuestos_honorarios`, `presupuestos_email`, `presupuestos_fecha`, `presupuestos_observaciones`, `presupuestos_aceptado`, `presupuestos_usuario`) VALUES
(1, ' Angel', ' 12345678Z', ' Direccion de ejecucion de obras y coordinacion de seguridad y salud. Sita en calle Ramon y Cajal, 1 de Trebujena (Cadiz).', ' 140 m2', 45000, 1650, ' agvarelapru@gmail.com', '2018-04-30 11:55:44', ' ', 1, '1'),
(2, 'Angel', '12345678Z', 'Direccion de ejecucion de obras y coordinacion de seguridad y salud. Sita en calle Ramon y Cajal, 1 de Trebujena (Cadiz).', '140 m2', 45000, 1650, 'agvarelapru@gmail.com', '2018-04-30 11:56:09', '', 0, ''),
(3, 'PEPE', '', 'direccion de obras', '120', 30000, 1320, 'apr@asd.com', '2018-04-30 12:26:46', '', 0, '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
