CREATE DATABASE IF NOT EXISTS hotel;
USE hotel;
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2020 at 09:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `country` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `hotelId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`country`, `city`, `street`, `hotelId`) VALUES
('Austria', 'Vienna', 'Herrengasse 12', 1),
('Great Britain', 'London', 'Oxford Street 10', 2),
('France', 'Paris', 'Rue de Rivoli 10', 3),
('Germany', 'Berlin', 'Hausgasse 1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `guest_user` varchar(45) NOT NULL,
  `guest_paymenttype` int(11) NOT NULL,
  `guestroom_room_roomId` int(11) NOT NULL,
  `flexibleRate` tinyint(1) DEFAULT NULL COMMENT 'flexible(1) or non-flexible(0)',
  `guests` int(11) DEFAULT NULL,
  `checkInDate` date NOT NULL,
  `checkOutDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`guest_user`, `guest_paymenttype`, `guestroom_room_roomId`, `flexibleRate`, `guests`, `checkInDate`, `checkOutDate`) VALUES
('kurz', 2, 150, 0, 1, '2020-08-01', '2020-08-08'),
('kurz', 2, 150, 1, 1, '2020-12-01', '2020-12-08'),
('kurz', 2, 152, 0, 3, '2020-04-15', '2020-04-20'),
('macron', 1, 101, 1, 2, '2020-03-05', '2020-03-08'),
('macron', 1, 101, 1, 2, '2020-11-25', '2020-11-28'),
('macron', 1, 111, 0, 2, '2020-04-05', '2020-04-10'),
('macron', 1, 111, 0, 2, '2020-09-01', '2020-09-04'),
('macron', 1, 112, 1, 2, '2020-10-22', '2020-10-30'),
('macron', 1, 151, 1, 2, '2020-02-18', '2020-02-20'),
('macron', 1, 151, 0, 2, '2020-04-10', '2020-04-12'),
('macron', 1, 151, 1, 2, '2020-04-15', '2020-04-16'),
('macron', 1, 153, 1, 3, '2020-04-20', '2020-04-21'),
('macron', 1, 153, 1, 3, '2020-04-21', '2020-04-25'),
('macron', 1, 154, 1, 4, '2020-04-16', '2002-04-21'),
('merkel', 1, 105, 1, 4, '2020-01-05', '2020-01-15'),
('merkel', 1, 106, 1, 1, '2020-03-11', '2020-03-15'),
('merkel', 1, 110, 0, 1, '2020-01-05', '2020-01-26'),
('merkel', 1, 140, 0, 2, '2020-04-15', '2020-04-20'),
('nedo', 1, 152, 0, 3, '2020-07-05', '2020-09-05'),
('test1', 1, 101, 0, 2, '2020-01-25', '2020-01-26'),
('test1', 1, 101, 1, 2, '2020-05-03', '2020-05-05'),
('test1', 1, 105, 1, 1, '2020-01-05', '2020-01-10'),
('test1', 1, 105, 1, 2, '2020-05-19', '2020-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `conferenceroom`
--

CREATE TABLE `conferenceroom` (
  `roomId` int(11) NOT NULL,
  `beamer` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conferenceroom`
--

INSERT INTO `conferenceroom` (`roomId`, `beamer`) VALUES
(910, 0),
(915, 1),
(940, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeId` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `hotelId` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `employee_employeeId` int(11) DEFAULT NULL,
  `employee_hotelId` int(11) DEFAULT NULL,
  `employee_position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeId`, `name`, `hotelId`, `position`, `employee_employeeId`, `employee_hotelId`, `employee_position`) VALUES
(1002012, 'Max Huber', 1, 1, NULL, NULL, NULL),
(1002014, 'Franz Horst', 1, 4, 1002012, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `user` varchar(45) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `emailaddress` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `paymenttype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`user`, `firstname`, `lastname`, `emailaddress`, `password`, `paymenttype`) VALUES
('admin', 'admin', 'admin', 'admin@email.at', '12', 1),
('h', 'j', 'k', 's', 'h', 2),
('johnson', 'Boris', 'Johnson', 'johnson@hotmail.co.uk', '12', 2),
('kurz', 'Sebastian', 'Kurz', 'kurz@yahoo.at', '12', 2),
('macron', 'Emmanuel', 'Macron', 'macron@hotmail.fr', '12', 1),
('merkel', 'Angela', 'Merkel', 'merkel@yahoo.de', '12', 1),
('nedo', 'f', 'l', 's', '1', 1),
('televizija5', 'nex', 'nedo', 'nedo@hotmail.com', 'frenk', 2),
('test1', 'Amela', 'Osmanovic', 'amela_osmanovic@yahoo.com', '12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guestroom`
--

CREATE TABLE `guestroom` (
  `room_roomId` int(11) NOT NULL,
  `view` tinyint(1) DEFAULT NULL,
  `balcony` tinyint(1) DEFAULT NULL,
  `bed` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guestroom`
--

INSERT INTO `guestroom` (`room_roomId`, `view`, `balcony`, `bed`) VALUES
(101, 1, 0, 'Queensize'),
(102, 1, 1, 'Queensize'),
(103, 1, 0, 'Kingsize'),
(104, 1, 1, 'Kingsize'),
(105, 1, 1, 'Queensize'),
(106, 1, 0, 'Queensize'),
(110, 0, 0, 'Kingsize'),
(111, 1, 1, 'Kingsize'),
(112, 1, 1, 'Kingsize'),
(113, 1, 0, 'Queensize'),
(140, 1, 1, 'Kingsize'),
(141, 1, 0, 'Queensize'),
(150, 1, 1, 'Queensize'),
(151, 0, 0, 'Queensize'),
(152, 0, 0, 'Kingsize'),
(153, 1, 0, 'Kingsize'),
(154, 0, 0, 'Queensize');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelId` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelId`, `name`) VALUES
(1, 'Habsburger Starhotel'),
(2, 'Oxford Starhotel'),
(3, 'Hotel Louvre'),
(4, 'Adlershof Hotel');

-- --------------------------------------------------------

--
-- Table structure for table `paymenttype`
--

CREATE TABLE `paymenttype` (
  `typeId` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymenttype`
--

INSERT INTO `paymenttype` (`typeId`, `description`) VALUES
(1, 'Credit'),
(2, 'Debit');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `postionId` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`postionId`, `description`) VALUES
(1, 'Receptionist'),
(2, 'Housekeeping Manager'),
(3, 'Night Audit'),
(4, 'Hotel Director');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `guest_user` varchar(45) NOT NULL,
  `guest_paymenttype` int(11) NOT NULL,
  `conferenceroom_roomId` int(11) NOT NULL,
  `attendees` int(11) DEFAULT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `guest_user` varchar(45) NOT NULL,
  `guest_paymenttype` int(11) NOT NULL,
  `restauranttable_tableId` int(11) NOT NULL,
  `restauranttable_hotelId` int(11) NOT NULL,
  `persons` int(11) DEFAULT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`guest_user`, `guest_paymenttype`, `restauranttable_tableId`, `restauranttable_hotelId`, `persons`, `datetime`) VALUES
('johnson', 2, 3, 1, 4, '2020-06-20 12:00:00'),
('johnson', 2, 22, 2, 4, '2020-05-20 18:00:00'),
('johnson', 2, 23, 3, 2, '2020-06-01 18:00:00'),
('johnson', 2, 31, 2, 4, '2020-05-30 18:00:00'),
('kurz', 2, 4, 1, 2, '2020-05-30 20:00:00'),
('kurz', 2, 21, 2, 4, '2020-05-05 20:00:00'),
('macron', 1, 12, 4, 2, '2020-06-05 18:00:00'),
('macron', 1, 12, 4, 2, '2020-06-20 18:00:00'),
('macron', 1, 12, 4, 2, '2020-06-25 16:00:00'),
('merkel', 1, 21, 2, 4, '2020-08-05 20:00:00'),
('nedo', 1, 4, 1, 2, '2020-05-30 20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `restauranttable`
--

CREATE TABLE `restauranttable` (
  `tableId` int(11) NOT NULL,
  `seats` double DEFAULT NULL,
  `place` varchar(45) NOT NULL,
  `hotelId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restauranttable`
--

INSERT INTO `restauranttable` (`tableId`, `seats`, `place`, `hotelId`) VALUES
(1, 4, 'at the window', 1),
(2, 4, 'at the bar', 1),
(3, 4, 'outside', 1),
(4, 2, 'at the window', 1),
(10, 4, 'at the window', 4),
(11, 4, 'in the garden', 4),
(12, 2, 'at the window', 4),
(13, 3, 'at the window', 4),
(21, 4, 'at the window', 2),
(22, 4, 'in the garden', 2),
(23, 2, 'at the bar', 3),
(24, 2, 'in the garden', 3),
(31, 4, 'at the window', 2),
(32, 4, 'in the garden', 2);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomId` int(11) NOT NULL,
  `guests` double DEFAULT NULL,
  `status` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `hotelId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomId`, `guests`, `status`, `price`, `size`, `hotelId`) VALUES
(101, 2, 1, 80, 15, 1),
(102, 3, 1, 100, 20, 1),
(103, 4, 1, 140, 22, 1),
(104, 2, 1, 90, 17, 1),
(105, 4, 1, 150, 25, 1),
(106, 1, 1, 60, 12, 1),
(110, 1, 1, 70, 11, 2),
(111, 2, 1, 80, 12, 2),
(112, 2, 1, 90, 15, 2),
(113, 3, 1, 160, 25, 2),
(140, 2, 1, 100, 28, 3),
(141, 1, 1, 80, 20, 3),
(150, 1, 1, 55, 15, 4),
(151, 2, 1, 60, 17, 4),
(152, 3, 1, 65, 20, 4),
(153, 3, 1, 75, 28, 4),
(154, 4, 1, 80, 30, 4),
(910, 50, 1, 800, 80, 1),
(915, 80, 1, 1000, 100, 2),
(940, 110, 1, 1500, 120, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusId` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusId`, `description`) VALUES
(1, 'Free'),
(2, 'Booked');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`hotelId`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`guest_user`,`guest_paymenttype`,`guestroom_room_roomId`,`checkInDate`) USING BTREE,
  ADD KEY `fk_guest_book_guestroom_guestroom1_idx` (`guestroom_room_roomId`),
  ADD KEY `fk_guest_book_guestroom_guest1_idx` (`guest_user`,`guest_paymenttype`);

--
-- Indexes for table `conferenceroom`
--
ALTER TABLE `conferenceroom`
  ADD PRIMARY KEY (`roomId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeId`,`hotelId`,`position`),
  ADD KEY `fk_employee_hotel_idx` (`hotelId`),
  ADD KEY `fk_employee_position1_idx` (`position`),
  ADD KEY `fk_employee_employee1_idx` (`employee_employeeId`,`employee_hotelId`,`employee_position`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`user`,`paymenttype`),
  ADD KEY `fk_guest_paymenttypes1_idx` (`paymenttype`);

--
-- Indexes for table `guestroom`
--
ALTER TABLE `guestroom`
  ADD PRIMARY KEY (`room_roomId`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelId`);

--
-- Indexes for table `paymenttype`
--
ALTER TABLE `paymenttype`
  ADD PRIMARY KEY (`typeId`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`postionId`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`guest_user`,`guest_paymenttype`,`conferenceroom_roomId`,`datetime`) USING BTREE,
  ADD KEY `fk_guest_rent_conferenceroom_conferenceroom1_idx` (`conferenceroom_roomId`),
  ADD KEY `fk_guest_rent_conferenceroom_guest1_idx` (`guest_user`,`guest_paymenttype`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`guest_user`,`guest_paymenttype`,`restauranttable_tableId`,`restauranttable_hotelId`,`datetime`) USING BTREE,
  ADD KEY `fk_guest_reserve_restauranttable_restauranttable1_idx` (`restauranttable_tableId`,`restauranttable_hotelId`),
  ADD KEY `fk_guest_reserve_restauranttable_guest1_idx` (`guest_user`,`guest_paymenttype`);

--
-- Indexes for table `restauranttable`
--
ALTER TABLE `restauranttable`
  ADD PRIMARY KEY (`tableId`,`hotelId`),
  ADD KEY `fk_table_hotel_idx` (`hotelId`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomId`,`status`,`hotelId`),
  ADD KEY `fk_room_hotel_idx` (`hotelId`),
  ADD KEY `fk_room_status1_idx` (`status`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fk_address_hotel` FOREIGN KEY (`hotelId`) REFERENCES `hotel` (`hotelId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_guest_book_guestroom_guest1` FOREIGN KEY (`guest_user`,`guest_paymenttype`) REFERENCES `guest` (`user`, `paymenttype`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_guest_book_guestroom_guestroom1` FOREIGN KEY (`guestroom_room_roomId`) REFERENCES `guestroom` (`room_roomId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `conferenceroom`
--
ALTER TABLE `conferenceroom`
  ADD CONSTRAINT `fk_hotel_and_room2` FOREIGN KEY (`roomId`) REFERENCES `room` (`roomId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_employee_employee1` FOREIGN KEY (`employee_employeeId`,`employee_hotelId`,`employee_position`) REFERENCES `employee` (`employeeId`, `hotelId`, `position`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_hotel` FOREIGN KEY (`hotelId`) REFERENCES `hotel` (`hotelId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_position1` FOREIGN KEY (`position`) REFERENCES `position` (`postionId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `guest`
--
ALTER TABLE `guest`
  ADD CONSTRAINT `fk_guest_paymenttypes1` FOREIGN KEY (`paymenttype`) REFERENCES `paymenttype` (`typeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `guestroom`
--
ALTER TABLE `guestroom`
  ADD CONSTRAINT `fk_hotel_and_room1` FOREIGN KEY (`room_roomId`) REFERENCES `room` (`roomId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rental`
--
ALTER TABLE `rental`
  ADD CONSTRAINT `fk_guest_rent_conferenceroom_conferenceroom1` FOREIGN KEY (`conferenceroom_roomId`) REFERENCES `conferenceroom` (`roomId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_guest_rent_conferenceroom_guest1` FOREIGN KEY (`guest_user`,`guest_paymenttype`) REFERENCES `guest` (`user`, `paymenttype`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_guest_reserve_restauranttable_guest1` FOREIGN KEY (`guest_user`,`guest_paymenttype`) REFERENCES `guest` (`user`, `paymenttype`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_guest_reserve_restauranttable_restauranttable1` FOREIGN KEY (`restauranttable_tableId`,`restauranttable_hotelId`) REFERENCES `restauranttable` (`tableId`, `hotelId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `restauranttable`
--
ALTER TABLE `restauranttable`
  ADD CONSTRAINT `fk_table_hotel` FOREIGN KEY (`hotelId`) REFERENCES `hotel` (`hotelId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_room_hotel` FOREIGN KEY (`hotelId`) REFERENCES `hotel` (`hotelId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_room_status1` FOREIGN KEY (`status`) REFERENCES `status` (`statusId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
