-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 07, 2019 at 12:44 AM
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
  `patient_id` int(11) NOT NULL DEFAULT '0',
  `examination_color` varchar(100) DEFAULT NULL,
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
  `is_cancel` enum('0','1') NOT NULL DEFAULT '0',
  `recurrence` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointement_booking`
--

INSERT INTO `appointement_booking` (`id`, `doctro_name`, `examination_id`, `room_id`, `patient_id`, `examination_color`, `starteTime`, `endtime`, `start_date`, `end_date`, `created_at`, `updated_at`, `str_starttime`, `str_endtime`, `str_startdate`, `str_enddate`, `is_cancel`, `recurrence`) VALUES
(1, '15', 2, 10, 1, '#c619a2', '9:00', '9:20', '2019-08-28 09:00:00', '2019-08-28 09:20:00', '2019-08-27 11:20:28', '2019-08-27 11:31:28', '1566896400', '1566897600', '1566982800', '1566984000', '0', 0),
(2, '12', 2, 5, 4, '#FF0000', '14:40', '15:10', '2019-08-29 14:40:00', '2019-08-29 15:10:00', '2019-08-29 12:38:47', '2019-08-29 12:39:26', '1567089600', '1567091400', '1567089600', '1567091400', '1', 0),
(3, '12', 2, 10, 2, '#c619a2', '15:10', '15:20', '2019-08-29 15:10:00', '2019-08-29 15:20:00', '2019-08-29 12:51:55', '2019-08-29 12:51:55', '1567091400', '1567092000', '1567091400', '1567092000', '0', 0),
(4, '12', 2, 10, 2, '#FF0000', '15:10', '15:20', '2019-08-29 15:10:00', '2019-08-29 15:20:00', '2019-08-29 12:51:56', '2019-08-29 12:58:40', '1567091400', '1567092000', '1567091400', '1567092000', '1', 0),
(5, '16', 2, 12, 2, '#000000', '16:30', '16:40', '2019-09-02 16:30:00', '2019-09-02 16:40:00', '2019-08-29 13:01:25', '2019-08-29 13:01:25', '1567096200', '1567096800', '1567441800', '1567442400', '0', 0),
(6, '12', 2, 12, 1, '#000000', '15:10', '15:30', '2019-08-29 15:10:00', '2019-08-29 15:30:00', '2019-08-29 13:05:46', '2019-08-29 13:05:46', '1567091400', '1567092600', '1567091400', '1567092600', '0', 0),
(7, '15', 2, 10, 2, '#c619a2', '15:20', '15:30', '2019-08-29 15:20:00', '2019-08-29 15:30:00', '2019-08-29 13:06:44', '2019-08-29 13:06:44', '1567092000', '1567092600', '1567092000', '1567092600', '0', 0),
(8, '12', 2, 13, 4, '#d2fe11', '10:30', '10:40', '2019-09-05 10:30:00', '2019-09-05 10:40:00', '2019-09-02 14:22:28', '2019-09-02 14:22:28', '1567420200', '1567420800', '1567679400', '1567680000', '0', 0),
(10, '18', 2, 5, 2, '#d61f2d', '9:20', '9:30', '2019-09-06 09:20:00', '2019-09-06 09:30:00', '2019-09-03 16:51:56', '2019-09-03 16:51:56', '1567502400', '1567503000', '1567761600', '1567762200', '0', 0),
(11, '12', 2, 5, 9, '#d61f2d', '15:20', '15:30', '2019-09-05 15:20:00', '2019-09-05 15:30:00', '2019-09-05 13:18:13', '2019-09-05 13:18:13', '1567696800', '1567697400', '1567696800', '1567697400', '0', 0),
(12, '18', 2, 10, 9, '#c619a2', '15:30', '15:40', '2019-09-05 15:30:00', '2019-09-05 15:40:00', '2019-09-05 13:20:01', '2019-09-05 13:20:01', '1567697400', '1567698000', '1567697400', '1567698000', '0', 0),
(13, '15', 2, 12, 9, '#000000', '15:40', '15:50', '2019-09-05 15:40:00', '2019-09-05 15:50:00', '2019-09-05 13:21:00', '2019-09-05 13:21:00', '1567698000', '1567698600', '1567698000', '1567698600', '0', 0),
(14, '19', 2, 13, 9, '#d2fe11', '15:50', '16:00', '2019-09-05 15:50:00', '2019-09-05 16:00:00', '2019-09-05 13:21:42', '2019-09-05 13:21:42', '1567698600', '1567699200', '1567698600', '1567699200', '0', 0),
(15, '12', 2, 10, 9, '#c619a2', '16:00', '16:10', '2019-09-05 16:00:00', '2019-09-05 16:10:00', '2019-09-05 13:22:18', '2019-09-05 13:22:18', '1567699200', '1567699800', '1567699200', '1567699800', '0', 0),
(16, '10', 2, 5, 2, '#d61f2d', '10:10', '10:20', '2019-09-17 10:10:00', '2019-09-17 10:20:00', '2019-09-17 12:54:23', '2019-09-17 12:54:23', '1568715000', '1568715600', '1568801400', '1568802000', '0', 0),
(17, '10', 2, 5, 11, '#d61f2d', '17:00', '17:10', '2019-09-17 17:00:00', '2019-09-17 17:10:00', '2019-09-17 15:01:15', '2019-09-17 15:01:15', '1568739600', '1568740200', '1568739600', '1568740200', '0', 0),
(18, '16', 2, 12, 11, '#000000', '17:10', '17:20', '2019-09-17 17:10:00', '2019-09-17 17:20:00', '2019-09-17 15:02:47', '2019-09-17 15:02:47', '1568740200', '1568740800', '1568740200', '1568740800', '0', 0),
(19, '12', 2, 5, 4, '#d61f2d', '18:20', '18:40', '2019-09-19 18:20:00', '2019-09-19 18:40:00', '2019-09-19 12:45:03', '2019-09-19 12:45:32', '1568917200', '1568918400', '1568917200', '1568918400', '0', 0),
(20, '15', 2, 5, 4, '#d61f2d', '9:00', '9:10', '2019-09-20 09:00:00', '2019-09-20 09:10:00', '2019-09-19 12:47:10', '2019-09-19 12:47:10', '1568883600', '1568884200', '1569229200', '1569229800', '0', 0),
(21, '12', 2, 9, 6, '#159723', '17:00', '17:00', '2019-09-20 17:00:00', '2019-09-20 17:00:00', '2019-09-20 14:52:22', '2019-09-20 15:32:02', '1568998800', '1568998800', '1568998800', '1568998800', '0', 0),
(22, '12', 2, 9, 12, '#159723', '17:30', '17:40', '2019-09-20 17:30:00', '2019-09-20 17:40:00', '2019-09-20 15:35:45', '2019-09-20 15:35:45', '1569000600', '1569001200', '1569000600', '1569001200', '0', 0),
(23, '18', 2, 5, 9, '#d61f2d', '9:10', '9:20', '2019-09-23 09:10:00', '2019-09-23 09:20:00', '2019-09-20 15:50:08', '2019-09-20 15:50:08', '1568970600', '1568971200', '1569229800', '1569230400', '0', 0),
(24, '10', 2, 5, 5, '#d61f2d', '9:20', '9:30', '2019-09-23 09:20:00', '2019-09-23 09:30:00', '2019-09-20 15:50:57', '2019-09-20 15:50:57', '1568971200', '1568971800', '1569230400', '1569231000', '0', 0),
(25, '18', 2, 10, 3, '#c619a2', '9:40', '9:50', '2019-09-23 09:40:00', '2019-09-23 09:50:00', '2019-09-20 15:51:29', '2019-09-20 15:51:29', '1568972400', '1568973000', '1569231600', '1569232200', '0', 0),
(26, '10', 2, 9, 2, '#159723', '9:30', '9:40', '2019-09-23 09:30:00', '2019-09-23 09:40:00', '2019-09-20 15:52:00', '2019-09-20 15:52:00', '1568971800', '1568972400', '1569231000', '1569231600', '0', 0),
(27, '10', 2, 10, 13, '#c619a2', '9:50', '10:00', '2019-09-23 09:50:00', '2019-09-23 10:00:00', '2019-09-20 15:54:23', '2019-09-20 15:54:23', '1568973000', '1568973600', '1569232200', '1569232800', '0', 0),
(28, '10', 2, 10, 14, '#c619a2', '10:00', '10:10', '2019-09-23 10:00:00', '2019-09-23 10:10:00', '2019-09-20 15:57:25', '2019-09-20 15:57:25', '1568973600', '1568974200', '1569232800', '1569233400', '0', 0),
(29, '15', 2, 5, 3, '#d61f2d', '10:10', '10:20', '2019-09-23 10:10:00', '2019-09-23 10:20:00', '2019-09-20 15:58:27', '2019-09-20 15:58:27', '1568974200', '1568974800', '1569233400', '1569234000', '0', 0),
(30, '10', 2, 12, 4, '#000000', '10:20', '10:30', '2019-09-23 10:20:00', '2019-09-23 10:30:00', '2019-09-20 17:03:48', '2019-09-20 17:03:48', '1568974800', '1568975400', '1569234000', '1569234600', '0', 0),
(31, '10', 2, 10, 3, '#c619a2', '13:20', '14:20', '2019-09-24 13:20:00', '2019-09-24 14:20:00', '2019-09-24 07:46:58', '2019-09-24 07:47:31', '1569331200', '1569334800', '1569331200', '1569334800', '0', 0),
(32, '12', 2, 5, 3, '#d61f2d', '9:30', '9:40', '2019-09-27 09:30:00', '2019-09-27 09:40:00', '2019-09-24 11:00:37', '2019-09-26 16:30:40', '1569490200', '1569490800', '1569576600', '1569577200', '0', 0),
(33, '10', 2, 5, 11, '#d61f2d', '10:10', '10:20', '2019-09-25 10:10:00', '2019-09-25 10:20:00', '2019-09-25 07:32:32', '2019-09-25 07:32:32', '1569406200', '1569406800', '1569406200', '1569406800', '0', 0),
(34, '18', 2, 12, 2, '#000000', '10:20', '10:30', '2019-09-25 10:20:00', '2019-09-25 10:30:00', '2019-09-25 07:33:05', '2019-09-25 07:33:05', '1569406800', '1569407400', '1569406800', '1569407400', '0', 0),
(35, '18', 2, 13, 6, '#d2fe11', '10:30', '10:40', '2019-09-25 10:30:00', '2019-09-25 10:40:00', '2019-09-25 07:33:32', '2019-09-25 07:33:32', '1569407400', '1569408000', '1569407400', '1569408000', '0', 0),
(36, '18', 2, 10, 5, '#c619a2', '14:00', '14:10', '2019-09-25 14:00:00', '2019-09-25 14:10:00', '2019-09-25 07:34:25', '2019-09-25 07:34:25', '1569420000', '1569420600', '1569420000', '1569420600', '0', 0),
(37, '19', 2, 9, 9, '#159723', '14:10', '14:20', '2019-09-25 14:10:00', '2019-09-25 14:20:00', '2019-09-25 07:34:55', '2019-09-25 07:34:55', '1569420600', '1569421200', '1569420600', '1569421200', '0', 0),
(38, '10', 2, 12, 10, '#000000', '14:20', '14:30', '2019-09-25 14:20:00', '2019-09-25 14:30:00', '2019-09-25 07:39:02', '2019-09-25 07:39:02', '1569421200', '1569421800', '1569421200', '1569421800', '0', 0),
(39, '15', 2, 9, 3, '#159723', '14:30', '14:40', '2019-09-25 14:30:00', '2019-09-25 14:40:00', '2019-09-25 07:39:39', '2019-09-25 07:39:39', '1569421800', '1569422400', '1569421800', '1569422400', '0', 0),
(40, '18', 2, 9, 11, '#159723', '14:40', '14:50', '2019-09-25 14:40:00', '2019-09-25 14:50:00', '2019-09-25 07:40:16', '2019-09-25 07:40:16', '1569422400', '1569423000', '1569422400', '1569423000', '0', 0),
(41, '10', 2, 5, 16, '#d61f2d', '15:00', '15:10', '2019-09-25 15:00:00', '2019-09-25 15:10:00', '2019-09-25 07:43:09', '2019-09-25 07:43:09', '1569423600', '1569424200', '1569423600', '1569424200', '0', 0),
(42, '10', 2, 5, 17, '#d61f2d', '14:50', '15:00', '2019-09-25 14:50:00', '2019-09-25 15:00:00', '2019-09-25 07:45:17', '2019-09-25 07:45:17', '1569423000', '1569423600', '1569423000', '1569423600', '0', 0),
(43, '10', 2, 9, 17, '#159723', '15:10', '15:20', '2019-09-25 15:10:00', '2019-09-25 15:20:00', '2019-09-25 07:59:51', '2019-09-25 07:59:51', '1569424200', '1569424800', '1569424200', '1569424800', '0', 0),
(44, '10', 2, 5, 14, '#d61f2d', '15:20', '15:40', '2019-09-25 15:20:00', '2019-09-25 15:40:00', '2019-09-25 08:13:09', '2019-09-25 08:13:09', '1569424800', '1569426000', '1569424800', '1569426000', '0', 0),
(45, '15', 2, 13, 13, '#d2fe11', '16:00', '16:10', '2019-09-25 16:00:00', '2019-09-25 16:10:00', '2019-09-25 08:14:18', '2019-09-25 08:14:18', '1569427200', '1569427800', '1569427200', '1569427800', '0', 0),
(46, '10', 2, 5, 18, '#d61f2d', '14:40', '14:50', '2019-09-25 14:40:00', '2019-09-25 14:50:00', '2019-09-25 12:56:07', '2019-09-25 12:56:07', '1569422400', '1569423000', '1569422400', '1569423000', '0', 0),
(47, '10', 2, 5, 18, '#d61f2d', '14:40', '14:50', '2019-09-25 14:40:00', '2019-09-25 14:50:00', '2019-09-25 12:56:07', '2019-09-25 12:56:07', '1569422400', '1569423000', '1569422400', '1569423000', '0', 0),
(48, '10', 2, 5, 19, '#d61f2d', '16:10', '16:10', '2019-09-25 16:10:00', '2019-09-25 16:10:00', '2019-09-25 14:03:54', '2019-09-25 14:03:54', '1569427800', '1569427800', '1569427800', '1569427800', '0', 0),
(49, '10', 2, 5, 19, '#d61f2d', '16:10', '16:10', '2019-09-25 16:10:00', '2019-09-25 16:10:00', '2019-09-25 14:04:47', '2019-09-25 14:04:47', '1569427800', '1569427800', '1569427800', '1569427800', '0', 0),
(50, '10', 2, 5, 3, '#d61f2d', '14:40', '14:50', '2019-09-30 14:40:00', '2019-09-30 14:50:00', '2019-09-26 16:29:57', '2019-09-26 16:29:57', '1569508800', '1569509400', '1569854400', '1569855000', '0', 0),
(51, '12', 2, 5, 5, '#d61f2d', '10:50', '11:10', '2019-10-03 10:50:00', '2019-10-03 11:10:00', '2019-10-03 04:42:57', '2019-10-03 04:42:57', '1570099800', '1570101000', '1570099800', '1570101000', '0', 0),
(52, '12', 2, 9, 11, '#159723', '12:00', '12:10', '2019-10-04 12:00:00', '2019-10-04 12:10:00', '2019-10-04 09:42:29', '2019-10-04 09:42:29', '1570190400', '1570191000', '1570190400', '1570191000', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_medicine`
--

CREATE TABLE `appointment_medicine` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `medicine` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment_medicine`
--

INSERT INTO `appointment_medicine` (`id`, `appointment_id`, `medicine`, `created_at`, `updated_at`) VALUES
(2, 20, '[{\"name\":null,\"dosage\":\"daily\"},{\"name\":null,\"dosage\":null},{\"name\":null,\"dosage\":null}]', '2019-09-20 09:11:01', '2019-09-20 17:17:36'),
(3, 23, '[{\"name\":\"PINND\",\"dosage\":\"1\"},{\"name\":\"ERRS\",\"dosage\":\"1\"},{\"name\":null,\"dosage\":null}]', '2019-09-23 09:57:10', '2019-09-23 10:02:14'),
(4, 40, '[{\"name\":\"X\",\"dosage\":\"1\"},{\"name\":null,\"dosage\":null}]', '2019-09-25 10:00:16', '2019-09-25 10:00:43'),
(5, 35, '[{\"name\":\"Y ore 15.15\",\"dosage\":\"1\"}]', '2019-09-25 10:01:11', '2019-09-25 10:01:11'),
(6, 34, '[{\"name\":\"x\",\"dosage\":\"1\"}]', '2019-09-25 13:59:04', '2019-09-25 13:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `commented_by` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `appointment_id`, `commented_by`, `comment`, `created_at`, `updated_at`) VALUES
(2, 20, 1, 'post op', '2019-09-20 17:17:55', '2019-09-20 17:17:55'),
(3, 20, 1, 'pl', '2019-09-20 17:28:54', '2019-09-20 17:28:54'),
(4, 23, 1, 'jdajdjajdaj', '2019-09-23 09:58:46', '2019-09-23 09:58:46'),
(6, 31, 1, 'l', '2019-09-24 10:59:33', '2019-09-24 10:59:33'),
(7, 35, 1, 'Non può prendere medicina x', '2019-09-25 08:19:44', '2019-09-25 08:19:44'),
(8, 40, 1, 'Non prendere medicina y', '2019-09-25 08:20:13', '2019-09-25 08:20:13'),
(9, 40, 1, 'Paziente con gravi difficoltà visive', '2019-09-25 08:21:10', '2019-09-25 08:21:10'),
(10, 34, 1, 'Paziente con occhio destro operato', '2019-09-25 08:21:41', '2019-09-25 08:21:41'),
(11, 39, 1, 'er', '2019-09-25 13:50:06', '2019-09-25 13:50:06'),
(12, 44, 1, '45y4w5y4w5ye45', '2019-09-25 13:50:56', '2019-09-25 13:50:56'),
(13, 52, 1, 'Ha prob occhio dx', '2019-10-04 09:49:40', '2019-10-04 09:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `daily_patient_history`
--

CREATE TABLE `daily_patient_history` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_patient_history`
--

INSERT INTO `daily_patient_history` (`id`, `appointment_id`, `message`, `updated_at`, `created_at`) VALUES
(6, 16, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-17 13:07:37', '2019-09-17 13:07:37'),
(7, 16, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-17 13:08:05', '2019-09-17 13:08:05'),
(8, 16, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-17 14:52:55', '2019-09-17 14:52:55'),
(9, 16, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-17 14:52:58', '2019-09-17 14:52:58'),
(10, 19, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-19 12:47:37', '2019-09-19 12:47:37'),
(11, 20, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-20 09:08:35', '2019-09-20 09:08:35'),
(12, 20, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-20 14:53:15', '2019-09-20 14:53:15'),
(13, 20, '<strong>admin</strong> spostato nella sezione <strong>Esami</strong>', '2019-09-20 14:53:17', '2019-09-20 14:53:17'),
(14, 20, '<strong>admin</strong> spostato nella sezione <strong>Pazienti del giorno</strong>', '2019-09-20 14:53:19', '2019-09-20 14:53:19'),
(15, 20, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-20 16:00:57', '2019-09-20 16:00:57'),
(16, 20, '<strong>admin</strong> spostato nella sezione <strong>Esami</strong>', '2019-09-20 16:09:55', '2019-09-20 16:09:55'),
(17, 20, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-20 16:30:30', '2019-09-20 16:30:30'),
(18, 20, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-20 16:30:52', '2019-09-20 16:30:52'),
(19, 20, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-20 16:30:53', '2019-09-20 16:30:53'),
(20, 20, '<strong>admin</strong> spostato nella sezione <strong>Esami</strong>', '2019-09-20 16:31:51', '2019-09-20 16:31:51'),
(21, 20, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-20 16:31:54', '2019-09-20 16:31:54'),
(22, 20, '<strong>admin</strong> commento aggiunto.', '2019-09-20 17:17:55', '2019-09-20 17:17:55'),
(23, 20, '<strong>admin</strong> commento aggiunto.', '2019-09-20 17:28:54', '2019-09-20 17:28:54'),
(24, 23, '<strong>admin</strong> commento aggiunto.', '2019-09-23 09:58:46', '2019-09-23 09:58:46'),
(25, 23, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-23 10:02:56', '2019-09-23 10:02:56'),
(26, 23, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-23 11:49:02', '2019-09-23 11:49:02'),
(27, 31, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-24 07:47:50', '2019-09-24 07:47:50'),
(28, 31, '<strong>admin</strong> commento aggiunto.', '2019-09-24 08:09:47', '2019-09-24 08:09:47'),
(29, 31, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-24 10:41:40', '2019-09-24 10:41:40'),
(30, 31, '<strong>admin</strong> commento aggiunto.', '2019-09-24 10:59:33', '2019-09-24 10:59:33'),
(31, 31, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-24 10:59:49', '2019-09-24 10:59:49'),
(32, 35, '<strong>admin</strong> commento aggiunto.', '2019-09-25 08:19:44', '2019-09-25 08:19:44'),
(33, 40, '<strong>admin</strong> commento aggiunto.', '2019-09-25 08:20:13', '2019-09-25 08:20:13'),
(34, 40, '<strong>admin</strong> commento aggiunto.', '2019-09-25 08:21:10', '2019-09-25 08:21:10'),
(35, 34, '<strong>admin</strong> commento aggiunto.', '2019-09-25 08:21:41', '2019-09-25 08:21:41'),
(36, 40, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-25 13:30:44', '2019-09-25 13:30:44'),
(37, 40, '<strong>admin</strong> spostato nella sezione <strong>Pazienti del giorno</strong>', '2019-09-25 13:30:47', '2019-09-25 13:30:47'),
(38, 34, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-25 13:33:13', '2019-09-25 13:33:13'),
(39, 34, '<strong>admin</strong> spostato nella sezione <strong>Pazienti del giorno</strong>', '2019-09-25 13:33:14', '2019-09-25 13:33:14'),
(40, 35, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-25 13:33:16', '2019-09-25 13:33:16'),
(41, 35, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-25 13:33:18', '2019-09-25 13:33:18'),
(42, 35, '<strong>admin</strong> spostato nella sezione <strong>Esami</strong>', '2019-09-25 13:33:19', '2019-09-25 13:33:19'),
(43, 35, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-25 13:33:22', '2019-09-25 13:33:22'),
(44, 35, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-25 13:33:52', '2019-09-25 13:33:52'),
(45, 35, '<strong>admin</strong> spostato nella sezione <strong>Esami</strong>', '2019-09-25 13:33:53', '2019-09-25 13:33:53'),
(46, 35, '<strong>admin</strong> spostato nella sezione <strong>Pazienti del giorno</strong>', '2019-09-25 13:34:04', '2019-09-25 13:34:04'),
(47, 35, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-25 13:36:08', '2019-09-25 13:36:08'),
(48, 34, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-25 13:36:12', '2019-09-25 13:36:12'),
(49, 36, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-25 13:36:13', '2019-09-25 13:36:13'),
(50, 38, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-25 13:36:15', '2019-09-25 13:36:15'),
(51, 39, '<strong>admin</strong> spostato nella sezione <strong>Esami</strong>', '2019-09-25 13:36:18', '2019-09-25 13:36:18'),
(52, 38, '<strong>admin</strong> spostato nella sezione <strong>Check Out</strong>', '2019-09-25 13:36:23', '2019-09-25 13:36:23'),
(53, 36, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-25 13:36:34', '2019-09-25 13:36:34'),
(54, 36, '<strong>admin</strong> spostato nella sezione <strong>Esami</strong>', '2019-09-25 13:36:35', '2019-09-25 13:36:35'),
(55, 35, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-25 13:37:50', '2019-09-25 13:37:50'),
(56, 39, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-25 13:37:51', '2019-09-25 13:37:51'),
(57, 36, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-25 13:37:53', '2019-09-25 13:37:53'),
(58, 38, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-25 13:37:55', '2019-09-25 13:37:55'),
(59, 39, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-25 13:49:46', '2019-09-25 13:49:46'),
(60, 39, '<strong>admin</strong> commento aggiunto.', '2019-09-25 13:50:06', '2019-09-25 13:50:06'),
(61, 44, '<strong>admin</strong> commento aggiunto.', '2019-09-25 13:50:56', '2019-09-25 13:50:56'),
(62, 44, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-25 13:53:03', '2019-09-25 13:53:03'),
(63, 47, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-25 13:53:34', '2019-09-25 13:53:34'),
(64, 47, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-25 13:53:44', '2019-09-25 13:53:44'),
(65, 40, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-25 13:54:03', '2019-09-25 13:54:03'),
(66, 37, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-25 13:54:11', '2019-09-25 13:54:11'),
(67, 34, '<strong>admin</strong> spostato nella sezione <strong>Pazienti del giorno</strong>', '2019-09-25 13:54:18', '2019-09-25 13:54:18'),
(68, 35, '<strong>admin</strong> spostato nella sezione <strong>Pazienti del giorno</strong>', '2019-09-25 13:54:20', '2019-09-25 13:54:20'),
(69, 37, '<strong>admin</strong> spostato nella sezione <strong>Pazienti del giorno</strong>', '2019-09-25 13:54:21', '2019-09-25 13:54:21'),
(70, 44, '<strong>admin</strong> spostato nella sezione <strong>Pazienti del giorno</strong>', '2019-09-25 13:54:23', '2019-09-25 13:54:23'),
(71, 44, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-25 13:55:07', '2019-09-25 13:55:07'),
(72, 36, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-25 13:56:37', '2019-09-25 13:56:37'),
(73, 44, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-25 13:56:59', '2019-09-25 13:56:59'),
(74, 51, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-10-03 04:43:13', '2019-10-03 04:43:13'),
(75, 52, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-10-04 09:48:30', '2019-10-04 09:48:30'),
(76, 52, '<strong>admin</strong> commento aggiunto.', '2019-10-04 09:49:40', '2019-10-04 09:49:40'),
(77, 52, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-10-04 09:51:52', '2019-10-04 09:51:52'),
(78, 52, '<strong>admin</strong> spostato nella sezione <strong>Esami</strong>', '2019-10-04 09:51:54', '2019-10-04 09:51:54'),
(79, 52, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-10-04 09:52:01', '2019-10-04 09:52:01');

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
(114, 22, '11:30', '12:30', 2, '2', '2019-09-23', '2019-09-23'),
(118, 23, '9:45', '19:45', 4, '2', '2019-09-24', '2019-09-24'),
(119, 23, '9:45', '19:45', 4, '3', '2019-09-24', '2019-09-24'),
(120, 23, '9:45', '19:45', 4, '4', '2019-09-24', '2019-09-24'),
(153, 10, '9:30', '18:30', 2, '2', '2019-09-24', '2019-09-24'),
(154, 10, '9:30', '18:30', 2, '3', '2019-09-24', '2019-09-24'),
(155, 10, '9:30', '18:30', 2, '4', '2019-09-24', '2019-09-24'),
(156, 12, '9:30', '18:30', 2, '5', '2019-09-24', '2019-09-24'),
(157, 12, '9:30', '18:30', 2, '6', '2019-09-24', '2019-09-24'),
(158, 15, '9:00', '18:00', 2, '2', '2019-09-24', '2019-09-24'),
(159, 15, '9:00', '18:00', 2, '3', '2019-09-24', '2019-09-24'),
(160, 15, '9:00', '18:00', 2, '4', '2019-09-24', '2019-09-24'),
(161, 15, '9:00', '18:00', 2, '5', '2019-09-24', '2019-09-24'),
(162, 15, '9:00', '18:00', 2, '6', '2019-09-24', '2019-09-24'),
(165, 16, '16:30', '17:30', 2, '2', '2019-09-24', '2019-09-24'),
(166, 16, '16:30', '17:30', 2, '3', '2019-09-24', '2019-09-24'),
(167, 17, '14:30', '19:30', 2, '6', '2019-09-24', '2019-09-24'),
(173, 18, '9:00', '17:00', 2, '2', '2019-09-24', '2019-09-24'),
(174, 18, '9:00', '17:00', 2, '3', '2019-09-24', '2019-09-24'),
(175, 18, '9:00', '17:00', 2, '4', '2019-09-24', '2019-09-24'),
(176, 18, '9:00', '17:00', 2, '5', '2019-09-24', '2019-09-24'),
(177, 18, '9:00', '17:00', 2, '6', '2019-09-24', '2019-09-24'),
(178, 19, '9:15', '19:15', 2, '2', '2019-09-24', '2019-09-24'),
(179, 19, '9:15', '19:15', 2, '3', '2019-09-24', '2019-09-24'),
(180, 19, '9:15', '19:15', 2, '4', '2019-09-24', '2019-09-24'),
(181, 19, '9:15', '19:15', 2, '5', '2019-09-24', '2019-09-24'),
(182, 19, '9:15', '19:15', 2, '6', '2019-09-24', '2019-09-24');

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
(8, 'Dermatologo', '2019-07-26', '2019-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `managepatient`
--

CREATE TABLE `managepatient` (
  `id` int(11) NOT NULL,
  `first` longtext,
  `second` longtext,
  `third` longtext,
  `fourth` longtext,
  `fifth` longtext,
  `manage_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managepatient`
--

INSERT INTO `managepatient` (`id`, `first`, `second`, `third`, `fourth`, `fifth`, `manage_date`, `created_at`, `updated_at`) VALUES
(3, NULL, NULL, '[{\"id\":\"2\",\"updated_by\":\"1\",\"update_date\":\"2019-9-17 16:52:58\"}]', NULL, NULL, '2019-09-17', '2019-09-17 13:07:37', '2019-09-17 14:52:58'),
(4, NULL, '[{\"id\":\"4\",\"updated_by\":\"1\",\"update_date\":\"2019-9-19 18:17:37\",\"color\":null}]', NULL, NULL, NULL, '2019-09-19', '2019-09-19 12:47:37', '2019-09-19 12:47:37'),
(5, NULL, NULL, '[{\"id\":\"4\",\"updated_by\":\"1\",\"update_date\":\"2019-9-20 18:31:54\",\"color\":\"#16dd33\"}]', NULL, NULL, '2019-09-20', '2019-09-20 09:08:34', '2019-09-20 16:31:56'),
(7, '[{\"id\":\"5\",\"updated_by\":\"1\",\"update_date\":\"2019-09-23 11:48:35\",\"color\":null},{\"id\":\"3\",\"updated_by\":\"1\",\"update_date\":\"2019-09-23 11:48:35\",\"color\":null},{\"id\":\"2\",\"updated_by\":\"1\",\"update_date\":\"2019-09-23 11:48:35\",\"color\":null},{\"id\":\"13\",\"updated_by\":\"1\",\"update_date\":\"2019-09-23 11:48:35\",\"color\":null},{\"id\":\"14\",\"updated_by\":\"1\",\"update_date\":\"2019-09-23 11:48:35\",\"color\":null},{\"id\":\"4\",\"updated_by\":\"1\",\"update_date\":\"2019-09-23 11:48:35\",\"color\":null}]', '[{\"id\":\"9\",\"updated_by\":\"1\",\"update_date\":\"2019-9-23 13:49:2\",\"color\":null}]', NULL, NULL, NULL, '2019-09-23', '2019-09-23 11:49:02', '2019-09-23 11:49:02'),
(8, NULL, '[{\"id\":\"3\",\"updated_by\":\"1\",\"update_date\":\"2019-9-24 12:59:50\",\"color\":null}]', NULL, NULL, NULL, '2019-09-24', '2019-09-24 07:47:50', '2019-09-24 10:59:49'),
(9, '[{\"id\":\"16\",\"updated_by\":\"1\",\"update_date\":\"2019-09-25 13:22:54\",\"color\":null},{\"id\":\"17\",\"updated_by\":\"1\",\"update_date\":\"2019-09-25 13:22:54\",\"color\":null},{\"id\":\"13\",\"updated_by\":\"1\",\"update_date\":\"2019-09-25 13:22:54\",\"color\":null},{\"id\":\"9\",\"updated_by\":\"1\",\"update_date\":\"2019-9-25 15:54:22\",\"color\":null},{\"id\":\"6\",\"updated_by\":\"1\",\"update_date\":\"2019-9-25 15:54:21\",\"color\":null},{\"id\":\"2\",\"updated_by\":\"1\",\"update_date\":\"2019-9-25 15:54:19\",\"color\":null}]', '[{\"id\":\"11\",\"updated_by\":\"1\",\"update_date\":\"2019-9-25 15:54:4\",\"color\":null},{\"id\":\"10\",\"updated_by\":\"1\",\"update_date\":\"2019-9-25 15:37:56\",\"color\":null}]', '[{\"id\":\"3\",\"updated_by\":\"1\",\"update_date\":\"2019-9-25 15:49:46\",\"color\":\"#6357c8\"},{\"id\":\"18\",\"updated_by\":\"1\",\"update_date\":\"2019-9-25 15:53:45\",\"color\":\"rgba(198,228,211,0.19)\"},{\"id\":\"5\",\"updated_by\":\"1\",\"update_date\":\"2019-9-25 15:56:38\",\"color\":null},{\"id\":\"14\",\"updated_by\":\"1\",\"update_date\":\"2019-9-25 15:57:0\",\"color\":null}]', NULL, NULL, '2019-09-25', '2019-09-25 13:30:44', '2019-09-25 13:58:31'),
(10, NULL, '[{\"id\":\"5\",\"updated_by\":\"1\",\"update_date\":\"2019-10-3 10:13:13\",\"color\":null}]', NULL, NULL, NULL, '2019-10-03', '2019-10-03 04:43:13', '2019-10-03 04:43:13'),
(11, NULL, NULL, '[{\"id\":\"11\",\"updated_by\":\"1\",\"update_date\":\"2019-10-4 11:52:1\",\"color\":\"#9a5f4a\"}]', NULL, NULL, '2019-10-04', '2019-10-04 09:48:30', '2019-10-04 09:52:13');

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
  `email` varchar(150) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `minor_patient` tinyint(4) NOT NULL DEFAULT '0',
  `description` longtext,
  `relative_info` varchar(200) DEFAULT NULL,
  `privacy` varchar(200) DEFAULT NULL,
  `eye_visit` longtext,
  `added_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `email`, `surname`, `name`, `phone`, `dob`, `minor_patient`, `description`, `relative_info`, `privacy`, `eye_visit`, `added_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'testing', NULL, NULL, 0, NULL, NULL, '{\"convention\":\"bo\",\"card_number\":\"22222\"}', '{\"type_of_visit\":null,\"insurance\":null,\"history\":null,\"reason_of_visit\":null,\"note\":null,\"orthoptic_val\":null,\"allergies\":null,\"visus_nat\":null,\"corr\":null,\"sf\":null,\"cil\":null,\"x\":null}', 1, 1, '2019-08-27 16:20:08', '2019-09-23 14:53:13'),
(2, 'test@gmail.com', 'sinto', 'Antonio123', NULL, '0000-00-00', 0, NULL, NULL, '{\"convention\":\"1234\",\"card_number\":\"444444\"}', NULL, 1, 1, '2019-08-29 10:14:53', '2019-09-17 20:07:57'),
(3, 'uhawona-1693@yopmail.com', 'Paolini', 'Paolo', '1111111111', '2019-08-21', 0, NULL, NULL, '{\"convention\":\"qqqw\",\"card_number\":\"1433\"}', NULL, 1, 1, '2019-08-29 17:35:16', '2019-09-20 21:26:11'),
(4, 'acywinna-7565@yopmail.com', 'Terra', 'Anna', '1111111111', '1984-02-28', 0, NULL, NULL, NULL, NULL, 1, 1, '2019-08-29 17:37:03', '2019-08-29 17:37:03'),
(5, 'veddommezem-5712@yopmail.com', 'Monti', 'Flavio', '1111111111', '0000-00-00', 0, NULL, NULL, NULL, NULL, 1, 1, '2019-09-02 19:53:07', '2019-09-02 19:53:07'),
(6, 'darappawin-7718@yopmail.com', 'Gironi', 'Carla', '1111111111', '1998-09-02', 0, NULL, NULL, NULL, NULL, 1, 1, '2019-09-02 19:54:45', '2019-09-02 19:54:45'),
(9, 'admin@gmail.com', 'Casa', 'GIacomo', '1111111111', '0000-00-00', 0, 'Il paziente ha un problema all\'occhio sinistro, e miope e potrebbe avere un distacco di retina', NULL, NULL, NULL, 1, 1, '2019-09-05 18:15:44', '2019-09-05 18:15:44'),
(10, 'tatalittadd-5836@yopmail.com', 'Causio', 'Federico', '1111111111', '2019-09-04', 0, 'Occhio arrossato', NULL, NULL, NULL, 1, 1, '2019-09-05 18:28:41', '2019-09-05 18:28:41'),
(11, 'rafaxoxisse-9074@yopmail.com', 'Franchini', 'GInevra', '1111111111', '1972-02-02', 0, 'Paziente con problemi all\'occhio destro', NULL, '{\"convention\":\"324242\",\"card_number\":\"213312\"}', NULL, 1, 1, '2019-09-17 19:58:56', '2019-09-17 19:59:47'),
(12, 'wahummetohy-6608@yopmail.com', 'Montini', 'monica', '1111111111', '2019-09-19', 0, 'Ha fatto due interventi cataratta', NULL, '{\"convention\":\"11111\",\"card_number\":\"1222\"}', NULL, 1, 1, '2019-09-20 20:35:34', '2019-09-20 20:37:00'),
(13, 'ezabove-4725@yopmail.com', 'Paletti', 'Orlando', '1111111111', '1959-09-01', 0, 'Allergie per atropina', NULL, '{\"convention\":\"asl\",\"card_number\":\"3333\"}', '{\"type_of_visit\":null,\"insurance\":\"uhyh\",\"history\":\"hghh\",\"reason_of_visit\":null,\"note\":\"1\",\"orthoptic_val\":\"1\",\"allergies\":null,\"visus_nat\":\"1\",\"corr\":null,\"sf\":null,\"cil\":null,\"x\":null}', 1, 1, '2019-09-20 20:54:16', '2019-09-25 12:51:55'),
(14, 'ecikakoz-5672@yopmail.com', 'Forlandini', 'Nadia', '1111111111', '1919-05-08', 1, 'Paziente anziano', NULL, '{\"convention\":\"ereto\",\"card_number\":\"1233\"}', NULL, 1, 1, '2019-09-20 20:57:20', '2019-09-25 12:48:31'),
(15, 'licurrippoti-9484@yopmail.com', 'Gointi', 'Roberto', '0303338944', '1947-01-09', 1, 'Affetto da patologie gravi', '[{\"fullname\":\"Franca Minuti\",\"relation\":\"Madre\",\"contactno\":\"22222222\"}]', NULL, NULL, 1, 1, '2019-09-23 14:38:31', '2019-09-25 12:49:54'),
(16, 'wahuzyqe-1703@yopmail.com', 'Potenti', 'Carlo', '2222222222', '1983-01-21', 0, 'Soffre di allergie', NULL, NULL, NULL, 1, 1, '2019-09-25 12:43:03', '2019-09-25 12:43:03'),
(17, 'uttellannomm-8880@yopmail.com', 'Ferini', 'Francesca', '2222222222', '1998-09-11', 0, 'Paziente con patologie rare', NULL, NULL, NULL, 1, 1, '2019-09-25 12:45:14', '2019-09-25 12:45:14'),
(18, NULL, 'Scuri', 'Franco', NULL, '1992-09-10', 1, 'fbgbgfbfbfbf', '[{\"fullname\":\"Franca Minuti\",\"relation\":\"Madre\",\"contactno\":null}]', '{\"convention\":\"we\",\"card_number\":\"123\"}', '{\"type_of_visit\":null,\"insurance\":null,\"history\":null,\"reason_of_visit\":null,\"note\":null,\"orthoptic_val\":null,\"allergies\":null,\"visus_nat\":null,\"corr\":null,\"sf\":null,\"cil\":null,\"x\":null}', 1, 1, '2019-09-25 17:45:32', '2019-09-25 18:21:26'),
(19, 'francesco@gmail.com', 'Francesco Piru', 'adfsdfs', '3410404040', '2019-09-11', 0, 'wqefwqerf', NULL, NULL, NULL, 1, 1, '2019-09-25 19:03:51', '2019-09-25 19:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `privacy`
--

CREATE TABLE `privacy` (
  `id` int(11) NOT NULL,
  `description` longtext,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privacy`
--

INSERT INTO `privacy` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Con questo documento si accetta l\' utilizzo dei dati personali3boiefunewirlfyliweyornwyhoubtfek', '2019-09-06 07:17:15', '2019-09-25 13:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `recurrence_appointment`
--

CREATE TABLE `recurrence_appointment` (
  `id` int(11) NOT NULL,
  `recurrence_type` varchar(50) NOT NULL,
  `patient_id` int(11) NOT NULL DEFAULT '0',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(5, 'Visita', '#d61f2d', 2, '2019-07-23', '2019-08-28'),
(9, 'Visite post operatorie', '#159723', 2, '2019-07-26', '2019-08-28'),
(10, 'Visite pre operatorie', '#c619a2', 2, '2019-07-26', '2019-08-28'),
(12, 'Intervento', '#000000', 2, '2019-08-28', '2019-08-28'),
(13, 'Controllo', '#d2fe11', 2, '2019-08-28', '2019-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `surgeries`
--

CREATE TABLE `surgeries` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `medical_number` varchar(50) DEFAULT NULL,
  `intervention_number` varchar(100) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `time` int(11) NOT NULL,
  `local_examination` longtext,
  `surgery_date` date NOT NULL,
  `surgery_type` tinyint(4) NOT NULL COMMENT '1=Ambulatoriale,2= Day surgery',
  `diagnosis` int(11) NOT NULL DEFAULT '0',
  `surgery` int(11) NOT NULL DEFAULT '0',
  `eye` int(11) NOT NULL DEFAULT '0',
  `operating_record` longtext,
  `description` longtext,
  `clinical_diary` longtext,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surgeries`
--

INSERT INTO `surgeries` (`id`, `patient_id`, `doctor_id`, `medical_number`, `intervention_number`, `name`, `time`, `local_examination`, `surgery_date`, `surgery_type`, `diagnosis`, `surgery`, `eye`, `operating_record`, `description`, `clinical_diary`, `updated_at`, `created_at`) VALUES
(1, 5, 12, NULL, NULL, 'Test surgery', 3900, NULL, '2019-10-10', 1, 0, 0, 0, NULL, NULL, NULL, '2019-10-03 04:44:13', '2019-10-03 04:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `surname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `surname`, `name`, `email`, `password`, `remember_token`, `role_type`, `phone`, `regione`, `cap`, `dob`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin@gmail.com', '$2y$10$xip7EkoVdkmjlpuYyfH/F.a4NHZRGawsCS.BdTKKJ9vEQz03DY7Be', 'vRygSkggDTPAYvu7piLWMi9ZSXIwgswihy72TCYf01Q2Kv8h01gDOn6U7XsL', 1, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(4, NULL, 'Carmelo', 'Carmelo@gmail.com', '$2y$10$RoJ1xHhX8K/WwiGGxewpN.xItamroetAP9/lmiv1MOuuOiHsnfpXK', NULL, 2, '9864654654', 'Concesio, Province of Brescia, Italy', 110645, '2019-12-26', '0', '2019-07-18 08:57:25', '2019-07-30 14:21:38'),
(10, 'Renni', 'Romeo', 'test@gmail.com', '$2y$10$s6zn72v3RJyeTEBut3Q2vOKF9kf.LJ..dThrYu3TdBv95dS2rAYnC', 'kr7J8ZZLunzgkH6u2XNSeBxOeUVyvgVVRK9HGo0Yp1mkRhzSBcgjuCxruVzv', 3, '4545154545', 'Italia', 201520, '02-06-2019', '0', '2019-07-23 09:13:05', '2019-09-24 16:08:26'),
(11, NULL, 'Luca', 'john@yopmail.com', '$2y$10$wS8kdfvV3h1NpX9TvS/Dp.PYERMx9rFc3qwsC/aR5wGr2dfp9vLLO', 'aqh3iWGhYb0u2qJtOcVdjWLC2vEk9yxNm9tuwzTGJuEa8tL6nsB6OrTBVm68', 2, '9898764654', 'Concesio, Province of Brescia, Italy', 110065, '30-11-2019', '0', '2019-07-23 20:38:19', '2019-08-28 19:36:26'),
(12, 'Frassine', 'Riccardo', 'riccardo.t@komete.it', '$2y$10$0GAuMSAa49wWceSwxdbiHu2U8ZGayPIuWQ3qEjhY7cps.LtDfrRaW', NULL, 3, '0000000000', 'Italia', 25125, '20-01-1996', '0', '2019-07-26 17:30:51', '2019-09-24 16:08:42'),
(13, NULL, 'Silvia', 'francesco.g@komete.it', '$2y$10$TJPocix4qqVXMNUUQ5mZdOOlKcyKjwBB8mncjUfIXAvUJbHHFFuVS', NULL, 2, '1223333430', 'Lombardia', 12345, '01-01-1970', '0', '2019-07-26 18:01:55', '2019-09-20 21:47:09'),
(15, 'Olinetti', 'Paolo', 'dummydoc@mailinator.com', '$2y$10$xip7EkoVdkmjlpuYyfH/F.a4NHZRGawsCS.BdTKKJ9vEQz03DY7Be', 'gzvV1ULi0pTT4TnbMpFdHQFmqj4pw8waUj545CMxpgy1BZcJz1wqHcBbyJKc', 3, '9876543211', 'Italia', 21111, '07-10-1991', '0', '2019-08-06 17:46:16', '2019-09-24 16:09:16'),
(16, 'Portesino', 'Giovanni', 'hafykabyc-0021@yopmail.com', '$2y$10$GJK.iom9x/aKwSxs6vnjPOan.Krd.7p11vCQYchBwSwopn/0UMKpa', NULL, 3, '1111111111', 'Italia', 2511, '31-08-2019', '0', '2019-08-28 19:21:45', '2019-09-24 16:07:50'),
(17, 'Lirvi', 'Francesca', 'xarassekett-8160@yopmail.com', '$2y$10$t8klvX8oAWsrIo9xbNG5wuoxVizvg5Blyt4F3ff0ybuvYN7IdMt7m', NULL, 3, '1111111111', 'Italia', 2511, '11-01-2020', '0', '2019-08-28 19:48:39', '2019-09-24 16:08:16'),
(18, 'Ionio', 'Valentina', 'illirralla-0882@yopmail.com', '$2y$10$VVfLe.lyIID3Fc5IeCPelen0/PQ6ffuQJAurd37pKXJBl7EO6cKuO', NULL, 3, '1111111222', 'Italia', 22222, '22-11-2017', '0', '2019-08-28 20:04:42', '2019-09-24 16:07:26'),
(19, 'Flavia', 'Rosa', 'giacomo.c@komete.it', '$2y$10$3hC8vCEWOZsT4NBr1MD2ieOjxwWNg7.J/bTPvG.fijtoJJdCx177m', NULL, 3, '1111111111', 'Friuli', 22222, '01-07-2019', '0', '2019-08-28 22:16:29', '2019-09-24 16:10:33'),
(20, NULL, 'Luca', 'emussillyd-5960@yopmail.com', '$2y$10$K3UybGsdw8m8Q27fIw4OqewHSILM77an7Prq8wdz4Cpt3KZB6HJY6', NULL, 2, '1111111222', 'Piemonte', 2511, '18-09-2019', '1', '2019-09-20 21:40:59', '2019-09-20 21:42:02'),
(21, NULL, 'Luca', 'terraneoriccardo@gmail.com', '$2y$10$VH/Rhfsld8/kP5k4KJDOue4lSfC4Y0sFYncPULizmdX1.COrkfeFK', NULL, 2, '1111111111', 'Friuli', 2511, '23-09-2019', '1', '2019-09-23 13:21:29', '2019-09-23 13:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--

CREATE TABLE `weekdays` (
  `weekday_num` int(11) NOT NULL,
  `day_of_week_it` varchar(255) NOT NULL,
  `day_of_week` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weekdays`
--

INSERT INTO `weekdays` (`weekday_num`, `day_of_week_it`, `day_of_week`) VALUES
(2, 'Lunedi', 'Mon'),
(3, 'Martedì', 'Tue'),
(4, 'Mercoledì', 'Wed'),
(5, 'Giovedì', 'Thu'),
(6, 'Venerdì', 'Fri'),
(7, 'Sabato', 'Sat'),
(8, 'Domenica', 'Sun');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointement_booking`
--
ALTER TABLE `appointement_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_medicine`
--
ALTER TABLE `appointment_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_patient_history`
--
ALTER TABLE `daily_patient_history`
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
-- Indexes for table `managepatient`
--
ALTER TABLE `managepatient`
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
-- Indexes for table `privacy`
--
ALTER TABLE `privacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recurrence_appointment`
--
ALTER TABLE `recurrence_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surgeries`
--
ALTER TABLE `surgeries`
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
  ADD UNIQUE KEY `day_of_week` (`day_of_week_it`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointement_booking`
--
ALTER TABLE `appointement_booking`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `appointment_medicine`
--
ALTER TABLE `appointment_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `daily_patient_history`
--
ALTER TABLE `daily_patient_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;
--
-- AUTO_INCREMENT for table `examination`
--
ALTER TABLE `examination`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `managepatient`
--
ALTER TABLE `managepatient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `privacy`
--
ALTER TABLE `privacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `recurrence_appointment`
--
ALTER TABLE `recurrence_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `surgeries`
--
ALTER TABLE `surgeries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
