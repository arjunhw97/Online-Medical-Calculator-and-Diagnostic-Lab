-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2018 at 09:34 PM
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
-- Table structure for table `labtech`
--

CREATE TABLE `labtech` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labtech`
--

INSERT INTO `labtech` (`id`, `firstname`, `lastname`, `password`, `gender`, `contact`) VALUES
(100, 'Jason', 'Momo', '345', 'Male', '2347658912'),
(101, 'Elixabeth', 'Jackson', '765', 'Female', '3498791254');

-- --------------------------------------------------------

--
-- Table structure for table `lequip`
--

CREATE TABLE `lequip` (
  `eq_id` int(2) NOT NULL,
  `eq_name` varchar(50) NOT NULL,
  `available` int(4) NOT NULL DEFAULT '50',
  `maximum` int(4) NOT NULL DEFAULT '50',
  `ord` int(4) NOT NULL DEFAULT '0',
  `dates` varchar(20) DEFAULT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lequip`
--

INSERT INTO `lequip` (`eq_id`, `eq_name`, `available`, `maximum`, `ord`, `dates`, `price`) VALUES
(1, 'Test tube', 46, 50, 4, '2018-04-08', 150),
(2, 'Folin-Wu tube', 46, 50, 1, '2018-04-08', 225),
(3, 'Petri dish', 42, 50, 8, '2018-04-08', 300),
(4, 'Glass beaker', 45, 50, 5, '2018-04-08', 400),
(5, 'Glass flask', 50, 50, 0, 'NULL', 300),
(6, 'Pasteur pipette pack', 48, 50, 2, '2018-04-08', 185),
(7, 'Graduated pipettes', 28, 50, 18, '2018-04-08', 670),
(8, 'Syringes', 30, 50, 20, '2018-04-08', 2000),
(9, 'Disposable gloves', 50, 50, 0, 'NULL', 150),
(10, 'Tourniquet', 40, 50, 10, '2018-04-08', 280),
(11, 'Microscope', 44, 50, 6, '2018-04-08', 5500),
(12, 'Bunsen burner', 50, 50, 0, 'NULL', 400),
(13, 'Ultracentrifuge', 50, 50, 0, 'NULL', 2100),
(14, 'Electrophoresis', 30, 50, 20, '2018-04-08', 8800),
(15, 'Chromatography Equipment', 50, 50, 0, 'NULL', 5000),
(16, 'Colorimeter', 45, 50, 5, '2018-04-08', 3800),
(17, 'Burette', 22, 50, 28, '2018-04-08', 900),
(18, 'Induction coils', 50, 50, 0, 'NULL', 1400),
(19, 'Cathode ray oscilloscope', 45, 50, 5, '2018-04-08', 10800),
(20, 'Laboratory stand', 14, 50, 36, '2018-04-08', 6400),
(21, 'Filter Paper sets', 33, 50, 17, '2018-04-08', 200),
(22, 'Ultralow Freezers', 13, 50, 37, '2018-04-08', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `testname` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `value` varchar(30) NOT NULL,
  `unit` varchar(25) NOT NULL,
  `type` varchar(2) NOT NULL,
  `report` varchar(2) NOT NULL,
  `filename` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`testname`, `username`, `value`, `unit`, `type`, `report`, `filename`) VALUES
('Asymptomatic Myeloma Prognosis', 'arjunhw97', '69', '%', 'C', 'N', 'UA3.php'),
('Iron (Fe)', 'arjunhw97', 'Pending', 'g/dL', 'O', 'N', 'olab.php'),
('Thyroid Hormone', 'arjunhw97', 'Pending', 'ug/dl', 'O', 'N', 'olab.php'),
('BMR Calculator', 'arjunhw97', '1461.25', 'calories', 'C', 'N', 'UB1.php'),
('EUTOS Score for Chronic Myelogenous Leukemia (CML)', 'arjunhw97', 'High', '', 'C', 'N', 'UE1.php');

-- --------------------------------------------------------

--
-- Table structure for table `test_list`
--

CREATE TABLE `test_list` (
  `testname` varchar(200) NOT NULL,
  `visits` int(10) NOT NULL DEFAULT '0',
  `filename` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_list`
--

INSERT INTO `test_list` (`testname`, `visits`, `filename`) VALUES
('Anion Gap Calculator', 2, 'UA2.php'),
('Arterial Oxygen Content', 5, 'UA1.php'),
('AST to Platelet Ratio Index (APRI)', 2, 'UA4.php'),
('Asymptomatic Myeloma Prognosis', 2, 'UA3.php'),
('Bicarbonate Deficit', 0, 'UB2.php'),
('BMR Calculator', 0, 'UB1.php'),
('Canadian Syncope Risk Score', 0, 'UC4.php'),
('Corrected Calcium Calculator', 0, 'UC1.php'),
('Corrected QT Interval (QTc)', 0, 'UC3.php'),
('Creatinine Clearance (Cockcroft-Gault Equation)', 0, 'UC2.php'),
('DAmico Risk Classification for Prostate Cancer', 1, 'UD3.php'),
('DASH Prediction Score for Recurrent VTE', 0, 'UD1.php'),
('DRAGON Score for Post-TPA Stroke Outcome', 0, 'UD2.php'),
('EUTOS Score for Chronic Myelogenous Leukemia (CML)', 1, 'UE1.php'),
('Fractional Excretion of Sodium (FENa)', 0, 'UF1.php'),
('Glasgow-Imrie Criteria for Severity of Acute Pancreatitis', 0, 'UG1.php'),
('HOMA-IR (Homeostatic Model Assessment for Insulin Resistance)', 0, 'UH1.php'),
('International Prognostic Index for Chronic Lymphocytic Leukemia (CLL-IPI)', 0, 'UI1.php'),
('Kruis Score for Diagnosis of Irritable Bowel Syndrome', 0, 'UK1.php'),
('LDL Calculated\r\n', 0, 'UL1.php'),
('Mean Arterial Pressure (MAP)', 0, 'UM1.php'),
('New Orleans/Charity Head Trauma/Injury Rule', 1, 'UN1.php'),
('Oxygenation Index', 0, 'UO1.php'),
('Pediatric Appendicitis Score', 0, 'UP1.php'),
('qSOFA (Quick SOFA) Score for Sepsis', 1, 'UQ1.php'),
('RAPID Score for Pleural Infection', 0, 'UR1.php'),
('Serum Osmolality/Osmolarity', 0, 'US1.php'),
('THRIVE Score for Stroke Outcome', 0, 'UT1.php'),
('US (MEDPED) Diagnostic Criteria for Familial Hypercholesterolemia (FH)', 0, 'UU1.php'),
('Vancouver Chest Pain Rule', 0, 'UV1.php'),
('Wells\' Criteria for DVW', 0, 'UW1.php');

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
('Tom', 'Hanks', 'Male', '1973-08-20', 'tom_h73', 'tom', 'Mid Town, New Jersey', '1058763451', 'tomhanks73@gmail.com', 163, 67);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `labtech`
--
ALTER TABLE `labtech`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lequip`
--
ALTER TABLE `lequip`
  ADD PRIMARY KEY (`eq_id`);

--
-- Indexes for table `test_list`
--
ALTER TABLE `test_list`
  ADD PRIMARY KEY (`testname`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `labtech`
--
ALTER TABLE `labtech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `lequip`
--
ALTER TABLE `lequip`
  MODIFY `eq_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
