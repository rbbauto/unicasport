-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2020 a las 21:23:34
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `hostname` varchar(32) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `id_cliente`, `id_producto`, `nombre`, `hostname`, `precio`, `cantidad`, `subtotal`) VALUES
(167, 0, 81, 'Soga De Salto', 'Autoradio-RBB', 180, 1, 180),
(168, 0, 82, 'Step De Pvc De 13 Cm.', 'Autoradio-RBB', 494, 2, 988),
(169, 0, 83, 'Pelotas De Handball NÂ°3, Cuero Legitimo!!', 'Autoradio-RBB', 890, 3, 2670),
(170, 0, 84, 'Bolso Porta Pelotas Y Materiales,en Cordura Vinili', 'Autoradio-RBB', 653.02, 4, 2612.08);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre_categoria` varchar(11) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre_categoria`) VALUES
(96, 'Boxeo'),
(97, 'Futbol'),
(99, 'popo'),
(98, 'spinging');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credenciales`
--

CREATE TABLE `credenciales` (
  `id` int(11) NOT NULL,
  `user_id` varchar(32) COLLATE utf8_spanish2_ci NOT NULL,
  `sandbox_publickey` varchar(64) COLLATE utf8_spanish2_ci NOT NULL,
  `sandbox_accesstoken` varchar(96) COLLATE utf8_spanish2_ci NOT NULL,
  `production_publickey` varchar(64) COLLATE utf8_spanish2_ci NOT NULL,
  `production_accesstoken` varchar(96) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `credenciales`
--

INSERT INTO `credenciales` (`id`, `user_id`, `sandbox_publickey`, `sandbox_accesstoken`, `production_publickey`, `production_accesstoken`) VALUES
(2, '', 'TEST-4773cfaa-0331-4c51-9abd-5e99252094ce', 'TEST-2186469796881808-091801-d02c2f707d432b1722950e4f14e1da1f-267036991', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `privilege` int(6) NOT NULL DEFAULT '0',
  `cookie` binary(32) NOT NULL,
  `session` binary(32) NOT NULL,
  `lastactive` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `privilege`, `cookie`, `session`, `lastactive`) VALUES
(1, 'admin', '79d7bbb96b2f65bed62744cd9775a778', 1, 0x3938666561613265373639306238626466376366666536306163373563363631, 0x6163656136303463373962646533326336386631383335316138303662353136, '2017-08-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logincliente`
--

CREATE TABLE `logincliente` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `apellido` varchar(32) NOT NULL,
  `telefono` varchar(16) NOT NULL,
  `direccion` varchar(32) NOT NULL,
  `ciudad` varchar(32) NOT NULL,
  `provincia` varchar(32) NOT NULL,
  `pais` varchar(32) NOT NULL,
  `empresa` varchar(64) NOT NULL,
  `cuit` int(11) NOT NULL,
  `cp` int(11) NOT NULL,
  `checkboxFacturarAca` tinyint(1) NOT NULL,
  `hostname` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `logincliente`
--

INSERT INTO `logincliente` (`id`, `email`, `password`, `nombre`, `apellido`, `telefono`, `direccion`, `ciudad`, `provincia`, `pais`, `empresa`, `cuit`, `cp`, `checkboxFacturarAca`, `hostname`) VALUES
(42, 'a@a.a', '79d7bbb96b2f65bed62744cd9775a778', 'Richard', 'bienol', '1234567', 'bools 123', 'moron', 'bsas', 'arg', 'rbb', 2147483647, 1425, 1, 'Autoradio-RBB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `imagen` varchar(64) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `color` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `categoria` varchar(32) COLLATE utf8_spanish2_ci NOT NULL,
  `stock` int(6) NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `activa` tinyint(1) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `imagen`, `nombre`, `color`, `categoria`, `stock`, `descripcion`, `activa`, `precio`) VALUES
(81, 'assets/img/654202-MLA31114161961_062019-O.jpg', 'Soga De Salto', 'Azul', 'Boxeo', 4, 'SOGAS PARA SALTAR DE CABLE ,CON PUÃ‘O EN PVC!!', 1, 180),
(82, 'assets/img/784920-MLA31041980182_062019-O.jpg', 'Step De Pvc De 13 Cm.', 'Azul', 'Boxeo', 2, 'Step de pvc,funcional, ideal para ejercicios de piernas, soporta mas de 100 kilos, con superficie antideslizante,..sus medidas:30x40x13 cm de alto...color negro...muy economico!!...hacemos envios a todo el pais !!...aceptamos mercadopago !!', 1, 494),
(83, 'assets/img/863509-MLA31655154449_082019-O.jpg', 'Pelotas De Handball NÂ°3, Cuero Legitimo!!', 'Rojo', 'Futbol', 3, 'Pelotas de handball nÂ°3, de cuero legitimo, peso y medida reglamentaria,super reforzada,..con camara de 100 grs. y valvula de butilo cambiable,material antideslizante,...la mejor pelota y muy accesible. ...hacemos factura A o B, solo debe avisarnos e informarnos su cuit, sino se le imprimira un ticket de consumidor final homologado...hacemos envios.', 1, 890),
(84, 'assets/img/650521-MLA31621924539_072019-O.jpg', 'Bolso Porta Pelotas Y Materiales,en Cordura Vinili', 'Azul', 'Futbol', 7, 'Bolso porta pelotas o porta materiales, fabricado en cordura vinilica de excelente calidad, con argollas y cordon, apto para candado.', 1, 653.02);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `nombre_categoria` (`nombre_categoria`);

--
-- Indices de la tabla `credenciales`
--
ALTER TABLE `credenciales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logincliente`
--
ALTER TABLE `logincliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `credenciales`
--
ALTER TABLE `credenciales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `logincliente`
--
ALTER TABLE `logincliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
