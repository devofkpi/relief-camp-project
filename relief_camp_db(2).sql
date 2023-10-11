-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 04:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `relief_camp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL DEFAULT 'kangpokpi',
  `state` varchar(100) NOT NULL DEFAULT 'manipur',
  `pincode` bigint(20) UNSIGNED NOT NULL DEFAULT 795129,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `address`, `city`, `state`, `pincode`, `created_at`, `updated_at`) VALUES
(3, 'daili village, saparmaina', 'kangpokpi', 'manipur', 795129, '2023-10-04 05:44:47', '2023-10-04 05:44:47'),
(4, 'Lungtin Village, saikul', 'kangpokpi', 'manipur', 795129, '2023-10-04 05:44:47', '2023-10-04 05:44:47'),
(5, 'kalaphar village, motbung', 'kangpokpi', 'manipur', 795129, '2023-10-04 05:46:44', '2023-10-04 05:46:44'),
(6, 'kanglatongbi village', 'kangpokpi', 'manipur', 795129, '2023-10-04 05:46:44', '2023-10-04 05:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `anganwadi_centres`
--

CREATE TABLE `anganwadi_centres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `anganwadi_name` varchar(100) NOT NULL,
  `officer_name` varchar(50) NOT NULL,
  `officer_contact` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `relief_camp_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_link` text NOT NULL,
  `announcement_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcement_categories`
--

CREATE TABLE `announcement_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `district_helplines`
--

CREATE TABLE `district_helplines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_number` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `family_heads`
--

CREATE TABLE `family_heads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `family_head_name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `family_heads`
--

INSERT INTO `family_heads` (`id`, `family_head_name`, `created_at`, `updated_at`) VALUES
(1, 'Solomon', '2023-10-04 05:53:04', '2023-10-04 05:53:04'),
(2, 'Camellus', '2023-10-04 05:53:04', '2023-10-04 05:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `family_head_relations`
--

CREATE TABLE `family_head_relations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `family_head_relation` varchar(100) NOT NULL DEFAULT 'father',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `family_head_relations`
--

INSERT INTO `family_head_relations` (`id`, `family_head_relation`, `created_at`, `updated_at`) VALUES
(1, 'Father', '2023-10-04 05:53:57', '2023-10-04 05:53:57'),
(2, 'Sister', '2023-10-04 05:53:57', '2023-10-04 05:53:57'),
(3, 'Mother', '2023-10-04 05:54:23', '2023-10-04 05:54:23'),
(4, 'Brother', '2023-10-04 05:54:23', '2023-10-04 05:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_27_080617_create_relief_camps_table', 1),
(6, '2023_09_27_080702_create_relief_camp_facilities_table', 1),
(7, '2023_09_27_080732_create_police_stations_table', 1),
(8, '2023_09_27_080752_create_public_healths_table', 1),
(9, '2023_09_27_080835_create_anganwadi_centres_table', 1),
(10, '2023_09_27_080912_create_nodal_officers_table', 1),
(11, '2023_09_27_080932_create_sub_divisions_table', 1),
(12, '2023_09_27_080952_create_relief_camp_demographies_table', 1),
(13, '2023_09_27_081027_create_district_helplines_table', 1),
(14, '2023_09_27_081058_create_announcements_table', 1),
(15, '2023_09_27_081105_create_announcement_categories_table', 1),
(16, '2023_10_02_055510_create_addresses_table', 1),
(17, '2023_10_02_093541_update_relief_camps_table', 1),
(18, '2023_10_02_094011_update_relief_camp_facilities_table', 1),
(19, '2023_10_02_094405_update_police_stations_table', 1),
(20, '2023_10_02_094716_update_public_healths_table', 1),
(21, '2023_10_02_094824_update_anganwadi_centres_table', 1),
(22, '2023_10_02_095024_update_nodal_officers_table', 1),
(23, '2023_10_02_095451_update_relief_camp_demographies_table', 1),
(24, '2023_10_02_095926_update_announcements_table', 1),
(25, '2023_10_02_184626_create_family_heads_table', 1),
(26, '2023_10_02_184657_create_family_head_relations_table', 1),
(27, '2023_10_02_190156_update_relief_camp_demography_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nodal_officers`
--

CREATE TABLE `nodal_officers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `officer_name` varchar(50) NOT NULL,
  `officer_designation` varchar(100) NOT NULL,
  `officer_contact` bigint(20) UNSIGNED NOT NULL,
  `sub_division_id` bigint(20) UNSIGNED NOT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nodal_officers`
--

INSERT INTO `nodal_officers` (`id`, `officer_name`, `officer_designation`, `officer_contact`, `sub_division_id`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 'Affaizuddin', 'Sub Divisional Officer', 7000213123, 2, 1, '2023-10-04 12:11:20', '2023-10-04 12:11:20'),
(2, 'Maisi', 'District Manager', 7000213120, 3, 1, '2023-10-04 12:11:20', '2023-10-04 12:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `police_stations`
--

CREATE TABLE `police_stations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `police_station_name` varchar(100) NOT NULL,
  `officer_name` varchar(50) NOT NULL,
  `officer_contact` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `relief_camp_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `public_healths`
--

CREATE TABLE `public_healths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_health_name` varchar(100) NOT NULL,
  `officer_name` varchar(50) NOT NULL,
  `officer_contact` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `relief_camp_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `relief_camps`
--

CREATE TABLE `relief_camps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `relief_camp_name` varchar(100) NOT NULL,
  `camp_code` varchar(50) NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `sub_division_id` bigint(20) UNSIGNED NOT NULL,
  `nodal_officer_id` bigint(20) UNSIGNED NOT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relief_camps`
--

INSERT INTO `relief_camps` (`id`, `relief_camp_name`, `camp_code`, `address_id`, `sub_division_id`, `nodal_officer_id`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 'JNV relief Camp', 'KPI-01', 5, 1, 1, 1, '2023-10-04 05:49:35', '2023-10-04 05:49:35'),
(2, 'Motbung Relief Camp', 'KPI-02', 3, 3, 1, 1, '2023-10-04 05:49:35', '2023-10-04 05:49:35'),
(3, 'Kalaphar Relief Camp', 'KPI-03', 4, 4, 2, 1, '2023-10-04 05:51:27', '2023-10-04 05:51:27'),
(4, 'Daili Relief Camp', 'KPI-04', 6, 4, 1, 1, '2023-10-04 05:51:27', '2023-10-04 05:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `relief_camp_demographies`
--

CREATE TABLE `relief_camp_demographies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `person_name` varchar(100) NOT NULL,
  `family_head_id` bigint(20) UNSIGNED NOT NULL,
  `family_head_relation_id` bigint(20) UNSIGNED NOT NULL,
  `gender` enum('male','female','third_gender') NOT NULL,
  `age` tinyint(4) NOT NULL,
  `physically_disabled` tinyint(1) NOT NULL DEFAULT 0,
  `orphan` tinyint(1) NOT NULL DEFAULT 0,
  `lactating` tinyint(1) NOT NULL DEFAULT 0,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `relief_camp_id` bigint(20) UNSIGNED NOT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relief_camp_demographies`
--

INSERT INTO `relief_camp_demographies` (`id`, `person_name`, `family_head_id`, `family_head_relation_id`, `gender`, `age`, `physically_disabled`, `orphan`, `lactating`, `address_id`, `relief_camp_id`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 'Nongthombam Rambo', 1, 1, 'male', 32, 0, 1, 0, 3, 1, 1, '2023-10-04 05:55:04', '2023-10-04 05:55:04'),
(2, 'Ningthojam Bedajit', 1, 1, 'male', 75, 0, 0, 0, 5, 1, 1, '2023-10-04 05:55:04', '2023-10-04 05:55:04'),
(3, 'Pangambam Jayananda', 1, 1, 'male', 6, 0, 0, 0, 4, 1, 1, '2023-10-04 05:56:56', '2023-10-04 05:56:56'),
(4, 'Vaivinai', 2, 4, 'female', 25, 0, 0, 1, 4, 3, 1, '2023-10-04 05:56:56', '2023-10-04 05:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `relief_camp_facilities`
--

CREATE TABLE `relief_camp_facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `building_type` varchar(100) NOT NULL,
  `number_of_persons` int(11) NOT NULL,
  `number_of_rooms` int(11) NOT NULL,
  `number_of_halls` int(11) NOT NULL,
  `number_of_toilets` int(11) NOT NULL,
  `number_of_persons_utilising_toilets` int(11) NOT NULL,
  `number_of_persons_staying_at_night` int(11) NOT NULL,
  `number_of_mattresses` int(11) NOT NULL,
  `number_of_badsheets` int(11) NOT NULL,
  `number_of_blankets` int(11) NOT NULL,
  `number_of_mosquito` int(11) NOT NULL,
  `number_of_fans` int(11) NOT NULL,
  `availability_of_food_grains_in_days` int(11) NOT NULL,
  `availability_of_veg_in_days` int(11) NOT NULL,
  `safe_drinking_water` tinyint(1) NOT NULL DEFAULT 1,
  `provisioning_of_supplement` tinyint(1) NOT NULL DEFAULT 1,
  `relief_camp_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relief_camp_facilities`
--

INSERT INTO `relief_camp_facilities` (`id`, `building_type`, `number_of_persons`, `number_of_rooms`, `number_of_halls`, `number_of_toilets`, `number_of_persons_utilising_toilets`, `number_of_persons_staying_at_night`, `number_of_mattresses`, `number_of_badsheets`, `number_of_blankets`, `number_of_mosquito`, `number_of_fans`, `availability_of_food_grains_in_days`, `availability_of_veg_in_days`, `safe_drinking_water`, `provisioning_of_supplement`, `relief_camp_id`, `created_at`, `updated_at`) VALUES
(1, 'Semi Permanent', 60, 10, 1, 4, 50, 40, 50, 50, 50, 50, 10, 10, 10, 1, 1, 3, '2023-10-04 05:58:32', '2023-10-04 05:58:32'),
(2, 'Permanent Structure', 20, 5, 1, 4, 20, 20, 20, 20, 20, 10, 5, 10, 11, 1, 1, 1, '2023-10-04 05:58:32', '2023-10-04 05:58:32'),
(3, 'Double Story Building', 50, 10, 1, 4, 50, 40, 50, 50, 50, 50, 10, 10, 10, 1, 1, 2, '2023-10-04 06:00:27', '2023-10-04 06:00:27'),
(4, 'Single Story Building', 20, 5, 1, 4, 20, 20, 20, 20, 20, 10, 5, 10, 11, 1, 1, 4, '2023-10-04 06:00:27', '2023-10-04 06:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `sub_divisions`
--

CREATE TABLE `sub_divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_division_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_divisions`
--

INSERT INTO `sub_divisions` (`id`, `sub_division_name`, `created_at`, `updated_at`) VALUES
(1, 'Saikul', '2023-10-04 05:48:24', '2023-10-04 05:48:24'),
(2, 'Saitu', '2023-10-04 05:48:24', '2023-10-04 05:48:24'),
(3, 'Island', '2023-10-04 05:48:54', '2023-10-04 05:48:54'),
(4, 'T waichong', '2023-10-04 05:48:54', '2023-10-04 05:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anganwadi_centres`
--
ALTER TABLE `anganwadi_centres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `anganwadi_centres_officer_contact_unique` (`officer_contact`),
  ADD KEY `anganwadi_centres_address_id_foreign` (`address_id`),
  ADD KEY `anganwadi_centres_relief_camp_id_foreign` (`relief_camp_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcements_announcement_category_id_foreign` (`announcement_category_id`);

--
-- Indexes for table `announcement_categories`
--
ALTER TABLE `announcement_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district_helplines`
--
ALTER TABLE `district_helplines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `district_helplines_contact_number_unique` (`contact_number`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `family_heads`
--
ALTER TABLE `family_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_head_relations`
--
ALTER TABLE `family_head_relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nodal_officers`
--
ALTER TABLE `nodal_officers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nodal_officers_officer_contact_unique` (`officer_contact`),
  ADD KEY `nodal_officers_sub_division_id_foreign` (`sub_division_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `police_stations`
--
ALTER TABLE `police_stations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `police_stations_officer_contact_unique` (`officer_contact`),
  ADD KEY `police_stations_address_id_foreign` (`address_id`),
  ADD KEY `police_stations_relief_camp_id_foreign` (`relief_camp_id`);

--
-- Indexes for table `public_healths`
--
ALTER TABLE `public_healths`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `public_healths_officer_contact_unique` (`officer_contact`),
  ADD KEY `public_healths_address_id_foreign` (`address_id`),
  ADD KEY `public_healths_relief_camp_id_foreign` (`relief_camp_id`);

--
-- Indexes for table `relief_camps`
--
ALTER TABLE `relief_camps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `relief_camps_camp_code_unique` (`camp_code`),
  ADD KEY `relief_camps_address_id_foreign` (`address_id`),
  ADD KEY `relief_camps_sub_division_id_foreign` (`sub_division_id`),
  ADD KEY `relief_camps_nodal_officer_id_foreign` (`nodal_officer_id`);

--
-- Indexes for table `relief_camp_demographies`
--
ALTER TABLE `relief_camp_demographies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relief_camp_demographies_address_id_foreign` (`address_id`),
  ADD KEY `relief_camp_demographies_relief_camp_id_foreign` (`relief_camp_id`),
  ADD KEY `relief_camp_demographies_family_head_id_foreign` (`family_head_id`),
  ADD KEY `relief_camp_demographies_family_head_relation_id_foreign` (`family_head_relation_id`);

--
-- Indexes for table `relief_camp_facilities`
--
ALTER TABLE `relief_camp_facilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relief_camp_facilities_relief_camp_id_foreign` (`relief_camp_id`);

--
-- Indexes for table `sub_divisions`
--
ALTER TABLE `sub_divisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_divisions_sub_division_name_unique` (`sub_division_name`);

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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `anganwadi_centres`
--
ALTER TABLE `anganwadi_centres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcement_categories`
--
ALTER TABLE `announcement_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `district_helplines`
--
ALTER TABLE `district_helplines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_heads`
--
ALTER TABLE `family_heads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `family_head_relations`
--
ALTER TABLE `family_head_relations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `nodal_officers`
--
ALTER TABLE `nodal_officers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `police_stations`
--
ALTER TABLE `police_stations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `public_healths`
--
ALTER TABLE `public_healths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relief_camps`
--
ALTER TABLE `relief_camps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `relief_camp_demographies`
--
ALTER TABLE `relief_camp_demographies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `relief_camp_facilities`
--
ALTER TABLE `relief_camp_facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_divisions`
--
ALTER TABLE `sub_divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anganwadi_centres`
--
ALTER TABLE `anganwadi_centres`
  ADD CONSTRAINT `anganwadi_centres_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `anganwadi_centres_relief_camp_id_foreign` FOREIGN KEY (`relief_camp_id`) REFERENCES `relief_camps` (`id`);

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_announcement_category_id_foreign` FOREIGN KEY (`announcement_category_id`) REFERENCES `announcement_categories` (`id`);

--
-- Constraints for table `nodal_officers`
--
ALTER TABLE `nodal_officers`
  ADD CONSTRAINT `nodal_officers_sub_division_id_foreign` FOREIGN KEY (`sub_division_id`) REFERENCES `sub_divisions` (`id`);

--
-- Constraints for table `police_stations`
--
ALTER TABLE `police_stations`
  ADD CONSTRAINT `police_stations_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `police_stations_relief_camp_id_foreign` FOREIGN KEY (`relief_camp_id`) REFERENCES `relief_camps` (`id`);

--
-- Constraints for table `public_healths`
--
ALTER TABLE `public_healths`
  ADD CONSTRAINT `public_healths_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `public_healths_relief_camp_id_foreign` FOREIGN KEY (`relief_camp_id`) REFERENCES `relief_camps` (`id`);

--
-- Constraints for table `relief_camps`
--
ALTER TABLE `relief_camps`
  ADD CONSTRAINT `relief_camps_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `relief_camps_nodal_officer_id_foreign` FOREIGN KEY (`nodal_officer_id`) REFERENCES `nodal_officers` (`id`),
  ADD CONSTRAINT `relief_camps_sub_division_id_foreign` FOREIGN KEY (`sub_division_id`) REFERENCES `sub_divisions` (`id`);

--
-- Constraints for table `relief_camp_demographies`
--
ALTER TABLE `relief_camp_demographies`
  ADD CONSTRAINT `relief_camp_demographies_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `relief_camp_demographies_family_head_id_foreign` FOREIGN KEY (`family_head_id`) REFERENCES `family_heads` (`id`),
  ADD CONSTRAINT `relief_camp_demographies_family_head_relation_id_foreign` FOREIGN KEY (`family_head_relation_id`) REFERENCES `family_head_relations` (`id`),
  ADD CONSTRAINT `relief_camp_demographies_relief_camp_id_foreign` FOREIGN KEY (`relief_camp_id`) REFERENCES `relief_camps` (`id`);

--
-- Constraints for table `relief_camp_facilities`
--
ALTER TABLE `relief_camp_facilities`
  ADD CONSTRAINT `relief_camp_facilities_relief_camp_id_foreign` FOREIGN KEY (`relief_camp_id`) REFERENCES `relief_camps` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
