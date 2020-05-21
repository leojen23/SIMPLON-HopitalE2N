-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: May 21, 2020 at 09:31 AM
-- Server version: 10.3.22-MariaDB-1:10.3.22+maria~bionic
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitalE2N`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `dateHour` datetime NOT NULL,
  `idPatients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `dateHour`, `idPatients`) VALUES
(6, '2020-05-12 00:00:00', 8),
(14, '2020-05-03 22:58:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES
(1, 'AVON', 'Antonin', '2000-08-23', '3333', 'avon.antonin@gmail.com'),
(4, 'BALTHAZARD', 'Matéo', '1999-03-23', '53333', 'mateo.balthazard@hotmail.com'),
(8, 'DEBATISSE', 'Clément', '2000-05-12', '9999999999', 'clementdebatisse1996@gmail.com'),
(9, 'DEPRESLE', 'Maureen', '1993-04-29', '613204581', 'mau.dep22@outlook.fr'),
(11, 'GIRARD', 'Lucas', '1996-09-30', '8888888888888', 'pro.lucas.girard@gmail.com'),
(15, 'Guillemot', 'Olivier', '2000-08-12', '0629308097', 'olivierjean.guillemot@googlemail.com'),
(20, 'PIERRE', 'Olivier', '2008-00-12', '0629308097', 'olivierjean.guillemot@googlemail.com'),
(34, 'Valls', 'Maryon', '2000-00-12', '04931944444', 'leojen23@hotmail.com'),
(35, 'AVON', 'Antonin', '2000-08-23', '111111111111111', 'avon.antonin@gmail.com'),
(36, 'Guillemot', 'Olivier', '2000-00-12', '22222222222', 'olivierjean.guillemot@googlemail.com'),
(37, 'Guillemot', 'Olivier', '2008-00-12', '0629308097', 'olivierjean.guillemot@googlemail.com'),
(38, 'Guillemot', 'Olivier', '2008-00-12', '0629308097', 'olivierjean.guillemot@googlemail.com'),
(39, 'Valls', 'Maryon', '2008-00-12', '666666666', 'olivierjean.guillemot@googlemail.com'),
(40, 'Valls', 'Maryon', '2000-05-12', '111111111', 'olivierjean.guillemot@googlemail.com'),
(41, 'Valls', 'Maryon', '2000-05-12', '3333', 'olivierjean.guillemot@googlemail.com'),
(42, 'Guillemot', 'Olivier', '2008-00-12', '0629308097', 'olivierjean.guillemot@googlemail.com'),
(43, 'Valls', 'Maryon', '2000-05-12', '3333333333', 'olivierjean.guillemot@googlemail.com'),
(44, 'Valls', 'Maryon', '2000-05-12', '3333333333', 'olivierjean.guillemot@googlemail.com'),
(45, 'Guillemot', 'Olivier', '2000-00-12', '0629308097', 'olivierjean.guillemot@googlemail.com'),
(46, 'Guillemot', 'Olivier', '1999-03-23', '0629308097', 'olivierjean.guillemot@googlemail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_appointments_id_patients` (`idPatients`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `FK_appointments_id_patients` FOREIGN KEY (`idPatients`) REFERENCES `patients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

