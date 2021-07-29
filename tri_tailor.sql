-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2021 a las 13:26:31
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tri_tailor`
--
CREATE DATABASE IF NOT EXISTS `tri_tailor` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tri_tailor`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accion`
--

CREATE TABLE `accion` (
  `ID_ACCION` int(2) NOT NULL,
  `NOM_ACCION` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `accion`
--

INSERT INTO `accion` (`ID_ACCION`, `NOM_ACCION`) VALUES
(1, 'DEVOLUCION'),
(2, 'PRESTAMOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accion_realizada`
--

CREATE TABLE `accion_realizada` (
  `ID_ACCION_REALIZADA` int(11) UNSIGNED NOT NULL,
  `DOCU_ADMI` int(20) UNSIGNED NOT NULL,
  `DOCU_INSTRUCTOR` int(20) UNSIGNED NOT NULL,
  `FECHA` date NOT NULL,
  `HORA` time NOT NULL,
  `ID_ESTADO` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `accion_realizada`
--

INSERT INTO `accion_realizada` (`ID_ACCION_REALIZADA`, `DOCU_ADMI`, `DOCU_INSTRUCTOR`, `FECHA`, `HORA`, `ID_ESTADO`) VALUES
(8, 1, 1000123123, '2021-07-28', '11:55:40', 8),
(9, 1, 1000123123, '2021-07-28', '14:00:50', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

CREATE TABLE `bodega` (
  `ID_BODEGA` int(11) NOT NULL,
  `NOM_BODEGA` varchar(30) NOT NULL,
  `ID_TIP_BODEGA` int(2) NOT NULL,
  `ID_ESTADO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bodega`
--

INSERT INTO `bodega` (`ID_BODEGA`, `NOM_BODEGA`, `ID_TIP_BODEGA`, `ID_ESTADO`) VALUES
(0, 'Valor temporal', 2, 2),
(1, 'Material', 1, 1),
(2, 'Insumos', 2, 2),
(3, 'Maquinaria', 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `ID_COLOR` int(11) NOT NULL,
  `NOM_COLOR` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`ID_COLOR`, `NOM_COLOR`) VALUES
(1, 'VERDE'),
(2, 'BLANCO'),
(3, 'AZUL'),
(4, 'ROJO'),
(5, 'Blanco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_accion`
--

CREATE TABLE `detalle_accion` (
  `ID_DETA_ACCION` int(11) NOT NULL,
  `ID_ACCION_REALIZADA` int(11) UNSIGNED NOT NULL,
  `ID_ACCION` int(2) NOT NULL,
  `ID_INSUMO` int(11) NOT NULL,
  `ID_MATERIAL_TEXTIL` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `ID_BODEGA` int(11) NOT NULL,
  `CANTIDAD_TOTAL` int(11) NOT NULL,
  `OBSERVACIONES` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_accion`
--

INSERT INTO `detalle_accion` (`ID_DETA_ACCION`, `ID_ACCION_REALIZADA`, `ID_ACCION`, `ID_INSUMO`, `ID_MATERIAL_TEXTIL`, `CANTIDAD`, `ID_BODEGA`, `CANTIDAD_TOTAL`, `OBSERVACIONES`) VALUES
(10, 8, 2, 7, 1, 10, 1, 97, NULL),
(11, 9, 2, 7, 5, 12, 1, 97, NULL),
(12, 9, 2, 2, 7, 10, 2, 134, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ingreso`
--

CREATE TABLE `detalle_ingreso` (
  `ID_DETA_INGRESO` int(11) NOT NULL,
  `ID_INGRE_MATERIAL` int(11) UNSIGNED NOT NULL,
  `ID_TIP_INGRESO` int(11) NOT NULL,
  `ID_INSUMO` int(11) NOT NULL,
  `ID_MATERIAL_TEXTIL` int(11) NOT NULL,
  `SERIAL_MAQUINARIA` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `ID_BODEGA` int(11) NOT NULL,
  `CANTIDAD_TOTAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_ingreso`
--

INSERT INTO `detalle_ingreso` (`ID_DETA_INGRESO`, `ID_INGRE_MATERIAL`, `ID_TIP_INGRESO`, `ID_INSUMO`, `ID_MATERIAL_TEXTIL`, `SERIAL_MAQUINARIA`, `CANTIDAD`, `ID_BODEGA`, `CANTIDAD_TOTAL`) VALUES
(1, 1, 1, 7, 1, 0, 11, 1, 11),
(2, 2, 1, 7, 1, 0, 11, 1, 22),
(3, 2, 2, 2, 7, 0, 23, 2, 23),
(4, 3, 2, 2, 7, 0, 31, 2, 54),
(5, 3, 3, 7, 7, 334, 21, 3, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `NIT_DOC` int(18) UNSIGNED NOT NULL,
  `NOM_EMPLEADO` varchar(60) NOT NULL,
  `ID_TIP_USU` int(2) NOT NULL,
  `NOM_EMPRESA` varchar(60) NOT NULL,
  `TELEFONO` int(11) UNSIGNED NOT NULL,
  `COR_EMPR` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`NIT_DOC`, `NOM_EMPLEADO`, `ID_TIP_USU`, `NOM_EMPRESA`, `TELEFONO`, `COR_EMPR`) VALUES
(10076231, 'Rappi Junior', 3, 'Juan david', 3141231233, 'rappijun@gmail.com'),
(100092313, 'Guanajuato', 3, 'Holman Herrera', 2789123123, 'guanajuato32@gmail.c');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `ID_ESTADO` int(2) NOT NULL,
  `NOM_ESTADO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`ID_ESTADO`, `NOM_ESTADO`) VALUES
(1, 'ACTIVO'),
(2, 'INACTIVO'),
(3, 'ACEPTADO'),
(4, 'DENEGADO'),
(5, 'BUENO'),
(6, 'EN REPARACION '),
(7, 'MAL ESTADO'),
(8, 'PENDIENTE'),
(9, 'FINALIZADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `NUM_FICHA` int(11) NOT NULL,
  `ID_FORMACION` int(2) NOT NULL,
  `ID_JORNADA` int(2) NOT NULL,
  `DOCUMENTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion`
--

CREATE TABLE `formacion` (
  `ID_FORMACION` int(2) NOT NULL,
  `NOM_FORMACION` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_material`
--

CREATE TABLE `ingreso_material` (
  `ID_INGRE_MATERIAL` int(11) UNSIGNED NOT NULL,
  `DOCUMENTO` int(20) UNSIGNED NOT NULL,
  `NIT_DOC` int(11) UNSIGNED NOT NULL,
  `FECHA` date NOT NULL,
  `HORA` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingreso_material`
--

INSERT INTO `ingreso_material` (`ID_INGRE_MATERIAL`, `DOCUMENTO`, `NIT_DOC`, `FECHA`, `HORA`) VALUES
(1, 1005, 100092313, '2021-07-28', '23:32:24'),
(2, 1005, 100092313, '2021-07-28', '23:32:24'),
(3, 1005, 100092313, '2021-07-28', '23:33:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo`
--

CREATE TABLE `insumo` (
  `ID_INSUMO` int(11) NOT NULL,
  `NOM_INSUMO` varchar(30) NOT NULL,
  `ID_TIP_INSUMO` int(11) NOT NULL,
  `ID_MARCA` int(11) NOT NULL,
  `ID_COLOR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `insumo`
--

INSERT INTO `insumo` (`ID_INSUMO`, `NOM_INSUMO`, `ID_TIP_INSUMO`, `ID_MARCA`, `ID_COLOR`) VALUES
(2, 'Hilo', 1, 2, 1),
(5, '1212123', 1, 3, 1),
(7, 'No existe', 2, 1, 3),
(8, 'TIJERAS PUNTA REDONDA', 2, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE `jornada` (
  `ID_JORNADA` int(2) NOT NULL,
  `NOM_JORNADA` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinaria`
--

CREATE TABLE `maquinaria` (
  `SERIAL_MAQUINARIA` int(11) NOT NULL,
  `PLACA_SENA` varchar(11) NOT NULL,
  `NOM_MAQUINARIA` varchar(30) NOT NULL,
  `ID_TIP_MAQUINARIA` int(2) NOT NULL,
  `ID_MARCA` int(11) NOT NULL,
  `ID_COLOR` int(11) NOT NULL,
  `ID_ESTADO` int(2) NOT NULL,
  `OBSERVACIONES` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `maquinaria`
--

INSERT INTO `maquinaria` (`SERIAL_MAQUINARIA`, `PLACA_SENA`, `NOM_MAQUINARIA`, `ID_TIP_MAQUINARIA`, `ID_MARCA`, `ID_COLOR`, `ID_ESTADO`, `OBSERVACIONES`) VALUES
(0, '0', '', 2, 1, 3, 2, NULL),
(334, '123213', 'ESTRONG', 1, 1, 1, 5, ''),
(1233, '123213', 'ESTROGNFER', 1, 1, 1, 5, ''),
(312213, '213123', 'ESTROGNFER', 1, 1, 1, 6, 'ADADASDADADADADADADAD'),
(1212233, '123213', 'ESTROGNFER', 1, 1, 1, 7, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `ID_MARCA` int(11) NOT NULL,
  `NOM_MARCA` varchar(30) NOT NULL,
  `ID_TIP_MARCA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`ID_MARCA`, `NOM_MARCA`, `ID_TIP_MARCA`) VALUES
(1, 'Lafayet', 1),
(2, 'Singer', 3),
(3, 'Hilos', 2),
(4, 'AAAAAAA', 1),
(5, 'Shinobis', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_textil`
--

CREATE TABLE `material_textil` (
  `ID_MATERIAL_TEXTIL` int(11) NOT NULL,
  `NOM_MATERIAL_TEXTIL` varchar(30) NOT NULL,
  `ID_TIP_MATE_TEXTIL` int(11) NOT NULL,
  `ID_MARCA` int(11) NOT NULL,
  `ID_COLOR` int(11) NOT NULL,
  `METRAJE` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `material_textil`
--

INSERT INTO `material_textil` (`ID_MATERIAL_TEXTIL`, `NOM_MATERIAL_TEXTIL`, `ID_TIP_MATE_TEXTIL`, `ID_MARCA`, `ID_COLOR`, `METRAJE`) VALUES
(1, 'werwrew', 1, 1, 1, 1),
(2, 'werwrew', 1, 1, 1, 222),
(3, '1111', 2, 1, 2, 111),
(5, '11111', 3, 4, 1, 1111),
(6, 'KolorPlex200x400', 1, 1, 1, 200),
(7, 'No existe', 2, 1, 3, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_bodega`
--

CREATE TABLE `tipo_bodega` (
  `ID_TIP_BODEGA` int(2) NOT NULL,
  `NOM_TIP_BODEGA` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_bodega`
--

INSERT INTO `tipo_bodega` (`ID_TIP_BODEGA`, `NOM_TIP_BODEGA`) VALUES
(1, 'Material Textil'),
(2, 'Insumos'),
(3, 'Maquinaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `ID_TIP_DOCU` int(2) NOT NULL,
  `NOM_TIP_DOCU` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`ID_TIP_DOCU`, `NOM_TIP_DOCU`) VALUES
(1, 'CEDULA'),
(2, 'CEDULA EXTRANGERIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_ingreso`
--

CREATE TABLE `tipo_ingreso` (
  `ID_TIP_INGRESO` int(11) NOT NULL,
  `NOM_TIP_INGRESO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_ingreso`
--

INSERT INTO `tipo_ingreso` (`ID_TIP_INGRESO`, `NOM_TIP_INGRESO`) VALUES
(1, 'Material Textil'),
(2, 'Insumos'),
(3, 'Maquinaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_insumo`
--

CREATE TABLE `tipo_insumo` (
  `ID_TIP_INSUMO` int(11) NOT NULL,
  `NOM_TIP_INSUMO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_insumo`
--

INSERT INTO `tipo_insumo` (`ID_TIP_INSUMO`, `NOM_TIP_INSUMO`) VALUES
(1, 'Metal'),
(2, 'tijeras'),
(3, 'hilos'),
(16, 'AGUJAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_maquina`
--

CREATE TABLE `tipo_maquina` (
  `ID_TIP_MAQUINARIA` int(2) NOT NULL,
  `NOM_TIP_MAQUINARIA` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_maquina`
--

INSERT INTO `tipo_maquina` (`ID_TIP_MAQUINARIA`, `NOM_TIP_MAQUINARIA`) VALUES
(1, 'plana de una aguja'),
(2, 'fileteadora'),
(3, 'collarín'),
(4, 'cerradora de codo'),
(5, 'Flat Seamer'),
(6, 'botonadora'),
(7, 'ojaladora'),
(8, 'presilladora'),
(9, 'Multi-agujas'),
(10, 'pretinadora'),
(11, 'plana de dos agujas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_marca`
--

CREATE TABLE `tipo_marca` (
  `ID_TIP_MARCA` int(11) NOT NULL,
  `NOM_TIP_MARCA` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_marca`
--

INSERT INTO `tipo_marca` (`ID_TIP_MARCA`, `NOM_TIP_MARCA`) VALUES
(1, 'Material Textil'),
(2, 'Insumos'),
(3, 'Maquinaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_material_textil`
--

CREATE TABLE `tipo_material_textil` (
  `ID_TIP_MATE_TEXTIL` int(11) NOT NULL,
  `NOM_TIP_MATE_TEXTIL` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_material_textil`
--

INSERT INTO `tipo_material_textil` (`ID_TIP_MATE_TEXTIL`, `NOM_TIP_MATE_TEXTIL`) VALUES
(1, 'Kike'),
(2, 'AAA'),
(3, 'aaa'),
(4, 'OHKJK'),
(6, 'HILOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `ID_TIP_USU` int(2) NOT NULL,
  `NOM_TIP_USU` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`ID_TIP_USU`, `NOM_TIP_USU`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'INSTRUCTOR'),
(3, 'EMPRESA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `DOCUMENTO` int(20) UNSIGNED NOT NULL,
  `NOMBRE` varchar(80) NOT NULL,
  `APELLIDO` varchar(30) NOT NULL,
  `FECHA_NACIMIENTO` date NOT NULL,
  `ID_TIP_DOCU` int(2) NOT NULL,
  `ID_TIP_USU` int(2) NOT NULL,
  `CELULAR` int(11) UNSIGNED NOT NULL,
  `CORREO` varchar(30) NOT NULL,
  `FOTO` blob DEFAULT NULL,
  `CLAVE` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`DOCUMENTO`, `NOMBRE`, `APELLIDO`, `FECHA_NACIMIENTO`, `ID_TIP_DOCU`, `ID_TIP_USU`, `CELULAR`, `CORREO`, `FOTO`, `CLAVE`) VALUES
(0, '', '', '0000-00-00', 1, 1, 0, 'sadasd', NULL, ''),
(1005, 'HOLWAN DAVID', 'MONTES GUTIERREZ', '2002-02-21', 1, 1, 3120989123, 'holman@misa.co', 0x7069746f6e2e6a7067, '123'),
(1000023231, 'Kike', 'Tronco', '2000-10-24', 1, 2, 312312345, 'hdmontes59@misena.edu.co', 0x70657272696c2e6a7067, '12defined'),
(1000123123, 'Oscar', 'Llanos', '1999-06-15', 1, 2, 3224567890, 'oscarllanos1408@gmail.com', 0x61646d696e6973312e706e67, '1234'),
(1005753852, 'Ever', 'Moreno', '2000-10-24', 1, 1, 3123123231, 'ever123@misena.edu.co', 0x70616e74616c6c612070632e6a7067, 'Everandres45$'),
(1233123412, 'Andres Mauricio', 'Castrillon Castañeda ', '2021-07-14', 1, 1, 3123122312, 'andres@misena.edu.co', 0x677569646f2e706e67, 'Andre45412$');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accion`
--
ALTER TABLE `accion`
  ADD PRIMARY KEY (`ID_ACCION`);

--
-- Indices de la tabla `accion_realizada`
--
ALTER TABLE `accion_realizada`
  ADD PRIMARY KEY (`ID_ACCION_REALIZADA`),
  ADD KEY `DOCU_INSTRUCTOR` (`DOCU_INSTRUCTOR`),
  ADD KEY `DOCU_ADMI` (`DOCU_ADMI`),
  ADD KEY `ID_ESTADO` (`ID_ESTADO`);

--
-- Indices de la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD PRIMARY KEY (`ID_BODEGA`),
  ADD KEY `ID_TIP_BODEGA` (`ID_TIP_BODEGA`),
  ADD KEY `ID_ESTADO` (`ID_ESTADO`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`ID_COLOR`);

--
-- Indices de la tabla `detalle_accion`
--
ALTER TABLE `detalle_accion`
  ADD PRIMARY KEY (`ID_DETA_ACCION`),
  ADD KEY `ID_ACCION` (`ID_ACCION`),
  ADD KEY `ID_INSUMO` (`ID_INSUMO`),
  ADD KEY `ID_MATERIAL_TEXTIL` (`ID_MATERIAL_TEXTIL`),
  ADD KEY `ID_BODEGA` (`ID_BODEGA`),
  ADD KEY `ID_ACCION_REALIZADA` (`ID_ACCION_REALIZADA`);

--
-- Indices de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD PRIMARY KEY (`ID_DETA_INGRESO`),
  ADD KEY `ID_INSUMO` (`ID_INSUMO`),
  ADD KEY `ID_MATERIAL_TEXTIL` (`ID_MATERIAL_TEXTIL`),
  ADD KEY `SERIAL_MAQUINARIA` (`SERIAL_MAQUINARIA`),
  ADD KEY `ID_BODEGA` (`ID_BODEGA`),
  ADD KEY `ID_TIP_INGRESO` (`ID_TIP_INGRESO`),
  ADD KEY `ID_INGRE_MATERIAL` (`ID_INGRE_MATERIAL`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`NIT_DOC`),
  ADD KEY `ID_TIP_USU` (`ID_TIP_USU`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`ID_ESTADO`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`NUM_FICHA`),
  ADD KEY `ID_FORMACION` (`ID_FORMACION`,`ID_JORNADA`),
  ADD KEY `DOCUMENTO` (`DOCUMENTO`),
  ADD KEY `ID_JORNADA` (`ID_JORNADA`);

--
-- Indices de la tabla `formacion`
--
ALTER TABLE `formacion`
  ADD PRIMARY KEY (`ID_FORMACION`);

--
-- Indices de la tabla `ingreso_material`
--
ALTER TABLE `ingreso_material`
  ADD PRIMARY KEY (`ID_INGRE_MATERIAL`),
  ADD KEY `DOCUMENTO` (`DOCUMENTO`),
  ADD KEY `NIT_DOC` (`NIT_DOC`);

--
-- Indices de la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD PRIMARY KEY (`ID_INSUMO`),
  ADD KEY `ID_TIP_INSUMO` (`ID_TIP_INSUMO`),
  ADD KEY `ID_COLOR` (`ID_COLOR`),
  ADD KEY `ID_MARCA` (`ID_MARCA`);

--
-- Indices de la tabla `jornada`
--
ALTER TABLE `jornada`
  ADD PRIMARY KEY (`ID_JORNADA`);

--
-- Indices de la tabla `maquinaria`
--
ALTER TABLE `maquinaria`
  ADD PRIMARY KEY (`SERIAL_MAQUINARIA`),
  ADD KEY `ID_TIP_MAQUINARIA` (`ID_TIP_MAQUINARIA`),
  ADD KEY `ID_MARCA` (`ID_MARCA`),
  ADD KEY `ID_COLOR` (`ID_COLOR`),
  ADD KEY `ID_ESTADO` (`ID_ESTADO`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`ID_MARCA`),
  ADD KEY `ID_TIP_MARCA` (`ID_TIP_MARCA`);

--
-- Indices de la tabla `material_textil`
--
ALTER TABLE `material_textil`
  ADD PRIMARY KEY (`ID_MATERIAL_TEXTIL`),
  ADD KEY `ID_COLOR` (`ID_COLOR`),
  ADD KEY `ID_TIP_MATE_TEXTIL` (`ID_TIP_MATE_TEXTIL`),
  ADD KEY `ID_MARCA` (`ID_MARCA`);

--
-- Indices de la tabla `tipo_bodega`
--
ALTER TABLE `tipo_bodega`
  ADD PRIMARY KEY (`ID_TIP_BODEGA`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`ID_TIP_DOCU`);

--
-- Indices de la tabla `tipo_ingreso`
--
ALTER TABLE `tipo_ingreso`
  ADD PRIMARY KEY (`ID_TIP_INGRESO`);

--
-- Indices de la tabla `tipo_insumo`
--
ALTER TABLE `tipo_insumo`
  ADD PRIMARY KEY (`ID_TIP_INSUMO`);

--
-- Indices de la tabla `tipo_maquina`
--
ALTER TABLE `tipo_maquina`
  ADD PRIMARY KEY (`ID_TIP_MAQUINARIA`);

--
-- Indices de la tabla `tipo_marca`
--
ALTER TABLE `tipo_marca`
  ADD PRIMARY KEY (`ID_TIP_MARCA`);

--
-- Indices de la tabla `tipo_material_textil`
--
ALTER TABLE `tipo_material_textil`
  ADD PRIMARY KEY (`ID_TIP_MATE_TEXTIL`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`ID_TIP_USU`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`DOCUMENTO`),
  ADD KEY `ID_TIP_DOCU` (`ID_TIP_DOCU`),
  ADD KEY `ID_TIP_USU` (`ID_TIP_USU`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accion_realizada`
--
ALTER TABLE `accion_realizada`
  MODIFY `ID_ACCION_REALIZADA` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `ID_COLOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_accion`
--
ALTER TABLE `detalle_accion`
  MODIFY `ID_DETA_ACCION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  MODIFY `ID_DETA_INGRESO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `ID_ESTADO` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `formacion`
--
ALTER TABLE `formacion`
  MODIFY `ID_FORMACION` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingreso_material`
--
ALTER TABLE `ingreso_material`
  MODIFY `ID_INGRE_MATERIAL` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `insumo`
--
ALTER TABLE `insumo`
  MODIFY `ID_INSUMO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `jornada`
--
ALTER TABLE `jornada`
  MODIFY `ID_JORNADA` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `ID_MARCA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `material_textil`
--
ALTER TABLE `material_textil`
  MODIFY `ID_MATERIAL_TEXTIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_bodega`
--
ALTER TABLE `tipo_bodega`
  MODIFY `ID_TIP_BODEGA` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `ID_TIP_DOCU` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_ingreso`
--
ALTER TABLE `tipo_ingreso`
  MODIFY `ID_TIP_INGRESO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_insumo`
--
ALTER TABLE `tipo_insumo`
  MODIFY `ID_TIP_INSUMO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tipo_maquina`
--
ALTER TABLE `tipo_maquina`
  MODIFY `ID_TIP_MAQUINARIA` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipo_marca`
--
ALTER TABLE `tipo_marca`
  MODIFY `ID_TIP_MARCA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_material_textil`
--
ALTER TABLE `tipo_material_textil`
  MODIFY `ID_TIP_MATE_TEXTIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `ID_TIP_USU` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accion_realizada`
--
ALTER TABLE `accion_realizada`
  ADD CONSTRAINT `accion_realizada_ibfk_2` FOREIGN KEY (`DOCU_INSTRUCTOR`) REFERENCES `usuario` (`DOCUMENTO`),
  ADD CONSTRAINT `accion_realizada_ibfk_3` FOREIGN KEY (`ID_ESTADO`) REFERENCES `estado` (`ID_ESTADO`);

--
-- Filtros para la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD CONSTRAINT `bodega_ibfk_1` FOREIGN KEY (`ID_TIP_BODEGA`) REFERENCES `tipo_bodega` (`ID_TIP_BODEGA`),
  ADD CONSTRAINT `bodega_ibfk_2` FOREIGN KEY (`ID_ESTADO`) REFERENCES `estado` (`ID_ESTADO`);

--
-- Filtros para la tabla `detalle_accion`
--
ALTER TABLE `detalle_accion`
  ADD CONSTRAINT `detalle_accion_ibfk_2` FOREIGN KEY (`ID_ACCION`) REFERENCES `accion` (`ID_ACCION`),
  ADD CONSTRAINT `detalle_accion_ibfk_5` FOREIGN KEY (`ID_BODEGA`) REFERENCES `bodega` (`ID_BODEGA`),
  ADD CONSTRAINT `detalle_accion_ibfk_6` FOREIGN KEY (`ID_ACCION_REALIZADA`) REFERENCES `accion_realizada` (`ID_ACCION_REALIZADA`),
  ADD CONSTRAINT `detalle_accion_ibfk_7` FOREIGN KEY (`ID_INSUMO`) REFERENCES `insumo` (`ID_INSUMO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_accion_ibfk_8` FOREIGN KEY (`ID_MATERIAL_TEXTIL`) REFERENCES `material_textil` (`ID_MATERIAL_TEXTIL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD CONSTRAINT `detalle_ingreso_ibfk_4` FOREIGN KEY (`ID_BODEGA`) REFERENCES `bodega` (`ID_BODEGA`),
  ADD CONSTRAINT `detalle_ingreso_ibfk_5` FOREIGN KEY (`SERIAL_MAQUINARIA`) REFERENCES `maquinaria` (`SERIAL_MAQUINARIA`),
  ADD CONSTRAINT `detalle_ingreso_ibfk_6` FOREIGN KEY (`ID_TIP_INGRESO`) REFERENCES `tipo_ingreso` (`ID_TIP_INGRESO`),
  ADD CONSTRAINT `detalle_ingreso_ibfk_7` FOREIGN KEY (`ID_INGRE_MATERIAL`) REFERENCES `ingreso_material` (`ID_INGRE_MATERIAL`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_ingreso_ibfk_8` FOREIGN KEY (`ID_INSUMO`) REFERENCES `insumo` (`ID_INSUMO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_ingreso_ibfk_9` FOREIGN KEY (`ID_MATERIAL_TEXTIL`) REFERENCES `material_textil` (`ID_MATERIAL_TEXTIL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`ID_TIP_USU`) REFERENCES `tipo_usuario` (`ID_TIP_USU`);

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `ficha_ibfk_1` FOREIGN KEY (`ID_FORMACION`) REFERENCES `formacion` (`ID_FORMACION`),
  ADD CONSTRAINT `ficha_ibfk_2` FOREIGN KEY (`ID_JORNADA`) REFERENCES `jornada` (`ID_JORNADA`);

--
-- Filtros para la tabla `ingreso_material`
--
ALTER TABLE `ingreso_material`
  ADD CONSTRAINT `ingreso_material_ibfk_1` FOREIGN KEY (`DOCUMENTO`) REFERENCES `usuario` (`DOCUMENTO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingreso_material_ibfk_2` FOREIGN KEY (`NIT_DOC`) REFERENCES `empresa` (`NIT_DOC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD CONSTRAINT `insumo_ibfk_1` FOREIGN KEY (`ID_TIP_INSUMO`) REFERENCES `tipo_insumo` (`ID_TIP_INSUMO`),
  ADD CONSTRAINT `insumo_ibfk_2` FOREIGN KEY (`ID_COLOR`) REFERENCES `color` (`ID_COLOR`),
  ADD CONSTRAINT `insumo_ibfk_3` FOREIGN KEY (`ID_MARCA`) REFERENCES `marca` (`ID_MARCA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `maquinaria`
--
ALTER TABLE `maquinaria`
  ADD CONSTRAINT `maquinaria_ibfk_1` FOREIGN KEY (`ID_TIP_MAQUINARIA`) REFERENCES `tipo_maquina` (`ID_TIP_MAQUINARIA`),
  ADD CONSTRAINT `maquinaria_ibfk_3` FOREIGN KEY (`ID_COLOR`) REFERENCES `color` (`ID_COLOR`),
  ADD CONSTRAINT `maquinaria_ibfk_4` FOREIGN KEY (`ID_ESTADO`) REFERENCES `estado` (`ID_ESTADO`),
  ADD CONSTRAINT `maquinaria_ibfk_5` FOREIGN KEY (`ID_MARCA`) REFERENCES `marca` (`ID_MARCA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `marca`
--
ALTER TABLE `marca`
  ADD CONSTRAINT `marca_ibfk_1` FOREIGN KEY (`ID_TIP_MARCA`) REFERENCES `tipo_marca` (`ID_TIP_MARCA`);

--
-- Filtros para la tabla `material_textil`
--
ALTER TABLE `material_textil`
  ADD CONSTRAINT `material_textil_ibfk_1` FOREIGN KEY (`ID_COLOR`) REFERENCES `color` (`ID_COLOR`),
  ADD CONSTRAINT `material_textil_ibfk_2` FOREIGN KEY (`ID_TIP_MATE_TEXTIL`) REFERENCES `tipo_material_textil` (`ID_TIP_MATE_TEXTIL`),
  ADD CONSTRAINT `material_textil_ibfk_3` FOREIGN KEY (`ID_MARCA`) REFERENCES `marca` (`ID_MARCA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_TIP_DOCU`) REFERENCES `tipo_documento` (`ID_TIP_DOCU`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`ID_TIP_USU`) REFERENCES `tipo_usuario` (`ID_TIP_USU`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
