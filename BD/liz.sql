-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2016 a las 14:19:02
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `liz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `ruta` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`id_album`, `id_categoria`, `nombre`, `descripcion`, `ruta`) VALUES
(7, 8, 'Casas', 'Modelos de casas visualmente agradables', 'galeria/8/7'),
(8, 8, 'Flores de Jardin', 'Flores que se pueden tener dentro del hogar', 'galeria/8/8'),
(9, 9, 'Planetas', 'EL espacio exterior y sus misterios', 'galeria/9/9'),
(10, 9, 'Paisajes', 'Lugares para recrearse ', 'galeria/9/10'),
(12, 10, 'Carros', 'Gusto por la velocidad', 'galeria/10/12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `ruta` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`, `ruta`) VALUES
(8, 'Tema de Hogar', 'Imagenes con contenido amigable.', 'galeria/8'),
(9, 'Tema al aire libre', 'Tema con imagenes de espacios amplios.', 'galeria/9'),
(10, 'Tema Masculino', 'Categoria de imagenes relativas al gusto de niÃ±os varones.', 'galeria/10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `ruta` varchar(100) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `id_categoria`, `id_album`, `nombre`, `descripcion`, `ruta`, `estado`) VALUES
(16, 8, 7, 'imgres1.jpg', 'Casa de gente con rial', 'galeria/8/7/imgres1.jpg.jpg', 'A'),
(17, 8, 7, 'imgres2.jpg', 'Casa para gente normal casa para gente normal casa para gente normal', 'galeria/8/7/imgres2.jpg.jpg', 'A'),
(18, 8, 7, 'imgres3.jpg', '', 'galeria/8/7/imgres3.jpg', 'A'),
(19, 8, 7, 'imgres4.jpg', '', 'galeria/8/7/imgres4.jpg', 'A'),
(20, 8, 8, 'imgres1.jpg', '', 'galeria/8/8/imgres1.jpg', 'A'),
(21, 8, 8, 'imgres2.jpg', '', 'galeria/8/8/imgres2.jpg', 'A'),
(22, 8, 8, 'imgres3.jpg', '', 'galeria/8/8/imgres3.jpg', 'A'),
(23, 9, 9, 'images4.jpg', '', 'galeria/9/9/images4.jpg', 'A'),
(24, 9, 9, 'imgres1.jpg', '', 'galeria/9/9/imgres1.jpg', 'A'),
(25, 9, 9, 'imgres2.jpg', '', 'galeria/9/9/imgres2.jpg', 'A'),
(28, 9, 10, 'dogs', 'los perros', 'galeria/9/10/dogs.jpg', 'A'),
(32, 8, 7, 'imgres1.jpg', '', 'galeria/inactivo/imgres1.jpg', 'I'),
(33, 10, 12, 'imgres2.jpg', '', 'galeria/10/12/imgres2.jpg', 'A'),
(34, 10, 12, 'imgres3.jpg', '', 'galeria/10/12/imgres3.jpg', 'A'),
(35, 10, 12, 'imgres4.jpg', '', 'galeria/10/12/imgres4.jpg', 'A'),
(36, 8, 7, 'Fast', 'El carro que nunca tendre', 'galeria/8/7/Fast.jpg', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redsocial`
--

CREATE TABLE `redsocial` (
  `nombre` varchar(100) NOT NULL,
  `pagina` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `redsocial`
--

INSERT INTO `redsocial` (`nombre`, `pagina`) VALUES
('facebook', 'https://www.fayerwayer.com/'),
('instagrem', 'aa'),
('linkedin', '#'),
('pinterest', '#'),
('tumblr', ''),
('twitter', 'http://www.xataka.com/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` varchar(15) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `contrasena` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `contrasena`) VALUES
('argentina', 'liz', '6545');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_album` (`id_album`);

--
-- Indices de la tabla `redsocial`
--
ALTER TABLE `redsocial`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `imagen_ibfk_2` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
