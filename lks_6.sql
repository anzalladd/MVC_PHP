-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2019 at 07:31 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lks_6`
--

-- --------------------------------------------------------

--
-- Table structure for table `guestbook`
--

CREATE TABLE `guestbook` (
  `id` int(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guestbook`
--

INSERT INTO `guestbook` (`id`, `fullname`, `email`) VALUES
(1, 'Anzalla Dzikri Dhamaraaaa', 'anzalla1@yahoo.co.id'),
(3, 'Anzalla Dzikri Dhamaraa', 'anzalla1@yahoo.co.id'),
(4, 'Test2dsdasdsad', 'adasdd@gmail.com'),
(5, 'Test', 'adasdd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` longtext NOT NULL,
  `img` varchar(40) NOT NULL,
  `type` varchar(20) NOT NULL,
  `is_published` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `img`, `type`, `is_published`) VALUES
(1, 'Test', '								Testt			', '/mendoan.jpg', 'news', 1),
(3, 'Gorengan ini dewaaaaa', '																		\r\n		Test													', '/mendoan.jpg', 'product', 0),
(4, 'Mantap', '						\r\n				Testetseteststsetes	', '/bentengpendem.jpg', 'product', 1),
(5, 'Mendoan ini enakk', '						\r\n					Testsefsadfsdsadasdsaddsadsa', '/download.png', 'news', 1),
(6, 'Gorengan ini dewa', '						\r\n	<b>Loremlreowrjiopq2fdqdqw	</b>			', '/download.png', 'product', 1),
(7, 'Gorengan ini dewa', 'dsadsadsadsad', '/bg_1.jpg', 'product', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `fullname`, `password`, `img`) VALUES
(1, 'anzalladd@gmail.com', 'Anzalla', '$2y$10$6OwV7o6wly7Omks61P2jH.CQeLdlMuGXAvDVPHhCfC.feOT3/XPlq', '/thao-le-hoang-714156-unsplash.jpg'),
(10, 'a@gmail.com', 'Test', '$2y$10$10aHQnQ5AQWDIYusSJDnIeUCVfg5fPKK23KY3yPHIdpU9GECDy59i', '/standar-samping-motor_20170306_104724.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
