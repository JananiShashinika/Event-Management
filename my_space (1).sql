-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 08:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_space`
--

-- --------------------------------------------------------

--
-- Table structure for table `annual_events`
--

CREATE TABLE `annual_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `event_type_id` int(11) NOT NULL,
  `coordinator_id` int(11) NOT NULL,
  `sp_note_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `annual_events`
--

INSERT INTO `annual_events` (`id`, `event_name`, `description`, `start_date`, `end_date`, `event_type_id`, `coordinator_id`, `sp_note_id`, `created_at`, `updated_at`) VALUES
(1, 'Event Name 1', 'Event name 1 description', '2023-07-25', '2023-07-28', 3, 90855, 1, '2023-07-20 08:16:56', '2023-07-20 08:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_emp`
--

CREATE TABLE `assigned_emp` (
  `assigned_em_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assigned_employees`
--

CREATE TABLE `assigned_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `checklist_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_id`, `emp_name`, `created_at`, `updated_at`) VALUES
(2, '0001', 'Employee 1', '2023-08-20 22:22:57', '2023-08-20 23:19:39'),
(3, '0002', 'Employee 2', '2023-08-20 23:20:12', '2023-08-20 23:20:12'),
(5, '0003', 'Employee 3', '2024-02-14 12:17:32', '2024-02-14 12:17:32'),
(6, '004', 'Employee 4', '2024-02-15 04:50:07', '2024-02-15 04:50:07'),
(7, '0005', 'Employee 5', '2024-03-17 22:15:18', '2024-03-17 22:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE `event_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `event_type`, `created_at`, `updated_at`) VALUES
(3, 'Water rocket', '2023-07-12 00:44:50', '2023-08-04 02:10:50'),
(21, 'Poster competition', '2023-07-12 03:35:01', '2023-08-04 02:11:02'),
(72, 'Space Quiz competiton', '2024-02-14 12:16:57', '2024-02-14 12:16:57'),
(73, 'Debate', '2024-03-17 22:24:25', '2024-03-17 22:24:25'),
(75, 'Art Competition', '2024-04-04 23:03:47', '2024-04-04 23:03:47');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(7, '2023_05_11_100031_create_space_events_table', 1),
(8, '2023_05_11_100101_create_space_event_types_table', 1),
(9, '2023_05_11_100159_create_assigned_employees_table', 1),
(10, '2023_05_11_165024_create_sessions_table', 1),
(16, '2023_07_11_055324_create_event_types_table', 2),
(22, '2023_07_11_204752_create_event_type_table', 3),
(23, '2014_10_12_000000_create_users_table', 4),
(24, '2014_10_12_100000_create_password_reset_tokens_table', 4),
(25, '2019_08_19_000000_create_failed_jobs_table', 4),
(26, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(27, '2023_04_03_060508_space_event_table', 4),
(28, '2023_04_03_060508_annual_events_table', 5),
(29, '2023_07_20_090225_create_special_notes_table', 6),
(33, '2023_08_18_051912_create_employees_table', 7),
(35, '2023_08_05_120215_create_check_lists_table', 8),
(36, '2023_08_24_181556_create_attachments_table', 9),
(38, '2024_02_14_062639_create_students_table', 10),
(39, '2023_07_11_204752_create_event_types_table', 11),
(40, '2023_08_05_120215_create_tasks_table', 11),
(41, '2024_03_17_181524_create_new_event_table', 11),
(42, '2024_03_17_181629_create_attachments_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `new_event`
--

CREATE TABLE `new_event` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `coordinator` varchar(255) NOT NULL,
  `event_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_event`
--

INSERT INTO `new_event` (`id`, `event_name`, `start_date`, `end_date`, `coordinator`, `event_id`) VALUES
(77, 'Water Rocket New', '2024-04-03', '2024-04-04', '0003', 3),
(81, 'Water Rocket 2023', '2024-04-11', '2024-04-11', '0001', 3),
(82, 'Poster Competition -Primary Schools', '2024-04-04', '2024-04-06', '004', 21),
(83, 'Poster Competition -National Schools', '2024-04-05', '2024-04-05', '004', 21),
(84, 'Quiz Competition 2024', '2024-04-10', '2024-04-10', '0003', 72),
(85, 'Inter School Debate 2024', '2024-06-05', '2024-07-05', '0005', 73),
(86, 'Water Rocket 2024 - University Level', '2024-05-01', '2024-05-02', '0002', 3),
(87, 'Water Rocket 2022', '2022-06-14', '2022-06-14', '0005', 3),
(89, 'Water', '2024-06-01', '2024-06-02', '0005', 3);

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2Cf5rmDVPObL5R9B1xoYtIOaKi4L6mDID9oEf0fr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibUtpeDdxOFZyVEliNTF6RjJMWEtleFFHY3VZb0FOTVBjN2xKT1BDOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1683824011);

-- --------------------------------------------------------

--
-- Table structure for table `special_notes`
--

CREATE TABLE `special_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(255) NOT NULL,
  `event_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `school`, `contact`, `email`, `created_at`, `updated_at`) VALUES
(1, 'name', 'school', 'contact', 'email', '2024-02-15 23:46:45', '2024-02-15 23:46:45'),
(2, 'Janani', 'Kg/Pinnawala Central College', '0714556288', 'janashashi5@gmail.com', '2024-02-15 23:46:45', '2024-02-15 23:46:45'),
(3, 'Erandi Jayaweera ', 'Kg/Pinnawala Central College', '0712527278', 'erandiikavishka2@gmail.com', '2024-02-15 23:46:45', '2024-02-15 23:46:45'),
(4, 'T.B.M.N Bandara ', 'Kg/Pinnawala Central College', '0703737257', 's17322@sci.pdn.ac.lk', '2024-02-15 23:46:45', '2024-02-15 23:46:45'),
(5, 'Hashini Kavishka Lakshman', 'Kg/Pinnawala Central College', '0702277452', 'hashinikavishka2@gmail.com', '2024-02-15 23:46:45', '2024-02-15 23:46:45'),
(6, 'Wedaralalage Nisadini Tharuka Munasingha ', 'Kg/Pinnawala Central College', '0756103396', 'tharukanishadini48@gmail.com', '2024-02-15 23:46:45', '2024-02-15 23:46:45'),
(7, 'K.R.C.Bandara', 'Kg/Pinnawala Central College', '0714783505', 'chathubandara031@gmail.com', '2024-02-15 23:46:45', '2024-02-15 23:46:45'),
(8, 'Vilrangi Shashinika', 'Kg/Pinnawala Central College', '0115246852', 'jananivilrangi@gmail.com', '2024-02-15 23:46:45', '2024-02-15 23:46:45'),
(9, 'Tishan', 'Tissa', '0721034401', 'tishan@gmail.com', '2024-02-16 02:20:35', '2024-02-16 02:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `sub_tasks`
--

CREATE TABLE `sub_tasks` (
  `id` int(10) NOT NULL,
  `new_event_id` int(10) NOT NULL,
  `event_id` int(10) DEFAULT NULL,
  `tasks` varchar(255) NOT NULL,
  `emp_assign` int(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_tasks`
--

INSERT INTO `sub_tasks` (`id`, `new_event_id`, `event_id`, `tasks`, `emp_assign`, `status`, `updated_at`, `created_at`) VALUES
(22, 76, 3, 'Equipment list', 0, 0, '2024-03-27 00:19:34', '2024-03-27 00:19:34'),
(23, 76, 3, 'Prepare refreshments', 0, 0, '2024-03-27 00:19:34', '2024-03-27 00:19:34'),
(24, 77, 3, 'Request a ground/place', 4, 0, '2024-05-30 04:51:57', '2024-04-02 23:29:45'),
(25, 77, 3, 'Equipment list', 2, 1, '2024-05-29 22:56:19', '2024-04-02 23:29:45'),
(26, 77, 3, 'Prepare refreshments', 3, 0, '2024-05-28 10:55:01', '2024-04-02 23:29:45'),
(27, 78, 3, 'Request a ground/place', NULL, 0, '2024-04-02 23:59:13', '2024-04-02 23:59:13'),
(28, 81, 3, 'Request a ground/place', 4, 0, '2024-05-30 22:35:07', '2024-04-03 00:01:43'),
(29, 81, 3, 'Equipment list', 4, 0, '2024-05-29 23:33:29', '2024-04-03 00:01:43'),
(30, 82, 21, 'Request permissions', 3, 0, '2024-05-30 23:01:31', '2024-04-03 00:02:45'),
(31, 82, 21, 'Select winners', 4, 0, '2024-05-30 23:01:38', '2024-04-03 00:02:45'),
(32, 82, 21, 'Send Invitations', NULL, 0, '2024-04-03 00:02:45', '2024-04-03 00:02:45'),
(33, 83, 21, 'Select winners', 5, 0, '2024-04-17 02:32:02', '2024-04-03 00:11:37'),
(34, 83, 21, 'Send Invitations', 5, 0, '2024-04-17 02:32:06', '2024-04-03 00:11:37'),
(35, 84, 72, 'Invitations', NULL, 0, '2024-04-03 00:12:24', '2024-04-03 00:12:24'),
(36, 86, 3, 'Request a ground/place', 2, 0, '2024-04-23 21:52:56', '2024-04-03 00:14:27'),
(37, 86, 3, 'Equipment list', 1, 0, '2024-04-03 00:59:49', '2024-04-03 00:14:27'),
(38, 86, 3, 'Prepare refreshments', NULL, 0, '2024-04-03 00:14:27', '2024-04-03 00:14:27'),
(39, 87, 3, 'Request a ground/place', 2, 0, '2024-04-24 23:41:52', '2024-04-07 09:01:07'),
(40, 87, 3, 'Equipment list', NULL, 0, '2024-04-07 09:01:07', '2024-04-07 09:01:07'),
(41, 87, 3, 'Request a ground/place', 2, 0, '2024-04-24 23:41:52', '2024-04-07 09:01:25'),
(42, 87, 3, 'Equipment list', NULL, 0, '2024-04-07 09:01:25', '2024-04-07 09:01:25'),
(43, 89, 3, 'Request a ground/place', NULL, 0, '2024-05-30 22:53:29', '2024-05-30 22:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `event_type_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `attachment`, `path`, `event_type_id`, `created_at`, `updated_at`) VALUES
(1, 'Request a ground/place', 'Location Requesting Letter.docx', '1710733555_Location Requesting Letter.docx', 3, '2024-03-17 22:15:55', '2024-03-17 22:15:55'),
(2, 'Equipment list', 'Equipment List for WR Event.docx', '1710733578_Equipment List for Water Rocket Event.docx', 3, '2024-03-17 22:16:18', '2024-03-17 22:16:18'),
(3, 'Prepare refreshments', '', '', 3, '2024-03-17 22:16:32', '2024-03-17 22:16:32'),
(4, 'Request permissions', 'Location Requesting Letter.docx', '1710733647_Location Requesting Letter.docx', 21, '2024-03-17 22:17:27', '2024-03-17 22:17:27'),
(5, 'Invitations', '', '', 72, '2024-03-17 22:17:50', '2024-03-17 22:17:50'),
(6, 'Select winners', '', '', 21, '2024-03-21 10:24:04', '2024-03-21 10:24:04'),
(7, 'Send Invitations', '', '', 21, '2024-03-21 10:24:36', '2024-03-21 10:24:36'),
(9, 'vvvvvvvvvvvvvvv', 'Stu1.xlsx', '1717129568_Stu1.xlsx', 3, '2024-05-30 22:56:08', '2024-05-30 22:56:08');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$dwMyxGCzKtiayly1kE9.jOsBj1a5.xVfe9B/QaCuzA/fJ0j36/vR6', 'D5LZ4AxKzAyApmhvlSb1nXKGHqvUcoIv5KGi73bjoeaYylB6Tf0sQB2aIdL2', '2023-07-11 06:47:21', '2023-07-11 06:47:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annual_events`
--
ALTER TABLE `annual_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigned_emp`
--
ALTER TABLE `assigned_emp`
  ADD PRIMARY KEY (`assigned_em_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `assigned_employees`
--
ALTER TABLE `assigned_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attachments_checklist_id_foreign` (`checklist_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_emp_id_unique` (`emp_id`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `event_type` (`event_type`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_event`
--
ALTER TABLE `new_event`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `special_notes`
--
ALTER TABLE `special_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `sub_tasks`
--
ALTER TABLE `sub_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `check_list_name` (`task_name`,`event_type_id`),
  ADD KEY `event_type_frk` (`event_type_id`);

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
-- AUTO_INCREMENT for table `annual_events`
--
ALTER TABLE `annual_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assigned_emp`
--
ALTER TABLE `assigned_emp`
  MODIFY `assigned_em_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assigned_employees`
--
ALTER TABLE `assigned_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `new_event`
--
ALTER TABLE `new_event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `special_notes`
--
ALTER TABLE `special_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_tasks`
--
ALTER TABLE `sub_tasks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_checklist_id_foreign` FOREIGN KEY (`checklist_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `event_type_frk` FOREIGN KEY (`event_type_id`) REFERENCES `event_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
