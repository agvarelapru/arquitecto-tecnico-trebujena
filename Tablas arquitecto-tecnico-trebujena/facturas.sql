-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-05-2018 a las 09:56:08
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
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
  `facturas_id` int(11) NOT NULL AUTO_INCREMENT,
  `facturas_tecnico` int(5) NOT NULL,
  `facturas_cliente` int(5) NOT NULL,
  `facturas_encargo` int(5) NOT NULL,
  `facturas_fecha` date NOT NULL,
  `facturas_observaciones` varchar(500) NOT NULL,
  `facturas_year` int(2) NOT NULL,
  `facturas_trimestre` int(1) NOT NULL,
  `facturas_num` int(3) NOT NULL,
  `facturas_iva` double NOT NULL,
  `facturas_irpf` double NOT NULL,
  `facturas_total` double NOT NULL,
  `facturas_numero_factura` varchar(10) NOT NULL,
  PRIMARY KEY (`facturas_id`),
  UNIQUE KEY `facturas_numero` (`facturas_numero_factura`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`facturas_id`, `facturas_tecnico`, `facturas_cliente`, `facturas_encargo`, `facturas_fecha`, `facturas_observaciones`, `facturas_year`, `facturas_trimestre`, `facturas_num`, `facturas_iva`, `facturas_irpf`, `facturas_total`, `facturas_numero_factura`) VALUES
(5, 1, 2, 7, '2018-05-03', '', 18, 2, 0, 325.5, 0, 1875.5, '18/02-02'),
(6, 1, 1, 4, '2018-05-03', '', 18, 2, 0, 325.5, 0, 1875.5, '18/02-03');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
