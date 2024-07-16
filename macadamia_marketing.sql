-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 07:28 AM
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
-- Database: `macadamia_marketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `buyer_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`buyer_id`, `username`, `password`, `company_name`, `location`, `phone_number`, `email`) VALUES
(1, 'brytmago@gmail.com', '1234567890', 'riri corp', 'KIAMBU', '0796828445', 'brytmagomez@gmail.com'),
(2, 'mimi', '1234567890', 'riri corp', 'KIAMBU', '0796828445', 'brytmagomez@gmail.com'),
(3, 'wewe', '1234567890', 'genge', 'KIAMBU', '0722423456', 'damaskenya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `communication`
--

CREATE TABLE `communication` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_content` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `communication`
--

INSERT INTO `communication` (`message_id`, `sender_id`, `receiver_id`, `message_content`, `timestamp`) VALUES
(1, 1, 1, 'bubbubububun', '2024-05-29 23:26:03'),
(2, 2, 1, 'nataka izo vitu bana', '2024-05-30 08:12:18'),
(3, 2, 1, 'weretdfcvjh', '2024-05-30 08:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `farmer_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `farm_name` varchar(150) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`farmer_id`, `username`, `password`, `name`, `farm_name`, `location`, `phone_number`, `email`) VALUES
(1, 'abelito', '1234567890', 'Abel Muthoni', 'abel farm', 'KIAMBU', '0796828445', 'abe@gmail.com'),
(2, 'brytmago@gmail.com', '123456', 'magore bryght', 'riri', 'KIAMBU', '0796828445', 'brytmago@gmail.com'),
(3, 'mimi', '1234567890', 'ni mimi', 'ni wewe', 'KIAMBU', '0796828445', 'mimi@gmail.com'),
(4, 'bryghton', '111454', 'bryghton magomere', 'koko', 'murang\\\'a', '0796828445', 'brytmagomez@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `macadamialisting`
--

CREATE TABLE `macadamialisting` (
  `listing_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `variety` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quality` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `macadamialisting`
--

INSERT INTO `macadamialisting` (`listing_id`, `farmer_id`, `variety`, `quantity`, `price`, `quality`, `description`, `image`) VALUES
(16, 1, 'macadamia', 1, 133.00, 'Premium', NULL, ''),
(17, 1, 'Beaumont', 500, 10.50, 'A', 'High-quality macadamia nuts of Beaumont variety.', 'images/beaumont.jpg'),
(18, 2, 'A4', 300, 8.75, 'B', 'Grade B macadamia nuts of A4 variety.', 'images/a4.jpg'),
(19, 1, 'Nelmak 2', 1000, 12.00, 'A', 'Top-grade macadamia nuts of Nelmak 2 variety.', 'images/nelmak2.jpg'),
(20, 3, 'A16', 200, 9.50, 'C', 'Average quality macadamia nuts of A16 variety.', 'images/a16.jpg'),
(21, 1, 'A4', 100, 14.80, 'Standard', NULL, ''),
(22, 1, 'A4', 100, 14.80, 'Standard', NULL, ''),
(23, 1, 'A4', 100, 14.80, 'Premium', NULL, ''),
(24, 1, 'A4', 100, 14.80, 'Premium', NULL, ''),
(25, 2, 'A4', 100, 14.80, 'Premium', NULL, ''),
(26, 3, 'A4', 100, 14.80, 'Premium', NULL, ''),
(27, 3, 'A4', 100, 14.80, 'Standard', NULL, ''),
(28, 4, 'A4', 100, 14.80, 'Premium', NULL, ''),
(29, 4, 'CC790', 100, 14.80, 'Premium', NULL, ''),
(30, 4, 'nol678bn', 100, 14.80, 'Premium', NULL, NULL),
(31, 3, 'nol678bn', 100, 14.80, 'Premium', NULL, NULL),
(32, 3, 'nol678bn', 100, 14.80, 'Premium', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`buyer_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `communication`
--
ALTER TABLE `communication`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `fk_sender` (`sender_id`),
  ADD KEY `fk_receiver` (`receiver_id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`farmer_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `macadamialisting`
--
ALTER TABLE `macadamialisting`
  ADD PRIMARY KEY (`listing_id`),
  ADD KEY `farmer_id` (`farmer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `buyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `communication`
--
ALTER TABLE `communication`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `farmer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `macadamialisting`
--
ALTER TABLE `macadamialisting`
  MODIFY `listing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `communication`
--
ALTER TABLE `communication`
  ADD CONSTRAINT `fk_receiver` FOREIGN KEY (`receiver_id`) REFERENCES `buyer` (`buyer_id`),
  ADD CONSTRAINT `fk_sender` FOREIGN KEY (`sender_id`) REFERENCES `farmer` (`farmer_id`);

--
-- Constraints for table `macadamialisting`
--
ALTER TABLE `macadamialisting`
  ADD CONSTRAINT `macadamialisting_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmer` (`farmer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
