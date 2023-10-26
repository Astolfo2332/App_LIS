-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 22, 2023 at 09:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maicenascript`
--

-- --------------------------------------------------------

--
-- Table structure for table `eps`
--

CREATE TABLE `eps` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eps`
--

INSERT INTO `eps` (`id`, `name`) VALUES
(1, 'Sura'),
(2, 'Cafe salud'),
(3, 'eps generica'),
(4, 'Nueva eps');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `doc` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `genre` varchar(45) DEFAULT NULL,
  `eps` varchar(45) DEFAULT NULL,
  `tp` varchar(45) DEFAULT NULL,
  `ptt` varchar(45) DEFAULT NULL,
  `atiii` varchar(45) DEFAULT NULL,
  `tt` varchar(45) DEFAULT NULL,
  `fibrinogeno` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--
INSERT INTO `patients` (`id`, `doc`, `name`, `lastname`, `age`, `genre`, `eps`, `tp`, `ptt`, `atiii`, `tt`, `fibrinogeno`) VALUES
(10, '5', 'Juan', 'Perez', '30', 'Masculino', '10', '10', '25', '15.7', '8.9', '300'),
(11, '1', 'Jose', 'Antioquio', '30', 'Masculino', '510', '150', '25', '15.7', '8.9', '300'),
(12, '2', 'Pedro', 'Antioquio', '30', 'Masculino', '510', '150', '25', '15.7', '8.9', '300'),
(14, '3', 'Mario', 'Antioquio', '30', 'Masculino', '510', '150', '25', '15.7', '8.9', '300'),
(15, '4', 'Ana', 'Martinez', '30', 'Femenino', '510', '150', '25', '15.7', '8.9', '300'),
(17, '6', 'Luis', 'Gonzalez', '30', 'Masculino', '510', '150', '25', '15.7', '8.9', '300'),
(18, '7', 'Carlos', 'Rodriguez', '30', 'Masculino', '510', '150', '25', '15.7', '8.9', '300'),
(19, '8', 'Laura', 'Lopez', '30', 'Femenino', '510', '150', '25', '15.7', '8.9', '300'),
(20, '9', 'Miguel', 'Fernandez', '345550', 'Masculino', '510', '150', '25', '15.7', '8.9', '300'),
(21, '10', 'Sofia', 'Gomez', '345550', 'Femenino', '510', '150', '25', '15.7', '8.9', '300'),
(23, '23', 'Juan', 'Perez', '34', 'Masculino', '10', '10', '25', '15.7', '8.9', '300'),
(24, '12345', 'Maria', 'Perez', '12', 'Femenino', '1', '3523', '123124', '436', '1235', '2135');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eps`
--
ALTER TABLE `eps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doc` (`doc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eps`
--
ALTER TABLE `eps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
