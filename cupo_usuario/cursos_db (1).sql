-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2023 a las 19:52:40
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
(9, 'periodismo', 'deportivo', 2, 'eliseo moreno', 'presencial', 18, 50, '18:00:00', '20:00:00', '2023-11-13', '2023-11-20', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `usuario_nombre` varchar(255) NOT NULL,
  `usuario_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `curso_id`, `usuario_nombre`, `usuario_email`) VALUES
(18, 7, 'anyi', 'anyi@gmail.com'),
(19, 8, 'leito', 'leito@gmail.com'),
(20, 9, 'jazmin', 'jaz@gmail.com'),
(21, 9, 'rocio', 'ro@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha_turno` date DEFAULT NULL,
  `hora_turno` time DEFAULT NULL,
  `telefono` int(100) DEFAULT NULL,
  `mail` varchar(30) DEFAULT NULL,
  `sexo` varchar(50) NOT NULL,
  `localidad` varchar(30) NOT NULL,
  `edad` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `nombre`, `fecha_turno`, `hora_turno`, `telefono`, `mail`, `sexo`, `localidad`, `edad`) VALUES
(1, '', '2023-11-08', '15:22:00', 2147483647, 'leo@gmail.com', 'masculino', 'monte cristo', 18),
(2, 'camila', '2023-11-08', '15:29:00', 2147483647, 'cami@gmail.com', 'femenino', 'monte cristo', 18),
(3, 'nicolas', '2023-11-09', '14:50:00', 2147483647, 'baez@gmail.com', 'masculino', 'arenales', 19);

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
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
