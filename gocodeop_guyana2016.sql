-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 05, 2016 at 08:50 PM
-- Server version: 5.5.51-38.2
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gocodeop_guyana2016`
--

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE IF NOT EXISTS `merchants` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(11) NOT NULL,
  `image_link` text COLLATE utf8_unicode_ci NOT NULL,
  `location` text COLLATE utf8_unicode_ci NOT NULL,
  `code` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`id`, `name`, `balance`, `image_link`, `location`, `code`, `password`) VALUES
(1, 'A&Jâ€™s Copy Centre', 0, 'http://ajsportscentre.com.au/wp-content/uploads/2016/08/Logo.jpg', '223 Camp Street North Cummingsburg Georgetown', '03582', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 'Air Services Ltd', 0, 'http://www.aslgy.com/wp-content/themes/aslgy/images/logo.png', 'Ogle East Coast Demerara', '04353', ''),
(3, 'Cell Phone Shack', 2147483647, 'https://images.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.Md9071716e5cfc0d818a2b1cc4f428936o0%26pid%3D15.1&f=1', '176 Middle Street South Cummingsburg, Georgetown', '02614', ''),
(4, 'DÃ©cor & Gift Gallery ', 2444, '', '47 Craig and Sheriff Streets Campbellville Georgetown', '03576', ''),
(5, 'Doerga Business Entreprise', 0, '', '52 B No. 78, Corriverton Berbice', '03013', ''),
(6, 'Electronic City', 120, '', '39 Fourth and Fifth Avenue Subryanville Georgetown', '03413', ''),
(7, 'T&J DVD Club', 7245, '', '499, Foulis Village E.C.D', '02955', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `sender_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `receiver_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `amount`, `sender_id`, `receiver_id`, `date`) VALUES
(1, 800, 'FO003090M', 'AQ705', '2016-11-05 12:03:47'),
(2, 800, 'FO003090M', '5090', '2016-11-05 13:15:47'),
(3, 800, 'FO003090M', '02955', '2016-11-05 13:18:29'),
(4, 800, 'FO003090M', '02955', '2016-11-05 13:19:20'),
(5, 800, 'FO003090M', '02955', '2016-11-05 13:19:36'),
(6, 800, 'FO003090M', '02955', '2016-11-05 13:19:43'),
(7, 800, 'FO003090M', '02955', '2016-11-05 13:20:22'),
(8, 800, 'FO003090M', '02955', '2016-11-05 13:20:38'),
(9, 800, 'FO003090M', '02955', '2016-11-05 13:22:12'),
(10, 800, 'FO003090M', '02955', '2016-11-05 13:22:25'),
(11, 5000, 'FO003090M', '03582', '2016-11-05 14:27:02'),
(12, 10000, 'FO003090M', '02955', '2016-11-05 15:17:56'),
(13, 4000, 'FO003090M', '03413', '2016-11-05 15:38:20'),
(14, 6000, 'FO003090M', '03013', '2016-11-05 17:06:03'),
(15, 400, 'FO003090M', '03413', '2016-11-05 17:06:20'),
(16, 1000, 'FO003090M', '5090', '2016-11-05 18:11:22'),
(17, 5000, 'FO003090M', '5090', '2016-11-05 18:16:26'),
(18, 10, 'FO003090M', '5090', '2016-11-05 18:16:42'),
(19, 90, 'FO003090M', '5090', '2016-11-05 19:02:55'),
(20, 150, 'FO003090m', '03582', '2016-11-05 20:07:28'),
(21, 50, 'FO003090m', '5090', '2016-11-05 20:08:24'),
(22, 200, 'FO003090M', '02955', '2016-11-05 23:57:05'),
(23, 200, 'FO003090M', '02955', '2016-11-05 23:57:48'),
(24, 200, 'FO003090M', '02955', '2016-11-05 23:58:10'),
(25, 200, 'FO003090M', '02955', '2016-11-05 23:58:40'),
(26, 200, 'FO003090M', '02955', '2016-11-05 23:58:51'),
(27, 200, 'FO003090M', '02955', '2016-11-05 23:59:00'),
(28, 200, 'FO003090M', '02955', '2016-11-05 23:59:31'),
(29, 600, 'FO003090M', '02955', '2016-11-06 00:25:51'),
(30, 100, 'FO003090M', '02955', '2016-11-06 00:26:21'),
(31, 500, 'FO003090M', '02955', '2016-11-06 00:26:54'),
(32, 4000, 'FO003090M', '02955', '2016-11-06 00:31:53'),
(33, 100, 'a121095', '02955', '2016-11-06 00:35:51'),
(34, 50, 'a121095', '02955', '2016-11-06 00:37:00'),
(35, 2444, 'a121095', '03576', '2016-11-06 00:37:50'),
(36, 12, 'a121095', '5090', '2016-11-06 00:39:05'),
(37, 100, 'AQ705', '03413', '2016-11-06 00:41:20'),
(38, 50, 'FO003090M', '02955', '2016-11-06 00:50:19'),
(39, 45, 'FO003090M', '02955', '2016-11-06 00:55:16'),
(40, 10, 'AQ705', '03413', '2016-11-06 00:55:35'),
(41, 10, 'AQ705', '03413', '2016-11-06 00:57:27'),
(42, 1000, 'a121095', '02955', '2016-11-06 01:16:12'),
(43, 5.85556e27, 'a121095', '02614', '2016-11-06 01:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `image_link` text COLLATE utf8_unicode_ci NOT NULL,
  `location` text COLLATE utf8_unicode_ci NOT NULL,
  `code` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `image_link`, `location`, `code`) VALUES
(1, 'GWI', 'https://images.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.inewsguyana.com%2Fwp-content%2Fuploads%2F2013%2F09%2Fgwi-2.jpg&f=1', '', '5090');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `receiver_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `amount`, `receiver_id`, `date`) VALUES
(1, 6000, 'FO003090M', '2016-11-04 19:04:24'),
(2, 6000, 'FO003090M', '2016-11-04 19:37:37'),
(9, 5000, 'FO003090M', '2016-11-05 01:23:00'),
(8, 5000, 'FO003090M', '2016-11-05 01:22:54'),
(7, 1234, 'FO003090M', '2016-11-04 22:45:26'),
(10, 5000, 'FO003090M', '2016-11-05 01:23:12'),
(11, 5000, 'FO003090M', '2016-11-05 01:23:22'),
(12, 5000, 'FO003090M', '2016-11-05 01:23:24'),
(13, 5000, 'FO003090M', '2016-11-05 01:23:41'),
(14, 5000, 'FO003090M', '2016-11-05 01:23:49'),
(15, 5000, 'FO003090M', '2016-11-05 01:24:17'),
(16, 5000, 'FO003090M', '2016-11-05 01:24:32'),
(17, 5000, 'FO003090M', '2016-11-05 01:24:47'),
(18, 5000, 'FO003090M', '2016-11-05 01:24:50'),
(19, 5000, 'FO003090M', '2016-11-05 01:25:25'),
(20, 5000, 'FO003090M', '2016-11-05 01:26:27'),
(21, 5000, 'FO003090M', '2016-11-05 01:32:04'),
(22, 5000, 'FO003090M', '2016-11-05 01:32:30'),
(23, 5000, 'FO003090M', '2016-11-05 01:32:41'),
(24, 5000, 'FO003090M', '2016-11-05 01:32:56'),
(25, 5000, 'FO003090M', '2016-11-05 01:33:45'),
(26, 5000, 'FO003090M', '2016-11-05 01:34:04'),
(27, 5000, 'FO003090M', '2016-11-05 01:34:15'),
(28, 5000, 'FO003090M', '2016-11-05 01:35:30'),
(29, 5000, 'FO003090M', '2016-11-05 01:35:58'),
(30, 5000, 'FO003090M', '2016-11-05 01:36:17'),
(31, 5000, 'FO003090M', '2016-11-05 01:36:29'),
(32, 5000, 'FO003090M', '2016-11-05 01:36:38'),
(33, 5000, 'FO003090M', '2016-11-05 01:36:46'),
(34, 5000, 'FO003090M', '2016-11-05 01:37:00'),
(35, 5000, 'FO003090M', '2016-11-05 01:37:27'),
(36, 5000, 'FO003090M', '2016-11-05 01:38:59'),
(37, 5000, 'FO003090M', '2016-11-05 01:39:06'),
(38, 5000, 'FO003090M', '2016-11-05 01:39:13'),
(39, 5000, 'FO003090M', '2016-11-05 01:40:14'),
(40, 5000, 'FO003090M', '2016-11-05 01:41:02'),
(41, 5000, 'FO003090M', '2016-11-05 01:41:36'),
(42, 5000, 'FO003090M', '2016-11-05 01:44:17'),
(43, 5000, 'FO003090M', '2016-11-05 01:44:30'),
(44, 5000, '', '2016-11-05 01:52:39'),
(45, 2, '', '2016-11-05 01:53:38'),
(46, 5000, 'FO003090M', '2016-11-05 01:53:51'),
(47, 5000, 'FO003090M', '2016-11-05 01:55:54'),
(48, 5000, 'FO003090M', '2016-11-05 01:56:04'),
(49, 4000, 'FO003090M', '2016-11-05 02:00:14'),
(50, 0, '', '2016-11-05 11:08:43'),
(51, 4000, 'FO003090M', '2016-11-05 17:54:24'),
(52, 800, '', '2016-11-05 21:51:00'),
(53, 800, '', '2016-11-05 21:51:01'),
(54, 200, '', '2016-11-05 21:51:29'),
(55, 200, '', '2016-11-05 21:51:29'),
(56, 200, 'FO003090M', '2016-11-05 21:54:03'),
(57, 200, 'AQ705', '2016-11-05 21:54:03'),
(58, 100, 'FO003090M', '2016-11-05 23:48:53'),
(59, 100, 'AQ705', '2016-11-05 23:48:53'),
(60, 1000, 'FO003090M', '2016-11-05 23:49:42'),
(61, 1000, 'AQ705', '2016-11-05 23:49:42'),
(62, 1000, 'AQ705', '2016-11-05 23:53:33'),
(63, 100, 'FO003090M', '2016-11-06 00:23:43'),
(64, 100, 'A121095', '2016-11-06 00:23:43'),
(65, 100, 'FO003090M', '2016-11-06 00:28:22'),
(66, 100, 'AQ705', '2016-11-06 00:28:22'),
(67, 100, 'A121095', '2016-11-06 00:28:22'),
(68, 50, 'FO003090M', '2016-11-06 00:29:47'),
(69, 50, 'AQ705', '2016-11-06 00:29:47'),
(70, 50, 'A121095', '2016-11-06 00:29:47'),
(71, 1000, 'FO003090M', '2016-11-06 01:08:40'),
(72, 1000, 'AQ705', '2016-11-06 01:08:40'),
(73, 1000, 'A121095', '2016-11-06 01:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `token` text COLLATE utf8_unicode_ci NOT NULL,
  `balance` float NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spouse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `addresscode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `housenumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `houseletter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ressort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth_place` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `first_use` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `token`, `balance`, `firstname`, `lastname`, `gender`, `district`, `spouse`, `birth_date`, `addresscode`, `address`, `housenumber`, `houseletter`, `ressort`, `telephone`, `email`, `birth_place`, `password`, `active`, `created_at`, `first_use`) VALUES
('FO003090M', '', 11555, 'Mitchel', 'Pawirodinomo', 'M', 'Para', '-', '1996-09-01', '', 'Sir Winston Churchillweg', '1228', '', 'Domburg', '370390', 'pawiromitchel@hotmail.com', 'Paramaribo', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, '2016-11-04 17:56:10', 0),
('AQ705', '', 3330, 'Timothy', 'Pocorni', 'male', 'Wanica', '', '0000-00-00', '', '', '', '', '', '', '', '', '37a72090e1a30a7080c36883b0aac0bd5ef51690', 1, '2016-11-04 20:07:19', 0),
('A121095', '', -5.85556e27, 'Agon', 'Emanuel', 'male', 'Vredenburg', '', '1997-04-05', '', '', '', '', '', '', '', '', '76e7a38a97fab1798ec0943b118e07e4ae516a44', 1, '2016-11-06 00:19:25', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_payments_merchants`
--
CREATE TABLE IF NOT EXISTS `view_payments_merchants` (
`id` int(11)
,`amount` float
,`sender_id` varchar(25)
,`receiver_id` varchar(25)
,`date` timestamp
,`name` text
,`image_link` text
,`code` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_payments_services`
--
CREATE TABLE IF NOT EXISTS `view_payments_services` (
`id` int(11)
,`amount` float
,`sender_id` varchar(25)
,`receiver_id` varchar(25)
,`date` timestamp
,`name` text
,`image_link` text
,`code` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaction_w_name`
--
CREATE TABLE IF NOT EXISTS `v_transaction_w_name` (
`id` varchar(11)
,`balance` float
,`firstname` varchar(255)
,`lastname` varchar(255)
,`gender` varchar(255)
,`district` varchar(255)
,`spouse` varchar(255)
,`birth_date` date
,`addresscode` varchar(255)
,`address` varchar(255)
,`housenumber` varchar(255)
,`houseletter` varchar(255)
,`ressort` varchar(255)
,`telephone` varchar(255)
,`email` varchar(255)
,`birth_place` varchar(255)
,`password` varchar(255)
,`active` int(11)
,`created_at` timestamp
,`amount` float
,`date` timestamp
);

-- --------------------------------------------------------

--
-- Structure for view `view_payments_merchants`
--
DROP TABLE IF EXISTS `view_payments_merchants`;

CREATE ALGORITHM=UNDEFINED DEFINER=`gocodeops`@`localhost` SQL SECURITY DEFINER VIEW `view_payments_merchants` AS select `payments`.`id` AS `id`,`payments`.`amount` AS `amount`,`payments`.`sender_id` AS `sender_id`,`payments`.`receiver_id` AS `receiver_id`,`payments`.`date` AS `date`,`merchants`.`name` AS `name`,`merchants`.`image_link` AS `image_link`,`merchants`.`code` AS `code` from (`payments` join `merchants` on((`merchants`.`code` = `payments`.`receiver_id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_payments_services`
--
DROP TABLE IF EXISTS `view_payments_services`;

CREATE ALGORITHM=UNDEFINED DEFINER=`gocodeops`@`localhost` SQL SECURITY DEFINER VIEW `view_payments_services` AS select `payments`.`id` AS `id`,`payments`.`amount` AS `amount`,`payments`.`sender_id` AS `sender_id`,`payments`.`receiver_id` AS `receiver_id`,`payments`.`date` AS `date`,`services`.`name` AS `name`,`services`.`image_link` AS `image_link`,`services`.`code` AS `code` from (`payments` join `services` on((`payments`.`receiver_id` = `services`.`code`)));

-- --------------------------------------------------------

--
-- Structure for view `v_transaction_w_name`
--
DROP TABLE IF EXISTS `v_transaction_w_name`;

CREATE ALGORITHM=UNDEFINED DEFINER=`gocodeops`@`localhost` SQL SECURITY DEFINER VIEW `v_transaction_w_name` AS select `users`.`id` AS `id`,`users`.`balance` AS `balance`,`users`.`firstname` AS `firstname`,`users`.`lastname` AS `lastname`,`users`.`gender` AS `gender`,`users`.`district` AS `district`,`users`.`spouse` AS `spouse`,`users`.`birth_date` AS `birth_date`,`users`.`addresscode` AS `addresscode`,`users`.`address` AS `address`,`users`.`housenumber` AS `housenumber`,`users`.`houseletter` AS `houseletter`,`users`.`ressort` AS `ressort`,`users`.`telephone` AS `telephone`,`users`.`email` AS `email`,`users`.`birth_place` AS `birth_place`,`users`.`password` AS `password`,`users`.`active` AS `active`,`users`.`created_at` AS `created_at`,`transactions`.`amount` AS `amount`,`transactions`.`date` AS `date` from (`transactions` join `users` on((`transactions`.`receiver_id` = `users`.`id`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
