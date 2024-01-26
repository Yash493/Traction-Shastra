-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jan 26, 2024 at 05:47 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship1`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('apekshagaikwad2699@gmail.com', '$2y$10$vCTr0lU7BsDQz/K06mQwgeh'),
('apekshagaikwad2699@gmail.com', '$2y$10$qZmKYndeU6VJ6cWBA9PNLOR'),
('apekshagaikwad2699@gmail.com', '$2y$10$LzRO6.3c7h67w8skfXd4heG'),
('yash.gaikwad22@vit.edu', '$2y$10$EbVC80duFdDTSOVe1Dv8Ku9'),
('yash.gaikwad22@vit.edu', '$2y$10$fWwJKXIUxVNXlcHzhuSKWeo'),
('yash.gaikwad22@vit.edu', '$2y$10$9YxtrskzxWeGtwviv8pTTu8'),
('yash.gaikwad22@vit.edu', '$2y$10$zrIOwwTxAl68pCkODgxfD.R'),
('apekshagaikwad2699@gmail.com', '$2y$10$Rr2rDhmV3TKedfMAlqsoEOx'),
('apekshagaikwad2699@gmail.com', '$2y$10$P9O/QjYj4a13zwGoOhI8eet'),
('apekshagaikwad2699@gmail.com', '$2y$10$IF29saFBZR9OEEE26aJ9Bu8'),
('apekshagaikwad2699@gmail.com', '$2y$10$Y.dtJ/EJHxZnXFzEZl02TeW'),
('apekshagaikwad2699@gmail.com', '$2y$10$wugXhqgp.7NbtLgBVlc6IOT'),
('apekshagaikwad2699@gmail.com', '$2y$10$gW/30tVOfZDoymTGMykzpOY'),
('apekshagaikwad2699@gmail.com', '$2y$10$.4O2hy3sHBOFJww9lYmxv.3'),
('apekshagaikwad2699@gmail.com', '$2y$10$dpwiLl2ANPdIR7KO7z93XON'),
('apekshagaikwad2699@gmail.com', '$2y$10$b1B9Op969mmVOM7FHpD1guY'),
('Yash Gaikwad', '$2y$10$XjtfbnLv5IixhFychieq6.9'),
('Yash Gaikwad', '$2y$10$fers0HLkKcKJS01tCB5gC.2'),
('Yash Gaikwad', '$2y$10$2ShuOXy9XNG/L3X00GYsFe4'),
('Vishal Gaikwad', '$2y$10$fwIWZSHm5cTN04XlCHbUPeB'),
('sourabh Gaikwad', '$2y$10$XPmE0SKpOuXo5RKOYfDm8Ov');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `filename`, `filepath`) VALUES
(9, 'Untitled6 - Jupyter Notebook - Google Chrome 2022-07-25 12-13-24.mp4', 'uploads/Untitled6 - Jupyter Notebook - Google Chrome 2022-07-25 12-13-24.mp4'),
(12, 'Untitled15 - Jupyter Notebook - Google Chrome 2022-08-18 11-49-14.mp4', 'uploads/Untitled15 - Jupyter Notebook - Google Chrome 2022-08-18 11-49-14.mp4'),
(15, 'Untitled15 - Jupyter Notebook - Google Chrome 2022-08-18 11-56-23.mp4', 'uploads/Untitled15 - Jupyter Notebook - Google Chrome 2022-08-18 11-56-23.mp4'),
(16, 'Untitled15 - Jupyter Notebook - Google Chrome 2022-08-18 11-56-23.mp4', 'uploads/Untitled15 - Jupyter Notebook - Google Chrome 2022-08-18 11-56-23.mp4'),
(17, 'Untitled15 - Jupyter Notebook - Google Chrome 2022-08-18 11-49-14.mp4', 'uploads/Untitled15 - Jupyter Notebook - Google Chrome 2022-08-18 11-49-14.mp4'),
(18, 'Untitled15 - Jupyter Notebook - Google Chrome 2022-08-18 11-49-14.mp4', 'uploads/Untitled15 - Jupyter Notebook - Google Chrome 2022-08-18 11-49-14.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
