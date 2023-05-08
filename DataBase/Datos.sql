-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2023 a las 23:59:50
-- Versión del servidor: 8.0.32
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor_notas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iconos`
--

CREATE TABLE `iconos` (
  `Nombre` varchar(65) COLLATE utf8mb3_spanish_ci NOT NULL,
  `id_icono` int NOT NULL,
  `link_icono` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `iconos`
--

INSERT INTO `iconos` (`Nombre`, `id_icono`, `link_icono`) VALUES
('Sol', 1, '<i class=\"bi bi-brightness-high-fill\" style=\"text-decoration: none; color: white;\"></i>'),
('Telefono', 2, '<i class=\"bi bi-telephone-fill\" style=\"text-decoration: none; color: white;\"></i>'),
('Persona', 3, '<i class=\"bi bi-person-fill\" style=\"text-decoration: none; color: white;\"></i>'),
('Casa', 4, '<i class=\"bi bi-house-fill\" style=\"text-decoration: none; color: white;\"></i>'),
('Regalo', 5, '<i class=\"bi bi-gift-fill\" style=\"text-decoration: none; color: white;\"></i>'),
('Exclamación', 6, '<i class=\"bi bi-exclamation-octagon-fill\" style=\"text-decoration: none; color: white;\"></i>'),
('Mando', 7, '<i class=\"bi bi-controller\" style=\"text-decoration: none; color: white;\"></i>'),
('Carrito', 8, '<i class=\"bi bi-cart-fill\" style=\"text-decoration: none; color: white;\"></i>'),
('Corazon', 9, '<i class=\"bi bi-heart-fill\" style=\"text-decoration: none; color: white;\"></i>'),
('Cascos', 10, '<i class=\"bi bi-headphones\" style=\"text-decoration: none; color: white;\"></i>'),
('Global', 11, '<i class=\"bi bi-globe2\" style=\"text-decoration: none; color: white;\"></i>'),
('Mail', 12, '<i class=\"bi bi-envelope-fill\" style=\"text-decoration: none; color: white;\"></i>'),
('Dinero', 13, '<i class=\"bi bi-coin\" style=\"text-decoration: none; color: white;\"></i>'),
('Codigo', 14, '<i class=\"bi bi-code-slash\" style=\"text-decoration: none; color: white;\"></i>'),
('Avion', 15, '<i class=\"bi bi-airplane-fill\" style=\"text-decoration: none; color: white;\"></i>'),
('Nube', 16, '<i class=\"bi bi-cloud-rain-fill\" style=\"text-decoration: none; color: white;\"></i>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id_nota` int NOT NULL,
  `titulo` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `texto` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `id_icono` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_nota`, `titulo`, `fecha`, `texto`, `id_icono`) VALUES
(317, 'Naruto', '2023-04-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquam, nunc ac ultrices interdum, elit felis mattis velit, eget laoreet nulla eros et ex. Nulla efficitur porttitor orci, porta vehicula risus feugiat vel. Vestibulum eleifend nunc vitae hendrerit sodales. Vestibulum pretium auctor erat, ac lacinia lacus tincidunt ac. Donec sed sagittis arcu, in facilisis elit. Curabitur velit sem, semper sit amet turpis ut, blandit aliquet urna. Cras a leo id massa mollis maximus. Phasellus hendrerit diam et risus pulvinar, eget lobortis erat vulputate. Duis quis mauris ac turpis dignissim facilisis et in orci. Vivamus pellentesque nibh a eros luctus blandit. Curabitur commodo ipsum quis rutrum hendrerit. Etiam consequat ut orci sit amet malesuada. Pellentesque ut rhoncus arcu, vitae tincidunt nibh. Mauris rutrum tempor elit, vitae convallis tortor vulputate nec. Donec dictum dapibus gravida. Maecenas a enim at urna mattis volutpat.', 9),
(4887, 'Estopa', '2023-08-25', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquam, nunc ac ultrices interdum, elit felis mattis velit, eget laoreet nulla eros et ex. Nulla efficitur porttitor orci, porta vehicula risus feugiat vel. Vestibulum eleifend nunc vitae hendrerit sodales. Vestibulum pretium auctor erat, ac lacinia lacus tincidunt ac. Donec sed sagittis arcu, in facilisis elit. Curabitur velit sem, semper sit amet turpis ut, blandit aliquet urna. Cras a leo id massa mollis maximus. Phasellus hendrerit diam et risus pulvinar, eget lobortis erat vulputate. Duis quis mauris ac turpis dignissim facilisis et in orci. Vivamus pellentesque nibh a eros luctus blandit. Curabitur commodo ipsum quis rutrum hendrerit. Etiam consequat ut orci sit amet malesuada. Pellentesque ut rhoncus arcu, vitae tincidunt nibh. Mauris rutrum tempor elit, vitae convallis tortor vulputate nec. Donec dictum dapibus gravida. Maecenas a enim at urna mattis volutpat.\r\n\r\nDuis at mauris sit amet purus efficitur aliquet. Nulla volutpat sodales cursus. Aenean aliquet magna mollis efficitur scelerisque. Donec pellentesque nisi at aliquam commodo. Vivamus suscipit dapibus nibh. Donec imperdiet placerat purus. Duis a odio commodo, viverra sem cursus, vehicula magna. Ut pulvinar, erat id eleifend faucibus, mauris sem suscipit dolor, id varius risus libero in tellus. Aliquam non orci vestibulum, porta eros id, pulvinar urna. Nudanc vel velit metus. Etiam ut sodales nulla.', 10),
(8678, 'Programación :)', '2023-04-23', '<!DOCTYPE html>\r\n<html lang=\"en\">\r\n    <head>\r\n        <meta charset=\"UTF-8\">\r\n        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n        <title>Document</title>\r\n    </head>\r\n    <body>\r\n        Hola :P\r\n    </body>\r\n</html>', 14),
(27708, 'Nacimiento Jaime', '1947-01-28', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquam, nunc ac ultrices interdum, elit felis mattis velit, eget laoreet nulla eros et ex. Nulla efficitur porttitor orci, porta vehicula risus feugiat vel. Vestibulum eleifend nunc vitae hendrerit sodales. Vestibulum pretium auctor erat, ac lacinia lacus tincidunt ac. Donec sed sagittis arcu, in facilisis elit. Curabitur velit sem, semper sit amet turpis ut, blandit aliquet urna. Cras a leo id massa mollis maximus. Phasellus hendrerit diam et risus pulvinar, eget lobortis erat vulputate. Duis quis mauris ac turpis dignissim facilisis et in orci. Vivamus pellentesque nibh a eros luctus blandit. Curabitur commodo ipsum quis rutrum hendrerit. Etiam consequat ut orci sit amet malesuada. Pellentesque ut rhoncus arcu, vitae tincidunt nibh. Mauris rutrum tempor elit, vitae convallis tortor vulputate nec. Donec dictum dapibus gravida. Maecenas a enim at urna mattis volutpat.\r\n\r\nDuis at mauris sit amet purus efficitur aliquet. Nulla volutpat sodales cursus. Aenean aliquet magna mollis efficitur scelerisque. Donec pellentesque nisi at aliquam commodo. Vivamus suscipit dapibus nibh. Donec imperdiet placerat purus. Duis a odio commodo, viverra sem cursus, vehicula magna. Ut pulvinar, erat id eleifend faucibus, mauris sem suscipit dolor, id varius risus libero in tellus. Aliquam non orci vestibulum, porta eros id, pulvinar urna. Nunc vel velit metus. Etiam ut sodales nulla.\r\n\r\nSed vitae bibendum ex, at lacinia lectus. Vestibulum nibh quam, bibendum ac lacinia id, vehicula eu ante. Donec tincidunt quam id arcu lobortis eleifend. Nullam congue, ex a accumsan rhoncus, nulla arcu volutpat nisl, in ultrices tellus justo ut ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas scelerisque magna ac dignissim volutpat. Maecenas massa odio, auctor et dictum ac, sollicitudin in orci. Mauris congue varius neque. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas lobortis ipsum at magna convallis, at vestibulum elit tempor. Nunc egestas, ex eu vestibulum dignissim, elit metus varius magna, id malesuada sapien sapien at massa. Quisque eu semper justo. Ut ultrices ligula nec imperdiet placerat. Integer eu enim nec risus tincidunt tempus. Aenean bibendum sit amet nulla non vehicula. Nam eleifend dui lectus, et sagittis lorem venenatis et.', 1),
(66947, 'Obama', '2002-08-07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquam, nunc ac ultrices interdum, elit felis mattis velit, eget laoreet nulla eros et ex. Nulla efficitur porttitor orci, porta vehicula risus feugiat vel. Vestibulum eleifend nunc vitae hendrerit sodales. Vestibulum pretium auctor erat, ac lacinia lacus tincidunt ac. Donec sed sagittis arcu, in facilisis elit. Curabitur velit sem, semper sit amet turpis ut, blandit aliquet urna. Cras a leo id massa mollis maximus. Phasellus hendrerit diam et risus pulvinar, eget lobortis erat vulputate. Duis quis mauris ac turpis dignissim facilisis et in orci. Vivamus pellentesque nibh a eros luctus blandit. Curabitur commodo ipsum quis rutrum hendrerit. Etiam consequat ut orci sit amet malesuada. Pellentesque ut rhoncus arcu, vitae tincidunt nibh. Mauris rutrum tempor elit, vitae convallis tortor vulputate nec. Donec dictum dapibus gravida. Maecenas a enim at urna mattis volutpat.\r\n\r\nDuis at mauris sit amet purus efficitur aliquet. Nulla volutpat sodales cursus. Aenean aliquet magna mollis efficitur scelerisque. Donec pellentesque nisi at aliquam commodo. Vivamus suscipit dapibus nibh. Donec imperdiet placerat purus. Duis a odio commodo, viverra sem cursus, vehicula magna. Ut pulvinar, erat id eleifend faucibus, mauris sem suscipit dolor, id varius risus libero in tellus. Aliquam non orci vestibulum, porta eros id, pulvinar urna. Nunc vel velit metus. Etiam ut sodales nulla.\r\n\r\nSed vitae bibendum ex, at lacinia lectus. Vestibulum nibh quam, bibendum ac lacinia id, vehicula eu ante. Donec tincidunt quam id arcu lobortis eleifend. Nullam congue, ex a accumsan rhoncus, nulla arcu volutpat nisl, in ultrices tellus justo ut ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas scelerisque magna ac dignissim volutpat. Maecenas massa odio, auctor et dictum ac, sollicitudin in orci. Mauris congue varius neque. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas lobortis ipsum at magna convallis, at vestibulum elit tempor. Nunc egestas, ex eu vestibulum dignissim, elit metus varius magna, id malesuada sapien sapien at massa. Quisque eu semper justo. Ut ultrices ligula nec imperdiet placerat. Integer eu enim nec risus tincidunt tempus. Aenean bibendum sit amet nulla non vehicula. Nam eleifend dui lectus, et sagittis lorem venenatis et.\r\n\r\nNunc varius, leo id ullamcorper suscipit, nulla dolor varius arcu, a venenatis libero leo tempor tortor. Aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget metus orci. Praesent sit amet eros interdum, rutrum erat sit amet, cursus nulla. Suspendisse sit amet lectus eget tortor facilisis iaculis. Aenean non metus quis purus iaculis luctus. Sed justo orci, porta ut cursus sed, vestibulum nec erat. Fusce efficitur diam et ornare vestibulum. Fusce diam nulla, convallis quis purus ut, imperdiet rhoncus velit. Donec et leo eu mi pharetra aliquet a vel quam.\r\n', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `iconos`
--
ALTER TABLE `iconos`
  ADD PRIMARY KEY (`id_icono`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_icono` (`id_icono`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`id_icono`) REFERENCES `iconos` (`id_icono`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
