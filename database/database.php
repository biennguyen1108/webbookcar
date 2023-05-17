-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 04:36 AM
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
-- Database: `booking_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id_account` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `token` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id_account`, `username`, `password`, `role`, `token`) VALUES
(1, 'Thu_huong', '123456', 'user', 'driver'),
(2, 'Kieu', '123', 'admin', '222'),
(3, 'thuy', '123', 'driver', '');

-- --------------------------------------------------------

--
-- Table structure for table `book_cars`
--

CREATE TABLE `book_cars` (
  `id_bookcar` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_trips` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id_drivers` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `name_drivers` varchar(100) NOT NULL,
  `image` mediumtext NOT NULL,
  `description` varchar(255) NOT NULL,
  `driver_license` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id_drivers`, `id_account`, `name_drivers`, `image`, `description`, `driver_license`, `address`, `age`, `phone`) VALUES
(1, 1, 'thu huong', 'https://www.bing.com/ck/a?!&&p=8b0d975373a8475bJmltdHM9MTY4MTM0NDAwMCZpZ3VpZD0wNTU1N2M0Mi03NzY4LTYyZWMtMjc3NS02ZWE4NzYwZTYzMDcmaW5zaWQ9NTQxNw&ptn=3&hsh=3&fclid=05557c42-7768-62ec-2775-6ea8760e6307&u=a1L2ltYWdlcy9zZWFyY2g_cT1IaW5oJTIwQW5oJkZPUk09SVFGUkJBJm', 'Toi la lai xe xin', '1235heb', '101B', 22, '1625372898'),
(2, 3, 'thuy', 'jhjd', 'fff', 'ffff', 'ffff', 33, '1625372898');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id_items` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_trips` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `weight` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_trips` int(11) NOT NULL,
  `id_payment` int(11) NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `id_items` int(11) NOT NULL,
  `id_bookcar` int(11) NOT NULL,
  `method` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id_trips` int(11) NOT NULL,
  `id_drivers` int(11) NOT NULL,
  `id_vehicle` int(11) NOT NULL,
  `point_of_departure` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `trip_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `price_book` int(11) NOT NULL,
  `price_ship` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id_trips`, `id_drivers`, `id_vehicle`, `point_of_departure`, `destination`, `trip_date`, `status`, `price_book`, `price_ship`) VALUES
(1, 1, 1, 'Đà Nẵng', 'Quảng Trị', '2023-04-13 14:40:00', 'Dừng', 1222333, 1332372);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id_vehicle` int(11) NOT NULL,
  `name_vehicles` varchar(100) NOT NULL,
  `vehicle_type` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `capacity` varchar(10) NOT NULL,
  `seat` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id_vehicle`, `name_vehicles`, `vehicle_type`, `image`, `capacity`, `seat`, `description`) VALUES
(1, 'hjsdsj', 'luxury', 'https://th.bing.com/th?id=OIP.IgOiWwf9_IaYpWgkQx1bhgHaEo&w=316&h=197&c=8&rs=1&qlt=90&o=6&pid=3.1&rm=2', '123', 12, 'uryhrgkfldjgk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id_account`);

--
-- Indexes for table `book_cars`
--
ALTER TABLE `book_cars`
  ADD PRIMARY KEY (`id_bookcar`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_trips` (`id_trips`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id_drivers`),
  ADD KEY `id_accounts` (`id_account`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_items`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_trips` (`id_trips`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_payment` (`id_payment`),
  ADD KEY `id_trips` (`id_trips`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_items` (`id_items`),
  ADD KEY `id_bookcar` (`id_bookcar`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id_trips`),
  ADD KEY `id_drivers` (`id_drivers`),
  ADD KEY `id_vehicle` (`id_vehicle`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `id_accounts` (`id_account`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id_vehicle`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book_cars`
--
ALTER TABLE `book_cars`
  MODIFY `id_bookcar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id_drivers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id_items` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id_trips` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id_vehicle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_cars`
--
ALTER TABLE `book_cars`
  ADD CONSTRAINT `book_cars_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`),
  ADD CONSTRAINT `book_cars_ibfk_2` FOREIGN KEY (`id_trips`) REFERENCES `trips` (`id_trips`);

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id_account`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`id_trips`) REFERENCES `trips` (`id_trips`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_payment`) REFERENCES `payment` (`id_payment`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_trips`) REFERENCES `trips` (`id_trips`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`id_items`) REFERENCES `items` (`id_items`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`id_bookcar`) REFERENCES `book_cars` (`id_bookcar`);

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`id_drivers`) REFERENCES `drivers` (`id_drivers`),
  ADD CONSTRAINT `trips_ibfk_2` FOREIGN KEY (`id_vehicle`) REFERENCES `vehicles` (`id_vehicle`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id_account`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
