-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2020 at 10:31 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `martinbornilla`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `customer_status` enum('active','inactive','blocked') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `phone_number`, `email`, `address`, `customer_status`) VALUES
(1, 'Abid', 'Sher', '03003079468', 'abidali1811@gmail.com', 'qasmabad', 'active'),
(2, 'Nafees', 'Hassan', '03073500574', 'ameerali1811@gmail.com', '                                                                                            qasmabad                                                                                        ', 'active');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `warehouse_id`, `added_by`, `item_id`, `qty`, `created_at`) VALUES
(8, 1, 11, 6, 0, '2020-08-21 22:18:17'),
(9, 1, 11, 5, 12, '2020-08-21 22:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `status` enum('upcoming','due','paid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `quote_id`, `payment_date`, `amount`, `status`) VALUES
(1, 1, '2020-09-10', 1200, 'upcoming'),
(2, 1, '2020-09-10', 1200, 'upcoming'),
(3, 2, '2020-09-10', 1100, 'upcoming'),
(4, 2, '2020-10-10', 1100, 'upcoming');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `lot_size` varchar(50) NOT NULL,
  `amountpersquaremeter` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `payment_terms` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `lot_size`, `amountpersquaremeter`, `cost`, `sku`, `payment_terms`) VALUES
(8, 'plot no 402 sehrish nagar', '200', '1000', 200000, '18', 'Interest Per Annum'),
(9, 'GM', '120', '1000', 120000, '5', 'Down Payment');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `quote_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `payment_method` enum('check','cash','online') NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`quote_id`, `customer_id`, `property_id`, `total_amount`, `payment_method`, `notes`) VALUES
(1, 1, 8, 10000, 'cash', ' this is a good property  '),
(2, 1, 8, 10000, 'check', '                                              this is a good property                                            ');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(6, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `module_component` varchar(255) NOT NULL,
  `view_status` varchar(255) NOT NULL,
  `add_status` varchar(255) NOT NULL,
  `edit_status` varchar(255) NOT NULL,
  `delete_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `role_id`, `module_component`, `view_status`, `add_status`, `edit_status`, `delete_status`) VALUES
(76, 6, 'users', 'yes', 'yes', 'yes', 'yes'),
(77, 6, 'user_roles', 'yes', 'yes', 'yes', 'yes'),
(78, 6, 'customers', 'yes', 'yes', 'yes', 'yes'),
(79, 6, 'properties', 'yes', 'yes', 'yes', 'yes'),
(80, 6, 'suppliers', 'yes', 'yes', 'yes', 'yes'),
(81, 6, 'quotes', 'yes', 'yes', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `sale_qty` int(11) NOT NULL,
  `sale_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `warehouse_id`, `added_by`, `item_id`, `qty`, `created_at`) VALUES
(8, 1, 11, 5, 12, '2020-08-21 22:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `credit_days` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `mobile_num` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `person_name` varchar(255) NOT NULL,
  `person_designation` varchar(255) NOT NULL,
  `person_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `payment_method`, `credit_days`, `user_status`, `contact_person`, `city`, `mobile_num`, `address`, `person_name`, `person_designation`, `person_number`) VALUES
(1, 'fardeen', 'Online Transfer', '30', 'active', 'Fardeen', 'Hyderabad', '03073500574', 'qasmabad', 'Fardeen khan', 'CEO', '03123456789');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ph_num` varchar(50) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `user_type` enum('admin','user') NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 = active, 0= inactive ',
  `low_stock_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `ph_num`, `username`, `password`, `user_type`, `user_role_id`, `status`, `low_stock_qty`, `created_at`, `deleted_at`) VALUES
(1, 'Super', 'Admin', 'super@admin.com', '', 'admin', '27474ef2a683747b3a3961c96a6a152486ed0a0ea9cefdf7592c2383c3efa9a4497cb014efba80801d920a863bb6359584fb189a59db834d39638908ec2d1940e4BF8FlGj0V7OnDr9YZEFLBnLRqlBZBN9s5qwqQGPQY=', 'admin', 6, 1, 4, '2020-08-08 04:29:20', NULL),
(11, 'Talha', 'myshopuser', 'myshopuser@email.com', 'myshopuser@email.com', 'myshopuser', '1e710c864a1ec1fe1168ca9b5b291102e42ded01fe35557947fdbf5fe0a96b265740104435ce454f5253c1ddc92fa9aeecd1a96368a61f765e8d0a8034d51180uds+32PGUVl2AHBRfjT1Ba7mgWqRBSUzNfOql9F1+sc=', 'admin', 5, 1, 0, '2020-08-21 21:59:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`quote_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
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
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

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
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
