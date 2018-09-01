-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2018 at 11:08 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `create_at`) VALUES
(1, 'Sample Cat name 1', '2018-08-31 00:00:00'),
(2, 'Sample Cat name 2', '2018-08-31 00:00:00'),
(3, 'Restful API', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `body`, `author`, `create_at`) VALUES
(1, 1, 'Sample title 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea exercitationem magni adipisci officiis aspernatur architecto eos. Cupiditate, accusantium nam. Autem laudantium eveniet, accusantium quidem praesentium tempora numquam. Ex culpa accusantium dolor at illum eligendi nam fugit explicabo dolorem error. Magnam corrupti pariatur, iste accusantium dicta dolor necessitatibus assumenda at amet?', 'Sample author', '2018-08-31 00:00:00'),
(2, 2, 'Sample title 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea exercitationem magni adipisci officiis aspernatur architecto eos. Cupiditate, accusantium nam. Autem laudantium eveniet, accusantium quidem praesentium tempora numquam. Ex culpa accusantium dolor at illum eligendi nam fugit explicabo dolorem error. Magnam corrupti pariatur, iste accusantium dicta dolor necessitatibus assumenda at amet?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Ea exercitationem magni adipisci officiis aspernatur architecto eos. Cupiditate, accusantium nam. Autem laudantium eveniet, accusantium quidem praesentium tempora numquam. Ex culpa accusantium dolor at illum eligendi nam fugit explicabo dolorem error. Magnam corrupti pariatur, iste accusantium dicta dolor necessitatibus assumenda at amet?', 'Sample Author 1', '2018-08-31 00:00:00'),
(3, 3, 'My Rest API', 'This is my REST API content', 'Ren Mission', '0000-00-00 00:00:00'),
(7, 3, 'My Updated Rest API', 'This is my Updated REST API content', 'Ren Mission', '0000-00-00 00:00:00'),
(8, 3, 'My Updated Rest API', 'This is my Updated REST API content', 'Ren Mission', '0000-00-00 00:00:00'),
(9, 3, 'My Updated Rest API 1', 'This is my Updated REST API content 1', 'Ren Mission', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
