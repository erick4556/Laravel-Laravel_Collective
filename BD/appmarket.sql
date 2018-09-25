-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-09-2018 a las 11:03:50
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appmarket`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_producto` (IN `cod` INT)  BEGIN

select
	products.id,
    products.name as product,
    price,
    marks.name as mark
from
	products
inner join 
	marks on marks.id = products.marks_id
where
	marks.id = cod;


END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `callespoblaciones`
--

CREATE TABLE `callespoblaciones` (
  `idCalle` int(10) UNSIGNED NOT NULL,
  `CodPoblacion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CodPostal` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `callespoblaciones`
--

INSERT INTO `callespoblaciones` (`idCalle`, `CodPoblacion`, `nombre`, `CodPostal`) VALUES
(1, '7475647', 'Bugaba', '28738'),
(2, '763655', 'Aserrio', '90012');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marks`
--

CREATE TABLE `marks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `marks`
--

INSERT INTO `marks` (`id`, `name`) VALUES
(1, 'Estrella'),
(2, 'La Dulce'),
(3, 'Limpia todo'),
(4, 'Nissan'),
(5, 'Toyota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_30_040344_mark_table', 1),
(4, '2018_05_30_040448_product_table', 1),
(6, '2018_08_08_170101_callespoblaciones', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_venta`
--

CREATE TABLE `producto_venta` (
  `id` int(11) NOT NULL,
  `products_id` int(11) DEFAULT NULL,
  `venta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto_venta`
--

INSERT INTO `producto_venta` (`id`, `products_id`, `venta`) VALUES
(1, 2, 4),
(2, 5, 8),
(3, 2, 4),
(4, 3, 10),
(5, 2, 6),
(6, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `marks_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `marks_id`, `image`) VALUES
(2, 'La limpiadora', '36.80', 2, '1535140829.jpg'),
(3, 'Algo', '450.00', 3, '1535142010.jpg'),
(5, 'Azúcar', '56.35', 1, '1536972200.PNG'),
(33, 'Casa', '700.00', 1, NULL),
(34, 'fdf', '33.00', 5, NULL),
(35, 'fdfdf', '455.00', 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prueba', 'prueba@hotmail.com', '$2y$10$SIHKknG1xDgUHvLwxQn2B.z.dfFtsEU/zqjVztmBvHy92N3Gb1Xk2', 's9Gn24g8Uu7HALy34nUINFXnyEjngGSb9HPm4ZwUqghcncq3s4Qx3WlF7z3x', '2018-06-28 21:38:57', '2018-06-28 21:38:57'),
(2, 'developer', 'developers@hotmail.com', '$2y$10$bTDRV6DKEPKcOerDmwuiUu8shZSq/xola/yX0gjKinCxfB4TPi7PG', 'B2v7olicIM7VJk1742k2xptz1mdYcMr4ShPmgKqduAUQAXdoAIw0ko2WrZPD', '2018-07-16 22:02:31', '2018-07-16 22:02:31'),
(3, 'operador', 'operador@elcades.com', '$2y$10$hDj.bHHhK3n9RLtjejZr8uYEBlHxm.aQO0z.kbX9wBh02X7d/c7Dq', 'q2mGNuzKNY7KdsNhQCGTzUPBvxAOjFd9lj9ajOOwIspYM4vTRzZ89Xt13SPY', '2018-07-16 22:26:16', '2018-07-16 22:26:16'),
(4, 'aaa', 'aaa@hotmail.com', '$2y$10$rb0DYu53ukgYXfn3LkvE4OYAthDQeU3V11AzfEyHYXdvGi9wCzgCi', 'OzEK4RiCcdsrUjWy3G1vDsn55I5Dbyyznuk5dpGvvEz41CfOL1DMiu31txfA', '2018-07-16 22:46:45', '2018-07-16 22:46:45'),
(5, 'prueba', 'prueba12@hotmail.com', '$2y$10$njKPbo27jqnihoBpX0bhgevAY7rBlKpJ3lB4TGNacB06Nfxqac3ea', NULL, '2018-08-30 22:21:26', '2018-08-30 22:21:26'),
(6, 'test', 'test2@hotmail.com', '$2y$10$GAnrtBF4Rlj03.cT6e4VKu.6G.vnTX/NQ66MWYp8GWr4wd4j9ERUG', 'uSwugegSTg6V7wSKdYAI3pdlaaq7MEQON9CZbYQfMokaKLPuI8ZumtERk6NO', '2018-09-04 09:25:02', '2018-09-04 09:25:02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `callespoblaciones`
--
ALTER TABLE `callespoblaciones`
  ADD PRIMARY KEY (`idCalle`);

--
-- Indices de la tabla `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `producto_venta`
--
ALTER TABLE `producto_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_marks_id_foreign` (`marks_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `callespoblaciones`
--
ALTER TABLE `callespoblaciones`
  MODIFY `idCalle` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `producto_venta`
--
ALTER TABLE `producto_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_marks_id_foreign` FOREIGN KEY (`marks_id`) REFERENCES `marks` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
