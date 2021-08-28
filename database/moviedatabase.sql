-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2021 at 11:30 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviedatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `act_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `email_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`act_id`, `fname`, `mname`, `lname`, `gender`, `email_id`) VALUES
(4, 'Chloë', 'Grace', 'Moretz', 'female', 'grace@gmail.com'),
(5, 'Pallavi', '', 'Sharda', 'female', ' shardapallavi@gg.com'),
(6, 'Colin', '', 'Jost', 'male', 'jost@colin.com'),
(7, 'Michael', '', 'Peña', 'male', 'peña@gmail.com'),
(8, 'Salman', '', 'Khan', 'male', 'salman@sallu.com'),
(9, 'Anushka', '', 'Sharma', 'female', 'anushka@aa.com'),
(10, 'Amit', '', 'Sadh', 'male', 'sadhamit@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(3, 'admin@admin.com', '$2y$10$znMX6VJHV8XczveTMoK7ru2g/2kz5DMUI5MXKWxOXGVM6XVDrZ.2.');

-- --------------------------------------------------------

--
-- Table structure for table `cast`
--

CREATE TABLE `cast` (
  `movie_id` int(11) NOT NULL,
  `act_id` int(11) NOT NULL,
  `character_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cast`
--

INSERT INTO `cast` (`movie_id`, `act_id`, `character_name`) VALUES
(12, 4, 'Kalya'),
(12, 5, 'Preeta'),
(12, 6, 'Ben'),
(12, 7, 'Terrance'),
(13, 8, 'Sultan Ali Khan'),
(13, 9, 'Aarfa Ali Khan'),
(13, 10, 'Akash Oberoi');

-- --------------------------------------------------------

--
-- Table structure for table `directed_by`
--

CREATE TABLE `directed_by` (
  `movie_id` int(11) NOT NULL,
  `dir_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `directed_by`
--

INSERT INTO `directed_by` (`movie_id`, `dir_id`) VALUES
(12, 3),
(13, 4);

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `dir_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `office_phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`dir_id`, `fname`, `mname`, `lname`, `email_id`, `office_phone`) VALUES
(3, 'Tim', '', 'Story', 'tim@tim.com', '9876567898'),
(4, 'Ali', 'Abbas', 'Zafar', 'alida@zafar.com', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `movie_id` int(11) NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`movie_id`, `genre`) VALUES
(12, 'Comedy'),
(13, 'Drama'),
(13, 'Romance');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `mov_title` varchar(100) NOT NULL,
  `mov_lang` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'incompleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `mov_title`, `mov_lang`, `year`, `status`) VALUES
(12, 'Tom and Jerry', 'English', 2021, 'completed'),
(13, 'Sultan', 'Hindi', 2016, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `producer`
--

CREATE TABLE `producer` (
  `producer_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producer`
--

INSERT INTO `producer` (`producer_id`, `fname`, `mname`, `lname`, `email_id`) VALUES
(4, 'Christopher', '', 'DeFaria', 'deFaria@hotmail.com'),
(5, ' Aditya', '', 'Chopra', 'chopra@aditya.com');

-- --------------------------------------------------------

--
-- Table structure for table `produces`
--

CREATE TABLE `produces` (
  `movie_id` int(11) NOT NULL,
  `producer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produces`
--

INSERT INTO `produces` (`movie_id`, `producer_id`) VALUES
(12, 4),
(13, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cast`
--
ALTER TABLE `cast`
  ADD PRIMARY KEY (`movie_id`,`act_id`),
  ADD KEY `act_id` (`act_id`);

--
-- Indexes for table `directed_by`
--
ALTER TABLE `directed_by`
  ADD PRIMARY KEY (`movie_id`,`dir_id`),
  ADD KEY `dir_id` (`dir_id`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`dir_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`movie_id`,`genre`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`producer_id`);

--
-- Indexes for table `produces`
--
ALTER TABLE `produces`
  ADD PRIMARY KEY (`movie_id`,`producer_id`),
  ADD KEY `producer_id` (`producer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actor`
--
ALTER TABLE `actor`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `dir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `producer`
--
ALTER TABLE `producer`
  MODIFY `producer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cast`
--
ALTER TABLE `cast`
  ADD CONSTRAINT `cast_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cast_ibfk_2` FOREIGN KEY (`act_id`) REFERENCES `actor` (`act_id`) ON DELETE CASCADE;

--
-- Constraints for table `directed_by`
--
ALTER TABLE `directed_by`
  ADD CONSTRAINT `directed_by_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `directed_by_ibfk_2` FOREIGN KEY (`dir_id`) REFERENCES `director` (`dir_id`) ON DELETE CASCADE;

--
-- Constraints for table `genre`
--
ALTER TABLE `genre`
  ADD CONSTRAINT `genre_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE;

--
-- Constraints for table `produces`
--
ALTER TABLE `produces`
  ADD CONSTRAINT `produces_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produces_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produces_ibfk_3` FOREIGN KEY (`producer_id`) REFERENCES `producer` (`producer_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
