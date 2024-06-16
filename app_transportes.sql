-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2024 a las 19:30:47
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
-- Base de datos: `app_transportes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camiones`
--

CREATE TABLE `camiones` (
  `id` int(11) NOT NULL,
  `idMarca` varchar(250) NOT NULL,
  `anio` varchar(50) NOT NULL,
  `patente` varchar(50) NOT NULL,
  `disponibilidad` int(11) NOT NULL,
  `fechaRegistro` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `camiones`
--

INSERT INTO `camiones` (`id`, `idMarca`, `anio`, `patente`, `disponibilidad`, `fechaRegistro`) VALUES
(3, '10', '2024', 'as112as', 1, '2024-06-15'),
(4, '11', '2000', 'aaaaaaa', 0, '2024-06-15'),
(5, '11', '2000', 'aaaaaaa', 0, '2024-06-15'),
(6, '11', '2000', 'aaaaaaa', 0, '2024-06-15'),
(7, '12', '2023', 'llv799', 1, '2024-06-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinos`
--

CREATE TABLE `destinos` (
  `id` int(11) NOT NULL,
  `denominacion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `destinos`
--

INSERT INTO `destinos` (`id`, `denominacion`) VALUES
(1, 'Córdoba'),
(2, 'Villa María'),
(3, 'Río Cuarto'),
(4, 'Jesús María'),
(5, 'San Francisco'),
(6, 'Villa Carlos Paz'),
(7, 'La Falda'),
(8, 'Alta Gracia'),
(9, 'Bell Ville'),
(10, 'Mina Clavero'),
(11, 'Cosquín'),
(12, 'Colonia Caroya'),
(13, 'Río Tercero'),
(14, 'Arroyito'),
(15, 'Villa Dolores'),
(16, 'Morteros'),
(17, 'Deán Funes'),
(18, 'Villa del Rosario'),
(19, 'Laboulaye'),
(20, 'Santa Rosa de Calamuchita');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `marca` varchar(250) NOT NULL,
  `modelo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `marca`, `modelo`) VALUES
(1, 'Iveco', 'Daily Furgon'),
(2, 'Iveco', 'Daily Chasis'),
(3, 'Volvo', 'Volvo FH'),
(4, 'Volvo', 'Volvo FM'),
(5, 'Scania', 'Serie P'),
(6, 'Scania', 'Serie G'),
(7, 'Volkswagen', 'Delivery'),
(8, 'Volkswagen', 'Meteor'),
(9, 'Iveco', 'unmodelo'),
(10, 'Scania', 'Volvo FM'),
(11, 'Volkswagen', 'Serie G'),
(12, 'Iveco', 'ivecamm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`id`, `descripcion`) VALUES
(1, 'admin'),
(2, 'operador'),
(3, 'chofer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `dni` varchar(50) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `clave` varchar(250) NOT NULL,
  `activo` varchar(250) NOT NULL DEFAULT 'activo',
  `fechaCreacion` date NOT NULL DEFAULT current_timestamp(),
  `imagen` varchar(250) NOT NULL DEFAULT 'profile-img.jpg',
  `idNivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `apellido`, `nombre`, `dni`, `usuario`, `clave`, `activo`, `fechaCreacion`, `imagen`, `idNivel`) VALUES
(1, 'illescas', 'jonathan', '37757084', 'jonaIlles', '123', 'activo', '2024-06-01', 'profile-img.jpg', 1),
(17, 'ricardo', 'perez', '37757084', 'Ricki', '123', 'activo', '2024-06-08', 'profile-img.jpg', 3),
(18, 'Diez', 'juan', '12345678', 'JuanD', '123', 'activo', '2024-06-15', 'profile-img.jpg', 3),
(19, 'Darin', 'Ricardo', '37757084', 'operador1', '123', 'activo', '0000-00-00', 'profile-img.jpg', 2),
(20, 'Chofer', 'De Prueba', '37757084', 'chofer1', '123', '1', '2024-06-16', 'imagen.jpg', 3),
(22, 'prueba', 'img', '1234567', 'probando', '123', '1', '2024-06-16', 'profile-img.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `id` int(11) NOT NULL,
  `idChofer` int(11) NOT NULL,
  `idDestino` int(11) NOT NULL,
  `idCamion` int(11) NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `porcentajeChofer` int(11) NOT NULL,
  `fechaViaje` date NOT NULL,
  `fechaRegistro` date NOT NULL DEFAULT current_timestamp(),
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`id`, `idChofer`, `idDestino`, `idCamion`, `costo`, `porcentajeChofer`, `fechaViaje`, `fechaRegistro`, `idUsuario`) VALUES
(3, 17, 19, 3, 200.00, 1, '2024-06-14', '2024-06-15', 0),
(4, 17, 1, 7, 12.00, 12, '0000-00-00', '2024-06-15', 0),
(5, 17, 19, 7, 1500.00, 100, '2022-12-12', '2024-06-15', 0),
(6, 17, 19, 7, 1500.00, 100, '2022-12-12', '2024-06-15', 0),
(7, 17, 18, 7, 10000.00, 10, '2000-12-12', '2024-06-15', 0),
(8, 17, 19, 7, 5000.00, 10, '2024-10-15', '2024-06-15', 0),
(9, 17, 18, 3, 10000.00, 5, '2024-08-29', '2024-06-15', 1),
(10, 17, 18, 3, 10000.00, 5, '2024-08-29', '2024-06-15', 1),
(11, 17, 15, 7, 1500.00, 10, '2024-06-08', '2024-06-15', 1),
(12, 17, 15, 7, 1500.00, 10, '2024-06-08', '2024-06-15', 1),
(13, 17, 19, 7, 50000.00, 15, '2024-07-05', '2024-06-15', 1),
(14, 17, 19, 3, 20000.00, 20, '2024-06-15', '2024-06-16', 1),
(15, 17, 18, 5, 50000.00, 5, '2024-06-16', '2024-06-16', 1),
(16, 18, 19, 7, 50000.00, 50, '2024-06-16', '2024-06-16', 1),
(17, 17, 12, 7, 15000.00, 10, '2024-06-17', '2024-06-16', 19),
(18, 17, 19, 3, 500.00, 100, '2024-06-16', '2024-06-16', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `camiones`
--
ALTER TABLE `camiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `camiones`
--
ALTER TABLE `camiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
