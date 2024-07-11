-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 31 May 2024, 22:33:24
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `obs-laravel`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adminbilgisi`
--

CREATE TABLE `adminbilgisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numara` varchar(255) NOT NULL DEFAULT '83343',
  `bolum` varchar(255) NOT NULL,
  `isim` varchar(255) NOT NULL,
  `soyad` varchar(255) NOT NULL,
  `fakulte` varchar(255) NOT NULL,
  `danısmansınıf` varchar(255) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `adminbilgisi`
--

INSERT INTO `adminbilgisi` (`id`, `numara`, `bolum`, `isim`, `soyad`, `fakulte`, `danısmansınıf`, `sifre`, `created_at`, `updated_at`) VALUES
(1, '83343', 'Bilgisayar Mühendisliği', 'Ahmet ', 'Yılmaz', 'Mühendislik Fakültesi', '3', '123', NULL, NULL),
(3, '833431', 'Bilgisayar Mühendisliği', 'Ahmet ', 'Yılmaz', 'Mühendislik Fakültesi', '4', '123', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ders_programi`
--

CREATE TABLE `ders_programi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ders_kodu` varchar(255) NOT NULL,
  `ders_adi` varchar(255) NOT NULL,
  `ders_kredisi` varchar(255) NOT NULL,
  `ders_Ogretmen` varchar(255) NOT NULL,
  `zorunlu_secmeli` enum('Zorunlu','Secmeli') DEFAULT NULL,
  `ders_AKTS` varchar(255) DEFAULT NULL,
  `ders_Saati` varchar(255) DEFAULT NULL,
  `ders_sinif` varchar(255) DEFAULT NULL,
  `donem` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `ders_programi`
--

INSERT INTO `ders_programi` (`id`, `ders_kodu`, `ders_adi`, `ders_kredisi`, `ders_Ogretmen`, `zorunlu_secmeli`, `ders_AKTS`, `ders_Saati`, `ders_sinif`, `donem`, `created_at`, `updated_at`) VALUES
(1, 'bm-1', 'Kesikli Matematik', '5', 'Ali Rıza', 'Zorunlu', '10', '4', '2', '3', NULL, NULL),
(2, 'bm-2', 'Görsel Programlama', '5', 'Meliha Çek', 'Zorunlu', '9', '3', '3\r\n', '6', NULL, NULL),
(3, 'bm-3', 'Veri Yapıları', '7', 'Sertan Alkan', 'Secmeli', '6', '6', '2', '3', NULL, NULL),
(4, 'bm-4', 'Java', '8', 'Ali Yıldız', 'Zorunlu', '5', '6', '4', '8', NULL, NULL),
(5, 'bm-5', 'Algoritma\r\n', '8', 'Bahar Yeşil', 'Zorunlu', '5', '6', '4', '7', NULL, NULL),
(6, 'bm-6', 'Bilgisayar Mimarisi', '8', 'Orkun Çan', 'Zorunlu', '5', '6', '3', '5', NULL, NULL),
(7, 'bm-7', 'Anolog elektronik', '8', 'leyla Çan', 'Zorunlu', '5', '6', '1', '1', NULL, NULL),
(8, 'bm-8', 'Temel Devre Bileşenleri', '8', 'Şeyma Çelik', 'Zorunlu', '5', '6', '1', '1', NULL, NULL),
(9, 'bm-9', 'Matematik', '8', 'Ahmet Akıncı', 'Zorunlu', '5', '6', '1', '2', NULL, NULL),
(10, 'bm-10', 'Sistem Modelleme', '8', 'Pelin Yar', 'Zorunlu', '5', '6', '1', '2', NULL, NULL),
(11, 'bm-11', 'Diferansiyel Denklemler', '5', 'Murat Önal', 'Zorunlu', '10', '4', '2', '4', NULL, NULL),
(12, 'bm-12', 'Python', '5', 'Orhan Sandım', 'Zorunlu', '10', '4', '2', '4', NULL, NULL),
(13, 'bm-13', 'Web Programlama', '8', 'Hasan Tümer ', 'Zorunlu', '5', '6', '3', '5', NULL, NULL),
(14, 'bm-14', 'Veri Tabanı Yönetimi', '5', 'Kemal Turan', 'Zorunlu', '9', '3', '3\r\n', '6', NULL, NULL),
(15, 'bm-15', 'Etik\r\n', '8', 'Hüseyin Çay', 'Zorunlu', '5', '6', '4', '7', NULL, NULL),
(16, 'bm-16', 'Temel Kodlama', '8', 'İlayda Akçay', 'Zorunlu', '5', '6', '4', '8', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
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
-- Tablo için tablo yapısı `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(160, '0001_01_01_000000_create_users_table', 1),
(161, '0001_01_01_000001_create_cache_table', 1),
(162, '0001_01_01_000002_create_jobs_table', 1),
(163, '2024_05_10_064907_create_ogrenci_table', 1),
(164, '2024_05_13_072055_create_ders_programi', 1),
(165, '2024_05_15_102935_add_column_ders_listesi', 1),
(166, '2024_05_23_081329_create_sinif_table', 1),
(167, '2024_05_23_160252_create_table_not_girisi', 1),
(168, '2024_05_27_070223_create_table_sinav_takvimi', 1),
(176, '2024_05_29_120805_add_sifre_to_ogrenci_table', 2),
(177, '2024_05_29_121727_add_ders_id_to_ogrenci_table', 2),
(178, '2024_05_30_113146_create_program_table', 2),
(179, '2024_05_21_121048_adminbilgisi', 3),
(185, '2024_05_30_132712_create_onay_table', 4),
(186, '2024_05_30_145256_create_onaylama_table', 4),
(187, '2024_05_31_134655_add_status_column_users', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `not_girisi`
--

CREATE TABLE `not_girisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ogrNo` int(11) NOT NULL,
  `ders_kodu` varchar(255) NOT NULL,
  `ders_adi` varchar(255) NOT NULL,
  `donem` int(11) NOT NULL,
  `sinav_dönemi` varchar(255) NOT NULL,
  `sinav_not` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `not_girisi`
--

INSERT INTO `not_girisi` (`id`, `ogrNo`, `ders_kodu`, `ders_adi`, `donem`, `sinav_dönemi`, `sinav_not`, `created_at`, `updated_at`) VALUES
(16, 126, 'bm-1', 'Kesikli Matematik', 1, 'vize', 50, '2024-05-30 07:19:01', '2024-05-30 07:19:01'),
(18, 126, 'bm-1', 'Kesikli Matematik', 1, 'final', 70, '2024-05-30 07:19:38', '2024-05-30 07:19:38'),
(20, 258, 'bm-3', 'Veri Yapıları', 1, 'vize', 80, '2024-05-30 07:20:11', '2024-05-30 07:20:11'),
(21, 126, 'bm-3', 'Veri Yapıları', 1, 'vize', 80, '2024-05-30 07:20:11', '2024-05-30 07:20:11'),
(22, 202523046, 'bm-3', 'Veri Yapıları', 1, 'vize', 80, '2024-05-30 07:20:11', '2024-05-30 07:20:11'),
(23, 258, 'bm-3', 'Veri Yapıları', 1, 'final', 80, '2024-05-30 07:20:20', '2024-05-30 07:20:20'),
(24, 126, 'bm-3', 'Veri Yapıları', 1, 'final', 80, '2024-05-30 07:20:20', '2024-05-30 07:20:20'),
(25, 202523046, 'bm-3', 'Veri Yapıları', 1, 'final', 65, '2024-05-30 07:20:20', '2024-05-30 07:20:20'),
(26, 202, 'bm-4', 'Java', 1, 'vize', 70, '2024-05-30 07:21:00', '2024-05-30 07:21:00'),
(27, 589, 'bm-4', 'Java', 1, 'vize', 70, '2024-05-30 07:21:00', '2024-05-30 07:21:00'),
(28, 258, 'bm-4', 'Java', 1, 'vize', 70, '2024-05-30 07:21:00', '2024-05-30 07:21:00'),
(29, 126, 'bm-4', 'Java', 1, 'vize', 70, '2024-05-30 07:21:00', '2024-05-30 07:21:00'),
(31, 202, 'bm-4', 'Java', 1, 'final', 90, '2024-05-30 07:21:13', '2024-05-30 07:21:13'),
(32, 589, 'bm-4', 'Java', 1, 'final', 90, '2024-05-30 07:21:13', '2024-05-30 07:21:13'),
(33, 258, 'bm-4', 'Java', 1, 'final', 90, '2024-05-30 07:21:13', '2024-05-30 07:21:13'),
(34, 126, 'bm-4', 'Java', 1, 'final', 90, '2024-05-30 07:21:13', '2024-05-30 07:21:13'),
(36, 202523046, 'bm-4', 'Java', 2, 'final', 90, '2024-05-30 07:21:13', '2024-05-30 07:21:13'),
(37, 202523046, 'bm-1', 'Kesikli Matematik', 1, 'vize', 80, '2024-05-31 03:56:25', '2024-05-31 03:56:25'),
(38, 5548, 'bm-1', 'Kesikli Matematik', 1, 'vize', 70, '2024-05-31 03:56:25', '2024-05-31 03:56:25'),
(39, 202523046, 'bm-4', 'Java', 1, 'vize', 70, '2024-05-31 04:00:15', '2024-05-31 04:00:15'),
(40, 5548, 'bm-4', 'Java', 1, 'vize', 52, '2024-05-31 04:00:15', '2024-05-31 04:00:15'),
(41, 5548, 'bm-16', 'Temel Kodlama', 1, 'final', 80, '2024-05-31 15:13:32', '2024-05-31 15:13:32'),
(42, 202113, 'bm-16', 'Temel Kodlama', 1, 'final', 95, '2024-05-31 15:13:32', '2024-05-31 15:13:32'),
(43, 202113, 'bm-14', 'Veri Tabanı Yönetimi', 1, 'vize', 75, '2024-05-31 15:14:11', '2024-05-31 15:14:11');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci`
--

CREATE TABLE `ogrenci` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ogrNo` int(11) NOT NULL,
  `adSoyad` varchar(255) NOT NULL,
  `sinif` varchar(255) NOT NULL,
  `bolum` varchar(255) NOT NULL,
  `GNO` double NOT NULL,
  `Kayıt Tarihi` varchar(255) NOT NULL,
  `Dersler` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sifre` varchar(255) DEFAULT NULL,
  `ders_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`ders_id`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `ogrenci`
--

INSERT INTO `ogrenci` (`id`, `ogrNo`, `adSoyad`, `sinif`, `bolum`, `GNO`, `Kayıt Tarihi`, `Dersler`, `created_at`, `updated_at`, `sifre`, `ders_id`) VALUES
(1, 202, 'melike yılmaz', '4', 'Bilgisayar Mühendisliği', 3, '20.02.2020', NULL, NULL, NULL, NULL, NULL),
(2, 784, 'Ali Can', '3', 'Bilgisayar Mühendisliği', 2.54, '20.05.2021', NULL, NULL, NULL, NULL, NULL),
(3, 758, 'Ayşe Çelik', '3', 'Bilgisayar Mühendisliği', 1.5, '10.03.2021', NULL, NULL, NULL, NULL, NULL),
(4, 589, 'Leyla Altan', '4', 'Bilgisayar Mühendisi', 3.5, '15.02.2021', NULL, NULL, NULL, NULL, NULL),
(5, 125, 'Olcay Yeni', '2', 'Bilgisayar Mühendisliği', 2.07, '04.05.2022', NULL, NULL, NULL, NULL, NULL),
(6, 258, 'Pelin Akan', '2', 'Bilgisayar Mühendisliği', 1.45, '08.02.2022', NULL, NULL, NULL, NULL, NULL),
(7, 365, 'Ahmet Yar', '4', 'Bilgisayar Mühendisliği', 2, '02.01.2020', NULL, NULL, NULL, NULL, NULL),
(8, 254, 'Mehmet Çal', '3', 'Bilgisayar Mühendisliği', 2, '20.02.2021', NULL, NULL, NULL, NULL, NULL),
(9, 485, 'Orhan Çam', '4', 'Bilgisayar Mühendisliği', 2.74, '20.05.2020', NULL, NULL, NULL, NULL, NULL),
(12, 698, 'Jale Ok', '2', 'Bilgisayar Mühendisliği', 3, '20.05.2022', NULL, NULL, NULL, NULL, NULL),
(13, 126, 'Yeliz Şel', '4', 'Bilgisayar Mühendisliği', 3, '08.02.2020', NULL, NULL, NULL, NULL, NULL),
(14, 202523046, 'Abdurrahman Tümer', '4', 'Bilgisayar Mühendisliği', 3.5, '20.02.2020', NULL, NULL, '2024-05-31 11:32:08', '1235', '[null,{\"id\":6},{\"id\":7}]'),
(16, 5548, 'Ahmet Ay', '4', 'Bilgisayar Mühendisliği', 3.5, '20.02.2020', NULL, NULL, '2024-05-30 10:47:46', '123', '[{\"id\":3},{\"id\":4},{\"id\":1},{\"id\":9},{\"id\":12},{\"id\":16},{\"id\":10}]'),
(18, 202113, 'Burak', '3', 'bilgisayar', 2.97, '2024-05-09', NULL, '2024-05-31 11:14:06', '2024-05-31 14:35:48', NULL, '[{\"id\":13},{\"id\":14},{\"id\":16}]'),
(19, 202523024, 'Ahmet Sağır', '4', 'Bilgisayar Mühendisliği', 2.99, '2024-05-09', NULL, '2024-05-31 14:12:50', '2024-05-31 15:16:04', NULL, '[{\"id\":13},{\"id\":14},{\"id\":16}]');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `onay`
--

CREATE TABLE `onay` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ogrid` bigint(20) UNSIGNED NOT NULL,
  `danismanid` bigint(20) UNSIGNED NOT NULL,
  `ogronay` tinyint(4) NOT NULL DEFAULT 0,
  `danismanonay` varchar(255) NOT NULL DEFAULT '0',
  `donem` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `onay`
--

INSERT INTO `onay` (`id`, `ogrid`, `danismanid`, `ogronay`, `danismanonay`, `donem`, `created_at`, `updated_at`) VALUES
(10, 5, 1, 1, '0', '1', '2024-05-30 15:25:02', '2024-05-30 15:25:02'),
(11, 14, 1, 1, '0', '1', '2024-05-31 03:36:15', '2024-05-31 03:36:15'),
(13, 18, 1, 1, '0', '1', '2024-05-31 12:07:44', '2024-05-31 12:07:44'),
(14, 19, 3, 1, '0', '1', '2024-05-31 15:16:48', '2024-05-31 15:16:48');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `program`
--

CREATE TABLE `program` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ders_id` bigint(20) UNSIGNED NOT NULL,
  `gun` varchar(255) NOT NULL,
  `saat` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `program`
--

INSERT INTO `program` (`id`, `ders_id`, `gun`, `saat`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pazartesi', '08:00:00', NULL, NULL),
(2, 2, 'Pazartesi', '09:00:00', NULL, NULL),
(3, 3, 'Salı', '08:00:00', NULL, NULL),
(4, 4, 'Salı', '09:00:00', NULL, NULL),
(5, 16, 'Pazartesi', '10:00:00', NULL, NULL),
(6, 14, 'Pazartesi', '11:00:00', NULL, NULL),
(7, 8, 'Salı', '10:00:00', NULL, NULL),
(8, 10, 'Salı', '11:00:00', NULL, NULL),
(9, 5, 'Çarşamba', '08:00:00', NULL, NULL),
(10, 9, 'Çarşamba', '09:00:00', NULL, NULL),
(11, 12, 'Çarşamba', '10:00:00', NULL, NULL),
(12, 7, 'Çarşamba', '11:00:00', NULL, NULL),
(13, 16, 'Perşembe', '08:00:00', NULL, NULL),
(14, 10, 'Perşembe', '09:00:00', NULL, NULL),
(15, 1, 'Cuma', '08:00:00', NULL, NULL),
(16, 9, 'Cuma', '09:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinif`
--

CREATE TABLE `sinif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sinif` varchar(255) NOT NULL,
  `Danisman_Bilgileri` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `sinif`
--

INSERT INTO `sinif` (`id`, `sinif`, `Danisman_Bilgileri`, `created_at`, `updated_at`) VALUES
(1, '1', 'Ahmet Gökçen', NULL, NULL),
(2, '2', 'Sertan Alkan', NULL, NULL),
(3, '3', 'Ahmet Gökçen', NULL, NULL),
(4, '4', 'Sertan Alkan', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `table_sinav_takvimi`
--

CREATE TABLE `table_sinav_takvimi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ders_kodu` varchar(255) NOT NULL,
  `ders_adi` varchar(255) NOT NULL,
  `sinav_yeri` varchar(255) NOT NULL,
  `sinav_tarihi` varchar(255) NOT NULL,
  `sinav_donemi` enum('vize','final') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `table_sinav_takvimi`
--

INSERT INTO `table_sinav_takvimi` (`id`, `ders_kodu`, `ders_adi`, `sinav_yeri`, `sinav_tarihi`, `sinav_donemi`, `created_at`, `updated_at`) VALUES
(1, 'bm-7', 'Analog Elektronik', '108A', '14.2.2024', 'vize', NULL, NULL),
(2, 'bm-1', 'Kesikli Matematik', '198B', '15.03.2024', 'vize', NULL, NULL),
(3, 'bm-2', 'Görsel Programlama', '105A', '10.02.2024', 'vize', NULL, NULL),
(4, 'bm-3', 'Veri Yapıları', '106B', '12.02.2024', 'vize', NULL, NULL),
(7, 'bm-16', 'Temel Kodlama', 'salon 2', '2024-05-23  ', 'final', '2024-05-31 15:12:30', '2024-05-31 15:12:30'),
(8, 'bm-14', 'Veri Tabanı Yönetimi', 'SALON10', '2024-05-03  ', 'vize', '2024-05-31 15:12:59', '2024-05-31 15:12:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `school_start_date` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `faculty` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL,
  `ogrNo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `school_start_date`, `class`, `faculty`, `remember_token`, `created_at`, `updated_at`, `status`, `ogrNo`) VALUES
(1, 'admin', 'admin@example.com', '2024-05-31 11:08:47', '$2y$12$gkBQa6UaUNnAkL5./8RD/uNz3JPUpfa.ciaallyD9YjDS8GHJ60DS', NULL, NULL, NULL, '0SQEmpOkb43xi7kDCVJj9FWikAjExproaOlAJn6vnIK4decbPBxG2u0gzWhO', '2024-05-31 11:08:49', '2024-05-31 16:38:21', '1', NULL),
(3, 'Burak', 'burak@iste.edu.tr', NULL, '$2y$12$55gZFEyuYvpqxh05dHd9NO9KFuGxDeawCFVGSQ3spj2ZtbKJNBeOS', NULL, NULL, NULL, NULL, '2024-05-31 11:14:06', '2024-05-31 14:40:17', '0', 202113),
(4, 'Ahmet Sağır', 'ahmetsağır@iste.edu.tr', NULL, '$2y$12$ltwyxur.LxXQFx7i/Yb1PueEcau.gCG192i7jHgY9w43OouAS/Msa', NULL, NULL, NULL, NULL, '2024-05-31 14:12:50', '2024-05-31 14:55:38', '0', 202523024);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adminbilgisi`
--
ALTER TABLE `adminbilgisi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adminbilgisi_numara_unique` (`numara`);

--
-- Tablo için indeksler `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Tablo için indeksler `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Tablo için indeksler `ders_programi`
--
ALTER TABLE `ders_programi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ders_programi_ders_kodu_unique` (`ders_kodu`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Tablo için indeksler `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `not_girisi`
--
ALTER TABLE `not_girisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `not_girisi_ogrno_foreign` (`ogrNo`),
  ADD KEY `not_girisi_ders_kodu_foreign` (`ders_kodu`);

--
-- Tablo için indeksler `ogrenci`
--
ALTER TABLE `ogrenci`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ogrenci_ogrno_unique` (`ogrNo`);

--
-- Tablo için indeksler `onay`
--
ALTER TABLE `onay`
  ADD PRIMARY KEY (`id`),
  ADD KEY `onay_ogrid_foreign` (`ogrid`),
  ADD KEY `onay_danismanid_foreign` (`danismanid`);

--
-- Tablo için indeksler `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Tablo için indeksler `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_ders_id_foreign` (`ders_id`);

--
-- Tablo için indeksler `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Tablo için indeksler `sinif`
--
ALTER TABLE `sinif`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `table_sinav_takvimi`
--
ALTER TABLE `table_sinav_takvimi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_sinav_takvimi_ders_kodu_foreign` (`ders_kodu`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adminbilgisi`
--
ALTER TABLE `adminbilgisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `ders_programi`
--
ALTER TABLE `ders_programi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- Tablo için AUTO_INCREMENT değeri `not_girisi`
--
ALTER TABLE `not_girisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Tablo için AUTO_INCREMENT değeri `ogrenci`
--
ALTER TABLE `ogrenci`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `onay`
--
ALTER TABLE `onay`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `program`
--
ALTER TABLE `program`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `sinif`
--
ALTER TABLE `sinif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `table_sinav_takvimi`
--
ALTER TABLE `table_sinav_takvimi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `not_girisi`
--
ALTER TABLE `not_girisi`
  ADD CONSTRAINT `not_girisi_ders_kodu_foreign` FOREIGN KEY (`ders_kodu`) REFERENCES `ders_programi` (`ders_kodu`),
  ADD CONSTRAINT `not_girisi_ogrno_foreign` FOREIGN KEY (`ogrNo`) REFERENCES `ogrenci` (`ogrNo`);

--
-- Tablo kısıtlamaları `onay`
--
ALTER TABLE `onay`
  ADD CONSTRAINT `onay_danismanid_foreign` FOREIGN KEY (`danismanid`) REFERENCES `adminbilgisi` (`id`),
  ADD CONSTRAINT `onay_ogrid_foreign` FOREIGN KEY (`ogrid`) REFERENCES `ogrenci` (`id`);

--
-- Tablo kısıtlamaları `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ders_id_foreign` FOREIGN KEY (`ders_id`) REFERENCES `ders_programi` (`id`);

--
-- Tablo kısıtlamaları `table_sinav_takvimi`
--
ALTER TABLE `table_sinav_takvimi`
  ADD CONSTRAINT `table_sinav_takvimi_ders_kodu_foreign` FOREIGN KEY (`ders_kodu`) REFERENCES `ders_programi` (`ders_kodu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
