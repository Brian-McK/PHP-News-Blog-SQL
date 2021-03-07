-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 07, 2021 at 06:39 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogPosts`
--

DROP TABLE IF EXISTS `blogPosts`;
CREATE TABLE `blogPosts` (
  `recordID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `postTitle` varchar(200) NOT NULL,
  `postBody` varchar(2000) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogPosts`
--

INSERT INTO `blogPosts` (`recordID`, `categoryID`, `postTitle`, `postBody`, `dateTime`, `image`) VALUES
(1, 1, 'This is hello', 'This is hello hello my friend', '2021-03-07 17:05:15', ''),
(2, 2, 'woop', 'wopp thats the sounda da poliiiicce', '2021-03-07 17:05:15', ''),
(3, 1, 'tester', 'tester', '2021-03-07 17:05:37', ''),
(4, 1, 'another test', 'another test', '2021-03-07 17:06:26', ''),
(5, 2, 'ssss', 'sssss', '2021-03-07 17:29:48', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Hello'),
(2, 'Bye Bye');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogPosts`
--
ALTER TABLE `blogPosts`
  ADD PRIMARY KEY (`recordID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogPosts`
--
ALTER TABLE `blogPosts`
  MODIFY `recordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
