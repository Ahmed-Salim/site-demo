-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 12:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeditors_challenge_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `challenges_log`
--

CREATE TABLE `challenges_log` (
  `challenge_id` int(11) NOT NULL,
  `challenge_by` int(11) NOT NULL,
  `game` varchar(255) NOT NULL,
  `console` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `game_mode` varchar(255) NOT NULL,
  `rules` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'open',
  `created_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `accepted_by` int(11) DEFAULT NULL,
  `accepted_timestamp` timestamp NULL DEFAULT NULL,
  `challenge_date` date DEFAULT NULL,
  `challenge_time` time DEFAULT NULL,
  `challenge_by_start_timestamp` timestamp NULL DEFAULT NULL,
  `accepted_by_start_timestamp` timestamp NULL DEFAULT NULL,
  `challenge_by_claimed_result` varchar(255) NOT NULL,
  `accepted_by_claimed_result` varchar(255) NOT NULL,
  `challenge_by_claim_timestamp` timestamp NULL DEFAULT NULL,
  `accepted_by_claim_timestamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `challenges_log`
--

INSERT INTO `challenges_log` (`challenge_id`, `challenge_by`, `game`, `console`, `amount`, `game_mode`, `rules`, `status`, `created_timestamp`, `accepted_by`, `accepted_timestamp`, `challenge_date`, `challenge_time`, `challenge_by_start_timestamp`, `accepted_by_start_timestamp`, `challenge_by_claimed_result`, `accepted_by_claimed_result`, `challenge_by_claim_timestamp`, `accepted_by_claim_timestamp`) VALUES
(1, 5, 'fifa_21', 'pc', 10, 'Test', 'Test', 'no_result', '2021-02-08 08:16:32', 6, '2021-02-18 11:05:30', '2021-02-17', '16:05:00', NULL, NULL, '', '', NULL, NULL),
(2, 5, 'fifa_21', 'ps4', 15, '', '', 'disputed', '2021-02-08 09:44:22', 11, '2021-02-17 04:35:59', '2021-02-18', '09:35:00', '2021-02-17 07:16:03', '2021-02-17 04:36:42', 'win', 'win', '2021-02-17 11:40:41', '2021-02-17 11:41:17'),
(3, 5, 'fortnite', 'xbox', 15, 'Test123', 'Test123', 'no_result', '2021-02-08 11:52:23', 6, '2021-02-16 06:53:36', '2021-02-17', '11:53:00', '2021-02-16 11:51:28', NULL, '', '', NULL, NULL),
(4, 6, 'clash_of_clans', 'xbox', 20, 'Test', 'Test', 'no_result', '2021-02-09 06:17:29', 5, '2021-02-15 11:49:00', '2021-02-16', '16:48:00', NULL, '2021-02-16 11:24:34', '', '', NULL, NULL),
(5, 7, 'fifa_21', 'ps4', 10, 'test1', 'test1', 'no_result', '2021-02-09 11:31:56', 5, '2021-02-15 11:29:23', '2021-02-15', '16:29:00', NULL, NULL, '', '', NULL, NULL),
(6, 7, 'fortnite', 'pc', 15, 'test2', 'test2', 'no_result', '2021-02-09 11:32:32', 5, '2021-02-15 10:52:18', '2021-02-10', '15:52:00', NULL, NULL, '', '', NULL, NULL),
(7, 7, 'clash_of_clans', 'xbox', 20, 'test3', 'test3', 'no_result', '2021-02-09 11:32:44', 5, '2021-02-15 10:56:16', '2021-02-12', '15:56:00', NULL, NULL, '', '', NULL, NULL),
(8, 7, 'clash_of_clans', 'nintendo', 25, 'test4', 'test4', 'open', '2021-02-09 11:32:57', NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL),
(9, 5, 'clash_of_clans', 'ps4', 10, 'testing123', 'testing123', 'accepted', '2021-02-15 06:22:27', 6, '2021-02-17 07:46:03', '2021-02-18', '12:46:00', '2021-02-17 07:52:07', '2021-02-17 07:52:19', 'win', 'win', '2021-02-17 09:33:35', '2021-02-17 09:32:51'),
(10, 11, 'fifa_21', 'ps4', 10, 'test', 'test', 'accepted', '2021-02-17 04:35:20', 12, '2021-02-17 05:00:16', '2021-02-18', '10:00:00', '2021-02-17 05:01:35', '2021-02-17 05:02:27', '', '', NULL, NULL),
(11, 12, 'fifa_21', 'ps4', 10, 'test', 'test', 'open', '2021-02-17 04:59:29', NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL),
(12, 5, 'fortnite', 'nintendo', 25, 'test', 'test', 'completed', '2021-02-17 07:19:49', 6, '2021-02-17 07:20:07', '2021-02-18', '12:20:00', '2021-02-17 07:21:41', '2021-02-17 07:20:42', 'win', 'lose', '2021-02-17 11:43:56', '2021-02-17 11:44:33'),
(13, 5, 'clash_of_clans', 'pc', 15, 'test', 'test', 'completed', '2021-02-17 11:48:18', 6, '2021-02-17 11:48:44', '2021-02-18', '16:48:00', '2021-02-17 11:49:07', '2021-02-17 11:49:20', 'win', 'lose', '2021-02-17 11:49:36', '2021-02-17 11:49:47'),
(14, 5, 'fortnite', 'ps4', 10, 'test123', 'test123', 'completed', '2021-02-18 10:47:43', 6, '2021-02-18 10:48:19', '2021-02-19', '15:48:00', '2021-02-18 10:49:47', '2021-02-18 10:50:18', 'win', 'lose', '2021-02-18 10:50:42', '2021-02-18 10:51:06'),
(15, 5, 'clash_of_clans', 'ps4', 10, 'test234', 'test234', 'completed', '2021-02-18 11:01:41', 6, '2021-02-18 11:02:00', '2021-02-19', '16:01:00', '2021-02-18 11:02:34', '2021-02-18 11:03:00', 'lose', 'win', '2021-02-18 11:03:14', '2021-02-18 11:03:26'),
(16, 6, 'fifa_21', 'ps4', 10, 'asd', 'ghsgd', 'completed', '2021-02-18 11:08:49', 5, '2021-02-18 11:09:35', '2021-02-19', '16:09:00', '2021-02-18 11:09:49', '2021-02-18 11:09:41', 'win', 'lose', '2021-02-18 11:09:52', '2021-02-18 11:09:58'),
(17, 5, 'fifa_21', 'ps4', 10, 'asd', 'asd', 'no_result', '2021-02-18 11:10:50', 6, '2021-02-18 11:11:22', '2021-02-17', '16:11:00', NULL, NULL, '', '', NULL, NULL),
(18, 5, 'fifa_21', 'pc', 15, 'sadhj', 'kasjhdkj', 'accepted', '2021-02-18 11:58:25', 6, '2021-02-18 11:58:46', '2021-02-19', '16:58:00', NULL, NULL, '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deposit_log`
--

CREATE TABLE `deposit_log` (
  `deposit_id` int(11) NOT NULL,
  `deposit_by` int(11) NOT NULL,
  `method` varchar(255) NOT NULL,
  `amount` decimal(65,30) UNSIGNED NOT NULL,
  `client_date` varchar(255) NOT NULL,
  `server_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposit_log`
--

INSERT INTO `deposit_log` (`deposit_id`, `deposit_by`, `method`, `amount`, `client_date`, `server_timestamp`) VALUES
(1, 5, 'Dummy Deposit', '15.000000000000000000000000000000', 'Thu Jan 04 2020 15:28:14 GMT+0500 (Pakistan Standard Time)', '2020-01-04 10:28:14'),
(2, 5, 'Dummy Deposit', '15.990000000000000000000000000000', 'Thu Jan 04 2021 15:28:26 GMT+0500 (Pakistan Standard Time)', '2021-01-04 10:28:26'),
(3, 5, 'Dummy Deposit', '10.990000000000000000000000000000', 'Thu Jan 04 2021 15:28:35 GMT+0500 (Pakistan Standard Time)', '2021-01-04 10:28:35'),
(4, 5, 'Dummy Deposit', '12.345678900000000000000000000000', 'Thu Feb 04 2021 15:29:01 GMT+0500 (Pakistan Standard Time)', '2021-02-04 10:29:01'),
(5, 5, 'Dummy Deposit', '98.765432100000000000000000000000', 'Thu Feb 04 2021 15:43:33 GMT+0500 (Pakistan Standard Time)', '2021-02-04 10:43:33'),
(6, 6, 'Dummy Deposit', '12.345678900000000000000000000000', 'Thu Feb 04 2021 16:07:13 GMT+0500 (Pakistan Standard Time)', '2021-02-04 11:07:13'),
(7, 6, 'Dummy Deposit', '98.765432100000000000000000000000', 'Thu Feb 04 2021 16:07:25 GMT+0500 (Pakistan Standard Time)', '2021-02-04 11:07:25'),
(8, 6, 'Dummy Deposit', '12.345678900000000000000000000000', 'Thu Feb 04 2021 16:22:37 GMT+0500 (Pakistan Standard Time)', '2021-02-04 11:22:37'),
(9, 4, 'Dummy Deposit', '10.000000000000000000000000000000', 'Thu Feb 04 2021 16:47:25 GMT+0500 (Pakistan Standard Time)', '2021-02-04 11:47:25'),
(10, 4, 'Dummy Deposit', '15.000000000000000000000000000000', 'Thu Feb 04 2021 16:47:37 GMT+0500 (Pakistan Standard Time)', '2021-02-04 11:47:37'),
(11, 5, 'Dummy Deposit', '123.000000000000000000000000000000', 'Sat Feb 06 2020 12:12:11 GMT+0500 (Pakistan Standard Time)', '2020-02-06 07:12:11'),
(12, 5, 'Dummy Deposit', '10.000000000000000000000000000000', 'Sat Feb 06 2021 12:33:49 GMT+0500 (Pakistan Standard Time)', '2021-02-06 07:33:49'),
(13, 5, 'Dummy Deposit', '11.000000000000000000000000000000', 'Sat Feb 06 2021 12:34:02 GMT+0500 (Pakistan Standard Time)', '2021-02-06 07:34:02'),
(14, 5, 'Dummy Deposit', '125.000000000000000000000000000000', 'Sat Feb 06 2021 16:31:20 GMT+0500 (Pakistan Standard Time)', '2021-02-06 11:31:20'),
(15, 5, 'Dummy Deposit', '12.345678900000000000000000000000', 'Sat Feb 06 2021 16:31:29 GMT+0500 (Pakistan Standard Time)', '2021-02-06 11:31:29'),
(16, 5, 'Dummy Deposit', '98.765432100000000000000000000000', 'Sat Feb 06 2021 16:31:40 GMT+0500 (Pakistan Standard Time)', '2021-02-06 11:31:40'),
(17, 5, 'Dummy Deposit', '12.345678900000000000000000000000', 'Sat Feb 06 2021 16:32:49 GMT+0500 (Pakistan Standard Time)', '2021-02-06 11:32:49'),
(18, 5, 'Dummy Deposit', '98.765432100000000000000000000000', 'Sat Feb 06 2021 16:32:55 GMT+0500 (Pakistan Standard Time)', '2021-02-06 11:32:55'),
(19, 5, 'Dummy Deposit', '12.345678900000000000000000000000', 'Sat Feb 06 2021 16:40:10 GMT+0500 (Pakistan Standard Time)', '2021-02-06 11:40:10'),
(20, 5, 'Dummy Deposit', '98.765432100000000000000000000000', 'Sat Feb 06 2021 16:40:38 GMT+0500 (Pakistan Standard Time)', '2021-02-06 11:40:38'),
(21, 5, 'Dummy Deposit', '1000.000000000000000000000000000000', 'Mon Feb 08 2021 14:44:10 GMT+0500 (Pakistan Standard Time)', '2021-02-08 09:44:10'),
(22, 7, 'Dummy Deposit', '1000.000000000000000000000000000000', 'Tue Feb 09 2021 16:31:39 GMT+0500 (Pakistan Standard Time)', '2021-02-09 11:31:39'),
(23, 3, 'Dummy Deposit', '100.000000000000000000000000000000', 'Tue Feb 09 2021 16:52:46 GMT+0500 (Pakistan Standard Time)', '2021-02-09 11:52:46'),
(24, 5, 'Dummy Deposit', '10.000000000000000000000000000000', 'Mon Feb 15 2021 11:15:28 GMT+0500 (Pakistan Standard Time)', '2021-02-15 06:15:28'),
(25, 11, 'Dummy Deposit', '100.000000000000000000000000000000', 'Wed Feb 17 2021 09:33:41 GMT+0500 (Pakistan Standard Time)', '2021-02-17 04:33:41'),
(26, 12, 'Dummy Deposit', '100.000000000000000000000000000000', 'Wed Feb 17 2021 09:58:06 GMT+0500 (Pakistan Standard Time)', '2021-02-17 04:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notif_id` int(11) NOT NULL,
  `notif_for` int(11) NOT NULL,
  `notif_msg` text NOT NULL,
  `notif_status` varchar(255) NOT NULL DEFAULT 'unread',
  `notif_create_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `notif_read_timestamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notif_id`, `notif_for`, `notif_msg`, `notif_status`, `notif_create_timestamp`, `notif_read_timestamp`) VALUES
(1, 5, 'USER 6 has accepted your Challenge! Challenge ID: 14.', 'read', '2021-02-18 10:48:19', NULL),
(2, 6, 'USER 6 have started the Challenge! Challenge ID: 14.', 'unread', '2021-02-18 10:49:47', NULL),
(3, 5, 'USER 5 have started the Challenge! Challenge ID: 14.', 'read', '2021-02-18 10:50:18', NULL),
(4, 6, 'USER 6 have claimed their result for Challenge ID: 14.', 'unread', '2021-02-18 10:50:42', NULL),
(5, 5, 'USER 5 have claimed their result for Challenge ID: 14.', 'read', '2021-02-18 10:51:06', NULL),
(6, 5, 'Challenge ID: 14 has ended successfully.', 'read', '2021-02-18 10:51:06', NULL),
(7, 6, 'Challenge ID: 14 has ended successfully.', 'unread', '2021-02-18 10:51:06', NULL),
(8, 5, 'USER 6 has accepted your Challenge! Challenge ID: 15.', 'read', '2021-02-18 11:02:00', NULL),
(9, 6, 'USER 6 have started the Challenge! Challenge ID: 15.', 'unread', '2021-02-18 11:02:34', NULL),
(10, 5, 'USER 5 have started the Challenge! Challenge ID: 15.', 'read', '2021-02-18 11:03:00', NULL),
(11, 6, 'USER 6 have claimed their result for Challenge ID: 15.', 'unread', '2021-02-18 11:03:14', NULL),
(12, 5, 'USER 5 have claimed their result for Challenge ID: 15.', 'read', '2021-02-18 11:03:26', NULL),
(13, 5, 'Challenge ID: 15 has ended successfully.', 'read', '2021-02-18 11:03:26', NULL),
(14, 6, 'Challenge ID: 15 has ended successfully.', 'unread', '2021-02-18 11:03:26', NULL),
(15, 5, '$20 awarded to the winning player for winning Challenge ID: 15.', 'read', '2021-02-18 11:03:26', NULL),
(16, 6, '$20 awarded to the winning player for winning Challenge ID: 15.', 'unread', '2021-02-18 11:03:26', NULL),
(17, 5, 'USER 6 has accepted your Challenge! Challenge ID: 1.', 'read', '2021-02-18 11:05:30', NULL),
(18, 5, 'Both players failed to start the Challenge in time! Challenge ID: 1 has ended with No Result!', 'read', '2021-02-18 11:06:03', NULL),
(19, 6, 'Both players failed to start the Challenge in time! Challenge ID: 1 has ended with No Result!', 'unread', '2021-02-18 11:06:03', NULL),
(20, 5, 'Since Challenge ID: 1 ended with No Result, the Challenge amount, $10, has been refunded to both players', 'read', '2021-02-18 11:06:03', NULL),
(21, 6, 'Since Challenge ID: 1 ended with No Result, the Challenge amount, $10, has been refunded to both players', 'unread', '2021-02-18 11:06:03', NULL),
(22, 6, 'USER 5 has accepted your Challenge! Challenge ID: 16.', 'unread', '2021-02-18 11:09:35', NULL),
(23, 6, 'USER 6 have started the Challenge! Challenge ID: 16.', 'read', '2021-02-18 11:09:41', NULL),
(24, 5, 'USER 5 have started the Challenge! Challenge ID: 16.', 'read', '2021-02-18 11:09:49', NULL),
(25, 5, 'USER 5 have claimed their result for Challenge ID: 16.', 'read', '2021-02-18 11:09:52', NULL),
(26, 6, 'USER 6 have claimed their result for Challenge ID: 16.', 'unread', '2021-02-18 11:09:58', NULL),
(27, 6, 'Challenge ID: 16 has ended successfully.', 'read', '2021-02-18 11:09:58', NULL),
(28, 5, 'Challenge ID: 16 has ended successfully.', 'read', '2021-02-18 11:09:58', NULL),
(29, 6, '$20 awarded to the winning player for winning Challenge ID: 16.', 'unread', '2021-02-18 11:09:58', NULL),
(30, 5, '$20 awarded to the winning player for winning Challenge ID: 16.', 'read', '2021-02-18 11:09:58', NULL),
(31, 5, 'USER 6 has accepted your Challenge! Challenge ID: 17.', 'read', '2021-02-18 11:11:22', NULL),
(32, 5, 'Both players failed to start the Challenge in time! Challenge ID: 17 has ended with No Result!', 'read', '2021-02-18 11:11:55', NULL),
(33, 6, 'Both players failed to start the Challenge in time! Challenge ID: 17 has ended with No Result!', 'read', '2021-02-18 11:11:55', NULL),
(34, 5, 'Since Challenge ID: 17 ended with No Result, the Challenge amount, $10, has been refunded to both players', 'read', '2021-02-18 11:11:56', NULL),
(35, 6, 'Since Challenge ID: 17 ended with No Result, the Challenge amount, $10, has been refunded to both players', 'read', '2021-02-18 11:11:56', NULL),
(36, 5, 'USER 6 has accepted your Challenge! Challenge ID: 18.', 'read', '2021-02-18 11:58:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tournaments_log`
--

CREATE TABLE `tournaments_log` (
  `tournament_id` int(11) NOT NULL,
  `tournament_by` int(11) NOT NULL,
  `game` varchar(255) NOT NULL,
  `console` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `players` int(11) NOT NULL,
  `game_mode` varchar(255) NOT NULL,
  `rules` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'open',
  `client_date` varchar(255) NOT NULL,
  `server_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tournaments_log`
--

INSERT INTO `tournaments_log` (`tournament_id`, `tournament_by`, `game`, `console`, `amount`, `players`, `game_mode`, `rules`, `status`, `client_date`, `server_timestamp`) VALUES
(1, 6, 'clash_of_clans', 'nintendo', 10, 2, 'Test 1', 'Test 1', 'open', 'Tue Feb 09 2021 15:55:31 GMT+0500 (Pakistan Standard Time)', '2021-02-09 10:55:31'),
(2, 6, 'clash_of_clans', 'xbox', 13, 5, 'test 2', 'test2', 'open', 'Tue Feb 09 2021 15:56:30 GMT+0500 (Pakistan Standard Time)', '2021-02-09 10:56:30'),
(3, 7, 'fifa_21', 'ps4', 10, 10, 'test1', 'test1', 'open', 'Tue Feb 09 2021 16:33:33 GMT+0500 (Pakistan Standard Time)', '2021-02-09 11:33:33'),
(4, 7, 'fortnite', 'pc', 15, 15, 'test2', 'test2', 'open', 'Tue Feb 09 2021 16:34:17 GMT+0500 (Pakistan Standard Time)', '2021-02-09 11:34:17'),
(5, 7, 'clash_of_clans', 'xbox', 20, 20, 'test3', 'test3', 'open', 'Tue Feb 09 2021 16:34:30 GMT+0500 (Pakistan Standard Time)', '2021-02-09 11:34:30'),
(6, 7, 'clash_of_clans', 'nintendo', 25, 25, 'test4', 'test4', 'open', 'Tue Feb 09 2021 16:34:46 GMT+0500 (Pakistan Standard Time)', '2021-02-09 11:34:46'),
(7, 3, 'fifa_21', 'ps4', 15, 15, 'test123', 'test123', 'open', 'Tue Feb 09 2021 16:53:03 GMT+0500 (Pakistan Standard Time)', '2021-02-09 11:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `balance` decimal(65,30) UNSIGNED NOT NULL DEFAULT 0.000000000000000000000000000000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `user_password`, `balance`) VALUES
(1, 'test username', 'test firstname', 'test lastname', 'test@email.com', '$2y$10$Ya8aXypBncmEl0CxvngNq.LM7Re4WKhigqQ6VY3mDYgN2nySED/9G', '0.000000000000000000000000000000'),
(2, 'user 2', 'first 2', 'last 2', 'test2@email.com', '$2y$10$T/OyHhWYm9zB/ACaTdmamOEZeOTmTPvRho0VQc4xhd8cOzdJgQutK', '0.000000000000000000000000000000'),
(3, 'user 3', 'first 3', 'last 3', 'test3@email.com', '$2y$10$FVoMLEU/M0SVFTw2BU6d9Oineo4RobFNTIelJ3HQcBkGWsVw3Vo5y', '85.000000000000000000000000000000'),
(4, 'user 4', 'first 4', 'last 4', 'test4@email.com', '$2y$10$4a3OLSUtHmewGhh/siaIyuY/CgajvwrsIJ5yf5R.Ch4a/73RaV43e', '25.000000000000000000000000000000'),
(5, 'user 5', 'first 5', 'last 5', 'test5@email.com', '$2y$10$XKvtqT/BxmE2ZMovzAiiCupkg64hTg58iGgfQYh8CA89T801eGAiy', '1051.452222900000000000000000000000'),
(6, 'user 6', 'first 6', 'last 6', 'test6@email.com', '$2y$10$IOZhOTW3906AtM5HP/zGi.VDE25AbhztbGP3Vkysk1p5tvx6eNOFK', '145.456789900000000000000000000000'),
(7, 'user 7', 'first 7', 'last 7', 'test7@email.com', '$2y$10$0yitpzEV6ofiGi9npHatYO7RbbtWTN.HBaMABQK/kjNMu4U9cwfcy', '905.000000000000000000000000000000'),
(8, 'user 8', 'first 8', 'last 8', 'test07@email.com', '$2y$10$5KKCpf7ER6wMP.lRIZIC5u/HSwldm80iTORIIU0rdIvvNZ/oe7hK6', '0.000000000000000000000000000000'),
(10, 'user new', 'first', 'last', 'new@email.com', '$2y$10$AE0y6PiCn3m/e2iu71rh6.QqGC/665Zkx8t3FeVoSL/FsULmTzusW', '0.000000000000000000000000000000'),
(11, 'hello', 'hello', 'world', 'hello@world.com', '$2y$10$MVcurLqKIS9sPxCO.BW2ZuqLiDuqZYIbL3bFIiH1KaDS8G0qh7A0q', '55.000000000000000000000000000000'),
(12, 'hello world', 'hello', 'world', 'hello@email.com', '$2y$10$oBGKi1yC6aDis/vUAsS9/eC0zWkoG5Lifp8vZytpLtUTcZoHDbWfi', '60.000000000000000000000000000000');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal_log`
--

CREATE TABLE `withdrawal_log` (
  `withdrawal_id` int(11) NOT NULL,
  `withdrawal_by` int(11) NOT NULL,
  `method` varchar(255) NOT NULL,
  `amount` decimal(65,30) UNSIGNED NOT NULL,
  `withdrawal_status` varchar(255) NOT NULL,
  `client_date` varchar(255) NOT NULL,
  `server_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdrawal_log`
--

INSERT INTO `withdrawal_log` (`withdrawal_id`, `withdrawal_by`, `method`, `amount`, `withdrawal_status`, `client_date`, `server_timestamp`) VALUES
(1, 5, 'Dummy Withdrawal', '20.000000000000000000000000000000', 'Success', 'Sat Feb 06 2020 16:26:45 GMT+0500 (Pakistan Standard Time)', '2020-02-06 11:26:45'),
(2, 5, 'Dummy Withdrawal', '27.000000000000000000000000000000', 'Success', 'Sat Jan 06 2020 16:27:08 GMT+0500 (Pakistan Standard Time)', '2020-01-06 11:27:08'),
(3, 5, 'Dummy Withdrawal', '123.456789000000000000000000000000', 'Success', 'Sat Jan 06 2021 16:27:37 GMT+0500 (Pakistan Standard Time)', '2021-01-06 11:27:38'),
(4, 5, 'Dummy Withdrawal', '26.000000000000000000000000000000', 'Success', 'Sat Jan 06 2021 16:28:35 GMT+0500 (Pakistan Standard Time)', '2021-01-06 11:28:35'),
(5, 5, 'Dummy Withdrawal', '25.000000000000000000000000000000', 'Success', 'Sat Feb 06 2021 16:30:14 GMT+0500 (Pakistan Standard Time)', '2021-02-06 11:30:14'),
(6, 5, 'Dummy Withdrawal', '75.620000000000000000000000000000', 'Success', 'Sat Feb 06 2021 16:30:59 GMT+0500 (Pakistan Standard Time)', '2021-02-06 11:30:59'),
(7, 5, 'Dummy Withdrawal', '235.130000000000000000000000000000', 'Success', 'Sat Feb 06 2021 16:32:28 GMT+0500 (Pakistan Standard Time)', '2021-02-06 11:32:28'),
(8, 5, 'Dummy Withdrawal', '20.000000000000000000000000000000', 'Success', 'Sat Feb 06 2021 16:46:44 GMT+0500 (Pakistan Standard Time)', '2021-02-06 11:46:44'),
(9, 5, 'Dummy Withdrawal', '25.000000000000000000000000000000', 'Success', 'Sat Feb 06 2021 16:47:27 GMT+0500 (Pakistan Standard Time)', '2021-02-06 11:47:27'),
(10, 5, 'Dummy Withdrawal', '28.000000000000000000000000000000', 'Success', 'Sat Feb 06 2021 16:57:01 GMT+0500 (Pakistan Standard Time)', '2021-02-06 11:57:01'),
(11, 5, 'Dummy Withdrawal', '98.765432100000000000000000000000', 'Success', 'Sat Feb 06 2021 17:01:25 GMT+0500 (Pakistan Standard Time)', '2021-02-06 12:01:25'),
(12, 5, 'Dummy Withdrawal', '20.000000000000000000000000000000', 'Success', 'Mon Feb 15 2021 11:15:44 GMT+0500 (Pakistan Standard Time)', '2021-02-15 06:15:44'),
(13, 11, 'Dummy Withdrawal', '20.000000000000000000000000000000', 'Success', 'Wed Feb 17 2021 09:34:36 GMT+0500 (Pakistan Standard Time)', '2021-02-17 04:34:36'),
(14, 12, 'Dummy Withdrawal', '20.000000000000000000000000000000', 'Success', 'Wed Feb 17 2021 09:58:45 GMT+0500 (Pakistan Standard Time)', '2021-02-17 04:58:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `challenges_log`
--
ALTER TABLE `challenges_log`
  ADD PRIMARY KEY (`challenge_id`);

--
-- Indexes for table `deposit_log`
--
ALTER TABLE `deposit_log`
  ADD PRIMARY KEY (`deposit_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `tournaments_log`
--
ALTER TABLE `tournaments_log`
  ADD PRIMARY KEY (`tournament_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal_log`
--
ALTER TABLE `withdrawal_log`
  ADD PRIMARY KEY (`withdrawal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `challenges_log`
--
ALTER TABLE `challenges_log`
  MODIFY `challenge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `deposit_log`
--
ALTER TABLE `deposit_log`
  MODIFY `deposit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tournaments_log`
--
ALTER TABLE `tournaments_log`
  MODIFY `tournament_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `withdrawal_log`
--
ALTER TABLE `withdrawal_log`
  MODIFY `withdrawal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
