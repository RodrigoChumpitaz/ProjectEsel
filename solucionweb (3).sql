-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-08-2022 a las 05:52:44
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `solucionweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `coddetalle` int(11) NOT NULL,
  `codped` int(11) NOT NULL,
  `codpro` int(11) NOT NULL,
  `cantidadp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `codent` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `codpro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`codent`, `cantidad`, `fecha`, `codpro`) VALUES
(2, 10, '2022-08-02 15:19:59', 3),
(3, 20, '2022-08-02 15:20:52', 3),
(4, 10, '2022-08-03 16:33:16', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `codped` int(11) NOT NULL,
  `codusu` int(11) NOT NULL,
  `fecped` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  `dirusuped` varchar(50) NOT NULL,
  `telusuped` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`codped`, `codusu`, `fecped`, `estado`, `dirusuped`, `telusuped`) VALUES
(40, 29, '2022-08-04 14:16:09', 2, 'lima34', '92354324523'),
(41, 29, '2022-08-04 14:16:18', 2, 'lima34', '92354324523'),
(46, 29, '2022-08-06 20:58:09', 1, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codpro` int(11) NOT NULL,
  `nompro` varchar(50) DEFAULT NULL,
  `despro` varchar(100) DEFAULT NULL,
  `prepro` decimal(6,2) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `rutimapro` varchar(100) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codpro`, `nompro`, `despro`, `prepro`, `estado`, `rutimapro`, `cantidad`) VALUES
(1, 'Balanza para GLP', 'Diseño anti explosivo, de llenado rapido y manejo sencillo.', '1411.92', 1, '1.jpg', 10),
(2, 'Cajon de aturdimiento para Bovino', 'Cajon para aturdir ganado bovino, permite al operador el manejo eficiente', '1533.23', 1, '2.jpg', 20),
(3, 'Balanza con indicador ORION', 'Balanza de uso general, plataforma de 60 x 45 cm. fabricada en acero inoxidable', '3229.67', 2, '3.jpg', 70);

--
-- Disparadores `producto`
--
DELIMITER $$
CREATE TRIGGER `Entradaslogs` BEFORE UPDATE ON `producto` FOR EACH ROW BEGIN
	IF old.cantidad <> new.cantidad THEN BEGIN
	INSERT INTO entradas (cantidad, codpro) VALUES (concat(new.cantidad - old.cantidad), old.codpro);
	END;END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `codtipo` int(11) NOT NULL,
  `nombre_tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codusu` int(11) NOT NULL,
  `nomusu` varchar(50) DEFAULT NULL,
  `apeusu` varchar(50) DEFAULT NULL,
  `emausu` varchar(50) NOT NULL,
  `pasusu` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codusu`, `nomusu`, `apeusu`, `emausu`, `pasusu`, `estado`, `user_type`) VALUES
(12, 'Rodrigo', 'Linares', 'admin@esel.com', '0301', 1, 'admin'),
(14, 'admin', 'admin', 'admin1@esel.com', '555', 1, 'admin'),
(24, 'Carlitos', 'Linares', 'carlos03@gmail.com', '987', 1, 'cliente'),
(26, 'Luis', 'Gallardo', 'abc@gmail.com', '456', 1, 'cliente'),
(28, 'pepito', 'aguilar', 'prueba@gmail.com', '27545', 1, 'cliente'),
(29, 'pepito', 'quispe', 'example@gmail.com', 'efc5a', 1, 'cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`coddetalle`),
  ADD KEY `codped` (`codped`),
  ADD KEY `codpro` (`codpro`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`codent`),
  ADD KEY `codpro` (`codpro`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`codped`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codpro`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`codtipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codusu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `coddetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `codent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `codped` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codpro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `codtipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codusu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`codped`) REFERENCES `pedido` (`codped`),
  ADD CONSTRAINT `detallepedido_ibfk_2` FOREIGN KEY (`codpro`) REFERENCES `producto` (`codpro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
