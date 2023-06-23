-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2023 a las 05:46:52
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consorcio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleta`
--

CREATE TABLE `boleta` (
  `nrobol` int(11) NOT NULL,
  `fecbol` date NOT NULL,
  `codcli` int(11) NOT NULL,
  `codper` int(11) NOT NULL,
  `desbol` varchar(200) NOT NULL,
  `nombol` varchar(50) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `boleta`
--

INSERT INTO `boleta` (`nrobol`, `fecbol`, `codcli`, `codper`, `desbol`, `nombol`, `idusuario`) VALUES
(1, '2023-03-24', 1, 1, 'compra al por mayor de shampo', 'juan', 1),
(3, '2023-06-09', 1, 1, 'JUBHT7F6V', 'ASS', 1),
(4, '2023-06-10', 1, 1, 'UYGFNVBTRDCN5CMV', '9UKGGTY7B6', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `codcat` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `obs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`codcat`, `nom`, `obs`) VALUES
(1, 'telefono', 'Telefono /marcas'),
(2, 'zapatillas', 'zapatillas/colores'),
(3, 'yogurts', 'yogurt/sabores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `codcli` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `ape` varchar(50) DEFAULT NULL,
  `dir` varchar(50) DEFAULT NULL,
  `fnac` date DEFAULT NULL,
  `sex` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`codcli`, `nom`, `ape`, `dir`, `fnac`, `sex`) VALUES
(1, 'samantha', 'vasques', 'calle las palmeras', '2023-03-31', 'femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleboleta`
--

CREATE TABLE `detalleboleta` (
  `coddetbol` int(11) NOT NULL,
  `codpro` int(11) NOT NULL,
  `preven` float NOT NULL,
  `canbol` int(50) NOT NULL,
  `subtbol` float NOT NULL,
  `nrobol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `detalleboleta`
--

INSERT INTO `detalleboleta` (`coddetbol`, `codpro`, `preven`, `canbol`, `subtbol`, `nrobol`) VALUES
(1, 8, 20, 321, 20, 1),
(2, 8, 23, 321, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `codper` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `ape` varchar(50) DEFAULT NULL,
  `dir` varchar(50) DEFAULT NULL,
  `fnac` date DEFAULT NULL,
  `sex` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`codper`, `nom`, `ape`, `dir`, `fnac`, `sex`) VALUES
(1, 'Raquel', 'Jimenez', 'Calle Los girasoles', '1930-05-08', 'Femenino'),
(2, 'Estrella', 'Gutierrez', 'San Juan de Lurigancho', '1996-06-05', 'Femenino'),
(3, 'Cristian', 'Vargas', 'calle Los dulces', '2000-06-05', 'Masculino'),
(5, 'faby', 'cardenas', 'los jazmines', '2000-06-05', 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codpro` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `mar` varchar(50) DEFAULT NULL,
  `pre` float DEFAULT NULL,
  `codprov` int(11) NOT NULL,
  `codcat` int(11) NOT NULL,
  `sto` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codpro`, `nom`, `mar`, `pre`, `codprov`, `codcat`, `sto`) VALUES
(7, 'redmi9', 'xiamoi', 239, 9, 3, 15),
(8, 'lg 658', 'lg', 324, 2, 1, 8),
(9, 'zapatilla23', 'adidas', 235, 7, 2, 35),
(10, 'lg 658', 'lg', 324, 2, 1, 8),
(11, 'redminote8', 'xiami', 1230, 1, 1, 27),
(12, 'yogurt vainilla', 'laive', 9.5, 9, 3, 21),
(13, 'yogurt fresa', 'gloria', 7.5, 11, 3, 58),
(15, 'jesus', 'yolo', 3000, 9, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `codprov` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `rep` varchar(50) NOT NULL,
  `tel` int(9) NOT NULL,
  `freg` date NOT NULL,
  `dir` varchar(50) NOT NULL,
  `ema` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`codprov`, `nom`, `rep`, `tel`, `freg`, `dir`, `ema`) VALUES
(1, 'xiaomi', 'jorge', 987791103, '2023-03-01', 'los jazmines', 'jorge@gmail.com'),
(2, 'LG', 'maria', 987756783, '2023-03-23', 'los jazmines 23', 'maria@gmail.com'),
(6, 'puma', 'pedro', 974536876, '2023-03-19', 'los jazmines 2354', 'pedro@gmail.com'),
(7, 'adidas', 'roberto', 324534567, '2023-03-09', 'los jazmines 24443', 'roberto@gmail.com'),
(9, 'laive', 'luis', 546378929, '2023-03-31', 'los girasoles', 'luis@gmail.com'),
(11, 'Gloria', 'Ruben', 94563784, '2023-03-02', 'Los alisos', 'Ruben@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `clave`, `descripcion`) VALUES
(1, 'jluque', '123456', 'Usuario estandar'),
(2, 'Administrador', '987654', 'Usuario admnistrador'),
(3, 'ruben', '123456789', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD PRIMARY KEY (`nrobol`),
  ADD KEY `codcli` (`codcli`),
  ADD KEY `codper` (`codper`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codcat`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codcli`);

--
-- Indices de la tabla `detalleboleta`
--
ALTER TABLE `detalleboleta`
  ADD PRIMARY KEY (`coddetbol`),
  ADD KEY `nrobol` (`nrobol`),
  ADD KEY `codpro` (`codpro`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`codper`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codpro`),
  ADD KEY `fk_producto_proveedor` (`codprov`),
  ADD KEY `codcat` (`codcat`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`codprov`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boleta`
--
ALTER TABLE `boleta`
  MODIFY `nrobol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `codcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codcli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalleboleta`
--
ALTER TABLE `detalleboleta`
  MODIFY `coddetbol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `codper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codpro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `codprov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD CONSTRAINT `boleta_ibfk_1` FOREIGN KEY (`codper`) REFERENCES `personal` (`codper`) ON UPDATE CASCADE,
  ADD CONSTRAINT `boleta_ibfk_2` FOREIGN KEY (`codcli`) REFERENCES `cliente` (`codcli`) ON UPDATE CASCADE,
  ADD CONSTRAINT `boleta_ibfk_3` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleboleta`
--
ALTER TABLE `detalleboleta`
  ADD CONSTRAINT `detalleboleta_ibfk_1` FOREIGN KEY (`codpro`) REFERENCES `producto` (`codpro`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalleboleta_ibfk_2` FOREIGN KEY (`nrobol`) REFERENCES `boleta` (`nrobol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_proveedor` FOREIGN KEY (`codprov`) REFERENCES `proveedor` (`codprov`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`codcat`) REFERENCES `categoria` (`codcat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
