-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2023 pada 05.05
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bokings`
--

CREATE TABLE `bokings` (
  `id_b` bigint(20) UNSIGNED NOT NULL,
  `id_buku` varchar(255) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `tgl_pinjam` varchar(255) NOT NULL,
  `tgl_balikin` varchar(255) NOT NULL,
  `nama_penjaga` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'redy',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bokings`
--

INSERT INTO `bokings` (`id_b`, `id_buku`, `nama_peminjam`, `tgl_pinjam`, `tgl_balikin`, `nama_penjaga`, `id_user`, `no_hp`, `status`, `created_at`, `updated_at`) VALUES
(2, '1', 'Arif Fadillah', '2023-07-22', '2023-07-23', '1', '1', '085161518757', 'expired', '2023-07-24 01:30:15', '2023-07-24 01:30:15'),
(3, '2', 'Ucup', '2023-07-23', '2023-07-23', '1', '1', '085161518757', 'expired', '2023-07-24 01:45:05', '2023-07-24 01:45:05'),
(4, '2', 'Zheta', '2023-07-24', '2023-07-24', '1', '1', '085161518757', 'expired', '2023-07-24 01:55:19', '2023-07-24 01:55:19'),
(5, '1', 'Arif Fadillah', '2023-07-24', '2023-07-24', '1', '1', '085161518757', 'expired', '2023-07-24 07:37:18', '2023-07-24 07:37:18'),
(6, '1', 'Ucup', '2023-07-24', '2023-07-25', '1', '1', '085161518757', 'redy', '2023-07-24 07:39:26', '2023-07-24 07:39:26'),
(7, '2', 'Rendy C', '2023-07-24', '2023-07-27', '1', '1', '085161518757', 'redy', '2023-07-24 07:40:23', '2023-07-24 07:40:23'),
(8, '3', 'Arif Fadillah', '2023-07-25', '2023-07-25', '1', '1', '085161518757', 'expired', '2023-07-25 06:46:09', '2023-07-25 06:46:09'),
(9, '11', 'Rendy', '2023-08-04', '2023-08-05', '3', '1', '081293772795', 'redy', '2023-08-04 02:54:19', '2023-08-04 02:54:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftarbukus`
--

CREATE TABLE `daftarbukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `jenis_buku` varchar(255) NOT NULL,
  `cover_buku` varchar(255) DEFAULT NULL,
  `buku` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `daftarbukus`
--

INSERT INTO `daftarbukus` (`id`, `judul`, `author`, `deskripsi`, `jenis_buku`, `cover_buku`, `buku`, `created_at`, `updated_at`) VALUES
(11, 'Hery Poter', 'J K rowling', 'Harry Potter is a series of seven fantasy novels written by British author J. K. Rowling. The novels chronicle the lives of a young wizard, Harry Potter, and his friends Hermione Granger and Ron Weasley, all of whom are students at', 'Pendidikan PJOK', 'thumbnail/ftABLqjhr5WEnbj7X4YF0GaOSsm71QFRIDUS4HSR.jpg', 'buku/w33lJKlLyFDrSjqNXUK2b8RuZgXGu8Bnc5ZJpwgC.docx', '2023-08-04 02:35:21', '2023-08-04 02:35:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisbukus`
--

CREATE TABLE `jenisbukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_buku` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenisbukus`
--

INSERT INTO `jenisbukus` (`id`, `jenis_buku`, `created_at`, `updated_at`) VALUES
(2, 'buku mtk', NULL, '2023-08-04 02:19:36'),
(3, 'Pendidikan PJOK', '2023-08-04 02:00:50', '2023-08-04 02:19:53'),
(4, 'Pendidikan', '2023-08-04 02:02:18', '2023-08-04 02:02:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_07_18_121803_create_registers_table', 3),
(8, '2023_07_18_132607_create_logins_table', 3),
(13, '2014_10_12_000000_create_users_table', 6),
(14, '2023_07_21_091233_create_penjagaperpuses_table', 6),
(15, '2023_07_22_091238_create_ratings_table', 6),
(16, '2023_07_21_023132_create_bokings_table', 7),
(19, '2023_07_19_021156_create_daftarbukus_table', 8),
(20, '2023_07_25_123358_create_jenisbukus_table', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjagaperpuses`
--

CREATE TABLE `penjagaperpuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_penjaga` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penjagaperpuses`
--

INSERT INTO `penjagaperpuses` (`id`, `nama_penjaga`, `no_hp`, `created_at`, `updated_at`) VALUES
(3, 'RENDY Ca', '085161518757', '2023-08-04 01:23:05', '2023-08-04 02:34:45'),
(4, 'RINO H', '085161518757', '2023-08-04 01:23:40', '2023-08-04 01:23:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ratings`
--

CREATE TABLE `ratings` (
  `id_r` bigint(20) UNSIGNED NOT NULL,
  `id_boking` varchar(255) NOT NULL,
  `komentar` varchar(255) DEFAULT NULL,
  `start_rate` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `waktu_rate` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ratings`
--

INSERT INTO `ratings` (`id_r`, `id_boking`, `komentar`, `start_rate`, `id_user`, `waktu_rate`, `status`, `created_at`, `updated_at`) VALUES
(3, '3', 'b aja', '2', '1', '2023-07-24 08:45:20', 'ada', '2023-07-24 01:45:20', '2023-07-24 01:45:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) DEFAULT 'user',
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Arif Fadillah', 'afifarif777@gmail.com', NULL, '$2y$10$ovyV1HSsckrKoOveLsxZyeeA63/svnXFDvqSh9p1Tq2QotIBAaY.q', 'user', 'user_image/ZzQLggqjXtyqgeIUEphlonXMWMNwFJR7M8RBg2lm.jpg', NULL, '2023-07-24 01:22:08', '2023-07-24 01:22:08'),
(2, 'udin petot', 'petot@gmail.com', NULL, '$2y$10$dP/uunwaWppolT90fQAideVvsfn0P8MMh.5p4woIWTz8Yd6ExO.x6', 'admin', NULL, NULL, '2023-07-24 01:42:10', '2023-07-24 01:42:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bokings`
--
ALTER TABLE `bokings`
  ADD PRIMARY KEY (`id_b`);

--
-- Indeks untuk tabel `daftarbukus`
--
ALTER TABLE `daftarbukus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jenisbukus`
--
ALTER TABLE `jenisbukus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penjagaperpuses`
--
ALTER TABLE `penjagaperpuses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id_r`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bokings`
--
ALTER TABLE `bokings`
  MODIFY `id_b` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `daftarbukus`
--
ALTER TABLE `daftarbukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenisbukus`
--
ALTER TABLE `jenisbukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `penjagaperpuses`
--
ALTER TABLE `penjagaperpuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id_r` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
