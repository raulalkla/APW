-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-05-2012 a las 17:26:42
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `socialtravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atraccio`
--

CREATE TABLE IF NOT EXISTS `atraccio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `descripcio` varchar(400) NOT NULL,
  `durada` int(11) NOT NULL COMMENT 'dies!!',
  `preu` int(11) NOT NULL,
  `estat` int(11) NOT NULL,
  `puntuacio` int(11) DEFAULT NULL,
  `desti` int(11) NOT NULL,
  `promocio` int(11) DEFAULT NULL,
  `imatge` varchar(400) DEFAULT NULL,
  `tipus_atraccio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `desti` (`desti`,`promocio`),
  KEY `promocio` (`promocio`),
  KEY `EstatAtraccio` (`estat`),
  KEY `tipus_atraccio` (`tipus_atraccio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `atraccio`
--

INSERT INTO `atraccio` (`id`, `nom`, `descripcio`, `durada`, `preu`, `estat`, `puntuacio`, `desti`, `promocio`, `imatge`, `tipus_atraccio`) VALUES
(3, 'Granada: junior suite + jacuzzi', 'Un hotel con 4* estrellas categoría superior, una estancia repleta de detalles, un precio irresistible y hasta el 31 de agosto para disfrutar de tu Vale. Sí, es cierto, a veces la vida puede ser maravillosa.', 2, 139, 4, NULL, 1, NULL, 'http://media1.grpcdn.net/media/catalog/product/cache/131/image/9df78eab33525d08d6e5fb8d27136e95/1/-/1-ah-granada-palace_14.jpg', 1),
(4, '8 días crucero Fiordos + vuelos', 'Descubre los bellos fiordos noruegos y las maravillas del báltico navegando durante 8 días y alojándote en camarote interior + vuelos desde Madrid y Barcelona', 8, 999, 1, NULL, 2, 1, 'http://media1.grpcdn.net/media/catalog/product/cache/131/image/9df78eab33525d08d6e5fb8d27136e95/o/f/oferta-crucero-fiordos-grand-mistral-iberocruceros-01.jpg', 3),
(5, 'Asturias en apartamento rural', 'Si aún no tienes plan para estas vacaciones no lo dudes más. Hoy te ofrecemos una escapada a la exuberante Asturias con una estancia en apartamento rural. No dejes escapar esta oportunidad para disfrutar con la familia, amigos, pareja… ¡Asturias es para vivirla!', 1, 25, 1, NULL, 3, NULL, 'http://media1.grpcdn.net/media/catalog/product/cache/131/image/9df78eab33525d08d6e5fb8d27136e95/o/f/oferta-apartamentos-romallande-asturias-02.jpg', 5),
(6, '14 días en Pekín y Shanghai', 'Atrayente y enigmática China encierra, entre sus ciudades y paisajes, los secretos de una civilización milenaria aún por descubrir. Destino incierto de un viajero que, con una mochila sobre la espalda, busca encontrarse a sí mismo en un país imperial. ¿Te atreves a soñar?', 14, 1475, 1, NULL, 4, NULL, 'http://media1.grpcdn.net/media/catalog/product/cache/131/image/9df78eab33525d08d6e5fb8d27136e95/o/f/oferta-china-hotel-howard-johnson-destino-asia-01.jpg', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desti`
--

CREATE TABLE IF NOT EXISTS `desti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `ubicacio` varchar(100) NOT NULL,
  `estat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `estat` (`estat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `desti`
--

INSERT INTO `desti` (`id`, `nom`, `ubicacio`, `estat`) VALUES
(1, 'Granada', 'Granada', NULL),
(2, 'Fiordos', 'Noruega', NULL),
(3, 'Asturias', 'Asturias', NULL),
(4, 'Pekin', 'China', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estat`
--

CREATE TABLE IF NOT EXISTS `estat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipus` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `estat`
--

INSERT INTO `estat` (`id`, `tipus`) VALUES
(1, 'Nueva'),
(2, 'Promocion'),
(3, 'Ultimas unidades'),
(4, 'Chollazo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historic_compres`
--

CREATE TABLE IF NOT EXISTS `historic_compres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuari` int(11) NOT NULL,
  `linia_comanda` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `linia_comanda` (`linia_comanda`),
  KEY `usuari` (`usuari`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `historic_compres`
--

INSERT INTO `historic_compres` (`id`, `usuari`, `linia_comanda`) VALUES
(2, 1, 19),
(3, 1, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linies_comanda`
--

CREATE TABLE IF NOT EXISTS `linies_comanda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `preu` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cantitat` int(11) NOT NULL,
  `atraccio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `atraccio` (`atraccio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `linies_comanda`
--

INSERT INTO `linies_comanda` (`id`, `preu`, `data`, `cantitat`, `atraccio`) VALUES
(19, 1475, '2012-05-26 15:36:40', 2, 6),
(20, 25, '2012-05-26 15:36:40', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preferencies`
--

CREATE TABLE IF NOT EXISTS `preferencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuari` int(11) NOT NULL,
  `tipus_atraccio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuari` (`usuari`),
  KEY `tipus_atraccio` (`tipus_atraccio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `preferencies`
--

INSERT INTO `preferencies` (`id`, `usuari`, `tipus_atraccio`) VALUES
(1, 1, 4),
(2, 2, 2),
(3, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocio`
--

CREATE TABLE IF NOT EXISTS `promocio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_inici` date NOT NULL,
  `data_fi` date NOT NULL,
  `descripcio` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descompte` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `promocio`
--

INSERT INTO `promocio` (`id`, `data_inici`, `data_fi`, `descripcio`, `descompte`) VALUES
(1, '2012-05-01', '2012-06-30', 'Verano loco!', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_amistat`
--

CREATE TABLE IF NOT EXISTS `solicitud_amistat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuari_envia` int(11) NOT NULL,
  `usuari_rep` int(11) NOT NULL,
  `data_solicitut` datetime NOT NULL,
  `aceptada` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `usuari_envia` (`usuari_envia`,`usuari_rep`),
  KEY `usuari_rep` (`usuari_rep`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `solicitud_amistat`
--

INSERT INTO `solicitud_amistat` (`id`, `usuari_envia`, `usuari_rep`, `data_solicitut`, `aceptada`) VALUES
(1, 1, 2, '2012-05-13 10:09:32', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipus_atraccio`
--

CREATE TABLE IF NOT EXISTS `tipus_atraccio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `descripcio` varchar(300) NOT NULL,
  `estat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `estat` (`estat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tipus_atraccio`
--

INSERT INTO `tipus_atraccio` (`id`, `nom`, `descripcio`, `estat`) VALUES
(1, 'Escapada romantica', '', NULL),
(2, 'Multiaventura', '', NULL),
(3, 'Crucero', '', NULL),
(4, 'Exotico', '', NULL),
(5, 'Rural', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

CREATE TABLE IF NOT EXISTS `usuaris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cognom` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `usuari` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_spanish_ci NOT NULL COMMENT 'MD5!!!',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`id`, `nom`, `cognom`, `dni`, `usuari`, `password`) VALUES
(1, 'Raul', 'Garcia Alcaraz', '20044932H', 'raul', 'bc7a844476607e1a59d8eb1b1f311830'),
(2, 'Pau', 'Martí Pellicer', '20047928Q', 'pau', '0ea58701b84295bdd11c5b05426c6c3f'),
(3, 'Temerari', 'Sinatra', '29832810A', 'teme', '994e2625e871f1c141c1cf4a69c5a200'),
(6, 'aaaa', 'aaa', '00000000L', 'aaaa', '47bce5c74f589f4867dbd57e9ca9f808'),
(7, 'demo', 'mode', '00000000A', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229'),
(8, 'demoooo2', 'a vore', '00000000L', 'demo2', '1066726e7160bd9c987c9968e0cc275a');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `atraccio`
--
ALTER TABLE `atraccio`
  ADD CONSTRAINT `atraccio_ibfk_2` FOREIGN KEY (`promocio`) REFERENCES `promocio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `atraccio_ibfk_3` FOREIGN KEY (`desti`) REFERENCES `desti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `atraccio_ibfk_4` FOREIGN KEY (`estat`) REFERENCES `estat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `atraccio_ibfk_5` FOREIGN KEY (`tipus_atraccio`) REFERENCES `tipus_atraccio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `desti`
--
ALTER TABLE `desti`
  ADD CONSTRAINT `desti_ibfk_1` FOREIGN KEY (`estat`) REFERENCES `estat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historic_compres`
--
ALTER TABLE `historic_compres`
  ADD CONSTRAINT `historic_compres_ibfk_1` FOREIGN KEY (`linia_comanda`) REFERENCES `linies_comanda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historic_compres_ibfk_2` FOREIGN KEY (`usuari`) REFERENCES `usuaris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `linies_comanda`
--
ALTER TABLE `linies_comanda`
  ADD CONSTRAINT `linies_comanda_ibfk_1` FOREIGN KEY (`atraccio`) REFERENCES `atraccio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preferencies`
--
ALTER TABLE `preferencies`
  ADD CONSTRAINT `preferencies_ibfk_1` FOREIGN KEY (`usuari`) REFERENCES `usuaris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preferencies_ibfk_2` FOREIGN KEY (`tipus_atraccio`) REFERENCES `tipus_atraccio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitud_amistat`
--
ALTER TABLE `solicitud_amistat`
  ADD CONSTRAINT `solicitud_amistat_ibfk_1` FOREIGN KEY (`usuari_envia`) REFERENCES `usuaris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_amistat_ibfk_2` FOREIGN KEY (`usuari_rep`) REFERENCES `usuaris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipus_atraccio`
--
ALTER TABLE `tipus_atraccio`
  ADD CONSTRAINT `tipus_atraccio_ibfk_2` FOREIGN KEY (`estat`) REFERENCES `estat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
