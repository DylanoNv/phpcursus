-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2026 at 04:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ideeenbus`
--

-- --------------------------------------------------------

--
-- Table structure for table `ideeen`
--

CREATE TABLE `ideeen` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `titel` varchar(150) NOT NULL,
  `bericht` text NOT NULL,
  `datum` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ideeen`
--

INSERT INTO `ideeen` (`id`, `naam`, `email`, `titel`, `bericht`, `datum`) VALUES
(1, 'test', 'test@gmail.com', 'test', '***', '2026-07-04 16:15:23'),
(2, 'test', 'test@gmail.com', 'test', '***', '2026-07-04 16:16:50'),
(3, 'test', 'test@gmail.com', 'test', 'test ***', '2026-07-04 16:17:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ideeen`
--
ALTER TABLE `ideeen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ideeen`
--
ALTER TABLE `ideeen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
