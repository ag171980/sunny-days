-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2020 a las 19:28:44
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sunnyday`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(255) NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `asunto` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `mensaje` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `email`, `asunto`, `mensaje`) VALUES
(1, 'ag171980@gmail.com', 'asddsadas', 'asadsdsadsa'),
(2, 'maria@gmail.com', 'hola soy maria y este es el asunto', 'este es el mensaje de maria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(255) NOT NULL,
  `foto_producto` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_producto` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion_producto` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `precio_producto` int(255) NOT NULL,
  `stock_producto` int(255) NOT NULL,
  `oferta_producto` tinyint(1) NOT NULL,
  `talles_producto` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `foto_producto`, `nombre_producto`, `descripcion_producto`, `precio_producto`, `stock_producto`, `oferta_producto`, `talles_producto`) VALUES
(4, 'foto4.jpg', 'ZAPATILLAS URBANAS', 'SÚPER CANCHERAS', 3500, 0, 0, 37),
(5, 'foto2.png', 'BOTAS DE LLUVIA NEGRAS', 'QUE LA LLUVIA NO TE FRENE PONELE COLOR A LOS DÍAS DE LLUVIA', 5000, 300, 1, 38),
(6, 'foto9.jpg', 'BOTAS DE LLUVIA MARRONES', 'QUE LA LLUVIA NO TE FRENE PONELE COLOR A LOS DÍAS DE LLUVIA', 5000, 300, 1, 40),
(7, 'foto.jpg', 'PANTUBOTAS MARRONES', 'SÚPER CALENTITAS Y LIVIANAS IDEALES PARA ESTE INVIERNO', 3000, 1000, 0, 39),
(8, 'foto6.jpg', 'PANTUBOTAS NEGRAS', 'SÚPER CALENTITAS Y LIVIANAS IDEALES PARA ESTE INVIERNO', 3000, 500, 0, 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talles`
--

CREATE TABLE `talles` (
  `id_talles` int(255) NOT NULL,
  `id_producto` int(255) NOT NULL,
  `talles` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `talles`
--

INSERT INTO `talles` (`id_talles`, `id_producto`, `talles`) VALUES
(1, 1, 35),
(2, 1, 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(255) NOT NULL,
  `nombre_usuario` text COLLATE utf8_spanish2_ci NOT NULL,
  `apellido_usuario` text COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_postal` int(100) NOT NULL,
  `telefono` int(20) NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `direccion`, `codigo_postal`, `telefono`, `email`, `pass`) VALUES
(11, 'Alexis Nicolas', 'Gutierrez', 'Bartolome Mitre 3832.PB A', 1201, 1123892614, 'ag171980@gmail.com', '$2y$10$.yXtz.GCtVxzDzrit8C9w.T9lrWzd/I1j9MIzYPObrLvxNZxDYxwy');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
