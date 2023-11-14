-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2023 a las 20:50:03
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
-- Base de datos: `cursos_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `cupo_maximo` int(11) NOT NULL,
  `profesor` varchar(50) NOT NULL,
  `modalidad` varchar(30) NOT NULL,
  `edad_minima` int(11) NOT NULL,
  `edad_maxima` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `clases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `descripcion`, `cupo_maximo`, `profesor`, `modalidad`, `edad_minima`, `edad_maxima`, `hora_inicio`, `hora_fin`, `fecha_inicio`, `fecha_fin`, `clases`) VALUES
(7, 'electricidad', 'cami', 1, '', '', 0, 0, '00:00:00', '00:00:00', NULL, NULL, 0),
(8, 'youtuber', 'creador de contenido', 1, '', '', 0, 0, '00:00:00', '00:00:00', NULL, NULL, 0),
(9, 'periodismo', 'deportivo', 2, 'eliseo moreno', 'presencial', 18, 50, '18:00:00', '20:00:00', '2023-11-13', '2023-11-20', 2),
(10, 'pocelana', 'manualidad', 2, 'emili', 'presencial', 7, 80, '11:00:00', '12:00:00', '2023-11-14', '2023-11-29', 2),
(11, 'mecanica', 'aprender', 1, 'leonardo', 'presencial', 16, 50, '14:00:00', '17:00:00', '2023-11-14', '2023-11-30', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `usuario_nombre` varchar(255) NOT NULL,
  `usuario_email` varchar(255) NOT NULL,
  `fecha_turno` date DEFAULT NULL,
  `hora_turno` time DEFAULT NULL,
  `telefono` int(100) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `edad` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `curso_id`, `usuario_nombre`, `usuario_email`, `fecha_turno`, `hora_turno`, `telefono`, `sexo`, `localidad`, `edad`) VALUES
(18, 7, 'anyi', 'anyi@gmail.com', NULL, NULL, 0, '', '', 0),
(19, 8, 'leito', 'leito@gmail.com', NULL, NULL, 0, '', '', 0),
(20, 9, 'jazmin', 'jaz@gmail.com', NULL, NULL, 0, '', '', 0),
(21, 9, 'rocio', 'ro@gmail.com', NULL, NULL, 0, '', '', 0),
(22, 10, 'juan perez', 'juan@gmail.com', '2023-11-14', '16:16:00', 2147483647, 'masculino', 'malvinas', 34),
(23, 10, 'leon', 'leon@gmail.com', '2023-11-14', '16:20:00', 2147483647, 'masculino', 'monte cristo', 20),
(24, 11, 'camilaaa', 'camila@gmail.com', '2023-11-14', '16:43:00', 156009879, 'femenino', 'monte cristo', 19);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
