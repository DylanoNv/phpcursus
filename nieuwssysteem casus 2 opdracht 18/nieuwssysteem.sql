-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2026 at 01:38 PM
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
-- Database: `nieuwssysteem`
--

-- --------------------------------------------------------

--
-- Table structure for table `berichten`
--

CREATE TABLE `berichten` (
  `id` int(11) NOT NULL,
  `titel` varchar(150) NOT NULL,
  `inhoud` text NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `gelezen` int(11) DEFAULT 0,
  `datum` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berichten`
--

INSERT INTO `berichten` (`id`, `titel`, `inhoud`, `categorie_id`, `gelezen`, `datum`) VALUES
(1, 'Nieuwe game aangekondigd', 'Er is vandaag een nieuwe game aangekondigd.', 4, 7, '2026-05-21 12:12:35'),
(2, 'Voetbalclub wint finale', 'De club heeft de finale gewonnen na penalty’s.', 1, 0, '2026-05-21 12:12:35'),
(3, 'Nieuwe regels in Nederland', 'Er zijn nieuwe regels aangekondigd door de overheid.', 2, 0, '2026-05-21 12:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `categorieen`
--

CREATE TABLE `categorieen` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorieen`
--

INSERT INTO `categorieen` (`id`, `naam`) VALUES
(1, 'Sport'),
(2, 'Binnenland'),
(3, 'Buitenland'),
(4, 'Technologie'),
(5, 'Entertainment');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '1234', 'admin'),
(2, 'bezoeker', '1234', 'bezoeker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berichten`
--
ALTER TABLE `berichten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorieen`
--
ALTER TABLE `categorieen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berichten`
--
ALTER TABLE `berichten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categorieen`
--
ALTER TABLE `categorieen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
