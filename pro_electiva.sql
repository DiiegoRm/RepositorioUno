-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2018 a las 23:29:43
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
(3, 1, 'Actividad 3'),
(6, 7, 'ACCC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pro_curso`
--

CREATE TABLE `pro_curso` (
  `id` int(10) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_profesor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pro_curso`
--

INSERT INTO `pro_curso` (`id`, `nombre`, `id_profesor`) VALUES
(1, 'Matematica 1', 2),
(2, 'Sociales 2', 5),
(3, 'Anal 2', 5),
(4, 'Anal 2', 5),
(5, 'Anal 2', 2),
(6, 'chupadas', 2),
(7, 'Curso numero UNO ', 2),
(8, 'CURSO FINAL', 2);

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
-- Estructura de tabla para la tabla `pro_documento`
--

CREATE TABLE `pro_documento` (
  `id` int(10) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pro_documento`
--

INSERT INTO `pro_documento` (`id`, `nombre`) VALUES
(1, 'Cedula de Ciudadania'),
(2, 'Documento de identidad');

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
(2, 2, 1, 3),
(3, 3, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pro_nota_comentario`
--

CREATE TABLE `pro_nota_comentario` (
  `id` int(10) NOT NULL,
  `id_nota` int(10) NOT NULL,
  `comentario` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `visto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
-- Estructura de tabla para la tabla `pro_relacion_parental`
--

CREATE TABLE `pro_relacion_parental` (
  `id` int(10) NOT NULL,
  `id_acudiente` int(10) NOT NULL,
  `id_estudiante` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pro_usuario`
--

CREATE TABLE `pro_usuario` (
  `id` int(10) NOT NULL,
  `usuario` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_perfil` int(10) NOT NULL,
  `id_tipo` int(10) NOT NULL,
  `numero_doc` int(10) NOT NULL,
  `nombre_uno` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_dos` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_uno` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_dos` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(10) NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pro_usuario`
--

INSERT INTO `pro_usuario` (`id`, `usuario`, `password`, `id_perfil`, `id_tipo`, `numero_doc`, `nombre_uno`, `nombre_dos`, `apellido_uno`, `apellido_dos`, `telefono`, `direccion`) VALUES
(1, 'estudiante1', '12345', 2, 2, 123456, 'Estudiante', '', 'Uno', '', 123456, 'Calle 123 n 87 65'),
(2, 'profesor1', '12345', 1, 1, 123457, 'Profesor', '', 'Uno', '', 123456, 'Calle 123 n 87 65'),
(3, 'acudiente1', '12345', 3, 1, 123458, 'Acudiente', '', 'Uno', '', 123456, 'Calle 123 n 87 65'),
(4, 'administrativo1', '12345', 4, 1, 123459, 'Administrativo', '', 'Uno', '', 123456, 'Calle 123 n 87 65'),
(5, 'profesor 2', '12345', 1, 1, 123450, 'Profesor', '', 'Dos', '', 123456, 'Calle 123 n 87 65'),
(6, 'profesorfinal', '12345', 1, 1, 55555555, 'Profesor ', '', 'Final', '', 12345, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pro_actividad`
--
ALTER TABLE `pro_actividad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `pro_curso`
--
ALTER TABLE `pro_curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_profesor` (`id_profesor`);

--
-- Indices de la tabla `pro_detalle_curso`
--
ALTER TABLE `pro_detalle_curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_estudiante` (`id_estudiante`);

--
-- Indices de la tabla `pro_documento`
--
ALTER TABLE `pro_documento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pro_nota`
--
ALTER TABLE `pro_nota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `id_estudiante` (`id_estudiante`);

--
-- Indices de la tabla `pro_nota_comentario`
--
ALTER TABLE `pro_nota_comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nota` (`id_nota`);

--
-- Indices de la tabla `pro_perfil`
--
ALTER TABLE `pro_perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pro_relacion_parental`
--
ALTER TABLE `pro_relacion_parental`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_acudiente` (`id_acudiente`),
  ADD KEY `id_estudiante` (`id_estudiante`);

--
-- Indices de la tabla `pro_usuario`
--
ALTER TABLE `pro_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_perfil` (`id_perfil`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pro_actividad`
--
ALTER TABLE `pro_actividad`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pro_curso`
--
ALTER TABLE `pro_curso`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pro_detalle_curso`
--
ALTER TABLE `pro_detalle_curso`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pro_documento`
--
ALTER TABLE `pro_documento`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pro_nota`
--
ALTER TABLE `pro_nota`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pro_nota_comentario`
--
ALTER TABLE `pro_nota_comentario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pro_perfil`
--
ALTER TABLE `pro_perfil`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pro_relacion_parental`
--
ALTER TABLE `pro_relacion_parental`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pro_usuario`
--
ALTER TABLE `pro_usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pro_actividad`
--
ALTER TABLE `pro_actividad`
  ADD CONSTRAINT `pro_actividad_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `pro_curso` (`id`);

--
-- Filtros para la tabla `pro_curso`
--
ALTER TABLE `pro_curso`
  ADD CONSTRAINT `pro_curso_ibfk_1` FOREIGN KEY (`id_profesor`) REFERENCES `pro_usuario` (`id`);

--
-- Filtros para la tabla `pro_detalle_curso`
--
ALTER TABLE `pro_detalle_curso`
  ADD CONSTRAINT `pro_detalle_curso_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `pro_curso` (`id`),
  ADD CONSTRAINT `pro_detalle_curso_ibfk_2` FOREIGN KEY (`id_estudiante`) REFERENCES `pro_usuario` (`id`);

--
-- Filtros para la tabla `pro_nota`
--
ALTER TABLE `pro_nota`
  ADD CONSTRAINT `pro_nota_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `pro_actividad` (`id`),
  ADD CONSTRAINT `pro_nota_ibfk_2` FOREIGN KEY (`id_estudiante`) REFERENCES `pro_usuario` (`id`);

--
-- Filtros para la tabla `pro_nota_comentario`
--
ALTER TABLE `pro_nota_comentario`
  ADD CONSTRAINT `pro_nota_comentario_ibfk_1` FOREIGN KEY (`id_nota`) REFERENCES `pro_nota` (`id`);

--
-- Filtros para la tabla `pro_relacion_parental`
--
ALTER TABLE `pro_relacion_parental`
  ADD CONSTRAINT `pro_relacion_parental_ibfk_1` FOREIGN KEY (`id_acudiente`) REFERENCES `pro_usuario` (`id`),
  ADD CONSTRAINT `pro_relacion_parental_ibfk_2` FOREIGN KEY (`id_estudiante`) REFERENCES `pro_usuario` (`id`);

--
-- Filtros para la tabla `pro_usuario`
--
ALTER TABLE `pro_usuario`
  ADD CONSTRAINT `pro_usuario_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `pro_perfil` (`id`),
  ADD CONSTRAINT `pro_usuario_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `pro_documento` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
