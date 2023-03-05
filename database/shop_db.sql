-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 06:46 AM
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
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(57, 32, 27, 'Stethoscope', 400, 1, 'ser1.jpg'),
(58, 37, 24, 'Depura 6000', 100, 1, 'me1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(12, 32, 'Prethy', '0123', 'asd@gmail.com', 'bkash', 'flat no. C821r32io 34/c, Chayataru Sylhet hjhhjk Bangladesh - 3100', ', Depura 6000 ( 1 )', 100, '26-Dec-2022', 'pending'),
(13, 32, 'Prethy', '2222', 'asd@gmail.com', 'credit card', 'area. 34/c, Chayataru Sylhet Bangladesh - 3100', ', Sanfe  ( 1 )', 200, '26-Dec-2022', 'completed'),
(14, 32, 'Admin Here', '11111', 'admin@gmail.com', 'cash on delivery,Transaction ID:uitrfir', 'area. Sylhet mymen Bangladesh - 5645', ', Depura 6000 ( 1 )', 100, '26-Dec-2022', 'completed'),
(15, 32, 'moni', '1234', 'moni@gmail.com', 'cash on delivery,Transaction ID: sdd', 'area. Talihoar,Sylhet sylhet bd - 1234', ', Sanfe  ( 2 ), Depura 6000 ( 1 )', 500, '11-Jan-2023', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `details`, `price`, `image`) VALUES
(24, 'Depura 6000', 'Medicines', 'Depura 60000 Iu Vitamin D3 Oral Solution Helps Bones Healthy Aids In Boosting Immunity Sugarfree', 100, 'me1.jpg'),
(25, 'Sanfe ', 'Skin Care', 'Sanfe Back Acne Clearing Lotion With Shea Butter & Peach Extracts - 100ml', 200, 'sk1.webp'),
(26, 'Fetzima', 'Medicines', 'abcdegdasugfou.GO', 140, 'med3.jpg'),
(27, 'Stethoscope', 'Surgical', 'afosgfoAII', 400, 'ser1.jpg'),
(28, 'Surgical Mask', 'Surgical', 'dgsuP/W', 50, 'ser2.jpg'),
(29, 'Dove Conditionar', 'Skin Care', 'gfdshpi&#39;', 200, 'SK1.jpg'),
(30, 'Face Mask(Black)', 'Skin Care', 'fH;OIaoigfioyhfw', 100, 'sk3.jpg'),
(32, 'Johnson Baby Soap', 'Baby Care', 'dwsaoufw/', 90, 'bp1.png'),
(33, 'Baby Care Set', 'Baby Care', 'rytuitutjdjd', 800, 'bp3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `birth` varchar(200) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `birth`, `gender`, `password`, `user_type`, `image`) VALUES
(31, 'a', 'a@gmail.com', '', '', '', '0cc175b9c0f1b6a831c399e269772661', 'admin', 'vehicle.jpg'),
(32, 'moni', 'user@gmail.com', '', '', '', '0cc175b9c0f1b6a831c399e269772661', 'user', 'Figure_1.png'),
(33, 'Prethy', 'admin@gmail.com', 'Sylhet', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'user', ''),
(34, 'abcd', 'abc@gmail.com', '', '', '', '0cc175b9c0f1b6a831c399e269772661', 'user', 'back.jpg'),
(35, 'fsd', 'pic@gmail.com', 'ggjh', '2022-12-02', 'Male', 'd41d8cd98f00b204e9800998ecf8427e', 'user', 'background.jpg'),
(36, 'gggd', 'proc@gmail.com', 'aa', '0050-08-05', 'Female', '0cc175b9c0f1b6a831c399e269772661', 'user', 'back-int.jpeg'),
(37, 'moni', 'moni@gmail.com', 'hgf', '2000-01-12', 'Female', '0cc175b9c0f1b6a831c399e269772661', 'user', 'background.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
