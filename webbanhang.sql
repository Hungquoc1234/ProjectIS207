-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 07:45 AM
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
-- Database: `webbanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `Video` varchar(100) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Price` char(100) DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `UserID`, `Image`, `Video`, `Name`, `Price`, `Description`) VALUES
(1, 1, '3914969-200.png', '', 'Nước hoa thơm vãi đái', '10000000', 'Ai không mua là dở'),
(5, 10, 'Magaming.jpg', '', 'Magaming', '3900000', 'sakdjfslkdjfdk'),
(6, 1, 'download.jpg', '', 'Chica', '11111', 'zsfszdfaesfszdfszfgasfsaf'),
(7, 1, 'original.jpg', '', 'Dio Brando', '99999999', 'kono dio da'),
(10, 12, '317215101_870378043959661_8102490657433506474_n.jpg', '', 'safsdaf', '123123', 'adfsdfasd'),
(11, 12, '4550512327653_1260.jpg', '', 'Cardigan', '500000', 'sadfdsfsddfadsdf'),
(12, 12, 'Screenshot 2023-05-01 101329.png', '', 'Memo Paris', '7230000', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `ProfileImage` varchar(100) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Email` char(100) NOT NULL,
  `PhoneNumber` char(100) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Password` char(100) DEFAULT NULL,
  `role` enum('admin','user','guest') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `ProfileImage`, `UserName`, `Email`, `PhoneNumber`, `Address`, `Password`, `role`) VALUES
(1, '../img/275847326_1131113490982984_6901060463790748774_n.png', 'Quốc Hưng', 'vohung647@gmail.com', '099999999', '123 đường A, phường ABC, quận AAA, HCM', 'ditconlon1234', 'admin'),
(10, '../img/original.jpg', 'Dio Brando', 'diobrando@gmail.com', '0101010101', '', 'konodioda', 'user'),
(11, '', 'le nhi', 'lenhi@gmail.com', '0606060606', '', '1234', 'user'),
(12, '../img/Magaming.jpg', 'abc', 'abc@gmail.com', '0303030303', '', '123', 'user'),
(13, '../img/client-7.png', 'def', 'def@gmail.com', '0303030303', '', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
