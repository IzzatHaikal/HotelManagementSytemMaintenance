-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 11:45 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(255) NOT NULL,
  `impression` varchar(255) NOT NULL,
  `first_hear` varchar(255) NOT NULL,
  `missing_features` varchar(255) NOT NULL,
  `recommend` varchar(255) NOT NULL,
  `useful_features` varchar(255) NOT NULL,
  `ease_of_use` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `impression`, `first_hear`, `missing_features`, `recommend`, `useful_features`, `ease_of_use`) VALUES
(1, '123', '123', '123', '5', '123', '123'),
(2, 'Traditionally, a text is understood to be a piece of written or spoken material in its primary form (as opposed to a paraphrase or summary). A text is any stretch of language that can be understood in context. It may be as simple as 1-2 words (such as a s', 'Traditionally, a text is understood to be a piece of written or spoken material in its primary form (as opposed to a paraphrase or summary). A text is any stretch of language that can be understood in context. It may be as simple as 1-2 words (such as a s', 'Traditionally, a text is understood to be a piece of written or spoken material in its primary form (as opposed to a paraphrase or summary). A text is any stretch of language that can be understood in context. It may be as simple as 1-2 words (such as a s', '5', 'Traditionally, a text is understood to be a piece of written or spoken material in its primary form (as opposed to a paraphrase or summary). A text is any stretch of language that can be understood in context. It may be as simple as 1-2 words (such as a s', 'Traditionally, a text is understood to be a piece of written or spoken material in its primary form (as opposed to a paraphrase or summary). A text is any stretch of language that can be understood in context. It may be as simple as 1-2 words (such as a s'),
(3, 'test', 'test', 'test', '3', 'test', 'test'),
(4, 'In this tutorial, you\'ve set up a sample database, created a table, and populated it with some records. Then, you\'ve used the PDO library to fetch data from your database and finally used some PHP functions to convert the data to the JSON format. Use this', 'In this tutorial, you\'ve set up a sample database, created a table, and populated it with some records. Then, you\'ve used the PDO library to fetch data from your database and finally used some PHP functions to convert the data to the JSON format. Use this', 'In this tutorial, you\'ve set up a sample database, created a table, and populated it with some records. Then, you\'ve used the PDO library to fetch data from your database and finally used some PHP functions to convert the data to the JSON format. Use this', '0', 'In this tutorial, you\'ve set up a sample database, created a table, and populated it with some records. Then, you\'ve used the PDO library to fetch data from your database and finally used some PHP functions to convert the data to the JSON format. Use this', 'In this tutorial, you\'ve set up a sample database, created a table, and populated it with some records. Then, you\'ve used the PDO library to fetch data from your database and finally used some PHP functions to convert the data to the JSON format. Use this'),
(5, 'test1', 'test1', 'test1', '5', 'test1', 'test1'),
(6, 'test3', 'test3', 'test3', '1', 'test3', 'test3'),
(7, 'rush', 'rush', 'rush', '1', 'rush', 'rush'),
(8, 'zieq', 'zieq', 'zieq', '1', 'zieq', 'zieq'),
(9, 'check', 'check', 'check', '1', 'check', 'check'),
(10, 'last check', 'last check', 'last check', '1', 'last check', 'last check'),
(11, 'last test ', 'last test', 'last test', '1', 'last test', 'last test'),
(12, 'izzat', 'izzat', 'izzat', '5', 'izzat', 'izzat');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `currency` varchar(5) DEFAULT 'INR',
  `method` varchar(10) DEFAULT 'card',
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `no_adults` int(11) DEFAULT NULL,
  `no_children` int(11) DEFAULT NULL,
  `reservation_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `room_name` varchar(30) NOT NULL,
  `room_type` varchar(30) NOT NULL,
  `room_featured` int(1) NOT NULL,
  `room_price` double(10,3) NOT NULL,
  `room_booked` int(1) DEFAULT 0,
  `check_in_date` date DEFAULT NULL,
  `check_out_date` date DEFAULT NULL,
  `room_image` varchar(50) NOT NULL,
  `room_floor` int(11) NOT NULL,
  `room_view` varchar(20) NOT NULL,
  `room_beds` int(11) NOT NULL,
  `bed_type` varchar(30) NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `room_amenities` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_number`, `room_name`, `room_type`, `room_featured`, `room_price`, `room_booked`, `check_in_date`, `check_out_date`, `room_image`, `room_floor`, `room_view`, `room_beds`, `bed_type`, `room_capacity`, `room_amenities`) VALUES
(1, 101, 'Daimond Suite', 'Daimond', 1, 538.220, 0, NULL, NULL, '3.jpg', 2, 'Beach', 2, 'Double deluxe', 4, 'breakfast, lunch, dinner, wifi'),
(2, 101, 'Daimond Suite', 'Silver', 1, 538.220, 0, NULL, NULL, '4.jpg', 5, 'Beach', 2, 'Double deluxe', 4, 'breakfast, lunch, dinner, wifi'),
(3, 202, 'Ocean View Suite', 'gold', 0, 788.000, 0, NULL, NULL, '4.jpg', 2, 'Ocean', 3, 'Queen Bed', 2, 'Ocean View, Wifi, Double bathroom'),
(4, 303, 'Premiun', 'Premium', 1, 674.000, 0, NULL, NULL, '6.jpg', 3, 'Ocean', 2, 'Queen Bed', 3, 'Ocean View, Wifi, Double bathroom, hairdryer'),
(5, 202, 'Ocean View Suite', 'gold', 0, 788.000, 0, NULL, NULL, '5.jpg', 2, 'Ocean', 3, 'Queen Bed', 7, 'Ocean View, Wifi, Double bathroom'),
(6, 202, 'Ocean View Suite', 'Silver', 1, 788.000, 0, NULL, NULL, '1.jpg', 2, 'Ocean', 3, 'Queen Bed', 7, 'Ocean View, Wifi, Double bathroom'),
(7, 202, 'Ocean View Suite', 'Gold', 1, 788.000, 0, NULL, NULL, '7.jpg', 2, 'Ocean', 3, 'Queen Bed', 7, 'Ocean View, Wifi, Double bathroom'),
(8, 202, 'Ocean View Suite', 'Premium', 1, 788.000, 0, NULL, NULL, '1.jpg', 2, 'Ocean', 3, 'Queen Bed', 7, 'Ocean View, Wifi, Double bathroom');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_fname` varchar(20) NOT NULL,
  `user_lname` varchar(20) NOT NULL,
  `user_verified` int(1) NOT NULL DEFAULT 0,
  `verification_hash` varchar(500) NOT NULL,
  `user_dob` date NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_admin` int(1) NOT NULL DEFAULT 0,
  `user_password` varchar(500) NOT NULL,
  `user_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_image` varchar(20) NOT NULL DEFAULT 'default_user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_fname`, `user_lname`, `user_verified`, `verification_hash`, `user_dob`, `user_phone`, `user_admin`, `user_password`, `user_created`, `user_image`) VALUES
(3, 'admin@gmail.com', 'Admin ', 'Account', 1, '5a4b25aaed25c2ee1b74de72dc03c14e', '2000-07-19', '0213123118024', 1, '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '2020-11-22 17:52:46', 'default_user.jpg'),
(6, 'alandsilva@gmail.com', 'Alan', 'Dsilva', 1, 'c3e878e27f52e2a57ace4d9a76fd9acf', '2020-11-23', '0213123118024', 1, 'db42328112177c2d6f2f6ca7f33c8e81084b8ff3e14202254137e22673bce2c8', '2020-11-25 04:03:00', 'default_user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_idfk_1` (`reservation_id`),
  ADD KEY `payment_idfk_2` (`user_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_idfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_idfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
