-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2023 a las 19:01:32
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `punto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` int(11) NOT NULL,
  `nombre_cliente` varchar(50) DEFAULT NULL,
  `fecha_turno` date DEFAULT NULL,
  `hora_turno` time DEFAULT NULL,
  `telefono` int(100) DEFAULT NULL,
  `mail` varchar(30) DEFAULT NULL,
  `sexo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `nombre_cliente`, `fecha_turno`, `hora_turno`, `telefono`, `mail`, `sexo`) VALUES
(3, 'emy', '2023-10-10', '22:02:00', 0, '', ''),
(4, 'cami', '2023-10-14', '13:39:00', 0, '', ''),
(5, 'cami', '2023-10-14', '13:39:00', 0, '', ''),
(6, 'juana', '2023-10-12', '18:41:00', 0, '', ''),
(7, 'baez', '2023-10-05', '17:48:00', 0, '', ''),
(8, 'guada', '2023-10-20', '17:53:00', 0, '', ''),
(9, 'erika', '2023-10-05', '17:55:00', 0, '', ''),
(10, 'gareca', '2023-10-31', '14:16:00', 0, '', ''),
(11, 'ahah', '2023-10-19', '14:50:00', 0, '', ''),
(12, 'herrera', '2023-10-31', '14:56:00', 0, '', ''),
(13, 'emily', '2023-10-31', '14:58:00', 0, '', ''),
(14, 'camila', '2023-10-31', '15:02:00', 0, '', ''),
(15, 'gegeg', '2023-10-31', '15:04:00', 0, '', ''),
(16, 'celeste', '2023-10-18', '15:07:00', 0, '', ''),
(17, 'hdhh', '2023-10-31', '15:09:00', 0, '', ''),
(18, 'leoo', '2023-10-31', '15:13:00', 0, '', ''),
(19, 'emyyy', '2023-10-31', '15:15:00', 0, '', ''),
(20, 'emyyy', '2023-10-31', '15:15:00', 0, '', ''),
(21, 'hjssh', '2023-10-31', '15:19:00', 0, '', ''),
(22, 'jtjt', '2023-10-31', '15:48:00', 0, '', ''),
(23, 'jtjt', '2023-10-31', '15:48:00', 0, '', ''),
(24, 'hdhh', '2023-10-31', '16:05:00', 0, '', ''),
(25, 'leonardo', '2023-10-31', '16:25:00', 0, '', ''),
(26, 'emilia', '2023-10-31', '16:30:00', 0, '', ''),
(27, 'villarreal', '2023-10-31', '17:13:00', 0, '', ''),
(28, 'villarreal', '2023-10-31', '17:18:00', 2147483647, 'leo@gmail.com', ''),
(29, 'baigorria', '2023-10-31', '17:24:00', 2147483647, 'emy@gmail.com', ''),
(30, 'leo', '2023-10-31', '17:31:00', 2147483647, 'emy@gmail.com', ''),
(31, 'cami', '2023-10-31', '17:41:00', 2147483647, 'leo@gmail.com', ''),
(32, 'quispe', '2023-10-31', '17:45:00', NULL, NULL, ''),
(33, 'camilooo', '2023-10-31', '17:48:00', NULL, NULL, ''),
(34, 'camila allende', '2023-11-01', '14:12:00', 2147483647, 'cami@gmail.com', ''),
(35, 'camila allende', '2023-11-01', '14:12:00', 153886298, 'cami@gmail.com', ''),
(36, 'leonardo villarreal', '2023-11-01', '14:34:00', 155998678, 'leito@gmail.com', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
