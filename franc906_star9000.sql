-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 09, 2019 at 06:44 AM
-- Server version: 5.6.36-82.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `franc906_star9000`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointement_booking`
--

CREATE TABLE `appointement_booking` (
  `id` int(20) NOT NULL,
  `doctro_name` varchar(200) NOT NULL,
  `examination_id` int(10) NOT NULL,
  `room_id` int(11) NOT NULL,
  `examination_color` varchar(200) DEFAULT NULL,
  `starteTime` varchar(10) NOT NULL,
  `endtime` varchar(10) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `str_starttime` varchar(10) DEFAULT NULL,
  `str_endtime` varchar(20) DEFAULT NULL,
  `str_startdate` varchar(10) DEFAULT NULL,
  `str_enddate` varchar(10) DEFAULT NULL,
  `is_cancel` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointement_booking`
--

INSERT INTO `appointement_booking` (`id`, `doctro_name`, `examination_id`, `room_id`, `examination_color`, `starteTime`, `endtime`, `start_date`, `end_date`, `created_at`, `updated_at`, `str_starttime`, `str_endtime`, `str_startdate`, `str_enddate`, `is_cancel`) VALUES
(17, '15', 2, 10, '#c619a2', '9:10', '9:50', '2019-08-07 09:10:00', '2019-08-07 09:50:00', '2019-08-06 12:54:25', '2019-08-06 12:54:25', '1565082600', '1565085000', '1565169000', '1565171400', '0');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(30) NOT NULL,
  `userId` int(100) DEFAULT NULL,
  `start_time` varchar(200) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `examination_id` int(20) DEFAULT NULL,
  `weekdays_id` varchar(20) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `userId`, `start_time`, `end_time`, `examination_id`, `weekdays_id`, `created_at`, `updated_at`) VALUES
(58, 10, '15:00', '15:00', 6, '8', '2019-07-30', '2019-07-30'),
(59, 10, '15:00', '15:00', 6, '2', '2019-07-30', '2019-07-30'),
(60, 10, '15:00', '15:00', 6, '6', '2019-07-30', '2019-07-30'),
(61, 10, '15:00', '15:00', 6, '7', '2019-07-30', '2019-07-30'),
(63, 12, '13:15', '13:15', 4, '2', '2019-07-31', '2019-07-31'),
(64, 15, '9:00', '18:00', 2, '2', '2019-08-06', '2019-08-06'),
(65, 15, '9:00', '18:00', 2, '3', '2019-08-06', '2019-08-06'),
(66, 15, '9:00', '18:00', 2, '4', '2019-08-06', '2019-08-06'),
(67, 15, '9:00', '18:00', 2, '5', '2019-08-06', '2019-08-06'),
(68, 15, '9:00', '18:00', 2, '6', '2019-08-06', '2019-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

CREATE TABLE `examination` (
  `id` int(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examination`
--

INSERT INTO `examination` (`id`, `title`, `created_at`, `updated_at`) VALUES
(2, 'Oculista', '2019-07-22', '2019-07-29'),
(4, 'Chirurgia plastica', '2019-07-22', '2019-07-29'),
(5, 'Cardiologo', '2019-07-22', '2019-07-29'),
(6, 'Nefrologo', '2019-07-22', '2019-07-29'),
(7, 'Ortopedico', '2019-07-23', '2019-07-29'),
(8, 'Dermatologo', '2019-07-26', '2019-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `appointment_id`, `email`, `name`, `phone`, `added_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(7, 17, 'dummypatient@mailinator.com', 'dummypatient', 2147483647, 1, 1, '2019-08-06 17:54:25', '2019-08-06 17:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(10) NOT NULL,
  `room_name` varchar(200) DEFAULT NULL,
  `room_color` varchar(20) DEFAULT NULL,
  `examination_type` int(10) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_name`, `room_color`, `examination_type`, `created_at`, `updated_at`) VALUES
(5, 'test1', '#163026', 4, '2019-07-23', '2019-08-06'),
(9, 'visite post operatorie', '#159723', 7, '2019-07-26', '2019-07-26'),
(10, 'visite post operatorie1', '#c619a2', 2, '2019-07-26', '2019-07-26'),
(11, 'gndnfsldknfkdl', '#9b5656', 5, '2019-07-30', '2019-07-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_type` int(10) DEFAULT NULL COMMENT '[1]=>''superAdmin'',[2]=>''Secretary'',[3]=>''Doctor''',
  `phone` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regione` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cap` int(10) DEFAULT NULL,
  `dob` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_delete` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT '[0]=>''N'',[1]=>''Y''',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `role_type`, `phone`, `regione`, `cap`, `dob`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$xip7EkoVdkmjlpuYyfH/F.a4NHZRGawsCS.BdTKKJ9vEQz03DY7Be', 'im6OBifU4REvOegKmCnP8Oxpvrc8FxgNPJPWJfeXECjnC4cOvnQi412aiEM1', 1, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(4, 'Carmelo', 'Carmelo@gmail.com', '$2y$10$RoJ1xHhX8K/WwiGGxewpN.xItamroetAP9/lmiv1MOuuOiHsnfpXK', NULL, 2, '9864654654', 'Concesio, Province of Brescia, Italy', 110645, '2019-12-26', '0', '2019-07-18 08:57:25', '2019-07-30 14:21:38'),
(10, 'Romeo', 'test@gmail.com', '$2y$10$s6zn72v3RJyeTEBut3Q2vOKF9kf.LJ..dThrYu3TdBv95dS2rAYnC', 'kr7J8ZZLunzgkH6u2XNSeBxOeUVyvgVVRK9HGo0Yp1mkRhzSBcgjuCxruVzv', 3, '4545154545', 'Concesio, Province of Brescia,', 201520, '2019-02-02', '0', '2019-07-23 09:13:05', '2019-07-30 14:22:20'),
(11, 'john', 'john@yopmail.com', '$2y$10$wS8kdfvV3h1NpX9TvS/Dp.PYERMx9rFc3qwsC/aR5wGr2dfp9vLLO', 'aqh3iWGhYb0u2qJtOcVdjWLC2vEk9yxNm9tuwzTGJuEa8tL6nsB6OrTBVm68', 2, '9898764654', 'Concesio, Province of Brescia, Italy', 110065, '2019-11-30', '0', '2019-07-23 20:38:19', '2019-07-30 14:21:44'),
(12, 'Riccardo', 'riccardo.t@komete.it', '$2y$10$0GAuMSAa49wWceSwxdbiHu2U8ZGayPIuWQ3qEjhY7cps.LtDfrRaW', NULL, 3, '0000000000', 'Lombardia', 25125, '20-07-1995', '0', '2019-07-26 17:30:51', '2019-07-30 14:25:56'),
(13, 'Silvia', 'francesco.g@komete.it', '$2y$10$TJPocix4qqVXMNUUQ5mZdOOlKcyKjwBB8mncjUfIXAvUJbHHFFuVS', NULL, 2, '1223333430', 'Lombardia', 12345, '07-26-2019', '0', '2019-07-26 18:01:55', '2019-07-26 18:01:55'),
(15, 'dummy doc', 'dummydoc@mailinator.com', '$2y$10$gfIjjJN9eE0fYDosh85E/OauBQI7.9nvZ0lmov/XXoa0BSs2dTJ6i', NULL, 3, '9876543211', 'dummy', 21111, '07-08-1991', '0', '2019-08-06 17:46:16', '2019-08-06 17:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--

CREATE TABLE `weekdays` (
  `weekday_num` int(11) NOT NULL,
  `day_of_week` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weekdays`
--

INSERT INTO `weekdays` (`weekday_num`, `day_of_week`) VALUES
(8, 'Domenica'),
(5, 'Giovedì'),
(2, 'Lunedi'),
(3, 'Martedì'),
(4, 'Mercoledì'),
(7, 'Sabato'),
(6, 'Venerdì');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointement_booking`
--
ALTER TABLE `appointement_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekdays`
--
ALTER TABLE `weekdays`
  ADD PRIMARY KEY (`weekday_num`),
  ADD UNIQUE KEY `day_of_week` (`day_of_week`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointement_booking`
--
ALTER TABLE `appointement_booking`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `examination`
--
ALTER TABLE `examination`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
