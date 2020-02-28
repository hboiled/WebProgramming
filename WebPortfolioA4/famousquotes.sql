-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2020 at 08:44 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `famousquotes`
--

CREATE TABLE `famousquotes` (
  `ID` int(11) NOT NULL,
  `Content` varchar(64) DEFAULT NULL,
  `Source` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `famousquotes`
--

INSERT INTO `famousquotes` (`ID`, `Content`, `Source`) VALUES
(1, 'Be yourself; everyone else is already taken.', 'Oscar Wilde'),
(2, 'So many books, so little time.', 'Frank Zappa'),
(3, 'A room without books is like a body without a soul.', 'Marcus Tullius Cicero'),
(4, 'You only live once, but if you do it right, once is enough.', 'Mae West'),
(5, 'Be the change that you wish to see in the world.', 'Mahatma Gandhi'),
(6, 'If you tell the truth, you don\'t have to remember anything.', 'Mark Twain'),
(7, 'A friend is someone who knows all about you and still loves you.', 'Elbert Hubbard'),
(8, 'Without music, life would be a mistake.', 'Friedrich Nietzsche'),
(9, 'Everything you can imagine is real', 'Pablo Picasso'),
(10, 'If you can make a woman laugh, you can make her do anything.', 'Marilyn Monroe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `famousquotes`
--
ALTER TABLE `famousquotes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `famousquotes`
--
ALTER TABLE `famousquotes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
