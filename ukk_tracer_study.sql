-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 03, 2025 at 12:08 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_tracer_study`
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
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2024_12_28_083652_create_database_tables', 1),
(5, '2024_12_28_085258_create_admin_table', 1);

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
('OxSJlJAr2KOF4oMoY5sYCAg0VE32XtSrLF92YM3u', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0Rkbm84YjZvRHVMQ0hsdnloRXVvVkt2cE9XQjBVYjdpbmxJZXRFZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1738541206);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` bigint UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$12$HWKkW8MjxO25uaWnyCLMTOOcDEZ2lOJF.gkvH254ADQv1WW4tDWYq', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alumni`
--

CREATE TABLE `tbl_alumni` (
  `id_alumni` bigint UNSIGNED NOT NULL,
  `id_tahun_lulus` bigint UNSIGNED NOT NULL,
  `id_konsentrasi_keahlian` bigint UNSIGNED NOT NULL,
  `id_status_alumni` bigint UNSIGNED NOT NULL,
  `nisn` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_depan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akun_fb` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `akun_ig` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `akun_tiktok` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_login` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_alumni`
--

INSERT INTO `tbl_alumni` (`id_alumni`, `id_tahun_lulus`, `id_konsentrasi_keahlian`, `id_status_alumni`, `nisn`, `nik`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_hp`, `akun_fb`, `akun_ig`, `akun_tiktok`, `email`, `password`, `status_login`, `created_at`, `updated_at`) VALUES
(3, 2, 2, 1, '111111111111', '111111111', 'ytta', 'ytta', 'L', 'surabaya', '2025-01-01', 'waru', '11111111111111', '-', '-', '-', 'user@example.com', '$2y$12$CONVzt/bsI2GpOSVjpCwb.gPLwJJEIObJ9x.6zn1AvCkoyG1Xs4E.', '0', '2025-01-13 17:45:31', '2025-01-13 17:45:31'),
(4, 4, 4, 2, '88888888888888', '88888888888888', 'ghost', 'ghost', 'L', 'surabaya', '2025-01-08', 'waru', '088888888888', 'ytta', 'ytta', 'ytta', 'tes@gmail.com', '$2y$12$zc6MyOFWgAhpIvw3Rv0YueSNW40TBtnBcM4GuGBsjFzThe63Sic26', '0', '2025-01-13 21:54:01', '2025-02-02 07:34:23'),
(5, 5, 1, 2, '11111111111111111', '11111111111111111', 'DyxX', 'Xyzaa', 'L', 'surabaya', '2025-01-08', 'waru', '088888888888', '-', '-', '-', 'ferdysaputra983@gmail.com', '$2y$12$OL3HcFrqp3HZrpT/YDPIveaW9kCDQF9sRzYeo.3cRAkj1FigUPfwK', '1', '2025-01-14 18:08:45', '2025-02-02 07:34:31'),
(7, 7, 4, 1, '7777777777', '7777777777', 'ghost', 'ghost', 'L', 'sby', '2025-01-08', 'sby', '777777777', NULL, NULL, NULL, 'ghost@gmail.com', '$2y$12$kMaJTBxfjWYohYjwVgn4zelzWuMMnBLGSN3TIv8Zl0H8A3mMCLhDy', '0', '2025-01-29 04:35:21', '2025-01-29 04:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bidang_keahlian`
--

CREATE TABLE `tbl_bidang_keahlian` (
  `id_bidang_keahlian` bigint UNSIGNED NOT NULL,
  `kode_bidang_keahlian` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_keahlian` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_bidang_keahlian`
--

INSERT INTO `tbl_bidang_keahlian` (`id_bidang_keahlian`, `kode_bidang_keahlian`, `bidang_keahlian`, `created_at`, `updated_at`) VALUES
(2, 'TI', 'Teknik Informatika', '2024-12-28 17:58:46', '2025-01-01 22:03:32'),
(3, 'TO', 'Teknik Otomotif', '2024-12-28 18:15:30', '2025-01-01 23:31:52'),
(5, 'TK', 'Teknik Ketenagalistrikan', '2025-01-01 22:07:05', '2025-01-01 23:33:51'),
(6, 'TM', 'Teknik Mesin', '2025-01-02 00:16:28', '2025-01-02 00:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konsentrasi_keahlian`
--

CREATE TABLE `tbl_konsentrasi_keahlian` (
  `id_konsentrasi_keahlian` bigint UNSIGNED NOT NULL,
  `id_program_keahlian` bigint UNSIGNED NOT NULL,
  `kode_konsentrasi_keahlian` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konsentrasi_keahlian` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_konsentrasi_keahlian`
--

INSERT INTO `tbl_konsentrasi_keahlian` (`id_konsentrasi_keahlian`, `id_program_keahlian`, `kode_konsentrasi_keahlian`, `konsentrasi_keahlian`, `created_at`, `updated_at`) VALUES
(1, 1, 'WEB', 'Pengembangan Web', '2025-01-02 00:14:25', '2025-01-02 00:14:25'),
(2, 4, 'CNC', 'Teknik CNC', '2025-01-02 00:18:10', '2025-01-02 00:18:10'),
(3, 2, 'MES', 'Mekanika Otomotif', '2025-01-02 00:29:05', '2025-01-02 00:29:05'),
(4, 3, 'KRM', 'Kendaraan Ringan Motor', '2025-01-02 00:30:30', '2025-01-02 00:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program_keahlian`
--

CREATE TABLE `tbl_program_keahlian` (
  `id_program_keahlian` bigint UNSIGNED NOT NULL,
  `id_bidang_keahlian` bigint UNSIGNED NOT NULL,
  `kode_program_keahlian` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_keahlian` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_program_keahlian`
--

INSERT INTO `tbl_program_keahlian` (`id_program_keahlian`, `id_bidang_keahlian`, `kode_program_keahlian`, `program_keahlian`, `created_at`, `updated_at`) VALUES
(1, 2, 'RPL', 'Rekayasa Perangkat Lunak', '2025-01-01 22:44:01', '2025-01-01 22:44:01'),
(2, 5, 'TITL', 'Teknik Instalasi Tenaga Listrik', '2025-01-01 22:47:10', '2025-01-01 22:47:10'),
(3, 3, 'TKR', 'Teknik Kendaraan Ringan', '2025-01-01 22:52:16', '2025-01-01 22:52:16'),
(4, 6, 'TPM', 'Teknik Pemesinan', '2025-01-02 00:16:56', '2025-01-02 00:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sekolah`
--

CREATE TABLE `tbl_sekolah` (
  `id_sekolah` bigint UNSIGNED NOT NULL,
  `npsn` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nss` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sekolah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sekolah`
--

INSERT INTO `tbl_sekolah` (`id_sekolah`, `npsn`, `nss`, `nama_sekolah`, `alamat`, `no_telp`, `website`, `email`, `created_at`, `updated_at`) VALUES
(1, '123456', '123456', 'SMK ANTARTIKA 1 SIDOARJO', 'Jl.Siwalanpanji, Kec. Buduran, Kab. Sidoarjo, Jawa Timur 61252, Indonesia', '+6231-8962851', 'www.smkantartika1sda.sch.id', 'smks.antartika1.sda@gmail.com', '2025-01-31 00:03:34', '2025-01-31 01:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_alumni`
--

CREATE TABLE `tbl_status_alumni` (
  `id_status_alumni` bigint UNSIGNED NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_status_alumni`
--

INSERT INTO `tbl_status_alumni` (`id_status_alumni`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bekerja', '2025-01-03 22:42:52', '2025-01-05 18:59:34'),
(2, 'Melanjutkan Pendidikan', '2025-01-03 22:44:54', '2025-01-03 22:44:54'),
(6, 'Tidak Bekerja', '2025-02-02 07:31:29', '2025-02-02 07:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tahun_lulus`
--

CREATE TABLE `tbl_tahun_lulus` (
  `id_tahun_lulus` bigint UNSIGNED NOT NULL,
  `tahun_lulus` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_tahun_lulus`
--

INSERT INTO `tbl_tahun_lulus` (`id_tahun_lulus`, `tahun_lulus`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, '2021', NULL, '2025-01-02 19:24:20', '2025-01-05 18:37:54'),
(3, '2022', NULL, '2025-01-05 21:06:04', '2025-01-05 21:06:04'),
(4, '2023', NULL, '2025-01-05 21:06:08', '2025-01-05 21:06:08'),
(5, '2024', NULL, '2025-01-05 21:06:11', '2025-01-05 21:06:11'),
(6, '2025', NULL, '2025-01-05 21:06:15', '2025-01-05 21:06:15'),
(7, '2026', NULL, '2025-01-13 00:33:11', '2025-01-13 00:33:11'),
(9, '2020', NULL, '2025-01-13 00:53:56', '2025-01-13 00:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimoni`
--

CREATE TABLE `tbl_testimoni` (
  `id_testimoni` bigint UNSIGNED NOT NULL,
  `id_alumni` bigint UNSIGNED NOT NULL,
  `testimoni` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_testimoni` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_testimoni`
--

INSERT INTO `tbl_testimoni` (`id_testimoni`, `id_alumni`, `testimoni`, `tgl_testimoni`, `created_at`, `updated_at`) VALUES
(4, 4, 'ffffffffff', '2025-01-17', '2025-01-16 22:42:41', '2025-01-16 22:42:41'),
(10, 5, 'sasfsafsf', '2025-01-31', '2025-01-31 01:24:19', '2025-01-31 01:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracer_kerja`
--

CREATE TABLE `tbl_tracer_kerja` (
  `id_tracer_kerja` bigint UNSIGNED NOT NULL,
  `id_alumni` bigint UNSIGNED NOT NULL,
  `tracer_kerja_pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracer_kerja_nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracer_kerja_jabatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracer_kerja_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracer_kerja_lokasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracer_kerja_alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracer_kerja_tgl_mulai` date NOT NULL,
  `tracer_kerja_gaji` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_tracer_kerja`
--

INSERT INTO `tbl_tracer_kerja` (`id_tracer_kerja`, `id_alumni`, `tracer_kerja_pekerjaan`, `tracer_kerja_nama`, `tracer_kerja_jabatan`, `tracer_kerja_status`, `tracer_kerja_lokasi`, `tracer_kerja_alamat`, `tracer_kerja_tgl_mulai`, `tracer_kerja_gaji`, `created_at`, `updated_at`) VALUES
(8, 5, 'Wiraswasta', 'Toko', 'Karyawan', 'Tetap', 'sby', 'sby', '2025-01-22', '1000000', '2025-01-21 17:27:35', '2025-02-02 02:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracer_kuliah`
--

CREATE TABLE `tbl_tracer_kuliah` (
  `id_tracer_kuliah` bigint UNSIGNED NOT NULL,
  `id_alumni` bigint UNSIGNED NOT NULL,
  `tracer_kuliah_kampus` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracer_kuliah_status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracer_kuliah_jenjang` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracer_kuliah_jurusan` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracer_kuliah_linier` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracer_kuliah_alamat` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_tracer_kuliah`
--

INSERT INTO `tbl_tracer_kuliah` (`id_tracer_kuliah`, `id_alumni`, `tracer_kuliah_kampus`, `tracer_kuliah_status`, `tracer_kuliah_jenjang`, `tracer_kuliah_jurusan`, `tracer_kuliah_linier`, `tracer_kuliah_alamat`, `created_at`, `updated_at`) VALUES
(9, 5, 'PENS', 'Aktif', 'S1', 'Teknik Informatika', '1', 'Surabaya', '2025-01-20 04:52:09', '2025-02-02 07:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_alumni`
--
ALTER TABLE `tbl_alumni`
  ADD PRIMARY KEY (`id_alumni`),
  ADD KEY `tbl_alumni_id_tahun_lulus_foreign` (`id_tahun_lulus`),
  ADD KEY `tbl_alumni_id_konsentrasi_keahlian_foreign` (`id_konsentrasi_keahlian`),
  ADD KEY `tbl_alumni_id_status_alumni_foreign` (`id_status_alumni`);

--
-- Indexes for table `tbl_bidang_keahlian`
--
ALTER TABLE `tbl_bidang_keahlian`
  ADD PRIMARY KEY (`id_bidang_keahlian`);

--
-- Indexes for table `tbl_konsentrasi_keahlian`
--
ALTER TABLE `tbl_konsentrasi_keahlian`
  ADD PRIMARY KEY (`id_konsentrasi_keahlian`),
  ADD KEY `tbl_konsentrasi_keahlian_id_program_keahlian_foreign` (`id_program_keahlian`);

--
-- Indexes for table `tbl_program_keahlian`
--
ALTER TABLE `tbl_program_keahlian`
  ADD PRIMARY KEY (`id_program_keahlian`),
  ADD KEY `tbl_program_keahlian_id_bidang_keahlian_foreign` (`id_bidang_keahlian`);

--
-- Indexes for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tbl_status_alumni`
--
ALTER TABLE `tbl_status_alumni`
  ADD PRIMARY KEY (`id_status_alumni`);

--
-- Indexes for table `tbl_tahun_lulus`
--
ALTER TABLE `tbl_tahun_lulus`
  ADD PRIMARY KEY (`id_tahun_lulus`);

--
-- Indexes for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `tbl_testimoni_id_alumni_foreign` (`id_alumni`);

--
-- Indexes for table `tbl_tracer_kerja`
--
ALTER TABLE `tbl_tracer_kerja`
  ADD PRIMARY KEY (`id_tracer_kerja`),
  ADD KEY `tbl_tracer_kerja_id_alumni_foreign` (`id_alumni`);

--
-- Indexes for table `tbl_tracer_kuliah`
--
ALTER TABLE `tbl_tracer_kuliah`
  ADD PRIMARY KEY (`id_tracer_kuliah`),
  ADD KEY `tbl_tracer_kuliah_id_alumni_foreign` (`id_alumni`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_alumni`
--
ALTER TABLE `tbl_alumni`
  MODIFY `id_alumni` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_bidang_keahlian`
--
ALTER TABLE `tbl_bidang_keahlian`
  MODIFY `id_bidang_keahlian` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_konsentrasi_keahlian`
--
ALTER TABLE `tbl_konsentrasi_keahlian`
  MODIFY `id_konsentrasi_keahlian` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_program_keahlian`
--
ALTER TABLE `tbl_program_keahlian`
  MODIFY `id_program_keahlian` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  MODIFY `id_sekolah` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_status_alumni`
--
ALTER TABLE `tbl_status_alumni`
  MODIFY `id_status_alumni` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_tahun_lulus`
--
ALTER TABLE `tbl_tahun_lulus`
  MODIFY `id_tahun_lulus` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  MODIFY `id_testimoni` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_tracer_kerja`
--
ALTER TABLE `tbl_tracer_kerja`
  MODIFY `id_tracer_kerja` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_tracer_kuliah`
--
ALTER TABLE `tbl_tracer_kuliah`
  MODIFY `id_tracer_kuliah` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_alumni`
--
ALTER TABLE `tbl_alumni`
  ADD CONSTRAINT `tbl_alumni_id_konsentrasi_keahlian_foreign` FOREIGN KEY (`id_konsentrasi_keahlian`) REFERENCES `tbl_konsentrasi_keahlian` (`id_konsentrasi_keahlian`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_alumni_id_status_alumni_foreign` FOREIGN KEY (`id_status_alumni`) REFERENCES `tbl_status_alumni` (`id_status_alumni`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_alumni_id_tahun_lulus_foreign` FOREIGN KEY (`id_tahun_lulus`) REFERENCES `tbl_tahun_lulus` (`id_tahun_lulus`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_konsentrasi_keahlian`
--
ALTER TABLE `tbl_konsentrasi_keahlian`
  ADD CONSTRAINT `tbl_konsentrasi_keahlian_id_program_keahlian_foreign` FOREIGN KEY (`id_program_keahlian`) REFERENCES `tbl_program_keahlian` (`id_program_keahlian`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_program_keahlian`
--
ALTER TABLE `tbl_program_keahlian`
  ADD CONSTRAINT `tbl_program_keahlian_id_bidang_keahlian_foreign` FOREIGN KEY (`id_bidang_keahlian`) REFERENCES `tbl_bidang_keahlian` (`id_bidang_keahlian`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  ADD CONSTRAINT `tbl_testimoni_id_alumni_foreign` FOREIGN KEY (`id_alumni`) REFERENCES `tbl_alumni` (`id_alumni`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_tracer_kerja`
--
ALTER TABLE `tbl_tracer_kerja`
  ADD CONSTRAINT `tbl_tracer_kerja_id_alumni_foreign` FOREIGN KEY (`id_alumni`) REFERENCES `tbl_alumni` (`id_alumni`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_tracer_kuliah`
--
ALTER TABLE `tbl_tracer_kuliah`
  ADD CONSTRAINT `tbl_tracer_kuliah_id_alumni_foreign` FOREIGN KEY (`id_alumni`) REFERENCES `tbl_alumni` (`id_alumni`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
