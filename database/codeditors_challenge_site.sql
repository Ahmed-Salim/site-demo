-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2021 at 12:58 PM
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
(20, 5, 'Dummy Deposit', '98.765432100000000000000000000000', 'Sat Feb 06 2021 16:40:38 GMT+0500 (Pakistan Standard Time)', '2021-02-06 11:40:38');

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
(3, 'user 3', 'first 3', 'last 3', 'test3@email.com', '$2y$10$FVoMLEU/M0SVFTw2BU6d9Oineo4RobFNTIelJ3HQcBkGWsVw3Vo5y', '0.000000000000000000000000000000'),
(4, 'user 4', 'first 4', 'last 4', 'test4@email.com', '$2y$10$4a3OLSUtHmewGhh/siaIyuY/CgajvwrsIJ5yf5R.Ch4a/73RaV43e', '25.000000000000000000000000000000'),
(5, 'user 5', 'first 5', 'last 5', 'test5@email.com', '$2y$10$XKvtqT/BxmE2ZMovzAiiCupkg64hTg58iGgfQYh8CA89T801eGAiy', '150.217655000000000000000000000000'),
(6, 'user 6', 'first 6', 'last 6', 'test6@email.com', '$2y$10$IOZhOTW3906AtM5HP/zGi.VDE25AbhztbGP3Vkysk1p5tvx6eNOFK', '123.456789900000000000000000000000'),
(7, 'user 6', 'first 6', 'last 6', 'test7@email.com', '$2y$10$0yitpzEV6ofiGi9npHatYO7RbbtWTN.HBaMABQK/kjNMu4U9cwfcy', '0.000000000000000000000000000000'),
(8, 'user 7', 'first 7', 'last 7', 'test07@email.com', '$2y$10$5KKCpf7ER6wMP.lRIZIC5u/HSwldm80iTORIIU0rdIvvNZ/oe7hK6', '0.000000000000000000000000000000'),
(10, 'user new', 'first', 'last', 'new@email.com', '$2y$10$AE0y6PiCn3m/e2iu71rh6.QqGC/665Zkx8t3FeVoSL/FsULmTzusW', '0.000000000000000000000000000000');

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
(10, 5, 'Dummy Withdrawal', '28.000000000000000000000000000000', 'Success', 'Sat Feb 06 2021 16:57:01 GMT+0500 (Pakistan Standard Time)', '2021-02-06 11:57:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deposit_log`
--
ALTER TABLE `deposit_log`
  ADD PRIMARY KEY (`deposit_id`);

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
-- AUTO_INCREMENT for table `deposit_log`
--
ALTER TABLE `deposit_log`
  MODIFY `deposit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `withdrawal_log`
--
ALTER TABLE `withdrawal_log`
  MODIFY `withdrawal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
