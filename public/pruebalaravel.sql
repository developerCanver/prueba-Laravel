-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2021 a las 15:31:35
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebalaravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marks`
--

CREATE TABLE `marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `marks`
--

INSERT INTO `marks` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'Mazda', 13, '2021-03-07 02:20:08', '2021-03-07 02:29:37'),
(5, 'Renault', 27, '2021-03-07 02:57:27', '2021-03-07 02:59:59'),
(6, 'Nissan', 27, '2021-03-07 02:59:38', '2021-03-07 03:00:06'),
(7, 'Toyota', 27, '2021-03-07 03:00:58', '2021-03-07 03:00:58'),
(8, 'BMW', 27, '2021-03-07 03:04:15', '2021-03-07 03:04:15'),
(9, 'Honda', 27, '2021-03-07 03:04:28', '2021-03-07 03:04:28'),
(12, 'Jaguar', 27, '2021-03-07 13:52:26', '2021-03-07 13:52:26'),
(14, 'Suzuki', 27, '2021-03-07 13:53:07', '2021-03-07 13:53:07'),
(15, 'Kia', 27, '2021-03-07 13:53:36', '2021-03-07 14:27:46');

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
(1, '2014_03_06_164847_create_rols_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_03_06_180416_create_marks_table', 1),
(6, '2021_03_06_181230_create_models_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `models`
--

CREATE TABLE `models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `models`
--

INSERT INTO `models` (`id`, `name`, `mark_id`, `created_at`, `updated_at`) VALUES
(5, 'ACOORD', 9, '2021-03-07 03:19:12', '2021-03-07 03:19:12'),
(7, 'CR-Z', 9, '2021-03-07 03:31:10', '2021-03-07 03:31:10'),
(8, '323', 5, '2021-03-07 03:37:57', '2021-03-07 03:37:57'),
(10, 'Besta', 15, '2021-03-07 14:16:30', '2021-03-07 14:16:30'),
(11, 'X1', 8, '2021-03-07 14:17:34', '2021-03-07 14:29:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$1zCqE8cwlCGfOAxejhBHl.cyhdlnhR0iIkeBasm7aboDGqdIugHRC', '2021-03-06 18:46:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rols`
--

CREATE TABLE `rols` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rols`
--

INSERT INTO `rols` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '2021-03-06 17:28:28', '2021-03-06 17:28:28'),
(2, 'Piloto', '2021-03-06 17:28:28', '2021-03-06 17:28:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `rol_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 'admin', 'admin@gmail.com', '2021-03-06 18:35:58', '$2y$10$5WjwDZpcoRrhIApXmrSvrOuYBLvuAKQn8hlDkFsIzp7cfS84XNxbe', 1, NULL, '2021-03-06 18:35:58', '2021-03-06 18:35:58'),
(25, 'Orlando', 'orlando@gmail.com', NULL, '$2y$10$RlImD3xM5CKKQod.lbbfn.kMmO/qS64sKSP5eUXRBKIggZyHr5AsO', 2, NULL, '2021-03-06 23:55:30', '2021-03-07 04:04:15'),
(27, 'canver', 'canver@gmail.com', NULL, '$2y$10$PAK/8nDzjWPRiNR6MCgAEO.SjwqIBYKI7uufg.ks.H.a55x5NSwJO', 2, NULL, '2021-03-07 00:05:44', '2021-03-07 00:05:44'),
(28, 'alejandra ramirez', 'alejandra@gmail.com', NULL, '$2y$10$UtINBCTaef0aF5ezWWna0e/KtwPogY.S/I.M7pEMN0mKhnn4M4YqS', 2, NULL, '2021-03-07 14:23:30', '2021-03-07 14:24:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marks_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `models_mark_id_foreign` (`mark_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_rol_id_foreign` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marks`
--
ALTER TABLE `marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `models`
--
ALTER TABLE `models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `rols`
--
ALTER TABLE `rols`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `models_mark_id_foreign` FOREIGN KEY (`mark_id`) REFERENCES `marks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `rols` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
