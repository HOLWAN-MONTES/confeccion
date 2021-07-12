-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2021 a las 19:11:08
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

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
  `DOCU_ADMI` int(11) NOT NULL,
  `DOCU_INSTRUCTOR` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  `HORA` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `ID_COLOR` int(11) NOT NULL,
  `NOM_COLOR` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_accion`
--

CREATE TABLE `detalle_accion` (
  `ID_DETA_ACCION` int(11) NOT NULL,
  `ID_ACCION_REALIZADA` int(11) NOT NULL,
  `ID_ACCION` int(2) NOT NULL,
  `ID_MATERIAL` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `ID_BODEGA` int(11) NOT NULL,
  `CANTIDAD_TOTAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ingreso`
--

CREATE TABLE `detalle_ingreso` (
  `ID_DETA_INGRESO` int(11) NOT NULL,
  `ID_INGRE_MATERIAL` int(11) NOT NULL,
  `ID_TIP_INGRESO` int(11) NOT NULL,
  `ID_MATERIAL` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `ID_BODEGA` int(11) NOT NULL,
  `CANTIDAD_TOTAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `ID_ESTADO` int(2) NOT NULL,
  `NOM_ESTADO` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `ID_INGRE_MATERIAL` int(11) NOT NULL,
  `DOCU_PROVEEDOR` int(11) NOT NULL,
  `DOCU_ADMI` int(11) NOT NULL,
  `FECHA` date NOT NULL,
  `HORA` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `ID_MAQUINARIA` int(11) NOT NULL,
  `NOM_MAQUINARIA` varchar(30) NOT NULL,
  `ID_TIP_MAQUINARIA` int(2) NOT NULL,
  `ID_MARCA` int(11) NOT NULL,
  `ID_COLOR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `ID_MARCA` int(11) NOT NULL,
  `NOM_MARCA` varchar(30) NOT NULL,
  `ID_TIP_MARCA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_textil`
--

CREATE TABLE `material_textil` (
  `ID_MATERIAL_TEXTIL` int(11) NOT NULL,
  `NOM_MATERIAL_TEXTIL` varchar(30) NOT NULL,
  `ID_TIP_MATE_TEXTIL` int(11) NOT NULL,
  `ID_MARCA` int(11) NOT NULL,
  `ID_COLOR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_bodega`
--

CREATE TABLE `tipo_bodega` (
  `ID_TIP_BODEGA` int(2) NOT NULL,
  `NOM_TIP_BODEGA` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_insumo`
--

CREATE TABLE `tipo_insumo` (
  `ID_TIP_INSUMO` int(11) NOT NULL,
  `NOM_TIP_INSUMO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_maquina`
--

CREATE TABLE `tipo_maquina` (
  `ID_TIP_MAQUINARIA` int(2) NOT NULL,
  `NOM_TIP_MAQUINARIA` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_marca`
--

CREATE TABLE `tipo_marca` (
  `ID_TIP_MARCA` int(11) NOT NULL,
  `NOM_TIP_MARCA` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_material_textil`
--

CREATE TABLE `tipo_material_textil` (
  `ID_TIP_MATE_TEXTIL` int(11) NOT NULL,
  `NOM_TIP_MATE_TEXTIL` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'INSTRUCTOR');

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
  `CLAVE` varchar(30) NOT NULL,
  `NIT` int(11) UNSIGNED DEFAULT NULL,
  `RAZON_SOCIAL` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`DOCUMENTO`, `NOMBRE`, `APELLIDO`, `FECHA_NACIMIENTO`, `ID_TIP_DOCU`, `ID_TIP_USU`, `CELULAR`, `CORREO`, `FOTO`, `CLAVE`, `NIT`, `RAZON_SOCIAL`) VALUES
(1005, 'HOLWAN DAVID', 'MONTES GUTIERREZ', '2002-02-21', 1, 1, 3115497411, 'hdmontes59@misena.edu.co', NULL, '123', NULL, NULL);

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
  ADD KEY `DOCU_ADMI` (`DOCU_ADMI`,`DOCU_INSTRUCTOR`);

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
  ADD KEY `ID_ACCION_REALIZADA` (`ID_ACCION_REALIZADA`,`ID_ACCION`,`ID_MATERIAL`),
  ADD KEY `ID_BODEGA` (`ID_BODEGA`);

--
-- Indices de la tabla `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD PRIMARY KEY (`ID_DETA_INGRESO`),
  ADD KEY `ID_INGRE_MATERIAL` (`ID_INGRE_MATERIAL`,`ID_TIP_INGRESO`,`ID_MATERIAL`),
  ADD KEY `ID_BODEGA` (`ID_BODEGA`);

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
  ADD KEY `DOCU_PROVEEDOR` (`DOCU_PROVEEDOR`,`DOCU_ADMI`);

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
  ADD PRIMARY KEY (`ID_MAQUINARIA`),
  ADD KEY `ID_TIP_MAQUINARIA` (`ID_TIP_MAQUINARIA`,`ID_MARCA`,`ID_COLOR`);

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
  ADD KEY `ID_TIP_DOCU` (`ID_TIP_DOCU`,`ID_TIP_USU`);

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
  MODIFY `ID_COLOR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `ID_ESTADO` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formacion`
--
ALTER TABLE `formacion`
  MODIFY `ID_FORMACION` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `insumo`
--
ALTER TABLE `insumo`
  MODIFY `ID_INSUMO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jornada`
--
ALTER TABLE `jornada`
  MODIFY `ID_JORNADA` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `ID_MARCA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_bodega`
--
ALTER TABLE `tipo_bodega`
  MODIFY `ID_TIP_BODEGA` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `ID_TIP_DOCU` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_ingreso`
--
ALTER TABLE `tipo_ingreso`
  MODIFY `ID_TIP_INGRESO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_insumo`
--
ALTER TABLE `tipo_insumo`
  MODIFY `ID_TIP_INSUMO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_maquina`
--
ALTER TABLE `tipo_maquina`
  MODIFY `ID_TIP_MAQUINARIA` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_marca`
--
ALTER TABLE `tipo_marca`
  MODIFY `ID_TIP_MARCA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_material_textil`
--
ALTER TABLE `tipo_material_textil`
  MODIFY `ID_TIP_MATE_TEXTIL` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `ID_TIP_USU` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
