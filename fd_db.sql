-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2023 at 06:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fd_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(255) COLLATE utf8mb4_thai_520_w2 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_thai_520_w2;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(2, 'กระเพรา'),
(1, 'ก๋วยเตี๋ยว'),
(3, 'ผัดเผ็ด');

-- --------------------------------------------------------

--
-- Table structure for table `cate_restaurant`
--

CREATE TABLE `cate_restaurant` (
  `cr_id` int(11) NOT NULL,
  `cr_name` varchar(255) COLLATE utf8mb4_thai_520_w2 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_thai_520_w2;

--
-- Dumping data for table `cate_restaurant`
--

INSERT INTO `cate_restaurant` (`cr_id`, `cr_name`) VALUES
(1, 'japan'),
(2, 'maxico'),
(3, 'thai');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rd_id` int(11) DEFAULT 0,
  `r_id` int(11) NOT NULL DEFAULT 0,
  `o_status` int(11) DEFAULT 0,
  `sumprice` int(11) NOT NULL,
  `date_time` varchar(255) COLLATE utf8mb4_thai_520_w2 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_thai_520_w2;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `user_id`, `rd_id`, `r_id`, `o_status`, `sumprice`, `date_time`) VALUES
(3, 11, 0, 1, 0, 140, '29-08-2023 18:29:04'),
(4, 10, 0, 1, 0, 20, '01-09-2023 17:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `od_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `pro_qty` int(11) DEFAULT NULL,
  `pro_sumprice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_thai_520_w2;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`od_id`, `o_id`, `pro_id`, `pro_qty`, `pro_sumprice`) VALUES
(2, 3, 2, 3, 105),
(3, 3, 3, 1, 35),
(4, 4, 3, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_thai_520_w2 DEFAULT NULL,
  `pro_price` int(11) DEFAULT NULL,
  `pro_discount` int(11) NOT NULL,
  `r_id` int(11) DEFAULT NULL,
  `pro_image` varchar(255) COLLATE utf8mb4_thai_520_w2 DEFAULT 'df.png',
  `pro_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_thai_520_w2;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `cate_id`, `pro_name`, `pro_price`, `pro_discount`, `r_id`, `pro_image`, `pro_status`) VALUES
(1, 1, 'ก๋วยเตี๋ยวแซบๆ', 40, 12, 1, 'df.png', 0),
(2, 3, 'ผัดเผ็ดกุ้ง', 50, 30, 3, 'df.png', 0),
(3, 2, 'กระเพราเนื้อ', 20, 2, 1, 'df.png', 0),
(4, 1, 'ก๋วยเตี๋ยวเรือ', 32, 10, 3, 'df.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `rv_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `rv_details` text COLLATE utf8mb4_thai_520_w2 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_thai_520_w2;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_thai_520_w2 DEFAULT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_thai_520_w2 DEFAULT NULL,
  `user_ad` text COLLATE utf8mb4_thai_520_w2 DEFAULT NULL,
  `user_level` enum('admin','user') COLLATE utf8mb4_thai_520_w2 DEFAULT 'user',
  `user_status` int(11) DEFAULT 1,
  `user_image` varchar(255) COLLATE utf8mb4_thai_520_w2 DEFAULT 'df.png',
  `raider` int(11) DEFAULT 0,
  `restaurant` int(11) DEFAULT 0,
  `cr_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_thai_520_w2;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_ad`, `user_level`, `user_status`, `user_image`, `raider`, `restaurant`, `cr_id`) VALUES
(1, 'alice_smith', '123', '456 Elm St', 'user', 1, 'df.png', 0, 2, 1),
(2, 'bob_johnson', '123', '789 Oak Ave', 'user', 1, 'df.png', 2, 0, 0),
(3, 'emma_davis', '123', '101 Pine Rd', 'user', 1, 'df.png', 0, 2, 2),
(9, 'admin', '123', '123/2', 'admin', 1, '23938578fb8d88c02bc59906d12230f3.png', 0, 0, 0),
(10, 'nin', '123', '34/2', 'user', 1, 'df.png', 2, 2, 2),
(11, 'therock', '123', '56/2', 'user', 1, 'df.png', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`),
  ADD UNIQUE KEY `cate_name` (`cate_name`);

--
-- Indexes for table `cate_restaurant`
--
ALTER TABLE `cate_restaurant`
  ADD PRIMARY KEY (`cr_id`),
  ADD UNIQUE KEY `cr_name` (`cr_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD UNIQUE KEY `pro_name` (`pro_name`),
  ADD KEY `cate_id` (`cate_id`),
  ADD KEY `r_id` (`r_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`rv_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cate_restaurant`
--
ALTER TABLE `cate_restaurant`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `rv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `category` (`cate_id`),
  ADD CONSTRAINT `r_id` FOREIGN KEY (`r_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
