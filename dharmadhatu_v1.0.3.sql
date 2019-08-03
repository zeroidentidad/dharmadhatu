-- Servidor: localhost:3306
-- Tiempo de generación: 02-08-2019 a las 18:49:01
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dharmadhatu`
--
CREATE DATABASE IF NOT EXISTS `dharmadhatu` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `dharmadhatu`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `introduccion` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ruta` text COLLATE utf8_spanish_ci,
  `contenido` text COLLATE utf8_spanish_ci,
  `orden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `titulo`, `introduccion`, `ruta`, `contenido`, `orden`) VALUES
(3, 'Lorem Ipsum 1', '\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\r\n\"No hay nadie que ame el dolor mismo, que lo busque, lo encuentre y lo qu...', 'views/images/articulos/articulo820.jpg', 'Fusce volutpat sed enim at elementum. Vestibulum imperdiet fringilla felis, consectetur tincidunt neque auctor interdum. Fusce feugiat tristique elit in hendrerit. Cras a lectus consequat, cursus nulla eu, ornare ex. Ut varius posuere nisl, feugiat pellentesque arcu molestie a. Nulla id orci cursus, scelerisque justo eu, lobortis metus. Nunc purus erat, tempus a augue a, congue dignissim diam. Vivamus sagittis congue bibendum. Phasellus nec nisi nibh. Ut sed vulputate tellus, non tempor quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean sed quam semper nisl aliquet posuere feugiat in dui. Maecenas lectus eros, sodales eget commodo sit amet, lobortis non ligula.', 2),
(4, 'Lorem Ipsum 2', '\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\r\n\"No hay nadie que ame el dolor mismo, que lo busque, lo encuentre y lo qu...', 'views/images/articulos/articulo694.jpg', '\r\nFusce volutpat sed enim at elementum. Vestibulum imperdiet fringilla felis, consectetur tincidunt neque auctor interdum. Fusce feugiat tristique elit in hendrerit. Cras a lectus consequat, cursus nulla eu, ornare ex. Ut varius posuere nisl, feugiat pellentesque arcu molestie a. Nulla id orci cursus, scelerisque justo eu, lobortis metus. Nunc purus erat, tempus a augue a, congue dignissim diam. Vivamus sagittis congue bibendum. Phasellus nec nisi nibh. Ut sed vulputate tellus, non tempor quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean sed quam semper nisl aliquet posuere feugiat in dui. Maecenas lectus eros, sodales eget commodo sit amet, lobortis non ligula.', 5),
(5, 'Lorem Ipsum 3', '\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\r\n\"No hay nadie que ame el dolor mismo, que lo busque, lo encuentre y lo qu...', 'views/images/articulos/articulo923.jpg', '\r\nFusce volutpat sed enim at elementum. Vestibulum imperdiet fringilla felis, consectetur tincidunt neque auctor interdum. Fusce feugiat tristique elit in hendrerit. Cras a lectus consequat, cursus nulla eu, ornare ex. Ut varius posuere nisl, feugiat pellentesque arcu molestie a. Nulla id orci cursus, scelerisque justo eu, lobortis metus. Nunc purus erat, tempus a augue a, congue dignissim diam. Vivamus sagittis congue bibendum. Phasellus nec nisi nibh. Ut sed vulputate tellus, non tempor quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean sed quam semper nisl aliquet posuere feugiat in dui. Maecenas lectus eros, sodales eget commodo sit amet, lobortis non ligula.\r\n\r\n', 4),
(7, 'Lorem Ipsum 5', '\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\r\n\"No hay nadie que ame el dolor mismo, que lo busque, lo encuentre y lo q...', 'views/images/articulos/articulo123.jpg', 'Fusce volutpat sed enim at elementum. Vestibulum imperdiet fringilla felis, consectetur tincidunt neque auctor interdum. Fusce feugiat tristique elit in hendrerit. Cras a lectus consequat, cursus nulla eu, ornare ex. Ut varius posuere nisl, feugiat pellentesque arcu molestie a. Nulla id orci cursus, scelerisque justo eu, lobortis metus. Nunc purus erat, tempus a augue a, congue dignissim diam. Vivamus sagittis congue bibendum. Phasellus nec nisi nibh. Ut sed vulputate tellus, non tempor quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean sed quam semper nisl aliquet posuere feugiat in dui. Maecenas lectus eros, sodales eget commodo sit amet, lobortis non ligula.\r\n\r\n', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci,
  `orden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id`, `ruta`, `orden`) VALUES
(17, '../../views/images/galeria/galeria137.jpg', 8),
(18, '../../views/images/galeria/galeria685.jpg', 2),
(19, '../../views/images/galeria/galeria320.jpg', 3),
(20, '../../views/images/galeria/galeria847.jpg', 1),
(21, '../../views/images/galeria/galeria449.jpg', 11),
(22, '../../views/images/galeria/galeria602.jpg', 4),
(23, '../../views/images/galeria/galeria484.jpg', 5),
(24, '../../views/images/galeria/galeria665.jpg', 7),
(25, '../../views/images/galeria/galeria428.jpg', 9),
(26, '../../views/images/galeria/galeria759.jpg', 10),
(27, '../../views/images/galeria/galeria370.jpg', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mensaje` text COLLATE utf8_spanish_ci,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `revision` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `email`, `mensaje`, `fecha`, `revision`) VALUES
(9, 'test', 'test@mail.com', 'mensaje de preuiba', '2019-07-12 00:39:46', 1),
(10, 'oyttro', 'otro@mail.com', 'mesnaje otroe de preuba', '2019-07-12 00:41:16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(350) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `slide`
--

INSERT INTO `slide` (`id`, `ruta`, `titulo`, `descripcion`, `orden`) VALUES
(20, '../../views/images/slide/slide507.jpg', 'Titulo 1', 'Descricion 1', 5),
(21, '../../views/images/slide/slide880.jpg', 'Titulo 2', 'ddgescion 3w', 1),
(22, '../../views/images/slide/slide739.jpg', 'Titulo 3', 'otro texto', 3),
(23, '../../views/images/slide/slide926.jpg', 'preuba teto', 'dexcipcjn', 2),
(24, '../../views/images/slide/slide495.jpg', 'slide mas', 'texto descripion', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptores`
--

CREATE TABLE `suscriptores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `revision` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `suscriptores`
--

INSERT INTO `suscriptores` (`id`, `nombre`, `email`, `revision`) VALUES
(9, 'test', 'test@mail.com', 1),
(10, 'oyttro', 'otro@mail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `photo` text COLLATE utf8_spanish_ci NOT NULL,
  `rol` int(11) NOT NULL,
  `intentos` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `email`, `photo`, `rol`, `intentos`) VALUES
(1, 'admin', '$2a$07$asxx54ahjppf45sd87a5auRWSked6chuvUpWa9eg3o3zJ/HGM4DhC', 'admin@mail.com', 'views/images/perfiles/perfil737.jpg', 0, 0),
(3, 'otroe', '$2a$07$asxx54ahjppf45sd87a5auRWSked6chuvUpWa9eg3o3zJ/HGM4DhC', 'otroe@mail.com', 'views/images/perfiles/perfil855.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci,
  `orden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `ruta`, `orden`) VALUES
(8, '../../views/videos/video144.mp4', 3),
(9, '../../views/videos/video938.mp4', 1),
(10, '../../views/videos/video657.mp4', 2),
(11, '../../views/videos/video520.mp4', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
