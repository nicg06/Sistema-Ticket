-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2017 a las 05:40:17
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tikect_hd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `ID_DEPTO` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `AREA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`ID_DEPTO`, `NOMBRE`, `AREA`) VALUES
(1, 'Soporte de Red', 'Sistemas'),
(2, 'Soporte de Sistemas', 'Sistemas'),
(3, 'Flota', 'RRHH'),
(4, 'Centro de Servicio', 'RRHH');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `ID_SEG` int(11) NOT NULL,
  `ID_TICKET` int(11) NOT NULL,
  `COD_USUARIO` int(11) NOT NULL,
  `FECHA_SEGUIMIENTO` datetime NOT NULL,
  `SEG_COMENTARIO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`ID_SEG`, `ID_TICKET`, `COD_USUARIO`, `FECHA_SEGUIMIENTO`, `SEG_COMENTARIO`) VALUES
(1, 3, 1, '2017-10-18 00:00:00', 'uw eueew iweiei eieueuryr ur'),
(15, 4, 5, '2017-10-19 23:08:43', 'Se enviara un tecnico para revision del equipo'),
(16, 4, 10, '2017-10-20 23:36:03', 'La impresora necesita un repuesto se queda pendiente de entrega'),
(17, 4, 8, '2017-10-25 23:59:49', 'Se ha reparado la impresora, se cierra el ticket'),
(18, 8, 1, '2017-11-08 22:57:33', 'Estamos pendientes con esto'),
(19, 3, 1, '2017-11-14 23:28:53', 'Estamos pendientes en unos dias se resolvera'),
(20, 3, 1, '2017-11-15 12:36:10', 'UEWIOEW DSBDSBDS'),
(21, 3, 1, '2017-11-21 12:47:32', 'Se da por solucionado, caso sera cerrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `ID_TICKET` int(11) NOT NULL,
  `COD_TICKET` varchar(10) NOT NULL,
  `FECHA_ALTA` datetime NOT NULL,
  `FECHA_ATENCION` datetime NOT NULL,
  `TITULO_TICKET` varchar(250) NOT NULL,
  `PRIORIDAD` varchar(50) NOT NULL,
  `ESTADO` varchar(50) NOT NULL,
  `ID_DEPTO` int(11) NOT NULL,
  `COD_USUARIO` int(11) NOT NULL,
  `DESCRIPCION` text NOT NULL,
  `COMENTARIO` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`ID_TICKET`, `COD_TICKET`, `FECHA_ALTA`, `FECHA_ATENCION`, `TITULO_TICKET`, `PRIORIDAD`, `ESTADO`, `ID_DEPTO`, `COD_USUARIO`, `DESCRIPCION`, `COMENTARIO`) VALUES
(3, 'TK075621', '2017-09-11 23:56:21', '2017-11-21 12:47:32', 'No hay internet', '1', 'CERRADO', 1, 5, 'se fue el inter', 'werrr'),
(4, 'TK093749', '2017-09-19 13:37:49', '0000-00-00 00:00:00', 'Impresora no funciona', '1', 'CERRADO', 2, 8, 'La impresora dejo de funcionar solo hace un ruido muy fuerte', 'jsdlaslkas l salksalas aslksaask'),
(5, 'TK075126', '2017-10-26 23:51:26', '0000-00-00 00:00:00', 'No hay internet', '1', 'ABIERTO', 2, 10, 'Se fue el internet desde hace unas horas ya se reviso el cable de red y no es eso', 'comentario'),
(6, 'TK075456', '2017-10-26 23:54:57', '0000-00-00 00:00:00', 'Ticket de prueba', '3', 'ABIERTO', 1, 10, 'Esto es una prueba', 'Esto es una prueba'),
(7, 'TK074931', '2017-10-28 11:49:31', '0000-00-00 00:00:00', 'Ticket de prueba 2.2', '2', 'ABIERTO', 2, 1, 'Otro ticket de preuba', 'comenta'),
(8, 'TK075105', '2017-10-28 11:51:05', '2017-11-08 22:57:33', 'Ticket de prueba 2.3', '3', 'PENDIENTE', 1, 1, 'estamos probando la funcionalidad', 'comentamos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `COD_USUARIO` int(11) NOT NULL,
  `NOMBRES` varchar(100) NOT NULL,
  `APELLIDOS` varchar(100) NOT NULL,
  `TELEFONO` int(11) NOT NULL,
  `CORREO` varchar(100) NOT NULL,
  `PERFIL` varchar(100) NOT NULL,
  `TIPO` varchar(100) NOT NULL,
  `NOMBRE_USUARIO` varchar(100) NOT NULL,
  `PASSWORD` char(250) NOT NULL,
  `ESTADO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`COD_USUARIO`, `NOMBRES`, `APELLIDOS`, `TELEFONO`, `CORREO`, `PERFIL`, `TIPO`, `NOMBRE_USUARIO`, `PASSWORD`, `ESTADO`) VALUES
(1, 'Nilson', 'Cardoza', 22712456, 'nilson@correo.com', 'admin', '1', 'nilson.cardoza', 'e10adc3949ba59abbe56e057f20f883e', 'ACTIVO'),
(5, 'Israel', 'Gomez', 23456789, 'israelg@yahoo.es', 'SUP', '1', 'israel.gomez', 'e10adc3949ba59abbe56e057f20f883e', 'ACTIVO'),
(8, 'Super', 'Usuario', 23456789, 'example@ert.com', 'ADMIN', '1', 'super.usuario', 'e10adc3949ba59abbe56e057f20f883e', 'ACTIVO'),
(10, 'Juan', 'Diaz', 22712456, 'example@ert.com', 'AGENT', '1', 'juan.diaz', 'e10adc3949ba59abbe56e057f20f883e', 'ACTIVO'),
(11, 'Pedro', 'Ruiz', 23456789, 'example@ert.com', 'SUP', '1', 'pedro.ruiz', 'e10adc3949ba59abbe56e057f20f883e', 'ACTIVO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`ID_DEPTO`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`ID_SEG`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ID_TICKET`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`COD_USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `ID_DEPTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `ID_SEG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ID_TICKET` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `COD_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
