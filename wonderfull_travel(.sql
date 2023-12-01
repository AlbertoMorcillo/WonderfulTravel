-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2023 a las 16:08:27
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wonderfull_travel`
--
CREATE DATABASE IF NOT EXISTS `wonderfull_travel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wonderfull_travel`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `continents`
--

DROP TABLE IF EXISTS `continents`;
CREATE TABLE IF NOT EXISTS `continents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `continents`
--

INSERT INTO `continents` (`id`, `nombre`) VALUES
(1, 'ASIA'),
(2, 'EUROPA'),
(3, 'ÀFRICA'),
(4, 'AMÈRICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paisos`
--

DROP TABLE IF EXISTS `paisos`;
CREATE TABLE IF NOT EXISTS `paisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `continent_id` int(11) NOT NULL,
  `preu` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `continent_id` (`continent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paisos`
--

INSERT INTO `paisos` (`id`, `nombre`, `continent_id`, `preu`) VALUES
(1, 'Afganistán', 1, 3523),
(2, 'Japón', 1, 1231),
(3, 'Yemen', 1, 1849),
(4, 'España', 2, 86),
(5, 'Portugal', 2, 93),
(6, 'Luxemburgo', 2, 113),
(7, 'Uganda', 3, 912),
(8, 'Sierra Leona', 3, 2382),
(9, 'Marruecos', 3, 51),
(10, 'México', 4, 971),
(11, 'Brasil', 4, 856),
(12, 'Argentina', 4, 1075);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `telefono` text NOT NULL,
  `email` text NOT NULL,
  `genero` enum('Masculí','Femení','Privat') NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `telefono`, `email`, `genero`, `uniqid`) VALUES
(12, 'Alberto', 'Masa', '+34123456789', 'a.morcillo@sapalomera.cat', 'Femení', NULL),
(13, 'Alberto', 'Masa', '+34123456789', 'a.morcillo@sapalomera.cat', 'Femení', NULL),
(14, 'Alberto', 'Masa', '+34123456789', 'a.morcillo@sapalomera.cat', 'Femení', NULL),
(15, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(16, 'adadaad', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(17, 'adadaad', 'adadasd', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(18, 'adadaad', 'asdad', '+34123456789', 'add@gmail.com', 'Masculí', NULL),
(19, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(20, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(21, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(22, 'Alberto', 'adadasd', '+34123456789', 'a.morcillo@sapalomera.cat', 'Femení', NULL),
(23, 'adadaad', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(24, 'adadaad', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(25, 'adadaad', 'adadasd', '+34123456789', 'a.morcillo@sapalomera.cat', 'Femení', NULL),
(26, 'Alberto', 'adadasd', '+34567890123', 'add@gmail.com', 'Masculí', NULL),
(27, 'Alberto', 'adadasd', '+34567890123', 'add@gmail.com', 'Masculí', NULL),
(28, 'Alberto', 'addad', '+34123456789', 'thealbex@gmail.com', 'Masculí', NULL),
(29, 'Alberto', 'addad', '+34567890123', 'a.morcillo@sapalomera.cat', 'Femení', NULL),
(30, 'Alberto', 'addad', '+34567890123', 'a.morcillo@sapalomera.cat', 'Femení', NULL),
(31, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(32, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(33, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(34, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(35, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(36, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(37, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(38, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(39, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(40, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(41, 'Manolo', 'Perico', '+34123456789', 'a.morcillo@sapalomera.cat', 'Femení', NULL),
(42, 'Manolo', 'Perico', '+34123456789', 'a.morcillo@sapalomera.cat', 'Femení', NULL),
(43, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(44, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(45, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(46, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(47, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(48, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(49, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(50, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(51, 'Benito', 'Morcillo', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(52, 'Keria', 'Faker', '+34123456789', 'thealbex@gmail.com', 'Masculí', NULL),
(53, 'Keria', 'Faker', '+34123456789', 'thealbex@gmail.com', 'Masculí', NULL),
(54, 'Faker', 'Keria', '+34123456789', 'faker@gmail.com', 'Femení', NULL),
(55, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Femení', NULL),
(56, 'adadaad', 'adadasd', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(57, 'Pollo', 'Atomico', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(58, 'Pollo', 'Atomico', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(59, 'Moraine', 'Althor', '+34123456789', 'Moraine@gmail.com', 'Femení', NULL),
(60, 'Rand', 'Elayne', '+34123456789', 'rand@gmail.com', 'Masculí', NULL),
(61, 'adadad', 'aasdad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Femení', NULL),
(62, 'adadaad', 'adadad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Femení', NULL),
(63, 'adadaad', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(64, 'Alberto', 'pimpollo', '+34123456789', 'Jorge@gmail.com', 'Femení', NULL),
(65, 'Manolo', 'Manolo', '+34123456789', 'Manolo@gmail.com', 'Masculí', NULL),
(66, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(67, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(68, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(69, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Femení', NULL),
(70, 'adadaad', 'adadasd', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(71, 'adadaad', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(72, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(73, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Femení', NULL),
(74, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(75, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Femení', NULL),
(76, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Femení', NULL),
(77, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(78, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(79, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(80, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(81, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(82, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(83, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(84, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(85, 'adadaad', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL),
(86, 'Alberto', 'addad', '+34123456789', 'a.morcillo@sapalomera.cat', 'Masculí', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viatges`
--

DROP TABLE IF EXISTS `viatges`;
CREATE TABLE IF NOT EXISTS `viatges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destí` text NOT NULL,
  `preu_total` int(11) NOT NULL,
  `num_persones` int(11) NOT NULL,
  `data` date NOT NULL,
  `pais` text NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `viatges`
--

INSERT INTO `viatges` (`id`, `destí`, `preu_total`, `num_persones`, `data`, `pais`, `uniqid`) VALUES
(92, 'ASIA', 2462, 2, '0000-00-00', 'Japón', NULL),
(93, 'ASIA', 2462, 2, '0000-00-00', 'Japón', NULL),
(94, 'ASIA', 2462, 2, '0000-00-00', 'Japón', NULL),
(95, 'ASIA', 3523, 1, '0000-00-00', 'Afganistán', NULL),
(96, 'ASIA', 3523, 1, '0000-00-00', 'Afganistán', NULL),
(97, 'ASIA', 1231, 1, '2023-11-25', 'Japón', NULL),
(98, 'AMÈRICA', 856, 1, '0000-00-00', 'Brasil', NULL),
(99, 'ASIA', 7046, 2, '0000-00-00', 'Afganistán', NULL),
(100, 'ASIA', 7046, 2, '0000-00-00', 'Afganistán', NULL),
(101, 'ASIA', 7046, 2, '0000-00-00', 'Afganistán', NULL),
(102, 'ASIA', 7046, 2, '0000-00-00', 'Afganistán', NULL),
(103, 'ASIA', 2462, 2, '0000-00-00', 'Japón', NULL),
(104, 'ASIA', 7046, 2, '0000-00-00', 'Afganistán', NULL),
(105, 'ASIA', 7046, 2, '0000-00-00', 'Afganistán', NULL),
(106, 'ASIA', 7046, 2, '0000-00-00', 'Afganistán', NULL),
(107, 'EUROPA', 226, 2, '0000-00-00', 'Luxemburgo', NULL),
(108, 'EUROPA', 226, 2, '0000-00-00', 'Luxemburgo', NULL),
(109, 'ASIA', 2462, 2, '0000-00-00', 'Japón', NULL),
(110, 'ASIA', 2462, 2, '0000-00-00', 'Japón', NULL),
(111, 'ASIA', 2462, 2, '0000-00-00', 'Japón', NULL),
(112, 'EUROPA', 172, 2, '0000-00-00', 'España', NULL),
(113, 'EUROPA', 172, 2, '0000-00-00', 'España', NULL),
(114, 'EUROPA', 186, 2, '0000-00-00', 'Portugal', NULL),
(115, 'EUROPA', 186, 2, '0000-00-00', 'Portugal', NULL),
(116, 'EUROPA', 186, 2, '0000-00-00', 'Portugal', NULL),
(117, 'EUROPA', 186, 2, '0000-00-00', 'Portugal', NULL),
(118, 'EUROPA', 226, 2, '2023-11-25', 'Luxemburgo', NULL),
(119, 'EUROPA', 226, 2, '2023-11-25', 'Luxemburgo', NULL),
(120, 'ÀFRICA', 102, 2, '2023-12-03', 'Marruecos', NULL),
(121, 'EUROPA', 186, 2, '0000-00-00', 'Portugal', NULL),
(122, 'EUROPA', 186, 2, '0000-00-00', 'Portugal', NULL),
(123, 'EUROPA', 186, 2, '0000-00-00', 'Portugal', NULL),
(124, 'EUROPA', 186, 2, '0000-00-00', 'Portugal', NULL),
(125, 'EUROPA', 186, 2, '0000-00-00', 'Portugal', NULL),
(126, 'EUROPA', 186, 2, '0000-00-00', 'Portugal', NULL),
(127, 'EUROPA', 186, 2, '0000-00-00', 'Portugal', NULL),
(128, 'ÀFRICA', 4764, 2, '2024-11-27', 'Sierra Leona', NULL),
(129, 'ÀFRICA', 1824, 2, '2023-11-26', 'Uganda', NULL),
(130, 'ÀFRICA', 1824, 2, '2023-11-26', 'Uganda', NULL),
(131, 'EUROPA', 186, 2, '2023-11-29', 'Portugal', NULL),
(132, 'ÀFRICA', 4764, 2, '2023-11-26', 'Sierra Leona', '65625ba5b698f'),
(133, 'EUROPA', 186, 2, '0000-00-00', 'Portugal', '65625bb961d2c'),
(134, 'ASIA', 3693, 3, '2023-11-26', 'Japón', '65625cbae118f'),
(135, 'ASIA', 3693, 3, '2023-11-26', 'Japón', '65625d3c3901c'),
(136, 'AMÈRICA', 1712, 2, '2023-11-30', 'Brasil', '65625d64b47b4'),
(137, 'ÀFRICA', 153, 3, '2023-11-29', 'Marruecos', '65625d8357367'),
(138, 'EUROPA', 172, 2, '2023-11-30', 'España', '65625ecb40100'),
(139, 'EUROPA', 172, 2, '2023-11-30', 'España', '65625ef2271ef'),
(140, 'ÀFRICA', 612, 12, '2023-12-02', 'Marruecos', '65625f0b0bc8d'),
(141, 'ÀFRICA', 102, 2, '2023-11-26', 'Marruecos', '656361eec68e2'),
(144, 'EUROPA', 172, 2, '0000-00-00', 'España', '65636376d1a78'),
(145, 'ASIA', 2462, 2, '2023-11-27', 'Japón', '6563639146f07'),
(146, 'ÀFRICA', 153, 3, '2023-11-29', 'Marruecos', '656363b69831a'),
(148, 'ASIA', 7046, 2, '2023-11-26', 'Afganistán', '6563651a12979'),
(149, 'ASIA', 3328, 2, '0000-00-00', 'Yemen', '6563652a50056'),
(151, 'ASIA', 3523, 1, '2023-11-26', 'Afganistán', '656370774c073'),
(152, 'ASIA', 3523, 1, '2023-11-26', 'Afganistán', '65637104b01b5'),
(153, 'ASIA', 7046, 2, '2023-11-26', 'Afganistan', '6563711ed039f'),
(154, 'ASIA', 7046, 2, '2023-11-26', 'Afganistan', '6563717059054'),
(155, 'ASIA', 3523, 1, '2023-11-26', 'Afganistan', '6563719008a0e'),
(156, 'ASIA', 3523, 1, '2023-11-26', 'Afganistan', '656371c9b7403'),
(157, 'ÀFRICA', 102, 2, '2023-11-26', 'Marruecos', '656371dbd9b62'),
(158, 'ÀFRICA', 102, 2, '2023-11-26', 'Marruecos', '656371e644aa6'),
(159, 'ÀFRICA', 102, 2, '2023-11-26', 'Marruecos', '6563722b53eeb'),
(160, 'ÀFRICA', 102, 2, '2023-11-26', 'Marruecos', '65637233590af'),
(161, 'AMERICA', 1942, 2, '2023-11-26', 'Mexico', '656372b2dc7ce');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `paisos`
--
ALTER TABLE `paisos`
  ADD CONSTRAINT `paisos_ibfk_1` FOREIGN KEY (`continent_id`) REFERENCES `continents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
