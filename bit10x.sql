-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 19, 2021 at 05:46 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bit10x`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `dated`) VALUES
(1, 'admin@bit10x.com', 'e6e061838856bf47e1de730719fb2609', '2019-12-05 11:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(100) NOT NULL,
  `province_id` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11834 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`, `province_id`, `status`, `is_deleted`) VALUES
(11817, 'Test city1', 22, '1', 0),
(11818, 'Test city 2', 22, '1', 0),
(11821, 'Johannesburg', 4, '1', 0),
(11822, 'Durban', 5, '1', 0),
(11823, 'Ballito', 5, '1', 1),
(11824, 'Pretoria', 4, '1', 0),
(11825, 'Krugersdorp', 4, '1', 1),
(11826, 'Port Shepstone', 5, '1', 1),
(11827, 'Newcastle', 5, '1', 1),
(11828, 'Benoni', 4, '1', 1),
(11829, 'Ekurhuleni', 4, '1', 0),
(11830, 'Umhlanga', 5, '1', 0),
(11831, 'Westville', 5, '1', 0),
(11832, 'Pinetown', 5, '1', 0),
(11833, 'Cape Town', 3, '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coins`
--

DROP TABLE IF EXISTS `coins`;
CREATE TABLE IF NOT EXISTS `coins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coin` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coins`
--

INSERT INTO `coins` (`id`, `coin`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'BTCUSDT', '1', 0, '2021-04-15 17:18:45', '2021-04-15 17:18:45'),
(2, 'ETHUSDT', '1', 0, '2021-04-15 17:18:45', '2021-04-15 17:18:45'),
(3, 'ADAUSDTa', '1', 0, '2021-04-15 13:52:47', '2021-04-15 13:52:47'),
(4, 'NEOUSDT', '1', 0, '2021-04-15 17:18:45', '2021-04-15 17:18:45'),
(5, 'ADAUSDTs', '1', 1, '2021-04-15 13:48:50', '2021-04-15 13:49:04'),
(6, 'ADAUSDTss', '1', 1, '2021-04-15 13:49:49', '2021-04-15 13:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `content_pages`
--

DROP TABLE IF EXISTS `content_pages`;
CREATE TABLE IF NOT EXISTS `content_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text,
  `status` tinyint(4) NOT NULL,
  `policyfile` varchar(160) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_pages`
--

INSERT INTO `content_pages` (`id`, `title`, `content`, `status`, `policyfile`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Terms and Condition', 'Terms and Condition Content', 1, '201029114357DCS Terms and conditions 01102020.pdf', 0, '2021-04-15 16:14:16', '2021-04-15 16:14:16'),
(2, 'Privacy Policy', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '201029114326DCS Block Alpha Privacy Policy 01102020.pdf', 0, '2021-04-15 16:14:16', '2021-04-15 16:14:16'),
(3, 'POPI', '', 1, '201029114250DCS - POPI POLICY DOCUMENT 01102020.pdf', 0, '2021-04-15 16:14:16', '2021-04-15 16:14:16'),
(6, 'test video1', NULL, 2, '210415124659', 1, '2021-04-15 12:46:59', '2021-04-15 12:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `coin_id` int(11) NOT NULL,
  `rand_price` float NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `slider_percent` float NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `province`, `status`, `is_deleted`) VALUES
(1, 'Eastern Cape', '1', 1),
(2, 'Mpumalanga', '1', 1),
(3, 'Western Cape', '1', 0),
(4, 'Gauteng', '1', 0),
(5, 'KwaZulu Natal', '1', 0),
(6, 'North West', '1', 1),
(7, 'Northern Cape', '1', 1),
(8, 'Free State', '1', 1),
(9, 'Limpopo', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suburb`
--

DROP TABLE IF EXISTS `suburb`;
CREATE TABLE IF NOT EXISTS `suburb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `suburb` varchar(255) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `prov_id` (`city_id`),
  KEY `suburb_name` (`suburb`)
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suburb`
--

INSERT INTO `suburb` (`id`, `city_id`, `suburb`, `is_deleted`, `status`) VALUES
(31, 11817, 'Panchavati', 0, 1),
(32, 11817, 'Satpur', 0, 1),
(33, 11818, 'Andheri', 0, 1),
(34, 11818, 'Boravali', 0, 1),
(35, 11818, 'Juhu', 0, 1),
(48, 11820, 'Sandton', 0, 1),
(49, 11820, 'Rosebank', 0, 1),
(50, 11821, 'Sandton', 1, 1),
(51, 11821, 'Sandton', 0, 1),
(52, 11821, 'Rosebank', 0, 1),
(53, 11822, 'Glenwood', 0, 1),
(54, 11822, 'Durban North', 0, 1),
(55, 11822, 'Berea', 0, 1),
(56, 11822, 'Westville', 1, 1),
(57, 11821, 'Bryanston', 0, 1),
(58, 11821, 'Fourways', 0, 1),
(59, 11821, 'Boskruin', 1, 1),
(60, 11821, 'Fairland', 1, 1),
(61, 11821, 'Northcliff', 1, 1),
(62, 11821, 'Randburg', 1, 1),
(63, 11821, 'Cresta', 1, 1),
(64, 11821, 'Darrenwood', 1, 1),
(65, 11821, 'Benmore Gardens', 1, 1),
(66, 11821, 'Hyde Park', 1, 1),
(67, 11821, 'Kyalami', 0, 1),
(68, 11821, 'Sunninghill', 0, 1),
(69, 11821, 'Cresta', 0, 1),
(70, 11821, 'Roodepoort', 0, 1),
(71, 11821, 'Dobsonville', 0, 1),
(72, 11821, 'Protea City', 0, 1),
(73, 11821, 'Soweto', 0, 1),
(74, 11821, 'Lenasia', 0, 1),
(75, 11821, 'Ennerdale', 0, 1),
(76, 11821, 'Eikenhof', 0, 1),
(77, 11821, 'Orlando', 0, 1),
(78, 11821, 'Meredale', 0, 1),
(79, 11821, 'Turffontein', 0, 1),
(80, 11821, 'Johannesburg CBD', 0, 1),
(81, 11821, 'Florida', 0, 1),
(82, 11821, 'Newlands', 0, 1),
(83, 11821, 'Rosebank', 1, 1),
(84, 11821, 'Braamfontein', 0, 1),
(85, 11821, 'Bruma', 0, 1),
(86, 11821, 'Alexandra', 0, 1),
(87, 11821, 'Melrose', 0, 1),
(88, 11821, 'Melrose', 1, 1),
(89, 11821, 'Hyde Park', 0, 1),
(90, 11821, 'Midrand', 0, 1),
(91, 11821, 'Randburg', 0, 1),
(92, 11821, 'Greenside', 0, 1),
(93, 11821, 'Parktown', 0, 1),
(94, 11821, 'Parkhurst', 0, 1),
(95, 11821, 'Parkmore', 0, 1),
(96, 11821, 'Auckland Park', 0, 1),
(97, 11821, 'Lonehill', 0, 1),
(98, 11821, 'Illovo', 0, 1),
(99, 11821, 'Craighall', 0, 1),
(100, 11821, 'Olivedale', 0, 1),
(101, 11821, 'Hurlingham', 0, 1),
(102, 11821, 'Douglasdale', 0, 1),
(103, 11821, 'Saxonwold', 0, 1),
(104, 11824, 'Akasia', 0, 1),
(105, 11824, 'Theresa Park', 0, 1),
(106, 11824, 'Pretoria North', 0, 1),
(107, 11824, 'Pretoria CBD', 0, 1),
(108, 11824, 'Wierda Park', 0, 1),
(109, 11824, 'Centurion', 0, 1),
(110, 11824, 'Kosmosdal', 0, 1),
(111, 11824, 'Irene', 0, 1),
(112, 11824, 'Silver Lakes', 0, 1),
(113, 11824, 'Menlyn', 0, 1),
(114, 11824, 'Waterfkloof', 0, 1),
(115, 11824, 'Hatfield', 0, 1),
(116, 11824, 'Meyerspark', 0, 1),
(117, 11824, 'Gezina', 0, 1),
(118, 11824, 'Wonderboom', 0, 1),
(119, 11824, 'Montana', 0, 1),
(120, 11829, 'Germiston', 0, 1),
(121, 11829, 'Bedfordview', 0, 1),
(122, 11829, 'Edenvale', 0, 1),
(123, 11829, 'Kempton Park', 0, 1),
(124, 11829, 'Birchleigh', 0, 1),
(125, 11829, 'Benoni', 0, 1),
(126, 11829, 'Daveyton', 0, 1),
(127, 11829, 'Springs', 0, 1),
(128, 11829, 'Meyersdale', 0, 1),
(129, 11822, 'Durban South', 0, 1),
(130, 11822, 'Bellair', 0, 1),
(131, 11822, 'Umbilo', 0, 1),
(132, 11822, 'Maydon Wharf', 0, 1),
(133, 11822, 'Bulwer', 0, 1),
(134, 11822, 'Westridge', 0, 1),
(135, 11822, 'Ridgeview', 0, 1),
(136, 11822, 'Cato Manor', 0, 1),
(137, 11822, 'Berea', 1, 1),
(138, 11822, 'Durban Point', 0, 1),
(139, 11822, 'North Beach', 0, 1),
(140, 11822, 'Essenwood', 0, 1),
(141, 11822, 'Overport', 0, 1),
(142, 11822, 'Morningside', 0, 1),
(143, 11822, 'Sydenham', 0, 1),
(144, 11822, 'Springfield', 0, 1),
(145, 11822, 'Umgeni', 0, 1),
(146, 11822, 'Morningside', 1, 1),
(147, 11822, 'Musgrave', 0, 1),
(148, 11822, 'Virginia', 0, 1),
(149, 11822, 'Athlone', 0, 1),
(150, 11822, 'Beachwood', 0, 1),
(151, 11822, 'Glen Ashley', 0, 1),
(152, 11822, 'La Lucia', 0, 1),
(153, 11830, 'Umhlanga Rocks', 0, 1),
(154, 11830, 'Umhlanga Ridge', 0, 1),
(155, 11830, 'Somerset Park', 0, 1),
(156, 11830, 'Mount Edgecombe', 0, 1),
(157, 11830, 'Prestondale', 0, 1),
(158, 11830, 'Woodlands', 0, 1),
(159, 11830, 'Herrwood Park', 0, 1),
(160, 11831, 'Dawncliffe', 0, 1),
(161, 11831, 'Westville', 0, 1),
(162, 11831, 'Chiltern Hills', 0, 1),
(163, 11831, 'Atholl Heights', 0, 1),
(164, 11832, 'Cowies Hill', 0, 1),
(165, 11832, 'Farningham Ridge', 0, 1),
(166, 11832, 'Hatton Estate', 0, 1),
(167, 11832, 'Ashley', 0, 1),
(168, 11832, 'Pinetown', 0, 1),
(169, 11832, 'Marianhill', 0, 1),
(170, 11832, 'Westmead', 0, 1),
(171, 11832, 'Mahogany Ridge', 0, 1),
(172, 11833, 'Bloubergstrand', 0, 1),
(173, 11833, 'Milnerton', 0, 1),
(174, 11833, 'Century City', 0, 1),
(175, 11833, 'Parow', 0, 1),
(176, 11833, 'Belville', 0, 1),
(177, 11833, 'Durbanville', 0, 1),
(178, 11833, 'Kraaifontein', 0, 1),
(179, 11833, 'Brackenfell', 0, 1),
(180, 11833, 'Kuils River', 0, 1),
(181, 11833, 'Matroosfontein', 0, 1),
(182, 11833, 'Blue Downs', 0, 1),
(183, 11833, 'Khayelitsha', 0, 1),
(184, 11833, 'Mitchells Plain', 0, 1),
(185, 11833, 'Philippi', 0, 1),
(186, 11833, 'Rondebosch', 0, 1),
(187, 11833, 'Claremont', 0, 1),
(188, 11833, 'Cape Town CBD', 0, 1),
(189, 11833, 'Kenilworth', 0, 1),
(190, 11833, 'Wynberg', 0, 1),
(191, 11833, 'Plumstead', 0, 1),
(192, 11833, 'Constantia', 0, 1),
(193, 11833, 'Hout Bay', 0, 1),
(194, 11833, 'Muizenberg', 0, 1),
(195, 11833, 'Fish Hoek', 0, 1),
(196, 11833, 'Simon\'s Town', 0, 1),
(197, 11833, 'Sea Point', 0, 1),
(198, 11833, 'Bantry Bay', 0, 1),
(199, 11833, 'Camps Bay', 0, 1),
(200, 11833, 'Clifton', 0, 1),
(201, 11833, 'V&A Waterfront', 0, 1),
(202, 11833, 'Edgemead', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(160) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `profile_pic` text,
  `is_verified` enum('0','1') NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `account_id` varchar(40) NOT NULL,
  `account_holder_name` varchar(160) NOT NULL,
  `ifsc_code` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `province_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `suburb_id` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `phone`, `profile_pic`, `is_verified`, `status`, `account_id`, `account_holder_name`, `ifsc_code`, `address`, `province_id`, `city_id`, `suburb_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'priyanka', 'shinde', 'priyanka.techbee@gmail.com1', 'bf5dd579cc382d5e800050e37fa28bdd', '1234567890', '', '1', 1, '', '', '', '', 0, 0, 0, 1, '2021-04-13 17:08:44', '2021-04-15 10:44:01'),
(2, 'priyanka', 'shinde', 'priyanka.techbee@gmail.com', 'bf5dd579cc382d5e800050e37fa28bdd', '4398573893', NULL, '1', 1, '34243253', 'priyanka', 'ifsc code', 'full address', 4, 11821, 70, 0, '2021-04-13 14:38:32', '2021-04-13 14:38:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
