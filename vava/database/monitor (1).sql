-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 01:56 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitor`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_payable`
--

CREATE TABLE `account_payable` (
  `id` int(11) NOT NULL,
  `categ_id` int(11) NOT NULL,
  `payable_name` varchar(100) NOT NULL,
  `bill` int(11) NOT NULL,
  `date` date NOT NULL,
  `due_date` date NOT NULL,
  `reminder` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_payable`
--

INSERT INTO `account_payable` (`id`, `categ_id`, `payable_name`, `bill`, `date`, `due_date`, `reminder`, `description`) VALUES
(30, 9, 'watere', 232323, '2021-11-04', '2021-11-27', '2021-11-01', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categ_id` int(11) NOT NULL,
  `categ_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categ_id`, `categ_name`) VALUES
(64, 'screens'),
(65, 'C-purlins'),
(66, 'hogwire'),
(67, 'steel matting'),
(68, 'hogwire'),
(71, 'Galvalumes');

-- --------------------------------------------------------

--
-- Table structure for table `category_payable`
--

CREATE TABLE `category_payable` (
  `id` int(11) NOT NULL,
  `categ_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_payable`
--

INSERT INTO `category_payable` (`id`, `categ_name`) VALUES
(7, 'electricities'),
(8, 'Internet and Cable'),
(9, 'Water'),
(10, 'ordering');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `name`, `type`, `message`, `status`, `date`, `qty`) VALUES
(69, 'Maestrado, Troy Vincent, Handumon', 'addsupp', 'Base Mie Anne', 'read', '2021-11-04 19:22:50', 0),
(70, 'Maestrado, Troy Vincent, Handumon', 'addstock', 'hardiflex', 'read', '2021-11-04 19:29:07', 900),
(71, 'Maestrado, Troy Vincent, Handumon', 'addsupp', 'Amisola Jethree', 'read', '2021-11-04 19:37:37', 0),
(72, 'Maestrado, Troy Vincent, Handumon', 'addstock', 'Wire', 'read', '2021-11-04 20:33:20', 9000),
(73, 'Maestrado, Troy Vincent, Handumon', 'addstock', 'Wire', 'read', '2021-11-04 20:35:00', 9000),
(74, 'Maestrado, Troy Vincent, Handumon', 'addstock', 'Wire', 'read', '2021-11-04 20:36:43', 9000),
(75, 'Maestrado, Troy Vincent, Handumon', 'addcategory', 'C-purlins', 'read', '2021-11-04 20:36:58', 0),
(76, 'Maestrado, Troy Vincent, Handumon', 'addcategory', 'C-purlins', 'read', '2021-11-04 20:38:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_record_order`
--

CREATE TABLE `purchase_record_order` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `location` varchar(150) NOT NULL,
  `receiver_name` varchar(100) NOT NULL,
  `order_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_record_order`
--

INSERT INTO `purchase_record_order` (`id`, `supplier_id`, `product_name`, `qty`, `size`, `location`, `receiver_name`, `order_id`) VALUES
(105, 42, 'Plain Sheet', 500, '#10 -270', 'jimenez misamis occidental', 'Bugas Jhon Christian', '312AA3A'),
(107, 41, 'shabu', 900, '2kilos', 'sinacaban', 'Maestrado, Troy Vincent, Handumon', '2131231s');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `product_id`, `sale`, `dates`) VALUES
(132, 99, 45000, '2021-11-03 08:35:04'),
(134, 99, 9000, '2021-11-03 08:43:40'),
(135, 99, 1800, '2021-11-03 08:43:52'),
(136, 99, 1800, '2021-11-03 08:44:11'),
(137, 99, 4500, '2021-11-03 08:46:16'),
(138, 99, 270, '2021-11-03 10:05:12'),
(139, 99, 4500, '2021-11-03 10:05:42'),
(140, 99, 4500, '2021-11-03 10:06:21'),
(141, 99, 4500, '2021-11-03 10:06:57'),
(142, 82, 10000, '2021-11-03 10:16:12'),
(143, 82, 6000, '2021-11-03 10:25:18'),
(144, 82, 4000, '2021-11-03 10:31:09'),
(145, 82, 10000, '2021-11-03 10:34:18'),
(146, 99, 1800, '2021-11-03 10:35:05'),
(147, 99, 1800, '2021-11-03 10:38:04'),
(148, 82, 18000, '2021-11-03 10:40:16'),
(149, 82, 1000, '2021-11-03 10:40:52'),
(150, 99, 5400, '2021-11-03 10:46:14'),
(151, 99, 72000, '2021-11-03 10:51:00'),
(152, 99, 81000, '2021-11-03 10:52:56'),
(153, 82, 10000, '2021-11-03 11:29:06'),
(154, 82, 10000, '2021-11-03 11:31:24'),
(155, 82, 10000, '2021-11-03 11:33:52'),
(156, 82, 16000, '2021-11-03 11:34:07'),
(157, 99, 1080, '2021-11-03 11:55:37'),
(158, 99, 54000, '2021-11-03 12:19:31'),
(159, 99, 720, '2021-11-03 12:21:07'),
(160, 82, 100000, '2021-11-03 12:26:08'),
(161, 82, 800, '2021-11-03 12:26:45'),
(162, 99, 4500, '2021-11-04 01:10:29'),
(163, 99, 900, '2021-11-04 03:16:42'),
(164, 82, 400, '2021-11-04 03:53:08'),
(165, 99, 180, '2021-11-04 03:53:16'),
(166, 101, 9900, '2021-11-04 03:53:21'),
(167, 82, 1200, '2021-11-04 04:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Activate'),
(2, 'De-Activate');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `sizing` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `prc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `product_id`, `category_id`, `product_name`, `qty`, `sizing`, `description`, `prc`) VALUES
(82, 'T4S221A', 65, 'Marine davao-451', 58, '#10 -270', '  T4S221A-Marine davao-450 ', 200),
(99, 'GEX123', 64, 'Alphas', 18, '2X6X2.0', 'screeeeen', 90),
(101, 'TAZ231', 64, 'aluminum', 800, '2X6X2.0', 'any', 100),
(105, 'TAZ231232', 68, 'Wire', 9000, '1-114', 'wires', 90);

-- --------------------------------------------------------

--
-- Table structure for table `stock_receive`
--

CREATE TABLE `stock_receive` (
  `receive_id` int(11) NOT NULL,
  `receiver_name_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `sizing` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_receive`
--

INSERT INTO `stock_receive` (`receive_id`, `receiver_name_id`, `category_id`, `product_id`, `product_name`, `qty`, `sizing`) VALUES
(63, 105, 65, '312AA3A', 'Plain Sheet', 500, '#10 -270'),
(65, 105, 65, '312AA3A', 'Plain Sheet', 600, '#10 -270'),
(66, 107, 64, '2131231s', 'shabu', 9999, '2kilos');

-- --------------------------------------------------------

--
-- Table structure for table `stock_release`
--

CREATE TABLE `stock_release` (
  `release_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_release`
--

INSERT INTO `stock_release` (`release_id`, `stock_id`, `qty`) VALUES
(145, 99, 2),
(146, 101, 99),
(147, 82, 6);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `lastname/firstname/midname` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `details` varchar(200) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `lastname/firstname/midname`, `email`, `category_id`, `details`, `gender`, `address`) VALUES
(41, 'Fudan Glen', 'Fudan@gmail.com', 64, 'aluminum screen only', 'Male', 'Jimenez'),
(42, 'Patria Gena Fe', 'patria@gmail.com', 65, 'Purlins only', 'Female', 'Oroquita Misamis Occidental'),
(45, 'Amisola Jethree', 'amisola@gmail.com', 71, 'Galvalumes only', 'Male', 'Clarin Misamis Occidental');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `lastname/firstname/midname` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `stat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type_id`, `lastname/firstname/midname`, `gender`, `address`, `email`, `username`, `password`, `stat_id`) VALUES
(130, 1, 'Maestrado, Troy Vincent, Handumon', 'Male', 'P2 Tudela Mis Occ', 'troymaestrado2@gmail.com', 'troy', '123', 1),
(134, 3, 'Bugas Jhon Christian', 'Male', 'P2 Tudela Mis Occ', 'troymaestrado2@gmail.com', 'supervisor', '123', 1),
(136, 2, 'Floren Gallur Jeffrey', 'Male', 'Sinacaban Mis Occ', 'floren@gmail.com', 'encoder', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type`) VALUES
(1, 'admin'),
(2, 'encoder'),
(3, 'supervisor'),
(4, 'accounting staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_payable`
--
ALTER TABLE `account_payable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categ_id` (`categ_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categ_id`);

--
-- Indexes for table `category_payable`
--
ALTER TABLE `category_payable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_record_order`
--
ALTER TABLE `purchase_record_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `stock_receive`
--
ALTER TABLE `stock_receive`
  ADD PRIMARY KEY (`receive_id`),
  ADD KEY `receiver_name_id` (`receiver_name_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `stock_release`
--
ALTER TABLE `stock_release`
  ADD PRIMARY KEY (`release_id`),
  ADD KEY `stock_id` (`stock_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `stat_id` (`stat_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_payable`
--
ALTER TABLE `account_payable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `category_payable`
--
ALTER TABLE `category_payable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `purchase_record_order`
--
ALTER TABLE `purchase_record_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `stock_receive`
--
ALTER TABLE `stock_receive`
  MODIFY `receive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `stock_release`
--
ALTER TABLE `stock_release`
  MODIFY `release_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_payable`
--
ALTER TABLE `account_payable`
  ADD CONSTRAINT `account_payable_ibfk_1` FOREIGN KEY (`categ_id`) REFERENCES `category_payable` (`id`);

--
-- Constraints for table `purchase_record_order`
--
ALTER TABLE `purchase_record_order`
  ADD CONSTRAINT `purchase_record_order_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `stock` (`id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`categ_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_receive`
--
ALTER TABLE `stock_receive`
  ADD CONSTRAINT `stock_receive_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`categ_id`),
  ADD CONSTRAINT `stock_receive_ibfk_4` FOREIGN KEY (`receiver_name_id`) REFERENCES `purchase_record_order` (`id`);

--
-- Constraints for table `stock_release`
--
ALTER TABLE `stock_release`
  ADD CONSTRAINT `stock_release_ibfk_1` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`id`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`categ_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `user_type` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`stat_id`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
