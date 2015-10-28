-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-10-2015 a las 07:24:33
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `airbook`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE IF NOT EXISTS `archivo` (
  `id_archivo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` datetime NOT NULL,
  `ruta` text NOT NULL,
  `punteo` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`id_archivo`, `id_usuario`, `nombre`, `descripcion`, `fecha`, `ruta`, `punteo`) VALUES
(1, 3, 'Arte de pruebas unitarias', 'Libro utilizado en analsis y diseno 1.', '0000-00-00 00:00:00', 'uploads/f2d7190cb876f85ad999a2ee0fbd27271442078796.pdf', 3),
(2, 3, 'Demostracion', 'Descripcion de nuestra demostracion', '0000-00-00 00:00:00', 'uploads/23bfa8facf25e7675f2dcb89fdfd012b1443138489.pdf', 0),
(3, 3, 'Prueba de concepto, pruebas funcionales', 'Esta es una prueba de concepto de pruebas funcionales sobre el sistema airbook', '0000-00-00 00:00:00', 'uploads/ae464280e83139d35a9dbbe5880854aa1444742432.pdf', 0),
(4, 3, 'Prueba de concepto, pruebas funcionales', 'Esta es una prueba de concepto de pruebas funcionales sobre el sistema airbook', '0000-00-00 00:00:00', 'uploads/ae464280e83139d35a9dbbe5880854aa1444943910.pdf', 0),
(5, 3, 'Prueba de concepto, pruebas funcionales', 'Esta es una prueba de concepto de pruebas funcionales sobre el sistema airbook', '0000-00-00 00:00:00', 'uploads/ae464280e83139d35a9dbbe5880854aa1444951274.pdf', 0),
(6, 3, 'Prueba de concepto, pruebas funcionales', 'Esta es una prueba de concepto de pruebas funcionales sobre el sistema airbook', '0000-00-00 00:00:00', 'uploads/ae464280e83139d35a9dbbe5880854aa1444952244.pdf', 0),
(7, 3, 'Balanza economica', 'Libro de balanza', '0000-00-00 00:00:00', 'uploads/c6d15b5da1d8b4bbf613b3ca70671c321444952378.pdf', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo_categoria`
--

CREATE TABLE IF NOT EXISTS `archivo_categoria` (
  `id_archivo` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `archivo_categoria`
--

INSERT INTO `archivo_categoria` (`id_archivo`, `id_categoria`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`) VALUES
(1, 'Biologia', 'Es la ciencia que tiene como objeto de estudio a los seres vivos.'),
(2, 'Matemática', 'Es una ciencia formal que, partiendo de axiomas y siguiendo el razonamiento lógico, estudia las propiedades y relaciones entre entidades abstractas como números, figuras geométricas o símbolos.'),
(3, 'Química', 'Es la ciencia que estudia tanto la composición, estructura y propiedades de la materia como los cambios que ésta experimenta durante las reacciones químicas y su relación con la energía.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `id_archivo`, `id_usuario`, `fecha`, `texto`) VALUES
(1, 1, 1, '2015-09-24 16:06:16', 'Esto es un comentario'),
(3, 1, 1, '2015-09-24 16:06:58', 'Esto es un comentario'),
(5, 1, 1, '2015-09-24 16:07:00', 'Esto es un comentario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
  `id_solicitud` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_categoria`
--

CREATE TABLE IF NOT EXISTS `solicitud_categoria` (
  `id_solicitud` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(15) NOT NULL,
  `valoracion` float NOT NULL,
  `rol` varchar(40) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `correo`, `contrasena`, `valoracion`, `rol`, `nombre_completo`) VALUES
(1, 'luis', 'luis@gmail.com', 'luis', 4.5, 'administrador', 'Luis Fernando Yoc Avila'),
(2, 'yisus', 'yisuskorea@gmail.com', 'yisus777', 4, 'administrador', 'Cristopher O''brain'),
(3, 'clon', 'clontono@hotmail.com', 'lolicon', 3.9, 'autor', 'Antonio Mejia'),
(4, 'jason.hc', 'jas.smally@gmail.com', 'asdf', 0, 'autor', 'Jason Hernandez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion_archivo`
--

CREATE TABLE IF NOT EXISTS `valoracion_archivo` (
  `id_usuario` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `puntos` float NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `valoracion_archivo`
--

INSERT INTO `valoracion_archivo` (`id_usuario`, `id_archivo`, `puntos`, `id`) VALUES
(1, 1, 3, 1);

--
-- Disparadores `valoracion_archivo`
--
DELIMITER $$
CREATE TRIGGER `ranking_updater` AFTER INSERT ON `valoracion_archivo`
 FOR EACH ROW UPDATE archivo SET archivo.punteo = (SELECT AVG(puntos) FROM valoracion_archivo WHERE valoracion_archivo.id_archivo = (SELECT id FROM valoracion_archivo ORDER BY id DESC LIMIT 1)) WHERE archivo.punteo = (SELECT id FROM valoracion_archivo ORDER BY id DESC LIMIT 1)
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`id_archivo`),
  ADD KEY `fk_archivo` (`id_usuario`);

--
-- Indices de la tabla `archivo_categoria`
--
ALTER TABLE `archivo_categoria`
  ADD PRIMARY KEY (`id_archivo`,`id_categoria`),
  ADD KEY `fk2_archivo_categoria` (`id_categoria`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`,`id_archivo`,`id_usuario`),
  ADD KEY `fk1_comentario` (`id_archivo`),
  ADD KEY `fk2_comentario` (`id_usuario`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `fk_solicitud` (`id_usuario`);

--
-- Indices de la tabla `solicitud_categoria`
--
ALTER TABLE `solicitud_categoria`
  ADD PRIMARY KEY (`id_solicitud`,`id_categoria`),
  ADD KEY `fk2_solicitud_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `valoracion_archivo`
--
ALTER TABLE `valoracion_archivo`
  ADD PRIMARY KEY (`id_usuario`,`id_archivo`),
  ADD KEY `fk2_valoracion_archivo` (`id_archivo`),
  ADD KEY `last_inserted` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `valoracion_archivo`
--
ALTER TABLE `valoracion_archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD CONSTRAINT `fk_archivo` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `archivo_categoria`
--
ALTER TABLE `archivo_categoria`
  ADD CONSTRAINT `fk1_archivo_categoria` FOREIGN KEY (`id_archivo`) REFERENCES `archivo` (`id_archivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk2_archivo_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk1_comentario` FOREIGN KEY (`id_archivo`) REFERENCES `archivo` (`id_archivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk2_comentario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_solicitud` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitud_categoria`
--
ALTER TABLE `solicitud_categoria`
  ADD CONSTRAINT `fk1_solicitud_categoria` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id_solicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk2_solicitud_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `valoracion_archivo`
--
ALTER TABLE `valoracion_archivo`
  ADD CONSTRAINT `fk1_valoracion_archivo` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk2_valoracion_archivo` FOREIGN KEY (`id_archivo`) REFERENCES `archivo` (`id_archivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
