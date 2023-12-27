-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2023 pada 15.26
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview_bola`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `home_team_id` int(11) NOT NULL,
  `away_team_id` int(11) NOT NULL,
  `home_goal` int(11) NOT NULL,
  `away_goal` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matches`
--

INSERT INTO `matches` (`id`, `home_team_id`, `away_team_id`, `home_goal`, `away_goal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(41, 6, 7, 3, 1, '2023-12-27 13:25:56', '2023-12-27 13:25:56', '2023-12-27 13:25:56'),
(42, 7, 6, 2, 1, '2023-12-27 13:29:49', '2023-12-27 13:29:49', '2023-12-27 13:29:49'),
(43, 8, 9, 3, 1, '2023-12-27 13:29:49', '2023-12-27 13:29:49', '2023-12-27 13:29:49'),
(44, 6, 7, 1, 2, '2023-12-27 13:32:13', '2023-12-27 13:32:13', '2023-12-27 13:32:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `id_menu` varchar(45) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `urutan` varchar(45) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `name`, `id_menu`, `url`, `urutan`, `icon`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Dashboard', NULL, 'dashboard', NULL, 'icon-home', '2023-11-28 13:31:53', '2023-11-28 13:31:53', NULL),
(2, NULL, 'Data Klub', NULL, 'teams', NULL, 'icon-diamond', '2023-11-28 13:32:21', '2023-11-28 13:32:21', NULL),
(3, NULL, 'Data Pertandingan', NULL, 'matches', NULL, 'icon-diamond', '2023-11-28 13:33:08', '2023-12-27 13:19:49', NULL),
(4, NULL, 'Data Klasement', NULL, 'matches/klasemen', NULL, 'icon-diamond', '2023-12-27 13:20:31', '2023-12-27 13:20:31', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `slug` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, '2017-11-10 00:22:01', '2017-11-10 00:22:01', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_menus`
--

CREATE TABLE `role_menus` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `role_menus`
--

INSERT INTO `role_menus` (`id`, `role_id`, `menu_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(78, 1, 1, NULL, NULL, NULL),
(79, 1, 2, NULL, NULL, NULL),
(80, 1, 3, NULL, NULL, NULL),
(81, 1, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `poin` int(11) NOT NULL,
  `win_goal` int(11) NOT NULL,
  `lose_goal` int(11) NOT NULL,
  `win` int(11) NOT NULL,
  `lose` int(11) NOT NULL,
  `seri` int(11) NOT NULL,
  `playing` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `teams`
--

INSERT INTO `teams` (`id`, `name`, `city`, `poin`, `win_goal`, `lose_goal`, `win`, `lose`, `seri`, `playing`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Persija', 'Jakarta', 3, 3, 2, 1, 2, 0, 3, '2023-12-27 13:24:49', '2023-12-27 13:32:13', '2023-12-27 13:24:49'),
(7, 'Persib', 'Bandung', 6, 4, 1, 2, 1, 0, 3, '2023-12-27 13:25:00', '2023-12-27 13:32:13', '2023-12-27 13:25:00'),
(8, 'Persebaya', 'Surabaya', 3, 3, 0, 1, 0, 0, 1, '2023-12-27 13:25:13', '2023-12-27 13:29:49', '2023-12-27 13:25:13'),
(9, 'Arema', 'Malang', 0, 0, 1, 0, 1, 0, 1, '2023-12-27 13:25:23', '2023-12-27 13:29:49', '2023-12-27 13:25:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'lukman', '$2y$10$PIhiSIHui.HqMt88x0fmO.27YeuVTs8aM3PaoAjK2ukwnO/f/D0ti', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_menus_menus1_idx` (`parent_id`) USING BTREE;

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `role_menus`
--
ALTER TABLE `role_menus`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_role_menu_role1_idx` (`role_id`) USING BTREE,
  ADD KEY `fk_role_menu_menu1_idx` (`menu_id`) USING BTREE;

--
-- Indeks untuk tabel `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_users_roles1_idx` (`role_id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `role_menus`
--
ALTER TABLE `role_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
