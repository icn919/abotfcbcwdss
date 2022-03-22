-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 23, 2021 at 05:41 AM
-- Server version: 10.4.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u544654944_celyrosa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `plate_num` varchar(100) NOT NULL,
  `body_num` varchar(100) NOT NULL,
  `vin_num` varchar(100) NOT NULL,
  `seat_cap` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `plate_num`, `body_num`, `vin_num`, `seat_cap`) VALUES
(1, 'PXB187', '88849', 'MV3012412541254222', 40);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `date_publish` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comments`, `status`, `date_publish`) VALUES
(23, 'Ivan Carl Nazaire', 'Hello master', '', '2021-06-07 06:17:39'),
(24, 'Gary Veloria', 'haha', '', '2021-06-07 06:17:59'),
(29, 'Judy Caranto', 'Hakdog', '', '2021-06-07 06:42:25'),
(32, 'Judy Caranto', 'Chat? Want? Haha', '', '2021-06-07 06:43:21'),
(33, 'Judy Caranto', 'Pm me haha', '', '2021-06-07 06:43:56'),
(34, 'Gary Veloria', 'HAHA LT', '', '2021-06-07 06:44:01'),
(35, 'Gary Veloria', 'ayusin na design ang lalake ng box eh', '', '2021-06-07 06:44:47'),
(36, 'Ivan Carl Nazaire', 'HAHAHAHA', '', '2021-06-07 06:58:48'),
(37, 'Judy Caranto', 'Yey haha', '', '2021-06-07 15:23:30'),
(38, 'Gary Veloria', 'hahatdog', '', '2021-06-07 15:29:06'),
(39, 'Gary Veloria', 'dito na kayo mag usap. try naten pahabain ung convo para malagyan ko ng limit pag sobrang haba na', '', '2021-06-07 15:29:54'),
(40, 'Judy Caranto', 'Kuya napalitan profile ko?', '', '2021-06-07 15:30:27'),
(41, 'Gary Veloria', 'Anong profile?', '', '2021-06-07 15:30:57'),
(42, 'Judy Caranto', 'Kita mo ba pag nilagyan ng image yung profile,?', '', '2021-06-07 15:31:46'),
(43, 'Gary Veloria', 'Ay hindi haha.', '', '2021-06-07 15:32:45'),
(44, 'Gary Veloria', 'Lagyan paba naten ng image dito sa chat?', '', '2021-06-07 15:33:08'),
(45, 'Judy Caranto', 'D nga? Haha', '', '2021-06-07 15:33:10'),
(46, 'Judy Caranto', 'Yung acct  profile ko lang nilagyan ko lang ng image haha', '', '2021-06-07 15:34:16'),
(47, 'Gary Veloria', 'Ahh. Ikaw lang makakakita non pag naka login ka gamit account mo', '', '2021-06-07 15:45:19'),
(48, 'Judy Caranto', 'Ahh hahaha .  Pahinga kna kuya', '', '2021-06-07 15:47:05'),
(49, 'Claude Bengx', 'yow wats up', '', '2021-06-07 15:53:08'),
(50, 'Gary Veloria', 'Yow yow', '', '2021-06-07 15:56:58'),
(51, 'Claude Bengx', 'eheheheh', '', '2021-06-07 15:57:51'),
(52, 'Claude Bengx', 'tolog naaaaa', '', '2021-06-07 15:57:58'),
(53, 'Gary Veloria', 'Mas ok nasa unahan ung bagong message', '', '2021-06-07 15:58:09'),
(55, 'Judy Caranto', 'Ayan nayswan', '', '2021-06-07 15:59:41'),
(157, 'Gary Veloria', 'YAWA haha', 'read', '2021-06-22 22:47:22'),
(158, 'Gary Veloria', 'Haha', 'read', '2021-06-22 23:57:08'),
(159, 'Gary Veloria', 'Hey', 'read', '2021-06-23 08:56:09'),
(160, 'Judy Caranto', 'Yown', 'read', '2021-06-23 13:55:28'),
(167, 'Judy Caranto', 'Hey', 'read', '2021-06-23 19:45:23'),
(168, 'Judy Caranto', 'Low', 'read', '2021-06-23 19:45:38'),
(170, 'Gary Veloria', 'Mic test', 'read', '2021-06-23 22:54:31'),
(173, 'Judy Caranto', 'Dito na boss', 'read', '2021-06-24 17:15:24'),
(174, 'Ivan Carl Nazaire', 'Flat kami boss', 'read', '2021-06-25 20:58:56');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `date_removed` datetime DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phonenumber`, `email`, `username`, `password`, `user_level`, `image`, `status`, `last_login`, `date_removed`, `note`) VALUES
(1, 'Kevin Espinosa', '09274244462', 'k.espinosa@gmail.com', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'qktuqhw1.jpg', 1, '2021-07-14 09:55:18', NULL, NULL),
(3, 'Default User', '092232536234', 'newdefault@email.com', 'User', '12dea96fec20593566ab75692c9949596833adc9', 3, 'no_image.jpg', 1, '2021-04-28 00:00:00', NULL, NULL),
(8, 'Judy Caranto', '0912345678', 'judy@email.com', 'Juds', '8889943a13580de1a90dfa124dc3f8d77efe6929', 2, '7a9mnxjf8.jpg', 1, '2021-06-26 12:51:48', NULL, NULL),
(10, 'joseph matudio', '09231234567', 'joseph@email.com', 'joseph', 'cf8a9d3177d4c046f4570ea7db511bef48a2c70e', 2, 'no_image.jpg', 1, '2021-06-27 18:50:58', NULL, NULL),
(11, 'Claude Bengx', '09062341234', 'claude@email.com', 'claude', '9b585b60ae5f07cef53c7d36cdf8e0f61aec606f', 1, 'no_image.jpg', 1, '2021-06-27 18:38:30', NULL, NULL),
(12, 'Mark Castro', '09212345675', 'Mark@email.com', 'Mark', 'b70662cdd0f98f819bbea833303d163d6233d59b', 2, 'no_image.jpg', 1, '2021-06-21 16:59:17', NULL, NULL),
(14, 'Kean', '09123456789', 'elijah@email.com', 'Kean', '0fc0220cbe6eb2745b452030845b9bc712211558', 3, 'no_image.jpg', 1, '2021-06-22 04:00:24', NULL, NULL),
(15, 'Ivan Carl Nazaire', '09071229657', 'ivan@email.com', 'Ivan', '09531e9b778e3f9dc87a04cf231b61953101a967', 2, '1r7mv83e15.jpg', 1, '2021-06-26 09:56:56', NULL, NULL),
(18, 'samplestaff', '123123', 'sample@email.com', 'sample', 'k>u)wu9zMJ]JTj.', 2, 'no_image.jpg', 0, '2021-06-08 09:37:05', '2021-06-18 17:21:00', 'sampledelete'),
(19, 'Summer Sides', '0923212334', 'sum@email.com', 'Sum', 'k>u)wu9zMJ]JTj.', 2, 'no_image.jpg', 0, NULL, '2021-06-26 09:47:23', 'test deleted'),
(20, 'Gary T. Veloria', '09274244462', 'gveloria@gmail.com', 'gveloria', 'd4e8e6deaa7b1f8381e09e3e6b83e36f0b681c5c', 1, 'vyhj4e2020.jpg', 1, '2021-06-29 13:21:27', NULL, NULL),
(22, 'Test Username', '09254854754', 'test1@email.com', 'Test', 'k>u)wu9zMJ]JTj.', 2, 'no_image.jpg', 0, NULL, '2021-06-28 10:24:57', 'this always late');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Admin', 1, 1),
(2, 'Bus Company Staff', 2, 1),
(3, 'Others', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_level` (`user_level`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
