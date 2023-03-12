-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 08:58 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `r_id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `car_description` text NOT NULL,
  `car_location` text NOT NULL,
  `rent_price` int(11) NOT NULL,
  `rent_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`r_id`, `user_id`, `car_description`, `car_location`, `rent_price`, `rent_photo`) VALUES
(0, 9, 'Premio', 'Bashundhora, Dhaka.', 2000, 'uploads/DCIM_202006011350.jpg'),
(0, 9, 'Audi Q8', 'Gulshan, Dhaka', 3000, 'uploads/DCIM_202006011351.jpg'),
(0, 9, 'Marcedes E-class', 'Banani, Dhaka.', 2500, 'uploads/DCIM_202006011353.jpg'),
(0, 9, 'Audi Q6', 'Uttara, Dhaka', 2500, 'uploads/DCIM_202006011354.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_name` char(32) DEFAULT NULL,
  `user_email` char(32) NOT NULL,
  `user_password` char(32) DEFAULT NULL,
  `user_phone` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_phone`) VALUES
(9, 'a', 'a@f', 'a', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
