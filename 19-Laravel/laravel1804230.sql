-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-05-2020 a las 15:32:57
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laravel1804230`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'imgs/no-article.png',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `articles_title_unique` (`title`),
  KEY `articles_user_id_foreign` (`user_id`),
  KEY `articles_category_id_foreign` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'imgs/no-category.png',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'xbox one', 'imgs/1590247612.png', 'Ipsum dolor sit amet, consectetur adipisicing elit. Soluta beatae accusamus fugiat.', NULL, '2020-05-23 20:26:52'),
(2, 'play station 4', 'imgs/1590247626.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta beatae accusamus fugiat', '2020-03-10 22:00:27', '2020-05-23 20:27:06'),
(3, 'pc gamer', 'imgs/1590247651.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta beatae accusamus fugiat', '2020-03-10 22:00:28', '2020-05-23 20:27:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_10_131447_create_categories_table', 1),
(5, '2020_03_10_131530_create_articles_table', 1),
(6, '2020_03_10_135249_alter_users_table_', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'imgs/no-photo.png',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Customer',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `phone`, `birthdate`, `gender`, `address`, `photo`, `role`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jeremias Sprinfiel', 'jeremias@gmail.co', 3128579812, '1994-09-12', 'Male', 'Calle Gato Negro', 'imgs/1590247357.jpeg', 'admin', 1, NULL, '$2y$10$Ti3YSGfA8PWUG0f5QmqzbuP0JT59SA7s0C0PU8ndPjFJAWo4si5.m', NULL, NULL, '2020-05-23 20:22:37'),
(2, 'simon osorio castaño', 'zaiimon3@gmail.com', 3194504535, '1997-05-03', 'Male', 'Calle de los Pajaros Caidos', 'imgs/no-photo.png', 'Admin', 1, NULL, 'iskj{dk{ñsdpi jpjkLKSKJVHJBSALSNALKDNDLQH OIHWLUBDJSKSNLKDWPFI', NULL, '2020-03-10 22:00:12', '2020-05-23 20:23:48'),
(4, 'Chelsie Russel', 'hagenes.anissa@example.net', 319236756, '2001-12-18', 'Female', '70653 Dolores Parks\nNew Mylene, OH 17155-8150', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:13', '$2y$10$n6.fic6/8V4EwB/bZUyysOM5z4QSZVRhNDdLGU.vd/0ZU6KxOKq.a', '9DpxoTwCxi', '2020-03-10 22:00:25', '2020-03-10 22:00:25'),
(7, 'Jerry Zulauf', 'brobel@example.net', 316808214, '1974-07-17', 'Male', '3272 Myrtie Squares\nParisianville, NE 39615', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:13', '$2y$10$bBwQVmLCa8NbOpH.47caCeJFOYNo04o.6CII0fJZTNk1eesPs6c7K', 'MRlrbePqQk', '2020-03-10 22:00:25', '2020-03-10 22:00:25'),
(8, 'Monique Williamson MD', 'kellie.treutel@example.net', 312247204, '1986-03-27', 'Male', '73930 Deckow Estates Apt. 381\nLarissaborough, CA 79177-8250', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:14', '$2y$10$sgPeugvQ0Vjqeia/ocVPYeM6QJ9KnQQjqPkXgN5/kbRuaAQFRDI0e', 'x5SjhcEYKc', '2020-03-10 22:00:25', '2020-03-10 22:00:25'),
(9, 'Jerry Keebler', 'gia06@example.net', 318511696, '2011-10-09', 'Female', '79748 Heidenreich Ports Apt. 288\nNew Herminiostad, CO 83644-8345', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:14', '$2y$10$4LTAAIng1dauURdpHlGc.Op.lhzU.YCTY5IC.GZR3jxHP4Aoqy4c.', 'YXYrkY7LWR', '2020-03-10 22:00:25', '2020-03-10 22:00:25'),
(10, 'Mr. Carlo Durgan', 'katheryn41@example.com', 311054378, '1995-07-31', 'Female', '58049 Selmer Corners Apt. 550\nLake Elishabury, CO 61747', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:14', '$2y$10$k7kFY48oiJrf58ZL1do6eOnT1fdCO63QMww/zALOewCYAi9bPsgQa', 'Ty4sa8lKDP', '2020-03-10 22:00:25', '2020-03-10 22:00:25'),
(11, 'Andres Shields', 'kevon.gutkowski@example.com', 314811729, '2007-12-11', 'Female', '95354 Rosanna Expressway Apt. 691\nEast Mohammed, MD 56758', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:14', '$2y$10$Jd0dOV2LvhYH.PF.VGdMaOSPaRYIg.vXKWu/OeKf/96olQSceNlm.', 'aoqV9Va0qo', '2020-03-10 22:00:25', '2020-03-10 22:00:25'),
(12, 'Alexandro Herzog', 'nhamill@example.com', 314121029, '1971-07-23', 'Male', '89167 Jacobs Stravenue\nCartwrighthaven, VT 23698-4730', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:15', '$2y$10$Wtdu1JTWdvpb4d22q.j0Rek5h/DA0egSLj.U5bV/8lLLbu.ztStiG', '1lDKhm1ddA', '2020-03-10 22:00:25', '2020-03-10 22:00:25'),
(13, 'Verda Thompson DDS', 'magdalen.jenkins@example.com', 311799707, '1975-10-17', 'Male', '5954 Lilyan Mill\nPort Myron, NM 18119-7980', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:15', '$2y$10$ZmgJEchh8Uaxsg4BI9y7ye718hzQeU.OVsK4OqQJv4R9owuByA3j2', 'BriX2PWM5z', '2020-03-10 22:00:25', '2020-03-10 22:00:25'),
(14, 'Dr. Chelsey Vandervort', 'elbert.hahn@example.net', 315929965, '1978-11-07', 'Male', '262 Lindsey Summit Apt. 138\nEast Dane, NE 77569-7949', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:15', '$2y$10$t/fs9BgV8yv/AXJPg3ynJOZSJd3oUIqFGld/Ii0Vf4BeT0UuLFb1y', 'M73YV9WRyl', '2020-03-10 22:00:25', '2020-03-10 22:00:25'),
(16, 'Libby Mohr', 'jblick@example.com', 315802396, '1976-10-08', 'Male', '366 Friesen Lakes Apt. 169\nIsadoreville, TX 22025', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:16', '$2y$10$GVIk/6JEDwp60H/86B3FB.PdH8G4bfT5jveoHNgp11TkA15zZTzry', 'KaFb4bUfFJ', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(17, 'Mr. Rodolfo Feil', 'otho94@example.net', 318844466, '1972-07-28', 'Male', '57123 Vicenta View Suite 092\nNew Murraystad, OH 73943', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:16', '$2y$10$eypeqUmkKuO6ywulXGDyp.4PQQ3guMMjs8luFFPJYiRG5VXmI0/te', 'lC4hebGhLF', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(18, 'Howard Hackett I', 'fstokes@example.net', 310611113, '1979-01-06', 'Male', '37387 Ronny Isle Suite 840\nNew Loyalfort, MT 49634-1692', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:16', '$2y$10$qaq3PKXYv7d9eVJ5tJr.oOb1p07SKJjv9Q.mwfEA99jetLFQb/3F.', '9UN1zVPtfJ', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(19, 'Mr. Luigi Trantow IV', 'xschultz@example.com', 314277940, '1974-07-04', 'Female', '5458 Lehner Wall\nHellenmouth, ME 40144-0777', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:16', '$2y$10$a3ywosmbhGz94cC2lnnQIOAm88ZvufjPryPH8/lutJhZ7uTpL3IZC', '6x5vwIwWb4', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(20, 'Twila Nader', 'dooley.katlyn@example.net', 317671527, '1979-09-07', 'Female', '3692 Virginia Mill Apt. 085\nBlandashire, SD 56945', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:17', '$2y$10$zs2HSZ2BJduUxQonOESRrOLU3kS1zZ30NpzkhQdIXtBdqH18Cqt.q', 'vdJb4cTqU0', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(21, 'Kristofer Jerde', 'anjali41@example.com', 311677415, '2003-12-19', 'Male', '5794 Norberto Vista Suite 814\nNorth Ritaside, ID 97746', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:17', '$2y$10$dE21FF8bA53QmEZCxHWXXu36cdfJAzbNTp0zbg0i0DIpsllFr32wi', 'yeZ093Fdmy', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(22, 'Susana O\'Hara', 'ulises92@example.org', 319283003, '1999-03-18', 'Female', '9022 Joy Dale\nLilianeton, MD 92444', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:17', '$2y$10$D9M555lYPo91KxqQnRhbSuImclZvs9tGBehuqUqhIQqnIIIETU33.', 'XgkYvc9Ikn', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(23, 'Prof. Jaiden Powlowski V', 'yadams@example.org', 316837333, '1971-03-23', 'Female', '5616 Coby Lakes Suite 028\nSouth Parker, MS 95755-1047', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:17', '$2y$10$vLYWNyKhG9PdvicpjRr1DOpY3bKJ.yrYZFPkXUIaB/ygn/CAfQBWm', 'vaLcQtMNSA', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(24, 'Elena Mertz', 'roberto82@example.net', 313912113, '1976-10-13', 'Female', '9264 Ansley Junction Apt. 827\nSouth Shaina, LA 39692', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:18', '$2y$10$BPbhMk5KRMo8dfQs8.uPXOGgUDzwmcWeYwKRu1zkyx80krwS195zW', '9j89UqyZkc', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(25, 'Agustin Wiegand', 'uharris@example.com', 316144167, '1980-10-16', 'Female', '2447 Janick Inlet Suite 503\nNew Duncanside, MN 43844-1512', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:18', '$2y$10$DXTK5zL9hvSWiimbA/cJsuAWudT92n1ikLiEnz7p4dHBPv/2oqaX2', 'F4niSCYjRl', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(26, 'Luisa Pouros MD', 'ryan.fern@example.com', 319493189, '1986-09-11', 'Female', '416 Alford Lights Suite 104\nSouth Webster, RI 10305-4586', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:18', '$2y$10$NF4g5iXl/7FWmqQipSqdlewUUHFGR2eyLIdU8ykXBa9sQeU3RKfyC', 'UIu4p3Rpq0', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(27, 'Misty Crooks', 'jweimann@example.com', 314863841, '1970-02-13', 'Male', '788 Simone Falls Suite 392\nSouth Frederichaven, WI 18574', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:18', '$2y$10$etQVZRRZs4SxUygTQLYItu1MLocNdxxxqyPBkRXfJHB9p7VYrSIgC', 'v8Yd2tz8R2', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(28, 'Bernita Abernathy', 'zprohaska@example.org', 310762961, '1983-08-18', 'Female', '701 Daniel Station Apt. 630\nRautown, DC 09365-6948', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:19', '$2y$10$M1WVV4A6NVALt4fECAedJuPJPXnFd1Tdm26vIqj43KE2zsuIHdRBW', 'trfi8pXrw9', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(29, 'Beryl Reynolds', 'dashawn95@example.org', 316829629, '2014-01-27', 'Male', '912 Curt Greens\nLake Kennithhaven, UT 00312-3919', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:19', '$2y$10$piyZu64Pzyqp/VjRbWnnQeeoV7rqpVlqu3jvQCoXimnBGkTO1x5Nm', 'qbXdTaWIRK', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(30, 'Keaton Cruickshank PhD', 'ratke.ressie@example.com', 318406604, '2002-07-19', 'Female', '97150 Anderson Valleys\nLondonburgh, IL 42299', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:19', '$2y$10$bLXuYtv3VVI.wgheJHRj6uuRPmJVMD1D5a9JRTtDCMXdbVbL2cEWK', 'lnlm1JQvAn', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(31, 'Alexa Olson V', 'markus50@example.org', 312340231, '1973-03-05', 'Male', '164 Haag Landing\nSouth Genevieve, MO 90177', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:19', '$2y$10$nVcnkKvjyKCD15OtoKqDs.F5hw3ZF/k1ZenV/VZrdOlKlMsPDvOjS', 'p6NfHf6VPk', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(32, 'Hardy Pouros', 'schuppe.zelma@example.org', 314503440, '1998-01-27', 'Male', '671 Lina Junctions Apt. 532\nAudreannemouth, NJ 09257-5507', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:19', '$2y$10$XGmVxewTN/7GQ1NHrH3cIejEHIxHUFdJ0sVUtn9ELzTqUTJ./cCLq', 'Ncvj2KEnoE', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(33, 'Dr. Meda Leffler DVM', 'zhirthe@example.org', 318745642, '2002-04-15', 'Female', '43844 Sawayn Stream\nKaleview, IN 84259', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:20', '$2y$10$0UQKIycVidJGtOg0XdhWq.nprBdgWmSZlKskQJIZbE0M5cQV/Ttpe', 'NNo2FyoAph', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(34, 'Tevin Nicolas', 'damion18@example.net', 312650923, '2010-04-04', 'Male', '90720 Guillermo Turnpike Apt. 666\nWisokyville, NE 47236', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:20', '$2y$10$38gWvgUsU6.vfMzYQQ3K3Oz.iPws/GbXSyDFnI3H./TCMT0qLVPEO', 'r4kbuCmkfJ', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(35, 'Ebony Hintz I', 'lucius04@example.com', 310042817, '1972-03-29', 'Male', '437 Adams Forges\nEast Coraton, UT 88815-2569', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:20', '$2y$10$Uc6hZSBC78hjfu0OJXHRz.NPsbLc1Pqii7qcS7ziOP1Bl0Y.bYW/C', 'NPXQmc6i8d', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(36, 'Dr. Lawrence Orn IV', 'fay00@example.com', 311667673, '1985-06-15', 'Female', '1112 Jacklyn Heights\nGerholdbury, AR 33125', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:20', '$2y$10$H1Z47C.U3WnsDXmda9G/cuJASIDnKUERxb2.9ec4dp/aD9ilV4Txy', 'ZM6fDw0ICp', '2020-03-10 22:00:26', '2020-03-10 22:00:26'),
(37, 'Shany Herman', 'jacynthe20@example.com', 315568639, '2018-12-04', 'Female', '4113 Kautzer Hollow\nEast Irving, NH 18028', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:21', '$2y$10$5HpK8WHyeee7lk4ypd8/RurNUZ/C4mSAGB9cAhGf5Lczu/bZVaf0W', 'olaTNtcafk', '2020-03-10 22:00:27', '2020-03-10 22:00:27'),
(38, 'Edward Bogisich', 'hector89@example.com', 319376235, '2001-04-08', 'Male', '3944 Darwin Road Apt. 015\nPort Roslynside, AZ 57186-1374', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:21', '$2y$10$qDaBkM8k2ke.yqF.H0s8ye3x5IdfcGuL4.1pKT2hiDLaaWqmtGqh6', 'fTAgsHfR4R', '2020-03-10 22:00:27', '2020-03-10 22:00:27'),
(39, 'Pascale Green', 'reynold85@example.com', 312503920, '1982-06-24', 'Female', '432 Turcotte Stream Suite 165\nLake Chloe, OK 65589', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:21', '$2y$10$m3K/Er3XZ9V/.tB5pseEZuxNP2W/fkUKZMGZzf9GlC/URTz7bZ9M2', '51pbbU7iRT', '2020-03-10 22:00:27', '2020-03-10 22:00:27'),
(40, 'Dayna Mills I', 'nolan.elijah@example.org', 314796677, '2001-01-21', 'Female', '5842 Schumm Pass\nWest Toni, OR 39262-8067', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:21', '$2y$10$xRk/UcDXIL5uDEmWzvL6o.uALpQhBRGQQznLIOzRmNBCkd0QqVwt.', 'v3cjyFV6P4', '2020-03-10 22:00:27', '2020-03-10 22:00:27'),
(41, 'Oren Dickinson', 'rita35@example.org', 310148678, '1997-06-01', 'Female', '75892 Lueilwitz Court\nNew May, NY 66913-2558', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:22', '$2y$10$AQH/3ZztIGl.cW0dbpdrVuLyll8ULXpElhqU5YmhypSLcqwJnkple', 'b39Tg4EoSY', '2020-03-10 22:00:27', '2020-03-10 22:00:27'),
(42, 'Miss Marguerite Stokes', 'aortiz@example.org', 310830592, '1994-04-14', 'Female', '60889 Raphaelle Meadows\nSouth Henry, OH 69924', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:22', '$2y$10$vu4q7C5978shQb4G3UCDx.atT3fFHa.oqyLD1Gq28.bDFgT.LOPAi', 'drqSGWGEmT', '2020-03-10 22:00:27', '2020-03-10 22:00:27'),
(43, 'Prof. Danielle Harvey', 'elijah.kuhn@example.com', 312262771, '1981-04-24', 'Female', '94514 Hester Ports\nAltenwerthport, NH 95848', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:22', '$2y$10$ZpsU2ZG9hP1CIsdC6W1sne/.2jY8T6EkVwGPn53FcAWydnqBSPU.W', 'uWpwVMl9GL', '2020-03-10 22:00:27', '2020-03-10 22:00:27'),
(44, 'Arne Corwin IV', 'dahlia.hessel@example.org', 318827841, '2000-06-06', 'Female', '1526 Leuschke Highway Apt. 283\nAbbottville, IN 46944-6924', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:22', '$2y$10$MBSMbDXJlpqe3XC.aYULoe0BL0Q7L.jhsu4uKsuA2pKvvWWnSyhLi', 'tKJ7328B7E', '2020-03-10 22:00:27', '2020-03-10 22:00:27'),
(45, 'Mrs. Frieda Fritsch Jr.', 'nathanael91@example.org', 318603764, '2012-12-15', 'Female', '609 Hill Mountain Suite 989\nPort Lonzo, WI 70588', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:23', '$2y$10$Kok5IcVmRmyiS6HI58xkZeJ8YUi2LZUcXyTiTec3bRnlciEYSCF0O', 'dLP1xIjiwj', '2020-03-10 22:00:27', '2020-03-10 22:00:27'),
(46, 'Ms. Etha Ledner', 'jkrajcik@example.org', 319096641, '2003-09-04', 'Male', '50080 Dietrich Bypass\nWillieville, VT 51802', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:23', '$2y$10$GYX4SCTC9fOzoR2mU5wJI.wsXAh0Y6dbB8tMDpfxreZTDoeWkY0fa', 'HiZtrwtkqw', '2020-03-10 22:00:27', '2020-03-10 22:00:27'),
(47, 'Dr. Jo Moore Jr.', 'torp.laurine@example.org', 317939991, '1979-09-08', 'Female', '23804 Lamar Motorway Suite 601\nNew Magdalenland, NJ 40928-0786', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:23', '$2y$10$SRhgyelQYqWOQWJH3qi/IOC4ASYH/uqe5rPxr7hFURp9MQ5EBlCjC', 'E2iq7q6Jg8', '2020-03-10 22:00:27', '2020-03-10 22:00:27'),
(48, 'Prof. Amina Sipes II', 'nwyman@example.org', 318413041, '1982-10-24', 'Female', '888 Alexis Walks Suite 563\nAshleighfurt, ND 76823-6771', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:23', '$2y$10$s/vJz7Ku4Haxf6aHDBYYc.r9dHJ7WtUiKdCQwrv2Fh5GnkUs./mbC', 'IX3KrvQNqw', '2020-03-10 22:00:27', '2020-03-10 22:00:27'),
(49, 'Sigurd Tromp', 'concepcion58@example.net', 312761629, '1990-02-04', 'Male', '283 Rodriguez Trail Apt. 379\nHesselshire, WI 37394-8478', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:24', '$2y$10$4MTlkxuDWj6aBBtIJuPg/.fSdFBOhmZ4FlTTKbHcjo3EttFf5wtuq', 'x5kiBeWxZV', '2020-03-10 22:00:27', '2020-03-10 22:00:27'),
(50, 'Mr. Bertrand Reichert', 'amani04@example.org', 318996922, '2003-07-15', 'Female', '242 Dare Key\nLuciennebury, VT 07514-5348', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:24', '$2y$10$xqmFebkUT/iN7LAR//7ih.CoUx6pWWwYdE.ZrahR8Io71RFfxv0bu', 'y4ocjHPHrW', '2020-03-10 22:00:27', '2020-03-10 22:00:27'),
(51, 'Prof. Breanna Little DDS', 'omedhurst@example.net', 315683985, '2012-10-12', 'Female', '6285 Mayert Highway\nAntoinettechester, WA 54946', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:24', '$2y$10$OBHllZ.g2hNulGkY5hisrei6j55kElsPH3X7TVfnHIN41WN68GR7K', 'p62UrG8kfA', '2020-03-10 22:00:27', '2020-03-10 22:00:27'),
(52, 'Fern Renner', 'powlowski.jane@example.net', 317369022, '1984-05-17', 'Male', '442 Yesenia Harbors Apt. 189\nLillianachester, AR 35042-1283', 'imgs/no-photo.png', 'Customer', 1, '2020-03-10 22:00:24', '$2y$10$ZCkDycfYya5hOQ/pU90kfutUUBWPLJ66CJx0ywu.Lg0lblaHXZg6i', 'sIbKJikEoI', '2020-03-10 22:00:27', '2020-03-10 22:00:27'),
(54, 'Luis Felipe', 'luis@gmail.com', 312334328, '1989-04-07', 'Male', 'Calle 12 # 12 -34', 'imgs/1588454542.jpeg', 'Customer', 1, '2020-04-28 06:39:37', '$2y$10$3DQ7j/J8vUwDJMNh8igLBOHI5TJetbPCCYDT6rLOLB870hKYBFDEa', 'GN9qzh53ErNMAA309wtZS9rH2qhgbknT7AfAmRAX5x82xP1F60YWr9OUytyC', '2020-04-28 06:39:37', '2020-05-03 02:22:22'),
(55, 'Elegancia la de Francia', 'elegancia@gmail.com', 3123445353, '1997-02-01', 'Male', 'Calle 34 # 23-12', 'imgs/1588810601.png', 'Customer', 1, '2020-05-07 05:16:41', '$2y$10$5UHW.gZzZbr/qeTrPZJYseCvNqIQ9EBS7fKMGov6r//Oj/pwmX8a2', 'qY8odkk2Oo', '2020-05-07 05:16:42', '2020-05-07 05:16:42'),
(56, 'Prueba Externa', 'prueba@externa.com', 312243322, '1992-02-03', 'Male', 'Calle 12 # 20 -21', 'imgs/no-photo.png', 'Customer', 1, NULL, '$2y$10$txcIE/qhjMn5Y1cNwhYxh.vC7W4jVqApz4tqvCtlMvw5FRIuekdJO', NULL, '2020-05-12 19:36:44', '2020-05-12 19:36:44'),
(57, 'Bob', 'bob@misena.edu.co', 8998787, '2000-03-12', 'Male', 'Calle 12', 'imgs/no-photo.png', 'Customer', 1, NULL, '$2y$10$CtXnwbETQsT87cBggo3F1eDxerVSfdOrx8xEXy6oIXIZK41wR2HQC', NULL, '2020-05-14 21:20:10', '2020-05-14 21:20:10'),
(58, 'Cheri', 'Cheri@misena.edu.co', 8998932, '2000-03-13', 'Female', 'Calle 13', 'imgs/no-photo.png', 'Customer', 1, NULL, '$2y$10$GLOfvG6yQWR7sOImZWsNrOtHo5BGpBi97sqMPJv46tnWw27R0DpXi', NULL, '2020-05-14 21:20:10', '2020-05-14 21:20:10'),
(59, 'Curt', 'Curt@misena.edu.co', 8998788, '2000-03-14', 'Male', 'Calle 14', 'imgs/no-photo.png', 'Customer', 1, NULL, '$2y$10$y5eVqYmFxDBlfiTn5XP3s.Q.354VupyKU4hYcEi50A4ajfbpKiE66', NULL, '2020-05-14 21:20:10', '2020-05-14 21:20:10'),
(60, 'Lottie', 'Lottie@misena.edu.co', 9838322, '2000-03-15', 'Female', 'Calle 15', 'imgs/no-photo.png', 'Customer', 1, NULL, '$2y$10$D3RjIi3ceWHlnx7K7xH4Ae41nLPqxhRzCRgDjZKXcrNoN0Fovh9oO', NULL, '2020-05-14 21:20:11', '2020-05-14 21:20:11'),
(61, 'Rasher', 'Rasher@misena.edu.co', 8998789, '2000-03-16', 'Male', 'Calle 16', 'imgs/no-photo.png', 'Customer', 1, NULL, '$2y$10$r0EpTh/CSgpDJsvEqD3G7OYCKjfvc8O.JqD1I2cESwwGenamlhAYi', NULL, '2020-05-14 21:20:11', '2020-05-14 21:20:11');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
