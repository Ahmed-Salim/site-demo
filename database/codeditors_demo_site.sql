-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 05:47 AM
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
-- Database: `codeditors_demo_site`
--

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
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `user_password`) VALUES
(1, 'test username', 'test firstname', 'test lastname', 'test@email.com', '$2y$10$Ya8aXypBncmEl0CxvngNq.LM7Re4WKhigqQ6VY3mDYgN2nySED/9G'),
(2, 'user 2', 'first 2', 'last 2', 'test2@email.com', '$2y$10$T/OyHhWYm9zB/ACaTdmamOEZeOTmTPvRho0VQc4xhd8cOzdJgQutK'),
(3, 'user 3', 'first 3', 'last 3', 'test3@email.com', '$2y$10$FVoMLEU/M0SVFTw2BU6d9Oineo4RobFNTIelJ3HQcBkGWsVw3Vo5y'),
(4, 'user 4', 'first 4', 'last 4', 'test4@email.com', '$2y$10$4a3OLSUtHmewGhh/siaIyuY/CgajvwrsIJ5yf5R.Ch4a/73RaV43e'),
(5, 'user 5', 'first 5', 'last 5', 'test5@email.com', '$2y$10$76Ztgl6AmtB6Dsu/v0ksm.NPFgXyxNlC57nPOKFmWOmyJFLj8kyuC'),
(6, 'user 6', 'first 6', 'last 6', 'test6@email.com', '$2y$10$IOZhOTW3906AtM5HP/zGi.VDE25AbhztbGP3Vkysk1p5tvx6eNOFK'),
(7, 'user 6', 'first 6', 'last 6', 'test7@email.com', '$2y$10$0yitpzEV6ofiGi9npHatYO7RbbtWTN.HBaMABQK/kjNMu4U9cwfcy'),
(8, 'user 7', 'first 7', 'last 7', 'test07@email.com', '$2y$10$5KKCpf7ER6wMP.lRIZIC5u/HSwldm80iTORIIU0rdIvvNZ/oe7hK6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
