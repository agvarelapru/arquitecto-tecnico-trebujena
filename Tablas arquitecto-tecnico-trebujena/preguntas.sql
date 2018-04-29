-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-04-2018 a las 20:03:07
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
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE IF NOT EXISTS `preguntas` (
  `preguntas_id` int(5) NOT NULL AUTO_INCREMENT,
  `preguntas_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `preguntas_asunto` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `preguntas_pregunta` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `preguntas_usuario` varchar(50) NOT NULL,
  `preguntas_nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL,
  `preguntas_email` varchar(100) NOT NULL,
  `preguntas_respondida` tinyint(1) NOT NULL DEFAULT '0',
  `preguntas_respuesta` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `preguntas_fecha_respuesta` date NOT NULL,
  `preguntas_atendido` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `preguntas_leida` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`preguntas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`preguntas_id`, `preguntas_fecha`, `preguntas_asunto`, `preguntas_pregunta`, `preguntas_usuario`, `preguntas_nombre`, `latitud`, `longitud`, `preguntas_email`, `preguntas_respondida`, `preguntas_respuesta`, `preguntas_fecha_respuesta`, `preguntas_atendido`, `preguntas_leida`) VALUES
(1, '2018-04-29 11:16:17', 'Mensaje de prueba', 'Este es el primer mensaje que registro de prueba', '1', 'Angel Varela Pruaño', 36.8709412, -6.176904, 'agvarelapru@gmail.com', 1, 'Esta es la respuesta a la pregunta', '2018-04-29', 'agvarela', 0),
(5, '2018-04-29 12:42:59', 'Adios', 'Hasta luego lucaaas', 'agvarela', 'Angel Varela Pruaño', 0, 0, 'agvarelapru@gmail.com', 0, '', '0000-00-00', '', 0),
(6, '2018-04-29 17:05:15', 'Hola', 'Buenas acabo de registrarme', 'pp', 'Pepe Garcia Lopez', 0, 0, 'arturo@asd.com', 1, 'Hola pepe que pasa con tigo', '2018-04-29', 'agvarela', 0),
(7, '2018-04-29 19:19:20', 'Mensaje de prueba', 'Este es un mensaje desde el area publica', '', 'Angel', 36.8710556, -6.1768244999999995, 'agvarelapru@gmail.com', 1, 'Esta es la respuesta al mensaje de la zona publica', '2018-04-29', 'agvarela', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
