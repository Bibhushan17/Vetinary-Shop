-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 03:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundrie`
--

-- --------------------------------------------------------

--
-- Table structure for table `dry`
--

CREATE TABLE `dry` (
  `service_id` varchar(6) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `service_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dry`
--

INSERT INTO `dry` (`service_id`, `service_name`, `service_price`) VALUES
('DRY101', 'Shirt/Tshirt', '120'),
('DRY102', 'Pant/Trouser', '140'),
('DRY103', 'Coat', '240');

-- --------------------------------------------------------

--
-- Table structure for table `dry_cleaning`
--

CREATE TABLE `dry_cleaning` (
  `id` int(3) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `SelectedItem` varchar(10) NOT NULL,
  `Weight` varchar(50) NOT NULL,
  `TotalPrice` double NOT NULL,
  `PickupDate` varchar(10) NOT NULL,
  `PickupTime` varchar(6) NOT NULL,
  `DeliveryDate` varchar(10) NOT NULL,
  `DeliveryTime` varchar(6) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dry_cleaning`
--

INSERT INTO `dry_cleaning` (`id`, `Name`, `Address`, `Phone`, `SelectedItem`, `Weight`, `TotalPrice`, `PickupDate`, `PickupTime`, `DeliveryDate`, `DeliveryTime`, `Status`) VALUES
(3, 'Bibhushan Jung Sijapati', 'Anamnagar', '9854512656', '120', '9', 1080, '2023-09-26', '11:01', '2023-09-27', '11:01', 'Delivered'),
(7, 'Aayush Sapkota', 'Chabahil', '9874561239', '120', '4', 480, '2023-09-25', '14:11', '2023-09-26', '13:14', 'Delivered'),
(17, 'Puskar Khadka', 'Maitidevi,Kathmandu', '9862233740', '120', '3', 360, '2023-09-30', '07:01', '2023-10-01', '07:02', 'Delivered'),
(18, 'Puskar Khadka', 'Maitidevi,Kathmandu', '9862233740', '140', '3.78', 529.2, '2023-09-29', '07:01', '2023-10-01', '07:02', 'Delivered'),
(19, 'Puskar Khadka', 'Maitidevi,Kathmandu', '9862233740', '120', '7.7', 924, '2023-09-29', '07:01', '2023-10-01', '07:02', 'Delivered'),
(20, 'Puskar Khadka', 'Maitidevi,Kathmandu', '9862233740', '120', '7.7', 0, '2023-09-30', '07:01', '2023-10-01', '07:02', 'Delivered'),
(21, 'Bibhushan Jung Sijapati', 'Anamnagar', '9854512656', '240', '10', 2400, '2023-09-28', '16:30', '2023-09-29', '17:24', ''),
(22, 'Bibhushan Jung Sijapati', 'Anamnagar', '9854512656', '240', '7', 1680, '2023-09-28', '17:30', '2023-09-29', '15:24', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `email` varchar(100) NOT NULL,
  `feedback` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`email`, `feedback`) VALUES
('bibhushanjung@gmail.com', 'wefdg'),
('bibhushan@gmail.com', 'sqewrtyjgkuhl/.'),
('admin@gmail.com', 'Checking if the form works!'),
('admin@gmail.com', 'Checking if the form works!'),
('bibhushanjung2002@outlook.com', 'Checking prompt messages!'),
('bibhushanjung2002@outlook.com', 'Checking prompt messages!'),
('shantak2011@gmail.com', 'Luga Dhuna Parne thyo k  k cha hola service hajur ko!'),
('shantak2011@gmail.com', 'Luga Dhuna Parne thyo k  k cha hola service hajur ko!'),
('shantak2011@gmail.com', 'Luga Dhuna Parne thyo k  k cha hola service hajur ko!'),
('shantak2011@gmail.com', 'Luga Dhuna Parne thyo k  k cha hola service hajur ko!'),
('shantak2011@gmail.com', 'Luga Dhuna Parne thyo k  k cha hola service hajur ko!');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Weight` varchar(3) NOT NULL,
  `TotalPrice` double NOT NULL,
  `PickupDate` varchar(10) NOT NULL,
  `PickupTime` varchar(6) NOT NULL,
  `DeliveryDate` varchar(10) NOT NULL,
  `DeliveryTime` varchar(6) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_new`
--

CREATE TABLE `order_new` (
  `id` int(3) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `SelectedItem` varchar(10) NOT NULL,
  `Weight` varchar(50) NOT NULL,
  `TotalPrice` double NOT NULL,
  `PickupDate` varchar(10) NOT NULL,
  `PickupTime` varchar(6) NOT NULL,
  `DeliveryDate` varchar(10) NOT NULL,
  `DeliveryTime` varchar(6) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `PetName` varchar(55) NOT NULL,
  `Species` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_new`
--

INSERT INTO `order_new` (`id`, `Name`, `Address`, `Phone`, `SelectedItem`, `Weight`, `TotalPrice`, `PickupDate`, `PickupTime`, `DeliveryDate`, `DeliveryTime`, `Status`, `PetName`, `Species`) VALUES
(97, 'bibhushan', 'samakhusi 111', '9862079696', '120', '3', 360, '2023-09-30', '09:13', '2023-09-16', '09:17', 'Delivered', '', ''),
(116, 'Aayush Sapkota', 'Chabahil', '9874561239', '120', '2', 240, '2023-09-24', '08:11', '2023-09-26', '15:11', 'Delivered', '', ''),
(125, 'Bibhushan Jung Sijapati', 'Anamnagar', '9854512656', '120', '3', 360, '2023-09-24', '10:05', '2023-09-26', '09:08', 'Delivered', '', ''),
(126, 'Puskar Khadka', 'Maitidevi,Kathmandu', '9862233740', '120', '2', 240, '2023-09-25', '14:01', '2023-09-27', '10:02', 'Delivered', '', ''),
(130, 'Aayush Sapkota', 'Chabahil', '9874561239', '120', '3', 360, '2023-09-26', '14:42', '2023-09-27', '14:42', 'Delivered', '', ''),
(131, 'Puskar Khadka', 'Maitidevi,Kathmandu', '9862233740', '165', '3', 495, '2023-09-28', '07:58', '2023-09-29', '08:57', 'Delivered', '', ''),
(133, 'Puskar Khadka', 'Maitidevi,Kathmandu', '9862233740', '250', '2', 500, '2023-09-28', '08:58', '2023-10-01', '08:57', 'Delivered', '', ''),
(137, 'Bibhushan Jung Sijapati', 'Anamnagar', '9854512656', '165', '10', 1650, '2023-09-28', '17:25', '2023-09-29', '17:22', 'Delivered', '', ''),
(139, 'Puskar Khadka', 'Maitidevi,Kathmandu', '9862233740', '1000', '6', 6000, '2023-11-07', '17:02', '2023-11-22', '17:01', 'Confirmed', '', ''),
(140, 'Puskar Khadka', 'Maitidevi,Kathmandu', '9862233740', '2000', '2', 4000, '2023-11-14', '06:38', '2023-11-30', '06:37', 'Confirmed', 'khaire and Tommy', 'Dog'),
(141, 'Bibhushan Jung SIjapati', 'Kathmandu', '9862079696', '1500', '2', 3000, '2023-11-08', '16:03', '2023-11-09', '16:03', 'Delivered', '', ''),
(142, 'Bibhushan Jung SIjapati', 'Kathmandu', '9862079696', '2000', '4', 8000, '', '', '', '', '', 'Ramesh', 'Dog');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(2) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `service_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_price`) VALUES
(1, 'Wellness Exam', '2000'),
(2, 'Dental Care', '1500'),
(3, 'Dietary Consultation', '1200'),
(4, 'Vaccinations', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `package_id` int(3) NOT NULL,
  `package_name` varchar(50) NOT NULL,
  `package_price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`package_id`, `package_name`, `package_price`) VALUES
(1, 'Basic ', 1600),
(2, 'Intermediate', 2100),
(3, 'Master', 2800),
(1, 'Basic ', 1600),
(2, 'Intermediate', 2100),
(3, 'Master', 2800);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_order`
--

CREATE TABLE `subscription_order` (
  `id` int(3) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `SelectedItem` varchar(10) NOT NULL,
  `Weight` varchar(50) NOT NULL,
  `TotalPrice` double NOT NULL,
  `PickupDate` varchar(10) NOT NULL,
  `PickupTime` varchar(6) NOT NULL,
  `DeliveryDate` varchar(10) NOT NULL,
  `DeliveryTime` varchar(6) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription_order`
--

INSERT INTO `subscription_order` (`id`, `Name`, `Address`, `Phone`, `SelectedItem`, `Weight`, `TotalPrice`, `PickupDate`, `PickupTime`, `DeliveryDate`, `DeliveryTime`, `Status`) VALUES
(131, 'Bibhushan Jung SIjapati', 'Kathmandu', '9862079696', '1600', '3', 4800, '2023-09-27', '17:35', '2023-09-28', '17:31', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `register_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`, `phone`, `address`, `register_time`) VALUES
(3, 'Bibhushan Jung Sijapati', 'bibhushanJung', 'bibhushan11', 'bibhushanjung@gmail.com', '9854612302', 'Kathmandu', '2023-09-17 02:21:30'),
(4, 'John Roy William', 'Nelson', 'nelly1123', 'bibhushan12585@gmail.com', '9874563352', 'New-Baneshwor', '2023-09-17 02:21:37'),
(5, 'Bibhushan Jung SIjapati', 'bibhushan', 'admin123', 'bibhushan@gmail.com', '9862079696', 'Kathmandu', '2023-09-17 02:21:52'),
(6, 'Angil Neupane', 'Angil123', 'admin123', 'angil@gmail.com', '9869493550', 'Tinkune', '2023-09-17 02:22:00'),
(7, 'Bibhushan Jung Sijapati', 'admin', 'password', 'admin@gmail.com', '9854512656', 'Anamnagar', '2023-09-17 02:22:11'),
(9, 'Aayush Shrestha', 'aayush0712', 'aayush11', 'aayushshrestha1379@gmail.com', '9741256389', 'Basundhara, Kathmandu', '2023-09-17 02:22:19'),
(11, 'Aayush Sapkota', 'extreme07', 'aayush', 'aayush007@gmail.com', '9874561239', 'Chabahil', '2023-09-07 01:53:10'),
(12, 'Bieny Dhakal', 'bieny113', 'kishor', 'bieny123@gmail.com', '9874642322', 'Mulpani', '2023-09-23 10:02:26'),
(14, 'Puskar Khadka', 'puskar', 'puskar11', 'khadkapuskar@gmail.com', '9862233740', 'Maitidevi,Kathmandu', '2023-09-24 04:01:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dry_cleaning`
--
ALTER TABLE `dry_cleaning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_new`
--
ALTER TABLE `order_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_order`
--
ALTER TABLE `subscription_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dry_cleaning`
--
ALTER TABLE `dry_cleaning`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_new`
--
ALTER TABLE `order_new`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `subscription_order`
--
ALTER TABLE `subscription_order`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
