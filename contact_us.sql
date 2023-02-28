-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 12:48 PM
-- Server version: 8.0.17
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact`
--

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `gender`, `message`, `city`, `file`) VALUES
(2, 'Usama', 'usama@gmail', 'male', 'hello', 'минск', 'upload/CV-Usama Majid.pdf'),
(3, 'ronaldo', 'ronaldo@gmail', 'male', 'hi', 'брест', 'upload/4670751.jpg'),
(16, 'nika', 'nika@gmali', 'female', 'hi im php developer', 'минск', 'upload/prof cv.pdf'),
(17, 'Alexander', 'alexander@gmail.com', 'male', 'im looking for a job in your company', 'гродно', 'upload/mercedes-benz-cla-ov.jpg'),
(18, 'Lena', 'lena@gmail.com', 'female', 'Can i get a training in your company ?', 'витебск', 'upload/477561_island-hd-wallpapers-hd-wallpaper-backgrounds-of-your-choice_2560x1440_h.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
