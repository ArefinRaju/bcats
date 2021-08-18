-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 05, 2021 at 10:31 PM
-- Server version: 10.3.27-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcats_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `payee_id` int(11) DEFAULT NULL,
  `emi_id` int(11) DEFAULT NULL,
  `total` decimal(14,2) NOT NULL DEFAULT 0.00,
  `due` decimal(14,2) NOT NULL DEFAULT 0.00,
  `employee` decimal(14,2) NOT NULL DEFAULT 0.00,
  `required` decimal(14,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(14,2) NOT NULL DEFAULT 0.00,
  `debit` decimal(14,2) NOT NULL DEFAULT 0.00,
  `type` varchar(30) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_fund` tinyint(1) NOT NULL,
  `by_user` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `invoice_id` int(11) DEFAULT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Consultant', '2021-07-02 00:22:23', '2021-07-02 00:22:23'),
(2, 'Civil Work', '2021-07-02 00:23:07', '2021-07-02 00:23:07'),
(3, 'Electrical Work', '2021-07-02 00:23:20', '2021-07-02 00:23:20'),
(4, 'Plumbing Work', '2021-07-02 00:23:36', '2021-07-02 00:23:36'),
(5, 'Grill Work', '2021-07-02 00:42:13', '2021-07-02 00:42:51'),
(6, 'Wooden Work', '2021-07-02 00:42:43', '2021-07-02 00:42:43'),
(7, 'Tiles Work', '2021-07-02 00:43:05', '2021-07-02 00:43:05'),
(8, 'Paint Work', '2021-07-02 00:43:16', '2021-07-02 00:43:16'),
(9, 'Thai and Glass Work', '2021-07-02 00:43:37', '2021-07-02 00:43:37'),
(10, 'Electro Mechanical Work', '2021-07-02 00:43:51', '2021-07-02 00:43:51'),
(11, 'Interior Work', '2021-07-02 00:44:04', '2021-07-02 00:44:04'),
(12, 'Fire Fighting work', '2021-07-02 00:44:26', '2021-07-02 00:44:26'),
(13, 'Miscellaneous', '2021-07-02 00:44:38', '2021-07-02 00:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `emis`
--

CREATE TABLE `emis` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` decimal(14,2) NOT NULL DEFAULT 0.00,
  `otp` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emis`
--

INSERT INTO `emis` (`id`, `name`, `value`, `otp`, `status`, `date`, `created_at`, `updated_at`, `project_id`) VALUES
(1, 'EMI Name', 3000.00, 1, 0, '2021-03-10', '2021-07-01 10:26:30', '2021-07-01 10:26:30', 1),
(2, 'Test Name', 4000.00, 1, 0, '2021-03-13', '2021-07-02 11:19:34', '2021-07-02 11:19:34', 1),
(3, 'Test', 400.00, 1, 0, '2021-07-02', '2021-07-02 11:35:20', '2021-07-02 11:35:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emi_users`
--

CREATE TABLE `emi_users` (
  `id` int(11) NOT NULL,
  `emi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `paid` decimal(14,2) NOT NULL DEFAULT 0.00,
  `due` decimal(14,2) NOT NULL DEFAULT 0.00,
  `otp` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emi_users`
--

INSERT INTO `emi_users` (`id`, `emi_id`, `user_id`, `paid`, `due`, `otp`, `status`, `created_at`, `updated_at`, `project_id`) VALUES
(1, 1, 3, 0.00, 3000.00, 1, 0, '2021-07-01 10:26:30', '2021-07-01 10:26:30', 1),
(2, 2, 3, 0.00, 4000.00, 1, 0, '2021-07-02 11:19:34', '2021-07-02 11:19:34', 1),
(3, 3, 3, 0.00, 400.00, 1, 0, '2021-07-02 11:35:20', '2021-07-02 11:35:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `payee_id` int(11) NOT NULL,
  `payee_name` varchar(255) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `material_name` varchar(255) DEFAULT NULL,
  `quantity` decimal(14,2) NOT NULL DEFAULT 0.00,
  `paid` decimal(14,2) NOT NULL DEFAULT 0.00,
  `due` decimal(14,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `enum` varchar(25) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `is_labor` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name`, `enum`, `category_id`, `is_labor`, `created_at`, `updated_at`) VALUES
(1, 'Architectural Design', 'Sft', 1, 1, '2021-07-02 00:26:00', '2021-07-02 00:26:00'),
(2, 'Sand', 'kg', 1, 1, '2021-07-02 00:32:26', '2021-07-03 08:52:32'),
(3, 'Electrical Design', 'Sft', 1, 1, '2021-07-02 00:32:42', '2021-07-02 00:32:42'),
(4, 'Plumbing Design', 'Sft', 1, 1, '2021-07-02 00:33:03', '2021-07-02 00:33:03'),
(5, 'Site Visit Fees', 'Number of visit', 1, 1, '2021-07-02 00:33:19', '2021-07-02 00:33:39'),
(6, 'Drawing Revision', 'On demand', 1, 1, '2021-07-02 00:34:23', '2021-07-02 00:34:23'),
(7, 'Electromechanical Drawing', 'Sft', 1, 1, '2021-07-02 00:34:40', '2021-07-02 00:38:36'),
(8, 'Digital Survey & Soil Test', 'Contract amount', 1, 1, '2021-07-02 00:34:56', '2021-07-02 00:38:17'),
(9, 'Expenditure Of Drawing (Approved By Development Authority)', 'Contract amount', 1, 1, '2021-07-02 00:35:22', '2021-07-02 00:37:13'),
(10, 'Civil Sub-Contractor', 'Sft', 2, 1, '2021-07-02 00:46:59', '2021-07-02 00:46:59'),
(11, 'Civil Labor', 'Number', 2, 1, '2021-07-02 00:48:58', '2021-07-05 09:47:17'),
(12, 'Bricks (Number-1)', 'Piece', 2, 0, '2021-07-02 00:50:34', '2021-07-05 09:28:23'),
(13, 'Bricks (Number-2)', 'Piece', 2, 0, '2021-07-02 00:52:28', '2021-07-05 09:28:40'),
(14, 'Bricks (Number-3)', 'Piece', 2, 0, '2021-07-02 00:52:46', '2021-07-05 09:39:10'),
(15, 'Rod - 8mm.', 'kg', 2, 0, '2021-07-02 00:54:30', '2021-07-02 00:54:49'),
(16, 'Rod - 10mm.', 'kg', 2, 0, '2021-07-02 00:59:36', '2021-07-02 00:59:36'),
(17, 'Rod - 12mm.', 'kg', 2, 0, '2021-07-02 00:59:59', '2021-07-02 00:59:59'),
(18, 'Rod - 16mm.', 'kg', 2, 0, '2021-07-02 01:01:05', '2021-07-02 01:01:05'),
(19, 'Rod - 20mm.', 'kg', 2, 0, '2021-07-02 01:01:31', '2021-07-02 01:01:31'),
(20, 'Rod - 22mm.', 'kg', 2, 0, '2021-07-02 01:01:48', '2021-07-02 01:01:48'),
(21, 'Rod - 25mm.', 'kg', 2, 0, '2021-07-02 01:10:41', '2021-07-02 01:10:41'),
(22, 'Rod - 28mm.', 'kg', 2, 0, '2021-07-02 01:11:41', '2021-07-02 01:11:41'),
(23, 'Rod - 32mm.', 'kg', 2, 0, '2021-07-02 01:11:59', '2021-07-02 01:11:59'),
(24, 'Rod - 40mm.', 'kg', 2, 0, '2021-07-02 01:12:12', '2021-07-02 01:12:12'),
(25, 'Cement (Opc)', 'Bags', 2, 0, '2021-07-02 01:13:02', '2021-07-02 01:13:02'),
(26, 'Cement (ppc)', 'Bags', 2, 0, '2021-07-02 01:13:40', '2021-07-05 09:45:54'),
(27, 'Stone Chips ( ¾\" down )', 'Piece', 2, 0, '2021-07-02 01:16:37', '2021-07-02 01:16:37'),
(28, 'Stone Chips ( ½\" down )', 'Piece', 2, 0, '2021-07-02 01:18:15', '2021-07-02 01:18:15'),
(29, 'Brick Chips ( ¾\" down)', 'Cubic Feet', 2, 0, '2021-07-02 01:19:20', '2021-07-05 09:26:55'),
(30, 'Brick Chips (½\" down)', 'Cubic Feet', 2, 0, '2021-07-02 01:19:44', '2021-07-05 09:27:25'),
(31, 'Sand Sylhet', 'Piece', 2, 0, '2021-07-02 01:20:21', '2021-07-02 01:20:21'),
(32, 'Sand Kushtia', 'Piece', 2, 0, '2021-07-02 01:21:38', '2021-07-02 01:21:38'),
(33, 'Sand Local', 'Piece', 2, 0, '2021-07-02 01:21:55', '2021-07-02 01:21:55'),
(34, 'Shuttering Material', 'Sft', 2, 0, '2021-07-02 01:23:11', '2021-07-02 01:23:11'),
(35, 'Civil Others', 'Other', 2, 0, '2021-07-02 01:32:20', '2021-07-05 09:47:54'),
(36, 'Electrical Contractor', 'Sft', 3, 1, '2021-07-02 01:33:55', '2021-07-02 01:33:55'),
(37, 'Electrical Labor', 'Number', 3, 1, '2021-07-02 01:34:38', '2021-07-04 09:01:15'),
(38, 'Conduit Pipe', 'In peach', 3, 0, '2021-07-02 01:36:21', '2021-07-02 01:36:21'),
(39, 'Joint Box', 'In peach', 3, 0, '2021-07-02 01:36:37', '2021-07-02 01:36:37'),
(40, 'Cables', 'Coil', 3, 0, '2021-07-02 01:37:01', '2021-07-02 01:37:01'),
(41, 'Switch', 'No.', 3, 0, '2021-07-02 01:38:16', '2021-07-02 01:38:16'),
(42, 'Sockets', 'No.', 3, 0, '2021-07-02 01:38:29', '2021-07-02 01:38:29'),
(43, 'Circuit Breaker', 'Piece', 3, 0, '2021-07-02 01:39:03', '2021-07-05 09:46:36'),
(44, 'Fan', 'No.', 3, 0, '2021-07-02 01:39:45', '2021-07-02 01:39:45'),
(45, 'Light', 'No.', 3, 0, '2021-07-02 01:40:02', '2021-07-02 01:40:02'),
(46, 'Electrical Others', 'No.', 3, 0, '2021-07-02 01:40:40', '2021-07-02 01:40:40'),
(47, 'Electrical Connection Authority', 'Contract amount', 3, 1, '2021-07-02 01:41:27', '2021-07-02 01:41:27'),
(48, 'Plumbing Contractor', 'Number of toi & kit', 4, 1, '2021-07-02 10:11:51', '2021-07-04 09:24:37'),
(49, 'brick', 'kg', 1, 1, '2021-07-03 09:27:48', '2021-07-03 09:27:48'),
(50, 'Plumbing Others', 'Other', 4, 1, '2021-07-03 10:26:18', '2021-07-04 08:59:34'),
(51, 'Water Supply Connection Authority', 'Contract amount', 4, 1, '2021-07-04 09:02:20', '2021-07-04 09:02:20'),
(52, 'Grill Contractor', 'Sft', 5, 1, '2021-07-04 09:03:47', '2021-07-04 09:03:47'),
(53, 'Window Grill', 'Sft', 5, 0, '2021-07-04 09:04:51', '2021-07-04 09:04:51'),
(54, 'Veranda Railing', 'Sft', 5, 0, '2021-07-04 09:05:06', '2021-07-04 09:05:06'),
(55, 'Stair Railing', 'Sft', 5, 0, '2021-07-04 09:05:29', '2021-07-04 09:05:29'),
(56, 'Plumbing Labor', 'Number', 4, 1, '2021-07-04 09:26:44', '2021-07-04 09:26:44'),
(57, 'Pipe (Size-½“)', 'Piece', 4, 0, '2021-07-04 09:28:11', '2021-07-04 09:28:11'),
(58, 'Pipe (Size-¾“)', 'Piece', 4, 0, '2021-07-04 09:28:48', '2021-07-04 09:28:48'),
(59, 'Pipe (Size-1“)', 'Piece', 4, 0, '2021-07-04 09:30:26', '2021-07-04 09:30:26'),
(60, 'Pipe (Size-2“)', 'Piece', 4, 0, '2021-07-04 09:32:08', '2021-07-04 09:32:08'),
(61, 'Pipe (Size-4“)', 'Piece', 4, 0, '2021-07-04 09:32:41', '2021-07-04 09:32:41'),
(62, 'Pipe (Size-6“)', 'Piece', 4, 0, '2021-07-04 09:33:16', '2021-07-04 09:33:16'),
(63, 'Pipe (Size-10“)', 'ft', 4, 0, '2021-07-04 09:33:55', '2021-07-04 09:39:31'),
(64, 'Pipe (Size-8“)', 'ft', 4, 0, '2021-07-04 09:38:46', '2021-07-04 09:38:46'),
(65, 'Pipe (Size-12“)', 'ft', 4, 0, '2021-07-04 09:39:09', '2021-07-04 09:39:09'),
(66, 'Pipe Fitting (Size-¾“)', 'Number', 4, 0, '2021-07-04 09:42:19', '2021-07-04 09:42:19'),
(67, 'Pipe Fitting (Size-½“)', 'Number', 4, 0, '2021-07-04 09:42:39', '2021-07-04 09:42:39'),
(68, 'Pipe Fitting (Size-1“)', 'Number', 4, 0, '2021-07-04 10:02:00', '2021-07-04 10:02:00'),
(69, 'Pipe Fitting (Size-2“)', 'Number', 4, 0, '2021-07-04 10:02:15', '2021-07-04 10:02:15'),
(70, 'Pipe Fitting (Size-4“)', 'Number', 4, 0, '2021-07-04 10:02:33', '2021-07-04 10:02:33'),
(71, 'Pipe Fitting (Size-6“)', 'Number', 4, 0, '2021-07-04 10:02:51', '2021-07-04 10:02:51'),
(72, 'Pipe Fitting (Size-8“)', 'Number', 4, 0, '2021-07-04 10:03:03', '2021-07-04 10:03:03'),
(73, 'Pipe Fitting (Size-10“)', 'Number', 4, 0, '2021-07-04 10:03:14', '2021-07-04 10:03:14'),
(74, 'Pipe Fitting (Size-12“)', 'Number', 4, 0, '2021-07-04 10:03:26', '2021-07-04 10:03:26'),
(75, 'Bib Cock', 'Piece', 4, 0, '2021-07-04 10:11:05', '2021-07-04 10:11:05'),
(76, 'Pillar Cock', 'Piece', 4, 0, '2021-07-04 10:11:47', '2021-07-04 10:11:47'),
(77, '2 Way Bib Cock', 'Piece', 4, 0, '2021-07-04 10:12:42', '2021-07-04 10:12:42'),
(78, 'Concealed Stop Cock', 'Piece', 4, 0, '2021-07-04 10:13:26', '2021-07-04 10:13:26'),
(79, 'Shower', 'Piece', 4, 0, '2021-07-04 10:19:14', '2021-07-04 10:19:14'),
(80, 'Push Shower', 'Piece', 4, 0, '2021-07-04 10:19:34', '2021-07-04 10:19:34'),
(81, 'Angle', 'Piece', 4, 0, '2021-07-04 10:19:51', '2021-07-04 10:19:51'),
(82, 'Mirror', 'Piece', 4, 0, '2021-07-04 10:20:14', '2021-07-04 10:20:14'),
(83, 'Mirror Self', 'Piece', 4, 0, '2021-07-04 10:20:30', '2021-07-04 10:20:30'),
(84, 'Shop Case', 'Piece', 4, 0, '2021-07-04 10:20:55', '2021-07-04 10:20:55'),
(85, 'Tissue Holder', 'Piece', 4, 0, '2021-07-04 10:21:27', '2021-07-04 10:21:27'),
(86, 'Connection Pipe', 'Piece', 4, 0, '2021-07-04 10:21:52', '2021-07-04 10:21:52'),
(87, 'Basin Waste', 'Piece', 4, 0, '2021-07-04 10:22:47', '2021-07-04 10:22:47'),
(88, 'Floor Waste (4\"\')', 'Piece', 4, 0, '2021-07-04 12:42:29', '2021-07-04 12:42:29'),
(89, 'Floor Waste (2.5\"\')', 'Piece', 4, 0, '2021-07-04 12:42:58', '2021-07-04 12:42:58'),
(90, 'Basin Mixer', 'Piece', 4, 0, '2021-07-04 12:43:47', '2021-07-04 12:44:26'),
(91, 'Shower Mixer', 'Piece', 4, 0, '2021-07-04 12:45:21', '2021-07-04 12:45:21'),
(92, 'Sink Mixer', 'Piece', 4, 0, '2021-07-04 12:45:38', '2021-07-04 12:45:38'),
(93, 'Kitchen Sink', 'Piece', 4, 0, '2021-07-04 12:46:31', '2021-07-04 12:46:31'),
(94, 'Sink Cock', 'Piece', 4, 0, '2021-07-04 12:46:52', '2021-07-04 12:46:52'),
(95, 'Magic Pipe', 'Piece', 4, 0, '2021-07-04 12:48:00', '2021-07-04 12:48:00'),
(96, 'Gas Key', 'Piece', 4, 0, '2021-07-04 12:48:19', '2021-07-04 12:48:19'),
(97, 'Commode', 'Piece', 4, 0, '2021-07-04 12:50:49', '2021-07-04 12:50:49'),
(98, 'Single Basin', 'Piece', 4, 0, '2021-07-04 12:51:24', '2021-07-04 12:51:24'),
(99, 'Pedestal Basin', 'Piece', 4, 0, '2021-07-04 12:51:49', '2021-07-04 12:51:49'),
(100, 'Lowdown', 'Piece', 4, 0, '2021-07-04 12:52:09', '2021-07-04 12:52:09'),
(101, 'Towel Shelf', 'Piece', 4, 0, '2021-07-04 12:53:41', '2021-07-04 12:53:41'),
(102, 'Threat Tape', 'Piece', 4, 0, '2021-07-04 12:55:47', '2021-07-04 12:55:47'),
(103, 'Solution Gum', 'Gallon', 4, 0, '2021-07-04 12:56:59', '2021-07-04 12:56:59'),
(104, 'Grill Labor', 'Number', 5, 1, '2021-07-04 12:59:15', '2021-07-04 12:59:15'),
(105, 'Fencing', 'Sft', 5, 0, '2021-07-04 13:02:33', '2021-07-04 13:02:33'),
(106, 'Stainless Steel  Work', 'Sft', 5, 0, '2021-07-04 13:02:55', '2021-07-04 13:02:55'),
(107, 'Collapsible Gate', 'Sft', 5, 0, '2021-07-04 13:03:16', '2021-07-05 09:50:14'),
(108, 'Safety Shutter', 'Sft', 5, 0, '2021-07-04 13:04:04', '2021-07-04 13:04:04'),
(109, 'Grill Other', 'Other', 5, 0, '2021-07-04 13:04:43', '2021-07-04 13:04:43'),
(110, 'Carpenter', 'Number', 6, 1, '2021-07-04 13:05:12', '2021-07-04 13:05:12'),
(111, 'Polish Labor', 'Sft', 6, 1, '2021-07-04 13:05:37', '2021-07-04 13:05:37'),
(112, 'Door Frame (Size-31\")', 'Piece', 6, 0, '2021-07-04 13:06:35', '2021-07-05 09:55:20'),
(113, 'Door Frame (Size-34\")', 'Piece', 6, 0, '2021-07-04 13:07:06', '2021-07-05 09:55:36'),
(114, 'Door Frame (Size-37\")', 'Piece', 6, 0, '2021-07-04 13:07:21', '2021-07-05 09:55:58'),
(115, 'Door Frame (Size-40\")', 'Piece', 6, 0, '2021-07-04 13:07:37', '2021-07-05 09:56:23'),
(116, 'Door Frame (Size-43\")', 'Piece', 6, 0, '2021-07-04 13:07:55', '2021-07-05 09:56:38'),
(117, 'Door Shutter(Size-27”)', 'Piece', 5, 0, '2021-07-04 13:08:38', '2021-07-05 09:57:00'),
(118, 'Door Shutter(Size-30”)', 'Piece', 6, 0, '2021-07-04 13:08:59', '2021-07-05 09:57:14'),
(119, 'Door Shutter(Size-33”)', 'Piece', 6, 0, '2021-07-04 13:09:13', '2021-07-05 09:57:29'),
(120, 'Door Shutter(Size-36”)', 'Piece', 6, 0, '2021-07-04 13:09:27', '2021-07-05 09:57:43'),
(121, 'Door Shutter(Size-39”)', 'Piece', 6, 0, '2021-07-04 13:09:42', '2021-07-05 09:57:59'),
(122, 'Cat Door', 'Piece', 6, 0, '2021-07-04 13:10:17', '2021-07-04 13:10:17'),
(123, 'Hardware Items', 'Piece', 6, 0, '2021-07-04 13:11:18', '2021-07-04 13:11:18'),
(124, 'Polish Material', 'Gallon', 6, 0, '2021-07-04 13:12:09', '2021-07-04 13:12:09'),
(125, 'Wooden Others', 'Other', 6, 0, '2021-07-04 13:12:41', '2021-07-04 13:12:41'),
(126, 'Board(4\'x8\') Size-¾“', 'Piece', 6, 0, '2021-07-04 13:14:40', '2021-07-04 13:18:49'),
(127, 'Board(4\'x8\') Size-½”', 'Piece', 6, 0, '2021-07-04 13:15:03', '2021-07-04 13:17:35'),
(128, 'Board(4\'x8\') Size-¼”', 'Piece', 5, 0, '2021-07-04 13:17:00', '2021-07-04 13:17:00'),
(129, 'Tiles Contractor', 'Sft', 7, 1, '2021-07-04 13:20:11', '2021-07-04 13:20:11'),
(130, 'Tiles Labor', 'Number', 7, 1, '2021-07-04 13:20:48', '2021-07-04 13:20:48'),
(131, 'Tiles (Size=12\"x12\")', 'Sft', 7, 0, '2021-07-04 13:21:52', '2021-07-04 13:21:52'),
(132, 'Tiles (Size=16\"x16\")', 'Sft', 7, 0, '2021-07-04 13:22:10', '2021-07-04 13:22:10'),
(133, 'Tiles (Size=24\"x24\")', 'Sft', 7, 1, '2021-07-04 13:22:29', '2021-07-04 13:22:29'),
(134, 'Tiles (Size=12\"x24\")', 'Sft', 7, 0, '2021-07-04 13:22:51', '2021-07-04 13:22:51'),
(135, 'Tiles (Size=12\"x18\")', 'Sft', 7, 1, '2021-07-04 13:23:18', '2021-07-04 13:23:18'),
(136, 'Tiles (Size=10\"x16\")', 'Sft', 7, 0, '2021-07-04 13:25:13', '2021-07-04 13:25:13'),
(137, 'Tiles (Size=8\"x12\")', 'Sft', 7, 0, '2021-07-04 21:52:41', '2021-07-04 21:52:41'),
(138, 'White Cement', 'Bags', 7, 0, '2021-07-04 21:53:02', '2021-07-04 21:53:02'),
(139, 'Marble', 'Sft', 7, 0, '2021-07-04 21:53:22', '2021-07-04 21:53:22'),
(140, 'Granite', 'Sft', 7, 0, '2021-07-04 21:53:40', '2021-07-04 21:53:40'),
(141, 'Putting Material', 'kg', 7, 0, '2021-07-04 21:54:10', '2021-07-04 21:54:10'),
(142, 'Cleaning material', 'Piece', 7, 0, '2021-07-04 21:54:32', '2021-07-05 09:52:09'),
(143, 'Paint Contractor', 'Sft', 8, 1, '2021-07-04 21:55:01', '2021-07-04 21:55:01'),
(144, 'Paint Labor', 'Number', 8, 1, '2021-07-04 21:55:28', '2021-07-04 21:55:28'),
(145, 'Paint', 'Gallon', 8, 0, '2021-07-04 21:56:17', '2021-07-04 21:56:17'),
(146, 'Chalk Powder', 'Bags', 8, 0, '2021-07-04 21:56:41', '2021-07-04 21:56:41'),
(147, 'Putty', 'Gallon', 8, 0, '2021-07-04 21:57:03', '2021-07-04 21:57:03'),
(148, 'Sealer', 'Gallon', 8, 0, '2021-07-04 21:57:21', '2021-07-04 21:57:21'),
(149, 'Primer', 'Gallon', 8, 0, '2021-07-04 21:57:39', '2021-07-04 21:57:39'),
(150, 'Duco paint', 'Sft', 8, 0, '2021-07-04 21:57:57', '2021-07-04 21:57:57'),
(151, 'Paint Other', 'Other', 8, 0, '2021-07-04 21:58:28', '2021-07-04 21:58:28'),
(152, 'Thai Contractor', 'Sft', 9, 1, '2021-07-04 21:59:25', '2021-07-04 21:59:25'),
(153, 'Thai Labor', 'Number', 9, 1, '2021-07-04 21:59:52', '2021-07-04 21:59:52'),
(154, 'Sliding Window', 'Sft', 9, 0, '2021-07-04 22:00:46', '2021-07-04 22:00:46'),
(155, 'Sliding Glass Door', 'Sft', 9, 0, '2021-07-04 22:01:13', '2021-07-04 22:01:13'),
(156, 'High Window', 'Sft', 9, 0, '2021-07-04 22:02:06', '2021-07-04 22:02:06'),
(157, 'Verandah Railing Glass', 'Sft', 9, 0, '2021-07-04 22:02:31', '2021-07-04 22:02:31'),
(158, 'Tempered Glass', 'Sft', 9, 0, '2021-07-04 22:02:47', '2021-07-04 22:02:47'),
(159, 'Certain Glass', 'Sft', 9, 0, '2021-07-04 22:03:05', '2021-07-04 22:03:05'),
(160, 'Spider Glass', 'Sft', 9, 0, '2021-07-04 22:03:28', '2021-07-04 22:03:28'),
(161, 'Thai and Glass Other', 'Other', 9, 0, '2021-07-04 22:04:36', '2021-07-04 22:04:36'),
(162, 'Sandwich Glass', 'Sft', 9, 0, '2021-07-04 22:05:12', '2021-07-04 22:05:12'),
(163, 'Electro Mechanical Contractor', 'Contract amount', 10, 1, '2021-07-04 22:05:54', '2021-07-04 22:05:54'),
(164, 'Pump/Motor', 'Number', 10, 0, '2021-07-04 22:07:38', '2021-07-04 22:07:38'),
(165, 'Lift/Elevator', 'Number', 10, 0, '2021-07-04 22:08:05', '2021-07-04 22:08:05'),
(166, 'Sub-Station', 'Number', 10, 0, '2021-07-04 22:08:55', '2021-07-04 22:08:55'),
(167, 'Generator', 'Number', 10, 0, '2021-07-04 22:09:12', '2021-07-04 22:09:12'),
(168, 'CCTV Camera', 'Piece', 10, 0, '2021-07-04 22:09:33', '2021-07-05 09:45:21'),
(169, 'Automation System', 'Number', 10, 0, '2021-07-04 22:10:02', '2021-07-04 22:10:02'),
(170, 'Interior Masson', 'Sft', 11, 1, '2021-07-04 22:10:28', '2021-07-04 22:10:28'),
(171, 'Interior Material', 'Number', 11, 0, '2021-07-04 22:11:08', '2021-07-04 22:11:08'),
(172, 'Interior Other', 'Other', 11, 0, '2021-07-04 22:11:34', '2021-07-04 22:11:34'),
(173, 'Fire Fighting Contractor', 'Contract amount', 12, 1, '2021-07-04 22:12:00', '2021-07-04 22:12:00'),
(174, 'Fire Fighting Equipment', 'Item Wise', 12, 0, '2021-07-04 22:12:24', '2021-07-04 22:12:24'),
(175, 'Miscellaneous', 'Miscellaneous', 13, 0, '2021-07-04 22:12:50', '2021-07-04 22:12:50'),
(176, 'Rolling Shutter', 'Sft', 5, 0, '2021-07-05 09:50:31', '2021-07-05 09:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `material_histories`
--

CREATE TABLE `material_histories` (
  `invoice_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `payee_id` int(11) DEFAULT NULL,
  `payee_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `material_name` varchar(255) DEFAULT NULL,
  `total` decimal(14,2) NOT NULL DEFAULT 0.00,
  `required` decimal(14,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(14,2) NOT NULL DEFAULT 0.00,
  `debit` decimal(14,2) NOT NULL DEFAULT 0.00,
  `used` decimal(14,2) NOT NULL DEFAULT 0.00,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payees`
--

CREATE TABLE `payees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `paid` decimal(14,2) NOT NULL DEFAULT 0.00,
  `due` decimal(14,2) NOT NULL DEFAULT 0.00,
  `type` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `budget` decimal(14,2) NOT NULL DEFAULT 0.00,
  `deadline` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `subscription` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `type`, `budget`, `deadline`, `status`, `subscription`, `created_at`, `updated_at`) VALUES
(1, 'Project', 'BUILDING', 20000.00, '2022-11-20', 'PLANNING', NULL, '2021-03-20 00:21:14', '2021-03-20 00:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(70) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT current_timestamp(),
  `acl` varchar(50) NOT NULL,
  `contribution` decimal(14,2) NOT NULL DEFAULT 0.00,
  `on_hold` decimal(14,2) NOT NULL DEFAULT 0.00,
  `due` decimal(14,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `project_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `remember_token`, `mobile`, `email`, `email_verified_at`, `acl`, `contribution`, `on_hold`, `due`, `created_at`, `updated_at`, `project_id`) VALUES
(1, 'Admin', '$2y$10$PKtPFCI.3Mh.VKrCqnOqXuQKQ/4zpD0.VoiguzFw78N2J7e6htVDS', NULL, '+8801774444000', 'admin@bcats.net', '2021-07-01 11:21:17', 'QURNSU4=', 0.00, 0.00, 0.00, '2021-07-01 11:21:17', '2021-07-01 11:21:17', NULL),
(2, 'Manager', '$2y$10$kxosv25q/F3ByBkevrjHUuTu.lmOpLgZYROjhqC5t65iji3Q0fOwG', NULL, '01973939656', 'manager@bcats.net', '2021-03-20 04:06:12', 'TUFOQUdFUg==', 0.00, 0.00, 0.00, '2021-03-19 22:06:12', '2021-03-19 22:06:12', NULL),
(3, 'Project Admin', '$2y$10$TX17HIKmBd/nP1gZHzE6CObNdg1YLjb/UNO5iktOf8LieEX5C020.', NULL, '01748986541', 'project-admin@bcats.net', '2021-03-20 06:21:14', 'UFJPSkVDVF9BRE1JTg==', 0.00, 0.00, 7400.00, '2021-03-20 00:21:14', '2021-07-02 11:35:20', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payee_id` (`payee_id`),
  ADD KEY `emi_id` (`emi_id`),
  ADD KEY `by_user` (`by_user`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emis`
--
ALTER TABLE `emis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `emi_users`
--
ALTER TABLE `emi_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emi_id` (`emi_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payee_id` (`payee_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `material_histories`
--
ALTER TABLE `material_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payee_id` (`payee_id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `material_id` (`material_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `payees`
--
ALTER TABLE `payees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `project_id` (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `emis`
--
ALTER TABLE `emis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emi_users`
--
ALTER TABLE `emi_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `material_histories`
--
ALTER TABLE `material_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payees`
--
ALTER TABLE `payees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`payee_id`) REFERENCES `payees` (`id`),
  ADD CONSTRAINT `accounts_ibfk_2` FOREIGN KEY (`emi_id`) REFERENCES `emis` (`id`),
  ADD CONSTRAINT `accounts_ibfk_3` FOREIGN KEY (`by_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `accounts_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `accounts_ibfk_5` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `accounts_ibfk_6` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `emis`
--
ALTER TABLE `emis`
  ADD CONSTRAINT `emis_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `emi_users`
--
ALTER TABLE `emi_users`
  ADD CONSTRAINT `emi_users_ibfk_1` FOREIGN KEY (`emi_id`) REFERENCES `emis` (`id`),
  ADD CONSTRAINT `emi_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `emi_users_ibfk_3` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`payee_id`) REFERENCES `payees` (`id`),
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `invoices_ibfk_3` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`);

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `material_histories`
--
ALTER TABLE `material_histories`
  ADD CONSTRAINT `material_histories_ibfk_1` FOREIGN KEY (`payee_id`) REFERENCES `payees` (`id`),
  ADD CONSTRAINT `material_histories_ibfk_2` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `material_histories_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `material_histories_ibfk_4` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`),
  ADD CONSTRAINT `material_histories_ibfk_5` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `payees`
--
ALTER TABLE `payees`
  ADD CONSTRAINT `payees_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
