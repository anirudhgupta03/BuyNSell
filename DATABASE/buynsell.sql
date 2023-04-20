-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: APRIL 11, 2021 
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
-- Database: `scs`
--

-- --------------------------------------------------------
--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  -- `surname` varchar(50) NOT NULL,
  -- `gender` varchar(50) NOT NULL,
  -- `hobby` varchar(100) NOT NULL,
  -- `country` int(11) NOT NULL,
  `dor` datetime NOT NULL,
  `status` enum('Enable','Disable') NOT NULL DEFAULT 'Enable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile number` bigint(11) NOT NULL,
  `name` varchar(50) NOT NULL
  -- `surname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `mobile number`, `name`) VALUES
(1, 'admin', 'admin', 1234567095, 'Chandramani Kumar'),
(2, 'admin2', 'admin2', 3124567893, 'Vishwam Shriram Mundada'),
(3, 'admin3', 'admin3', 1238767095, 'Anirudh Gupta');
-- --------------------------------------------------------


CREATE TABLE `product_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img_name` varchar(100) NOT NULL
  -- `surname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `product_category` (`category_id`, `name`, `img_name`) VALUES
(1, 'Books', 'books.jpg'),
(2, 'Electronics', 'electronic_items.jpg'),
(3, 'Essentials', 'essentials.jpg'),
(4, 'Sports and Fitness', 'sports_and_fitness.jpg'),
(5, 'Stationery', 'stationery.png'),
(6, 'Subscriptions', 'subscriptions.jpg'),
(7, 'Music', 'music.jpg');

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  -- `bidstarttime` datetime NOT NULL,
  -- `bidendtime` datetime NOT NULL,
  `status` enum('On Sale','Sold','Disable') NOT NULL DEFAULT 'On Sale'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE `tbl_purchase` (
  `purchase_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `transcn_id` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,  
  `uid` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `uid` (`uid`);


--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `pro_id` (`pro_id`);


--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `pro_id` (`pro_id`);



--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);


--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`category_id`);


--
-- Indexes for table `user`
--
ALTER TABLE `tbl_purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `buyer_id` (`buyer_id`);


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_img`
--
ALTER TABLE `product_images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;


--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;


--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_purchase`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE;


--
-- Constraints for table `review_table`
--
ALTER TABLE `review_table`
  ADD CONSTRAINT `review_table_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_table_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE;


--
-- Constraints for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD CONSTRAINT `tbl_purchase_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_purchase_ibfk_2` FOREIGN KEY (`buyer_id`) REFERENCES `user` (`uid`) ON DELETE CASCADE;


--
-- Constraints for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD CONSTRAINT `tbl_wishlist_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_wishlist_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE;


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
