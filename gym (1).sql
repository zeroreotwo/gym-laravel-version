-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2026 at 12:17 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE `featured` (
  `id` int NOT NULL,
  `nama` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `keuntungan` text NOT NULL,
  `about` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_06_02_112119_create_paket', 2),
(5, '2026_06_03_070951_create_trainer', 3),
(6, '2026_06_03_095628_create_transaksi', 4);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hari` int NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `nama`, `tag`, `harga`, `hari`, `detail`, `created_at`, `updated_at`) VALUES
(3, 'Paket 1 Bulan', 'Paket Pemula', '260.000', 30, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum ipsa sit veritatis possimus, nemo minus obcaecati repellat inventore quaerat deserunt molestiae quod.', '2026-06-02 09:00:49', '2026-06-03 00:41:36'),
(4, 'Paket 3 bulan', 'Paket Pro', '480.000', 91, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum ipsa sit veritatis possimus, nemo minus obcaecati repellat inventore quaerat deserunt molestiae quod.', '2026-06-03 00:08:27', '2026-06-03 00:41:42'),
(5, 'Paket 1 Tahun', 'Paket Pro Max', '2.460.000', 365, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum ipsa sit veritatis possimus, nemo minus obcaecati repellat inventore quaerat deserunt molestiae quod.', '2026-06-03 00:08:54', '2026-06-03 00:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('AP6OB0lpWtGGvjsZ3Rj46eUJqPsB5XBpoqcpIDSN', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMVpOckh4eHpNdW1EaTVMMjhwZkE0N0FYWXFsTVVHQkhQemJvaWdRdSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1780488937);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hari` int DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`id`, `nama`, `harga`, `hari`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'Kardio & HIIT', '260.000', 30, 'Spesialis pembakaran lemak intensif dan peningkatan stamina jantung.', '2026-06-03 00:32:31', '2026-06-03 00:35:51'),
(3, 'Binaraga & Beban', '260.000', 30, 'Fokus pada pembentukan massa otot dan powerlifting dengan teknik aman.', '2026-06-03 00:37:15', '2026-06-03 00:37:15'),
(4, 'Yoga & Fleksibilitas', '260.000', 30, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo eius dicta voluptas inventore maiores tenetur labore dolores culpa voluptatibus, a unde nulla rem aliquid, officiis autem odio, dolorem praesentium ullam!', '2026-06-03 05:05:11', '2026-06-03 05:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paket_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trainer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `user_id`, `paket_id`, `trainer_id`, `discount`, `harga`, `status`, `gambar`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, '1', '0', '260.000', 'lunas', '', '2026-06-03 03:15:34', '2026-06-03 03:55:41'),
(2, '1', NULL, '1', '0', '260.000', 'lunas', '1780483930_Team work-bro.png', '2026-06-03 03:52:10', '2026-06-03 04:48:34'),
(3, '1', '4', NULL, '0', '480.000', 'lunas', '1780486088_pngtree-cartoon-rocket-ship-clipart-illustration-png-image_14113052.png', '2026-06-03 04:28:08', '2026-06-03 05:01:41'),
(4, '1', NULL, '4', '0', '260.000', 'lunas', '1780488337_Team work-bro.png', '2026-06-03 05:05:37', '2026-06-03 05:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int NOT NULL,
  `trainer_id` int NOT NULL,
  `paket_id` int NOT NULL,
  `paket_day` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainer_day` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `trainer_id`, `paket_id`, `paket_day`, `trainer_day`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@email.com', 1, 4, 4, '2026-09-02 12:01:41', '2026-07-03 12:05:46', NULL, '$2y$12$.yXWOO1jqoJoIMfO5f5SUOzj3BPkjnqZIv9skR6RPo9qRzSym/Uwm', NULL, '2026-06-02 04:51:41', '2026-06-03 05:05:46'),
(256, 'Dean Hintz', 'block.jovanny@example.org', 3, 3, 3, '2026-06-18', '2026-07-03', '2026-06-03 00:56:28', '$2y$12$7N2k4zk5iyT1jMhkZASg/uZoil.j35ltRJm.phaEZApN3plnnxOqO', NULL, '2026-06-03 00:56:42', '2026-06-03 00:56:42'),
(257, 'Favian Christiansen', 'arnulfo.wisoky@example.net', 3, 1, 3, '2026-06-13', '2026-06-18', '2026-06-03 00:56:29', '$2y$12$rVornsZVrNeb/z3QuoZgzeC80y0HDseWzmGc7zCFcuPv3nAcTzeC2', NULL, '2026-06-03 00:56:43', '2026-06-03 00:56:43'),
(258, 'Abbie Volkman', 'makayla.funk@example.com', 3, 1, 5, '2026-06-18', '2026-07-03', '2026-06-03 00:56:29', '$2y$12$GfsRsAcKhv8eIyZT4pizzOmHvrRw6cTAKica345bMzuH63uX3ye5G', NULL, '2026-06-03 00:56:43', '2026-06-03 00:56:43'),
(259, 'Sage Schaefer', 'abbigail.padberg@example.net', 3, 0, 0, '0', '0', '2026-06-03 00:56:29', '$2y$12$DJ/35v9ja6.q644ngj9H3uFHNcooiAP.aWnsHo/wWwJAZ6.G7vfXK', NULL, '2026-06-03 00:56:43', '2026-06-03 00:56:43'),
(260, 'Emerald Nicolas II', 'glubowitz@example.com', 3, 3, 5, '2026-06-18', '2026-07-03', '2026-06-03 00:56:29', '$2y$12$OlBtkhCNDFfO7/wpAUHk.edbn2SQJ9Pcv5UNaYcCGvHDrxGM650Dm', NULL, '2026-06-03 00:56:43', '2026-06-03 00:56:43'),
(261, 'Mr. Adrain Fay IV', 'sydnie.smith@example.net', 3, 0, 0, '0', '0', '2026-06-03 00:56:30', '$2y$12$1gAx3Vjyz6zrC8L3znvPGOG4t4kdypQP5EkDWLjSChqP1.bcYSCla', NULL, '2026-06-03 00:56:43', '2026-06-03 00:56:43'),
(262, 'Melyna Pagac', 'lynch.viola@example.net', 3, 0, 0, '0', '0', '2026-06-03 00:56:30', '$2y$12$tsE8jxZg/LXZFEAGpnqREOYR5SObD8XJsMgNY6F3zK8BXGcEihu22', NULL, '2026-06-03 00:56:43', '2026-06-03 00:56:43'),
(263, 'Prof. Alba Leffler DDS', 'ewyman@example.net', 3, 1, 3, '2026-06-13', '2026-06-03', '2026-06-03 00:56:30', '$2y$12$/7WWFxdfymiJLrw6ZBJAXemoFYuUfEOXiJAFQ7druVuNz8JhFEWy2', NULL, '2026-06-03 00:56:43', '2026-06-03 00:56:43'),
(264, 'Thalia Ward', 'korbin.moen@example.org', 3, 2, 4, '2027-06-03', '2026-07-03', '2026-06-03 00:58:02', '$2y$12$rxt2YjvFFZgRwOECgQAIBe3WFir/d67hl/Yl8EpGjCE1cw.jyreny', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(265, 'Antoinette Bins', 'marcelino.casper@example.org', 3, 1, 4, '2026-06-13', '2026-06-13', '2026-06-03 00:58:02', '$2y$12$zD0VjN9T7VS7YbKTzltcLekGiS9qGdB2Y.ICLvEZEFCkLD0CTIuoG', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(266, 'Martin Prohaska IV', 'eladio.rippin@example.net', 2, 0, 0, '0', '0', '2026-06-03 00:58:03', '$2y$12$CCT4ASenCTyIOTYxSLIzk.XV4VhMPlx32fGNM7H7OUFYbaeLiaQmW', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(267, 'Sydnie Yost', 'randal.bogan@example.net', 3, 3, 4, '2026-06-13', '2026-06-13', '2026-06-03 00:58:03', '$2y$12$X6TQmuMQDaolGXJB1QuqV.LNy.75Xc2FCrCEWYPYRJh3OYDqn6y52', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(268, 'Janiya Murphy', 'kunde.kaleb@example.org', 2, 0, 0, '0', '0', '2026-06-03 00:58:03', '$2y$12$9zWDKrSZhomAwWUnkZ6J9.gsx8MB9X1z./abuQIObEqWUjkGJdD8W', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(269, 'Francesco Kerluke II', 'patricia18@example.net', 2, 0, 0, '0', '0', '2026-06-03 00:58:04', '$2y$12$XYGxsxvsnK8at0NE1sui5ucrv5rBhnu39zLx4Tury5A4vKZReUQ4q', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(270, 'Braden Morissette', 'sydnee06@example.org', 3, 2, 5, '2026-06-13', '2026-06-18', '2026-06-03 00:58:04', '$2y$12$lJWRzZoKHrjY.CG9Qm2w/uhTC7BIEneLONM3L52AWF/89E9.7Sgl6', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(271, 'Kevin Renner', 'gleason.jessica@example.net', 3, 0, 0, '0', '0', '2026-06-03 00:58:05', '$2y$12$wK335i8VRowABKP/exqQkeY2KOULajio1MCMWfap/yBB3Fa6JfB82', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(272, 'Layla Lind DVM', 'jakubowski.euna@example.com', 2, 0, 0, '0', '0', '2026-06-03 00:58:05', '$2y$12$Whe8mEUvAeteIIWCFj7rY.EguyXL9UBnTehJ4LCGwbB7e4.uTdgk6', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(273, 'Clay Farrell', 'lebsack.jocelyn@example.com', 3, 0, 0, '0', '0', '2026-06-03 00:58:05', '$2y$12$T82WD0oCerOlzUvnYG8xre26gxj77Tk6EaW1bJ9MhE5lrNdVyD34O', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(274, 'Jamison Koch', 'bauch.layla@example.org', 3, 0, 0, '0', '0', '2026-06-03 00:58:06', '$2y$12$MVRtvRIgbW0zC3gIlyKmq.Ydp6etizKCYpy5KTcGOlzCeQre7V2tm', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(275, 'Malika Macejkovic', 'alice.crooks@example.org', 3, 2, 5, '2026-06-03', '2026-06-13', '2026-06-03 00:58:06', '$2y$12$aRUKei2pOPIzmPzhvHlafe5XMrJJJVV7NSWK3kKs6l3nIg4RXvKBe', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(276, 'Miss Dorris Kuhlman III', 'garnet.stehr@example.org', 2, 0, 0, '0', '0', '2026-06-03 00:58:06', '$2y$12$FbejPBmQMgtRXcuIUoPCKuDc1QdoBjpNf04UzZOM1dYp7msEWInbG', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(277, 'Reece Pouros', 'libby.huels@example.net', 3, 3, 4, '2027-06-03', '2026-06-03', '2026-06-03 00:58:07', '$2y$12$4.kUAYtW6oB.8XztExSIVuOIRxUehFlVzQ3pgxriHRP2wqrLybUhC', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(278, 'Lysanne McLaughlin II', 'nblick@example.net', 3, 2, 0, '2026-09-02', '2026-06-13', '2026-06-03 00:58:07', '$2y$12$heSXwO/JamCE4M5Vy2GtLODKCz/Bdvw19p4LqOHEg3vr1k5aUsXCu', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(279, 'Jasmin Hintz', 'glangworth@example.org', 2, 0, 0, '0', '0', '2026-06-03 00:58:07', '$2y$12$d2LazIbsmFalJWP.YDH7a.ui9r8PP25OxU/RDyfSMnM2RgGackGne', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(280, 'Abagail Moen', 'paolo.koelpin@example.org', 3, 3, 3, '2026-06-03', '2026-06-18', '2026-06-03 00:58:07', '$2y$12$u9KyXOGz8dr9HPxIdM9pKuCE7yvy1JS.M2P9tblMT00Na3LWoQQs6', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(281, 'Corene Rippin', 'lewis.stoltenberg@example.org', 3, 3, 4, '2026-06-03', '2026-06-03', '2026-06-03 00:58:08', '$2y$12$tch12eKkqMAXRWozAmcleOs1jjn3SHO08g9lru7G40fUr1HnmLoCC', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(282, 'Mr. Berta White', 'anjali83@example.net', 3, 1, 3, '2026-06-13', '2026-06-13', '2026-06-03 00:58:08', '$2y$12$VTK8CoVcRP1Kii2EFHFXG.bklibDfaM5g19x3MIbxCZZCKfj/E9eq', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(283, 'Rudolph Hintz III', 'thompson.andreanne@example.com', 3, 0, 0, '0', '0', '2026-06-03 00:58:08', '$2y$12$3.on5TUvA1dUIshsUIUnZuq7o6vLCgDJHdSAByz3/YL6PBqjqEPxC', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(284, 'Sydney Kris IV', 'rafael.pouros@example.org', 3, 3, 5, '2027-06-03', '2026-06-18', '2026-06-03 00:58:09', '$2y$12$/SceCj88ftGi2OkHe5DE9etl6EVq/68A5Pg9oGjhyy4K7mhVfceKO', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(285, 'Arnulfo Altenwerth', 'mmurazik@example.org', 3, 2, 3, '2026-06-03', '2026-06-18', '2026-06-03 00:58:09', '$2y$12$Zm2Slx3IoGDdAvcN0dyecea6n.m6//H4aig5DvahcqLvtptJYA6F6', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(286, 'Zander Lebsack MD', 'evalyn.dare@example.org', 2, 0, 0, '0', '0', '2026-06-03 00:58:09', '$2y$12$Im02TjFoUFd0xPGE6YR1B.usItimnpUKppX1PEo1gdLqZg5bPXBDS', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(287, 'Nyah Marquardt I', 'arvid43@example.net', 3, 2, 3, '2026-06-18', '2026-06-13', '2026-06-03 00:58:10', '$2y$12$t3e.vKEg6x8ajiDiUjrVtOquy6NHB7j2oFu5.968WPP96qSGenUeO', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(288, 'Ms. Gloria Swaniawski', 'america.greenfelder@example.com', 3, 0, 0, '0', '0', '2026-06-03 00:58:10', '$2y$12$2aVxT8PrERBOld32yk1SauHx3UMa6T/8TuDfJuP2/XVRgqQAJ8cOq', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(289, 'Rene Kris', 'arjun45@example.com', 3, 0, 0, '0', '0', '2026-06-03 00:58:10', '$2y$12$tAjgQOE2Q5j0yMwnA7m5LOukyFJTZNjEeQCcSqqa0HGuguQAQoF4O', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(290, 'Brody Goyette', 'tavares79@example.com', 3, 3, 4, '2026-09-02', '2026-06-13', '2026-06-03 00:58:10', '$2y$12$ros58om50uVmF25VpLvVHezyGouUh6XD3vK15U3eS/zTDvr/jQfFG', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(291, 'Prof. Dustin Kreiger', 'lritchie@example.org', 2, 0, 0, '0', '0', '2026-06-03 00:58:11', '$2y$12$52yY3wH2/NBFTm7DPB/dWeMubCoLkP/Rtep.0fg1/szRjAW5Di6Pe', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(292, 'Ollie Glover', 'hcasper@example.com', 2, 0, 0, '0', '0', '2026-06-03 00:58:11', '$2y$12$yAI.ZnZFflKM9QyMrHLy.OiYUoE9slCXZBBNJ3U1dsLV0Dq17stCG', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(293, 'Miss April Hill', 'torp.jarret@example.net', 3, 2, 4, '2026-06-18', '2026-07-03', '2026-06-03 00:58:11', '$2y$12$FVWtVztqqdCOlPaZAo0ZUu1gszozKIrgf08hu2QvJGKT.SJUs2unW', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(294, 'Ms. Krystal Boyer PhD', 'louisa.crooks@example.org', 3, 0, 0, '0', '0', '2026-06-03 00:58:12', '$2y$12$yxBg81fJX6Aud.Nb6zKk6uWJhcAb8EMA9XRCFI3iYlkxQbazxsWne', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(295, 'Tia Kunze', 'xwehner@example.org', 2, 0, 0, '0', '0', '2026-06-03 00:58:12', '$2y$12$p0mhAJqmXaLgs9/ehqxbkOeF7mTRslV0fnaWPfH8VYx956L.3Zrii', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(296, 'Zakary Cremin III', 'schaefer.jessyca@example.org', 3, 3, 5, '2026-07-03', '2026-06-13', '2026-06-03 00:58:13', '$2y$12$FWECNAZC7T.sCHDWBGGTUuDJjFtdqtJD6/i9MIxmENatB7.7E8ia.', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(297, 'Maria Klocko', 'wgusikowski@example.com', 3, 0, 0, '0', '0', '2026-06-03 00:58:13', '$2y$12$ht7.tczVds/zohsv6VwwT.c352gKAhKDVqY6H8.r0HggCSLh0xhra', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(298, 'Mr. Carter McDermott MD', 'abernathy.agnes@example.org', 3, 1, 5, '2026-06-18', '2026-06-13', '2026-06-03 00:58:14', '$2y$12$LJPojRW5xOBsAw2uTjC/Ju9.RXNMAEHZs5d/.bp3bs4tUoIWTR8N2', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(299, 'Sidney Gerhold', 'rice.werner@example.com', 3, 3, 3, '2026-06-18', '2026-06-03', '2026-06-03 00:58:14', '$2y$12$pcDpeA4IaK25WPjSIFKwG.N.KEKE5V6Jy6nwKAnxSBjP0UVDa6DWC', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(300, 'Emma Schmeler', 'demond.beahan@example.com', 3, 1, 5, '2026-09-02', '2026-06-03', '2026-06-03 00:58:15', '$2y$12$DDkgkxc/VFiNh41RoPXzkOne/uujxD0/HFOcZvjo6r6eV.EI.HQG.', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(301, 'Mr. Cooper Ritchie V', 'luella37@example.net', 3, 1, 5, '2026-09-02', '2026-06-18', '2026-06-03 00:58:15', '$2y$12$4K35iKdOMEpdtD27BANqguHCAjA/I58gpQwnKac0HAPuYZ0HM.MUO', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(302, 'Dr. Sanford Gleichner Jr.', 'whammes@example.com', 3, 3, 4, '2026-06-18', '2026-07-03', '2026-06-03 00:58:15', '$2y$12$lc0j1xY2Yq2SnPogkDbruOea9qNAjK5K5bs.6iuAPmGwE70bkzhmS', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(303, 'Hope Schinner IV', 'meda.kiehn@example.com', 3, 1, 4, '2026-06-03', '2026-06-03', '2026-06-03 00:58:16', '$2y$12$oXLUsa0Lh8o0a5pEyHh9wOWD8BCUnLxXfkyEy9MeIe8UpblgEGti.', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(304, 'Foster Green IV', 'vmosciski@example.org', 3, 0, 0, '0', '0', '2026-06-03 00:58:16', '$2y$12$P4E0nItp91v8CSEDUYHrWOyG5jciZzKE110VpOpKPdQ8oB9T3r1tC', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(305, 'Dr. Kiera King Jr.', 'zola.koch@example.org', 3, 1, 3, '2026-06-18', '2026-06-03', '2026-06-03 00:58:17', '$2y$12$PjzDVXNgy/VZGpR9JuhiouAqj78XxOJ/mfe2QNzqikydH.GQ5jUtG', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(306, 'Mr. Zander Pollich IV', 'jana.pacocha@example.net', 3, 1, 3, '2026-06-18', '2026-06-13', '2026-06-03 00:58:17', '$2y$12$XsUtwUMzeyBwCEOCyfPFkewE4JbgshSTYFhVfuFiRgppYyWo02.gm', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(307, 'Corene Torp', 'nasir.hintz@example.org', 2, 0, 0, '0', '0', '2026-06-03 00:58:18', '$2y$12$eH2FCIJXRWCd2s6dxzhhtOfRAfaQblttiwaWCP4UsVMHhp/gnhKXu', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(308, 'Brad Wilkinson PhD', 'astrid.aufderhar@example.com', 3, 0, 0, '0', '0', '2026-06-03 00:58:18', '$2y$12$YUHLXUeNBQqoT35K3Sf4G.tKHuYb/TmFL/zoUkI2a3Lv4KSS.zIzC', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(309, 'Scotty Quitzon', 'rosina.hoppe@example.com', 3, 2, 4, '2027-06-03', '2026-07-03', '2026-06-03 00:58:19', '$2y$12$WurDQZWlvktwEr6xyyf1SuXkKfKe7Y.WtYVsPNCxtRdfEtyxnpqr6', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(310, 'Mr. Humberto Hilpert', 'ebednar@example.org', 3, 0, 0, '0', '0', '2026-06-03 00:58:19', '$2y$12$fsm.LflJa9T7g2twLBjW7.FwNpy41SXUDLbAI9GDjD04Yfvv6aaKy', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(311, 'Bell Harber', 'bridie.krajcik@example.org', 3, 2, 0, '0', '2026-06-18', '2026-06-03 00:58:20', '$2y$12$P9Y0Yurg7zeWtkurugIQfuPf16yaygptj.A7gwIhVCW60XvRdtSlG', NULL, '2026-06-03 00:58:22', '2026-06-03 02:00:43'),
(312, 'Edyth Bahringer', 'mclaughlin.kevin@example.org', 3, 0, 0, '0', '0', '2026-06-03 00:58:20', '$2y$12$Pkzdg/Rph/82DDkjDIL18.xSdMR1StMNDZcX9h.aaT/JL.eWwiAg6', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22'),
(313, 'Joshuah Rosenbaum', 'icie37@example.com', 3, 1, 4, '2026-06-03', '2026-06-18', '2026-06-03 00:58:21', '$2y$12$oobklgoGsgdJl15.MrjxtubWHZOjGTCo3/KsFrQkz/17VxYTHE1Ja', NULL, '2026-06-03 00:58:22', '2026-06-03 00:58:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `featured`
--
ALTER TABLE `featured`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
