-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2019 a las 12:16:44
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `component_depot`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `name`, `surname`, `email`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Rodrigo', 'Díaz', 'admin@admin.com', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', '2019-11-07 22:08:10', '2019-11-07 22:08:10', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `admin_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `admin_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tarjetas gráficas', 'Tarjetas gráficas', '2019-11-07 22:08:10', '2019-11-07 22:08:10'),
(2, 1, 'Procesadores CPU', 'AMD e INTEL', '2019-11-24 22:08:10', '2019-11-24 22:08:10'),
(3, 1, 'Memoria RAM DDR4', 'Memoria RAM DDR', '2019-11-24 22:08:10', '2019-11-24 22:08:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `component_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `component_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Excelente tarjeta gráfica. La recomiendo para gamers', '2019-11-07 22:08:10', '2019-11-07 22:08:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `components`
--

CREATE TABLE `components` (
  `id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `admin_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `components`
--

INSERT INTO `components` (`id`, `category_id`, `admin_id`, `name`, `image_path`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Gigabyte GeForce GT 710 2GB GDDR', 'GT710.jpg', 'Disfruta de toda la potencia de esta Gigabyte GeForce GT 710 con 2GB de memoria y conectores de primera calidad chapados en oro, con conectores de gran superficie fabricadas para una durabilidad increible. Con conexiones HDMI, DVI y D-sub podrás conectar tus dispositivos favoritos a tu ordenador y poder disfrutar aun más de tu ordenador.', '2019-11-07 22:08:10', '2019-11-07 22:08:10'),
(2, 1, 1, 'Asus Dual GeForce RTX 2070 SUPER EVO OC Edition 8GB GDDR6', 'RTX2070.jpg', 'Gráfica ASUS Dual GeForce® RTX 2070 SUPER™ EVO OC edition 8GB GDDR6 con dos potentes ventiladores Axial-tech para disfrutar de juegos triple A y VR con frecuencias de refresco más altas.', '2019-11-25 11:21:31', '2019-11-25 11:21:31'),
(3, 1, 1, 'Asus GeForce GTX 1650 Dual 4GB OC GDDR5', 'GTX1650.jpg', 'La ASUS Dual GeForce® GTX 1650 está construida con el rendimiento gráfico de vanguardia de la galardonada arquitectura NVIDIA Turing ™ para potenciar sus juegos favoritos. Prepare el juego con un rendimiento que es dos veces más rápido que la GeForce GTX 950 y hasta un 70% más rápido que la GTX 1050. GeForce Experience te permite capturar y compartir videos, capturas de pantalla y transmisiones en vivo con amigos, mantener actualizados los controladores de GeForce y optimizar fácilmente la configuración del juego.', '2019-11-25 11:21:31', '2019-11-25 11:21:31'),
(4, 2, 1, 'AMD Ryzen 7 3800X 3.9GHz BOX', 'RYZEN3800X.jpg', 'Fabricados para rendir. Diseñados para ganar. Más velocidad. Más memoria. Mayor ancho de banda. Exígelos al máximo, exprime hasta la última gota de rendimiento, llévalos al límite. Los procesadores AMD Ryzen™ de 3ª generación se diseñaron para superar todas las expectativas y marcar un nuevo camino en materia de procesadores de alto rendimiento.\r\n\r\nLos procesadores AMD Ryzen™ de 3.ª generación nacen de la tecnología de fabricación más avanzada del mundo para garantizar un rendimiento ganador y un sistema con un funcionamiento asombrosamente refrigerado y silencioso.\r\n\r\nLos procesadores Ryzen de 3ª generación integran la primera plataforma de conectividad PCIe® 4.0 del mundo para poner en tus manos las tecnologías de motherboards, tarjetas gráficas y almacenamiento más avanzadas que existen.', '2019-11-25 11:21:31', '2019-11-25 11:21:31'),
(5, 2, 1, 'Intel Core i7-9700K 3.6Ghz', 'I79700K.jpg', 'Sólo compatible con sus placas base basadas en chipset de la serie 300, el procesador Intel Core i7-9700K 12M cache, hasta 4.90 GHz está diseñado para juegos, creación y productividad.\r\n\r\nTiene una velocidad de reloj base de 3.6 GHz y viene con características como la compatibilidad con Intel Optane Memory, el cifrado AES-NI, la tecnología Intel vPro, Intel TXT, la Protección de dispositivos Intel con Boot Guard, la tecnología de virtualización Intel VT-d para E / S.\r\n\r\nCon la tecnología Intel Turbo Boost Max 3.0, la frecuencia máxima de turbo que este procesador puede alcanzar es de 4.9 GHz. Además, este procesador cuenta con 8 núcleos con 6 subprocesos en un zócalo LGA 1151, tiene 12 MB de memoria caché y 16 líneas PCIe. Tener 8 núcleos permite que el procesador ejecute varios programas simultáneamente sin ralentizar el sistema, mientras que los 6 subprocesos permiten que una secuencia de instrucciones ordenada básica pase o sea procesada por un solo núcleo de CPU. Este procesador también admite memoria RAM DDR4-2666 de doble canal y utiliza tecnología de novena generación.', '2019-11-25 11:21:31', '2019-11-25 11:21:31'),
(6, 2, 1, 'AMD Ryzen 5 3600X 3.8GHz BOX', 'RYZEN3600X.jpg', 'Fabricados para rendir. Diseñados para ganar. Más velocidad. Más memoria. Mayor ancho de banda. Exígelos al máximo, exprime hasta la última gota de rendimiento, llévalos al límite. Los procesadores AMD Ryzen™ de 3ª generación se diseñaron para superar todas las expectativas y marcar un nuevo camino en materia de procesadores de alto rendimiento.\r\n\r\nLos procesadores AMD Ryzen™ de 3.ª generación nacen de la tecnología de fabricación más avanzada del mundo para garantizar un rendimiento ganador y un sistema con un funcionamiento asombrosamente refrigerado y silencioso.\r\n\r\nLos procesadores Ryzen de 3ª generación integran la primera plataforma de conectividad PCIe® 4.0 del mundo para poner en tus manos las tecnologías de motherboards, tarjetas gráficas y almacenamiento más avanzadas que existen.', '2019-11-25 11:21:31', '2019-11-25 11:21:31'),
(7, 3, 1, 'Adata XPG Spectrix D80 DDR4 3200 PC4-25600 16GB 2x8GB CL16 Negro', 'DDR43200SPECTRIS.jpg', 'Conoce la primera memoria RGB DDR4 del mundo con un sistema híbrido de enfriamiento de aire y líquido, el SPECTRIX D80. Utiliza una combinación de un disipador de calor líquido sellado herméticamente con fluido no conductor, y un disipador de calor de aluminio para proporcionar un enfriamiento térmico efectivo. Además, el disipador de calor líquido está iluminado con iluminación RGB para darle a tu equipo un toque distintivo.', '2019-11-25 11:21:31', '2019-11-25 11:21:31'),
(8, 3, 1, 'Corsair Dominator Platinum RGB DDR4 3200 SPD 2133 PC4-25600 16GB 2x8GB CL16', 'DDR43200CORSAIR.jpg', 'La memoria DDR4 CORSAIR DOMINATOR PLATINUM RGB redefine las memorias premium DDR4, con un diseño superior en aluminio, chips de memoria de alta frecuencia estrictamente verificados y 12 LED RGB CAPELLIX de direccionamiento individual y gran intensidad.\r\n', '2019-11-25 11:21:31', '2019-11-25 11:21:31'),
(9, 3, 1, 'Corsair Vengeance LPX DDR4 2400 PC4-19200 16GB 2x8GB CL16', 'DDR43200CORSAIRVEGEANCE.jpg', 'La memoria Vengeance LPX se ha diseñado para overclocking de alto rendimiento. El disipador de calor, fabricado en aluminio puro, permite una disipación térmica más rápida; la placa impresa de ocho capas administra el calor y proporciona una capacidad superior para incrementar el overclocking. Cada circuito integrado está seleccionado individualmente para el máximo potencial de rendimiento. El formato DDR4 está optimizado para las placas base Intel de la serie X99/100 Series más recientes y ofrece frecuencias más elevadas, mayor ancho de banda y menor consumo energético que los módulos DDR3.\r\n\r\nSe ha verificado la compatibilidad de los módulos Vengeance LPX DDR4 para toda las placas base de la serie X99/100 Series, lo que asegura un rendimiento rápido y fiable. Compatibilidad con XMP 2.0 para un overclocking automático sin problemas. Y están disponibles en distintos colores para combinar con su placa base, sus componentes, o sencillamente con su estilo personal.', '2019-11-25 11:21:31', '2019-11-25 11:21:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `component_id` int(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `component_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-11-07 22:08:10', '2019-11-07 22:08:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ratings`
--

CREATE TABLE `ratings` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `component_id` int(255) NOT NULL,
  `value` int(2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `component_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, '2019-11-07 22:08:10', '2019-11-07 22:08:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `nick` varchar(200) NOT NULL,
  `level` enum('novato','avanzado','experto') NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `nick`, `level`, `email`, `password`, `image_path`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Juan', 'Rivas', 'juanjo207', 'novato', 'juan@juan.com', '$2y$12$/KpQiMmVlvKXFTCZOQxtX.rilC7/bAONlGKtJ7vZJWv/KrM9EwSbu', NULL, '2019-11-07 22:08:10', '2019-11-07 22:08:10', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_admins_email` (`email`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_categories_name` (`name`),
  ADD KEY `fk_categories_admins` (`admin_id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_users` (`user_id`),
  ADD KEY `fk_comments_components` (`component_id`);

--
-- Indices de la tabla `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_components_name` (`name`),
  ADD KEY `fk_components_categories` (`category_id`),
  ADD KEY `fk_components_admins` (`admin_id`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_likes_users` (`user_id`),
  ADD KEY `fk_likes_components` (`component_id`);

--
-- Indices de la tabla `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ratings_users` (`user_id`),
  ADD KEY `fk_ratings_components` (`component_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_users_email_nick` (`email`,`nick`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `components`
--
ALTER TABLE `components`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_categories_admins` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_components` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`),
  ADD CONSTRAINT `fk_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `components`
--
ALTER TABLE `components`
  ADD CONSTRAINT `fk_components_admins` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `fk_components_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_likes_components` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`),
  ADD CONSTRAINT `fk_likes_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_ratings_components` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`),
  ADD CONSTRAINT `fk_ratings_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
