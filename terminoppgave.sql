-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 03:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `terminoppgave`
--

-- --------------------------------------------------------

--
-- Table structure for table `bord`
--

CREATE TABLE `bord` (
  `id` int(11) NOT NULL,
  `dato` date NOT NULL,
  `Nr` varchar(10) NOT NULL,
  `navn` varchar(40) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bord`
--

INSERT INTO `bord` (`id`, `dato`, `Nr`, `navn`, `komentar`, `tid`) VALUES
(1, '2024-04-04', 'ett', 'pål', '', 7),
(2, '2023-11-16', 'ett', 'per', '', 4),
(3, '2023-11-15', 'fire', 'tias', 'sulten', 7),
(4, '2023-11-15', 'seks', 'tias', 'sulten', 6),
(5, '2024-02-22', 'tre', 'petter', 'f o o d ', 8),
(7, '0000-00-00', 'to', 'Laks', 'F Æ S K', 1),
(8, '0000-00-00', 'seks', 'matisa', 'sultena', 3),
(9, '0000-00-00', 'fire', '', 'sulten', 5),
(10, '0000-00-00', 'fire', '', 'sulten', 5),
(11, '0000-00-00', 'to', '', '', 1),
(12, '0000-00-00', 'to', '', '', 1),
(13, '0000-00-00', '', '', '', 0),
(14, '0000-00-00', '', '', '', 0),
(15, '0000-00-00', '', '', '', 0),
(16, '0000-00-00', 'tre', 'tomas', 'tog sulten', 3),
(17, '0000-00-00', 'ett', 'tomas', 'tomas sulten', 3),
(18, '0000-00-00', 'ett', 'tias', 'gfiougoihyheeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 5),
(19, '0000-00-00', 'to', 'me', 'dwd', 5),
(20, '0000-00-00', 'to', 'scds', 'ti', 7),
(21, '0000-00-00', 'tre', 'tomas', 'toger', 10);

-- --------------------------------------------------------

--
-- Table structure for table `borgar`
--

CREATE TABLE `borgar` (
  `id` int(11) NOT NULL,
  `brukernavn` varchar(40) NOT NULL,
  `tid` datetime NOT NULL,
  `drop0` varchar(40) NOT NULL,
  `drop1` varchar(40) NOT NULL,
  `drop2` varchar(40) NOT NULL,
  `drop3` varchar(40) NOT NULL,
  `drop4` varchar(40) NOT NULL,
  `drop5` varchar(40) NOT NULL,
  `drop6` varchar(40) NOT NULL,
  `drop7` varchar(40) NOT NULL,
  `drop8` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borgar`
--

INSERT INTO `borgar` (`id`, `brukernavn`, `tid`, `drop0`, `drop1`, `drop2`, `drop3`, `drop4`, `drop5`, `drop6`, `drop7`, `drop8`, `status`) VALUES
(22, 'Navnløss', '2024-02-28 13:02:32', 'topb.png', 'tomatoes.png', 'let.jpg', 'agurk.png', 'lok.png', 'cheddar-cheese.jpg', 'patty.avif', 'majones.png', 'none', '');

-- --------------------------------------------------------

--
-- Table structure for table `reviw`
--

CREATE TABLE `reviw` (
  `id` int(11) NOT NULL,
  `brukere` varchar(200) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `stjerner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviw`
--

INSERT INTO `reviw` (`id`, `brukere`, `komentar`, `stjerner`) VALUES
(1, 'ole', 'det smakte burger', 4),
(2, 'ANONYM', 'Burger good, yasss', 5),
(10, 'ANONYM', 'me like food', 3),
(12, 'Navnløss', 'AAAAAAAAAAAAAAAAAAAAAA\r\n', 3),
(13, 'tias', 'yEET', 1),
(14, 'tias', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAHHHHHHHHHHHHHHHHHHHHHHH', 4),
(19, 'Navnløss', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAHHHHHHHHHHHHHHHHHHHHHHH', 4),
(24, 'Navnløss', 'Erik approves', 5),
(25, 'Navnløss', 'aaaaaaaaaaa', 5),
(26, 'Almighty Admin', 'burger yum yum in tummy', 4),
(27, 'Almighty Admin', '.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkøllllllllllllllllllll.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk\r\nlllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk.nkølllllllllllllllllllllllllllllllllllllkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `brukernavn` varchar(20) NOT NULL,
  `mld` longtext NOT NULL,
  `tid` datetime NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `brukernavn`, `mld`, `tid`, `status`) VALUES
(16, 'Anonym', 'happy eyeballs', '2024-01-26 13:20:49', 'jobbes'),
(17, 'Anonym', 'hjelp meg, jeg vill ha hjelp', '2024-01-29 13:04:15', 'jobbes'),
(18, 'Anonym', 'hjelp\r\n', '2024-01-29 13:29:42', 'venter'),
(19, 'Anonym', 'hjeelp', '2024-01-29 13:29:50', 'venter'),
(20, 'Anonym', 'heeelp', '2024-01-29 13:29:56', 'venter'),
(21, 'Anonym', 'heeeelp', '2024-01-29 13:30:02', 'venter'),
(42, 'Anonym', ' ', '2024-01-29 13:49:14', 'venter'),
(43, 'Anonym', 'h', '2024-01-29 13:49:18', 'venter'),
(44, 'Anonym', 'e', '2024-01-29 13:49:22', 'venter'),
(45, 'Anonym', 'l', '2024-01-29 13:49:24', 'venter'),
(46, 'Anonym', 'p', '2024-01-29 13:49:30', 'venter'),
(47, 'Anonym', ' ', '2024-01-29 13:49:33', 'venter'),
(48, 'Anonym', 'm', '2024-01-29 13:49:36', 'venter'),
(49, 'Anonym', 'e', '2024-01-29 13:49:39', 'venter'),
(50, 'Anonym', '!', '2024-01-29 13:49:41', 'venter'),
(51, 'Anonym', 'jeg blir tiet!', '2024-01-29 13:50:42', 'venter'),
(52, 'Anonym', 'dette er undertrykkelse', '2024-01-29 13:50:50', 'venter'),
(53, 'Anonym', 'mobbing', '2024-01-29 13:50:57', 'venter'),
(54, 'Anonym', 'n', '2024-01-29 13:51:24', 'venter'),
(55, 'Anonym', 'e', '2024-01-29 13:51:27', 'venter'),
(56, 'Anonym', 'i', '2024-01-29 13:51:29', 'venter'),
(57, 'Anonym', '!', '2024-01-29 13:51:33', 'venter'),
(58, 'Anonym', 'slem', '2024-01-29 13:52:05', 'venter'),
(59, 'Anonym', 'når jeg klikker på menyen krasjer hele siden og logger meg ut', '2024-01-29 13:53:10', 'venter'),
(60, 'Anonym', 'kødda, d skjedde ikke', '2024-01-29 13:53:17', 'venter'),
(61, 'kokk', 'me like human', '2024-03-04 14:52:14', 'venter');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `admin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `admin`) VALUES
(3, '123', '202cb962ac59075b964b07152d234b70', 'twd@ewew.com', NULL),
(4, 'Tias', '81dc9bdb52d04dc20036dbd8313ed055', 'ole@gmail.com', NULL),
(5, 'Almighty Admin', '202cb962ac59075b964b07152d234b70', 'epostens_1000@yahoo.com', 'Admin'),
(6, '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'ole@gmail.com', NULL),
(7, 'adrian', '81dc9bdb52d04dc20036dbd8313ed055', 'epostens_1000@yahoo.com', NULL),
(8, 'kokk', '202cb962ac59075b964b07152d234b70', 'koc@ewew.com', 'kokk'),
(9, 'manage', '202cb962ac59075b964b07152d234b70', 'man@ewew.com', 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bord`
--
ALTER TABLE `bord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borgar`
--
ALTER TABLE `borgar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviw`
--
ALTER TABLE `reviw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
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
-- AUTO_INCREMENT for table `bord`
--
ALTER TABLE `bord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `borgar`
--
ALTER TABLE `borgar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reviw`
--
ALTER TABLE `reviw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
