-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2019 at 12:19 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_genexam`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertUsers` (IN `name` VARCHAR(50), IN `lastName` VARCHAR(50), IN `gender` VARCHAR(50), IN `telephone` INT(30), IN `email` VARCHAR(80), IN `password` VARCHAR(40), IN `level` INT(11), IN `discipline` VARCHAR(100))  BEGIN 
	INSERT INTO `tb_users` 
	(`name`, `email`, `password`, `level`,`discipline`) 
	VALUES (name, email, password, level, discipline);
	INSERT INTO `tb_persons` 
	(`name`, `lastName`, `gender`, `telephone`) 
	VALUES (name, lastName, gender, telephone);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `idIp` int(11) NOT NULL,
  `ipIp` int(30) NOT NULL,
  `ipIpDate` text COLLATE latin1_general_ci NOT NULL,
  `ipIpMsg` varchar(300) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatives`
--

CREATE TABLE `tb_alternatives` (
  `idAlternative` int(11) NOT NULL,
  `aAlternativesText` text COLLATE latin1_general_ci NOT NULL,
  `aAnswerText` text COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_alternatives`
--

INSERT INTO `tb_alternatives` (`idAlternative`, `aAlternativesText`, `aAnswerText`) VALUES
(20, 'a) adicionar teste\r\nb) editar teste', NULL),
(23, 'a) adicionar teste\r\nb) editar teste', NULL),
(24, 'a) adicionar\r\nb) editar', NULL),
(25, 'a) adicionar\r\nb) editar \r\n1', NULL),
(26, 'a) adicionar\r\nb) editar\r\nc)1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_persons`
--

CREATE TABLE `tb_persons` (
  `idPerson` int(11) NOT NULL,
  `name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `lastName` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `gender` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `telephone` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_questions`
--

CREATE TABLE `tb_questions` (
  `idQuestion` int(11) NOT NULL,
  `qQuestionText` text COLLATE latin1_general_ci NOT NULL,
  `qLevel` int(11) NOT NULL,
  `qDiscipline` text COLLATE latin1_general_ci NOT NULL,
  `qSkill` text COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_questions`
--

INSERT INTO `tb_questions` (`idQuestion`, `qQuestionText`, `qLevel`, `qDiscipline`, `qSkill`) VALUES
(20, 'QUESTÃO 01: adicionar. editar. teste', 0, 'História', 'Ciências Humanas e suas tecnologias'),
(23, 'QUESTÃO 02: adicionar\r\neditar\r\nteste', 0, 'Matemática', 'Matemática e suas tecnologias'),
(24, 'QUESTÃO 03: adicionar editar', 0, 'Geografia', 'Ciências da Natureza e suas tecnologias'),
(25, 'QUESTÃO 04: adicionar \r\neditar 1', 0, 'Português', 'Ciências Humanas e suas tecnologias'),
(26, 'QUESTÃO 05: adicionar editar1', 0, 'Português', 'Ciências Humanas e suas tecnologias');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `discipline` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `name`, `email`, `password`, `level`, `discipline`) VALUES
(1, 'admin', 'admin@padrao.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 1, ''),
(2, 'suporte', 'suporte@padrao.com', '4ab79fdaa7205f3f3a09a75ea19fe264915a87c6', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`idIp`);

--
-- Indexes for table `tb_alternatives`
--
ALTER TABLE `tb_alternatives`
  ADD PRIMARY KEY (`idAlternative`);

--
-- Indexes for table `tb_persons`
--
ALTER TABLE `tb_persons`
  ADD PRIMARY KEY (`idPerson`);

--
-- Indexes for table `tb_questions`
--
ALTER TABLE `tb_questions`
  ADD PRIMARY KEY (`idQuestion`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `idIp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_alternatives`
--
ALTER TABLE `tb_alternatives`
  MODIFY `idAlternative` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_persons`
--
ALTER TABLE `tb_persons`
  MODIFY `idPerson` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_questions`
--
ALTER TABLE `tb_questions`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_alternatives`
--
ALTER TABLE `tb_alternatives`
  ADD CONSTRAINT `idquest_fk` FOREIGN KEY (`idAlternative`) REFERENCES `tb_questions` (`idQuestion`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
