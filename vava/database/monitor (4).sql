-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2021 at 08:33 AM
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
  `stat_id` int(11) NOT NULL,
  `payable_name` varchar(100) NOT NULL,
  `bill` int(11) NOT NULL,
  `date` date NOT NULL,
  `due_date` date NOT NULL,
  `reminder` date NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_payable`
--

INSERT INTO `account_payable` (`id`, `categ_id`, `stat_id`, `payable_name`, `bill`, `date`, `due_date`, `reminder`, `description`, `image_url`) VALUES
(34, 7, 1, 'MOELCI-II', 2000, '2021-11-13', '2021-11-30', '2021-11-29', 'read bytroy', 'IMG-618efe8d0d8559.15170934.jpg'),
(35, 9, 1, 'BACNAWAS', 500, '2021-11-13', '2021-11-22', '2021-11-20', 'hey', 'IMG-618efeed88e825.91943106.png');

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
(65, 'C-purlin'),
(93, 'Galvanized'),
(95, 'plywoods');

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
(12, 'ordering');

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
(76, 'Maestrado, Troy Vincent, Handumon', 'addcategory', 'C-purlins', 'read', '2021-11-04 20:38:06', 0),
(77, 'Maestrado, Troy Vincent, Handumon', 'stockrelease_delete', 'Alphas', 'read', '2021-11-05 06:44:15', 0),
(78, 'Maestrado, Troy Vincent, Handumon', 'stockreceive_delete', 'OY2E2A', 'read', '2021-11-05 06:46:57', 0),
(79, 'Maestrado, Troy Vincent, Handumon', 'addstock', 'Marine davao-451', 'read', '2021-11-05 11:53:11', 90),
(80, 'Maestrado, Troy Vincent, Handumon', 'stocklimit', 'Marine davao-451', 'unread', '2021-11-07 17:28:35', 0),
(81, 'Maestrado, Troy Vincent, Handumon', 'stockrelease', 'Marine davao-451', 'unread', '2021-11-07 17:28:35', 50),
(82, 'Maestrado, Troy Vincent, Handumon', 'stocklimit', 'Marine davao-451', 'unread', '2021-11-07 17:31:23', 0),
(83, 'Maestrado, Troy Vincent, Handumon', 'stockrelease', 'Marine davao-453', 'unread', '2021-11-07 17:31:43', 1000),
(84, 'Maestrado, Troy Vincent, Handumon', 'stockrelease', 'Purline', 'unread', '2021-11-09 13:05:49', 50),
(85, 'Maestrado, Troy Vincent, Handumon', 'stockrelease', 'Alpha', 'unread', '2021-11-09 13:05:55', 31),
(86, 'Maestrado, Troy Vincent, Handumon', 'adduser', 'Marine davao-451', 'read', '2021-11-13 13:54:14', 0),
(87, 'Maestrado, Troy Vincent, Handumon', 'addcategory', 'C-purlins', 'read', '2021-11-13 19:53:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Received');

-- --------------------------------------------------------

--
-- Table structure for table `pay_stat`
--

CREATE TABLE `pay_stat` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_stat`
--

INSERT INTO `pay_stat` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Paid');

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
  `order_id` varchar(200) NOT NULL,
  `stat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_record_order`
--

INSERT INTO `purchase_record_order` (`id`, `supplier_id`, `product_name`, `qty`, `size`, `location`, `receiver_name`, `order_id`, `stat_id`) VALUES
(174, 81, 'Wall angle', 323, '#10 -270a', 'tudela', 'Maestrado, Troy Vincent, Handumon', 'TSAS#2', 2),
(175, 78, 'purlines', 2323, '10231#', 'p2 tudela', 'Maestrado, Troy Vincent, Handumon', 'T4A232', 2),
(178, 79, 'asdasd', 12312, 'asdasd', 'p2 tudela', 'Maestrado, Troy Vincent, Handumon', 'T323A', 2);

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
(227, 154, 18000, '2021-11-17 06:39:56'),
(228, 154, 18000, '2021-11-17 06:42:03'),
(229, 154, 81000, '2021-11-17 06:42:30'),
(230, 157, 400, '2021-11-17 06:42:58'),
(231, 157, 1800, '2021-11-17 06:44:31'),
(232, 154, 450000, '2021-11-17 06:50:19');

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
  `prc` int(11) NOT NULL,
  `image_url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `product_id`, `category_id`, `product_name`, `qty`, `sizing`, `description`, `prc`, `image_url`) VALUES
(154, 'GEA1134', 64, 'Aluminum', 350, '#10 -2701', 'aluminum', 9000, 'IMG-618cee4d89ef25.50943142.jpg'),
(157, 'TAZ231', 65, 'Carrying channel', 379, '#10 -270', 'Carry channel - 200 php', 200, 'IMG-618cf35c071727.62053391.jpg'),
(161, 'T63T2A', 95, 'Lumber Core', 881, '2X6X2.0', 'Lumber Core-300php', 100000, 'IMG-618e3b1c770d57.82276448.jpg');

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
(99, 174, 64, 'TSAS#2', 'Wall angle', 323, '#10 -270a'),
(100, 175, 93, 'T4A232', 'purlines', 2323, '10231#'),
(101, 178, 95, 'T323A', 'asdasd', 12312, 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `stock_release`
--

CREATE TABLE `stock_release` (
  `release_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_release`
--

INSERT INTO `stock_release` (`release_id`, `stock_id`, `qty`, `customer_name`) VALUES
(218, 157, 10, 'ralph robecon'),
(219, 154, 8, 'Glen Fudan'),
(220, 154, 2, 'troy'),
(223, 157, 9, 'Armel');

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
  `address` varchar(100) NOT NULL,
  `image_url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `lastname/firstname/midname`, `email`, `category_id`, `details`, `gender`, `address`, `image_url`) VALUES
(78, 'Maestrado, Troy Vincent, Handumon', 'mcator511@gmail.com', 93, 'all galvanized products are availble to this supplier\r\n', 'Male', 'Oroquita Misamis Occidental', 'Img22.jpg'),
(79, 'Bugas Jhon Christian', 'bugas@gmail.com', 95, 'available  product is marine only', 'Female', 'Sinacaban Mis Occ', '489393.jpg'),
(81, 'Floren Gallur Jeffrey', 'floren@gmail.com', 64, 'all screens product are available to this man', 'Male', 'Oroquita Misamis Occidental', 'IMG-61904ff4028546.64375390.jpg');

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
(130, 1, 'Maestrado, Troy Vincent, Handumon', 'Male', 'P2 Tudela Mis Occ', 'troymaestrado2@gmail.com.ph', 'troy', '09215', 1),
(138, 2, 'Bugas Jhon Christian', 'Male', 'Sinacaban USA', 'bugas@gmail.com', 'bugas', 'bugas123', 2),
(139, 3, 'PaÃ±o Aaron John', 'Male', 'Jimenez misamis occidental', 'patria@gmail.com', 'pano', 'pano123@', 1),
(140, 4, 'Floren Gallur Jeffrey', 'Male', 'Sinacaban Mis Occ', 'floren@gmail.com', 'floren', 'floren123@', 1);

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
(1, 'Admin'),
(2, 'Encoder'),
(3, 'Supervisor'),
(4, 'Accounting staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_payable`
--
ALTER TABLE `account_payable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categ_id` (`categ_id`),
  ADD KEY `stat_id` (`stat_id`);

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
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_stat`
--
ALTER TABLE `pay_stat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_record_order`
--
ALTER TABLE `purchase_record_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `stat_id` (`stat_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `category_payable`
--
ALTER TABLE `category_payable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pay_stat`
--
ALTER TABLE `pay_stat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_record_order`
--
ALTER TABLE `purchase_record_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `stock_receive`
--
ALTER TABLE `stock_receive`
  MODIFY `receive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `stock_release`
--
ALTER TABLE `stock_release`
  MODIFY `release_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

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
  ADD CONSTRAINT `account_payable_ibfk_1` FOREIGN KEY (`categ_id`) REFERENCES `category_payable` (`id`),
  ADD CONSTRAINT `account_payable_ibfk_2` FOREIGN KEY (`stat_id`) REFERENCES `pay_stat` (`id`);

--
-- Constraints for table `purchase_record_order`
--
ALTER TABLE `purchase_record_order`
  ADD CONSTRAINT `purchase_record_order_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_record_order_ibfk_2` FOREIGN KEY (`stat_id`) REFERENCES `order_status` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `stock` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`categ_id`);

--
-- Constraints for table `stock_receive`
--
ALTER TABLE `stock_receive`
  ADD CONSTRAINT `stock_receive_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`categ_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_receive_ibfk_4` FOREIGN KEY (`receiver_name_id`) REFERENCES `purchase_record_order` (`id`) ON DELETE CASCADE;

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
