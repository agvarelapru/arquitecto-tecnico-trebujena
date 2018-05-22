-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-05-2018 a las 19:15:33
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
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `pagos_id` int(11) NOT NULL AUTO_INCREMENT,
  `pagos_usuario` int(11) NOT NULL,
  `pagos_encargo` int(11) NOT NULL,
  `pagos_cantidad` double NOT NULL,
  `pagos_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pagos_observaciones` text NOT NULL,
  PRIMARY KEY (`pagos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`pagos_id`, `pagos_usuario`, `pagos_encargo`, `pagos_cantidad`, `pagos_fecha`, `pagos_observaciones`) VALUES
(12, 2, 7, 500, '2018-05-10 18:51:42', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
