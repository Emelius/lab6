-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 11, 2017 at 08:28 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `Author`
--

CREATE TABLE `Author` (
  `AuthorID` int(11) NOT NULL,
  `Firstname` varchar(100) DEFAULT NULL,
  `Lastname` varchar(100) DEFAULT NULL,
  `ssn` char(20) DEFAULT NULL,
  `Birthyear` int(11) DEFAULT NULL,
  `homepage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Author`
--

INSERT INTO `Author` (`AuthorID`, `Firstname`, `Lastname`, `ssn`, `Birthyear`, `homepage`) VALUES
(20, 'Roald', 'Dahl', NULL, NULL, NULL),
(21, 'Roald', 'Persson', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE `Book` (
  `Title` varchar(255) DEFAULT NULL,
  `ISBN` char(13) NOT NULL,
  `Numpages` int(11) DEFAULT NULL,
  `Edition` int(11) DEFAULT NULL,
  `Publisher` varchar(100) DEFAULT NULL,
  `Publishingyear` int(11) DEFAULT NULL,
  `Author` varchar(60) NOT NULL,
  `Reserved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`Title`, `ISBN`, `Numpages`, `Edition`, `Publisher`, `Publishingyear`, `Author`, `Reserved`) VALUES
('PHP, MySQL, for Dummies', '9781118213704', 692, 1, 'WILEY', 2013, 'Janet Valade', 0),
('Thinking with type', '9781568989693', 224, 2, 'Princeton Architectural Press', 2010, 'Ellen Lupton', 0),
('The great gatsby', '9781853260414', 144, NULL, 'New ed', 1925, 'F. Scott Fitzgerald', 0),
('The old man and the sea', '9789129695373', 112, NULL, 'Arrow Books Ltd', NULL, 'Ernest Hemingway', 1),
('Charlie and the Chocolate Factory', '9789129695380', 181, NULL, 'Rabén & Sjögren', NULL, 'Roald Dahl', 0),
('Harry Potter', '9789129704211', 325, 1, 'Rabén & Sjögren', 1999, 'J K Rowling', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Relationship`
--

CREATE TABLE `Relationship` (
  `ISBNnumber` char(13) NOT NULL,
  `AuthorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Relationship`
--

INSERT INTO `Relationship` (`ISBNnumber`, `AuthorID`) VALUES
('9789129695373', 20),
('9789129695380', 21);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `hash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `hash`) VALUES
('Emelie', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Author`
--
ALTER TABLE `Author`
  ADD PRIMARY KEY (`AuthorID`);

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Author`
--
ALTER TABLE `Author`
  MODIFY `AuthorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
