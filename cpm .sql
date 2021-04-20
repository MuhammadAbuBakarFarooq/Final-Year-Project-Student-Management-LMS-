-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2021 at 07:37 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_quries`
--

CREATE TABLE `all_quries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `askquery` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q_from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q_not` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply_of` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_quries`
--

INSERT INTO `all_quries` (`id`, `askquery`, `student_id`, `group_id`, `supervisor_id`, `q_from`, `q_not`, `reply_of`, `created_at`, `updated_at`) VALUES
(287, 'Dear Sir can we have meeting on tomorrow on campus if you are available?', '181400011', '2', '101', '0', '1', '0', '2021-04-05 10:17:31', '2021-04-05 10:20:20'),
(288, 'Yes we can, I am available on tomorrow 11 to 12. You may visit in my office.', '0', '2', '101', '1', '0', '287', '2021-04-05 10:20:20', '2021-04-05 10:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `capston_calendars`
--

CREATE TABLE `capston_calendars` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL,
  `week` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capston_calendars`
--

INSERT INTO `capston_calendars` (`id`, `title`, `start_date`, `end_date`, `created_at`, `updated_at`, `week`) VALUES
(18, 'Proposal Submission', '0', '0', '2021-04-04 23:46:05', '2021-04-04 23:46:05', '2021-W01'),
(19, 'Proposal Defense Presentation', '0', '0', '2021-04-04 23:46:25', '2021-04-04 23:46:25', '2021-W02'),
(20, 'SRS Document Submission', '0', '0', '2021-04-04 23:46:41', '2021-04-04 23:46:41', '2021-W03'),
(21, 'USE case + Class Diagram', '0', '0', '2021-04-04 23:47:08', '2021-04-04 23:47:08', '2021-W06'),
(22, '50 % Implementation Submission', '0', '0', '2021-04-04 23:47:36', '2021-04-04 23:47:36', '2021-W10'),
(23, 'Test Cases Submission', '0', '0', '2021-04-04 23:47:51', '2021-04-04 23:47:51', '2021-W15'),
(24, '100% Implementation Submission', '0', '0', '2021-04-04 23:48:15', '2021-04-04 23:48:15', '2021-W22'),
(25, 'Test System Submission', '0', '0', '2021-04-04 23:48:47', '2021-04-04 23:48:47', '2021-W25'),
(26, 'Final Presenation', '0', '0', '2021-04-04 23:49:03', '2021-04-04 23:49:03', '2021-W27');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lecture_Slot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availiblity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty_id`, `day`, `lecture_Slot`, `availiblity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Monday', 'L1', 0, NULL, NULL),
(2, 2, 'Tuesday', 'L2', 0, NULL, NULL),
(3, 3, 'Tuesday', 'L4', 0, NULL, NULL),
(4, 3, 'Friday', 'L4', 0, NULL, NULL),
(5, 3, 'Wednesday', 'L4', 0, NULL, NULL),
(6, 3, 'Thursday', 'L4', 0, NULL, NULL),
(7, 3, 'Monday', 'L1', 0, NULL, NULL),
(8, 1, 'Monday', 'L1', 0, NULL, NULL),
(9, 2, 'Monday', 'L1', 0, NULL, NULL),
(10, 4, 'Monday', 'L2', 0, NULL, NULL),
(11, 4, 'Wednesday', 'L4', 0, NULL, NULL),
(12, 1, 'Tuesday', 'L4', 0, NULL, NULL),
(13, 1, 'Tuesday', 'L1', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_members`
--

CREATE TABLE `faculty_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_member_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_member_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_member_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `st` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_supervisor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty_members`
--

INSERT INTO `faculty_members` (`id`, `faculty_member_name`, `faculty_member_email`, `faculty_member_id`, `pass`, `st`, `is_supervisor`, `created_at`, `updated_at`) VALUES
(17, 'Ahmed Bashir', 'ahmedbashir@gift.edu.pk', '101', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '2021-03-21 19:51:48', '2021-03-21 20:21:30'),
(18, 'Dr Fakhar Ul Islam Lodhi', 'drfakhar@gift.edu.pk', '102', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '2021-03-21 19:53:55', '2021-03-21 20:24:27'),
(19, 'Dr M Faheem', 'drfaheem@gift.edu.pk', '103', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '2021-03-21 19:54:27', '2021-03-21 20:26:26'),
(20, 'Dr M Ziad Nayyar', 'drziadnayyar@gift.edu.pk', '104', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '2021-03-21 19:55:12', '2021-03-21 20:32:44'),
(21, 'Dr Qaisar Shehryar Durani', 'drqaisar@gift.edu.pk', '105', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '2021-03-21 19:55:50', '2021-03-21 20:30:57'),
(22, 'Fiza Abdul Razzaq', 'fizaabdulrazzaq@gift.edu.pk', '106', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '2021-03-21 19:56:34', '2021-03-21 20:23:17'),
(23, 'Kamal Ashraf Gill', 'kamalashraf@gift.edu.pk', '107', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '2021-03-21 19:57:06', '2021-03-21 20:40:10'),
(24, 'M Aamir Saleem', 'aamirsaleem@gift.edu.pk', '108', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '2021-03-21 19:57:59', '2021-03-21 20:35:07'),
(25, 'M Anzar Saleem', 'anzarsaleem@gift.edu.pk', '109', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '2021-03-21 19:58:33', '2021-03-21 20:38:25'),
(26, 'M Shakeel', 'mshakeel@gift.edu.pk', '110', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '2021-03-21 19:59:08', '2021-03-21 20:42:52'),
(27, 'Nauman Bin Nasir', 'nauman@gift.edu.pk', '111', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '0', '2021-03-21 20:03:56', '2021-03-21 20:06:37'),
(28, 'Arslan Tariq', 'arslantariq@gift.edu.pk', '112', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '0', '2021-03-21 20:04:43', '2021-03-21 20:06:43'),
(29, 'Faisal Rashid', 'faisalrashid@gift.edu.pk', '113', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '0', '2021-03-21 20:06:05', '2021-03-21 20:06:48'),
(30, 'Farhad Ali Naseem', 'farhad.naseem@gift.edu.pk', '161300', '60d20036a2cd8df54d834e4edc369a23', '0', '0', '2021-03-29 06:39:48', '2021-03-29 06:41:00'),
(31, 'Sir Arsalan Tariq', 'arslantariq.at@gift.edu.pk', '465413', 'd650e78c55eb7e8ff5af8d83b39ed8a3', '0', '1', '2021-04-04 18:19:52', '2021-04-04 18:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `fb_notifs`
--

CREATE TABLE `fb_notifs` (
  `id` int(200) NOT NULL,
  `f_id` int(200) NOT NULL,
  `st_id` int(200) NOT NULL,
  `st` int(200) NOT NULL,
  `pres_name` varchar(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fb_notifs`
--

INSERT INTO `fb_notifs` (`id`, `f_id`, `st_id`, `st`, `pres_name`, `updated_at`, `created_at`) VALUES
(39, 101, 181400045, 0, 'Final Presentation', '2021-03-22 08:53:17', '2021-03-22 08:53:17'),
(40, 101, 181400043, 0, 'Final Presentation', '2021-03-22 08:53:17', '2021-03-22 08:53:17'),
(41, 101, 181400048, 0, 'Final Presentation', '2021-03-22 08:53:17', '2021-03-22 08:53:17'),
(42, 101, 181400153, 1, 'Final Presentation', '2021-03-22 08:53:17', '2021-03-22 08:53:17'),
(43, 101, 181400026, 0, 'Proposal Defense Presentation', '2021-04-05 09:13:35', '2021-04-05 09:13:35'),
(44, 101, 181400022, 0, 'Proposal Defense Presentation', '2021-04-05 09:13:35', '2021-04-05 09:13:35'),
(45, 101, 181400066, 0, 'Proposal Defense Presentation', '2021-04-05 09:13:35', '2021-04-05 09:13:35'),
(46, 101, 181400041, 0, 'Proposal Defense Presentation', '2021-04-05 09:13:35', '2021-04-05 09:13:35'),
(47, 101, 171400021, 0, 'Proposal Defense Presentation', '2021-04-05 09:14:24', '2021-04-05 09:14:24'),
(48, 101, 171400025, 0, 'Proposal Defense Presentation', '2021-04-05 09:14:24', '2021-04-05 09:14:24'),
(49, 101, 171400026, 0, 'Proposal Defense Presentation', '2021-04-05 09:14:24', '2021-04-05 09:14:24'),
(50, 101, 181400128, 0, 'Proposal Defense Presentation', '2021-04-05 09:14:49', '2021-04-05 09:14:49'),
(51, 101, 1814000033, 0, 'Proposal Defense Presentation', '2021-04-05 09:14:49', '2021-04-05 09:14:49'),
(52, 101, 181400121, 0, 'Proposal Defense Presentation', '2021-04-05 09:14:49', '2021-04-05 09:14:49'),
(53, 101, 181300017, 0, 'Proposal Defense Presentation', '2021-04-05 09:15:15', '2021-04-05 09:15:15'),
(54, 101, 181300018, 0, 'Proposal Defense Presentation', '2021-04-05 09:15:15', '2021-04-05 09:15:15'),
(55, 101, 181300046, 0, 'Proposal Defense Presentation', '2021-04-05 09:15:15', '2021-04-05 09:15:15'),
(56, 101, 17140004, 0, 'Proposal Defense Presentation', '2021-04-05 09:16:17', '2021-04-05 09:16:17'),
(57, 101, 17140005, 0, 'Proposal Defense Presentation', '2021-04-05 09:16:17', '2021-04-05 09:16:17'),
(58, 101, 17140006, 0, 'Proposal Defense Presentation', '2021-04-05 09:16:17', '2021-04-05 09:16:17'),
(59, 101, 18130004, 0, 'Proposal Defense Presentation', '2021-04-05 09:17:04', '2021-04-05 09:17:04'),
(60, 101, 18130005, 0, 'Proposal Defense Presentation', '2021-04-05 09:17:04', '2021-04-05 09:17:04'),
(61, 101, 18130007, 0, 'Proposal Defense Presentation', '2021-04-05 09:17:04', '2021-04-05 09:17:04'),
(62, 101, 181400045, 0, 'Proposal Defense Presentation', '2021-04-05 09:18:01', '2021-04-05 09:18:01'),
(63, 101, 181400043, 0, 'Proposal Defense Presentation', '2021-04-05 09:18:01', '2021-04-05 09:18:01'),
(64, 101, 181400048, 0, 'Proposal Defense Presentation', '2021-04-05 09:18:01', '2021-04-05 09:18:01'),
(65, 101, 181400153, 0, 'Proposal Defense Presentation', '2021-04-05 09:18:01', '2021-04-05 09:18:01'),
(66, 109, 181400026, 0, 'Proposal Defense Presentation', '2021-04-05 09:19:50', '2021-04-05 09:19:50'),
(67, 109, 181400022, 0, 'Proposal Defense Presentation', '2021-04-05 09:19:50', '2021-04-05 09:19:50'),
(68, 109, 181400066, 0, 'Proposal Defense Presentation', '2021-04-05 09:19:50', '2021-04-05 09:19:50'),
(69, 109, 181400041, 0, 'Proposal Defense Presentation', '2021-04-05 09:19:50', '2021-04-05 09:19:50'),
(70, 109, 181400128, 0, 'Proposal Defense Presentation', '2021-04-05 09:20:22', '2021-04-05 09:20:22'),
(71, 109, 1814000033, 0, 'Proposal Defense Presentation', '2021-04-05 09:20:22', '2021-04-05 09:20:22'),
(72, 109, 181400121, 0, 'Proposal Defense Presentation', '2021-04-05 09:20:22', '2021-04-05 09:20:22'),
(73, 109, 181300017, 0, 'Proposal Defense Presentation', '2021-04-05 09:21:09', '2021-04-05 09:21:09'),
(74, 109, 181300018, 0, 'Proposal Defense Presentation', '2021-04-05 09:21:09', '2021-04-05 09:21:09'),
(75, 109, 181300046, 0, 'Proposal Defense Presentation', '2021-04-05 09:21:09', '2021-04-05 09:21:09'),
(76, 109, 171400021, 0, 'Proposal Defense Presentation', '2021-04-05 09:22:11', '2021-04-05 09:22:11'),
(77, 109, 171400025, 0, 'Proposal Defense Presentation', '2021-04-05 09:22:11', '2021-04-05 09:22:11'),
(78, 109, 171400026, 0, 'Proposal Defense Presentation', '2021-04-05 09:22:11', '2021-04-05 09:22:11'),
(79, 101, 181400001, 0, 'Proposal Defense Presentation', '2021-04-05 09:25:38', '2021-04-05 09:25:38'),
(80, 101, 181400011, 1, 'Proposal Defense Presentation', '2021-04-05 09:25:38', '2021-04-05 09:25:38'),
(81, 101, 181400056, 0, 'Proposal Defense Presentation', '2021-04-05 09:25:38', '2021-04-05 09:25:38'),
(82, 101, 181300014, 0, 'Proposal Defense Presentation', '2021-04-05 09:26:56', '2021-04-05 09:26:56'),
(83, 101, 181300015, 0, 'Proposal Defense Presentation', '2021-04-05 09:26:56', '2021-04-05 09:26:56'),
(84, 101, 181300016, 0, 'Proposal Defense Presentation', '2021-04-05 09:26:56', '2021-04-05 09:26:56'),
(85, 101, 181300011, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:00', '2021-04-05 09:27:00'),
(86, 101, 181300012, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:00', '2021-04-05 09:27:00'),
(87, 101, 181300013, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:00', '2021-04-05 09:27:00'),
(88, 101, 181400020, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:04', '2021-04-05 09:27:04'),
(89, 101, 181400021, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:04', '2021-04-05 09:27:04'),
(90, 101, 181400002, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:04', '2021-04-05 09:27:04'),
(91, 101, 17140001, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:07', '2021-04-05 09:27:07'),
(92, 101, 17140002, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:07', '2021-04-05 09:27:07'),
(93, 101, 17140003, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:07', '2021-04-05 09:27:07'),
(94, 101, 17140007, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:11', '2021-04-05 09:27:11'),
(95, 101, 17140008, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:11', '2021-04-05 09:27:11'),
(96, 101, 17140009, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:11', '2021-04-05 09:27:11'),
(97, 101, 181400072, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:14', '2021-04-05 09:27:14'),
(98, 101, 181400111, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:14', '2021-04-05 09:27:14'),
(99, 101, 181400112, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:14', '2021-04-05 09:27:14'),
(100, 101, 181400123, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:21', '2021-04-05 09:27:21'),
(101, 101, 181400003, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:21', '2021-04-05 09:27:21'),
(102, 101, 181400055, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:21', '2021-04-05 09:27:21'),
(103, 101, 17140011, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:25', '2021-04-05 09:27:25'),
(104, 101, 17140016, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:25', '2021-04-05 09:27:25'),
(105, 101, 171400018, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:25', '2021-04-05 09:27:25'),
(106, 101, 17140010, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:29', '2021-04-05 09:27:29'),
(107, 101, 171400012, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:29', '2021-04-05 09:27:29'),
(108, 101, 171400017, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:29', '2021-04-05 09:27:29'),
(109, 101, 171400020, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:33', '2021-04-05 09:27:33'),
(110, 101, 171400022, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:33', '2021-04-05 09:27:33'),
(111, 101, 171400023, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:33', '2021-04-05 09:27:33'),
(112, 101, 171400014, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:39', '2021-04-05 09:27:39'),
(113, 101, 17140015, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:39', '2021-04-05 09:27:39'),
(114, 101, 171400019, 0, 'Proposal Defense Presentation', '2021-04-05 09:27:39', '2021-04-05 09:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `feed_backs`
--

CREATE TABLE `feed_backs` (
  `id` int(200) NOT NULL,
  `feedback` text NOT NULL,
  `g_id` int(200) NOT NULL,
  `f_id` int(200) NOT NULL,
  `presentation_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feed_backs`
--

INSERT INTO `feed_backs` (`id`, `feedback`, `g_id`, `f_id`, `presentation_name`, `created_at`, `updated_at`) VALUES
(30, 'Project Dashboard Slide: Presents traditional project metrics as UAT Acceptance Coverage, Man Hours comparison of actual vs forecast, the project net promoter score and the resources utilization ratio.\r\nCustomer Appreciation Evolution\r\nDelivered versus Accepted Features: Data driven editable line chart\r\nDefects By Severity: Data driven stacked column chart that shows the evolution of software defects in time.\r\nBurn down chart: For Agile projects, how many story points where burned versus the estimated ideal amount.', 4, 101, 'Proposal Defense Presentation', '2021-04-05 09:13:35', '2021-04-05 09:13:35'),
(31, 'Project Dashboard Slide: Presents traditional project metrics as UAT Acceptance Coverage, Man Hours comparison of actual vs forecast, the project net promoter score and the resources utilization ratio. Customer Appreciation Evolution Delivered versus Accepted Features:', 20, 101, 'Proposal Defense Presentation', '2021-04-05 09:14:24', '2021-04-05 09:14:24'),
(32, 'Project Dashboard Slide: Presents traditional project metrics as UAT Acceptance Coverage, Man Hours comparison of actual vs forecast, the project net promoter score and the resources utilization ratio. Customer Appreciation Evolution Delivered versus Accepted Features:', 6, 101, 'Proposal Defense Presentation', '2021-04-05 09:14:49', '2021-04-05 09:14:49'),
(33, 'Project Dashboard Slide: Presents traditional project metrics as UAT Acceptance Coverage, Man Hours comparison of actual vs forecast, the project net promoter score and the resources utilization ratio. Customer Appreciation Evolution Delivered versus Accepted Features:', 12, 101, 'Proposal Defense Presentation', '2021-04-05 09:15:15', '2021-04-05 09:15:15'),
(34, 'Project Dashboard Slide: Presents traditional project metrics as UAT Acceptance Coverage, Man Hours comparison of actual vs forecast, the project net promoter score and the resources utilization ratio. Customer Appreciation Evolution Delivered versus Accepted Features:', 14, 101, 'Proposal Defense Presentation', '2021-04-05 09:16:17', '2021-04-05 09:16:17'),
(35, 'Project Dashboard Slide: Presents traditional project metrics as UAT Acceptance Coverage, Man Hours comparison of actual vs forecast, the project net promoter score and the resources utilization ratio. Customer Appreciation Evolution Delivered versus Accepted Features:', 9, 101, 'Proposal Defense Presentation', '2021-04-05 09:17:04', '2021-04-05 09:17:04'),
(36, 'Project Dashboard Slide: Presents traditional project metrics as UAT Acceptance Coverage, Man Hours comparison of actual vs forecast, the project net promoter score and the resources utilization ratio. Customer Appreciation Evolution Delivered versus Accepted Features:', 1, 101, 'Proposal Defense Presentation', '2021-04-05 09:18:01', '2021-04-05 09:18:01'),
(37, 'Resource utilization chart: Column stacked chart that evaluate the team resources utilization along time.\r\nProject Performance Assessment: Bubble chart.\r\n Tools and Technologies Diagram\r\nRisk Assessment Matrix\r\nRisk Management Matrix', 4, 109, 'Proposal Defense Presentation', '2021-04-05 09:19:50', '2021-04-05 09:19:50'),
(38, 'Resource utilization chart: Column stacked chart that evaluate the team resources utilization along time.\r\nProject Performance Assessment: Bubble chart.\r\n Tools and Technologies Diagram\r\nRisk Assessment Matrix\r\nRisk Management Matrix', 6, 109, 'Proposal Defense Presentation', '2021-04-05 09:20:22', '2021-04-05 09:20:22'),
(39, 'Resource utilization chart: Column stacked chart that evaluate the team resources utilization along time.\r\nProject Performance Assessment: Bubble chart.\r\n Tools and Technologies Diagram\r\nRisk Assessment Matrix\r\nRisk Management Matrix', 12, 109, 'Proposal Defense Presentation', '2021-04-05 09:21:09', '2021-04-05 09:21:09'),
(40, 'Resource utilization chart: Column stacked chart that evaluate the team resources utilization along time.\r\nProject Performance Assessment: Bubble chart.\r\n Tools and Technologies Diagram\r\nRisk Assessment Matrix\r\nRisk Management Matrix', 20, 109, 'Proposal Defense Presentation', '2021-04-05 09:22:11', '2021-04-05 09:22:11'),
(41, 'Resource utilization chart: Column stacked chart that evaluate the team resources utilization along time.\r\nProject Performance Assessment: Bubble chart.\r\n Tools and Technologies Diagram\r\nRisk Assessment Matrix\r\nRisk Management Matrix', 2, 101, 'Proposal Defense Presentation', '2021-04-05 09:25:38', '2021-04-05 09:25:38'),
(42, 'Resource utilization chart: Column stacked chart that evaluate the team resources utilization along time.\r\nProject Performance Assessment: Bubble chart.\r\n Tools and Technologies Diagram\r\nRisk Assessment Matrix\r\nRisk Management Matrix', 11, 101, 'Proposal Defense Presentation', '2021-04-05 09:26:56', '2021-04-05 09:26:56'),
(43, 'Resource utilization chart: Column stacked chart that evaluate the team resources utilization along time.\r\nProject Performance Assessment: Bubble chart.\r\n Tools and Technologies Diagram\r\nRisk Assessment Matrix\r\nRisk Management Matrix', 10, 101, 'Proposal Defense Presentation', '2021-04-05 09:27:00', '2021-04-05 09:27:00'),
(44, 'Resource utilization chart: Column stacked chart that evaluate the team resources utilization along time.\r\nProject Performance Assessment: Bubble chart.\r\n Tools and Technologies Diagram\r\nRisk Assessment Matrix\r\nRisk Management Matrix', 3, 101, 'Proposal Defense Presentation', '2021-04-05 09:27:04', '2021-04-05 09:27:04'),
(45, 'Resource utilization chart: Column stacked chart that evaluate the team resources utilization along time.\r\nProject Performance Assessment: Bubble chart.\r\n Tools and Technologies Diagram\r\nRisk Assessment Matrix\r\nRisk Management Matrix', 13, 101, 'Proposal Defense Presentation', '2021-04-05 09:27:07', '2021-04-05 09:27:07'),
(46, 'Resource utilization chart: Column stacked chart that evaluate the team resources utilization along time.\r\nProject Performance Assessment: Bubble chart.\r\n Tools and Technologies Diagram\r\nRisk Assessment Matrix\r\nRisk Management Matrix', 15, 101, 'Proposal Defense Presentation', '2021-04-05 09:27:11', '2021-04-05 09:27:11'),
(47, 'Resource utilization chart: Column stacked chart that evaluate the team resources utilization along time.\r\nProject Performance Assessment: Bubble chart.\r\n Tools and Technologies Diagram\r\nRisk Assessment Matrix\r\nRisk Management Matrix', 5, 101, 'Proposal Defense Presentation', '2021-04-05 09:27:14', '2021-04-05 09:27:14'),
(48, 'Resource utilization chart: Column stacked chart that evaluate the team resources utilization along time.\r\nProject Performance Assessment: Bubble chart.\r\n Tools and Technologies Diagram\r\nRisk Assessment Matrix\r\nRisk Management Matrix', 7, 101, 'Proposal Defense Presentation', '2021-04-05 09:27:21', '2021-04-05 09:27:21'),
(49, 'Resource utilization chart: Column stacked chart that evaluate the team resources utilization along time.\r\nProject Performance Assessment: Bubble chart.\r\n Tools and Technologies Diagram\r\nRisk Assessment Matrix\r\nRisk Management Matrix', 17, 101, 'Proposal Defense Presentation', '2021-04-05 09:27:25', '2021-04-05 09:27:25'),
(50, 'Resource utilization chart: Column stacked chart that evaluate the team resources utilization along time.\r\nProject Performance Assessment: Bubble chart.\r\n Tools and Technologies Diagram\r\nRisk Assessment Matrix\r\nRisk Management Matrix', 16, 101, 'Proposal Defense Presentation', '2021-04-05 09:27:29', '2021-04-05 09:27:29'),
(51, 'Resource utilization chart: Column stacked chart that evaluate the team resources utilization along time.\r\nProject Performance Assessment: Bubble chart.\r\n Tools and Technologies Diagram\r\nRisk Assessment Matrix\r\nRisk Management Matrix', 19, 101, 'Proposal Defense Presentation', '2021-04-05 09:27:33', '2021-04-05 09:27:33'),
(52, 'Resource utilization chart: Column stacked chart that evaluate the team resources utilization along time.\r\nProject Performance Assessment: Bubble chart.\r\n Tools and Technologies Diagram\r\nRisk Assessment Matrix\r\nRisk Management Matrix', 18, 101, 'Proposal Defense Presentation', '2021-04-05 09:27:39', '2021-04-05 09:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_10_18_163440_add_votes_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `presentations`
--

CREATE TABLE `presentations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lecture_Slot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_Id` int(11) NOT NULL,
  `group_avail` int(11) NOT NULL,
  `Supervisor_avail` int(11) NOT NULL,
  `CoOrdinator_avail` int(11) NOT NULL,
  `done` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presentations`
--

INSERT INTO `presentations` (`id`, `day`, `lecture_Slot`, `group_Id`, `group_avail`, `Supervisor_avail`, `CoOrdinator_avail`, `done`, `created_at`, `updated_at`) VALUES
(10, 'Monday', 'Lecture 1', 1, 0, 0, 0, 0, NULL, NULL),
(11, 'Monday', 'Lecture 2', 1, 0, 0, 0, 0, NULL, NULL),
(12, 'Monday', 'Lecture 3', 1, 0, 0, 1, 0, NULL, NULL),
(13, 'Monday', 'Lecture 4', 1, 0, 0, 0, 0, NULL, NULL),
(14, 'Monday', 'Lecture 5', 1, 1, 0, 0, 0, NULL, NULL),
(15, 'Monday', 'Lecture 6', 1, 1, 0, 0, 0, NULL, NULL),
(16, 'Tuesday', 'Lecture 1', 1, 0, 0, 0, 0, NULL, NULL),
(17, 'Tuesday', 'Lecture 2', 1, 1, 0, 0, 0, NULL, NULL),
(18, 'Tuesday', 'Lecture 3', 1, 0, 0, 1, 0, NULL, NULL),
(19, 'Tuesday', 'Lecture 4', 1, 0, 0, 0, 0, NULL, NULL),
(20, 'Tuesday', 'Lecture 5', 1, 1, 0, 0, 0, NULL, NULL),
(21, 'Tuesday', 'Lecture 6', 1, 1, 0, 0, 0, NULL, NULL),
(22, 'Wednesday', 'Lecture 1', 1, 0, 0, 1, 0, NULL, NULL),
(23, 'Wednesday', 'Lecture 2', 1, 0, 0, 0, 0, NULL, NULL),
(24, 'Wednesday', 'Lecture 3', 1, 1, 1, 1, 0, NULL, NULL),
(25, 'Wednesday', 'Lecture 4', 1, 1, 0, 0, 0, NULL, NULL),
(26, 'Wednesday', 'Lecture 5', 1, 1, 0, 1, 0, NULL, NULL),
(27, 'Wednesday', 'Lecture 6', 1, 1, 0, 1, 0, NULL, NULL),
(28, 'Thursday', 'Lecture 1', 1, 1, 0, 0, 0, NULL, NULL),
(29, 'Thursday', 'Lecture 2', 1, 0, 0, 1, 0, NULL, NULL),
(30, 'Thursday', 'Lecture 3', 1, 0, 0, 0, 0, NULL, NULL),
(31, 'Thursday', 'Lecture 4', 1, 0, 0, 0, 0, NULL, NULL),
(32, 'Thursday', 'Lecture 5', 1, 1, 0, 0, 0, NULL, NULL),
(33, 'Thursday', 'Lecture 6', 1, 0, 0, 0, 0, NULL, NULL),
(34, 'Friday', 'Lecture 1', 1, 0, 0, 0, 0, NULL, NULL),
(35, 'Friday', 'Lecture 2', 1, 0, 0, 1, 0, NULL, NULL),
(36, 'Friday', 'Lecture 3', 1, 0, 0, 0, 0, NULL, NULL),
(37, 'Friday', 'Lecture 4', 1, 0, 0, 0, 0, NULL, NULL),
(38, 'Friday', 'Lecture 5', 1, 1, 0, 0, 0, NULL, NULL),
(39, 'Friday', 'Lecture 6', 1, 0, 0, 1, 0, NULL, NULL),
(40, 'Saturday', 'Lecture 1', 1, 0, 0, 0, 0, NULL, NULL),
(41, 'Saturday', 'Lecture 2', 1, 0, 1, 0, 0, NULL, NULL),
(42, 'Saturday', 'Lecture 3', 1, 0, 0, 0, 0, NULL, NULL),
(43, 'Saturday', 'Lecture 4', 1, 0, 0, 0, 0, NULL, NULL),
(44, 'Saturday', 'Lecture 5', 1, 0, 0, 0, 0, NULL, NULL),
(45, 'Saturday', 'Lecture 6', 1, 1, 0, 1, 0, NULL, NULL),
(46, 'Monday', 'Lecture 1', 2, 0, 0, 0, 0, NULL, NULL),
(47, 'Monday', 'Lecture 2', 2, 0, 0, 0, 0, NULL, NULL),
(48, 'Monday', 'Lecture 3', 2, 0, 0, 1, 0, NULL, NULL),
(49, 'Monday', 'Lecture 4', 2, 0, 0, 0, 0, NULL, NULL),
(50, 'Monday', 'Lecture 5', 2, 1, 0, 0, 0, NULL, NULL),
(51, 'Monday', 'Lecture 6', 2, 1, 0, 0, 0, NULL, NULL),
(52, 'Tuesday', 'Lecture 1', 2, 0, 0, 0, 0, NULL, NULL),
(53, 'Tuesday', 'Lecture 2', 2, 1, 0, 0, 0, NULL, NULL),
(54, 'Tuesday', 'Lecture 3', 2, 0, 0, 1, 0, NULL, NULL),
(55, 'Tuesday', 'Lecture 4', 2, 0, 0, 0, 0, NULL, NULL),
(56, 'Tuesday', 'Lecture 5', 2, 1, 0, 0, 0, NULL, NULL),
(57, 'Tuesday', 'Lecture 6', 2, 1, 0, 0, 0, NULL, NULL),
(58, 'Wednesday', 'Lecture 1', 2, 0, 0, 1, 0, NULL, NULL),
(59, 'Wednesday', 'Lecture 2', 2, 0, 0, 0, 0, NULL, NULL),
(60, 'Wednesday', 'Lecture 3', 2, 1, 1, 1, 0, NULL, NULL),
(61, 'Wednesday', 'Lecture 4', 2, 1, 0, 0, 0, NULL, NULL),
(62, 'Wednesday', 'Lecture 5', 2, 1, 1, 1, 0, NULL, NULL),
(63, 'Wednesday', 'Lecture 6', 2, 1, 0, 1, 0, NULL, NULL),
(64, 'Thursday', 'Lecture 1', 2, 1, 0, 0, 0, NULL, NULL),
(65, 'Thursday', 'Lecture 2', 2, 0, 0, 1, 0, NULL, NULL),
(66, 'Thursday', 'Lecture 3', 2, 0, 0, 0, 0, NULL, NULL),
(67, 'Thursday', 'Lecture 4', 2, 0, 0, 0, 0, NULL, NULL),
(68, 'Thursday', 'Lecture 5', 2, 1, 0, 0, 0, NULL, NULL),
(69, 'Thursday', 'Lecture 6', 2, 0, 0, 0, 0, NULL, NULL),
(70, 'Friday', 'Lecture 1', 2, 0, 0, 0, 0, NULL, NULL),
(71, 'Friday', 'Lecture 2', 2, 0, 0, 1, 0, NULL, NULL),
(72, 'Friday', 'Lecture 3', 2, 0, 0, 0, 0, NULL, NULL),
(73, 'Friday', 'Lecture 4', 2, 0, 0, 0, 0, NULL, NULL),
(74, 'Friday', 'Lecture 5', 2, 1, 0, 0, 0, NULL, NULL),
(75, 'Friday', 'Lecture 6', 2, 0, 0, 1, 0, NULL, NULL),
(76, 'Saturday', 'Lecture 1', 2, 0, 0, 0, 0, NULL, NULL),
(77, 'Saturday', 'Lecture 2', 2, 0, 1, 0, 0, NULL, NULL),
(78, 'Saturday', 'Lecture 3', 2, 0, 1, 0, 0, NULL, NULL),
(79, 'Saturday', 'Lecture 4', 2, 0, 0, 0, 0, NULL, NULL),
(80, 'Saturday', 'Lecture 5', 2, 0, 0, 0, 0, NULL, NULL),
(81, 'Saturday', 'Lecture 6', 2, 1, 0, 1, 0, NULL, NULL),
(82, 'Monday', 'Lecture 1', 3, 0, 0, 0, 0, NULL, NULL),
(83, 'Monday', 'Lecture 2', 3, 1, 0, 0, 0, NULL, NULL),
(84, 'Monday', 'Lecture 3', 3, 0, 0, 1, 0, NULL, NULL),
(85, 'Monday', 'Lecture 4', 3, 0, 1, 0, 0, NULL, NULL),
(86, 'Monday', 'Lecture 5', 3, 0, 0, 0, 0, NULL, NULL),
(87, 'Monday', 'Lecture 6', 3, 0, 0, 0, 0, NULL, NULL),
(88, 'Tuesday', 'Lecture 1', 3, 0, 0, 0, 0, NULL, NULL),
(89, 'Tuesday', 'Lecture 2', 3, 1, 0, 0, 0, NULL, NULL),
(90, 'Tuesday', 'Lecture 3', 3, 0, 1, 1, 0, NULL, NULL),
(91, 'Tuesday', 'Lecture 4', 3, 1, 0, 0, 0, NULL, NULL),
(92, 'Tuesday', 'Lecture 5', 3, 1, 0, 0, 0, NULL, NULL),
(93, 'Tuesday', 'Lecture 6', 3, 0, 0, 0, 0, NULL, NULL),
(94, 'Wednesday', 'Lecture 1', 3, 0, 0, 0, 0, NULL, NULL),
(95, 'Wednesday', 'Lecture 2', 3, 1, 0, 0, 0, NULL, NULL),
(96, 'Wednesday', 'Lecture 3', 3, 0, 0, 1, 0, NULL, NULL),
(97, 'Wednesday', 'Lecture 4', 3, 0, 0, 1, 0, NULL, NULL),
(98, 'Wednesday', 'Lecture 5', 3, 1, 0, 0, 0, NULL, NULL),
(99, 'Wednesday', 'Lecture 6', 3, 1, 0, 0, 0, NULL, NULL),
(100, 'Thursday', 'Lecture 1', 3, 0, 0, 0, 0, NULL, NULL),
(101, 'Thursday', 'Lecture 2', 3, 0, 0, 1, 0, NULL, NULL),
(102, 'Thursday', 'Lecture 3', 3, 1, 0, 0, 0, NULL, NULL),
(103, 'Thursday', 'Lecture 4', 3, 0, 0, 0, 0, NULL, NULL),
(104, 'Thursday', 'Lecture 5', 3, 0, 0, 0, 0, NULL, NULL),
(105, 'Thursday', 'Lecture 6', 3, 0, 0, 0, 0, NULL, NULL),
(106, 'Friday', 'Lecture 1', 3, 1, 0, 0, 0, NULL, NULL),
(107, 'Friday', 'Lecture 2', 3, 1, 0, 1, 0, NULL, NULL),
(108, 'Friday', 'Lecture 3', 3, 1, 1, 0, 0, NULL, NULL),
(109, 'Friday', 'Lecture 4', 3, 0, 0, 0, 0, NULL, NULL),
(110, 'Friday', 'Lecture 5', 3, 1, 0, 0, 0, NULL, NULL),
(111, 'Friday', 'Lecture 6', 3, 0, 1, 1, 0, NULL, NULL),
(112, 'Saturday', 'Lecture 1', 3, 0, 0, 0, 0, NULL, NULL),
(113, 'Saturday', 'Lecture 2', 3, 0, 0, 0, 0, NULL, NULL),
(114, 'Saturday', 'Lecture 3', 3, 0, 0, 0, 0, NULL, NULL),
(115, 'Saturday', 'Lecture 4', 3, 0, 0, 0, 0, NULL, NULL),
(116, 'Saturday', 'Lecture 5', 3, 1, 1, 0, 0, NULL, NULL),
(117, 'Saturday', 'Lecture 6', 3, 0, 0, 1, 0, NULL, NULL),
(118, 'Monday', 'Lecture 1', 5, 0, 0, 0, 0, NULL, NULL),
(119, 'Monday', 'Lecture 2', 5, 1, 0, 1, 0, NULL, NULL),
(120, 'Monday', 'Lecture 3', 5, 0, 0, 0, 0, NULL, NULL),
(121, 'Monday', 'Lecture 4', 5, 0, 0, 0, 0, NULL, NULL),
(122, 'Monday', 'Lecture 5', 5, 0, 0, 1, 0, NULL, NULL),
(123, 'Monday', 'Lecture 6', 5, 0, 0, 0, 0, NULL, NULL),
(124, 'Tuesday', 'Lecture 1', 5, 0, 0, 0, 0, NULL, NULL),
(125, 'Tuesday', 'Lecture 2', 5, 1, 0, 0, 0, NULL, NULL),
(126, 'Tuesday', 'Lecture 3', 5, 0, 0, 1, 0, NULL, NULL),
(127, 'Tuesday', 'Lecture 4', 5, 0, 0, 0, 0, NULL, NULL),
(128, 'Tuesday', 'Lecture 5', 5, 0, 0, 1, 0, NULL, NULL),
(129, 'Tuesday', 'Lecture 6', 5, 0, 0, 1, 0, NULL, NULL),
(130, 'Wednesday', 'Lecture 1', 5, 0, 0, 0, 0, NULL, NULL),
(131, 'Wednesday', 'Lecture 2', 5, 1, 0, 0, 0, NULL, NULL),
(132, 'Wednesday', 'Lecture 3', 5, 0, 1, 1, 0, NULL, NULL),
(133, 'Wednesday', 'Lecture 4', 5, 0, 0, 1, 0, NULL, NULL),
(134, 'Wednesday', 'Lecture 5', 5, 1, 1, 0, 0, NULL, NULL),
(135, 'Wednesday', 'Lecture 6', 5, 1, 0, 0, 0, NULL, NULL),
(136, 'Thursday', 'Lecture 1', 5, 0, 0, 0, 0, NULL, NULL),
(137, 'Thursday', 'Lecture 2', 5, 0, 0, 1, 0, NULL, NULL),
(138, 'Thursday', 'Lecture 3', 5, 1, 0, 0, 0, NULL, NULL),
(139, 'Thursday', 'Lecture 4', 5, 0, 0, 0, 0, NULL, NULL),
(140, 'Thursday', 'Lecture 5', 5, 1, 0, 0, 0, NULL, NULL),
(141, 'Thursday', 'Lecture 6', 5, 0, 0, 0, 0, NULL, NULL),
(142, 'Friday', 'Lecture 1', 5, 0, 0, 0, 0, NULL, NULL),
(143, 'Friday', 'Lecture 2', 5, 1, 0, 1, 0, NULL, NULL),
(144, 'Friday', 'Lecture 3', 5, 0, 0, 0, 0, NULL, NULL),
(145, 'Friday', 'Lecture 4', 5, 0, 0, 0, 0, NULL, NULL),
(146, 'Friday', 'Lecture 5', 5, 0, 0, 0, 0, NULL, NULL),
(147, 'Friday', 'Lecture 6', 5, 0, 0, 1, 0, NULL, NULL),
(148, 'Saturday', 'Lecture 1', 5, 0, 0, 0, 0, NULL, NULL),
(149, 'Saturday', 'Lecture 2', 5, 0, 1, 0, 0, NULL, NULL),
(150, 'Saturday', 'Lecture 3', 5, 0, 1, 0, 0, NULL, NULL),
(151, 'Saturday', 'Lecture 4', 5, 0, 0, 0, 0, NULL, NULL),
(152, 'Saturday', 'Lecture 5', 5, 1, 0, 0, 0, NULL, NULL),
(153, 'Saturday', 'Lecture 6', 5, 0, 0, 1, 0, NULL, NULL),
(154, 'Monday', 'Lecture 1', 4, 0, 0, 0, 0, NULL, NULL),
(155, 'Monday', 'Lecture 2', 4, 1, 0, 0, 0, NULL, NULL),
(156, 'Monday', 'Lecture 3', 4, 0, 0, 1, 0, NULL, NULL),
(157, 'Monday', 'Lecture 4', 4, 0, 0, 0, 0, NULL, NULL),
(158, 'Monday', 'Lecture 5', 4, 0, 0, 0, 0, NULL, NULL),
(159, 'Monday', 'Lecture 6', 4, 0, 0, 0, 0, NULL, NULL),
(160, 'Tuesday', 'Lecture 1', 4, 0, 0, 0, 0, NULL, NULL),
(161, 'Tuesday', 'Lecture 2', 4, 1, 0, 0, 0, NULL, NULL),
(162, 'Tuesday', 'Lecture 3', 4, 0, 0, 1, 0, NULL, NULL),
(163, 'Tuesday', 'Lecture 4', 4, 0, 0, 0, 0, NULL, NULL),
(164, 'Tuesday', 'Lecture 5', 4, 0, 0, 0, 0, NULL, NULL),
(165, 'Tuesday', 'Lecture 6', 4, 0, 0, 0, 0, NULL, NULL),
(166, 'Wednesday', 'Lecture 1', 4, 0, 0, 0, 0, NULL, NULL),
(167, 'Wednesday', 'Lecture 2', 4, 1, 1, 0, 0, NULL, NULL),
(168, 'Wednesday', 'Lecture 3', 4, 0, 0, 1, 0, NULL, NULL),
(169, 'Wednesday', 'Lecture 4', 4, 0, 0, 1, 0, NULL, NULL),
(170, 'Wednesday', 'Lecture 5', 4, 1, 0, 0, 0, NULL, NULL),
(171, 'Wednesday', 'Lecture 6', 4, 1, 0, 0, 0, NULL, NULL),
(172, 'Thursday', 'Lecture 1', 4, 0, 0, 0, 0, NULL, NULL),
(173, 'Thursday', 'Lecture 2', 4, 0, 0, 1, 0, NULL, NULL),
(174, 'Thursday', 'Lecture 3', 4, 1, 0, 0, 0, NULL, NULL),
(175, 'Thursday', 'Lecture 4', 4, 0, 0, 0, 0, NULL, NULL),
(176, 'Thursday', 'Lecture 5', 4, 1, 0, 0, 0, NULL, NULL),
(177, 'Thursday', 'Lecture 6', 4, 0, 0, 0, 0, NULL, NULL),
(178, 'Friday', 'Lecture 1', 4, 0, 0, 0, 0, NULL, NULL),
(179, 'Friday', 'Lecture 2', 4, 1, 0, 1, 0, NULL, NULL),
(180, 'Friday', 'Lecture 3', 4, 0, 0, 0, 0, NULL, NULL),
(181, 'Friday', 'Lecture 4', 4, 0, 0, 0, 0, NULL, NULL),
(182, 'Friday', 'Lecture 5', 4, 0, 0, 0, 0, NULL, NULL),
(183, 'Friday', 'Lecture 6', 4, 0, 0, 1, 0, NULL, NULL),
(184, 'Saturday', 'Lecture 1', 4, 0, 1, 0, 0, NULL, NULL),
(185, 'Saturday', 'Lecture 2', 4, 0, 0, 0, 0, NULL, NULL),
(186, 'Saturday', 'Lecture 3', 4, 0, 0, 0, 0, NULL, NULL),
(187, 'Saturday', 'Lecture 4', 4, 0, 0, 0, 0, NULL, NULL),
(188, 'Saturday', 'Lecture 5', 4, 1, 0, 0, 0, NULL, NULL),
(189, 'Saturday', 'Lecture 6', 4, 0, 0, 1, 0, NULL, NULL),
(190, 'Monday', 'Lecture 1', 6, 0, 0, 0, 0, NULL, NULL),
(191, 'Monday', 'Lecture 2', 6, 0, 0, 1, 0, NULL, NULL),
(192, 'Monday', 'Lecture 3', 6, 0, 0, 0, 0, NULL, NULL),
(193, 'Monday', 'Lecture 4', 6, 0, 1, 0, 0, NULL, NULL),
(194, 'Monday', 'Lecture 5', 6, 1, 0, 1, 0, NULL, NULL),
(195, 'Monday', 'Lecture 6', 6, 1, 0, 0, 0, NULL, NULL),
(196, 'Tuesday', 'Lecture 1', 6, 0, 0, 0, 0, NULL, NULL),
(197, 'Tuesday', 'Lecture 2', 6, 1, 0, 0, 0, NULL, NULL),
(198, 'Tuesday', 'Lecture 3', 6, 0, 1, 1, 0, NULL, NULL),
(199, 'Tuesday', 'Lecture 4', 6, 0, 0, 0, 0, NULL, NULL),
(200, 'Tuesday', 'Lecture 5', 6, 1, 0, 1, 0, NULL, NULL),
(201, 'Tuesday', 'Lecture 6', 6, 1, 0, 1, 0, NULL, NULL),
(202, 'Wednesday', 'Lecture 1', 6, 0, 0, 0, 0, NULL, NULL),
(203, 'Wednesday', 'Lecture 2', 6, 1, 0, 0, 0, NULL, NULL),
(204, 'Wednesday', 'Lecture 3', 6, 1, 0, 1, 0, NULL, NULL),
(205, 'Wednesday', 'Lecture 4', 6, 0, 0, 1, 0, NULL, NULL),
(206, 'Wednesday', 'Lecture 5', 6, 0, 0, 0, 0, NULL, NULL),
(207, 'Wednesday', 'Lecture 6', 6, 0, 0, 0, 0, NULL, NULL),
(208, 'Thursday', 'Lecture 1', 6, 1, 0, 0, 0, NULL, NULL),
(209, 'Thursday', 'Lecture 2', 6, 0, 0, 1, 0, NULL, NULL),
(210, 'Thursday', 'Lecture 3', 6, 0, 0, 0, 0, NULL, NULL),
(211, 'Thursday', 'Lecture 4', 6, 0, 0, 0, 0, NULL, NULL),
(212, 'Thursday', 'Lecture 5', 6, 1, 0, 0, 0, NULL, NULL),
(213, 'Thursday', 'Lecture 6', 6, 0, 0, 0, 0, NULL, NULL),
(214, 'Friday', 'Lecture 1', 6, 0, 0, 0, 0, NULL, NULL),
(215, 'Friday', 'Lecture 2', 6, 0, 0, 1, 0, NULL, NULL),
(216, 'Friday', 'Lecture 3', 6, 0, 1, 0, 0, NULL, NULL),
(217, 'Friday', 'Lecture 4', 6, 1, 0, 0, 0, NULL, NULL),
(218, 'Friday', 'Lecture 5', 6, 1, 0, 0, 0, NULL, NULL),
(219, 'Friday', 'Lecture 6', 6, 0, 1, 1, 0, NULL, NULL),
(220, 'Saturday', 'Lecture 1', 6, 0, 0, 0, 0, NULL, NULL),
(221, 'Saturday', 'Lecture 2', 6, 0, 0, 0, 0, NULL, NULL),
(222, 'Saturday', 'Lecture 3', 6, 0, 0, 0, 0, NULL, NULL),
(223, 'Saturday', 'Lecture 4', 6, 1, 0, 0, 0, NULL, NULL),
(224, 'Saturday', 'Lecture 5', 6, 1, 1, 0, 0, NULL, NULL),
(225, 'Saturday', 'Lecture 6', 6, 1, 0, 1, 0, NULL, NULL),
(226, 'Monday', 'Lecture 1', 7, 0, 0, 0, 0, NULL, NULL),
(227, 'Monday', 'Lecture 2', 7, 0, 0, 0, 0, NULL, NULL),
(228, 'Monday', 'Lecture 3', 7, 0, 0, 1, 0, NULL, NULL),
(229, 'Monday', 'Lecture 4', 7, 1, 0, 0, 0, NULL, NULL),
(230, 'Monday', 'Lecture 5', 7, 1, 0, 0, 0, NULL, NULL),
(231, 'Monday', 'Lecture 6', 7, 0, 0, 0, 0, NULL, NULL),
(232, 'Tuesday', 'Lecture 1', 7, 1, 0, 0, 0, NULL, NULL),
(233, 'Tuesday', 'Lecture 2', 7, 0, 0, 0, 0, NULL, NULL),
(234, 'Tuesday', 'Lecture 3', 7, 0, 0, 1, 0, NULL, NULL),
(235, 'Tuesday', 'Lecture 4', 7, 0, 0, 0, 0, NULL, NULL),
(236, 'Tuesday', 'Lecture 5', 7, 1, 0, 0, 0, NULL, NULL),
(237, 'Tuesday', 'Lecture 6', 7, 0, 0, 0, 0, NULL, NULL),
(238, 'Wednesday', 'Lecture 1', 7, 1, 0, 1, 0, NULL, NULL),
(239, 'Wednesday', 'Lecture 2', 7, 0, 0, 0, 0, NULL, NULL),
(240, 'Wednesday', 'Lecture 3', 7, 0, 0, 1, 0, NULL, NULL),
(241, 'Wednesday', 'Lecture 4', 7, 0, 0, 0, 0, NULL, NULL),
(242, 'Wednesday', 'Lecture 5', 7, 0, 0, 1, 0, NULL, NULL),
(243, 'Wednesday', 'Lecture 6', 7, 0, 1, 1, 0, NULL, NULL),
(244, 'Thursday', 'Lecture 1', 7, 0, 0, 0, 0, NULL, NULL),
(245, 'Thursday', 'Lecture 2', 7, 1, 0, 1, 0, NULL, NULL),
(246, 'Thursday', 'Lecture 3', 7, 1, 0, 0, 0, NULL, NULL),
(247, 'Thursday', 'Lecture 4', 7, 0, 0, 0, 0, NULL, NULL),
(248, 'Thursday', 'Lecture 5', 7, 0, 0, 0, 0, NULL, NULL),
(249, 'Thursday', 'Lecture 6', 7, 0, 0, 0, 0, NULL, NULL),
(250, 'Friday', 'Lecture 1', 7, 0, 0, 0, 0, NULL, NULL),
(251, 'Friday', 'Lecture 2', 7, 0, 0, 1, 0, NULL, NULL),
(252, 'Friday', 'Lecture 3', 7, 1, 0, 0, 0, NULL, NULL),
(253, 'Friday', 'Lecture 4', 7, 0, 0, 0, 0, NULL, NULL),
(254, 'Friday', 'Lecture 5', 7, 0, 0, 0, 0, NULL, NULL),
(255, 'Friday', 'Lecture 6', 7, 0, 0, 1, 0, NULL, NULL),
(256, 'Saturday', 'Lecture 1', 7, 0, 0, 0, 0, NULL, NULL),
(257, 'Saturday', 'Lecture 2', 7, 0, 0, 0, 0, NULL, NULL),
(258, 'Saturday', 'Lecture 3', 7, 0, 0, 0, 0, NULL, NULL),
(259, 'Saturday', 'Lecture 4', 7, 0, 0, 0, 0, NULL, NULL),
(260, 'Saturday', 'Lecture 5', 7, 0, 0, 0, 0, NULL, NULL),
(261, 'Saturday', 'Lecture 6', 7, 0, 0, 1, 0, NULL, NULL),
(262, 'Monday', 'Lecture 1', 8, 0, 0, 0, 0, NULL, NULL),
(263, 'Monday', 'Lecture 2', 8, 0, 0, 0, 0, NULL, NULL),
(264, 'Monday', 'Lecture 3', 8, 0, 0, 1, 0, NULL, NULL),
(265, 'Monday', 'Lecture 4', 8, 1, 0, 0, 0, NULL, NULL),
(266, 'Monday', 'Lecture 5', 8, 1, 0, 0, 0, NULL, NULL),
(267, 'Monday', 'Lecture 6', 8, 0, 0, 0, 0, NULL, NULL),
(268, 'Tuesday', 'Lecture 1', 8, 1, 0, 0, 0, NULL, NULL),
(269, 'Tuesday', 'Lecture 2', 8, 0, 0, 0, 0, NULL, NULL),
(270, 'Tuesday', 'Lecture 3', 8, 0, 0, 1, 0, NULL, NULL),
(271, 'Tuesday', 'Lecture 4', 8, 0, 1, 0, 0, NULL, NULL),
(272, 'Tuesday', 'Lecture 5', 8, 1, 1, 0, 0, NULL, NULL),
(273, 'Tuesday', 'Lecture 6', 8, 0, 0, 0, 0, NULL, NULL),
(274, 'Wednesday', 'Lecture 1', 8, 1, 0, 1, 0, NULL, NULL),
(275, 'Wednesday', 'Lecture 2', 8, 0, 0, 0, 0, NULL, NULL),
(276, 'Wednesday', 'Lecture 3', 8, 0, 0, 1, 0, NULL, NULL),
(277, 'Wednesday', 'Lecture 4', 8, 0, 0, 0, 0, NULL, NULL),
(278, 'Wednesday', 'Lecture 5', 8, 0, 0, 1, 0, NULL, NULL),
(279, 'Wednesday', 'Lecture 6', 8, 0, 0, 1, 0, NULL, NULL),
(280, 'Thursday', 'Lecture 1', 8, 0, 0, 0, 0, NULL, NULL),
(281, 'Thursday', 'Lecture 2', 8, 1, 0, 1, 0, NULL, NULL),
(282, 'Thursday', 'Lecture 3', 8, 1, 0, 0, 0, NULL, NULL),
(283, 'Thursday', 'Lecture 4', 8, 0, 1, 0, 0, NULL, NULL),
(284, 'Thursday', 'Lecture 5', 8, 0, 1, 0, 0, NULL, NULL),
(285, 'Thursday', 'Lecture 6', 8, 0, 0, 0, 0, NULL, NULL),
(286, 'Friday', 'Lecture 1', 8, 0, 0, 0, 0, NULL, NULL),
(287, 'Friday', 'Lecture 2', 8, 0, 0, 1, 0, NULL, NULL),
(288, 'Friday', 'Lecture 3', 8, 1, 0, 0, 0, NULL, NULL),
(289, 'Friday', 'Lecture 4', 8, 0, 0, 0, 0, NULL, NULL),
(290, 'Friday', 'Lecture 5', 8, 0, 0, 0, 0, NULL, NULL),
(291, 'Friday', 'Lecture 6', 8, 0, 0, 1, 0, NULL, NULL),
(292, 'Saturday', 'Lecture 1', 8, 0, 0, 0, 0, NULL, NULL),
(293, 'Saturday', 'Lecture 2', 8, 0, 0, 0, 0, NULL, NULL),
(294, 'Saturday', 'Lecture 3', 8, 0, 0, 0, 0, NULL, NULL),
(295, 'Saturday', 'Lecture 4', 8, 0, 0, 0, 0, NULL, NULL),
(296, 'Saturday', 'Lecture 5', 8, 0, 0, 0, 0, NULL, NULL),
(297, 'Saturday', 'Lecture 6', 8, 0, 0, 1, 0, NULL, NULL),
(298, 'Monday', 'Lecture 1', 9, 0, 0, 0, 0, NULL, NULL),
(299, 'Monday', 'Lecture 2', 9, 1, 0, 0, 0, NULL, NULL),
(300, 'Monday', 'Lecture 3', 9, 1, 0, 1, 0, NULL, NULL),
(301, 'Monday', 'Lecture 4', 9, 1, 0, 0, 0, NULL, NULL),
(302, 'Monday', 'Lecture 5', 9, 1, 0, 0, 0, NULL, NULL),
(303, 'Monday', 'Lecture 6', 9, 0, 0, 0, 0, NULL, NULL),
(304, 'Tuesday', 'Lecture 1', 9, 1, 0, 0, 0, NULL, NULL),
(305, 'Tuesday', 'Lecture 2', 9, 0, 0, 0, 0, NULL, NULL),
(306, 'Tuesday', 'Lecture 3', 9, 0, 0, 1, 0, NULL, NULL),
(307, 'Tuesday', 'Lecture 4', 9, 0, 1, 0, 0, NULL, NULL),
(308, 'Tuesday', 'Lecture 5', 9, 0, 1, 0, 0, NULL, NULL),
(309, 'Tuesday', 'Lecture 6', 9, 0, 0, 0, 0, NULL, NULL),
(310, 'Wednesday', 'Lecture 1', 9, 1, 0, 1, 0, NULL, NULL),
(311, 'Wednesday', 'Lecture 2', 9, 1, 0, 0, 0, NULL, NULL),
(312, 'Wednesday', 'Lecture 3', 9, 0, 0, 1, 0, NULL, NULL),
(313, 'Wednesday', 'Lecture 4', 9, 0, 0, 0, 0, NULL, NULL),
(314, 'Wednesday', 'Lecture 5', 9, 0, 0, 1, 0, NULL, NULL),
(315, 'Wednesday', 'Lecture 6', 9, 0, 0, 1, 0, NULL, NULL),
(316, 'Thursday', 'Lecture 1', 9, 0, 0, 0, 0, NULL, NULL),
(317, 'Thursday', 'Lecture 2', 9, 1, 0, 1, 0, NULL, NULL),
(318, 'Thursday', 'Lecture 3', 9, 1, 0, 0, 0, NULL, NULL),
(319, 'Thursday', 'Lecture 4', 9, 0, 1, 0, 0, NULL, NULL),
(320, 'Thursday', 'Lecture 5', 9, 0, 1, 0, 0, NULL, NULL),
(321, 'Thursday', 'Lecture 6', 9, 0, 0, 0, 0, NULL, NULL),
(322, 'Friday', 'Lecture 1', 9, 0, 0, 0, 0, NULL, NULL),
(323, 'Friday', 'Lecture 2', 9, 0, 0, 1, 0, NULL, NULL),
(324, 'Friday', 'Lecture 3', 9, 1, 0, 0, 0, NULL, NULL),
(325, 'Friday', 'Lecture 4', 9, 0, 0, 0, 0, NULL, NULL),
(326, 'Friday', 'Lecture 5', 9, 0, 0, 0, 0, NULL, NULL),
(327, 'Friday', 'Lecture 6', 9, 0, 0, 1, 0, NULL, NULL),
(328, 'Saturday', 'Lecture 1', 9, 0, 0, 0, 0, NULL, NULL),
(329, 'Saturday', 'Lecture 2', 9, 0, 0, 0, 0, NULL, NULL),
(330, 'Saturday', 'Lecture 3', 9, 0, 0, 0, 0, NULL, NULL),
(331, 'Saturday', 'Lecture 4', 9, 0, 0, 0, 0, NULL, NULL),
(332, 'Saturday', 'Lecture 5', 9, 0, 0, 0, 0, NULL, NULL),
(333, 'Saturday', 'Lecture 6', 9, 0, 0, 1, 0, NULL, NULL),
(334, 'Monday', 'Lecture 1', 10, 0, 0, 0, 0, NULL, NULL),
(335, 'Monday', 'Lecture 2', 10, 1, 0, 0, 0, NULL, NULL),
(336, 'Monday', 'Lecture 3', 10, 1, 0, 1, 0, NULL, NULL),
(337, 'Monday', 'Lecture 4', 10, 1, 0, 0, 0, NULL, NULL),
(338, 'Monday', 'Lecture 5', 10, 1, 0, 0, 0, NULL, NULL),
(339, 'Monday', 'Lecture 6', 10, 0, 0, 0, 0, NULL, NULL),
(340, 'Tuesday', 'Lecture 1', 10, 1, 0, 0, 0, NULL, NULL),
(341, 'Tuesday', 'Lecture 2', 10, 0, 0, 0, 0, NULL, NULL),
(342, 'Tuesday', 'Lecture 3', 10, 0, 0, 1, 0, NULL, NULL),
(343, 'Tuesday', 'Lecture 4', 10, 0, 0, 0, 0, NULL, NULL),
(344, 'Tuesday', 'Lecture 5', 10, 0, 0, 0, 0, NULL, NULL),
(345, 'Tuesday', 'Lecture 6', 10, 0, 0, 0, 0, NULL, NULL),
(346, 'Wednesday', 'Lecture 1', 10, 1, 0, 1, 0, NULL, NULL),
(347, 'Wednesday', 'Lecture 2', 10, 1, 0, 0, 0, NULL, NULL),
(348, 'Wednesday', 'Lecture 3', 10, 0, 0, 1, 0, NULL, NULL),
(349, 'Wednesday', 'Lecture 4', 10, 0, 0, 0, 0, NULL, NULL),
(350, 'Wednesday', 'Lecture 5', 10, 0, 0, 1, 0, NULL, NULL),
(351, 'Wednesday', 'Lecture 6', 10, 0, 1, 1, 0, NULL, NULL),
(352, 'Thursday', 'Lecture 1', 10, 0, 0, 0, 0, NULL, NULL),
(353, 'Thursday', 'Lecture 2', 10, 1, 0, 1, 0, NULL, NULL),
(354, 'Thursday', 'Lecture 3', 10, 1, 0, 0, 0, NULL, NULL),
(355, 'Thursday', 'Lecture 4', 10, 0, 0, 0, 0, NULL, NULL),
(356, 'Thursday', 'Lecture 5', 10, 0, 0, 0, 0, NULL, NULL),
(357, 'Thursday', 'Lecture 6', 10, 0, 0, 0, 0, NULL, NULL),
(358, 'Friday', 'Lecture 1', 10, 0, 0, 0, 0, NULL, NULL),
(359, 'Friday', 'Lecture 2', 10, 0, 0, 1, 0, NULL, NULL),
(360, 'Friday', 'Lecture 3', 10, 1, 0, 0, 0, NULL, NULL),
(361, 'Friday', 'Lecture 4', 10, 0, 0, 0, 0, NULL, NULL),
(362, 'Friday', 'Lecture 5', 10, 0, 0, 0, 0, NULL, NULL),
(363, 'Friday', 'Lecture 6', 10, 0, 0, 1, 0, NULL, NULL),
(364, 'Saturday', 'Lecture 1', 10, 0, 0, 0, 0, NULL, NULL),
(365, 'Saturday', 'Lecture 2', 10, 0, 0, 0, 0, NULL, NULL),
(366, 'Saturday', 'Lecture 3', 10, 0, 0, 0, 0, NULL, NULL),
(367, 'Saturday', 'Lecture 4', 10, 0, 0, 0, 0, NULL, NULL),
(368, 'Saturday', 'Lecture 5', 10, 0, 0, 0, 0, NULL, NULL),
(369, 'Saturday', 'Lecture 6', 10, 0, 0, 1, 0, NULL, NULL),
(370, 'Monday', 'Lecture 1', 11, 1, 0, 0, 0, NULL, NULL),
(371, 'Monday', 'Lecture 2', 11, 0, 1, 1, 0, NULL, NULL),
(372, 'Monday', 'Lecture 3', 11, 0, 0, 0, 0, NULL, NULL),
(373, 'Monday', 'Lecture 4', 11, 0, 1, 0, 0, NULL, NULL),
(374, 'Monday', 'Lecture 5', 11, 1, 0, 1, 0, NULL, NULL),
(375, 'Monday', 'Lecture 6', 11, 0, 0, 0, 0, NULL, NULL),
(376, 'Tuesday', 'Lecture 1', 11, 1, 0, 0, 0, NULL, NULL),
(377, 'Tuesday', 'Lecture 2', 11, 0, 0, 0, 0, NULL, NULL),
(378, 'Tuesday', 'Lecture 3', 11, 0, 0, 1, 0, NULL, NULL),
(379, 'Tuesday', 'Lecture 4', 11, 1, 1, 0, 0, NULL, NULL),
(380, 'Tuesday', 'Lecture 5', 11, 1, 0, 1, 0, NULL, NULL),
(381, 'Tuesday', 'Lecture 6', 11, 0, 0, 1, 0, NULL, NULL),
(382, 'Wednesday', 'Lecture 1', 11, 0, 1, 0, 0, NULL, NULL),
(383, 'Wednesday', 'Lecture 2', 11, 0, 0, 0, 0, NULL, NULL),
(384, 'Wednesday', 'Lecture 3', 11, 1, 0, 1, 0, NULL, NULL),
(385, 'Wednesday', 'Lecture 4', 11, 0, 0, 1, 0, NULL, NULL),
(386, 'Wednesday', 'Lecture 5', 11, 0, 0, 0, 0, NULL, NULL),
(387, 'Wednesday', 'Lecture 6', 11, 0, 0, 0, 0, NULL, NULL),
(388, 'Thursday', 'Lecture 1', 11, 0, 0, 0, 0, NULL, NULL),
(389, 'Thursday', 'Lecture 2', 11, 1, 0, 1, 0, NULL, NULL),
(390, 'Thursday', 'Lecture 3', 11, 0, 0, 0, 0, NULL, NULL),
(391, 'Thursday', 'Lecture 4', 11, 0, 0, 0, 0, NULL, NULL),
(392, 'Thursday', 'Lecture 5', 11, 1, 0, 0, 0, NULL, NULL),
(393, 'Thursday', 'Lecture 6', 11, 0, 0, 0, 0, NULL, NULL),
(394, 'Friday', 'Lecture 1', 11, 0, 0, 0, 0, NULL, NULL),
(395, 'Friday', 'Lecture 2', 11, 1, 1, 1, 0, NULL, NULL),
(396, 'Friday', 'Lecture 3', 11, 0, 0, 0, 0, NULL, NULL),
(397, 'Friday', 'Lecture 4', 11, 0, 0, 0, 0, NULL, NULL),
(398, 'Friday', 'Lecture 5', 11, 1, 0, 0, 0, NULL, NULL),
(399, 'Friday', 'Lecture 6', 11, 1, 0, 1, 0, NULL, NULL),
(400, 'Saturday', 'Lecture 1', 11, 0, 0, 0, 0, NULL, NULL),
(401, 'Saturday', 'Lecture 2', 11, 0, 0, 0, 0, NULL, NULL),
(402, 'Saturday', 'Lecture 3', 11, 0, 0, 0, 0, NULL, NULL),
(403, 'Saturday', 'Lecture 4', 11, 0, 0, 0, 0, NULL, NULL),
(404, 'Saturday', 'Lecture 5', 11, 0, 0, 0, 0, NULL, NULL),
(405, 'Saturday', 'Lecture 6', 11, 0, 0, 1, 0, NULL, NULL),
(406, 'Monday', 'Lecture 1', 12, 0, 1, 0, 0, NULL, NULL),
(407, 'Monday', 'Lecture 2', 12, 1, 0, 1, 0, NULL, NULL),
(408, 'Monday', 'Lecture 3', 12, 0, 0, 0, 0, NULL, NULL),
(409, 'Monday', 'Lecture 4', 12, 0, 1, 0, 0, NULL, NULL),
(410, 'Monday', 'Lecture 5', 12, 0, 0, 1, 0, NULL, NULL),
(411, 'Monday', 'Lecture 6', 12, 0, 0, 0, 0, NULL, NULL),
(412, 'Tuesday', 'Lecture 1', 12, 0, 1, 0, 0, NULL, NULL),
(413, 'Tuesday', 'Lecture 2', 12, 0, 0, 0, 0, NULL, NULL),
(414, 'Tuesday', 'Lecture 3', 12, 0, 0, 1, 0, NULL, NULL),
(415, 'Tuesday', 'Lecture 4', 12, 1, 0, 0, 0, NULL, NULL),
(416, 'Tuesday', 'Lecture 5', 12, 1, 0, 1, 0, NULL, NULL),
(417, 'Tuesday', 'Lecture 6', 12, 0, 0, 1, 0, NULL, NULL),
(418, 'Wednesday', 'Lecture 1', 12, 0, 0, 0, 0, NULL, NULL),
(419, 'Wednesday', 'Lecture 2', 12, 1, 0, 0, 0, NULL, NULL),
(420, 'Wednesday', 'Lecture 3', 12, 1, 0, 1, 0, NULL, NULL),
(421, 'Wednesday', 'Lecture 4', 12, 0, 0, 1, 0, NULL, NULL),
(422, 'Wednesday', 'Lecture 5', 12, 0, 0, 0, 0, NULL, NULL),
(423, 'Wednesday', 'Lecture 6', 12, 0, 0, 0, 0, NULL, NULL),
(424, 'Thursday', 'Lecture 1', 12, 0, 0, 0, 0, NULL, NULL),
(425, 'Thursday', 'Lecture 2', 12, 0, 0, 1, 0, NULL, NULL),
(426, 'Thursday', 'Lecture 3', 12, 0, 1, 0, 0, NULL, NULL),
(427, 'Thursday', 'Lecture 4', 12, 0, 0, 0, 0, NULL, NULL),
(428, 'Thursday', 'Lecture 5', 12, 0, 0, 0, 0, NULL, NULL),
(429, 'Thursday', 'Lecture 6', 12, 0, 0, 0, 0, NULL, NULL),
(430, 'Friday', 'Lecture 1', 12, 0, 0, 0, 0, NULL, NULL),
(431, 'Friday', 'Lecture 2', 12, 1, 0, 1, 0, NULL, NULL),
(432, 'Friday', 'Lecture 3', 12, 0, 1, 0, 0, NULL, NULL),
(433, 'Friday', 'Lecture 4', 12, 0, 0, 0, 0, NULL, NULL),
(434, 'Friday', 'Lecture 5', 12, 1, 1, 0, 0, NULL, NULL),
(435, 'Friday', 'Lecture 6', 12, 1, 0, 1, 0, NULL, NULL),
(436, 'Saturday', 'Lecture 1', 12, 0, 0, 0, 0, NULL, NULL),
(437, 'Saturday', 'Lecture 2', 12, 0, 0, 0, 0, NULL, NULL),
(438, 'Saturday', 'Lecture 3', 12, 0, 0, 0, 0, NULL, NULL),
(439, 'Saturday', 'Lecture 4', 12, 0, 0, 0, 0, NULL, NULL),
(440, 'Saturday', 'Lecture 5', 12, 0, 0, 0, 0, NULL, NULL),
(441, 'Saturday', 'Lecture 6', 12, 0, 0, 1, 0, NULL, NULL),
(442, 'Monday', 'Lecture 1', 13, 0, 0, 0, 0, NULL, NULL),
(443, 'Monday', 'Lecture 2', 13, 1, 1, 1, 0, NULL, NULL),
(444, 'Monday', 'Lecture 3', 13, 0, 0, 0, 0, NULL, NULL),
(445, 'Monday', 'Lecture 4', 13, 0, 1, 0, 0, NULL, NULL),
(446, 'Monday', 'Lecture 5', 13, 0, 0, 1, 0, NULL, NULL),
(447, 'Monday', 'Lecture 6', 13, 0, 0, 0, 0, NULL, NULL),
(448, 'Tuesday', 'Lecture 1', 13, 0, 0, 0, 0, NULL, NULL),
(449, 'Tuesday', 'Lecture 2', 13, 1, 0, 0, 0, NULL, NULL),
(450, 'Tuesday', 'Lecture 3', 13, 1, 0, 1, 0, NULL, NULL),
(451, 'Tuesday', 'Lecture 4', 13, 0, 1, 0, 0, NULL, NULL),
(452, 'Tuesday', 'Lecture 5', 13, 1, 0, 1, 0, NULL, NULL),
(453, 'Tuesday', 'Lecture 6', 13, 0, 0, 1, 0, NULL, NULL),
(454, 'Wednesday', 'Lecture 1', 13, 0, 0, 0, 0, NULL, NULL),
(455, 'Wednesday', 'Lecture 2', 13, 1, 0, 0, 0, NULL, NULL),
(456, 'Wednesday', 'Lecture 3', 13, 1, 0, 1, 0, NULL, NULL),
(457, 'Wednesday', 'Lecture 4', 13, 0, 0, 1, 0, NULL, NULL),
(458, 'Wednesday', 'Lecture 5', 13, 0, 0, 0, 0, NULL, NULL),
(459, 'Wednesday', 'Lecture 6', 13, 0, 0, 0, 0, NULL, NULL),
(460, 'Thursday', 'Lecture 1', 13, 0, 0, 0, 0, NULL, NULL),
(461, 'Thursday', 'Lecture 2', 13, 0, 0, 1, 0, NULL, NULL),
(462, 'Thursday', 'Lecture 3', 13, 0, 1, 0, 0, NULL, NULL),
(463, 'Thursday', 'Lecture 4', 13, 1, 0, 0, 0, NULL, NULL),
(464, 'Thursday', 'Lecture 5', 13, 0, 0, 0, 0, NULL, NULL),
(465, 'Thursday', 'Lecture 6', 13, 0, 0, 0, 0, NULL, NULL),
(466, 'Friday', 'Lecture 1', 13, 0, 0, 0, 0, NULL, NULL),
(467, 'Friday', 'Lecture 2', 13, 1, 0, 1, 0, NULL, NULL),
(468, 'Friday', 'Lecture 3', 13, 0, 1, 0, 0, NULL, NULL),
(469, 'Friday', 'Lecture 4', 13, 0, 0, 0, 0, NULL, NULL),
(470, 'Friday', 'Lecture 5', 13, 1, 1, 0, 0, NULL, NULL),
(471, 'Friday', 'Lecture 6', 13, 1, 0, 1, 0, NULL, NULL),
(472, 'Saturday', 'Lecture 1', 13, 0, 0, 0, 0, NULL, NULL),
(473, 'Saturday', 'Lecture 2', 13, 0, 0, 0, 0, NULL, NULL),
(474, 'Saturday', 'Lecture 3', 13, 0, 0, 0, 0, NULL, NULL),
(475, 'Saturday', 'Lecture 4', 13, 0, 0, 0, 0, NULL, NULL),
(476, 'Saturday', 'Lecture 5', 13, 0, 0, 0, 0, NULL, NULL),
(477, 'Saturday', 'Lecture 6', 13, 0, 0, 1, 0, NULL, NULL),
(478, 'Monday', 'Lecture 1', 14, 0, 0, 0, 0, NULL, NULL),
(479, 'Monday', 'Lecture 2', 14, 0, 0, 1, 0, NULL, NULL),
(480, 'Monday', 'Lecture 3', 14, 0, 1, 0, 0, NULL, NULL),
(481, 'Monday', 'Lecture 4', 14, 0, 0, 0, 0, NULL, NULL),
(482, 'Monday', 'Lecture 5', 14, 1, 0, 1, 0, NULL, NULL),
(483, 'Monday', 'Lecture 6', 14, 0, 0, 0, 0, NULL, NULL),
(484, 'Tuesday', 'Lecture 1', 14, 1, 0, 0, 0, NULL, NULL),
(485, 'Tuesday', 'Lecture 2', 14, 0, 0, 0, 0, NULL, NULL),
(486, 'Tuesday', 'Lecture 3', 14, 0, 1, 1, 0, NULL, NULL),
(487, 'Tuesday', 'Lecture 4', 14, 1, 0, 0, 0, NULL, NULL),
(488, 'Tuesday', 'Lecture 5', 14, 1, 0, 1, 0, NULL, NULL),
(489, 'Tuesday', 'Lecture 6', 14, 0, 0, 1, 0, NULL, NULL),
(490, 'Wednesday', 'Lecture 1', 14, 0, 0, 0, 0, NULL, NULL),
(491, 'Wednesday', 'Lecture 2', 14, 0, 0, 0, 0, NULL, NULL),
(492, 'Wednesday', 'Lecture 3', 14, 1, 0, 1, 0, NULL, NULL),
(493, 'Wednesday', 'Lecture 4', 14, 0, 0, 1, 0, NULL, NULL),
(494, 'Wednesday', 'Lecture 5', 14, 0, 0, 0, 0, NULL, NULL),
(495, 'Wednesday', 'Lecture 6', 14, 0, 0, 0, 0, NULL, NULL),
(496, 'Thursday', 'Lecture 1', 14, 0, 1, 0, 0, NULL, NULL),
(497, 'Thursday', 'Lecture 2', 14, 1, 0, 1, 0, NULL, NULL),
(498, 'Thursday', 'Lecture 3', 14, 0, 0, 0, 0, NULL, NULL),
(499, 'Thursday', 'Lecture 4', 14, 0, 0, 0, 0, NULL, NULL),
(500, 'Thursday', 'Lecture 5', 14, 1, 0, 0, 0, NULL, NULL),
(501, 'Thursday', 'Lecture 6', 14, 0, 0, 0, 0, NULL, NULL),
(502, 'Friday', 'Lecture 1', 14, 0, 0, 0, 0, NULL, NULL),
(503, 'Friday', 'Lecture 2', 14, 1, 0, 1, 0, NULL, NULL),
(504, 'Friday', 'Lecture 3', 14, 0, 0, 0, 0, NULL, NULL),
(505, 'Friday', 'Lecture 4', 14, 0, 0, 0, 0, NULL, NULL),
(506, 'Friday', 'Lecture 5', 14, 1, 1, 0, 0, NULL, NULL),
(507, 'Friday', 'Lecture 6', 14, 1, 0, 1, 0, NULL, NULL),
(508, 'Saturday', 'Lecture 1', 14, 0, 0, 0, 0, NULL, NULL),
(509, 'Saturday', 'Lecture 2', 14, 0, 0, 0, 0, NULL, NULL),
(510, 'Saturday', 'Lecture 3', 14, 0, 0, 0, 0, NULL, NULL),
(511, 'Saturday', 'Lecture 4', 14, 0, 0, 0, 0, NULL, NULL),
(512, 'Saturday', 'Lecture 5', 14, 1, 0, 0, 0, NULL, NULL),
(513, 'Saturday', 'Lecture 6', 14, 0, 0, 1, 0, NULL, NULL),
(514, 'Monday', 'Lecture 1', 15, 0, 0, 0, 0, NULL, NULL),
(515, 'Monday', 'Lecture 2', 15, 1, 0, 1, 0, NULL, NULL),
(516, 'Monday', 'Lecture 3', 15, 0, 0, 0, 0, NULL, NULL),
(517, 'Monday', 'Lecture 4', 15, 0, 1, 0, 0, NULL, NULL),
(518, 'Monday', 'Lecture 5', 15, 0, 0, 1, 0, NULL, NULL),
(519, 'Monday', 'Lecture 6', 15, 0, 0, 0, 0, NULL, NULL),
(520, 'Tuesday', 'Lecture 1', 15, 0, 0, 0, 0, NULL, NULL),
(521, 'Tuesday', 'Lecture 2', 15, 1, 0, 0, 0, NULL, NULL),
(522, 'Tuesday', 'Lecture 3', 15, 1, 0, 1, 0, NULL, NULL),
(523, 'Tuesday', 'Lecture 4', 15, 0, 0, 0, 0, NULL, NULL),
(524, 'Tuesday', 'Lecture 5', 15, 1, 0, 1, 0, NULL, NULL),
(525, 'Tuesday', 'Lecture 6', 15, 0, 0, 1, 0, NULL, NULL),
(526, 'Wednesday', 'Lecture 1', 15, 0, 0, 0, 0, NULL, NULL),
(527, 'Wednesday', 'Lecture 2', 15, 1, 0, 0, 0, NULL, NULL),
(528, 'Wednesday', 'Lecture 3', 15, 1, 0, 1, 0, NULL, NULL),
(529, 'Wednesday', 'Lecture 4', 15, 0, 0, 1, 0, NULL, NULL),
(530, 'Wednesday', 'Lecture 5', 15, 0, 0, 0, 0, NULL, NULL),
(531, 'Wednesday', 'Lecture 6', 15, 0, 0, 0, 0, NULL, NULL),
(532, 'Thursday', 'Lecture 1', 15, 0, 0, 0, 0, NULL, NULL),
(533, 'Thursday', 'Lecture 2', 15, 0, 1, 1, 0, NULL, NULL),
(534, 'Thursday', 'Lecture 3', 15, 0, 0, 0, 0, NULL, NULL),
(535, 'Thursday', 'Lecture 4', 15, 1, 1, 0, 0, NULL, NULL),
(536, 'Thursday', 'Lecture 5', 15, 0, 0, 0, 0, NULL, NULL),
(537, 'Thursday', 'Lecture 6', 15, 0, 0, 0, 0, NULL, NULL),
(538, 'Friday', 'Lecture 1', 15, 0, 0, 0, 0, NULL, NULL),
(539, 'Friday', 'Lecture 2', 15, 1, 0, 1, 0, NULL, NULL),
(540, 'Friday', 'Lecture 3', 15, 0, 1, 0, 0, NULL, NULL),
(541, 'Friday', 'Lecture 4', 15, 0, 0, 0, 0, NULL, NULL),
(542, 'Friday', 'Lecture 5', 15, 1, 0, 0, 0, NULL, NULL),
(543, 'Friday', 'Lecture 6', 15, 1, 0, 1, 0, NULL, NULL),
(544, 'Saturday', 'Lecture 1', 15, 0, 0, 0, 0, NULL, NULL),
(545, 'Saturday', 'Lecture 2', 15, 0, 0, 0, 0, NULL, NULL),
(546, 'Saturday', 'Lecture 3', 15, 0, 1, 0, 0, NULL, NULL),
(547, 'Saturday', 'Lecture 4', 15, 0, 1, 0, 0, NULL, NULL),
(548, 'Saturday', 'Lecture 5', 15, 0, 0, 0, 0, NULL, NULL),
(549, 'Saturday', 'Lecture 6', 15, 0, 0, 1, 0, NULL, NULL),
(550, 'Monday', 'Lecture 1', 16, 0, 0, 0, 0, NULL, NULL),
(551, 'Monday', 'Lecture 2', 16, 1, 0, 1, 0, NULL, NULL),
(552, 'Monday', 'Lecture 3', 16, 0, 0, 0, 0, NULL, NULL),
(553, 'Monday', 'Lecture 4', 16, 0, 0, 0, 0, NULL, NULL),
(554, 'Monday', 'Lecture 5', 16, 0, 0, 1, 0, NULL, NULL),
(555, 'Monday', 'Lecture 6', 16, 0, 0, 0, 0, NULL, NULL),
(556, 'Tuesday', 'Lecture 1', 16, 0, 1, 0, 0, NULL, NULL),
(557, 'Tuesday', 'Lecture 2', 16, 1, 1, 0, 0, NULL, NULL),
(558, 'Tuesday', 'Lecture 3', 16, 1, 0, 1, 0, NULL, NULL),
(559, 'Tuesday', 'Lecture 4', 16, 0, 0, 0, 0, NULL, NULL),
(560, 'Tuesday', 'Lecture 5', 16, 1, 0, 1, 0, NULL, NULL),
(561, 'Tuesday', 'Lecture 6', 16, 0, 0, 1, 0, NULL, NULL),
(562, 'Wednesday', 'Lecture 1', 16, 0, 0, 0, 0, NULL, NULL),
(563, 'Wednesday', 'Lecture 2', 16, 1, 1, 0, 0, NULL, NULL),
(564, 'Wednesday', 'Lecture 3', 16, 1, 0, 1, 0, NULL, NULL),
(565, 'Wednesday', 'Lecture 4', 16, 0, 0, 1, 0, NULL, NULL),
(566, 'Wednesday', 'Lecture 5', 16, 0, 0, 0, 0, NULL, NULL),
(567, 'Wednesday', 'Lecture 6', 16, 0, 0, 0, 0, NULL, NULL),
(568, 'Thursday', 'Lecture 1', 16, 0, 0, 0, 0, NULL, NULL),
(569, 'Thursday', 'Lecture 2', 16, 0, 0, 1, 0, NULL, NULL),
(570, 'Thursday', 'Lecture 3', 16, 0, 0, 0, 0, NULL, NULL),
(571, 'Thursday', 'Lecture 4', 16, 1, 1, 0, 0, NULL, NULL),
(572, 'Thursday', 'Lecture 5', 16, 0, 1, 0, 0, NULL, NULL),
(573, 'Thursday', 'Lecture 6', 16, 0, 0, 0, 0, NULL, NULL),
(574, 'Friday', 'Lecture 1', 16, 0, 0, 0, 0, NULL, NULL),
(575, 'Friday', 'Lecture 2', 16, 1, 0, 1, 0, NULL, NULL),
(576, 'Friday', 'Lecture 3', 16, 0, 0, 0, 0, NULL, NULL),
(577, 'Friday', 'Lecture 4', 16, 0, 0, 0, 0, NULL, NULL),
(578, 'Friday', 'Lecture 5', 16, 1, 1, 0, 0, NULL, NULL),
(579, 'Friday', 'Lecture 6', 16, 1, 0, 1, 0, NULL, NULL),
(580, 'Saturday', 'Lecture 1', 16, 0, 0, 0, 0, NULL, NULL),
(581, 'Saturday', 'Lecture 2', 16, 0, 0, 0, 0, NULL, NULL),
(582, 'Saturday', 'Lecture 3', 16, 0, 0, 0, 0, NULL, NULL),
(583, 'Saturday', 'Lecture 4', 16, 0, 0, 0, 0, NULL, NULL),
(584, 'Saturday', 'Lecture 5', 16, 0, 0, 0, 0, NULL, NULL),
(585, 'Saturday', 'Lecture 6', 16, 0, 0, 1, 0, NULL, NULL),
(586, 'Monday', 'Lecture 1', 17, 0, 0, 0, 0, NULL, NULL),
(587, 'Monday', 'Lecture 2', 17, 1, 0, 1, 0, NULL, NULL),
(588, 'Monday', 'Lecture 3', 17, 0, 0, 0, 0, NULL, NULL),
(589, 'Monday', 'Lecture 4', 17, 0, 1, 0, 0, NULL, NULL),
(590, 'Monday', 'Lecture 5', 17, 0, 0, 1, 0, NULL, NULL),
(591, 'Monday', 'Lecture 6', 17, 0, 0, 0, 0, NULL, NULL),
(592, 'Tuesday', 'Lecture 1', 17, 0, 0, 0, 0, NULL, NULL),
(593, 'Tuesday', 'Lecture 2', 17, 1, 0, 0, 0, NULL, NULL),
(594, 'Tuesday', 'Lecture 3', 17, 0, 0, 1, 0, NULL, NULL),
(595, 'Tuesday', 'Lecture 4', 17, 0, 0, 0, 0, NULL, NULL),
(596, 'Tuesday', 'Lecture 5', 17, 0, 0, 1, 0, NULL, NULL),
(597, 'Tuesday', 'Lecture 6', 17, 0, 0, 1, 0, NULL, NULL),
(598, 'Wednesday', 'Lecture 1', 17, 0, 0, 0, 0, NULL, NULL),
(599, 'Wednesday', 'Lecture 2', 17, 1, 0, 0, 0, NULL, NULL),
(600, 'Wednesday', 'Lecture 3', 17, 0, 0, 1, 0, NULL, NULL),
(601, 'Wednesday', 'Lecture 4', 17, 0, 0, 1, 0, NULL, NULL),
(602, 'Wednesday', 'Lecture 5', 17, 1, 0, 0, 0, NULL, NULL),
(603, 'Wednesday', 'Lecture 6', 17, 1, 0, 0, 0, NULL, NULL),
(604, 'Thursday', 'Lecture 1', 17, 0, 0, 0, 0, NULL, NULL),
(605, 'Thursday', 'Lecture 2', 17, 0, 1, 1, 0, NULL, NULL),
(606, 'Thursday', 'Lecture 3', 17, 1, 0, 0, 0, NULL, NULL),
(607, 'Thursday', 'Lecture 4', 17, 0, 1, 0, 0, NULL, NULL),
(608, 'Thursday', 'Lecture 5', 17, 1, 0, 0, 0, NULL, NULL),
(609, 'Thursday', 'Lecture 6', 17, 0, 0, 0, 0, NULL, NULL),
(610, 'Friday', 'Lecture 1', 17, 0, 0, 0, 0, NULL, NULL),
(611, 'Friday', 'Lecture 2', 17, 1, 0, 1, 0, NULL, NULL),
(612, 'Friday', 'Lecture 3', 17, 0, 1, 0, 0, NULL, NULL),
(613, 'Friday', 'Lecture 4', 17, 0, 0, 0, 0, NULL, NULL),
(614, 'Friday', 'Lecture 5', 17, 0, 0, 0, 0, NULL, NULL),
(615, 'Friday', 'Lecture 6', 17, 0, 0, 1, 0, NULL, NULL),
(616, 'Saturday', 'Lecture 1', 17, 0, 0, 0, 0, NULL, NULL),
(617, 'Saturday', 'Lecture 2', 17, 0, 0, 0, 0, NULL, NULL),
(618, 'Saturday', 'Lecture 3', 17, 0, 1, 0, 0, NULL, NULL),
(619, 'Saturday', 'Lecture 4', 17, 0, 1, 0, 0, NULL, NULL),
(620, 'Saturday', 'Lecture 5', 17, 1, 0, 0, 0, NULL, NULL),
(621, 'Saturday', 'Lecture 6', 17, 0, 0, 1, 0, NULL, NULL),
(622, 'Monday', 'Lecture 1', 18, 0, 0, 0, 0, NULL, NULL),
(623, 'Monday', 'Lecture 2', 18, 1, 0, 0, 0, NULL, NULL),
(624, 'Monday', 'Lecture 3', 18, 0, 0, 1, 0, NULL, NULL),
(625, 'Monday', 'Lecture 4', 18, 1, 0, 0, 0, NULL, NULL),
(626, 'Monday', 'Lecture 5', 18, 0, 0, 0, 0, NULL, NULL),
(627, 'Monday', 'Lecture 6', 18, 0, 0, 0, 0, NULL, NULL),
(628, 'Tuesday', 'Lecture 1', 18, 0, 1, 0, 0, NULL, NULL),
(629, 'Tuesday', 'Lecture 2', 18, 1, 1, 0, 0, NULL, NULL),
(630, 'Tuesday', 'Lecture 3', 18, 0, 0, 1, 0, NULL, NULL),
(631, 'Tuesday', 'Lecture 4', 18, 1, 0, 0, 0, NULL, NULL),
(632, 'Tuesday', 'Lecture 5', 18, 1, 0, 0, 0, NULL, NULL),
(633, 'Tuesday', 'Lecture 6', 18, 0, 0, 0, 0, NULL, NULL),
(634, 'Wednesday', 'Lecture 1', 18, 1, 0, 0, 0, NULL, NULL),
(635, 'Wednesday', 'Lecture 2', 18, 1, 1, 0, 0, NULL, NULL),
(636, 'Wednesday', 'Lecture 3', 18, 1, 0, 1, 0, NULL, NULL),
(637, 'Wednesday', 'Lecture 4', 18, 0, 0, 1, 0, NULL, NULL),
(638, 'Wednesday', 'Lecture 5', 18, 0, 0, 0, 0, NULL, NULL),
(639, 'Wednesday', 'Lecture 6', 18, 0, 0, 0, 0, NULL, NULL),
(640, 'Thursday', 'Lecture 1', 18, 0, 0, 0, 0, NULL, NULL),
(641, 'Thursday', 'Lecture 2', 18, 0, 0, 1, 0, NULL, NULL),
(642, 'Thursday', 'Lecture 3', 18, 0, 0, 0, 0, NULL, NULL),
(643, 'Thursday', 'Lecture 4', 18, 1, 1, 0, 0, NULL, NULL),
(644, 'Thursday', 'Lecture 5', 18, 0, 1, 0, 0, NULL, NULL),
(645, 'Thursday', 'Lecture 6', 18, 0, 0, 0, 0, NULL, NULL),
(646, 'Friday', 'Lecture 1', 18, 0, 0, 0, 0, NULL, NULL),
(647, 'Friday', 'Lecture 2', 18, 1, 0, 1, 0, NULL, NULL),
(648, 'Friday', 'Lecture 3', 18, 1, 0, 0, 0, NULL, NULL),
(649, 'Friday', 'Lecture 4', 18, 0, 0, 0, 0, NULL, NULL),
(650, 'Friday', 'Lecture 5', 18, 1, 1, 0, 0, NULL, NULL),
(651, 'Friday', 'Lecture 6', 18, 1, 0, 1, 0, NULL, NULL),
(652, 'Saturday', 'Lecture 1', 18, 0, 0, 0, 0, NULL, NULL),
(653, 'Saturday', 'Lecture 2', 18, 0, 0, 0, 0, NULL, NULL),
(654, 'Saturday', 'Lecture 3', 18, 0, 0, 0, 0, NULL, NULL),
(655, 'Saturday', 'Lecture 4', 18, 0, 0, 0, 0, NULL, NULL),
(656, 'Saturday', 'Lecture 5', 18, 1, 0, 0, 0, NULL, NULL),
(657, 'Saturday', 'Lecture 6', 18, 0, 0, 1, 0, NULL, NULL),
(658, 'Monday', 'Lecture 1', 19, 0, 0, 0, 0, NULL, NULL),
(659, 'Monday', 'Lecture 2', 19, 1, 0, 0, 0, NULL, NULL),
(660, 'Monday', 'Lecture 3', 19, 0, 1, 1, 0, NULL, NULL),
(661, 'Monday', 'Lecture 4', 19, 0, 1, 0, 0, NULL, NULL),
(662, 'Monday', 'Lecture 5', 19, 0, 0, 0, 0, NULL, NULL),
(663, 'Monday', 'Lecture 6', 19, 0, 0, 0, 0, NULL, NULL),
(664, 'Tuesday', 'Lecture 1', 19, 0, 0, 0, 0, NULL, NULL),
(665, 'Tuesday', 'Lecture 2', 19, 1, 0, 0, 0, NULL, NULL),
(666, 'Tuesday', 'Lecture 3', 19, 0, 0, 1, 0, NULL, NULL),
(667, 'Tuesday', 'Lecture 4', 19, 0, 0, 0, 0, NULL, NULL),
(668, 'Tuesday', 'Lecture 5', 19, 0, 1, 0, 0, NULL, NULL),
(669, 'Tuesday', 'Lecture 6', 19, 0, 0, 0, 0, NULL, NULL),
(670, 'Wednesday', 'Lecture 1', 19, 0, 0, 0, 0, NULL, NULL),
(671, 'Wednesday', 'Lecture 2', 19, 1, 0, 0, 0, NULL, NULL),
(672, 'Wednesday', 'Lecture 3', 19, 0, 1, 1, 0, NULL, NULL),
(673, 'Wednesday', 'Lecture 4', 19, 0, 0, 1, 0, NULL, NULL),
(674, 'Wednesday', 'Lecture 5', 19, 1, 0, 0, 0, NULL, NULL),
(675, 'Wednesday', 'Lecture 6', 19, 1, 0, 0, 0, NULL, NULL),
(676, 'Thursday', 'Lecture 1', 19, 0, 0, 0, 0, NULL, NULL),
(677, 'Thursday', 'Lecture 2', 19, 0, 0, 1, 0, NULL, NULL),
(678, 'Thursday', 'Lecture 3', 19, 1, 1, 0, 0, NULL, NULL),
(679, 'Thursday', 'Lecture 4', 19, 0, 0, 0, 0, NULL, NULL),
(680, 'Thursday', 'Lecture 5', 19, 1, 1, 0, 0, NULL, NULL),
(681, 'Thursday', 'Lecture 6', 19, 0, 0, 0, 0, NULL, NULL),
(682, 'Friday', 'Lecture 1', 19, 0, 0, 0, 0, NULL, NULL),
(683, 'Friday', 'Lecture 2', 19, 0, 0, 1, 0, NULL, NULL),
(684, 'Friday', 'Lecture 3', 19, 0, 0, 0, 0, NULL, NULL),
(685, 'Friday', 'Lecture 4', 19, 0, 0, 0, 0, NULL, NULL),
(686, 'Friday', 'Lecture 5', 19, 0, 0, 0, 0, NULL, NULL),
(687, 'Friday', 'Lecture 6', 19, 0, 0, 1, 0, NULL, NULL),
(688, 'Saturday', 'Lecture 1', 19, 0, 0, 0, 0, NULL, NULL),
(689, 'Saturday', 'Lecture 2', 19, 0, 0, 0, 0, NULL, NULL),
(690, 'Saturday', 'Lecture 3', 19, 0, 0, 0, 0, NULL, NULL),
(691, 'Saturday', 'Lecture 4', 19, 0, 0, 0, 0, NULL, NULL),
(692, 'Saturday', 'Lecture 5', 19, 0, 0, 0, 0, NULL, NULL),
(693, 'Saturday', 'Lecture 6', 19, 0, 0, 1, 0, NULL, NULL),
(694, 'Monday', 'Lecture 1', 20, 0, 0, 0, 0, NULL, NULL),
(695, 'Monday', 'Lecture 2', 20, 0, 0, 1, 0, NULL, NULL),
(696, 'Monday', 'Lecture 3', 20, 0, 1, 0, 0, NULL, NULL),
(697, 'Monday', 'Lecture 4', 20, 0, 1, 0, 0, NULL, NULL),
(698, 'Monday', 'Lecture 5', 20, 1, 0, 1, 0, NULL, NULL),
(699, 'Monday', 'Lecture 6', 20, 1, 0, 0, 0, NULL, NULL),
(700, 'Tuesday', 'Lecture 1', 20, 0, 0, 0, 0, NULL, NULL),
(701, 'Tuesday', 'Lecture 2', 20, 1, 0, 0, 0, NULL, NULL),
(702, 'Tuesday', 'Lecture 3', 20, 0, 0, 1, 0, NULL, NULL),
(703, 'Tuesday', 'Lecture 4', 20, 0, 0, 0, 0, NULL, NULL),
(704, 'Tuesday', 'Lecture 5', 20, 1, 1, 1, 0, NULL, NULL),
(705, 'Tuesday', 'Lecture 6', 20, 1, 0, 1, 0, NULL, NULL),
(706, 'Wednesday', 'Lecture 1', 20, 0, 0, 0, 0, NULL, NULL),
(707, 'Wednesday', 'Lecture 2', 20, 1, 0, 0, 0, NULL, NULL),
(708, 'Wednesday', 'Lecture 3', 20, 1, 1, 1, 0, NULL, NULL),
(709, 'Wednesday', 'Lecture 4', 20, 0, 0, 1, 0, NULL, NULL),
(710, 'Wednesday', 'Lecture 5', 20, 0, 0, 0, 0, NULL, NULL),
(711, 'Wednesday', 'Lecture 6', 20, 0, 0, 0, 0, NULL, NULL),
(712, 'Thursday', 'Lecture 1', 20, 1, 0, 0, 0, NULL, NULL),
(713, 'Thursday', 'Lecture 2', 20, 0, 0, 1, 0, NULL, NULL),
(714, 'Thursday', 'Lecture 3', 20, 0, 1, 0, 0, NULL, NULL),
(715, 'Thursday', 'Lecture 4', 20, 0, 0, 0, 0, NULL, NULL),
(716, 'Thursday', 'Lecture 5', 20, 1, 1, 0, 0, NULL, NULL),
(717, 'Thursday', 'Lecture 6', 20, 0, 0, 0, 0, NULL, NULL),
(718, 'Friday', 'Lecture 1', 20, 0, 0, 0, 0, NULL, NULL),
(719, 'Friday', 'Lecture 2', 20, 0, 0, 1, 0, NULL, NULL),
(720, 'Friday', 'Lecture 3', 20, 0, 0, 0, 0, NULL, NULL),
(721, 'Friday', 'Lecture 4', 20, 1, 0, 0, 0, NULL, NULL),
(722, 'Friday', 'Lecture 5', 20, 1, 0, 0, 0, NULL, NULL),
(723, 'Friday', 'Lecture 6', 20, 0, 0, 1, 0, NULL, NULL),
(724, 'Saturday', 'Lecture 1', 20, 0, 0, 0, 0, NULL, NULL),
(725, 'Saturday', 'Lecture 2', 20, 0, 0, 0, 0, NULL, NULL),
(726, 'Saturday', 'Lecture 3', 20, 0, 0, 0, 0, NULL, NULL),
(727, 'Saturday', 'Lecture 4', 20, 1, 0, 0, 0, NULL, NULL),
(728, 'Saturday', 'Lecture 5', 20, 1, 0, 0, 0, NULL, NULL),
(729, 'Saturday', 'Lecture 6', 20, 1, 0, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `query_notifications`
--

CREATE TABLE `query_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_student_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_student_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q_from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q_for` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_reply` int(10) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `q_id` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `query_notifications`
--

INSERT INTO `query_notifications` (`id`, `f_student_id`, `t_student_id`, `group_id`, `supervisor_id`, `q_from`, `q_for`, `notif`, `is_reply`, `created_at`, `updated_at`, `q_id`) VALUES
(888, '181400011', '181400001', '2', '101', '0', '0', '0', 0, '2021-04-05 10:17:31', '2021-04-05 10:17:31', 287),
(889, '181400011', '181400056', '2', '101', '0', '0', '0', 0, '2021-04-05 10:17:31', '2021-04-05 10:17:31', 287),
(891, '0', '181400001', '2', '101', '1', '0', '0', 1, '2021-04-05 10:20:20', '2021-04-05 10:20:20', 288),
(893, '0', '181400056', '2', '101', '1', '0', '0', 1, '2021-04-05 10:20:20', '2021-04-05 10:20:20', 288);

-- --------------------------------------------------------

--
-- Table structure for table `scheduled_presentations`
--

CREATE TABLE `scheduled_presentations` (
  `id` int(100) NOT NULL,
  `date` varchar(200) DEFAULT NULL,
  `time` varchar(200) DEFAULT NULL,
  `mon` varchar(200) DEFAULT NULL,
  `tues` varchar(200) DEFAULT NULL,
  `wed` varchar(200) DEFAULT NULL,
  `thurs` varchar(200) DEFAULT NULL,
  `fri` varchar(200) DEFAULT NULL,
  `sat` varchar(200) DEFAULT NULL,
  `presentation_name` varchar(200) NOT NULL,
  `updated_at` varchar(200) DEFAULT current_timestamp(),
  `created_at` varchar(200) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scheduled_presentations`
--

INSERT INTO `scheduled_presentations` (`id`, `date`, `time`, `mon`, `tues`, `wed`, `thurs`, `fri`, `sat`, `presentation_name`, `updated_at`, `created_at`) VALUES
(1, '18 February, 2021', '11:00 - 12:30', '-', '-', '-', '15', '-', '-', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06'),
(2, '11 December, 2020', '12:30 - 14:00', '-', '-', '-', '-', '2', '-', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06'),
(3, '15 April, 2021', '15:45 - 17:15', '-', '-', '-', '16', '-', '-', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06'),
(4, '28 January, 2021', '08:00 - 09:30', '-', '-', '-', '11', '-', '-', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06'),
(5, '11 December, 2020', '11:00 - 12:30', '-', '-', '-', '-', '14', '-', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06'),
(6, '05 March, 2021', '08:00 - 09:30', '-', '-', '-', '-', '6', '-', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06'),
(7, '17 April, 2021', '08:00 - 09:30', '-', '-', '-', '-', '-', '5', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06'),
(8, '20 January, 2021', '08:00 - 09:30', '-', '-', '13', '-', '-', '-', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06'),
(9, '13 March, 2021', '11:00 - 12:30', '-', '-', '-', '-', '-', '19', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06'),
(10, '16 December, 2020', '9:30 - 11:00', '-', '-', '7', '-', '-', '-', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06'),
(11, '31 December, 2020', '11:00 - 12:30', '-', '-', '-', '1', '-', '-', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06'),
(12, '11 January, 2021', '14:15 - 15:45', '18', '-', '-', '-', '-', '-', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06'),
(13, '10 December, 2020', '15:45 - 17:15', '-', '-', '-', '20', '-', '-', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06'),
(14, '21 December, 2020', '14:15 - 15:45', '3', '-', '-', '-', '-', '-', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06'),
(15, '06 March, 2021', '14:15 - 15:45', '-', '-', '-', '-', '-', '12', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06'),
(16, '15 January, 2021', '08:00 - 09:30', '-', '-', '-', '-', '17', '-', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06'),
(17, '26 December, 2020', '08:00 - 09:30', '-', '-', '-', '-', '-', '10', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06'),
(18, '05 January, 2021', '14:15 - 15:45', '-', '4', '-', '-', '-', '-', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06'),
(19, '28 December, 2020', '15:45 - 17:15', '8', '-', '-', '-', '-', '-', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06'),
(20, '12 March, 2021', '14:15 - 15:45', '-', '-', '-', '-', '9', '-', 'Proposal Defense Presentation', '2021-04-05 14:09:06', '2021-04-05 14:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cgpa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `st` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_a_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_manager` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `student_email`, `student_id`, `cgpa`, `pass`, `st`, `in_a_group`, `is_manager`, `group_id`, `created_at`, `updated_at`) VALUES
(60, 'Fahad', '181400045@gift.edu.pk', '181400045', '3.52', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '0', '1', '2021-03-10 19:02:27', '2021-04-04 18:39:50'),
(61, 'Abrar', '181400043@gift.edu.pk', '181400043', '3.3', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '1', '2021-03-10 19:21:40', '2021-03-15 09:58:01'),
(62, 'Abu Bakar Farooq', '181400048@gift.edu.pk', '181400048', '3.7', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '1', '1', '2021-03-10 19:22:30', '2021-03-21 20:07:42'),
(63, 'Zaheer', '181400153@gift.edu.pk', '181400153', '3.0', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '0', '1', '2021-03-10 19:23:49', '2021-03-21 20:07:42'),
(64, 'Ali', '181400001@gift.edu.pk', '181400001', '2.7', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '2', '2021-03-10 19:26:09', '2021-03-15 09:58:01'),
(65, 'Usman', '181400011@gift.edu.pk', '181400011', '2.6', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '0', '2', '2021-03-10 19:27:37', '2021-04-05 10:14:55'),
(66, 'Noor', '181400056@gift.edu.pk', '181400056', '3.1', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '1', '2', '2021-03-10 19:29:35', '2021-03-15 09:58:01'),
(67, 'Numaira', '181400020@gift.edu.pk', '181400020', '3.7', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '1', '3', '2021-03-10 19:30:20', '2021-03-15 09:58:01'),
(68, 'Uzma', '181400026@gift.edu.pk', '181400026', '3.8', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '4', '2021-03-10 19:30:49', '2021-03-15 09:58:01'),
(69, 'Daniyal', '181400022@gift.edu.pk', '181400022', '3.9', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '1', '4', '2021-03-10 19:32:20', '2021-03-15 09:58:01'),
(70, 'Momina', '181400066@gift.edu.pk', '181400066', '2.9', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '4', '2021-03-10 19:34:34', '2021-03-15 09:58:01'),
(71, 'Maira', '181400041@gift.edu.pk', '181400041', '2.8', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '4', '2021-03-10 19:35:14', '2021-03-15 09:58:01'),
(72, 'Hamza', '181400021@gift.edu.pk', '181400021', '2.5', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '3', '2021-03-10 19:36:56', '2021-03-15 09:58:01'),
(73, 'Mahmood', '181400002@gift.edu.pk', '181400002', '3.1', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '3', '2021-03-10 19:37:58', '2021-03-15 09:58:01'),
(74, 'Abdullah', '181400072@gift.edu.pk', '181400072', '3.0', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '5', '2021-03-10 19:40:35', '2021-03-15 09:58:01'),
(75, 'Daood', '181400111@gift.edu.pk', '181400111', '2.6', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '5', '2021-03-10 19:41:12', '2021-03-15 09:58:01'),
(76, 'Atif', '181400112@gift.edu.pk', '181400112', '3.8', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '1', '5', '2021-03-10 19:42:53', '2021-03-15 09:58:01'),
(77, 'Qaisar', '181400128@gift.edu.pk', '181400128', '2.9', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '6', '2021-03-10 19:44:25', '2021-03-15 09:58:01'),
(78, 'Nawaz', '181400033@gift.edu.pk', '1814000033', '3.6', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '0', '6', '2021-03-10 19:44:53', '2021-03-15 09:58:01'),
(79, 'Waseem', '181400121@gift.edu.pk', '181400121', '3.7', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '1', '6', '2021-03-10 19:45:28', '2021-03-15 09:58:01'),
(80, 'Hira', '181400123@gift.edu.pk', '181400123', '3.0', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '7', '2021-03-12 18:30:04', '2021-03-15 09:58:01'),
(81, 'Mira', '181400003@gift.edu.pk', '181400003', '2.9', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '7', '2021-03-12 18:30:40', '2021-03-15 09:58:01'),
(82, 'Asad', '181400055@gift.edu.pk', '181400055', '3.3', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '1', '7', '2021-03-12 18:31:22', '2021-03-15 09:58:01'),
(83, 'Imran khan', '181300045@gift.edu.pk', '181300045', '3.2', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '8', '2021-03-21 20:46:57', '2021-03-21 21:18:14'),
(84, 'Abaid ashraf', '18130001@gift.edu.pk', '18130001', '3.6', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '1', '8', '2021-03-21 20:47:46', '2021-03-21 21:44:05'),
(85, 'amna bashir', '18140003@gift.edu.pk', '18140003', '3.0', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '8', '2021-03-21 20:48:35', '2021-03-21 21:18:45'),
(86, 'ajwa sohail', '18130004@gift.edu.pk', '18130004', '2.7', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '9', '2021-03-21 20:52:27', '2021-03-21 21:18:49'),
(87, 'maryam shafiq', '18130005@gift.edu.pk', '18130005', '3.4', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '9', '2021-03-21 20:53:04', '2021-03-21 21:18:54'),
(88, 'Abdul hadi', '18130009@gift.edu.pk', '18130007', '3.7', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '1', '9', '2021-03-21 20:53:42', '2021-03-21 21:37:07'),
(89, 'ayan', '181300011@gift.edu.pk', '181300011', '3.4', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '10', '2021-03-21 20:55:49', '2021-03-21 21:19:02'),
(90, 'Faizan', '181300012@gift.edu.pk', '181300012', '3.0', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '10', '2021-03-21 20:56:13', '2021-03-21 21:19:05'),
(91, 'Huzaifa Dar', '181300013@gift.edu.pk', '181300013', '3.5', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '1', '10', '2021-03-21 20:56:49', '2021-03-21 21:36:14'),
(92, 'Adeel malik', '181300014@gift.edu.pk', '181300014', '2.9', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '11', '2021-03-21 20:57:15', '2021-03-21 21:19:12'),
(93, 'Arslan imtiaz', '181300015@gift.edu.pk', '181300015', '2.6', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '11', '2021-03-21 20:57:54', '2021-03-21 21:19:15'),
(94, 'Asim ejaz', '181300016@gift.edu.pk', '181300016', '3.0', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '1', '11', '2021-03-21 20:58:36', '2021-03-21 21:34:33'),
(95, 'Zain ali', '181300017@gift.edu.pk', '181300017', '3.8', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '1', '12', '2021-03-21 21:00:28', '2021-03-21 21:35:24'),
(96, 'Nabeel ahmed', '181300018@gift.edu.pk', '181300018', '3.1', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '12', '2021-03-21 21:01:04', '2021-03-21 21:19:29'),
(97, 'Talib asgar', '181300046@gift.edu.pk', '181300046', '2.8', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '12', '2021-03-21 21:01:37', '2021-03-21 21:19:33'),
(98, 'Isha', '17140001@gift.edu.pk', '17140001', '3.6', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '13', '2021-03-21 21:03:20', '2021-03-21 21:19:40'),
(99, 'Abeer ali', '17140002@gift.edu.pk', '17140002', '3.7', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '1', '13', '2021-03-21 21:03:51', '2021-03-21 21:33:36'),
(100, 'hania khan', '17140003@gift.edu.pk', '17140003', '3.0', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '13', '2021-03-21 21:04:20', '2021-03-21 21:19:49'),
(101, 'kamran ali', '17140004@gift.edu.pk', '17140004', '3.1', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '1', '14', '2021-03-21 21:04:42', '2021-03-21 21:32:10'),
(102, 'kazim imran', '17140005@gift.edu.pk', '17140005', '2.7', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '14', '2021-03-21 21:05:09', '2021-03-21 21:20:04'),
(103, 'shahbaz ahsan', '17140006@gift.edu.pk', '17140006', '2.9', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '14', '2021-03-21 21:05:44', '2021-03-21 21:20:08'),
(104, 'faris ishfaq', '17140007@gift.edu.pk', '17140007', '3.5', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '1', '15', '2021-03-21 21:06:12', '2021-03-21 21:24:00'),
(105, 'shameem', '17140008@gift.edu.pk', '17140008', '3.0', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '15', '2021-03-21 21:06:53', '2021-03-21 21:20:17'),
(106, 'shaukat arfan', '17140009@gift.edu.pk', '17140009', '3.4', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '15', '2021-03-21 21:07:23', '2021-03-21 21:20:20'),
(107, 'daood aslam', '17140010@gift.edu.pk', '17140010', '2.8', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '16', '2021-03-21 21:08:35', '2021-03-21 21:20:25'),
(108, 'hameed ali', '17140011@gift.edu.pk', '17140011', '3.2', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '17', '2021-03-21 21:09:02', '2021-03-21 21:20:32'),
(109, 'tanveer rahseed', '171400012@gift.edu.pk', '171400012', '3.5', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '16', '2021-03-21 21:09:27', '2021-03-21 21:20:37'),
(110, 'Maaz ali', '171400014@gift.edu.pk', '171400014', '3.1', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '18', '2021-03-21 21:09:54', '2021-03-21 21:20:41'),
(111, 'Moeez hamid', '17140015@gift.edu.pk', '17140015', '3.4', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '18', '2021-03-21 21:10:15', '2021-03-21 21:20:44'),
(112, 'Iqra firdous', '17140016@gift.edu.pk', '17140016', '2.9', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '17', '2021-03-21 21:10:51', '2021-03-21 21:20:48'),
(113, 'sadaf akhter', '171400017@gift.edu.pk', '171400017', '3.8', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '1', '16', '2021-03-21 21:11:27', '2021-03-21 21:25:39'),
(114, 'saman waqas', '171400019@gift.edu.pk', '171400019', '3.4', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '1', '18', '2021-03-21 21:11:53', '2021-03-21 21:26:45'),
(115, 'aisha asif', '171400018@gift.edu.pk', '171400018', '3.9', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '1', '17', '2021-03-21 21:12:24', '2021-03-21 21:27:50'),
(116, 'amna shahbaz', '171400020@gift.edu.pk', '171400020', '3.8', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '1', '19', '2021-03-21 21:13:37', '2021-03-21 21:30:19'),
(117, 'humna bajwa', '171400021@gift.edu.pk', '171400021', '2.9', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '1', '20', '2021-03-21 21:14:16', '2021-03-29 06:41:44'),
(118, 'Shaheen', '171400022@gift.edu.pk', '171400022', '2.5', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '19', '2021-03-21 21:14:44', '2021-03-21 21:21:14'),
(119, 'zunaira atif', '171400023@gift.edu.pk', '171400023', '3.3', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '19', '2021-03-21 21:15:17', '2021-03-21 21:21:17'),
(120, 'zayn malik', '171400025@gift.edu.pk', '171400025', '3.1', 'b6014a5eefaf1602ece0afda25ef45a8', '1', '1', '0', '20', '2021-03-21 21:15:58', '2021-03-29 06:41:44'),
(121, 'zohaib khan', '171400026@gift.edu.pk', '171400026', '2.7', 'b6014a5eefaf1602ece0afda25ef45a8', '0', '1', '0', '20', '2021-03-21 21:16:27', '2021-03-21 21:21:25'),
(124, 'Ahmad Umar', '16138090@gift.edu.pk', '16138090', '3.45', '79175d520cfe08361c23ea0881b275e5', '0', '0', '0', '', '2021-04-04 18:18:33', '2021-04-05 17:28:31'),
(125, 'Farhad Ali Naseem', '16138095@gift.edu.pk', '16138095', '3.2', '5fb88bbb48a060c3497e9703f76c040a', '0', '0', '0', '', '2021-04-04 18:19:03', '2021-04-05 17:28:15'),
(127, 'Danyal Asif', '16138010@gift.edu.pk', '16138010', '3.8', 'e3739e53ea4d871ae0c929c397423bf3', '0', '0', '0', '0', '2021-04-05 17:26:51', '2021-04-05 17:26:51'),
(128, 'Ameer Hamza', '16138047@gift.edu.pk', '16138047', '3.7', '293470c8b5acd47311c08032ac5f0744', '0', '0', '0', '0', '2021-04-05 17:30:15', '2021-04-05 17:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--

CREATE TABLE `student_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student5` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_groups`
--

INSERT INTO `student_groups` (`id`, `student1`, `student2`, `student3`, `student4`, `student5`, `group_id`, `created_at`, `updated_at`) VALUES
(43, '181400045', '181400043', '181400048', '181400153', '0', '1', '2021-03-10 19:38:13', '2021-03-10 19:38:13'),
(44, '181400001', '181400011', '181400056', '0', '0', '2', '2021-03-10 19:38:28', '2021-03-10 19:38:28'),
(45, '181400020', '181400021', '181400002', '0', '0', '3', '2021-03-10 19:38:37', '2021-03-10 19:38:37'),
(46, '181400026', '181400022', '181400066', '181400041', '0', '4', '2021-03-10 19:38:48', '2021-03-10 19:38:48'),
(47, '181400072', '181400111', '181400112', '0', '0', '5', '2021-03-10 19:43:09', '2021-03-10 19:43:09'),
(48, '181400128', '1814000033', '181400121', '0', '0', '6', '2021-03-10 19:45:40', '2021-03-10 19:45:40'),
(49, '181400123', '181400003', '181400055', '0', '0', '7', '2021-03-12 18:31:41', '2021-03-12 18:31:41'),
(50, '181300045', '18130001', '18140003', '0', '0', '8', '2021-03-21 20:51:22', '2021-03-21 20:51:22'),
(51, '18130004', '18130005', '18130007', '0', '0', '9', '2021-03-21 20:53:53', '2021-03-21 20:53:53'),
(52, '181300011', '181300012', '181300013', '0', '0', '10', '2021-03-21 20:58:05', '2021-03-21 20:58:05'),
(53, '181300014', '181300015', '181300016', '0', '0', '11', '2021-03-21 20:58:58', '2021-03-21 20:58:58'),
(54, '181300017', '181300018', '181300046', '0', '0', '12', '2021-03-21 21:01:53', '2021-03-21 21:01:53'),
(55, '17140001', '17140002', '17140003', '0', '0', '13', '2021-03-21 21:07:37', '2021-03-21 21:07:37'),
(56, '17140004', '17140005', '17140006', '0', '0', '14', '2021-03-21 21:07:46', '2021-03-21 21:07:46'),
(57, '17140007', '17140008', '17140009', '0', '0', '15', '2021-03-21 21:07:53', '2021-03-21 21:07:53'),
(58, '17140010', '171400012', '171400017', '0', '0', '16', '2021-03-21 21:12:38', '2021-03-21 21:12:38'),
(59, '17140011', '17140016', '171400018', '0', '0', '17', '2021-03-21 21:12:46', '2021-03-21 21:12:46'),
(60, '171400014', '17140015', '171400019', '0', '0', '18', '2021-03-21 21:12:53', '2021-03-21 21:12:53'),
(61, '171400020', '171400022', '171400023', '0', '0', '19', '2021-03-21 21:15:30', '2021-03-21 21:15:30'),
(62, '171400021', '171400025', '171400026', '0', '0', '20', '2021-03-21 21:16:40', '2021-03-21 21:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `student_ideas`
--

CREATE TABLE `student_ideas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_notif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_ideas`
--

INSERT INTO `student_ideas` (`id`, `title`, `desc`, `supervisor_id`, `student_id`, `group_id`, `action`, `student_notif`, `from`, `created_at`, `updated_at`) VALUES
(43, 'Capstone management system', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '106', '181400048', '1', '3', '0', '-1', '2021-03-21 20:10:19', '2021-03-22 08:00:09'),
(44, 'Ticketing System', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '101', '181400056', '2', '3', '0', '-1', '2021-03-21 20:11:39', '2021-04-05 10:23:59'),
(45, 'Online Auction system', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '102', '181400020', '3', '3', '1', '-1', '2021-03-21 20:13:10', '2021-03-21 20:24:42'),
(46, 'Fertilization system', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '101', '181400022', '4', '3', '1', '-1', '2021-03-21 20:15:20', '2021-03-21 20:21:39'),
(47, 'Online Law system', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '102', '181400112', '5', '3', '1', '-1', '2021-03-21 20:17:15', '2021-03-21 20:24:36'),
(48, 'E government project', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '103', '181400121', '6', '3', '1', '-1', '2021-03-21 20:19:26', '2021-03-21 20:26:54'),
(49, 'Robotic hand', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '103', '181400055', '7', '3', '1', '-1', '2021-03-21 20:20:33', '2021-03-21 20:26:35'),
(50, 'Gps Based Human Tracking', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '110', '17140007', '15', '3', '1', '38', '2021-03-21 21:24:57', '2021-03-21 21:39:35'),
(51, 'Restaurant Application', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '110', '171400017', '16', '3', '1', '37', '2021-03-21 21:25:55', '2021-03-21 21:39:30'),
(52, 'Android Vehicle Tracking Application', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '107', '171400019', '18', '3', '1', '36', '2021-03-21 21:26:59', '2021-03-21 21:38:59'),
(53, 'Traffic Signal Management & Control System', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '107', '171400018', '17', '3', '1', '35', '2021-03-21 21:28:06', '2021-03-21 21:38:52'),
(54, 'Tourism system', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '106', '171400020', '19', '3', '1', '25', '2021-03-21 21:30:31', '2021-03-21 21:37:52'),
(55, 'House Automation system', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '105', '171400025', '20', '3', '1', '26', '2021-03-21 21:31:21', '2021-03-21 21:38:24'),
(56, 'School inspection system', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '105', '17140004', '14', '3', '1', '27', '2021-03-21 21:32:24', '2021-03-21 21:38:19'),
(57, 'Human Face detection system', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '104', '17140002', '13', '3', '1', '28', '2021-03-21 21:33:51', '2021-03-21 21:42:55'),
(58, 'Number Plate detector', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '104', '181300016', '11', '3', '1', '29', '2021-03-21 21:34:57', '2021-03-21 21:42:50'),
(59, 'Door automation system', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '108', '181300017', '12', '3', '1', '30', '2021-03-21 21:35:41', '2021-03-21 21:40:31'),
(60, 'E-learning system', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '109', '181300013', '10', '3', '1', '34', '2021-03-21 21:36:29', '2021-03-21 21:40:02'),
(61, 'Student attendence system by QR scan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '108', '18130007', '9', '3', '1', '32', '2021-03-21 21:37:22', '2021-03-21 21:40:25'),
(62, 'Farming assistance', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '109', '18130001', '8', '3', '1', '33', '2021-03-21 21:44:44', '2021-03-21 21:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `student_supervisors`
--

CREATE TABLE `student_supervisors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_supervisors`
--

INSERT INTO `student_supervisors` (`id`, `supervisor_id`, `group_id`, `project_id`, `created_at`, `updated_at`) VALUES
(33, '101', '4', '46', '2021-03-21 20:21:39', '2021-03-21 20:21:39'),
(34, '101', '2', '44', '2021-03-21 20:21:46', '2021-03-21 20:21:46'),
(35, '106', '1', '43', '2021-03-21 20:23:26', '2021-03-21 20:23:26'),
(36, '102', '5', '47', '2021-03-21 20:24:36', '2021-03-21 20:24:36'),
(37, '102', '3', '45', '2021-03-21 20:24:42', '2021-03-21 20:24:42'),
(38, '103', '7', '49', '2021-03-21 20:26:35', '2021-03-21 20:26:35'),
(39, '103', '6', '48', '2021-03-21 20:26:54', '2021-03-21 20:26:54'),
(40, '106', '19', '54', '2021-03-21 21:37:52', '2021-03-21 21:37:52'),
(41, '105', '14', '56', '2021-03-21 21:38:19', '2021-03-21 21:38:19'),
(42, '105', '20', '55', '2021-03-21 21:38:24', '2021-03-21 21:38:24'),
(43, '107', '17', '53', '2021-03-21 21:38:53', '2021-03-21 21:38:53'),
(44, '107', '18', '52', '2021-03-21 21:39:00', '2021-03-21 21:39:00'),
(45, '110', '16', '51', '2021-03-21 21:39:30', '2021-03-21 21:39:30'),
(46, '110', '15', '50', '2021-03-21 21:39:35', '2021-03-21 21:39:35'),
(47, '109', '10', '60', '2021-03-21 21:40:02', '2021-03-21 21:40:02'),
(48, '108', '9', '61', '2021-03-21 21:40:25', '2021-03-21 21:40:25'),
(49, '108', '12', '59', '2021-03-21 21:40:31', '2021-03-21 21:40:31'),
(50, '104', '11', '58', '2021-03-21 21:42:50', '2021-03-21 21:42:50'),
(51, '104', '13', '57', '2021-03-21 21:42:55', '2021-03-21 21:42:55'),
(52, '109', '8', '62', '2021-03-21 21:45:16', '2021-03-21 21:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisor_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`id`, `supervisor_name`, `supervisor_email`, `supervisor_id`, `created_at`, `updated_at`) VALUES
(23, 'Ahmed Bashir', 'ahmedbashir@gift.edu.pk', '101', '2021-03-21 19:51:52', '2021-03-21 19:51:52'),
(24, 'Dr Fakhar Ul Islam Lodhi', 'drfakhar@gift.edu.pk', '102', '2021-03-21 19:53:58', '2021-03-21 19:53:58'),
(25, 'Dr M Faheem', 'drfaheem@gift.edu.pk', '103', '2021-03-21 19:54:29', '2021-03-21 19:54:29'),
(26, 'Dr M Ziad Nayyar', 'drziadnayyar@gift.edu.pk', '104', '2021-03-21 19:55:15', '2021-03-21 19:55:15'),
(27, 'Dr Qaisar Shehryar Durani', 'drqaisar@gift.edu.pk', '105', '2021-03-21 19:55:52', '2021-03-21 19:55:52'),
(28, 'Fiza Abdul Razzaq', 'fizaabdulrazzaq@gift.edu.pk', '106', '2021-03-21 19:56:36', '2021-03-21 19:56:36'),
(29, 'Kamal Ashraf Gill', 'kamalashraf@gift.edu.pk', '107', '2021-03-21 19:57:09', '2021-03-21 19:57:09'),
(30, 'M Aamir Saleem', 'aamirsaleem@gift.edu.pk', '108', '2021-03-21 19:58:02', '2021-03-21 19:58:02'),
(31, 'M Anzar Saleem', 'anzarsaleem@gift.edu.pk', '109', '2021-03-21 19:58:36', '2021-03-21 19:58:36'),
(32, 'M Shakeel', 'mshakeel@gift.edu.pk', '110', '2021-03-21 19:59:10', '2021-03-21 19:59:10'),
(36, 'Sir Arsalan Tariq', 'arslantariq.at@gift.edu.pk', '465413', '2021-04-04 18:43:04', '2021-04-04 18:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_ideas`
--

CREATE TABLE `supervisor_ideas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supervisor_ideas`
--

INSERT INTO `supervisor_ideas` (`id`, `title`, `desc`, `supervisor_id`, `created_at`, `updated_at`) VALUES
(25, 'Tourism system', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '106', '2021-03-21 20:23:57', '2021-03-21 20:23:57'),
(26, 'House Automation system', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '105', '2021-03-21 20:31:37', '2021-03-21 20:31:37'),
(27, 'School inspection system', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '105', '2021-03-21 20:32:16', '2021-03-21 20:32:16'),
(28, 'Human Face detection system', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '104', '2021-03-21 20:33:42', '2021-03-21 20:33:42'),
(29, 'Number Plate detector', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '104', '2021-03-21 20:34:22', '2021-03-21 20:34:22'),
(30, 'Door automation system', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '108', '2021-03-21 20:35:43', '2021-03-21 20:35:43'),
(31, 'Hotel reservation system', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '108', '2021-03-21 20:36:14', '2021-03-21 20:36:14'),
(32, 'Student attendence system by QR scan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '108', '2021-03-21 20:37:27', '2021-03-21 20:37:27'),
(33, 'Farming assistance', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '109', '2021-03-21 20:39:06', '2021-03-21 20:39:06'),
(34, 'E-learning system', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '109', '2021-03-21 20:39:36', '2021-03-21 20:39:36'),
(35, 'Traffic Signal Management & Control System', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '107', '2021-03-21 20:41:10', '2021-03-21 20:41:10'),
(36, 'Android Vehicle Tracking Application', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '107', '2021-03-21 20:42:20', '2021-03-21 20:42:20'),
(37, 'Restaurant Application', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '110', '2021-03-21 20:44:02', '2021-03-21 20:44:02'),
(38, 'Gps Based Human Tracking', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '110', '2021-03-21 20:44:37', '2021-03-21 20:44:37'),
(39, 'Capstone Management System', 'Bataon gi sabar rakho', '106', '2021-04-04 19:15:42', '2021-04-04 19:15:42'),
(40, 'Hotel Management System', 'A hotel management system is a set of hotel software solutions that keep operations flowing. ... Some of the integrations such as: Oaky for upselling, Duetto for revenue management and TrustYou for reputation management can really make a huge difference by improving the productivity and efficiency of your hotel.', '101', '2021-04-05 09:31:06', '2021-04-05 09:31:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_quries`
--
ALTER TABLE `all_quries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `capston_calendars`
--
ALTER TABLE `capston_calendars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_members`
--
ALTER TABLE `faculty_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fb_notifs`
--
ALTER TABLE `fb_notifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feed_backs`
--
ALTER TABLE `feed_backs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presentations`
--
ALTER TABLE `presentations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query_notifications`
--
ALTER TABLE `query_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scheduled_presentations`
--
ALTER TABLE `scheduled_presentations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_groups`
--
ALTER TABLE `student_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_ideas`
--
ALTER TABLE `student_ideas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_supervisors`
--
ALTER TABLE `student_supervisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor_ideas`
--
ALTER TABLE `supervisor_ideas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_quries`
--
ALTER TABLE `all_quries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `capston_calendars`
--
ALTER TABLE `capston_calendars`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `faculty_members`
--
ALTER TABLE `faculty_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `fb_notifs`
--
ALTER TABLE `fb_notifs`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `feed_backs`
--
ALTER TABLE `feed_backs`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `presentations`
--
ALTER TABLE `presentations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=730;

--
-- AUTO_INCREMENT for table `query_notifications`
--
ALTER TABLE `query_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=894;

--
-- AUTO_INCREMENT for table `scheduled_presentations`
--
ALTER TABLE `scheduled_presentations`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `student_groups`
--
ALTER TABLE `student_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `student_ideas`
--
ALTER TABLE `student_ideas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `student_supervisors`
--
ALTER TABLE `student_supervisors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `supervisor_ideas`
--
ALTER TABLE `supervisor_ideas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
