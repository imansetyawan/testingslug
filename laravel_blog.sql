-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Nov 2016 pada 12.06
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_blog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(10) UNSIGNED NOT NULL,
  `judulartikel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pageview` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judulartikel`, `deskripsi`, `image`, `slug`, `created_at`, `updated_at`, `kategori_id`, `user_id`, `pageview`) VALUES
(1, 'sushi', 'Pernahkah kamu merasa lapar meski baru saja mengkonsumsi makanan? Hal ini biasanya terjadi saat kamu mengkonsumsi makanan tertentu dengan tujuan untuk ‘mengganjal perut’. Padahal seharusnya perutmu terbantu dan merasa kenyang meski untuk sementara. Jika k', 'sushi.jpg', 'sushi', '2016-11-24 20:28:47', '2016-11-24 20:28:47', 22, 1, 0),
(2, 'Pizza', 'Meski dianggap sebagai makanan berat pengganti nasi, makanan-makanan ini hanya menimbulkan masalah seperti roti tawar putih yang berbahan dasar tepung terigu dan pemanis. Karbohidrat olahannya cepat dicerna tubuh dan meningkatkan kadar gula dalam tubuh.\r\n', 'pizza.jpg', 'pizza', '2016-11-24 20:30:13', '2016-11-24 20:30:13', 22, 1, 0),
(3, 'Biskuit dan kue kering sering dikonsumsi untuk mengganjal perut yang lapar', 'Biskuit dan kue kering juga termasuk makanan olahan berbahan tepung dan gula. Makanan ini hanya akan mengenyangkan perut dalam jangka waktu yang sebentar dan memicu rasa lapar datang lagi dalam waktu singkat. Cara kerja gula ini kerap mengingatkan otak ka', 'biskuit.jpg', 'biskuit-dan-kue-kering-sering-dikonsumsi-untuk-mengganjal-perut-yang-lapar', '2016-11-24 20:32:56', '2016-11-24 20:32:56', 25, 1, 0),
(4, 'Minum jus yang ditambah gula bukannya sehat, tubuhmu justru jadi sarang lemak dan gula!', 'Pengolahan jus yang keliru seringkali menghilangkan nutrisi penting tertentu. Misalnya dengan menambahkan gula, terlalu banyak air dan penyaringan yang justru akan membuat jus kehilangan seratnya. Meminum segelas jus seperti ini dapat meningkatkan kadar g', 'minum jus.jpg', 'minum-jus-yang-ditambah-gula-bukannya-sehat-tubuhmu-justru-jadi-sarang-lemak-dan-gula', '2016-11-24 20:35:45', '2016-11-24 20:35:45', 23, 1, 0),
(5, 'Almond Cookies yang baik buat kesehatan matamu', 'Kacang almond kaya akan vitamin E, sehingga sangat baik buat mata. Vitamin E pada kacang terbukti bisa mencegah masuknya redikal bebas yang ganggu mata dan memperlambat perkembangan katarak. Dan karena kacang almond ini bagus untuk kesehatan mata, nggak a', 'almond.jpg', 'almond-cookies-yang-baik-buat-kesehatan-matamu', '2016-11-24 20:48:15', '2016-11-24 20:48:15', 25, 1, 0),
(6, 'Biar manfaatnya makin berasa, buatlah jus wortelmu lebih lezat dengan mencampurkan tomat ke dalamnya', 'Mencampurkan tomat ke dalam jus wortel bisa mengurangi mual dan membuat manfaatnya berlipat ganda, khususnya buat kesehatan mata.\r\n\r\nBahan-bahan:\r\n\r\n    100 gr tomat\r\n    75 gr wortel\r\n    1 sdm madu atau sirup gula\r\n    1 gelas air putih\r\n\r\nCara membuat:', 'jus.jpg', 'biar-manfaatnya-makin-berasa-buatlah-jus-wortelmu-lebih-lezat-dengan-mencampurkan-tomat-ke-dalamnya', '2016-11-24 20:49:59', '2016-11-25 02:43:40', 24, 1, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `induk_kategori`
--

CREATE TABLE `induk_kategori` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_induk_kategori` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `induk_kategori`
--

INSERT INTO `induk_kategori` (`id`, `nama_induk_kategori`, `created_at`, `updated_at`) VALUES
(1, 'olahraga', '2016-10-06 21:05:28', '2016-11-07 22:45:04'),
(2, 'fashion', '2016-10-06 21:05:47', '2016-10-06 21:05:47'),
(3, 'makanan', '2016-10-06 21:06:12', '2016-11-07 23:55:22'),
(4, 'minuman', '2016-10-06 21:06:31', '2016-11-07 23:56:18'),
(5, 'social', '2016-10-06 21:07:19', '2016-10-06 21:07:19'),
(7, 'politik', '2016-11-07 23:57:30', '2016-11-07 23:57:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info`
--

CREATE TABLE `info` (
  `id` int(10) UNSIGNED NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telp` char(27) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `info`
--

INSERT INTO `info` (`id`, `alamat`, `telp`, `Email`, `created_at`, `updated_at`) VALUES
(2, 'Paris Perancis', '08910111213', 'firdizf@gmail.com', '2016-11-08 02:27:29', '2016-11-25 02:49:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(10) UNSIGNED NOT NULL,
  `namakategori` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `indukkategori_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `namakategori`, `created_at`, `updated_at`, `indukkategori_id`, `slug`) VALUES
(22, 'makanan', '2016-11-24 02:47:39', '2016-11-24 02:47:39', 0, 'makanan'),
(23, 'minuman', '2016-11-24 02:48:45', '2016-11-24 02:48:45', 0, 'minuman'),
(24, 'softdrink', '2016-11-24 02:49:47', '2016-11-24 02:49:47', 23, 'softdrink'),
(25, 'snack', '2016-11-24 02:50:20', '2016-11-24 02:50:20', 22, 'snack'),
(26, 'buah - buahan', '2016-11-24 20:39:16', '2016-11-24 20:39:16', 0, 'buah-buahan'),
(27, 'sayuran', '2016-11-24 20:39:37', '2016-11-24 20:39:37', 0, 'sayuran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'asf', 'adrfirdi@gmail.com', 'fsag', 'FSAGD', '2016-11-22 20:25:31', '2016-11-22 20:25:31'),
(2, 'ASDFG', 'firdizf@gmail.com', 'DFG', 'EFGD', '2016-11-22 20:28:33', '2016-11-22 20:28:33'),
(3, 'qwsdef', 'adrfirdi@gmail.com', 'df', 'dfvb', '2016-11-22 20:31:48', '2016-11-22 20:31:48'),
(4, 'zaxs', 'adrianzf@gmail.com', 'asd', 'asdcvc', '2016-11-22 20:49:49', '2016-11-22 20:49:49'),
(5, 'adafa', 'adrianzuh@gmail.com', 'asdfg', 'sdfgh', '2016-11-22 20:57:27', '2016-11-22 20:57:27'),
(6, 'oiuyt', 'adrianzuh@gmail.com', 'kjhgf', 'oiu7yt', '2016-11-22 20:58:30', '2016-11-22 20:58:30'),
(7, 'sdfghjk', 'adrianzuh@gmail.com', 'asdf', 'ASDFGH', '2016-11-22 20:59:45', '2016-11-22 20:59:45'),
(8, 'zxcv', 'adrianzf@gmail.com', 'asdfg', 'asdfg', '2016-11-22 21:05:54', '2016-11-22 21:05:54'),
(9, 'asdfg', 'adrianzuh@gmail.com', 'aaaa', 'aaaaa', '2016-11-22 21:09:26', '2016-11-22 21:09:26'),
(10, 'aaa', 'adrianzuh@gmail.com', 'asdfg', 'asdfghjkl', '2016-11-22 23:02:22', '2016-11-22 23:02:22'),
(11, 'asd', 'adrianzuh@gmail.com', 'asdfg', 'asdf', '2016-11-22 23:07:17', '2016-11-22 23:07:17'),
(12, 'sxc', 'adrianzf@gmail.com', 'aa', 'aaaa', '2016-11-22 23:08:47', '2016-11-22 23:08:47'),
(13, 'rt', 'adrianzuh@gmail.com', 'dfg', 'dfgh', '2016-11-22 23:11:29', '2016-11-22 23:11:29'),
(14, 'asdasdff', 'adrianzf@gmail.com', 'asdfgasd', 'asasdf', '2016-11-23 20:49:09', '2016-11-23 20:49:09'),
(15, 'ASDFG', 'adrianzuh@gmail.com', 'asdfasd', 'sd', '2016-11-23 20:53:34', '2016-11-23 20:53:34'),
(16, 'asdasdff', 'adrianzf@gmail.com', 'asd', 'asdc', '2016-11-23 20:55:17', '2016-11-23 20:55:17'),
(17, 'sa', 'adrianzuh@gmail.com', 'asa', 'sadad', '2016-11-23 20:57:45', '2016-11-23 20:57:45'),
(18, 'oiuygt', 'adrianzf@gmail.com', 'uytfr', 'iuytrf', '2016-11-23 21:07:57', '2016-11-23 21:07:57'),
(19, 'oiuygt', 'firdizf@gmail.com', 'oiuhg', 'iuyt', '2016-11-23 21:12:18', '2016-11-23 21:12:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_09_21_040952_buat_table_kategori', 1),
('2016_09_21_042118_buat_table_artikel', 1),
('2016_09_15_080250_add_field_kategori_id_for_table_artikel', 2),
('2016_09_21_051654_insert_level_di_tabel_user', 2),
('2016_09_23_023254_buat_tabel_induk_kategori', 2),
('2016_09_23_024401_edit_schema_kategori', 2),
('2016_10_03_070147_create_role_table', 3),
('2016_09_29_044449_create_field_user_id_for_table_artikel', 4),
('2016_10_03_070216_create_table_rolesid_for_tabel_users', 4),
('2016_10_06_021040_create_table_tambahan_profil', 5),
('2016_10_18_043522_Create_coloumn_pageview', 6),
('2016_10_20_054045_edit_table_kategori', 6),
('2016_10_21_034548_tambah_kolom_verifikasiregis_pada_tabel_user', 6),
('2016_10_27_045031_create_table_info', 7),
('2016_10_27_065659_buat_table_subscriber', 7),
('2016_10_27_090610_tambah_column_users', 7),
('2016_11_22_051022_buat_tabel_message', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user', NULL, NULL),
(2, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `subscriber`
--

INSERT INTO `subscriber` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'adrfirdi@gmail.com', '2016-11-08 02:36:17', '2016-11-08 02:36:17'),
(2, 'firdizf@gmail.com', '2016-11-25 02:04:23', '2016-11-25 02:04:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles_id` int(10) UNSIGNED NOT NULL,
  `namalengkap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nomorhp` int(11) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `ttl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamatasli` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamatmalang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `roles_id`, `namalengkap`, `nomorhp`, `angkatan`, `ttl`, `alamatasli`, `alamatmalang`, `deskripsi`, `image`, `confirmed`, `confirmation_code`, `avatar`) VALUES
(1, 'adrian firdiansyah ', 'firdizf@gmail.com', '$2y$10$6txla4JT7vx6fZOTqsBkz.fzboF8/ZeOxn1S7bg9bj/qvFt8LFyuS', 'CdZeITnAPLIQn6UipbB9gQ5QIaoeTzNXxQelSUiy4o9B4E2qRSLDO6w60BGs', '2016-10-23 21:28:44', '2016-11-24 02:52:08', 2, 'adrian firdiansyah ', 2147483647, 14, 'singapore, 09 september 1996', 'Lamongan', 'Malang', '<p>good job guys<br></p>', '', 1, NULL, '1478581117.jpg'),
(2, 'adrian zuh', 'adrianzuh@gmail.com', '$2y$10$mIRe5IA7sB.SYwNt80bvF.BnPruUgTc.1.a0XiXu1UiFE02dOQaTG', 'nSiZEetCRxnsppYJuBh458P5r7YNEclyC5xTfPrepbPT12vwypMUvOOmOUck', '2016-11-13 21:52:31', '2016-11-13 23:55:30', 2, '', 0, 0, '', '', '', '', '', 1, '0', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikel_kategori_id_foreign` (`kategori_id`),
  ADD KEY `artikel_user_id_foreign` (`user_id`);

--
-- Indexes for table `induk_kategori`
--
ALTER TABLE `induk_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_indukkategori_id_foreign` (`indukkategori_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_roles_id_foreign` (`roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `induk_kategori`
--
ALTER TABLE `induk_kategori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artikel_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
