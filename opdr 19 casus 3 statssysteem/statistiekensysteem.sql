-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2026 at 11:56 AM
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
-- Database: `statistiekensysteem`
--

-- --------------------------------------------------------

--
-- Table structure for table `bezoekers`
--

CREATE TABLE `bezoekers` (
  `id` int(11) NOT NULL,
  `land` varchar(100) DEFAULT NULL,
  `ip_adres` varchar(45) DEFAULT NULL,
  `provider` varchar(100) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `datum_tijd` datetime DEFAULT NULL,
  `referer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bezoekers`
--

INSERT INTO `bezoekers` (`id`, `land`, `ip_adres`, `provider`, `browser`, `datum_tijd`, `referer`) VALUES
(1, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(2, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(3, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(4, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(5, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(6, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(7, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(8, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(9, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(10, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(11, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(12, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(14, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(15, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(16, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(17, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(18, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(19, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(20, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(21, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(22, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(23, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(24, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(25, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(29, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(30, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(31, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(32, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(33, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(34, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(35, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(36, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(37, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(38, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(39, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(40, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(41, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(42, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(43, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(44, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(45, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(46, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(47, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(48, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(49, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(50, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(51, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(52, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(60, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(61, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(62, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(63, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(64, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(65, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(66, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(67, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(68, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(69, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(70, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(71, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(72, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(73, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(74, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(75, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(76, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(77, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(78, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(79, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(80, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(81, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(82, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(83, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(84, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(85, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(86, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(87, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(88, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(89, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(90, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(91, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(92, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(93, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(94, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(95, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(96, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(97, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(98, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(99, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(100, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(101, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(102, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(103, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(104, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(105, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(106, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(107, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(123, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(124, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(125, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(126, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(127, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(128, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(129, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(130, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(131, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(132, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(133, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(134, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(135, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(136, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(137, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(138, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(139, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(140, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(141, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(142, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(143, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(144, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(145, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(146, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(147, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(148, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(149, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(150, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(151, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(152, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(153, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(154, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(155, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(156, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(157, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(158, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(159, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(160, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(161, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(162, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(163, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(164, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(165, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(166, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(167, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(168, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(169, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(170, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(171, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(172, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(173, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(174, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(175, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(176, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(177, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(178, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(179, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(180, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(181, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(182, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(183, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(184, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(185, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(186, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(187, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(188, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(189, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(190, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(191, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(192, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(193, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(194, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(195, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(196, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(197, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(198, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(199, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(200, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(201, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(202, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(203, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(204, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(205, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(206, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(207, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(208, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(209, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(210, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(211, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(212, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(213, 'Nederland', '192.168.1.1', 'Ziggo', 'Chrome', '2026-01-01 10:00:00', 'google.nl'),
(214, 'Belgie', '192.168.1.2', 'Telenet', 'Firefox', '2026-02-01 11:00:00', 'bing.com'),
(215, 'Duitsland', '192.168.1.3', 'Vodafone', 'Edge', '2026-03-01 12:00:00', 'facebook.com'),
(216, 'Frankrijk', '192.168.1.4', 'Orange', 'Chrome', '2026-04-01 13:00:00', 'instagram.com'),
(217, 'Spanje', '192.168.1.5', 'Movistar', 'Safari', '2026-05-01 14:00:00', 'youtube.com'),
(218, 'Belgie', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:53:46', 'http://localhost/Php/PHP/'),
(250, 'Nederland', '192.168.1.218', 'Vodafone', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:54:23', 'http://localhost/Php/PHP/'),
(251, 'Frankrijk', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:54:49', 'http://localhost/Php/PHP/opdr%2019%20casus%203%20statssysteem/'),
(252, 'Duitsland', '192.168.1.218', 'Ziggo', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:54:54', 'http://localhost/Php/PHP/opdr%2019%20casus%203%20statssysteem/?land=Belgie&maand='),
(253, 'Frankrijk', '192.168.1.218', 'T-Mobile', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:54:57', 'http://localhost/Php/PHP/opdr%2019%20casus%203%20statssysteem/?land=Belgie&maand=3'),
(254, 'Duitsland', '192.168.1.218', 'Ziggo', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:54:58', 'http://localhost/Php/PHP/opdr%2019%20casus%203%20statssysteem/?land=Belgie&maand=4'),
(255, 'Belgie', '192.168.1.218', 'Odido', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:55:00', 'http://localhost/Php/PHP/opdr%2019%20casus%203%20statssysteem/?land=Belgie&maand=8'),
(256, 'Nederland', '192.168.1.218', 'T-Mobile', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:55:01', 'http://localhost/Php/PHP/opdr%2019%20casus%203%20statssysteem/?land=Belgie&maand=10'),
(257, 'Spanje', '192.168.1.218', 'Vodafone', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:55:03', 'http://localhost/Php/PHP/opdr%2019%20casus%203%20statssysteem/?land=Belgie&maand=12'),
(258, 'Duitsland', '192.168.1.218', 'Vodafone', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:55:05', 'http://localhost/Php/PHP/opdr%2019%20casus%203%20statssysteem/?land=&maand=12'),
(259, 'Nederland', '192.168.1.218', 'T-Mobile', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:55:07', 'http://localhost/Php/PHP/opdr%2019%20casus%203%20statssysteem/?land=&maand=12'),
(260, 'Spanje', '192.168.1.218', 'KPN', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:55:12', 'http://localhost/Php/PHP/opdr%2019%20casus%203%20statssysteem/?land=&maand='),
(261, 'Nederland', '192.168.1.218', 'Vodafone', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:151.0) Gecko/20100101 Firefox/151.0', '2026-05-29 11:55:17', 'http://localhost/Php/PHP/opdr%2019%20casus%203%20statssysteem/?land=&maand=2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bezoekers`
--
ALTER TABLE `bezoekers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bezoekers`
--
ALTER TABLE `bezoekers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
