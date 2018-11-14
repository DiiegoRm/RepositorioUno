-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2018 a las 06:30:14
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pro_electiva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pro_actividad`
--

CREATE TABLE `pro_actividad` (
  `id` int(10) NOT NULL,
  `id_curso` int(10) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pro_actividad`
--

INSERT INTO `pro_actividad` (`id`, `id_curso`, `nombre`) VALUES
(1, 1, 'Actividad Uno'),
(2, 1, 'Actividad 2'),
(3, 1, 'Actividad 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pro_curso`
--

CREATE TABLE `pro_curso` (
  `id` int(10) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_profesor` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pro_curso`
--

INSERT INTO `pro_curso` (`id`, `nombre`, `id_profesor`) VALUES
(1, 'Matematica 1', '2'),
(2, 'Sociales 2', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pro_detalle_curso`
--

CREATE TABLE `pro_detalle_curso` (
  `id` int(10) NOT NULL,
  `id_curso` int(10) NOT NULL,
  `id_estudiante` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pro_detalle_curso`
--

INSERT INTO `pro_detalle_curso` (`id`, `id_curso`, `id_estudiante`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pro_nota`
--

CREATE TABLE `pro_nota` (
  `id` int(10) NOT NULL,
  `id_actividad` int(10) NOT NULL,
  `id_estudiante` int(10) NOT NULL,
  `nota` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pro_nota`
--

INSERT INTO `pro_nota` (`id`, `id_actividad`, `id_estudiante`, `nota`) VALUES
(1, 1, 1, 5),
(2, 2, 1, 5),
(3, 3, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pro_perfil`
--

CREATE TABLE `pro_perfil` (
  `id` int(10) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pro_perfil`
--

INSERT INTO `pro_perfil` (`id`, `nombre`) VALUES
(1, 'Profesor'),
(2, 'Estudiante'),
(3, 'Acudiente'),
(4, 'Administrativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pro_usuario`
--

CREATE TABLE `pro_usuario` (
  `id` int(10) NOT NULL,
  `usuario` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_perfil` int(10) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pro_usuario`
--

INSERT INTO `pro_usuario` (`id`, `usuario`, `password`, `id_perfil`, `nombre`) VALUES
(1, 'estudiante1', '12345', 2, 'estudiante1'),
(2, 'profesor1', '12345', 1, ''),
(3, 'acudiente1', '12345', 3, ''),
(4, 'administrativo1', '12345', 4, ''),
(5, 'profesor 2', '12345', 1, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pro_actividad`
--
ALTER TABLE `pro_actividad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pro_curso`
--
ALTER TABLE `pro_curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pro_detalle_curso`
--
ALTER TABLE `pro_detalle_curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pro_nota`
--
ALTER TABLE `pro_nota`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pro_perfil`
--
ALTER TABLE `pro_perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pro_usuario`
--
ALTER TABLE `pro_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pro_actividad`
--
ALTER TABLE `pro_actividad`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pro_curso`
--
ALTER TABLE `pro_curso`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pro_detalle_curso`
--
ALTER TABLE `pro_detalle_curso`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pro_nota`
--
ALTER TABLE `pro_nota`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pro_perfil`
--
ALTER TABLE `pro_perfil`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pro_usuario`
--
ALTER TABLE `pro_usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
