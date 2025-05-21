-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Bulan Mei 2025 pada 15.08
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_iku`
--

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
-- Struktur dari tabel `iku_1`
--

CREATE TABLE `iku_1` (
  `id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `select_id` char(36) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `iku_1`
--

INSERT INTO `iku_1` (`id`, `name`, `nim`, `select_id`, `description`, `file_name`, `file_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
('9eb580a6-1145-4b30-bf59-514234118a0b', 'widya', '21091397070', '9e58f81a-ff89-46c2-82bf-78f7735d07af', 'Melanjutkan Studi di Universitas Negeri Surabaya', 'contoh.webp', 'iku-1/1745023843134contoh.webp', '2025-04-18 17:50:46', '2025-04-18 17:50:54', NULL),
('9eb5848a-459b-4502-8a61-67dc090b917f', 'widya', '21091397070', '9e58f81a-f7bd-4a50-82ba-4afa88f72234', 'Bekerja di perusahaan', 'contohberkas.jpg', 'iku-1/1745024499265contoh berkas.jpg', '2025-04-18 18:01:39', '2025-04-18 18:01:39', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `iku_2`
--

CREATE TABLE `iku_2` (
  `id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `select_id` char(36) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `iku_2`
--

INSERT INTO `iku_2` (`id`, `name`, `nim`, `select_id`, `description`, `location`, `start_date`, `end_date`, `file_name`, `file_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
('9e5b7bc0-dad1-4733-ab58-aa1865e01d87', 'widya', '21091397070', '9e58f81b-073b-4d14-b0f4-0e6cec81d6c3', 'Studi Independen', 'PT Impactbyte Teknologi Edukasi', '2024-08-09', '2024-12-10', 'unesa.pdf', 'iku-2/1741157554803unesa.pdf', '2025-03-04 23:52:34', '2025-03-04 23:52:34', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `iku_3`
--

CREATE TABLE `iku_3` (
  `id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `select_id` char(36) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `iku_3`
--

INSERT INTO `iku_3` (`id`, `name`, `nip`, `select_id`, `description`, `location`, `start_date`, `end_date`, `file_name`, `file_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
('9e5b1c4a-5274-4e03-8935-e16393b95c42', 'Dodik Arwin Dermawan, S.ST., S.T., M.T.', '197801082000121001', '9e58f81b-0ed0-4782-ae11-1f0ab1858403', 'Konsultan', 'PT. Adyuta Bumi Indonesia', '2023-06-23', '2023-12-31', 'contohberkas.jpg', 'iku-3/1741141538784contoh berkas.jpg', '2025-03-04 19:25:38', '2025-03-04 19:26:49', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `iku_4`
--

CREATE TABLE `iku_4` (
  `id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `select_id` char(36) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `iku_4`
--

INSERT INTO `iku_4` (`id`, `name`, `nip`, `select_id`, `description`, `file_name`, `file_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
('9e5b243f-c4e0-4b87-b9ab-46a4d70d6c7e', 'Dodik Arwin Dermawan, S.ST., S.T., M.T.', '197801082000121001', '9e58f81b-154a-498c-af9e-2e0c014db330', 'Badan Nasional Sertifikasi Profesi (BNSP)  - Digital Marketing', 'contohberkas.jpg', 'iku-4/1741142873686contoh berkas.jpg', '2025-03-04 19:47:53', '2025-03-04 19:47:53', NULL),
('9e5b252c-5e83-4fcf-899f-19892b3643d0', 'I Gde Agung Sri Sidhimantra, S.Kom., M.Kom', '202111096', '9e58f81b-154a-498c-af9e-2e0c014db330', 'Microsoft Innovative Educator', 'contohberkas.jpg', 'iku-4/1741143028375contoh berkas.jpg', '2025-03-04 19:50:28', '2025-03-04 19:50:28', NULL),
('9e5b261a-3572-40bd-97a3-68bdfc8d4608', 'Dimas Novian Aditia Syahputra', '199611262024061002', '9e58f81b-1794-4b7c-8359-f945db36a98d', 'Pengantar Teknologi Informasi (Pengenalan IoT) - CV. REDANT PROJECT', 'unesa.pdf', 'iku-4/1741143184661unesa.pdf', '2025-03-04 19:53:04', '2025-03-04 19:53:04', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `iku_5`
--

CREATE TABLE `iku_5` (
  `id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `activity_type` varchar(255) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `iku_5`
--

INSERT INTO `iku_5` (`id`, `name`, `nip`, `activity_type`, `summary`, `description`, `location`, `file_name`, `file_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
('9e5b2172-d883-49b6-a32d-6a2339b4221a', 'Dodik Arwin Dermawan, S.ST., S.T., M.T.', '197801082000121001', 'Penelitian', 'Analysis of Usability Aspects in the Disability Work Center Application (GODISWORK)', 'International Joint Conference on Science\r\nand Engineering 2021 (IJCSE2021)', 'Proceedings of the International Joint Conference on Science and Engineering 2021 (IJCSE 2021)', 'unesa.pdf', 'iku-5/1741142403543unesa.pdf', '2025-03-04 19:40:03', '2025-03-04 19:43:18', NULL),
('9e5b22fa-4a0e-46fb-a46d-0245181b82d7', 'Dodik Arwin Dermawan, S.ST., S.T., M.T.', '197801082000121001', 'PKM', 'Komunipedia Website Integrasi Produk Unggulan Iptek Disabilitas', 'PSLD Universitas Negeri Surabaya', 'PSLD Universitas Negeri Surabaya', 'contohberkas.jpg', 'iku-5/1741142660706contoh berkas.jpg', '2025-03-04 19:44:20', '2025-03-04 19:44:20', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `iku_6`
--

CREATE TABLE `iku_6` (
  `id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `institution_type` varchar(255) DEFAULT NULL,
  `select_id` char(36) DEFAULT NULL,
  `nomor` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `iku_6`
--

INSERT INTO `iku_6` (`id`, `name`, `institution_type`, `select_id`, `nomor`, `start_date`, `end_date`, `file_name`, `file_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
('9e5b27d1-bfca-46a2-82a8-05e175e15053', 'Politeknik NSC Surabaya', 'Institusi Pendidikan Dalam Negeri', '9e58f81b-19ae-4909-b861-3662c80674c0', '061/UN38/KS/2021', '2025-03-05', '2025-03-31', 'unesa.pdf', 'iku-6/1741143472458unesa.pdf', '2025-03-04 19:57:52', '2025-03-04 19:57:52', NULL),
('9e5b282c-561b-45db-b706-679966084e88', 'PT. EDI INDONESI A', 'Dunia Usaha Dalam Negeri', '9e58f81b-1fd9-4ad3-bb01-dea8cd97266b', 'B/15019/UN38.23/KS.01/202 2', '2022-03-10', '2027-03-10', 'unesa.pdf', 'iku-6/1741143532186unesa.pdf', '2025-03-04 19:58:52', '2025-03-04 19:58:52', NULL),
('9e5b2897-b3f4-48e2-800d-fcbaaf5b1fb3', 'PT. Pelayaran Nasional Indonesia (Persero)', 'Instansi pemerintah, BUMN dan/atau BUMD', '9e58f81b-1c95-41b0-8d88-9c313a6cc5f8', '19061/UN38.23/KS.01/2022', '2022-02-14', '2022-08-14', 'contohberkas.jpg', 'iku-6/1741143602237contoh berkas.jpg', '2025-03-04 20:00:02', '2025-03-04 20:00:02', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `iku_7`
--

CREATE TABLE `iku_7` (
  `id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `credit_hours` varchar(255) DEFAULT NULL,
  `select_id` char(36) DEFAULT NULL,
  `output` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `iku_7`
--

INSERT INTO `iku_7` (`id`, `name`, `credit_hours`, `select_id`, `output`, `file_name`, `file_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
('9e5b2ae9-ac96-4297-b543-0fa360803cab', 'Pemrograman Web Lanjut', '2', '9e58f81b-23b9-48ae-89b2-de2f84fcb904', 'HKI', 'contohberkas.jpg', 'iku-7/1741143991793contoh berkas.jpg', '2025-03-04 20:06:31', '2025-03-04 20:06:31', NULL),
('9e5b2b31-cbf3-4596-84b9-a5948bb035eb', 'Pengantar Teknologi Informasi', '2', '9e58f81b-23b9-48ae-89b2-de2f84fcb904', 'Artikel', 'unesa.pdf', 'iku-7/1741144038834unesa.pdf', '2025-03-04 20:07:18', '2025-03-04 20:07:18', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `iku_8`
--

CREATE TABLE `iku_8` (
  `id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `banpt_rating` varchar(255) DEFAULT NULL,
  `banpt_start_date` date DEFAULT NULL,
  `banpt_end_date` date DEFAULT NULL,
  `international_rating` varchar(255) DEFAULT NULL,
  `international_start_date` date DEFAULT NULL,
  `international_end_date` date DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `iku_8`
--

INSERT INTO `iku_8` (`id`, `name`, `banpt_rating`, `banpt_start_date`, `banpt_end_date`, `international_rating`, `international_start_date`, `international_end_date`, `file_name`, `file_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
('9eb5938f-072c-4c32-a862-762117884af8', 'widya', 'unggul', '2025-04-19', '2025-04-25', NULL, NULL, NULL, 'contoh.webp', 'iku-8/1745027016856contoh.webp', '2025-04-18 18:43:39', '2025-04-18 18:43:39', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_02_01_130720_create_i_k_u1_s_table', 1),
(6, '2025_02_01_131156_create_select_lists_table', 1),
(7, '2025_02_04_144531_create_i_k_u2_s_table', 1),
(8, '2025_02_04_144543_create_i_k_u3_s_table', 1),
(9, '2025_02_04_144548_create_i_k_u4_s_table', 1),
(10, '2025_02_04_144551_create_i_k_u5_s_table', 1),
(11, '2025_02_04_144555_create_i_k_u6_s_table', 1),
(12, '2025_02_04_144558_create_i_k_u7_s_table', 1),
(13, '2025_02_04_144608_create_i_k_u8_s_table', 1),
(14, '2025_03_02_061556_create_permission_tables', 1),
(15, '2025_03_02_062414_alter_users_delete_column_role', 1),
(16, '2025_03_02_064041_add_column_to_permissions_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', '9e58f81c-08bb-47cf-97b9-dc74dd61ef74'),
(1, 'App\\Models\\User', '9e5902ae-148b-4e86-af4b-91cdc5c10163'),
(2, 'App\\Models\\User', '9e59021d-22da-4929-be7c-8f7cc07fb8fc'),
(3, 'App\\Models\\User', '9eb1a181-b5cd-4f08-82b5-7cc2769f2c33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `module_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'iku 1 lihat', 'iku 1', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(2, 'iku 1 cetak', 'iku 1', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(3, 'iku 1 tambah', 'iku 1', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(4, 'iku 1 edit', 'iku 1', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(5, 'iku 1 hapus', 'iku 1', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(6, 'iku 2 lihat', 'iku 2', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(7, 'iku 2 cetak', 'iku 2', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(8, 'iku 2 tambah', 'iku 2', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(9, 'iku 2 edit', 'iku 2', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(10, 'iku 2 hapus', 'iku 2', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(11, 'iku 3 lihat', 'iku 3', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(12, 'iku 3 cetak', 'iku 3', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(13, 'iku 3 tambah', 'iku 3', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(14, 'iku 3 edit', 'iku 3', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(15, 'iku 3 hapus', 'iku 3', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(16, 'iku 4 lihat', 'iku 4', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(17, 'iku 4 cetak', 'iku 4', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(18, 'iku 4 tambah', 'iku 4', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(19, 'iku 4 edit', 'iku 4', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(20, 'iku 4 hapus', 'iku 4', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(21, 'iku 5 lihat', 'iku 5', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(22, 'iku 5 cetak', 'iku 5', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(23, 'iku 5 tambah', 'iku 5', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(24, 'iku 5 edit', 'iku 5', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(25, 'iku 5 hapus', 'iku 5', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(26, 'iku 6 lihat', 'iku 6', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(27, 'iku 6 cetak', 'iku 6', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(28, 'iku 6 tambah', 'iku 6', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(29, 'iku 6 edit', 'iku 6', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(30, 'iku 6 hapus', 'iku 6', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(31, 'iku 7 lihat', 'iku 7', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(32, 'iku 7 cetak', 'iku 7', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(33, 'iku 7 tambah', 'iku 7', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(34, 'iku 7 edit', 'iku 7', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(35, 'iku 7 hapus', 'iku 7', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(36, 'iku 8 lihat', 'iku 8', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(37, 'iku 8 cetak', 'iku 8', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(38, 'iku 8 tambah', 'iku 8', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(39, 'iku 8 edit', 'iku 8', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(40, 'iku 8 hapus', 'iku 8', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(41, 'user lihat', 'user', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(42, 'user tambah', 'user', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(43, 'user edit', 'user', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(44, 'user hapus', 'user', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(45, 'hak akses lihat', 'hak akses', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(46, 'hak akses tambah', 'hak akses', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(47, 'hak akses edit', 'hak akses', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48'),
(48, 'hak akses hapus', 'hak akses', 'web', '2025-03-03 17:52:48', '2025-03-03 17:52:48');

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
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2025-03-03 17:52:48', '2025-03-03 18:19:07'),
(2, 'Admin', 'web', '2025-03-03 18:19:57', '2025-03-03 18:19:57'),
(3, 'test', 'web', '2025-04-16 19:37:59', '2025-04-16 19:37:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(36, 2),
(36, 3),
(37, 1),
(37, 2),
(37, 3),
(38, 1),
(38, 3),
(39, 1),
(40, 1),
(41, 1),
(41, 2),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(45, 2),
(46, 1),
(47, 1),
(48, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `select_lists`
--

CREATE TABLE `select_lists` (
  `id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `select_lists`
--

INSERT INTO `select_lists` (`id`, `name`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
('9e58f81a-f7bd-4a50-82ba-4afa88f72234', 'Mendapat pekerjaan yang layak', 'iku-1', '2025-03-03 17:52:48', '2025-03-03 17:52:48', NULL),
('9e58f81a-ff89-46c2-82bf-78f7735d07af', 'Melanjutkan studi', 'iku-1', '2025-03-03 17:52:48', '2025-03-03 17:52:48', NULL),
('9e58f81b-01d9-4c7c-8246-e9715a97f2b5', 'Menjadi wiraswasta', 'iku-1', '2025-03-03 17:52:48', '2025-03-03 17:52:48', NULL),
('9e58f81b-073b-4d14-b0f4-0e6cec81d6c3', 'Pengalaman di luar kampus', 'iku-2', '2025-03-03 17:52:48', '2025-03-03 17:52:48', NULL),
('9e58f81b-0a96-4014-b1ab-71f8187394a6', 'Meraih prestasi paling rendah tingkat nasional', 'iku-2', '2025-03-03 17:52:48', '2025-03-03 17:52:48', NULL),
('9e58f81b-0c20-4ae3-a7c5-3695217f13f6', 'Berkegiatan tridharma', 'iku-3', '2025-03-03 17:52:48', '2025-03-03 17:52:48', NULL),
('9e58f81b-0ed0-4782-ae11-1f0ab1858403', 'Bekerja sebagai praktisi', 'iku-3', '2025-03-03 17:52:48', '2025-03-03 17:52:48', NULL),
('9e58f81b-10ab-4a69-8a6a-1956e0c6a855', 'Membina mahasiswa', 'iku-3', '2025-03-03 17:52:48', '2025-03-03 17:52:48', NULL),
('9e58f81b-1264-4573-a490-e4e4ec269204', 'Berkualifikasi S3', 'iku-4', '2025-03-03 17:52:48', '2025-03-03 17:52:48', NULL),
('9e58f81b-154a-498c-af9e-2e0c014db330', 'Memiliki sertifikat kompetensi/profesi', 'iku-4', '2025-03-03 17:52:48', '2025-03-03 17:52:48', NULL),
('9e58f81b-1794-4b7c-8359-f945db36a98d', 'Pengalaman kerja sebagai praktisi', 'iku-4', '2025-03-03 17:52:48', '2025-03-03 17:52:48', NULL),
('9e58f81b-19ae-4909-b861-3662c80674c0', 'MoU', 'iku-6', '2025-03-03 17:52:48', '2025-03-03 17:52:48', NULL),
('9e58f81b-1c95-41b0-8d88-9c313a6cc5f8', 'MoA', 'iku-6', '2025-03-03 17:52:48', '2025-03-03 17:52:48', NULL),
('9e58f81b-1fd9-4ad3-bb01-dea8cd97266b', 'IA', 'iku-6', '2025-03-03 17:52:48', '2025-03-03 17:52:48', NULL),
('9e58f81b-215d-478c-a5ba-27f7ec0f2d15', 'case method', 'iku-7', '2025-03-03 17:52:48', '2025-03-03 17:52:48', NULL),
('9e58f81b-23b9-48ae-89b2-de2f84fcb904', 'team-based project', 'iku-7', '2025-03-03 17:52:48', '2025-03-03 17:52:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
('9e58f81c-08bb-47cf-97b9-dc74dd61ef74', 'Kaprodi', 'kaprodi@gmail.com', '2025-03-03 17:52:48', '$2y$10$MeeKoYyCWqOyPx6a6/LfAuMUIISE8rcyIztnM2CroK6sV4InaFAjK', 'Z7gRW50zq86SkLZo3IOifpcbq0mMI8Sdbm4C4EaWc27natD1hKwMGB8yoooq', '2025-03-03 17:52:48', '2025-03-03 18:21:40', NULL),
('9e59021d-22da-4929-be7c-8f7cc07fb8fc', 'GPM', 'gpm@gmail.com', '2025-03-03 18:20:44', '$2y$10$dthufhQXmqR.ePL6/k1oEu75coRbGa38cjghmlLgm9RhVVLAcLeVy', NULL, '2025-03-03 18:20:48', '2025-03-03 22:08:50', NULL),
('9e5902ae-148b-4e86-af4b-91cdc5c10163', 'Widya', 'widya@gmail.com', '2025-03-03 18:22:22', '$2y$10$d3yW4dFST2ip9Vya/QLxI.BfEcJYBHBNOSK0rJ4XhCfF17AdR19hi', 'F1WxBY41NSiUAcEJHdTtccUvMnTZGldaTDLo3vaD1IZZZgz6DDpX7D6GfO3i', '2025-03-03 18:22:22', '2025-03-03 18:22:22', NULL),
('9eb1a181-b5cd-4f08-82b5-7cc2769f2c33', 'upm', 'upm@gmail.com', '2025-04-16 19:39:20', '$2y$10$cfKGdOun/ybceJcZuE6uae1kTUIIHwyt2eAn6t7iKtU7a2WPZ2Q8y', NULL, '2025-04-16 19:39:20', '2025-04-16 19:39:20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `iku_1`
--
ALTER TABLE `iku_1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `iku_2`
--
ALTER TABLE `iku_2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `iku_3`
--
ALTER TABLE `iku_3`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `iku_4`
--
ALTER TABLE `iku_4`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `iku_5`
--
ALTER TABLE `iku_5`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `iku_6`
--
ALTER TABLE `iku_6`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `iku_7`
--
ALTER TABLE `iku_7`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `iku_8`
--
ALTER TABLE `iku_8`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `select_lists`
--
ALTER TABLE `select_lists`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
