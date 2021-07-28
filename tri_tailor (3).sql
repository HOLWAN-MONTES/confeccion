-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2021 a las 12:40:47
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
  `ID_ACCION_REALIZADA` int(11) NOT NULL,
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
(0, 1005, 1000123123, '2021-07-28', '02:43:55', 3);

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
(1, 'Negro'),
(2, 'color');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_accion`
--

CREATE TABLE `detalle_accion` (
  `ID_DETA_ACCION` int(11) NOT NULL,
  `ID_ACCION_REALIZADA` int(11) NOT NULL,
  `ID_ACCION` int(2) NOT NULL,
  `ID_INSUMO` int(11) NOT NULL,
  `ID_MATERIAL_TEXTIL` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `ID_BODEGA` int(11) NOT NULL,
  `CANTIDAD_TOTAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_accion`
--

INSERT INTO `detalle_accion` (`ID_DETA_ACCION`, `ID_ACCION_REALIZADA`, `ID_ACCION`, `ID_INSUMO`, `ID_MATERIAL_TEXTIL`, `CANTIDAD`, `ID_BODEGA`, `CANTIDAD_TOTAL`) VALUES
(2, 0, 2, 2, 7, 12, 1, 108);

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
(26, 50, 2, 2, 7, 0, 23, 1, 0),
(27, 51, 2, 2, 7, 0, 23, 2, 46),
(28, 52, 2, 2, 7, 0, 23, 2, 69),
(29, 53, 3, 7, 7, 1233, 32, 3, 32),
(30, 54, 1, 7, 6, 0, 32, 1, 32),
(31, 54, 1, 7, 2, 0, 33, 1, 65),
(32, 54, 1, 7, 3, 0, 32, 1, 97),
(33, 55, 2, 2, 7, 0, 32, 2, 101),
(34, 55, 2, 5, 7, 0, 33, 2, 134),
(35, 56, 3, 7, 7, 334, 32, 3, 64),
(36, 56, 3, 7, 7, 1212233, 33, 3, 97),
(37, 57, 3, 7, 7, 334, 323, 3, 420),
(38, 57, 3, 7, 7, 1212233, 33, 3, 453);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `NIT_DOC` int(11) NOT NULL,
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
(1000213, 'Ecomoda', 3, 'Persona Juridica', 2709890, 'ecomoda@mis.co'),
(1002931, 'Monsters Inc', 3, 'Persona Juridica', 2786563, 'monstersinc@misa.co');

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
  `NIT_DOC` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  `HORA` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingreso_material`
--

INSERT INTO `ingreso_material` (`ID_INGRE_MATERIAL`, `DOCUMENTO`, `NIT_DOC`, `FECHA`, `HORA`) VALUES
(50, 1005, 1000213, '2021-07-23', '14:41:12'),
(51, 1005, 1000213, '2021-07-23', '14:42:16'),
(52, 1005, 1000213, '2021-07-24', '08:10:45'),
(53, 1005, 1002931, '2021-07-24', '08:10:57'),
(54, 1005, 1000213, '2021-07-25', '13:41:59'),
(55, 1005, 1002931, '2021-07-25', '13:42:49'),
(56, 1005, 1000213, '2021-07-25', '14:03:18'),
(57, 1005, 1002931, '2021-07-25', '18:20:16');

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
(7, 'No existe', 2, 1, 3);

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
(0, '0', 'No existe', 2, 1, 3, 2, NULL),
(334, '123213', 'ESTRONG', 1, 1, 1, 5, ''),
(1233, '123213', 'ESTROGNFER', 1, 1, 1, 5, ''),
(312213, '213123', 'ESTROGNFER', 1, 1, 1, 6, 'ADADASDADADADADADADAD'),
(1212233, '123213', 'ESTROGNFER', 1, 1, 1, 6, NULL);

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
(4, 'AAAAAAA', 1);

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
(4, '333332', 5, 4, 1, 0),
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
(4, 'HILOS'),
(5, 'HILOS'),
(6, 'HILOS'),
(7, 'AAA'),
(8, 'ooo'),
(9, 'oooooo'),
(10, 'Holman lo mama'),
(11, ''),
(12, '23'),
(13, 'Love'),
(14, 'pico'),
(15, 'DEDE');

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
(5, 'POPO'),
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
(0, '', '', '0000-00-00', 1, 1, 0, '', NULL, ''),
(1005, 'HOLWAN DAVID', 'MONTES GUTIERREZ', '2002-02-21', 1, 1, 3120989123, 'holman@misa.co', 0x7069746f6e2e6a7067, '123'),
(100129312, 'ADADA', 'ASDADS', '2000-06-28', 1, 1, 3112312323, 'adada@mias.ed', 0x70616e74616c6c612070632e6a7067, '221efined'),
(1000023231, 'Kike', 'Tronco', '2000-10-24', 1, 2, 312312345, 'hdmontes59@misena.edu.co', 0x70657272696c2e6a7067, '12defined'),
(1000123123, 'Oscar', 'Llanos', '1999-06-15', 1, 2, 3123123923, 'oscar@mis.co', 0x61646d696e6973312e706e67, '123');

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
  ADD KEY `DOCU_ADMI` (`DOCU_ADMI`),
  ADD KEY `DOCU_INSTRUCTOR` (`DOCU_INSTRUCTOR`),
  ADD KEY `ID_ESTADO` (`ID_ESTADO`);

--
-- Indices de la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD PRIMARY KEY (`ID_BODEGA`),
  ADD KEY `ID_TIP_BODEGA` (`ID_TIP_BODEGA`);

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
  ADD KEY `ID_ACCION_REALIZADA` (`ID_ACCION_REALIZADA`),
  ADD KEY `ID_INSUMO` (`ID_INSUMO`),
  ADD KEY `ID_MATERIAL_TEXTIL` (`ID_MATERIAL_TEXTIL`),
  ADD KEY `ID_BODEGA` (`ID_BODEGA`);

--
-- Indices de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD PRIMARY KEY (`ID_DETA_INGRESO`),
  ADD KEY `ID_TIP_INGRESO` (`ID_TIP_INGRESO`),
  ADD KEY `ID_INGRE_MATERIAL` (`ID_INGRE_MATERIAL`),
  ADD KEY `ID_INSUMO` (`ID_INSUMO`),
  ADD KEY `ID_MATERIAL_TEXTIL` (`ID_MATERIAL_TEXTIL`),
  ADD KEY `SERIAL_MAQUINARIA` (`SERIAL_MAQUINARIA`),
  ADD KEY `ID_BODEGA` (`ID_BODEGA`);

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
  ADD KEY `DOCUMENTO` (`DOCUMENTO`);

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
  ADD KEY `ID_TIP_INSUMO` (`ID_TIP_INSUMO`,`ID_MARCA`,`ID_COLOR`);

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
  ADD KEY `ID_TIP_MAQUINARIA` (`ID_TIP_MAQUINARIA`,`ID_MARCA`,`ID_COLOR`),
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
  ADD KEY `ID_TIP_MATE_TEXTIL` (`ID_TIP_MATE_TEXTIL`,`ID_MARCA`,`ID_COLOR`);

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
  ADD KEY `ID_TIP_DOCU` (`ID_TIP_DOCU`,`ID_TIP_USU`),
  ADD KEY `ID_TIP_USU` (`ID_TIP_USU`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accion`
--
ALTER TABLE `accion`
  MODIFY `ID_ACCION` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `ID_COLOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_accion`
--
ALTER TABLE `detalle_accion`
  MODIFY `ID_DETA_ACCION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  MODIFY `ID_DETA_INGRESO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  MODIFY `ID_INGRE_MATERIAL` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `insumo`
--
ALTER TABLE `insumo`
  MODIFY `ID_INSUMO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `jornada`
--
ALTER TABLE `jornada`
  MODIFY `ID_JORNADA` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `ID_MARCA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `ID_TIP_INSUMO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  ADD CONSTRAINT `accion_realizada_ibfk_1` FOREIGN KEY (`DOCU_ADMI`) REFERENCES `usuario` (`DOCUMENTO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accion_realizada_ibfk_2` FOREIGN KEY (`DOCU_INSTRUCTOR`) REFERENCES `usuario` (`DOCUMENTO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accion_realizada_ibfk_3` FOREIGN KEY (`ID_ESTADO`) REFERENCES `estado` (`ID_ESTADO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_accion`
--
ALTER TABLE `detalle_accion`
  ADD CONSTRAINT `detalle_accion_ibfk_1` FOREIGN KEY (`ID_ACCION`) REFERENCES `accion` (`ID_ACCION`),
  ADD CONSTRAINT `detalle_accion_ibfk_2` FOREIGN KEY (`ID_ACCION_REALIZADA`) REFERENCES `accion_realizada` (`ID_ACCION_REALIZADA`),
  ADD CONSTRAINT `detalle_accion_ibfk_3` FOREIGN KEY (`ID_INSUMO`) REFERENCES `insumo` (`ID_INSUMO`),
  ADD CONSTRAINT `detalle_accion_ibfk_4` FOREIGN KEY (`ID_MATERIAL_TEXTIL`) REFERENCES `material_textil` (`ID_MATERIAL_TEXTIL`),
  ADD CONSTRAINT `detalle_accion_ibfk_6` FOREIGN KEY (`ID_BODEGA`) REFERENCES `bodega` (`ID_BODEGA`);

--
-- Filtros para la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD CONSTRAINT `detalle_ingreso_ibfk_1` FOREIGN KEY (`ID_TIP_INGRESO`) REFERENCES `tipo_ingreso` (`ID_TIP_INGRESO`),
  ADD CONSTRAINT `detalle_ingreso_ibfk_5` FOREIGN KEY (`ID_INGRE_MATERIAL`) REFERENCES `ingreso_material` (`ID_INGRE_MATERIAL`),
  ADD CONSTRAINT `detalle_ingreso_ibfk_6` FOREIGN KEY (`ID_INSUMO`) REFERENCES `insumo` (`ID_INSUMO`),
  ADD CONSTRAINT `detalle_ingreso_ibfk_7` FOREIGN KEY (`ID_MATERIAL_TEXTIL`) REFERENCES `material_textil` (`ID_MATERIAL_TEXTIL`),
  ADD CONSTRAINT `detalle_ingreso_ibfk_8` FOREIGN KEY (`SERIAL_MAQUINARIA`) REFERENCES `maquinaria` (`SERIAL_MAQUINARIA`),
  ADD CONSTRAINT `detalle_ingreso_ibfk_9` FOREIGN KEY (`ID_BODEGA`) REFERENCES `bodega` (`ID_BODEGA`);

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`ID_TIP_USU`) REFERENCES `tipo_usuario` (`ID_TIP_USU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingreso_material`
--
ALTER TABLE `ingreso_material`
  ADD CONSTRAINT `ingreso_material_ibfk_1` FOREIGN KEY (`DOCUMENTO`) REFERENCES `usuario` (`DOCUMENTO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingreso_material_ibfk_2` FOREIGN KEY (`NIT_DOC`) REFERENCES `empresa` (`NIT_DOC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `maquinaria`
--
ALTER TABLE `maquinaria`
  ADD CONSTRAINT `maquinaria_ibfk_1` FOREIGN KEY (`ID_ESTADO`) REFERENCES `estado` (`ID_ESTADO`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_TIP_USU`) REFERENCES `tipo_usuario` (`ID_TIP_USU`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`ID_TIP_DOCU`) REFERENCES `tipo_documento` (`ID_TIP_DOCU`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
