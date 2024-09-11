-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2024 a las 00:16:00
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpeespecial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `ID_Marcas` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID_Productos` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` varchar(45) NOT NULL,
  `Precio` float NOT NULL,
  `Categoria` varchar(45) NOT NULL,
  `ID_Marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`ID_Marcas`),
  ADD KEY `ID_Marcas` (`ID_Marcas`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_Productos`),
  ADD KEY `ID_Productos` (`ID_Productos`),
  ADD KEY `ID_Marca` (`ID_Marca`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `ID_Marcas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_Productos` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`ID_Marca`) REFERENCES `marcas` (`ID_Marcas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
