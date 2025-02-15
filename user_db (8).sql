-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 07:09 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`id`, `user`, `pass`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `ambulancelist`
--

CREATE TABLE `ambulancelist` (
  `vehicleno` varchar(255) NOT NULL,
  `ambulancetype` varchar(255) NOT NULL,
  `drivername` varchar(255) NOT NULL,
  `licenseno` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `ambulance_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ambulancelist`
--

INSERT INTO `ambulancelist` (`vehicleno`, `ambulancetype`, `drivername`, `licenseno`, `city`, `ambulance_id`, `status`, `price`) VALUES
('MH-2243', 'Basic Life Support Ambulance ', 'jay sharma ', '', 'parbhani', 1, 1, '1500'),
('MH-26457', 'Advanced Life Support Ambulance', 'raj mishra', '', 'Nanded', 2, 0, '3000'),
('MH-22876', 'Basic Life Support Ambulance', 'athrva', '', 'parbhani', 3, 1, '1000'),
('MH-24897', 'Cardiac Ambulance', 'onkar patel', '', 'Latur', 5, 0, '2500'),
('MH-26567', 'Mortuary Ambulance', 'shiv sharma', '', 'Nanded', 7, 0, '2000'),
('MH-22567', 'Mortuary Ambulance', 'shiv sharma', '', 'Parbhani', 8, 1, '2000'),
('MH-22765', 'Cardic Ambulance', 'ram kadam', '', 'parbahni', 9, 1, '3000'),
('MH-22678', 'Cardic Ambulance', 'krishna jadhav', '', 'parbahni', 10, 1, '4000'),
('MH-2677', 'Basic Life Support', 'yash sharma', '', 'Nanded', 11, 0, '1000'),
('MH-26906', 'Basic Life Support', 'yash sharma', '', 'Nanded', 12, 0, '1000');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `source_address` text NOT NULL,
  `destination_address` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `note` text DEFAULT NULL,
  `ambulancetype` varchar(255) NOT NULL,
  `payee_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `first_name`, `last_name`, `mobile_no`, `email`, `source_address`, `destination_address`, `price`, `note`, `ambulancetype`, `payee_name`, `description`, `date`, `status`) VALUES
(1, 'sadhana', 'Patil', '09156701585', 'sadhanagonge@gmail.com', 'near dattadham area parbhani', 'near dattadham area parbhani', '1000.00', 'cardic disease', 'Basic Life Support Ambulance', '', '', '2024-01-17 21:36:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `email`, `code`, `expire`) VALUES
(0, 'sadhanagonge@gmail.com', '91086', 1700417918),
(0, 'sadhanagonge@gmail.com', '30405', 1700417957),
(0, 'sadhanagonge@gmail.com', '50440', 1700814128),
(0, 'sadhanagonge@gmail.com', '59421', 1700814211),
(0, 'sadhanagonge@gmail.com', '32681', 1701189705),
(0, 'sadhanagonge@gmail.com', '65270', 1701190095),
(0, 'sadhanagonge@gmail.com', '70795', 1701190099),
(0, 'sadhanagonge@gmail.com', '62293', 1701190206),
(0, 'sadhanagonge@gmail.com', '22973', 1701190211);

-- --------------------------------------------------------

--
-- Table structure for table `contactdata`
--

CREATE TABLE `contactdata` (
  `id` int(11) NOT NULL,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(55) NOT NULL,
  `message` text NOT NULL,
  `attachement` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactdata`
--

INSERT INTO `contactdata` (`id`, `firstname`, `lastname`, `phone`, `email`, `message`, `attachement`) VALUES
(1, 'sadhana', 'Patil', '9156701585', 'sadhanagonge@gmail.com', 'happy', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(100) NOT NULL,
  `mobileno` int(11) NOT NULL,
  `username` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `fname`, `lname`, `email`, `password`, `date`, `image`, `mobileno`, `username`) VALUES
(1, 'sadhana', 'Patil', 'sadhanagonge7@gmail.com', '$2y$04$R7mrdHfGZuGdBpEIx6HDL.vJICvFI2UGOwPeDppV3OBQbBroz96H2', '2023-12-11', '', 0, 'driver');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `payment_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `payment_id`, `added_date`) VALUES
(0, 1, 'pay_N7W9fylCdioSEH', '2023-12-02 08:27:02'),
(0, 1, 'pay_N7WGaMPBx6PyBg', '2023-12-02 08:33:34'),
(0, 0, 'pay_N9ZP6SCt67Pm2X', '2023-12-08 12:55:45'),
(0, 0, 'pay_N9njTQwXcsK0Ki', '2023-12-08 02:56:44'),
(0, 0, '', '2023-12-08 07:43:16'),
(0, 0, '', '2023-12-08 07:44:13'),
(0, 0, '', '2023-12-08 07:46:49'),
(0, 0, '', '2023-12-08 07:47:48'),
(0, 0, '', '2023-12-08 07:47:51'),
(0, 0, '', '2023-12-08 07:47:55'),
(0, 0, '', '2023-12-08 07:48:05'),
(0, 0, '', '2023-12-08 08:06:09'),
(0, 0, '', '2023-12-08 08:06:14'),
(0, 0, '', '2023-12-08 08:27:56'),
(0, 0, '', '2023-12-08 08:28:45'),
(0, 0, '', '2023-12-08 08:30:38'),
(0, 0, '', '2023-12-08 08:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payid` int(11) NOT NULL,
  `firstname` varchar(40) DEFAULT NULL,
  `lastname` varchar(40) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `txnid` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(455) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `razorpay_payment`
--

CREATE TABLE `razorpay_payment` (
  `id` int(10) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reset_tokens`
--

CREATE TABLE `reset_tokens` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expiration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reset_tokens`
--

INSERT INTO `reset_tokens` (`id`, `email`, `token`, `expiration`) VALUES
(1, 'sadhanagonge@gmail.com', 'e06d15a58b4a155efadea7f7f82db497557dd99a3b0f4f6611c651961d1197b8', '2023-11-16 21:35:05'),
(2, 'sadhanagonge@gmail.com', 'a4d4b41b4ad812960a78a2a294633699de511a7d968b0bd68ecb949fcbb2c5eb', '2023-11-16 21:35:36'),
(3, 'sadhanagonge@gmail.com', '766eb2fe9cca349de83fcfd0f26e608c074f69cfaab8432659121e9f66d1331e', '2023-11-16 21:46:07'),
(4, 'sadhanagonge@gmail.com', '4532e844ba160bed56ce51197842d6d4d8a4419f8ce27fa21f99ba96005a52ef', '2023-11-16 22:25:10'),
(5, 'sadhanagonge@gmail.com', '9505d447b797dec8d16a35fec84671b887bc2a4d29f2fe5939fdd8777a1c6e88', '2023-11-16 22:25:22'),
(6, 'sadhanagonge@gmail.com', '111ca20c9c1b31150bf8f2328a7d5e0b6bd731fe00d13452c4608f038647f353', '2023-11-16 22:26:36'),
(7, 'sadhanagonge@gmail.com', '031d7092c0077c749ef7af2aae06e4b9b76af280f8ec4a4b3da6c4b287bcd3ea', '2023-11-17 08:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` text NOT NULL,
  `service_desc` text NOT NULL,
  `service_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_desc`, `service_img`) VALUES
(1, 'Basic Ambulance', 'These types of ambulances are the basic ambulances that we commonly see in our daily lives. Basic ambulances are handled by an emergency medical technician (EMT) and transport patients who require basic medical supervision under minor or uncritical situations such as mild fractures, and sub-acute care facilities (nursing homes). It comprises of the patient bed, pulse oximetry and oxygen delivery devices.  ', '../uploadss5.jpg'),
(2, 'Advance Ambulance', 'Advance ambulances are equipped with advanced equipment and tools to handle critically ill patients. They are also equipped with an ECG monitor, defibrillator, intravenous and blood drawing tools, etc. Patients who require a high level of care and who are fighting for life need services like hospital emergency department or critical care unit need advance ambulance services. ', '../uploadss1.jpg'),
(3, 'Neonatal Ambulance', 'The neonatal ambulance is baby-friendly and comes equipped with the neonatal ventilators, the AMBU bag, and other specialized medical equipment. With an experienced doctor and trained paramedics being present during the NICU baby interfacility transportation.', '../uploadss2.jpg'),
(4, 'Mortuary Ambulance:', 'These ambulances are mainly for the transportation of a dead body. Irrespective of the types of ambulance in India, all of them are equipped with basic life-saving equipment and medicines for emergency. Ambulance cost depends on the types of ambulance services you opt that varies from Rs 800 - 4000 for 10 Km distance.', '../uploadss8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `username` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `date` date NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `mobileno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `date`, `image`, `mobileno`) VALUES
(1, 'Sadhana', 'Patil', 'sadhana', 'sadhanagonge@gmail.com', '$2y$10$nQwsg0OTtz8jofjcorhEhuDr9CTkflTf1/iLSDzW.NI77VEnDaRsm', '2023-11-03', 'profile_45494039.png', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambulancelist`
--
ALTER TABLE `ambulancelist`
  ADD PRIMARY KEY (`ambulance_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactdata`
--
ALTER TABLE `contactdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `razorpay_payment`
--
ALTER TABLE `razorpay_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_tokens`
--
ALTER TABLE `reset_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ambulancelist`
--
ALTER TABLE `ambulancelist`
  MODIFY `ambulance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `contactdata`
--
ALTER TABLE `contactdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `razorpay_payment`
--
ALTER TABLE `razorpay_payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reset_tokens`
--
ALTER TABLE `reset_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
