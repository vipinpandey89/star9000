-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2019 at 02:24 PM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-2+ubuntu16.04.1+deb.sury.org+2+will+reach+end+of+life+in+april+2019

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `star9000`
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
  `visit_motive` text,
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

INSERT INTO `appointement_booking` (`id`, `doctro_name`, `examination_id`, `room_id`, `patient_id`, `examination_color`, `visit_motive`, `starteTime`, `endtime`, `start_date`, `end_date`, `created_at`, `updated_at`, `str_starttime`, `str_endtime`, `str_startdate`, `str_enddate`, `is_cancel`, `recurrence`) VALUES
(1, '28', 3, 5, 3, '#0ae291', NULL, '9:30', '9:50', '2019-08-27 09:30:00', '2019-08-27 09:50:00', '2019-08-26 07:28:58', '2019-08-26 07:28:58', '1566811800', '1566813000', '1566898200', '1566899400', '0', 0),
(2, '30', 3, 5, 4, '#0ae291', NULL, '10:40', '10:50', '2019-08-27 10:40:00', '2019-08-27 10:50:00', '2019-08-26 09:37:37', '2019-08-26 09:37:37', '1566816000', '1566816600', '1566902400', '1566903000', '0', 0),
(3, '30', 3, 5, 2, '#0ae291', NULL, '11:00', '11:20', '2019-08-28 11:00:00', '2019-08-28 11:20:00', '2019-08-26 09:44:11', '2019-08-26 09:52:53', '1566817200', '1566818400', '1566990000', '1566991200', '0', 1),
(4, '30', 3, 5, 3, '#0ae291', NULL, '11:00', '11:20', '2019-08-29 11:00:00', '2019-08-29 11:20:00', '2019-08-26 09:44:11', '2019-08-26 09:44:11', '1566817200', '1566818400', '1567076400', '1567077600', '0', 1),
(5, '30', 3, 5, 3, '#0ae291', NULL, '11:00', '11:20', '2019-08-30 11:00:00', '2019-08-30 11:20:00', '2019-08-26 09:44:11', '2019-08-26 09:44:11', '1566817200', '1566818400', '1567162800', '1567164000', '0', 1),
(6, '30', 3, 5, 6, '#0ae291', NULL, '9:00', '9:10', '2019-08-28 09:00:00', '2019-08-28 09:10:00', '2019-08-26 11:46:23', '2019-08-26 11:46:23', '1566810000', '1566810600', '1566982800', '1566983400', '0', 0),
(7, '30', 3, 5, 6, '#0ae291', NULL, '9:50', '10:20', '2019-09-04 09:50:00', '2019-09-04 10:20:00', '2019-09-03 07:39:46', '2019-09-03 07:39:46', '1567504200', '1567506000', '1567590600', '1567592400', '0', 0),
(8, '30', 3, 5, 2, '#0ae291', NULL, '11:10', '11:30', '2019-09-04 11:10:00', '2019-09-04 11:30:00', '2019-09-03 09:36:09', '2019-09-03 09:36:09', '1567509000', '1567510200', '1567595400', '1567596600', '0', 0),
(9, '30', 3, 5, 14, '#0ae291', NULL, '9:10', '9:20', '2019-09-05 09:10:00', '2019-09-05 09:20:00', '2019-09-03 10:33:13', '2019-09-03 10:33:13', '1567501800', '1567502400', '1567674600', '1567675200', '0', 0),
(10, '30', 3, 5, 15, '#0ae291', NULL, '10:20', '10:30', '2019-09-06 10:20:00', '2019-09-06 10:30:00', '2019-09-03 10:38:50', '2019-09-03 10:38:50', '1567506000', '1567506600', '1567765200', '1567765800', '0', 0),
(11, '30', 3, 5, 18, '#0ae291', NULL, '10:10', '10:20', '2019-09-05 10:10:00', '2019-09-05 10:20:00', '2019-09-04 10:24:31', '2019-09-04 10:24:31', '1567591800', '1567592400', '1567678200', '1567678800', '0', 0),
(12, '30', 3, 5, 1, '#0ae291', NULL, '9:10', '9:30', '2019-09-26 09:10:00', '2019-09-25 09:30:00', '2019-09-11 10:06:03', '2019-09-11 10:06:03', '1568193000', '1568194200', '1568279400', '1568280600', '0', 0),
(13, '29', 3, 5, 19, '#0ae291', NULL, '13:20', '13:40', '2019-09-26 13:20:00', '2019-09-25 13:40:00', '2019-09-11 10:08:58', '2019-09-11 10:08:58', '1568208000', '1568209200', '1568294400', '1568295600', '0', 0),
(14, '29', 3, 5, 8, '#0ae291', NULL, '15:40', '16:00', '2019-09-11 15:40:00', '2019-09-11 16:00:00', '2019-09-11 10:19:24', '2019-09-11 10:19:24', '1568216400', '1568217600', '1568216400', '1568217600', '0', 0),
(15, '29', 3, 5, 2, '#0ae291', NULL, '17:20', '17:30', '2019-09-11 17:20:00', '2019-09-11 17:30:00', '2019-09-11 10:20:22', '2019-09-11 10:20:22', '1568222400', '1568223000', '1568222400', '1568223000', '0', 0),
(18, '30', 3, 5, 19, '#0ae291', NULL, '10:00', '10:20', '2019-09-20 10:00:00', '2019-09-20 10:20:00', '2019-09-19 12:25:46', '2019-09-19 12:34:27', '1568887200', '1568888400', '1568973600', '1568974800', '0', 0),
(19, '30', 3, 5, 2, '#0ae291', 'motivation', '10:10', '10:30', '2019-10-04 10:10:00', '2019-10-04 10:30:00', '2019-09-27 05:09:07', '2019-10-04 09:59:02', '1570183800', '1570185000', '1570183800', '1570185000', '0', 0),
(20, '29', 3, 5, 2, '#0ae291', NULL, '13:40', '13:50', '2019-09-27 13:40:00', '2019-09-27 13:50:00', '2019-09-27 08:05:00', '2019-09-27 08:05:00', '1569591600', '1569592200', '1569591600', '1569592200', '0', 0),
(21, '29', 3, 5, 1, '#0ae291', 'motive visit test', '15:50', '16:10', '2019-10-04 15:50:00', '2019-10-04 16:10:00', '2019-10-04 09:37:13', '2019-10-04 09:37:13', '1570204200', '1570205400', '1570204200', '1570205400', '0', 0),
(22, '28', 3, 5, 2, '#0ae291', '17th october2019 ttttesssttttt', '16:10', '16:30', '2019-10-24 16:10:00', '2019-10-24 16:30:00', '2019-10-04 09:40:26', '2019-10-21 09:56:54', '1570179600', '1570180800', '1571302800', '1571304000', '0', 0),
(23, '29', 3, 5, 23, '#0ae291', 'sasasasasasasa', '16:20', '16:40', '2019-10-04 16:20:00', '2019-10-04 16:40:00', '2019-10-04 10:24:37', '2019-10-04 10:24:37', '1570206000', '1570207200', '1570206000', '1570207200', '0', 0),
(24, '28', 3, 5, 1, '#0ae291', 'Eye Surgery', '12:40', '13:40', '2019-10-08 12:40:00', '2019-10-08 13:40:00', '2019-10-08 07:06:59', '2019-10-08 07:06:59', '1570538400', '1570542000', '1570538400', '1570542000', '0', 0),
(25, '28', 3, 5, 8, '#0ae291', 'test', '14:00', '16:10', '2019-10-08 14:00:00', '2019-10-08 16:10:00', '2019-10-08 07:07:58', '2019-10-08 07:07:58', '1570543200', '1570551000', '1570543200', '1570551000', '0', 0),
(26, '28', 3, 5, 17, '#ff66cc', 'surgery critical', '16:00', '18:20', '2019-10-18 16:00:00', '2019-10-18 18:20:00', '2019-10-08 09:11:46', '2019-10-18 08:25:55', '1571414400', '1571422800', '1571414400', '1571422800', '0', 0),
(27, '29', 3, 5, 3, '#ff66cc', 'gdfd', '17:30', '17:40', '2019-10-21 17:30:00', '2019-10-21 17:40:00', '2019-10-09 12:01:50', '2019-10-21 08:08:45', '1570642800', '1570643400', '1570642800', '1570643400', '0', 0),
(28, '28', 3, 5, 2, '#ff66cc', 'sfsdf', '15:00', '17:20', '2019-10-23 15:00:00', '2019-10-23 17:20:00', '2019-10-18 08:24:39', '2019-10-21 07:57:45', '1571414400', '1571422800', '1571414400', '1571422800', '0', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_medicine`
--

INSERT INTO `appointment_medicine` (`id`, `appointment_id`, `medicine`, `created_at`, `updated_at`) VALUES
(2, 18, '[{"name":"name 1","dosage":"daily"}]', '2019-09-20 07:46:56', '2019-09-20 07:53:36');

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
(1, 13, 1, 'first comment', '2019-09-16 11:35:45', '2019-09-16 11:35:45'),
(3, 13, 1, 'second comment', '2019-09-16 12:42:50', '2019-09-16 12:42:50'),
(4, 12, 1, 'this is first comment...', '2019-09-17 10:11:20', '2019-09-17 10:11:20');

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
(6, 13, '<strong>admin</strong> moved to section <strong>Ambulatorio</strong>', '2019-09-17 09:51:25', '2019-09-17 09:51:25'),
(7, 12, '<strong>admin</strong> moved to section <strong>Esami</strong>', '2019-09-17 09:51:27', '2019-09-17 09:51:27'),
(8, 12, '<strong>admin</strong> moved to section <strong>Check Out</strong>', '2019-09-17 09:59:54', '2019-09-17 09:59:54'),
(9, 12, '<strong>admin</strong> commento aggiunto.', '2019-09-17 10:11:20', '2019-09-17 10:11:20'),
(10, 13, '<strong>admin</strong> spostato nella sezione <strong>Pazienti del giorno</strong>', '2019-09-17 11:08:12', '2019-09-17 11:08:12'),
(11, 13, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-17 11:32:55', '2019-09-17 11:32:55'),
(12, 13, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-17 11:38:45', '2019-09-17 11:38:45'),
(13, 13, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-17 11:39:39', '2019-09-17 11:39:39'),
(14, 13, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-17 11:40:23', '2019-09-17 11:40:23'),
(15, 13, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-17 11:40:33', '2019-09-17 11:40:33'),
(16, 13, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-17 11:41:10', '2019-09-17 11:41:10'),
(17, 13, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-17 11:41:41', '2019-09-17 11:41:41'),
(18, 13, '<strong>admin</strong> spostato nella sezione <strong>Esami</strong>', '2019-09-17 11:41:43', '2019-09-17 11:41:43'),
(19, 13, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-17 11:41:51', '2019-09-17 11:41:51'),
(20, 13, '<strong>admin</strong> spostato nella sezione <strong>Esami</strong>', '2019-09-17 11:43:59', '2019-09-17 11:43:59'),
(21, 13, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-17 11:44:01', '2019-09-17 11:44:01'),
(22, 13, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-18 05:47:03', '2019-09-18 05:47:03'),
(23, 13, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-18 05:47:23', '2019-09-18 05:47:23'),
(24, 13, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-18 06:14:45', '2019-09-18 06:14:45'),
(25, 13, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-18 06:31:54', '2019-09-18 06:31:54'),
(26, 12, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-18 10:45:12', '2019-09-18 10:45:12'),
(27, 13, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-19 07:54:52', '2019-09-19 07:54:52'),
(28, 12, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-19 13:09:43', '2019-09-19 13:09:43'),
(29, 18, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-20 04:37:50', '2019-09-20 04:37:50'),
(30, 13, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-25 07:38:11', '2019-09-25 07:38:11'),
(31, 12, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-25 07:38:22', '2019-09-25 07:38:22'),
(32, 12, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-09-26 06:07:59', '2019-09-26 06:07:59'),
(33, 20, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-09-27 10:11:15', '2019-09-27 10:11:15'),
(34, 19, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-10-04 09:10:36', '2019-10-04 09:10:36'),
(35, 25, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-10-08 10:46:55', '2019-10-08 10:46:55'),
(36, 27, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-10-09 12:01:54', '2019-10-09 12:01:54'),
(37, 27, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-10-10 05:07:24', '2019-10-10 05:07:24'),
(38, 26, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-10-10 05:26:06', '2019-10-10 05:26:06'),
(39, 27, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-10-10 05:33:34', '2019-10-10 05:33:34'),
(40, 26, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-10-16 10:36:54', '2019-10-16 10:36:54'),
(41, 22, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-10-17 04:53:51', '2019-10-17 04:53:51'),
(42, 22, '<strong>admin</strong> spostato nella sezione <strong>Pazienti del giorno</strong>', '2019-10-17 04:53:53', '2019-10-17 04:53:53'),
(43, 26, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-10-17 05:06:07', '2019-10-17 05:06:07'),
(44, 26, '<strong>admin</strong> spostato nella sezione <strong>Pazienti del giorno</strong>', '2019-10-17 05:06:17', '2019-10-17 05:06:17'),
(45, 22, '<strong>admin</strong> spostato nella sezione <strong>Check In</strong>', '2019-10-17 05:08:55', '2019-10-17 05:08:55'),
(46, 22, '<strong>admin</strong> spostato nella sezione <strong>Ambulatorio</strong>', '2019-10-17 05:09:13', '2019-10-17 05:09:13');

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
(82, 29, '13:00', '20:00', 3, '2', '2019-07-31', '2019-07-31'),
(83, 29, '13:00', '20:00', 3, '3', '2019-07-31', '2019-07-31'),
(84, 29, '13:00', '20:00', 3, '4', '2019-07-31', '2019-07-31'),
(85, 29, '13:00', '20:00', 3, '5', '2019-07-31', '2019-07-31'),
(86, 29, '13:00', '20:00', 3, '6', '2019-07-31', '2019-07-31'),
(87, 29, '13:00', '20:00', 3, '7', '2019-07-31', '2019-07-31'),
(97, 32, '10:00', '19:00', 2, '2', '2019-10-16', '2019-10-16'),
(98, 32, '10:00', '19:00', 2, '3', '2019-10-16', '2019-10-16'),
(103, 28, '9:30', '18:30', 3, '3', '2019-10-22', '2019-10-22'),
(104, 28, '9:30', '18:30', 3, '4', '2019-10-22', '2019-10-22'),
(105, 28, '9:30', '18:30', 3, '5', '2019-10-22', '2019-10-22'),
(106, 28, '9:30', '18:30', 3, '6', '2019-10-22', '2019-10-22'),
(107, 30, '9:00', '18:00', 3, '2', '2019-10-23', '2019-10-23'),
(108, 30, '9:00', '18:00', 3, '3', '2019-10-23', '2019-10-23'),
(109, 30, '9:00', '18:00', 3, '4', '2019-10-23', '2019-10-23'),
(110, 30, '9:00', '18:00', 3, '5', '2019-10-23', '2019-10-23'),
(111, 30, '9:00', '18:00', 3, '6', '2019-10-23', '2019-10-23');

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
(2, 'Orthopetics', '2019-07-22', '2019-07-22'),
(3, 'Sportsinjuries', '2019-07-22', '2019-07-22'),
(4, 'Plastic Surgery', '2019-07-22', '2019-07-22'),
(5, 'cardiologist', '2019-07-22', '2019-07-22'),
(6, 'Nephrologist', '2019-07-22', '2019-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `eye_visit_data`
--

CREATE TABLE `eye_visit_data` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `eye_visit` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eye_visit_data`
--

INSERT INTO `eye_visit_data` (`id`, `appointment_id`, `eye_visit`, `created_at`, `updated_at`) VALUES
(1, 12, '{"1":{"name_test_1":null,"tele":"4636","description":"dfgd ashwini","eye_type":"cc","radio_option":"2","check_box":["77","66","55"],"date_of_birth":"2019-10-22"},"2":{"eye_type":"Left"},"cus_eye_type":["2"],"3":{"VISUS NAT":{"right":{"LONTANO":{"visus":"lontana x1","sf":null,"cil":null,"x":null},"VICINO":{"visus":"x\\/10","sf":null,"cil":"5","x":null}},"left":{"LONTANO":{"visus":"lontana x2","sf":null,"cil":null,"x":null},"VICINO":{"visus":null,"sf":null,"cil":null,"x":null}},"oo":{"LONTANO":{"visus":"lontano x3","sf":null,"cil":null,"x":null},"VICINO":{"visus":null,"sf":null,"cil":null,"x":null}}},"IN USO":{"right":{"LONTANO":{"visus":null,"sf":null,"cil":null,"x":null},"VICINO":{"visus":null,"sf":null,"cil":null,"x":null},"LAC":{"visus":null,"sf":null,"cil":null,"x":null}},"left":{"LONTANO":{"visus":null,"sf":null,"cil":null,"x":null},"VICINO":{"visus":null,"sf":null,"cil":null,"x":null},"LAC":{"visus":null,"sf":null,"cil":null,"x":null}},"oo":{"LONTANO":{"visus":null,"sf":null,"cil":null,"x":null},"VICINO":{"visus":null,"sf":null,"cil":null,"x":null},"LAC":{"visus":null,"sf":null,"cil":null,"x":null}}},"AUTO REF":{"right":{"MIOSI":{"visus":null,"sf":null,"cil":null,"x":null},"CICLO":{"visus":null,"sf":null,"cil":null,"x":null}},"left":{"MIOSI":{"visus":null,"sf":null,"cil":null,"x":null},"CICLO":{"visus":null,"sf":null,"cil":null,"x":null}},"oo":{"MIOSI":{"visus":null,"sf":null,"cil":null,"x":null},"CICLO":{"visus":null,"sf":null,"cil":null,"x":null}}},"SOGG":{"right":{"LONTANO":{"visus":null,"sf":null,"cil":null,"x":null},"VICINO":{"visus":null,"sf":null,"cil":null,"x":null},"CICLO":{"visus":null,"sf":null,"cil":null,"x":null},"FORO ST":{"visus":null,"sf":null,"cil":null,"x":null}},"left":{"LONTANO":{"visus":null,"sf":null,"cil":null,"x":null},"VICINO":{"visus":null,"sf":null,"cil":null,"x":null},"CICLO":{"visus":null,"sf":null,"cil":null,"x":null},"FORO ST":{"visus":null,"sf":null,"cil":null,"x":null}},"oo":{"LONTANO":{"visus":null,"sf":null,"cil":null,"x":null},"VICINO":{"visus":null,"sf":null,"cil":null,"x":null},"CICLO":{"visus":null,"sf":null,"cil":null,"x":null},"FORO ST":{"visus":null,"sf":null,"cil":null,"x":null}}},"PRESCRIZIONE":{"right":{"LONTANO":{"visus":null,"sf":null,"cil":null,"x":null},"INTERMEDIO":{"visus":null,"sf":null,"cil":null,"x":null},"VICINO":{"visus":null,"sf":null,"cil":null,"x":null}},"left":{"LONTANO":{"visus":null,"sf":null,"cil":null,"x":null},"INTERMEDIO":{"visus":null,"sf":null,"cil":null,"x":null},"VICINO":{"visus":null,"sf":null,"cil":null,"x":null}},"oo":{"LONTANO":{"visus":null,"sf":null,"cil":null,"x":null},"INTERMEDIO":{"visus":null,"sf":null,"cil":null,"x":null},"VICINO":{"visus":null,"sf":null,"cil":null,"x":null}}},"dist_interp":"interp","note":"note test"},"4":{"hghgh":null}}', '2019-10-14 09:55:57', '2019-10-24 10:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `eye_visit_tabs`
--

CREATE TABLE `eye_visit_tabs` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eye_visit_tabs`
--

INSERT INTO `eye_visit_tabs` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Anamnesi', 1, '2019-10-11 05:49:47', '2019-10-11 05:49:47'),
(2, 'Sintomi', 1, '2019-10-11 06:13:01', '2019-10-11 06:18:21'),
(3, 'Refrazione', 1, '2019-10-14 10:55:08', '2019-10-14 10:55:08'),
(4, 'tes ash', 1, '2019-10-22 13:01:19', '2019-10-22 13:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `input_tabs`
--

CREATE TABLE `input_tabs` (
  `id` int(11) NOT NULL,
  `tab_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `input_name` varchar(200) NOT NULL,
  `input_values` longtext,
  `refrazione_section` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `input_tabs`
--

INSERT INTO `input_tabs` (`id`, `tab_id`, `title`, `type`, `input_name`, `input_values`, `refrazione_section`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 'Name Test 1', 'text', 'name_test_1', '[null]', NULL, 1, '2019-10-11 09:27:48', '2019-10-24 07:35:25'),
(4, 1, 'Tele', 'number', 'tele', '[null]', NULL, 1, '2019-10-11 09:28:46', '2019-10-11 09:28:46'),
(5, 1, 'Description', 'textarea', 'description', '[null]', NULL, 1, '2019-10-11 09:29:03', '2019-10-11 09:29:03'),
(6, 1, 'Eye Type', 'select', 'eye_type', '["aa","bb","cc","dd","ee"]', NULL, 1, '2019-10-11 09:29:34', '2019-10-11 11:02:09'),
(7, 1, 'Radio option', 'radio', 'radio_option', '["1","2","3"]', NULL, 1, '2019-10-11 09:31:22', '2019-10-11 09:31:22'),
(8, 1, 'check box', 'checkbox', 'check_box', '["9","77","66","55"]', NULL, 1, '2019-10-11 09:31:48', '2019-10-11 09:31:48'),
(9, 1, 'Date of birth', 'date', 'date_of_birth', '[null]', NULL, 1, '2019-10-11 09:32:08', '2019-10-11 11:02:26'),
(10, 2, 'Eye Type', 'select', 'eye_type', '["Left","Right","Both"]', NULL, 1, '2019-10-11 11:04:43', '2019-10-11 11:04:43'),
(11, 1, 'Print Button', 'print', 'print_button', '[null]', NULL, 1, '2019-10-15 05:10:19', '2019-10-15 05:10:19'),
(12, 3, 'Visus', 'select', 'visus', '["lontana x1","lontana x2","lontano x3"]', 'LONTANO', 1, '2019-10-15 09:28:31', '2019-10-24 08:17:47'),
(13, 3, 'Sf', 'select', 'sf', '["11","22"]', 'LONTANO', 1, '2019-10-15 09:28:45', '2019-10-15 09:28:45'),
(14, 3, 'Cil', 'select', 'cil', '["2","5"]', 'LONTANO', 1, '2019-10-15 09:28:59', '2019-10-15 09:28:59'),
(15, 3, 'x', 'number', 'x', '["ss","gg",null,null,null,null,null,null]', 'LONTANO', 1, '2019-10-15 09:29:12', '2019-10-16 10:58:11'),
(16, 4, 'hghgh', 'number', 'hghgh', '[null]', NULL, 1, '2019-10-22 13:01:44', '2019-10-22 13:01:44'),
(17, 3, 'Visus', 'select', 'visus', '["x\\/10","x\\/20"]', 'VICINO', 1, '2019-10-15 09:28:31', '2019-10-16 10:54:47'),
(18, 3, 'Sf', 'select', 'sf', '["11","22"]', 'VICINO', 1, '2019-10-15 09:28:45', '2019-10-15 09:28:45'),
(19, 3, 'Cil', 'select', 'cil', '["2","5"]', 'VICINO', 1, '2019-10-15 09:28:59', '2019-10-15 09:28:59'),
(20, 3, 'x', 'number', 'x', '["ss","gg"]', 'VICINO', 1, '2019-10-15 09:29:12', '2019-10-16 10:58:11'),
(21, 3, 'Visus', 'select', 'visus', '["x\\/10","x\\/20"]', 'LAC', 1, '2019-10-15 09:28:31', '2019-10-16 10:54:47'),
(22, 3, 'Sf', 'select', 'sf', '["11","22"]', 'LAC', 1, '2019-10-15 09:28:45', '2019-10-15 09:28:45'),
(23, 3, 'Cil', 'select', 'cil', '["2","5"]', 'LAC', 1, '2019-10-15 09:28:59', '2019-10-15 09:28:59'),
(24, 3, 'x', 'number', 'x', '["ss","gg"]', 'LAC', 1, '2019-10-15 09:29:12', '2019-10-16 10:58:11'),
(25, 3, 'Visus', 'select', 'visus', '["x\\/10","x\\/20"]', 'MIOSI', 1, '2019-10-15 09:28:31', '2019-10-16 10:54:47'),
(26, 3, 'Sf', 'select', 'sf', '["11","22"]', 'MIOSI', 1, '2019-10-15 09:28:45', '2019-10-15 09:28:45'),
(27, 3, 'Cil', 'select', 'cil', '["2","5"]', 'MIOSI', 1, '2019-10-15 09:28:59', '2019-10-15 09:28:59'),
(28, 3, 'x', 'number', 'x', '["ss","gg"]', 'MIOSI', 1, '2019-10-15 09:29:12', '2019-10-16 10:58:11'),
(29, 3, 'Visus', 'select', 'visus', '["x\\/10","x\\/20"]', 'CICLO', 1, '2019-10-15 09:28:31', '2019-10-16 10:54:47'),
(30, 3, 'Sf', 'select', 'sf', '["11","22"]', 'CICLO', 1, '2019-10-15 09:28:45', '2019-10-15 09:28:45'),
(31, 3, 'Cil', 'select', 'cil', '["2","5"]', 'CICLO', 1, '2019-10-15 09:28:59', '2019-10-15 09:28:59'),
(32, 3, 'x', 'number', 'x', '["ss","gg"]', 'CICLO', 1, '2019-10-15 09:29:12', '2019-10-16 10:58:11'),
(33, 3, 'Visus', 'select', 'visus', '["x\\/10","x\\/20"]', 'FORO ST', 1, '2019-10-15 09:28:31', '2019-10-16 10:54:47'),
(34, 3, 'Sf', 'select', 'sf', '["11","22"]', 'FORO ST', 1, '2019-10-15 09:28:45', '2019-10-15 09:28:45'),
(35, 3, 'Cil', 'select', 'cil', '["2","5"]', 'FORO ST', 1, '2019-10-15 09:28:59', '2019-10-15 09:28:59'),
(36, 3, 'x', 'number', 'x', '["ss","gg"]', 'FORO ST', 1, '2019-10-15 09:29:12', '2019-10-16 10:58:11'),
(37, 3, 'Visus', 'select', 'visus', '["x\\/10","x\\/20"]', 'INTERMEDIO', 1, '2019-10-15 09:28:31', '2019-10-16 10:54:47'),
(38, 3, 'Sf', 'select', 'sf', '["11","22"]', 'INTERMEDIO', 1, '2019-10-15 09:28:45', '2019-10-15 09:28:45'),
(39, 3, 'Cil', 'select', 'cil', '["2","5"]', 'INTERMEDIO', 1, '2019-10-15 09:28:59', '2019-10-15 09:28:59'),
(40, 3, 'x', 'number', 'x', '["ss","gg"]', 'INTERMEDIO', 1, '2019-10-15 09:29:12', '2019-10-16 10:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `managepatient`
--

CREATE TABLE `managepatient` (
  `id` int(11) NOT NULL,
  `first` varchar(200) DEFAULT NULL,
  `second` varchar(200) DEFAULT NULL,
  `third` varchar(200) DEFAULT NULL,
  `fourth` varchar(200) DEFAULT NULL,
  `fifth` varchar(200) DEFAULT NULL,
  `manage_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managepatient`
--

INSERT INTO `managepatient` (`id`, `first`, `second`, `third`, `fourth`, `fifth`, `manage_date`, `created_at`, `updated_at`) VALUES
(10, NULL, '[{"id":"19","updated_by":"1","update_date":"2019-9-18 12:1:54","color":"#ac82a9"}]', '[{"id":"1","updated_by":"1","update_date":"2019-9-18 16:15:12","color":"#63e448"}]', NULL, NULL, '2019-09-18', '2019-09-18 06:14:45', '2019-09-18 10:45:42'),
(11, NULL, '[{"id":"1","updated_by":"1","update_date":"2019-9-19 18:39:43","color":null}]', '[{"id":"19","updated_by":"1","update_date":"2019-9-19 13:24:52","color":null}]', NULL, NULL, '2019-09-19', '2019-09-19 07:54:52', '2019-09-19 13:09:43'),
(12, NULL, '[{"id":"19","updated_by":"1","update_date":"2019-9-20 10:7:49","color":null}]', NULL, NULL, NULL, '2019-09-20', '2019-09-20 04:37:49', '2019-09-20 04:37:49'),
(13, NULL, '[{"id":"1","updated_by":"1","update_date":"2019-9-25 13:8:22","color":null}]', '[{"id":"19","updated_by":"1","update_date":"2019-9-25 13:8:11","color":null}]', NULL, NULL, '2019-09-25', '2019-09-25 07:38:11', '2019-09-25 07:38:22'),
(14, '[{"id":"19","updated_by":"1","update_date":"2019-09-26 06:07:56","color":null}]', NULL, '[{"id":"1","updated_by":"1","update_date":"2019-9-26 11:37:59","color":null}]', NULL, NULL, '2019-09-26', '2019-09-26 06:07:59', '2019-09-26 06:07:59'),
(15, NULL, '[{"id":"2","updated_by":"1","update_date":"2019-9-27 15:41:15","color":null}]', NULL, NULL, NULL, '2019-09-27', '2019-09-27 10:11:15', '2019-09-27 10:11:15'),
(16, NULL, '[{"id":"2","updated_by":"1","update_date":"2019-10-4 14:40:36","color":null}]', NULL, NULL, NULL, '2019-10-04', '2019-10-04 09:10:36', '2019-10-04 09:10:36'),
(17, '[{"id":"1","updated_by":"1","update_date":"2019-10-08 10:46:42","color":null},{"id":"17","updated_by":"1","update_date":"2019-10-08 10:46:42","color":null}]', '[{"id":"8","updated_by":"1","update_date":"2019-10-8 16:16:55","color":null}]', NULL, NULL, NULL, '2019-10-08', '2019-10-08 10:46:55', '2019-10-08 10:46:55'),
(18, NULL, NULL, '[{"id":"3","updated_by":"1","update_date":"2019-10-9 17:31:54","color":"#b8cce4"}]', NULL, NULL, '2019-10-09', '2019-10-09 12:01:54', '2019-10-09 12:18:27'),
(20, NULL, '[{"id":"3","updated_by":"1","update_date":"2019-10-10 11:3:34","color":null}]', '[{"id":"17","updated_by":"1","update_date":"2019-10-10 10:56:6","color":"#92cddc"}]', NULL, NULL, '2019-10-10', '2019-10-10 05:26:06', '2019-10-10 05:33:34'),
(21, '[{"id":"3","updated_by":"1","update_date":"2019-10-16 10:36:45","color":null}]', '[{"id":"17","updated_by":"1","update_date":"2019-10-16 16:6:53","color":null}]', NULL, NULL, NULL, '2019-10-16', '2019-10-16 10:36:53', '2019-10-16 10:36:53'),
(24, '[{"id":"17","updated_by":"1","update_date":"2019-10-17 05:08:49","color":null},{"id":"3","updated_by":"1","update_date":"2019-10-17 05:08:49","color":null}]', NULL, '[{"id":"2","updated_by":"1","update_date":"2019-10-17 10:39:13","color":"#bfbfbf"}]', NULL, NULL, '2019-10-17', '2019-10-17 05:08:55', '2019-10-17 05:09:17');

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
  `sex` tinyint(2) NOT NULL DEFAULT '0',
  `added_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `document` varchar(200) DEFAULT NULL,
  `profession` varchar(200) DEFAULT NULL,
  `address` text,
  `postal_code` int(11) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  `nationality` varchar(200) DEFAULT NULL,
  `pec` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `email`, `surname`, `name`, `phone`, `dob`, `minor_patient`, `description`, `relative_info`, `privacy`, `sex`, `added_by`, `updated_at`, `document`, `profession`, `address`, `postal_code`, `telephone`, `nationality`, `pec`, `created_at`, `updated_by`) VALUES
(1, 'ashwini@mailinator.com', 'singh', 'ashwini', '9898989888', '1991-01-10', 1, NULL, '[{"fullname":"puja","relation":"sister","contactno":"9898989"},{"fullname":"Anupam","relation":"brother","contactno":"767677676"}]', '{"convention":"testing","card_number":"787878787"}', 1, 1, '2019-10-16 00:51:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-22 08:02:08', 1),
(2, 'patientdemo@mailinator.com', 'testinf', 'patientdemo', '9898989887', '1985-02-12', 1, NULL, '[{"fullname":"adarsh","relation":"brother","contactno":"3224242424"}]', NULL, 0, 1, '2019-09-09 07:08:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-22 08:18:20', 1),
(3, 'dummypat@mailinator.com', 'testing', 'dummy patient', '9876543222', '1940-10-17', 0, NULL, NULL, NULL, 0, 1, '2019-10-09 07:24:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-26 01:40:48', 1),
(4, 'patdummy@mailinator.com', NULL, 'pat dummy', '9876543211', NULL, 0, NULL, NULL, NULL, 0, 1, '2019-08-26 04:07:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-26 04:07:14', 1),
(6, 'ashwinitesting@mailinator.com', NULL, 'testing patient', NULL, NULL, 0, NULL, NULL, NULL, 0, 1, '2019-08-26 06:13:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-26 06:13:14', 1),
(7, NULL, NULL, 'metro patient', NULL, NULL, 0, NULL, NULL, NULL, 0, 1, '2019-08-28 04:48:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-28 04:48:29', 1),
(8, 'testpat654@mailinator.com', 'patsurname', 'testpatient 654', '9846465465', '2019-08-06', 0, NULL, NULL, NULL, 0, 1, '2019-08-28 05:12:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-28 05:12:12', 1),
(12, 'test@silverdoorapartments.com', NULL, 'ssssa', NULL, NULL, 0, NULL, NULL, NULL, 0, 1, '2019-08-28 05:21:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-28 05:21:00', 1),
(13, 'asassa@jhjhj.com', 'surname', 'hellosasasasa', '0000000000', '2019-06-17', 0, NULL, NULL, NULL, 0, 1, '2019-08-28 05:41:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-28 05:31:44', 1),
(14, 'testemail309@mailinator.com', 'testsurname309', 'testname309', '6756764564', '2009-02-11', 0, 'test 309 desc', NULL, NULL, 0, 1, '2019-09-03 05:02:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-03 05:02:22', 1),
(15, NULL, 'ssssssssssss', NULL, NULL, '2019-09-02', 0, NULL, NULL, NULL, 0, 1, '2019-09-03 05:08:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-03 05:08:27', 1),
(16, NULL, 'surname3333000999up', NULL, NULL, '2019-08-12', 0, 'tetst description', NULL, NULL, 0, 1, '2019-09-03 05:27:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-03 05:23:29', 1),
(17, NULL, 'dfgggg', 'asasa', NULL, '2006-08-15', 0, 'sfsdfs', NULL, NULL, 0, 1, '2019-09-03 05:31:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-03 05:29:35', 1),
(18, NULL, 'singh11', NULL, NULL, '1991-02-05', 0, NULL, NULL, NULL, 0, 1, '2019-09-04 04:54:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-04 04:54:27', 1),
(19, 'newpatient@mailinator.com', 'newpat', 'new patient', NULL, '1988-02-18', 0, NULL, NULL, NULL, 0, 1, '2019-09-11 04:38:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-11 04:38:56', 1),
(20, NULL, 'surname', NULL, NULL, '1985-09-18', 0, NULL, NULL, NULL, 0, 1, '2019-09-25 01:58:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-25 01:58:12', 1),
(21, NULL, 'tettete', NULL, NULL, '1988-09-08', 0, NULL, NULL, NULL, 0, 1, '2019-09-25 02:02:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-25 02:02:58', 1),
(22, NULL, 'surname3333000999up', NULL, NULL, '2001-08-09', 0, NULL, NULL, NULL, 0, 1, '2019-09-25 03:55:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-25 03:55:35', 1),
(23, 'singhabhi1787@mailinator.com', 'Kumar', 'Abhshek', '9898989899', '1973-02-08', 0, 'desc pat', NULL, NULL, 0, 1, '2019-10-04 04:53:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-04 04:53:51', 1),
(24, 'name1610@mailinator.com', 'surname1610', 'name1610', '9898898988', '1979-02-08', 0, 'Test Desc', NULL, NULL, 1, 1, '2019-10-16 02:25:43', 'AATTT66666', 'SSE', 'ABC', 123456, '65464564', 'Indian', 'pec345', '2019-10-16 02:20:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `privacy`
--

CREATE TABLE `privacy` (
  `id` int(11) NOT NULL,
  `description` longtext,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privacy`
--

INSERT INTO `privacy` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Privacy points Here updated update 10-09-2019', '2019-09-05 00:00:00', '2019-09-10 08:12:04');

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

--
-- Dumping data for table `recurrence_appointment`
--

INSERT INTO `recurrence_appointment` (`id`, `recurrence_type`, `patient_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'daily', 0, '2019-08-28', '2019-08-30', '2019-08-26 04:14:11', '2019-08-26 04:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `reminder_time` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`id`, `description`, `reminder_time`, `user_id`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'Doctor arrival 1 up', '2019-10-22 09:26:00', 1, 1, '2019-10-22 06:14:07', '2019-10-22 09:55:19'),
(3, 'time for followup', '2019-10-22 14:00:00', 1, 1, '2019-10-22 06:41:19', '2019-10-22 14:07:49'),
(4, 'Time for surgery', '2019-10-22 15:00:00', 1, 1, '2019-10-22 06:49:11', '2019-10-22 15:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(10) NOT NULL,
  `room_name` varchar(200) DEFAULT NULL,
  `room_color` varchar(20) DEFAULT NULL,
  `examination_type` int(10) DEFAULT NULL,
  `duration` int(11) NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_name`, `room_color`, `examination_type`, `duration`, `created_at`, `updated_at`) VALUES
(5, 'test1', '#ff66cc', 3, 0, '2019-07-23', '2019-10-09'),
(6, 'tereee', '#d99694', 4, 1200, '2019-10-10', '2019-10-10');

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
(4, 2, 30, '1323232A', '35345', 'Test surgery', 3900, 'VOD 3/10\r\nVOD 2/10\r\nDistrofia\r\nTest ttttttt', '2019-10-03', 2, 1, 2, 2, 'operatero 1:xyz\r\noperator 3 :uiuii\r\noperatero :76767', 'description', 'clinical diary\r\none____kjkjkjk\r\ntest ______jjkjkjk', '2019-10-01 07:43:44', '2019-09-30 11:43:00');

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
  `address` text COLLATE utf8mb4_unicode_ci,
  `postal_code` int(11) DEFAULT NULL,
  `telephone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `performance_type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_delete` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0' COMMENT '[0]=>''N'',[1]=>''Y''',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1=Active,2=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `surname`, `name`, `email`, `password`, `remember_token`, `role_type`, `phone`, `regione`, `cap`, `dob`, `address`, `postal_code`, `telephone`, `performance_type`, `is_delete`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin@gmail.com', '$2y$10$xip7EkoVdkmjlpuYyfH/F.a4NHZRGawsCS.BdTKKJ9vEQz03DY7Be', 'YswcJwNnlAiqLSUdUxjTG4uiAAV5sz4YTk7aicyJvRZhfc15pkuCKY1VkZIG', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 1, NULL, NULL),
(4, NULL, 'recardo', 'mukeshbisht98@gmail.com', '$2y$10$xip7EkoVdkmjlpuYyfH/F.a4NHZRGawsCS.BdTKKJ9vEQz03DY7Be', 'smwowtyXBiqSEdfg5tciro9vF6h5l8b8bGk2Jtk1K8ot1zgEVi95A70u1NGH', 2, '9864654654', 'laxmi nagar new dlehi', 110064, '25-07-2019', NULL, NULL, NULL, NULL, '0', 1, '2019-07-18 08:57:25', '2019-07-31 01:25:15'),
(28, 'bisht', 'mukesh', 'mukesbisht@gmail.com', '$2y$10$xip7EkoVdkmjlpuYyfH/F.a4NHZRGawsCS.BdTKKJ9vEQz03DY7Be', 'oWW8sEBnNohmvTaXJnYbwXSBTWgb1kgzBoA3CUr6eEMsbuynpHE8MKzcZS9b', 3, '9846465465', 'delgi', 110055, '24-08-2019', NULL, NULL, NULL, NULL, '0', 2, '2019-07-24 05:59:32', '2019-10-22 08:13:45'),
(29, 'pan', 'pradeep', 'pradeep@gmail.com', '$2y$10$EsDOmznDMoVS21qOwTv6q.df2J9D/hp32KwGCTpHjCYEXF6DIx3.G', NULL, 3, '9746565464', 'laxmi nagar new delhi', 10065, '13-02-2019', NULL, NULL, NULL, NULL, '0', 1, '2019-07-29 02:01:52', '2019-07-29 02:01:52'),
(30, 'singh', 'Ashwini', 'ashwinikumar@mailinator.com', '$2y$10$xip7EkoVdkmjlpuYyfH/F.a4NHZRGawsCS.BdTKKJ9vEQz03DY7Be', 'elJm02iNL2vxfjbIXXP3WqjYZ1FvUBnizMOG1hHUbJ46pATkaK4w36WoD3Qo', 3, '9876543211', 'Noida', 201301, '05-08-1991', NULL, NULL, NULL, NULL, '0', 1, '2019-08-06 03:48:18', '2019-10-23 02:03:15'),
(31, NULL, 'AshwiniSec', 'ashwinisecretary@mailinator.co', '$2y$10$xip7EkoVdkmjlpuYyfH/F.a4NHZRGawsCS.BdTKKJ9vEQz03DY7Be', NULL, 2, '9876543222', 'Noida', 201301, '12-01-1990', NULL, NULL, NULL, NULL, '0', 1, '2019-08-19 00:56:43', '2019-08-19 00:56:43'),
(32, 'docsurname', 'Nishu', 'nishu1167@mailinator.com', '$2y$10$GrMx27Usm2keyYNt2aNB7uZa3lVM.VIsrOC7C0ZB3VZpx5WXZzZu6', NULL, 3, '9898989898', 'Indian', 899898, '19-08-2002', 'asfaf', 432424, '444444', 'dfgdfg', '0', 1, '2019-10-16 04:06:02', '2019-10-16 04:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--

CREATE TABLE `weekdays` (
  `weekday_num` int(11) NOT NULL,
  `day_of_week` char(3) NOT NULL,
  `day_of_week_it` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weekdays`
--

INSERT INTO `weekdays` (`weekday_num`, `day_of_week`, `day_of_week_it`) VALUES
(2, 'Mon', 'Lunedi'),
(3, 'Tue', 'Martedì'),
(4, 'Wed', 'Mercoledì'),
(5, 'Thu', 'Giovedì'),
(6, 'Fri', 'Venerdì'),
(7, 'Sat', 'Sabato'),
(8, 'Sun', 'Domenica');

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
-- Indexes for table `eye_visit_data`
--
ALTER TABLE `eye_visit_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eye_visit_tabs`
--
ALTER TABLE `eye_visit_tabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `input_tabs`
--
ALTER TABLE `input_tabs`
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
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
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
  ADD UNIQUE KEY `day_of_week` (`day_of_week`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointement_booking`
--
ALTER TABLE `appointement_booking`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `appointment_medicine`
--
ALTER TABLE `appointment_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `daily_patient_history`
--
ALTER TABLE `daily_patient_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `examination`
--
ALTER TABLE `examination`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `eye_visit_data`
--
ALTER TABLE `eye_visit_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `eye_visit_tabs`
--
ALTER TABLE `eye_visit_tabs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `input_tabs`
--
ALTER TABLE `input_tabs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `managepatient`
--
ALTER TABLE `managepatient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `privacy`
--
ALTER TABLE `privacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `recurrence_appointment`
--
ALTER TABLE `recurrence_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `surgeries`
--
ALTER TABLE `surgeries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
