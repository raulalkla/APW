-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-06-2012 a las 19:06:22
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
  `nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcio` varchar(400) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `durada` int(11) NOT NULL COMMENT 'dies!!',
  `preu` int(11) NOT NULL,
  `estat` int(11) NOT NULL,
  `puntuacio` int(11) DEFAULT '0',
  `desti` int(11) NOT NULL,
  `promocio` int(11) DEFAULT NULL,
  `imatge` varchar(400) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipus_atraccio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `desti` (`desti`,`promocio`),
  KEY `promocio` (`promocio`),
  KEY `EstatAtraccio` (`estat`),
  KEY `tipus_atraccio` (`tipus_atraccio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `atraccio`
--

INSERT INTO `atraccio` (`id`, `nom`, `descripcio`, `durada`, `preu`, `estat`, `puntuacio`, `desti`, `promocio`, `imatge`, `tipus_atraccio`) VALUES
(4, '8 días crucero Fiordos + vuelos', 'Descubre los bellos fiordos noruegos y las maravillas del báltico navegando durante 8 días y alojándote en camarote interior + vuelos desde Madrid y Barcelona', 8, 999, 1, 0, 2, 1, 'http://media1.grpcdn.net/media/catalog/product/cache/131/image/9df78eab33525d08d6e5fb8d27136e95/o/f/oferta-crucero-fiordos-grand-mistral-iberocruceros-01.jpg', 3),
(5, 'Asturias en apartamento rural', 'Si aún no tienes plan para estas vacaciones no lo dudes más. Hoy te ofrecemos una escapada a la exuberante Asturias con una estancia en apartamento rural. No dejes escapar esta oportunidad para disfrutar con la familia, amigos, pareja… ¡Asturias es para vivirla!', 1, 25, 1, 0, 3, NULL, 'http://media1.grpcdn.net/media/catalog/product/cache/131/image/9df78eab33525d08d6e5fb8d27136e95/o/f/oferta-apartamentos-romallande-asturias-02.jpg', 5),
(6, '14 días en Pekín y Shanghai', 'Atrayente y enigmática China encierra, entre sus ciudades y paisajes, los secretos de una civilización milenaria aún por descubrir. Destino incierto de un viajero que, con una mochila sobre la espalda, busca encontrarse a sí mismo en un país imperial. ¿Te atreves a soñar?', 14, 1475, 1, 0, 4, NULL, 'http://media1.grpcdn.net/media/catalog/product/cache/131/image/9df78eab33525d08d6e5fb8d27136e95/o/f/oferta-china-hotel-howard-johnson-destino-asia-01.jpg', 4),
(11, 'Palacio histórico: hotel + cena', 'Un castillo-palacio hoy convertido en hotel. ¿Atrayente verdad? Doble Superior con desayuno + cava y bombobes + cena degustación en la Hospederí­a Papa Luna', 1, 56, 1, 0, 14, NULL, 'img/atraccions/oferta-hotel-pe_iscola-hospederia-papa-luna-05[1].jpg', 1),
(12, 'Verano mágico en Zanzibar', 'Un precio increíble para las vacaciones de tu vida en Zanzibar: vuelos i/v + 7 noches de hotel con pensión completa. ¡Viaja en julio desde Italia!', 8, 848, 1, 0, 18, 1, 'img/atraccions/oferta-liu-travel-zanzibar-01_3[1].jpg', 4),
(13, 'Masaje o reflexología podal', 'Porque te lo mereces, lo necesitas y porque va a ser una experiencia casi religiosa: masaje corporal con aceites esenciales o reflexología podal, ¿te apuntas?', 1, 10, 1, 0, 12, NULL, 'img/atraccions/descuento-masaje-puntounas-valencia[1].jpg', 7),
(14, 'Lujoso crucero por Europa en agosto', 'Crucero por Europa en agosto: 8 días y 7 noches a bordo del Grand Mistral con pensión completa + vuelos hasta Copenhague (punto de partida). ¡Viva el verano!', 8, 499, 1, 0, 19, NULL, 'img/atraccions/1-oferta-crucero-grand-mistral-iberocruceros[1].jpg', 3),
(15, '¡Últimas plazas para Lanzarote!', '¿Sois una familia? 1 Semana de ensueño en Lanzarote + vuelos en un apartamento para 3 adultos / 2 adultos + 1 niño (mayor de 12 años). ¡Sólo 250€ por persona!', 7, 250, 1, 0, 20, NULL, 'img/atraccions/oferta-lanzaorete-hotel-las-gaviotas-solplan-02_2[1].jpg', 4),
(16, 'Amsterdam: 2 noches en su corazón', 'Descubre Amsterdam con un viaje irresistible: 3 días y 2 noches en un céntrico hotel 3*. ¡Y seis meses para disfrutarlo!', 3, 94, 1, 0, 21, NULL, 'img/atraccions/oferta-westcord-city-centre-hotel-amsterdam-dealgecco-01[1].jpg', 1),
(17, 'Penedés: hotel 4* + bodega + cata', 'Estancia entre viñedos: 1 noche con desayuno buffet + visita guiada a las cavas Rovellats con degustación. ¡En el Hotel Air Penedés 4*!', 1, 39, 1, 0, 22, NULL, 'img/atraccions/1-oferta-hotel-air-penedes_2[1].jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desti`
--

CREATE TABLE IF NOT EXISTS `desti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ubicacio` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `estat` (`estat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `desti`
--

INSERT INTO `desti` (`id`, `nom`, `ubicacio`, `estat`) VALUES
(2, 'Fiordos', 'Noruega', 1),
(3, 'Asturias', 'España', 1),
(4, 'Pekin', 'China', 1),
(12, 'Valencia', 'Valencia', 1),
(13, 'Pokon', 'Pokon', 1),
(14, 'Hospederí­a Papa Luna', 'Zaragoza', 1),
(18, 'Zanzibar', 'Tanzania', 1),
(19, 'Europa', 'Europa', 1),
(20, 'Lanzarote', 'Islas Canarias', 1),
(21, 'Amsterdam', 'Holanda', 1),
(22, 'Vilafranca del Penedès', 'España', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estat`
--

CREATE TABLE IF NOT EXISTS `estat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipus` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `historic_compres`
--

INSERT INTO `historic_compres` (`id`, `usuari`, `linia_comanda`) VALUES
(2, 1, 19),
(3, 1, 20),
(4, 1, 21),
(5, 1, 22);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `linies_comanda`
--

INSERT INTO `linies_comanda` (`id`, `preu`, `data`, `cantitat`, `atraccio`) VALUES
(19, 1475, '2012-05-26 15:36:40', 2, 6),
(20, 25, '2012-05-26 15:36:40', 1, 5),
(21, 1475, '2012-05-27 15:28:31', 2, 6),
(22, 999, '2012-05-27 15:28:31', 1, 4);

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
  `nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcio` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `estat` (`estat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tipus_atraccio`
--

INSERT INTO `tipus_atraccio` (`id`, `nom`, `descripcio`, `estat`) VALUES
(1, 'Escapada romantica', 'Vete de la ciudad a un pueblecito pequeÃ±o con tu pareja y desfrutad de vuestro amor.', 1),
(2, 'Multiaventura', 'Rapel, escalada, tiro con arco, hipica ...', 1),
(3, 'Crucero', 'Navega por los 7 mares', 1),
(4, 'Exotico', 'Cómeme el fruto prohibido', 1),
(5, 'Rural', 'Churras o merinas tu eliges! ', 2),
(7, 'Friki', 'Pasa el mejor finde de tu vida con tu portatil en una rave de gente rara, como TU!', 4);

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
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`id`, `nom`, `cognom`, `dni`, `usuari`, `password`, `admin`) VALUES
(1, 'Raul', 'Garcia Alcaraz', '20044932H', 'raul', 'bc7a844476607e1a59d8eb1b1f311830', 0),
(2, 'Pau', 'Martí Pellicer', '20047928Q', 'pau', '0ea58701b84295bdd11c5b05426c6c3f', 0),
(6, 'aaaa', 'aaa', '00000000L', 'aaaa', '47bce5c74f589f4867dbd57e9ca9f808', 0),
(7, 'demo', 'mode', '00000000A', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 0),
(8, 'demoooo2', 'a vore', '00000000L', 'demo2', '1066726e7160bd9c987c9968e0cc275a', 0),
(9, 'Admin', 'Root', '99999999Z', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

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
