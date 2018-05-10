-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-05-2018 a las 10:03:56
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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuarios_id` int(10) NOT NULL AUTO_INCREMENT,
  `usuarios_nombre` varchar(100) NOT NULL,
  `usuarios_apellido1` varchar(100) NOT NULL,
  `usuarios_apellido2` varchar(100) NOT NULL,
  `usuarios_nif` varchar(9) NOT NULL,
  `usuarios_direccion` varchar(100) NOT NULL,
  `usuarios_cp` int(5) NOT NULL,
  `usuarios_poblacion` int(4) NOT NULL,
  `usuarios_provincia` int(2) NOT NULL,
  `usuarios_telefono` int(9) NOT NULL,
  `usuarios_email` varchar(100) NOT NULL,
  `usuarios_titulacion` varchar(100) DEFAULT NULL,
  `usuarios_colegio` varchar(100) DEFAULT NULL,
  `usuarios_num_colegiado` varchar(20) DEFAULT NULL,
  `usuarios_perfil` varchar(25) NOT NULL DEFAULT 'Cliente',
  `usuarios_usuario` varchar(100) NOT NULL,
  `usuarios_pass` varchar(100) NOT NULL,
  `usuarios_bloqueado` tinyint(4) NOT NULL DEFAULT '1',
  `usuarios_fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuarios_fecha_nacimiento` date NOT NULL,
  PRIMARY KEY (`usuarios_id`),
  UNIQUE KEY `usuarios_nif` (`usuarios_nif`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuarios_id`, `usuarios_nombre`, `usuarios_apellido1`, `usuarios_apellido2`, `usuarios_nif`, `usuarios_direccion`, `usuarios_cp`, `usuarios_poblacion`, `usuarios_provincia`, `usuarios_telefono`, `usuarios_email`, `usuarios_titulacion`, `usuarios_colegio`, `usuarios_num_colegiado`, `usuarios_perfil`, `usuarios_usuario`, `usuarios_pass`, `usuarios_bloqueado`, `usuarios_fecha_alta`, `usuarios_fecha_nacimiento`) VALUES
(1, 'Angel', 'Varela', 'Pruaño', '44049151B', 'C/ Ramon y Cajal, 1', 11560, 1802, 11, 605884603, 'agvarelapru@gmail.com', NULL, NULL, NULL, 'Administrador', 'agvarela', '576bf09efbbc72eb17361202b592e7ee', 0, '2018-04-12 18:39:17', '0000-00-00'),
(2, 'Pepe', 'Garcia', 'Lopez', '55555555K', 'C/ Palomino, 25', 11560, 1802, 11, 654123789, 'arturo@asd.com', NULL, NULL, NULL, 'Cliente', 'pp', '576bf09efbbc72eb17361202b592e7ee', 0, '2018-04-29 16:57:34', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
