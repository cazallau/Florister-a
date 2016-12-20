-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-12-2016 a las 12:31:01
-- Versión del servidor: 5.6.33
-- Versión de PHP: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `floristeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion_envio`
--

CREATE TABLE `direccion_envio` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `apellidos` varchar(100) NOT NULL DEFAULT '',
  `direccion` varchar(200) NOT NULL DEFAULT '',
  `cp` varchar(5) NOT NULL DEFAULT '',
  `ciudad` varchar(100) NOT NULL DEFAULT '',
  `provincia` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `direccion_envio`
--

INSERT INTO `direccion_envio` (`id`, `id_pedido`, `nombre`, `apellidos`, `direccion`, `cp`, `ciudad`, `provincia`) VALUES
(2, 3, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_pedido`
--

CREATE TABLE `linea_pedido` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_mensaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `linea_pedido`
--

INSERT INTO `linea_pedido` (`id`, `id_pedido`, `id_mensaje`) VALUES
(1, 1, 1),
(3, 3, 0),
(4, 4, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `mensaje`) VALUES
(1, '¡Felicidades!'),
(2, '¡Feliz Aniversario!'),
(3, '¡Te quiero!'),
(4, '¡Enhorabuena!'),
(7, 'Feliz Cumpleaños');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje_personalizado`
--

CREATE TABLE `mensaje_personalizado` (
  `id` int(11) NOT NULL,
  `id_linea_pedido` int(11) NOT NULL,
  `mensaje` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensaje_personalizado`
--

INSERT INTO `mensaje_personalizado` (`id`, `id_linea_pedido`, `mensaje`) VALUES
(1, 2, ' hola'),
(2, 3, ' holaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `apellidos` varchar(100) NOT NULL DEFAULT '',
  `direccion` varchar(100) NOT NULL DEFAULT '',
  `cp` varchar(100) NOT NULL DEFAULT '',
  `ciudad` varchar(100) NOT NULL DEFAULT '',
  `provincia` varchar(100) NOT NULL DEFAULT '',
  `fecha_pedido` date DEFAULT NULL,
  `numero_tarjeta` varchar(20) NOT NULL DEFAULT '',
  `tipo_tarjeta` varchar(30) NOT NULL,
  `mes_caducidad` int(11) NOT NULL DEFAULT '0',
  `año_caducidad` int(11) NOT NULL DEFAULT '0',
  `ccv` int(11) NOT NULL DEFAULT '0',
  `fecha_envio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `id_usuario`, `nombre`, `apellidos`, `direccion`, `cp`, `ciudad`, `provincia`, `fecha_pedido`, `numero_tarjeta`, `tipo_tarjeta`, `mes_caducidad`, `año_caducidad`, `ccv`, `fecha_envio`) VALUES
(1, 3, 'Antonio Jesus', 'Cazalla Ureña', 'valverde 6', '23658', 'Jamilena', '', '2016-12-19', '123456789', 'Visa', 3, 2019, 123, '2016-12-24'),
(3, 4, 'Gema', 'Beltran Moreno', 'Pilar 33', '23658', 'Jamilena', '', '2016-12-20', '', '', 0, 0, 0, '0000-00-00'),
(4, 3, 'Antonio Jesus', 'Cazalla Ureña', 'valverde 6', '23658', 'Jamilena', '', '2016-12-20', '12344', 'Master Card', 2, 2018, 123, '2016-12-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL DEFAULT '',
  `contraseña` varchar(32) NOT NULL DEFAULT '',
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `apellidos` varchar(100) NOT NULL DEFAULT '',
  `dni` varchar(9) NOT NULL DEFAULT '',
  `direccion` varchar(150) NOT NULL DEFAULT '',
  `telefono` varchar(14) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `ciudad` varchar(100) NOT NULL DEFAULT '',
  `cp` varchar(5) NOT NULL DEFAULT '',
  `provincia` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contraseña`, `nombre`, `apellidos`, `dni`, `direccion`, `telefono`, `email`, `ciudad`, `cp`, `provincia`) VALUES
(2, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', '', '', ''),
(3, 'cazallau', '1234', 'Antonio Jesus', 'Cazalla Ureña', '77366589V', 'valverde 6', '666821632', 'cazallaugmail.com', 'Jamilena', '23658', 'Jaen'),
(4, 'gema', '1234', 'Gema', 'Beltran Moreno', '1234567', 'Pilar 33', '123123112', 'gamms@gmail.com', 'Jamilena', '23658', 'Cordoba'),
(5, 'as', 'as', 'as', 'as', 'as', 'as', 'as', 'as', 'as', 'as', 'cordoba');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `direccion_envio`
--
ALTER TABLE `direccion_envio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `linea_pedido`
--
ALTER TABLE `linea_pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensaje_personalizado`
--
ALTER TABLE `mensaje_personalizado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `direccion_envio`
--
ALTER TABLE `direccion_envio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `linea_pedido`
--
ALTER TABLE `linea_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `mensaje_personalizado`
--
ALTER TABLE `mensaje_personalizado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
