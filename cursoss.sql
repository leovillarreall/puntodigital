-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2023 a las 03:32:12
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `puntod`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursoss`
--

CREATE TABLE `cursoss` (
  `id` int(11) NOT NULL,
  `nombre_curso` varchar(255) DEFAULT NULL,
  `profesor` varchar(255) DEFAULT NULL,
  `modalidad` enum('presencial','semipresencial','virtual') DEFAULT NULL,
  `edad_minima` int(11) DEFAULT NULL,
  `edad_maxima` int(11) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `cupos_limitados` int(11) DEFAULT NULL,
  `clases` int(11) DEFAULT NULL,
  `cupos_disponibles` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cursoss`
--

INSERT INTO `cursoss` (`id`, `nombre_curso`, `profesor`, `modalidad`, `edad_minima`, `edad_maxima`, `hora_inicio`, `hora_fin`, `fecha_inicio`, `fecha_fin`, `cupos_limitados`, `clases`, `cupos_disponibles`) VALUES
(1, 'ingles', 'Camila Allende', 'semipresencial', 4, 9, '19:05:00', '21:06:00', '2023-11-06', '2023-11-13', 4, 3, NULL),
(2, 'Excel', 'Marcelo Guzman', 'presencial', 15, 45, '08:00:00', '10:00:00', '2023-11-15', '2024-02-13', 30, 26, NULL),
(4, 'Curso 1', 'Profesor 1', 'presencial', 18, 60, '08:00:00', '10:00:00', '2023-11-15', '2023-12-15', 30, 10, NULL),
(5, 'Curso 2', 'Profesor 2', 'semipresencial', 20, 55, '14:00:00', '16:00:00', '2023-11-20', '2023-12-20', 25, 12, NULL),
(6, 'Curso 3', 'Profesor 3', 'virtual', 25, 70, '10:30:00', '12:30:00', '2023-11-10', '2023-12-10', 40, 8, NULL),
(7, 'Curso 4', 'Profesor 4', 'presencial', 18, 60, '16:00:00', '18:00:00', '2023-11-25', '2023-12-25', 35, 9, NULL),
(8, 'Curso 5', 'Profesor 5', 'semipresencial', 20, 55, '09:00:00', '11:00:00', '2023-11-18', '2023-12-18', 28, 11, NULL),
(9, 'Curso 6', 'Profesor 6', 'virtual', 25, 70, '15:30:00', '17:30:00', '2023-11-13', '2023-12-13', 50, 7, NULL),
(10, 'Curso 7', 'Profesor 7', 'presencial', 18, 60, '14:00:00', '16:00:00', '2023-11-29', '2023-12-29', 32, 10, NULL),
(11, 'Curso 8', 'Profesor 8', 'semipresencial', 20, 55, '11:30:00', '13:30:00', '2023-11-22', '2023-12-22', 37, 12, NULL),
(12, 'Curso 9', 'Profesor 9', 'virtual', 25, 70, '17:00:00', '19:00:00', '2023-11-17', '2023-12-17', 45, 8, NULL),
(13, 'Curso 10', 'Profesor 10', 'presencial', 18, 60, '12:30:00', '14:30:00', '2023-11-12', '2023-12-12', 38, 9, NULL),
(14, 'Curso 11', 'Profesor 11', 'semipresencial', 20, 55, '08:30:00', '10:30:00', '2023-11-27', '2023-12-27', 29, 11, NULL),
(15, 'Curso 12', 'Profesor 12', 'virtual', 25, 70, '16:30:00', '18:30:00', '2023-11-14', '2023-12-14', 42, 7, NULL),
(16, 'Curso 13', 'Profesor 13', 'presencial', 18, 60, '10:00:00', '12:00:00', '2023-11-23', '2023-12-23', 34, 10, NULL),
(17, 'Curso 14', 'Profesor 14', 'semipresencial', 20, 55, '15:30:00', '17:30:00', '2023-11-16', '2023-12-16', 31, 12, NULL),
(18, 'Curso 15', 'Profesor 15', 'virtual', 25, 70, '09:30:00', '11:30:00', '2023-11-21', '2023-12-21', 48, 8, NULL),
(19, 'Curso 16', 'Profesor 16', 'presencial', 18, 60, '13:00:00', '15:00:00', '2023-11-28', '2023-12-28', 36, 9, NULL),
(20, 'Curso 17', 'Profesor 17', 'semipresencial', 20, 55, '08:30:00', '10:30:00', '2023-11-11', '2023-12-11', 27, 11, NULL),
(21, 'Curso 18', 'Profesor 18', 'virtual', 25, 70, '14:30:00', '16:30:00', '2023-11-24', '2023-12-24', 43, 7, NULL),
(22, 'Curso 19', 'Profesor 19', 'presencial', 18, 60, '10:30:00', '12:30:00', '2023-11-19', '2023-12-19', 33, 10, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursoss`
--
ALTER TABLE `cursoss`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursoss`
--
ALTER TABLE `cursoss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
