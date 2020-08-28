-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2020 at 02:02 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odacity`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `warehouse_id`, `added_by`, `item_id`, `qty`, `created_at`) VALUES
(8, 1, 11, 6, 0, '2020-08-21 22:18:17'),
(9, 1, 11, 5, 12, '2020-08-21 22:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `size` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `notes` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `size`, `color`, `weight`, `item_qty`, `warehouse_id`, `notes`, `created_at`, `update_at`) VALUES
(4, 'teswt', '34', 'red', '10', 0, 0, 'Notes', '2020-08-21 21:44:28', NULL),
(5, 'asdf', '123', 'asdf', '23', 2, 1, 'asdfasdf', '2020-08-21 21:56:08', NULL),
(6, 'xyz', '22', 'red', '22', 0, 1, 'asdfa', '2020-08-21 22:12:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_bills`
--

CREATE TABLE `purchase_bills` (
  `id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `supplier_name` varchar(225) NOT NULL,
  `order_date` date NOT NULL,
  `note` text NOT NULL,
  `amount` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_bills`
--

INSERT INTO `purchase_bills` (`id`, `warehouse_id`, `supplier_name`, `order_date`, `note`, `amount`, `created_by`, `created_at`) VALUES
(5, 1, 'asdf', '2020-08-21', 'asdfasdf', '650.67', 11, '2020-08-21 22:17:47'),
(6, 1, 'asdf', '2020-08-21', 'asdfasdf', '650.67', 11, '2020-08-21 22:17:53'),
(7, 1, 'asdf', '2020-08-21', 'asdfasdf', '650.67', 11, '2020-08-21 22:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_bills_items`
--

CREATE TABLE `purchase_bills_items` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `buy_price` float NOT NULL,
  `retail_price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `sub_total` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_bills_items`
--

INSERT INTO `purchase_bills_items` (`id`, `bill_id`, `item_id`, `buy_price`, `retail_price`, `qty`, `tax`, `sub_total`, `created_at`) VALUES
(4, 7, 6, 23, 23, 23, 23, 650.67, '2020-08-21 22:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `sale_qty` int(11) NOT NULL,
  `sale_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `item_id`, `sale_qty`, `sale_date`) VALUES
(1, 4, 1, '2020-08-21 21:53:18'),
(2, 4, 1, '2020-08-21 22:01:13'),
(3, 4, 2, '2020-08-21 22:03:52'),
(4, 5, 10, '2020-08-21 23:32:29'),
(5, 6, 20, '2020-08-21 23:33:21'),
(6, 6, 1, '2020-08-21 23:37:17'),
(7, 6, 2, '2020-08-21 23:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `warehouse_id`, `added_by`, `item_id`, `qty`, `created_at`) VALUES
(8, 1, 11, 5, 12, '2020-08-21 22:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ph_num` varchar(50) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `user_type` enum('admin','employee') NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 = active, 0= inactive ',
  `low_stock_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `warehouse_id`, `first_name`, `last_name`, `email`, `ph_num`, `username`, `password`, `user_type`, `status`, `low_stock_qty`, `created_at`, `deleted_at`) VALUES
(1, 0, 'Super', 'Admin', 'super@admin.com', '', 'admin', '27474ef2a683747b3a3961c96a6a152486ed0a0ea9cefdf7592c2383c3efa9a4497cb014efba80801d920a863bb6359584fb189a59db834d39638908ec2d1940e4BF8FlGj0V7OnDr9YZEFLBnLRqlBZBN9s5qwqQGPQY=', 'admin', 1, 4, '2020-08-08 04:29:20', NULL),
(11, 1, 'myshopuser', 'myshopuser', 'myshopuser@email.com', '123413', 'myshopuser', 'c81ebe31e484f8900e5647340a9a283ce7a64a2f2f2ceec8cba97ddd5b3d3c2b678c9e22697a952439bb8ef15cf63a1f906fd547fa253183a7cf85389bd34a745hFt7MjnmvmZ6P3Xj7xm6b30jth1gxE2HsY9SvrvuJk=', 'employee', 1, 0, '2020-08-21 21:59:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `warehouse_name` varchar(225) NOT NULL,
  `address` text NOT NULL,
  `ph_num` varchar(100) NOT NULL,
  `fax_num` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `warehouse_name`, `address`, `ph_num`, `fax_num`, `email`, `created_at`) VALUES
(1, 'My Shop', 'Los Angeles, USA', '34234', '345435345', 'shop@admin.com', '2020-08-08 13:58:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_bills`
--
ALTER TABLE `purchase_bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_bills_items`
--
ALTER TABLE `purchase_bills_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase_bills`
--
ALTER TABLE `purchase_bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase_bills_items`
--
ALTER TABLE `purchase_bills_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
