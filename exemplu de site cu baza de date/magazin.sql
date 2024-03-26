-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 10:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazin`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventar`
--

CREATE TABLE `inventar` (
  `Id` int(11) NOT NULL,
  `Nume` varchar(30) NOT NULL,
  `Nume_Producator` varchar(30) NOT NULL,
  `Pret_Achizitie` int(11) NOT NULL,
  `Pret_Vanzare` int(11) NOT NULL,
  `Data_Expirare` date NOT NULL,
  `Nr_lot` int(11) NOT NULL,
  `Raft_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `raft1`
--

CREATE TABLE `raft1` (
  `Id` int(11) NOT NULL,
  `Nume` varchar(30) NOT NULL,
  `Nume_Producator` varchar(30) NOT NULL,
  `Pret_Achizitie` int(11) NOT NULL,
  `Pret_Vanzare` int(11) NOT NULL,
  `Data_Expirare` date NOT NULL,
  `Nr_lot` int(11) NOT NULL,
  `Raft_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `raft1`
--

INSERT INTO `raft1` (`Id`, `Nume`, `Nume_Producator`, `Pret_Achizitie`, `Pret_Vanzare`, `Data_Expirare`, `Nr_lot`, `Raft_Id`) VALUES
(37, 'Produs1_R1', 'Producator1', 10, 20, '2024-12-31', 1, NULL),
(38, 'Produs2_R1', 'Producator2', 15, 25, '2024-11-30', 2, NULL),
(39, 'Produs3_R1', 'Producator3', 20, 30, '2024-10-31', 3, NULL),
(40, 'Produs4_R1', 'Producator4', 25, 35, '2024-09-30', 4, NULL),
(41, 'Produs5_R1', 'Producator5', 30, 40, '2024-08-31', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `raft2`
--

CREATE TABLE `raft2` (
  `Id` int(11) NOT NULL,
  `Nume` varchar(30) NOT NULL,
  `Nume_Producator` varchar(30) NOT NULL,
  `Pret_Achizitie` int(11) NOT NULL,
  `Pret_Vanzare` int(11) NOT NULL,
  `Data_Expirare` date NOT NULL,
  `Nr_lot` int(11) NOT NULL,
  `Raft_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `raft2`
--

INSERT INTO `raft2` (`Id`, `Nume`, `Nume_Producator`, `Pret_Achizitie`, `Pret_Vanzare`, `Data_Expirare`, `Nr_lot`, `Raft_Id`) VALUES
(8, 'Produs1_R2', 'Producator1', 12, 22, '2024-12-31', 6, NULL),
(9, 'Produs2_R2', 'Producator2', 17, 27, '2024-11-30', 7, NULL),
(10, 'Produs3_R2', 'Producator3', 22, 32, '2024-10-31', 8, NULL),
(11, 'Produs4_R2', 'Producator4', 27, 37, '2024-09-30', 9, NULL),
(12, 'Produs5_R2', 'Producator5', 32, 42, '2024-08-31', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `raft3`
--

CREATE TABLE `raft3` (
  `Id` int(11) NOT NULL,
  `Nume` varchar(30) NOT NULL,
  `Nume_Producator` varchar(30) NOT NULL,
  `Pret_Achizitie` int(11) NOT NULL,
  `Pret_Vanzare` int(11) NOT NULL,
  `Data_Expirare` date NOT NULL,
  `Nr_lot` int(11) NOT NULL,
  `Raft_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `raft3`
--

INSERT INTO `raft3` (`Id`, `Nume`, `Nume_Producator`, `Pret_Achizitie`, `Pret_Vanzare`, `Data_Expirare`, `Nr_lot`, `Raft_Id`) VALUES
(8, 'Produs1_R3', 'Producator1', 14, 24, '2024-12-31', 11, NULL),
(9, 'Produs2_R3', 'Producator2', 19, 29, '2024-11-30', 12, NULL),
(10, 'Produs3_R3', 'Producator3', 24, 34, '2024-10-31', 13, NULL),
(11, 'Produs4_R3', 'Producator4', 29, 39, '2024-09-30', 14, NULL),
(12, 'Produs5_R3', 'Producator5', 34, 44, '2024-08-31', 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `raft4`
--

CREATE TABLE `raft4` (
  `Id` int(11) NOT NULL,
  `Nume` varchar(30) NOT NULL,
  `Nume_Producator` varchar(30) NOT NULL,
  `Pret_Achizitie` int(11) NOT NULL,
  `Pret_Vanzare` int(11) NOT NULL,
  `Data_Expirare` date NOT NULL,
  `Nr_lot` int(11) NOT NULL,
  `Raft_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `raft4`
--

INSERT INTO `raft4` (`Id`, `Nume`, `Nume_Producator`, `Pret_Achizitie`, `Pret_Vanzare`, `Data_Expirare`, `Nr_lot`, `Raft_Id`) VALUES
(6, 'Produs1_R4', 'Producator1', 16, 26, '2024-12-31', 16, NULL),
(7, 'Produs2_R4', 'Producator2', 21, 31, '2024-11-30', 17, NULL),
(8, 'Produs3_R4', 'Producator3', 26, 36, '2024-10-31', 18, NULL),
(9, 'Produs4_R4', 'Producator4', 31, 41, '2024-09-30', 19, NULL),
(10, 'Produs5_R4', 'Producator5', 36, 46, '2024-08-31', 20, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Nume` varchar(30) DEFAULT NULL,
  `Parola` varchar(50) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `UserDetails_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Nume`, `Parola`, `Email`, `UserDetails_Id`) VALUES
(7, 'User1', 'Parola1', 'user1@example.com', NULL),
(8, 'User2', 'Parola2', 'user2@example.com', NULL),
(9, 'User3', 'Parola3', 'user3@example.com', NULL),
(10, 'User4', 'Parola4', 'user4@example.com', NULL),
(11, 'User5', 'Parola5', 'user5@example.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `User_Id` int(11) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`User_Id`, `Address`, `Phone`) VALUES
(7, 'Strada Principală 456', '987-654-3210'),
(8, 'Aleea Frumoasă 789', '555-123-4567'),
(9, 'Bulevardul Central 101', '111-222-3333'),
(10, 'Piața Mare 22', '999-888-7777'),
(11, 'Calea Victoriei 55', '333-777-1111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventar`
--
ALTER TABLE `inventar`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nume` (`Nume`,`Raft_Id`),
  ADD UNIQUE KEY `fk_inventar_raft1` (`Raft_Id`),
  ADD UNIQUE KEY `fk_inventar_raft5` (`Raft_Id`),
  ADD UNIQUE KEY `fk_inventar_raft6` (`Raft_Id`),
  ADD UNIQUE KEY `fk_inventar_raft7` (`Raft_Id`),
  ADD UNIQUE KEY `fk_inventar_raft8` (`Raft_Id`);

--
-- Indexes for table `raft1`
--
ALTER TABLE `raft1`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nume` (`Nume`);

--
-- Indexes for table `raft2`
--
ALTER TABLE `raft2`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nume` (`Nume`);

--
-- Indexes for table `raft3`
--
ALTER TABLE `raft3`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nume` (`Nume`);

--
-- Indexes for table `raft4`
--
ALTER TABLE `raft4`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Nume` (`Nume`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_users_user_details` (`UserDetails_Id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventar`
--
ALTER TABLE `inventar`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `raft1`
--
ALTER TABLE `raft1`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `raft2`
--
ALTER TABLE `raft2`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `raft3`
--
ALTER TABLE `raft3`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `raft4`
--
ALTER TABLE `raft4`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventar`
--
ALTER TABLE `inventar`
  ADD CONSTRAINT `fk_inventar_raft1` FOREIGN KEY (`Raft_Id`) REFERENCES `raft1` (`Id`),
  ADD CONSTRAINT `fk_inventar_raft2` FOREIGN KEY (`Raft_Id`) REFERENCES `raft2` (`Id`),
  ADD CONSTRAINT `fk_inventar_raft3` FOREIGN KEY (`Raft_Id`) REFERENCES `raft3` (`Id`),
  ADD CONSTRAINT `fk_inventar_raft4` FOREIGN KEY (`Raft_Id`) REFERENCES `raft4` (`Id`),
  ADD CONSTRAINT `fk_inventar_raft5` FOREIGN KEY (`Raft_Id`) REFERENCES `raft1` (`Id`),
  ADD CONSTRAINT `fk_inventar_raft6` FOREIGN KEY (`Raft_Id`) REFERENCES `raft2` (`Id`),
  ADD CONSTRAINT `fk_inventar_raft7` FOREIGN KEY (`Raft_Id`) REFERENCES `raft3` (`Id`),
  ADD CONSTRAINT `fk_inventar_raft8` FOREIGN KEY (`Raft_Id`) REFERENCES `raft4` (`Id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_user_details` FOREIGN KEY (`UserDetails_Id`) REFERENCES `user_details` (`User_Id`);

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `fk_user_details_users` FOREIGN KEY (`User_Id`) REFERENCES `users` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
