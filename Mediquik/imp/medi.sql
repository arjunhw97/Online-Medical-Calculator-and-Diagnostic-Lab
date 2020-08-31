-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2018 at 12:52 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medi`
--

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dateofbirth` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phoneno:` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `height` int(3) NOT NULL,
  `weight` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`firstname`, `lastname`, `gender`, `dateofbirth`, `username`, `password`, `address`, `phoneno:`, `email`, `height`, `weight`) VALUES
('Arjun', 'Gopinath', 'Male', '1997-12-19', 'arjunhw97', '1234', 'MKJ-37, Gopikrishna, Manpurackal Rd', '9497149596', 'arjunhw97@gmail.com', 178, 60),
('Bruce', 'Allen', 'Male', '1999-03-23', 'bruce_al99', '123', 'Street 22, Gotham City', '9876543219', 'bruce_al99@gmail.com', 174, 58),
('Noel', 'Joby', 'Male', '1997-03-22', 'noelj97', 'kinginy', 'Paroor', '9564325861', 'noelj97@gmail.com', 172, 67),
('Spikee', 'Shaji', 'Male', '1997-02-07', 'spikeeseed', 'jensen', 'Pulse Nagar', '8086547821', 'spikeeseed@gmail.com', 168, 58);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
